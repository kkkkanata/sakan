//カレンダー
$(function(){
    $('#datepicker').datepicker({
      // showOn:'both',
    // buttonImageOnly: true,
    // buttonImage: 'image/reserve/cal_icon.png',
    minDate: '+1d',
    maxDate: '+6m',
    dateFormat: 'yy/mm/dd(D)'
});
});

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
