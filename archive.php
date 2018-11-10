<?php
/**
 * Template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 */

get_header();
?>

	<main>
		<div id="main_content">
			<div id="container">
				<div id="content" role="main">

					<?php
						/*
						 * Queue the first post, that way we know
						 * what date we're dealing with (if that is the case).
						 *
						 * We reset this later so we can run the loop
						 * properly with a call to rewind_posts().
						 */
					if ( have_posts() ) {
						the_post();
					}
					?>

					<h1 class="page-title">
						<?php if ( is_home() ) : ?>
							<?php single_post_title(); ?>
						<?php elseif ( is_day() ) : ?>
							<?php printf( __( 'Daily Archives: <span>%s</span>', 'manoa2018' ), get_the_date() ); ?>
						<?php elseif ( is_month() ) : ?>
							<?php printf( __( 'Monthly Archives: <span>%s</span>', 'manoa2018' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'manoa2018' ) ) ); ?>
						<?php elseif ( is_year() ) : ?>
							<?php printf( __( 'Yearly Archives: <span>%s</span>', 'manoa2018' ), get_the_date( _x( 'Y', 'yearly archives date format', 'manoa2018' ) ) ); ?>
						<?php elseif ( is_author() ) : ?>
							<?php printf( __( 'Author: %s', 'manoa2018' ), '<span class="vcard">' . get_the_author() . '</span>' ); ?>
						<?php elseif ( is_tag() ) : ?>
							<?php
								printf( __( 'Tag: %s', 'manoa2018' ), '<span>' . single_tag_title( '', false ) . '</span>' );
							?>
						<?php elseif ( is_category() ) : ?>
							<?php
								printf( __( 'Category: %s', 'manoa2018' ), '<span>' . single_cat_title( '', false ) . '</span>' );
							?>
						<?php else : ?>
							<?php _e( 'Post Archives', 'manoa2018' ); ?>
						<?php endif; ?>
					</h1>

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

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
