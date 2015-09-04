<?php get_header(); ?>
<section class="uazoh7-section">
<div class="container">
<div class="row">
<?php              
if(isset($smof_data['blog_sidebar_pos'])) {
if($smof_data['blog_sidebar_pos']=='0') {
	echo "<div class='sider-nav'>";
    $parent_title = get_the_title($post->post_parent);
    echo "<div class='line'></div>";
    echo "<p class='parent-nav'>";
    echo $parent_title;
    echo "</p>";
if($post->post_parent) 
$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
else 
$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
if ($children) {
echo "<ul class='nav-li'>";
echo $children;
echo "</ul>";
}
	echo "</div>";
	echo '<div class="col-lg-12 information">';
	if (have_posts()) :  while (have_posts()) : the_post(); the_content();endwhile;endif;  uazoh_navigation();
	echo '</div>';
}elseif($smof_data['blog_sidebar_pos']=='2') {
	echo '<div class="col-lg-9">';
	if (have_posts()) :  while (have_posts()) : the_post(); the_content();endwhile;endif;  uazoh_navigation();
	echo '</div><div class="col-lg-3">';
	if(isset($smof_data['blog_sidebar'])) {dynamic_sidebar(''.$smof_data['blog_sidebar'].''); }else {dynamic_sidebar('sidebar'); }
	echo '</div>';
}elseif($smof_data['blog_sidebar_pos']=='1') {
	echo '<div class="col-lg-3">';
	if(isset($smof_data['blog_sidebar'])) {dynamic_sidebar(''.$smof_data['blog_sidebar'].''); }else {dynamic_sidebar('sidebar'); }
	echo '</div><div class="col-lg-9">';
	if (have_posts()) :  while (have_posts()) : the_post(); the_content();endwhile;endif;  uazoh_navigation();
	echo '</div>';
}} ?>
</div></div></section>
<?php get_footer(); ?>