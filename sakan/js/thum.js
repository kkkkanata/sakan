$(function() {
   $('.imageList__thumbnail').on('click',function() {
     if ( $(this).hasClass("selected") ) {
        return;
    }
     var selectedImgSrc = $(this).children('img').attr('src');
     var selectedId = $(this).children('p').attr('id');
     var selectedStr = document.getElementById(selectedId).innerHTML;
     var Main = document.getElementById('main');

    $('.selected').removeClass('selected');
    $(this).addClass('selected');

     $('.imageList__view').children('img').attr('src', selectedImgSrc);
     Main.textContent = selectedStr;

  });
})
$(function(){
  $('.imageList__thumbnail').on('mouseleave',function(){$(this).removeClass('select')})
  $('.imageList__thumbnail').on('mouseover',function(){$(this).addClass('select')})
})
