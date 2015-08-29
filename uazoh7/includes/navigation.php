<?php
/*

Posts Navigation Function

*/
function uazoh_navigation($pages = '', $range = 2)
{
	$showitems = ($range * 2)+1; 

	global $paged;
	if(empty($paged)) $paged = 1;

	if($pages == '')
	{
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages)
		{
		 $pages = 1;
		}
	}  

	if(1 != $pages)
		{
		echo "<div class=\"uazoh7-pagination\">";
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a class=\"next page-numbers\" href='".get_pagenum_link(1)."'>&laquo; ".__('第一页', 'uazoh')."</a>";
		if($paged > 1 && $showitems < $pages) echo "<a class=\"next page-numbers\" href='".get_pagenum_link($paged - 1)."'>&lsaquo; ".__('上一页', 'uazoh')."</a>";

		for ($i=1; $i <= $pages; $i++)
		{
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
				{
					 echo ($paged == $i)? "<span class=\"page-numbers current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"page-numbers\">".$i."</a>";
				}
		}

		if ($paged < $pages && $showitems < $pages) echo "<a class=\"next page-numbers\" href=\"".get_pagenum_link($paged + 1)."\">".__('下一页', 'uazoh')." &rsaquo;</a>";
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a class=\"next page-numbers\" href='".get_pagenum_link($pages)."'>".__('最后一页', 'uazoh')." &raquo;</a>";
		echo "</div>\n";
		}
	}
?>
