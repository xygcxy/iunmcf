<?php 
/*Template Name: infodetail*/
?>
<?php get_header(); ?>
<?php comments_template(); ?> 
<!DOCTYPE html>
<?php
	
	$http = 'http://'.$_SERVER['HTTP_HOST'];
	$film_type = strpos($_SERVER['PHP_SELF'], 'film');
	$communication_type = strpos($_SERVER['PHP_SELF'], 'communication');
	$design_type = strpos($_SERVER['PHP_SELF'], 'design');
	$innovation_type = strpos($_SERVER['PHP_SELF'], 'innovation');
	$id = $_GET['id'];
	 if ($film_type) {
	 	$type_id = '1';
	 } else if ($communication_type) {
	 	$type_id = '2';
	 } else if ($design_type) {
	 	$type_id = '3';
	 } else if ($innovation_type) {
	 	$type_id = '4';
	 }
	$conn = mysql_connect("localhost","root","");
	if (!$conn)
	  {
	  die('Could not connect: ' . mysql_error());
	  }
	mysql_query("set names utf8");
	mysql_query("set global time_zone= '+08:00'");
	mysql_select_db("xikingwenhua", $conn);
	$sql="SELECT * from `competition` WHERE `id` = '1'";
    $result=mysql_query($sql);
    $row=mysql_fetch_array($result);
	// global $wpdb;
	// $mylink = $wpdb->get_row("SELECT * FROM $wpdb->competition WHERE id = 1");
	// print_r($mylink);

?>
<html>
<head>
	<title>作品：<?php echo $row['name']; ?></title>
</head>
<body>
<div class="main">
<div class="head"></div>
	<div class="info">
	<div class="line"></div>
	<div class="title">作品欣赏：<?php echo $row['name']; ?></div>
		<div class="img-logo">
		<img src=<?php echo $http.'/wordpress/wp-content/themes/uazoh7/img/images/'.$row['id'].'.'.'jpg';?> alt=<?php echo $row['name']?> width="500px" height="300px;">
		</div>
		<div class="detail-info">
			<div class="vote">投我一票</div>
			<div class="detail">
				<p>作品编码：<?php echo $row['work_id']; ?></p>
				<p>作品名称：<?php echo $row['name']; ?></p>
				<p>作者姓名：<?php echo $row['author']; ?></p>
				<p>所属院校：<?php echo $row['college']; ?></p>
			</div>
			
		</div>
		<div id="msg"></div> 
	</div>
	<div class="summary">
		<p>简介：</p>
		<p><?php echo $row['introduction']; ?></p>
	</div>
	<div class="production">
		<p class="work-name">名称<?php echo $row['name']; ?></p>
		<!-- <p>系统分类：</p> -->
		<p>作品连接：</p>
		<div class="video-work">
			<embed src=<?php echo $row['url']; ?> quality="high" width="960" height="508" align="middle" allowScriptAccess="always" allowFullScreen="true" mode="transparent" type="application/x-shockwave-flash"></embed>
		</div>
	</div>
	<br/>
	<div class="comment">
		<div class="line"></div>
		<div class="title">去评论</div>
		<div class="wechat-code"></div>
	</div>

</div>
<!-- 多说评论框 start -->
	<div class="ds-thread" data-thread-key=<?php echo $id ?> data-title=<?php echo '作品：'.$row['name']?> data-url="http://localhost/wordpress/index.php/film/film_list/film_info/"></div>
<!-- 多说评论框 end -->
<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
<script type="text/javascript" src=<?php echo $http.'/wordpress/wp-content/themes/uazoh7/js/jquery-1.8.0.min.js';?>></script>
<script type="text/javascript">
var duoshuoQuery = {short_name:"xyg-blog"};
	(function() {
		var ds = document.createElement('script');
		ds.type = 'text/javascript';ds.async = true;
		ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
		ds.charset = 'UTF-8';
		(document.getElementsByTagName('head')[0] 
		 || document.getElementsByTagName('body')[0]).appendChild(ds);
	})();

    $(".vote").click(function(){ 
    	var id = "<?php echo $id;?>";
    	var url = "<?php echo $http.'/wordpress/wp-content/themes/uazoh7/vote.php';?>";
        getdata(url+"?id="+id,id); 
    }); 

    function getdata(url,sid){ 
    $.getJSON(url,{id:sid},function(data){    
    	if(data.success==1){//投票成功 
            alert('投票成功');
        }else{//投票失败 
            $("#msg").html(data.msg).show().css({'opacity':1,'top':'40px'}) 
            .animate({top:'-50px',opacity:0}, "slow"); 
            $('.vote').css('background', '#c9cacb');
        } 

    	}); 
	};
	</script>
<!-- 多说公共JS代码 end -->
</body>
</html>

<?php get_footer(); ?>