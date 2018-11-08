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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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

<body <?php body_class(); ?>><a href="#main_content" id="skip2main">skip to Main Content</a>
<header class="other">
   <div id="header_top">
      <div id="header_top_content">
         <a href="https://manoa.hawaii.edu/" title="UH Manoa website home" ><img id="header_mid_logo" src="<?php echo get_template_directory_uri(); ?>/images/uhm-nameplate-white.png" srcset="<?php echo get_template_directory_uri(); ?>/images/uhm-nameplate-white.png 1x, <?php echo get_template_directory_uri(); ?>/images/uhm-nameplate-white-2x.png 2x" alt="University of Hawai&#699;i at M&#257;noa" /></a>

         <?php if ( has_nav_menu( 'top-header' ) ) :

            wp_nav_menu(
                array(
                    'theme_location' => 'top-header',
                    'menu_id' => 'header_mainmenu',
                    'container' => 'false'
                )
            );

        endif; ?>
   </div>
   <div id="header_btm">
      <div id="header_btm_content">
      <h1 class="header_sitetitle"><?php bloginfo( 'name' ); ?></h1>
       <?php if ( has_nav_menu( 'primary' ) ) :

           wp_nav_menu(
               array(
                   'theme_location' => 'primary',
                   'menu_id' => 'header_sitemenu',
                   'container' => 'false',
                   'depth' => 1
               )
           );

       else : ?>

        <?php $menu = array(
           'depth'        => 1,
           'show_date'    => '',
           'exclude'      => '',
           'title_li'     => __( '' ),
           'echo'         => 1,
           'authors'      => '',
           'sort_column'  => 'menu_order, post_title',
           'link_before'  => '',
           'link_after'   => '',
           'walker'       => '',
        );

        wp_page_menu( $menu ); ?>

        <?php endif; ?>
    </div>
  </div>
  <div id="department_name">
    <div class="container">
      <h1 id="header_sitename"><?php the_title(); ?></h1>
      <?php manoa2018_get_breadcrumbs(); ?>
    </div>
  </div>
</header>

