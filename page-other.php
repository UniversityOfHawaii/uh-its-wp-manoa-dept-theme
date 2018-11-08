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

//if ( get_theme_mod( 'header-option' ) == 'header2') :
	get_header('other');
//else:
//	get_header();
//endif;
?>

	<main class="other">
		<div id="main_content">
			<div id="container">
				<div id="content" role="main">

				<?php
				/*
				 * Run the loop to output the page.
				 * If you want to overload this in a child theme then include a file
				 * called loop-page.php and that will be used instead.
				 */
				get_template_part( 'loop', 'other' );
				?>

				</div><!-- #content -->
			</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
