<?php global $smof_data; ?>
</div><!--uazoh7-content-->
<footer class="uazoh7-footer">
<div class="sponsor">
<div class="sponsor-main">
         <div class="col-lg-2 col-md-1 sponsor-content sponsor1">

          </div>

          <div class="col-lg-4 col-md-2 sponsor-content sponsor2">
             
            </div>

          <div class="col-lg-3 col-md-3 sponsor-content sponsor3">
             
          </div>

          <div class="col-lg-3 col-md-4 sponsor-content sponsor4">

          </div>
          <div class="col-lg-3 col-md-5 sponsor-content sponsor5">

          </div>
          <div class="col-lg-3 col-md-6 sponsor-content sponsor6">

          </div>

      </div>
      </div>
      <div class="container">
      
        <div class="row">
		     
          <div class="col-lg-12">
            <div class="uazoh7-widget uazoh7-copyright-widget">
              <div class="uazoh7-widget-inner">
                <p><?php if(isset($smof_data['copyright_textarea']) && ($smof_data['copyright_textarea'] !='')) {echo wp_kses_post($smof_data['copyright_textarea']);} else { echo '© Copyright 2015 by <a href="http://www.uazoh.com">uazoh7</a>. All Rights Reserved.';}?></p>
                <p><?php $menu_list = strip_tags(wp_nav_menu( array('theme_location' => 'bottom_menu','container'=> false,'echo'	=> false,'items_wrap' => '%3$s','after'=> ' / ','fallback_cb' => '')), '<a>' );$menu_lists = substr($menu_list, 0, strlen($menu_list)-3);echo $menu_lists; ?></p>
              </div>
            </div><?php if(isset($smof_data['footer_css_js']) && ($smof_data['footer_css_js'] !='')) {echo $smof_data['footer_css_js'];}?>
          </div>
        </div>
      </div>
</footer>
<?php wp_footer(); ?>
</body> </html>