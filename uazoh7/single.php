<?php get_header(); ?>
<section class="uazoh7-section">
<div class="container">
<div class="row">
<?php              
if(isset($smof_data['blog_sidebar_pos'])) {
if($smof_data['blog_sidebar_pos']=='0') {
	echo '<div class="col-lg-12">';
	if (have_posts()) :  while (have_posts()) : the_post(); get_template_part( 'format', get_post_format() );if($_GET['debug']=='uazoh'){the_post_navigation();} ?>
<p>&nbsp;</p>
<?php if(isset($smof_data['prev_next_posts'])) { if($smof_data['prev_next_posts'] =='1') { require_once( dirname( __FILE__ ) . '/includes/related-posts.php' ); }} ?>
	<?php endwhile;endif;  uazoh_navigation();
	echo '</div>';
}elseif($smof_data['blog_sidebar_pos']=='2') {
	echo '<div class="col-lg-9" id="main">';
	if (have_posts()) :  while (have_posts()) : the_post(); get_template_part( 'format', get_post_format() );if($_GET['debug']=='uazoh'){the_post_navigation();} ?>
<p>&nbsp;</p>
<?php if(isset($smof_data['prev_next_posts'])) { if($smof_data['prev_next_posts'] =='1') { require_once( dirname( __FILE__ ) . '/includes/related-posts.php' ); }} ?>
	<?php endwhile;endif;  uazoh_navigation();
	echo '</div><div class="col-lg-3" id="side">';
	if(isset($smof_data['blog_sidebar'])) {dynamic_sidebar(''.$smof_data['blog_sidebar'].''); }else {dynamic_sidebar('sidebar'); }
	echo '</div>';
}elseif($smof_data['blog_sidebar_pos']=='1') {
	echo '<div class="col-lg-3" id="side">';
	if(isset($smof_data['blog_sidebar'])) {dynamic_sidebar(''.$smof_data['blog_sidebar'].''); }else {dynamic_sidebar('sidebar'); }
	echo '</div><div class="col-lg-9" id="main">';
	if (have_posts()) :  while (have_posts()) : the_post(); get_template_part( 'format', get_post_format() );if($_GET['debug']=='uazoh'){the_post_navigation();} ?>
<p>&nbsp;</p>
<?php if(isset($smof_data['prev_next_posts'])) { if($smof_data['prev_next_posts'] =='1') { require_once( dirname( __FILE__ ) . '/includes/related-posts.php' ); }} ?>
	<?php endwhile;endif;  uazoh_navigation();
	echo '</div>';
}} 
if($_GET['debug']){comments_template();}
?>
</div></div></section>
<?php get_footer(); ?>