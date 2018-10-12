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

				<h1></h1>

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
