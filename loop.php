<?php
/**
 * The loop that displays posts
 */
?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
  <div id="nav-above" class="navigation">
    <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'manoa2018' ) ); ?></div>
    <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'manoa2018' ) ); ?></div>
  </div><!-- #nav-above -->
<?php endif; ?>

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

  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php // featured image
    if ( has_post_thumbnail() && ! post_password_required() && ! is_attachment() ) : ?>
      <div class="entry-thumbnail">
        <?php the_post_thumbnail('thumbnail'); ?>
      </div>
    <?php endif; ?>
    <div class="post-content">
      <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

      <?php if(is_singular()): ?>
        <div class="entry-meta">
          <?php manoa2018_posted_on(); ?>
          <?php manoa2018_categories(); ?>
        </div><!-- .entry-meta -->
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
      </div><!-- .entry-content -->
    </div>

  </div><!-- #post-## -->

  <?php //comments_template( '', true ); ?>

<?php endwhile; // End the loop. Whew. ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
  <div id="nav-below" class="navigation">
    <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'manoa2018' ) ); ?></div>
    <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'manoa2018' ) ); ?></div>
  </div><!-- #nav-below -->
<?php endif; ?>
