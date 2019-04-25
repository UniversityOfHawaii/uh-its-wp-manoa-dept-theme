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

  <main id="main_area">
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

        <div class="col-lg-3 col-md-4">
          <?php get_sidebar(); ?>
        </div>
      </div>
<?php get_footer(); ?>
