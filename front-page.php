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

get_header(); ?>

	<main>
		<?php the_post_thumbnail( 'full' ); ?>
		<div id="main_content">
		
		<div id="container">
			<div id="content" role="main">

				<?php
				if ( have_posts() ) {
					while ( have_posts() ) :
						the_post();
					?>

					<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php the_content(); ?>

				<?php endwhile;
				}; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
