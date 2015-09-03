    <header class="uazoh7-header uazoh7-header-3">

      <div class="uazoh7-header-bg">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="uazoh7-relative">
                <div class="contact-info"><?php if(isset($smof_data['header_social']) && ($smof_data['header_social'] != 0)) { ?><?php $social_links = array('weixin', 'phone');
					if($social_links) {foreach($social_links as $social_link) {if(!empty($smof_data[$social_link])) { 
								echo '<p class="'.$social_link.'"><i class="fa fa-'.$social_link.'"></i> '.$smof_data[$social_link].'</p>';}}}} ?>
                </div>
                <a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>">
                <div class="uazoh7-logo"><?php if(isset($smof_data['custom_logo']['url']) && ($smof_data['custom_logo']['url'] !='')) { ?>
                  <img src="<?php echo $smof_data['custom_logo']['url']; ?>" alt="<?php bloginfo( 'name' ) ?>"><?php } else { ?>
				  <img src="<?php echo get_template_directory_uri(); ?>/img/site-logo.png" alt="<?php bloginfo( 'name' ) ?>"><?php }?>
                  <p class="logo"><?php if(!empty($smof_data['site_logo_name'])) {echo $smof_data['site_logo_name'];}else {echo 'Uazoh7';}?></p>
                  <p class="logo-en">International University New Media Cultural Festival</p>
                </div>
                </a>
                <form class="search" method="get" action="<?php echo home_url(); ?>/"><input type="text" placeholder="<?php echo __("输入关键词后回车...", "uazoh"); ?>" id="s" name="s" value="<?php the_search_query(); ?>" /><button type="submit" value="Search"><i class="fa fa-search"></i></button></form>
                <div class="social-buttons"><?php if(isset($smof_data['header_social']) && ($smof_data['header_social'] != 0)) { ?>
				<?php $social_links = array('rss','weibo','qq','envelope');
					if($social_links) {foreach($social_links as $social_link) {if(!empty($smof_data[$social_link])) { 
								echo '<a href="'. esc_url($smof_data[$social_link]) .'" title="'. $social_link .'" class="'.$social_link.'"  target="_blank"><i class="fa fa-'.$social_link.'"></i></a>';}}}} ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="uazoh7-desktop-menu-bg" id="uazoh7-header-menu">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
				<?php wp_nav_menu( array('theme_location' => 'top_menu','container'=> 'nav','menu_id' => 'main_nav','menu_class' => 'main-menu','sort_column' => 'menu_order','fallback_cb' => ''));?>
			</div>
          </div>
        </div>
      </div>
    </header>