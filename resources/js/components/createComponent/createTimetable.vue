<template>
    <div class="inner-lesson-detail">
        <div id="basic-info">
            <div id="info_year" class="info">
                <input class="form-control" @keydown="trigger($event)" name="year" type="text" required>年度
            </div>
            <div id="info_grade" class="info">
                <select class="form-control" @keydown="trigger($event)" name="grade" id="" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                年
            </div>
            <div id="info_class" class="info">
                <input class="form-control" @keydown="trigger($event)" name="class" type="text" required>組
            </div>
            <div id="info_semester" class="info">
                <select class="form-control" @keydown="trigger($event)"  name="semester" id="" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                学期
            </div>
        </div>
        <div class="timetable-wrapper row">
            <div class="timetable col-md-7">
                <table class="col-md-12">
                    <!-- 曜日 -->
                    <tr class="day table-line">
                        <th class="timetable-index">&nbsp;</th>
                        <th v-for="(day, key) in days" :key="key" class="timetable-elm">{{ day }}</th>
                    </tr>
                    <!-- 科目 -->
                    <tr v-for="key of 8" :key="key" class="lesson-frame table-line">
                        <td class="timetable-index">{{ key }}</td>
                        <td v-for="(day_name, key2) of day_names" :key="key2" class="table-lesson timetable-elm">
                            <select @focus="focus($event)" @change="change($event)" @keydown="trigger($event)" class="form-control" :name="day_name">
                                <option value="">-</option>
                                <option v-for="(lesson_name, key) in lesson_names" :key="key" :value="key">{{ lesson_name }}</option>
                            </select>
                        </td>
                    </tr>
                    <tr class="lesson-frame table-line timetable-index">
                        <td class="timetable-index">&nbsp;</td>
                        <td class="day-total-lesson total-lesson-number timetable-elm" v-for="key of 6" :key="key"><input class="day-total-input form-control" @keydown="trigger($event)" @change="inputNumber($event)" :name="key" min="0" max="8" type="number"></td>
                        <td class="week-total-lesson total-lesson-number" >{{ week_total_lesson_number }}</td>
                    </tr>
                </table>
            </div>
            <!-- <div class="selected-lessons col-md-4 offset-md-1">
                <table class="table table-sm table-borderless col-md-8">
                    <tr  v-for="(lesson, key) in new_lesson_data" :key="key" class="row text-center line-height1"><th class="col-md-6 text-center">{{ lesson[0] }}</th><td class="col-md-6">{{ lesson[2] }}コマ</td></tr>
                    <tr class="row line-height1 total"><th class="col-md-6 text-center">合計</th><td class="col-md-6 text-center">{{ total_lesson_number }}コマ</td></tr>
                </table>
            </div> -->
            <div class="registered-lessons col-md-5">
                <div v-for="(lesson, key) in lesson_data" :key="key" class="registered-lesson">
                    <div class="left-box">
                        <h3>{{ lesson[0] }}</h3>
                        <!-- <p class="detail-terms"><label>担当：</label>{{ lesson[1] }}先生</p> -->
                        <tr class="detail-terms"><th>担当：</th><td>{{lesson[1]}}先生</td></tr>
                    </div>
                    <div class="right-box">
                        <p class="detail-terms">週<span>{{ lesson[2] }}</span>コマ</p>
                        <!-- <p class="detail-terms">連続最大<span>{{ lesson[3] }}</span>コマ</p>
                        <p class="detail-terms">一日最大<span>{{ lesson[4] }}</span>コマ</p> -->
                    </div>
                </div>
                <div class="total">
                    合計<span>{{ total_lesson_number }}</span>コマ
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:['lesson_data', 'lesson_names'],
    data(){
        return{
            days:['月', '火', '水', '木', '金', '土'],
            day_names:['mon[]', 'tue[]', 'wed[]', 'thu[]', 'fri[]', 'sat[]'],
            focus_lesson_id: '',
            new_lesson_data: '',
            total_lesson_number: null,
            week_total_lesson_number: null
        }
    },
    mounted: function(){
        this.new_lesson_data = this.lesson_data;
        
        for (let key in this.lesson_data) {
            this.total_lesson_number += Number(this.lesson_data[key][2]);
        }
    },
    methods: {
        trigger(event){
            // 意図せぬエンターキーでデータが送信されないようにするためのメソッド
            if ((event.which && event.which === 13) ||(event.keyCode && event.keyCode === 13)){
                    event.preventDefault();
                    return false;
                } else {
                    return true;
                }
        },
        focus(event){
            this.focus_lesson_id = event.target.value;
        },
        change(event){
            // selectがfocusされるたびに、それまで入っていた値をfocus_lesson_idに保存する
            // changeイベントが起こったとき、changeする前の値はfocus_lesson_idの値なので
            // そのidをもつ科目のnumberを1増やして、新たに選択された科目のnumberを1減らす
            var eventId = event.target.value;
            var previousId = this.focus_lesson_id;

            if (eventId === previousId) {
                return;
            }else if (previousId === '') {
                this.new_lesson_data[eventId].splice(2, 1, this.new_lesson_data[eventId][2] - 1);
            }else if (eventId !== previousId && eventId !== '') {
                this.new_lesson_data[previousId].splice(2, 1, this.new_lesson_data[previousId][2] + 1);
                this.new_lesson_data[eventId].splice(2, 1, this.new_lesson_data[eventId][2] - 1);
            }else if (eventId !== previousId && eventId === '') {
                this.new_lesson_data[previousId].splice(2, 1, this.new_lesson_data[previousId][2] + 1);
            }

            // focusが変わらないまま科目を変更する場合もあるため、focus_lesson_idの値を更新しておく
            this.focus_lesson_id = eventId;
        },
        inputNumber(event){
            // 曜日ごとのトータル科目数を取得して、一週間のトータル科目数を計算する
            this.week_total_lesson_number = null;
            
            for (let index = 0; index < 6; index++) {
                this.week_total_lesson_number += Number($('.day-total-lesson .day-total-input')[index].value);
            }

            // この後に前画面で選択したコマ数の合計と合っているか比較して
            // 超えていたらアラートとして赤字にするなどの処理をする
        }
    }
}
</script>

<style>
    #basic-info{
        overflow: hidden;
        padding: 3rem 12.5% ;
    }

    #basic-info .info{
        width: 15%;
        float: left;
        margin: 0 2%;
    }

    #basic-info .info:nth-child(1){
        margin-left: 14%;
    }

    #basic-info .info:nth-child(4){
        margin-right: 14%;
    }

    #basic-info .info input{
        width: 70%;
        display: inline-block;
        margin-right: 5px;
    }

    #basic-info .info select{
        width: 70%;
        display: inline-block;
    }

    .timetable-number{
        width: 1rem;
        float: left;
        height: calc((1.6em + 0.75rem + 2px) * 9);
    }

    .timetable-number .number{
        line-height: calc(1.6em + 0.75rem + 2px);
    }

    .table-line{
        line-height: 2rem;
        text-align: center;
    }

    .total-lesson-number{
        width: 3rem;
        height: 2rem;
    }

    .registered-lesson{
        overflow: hidden;
        margin-top: 0.3rem;
        border: 1px solid #dfdfdf;
        border-radius: 0.25rem;
        padding: 0.3rem 0.8rem;
        width: 45%;
        margin-right: 1%;
    }

    .registered-lesson input{
        width: 4rem;
    }

    .registered-lesson h3{
        font-size: 1.2rem;
        white-space: nowrap;
    }

    .registered-lesson .left-box{
        clear: both;
        display: flex;
        height: initial;
        width: initial;
        padding-top: 5px;
    }

    .registered-lesson .right-box{
        margin-left: 0.5rem;
        font-size: 1rem;
        clear: both;
        height: initial;
    }

    .detail-terms{
        margin: 0;
        line-height: 1.2rem;
    }

    .detail-terms label{
        width: 2.8rem;
    }

    .detail-terms span{
        font-size: 1.3rem;
        padding-left: 1rem;
        padding-right: 1rem;
    }

    .detail-terms th{
        white-space: nowrap;
    }

    .left-box .detail-terms{
        margin-left: 0.5rem;
    }

    .table-lesson{
        padding: 0 !important;
    }

    .timetable-wrapper{
        overflow: hidden;
    }

    .timetable{
        float: left;
    }

    .selected-lessons{
        float: left;
        font-size: 1.1rem;
        margin-left: 6%;
        padding-top: 3rem;
    }

    .timetable .table-line .timetable-index{
        width: 10%;
    }

    .timetable .table-line .timetable-elm{
        width: 15%;
    }

    .table-lesson select{
        border-radius: 0 !important;
    }

    .day-total-input{
        border-radius: 0 !important;
    }

    .registered-lessons{
        display: flex;
        width:80%;
        margin: 1.5rem auto;
        flex-wrap: wrap;    
        align-items: flex-start;
        align-content: flex-start;
    }

    .total{
        margin-top: 1.5rem;
        margin-left: 60%;
        text-align: right;
        padding-right: 1rem;
        font-size: 1.2rem;
    }

    .total span{
        font-size: 1.5rem;
    }
</style>