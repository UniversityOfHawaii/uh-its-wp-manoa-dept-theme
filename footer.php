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
<footer>
<?php if ( is_active_sidebar( 'footer-widget-area' ) ) : ?>
   <div id="footer_top">
      <div id="footer_top_content">
         <ul class="xoxo">
         <?php dynamic_sidebar( 'footer-widget-area' ); ?>
         </ul>
      </div>
   </div>
<?php endif; ?>
   <div id="footer_mid">
      <div id="footer_mid_content">
         <div class="uh_col c1_4">
            <img src="<?php echo get_template_directory_uri(); ?>/images/footer-logo.png" srcset="<?php echo get_template_directory_uri(); ?>/images/footer-logo.png 1x, <?php echo get_template_directory_uri(); ?>/images/footer-logo-2x.png 2x" alt="uh manoa logo" />
         </div>
         <div class="uh_col c1_4">
            <ul>
               <li><a href="https://manoa.hawaii.edu/a-z/">A-Z Index</a></li>
               <li><a href="https://manoa.hawaii.edu/records/calendar/">Academic Calendar</a></li>
               <li><a href="https://manoa.hawaii.edu/directory/">Campus Directory</a></li>
               <li><a href="https://manoa.hawaii.edu/campusmap/">Campus Maps</a></li>
               <li><a href="https://manoa.hawaii.edu/commuter/">Parking &#038; Transportation</a></li>
               <li><a href="https://manoa.hawaii.edu/about/visit/">Visiting the Campus</a></li>
            </ul>            
         </div>
         <div class="uh_col c1_4">
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
         <div class="uh_col c1_4">
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
      <div id="footer_btm_content">
The University of Hawai&#699;i is an <a href="https://www.hawaii.edu/offices/eeo/policies/?policy=antidisc">equal opportunity/affirmative action institution</a><br />
&copy;2018 University of Hawai&#699;i at M&#257;noa &bull; 2500 Campus Road &bull; Honolulu, HI 96822 &bull; (808) 956-8111
</div>
   </div>
</footer>

<?php
	/*
	 * Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
