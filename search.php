<?php
/**
 * Template for displaying Search Results pages
 */

get_header();
?>

  <main id="main_area" class="full-width" role="main">
    <div id="main_content">
      <div class="container" id="content">

        <?php if ( have_posts() ) : ?>
          <h1 class="entry-title"><?php printf( __( 'Search Results for: %s', 'manoa2018' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
          <?php get_template_part( 'loop', 'search' ); ?>
        <?php else : ?>
          <div id="post-0" class="post no-results not-found">
            <h2 class="entry-title"><?php _e( 'Nothing Found', 'manoa2018' ); ?></h2>
            <div class="entry-content">
              <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'manoa2018' ); ?></p>
            </div><!-- .entry-content -->
          </div><!-- #post-0 -->
        <?php endif; ?>

      </div><!-- #content -->

<?php get_footer(); ?>
