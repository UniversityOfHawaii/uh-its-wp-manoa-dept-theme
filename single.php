<?php
/**
 * Template for displaying all single posts
 *
 */

get_header(); ?>
  <main id="main_area">
    <div id="main_content" class="container">
      <div id="content" role="main" class="row">

        <div class="col-lg-9 col-md-8">

          <?php manoa2018_get_breadcrumbs(); ?>

          <?php
          /*
           * Run the loop to output the post.
           * If you want to overload this in a child theme then include a file
           * called loop-single.php and that will be used instead.
           */
          get_template_part( 'loop', 'single' );
          ?>
        </div>
        <div class="col-lg-3 col-md-4">
          <?php get_sidebar(); ?>
        </div>
      </div><!-- #container -->
    </div>

<?php get_footer(); ?>
