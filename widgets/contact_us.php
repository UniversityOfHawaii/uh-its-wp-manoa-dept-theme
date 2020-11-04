<?php

// Creating the widget 
class uh_contact_us_widget extends WP_Widget
{

  function __construct()
  {
    parent::__construct(
      // Base ID 
      'uh_contact_us_widget',
      // Widget name 
      __('Contact Us Information', 'manoa2018'),
      // Widget description
      array('description' => __('Displays contact information', 'manoa2018'),)
    );
  }

  // Front-end
  public function widget($args, $instance)
  {
    $title = apply_filters('widget_title', $instance['title']);
    $show_sm = $instance['social_media'];

    echo $args['before_widget'];
    if (!empty($title))
      echo $args['before_title'] . $title . $args['after_title'];

    $address = '<address> <div  class="contact-us-block-label">Address</div>';
    if (get_theme_mod('address')) {
      $address = $address . get_theme_mod('address');
    }
    if (get_theme_mod('office')) {
      $address = $address . '<br/>' . get_theme_mod('office');
    }
    if (get_theme_mod('city')) {
      $address = $address . '<br/>' . get_theme_mod('city');
    }
    $address = $address . '</address>';

    if (get_theme_mod('telephone') || get_theme_mod('fax') || get_theme_mod('email')) {
      $contact_info = '<div class="contact">';

      if (get_theme_mod('email')) {
        $contact_info = $contact_info . '<div class="email"><span class="contact-us-block-label">Email:</span> <a href="mailto:' . get_theme_mod('email') . '">' . get_theme_mod('email') . '</a></div>';
      }
      if (get_theme_mod('telephone')) {
        $contact_info = $contact_info . '<div class="telephone"><span class="contact-us-block-label">Telephone:</span> ' . get_theme_mod('telephone') . '</div>';
      }
      if (get_theme_mod('fax')) {
        $contact_info = $contact_info . '<div class="fax"><span class="contact-us-block-label">Fax:</span> ' . get_theme_mod('fax') . '</div>';
      }

      $contact_info = $contact_info . '</div>';

      $address =  $contact_info . $address;
    }

    if ($show_sm == 'on') {

      if (get_theme_mod('flickr') || get_theme_mod('instagram') || get_theme_mod('twitter') || get_theme_mod('facebook') || get_theme_mod('youtube')) {
        $social_media =  '<div class="sm-header"><span class="contact-us-block-label">Find Us On</span></br>';

        if (get_theme_mod('flickr')) {
          $social_media = $social_media . '<a class="flickr" href="//www.flickr.com/photos/' . get_theme_mod('flickr') . '"><i class="fa fa-flickr" aria-hidden="true"></i><span class="screen-reader-text">Flickr</span></a>';
        }
        if (get_theme_mod('instagram')) {
          $social_media = $social_media .  '<a class="instagram" href="//www.instagram.com/' . get_theme_mod('instagram') . '"><i class="fa fa-instagram" aria-hidden="true"></i><span class="screen-reader-text">Instagram</span></a>';
        }
        if (get_theme_mod('twitter')) {
          $social_media = $social_media . '<a class="twitter" href="//www.twitter.com/' . get_theme_mod('twitter') . '"><i class="fa fa-twitter-square" aria-hidden="true"></i><span class="screen-reader-text">Twitter</span></a>';
        }
        if (get_theme_mod('facebook')) {
          $social_media = $social_media . '<a class="facebook" href="//www.facebook.com/' . get_theme_mod('facebook') . '"><i class="fa fa-facebook-square" aria-hidden="true"></i><span class="screen-reader-text">Facebook</span></a>';
        }
        if (get_theme_mod('youtube')) {
          $social_media = $social_media . '<a class="youtube" href="//www.youtube.com/user/' . get_theme_mod('youtube') . '"><i class="fa fa-youtube-square" aria-hidden="true"></i><span class="screen-reader-text">YouTube</span></a>';
        }

        $social_media = $social_media . '</div>';
      }

      $address = $address . $social_media;
    }

    echo __($address, 'manoa2018');
    echo $args['after_widget'];
  }

  // Widget Backend 
  public function form($instance)
  {
    if (isset($instance['title'])) {
      $title = $instance['title'];
    } else {
      $title = __('New title', 'manoa2018');
    }

    // Widget admin form
?>
    <!-- Title -->
    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
    </p>

    <!-- Checkbox -->
    <p>
      <input class="checkbox" type="checkbox" <?php checked($instance['social_media'], 'on'); ?> id="<?php echo $this->get_field_id('social_media'); ?>" name="<?php echo $this->get_field_name('social_media'); ?>" />
      <label for="<?php echo $this->get_field_id('social_media'); ?>">Show social media</label>
    </p>

<?php
  }

  // Updating widget replacing old instances with new
  public function update($new_instance, $old_instance)
  {
    $instance = array();
    $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
    $instance['social_media'] = (!empty($new_instance['social_media'])) ? strip_tags($new_instance['social_media']) : '';
    return $instance;
  }
}

// Register and load the widget
function uh_contact_us_load_widget()
{
  register_widget('uh_contact_us_widget');
}
add_action('widgets_init', 'uh_contact_us_load_widget');

?>