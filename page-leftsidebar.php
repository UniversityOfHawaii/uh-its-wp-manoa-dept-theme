<?php
/**
 * Template Name: Left Sidebar
 * Template Post Type: post, page, article
 * A custom page template for pages with the sidebar on the left.
 *
 */

get_header(); ?>

  <main id="main_area" class="left-sidebar" role="main">
    <div id="main_content" class="container">
      <div class="row">
        <aside class="col-lg-3 col-md-4" role="complementary">
          <?php get_sidebar(); ?>
        </aside>
        <div class="col-lg-9 col-md-8">

          <?php
          /*
           * Run the loop to output the page.
           * If you want to overload this in a child theme then include a file
           * called loop-page.php and that will be used instead.
           */
          get_template_part( 'loop', 'page' );
          ?>
      </div>
    </div>
<?php get_footer(); ?>
