jQuery(function($){

  // スライダーの高さ設定
  var zoomSlide = $('.top_zoomslide');
  var slideWidth;
  var slideHeight;
  var slideHeightSet = function(){
    slideWidth = zoomSlide.innerWidth();
    slideHeight = slideWidth * 0.45;
    zoomSlide.css('height', slideHeight + 'px');
  }
  slideHeightSet();
  $(window).resize(function() {
    slideHeightSet();
  });


});
