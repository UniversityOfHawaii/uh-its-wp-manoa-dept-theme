<?php
/**
 * Template for displaying search form
 */
?>
  <form role="search" method="get" class="search-form" id="searchform-desktop" aria-hidden="false" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label for="basic-site-search-desktop" class="assistive-text screen-reader-text"><?php _e( 'Search this site', 'manoa2018' ); ?></label>
    <input type="search" class="search-field" name="s" id="basic-site-search-desktop" placeholder="<?php esc_attr_e( 'Site search', 'manoa2018' ); ?>" />
    <button type="submit" class="search-submit" name="submit" id="searchsubmit-desktop" aria-label="search" value="<?php esc_attr_e( 'Search', 'manoa2018' ); ?>"><span class="fa fa-search" aria-hidden="true"></span><span class="screen-reader-text">Site search</span></button>
  </form>
