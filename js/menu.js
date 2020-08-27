/**
 * This file contains general scripts for front end behavior.
 */
$(document).ready(function () {
  // display sub-menu on keystroke tab focus
  $("a[href^='#']:not('.open')").on("focus",function(e) {
    e.preventDefault();
    $(".sub-menu").removeClass("show");
    $("a[href^='#']").not(this).removeClass("open");
    $(this).addClass("open");
    $(this).next(".sub-menu").addClass("show");
  });
  $(".sub-menu li:last-child").on("focusout",function(e) {
    e.preventDefault();
    $(this).parents(".sub-menu").removeClass("show");
    $(this).parents("a[href^='#']").removeClass("open");
  });
  //toggle mobile menu
  $(".menu-toggle").on("click",function(e) {
    e.preventDefault();
    $(this).toggleClass("open");
    $("#header_dropdown_container").toggleClass("show");
    $(this).attr('aria-expanded', function (i, attr) {
      return attr == 'true' ? 'false' : 'true'
    });
  });

  $(".header-dropdown-menu > a").on("click", function(e) {
    if (window.outerWidth < 1201) {
      $(this).toggleClass('expanded');
      $(this).parent('.header-dropdown-menu').find('> ul').toggleClass("show");
      $(this).attr('aria-expanded', function (i, attr) {
        return attr == 'true' ? 'false' : 'true'
      });
    }
  });

  $('.menu-item-has-children > a > .caret, .page_item_has_children > a > .caret').on("click", function(e){
    e.preventDefault();
    $(this).toggleClass('expanded');
    $(this).parent('a').parent('li').find('> ul').toggleClass("show");
    $(this).attr('aria-expanded', function (i, attr) {
      return attr == 'true' ? 'false' : 'true'
    });
  });

  $(window).resize(function () {
    if (window.outerWidth >= 1201) {
      $('.menu-item-has-children > a > .caret, .page_item_has_children > a > .caret').removeClass('expanded');
      $(".menu-toggle").removeClass('open');
      $("#header_dropdown_container").removeClass("show");
      $(".header-dropdown-menu").find('> ul').removeClass('show');
    }
  });

  //toggle mobile search
  $(".search-mobile").on("click",function(e) {
    e.preventDefault();
    $(this).toggleClass("open");
    $(".search-form-container").toggleClass("show");
    $("#searchform").attr('aria-expanded', function (i, attr) {
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
    $(this).toggleClass("open");
    $("#header_dropdown_container").toggleClass("show");
  });

  $(".header-dropdown-menu > a").on("touchstart", function(e) {
    if (window.outerWidth < 1201) {
      $(this).toggleClass('expanded');
      $(this).parent('.header-dropdown-menu').find('> ul').toggleClass("show");
    }
  });

  $('.menu-item-has-children > a > .caret, .page_item_has_children > a > .caret').on("touchstart", function(e){
    e.preventDefault();
    $(this).toggleClass('expanded');
    $(this).parent('a').parent('li').find('> ul').toggleClass("show");
  });

  $(".search-mobile").on("touchstart",function(e) {
    e.preventDefault();
      $(this).toggleClass("open");
      $(".search-form-container").toggleClass("show");
      $("#searchform").attr('aria-expanded', function (i, attr) {
        return attr == 'true' ? 'false' : 'true'
      });
  });

  // run test on initial page load
  checkSize();
  // run test on resize of the window
  $(window).resize(checkSize);
  function checkSize(){
    if ($("#header_top").css("z-index") == "2" ){
      $("#header_top:after").on("touchstart",function() {
        $(this).toggleClass("open");
      });
      $("#header_top:after").on("focus",function() {
        $(this).toggleClass("open");
      });
      $('.search-form').attr('aria-hidden', function (i, attr) {
        return attr == 'true' ? 'false' : 'true'
      });
      $('.search-form').attr('role', function (i, attr) {
        return attr == 'search' ? '' : 'search'
      });
    }
  }

  // display FAQ answer
  $(".faq-container .post-content .entry-title > a").on("click",function(e) {
    e.preventDefault();
    $(this).parent().attr('aria-expanded', function (i, attr) {
      return attr == 'true' ? 'false' : 'true'
    });
    $(this).parent().next(".entry-content").toggleClass('open');
    $(this).parent().next(".entry-content").attr('aria-expanded', function (i, attr) {
      return attr == 'true' ? 'false' : 'true'
    });
  });
  $(".faq-container .post-content .entry-title > a").on("touchstart",function(e) {
    e.preventDefault();
    $(this).parent().next(".entry-content").toggleClass('open');
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
  $('a.go-top').click(function(){
    $('html, body').animate({
      scrollTop: $( $(this).attr('href') ).offset().top
    }, 1000);
  });
});