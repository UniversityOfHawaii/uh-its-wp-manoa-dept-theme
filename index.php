<?php
/**
 * Main template file
 */

get_header(); ?>

  <main id="main_area">
    <div id="main_content">
      <div class="container" id="content" role="main">
        <div class="row">
          <div class="col-lg-9 col-md-8">
            <?php manoa2018_get_breadcrumbs(); ?>

            <h1 class="page-title">
              <?php $our_title = get_the_title( get_option('page_for_posts', true) ); ?>
              <?php echo $our_title; ?>
            </h1>
            <?php
            /*
             * Run the loop to output the posts.
             * If you want to overload this in a child theme then include a file
             * called loop-index.php and that will be used instead.
             */
            get_template_part( 'loop', 'index' );
            ?>
          </div>
          <div class="col-lg-3 col-md-4">
            <?php get_sidebar(); ?>
          </div>
        </div>
      </div><!-- #container -->
<?php get_footer(); ?>
