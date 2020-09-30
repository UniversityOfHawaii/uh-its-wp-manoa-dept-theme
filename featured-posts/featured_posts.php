<?php

function uh_add_meta_box()
{
  add_meta_box(
    'uh_post_options_metabox',
    'Featured Posts Menu',
    'uh_post_options_metabox_html',
    array('post', 'article', 'page'),
    'normal',
    'default'
    //,array('__back_compat_meta_box' => true)
  );
}

add_action('add_meta_boxes', 'uh_add_meta_box');


function uh_post_options_metabox_html($post)
{
  $args = array(
    'post_type' => array('post', 'article', 'page'),
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'fields' => 'ids,post_title'
  );
  $the_query = new WP_Query($args);

  $selectedPost = get_post_meta($post->ID, '_uh_post_dropdown_field', true);
  wp_nonce_field('uh_update_post_metabox', 'uh_update_post_nonce');

?>
  <p>If the current page template uses sidebars, you can select a post to feature on the page.</p>
  <p>
    <label for="uh_text_metafield"><?php esc_html_e('Published Posts', 'textdomain'); ?></label>
    <br />

    <select name='uh_text_metafield' id='uh_text_metafield'>
      <option value=""></option>
      <?php echo $selectedPost;
      while ($the_query->have_posts()) : $the_query->the_post() ?>
        <option value="<?php echo esc_attr(get_the_ID()); ?>" <?php selected(get_the_ID(), $selectedPost) ?>><?php echo esc_attr(the_title()); ?></option>
      <?php endwhile; ?>
    </select>
  </p>
<?php
}

function uh_save_post_metabox($post_id, $post)
{
  $edit_cap = get_post_type_object($post->post_type)->cap->edit_post;
  if (!current_user_can($edit_cap, $post_id)) {
    return;
  }
  if (!isset($_POST['uh_update_post_nonce']) || !wp_verify_nonce($_POST['uh_update_post_nonce'], 'uh_update_post_metabox')) {
    return;
  }
  if (array_key_exists('uh_text_metafield', $_POST)) {
    update_post_meta(
      $post_id,
      '_uh_post_dropdown_field',
      sanitize_text_field($_POST['uh_text_metafield'])
    );
  }
}

add_action('save_post', 'uh_save_post_metabox', 10, 2);
