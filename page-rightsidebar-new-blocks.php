<?php
/**
 * Template Name: Right Sidebar New Block
 * Template Post Type: post, page, article
 * A custom page template for pages with the sidebar on the right.
 */

get_header();
?>

  <main id="main_area" role="main">
    <div id="main_content" class="container">
      <div class="row">
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

        <aside class="col-lg-3 col-md-4" role="complementary">
          <?php get_sidebar('new-blocks'); ?>
        </aside>
      </div>
<?php get_footer(); ?>
