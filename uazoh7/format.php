<article id="post-<?php the_ID(); ?>" <?php post_class('uazoh7-post'); ?>>
<?php $thumb_id = get_post_thumbnail_id($post->ID);$image_url = wp_get_attachment_url($thumb_id);if ( has_post_thumbnail() ) { if(is_single()) {?>
<a href="<?php echo $image_url; ?>" class="colorbox img" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
<?php }else { ?>
<figure>
<a href="<?php the_permalink(); ?>" class="colorbox" title="<?php the_title(); ?>"><?php echo get_the_post_thumbnail($post->ID,'uazoh-image-size-0'); ?></a>
<figcaption><a href="<?php echo $image_url; ?>" title="<?php the_title(); ?>" class="colorbox"><i class="fa fa-plus"></i></a></figcaption>
</figure>
<?php }}  ?>
<header>
<h3><i class="fa fa-pencil"></i><?php if(!is_single()) { ?> <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" target="_blank"> <?php $time=date("YmdHis"); if($post->post_title ==''){ echo $time.'[无标题]';}else{the_title();} ?></a><?php } else {  ?><span> <?php if($post->post_title ==''){ echo $time.'[无标题]';}else{the_title();} ?></span><?php } ?></h3>
<p> <?php the_category(', '); ?> by <?php the_author_posts_link(); ?></p>
</header>

<?php  if(is_single()) { the_content();wp_link_pages('before=<div class="page-links">Pages: &after=</div>');  }else{echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 300,…);?><p></p><p><a href="<?php the_permalink(); ?>" class="uazoh7-btn uazoh7-btn-small uazoh7-btn-secondary-border" target="_blank">阅读全文 <i class="fa fa-arrow-circle-right"></i></a></p>
<?php } ?>
<p>&nbsp;</p>
<p class="tags"><?php the_tags('<i class="fa fa-tag"></i> ', ' ' , ''); ?></p>

<div class="date">
  <span class="day"><?php the_time('d') ?></span>
  <span class="month"><?php the_time('Y') ?>-<?php the_time('m') ?></span>
</div>
</article>

