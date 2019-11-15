objectFitImages('.thumbnail img');

jQuery(function($){

  // ローディング
  var startTime = new Date().getTime();
  $(window).load(function(){
    var loadedTime = new Date().getTime();
    if ((loadedTime - startTime) <= 3000) {
      setTimeout(function(){
        $('.loading').fadeOut(200);
      }, 3000 - (loadedTime - startTime));
    } else {
      $('.loading').fadeOut(200);
    }
  });

  // スムーススクロール
  // $('a[href^="#"]').click(function(){
  //   var speed = 500;
  //   var href= $(this).attr("href");
  //   var target = $(href == "#" || href == "" ? 'html' : href);
  //   var headerHeight = $("header").height();
  //   var position = target.offset().top - headerHeight;
  //   $("html, body").animate({scrollTop:position}, speed, "swing");
  //   return false;
  // });

  //コンテンツの最低heightを指定
  var winHeight = $(window).height();
  $('.section_cont').css('min-height', winHeight + 'px');
  $(window).resize(function() {
    var winHeight = $(window).height();
    $('.section_cont').css('min-height', winHeight + 'px');
  });

  // navメニュー
  var navlist = $('.nav_lisks li');
  var navlistLength = navlist.length;
  var i = 0;
  $(".nav_btn").on("click", function(){
    $(this).toggleClass('open');
    $(".nav").toggleClass('open');
    $(".back_screen").toggleClass('open');
    $("body").toggleClass('open');
    var listShow = function(){
      if (i <= navlistLength - 1) {
        navlist[i].classList.toggle("open");
        i++;
        setTimeout(listShow, 50);
      } else {
        i = 0;
        return false;
      }
    }
    setTimeout(listShow, 200);
  });
  var navlink = $('.nav_lisks li a');
  var navhr;
  var unhover = false;
  var navhrAdd = function(){
    if (!unhover) {
      navhr.addClass('hover');
    }
  }
  navlink.hover(
    function(){
      unhover = false;
      navhr = $(this).next('hr');
      setTimeout(navhrAdd, 200);
    },
    function(){
      unhover = true;
      navhr = $(this).next('hr');
      navhr.removeClass('hover');
    }
  );

  // モーダル
  var modal = $('.modal');
  var setModalHeight = function(){
    modal.css("height", (winHeight*0.7) + "px");
  }
  setModalHeight();
  $(window).resize(function() {
    setModalHeight();
  });
  var modalBtn = $('.modal_btn');
  var modalName;
  var thisModal;
  modalBtn.on('click', function(){
    modalName = $(this).data('modal')
    thisModal = $('#' + modalName);
    thisModal.addClass('open');
    thisModal.find('.modal').fadeIn(100);
  });
  $(".modal_back").on('click touchend', function (event) {
    if (!$(event.target).closest('.modal').length) {
      $(".modal_back").removeClass('open');
      $('.modal').fadeOut(100);
    }
  });
  $('.modal_close').on('click', function(){
    $(".modal_back").removeClass('open');
    $('.modal').fadeOut(100);
  });

  // MVのスクロールボタン
  var scrollBtn = $('.scroll');
  var sectionCont = $('.section_cont');
  var sectionContTop = sectionCont.offset().top;
  scrollBtn.on('click', function(){
    $("html,body").animate({scrollTop:sectionContTop});
  });

  // カテゴリー一覧
  var categoryListLink = $('.cate_lists > li > a');
  var cateChildListLink = $('.cate_lists > li > ul > li > a');
  categoryListLink.append('<div></div>');
  cateChildListLink.append('<span class="under_bar"></span><span class="list_dot"></span>');

});
