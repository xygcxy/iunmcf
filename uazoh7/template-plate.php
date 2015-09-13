<?php 
/*
Template Name: plate
*/
?>
<?php get_header(); ?>
<?php 
 $http = 'http://'.$_SERVER['HTTP_HOST'];
 $film_type = strpos($_SERVER['PHP_SELF'], 'film');
 $communication_type = strpos($_SERVER['PHP_SELF'], 'communication');
 $design_type = strpos($_SERVER['PHP_SELF'], 'design');
 $innovation_type = strpos($_SERVER['PHP_SELF'], 'innovation');
 if ($film_type) {
 	$type_id = '1';
 	$info = 'film_list/film_info';
 } else if ($communication_type) {
 	$type_id = '2';
 	$info = 'communication_list/communication_info';
 } else if ($design_type) {
 	$type_id = '3';
 	$info = 'design_list/design_info';
 } else if ($innovation_type) {
 	$type_id = '4';
 	$info = 'innovation_list/innovation_info';
 }
 		$conn = mysql_connect("localhost","root","");
		if (!$conn)
		  {
		  die('Could not connect: ' . mysql_error());
		  }
		mysql_query("set names utf8");
		mysql_query("set global time_zone= '+08:00'");
		mysql_select_db("xikingwenhua", $conn);
        $Page_size=12; //每页显示的条目数
		$sql="SELECT * from `competition` WHERE type = '$type_id' limit 5";
        $result=mysql_query($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php uazoh_breadcrumbs()?></title>
	<style>
		.li_change{cursor:pointer;color:#000;background-color:#f1f1f2;width:180px;height:68px;text-align:center;line-height:68px;margin-bottom:5px;}
		.li_change:hover {background-color:#c9cacb;color: #fff}
		.info a{color: black; text-decoration: none}
		#div_content div{width:185px;float:left;margin:0 10px 0 0;padding:0;padding-bottom: 40px; background-color: #f1f1f2}
		#div_content img{width: 185px;height: 120px;}
		#div_content span{width: 185px;font-size: 10px;display: inline-block;text-align: center;color: black;}
		.prize{list-style: none;margin:0;padding:0;}
		#slides { display:block; width:100%; height:300px; list-style:none; padding:0; margin:0; position:relative}
		#slides li { display:block; width:100%; height:100%; list-style:none; padding:0; margin:0; position:absolute}
		#slides li a { display:block; width:100%; height:100%; text-indent:-9999px}
		#pagination { display:none; list-style:none; position:absolute; left:50%; top:270px; z-index:9900;  padding:5px 15px 5px 0; margin:0}
		#pagination li { display:none; list-style:none; width:10px; height:10px; float:left; margin-left:15px; border-radius:5px; background:#FFF }
		#pagination li a { display:none; width:100%; height:100%; padding:0; margin:0;  text-indent:-9999px;}
		#pagination li.current { background:#0297c9}
	</style>
	<script language="JavaScript" type="text/javascript"> 
		function ChangeDiv(divId,divName,zDivCount,spanName) 
		{ 
		 for(i=0;i<=zDivCount;i++)
		 {
		   document.getElementById(divName+i).style.display="none"; 
		   document.getElementById(spanName+i).style.color="black";
		   document.getElementById(spanName+divId).style.backgroundColor="#f1f1f2";
		 }
		 document.getElementById(divName+divId).style.display="block"; 
		 document.getElementById(spanName+divId).style.color="#fff";
		 document.getElementById(spanName+divId).style.backgroundColor="#c9cacb";
		}
	</script> 
	
</head>
<body style="margin:0;padding:0;">
	<!-- 视频图片轮播显示 -->
	<div style="margin:0 auto;width:960px;">	
		<div style="margin:20px auto;padding:0;width:810px;height:360px;float:left;">
			<div id="JKDiv_0" style="width:810px;height:360px;border:solid 6px #cccccc;">
			<embed src="http://player.youku.com/player.php/Type/Folder/Fid/26062385/Ob/1/sid/XMTMyOTEzMDQwOA==/v.swf" quality="high" width="798" height="348" align="middle" allowScriptAccess="always" allowFullScreen="true" mode="transparent" type="application/x-shockwave-flash"></embed>
			</div> 
			<div id="JKDiv_1"
			style="display:none;width:810px;height:360px;border:solid 6px #cccccc;">
			内容部分第二区
			</div> 
			<div id="JKDiv_2"
			style="display:none;width:810px;height:360px;border:solid 6px #cccccc;">
			内容部分第三区
			</div> 
			<div id="JKDiv_3"
			style="display:none;width:810px;height:360px;border:solid 6px #cccccc;">
			内容部分第四区
			</div>
			<div id="JKDiv_4"
			style="display:none;width:810px;height:360px;border:solid 6px #cccccc;">
			内容部分第五区
			</div>
		</div>

		<div style="margin:20px auto;padding:0;width:150px;height:358px;float:left">
			<ul style="list-style:none;margin:0;padding:0;">
				<li id="span_0" class="li_change" onclick="JavaScript:ChangeDiv('0','JKDiv_',4,'span_')">内容一</li>
				<li id="span_1" class="li_change" onclick="JavaScript:ChangeDiv('1','JKDiv_',4,'span_')">内容二</li>
				<li id="span_2" class="li_change" onclick="JavaScript:ChangeDiv('2','JKDiv_',4,'span_')">内容三</li>
				<li id="span_3" class="li_change" onclick="JavaScript:ChangeDiv('3','JKDiv_',4,'span_')">内容四</li>
				<li id="span_4" class="li_change" onclick="JavaScript:ChangeDiv('4','JKDiv_',4,'span_')" style="margin-bottom:0;">内容五</li>
			</ul>
		</div>
		<div style="clear:both;"> </div>
		<!-- 展示图片 -->
		<div style="margin-top:10px;">
			<img src=<?php echo $http.'/wordpress/wp-content/themes/uazoh7/img/images/pic01.jpg';?> width="858px;">
		</div>
		<!-- 作品一览 -->
		<div style="margin-top:15px;width:960px;">
			<div class="info">
			<div class="line"></div>
				<div style="float:left;margin-left:10px;font-size:20px;line-height: 33px;"> 作品一览</div>
				<div style="float:right;"> 
					<a href="#" onclick=<?php echo 'ajaxRequest('.$type_id.')'; ?> style="margin-right:30px;" class="change"> <img src=<?php echo $http.'/wordpress/wp-content/themes/uazoh7/img/images/2-5.jpg';?>> 换一换 </a> <a href="film_list"> 更多>> </a>
				</div>
			</div>
			<div style="clear:both;"></div>
			<div id="div_content" style="width:1100px;height:160px;margin-top:10px;">
				<?php while ($row = mysql_fetch_array($result)) { ?>
				<div><a href=<?php echo $info.'?id='.$row['id'];?>><img src=<?php echo 'http://localhost/wordpress/wp-content/themes/uazoh7/img/images/'.$row['id'].'.jpg'?>><span><?php echo $row['name'];?></span></a></div>
				<?php }?>
			</div>
		</div>
		<div style="width:960px;height:300px;margin-top:10px;">
			<div class="info">
			<div class="line"></div>
				<div style="float:left;margin-left:10px;font-size:20px;line-height: 33px;"> 奖项设置 </div>
				
				<div style="float:right; width:340px"> 
				<div class="line"></div>
					<span style="margin-left:10px;font-size:20px;line-height: 33px;"> 专家评审 </span><a href="#" class="judge_more" style="float:right"> 更多>> </a>
				</div>
			</div>
			<div style="clear:both;"></div>
			<div class="left" style="width:560px;height:250px;float:left;margin-top:10px;">
				<ul class="prize">
					<li>
						<div style="padding: 16px 34px;background-color:#c9cacb;float:left;color:#fff"> 年度奖 </div>
						<div style="width:410px;height:56px;float:right;">
						最佳视频，最佳音效，最佳译制，最佳校园题材，最佳原创动画，最具人文关怀，最具商业价值，最具传播价值
						</div>
						<div style="clear:both;"></div>
					</li>
					<li>
						<div style="padding:18px 20px;background-color:#c9cacb;margin-top:20px;float:left;color:#fff"> 新锐个人奖 </div>
						<div style="width:410px;height:56px;float:right;margin-top:20px;">
						最佳视频，最佳音效，最佳译制，最佳校园题材，最佳原创动画，最具人文关怀，最具商业价值，最具传播价值	
						</div>
						<div style="clear:both;"></div>
					</li>
					<li>
						<div style="padding:18px 34px;;background-color:#c9cacb;margin-top:20px;float:left;color:#fff"> 影片奖 </div>
						<div style="width:410px;height:56px;float:right;margin-top:20px;">
						最佳视频，最佳音效，最佳译制，最佳校园题材，最佳原创动画，最具人文关怀，最具商业价值，最具传播价值	
						</div>
						<div style="clear:both;"></div>
					</li>
				</ul>
			</div>
			<div class="right" style="width:340px;height:250px;float:right;margin-top:10px;">
				
					<!-- <img src=<?php //echo $http.'/wordpress/wp-content/themes/uazoh7/img/images/2-4.jpg';?>> -->
					<ul id="slides">
					<?php 
						$conn = mysql_connect("localhost","root","");
						if (!$conn)
						  {
						  die('Could not connect: ' . mysql_error());
						  }
						mysql_query("set names utf8");
						mysql_query("set global time_zone= '+08:00'");
						mysql_select_db("xikingwenhua", $conn);
				        $Page_size=12; //每页显示的条目数
						$sql="SELECT * from `arbiter` limit 3";
				        $result=mysql_query($sql);
				        while ($row=mysql_fetch_array($result)) {	
					?>
					<a href=<?php echo '/wordpress/wp-content/themes/uazoh7/arbiter/?id='.$row['id']; ?>>
						<li>
						
							<img src=<?php echo $http.'/wordpress/wp-content/themes/uazoh7/img/arbiter/'.$row['id'].'.jpg';?> width:"340px";height:"240px"; style="float:left;">
							<div style="width:150px;height:240px;float:right;">
								<?php echo $row['introduction']; ?>
							</div>
						</li>
						</a>
						<?php  }?>
						<!-- <li>
							<img src=<?php //echo $http.'/wordpress/wp-content/themes/uazoh7/img/images/2.jpg';?> width:"340px";height:"240px"; style="float:left;">
							<div style="width:150px;height:240px;float:right;">
								2222.啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊
							</div>
						</li>
						<li>
							<img src=<?php //echo $http.'/wordpress/wp-content/themes/uazoh7/img/images/xxx.jpg';?> width:"340px";height:"240px"; style="float:left;">
							<div style="width:150px;height:240px;float:right;">
								3333.哦哦哦 哦哦哦哦哦哦哦哦哦哦哦哦哦哦哦哦哦哦哦哦哦哦哦哦哦哦哦哦哦哦哦哦
							</div>
						</li> -->
					</ul>
				<div style="clear:both;"></div>
			</div>
		</div>
		<div style="clear:both;"></div>
	</div>
	<script type="text/javascript" src=<?php echo $http.'/wordpress/wp-content/themes/uazoh7/js/jquery-1.8.0.min.js';?>></script>
	<script type="text/javascript" src=<?php echo $http.'/wordpress/wp-content/themes/uazoh7/js/change.js'?>></script>
	<script type="text/javascript" src=<?php echo $http.'/wordpress/wp-content/themes/uazoh7/js/flash.js';?>></script>
</body>
</html>
<?php get_footer(); ?>