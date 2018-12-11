/**
 * This file contains general scripts for front end behavior.
 */
$(document).ready(function () {
  // display sub-menu on keystroke tab focus
  $("a[href^='#']").on("focus",function(e) {
    e.preventDefault();
    $(this).next(".sub-menu").toggleClass("show");
  });
  $(".sub-menu li:last-child").on("focusout",function(e) {
    e.preventDefault();
    $(this).parents(".sub-menu").toggleClass("show");
    $(this).parents("a[href^='#']").toggleClass("open");
  });
  //toggle mobile menu
  $(".menu-toggle").on("click",function(e) {
    e.preventDefault();
    $(this).toggleClass("open");
    $("#header_btm_content > ul").toggleClass("show");
    $("#header_btm form#searchform").toggleClass("show");
    $(this).attr('aria-expanded', function (i, attr) {
      return attr == 'true' ? 'false' : 'true'
    });
  });

  // behavior for mobile - touch
  $("a[href^='#']").on("touchstart",function(e) {
    e.preventDefault();
    $(this).addClass("open");
  });
  $("a.open[href^='#']").on("touchstart",function(e) {
    e.preventDefault();
    $(this).removeClass("open");
    $(this).next(".sub-menu").hide();
  });
  $(".menu-toggle").on("touchstart",function(e) {
    e.preventDefault();
      $(this).toggleClass("on");
      $("#header_btm_content > ul").toggleClass("show");
      $("#header_btm form#searchform").toggleClass("show");
  });

  // run test on initial page load
  checkSize();
  // run test on resize of the window
  $(window).resize(checkSize);
  function checkSize(){
    if ($("#header_top").css("z-index") == "2" ){
      $("#header_top").on("touchstart",function() {
        $(this).toggleClass("open");
      });
      $("#header_top").on("focus",function() {
        $(this).toggleClass("open");
      });
    }
  }

  // display FAQ answer
  $(".category-faq .post-content .entry-title > a").on("click",function(e) {
    e.preventDefault();
    $(this).parent().attr('aria-expanded', function (i, attr) {
      return attr == 'true' ? 'false' : 'true'
    });
    $(this).parent().next(".entry-content").toggleClass('open');
    $(this).parent().next(".entry-content").attr('aria-expanded', function (i, attr) {
      return attr == 'true' ? 'false' : 'true'
    });
  });
  $(".category-faq .post-content .entry-title > a").on("touchstart",function(e) {
    e.preventDefault();
    $(this).closest(".entry-content").toggleClass('open');
    $(this).attr('aria-expanded', function (i, attr) {
      return attr == 'true' ? 'false' : 'true'
    });
  });

  // back to top button
  $(window).scroll(function(event){
    var scroll = $(window).scrollTop();
      if (scroll >= 50) {
        $(".go-top").addClass("show");
      } else {
        $(".go-top").removeClass("show");
      }
  });
  $('a').click(function(){
    $('html, body').animate({
      scrollTop: $( $(this).attr('href') ).offset().top
    }, 1000);
  });
});