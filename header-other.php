<?php
/**
 * Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">.
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
if ( $site_description && ( is_home() || is_front_page() ) ) {
	echo " | $site_description";
}

	// Add a page number if necessary:
if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
	echo esc_html( ' | ' . sprintf( __( 'Page %s', 'manoa2018' ), max( $paged, $page ) ) );
}

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/regular.css" integrity="sha384-ZlNfXjxAqKFWCwMwQFGhmMh3i89dWDnaFU2/VZg9CvsMGA7hXHQsPIqS+JIAmgEq" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/fontawesome.css" integrity="sha384-1rquJLNOM3ijoueaaeS5m+McXPJCGdr5HcA03/VHXxcp2kX2sUrQDmFc3jR5i/C7" crossorigin="anonymous">
<?php
	/*
	 * We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
if ( is_singular() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}

	/*
	 * Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>><a href="#main_content" id="skip2main">skip to Main Content</a>
<header class="other">
   <div id="header_top">
      <div id="header_top_content">
         <a href="https://manoa.hawaii.edu/" title="UH Manoa website home" ><img id="header_mid_logo" src="<?php echo get_template_directory_uri(); ?>/images/uhm-nameplate-white.png" srcset="<?php echo get_template_directory_uri(); ?>/images/uhm-nameplate-white.png 1x, <?php echo get_template_directory_uri(); ?>/images/uhm-nameplate-white-2x.png 2x" alt="University of Hawai&#699;i at M&#257;noa" /></a>
<div id="header_smrow"><a href="https://twitter.com/UHManoa"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-twitter.png" alt="twitter" class="header_smicon" /></a> &nbsp; <a href="https://www.facebook.com/uhmanoa"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-facebook.png" alt="facebook" class="header_smicon" /></a> &nbsp; <a href="https://instagram.com/uhmanoanews"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-instagram.png" alt="instagram" class="header_smicon" /></a> &nbsp; <a href="http://www.flickr.com/photos/uhmanoa"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-flickr.png" alt="flickr" class="header_smicon" /></a> &nbsp; <a href="http://www.youtube.com/user/UniversityofHawaii"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-youtube.png" alt="youtube" class="header_smicon" /></a></div>
</div>
   </div>
<?php if ( has_nav_menu( 'primary' ) ) : ?>
   <div id="header_btm">
      <div id="header_btm_content">
      	<h1 id="header_sitename"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<div id="header_sitedescription"><?php bloginfo( 'description' ); ?></div>
<?php wp_nav_menu( array('container' => false, 'menu_id' => 'header_sitemenu', 'theme_location'  => 'primary', 'fallback_cb' => false)); ?>
      </div>
   </div>
<?php endif; ?>
<div id="department_name">
	<div class="container">
		<h1 id="header_sitename"><?php the_title(); ?></h1>
	</div>
</div>
</header>

