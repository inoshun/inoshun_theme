jQuery(function($){
  // スクロール矢印のエフェクト
  var scrollDot = $('.scroll span');
  var x = 0;
  var scrollArrow = $('.scroll img');
  var scrollArrowHide = function(){
    scrollDot.removeClass("show");
    scrollArrow.removeClass("show");
  }
  var scrollArrowFunc = function(){
    if (x <= scrollDot.length - 1) {
      scrollDot[x].classList.add("show");
      x++;
      setTimeout(scrollArrowFunc, 200);
    } else if (x = scrollDot.length) {
      scrollArrow.addClass("show");
      x = 0;
      setTimeout(scrollArrowHide, 2000);
      setTimeout(scrollArrowFunc, 2500);
    }
  }
  scrollArrowFunc();


});
