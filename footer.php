<?php
/**
 * Template for displaying the footer
 *
 * Contains the closing of the id=main div and all content
 * after. Calls sidebar-footer.php for bottom widgets.
 *
 */
?>

</div></main>
<footer role="contentinfo">
   <div id="footer_top">
      <div class="container pt-5 pb-5" id="footer_top_content">
         <div class="row">
            <div class="footer-top-left-column contact-info col-md-8">
               <h2><?php bloginfo( 'name' ); ?></h2>
               <address>
                  <?php if(get_theme_mod('address')) : ?>
                     <?php echo get_theme_mod('address');
                  endif; ?>
                  <?php if(get_theme_mod('office')) : ?>
                     <br /><?php echo get_theme_mod('office');
                  endif; ?>
                  <?php if(get_theme_mod('city')) : ?>
                     <br /><?php echo get_theme_mod('city');
                  endif; ?>
               </address>
               <?php if( get_theme_mod('telephone') || get_theme_mod('fax') || get_theme_mod('email')) : ?>
                  <div class="contact">
                     <strong>Contact Us</strong>
                     <?php if(get_theme_mod('telephone')) : ?>
                        <div class="telephone">Telephone: <?php echo get_theme_mod('telephone'); ?></div>
                     <?php endif; ?>
                     <?php if(get_theme_mod('fax')) : ?>
                        <div class="fax">Fax: <?php echo get_theme_mod('fax'); ?></div>
                     <?php endif; ?>
                     <?php if(get_theme_mod('email')) : ?>
                        <div class="fax">Email: <?php echo get_theme_mod('email'); ?></div>
                     <?php endif; ?>
                  </div>
               <?php endif; ?>
               <?php if( get_theme_mod('flickr') || get_theme_mod('instagram') || get_theme_mod('twitter') || get_theme_mod('facebook') || get_theme_mod('youtube')) : ?>
                  <div class="sm-header">Find Us On</div>
               <?php endif; ?>
               <?php if(get_theme_mod('flickr')) : ?>
                  <a class="flickr" href="//www.flickr.com/photos/<?php echo get_theme_mod('flickr'); ?>"><i class="fa fa-flickr" aria-hidden="true"></i><span class="screen-reader-text">Flickr</span></a>
               <?php endif; ?>
               <?php if(get_theme_mod('instagram')) : ?>
                  <a class="instagram" href="//www.instagram.com/<?php echo get_theme_mod('instagram'); ?>"><i class="fa fa-instagram" aria-hidden="true"></i><span class="screen-reader-text">Instagram</span></a>
               <?php endif; ?>
               <?php if(get_theme_mod('twitter')) : ?>
                  <a class="twitter" href="//www.twitter.com/<?php echo get_theme_mod('twitter'); ?>"><i class="fa fa-twitter-square" aria-hidden="true"></i><span class="screen-reader-text">Twitter</span></a>
               <?php endif; ?>
               <?php if(get_theme_mod('facebook')) : ?>
                  <a class="facebook" href="//www.facebook.com/<?php echo get_theme_mod('facebook'); ?>"><i class="fa fa-facebook-square" aria-hidden="true"></i><span class="screen-reader-text">Facebook</span></a>
               <?php endif; ?>
               <?php if(get_theme_mod('youtube')) : ?>
                  <a class="youtube" href="//www.youtube.com/user/<?php echo get_theme_mod('youtube'); ?>"><i class="fa fa-youtube-square" aria-hidden="true"></i><span class="screen-reader-text">YouTube</span></a>
               <?php endif; ?>
            </div>
            <div class="footer-top-middle-column col-md-4">
               <?php if ( is_active_sidebar( 'footer-widget-area' ) ) : ?>
                  <ul class="xoxo">
                  <?php dynamic_sidebar( 'footer-widget-area' ); ?>
                  </ul>
               <?php endif; ?>
            </div>
         </div>
      </div>
   </div>
   <div id="footer_mid" class="container pt-5 pb-5">
      <div id="footer_mid_content" class="row">
         <div class="uh_col col-md-3">
            <img src="<?php echo get_template_directory_uri(); ?>/images/footer-logo.png" srcset="<?php echo get_template_directory_uri(); ?>/images/footer-logo.png 1x, <?php echo get_template_directory_uri(); ?>/images/footer-logo-2x.png 2x" alt="uh manoa logo" />
         </div>
         <div class="uh_col col-md-3">
            <ul>
               <li><a href="https://manoa.hawaii.edu/a-z/">A-Z Index</a></li>
               <li><a href="https://manoa.hawaii.edu/records/calendar/">Academic Calendar</a></li>
               <li><a href="https://manoa.hawaii.edu/directory/">Campus Directory</a></li>
               <li><a href="https://manoa.hawaii.edu/campusmap/">Campus Maps</a></li>
               <li><a href="https://manoa.hawaii.edu/commuter/">Parking &#038; Transportation</a></li>
               <li><a href="https://manoa.hawaii.edu/about/visit/">Visiting the Campus</a></li>
            </ul>
         </div>
         <div class="uh_col col-md-3">
            <ul>
               <li><a href="https://manoa.hawaii.edu/emergency/">Emergency Information</a></li>
               <li><a href="https://www.manoa.hawaii.edu/dps/">Campus Safety</a></li>
               <li><a href="https://manoa.hawaii.edu/titleix/">Title IX</a></li>
               <li><a href="https://www.hawaii.edu/news/tag/uh-manoa/">UH News &#038; Media</a></li>
               <li><a href="https://manoa.hawaii.edu/news/">Press Releases</a></li>
               <li><a href="https://www.hawaii.edu/calendar/manoa/">Events</a></li>
               <li><a href="http://workatuh.hawaii.edu/">Work at UH</a></li>
            </ul>
         </div>
         <div class="uh_col col-md-3">
            <ul>
               <li><a href="http://manoa.hawaii.edu/crsc/landing/">campusHELP</a></li>
               <li><a href="http://gmail.hawaii.edu/">UH Email</a></li>
               <li><a href="https://myuh.hawaii.edu/">MyUH</a></li>
               <li><a href="https://www.uhfoundation.org/">Giving to UH</a></li>
               <li><a href="https://manoa.hawaii.edu/feedback/">Site Feedback</a></li>
               <li><a href="https://get.adobe.com/reader/">Get Adobe Acrobat Reader</a></li>
               <li><a href="https://www.hawaii.edu">UH System</a></li>
            </ul>
         </div>
      </div>
   </div>
   <div id="footer_btm">
      <div id="footer_btm_content" class="container">
         The University of Hawai&#699;i is an <a href="https://www.hawaii.edu/offices/eeo/policies/?policy=antidisc">equal opportunity/affirmative action institution</a> <br />
         &copy;<?php echo date("Y"); ?> University of Hawai&#699;i at M&#257;noa &bull; 2500 Campus Road &bull; Honolulu, HI 96822 &bull; (808) 956-8111
      </div>
   </div>
   <a href="#top" class="go-top">
      <span class="fa fa-chevron-up" aria-hidden="true"></span>
   </a>

</footer>

<?php wp_footer(); ?>
</body>
</html>