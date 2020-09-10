<?php

global $post;

$post_meta_dropdown_value = get_post_meta($post->ID, '_uh_post_dropdown_field', true);
$featured_post = get_post($post_meta_dropdown_value);
$post_title = $featured_post->post_title;
$permalink = get_post_permalink($featured_post->ID);
$featured_img_url = get_the_post_thumbnail_url($featured_post->ID, 'medium');

?>

<div id="featured-post-card" class="card">
  <?php if (!empty($featured_img_url)) : ?>
    <a href="<?php echo $permalink ?>"><img class="card-img-top" src="<?php echo $featured_img_url ?>" alt="Featured image"><a>
      <?php endif; ?>
      <div class="card-body">
        <h5 class="card-title"><a href="<?php echo $permalink ?>"><?php echo $post_title ?></a></h5>
        <!--<p class="card-text"></p>-->

      </div>
</div>