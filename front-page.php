<?php
/**
 * Template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 */

get_header();
?>

  <main>
    <?php if(has_post_thumbnail()): ?>
        <div class="featured-image">
            <?php the_post_thumbnail( 'full' ); ?>
            <div class="featured-caption">
              <?php if (get_post(get_post_thumbnail_id())->post_excerpt) { // search for if the image has caption added on it ?>
                <div class="container">
                <?php echo wp_kses_post(get_post(get_post_thumbnail_id())->post_excerpt); // displays the image caption ?>
                </div>
              <?php } ?>
            </div>
        </div>
    <?php endif; ?>
    <div id="main_content">

    <div id="container">
      <div id="content" role="main">

        <?php if ( have_posts() ) {
          while ( have_posts() ) :
            the_post();
          ?>

          <?php the_content(); ?>

        <?php endwhile;
        }; // end of the loop. ?>

      </div><!-- #content -->
    </div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
