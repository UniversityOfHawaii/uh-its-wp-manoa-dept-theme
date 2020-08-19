<?php
/**
 * Template for displaying Article Search Results page
 */

get_header();
?>

  <main id="main_area" class="full-width" role="main">
    <div id="main_content">
      <div class="container article_archive" id="content">   
      <div class="row">
          <div class="col-lg-12 col-md-12">
          <h1 class="entry-title"><?php printf( __( 'Search Results for: %s', 'manoa2018' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
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
</div>

<?php get_footer(); ?>
