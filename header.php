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
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/icon.png" />
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700" rel="stylesheet">
<script src="https://use.fontawesome.com/bfcbe1540c.js"></script>
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

<body <?php body_class(); ?>><a href="#main_content" id="skip2main">Skip to Main Content</a>
<header>
   <div id="header_top">
      <div id="header_top_content">
         <ul id="header_mainmenu">
            <li><a href="https://manoa.hawaii.edu/">UHM Home</a></li>
            <li><a href="https://manoa.hawaii.edu/a-z/">A-Z Index</a></li>
            <li><a href="https://manoa.hawaii.edu/directory/">Directory</a></li>
            <li><a href="https://manoa.hawaii.edu/students/">Students</a></li>
            <li><a href="https://manoa.hawaii.edu/faculty-staff/">Faculty and Staff</a></li>
            <li><a href="https://manoa.hawaii.edu/admissions/parents.html">Parents</a></li>
            <li><a href="https://uhalumni.org/manoa/">Alumni</a></li>
            <li><a href="https://myuh.hawaii.edu/">MyUH</a></li>
         </ul>
      </div>
   </div>
   <div id="header_mid">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" ><img id="header_mid_logo" src="<?php echo get_template_directory_uri(); ?>/images/uhm-nameplate.png" srcset="<?php echo get_template_directory_uri(); ?>/images/uhm-nameplate.png 1x, <?php echo get_template_directory_uri(); ?>/images/uhm-nameplate-2x.png 2x" alt="University of Hawai&#699;i at M&#257;noa" /></a>
   </div>
   <div id="header_btm">
      <div id="header_btm_content">
        <?php if ( has_nav_menu( 'primary' ) ) :

            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'menu_id' => 'header_sitemenu',
                    'container' => 'false'
                )
            );

        else : ?>

            <ul>
                <?php $menu = array(
                    'depth'        => 1,
                    'show_date'    => '',
                    'exclude'      => '',
                    'title_li'     => __( '' ),
                    'echo'         => 1,
                    'authors'      => '',
                    'sort_column'  => 'menu_order',
                    'link_before'  => '',
                    'link_after'   => '',
                    'walker'       => '',
                );

                wp_page_menu( $menu ); ?>
            </ul>

        <?php endif; ?>
      </div>
   </div>
<div id="department_name">
    <div class="container">
        <h1 id="header_sitename"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <div id="header_sitedescription"><?php bloginfo( 'description' ); ?></div>
        <?php manoa2018_get_breadcrumbs(); ?>
    </div>
</div>
</header>

