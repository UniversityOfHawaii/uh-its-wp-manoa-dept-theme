
<?php

/**
 * Template for displaying Article-specific search form
 */
?>
<form role="search" method="get" class="search-form" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
  <label>
    <span class="screen-reader-text"><?php _e('Search this site', 'manoa2018'); ?></span>
    <input type="search" class="search-field" name="s" id="basic-site-search" placeholder="<?php esc_attr_e('Search for an article', 'manoa2018'); ?>" />
    <input type="hidden" name="post_type" value="article" />
  </label>
  <button type="submit" class="search-submit" name="submit" id="searchsubmit" aria-label="search" value="<?php esc_attr_e('Search', 'manoa2018'); ?>">
    <span class="fa fa-search" aria-hidden="true"></span><span class="screen-reader-text">Search for an article</span>
  </button>
</form>