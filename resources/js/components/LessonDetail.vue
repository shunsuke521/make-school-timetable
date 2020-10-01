<template>
    <div class="js-lesson-detail">
        <div class="lesson-detail-wrapper">
            <input name="lesson_id[]" :value="lesson_id" :data-input_number="input_number" class="lesson-select" @click="lessonSelect($event)" type="checkbox">
            <div class="lesson-detail have-disabled">
                <div class="left-box">
                    <h2>{{ lesson_name }}</h2>
                    <p><label>第一教室：</label>{{ classroom1 }}</p>
                    <p><label>第二教室：</label>{{ classroom2 }}</p>
                    <p><label>教員名：</label>{{ teacher }}</p>
                </div>
                <div class="right-box js-right-box">
                    <p class="detail-input"><label>週</label><input @keydown="trigger($event)" name="per_week[]" class="js-disabled-check" type="number" min="1" max="48" required disabled><span>コマ</span></p>
                    <p class="detail-input"><label>連続最大</label><input @keydown="trigger($event)" name="continuity[]" class="js-disabled-check" type="number" min="1" max="8" required disabled><span>コマ</span></p>
                    <p class="detail-input"><label>一日最大</label><input @keydown="trigger($event)" name="max_per_day[]" class="js-disabled-check" type="number" min="1" max="8" required disabled><span>コマ</span></p>
                </div>
            </div>
        </div>
    </div>    
</template>

<script>
import $ from 'jquery';

export default {
    props: ['lesson_id', 'lesson_name', 'teacher', 'classroom1', 'classroom2', 'input_number'],
    methods: {
        lessonSelect(event) {
            // クリックした要素が何番目のDOMであるかを取得
            var number = Number(event.target.dataset.input_number) +1;
            // console.log(document.getElementById('test'));
            // console.log($('#test')[0]);
            // console.log($('#lesson_detail div:nth-child(4)').find('.right-box p:nth-child(1)').children('input')[0]);
            // console.log($('#lesson_detail:nth-child('+number+')'));
            // console.log(document.getElementsByClassName(number));
            // console.log(document.getElementsByClassName(number)[0]);

            if (event.target.checked) {
                for (let i = 1; i <= 3; i++) {
                    $('#lesson_detail .js-lesson-detail:nth-child('+number+')').find('.js-right-box p:nth-child('+i+')').children('input').prop('disabled', false);
                    $('#lesson_detail .js-lesson-detail:nth-child('+number+')').find('.lesson-detail').removeClass('have-disabled');
                }
            }else{
                for (let i = 1; i <= 3; i++) {
                    $('#lesson_detail .js-lesson-detail:nth-child('+number+')').find('.js-right-box p:nth-child('+i+')').children('input').val('');
                    $('#lesson_detail .js-lesson-detail:nth-child('+number+')').find('.js-right-box p:nth-child('+i+')').children('input').prop('disabled', true);
                    $('#lesson_detail .js-lesson-detail:nth-child('+number+')').find('.lesson-detail').addClass('have-disabled');
                }
            }


        },
        trigger(event){
            // 意図せぬエンターキーでデータが送信されないようにするためのメソッド
            if ((event.which && event.which === 13) ||(event.keyCode && event.keyCode === 13)){
                    event.preventDefault();
                    return false;
                } else {
                    return true;
                }
        }
    }
}
</script>

<style>
    .page-title{
        margin: 4rem 0 0 4rem;
    }

    .lesson-detail-wrapper{
        overflow: hidden;
        height: 15rem;
        margin: 2rem auto;
        padding: 1rem 2rem;
    }

    .lesson-detail-wrapper .lesson-select{
        display: block;
        float: left;
        width: 1.2rem;
        height: 1.2rem;
    }

    .lesson-detail{
        overflow: hidden;
        float: left;
        height: 100%;
        border: 1px solid #a9a9a9;
        border-radius: 6px;
    }

    .lesson-detail.have-disabled{
        background: #e6e6e6;
    }

    .left-box{
        float: left;
        width: 15rem;
        height: 100%;
        box-sizing: border-box;
    }

    .left-box h2{
        margin: 1rem 0;
    }

    .left-box p{
        margin: .2rem 0;
    }

    .right-box{
        float: left;
        height: 100%;
        box-sizing: border-box;
    }

    .detail-input{
        text-align: right;
        margin: 0.5rem 3rem 0.5rem 0;
    }

    .detail-input input{
        display: inline-block;
        width: 2rem;
        border-radius: 3px;
        border: 2px solid #a9a9a9;
        padding: 1px;
        margin:0 1rem;
    }

    .detail-input input:disabled{
        background: #e6e6e6;
        border: 2px solid #a9a9a9;
    }
</style>