<?php /*Template Name: Homepage*/?>
<?php get_header();
/* 展示 */  
if(isset($smof_data['class_news']) && ($smof_data['class_news'] != 0)) { ?>
<section class="uazoh7-section uazoh7-section-st2">
<div class="container">
<div class="row">
<div class="col-lg-3 col-md-3 col-sm-6">
<article class="uazoh7-feature-2">
<header>
<i class="fa fa-<?php echo $smof_data['class_01_icon'] ?>"></i><span class="arrow"></span><br />
<?php echo $smof_data['class_01_title'] ?><br />
</header>
<p><?php echo $smof_data['class_01'] ?></p>
</article>
</div>
<div class="col-lg-3 col-md-3 col-sm-6">
<article class="uazoh7-feature-2">
<header>
<i class="fa fa-<?php echo $smof_data['class_02_icon'] ?>"></i><span class="arrow"></span><br />
<?php echo $smof_data['class_02_title'] ?><br />
</header>
<p><?php echo $smof_data['class_02'] ?></p>
</article>
</div>
<div class="col-lg-3 col-md-3 col-sm-6">
<article class="uazoh7-feature-2">
<header>
<i class="fa fa-<?php echo $smof_data['class_03_icon'] ?>"></i><span class="arrow"></span><br />
<?php echo $smof_data['class_03_title'] ?><br />
</header>
<p><?php echo $smof_data['class_03'] ?></p>
</article>
</div>
<div class="col-lg-3 col-md-3 col-sm-6">
<article class="uazoh7-feature-2">
<header>
<i class="fa fa-<?php echo $smof_data['class_04_icon'] ?>"></i><span class="arrow"></span><br />
<?php echo $smof_data['class_04_title'] ?><br />
</header>
<p><?php echo $smof_data['class_04'] ?></p>
</article>
</div>
</div>
</div>
</section>
<?php } 

/* 项目展示 */ 

if(isset($smof_data['feature_switch']) && ($smof_data['feature_switch'] != 0)) { ?>
<section class="uazoh7-section uazoh7-section-align-center">
<div class="container">
<div class="row">
<div class="col-lg-12">
<?php if(isset($smof_data['feature_title']) && ($smof_data['feature_title'] !='')) {echo '<h2>'.$smof_data['feature_title'].'</h2>';}?>
<?php if(isset($smof_data['feature_subheading']) && ($smof_data['feature_subheading'] !='')) { echo '<p class="block-description">'.$smof_data['feature_subheading'].'</p>'; }?>
<?php if(isset($smof_data['feature_yext']) && ($smof_data['feature_yext'] !='')) { echo '<p>'.$smof_data['feature_yext'].'</p>'; }?>
<div class="uazoh7-relative" id="latest-projects">
<?php dynamic_sidebar( 'homepage-project' ); ?>
<div class="uazoh7-navigation rivaslider-navigation">
<a href="" class="back"><i class="fa fa-chevron-left"></i></a> <a href="" class="forward"><i class="fa fa-chevron-right"></i></a>
</div>
</div>
</div>
</div>
</div>
</section>
<?php }

/* 关于我们 */  
 
if(isset($smof_data['about_uss']) && ($smof_data['about_uss'] != 0)) { ?>
<section class="uazoh7-section uazoh7-section-st1 uazoh7-section-align-center">
<div class="container">
<div class="row">
<div class="col-lg-12">
<ul class="country-ul">
	<li class="country"><a href="">欧洲</a></li>
	<li class="country"><a href="">北美</a></li>
	<li class="country"><a href="">拉美</a></li>
	<li class="country"><a href="">非洲</a></li>
	<li class="country"><a href="">亚太</a></li>
</ul>
<?php //if(isset($smof_data['about_uss_title']) && ($smof_data['about_uss_title'] !='')) {echo '<h2>'.$smof_data['about_uss_title'].'</h2>';}?>
<?php //if(isset($smof_data['about_uss_yext']) && ($smof_data['about_uss_yext'] !='')) { echo '<p>'.$smof_data['about_uss_yext'].'</p>'; }?>
<!-- <p> -->
<?php //if(isset($smof_data['about_uss_links_1']) && ($smof_data['about_uss_links_1'] !='')) { echo '<a href="'.$smof_data['about_uss_links_1'].'" class="uazoh7-btn uazoh7-btn-primary uazoh7-btn-normal"><i class="fa fa-check"></i> '.$smof_data['about_uss_links_1_text'].'</a>  '; }?>
<?php //if(isset($smof_data['about_uss_links_2']) && ($smof_data['about_uss_links_2'] !='')) { echo '<a href="'.$smof_data['about_uss_links_2'].'" class="uazoh7-btn uazoh7-btn-secondary uazoh7-btn-normal">'.$smof_data['about_uss_links_2_text'].'</a>'; }?>
<!-- </p> -->
</div>
</div>
</div>
</section>
<?php }

/* 首页文章 */   
 
if(isset($smof_data['homepage_post']) && ($smof_data['homepage_post'] != 0)) { ?>
<section class="uazoh7-section uazoh7-section-align-left">
<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12">
<?php if(isset($smof_data['homepage_post_title']) && ($smof_data['homepage_post_title'] !='')) {echo '<h2>'.$smof_data['homepage_post_title'].'</h2>';}?>
<div class="uazoh7-relative" id="latest-news">
<?php dynamic_sidebar( 'homepage-post' ); ?>
<div class="uazoh7-navigation uazoh7-navigation-center rivaslider-navigation">
<a href="" class="back"><i class="fa fa-chevron-left"></i></a> <a href="" class="forward"><i class="fa fa-chevron-right"></i></a></p></div>
</div>
</div>
</div>
</div>
<div class="activity">
<h2 style="margin-top: 0px;">活动一览</h2>
	<ul>
		<li>111111</li>
	</ul>
</div>
</section>
<?php } 
if (have_posts()) { while (have_posts()) { the_post(); the_content(); }} 

/* 声明 */ 

if(isset($smof_data['wicht']) && ($smof_data['wicht'] != 0)) { ?>

<section class="uazoh7-section uazoh7-section-st2 uazoh7-section-cta2" id="footer-message">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="message">
	<h4>奖项一览</h4>
</div>
<div class="message review">
	<h4>媒体观点</h4>
</div>
<div class="message qcode">
	<h4>关注一下</h4>
</div>
<!-- <p><?php //if(isset($smof_data['wicht_title']) && ($smof_data['wicht_title'] !='')) {echo '<span>'.$smof_data['wicht_title'].'</span>';}?> <?php //if(isset($smof_data['wicht_links_text']) && ($smof_data['wicht_links_text'] !='')) { echo '<a href="'.$smof_data['wicht_links'].'" class="uazoh7-btn uazoh7-btn-normal uazoh7-btn-border-white">'.$smof_data['wicht_links_text'].'</a>  '; }?></p> -->
</div>
</div>
</div>
</section>
<?php } get_footer(); ?>