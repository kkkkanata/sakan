//文字フェードイン
$(function(){
// リストを非表示
$('.tennai p').hide();
// 繰り返し処理
$('.tennai p').each(function(i) {
// 遅延させてフェードイン
$(this).delay(2000 * i).fadeIn(3000);
});
});

//フェードイン
$(function(){
        $('.tennai').addClass('scrollin');
})

//スクロール
$(function(){
    $(window).scroll(function (){
        $('.point').each(function(){
            var elemPos = $(this).offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > elemPos - windowHeight + 150){
                $(this).addClass('scrollin');
            }
        });
    });
});
