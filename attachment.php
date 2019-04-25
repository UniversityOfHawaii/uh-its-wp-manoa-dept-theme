<?php
/**
 * Template for displaying attachments
 *
 */

get_header(); ?>

	<div class="container single-attachment" id="content" role="main">

		<?php
		/*
		 * Run the loop to output the attachment.
		 * If you want to overload this in a child theme then include a file
		 * called loop-attachment.php and that will be used instead.
		 */
		get_template_part( 'loop', 'attachment' );
		?>

	</div><!-- #container -->

<?php get_footer(); ?>
