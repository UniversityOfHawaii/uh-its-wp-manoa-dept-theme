<?php
/**
 * Sidebar template containing the primary and secondary widget areas
 *
 */
?>

		<div id="primary" class="widget-area" role="complementary">
			<?php global $post; // Setup the global variable $post
if ( is_page() && $post->post_parent ) {
	// Make sure we are on a page and that the page is a parent.
	$kiddies = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0' );	
} else {
	$kiddies = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );
}
if ( $kiddies ) {
	echo '<ul class="secondary">';
		echo $kiddies;
	echo '</ul>';
} ?>
			<ul class="xoxo">

<?php
	/*
	 * When we call the dynamic_sidebar() function, it'll spit out
	 * the widgets for that widget area. If it instead returns false,
	 * then the sidebar simply doesn't exist, so we'll hard-code in
	 * some default sidebar stuff just in case.
	 */
if ( ! dynamic_sidebar( 'primary-widget-area' ) ) :
	?>

			<li id="search" class="widget-container widget_search">
				<?php get_search_form(); ?>
			</li>

			<li id="archives" class="widget-container">
				<h3 class="widget-title"><?php _e( 'Archives', 'manoa2018' ); ?></h3>
				<ul>
					<?php wp_get_archives( 'type=monthly' ); ?>
				</ul>
			</li>

			<li id="meta" class="widget-container">
				<h3 class="widget-title"><?php _e( 'Meta', 'manoa2018' ); ?></h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</li>

		<?php endif; // end primary widget area ?>
			</ul>
		</div><!-- #primary .widget-area -->
