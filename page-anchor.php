<?php
/**
 * Template Name: One column with anchor links
 * Template Post Type: post, page, article
 * A custom page template without sidebar.
 *
 */

get_header(); ?>

  <main id="main_area" class="one-column">
    <div id="main_content" class="container">

      <?php
      /*
       * Run the loop to output the page.
       * If you want to overload this in a child theme then include a file
       * called loop-page.php and that will be used instead.
       */
      get_template_part( 'loop', 'anchor' );
      ?>

<?php get_footer(); ?>
