

//スクロール
$(function(){
    $(window).scroll(function (){
        $('p').each(function(){
            var elemPos = $(this).offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > elemPos - windowHeight + 150){
                $(this).addClass('scrollin');
            }
        });
    });
});
