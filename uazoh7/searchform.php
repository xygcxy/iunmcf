<form class="search" method="get" action="<?php echo home_url(); ?>/"><input type="text" placeholder="<?php echo __("输入关键词后回车...", "uazoh"); ?>" id="s" name="s" value="<?php the_search_query(); ?>" /><button type="submit" value="Search"><i class="fa fa-search"></i></button></form>