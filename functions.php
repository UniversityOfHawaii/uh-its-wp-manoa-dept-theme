<?php
/**
 * Manoa 2018 functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, manoa2018_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme (see https://codex.wordpress.org/Theme_Development and
 * https://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We are providing our own filter for excerpt_length (or using the unfiltered value)
 *     remove_filter( 'excerpt_length', 'manoa2018_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see https://codex.wordpress.org/Plugin_API.
 *
 */

/*
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if ( ! isset( $content_width ) ) {
    $content_width = 640;
}

/* Tell WordPress to run manoa2018_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'manoa2018_setup' );

if ( ! function_exists( 'manoa2018_setup' ) ) :
    /**
     * Set up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which runs
     * before the init hook. The init hook is too late for some features, such as indicating
     * support post thumbnails.
     *
     * To override manoa2018_setup() in a child theme, add your own manoa2018_setup to your child theme's
     * functions.php file.
     *
     */
    function manoa2018_setup() {

        // This theme styles the visual editor with editor-style.css to match the theme style.
        add_editor_style();

        // This theme uses post thumbnails
        add_theme_support( 'post-thumbnails' );

        // Add default posts and comments RSS feed links to head
        add_theme_support( 'automatic-feed-links' );

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory
         */
        load_theme_textdomain( 'manoa2018', get_template_directory() . '/languages' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'primary' => __( 'Primary Navigation', 'manoa2018' ),
            )
        );
    }
endif;

if ( ! function_exists( 'manoa2018_admin_header_style' ) ) :
    /**
     * Style the header image displayed on the Appearance > Header admin panel.
     *
     * Referenced via add_custom_image_header() in manoa2018_setup().
     *
     */
    function manoa2018_admin_header_style() {
    ?>
    <style type="text/css" id="manoa2018-admin-header-css">
    /* Shows the same border as on front end */
    #headimg {
    border-bottom: 1px solid #000;
    border-top: 4px solid #000;
    }
    /* If header-text was supported, you would style the text with these selectors:
    #headimg #name { }
    #headimg #desc { }
    */
    </style>
    <?php
    }
endif;

/**
 * Set the post excerpt length to 40 characters.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 *
 *
 */
function manoa2018_excerpt_length( $length ) {
    return 18;
}
add_filter( 'excerpt_length', 'manoa2018_excerpt_length' );

if ( ! function_exists( 'manoa2018_continue_reading_link' ) ) :
    /**
     * Return a "Continue Reading" link for excerpts.
     *
     *
     */
    function manoa2018_continue_reading_link() {
        return ' ';
    }
endif;

/**
 * Replace "[...]" with an ellipsis and manoa2018_continue_reading_link().
 *
 * "[...]" is appended to automatically generated excerpts.
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 *
 */
function manoa2018_auto_excerpt_more( $more ) {
    if ( ! is_admin() ) {
        return ' &hellip;' . manoa2018_continue_reading_link();
    }
    return $more;
}
add_filter( 'excerpt_more', 'manoa2018_auto_excerpt_more' );

/**
 * Add a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *
 *
 */
function manoa2018_custom_excerpt_more( $output ) {
    if ( has_excerpt() && ! is_attachment() && ! is_admin() ) {
        $output .= manoa2018_continue_reading_link();
    }
    return $output;
}
add_filter( 'get_the_excerpt', 'manoa2018_custom_excerpt_more' );

if ( ! function_exists( 'manoa2018_comment' ) ) :
    /**
     * Template for comments and pingbacks.
     *
     * To override this walker in a child theme without modifying the comments template
     * simply create your own manoa2018_comment(), and that function will be used instead.
     *
     * Used as a callback by wp_list_comments() for displaying the comments.
     *
     *
     */
    function manoa2018_comment( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment;
        switch ( $comment->comment_type ) :
            case '':
        ?>
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <div id="comment-<?php comment_ID(); ?>">
            <div class="comment-author vcard">
                <?php echo get_avatar( $comment, 40 ); ?>
                <?php printf( __( '%s <span class="says">says:</span>', 'manoa2018' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
            </div><!-- .comment-author .vcard -->
            <?php if ( $comment->comment_approved == '0' ) : ?>
                <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'manoa2018' ); ?></em>
                <br />
            <?php endif; ?>

            <div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                <?php
                    /* translators: 1: date, 2: time */
                    printf( __( '%1$s at %2$s', 'manoa2018' ), get_comment_date(), get_comment_time() );
                    ?>
                    </a>
                    <?php
                    edit_comment_link( __( '(Edit)', 'manoa2018' ), ' ' );
                ?>
                </div><!-- .comment-meta .commentmetadata -->

                <div class="comment-body"><?php comment_text(); ?></div>

                <div class="reply">
                <?php
                comment_reply_link(
                    array_merge(
                        $args, array(
                            'depth'     => $depth,
                            'max_depth' => $args['max_depth'],
                        )
                    )
                );
?>
                </div><!-- .reply -->
            </div><!-- #comment-##  -->

        <?php
                break;
            case 'pingback':
            case 'trackback':
        ?>
        <li class="post pingback">
        <p><?php _e( 'Pingback:', 'manoa2018' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'manoa2018' ), ' ' ); ?></p>
    <?php
                break;
        endswitch;
    }
endif;

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override manoa2018_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 *
 */
function manoa2018_widgets_init() {
    // Area 1, located at the top of the sidebar.
    register_sidebar(
        array(
            'name'          => __( 'Primary Widget Area', 'manoa2018' ),
            'id'            => 'primary-widget-area',
            'description'   => __( 'Add widgets here to appear in your sidebar.', 'manoa2018' ),
            'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
            'after_widget'  => '</li>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

    // Area 3, located in the footer. Empty by default.
    register_sidebar(
        array(
            'name'          => __( 'Footer Widget Area', 'manoa2018' ),
            'id'            => 'footer-widget-area',
            'description'   => __( 'An optional widget area for your site footer.', 'manoa2018' ),
            'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
            'after_widget'  => '</li>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

}
/** Register sidebars by running manoa2018_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'manoa2018_widgets_init' );

/**
 * Remove the default styles that are packaged with the Recent Comments widget.
 *
 * To override this in a child theme, remove the filter and optionally add your own
 * function tied to the widgets_init action hook.
 *
 * This function uses a filter (show_recent_comments_widget_style) new in WordPress 3.1
 * to remove the default style. Using Manoa 2018 1.2 in WordPress 3.0 will show the styles,
 * but they won't have any effect on the widget in default Manoa 2018 styling.
 *
 */
function manoa2018_remove_recent_comments_style() {
    add_filter( 'show_recent_comments_widget_style', '__return_false' );
}
add_action( 'widgets_init', 'manoa2018_remove_recent_comments_style' );

if ( ! function_exists( 'manoa2018_posted_on' ) ) :
    /**
     * Print HTML with meta information for the current post-date/time and author.
     *
     */
    function manoa2018_posted_on() {
        printf(
            __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'manoa2018' ),
            'meta-prep meta-prep-author',
            sprintf(
                '<span class="entry-date">%3$s</span>',
                get_permalink(),
                esc_attr( get_the_time() ),
                get_the_date()
            ),
            sprintf(
                '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
                get_author_posts_url( get_the_author_meta( 'ID' ) ),
                esc_attr( sprintf( __( 'View all posts by %s', 'manoa2018' ), get_the_author() ) ),
                get_the_author()
            )
        );
    }
endif;

if ( ! function_exists( 'manoa2018_posted_in' ) ) :
    /**
     * Print HTML with meta information for the current post (category, tags and permalink).
     *
     */
    function manoa2018_posted_in() {
        // Retrieves tag list of current post, separated by commas.
        $tag_list = get_the_tag_list( '', ', ' );
        if ( $tag_list && ! is_wp_error( $tag_list ) ) {
            $posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'manoa2018' );
        } elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
            $posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'manoa2018' );
        } else {
            $posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'manoa2018' );
        }
        // Prints the string, replacing the placeholders.
        printf(
            $posted_in,
            get_the_category_list( ', ' ),
            $tag_list,
            get_permalink(),
            the_title_attribute( 'echo=0' )
        );
    }
endif;

/**
 * Retrieve the IDs for images in a gallery.
 *
 */
function manoa2018_get_gallery_images() {
    $images = array();

    if ( function_exists( 'get_post_galleries' ) ) {
        $galleries = get_post_galleries( get_the_ID(), false );
        if ( isset( $galleries[0]['ids'] ) ) {
            $images = explode( ',', $galleries[0]['ids'] );
        }
    } else {
        $pattern = get_shortcode_regex();
        preg_match( "/$pattern/s", get_the_content(), $match );
        $atts = shortcode_parse_atts( $match[3] );
        if ( isset( $atts['ids'] ) ) {
            $images = explode( ',', $atts['ids'] );
        }
    }

    if ( ! $images ) {
        $images = get_posts(
            array(
                'fields'         => 'ids',
                'numberposts'    => 999,
                'order'          => 'ASC',
                'orderby'        => 'menu_order',
                'post_mime_type' => 'image',
                'post_parent'    => get_the_ID(),
                'post_type'      => 'attachment',
            )
        );
    }

    return $images;
}

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 *
 */
function manoa2018_widget_tag_cloud_args( $args ) {
    $args['largest']  = 22;
    $args['smallest'] = 8;
    $args['unit']     = 'pt';
    $args['format']   = 'list';

    return $args;
}
add_filter( 'widget_tag_cloud_args', 'manoa2018_widget_tag_cloud_args' );


/**
 *
 * Add default pages to theme
 *
 */
add_action('wpmu_new_blog', 'wpb_create_my_pages', 10, 2);

// On theme activation, create some default content if it doesn't exist
function course_theme_activate_create_default_content($old_name, $old_theme = false) {
    // List of default pages to create
    $default_pages = array(
        array(
            'name' => "Home",
            'content' => "<p>This is your home page. Insert a featured image and drop in some content.</p>",
        ),
        array(
            'name' => "About",
            'content' => "<p>Insert content about your department here. <a href='http://hawaii.edu/access/' title='accessibility at UH'>Accessibility notes</a></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>",
        ),
        array(
            'name' => "Contact",
            'content' => "<p>You can insert your contact information here.</p>
                <p>Visit us at:</p>
                <address>
                Office Name<br />
                Address Line 1<br />
                Address Line 2
                </address><br />
                Email <a href='mailto:example@hawaii.edu'>example@hawaii.edu</a>",
        ),
        array(
            'name' => "News",
            'content' => "<p>This can be your blog or news page. You can set this as your posts page in WP Dashboard > Settings > Reading. You can also rename the page.</p>",
        ),
    );

    // Create default pages if they don't already exist
    $all_pages = get_pages(array(
        'post_type' => 'page',
        'post_status' => 'publish,private',
    ));
    foreach($default_pages as $new_page) {
        $page_exists = false;
        foreach ($all_pages as $page) {
            if ($page->post_title == $new_page['name']) {
                $page_exists = true;
                break;
            }
        }
        if (!$page_exists) {
            wp_insert_post(array(
                'post_title' => $new_page['name'],
                'post_name' => sanitize_title($new_page['name']),
                'post_status' => 'publish',
                'post_type' => 'page',
                'post_content' => $new_page['content'],
            ));
        }
    }
}
add_action("after_switch_theme", "course_theme_activate_create_default_content", 10, 2);


/**
 * Prints breadcrumbs.
 */
if ( ! function_exists( 'manoa2018_get_breadcrumbs') ) :
function manoa2018_get_breadcrumbs() {
       
    // Settings
    $separator          = '<span class="fa fa-angle-right" aria-hidden="true" title="breadcrumb-separator"></span>';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumbs';
    $home_title         = 'Home';
       
    // Get the query & post information
    global $post,$wp_query;
       
    // Do not display on the homepage
    if ( !is_front_page() ) {
       
        // Build the breadcrums
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
           
        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        echo '<li class="separator separator-home"> ' . $separator . ' </li>';
           
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
              
            echo '<li class="item-current item-archive"><span class="bread-current bread-archive">' . post_type_archive_title() . '</span></li>';
              
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><span class="bread-current bread-archive">' . $custom_tax_name . '</span></li>';
              
        } else if ( is_single() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            // Get post category info
            $category = get_the_category();
             
            if(!empty($category)) {
              
                // Get last category post is in
                $last_category = end(array_values($category));
                  
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                  
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                    $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }
             
            }
              
            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                   
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
               
            }
              
            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</span></li>';
                  
            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                  
                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</span></li>';
              
            } else {
                  
                echo '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</span></li>';
                  
            }
              
        } else if ( is_category() ) {
               
            // Category page
            echo '<li class="item-current item-cat"><span class="bread-current bread-cat">' . single_cat_title('', false) . '</span></li>';
               
        } else if ( is_page() ) {
               
            // Standard page
            if( $post->post_parent ){
                   
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                   
                // Get parents in the right order
                $anc = array_reverse($anc);
                   
                // Parent page loop
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }
                   
                // Display parent pages
                echo $parents;
                   
                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><span title="' . get_the_title() . '"> ' . get_the_title() . '</span></li>';
                   
            } else {
                   
                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</span></li>';
                   
            }
               
        } else if ( is_tag() ) {
               
            // Tag page
               
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
               
            // Display the tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><span class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</span></li>';
           
        } elseif ( is_day() ) {
               
            // Day archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
               
            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><span class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</span></li>';
               
        } else if ( is_month() ) {
               
            // Month Archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><span class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</span></li>';
               
        } else if ( is_year() ) {
               
            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><span class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</span></li>';
               
        } else if ( is_author() ) {
               
            // Auhor archive
               
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
               
            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><span class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</span></li>';
           
        } else if ( get_query_var('paged') ) {
               
            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><span class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</span></li>';
               
        } else if ( is_search() ) {
           
            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><span class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</span></li>';
           
        } elseif ( is_404() ) {
               
            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }
       
        echo '</ul>';
           
    }
}
endif;