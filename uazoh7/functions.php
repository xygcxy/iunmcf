<?php
define( 'THEMENAME', 'Uazoh7' ); 

/*-----------------------------------------------------------------------------------*/
/*载入Redux Framework
/*-----------------------------------------------------------------------------------*/

if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/framework/ReduxCore/framework.php' ) ) {
	require_once( dirname( __FILE__ ) . '/framework/ReduxCore/framework.php' );
}
if ( file_exists( dirname( __FILE__ ) . '/framework/config.php' ) ) {
	require_once( dirname( __FILE__ ) . '/framework/config.php' );
}

include ("includes/image-resizer.php");
include ("includes/navigation.php"); 
include ("includes/breadcrumbs.php");

/*-----------------------------------------------------------------------------------*/
/*载入主题设置选项
/*-----------------------------------------------------------------------------------*/

if(!function_exists( 'uazoh_theme_setup' ) ) {
function uazoh_theme_setup() {
if($_GET['debug']){add_theme_support( 'automatic-feed-links' );}
add_theme_support( 'post-thumbnails' );//特色图像
//add_theme_support( 'title-tag' );//新版标题参数
if ( !isset( $content_width ) ) {$content_width = 1170;}//整体宽度
if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'uazoh-image-size-0', 775, 200, true ); //缩略图
	add_image_size( 'uazoh-image-size-4', 81, 81, true ); //侧边栏TAB缩略图
	add_image_size( 'uazoh-image-size-6', 360, 191, true ); //图像展示
	add_image_size( 'uazoh-image-size-7', 260, 183, true ); //图像展示
}
require trailingslashit(get_template_directory()) . '/includes/widgets.php';

}
add_action( 'after_setup_theme', 'uazoh_theme_setup' );
}

/*-----------------------------------------------------------------------------------*/
/*注册边栏FOOTER
/*-----------------------------------------------------------------------------------*/

if( function_exists('register_sidebar') ) {
register_sidebar(array(
'name' => '文章边栏',
'id' => 'sidebar',
'description' => '',
'before_widget' => '<aside class="uazoh7-widget">',
'after_widget' => '</aside>',
'before_title' => '<h3>',
'after_title' => '</h3>',
));

register_sidebar(array(
'name' => 'Footer边栏',
'id' => 'top-footer',
'description' => '',
'before_widget' => '<aside class="footer-widget">',
'after_widget' => '</aside>',
'before_title' => '<h3>',
'after_title' => '</h3>',
));

register_sidebar(array(
'name' => '页面边栏',
'id' => 'page-sidebar',
'description' => '',
'before_widget' => '<aside class="uazoh7-widget">',
'after_widget' => '</aside>',
'before_title' => '<h3>',
'after_title' => '</h3>',
));

register_sidebar(array(
'name' => '首页文章',
'id' => 'homepage-post',
'description' => '',
'before_widget' => '',
'after_widget' => '',
'before_title' => '',
'after_title' => '',
));

register_sidebar(array(
'name' => '首页活动',
'id' => 'homepage-activity',
'description' => '',
'before_widget' => '',
'after_widget' => '',
'before_title' => '',
'after_title' => '',
));

register_sidebar(array(
'name' => '首页项目展示',
'id' => 'homepage-project',
'description' => '',
'before_widget' => '',
'after_widget' => '',
'before_title' => '',
'after_title' => '',
));

}

if( !function_exists('uazoh_count_sidebar_widgets') ) {
function uazoh_count_sidebar_widgets( $sidebar_id, $echo = true ) {
$the_sidebars = wp_get_sidebars_widgets();
if( !isset( $the_sidebars[$sidebar_id] ) )
return __( 'SidebarID', 'uazoh' );
if( $echo )
echo count( $the_sidebars[$sidebar_id] );
else
return count( $the_sidebars[$sidebar_id] );
}
}

if( !function_exists('uazoh_my_sidebars') ) {
function uazoh_my_sidebars() {
global $wp_registered_sidebars;
$all_sidebars = array();
if ( $wp_registered_sidebars && ! is_wp_error( $wp_registered_sidebars ) ) {

foreach ( $wp_registered_sidebars as $sidebar ) {
$all_sidebars[ $sidebar['id'] ] = $sidebar['name'];
}
}
return $all_sidebars;
}
}
add_filter( 'wp_title', 'uazoh_wp_title_for_home' );
function uazoh_wp_title_for_home( $title ){
  if( empty( $title ) && ( is_home() || is_front_page() ) ) {
    return bloginfo('name') . ' | ' . get_bloginfo( 'description' );
  }else{
  return $title .' | ' .bloginfo('name');
}
}
/*-----------------------------------------------------------------------------------*/
/*注册菜单
/*-----------------------------------------------------------------------------------*/

if( !function_exists('uazoh_register_main_menu') ) {
function uazoh_register_main_menu() {
register_nav_menus(
array(
'top_menu' => __('主菜单', 'uazoh'),
'footer_menu' => __('页脚菜单', 'uazoh'),
'bottom_menu' => __('底部菜单', 'uazoh'),
'404_menu' => __('404页面菜单', 'uazoh')
)
);}
add_action( 'init', 'uazoh_register_main_menu' );
}

/*-----------------------------------------------------------------------------------*/
/*注册新的缩略图大小
/*-----------------------------------------------------------------------------------*/

//移除wp_nav_menu()多余的选择器
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var) {
	return is_array($var) ? array() : '';
}
/*---------------------*/
/*载入 Javascript, CSS
/*----------------------*/
add_action('wp_enqueue_scripts','uazoh_enqueue_style');
function uazoh_enqueue_style() {
global $smof_data;
if( !is_admin() ) {
wp_enqueue_script( 'jquery', true  );
//CSS
wp_enqueue_style('uazoh-bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css' );
wp_enqueue_style('uazoh-animate', get_stylesheet_directory_uri() . '/css/animate.css' );
wp_enqueue_style('uazoh-mCustomScrollbar', get_stylesheet_directory_uri() . '/css/jquery.mCustomScrollbar.css' );
wp_enqueue_style('uazoh-font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome/css/font-awesome.min.css' );
wp_enqueue_style('uazoh-main', get_stylesheet_directory_uri() . '/css/main.css' );
if((is_front_page()) && (is_page_template('template-homepage.php'))) {
wp_enqueue_style('uazoh-h3', get_stylesheet_directory_uri() . '/css/h3.css' );
}else{wp_enqueue_style('uazoh-h1', get_stylesheet_directory_uri() . '/css/h1.css' );}
if(isset($smof_data['responsive_enabled']) && ($smof_data['responsive_enabled'] =='1')) { 
wp_enqueue_style('uazoh-responsive', get_stylesheet_directory_uri() . '/css/responsive.css' );
}
wp_enqueue_style('uazoh-color-scheme', get_stylesheet_directory_uri() . '/css/'.$smof_data['scheme'] );
wp_enqueue_style('uazoh-default-style', get_stylesheet_uri() );
wp_enqueue_style('uazoh-LayerSlider', get_stylesheet_directory_uri() . '/css/layerslider/css/layerslider.css' );
}

//Javascript
wp_enqueue_script( 'core', get_stylesheet_directory_uri() .'/js/core.js', array(), '' );
wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() .'/js/bootstrap.min.js', array('jquery'), '1.0' );
wp_enqueue_script( 'mCustomScrollbar', get_stylesheet_directory_uri() .'/js/jquery.mCustomScrollbar.min.js', array('jquery'), '1.0' );
wp_enqueue_script( 'mousewheel', get_stylesheet_directory_uri() .'/js/jquery.mousewheel.min.js', array('jquery'), '1.0' );
wp_enqueue_script( 'colorbox', get_stylesheet_directory_uri() .'/js/jquery.colorbox-min.js', array('jquery'), '1.0' );
wp_enqueue_script( 'preloadCssImages', get_stylesheet_directory_uri() .'/js/preloadCssImages.jQuery_v5.js', array('jquery'), '1.0' );
wp_enqueue_script( 'stellar', get_stylesheet_directory_uri() .'/js/jquery.stellar.min.js', array('jquery'), '1.0' );
if((is_front_page()) && (is_page_template('template-homepage.php'))) {
	wp_enqueue_script( 'jquery-easing', get_stylesheet_directory_uri() .'/js/layerslider/jquery-easing-1.3.js', array('jquery'), '1.3' );
	wp_enqueue_script( 'jquery-transit-modified', get_stylesheet_directory_uri() .'/js/layerslider/jquery-transit-modified.js', array('jquery'), '1.0' );
	wp_enqueue_script( 'layerslider-transitions', get_stylesheet_directory_uri() .'/js/layerslider/layerslider.transitions.js', array('jquery'), '1.0' );
	wp_enqueue_script( 'layerslider-kreaturamedia', get_stylesheet_directory_uri() .'/js/layerslider/layerslider.kreaturamedia.jquery.js', array('jquery'), '1.0' );
}
wp_enqueue_script( 'jquery-rivathemes', get_stylesheet_directory_uri() .'/js/jquery.rivathemes.js', array('jquery'), '1.0' );
wp_enqueue_script( 'uazoh7', get_stylesheet_directory_uri() .'/js/uazoh7.js', array('jquery'), '1.0', true );
}
add_action('wp_head','uazoh_inline_style');
function uazoh_inline_style() {
if( !is_admin() ) {
?>
<style><?php if(!empty($smof_data['body_background'])) {
	echo 'html body {background: '.$smof_data['body_background'].' ;}';
}
if(!empty($smof_data['selected_text_background'])) {
	echo '::selection {background: '.$smof_data['selected_text_background'].'; color: #fff; } ';
	echo '::-moz-selection {background: '.$smof_data['selected_text_background'].'; color: #fff; } ';
}
if((!empty($smof_data['pattern'])) && ($smof_data['pattern'] != 'bg12')) {
	echo 'html body #wrapper { background: url('.get_template_directory_uri().'/images/bg/'.$smof_data['pattern'].'.png) repeat scroll 0 0;}';
}
if(!empty($smof_data['more_css'])) {echo $smof_data['more_css'];} ?></style><?php }}
add_action('wp_footer', 'uazoh_footer_js', 100);
function uazoh_footer_js(){
global $smof_data; ?>
<script type="text/javascript">jQuery(function($) {
<?php if(isset($smof_data['enable_preloader'])) {if($smof_data['enable_preloader'] != 0) { ?>
var imgs = new Array(), $imgs = $('img');for (var i = 0; i < imgs.length; i++) {imgs[i] = new Image();imgs[i].src = $imgs.eq(i).attr('src');}Core.preloader.queue(imgs).preload(function() {var images = $('a').map(function() {return $(this).attr('href');}).get();Core.preloader.queue(images).preload(function() {$.preloadCssImages();})});$('#uazoh7-preload').hide();
<?php }} if((is_front_page()) && (is_page_template('template-homepage.php'))) { ?>
jQuery('#layerslider').layerSlider({skinsPath: '<?php echo get_template_directory_uri(); ?>/css/layerslider/skins/',skin : 'fullwidth',thumbnailNavigation : 'hover',hoverPrevNext : false,responsive : false,responsiveUnder : 1170,sublayerContainer : 1170});
var animateBlockHeaders = 1;
$('#latest-projects').rivaSlider({visible : 3,selector : 'uazoh7-project'});
$('#latest-news').rivaSlider({visible : <?php if(isset($smof_data['homepage_post_num'])) {echo $smof_data['homepage_post_num'];}else{echo '4';}?>,selector : 'uazoh7-post-preview'});
$('#clients-testimonials').rivaCarousel({visible : 1,selector : 'uazoh7-testimonials-2',mobile_visible : 1});
<?php } if(is_single()) {?>
jQuery('#related-posts').rivaSlider({visible : 3,selector : 'uazoh7-post-preview'});
<?php } ?>
});
if (navigator.userAgent.match(/IEMobile\/10\.0/)) {var msViewportStyle = document.createElement("style");msViewportStyle.appendChild(document.createTextNode("@-ms-viewport{width:auto!important}"));document.getElementsByTagName("head")[0].appendChild(msViewportStyle);}
<?php if(is_404() || (is_page_template('template-homepage.php'))) {}else{  ?>
jQuery(window).on('load', function () {
	var box = jQuery('#popular-post'),
	offsetFIXED = box.offset();
	var offsetfooter = jQuery('.uazoh7-footer');
	offsetfooterFIXED = (offsetfooter.offset().top - 700);
	jQuery(window).scroll(function () {
		if((jQuery(window).scrollTop()+80) > offsetFIXED.top && jQuery('#main').height() > jQuery('#side').height() && offsetfooterFIXED > jQuery(window).scrollTop()) {
			box.addClass('fixed');
		} else {
			box.removeClass('fixed');
		}
	});
});
<?php } ?>
</script>
<?php }
function uazoh_custom_js() {
global $smof_data;
if(isset($smof_data['js_editor']) && ($smof_data['js_editor'] !='')) { echo '<script>'. $smof_data['js_editor'] .'</script>'; }
}
add_action('wp_footer', 'uazoh_custom_js', 101);

// Hex 2 RGB values
function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
  $r = hexdec(substr($hex,0,1).substr($hex,0,1));
  $g = hexdec(substr($hex,1,1).substr($hex,1,1));
  $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
  $r = hexdec(substr($hex,0,2));
  $g = hexdec(substr($hex,2,2));
  $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return implode(",", $rgb); 
}

//移除图片的高度和宽度属性
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 ); 
function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

//摘要字数限制
if(!function_exists('uazoh_custom_excerpt_length')) { 
function uazoh_custom_excerpt_length( $length ) {
return 80;
}
add_filter( 'excerpt_length', 'uazoh_custom_excerpt_length', 999 );

}
//摘要更多链接
if(!function_exists('uazoh_new_excerpt_more')) { 
function uazoh_new_excerpt_more($more) {
   global $post;
return '<p><a href="'. get_permalink($post->ID) . '" class="uazoh7-btn uazoh7-btn-small uazoh7-btn-secondary-border"> '.__('查看全文', 'uazoh').' <i class="fa fa-arrow-circle-right"></i></a></p>';
}
add_filter('excerpt_more', 'uazoh_new_excerpt_more');
}

//阅读量
function record_visitors()
{
	if (is_singular()) {
	  global $post;
	  $post_ID = $post->ID;
	  if($post_ID) {
		  $post_views = (int)get_post_meta($post_ID, 'views', true);
		  if(!update_post_meta($post_ID, 'views', ($post_views+1))) {
			add_post_meta($post_ID, 'views', 1, true);
		  }
	  }
	}
}
add_action('wp_head', 'record_visitors');  
 //针对4.2版关掉帮助选项卡
function Uazoh_remove_help_tabs($old_help, $screen_id, $screen){
    $screen->remove_help_tabs();
    return $old_help;
}
add_filter('contextual_help', 'Uazoh_remove_help_tabs', 10, 3 );
//取得文章的阅读次数
function post_views($before = '点击 ', $after = ' 次', $echo = 1)
{
  global $post;
  $post_ID = $post->ID;
  $views = (int)get_post_meta($post_ID, 'views', true);
  if ($echo) echo $before, number_format($views), $after;
  else return $views;
}
//屏蔽WORDPRESS自带GOOGLE字体
function uazoh_replace_open_sans2USESO() {
  wp_deregister_style('open-sans');
  wp_register_style( 'open-sans', '//fonts.useso.com/css?family=Open+Sans:300italic,400italic,600italic,300,400,600' );
  wp_enqueue_style('open-sans','');
}
function uazoh_replace_open_sans() {
  wp_deregister_style('open-sans');
  wp_register_style( 'open-sans', false );
  wp_enqueue_style('open-sans','');
} 
add_action( 'wp_enqueue_scripts', 'uazoh_replace_open_sans' );
add_action('admin_enqueue_scripts', 'uazoh_replace_open_sans2USESO');
//给图片自动添加ALT
function uazoh_auto_images_link($content) {
	global $post;
        $content = preg_replace('/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i', "<a href=\"".get_permalink()."\" title=\"".$post->post_title."\" ><img src=\"$2\" alt=\"".$post->post_title."\" /></a>", $content);
	return $content;
}
add_filter ('the_content', 'uazoh_auto_images_link',0);
function uazoh_add_thumbnail($post) {
$already_has_thumb = has_post_thumbnail();
	if (!$already_has_thumb)  {
		$attached_image = get_children( "order=ASC&post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=1" );
		if ($attached_image) {
			$attachment_values = array_values($attached_image);
			$first_child_image = $attachment_values[0];
			add_post_meta($post->ID, '_thumbnail_id', $first_child_image->ID, true);
		}
	}
}
  add_action('the_post', 'uazoh_add_thumbnail');
  add_action('new_to_publish', 'uazoh_add_thumbnail');
  add_action('draft_to_publish', 'uazoh_add_thumbnail');
  add_action('pending_to_publish', 'uazoh_add_thumbnail');
  add_action('future_to_publish', 'uazoh_add_thumbnail');
//关键词链接
function uazoh_auto_post_link($content) {
		global $post;
        $content = preg_replace('/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i', "<a href=\"".get_permalink()."\" title=\"".$post->post_title."\" ><img src=\"$2\" alt=\"".$post->post_title."\" /></a>", $content);
 
	    $posttags = get_the_tags();
	 if ($posttags) {
		 foreach($posttags as $tag) {
			 $link = get_tag_link($tag->term_id); 
			 $keyword = $tag->name;
	   		$content = preg_replace('\'(?!((<.*?)|(<a.*?)))('. $keyword . ')(?!(([^<>]*?)>)|([^>]*?</a>))\'s','<a href="'.$link.'" title="'.$keyword.'">'.$keyword.'</a>',$content,2);//最多替换2个重复的词，避免过度SEO
		 }
	 }
	   return $content;
}
add_filter ('the_content', 'uazoh_auto_post_link',0);
function custom_loginlogo() {
	echo'<style type="text/css">.login h1 a {background-image: url('.get_stylesheet_directory_uri().'/img/logo.svg) !important;-webkit-background-size: 120px;background-size: 120px;width: 120px;height: 120px; }body{background:none;}#nav,#backtoblog{display:none;} </style>';
}
add_action('login_head', 'custom_loginlogo');
function custom_loginlogo_url($url) {
    return 'http://www.uazoh.com';
}
add_filter( 'login_headerurl', 'custom_loginlogo_url' );
function custom_loginbg() {
	echo '<script type="text/javascript" src="/wp-includes/js/jquery/jquery.js?ver=1.11.1"></script>';
	echo '<script src="'.get_stylesheet_directory_uri().'/js/jquery.backstretch.min.js"></script>';
	echo'<script>jQuery(function(){var imgsrc = "'.get_stylesheet_directory_uri().'/img/loginbg";
	var listArr = [imgsrc+"/1.jpg",imgsrc+"/2.jpg",imgsrc+"/3.jpg"];
	jQuery(\'.login\').backstretch(listArr, {fade: 1000,duration: 5000});});</script>';
}
add_action('login_footer', 'custom_loginbg');
//上传文件自动按照上传日期时间重命名
function uazoh_wp_upload_filter($file){
$time=date("YmdHis");
$file['name'] = $time."".mt_rand(1,100).".".pathinfo($file['name'] , PATHINFO_EXTENSION);
return $file;
}
add_filter('wp_handle_upload_prefilter', 'uazoh_wp_upload_filter');
function disable_emoji_tinymce( $plugins ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
}

function remove_emoji() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'disable_emoji_tinymce' );
}

add_action( 'init', 'remove_emoji' );
//语言包功能（目前基础版还不支持，仅仅是扩展用）
$lang = get_template_directory() . '/lang';
load_theme_textdomain('uazoh', $lang);
//关闭前台 admin bar
//show_admin_bar( false );
//判断微信浏览器
function is___weixin(){ 
	if ( isset($_SERVER['HTTP_USER_AGENT']) ) {
		if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'Windows Phone') !== false ) {
			return true;
		}
	}
	return false;
}

?>