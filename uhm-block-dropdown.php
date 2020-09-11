<?php

if (is_page() && $post->post_parent) {
  // Make sure we are on a page and that the page is a parent.
  $kiddies = wp_list_pages('sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0&link_before=');
} else {
  $kiddies = wp_list_pages('sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0&link_before=');
}
if ($kiddies) {
  echo '<ul class="secondary dropdown-secondary-new-blocks d-xl-none">';
  if ($post->post_parent) {
    echo '<li class="page_item parent-page-block-menu-title"><a href="' . get_post_permalink($post->post_parent) . '">' . get_the_title($post->post_parent) . '</a><span class="caret" aria-hidden="true"></span>';
  } else {
    echo '<li class="page_item parent-page-block-menu-title"><a href="' . get_post_permalink($post->ID) . '" aria-label="Open submenu">' . get_the_title($post->ID) . '</a><span class="caret" aria-hidden="true"></span>';
  }
  echo '<ul class="container">' . $kiddies . '</ul>';
  echo '</li></ul>';
}
