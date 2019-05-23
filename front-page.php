<?php
/**
 * Template for displaying the home page
 */

get_header(); ?>

<?php  if ( 'page' == get_option('show_on_front') ) { ?>

  <main id="main_area" class="front-page" role="main">
    <?php if(has_post_thumbnail()): ?>
        <div class="featured-image">
            <?php the_post_thumbnail( 'full' ); ?>
            <?php $caption = get_post(get_post_thumbnail_id())->post_excerpt;
            if ( $caption) { // search for if the image has caption added on it ?>
                <div class="featured-caption">
                    <div class="container">
                        <?php echo $caption; // displays the image caption ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php endif; ?>
    <div id="main_content">

      <div class="container" id="content">

        <?php if ( have_posts() ) {
          while ( have_posts() ) :
            the_post();
          ?>

          <?php if ( is_active_sidebar( 'homepage-widget-area' ) && ( get_theme_mod('display_home_widget') == 1 ) ) : ?>

             <div class="row">
              <div class="col-lg-9 col-md-8">

          <?php endif; // end primary widget area ?>

          <?php the_content(); ?>

          <?php if ( is_active_sidebar( 'homepage-widget-area' ) && ( get_theme_mod('display_home_widget') == 1 ) ) : ?>
              </div>
              <aside class="col-lg-3 col-md-4" role="complementary">
                 <ul class="xoxo homepage-widgets-sidebar">
                 <?php dynamic_sidebar( 'homepage-widget-area' ); ?>
                 </ul>
              </aside>
            </div>

          <?php endif; // end primary widget area ?>

        <?php endwhile;
        }; // end of the loop. ?>

        <?php if ( is_active_sidebar( 'homepage-widget-area' ) && ( get_theme_mod('display_home_widget') == 0 ) ) : ?>

           <ul class="xoxo homepage-widgets">
           <?php dynamic_sidebar( 'homepage-widget-area' ); ?>
           </ul>

        <?php endif; // end primary widget area ?>

      </div><!-- #container -->

<?php } else { ?>

  <?php get_template_part('index'); ?>

<?php } ?>

<?php get_footer(); ?>
