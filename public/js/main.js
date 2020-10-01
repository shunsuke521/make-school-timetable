(function() {
    'use strict';

    // フラッシュメッセージのslideDown slideUp
    $(function(){
        $('.flash_message').slideDown(1000, function(){
            $('.flash_message').delay(3000).slideUp(1000);
        });
    });

})();