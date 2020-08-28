<a href="#main_area" id="skip2main">Skip to Main Content</a>
<div id="header_top">
  <div id="header_top_content" class="container">
    <nav id="header_btm" role="navigation" aria-label="main navigation">
      <a class="menu-toggle" aria-expanded="false"><span class="screen-reader-text">Open Mobile Menu</span></a>
    </nav>
    <div id="header_dropdown_container">
      <ul>
        <li class="header-dropdown-menu">
          <a href="#" class="link-container"><span class="parent-dropdown">UH Manoa</span><span class="caret"></span></a>
          <ul id="header_mainmenu_dropdown">
            <li id="header_dropdown_search">
              <div class="dropdown_search_container"><?php get_search_form(); ?></div>
            </li>
            <?php if (has_nav_menu('main')) : ?>
              <?php wp_nav_menu(
                array(
                  'theme_location'  => 'main',
                  'menu_id'         => 'menu-main-menu',
                  'container'       => false,
                  'container_id'    => '',
                  'depth'           => 1,
                )
              ); ?>
            <?php else : ?>
              <li><a class="link-container" href="https://manoa.hawaii.edu/"><span>UHM Home</span></a></li>
              <li><a class="link-container" href="https://manoa.hawaii.edu/a-z/"><span>A-Z Index</span></a></li>
              <li><a class="link-container" href="https://manoa.hawaii.edu/directory/"><span>Directory</span></a></li>
              <li><a class="link-container" href="https://manoa.hawaii.edu/students/"><span>Students</span></a></li>
              <li><a class="link-container" href="https://manoa.hawaii.edu/faculty-staff/"><span>Faculty and Staff</span></a></li>
              <li><a class="link-container" href="https://manoa.hawaii.edu/admissions/parents.html"><span>Parents</span></a></li>
              <li><a class="link-container" href="https://uhalumni.org/manoa/"><span>Alumni</span></a></li>
              <li><a class="link-container" href="https://myuh.hawaii.edu/"><span>MyUH</span></a></li>
            <?php endif; ?>
          </ul>
        </li>

        <li class="header-dropdown-menu">
          <a href="#" rel="home" class="link-container"><span class="parent-dropdown"><?php bloginfo('name'); ?></span><span class="caret"></span></a>
          <ul id="header_submenu_dropdown">

            <?php if (has_nav_menu('primary')) : ?>
              <?php wp_nav_menu(
                array(
                  'theme_location'  => 'primary',
                  'menu_id'         => 'header_btm_content_dropdown',
                  'container'       => false,
                  'container_id'    => false,
                  'depth'           => 3,
                  'link_after' => '<span class="caret"></span>'
                )
              ); ?>
            <?php else : ?>

              <?php
              $menu = array(
                'depth'        => 3,
                'sort_column'  => 'menu_order, post_title',
                'menu_class'   => 'menu page-menu',
                'menu_id'      => 'header_btm_content_dropdown',
                'echo'         => 1,
                'authors'      => '',
                'sort_column'  => 'menu_order',
                'link_before'  => '',
                'link_after' => '<span class="caret"></span>'
              );
              wp_page_menu($menu); ?>

            <?php endif; ?>
          </ul>
        </li>
      </ul>


    </div>
    <div id="header_midrow">
      <?php get_search_form(); ?>
    </div>
    <div id="header_smrow">
      <a href="https://twitter.com/UHManoa">
        <img src="<?php echo get_template_directory_uri(); ?>/images/icon-twitter.png" alt="twitter" class="header_smicon" />
      </a> &nbsp;
      <a href="https://www.facebook.com/uhmanoa">
        <img src="<?php echo get_template_directory_uri(); ?>/images/icon-facebook.png" alt="facebook" class="header_smicon" />
      </a> &nbsp;
      <a href="https://instagram.com/uhmanoanews">
        <img src="<?php echo get_template_directory_uri(); ?>/images/icon-instagram.png" alt="instagram" class="header_smicon" />
      </a> &nbsp;
      <a href="http://www.flickr.com/photos/uhmanoa">
        <img src="<?php echo get_template_directory_uri(); ?>/images/icon-flickr.png" alt="flickr" class="header_smicon" />
      </a> &nbsp;
      <a href="http://www.youtube.com/user/UniversityofHawaii">
        <img src="<?php echo get_template_directory_uri(); ?>/images/icon-youtube.png" alt="youtube" class="header_smicon" /></a>
    </div>
  </div>
</div>