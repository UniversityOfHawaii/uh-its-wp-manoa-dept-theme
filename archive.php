<?php
/**
 * Template for displaying Archive pages
 */

get_header(); ?>

  <main id="main_area">
    <div id="main_content">
      <div class="container" id="content" role="main">

        <div class="row">
          <div class="col-lg-9 col-md-8">
            <?php
            if ( have_posts() ) {
              the_post();
            }
            ?>
            <?php manoa2018_get_breadcrumbs(); ?>

            <h1 class="page-title">
              <?php if ( is_home() ) : ?>
                <?php single_post_title(); ?>
              <?php elseif ( is_day() ) : ?>
                <?php printf( __( '%s', 'manoa2018' ), get_the_date() ); ?>
              <?php elseif ( is_month() ) : ?>
                <?php printf( __( '%s', 'manoa2018' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'manoa2018' ) ) ); ?>
              <?php elseif ( is_year() ) : ?>
                <?php printf( __( '%s', 'manoa2018' ), get_the_date( _x( 'Y', 'yearly archives date format', 'manoa2018' ) ) ); ?>
              <?php elseif ( is_author() ) : ?>
                <?php printf( __( '%s', 'manoa2018' ), '<span class="vcard">' . get_the_author() . '</span>' ); ?>
              <?php elseif ( is_tag() ) : ?>
                <?php
                  printf( __( '%s', 'manoa2018' ), '<span>' . single_tag_title( '', false ) . '</span>' );
                ?>
              <?php elseif ( is_category() ) : ?>
                <?php
                  printf( __( '%s', 'manoa2018' ), '<span>' . single_cat_title( '', false ) . '</span>' );
                ?>
              <?php else : ?>
                <?php _e( 'Post Archives', 'manoa2018' ); ?>
              <?php endif; ?>
            </h1>
            <?php if(category_description()) {
              echo category_description();
            } ?>

            <?php
              /*
               * Since we called the_post() above, we need to
               * rewind the loop back to the beginning that way
               * we can run the loop properly, in full.
               */
              rewind_posts();

              /*
               * Run the loop for the archives page to output the posts.
               * If you want to overload this in a child theme then include a file
               * called loop-archive.php and that will be used instead.
               */
              get_template_part( 'loop', 'archive' );
            ?>
          </div>
          <div class="col-lg-3 col-md-4">
            <?php get_sidebar(); ?>
          </div>

    </div><!-- #container -->


<?php get_footer(); ?>
