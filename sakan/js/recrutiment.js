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
