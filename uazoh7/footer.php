<?php global $smof_data; ?>
</div><!--uazoh7-content-->
<footer class="uazoh7-footer">
      <div class="container">
        <div class="row">
		<div class="col-lg-2 col-md-2">
            <div class="uazoh7-widget uazoh7-links-widget">
              <h3>links</h3>
              <div class="uazoh7-widget-inner">
                <?php wp_nav_menu( array('theme_location' => 'footer_menu','container'=> false,'menu_id' => 'footer_top_nav','menu_class' => 'mobile-menu','sort_column' => 'menu_order','fallback_cb' => ''));?>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-4">
            <div class="uazoh7-widget uazoh7-links-widget uazoh7-about-widget">
              <h3>随机 <strong>文章</strong></h3>
              <div class="uazoh7-widget-inner">
   <ul>
<?php
global $post;
$postid = $post->ID;
$args = array( 'orderby' => 'rand', 'post__not_in' => array($post->ID), 'showposts' => 9);
$query_posts = new WP_Query();
$query_posts->query($args);
while ($query_posts->have_posts()) : $query_posts->the_post(); ?>
<li><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
<?php endwhile; ?>
</ul>
            </div>
          </div></div>

          <div class="col-lg-3 col-md-3">
            <div class="uazoh7-widget uazoh7-tags-widget">
              <h3>文章 <strong>Tags</strong></h3>
              <div class="uazoh7-widget-inner">
                <?php wp_tag_cloud('smallest=13&largest=13&number=30&orderby=count'); ?><?php if(isset($smof_data['tags_more_enabled'])) {if($smof_data['tags_more_enabled'] != 0) { ?>
                <p><a href="<?php echo $smof_data['tags_more_url']; ?>" class="uazoh7-btn uazoh7-btn-primary uazoh7-btn-small"><i class="fa fa-plus"></i> 更多Tags</a></p><?php }}?>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-3">
            <div class="uazoh7-widget uazoh7-about-widget">
              <h3>关注 | 联系</h3>
              <div class="uazoh7-widget-inner"><?php if(isset($smof_data['weixin_qrcode']['url']) && ($smof_data['weixin_qrcode']['url'] !='')) { ?>
                  <img src="<?php echo $smof_data['weixin_qrcode']['url']; ?>" alt="<?php bloginfo( 'name' ) ?> qr-code"><?php } else { ?>
				  <img src="<?php echo get_template_directory_uri(); ?>/img/qr-code.png" alt="<?php bloginfo( 'name' ) ?> qr-code"><?php }?>
				  <?php if(isset($smof_data['header_social']) && ($smof_data['header_social'] != 0)) { ?><?php $social_links = array('weixin', 'phone','envelope','map-marker');
					if($social_links) {foreach($social_links as $social_link) {if(!empty($smof_data[$social_link])) { 
                echo '<p class="contacts"><i class="fa fa-'.$social_link.'"></i> '.$smof_data[$social_link].'</p>';}}}} ?>
              </div>
            </div>
          </div>

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