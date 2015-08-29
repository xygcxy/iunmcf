<h3><strong>我要</strong> 分享</h3>
<div class="uazoh7-relative">
<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_douban" data-cmd="douban" title="分享到豆瓣网"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_tieba" data-cmd="tieba" title="分享到百度贴吧"></a><a href="#" class="bds_youdao" data-cmd="youdao" title="分享到有道云笔记"></a><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"24"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
	<?php if(get_post($id)->post_author  =='1'){ if(isset($smof_data['author_box'])) { if($smof_data['author_box'] =='1') { ?>
<h3>本文 <strong>作者</strong></h3>
<div class="uazoh7-post-author">
  <figure><?php if(isset($smof_data['author_avatar']['url']) && ($smof_data['author_avatar']['url'] !='')) { ?>
	<img src="<?php echo $smof_data['author_avatar']['url']; ?>" alt="<?php echo $smof_data['author_name']; ?>"><?php } else { ?>
	<img src="<?php echo get_template_directory_uri(); ?>/img/author_avatar.png" alt="<?php echo $smof_data['author_name']; ?>"><?php }?></figure>
  <p class="name"><?php echo $smof_data['author_name']; ?></p>
  <p class="role"><?php echo $smof_data['author_work']; ?></p>
  <p><?php the_author_meta('description'); ?></p>
</div>
<p>&nbsp;</p><?php  }}}else{ ?>
<h3>本文 <strong>作者</strong></h3>
<div class="uazoh7-post-author">
  <figure><?php echo get_avatar( get_the_author_meta('user_email'), '500', '' ); ?></figure>
  <p class="name"><?php the_author_link(); ?></p>
  <p class="role">特约作者</p>
  <p><?php if(the_author_meta('description') !=''){the_author_meta('description');}else{echo '这个人很懒，神马都没写，可以去后台登录创始人帐号，选择用户→我的个人资料→个人说明  填写。';} ?></p>
</div>
<p>&nbsp;</p>
<?php }  if(isset($smof_data['prev_next_posts'])) { if($smof_data['prev_next_posts'] =='1') { ?>
<h3><strong>相关</strong> 文章</h3>
<div class="uazoh7-relative" id="related-posts">
<?php global $post, $wpdb;$post_tags = wp_get_post_tags($post->ID);
if ($post_tags) {
    $tag_list = '';
    foreach ($post_tags as $tag) {
        // 获取标签列表
        $tag_list .= $tag->term_id.',';
    }
    $tag_list = substr($tag_list, 0, strlen($tag_list)-1);

    $related_posts = $wpdb->get_results("
        SELECT DISTINCT ID, post_title, post_content
        FROM {$wpdb->prefix}posts, {$wpdb->prefix}term_relationships, {$wpdb->prefix}term_taxonomy
        WHERE {$wpdb->prefix}term_taxonomy.term_taxonomy_id = {$wpdb->prefix}term_relationships.term_taxonomy_id
        AND ID = object_id
        AND taxonomy = 'post_tag'
        AND post_status = 'publish'
        AND post_type = 'post'
        AND term_id IN (" . $tag_list . ")
        AND ID != '" . $post->ID . "'
        ORDER BY RAND()
        LIMIT {$smof_data['prev_next_posts_num']}");

    if ( $related_posts ) {
        foreach ($related_posts as $related_post) { ?>
     <article class="uazoh7-post-preview uazoh7-padding-left-30">
    <div class="uazoh7-post-preview-inner">
      <header>
        <a href="<?php echo get_permalink($related_post->ID); ?>"><?php echo mb_strimwidth(strip_tags(apply_filters('the_title', $related_post->post_title)), 0, 36,…); ?></a>
      </header>
      <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $related_post->post_content)), 0, 80,…); ?></p>
    </div>
  </article>
<?php }}} ?>

  <div class="uazoh7-navigation uazoh7-navigation-left rivaslider-navigation">
    <a href="" class="back"><i class="fa fa-chevron-left"></i></a>
    <a href="" class="forward"><i class="fa fa-chevron-right"></i></a>

  </div>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p><?php }} ?>