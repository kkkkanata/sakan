



// var services = ['.coffee','.aroma','.norble'];
// var index = -1;
// var doService = function(){
//   if(index < 0) { index++; return; }
//   $(services[index]).style.opacity = 0;
//   index++;
//   index %= services.length;
//   $(services[index]).style.opacity = 1;
// };
// setInterval(doService, 3000);
//
// window.addEventListener('load', function () {
// 	viewSlide('.coffee');
// });
// function viewSlide(className , slideNo = -1)
// {
// 	let imgArray = document.querySelectorAll(className);
//   console.log(imgArray[0]);
// 	if (slideNo >= 0) {
// 		//初回以外は現在のスライドを消す
// 		imgArray[slideNo].style.opacity = 0;
// 	}
// 	slideNo++;
// 	if (slideNo >= imgArray.length) {
// 		// slideNo = 0; //次のスライドがなければ最初のスライドへ戻る
// 	};
// 	imgArray[slideNo].style.opacity = 1;
// 	setTimeout(function(){viewSlide(className, slideNo);}, 3000);
// }
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
        $('.sub,.info,.point,.tennai p').each(function(){
            var elemPos = $(this).offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > elemPos - windowHeight + 150){
                $(this).addClass('scrollin');
            }
        });
    });
});


$(function(){
    $(window).scroll(function (){
        $('header').each(function(){
            var elemPos = $(this).offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > elemPos - windowHeight + 150){
                $(this).addClass('scrollin');
            }
        });
    });
});
// $(function(){
//     $(window).scroll(function (){
//         $('.info').each(function(){
//             var elemPos = $(this).offset().top;
//             var scroll = $(window).scrollTop();
//             var windowHeight = $(window).height();
//             if (scroll > elemPos - windowHeight + 150){
//                 $(this).addClass('scrollin');
//             }
//         });
//     });
// });
