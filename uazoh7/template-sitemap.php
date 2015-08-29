<?php 
/*
Template Name: Sitemap
*/
?>
<?php get_header(); ?>
<section class="uazoh7-section">
        <div class="container">
          <div class="row">
           <div id="page-<?php the_ID(); ?>" <?php post_class('elements-box'); ?>><?php the_content(); ?></div>
				<?php
					$where = apply_filters( 'getarchives_where', "WHERE post_type = 'post' AND post_status = 'publish'" );
					$join = apply_filters( 'getarchives_join', '' );
					$query = "SELECT YEAR(post_date) AS `year`, count(ID) as posts FROM $wpdb->posts $join $where GROUP BY YEAR(post_date) ORDER BY post_date DESC";
					$key = md5($query);
					$cache = wp_cache_get( 'wp_get_archives' , 'general');
					if ( !isset( $cache[ $key ] ) ) {
						$arcresults = $wpdb->get_results($query);
						$cache[ $key ] = $arcresults;
						wp_cache_set( 'wp_get_archives', $cache, 'general' );
					} else {
						$arcresults = $cache[ $key ];
					}
					if ($arcresults) {
						foreach ( (array) $arcresults as $arcresult) { ?>
<h2 class="timeline-head"><?php echo $arcresult->year ?></h2><?php $query = new WP_Query( array( 'year' => $arcresult->year , 'posts_per_page' => -1 ) ); ?>
<ul class="timeline"><?php while ( $query->have_posts() ) : $query->the_post()?>
<li><span><?php the_time('F j日') ?></span><a href="<?php the_permalink(); ?>" title="<?php printf( __( '%s', 'uazoh' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></li><?php endwhile; ?>
</ul>
<?php	}} ?>
	
<div id="sitemap">
						<div class="sitemap-col">
							<h2>Pages</h2>
							<ul id="sitemap-pages"><?php wp_list_pages('title_li='); ?></ul>
						</div> <!-- end .sitemap-col -->
						<div class="sitemap-col">
							<h2>Categories</h2>
							<ul id="sitemap-categories"><?php wp_list_categories('title_li='); ?></ul>
						</div> <!-- end .sitemap-col -->
</div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>