<?php get_header(); ?>
<?php global $smof_data; ?>
<div class="uazoh7-content uazoh7-content-404" data-stellar-background-ratio="0.5">
      <div class="uazoh7-content-404-gradient"></div>

        <div class="uazoh7-content-404-inner">

                <a href="<?php echo home_url(); ?>" class="logolink">
                <div class="uazoh7-logo">
                  <?php if(isset($smof_data['custom_logo']['url']) && ($smof_data['custom_logo']['url'] !='')) { ?>
                  <img src="<?php echo $smof_data['custom_logo']['url']; ?>" alt="<?php bloginfo( 'name' ) ?>"><?php } else { ?>
				  <img src="<?php echo get_template_directory_uri(); ?>/img/site-logo.png" alt="<?php bloginfo( 'name' ) ?>"><?php }?>
                  <div class="cl"></div>
                  <p class="logo"><?php if(!empty($smof_data['site_logo_name'])) {echo $smof_data['site_logo_name'];}else {echo 'Uazoh7';}?></p>
                  <p class="tagline"><?php if(!empty($smof_data['logo_displaytext'])) {echo $smof_data['logo_displaytext'];}else {echo '极致、简约、细节、亲和';}?></p>

                </div>
                </a>

                <p class="oops">~迷路啦！</p>
                <p class="note">我了个去！怎么转晕了？也许网站地址有变化哦！请搜索您想找的关键词或者点击上面站点名称进入主页慢慢浏览</p>
                <p>&nbsp;</p>
				<form class="uazoh7-404-search-form" method="get" action="<?php echo home_url(); ?>/"><input type="text" placeholder="<?php echo __("输入关键词后回车...", "uazoh"); ?>" id="s" name="s" value="<?php the_search_query(); ?>" /></button></form>
                <p>&nbsp;</p>
                <p class="note"><?php $menu_list = strip_tags(wp_nav_menu( array('theme_location' => '404_menu','container'=> false,'echo'	=> false,'items_wrap' => '%3$s','after'=> ' - ','fallback_cb' => '')), '<a>' );$menu_lists = substr($menu_list, 0, strlen($menu_list)-3);echo $menu_lists; ?></p>

        </div>

      <section class="uazoh7-section uazoh7-section-st2 uazoh7-soc-buttons-list" id="socials">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
<?php $cat_args = array('orderby' => 'name');$categories=get_categories($cat_args);
			foreach($categories as $category) { ?>
              <div class="uazoh7-social-button-2 uazoh7-social-button-2-white">
                <div class="esb-tooltip">
                  <p><?php echo $category->name; ?></p>
                  <span class="arrow"></span>
                </div>
                <div class="esb-main">
<?php echo '<a href="' . get_category_link( $category->term_id ) . '" title="' .  $category->name. '">';
				$social_links = array('html5', 'slack','windows','cogs','check-square-o','code','bars','coffee','cubes','bookmark','bolt','graduation-cap','leaf','heart','globe','group','smile-o','send','wifi');
				  $rand_keys = array_rand($social_links, 2);
					echo '<i class="fa fa-'.$social_links[$rand_keys[0]].'"></i>'; ?>
				</a>
                </div>
              </div><?php } ?>
            </div>
          </div>
        </div>

      </section>
    </div>
<?php wp_footer(); ?></body> </html>