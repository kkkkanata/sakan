$(function(){
  const thumbs = document.querySelectorAll('.thumb');
  thumbs.forEach(function(item){
 item.onclick = function(){
  document.getElementById('bigimg').src = this.dataset.image;
 }
});
})
