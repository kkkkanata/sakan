$(function() {
   $('.imageList__thumbnail').on('click',function() {
     if ( $(this).hasClass("selected") ) {
        return;
    }
     var selectedImgSrc = $(this).children('img').attr('src');

    $('.selected').removeClass('selected');
    $(this).addClass('selected');

     $('.imageList__view').children('img').attr('src', selectedImgSrc);
  });
})
$(function(){
  $('.imageList__thumbnail').on('mouseleave',function(){$(this).removeClass('select')})
  $('.imageList__thumbnail').on('mouseover',function(){$(this).addClass('select')})
})
