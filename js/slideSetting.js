jQuery(function($){

  // TOPの画像切り替え
  var slideImg = $('.slide_img');
  var slideWidth;
  var slideHeight;
  var slideHeightSet = function(){
    slideWidth = $('.slide_img').innerWidth();
    slideHeight = slideWidth * 0.45;
    slideImg.css('height', slideHeight + 'px');
  }
  slideHeightSet();
  $(window).resize(function() {
    slideHeightSet();
  });

  var slideLength = slideImg.length;
  var i = 0;
  var changeSlide2 = function() {
    slideImg[i+1].classList.add("disappear");
    slideImg[i].classList.remove("disappear");
    slideImg[i+1].classList.remove("appear");
    slideImg[0].classList.add("appear");
    i++;
    setTimeout(changeSlide3, 4000);
  }
  var changeSlide3 = function() {
    slideImg[0].classList.add("disappear");
    slideImg[i].classList.remove("disappear");
    slideImg[0].classList.remove("appear");
    slideImg[1].classList.add("appear");
    i++;
    setTimeout(changeSlide4, 4000);
  }
  var changeSlide4 = function(){
    i = 0;
    changeSlide();
  }
  var changeSlide = function(){
    if (i <= (slideLength - 3)) {
      slideImg[i+1].classList.add("disappear");
      slideImg[i].classList.remove("disappear");
      slideImg[i+1].classList.remove("appear");
      slideImg[i+2].classList.add("appear");
      i++;
      setTimeout(changeSlide, 4000);
    } else if ((slideLength - 3) < i <= (slideLength - 2)) {
      changeSlide2();
    }
  }
  setTimeout(changeSlide, 4000);

});
