<?php
/**
 * Main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 */

if ( get_theme_mod( 'header-option' ) == 'header2') :
	get_header('other'); 
else:
	get_header();
endif;
?>
	
	<main>
		<div id="main_content">
			<div id="container">
				<div id="content" role="main">
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
				</div><!-- #content -->
			</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
