/**
 * This file contains general scripts for front end behavior.
 */

var keys = {
	tab:    9,
	enter:  13,
	esc:    27,
	space:  32,
	left:   37,
	up:     38,
	right:  39,
	down:   40
};

function init(){
  $('.menu-item-has-children > a, .page_item_has_children > a, .header-dropdown-menu > a').each(function(){
    $(this).attr('aria-label', 'Open submenu of ' + $(this).text());
  });
}

$(document).ready(function () {
  init();

  //toggle mobile menu
  $(".menu-toggle").on("click",function(e) {
    e.stopPropagation();
    e.preventDefault();

    if(!$(this).hasClass('open')){
      openMainNavMenu();
    }else{
      $(this).toggleClass("open");
      $("#header_dropdown_container").toggleClass("show");
      $(this).attr('aria-expanded', function (i, attr) {
        return attr == 'true' ? 'false' : 'true'
      });
   }
  });

  $(".header-dropdown-menu > a").on("click", function(e) {
    e.stopPropagation();
    if (window.outerWidth < 1200) {
      $(this).toggleClass('expanded');
      if(!$(this).hasClass('expanded')){
        $(this).attr('aria-label', 'Open submenu of ' + $(this).find('.parent-dropdown').text());
      } else{
        $(this).attr('aria-label', 'Close submenu of ' + $(this).find('.parent-dropdown').text());
      }
      $(this).parent('.header-dropdown-menu').find('> ul').toggleClass("show");
      $(this).attr('aria-expanded', function (i, attr) {
        return attr == 'true' ? 'false' : 'true'
      });
    }
  });

  $('.menu-item-has-children > a > .caret, .page_item_has_children > a > .caret').on("click", function(e){
    e.stopPropagation();
    e.preventDefault();
    $(this).toggleClass('expanded');
    if(!$(this).hasClass('expanded')){
      $(this).parent('a').attr('aria-label', 'Open submenu of ' + $(this).parent('a').text());
    } else{
      $(this).parent('a').attr('aria-label', 'Close submenu of ' + $(this).parent('a').text());
    }
    $(this).parent('a').parent('li').find('> ul').toggleClass("show");
    $(this).parent('a').attr('aria-expanded', function (i, attr) {
      return attr == 'true' ? 'false' : 'true'
    });
  });

  $(window).resize(function () {
    if (window.outerWidth >= 1200) {
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

  //sidebar template block navigation
  $(".dropdown-secondary-new-blocks > li:first-of-type > .caret").on("click", function(e) {
    e.stopPropagation();
    e.preventDefault();
    $(this).parents('.dropdown-secondary-new-blocks').find('a:first').toggleClass("expanded");
    if(!$(this).parents('.dropdown-secondary-new-blocks').find('a:first').hasClass('expanded')){
      $(this).parents('.dropdown-secondary-new-blocks').find('a:first').attr('aria-label', 'Open submenu');
    } else{
      $(this).parents('.dropdown-secondary-new-blocks').find('a:first').attr('aria-label', 'Close submenu');
    }
    $(this).parents('.dropdown-secondary-new-blocks').toggleClass("open");
    $(this).parents('.dropdown-secondary-new-blocks').find('ul').toggleClass("show");
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
    if (window.outerWidth < 1200) {
      $(this).toggleClass('expanded');
      $(this).parent('.header-dropdown-menu').find('> ul').toggleClass("show");
      $(this).attr('aria-expanded', function (i, attr) {
        return attr == 'true' ? 'false' : 'true'
      });
    }
  });

  $('.menu-item-has-children > a > .caret, .page_item_has_children > a > .caret').on("touchstart", function(e){
    e.preventDefault();
    $(this).parent('a').toggleClass('expanded');
    $(this).parent('a').parent('li').find('> ul').toggleClass("show");
    $(this).parent('a').attr('aria-expanded', function (i, attr) {
      return attr == 'true' ? 'false' : 'true'
    });
  });

  $(".search-mobile").on("touchstart",function(e) {
    e.preventDefault();
      $(this).toggleClass("open");
      $(".search-form-container").toggleClass("show");
      $("#searchform").attr('aria-expanded', function (i, attr) {
        return attr == 'true' ? 'false' : 'true'
      });
  });

    //sidebar template block navigation
    $(".dropdown-secondary-new-blocks > li:first-of-type > .caret").on("touchstart", function(e) {
      e.preventDefault();

      $(this).parents('.dropdown-secondary-new-blocks').toggleClass("open");
      $(this).parents('.dropdown-secondary-new-blocks').find('ul').toggleClass("show");
      $(this).parents('.dropdown-secondary-new-blocks a:first').attr('aria-expanded', function (i, attr) {
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


  // Runs all behaviour for spacebar, tab, and shift-tab

  //Main menu
  $(".header-dropdown-menu > a").on("keydown", function (e) {
    if (e.keyCode === keys.space) {
      e.preventDefault();
      $(this).click();
    }
  });

  $('.menu-item-has-children > a, .page_item_has_children > a').on("keydown", function (e) {
    if (e.keyCode === keys.space) {
      e.preventDefault();
      $(this).find('.caret').click();
    }
  });

  $('#header_top_content li a').on("keydown", function (e) {
    if (e.keyCode === keys.tab && !e.shiftKey) {
      if ($('#header_top_content li:visible:last a:visible:last')[0] == $(this)[0]) {
        closeOpenMenus();
      }
    }
  });

  //Block menu
  $('.dropdown-secondary-new-blocks > li:first-of-type > a').on("keydown", function (e) {
    if (e.keyCode === keys.space) {
      e.preventDefault();
      $(this).parent('li').find('.caret').click();
    }
  });

  $('.dropdown-secondary-new-blocks a:not(:first)').on("keydown", function (e) {
    if (e.keyCode === keys.tab) {
      if ($('.dropdown-secondary-new-blocks a:visible:last')[0] == $(this)[0]) {
        closeOpenMenus();
      }
    }
  });

  //Submenu
  $('#header_btm_content.container a, #header_btm_content.container li').on("focus mouseover", function (e) {
    if ($(this).parent('li').hasClass('page_item_has_children') || $(this).parent('li').hasClass('menu-item-has-children'))
      $(this).parent('.page_item_has_children,.menu-item-has-children').find('ul').show();
  });

  $('#header_btm_content.container a').on("keydown", function (e) {
    if (e.keyCode === keys.tab && !e.shiftKey) {
      if ($(this).parent('li.menu-item, li.page_item').parent('ul.sub-menu, ul.children').find('a:last')[0] == $(this)[0]) {
        $(this).parent('li.menu-item, li.page_item').parent('ul.sub-menu, ul.children').hide();
      }
    }
  });

  $('#header_btm_content.container ul:not(".children") > li > a').on("keydown", function(e){
    if (e.keyCode === keys.tab && e.shiftKey) {
      $(this).siblings('ul.children, ul.sub-menu').hide(); 
    }
  });

  $('html').on("click", function (e) {
    closeOpenMenus();
  });

});

function openMainNavMenu(){
  $(".menu-toggle").addClass('open');
  $(".menu-toggle").attr('aria-expanded', function (i, attr) {
    return attr == 'true' ? 'false' : 'true'
  });
  $("#header_dropdown_container").addClass('show');
  $(".header-dropdown-menu > a").addClass('expanded');
  $(".header-dropdown-menu > a").parent('.header-dropdown-menu').find('> ul').addClass("show");
  $(".header-dropdown-menu > a").attr('aria-expanded', function (i, attr) {
        return attr == 'true' ? 'false' : 'true'
  }); 
}

function closeOpenMenus(){
  $("#header_dropdown_container").removeClass('show');
  $(".menu-toggle").removeClass('open');
  $(".dropdown-secondary-new-blocks").removeClass("open");
  $(".dropdown-secondary-new-blocks").find('ul').removeClass("show");
  $('#header_btm_content.container ul.children, #header_btm_content.container ul.sub-menu').hide();
}