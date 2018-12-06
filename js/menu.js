/**
 * This file contains general scripts for front end behavior.
 */
$(document).ready(function () {
  // display sub-menu on keystroke tab focus
  $("a[href^='#']").on("focus",function(e) {
    e.preventDefault();
    $(this).next(".sub-menu").show();
  });
  $(".sub-menu li:last-child a").on("focusout",function(e) {
    e.preventDefault();
    $(".sub-menu").hide();
  });
  $(".menu-toggle").on("click",function(e) {
    e.preventDefault();
    $(this).toggleClass("open");
    $("#header_btm_content > ul").toggle();
    $(this).attr('aria-expanded', function (i, attr) {
      return attr == 'true' ? 'false' : 'true'
    });
  });
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
      $("#header_btm_content > ul").toggle();
  });
  $(".menu-toggle.on").on("touchstart",function(e) {
    e.preventDefault();
      $("#header_btm_content > ul").toggle();
  });

    // display FAQ answer
  $(".category-faq .post-content > a").on("click",function(e) {
    e.preventDefault();
    $(this).next(".entry-content").toggleClass('open');
  });
  $(".category-faq .post-content > a").on("touchstart",function(e) {
    e.preventDefault();
    $(this).next(".entry-content").toggleClass('open');
  });
});