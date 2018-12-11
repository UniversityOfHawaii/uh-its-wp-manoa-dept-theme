<?php
/**
 * Template for displaying 404 pages (Not Found)
 *
 */

get_header();
?>

	<main id="main_area">
		<div id="main_content">
			<div id="container">
				<div id="content" role="main">

					<div id="post-0" class="post error404 not-found">
						<h1 class="entry-title"><?php _e( 'Sorry, this page could not be found.', 'manoa2018' ); ?></h1>
						<div class="entry-content">
							<p><?php _e( 'The page you are looking for does not exist, no longer exists or has been moved.', 'manoa2018' ); ?></p>
						</div>
					</div><!-- #post-0 -->

				</div><!-- #content -->
			</div><!-- #container -->
			<script type="text/javascript">
				// focus on search field after it has loaded
				document.getElementById('s') && document.getElementById('s').focus();
			</script>

<?php get_footer(); ?>
