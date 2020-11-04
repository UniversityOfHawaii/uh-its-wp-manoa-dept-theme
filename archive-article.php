<?php
/**
 * Template for displaying Articles Archive page
 */

get_header(); ?>

<main id="main_area" role="main">
    <div id="main_content">
      <div class="container article_archive" id="content" role="main">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <?php
            if ( have_posts() ) {
              the_post();
            }
            ?>
            
            <?php
              rewind_posts();
              get_template_part( 'loop', 'article' );
            ?>
          </div>
        </div>
    </div><!-- #container -->
<?php get_footer(); ?>
