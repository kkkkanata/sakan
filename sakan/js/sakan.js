const pics_src = ["../img/apple.png","../img/rime.jpg","../img/orenge.jpg","../img/siffon.jpg","../img/sitoron.jpg"]
var num = -1;


function slideshow_timer(){
if (num === 4){
num = 0;
}
else {
num ++;
pics_src[num].style.opacity=0;
}
pics_src[num].style.opacity=1;
document.getElementById("mypic").src = pics_src[num];
}

setInterval(slideshow_timer, 5000);

window.addEventListener('load', function () {
	viewSlide('.cake');
});
function viewSlide(className , slideNo = -1)
{
	let imgArray = document.querySelectorAll(className);
	if (slideNo >= 0) {
		//初回以外は現在のスライドを消す
		imgArray[slideNo].style.opacity = 0;
	}
	slideNo++;
	if (slideNo >= imgArray.length) {
		slideNo = 0; //次のスライドがなければ最初のスライドへ戻る
	}
	imgArray[slideNo].style.opacity = 1;
	setTimeout(function(){viewSlide(className, slideNo);}, 10000);
}
