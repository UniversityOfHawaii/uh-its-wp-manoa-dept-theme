<?php
/**
 * The loop that displays articles
 */
?> 
<div id="article_nav" class="row">
<div class="col-sm-12 col-md-6">
<h1 class="page-title">
  <?php if ( is_home() ) : ?>
    <?php single_post_title(); ?>
  <?php elseif ( is_day() ) : ?>
    <?php printf( __( '%s', 'manoa2018' ), get_the_date() ); ?>
  <?php elseif ( is_month() ) : ?>
    <?php printf( __( '%s', 'manoa2018' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'manoa2018' ) ) ); ?>
  <?php elseif ( is_year() ) : ?>
    <?php printf( __( '%s', 'manoa2018' ), get_the_date( _x( 'Y', 'yearly archives date format', 'manoa2018' ) ) ); ?>
  <?php elseif ( is_author() ) : ?>
    <?php printf( __( '%s', 'manoa2018' ), '<span class="vcard">' . get_the_author() . '</span>' ); ?>
  <?php elseif ( is_tag() ) : ?>
    <?php
      printf( __( '%s', 'manoa2018' ), '<span>' . single_tag_title( '', false ) . '</span>' );
    ?>
  <?php elseif ( is_category() ) : ?>
    <?php
      printf( __( '%s', 'manoa2018' ), '<span>' . single_cat_title( '', false ) . '</span>' );
    ?>
  <?php else : ?>
    <?php _e( 'News Articles', 'manoa2018' ); ?>
  <?php endif; ?>
</h1>   
</div>
<div class="col-sm-12 col-md-6">
  <div class="article_search">
  <?php get_template_part('searchform','article'); ?>
  </div>
</div>
</div>

<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
  <div id="post-0" class="post error404 not-found">
    <h1 class="entry-title"><?php _e( 'Not Found', 'manoa2018' ); ?></h1>
    <div class="entry-content">
      <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'manoa2018' ); ?></p>
      <?php get_search_form(); ?>
    </div><!-- .entry-content -->
  </div><!-- #post-0 -->
<?php endif; ?>

<?php
while ( have_posts() ) :
  the_post();
?>
  <div class="archive_entry">
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="row">
          <?php // featured image
          $hasThumbnail = has_post_thumbnail() && ! post_password_required() && ! is_attachment();

          if ($hasThumbnail) : ?>
            <div class="entry-thumbnail col-md-6 col-lg-4">
              <?php the_post_thumbnail('medium_large'); ?>
            </div>
          <?php endif; ?>
          <div class="post-content <?php if ($hasThumbnail) echo 'col-md-6 col-lg-8'; if(!$hasThumbnail) echo 'col-md-12 col-lg-12' ?>">
            <?php echo '<span class="article_date">' . get_the_date('F j, Y') . '</span>';?> 
            <h2 class="article-archive-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

            <?php if(is_home()): ?>
              <div class="entry-meta">
                <?php if(!in_category(array('events','faq','faqs'))): ?>
                  <?php manoa2018_posted_on(); ?>
                <?php endif; ?>
                <?php manoa2018_categories(); ?>
              </div><!-- .entry-meta -->
            <?php elseif(in_category(array('news','recent','announcements','announcement','new','blog'))): ?>
              <div class="entry-meta">
                <?php manoa2018_posted_on(); ?>
              </div>
            <?php else: ?>
            <?php endif; ?>

            <div class="entry-content">
              <?php the_excerpt(); ?>
              <?php
              wp_link_pages(
                array(
                  'before' => '<div class="page-link">' . __( 'Pages:', 'manoa2018' ),
                  'after'  => '</div>',
                )
              );
              ?>

              <div class="article_tags">

              <?php
                  $posttags = get_the_terms( $post->ID, 'article-tag' );
                  if ($posttags) {
                    foreach($posttags as $tag) {
                      if ( get_option('permalink_structure') ) {
                        echo '<a class="article_tag" href="' . get_term_link($tag, 'article-tag') . '?post_type=article">' . $tag->name . '</a>';
                      }else{
                        echo '<a class="article_tag" href="' . get_term_link($tag, 'article-tag') . '&post_type=article">' . $tag->name . '</a>';
                      }
                    }
                  }
                ?>
              </div>
            </div><!-- .entry-content -->
          </div>

        </div><!-- row -->
    </div><!-- #post-## -->
  </div><!--Archive Entry-->
<?php endwhile; // End the loop. ?>

<?php

/* Display navigation */

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$taxonomy = get_search_query();
$keyword = get_query_var( 'article-tag' );
$args = array(
     'post_type' => 'article',
     'posts_per_page' => get_option( 'posts_per_page' ),
     'paged' => $paged,
     's' => $taxonomy,
     'article-tag' => $keyword
);
$loop = new WP_Query( $args );
?>
<nav id="nav-below" class="pagination">
  <div class="pagination_numbers">
     <?php
     $big = 999999999;
     echo paginate_links( array(
          'base' => @add_query_arg('paged','%#%'),
          'format' => '?paged=%#%',
          'current' => max( 1, get_query_var('paged') ),
          'total' => $loop->max_num_pages,
          'prev_text' => 'PREV',
          'next_text' => 'NEXT'
     ) );
?>
</div>
</nav>
<?php wp_reset_postdata(); ?>