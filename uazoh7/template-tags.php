<?php 
/*
Template Name: Tags
*/
?>
<?php get_header(); ?>
<section class="uazoh7-section">
        <div class="container">
          <div class="row">
           <div class="col-lg-12 col-md-12">
            <div class="uazoh7-widget uazoh7-tags-widget">
              <h3>文章 <strong>Tags</strong></h3>
              <div class="uazoh7-widget-inner">
                <?php wp_tag_cloud('smallest=11&largest=37&number=3000&orderby=count'); ?>
              </div>
            </div>
          </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>