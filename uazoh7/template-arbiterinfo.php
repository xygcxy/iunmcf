<?php 
/*Template Name: arbiterinfo*/
?>
<?php get_header(); ?>
<?php comments_template(); ?> 
<!DOCTYPE html>
<?php

	$dir = '/wordpress/wp-content/themes/uazoh7/img/arbiter/';	
	$http = 'http://'.$_SERVER['HTTP_HOST'];
	$id = $_GET['id'];
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
	<div class="title">评委简介：<?php echo $row['name']; ?></div>
		<div class="img-logo">
		<img src=<?php echo $http.$dir.$row['id'].'.'.'jpg';?> alt=<?php echo $row['name']?> width="200px" height="250px;">
		</div>
		<div class="detail-info">
			<!-- <div class="vote">投我一票</div> -->
			<div class="detail">
				<p>姓名：<?php echo $row['name']; ?></p>
				<p>简介：<?php echo $row['introduction']; ?></p>
				<!-- <p>作者姓名：<?php //echo $row['author']; ?></p>
				<p>所属院校：<?php //echo $row['college']; ?></p> -->
			</div>
			
		</div>
		<div id="msg"></div> 
	</div>
	<!-- <div class="summary">
		<p>简介：</p>
		<p><?php //echo $row['introduction']; ?></p>
	</div> -->

</div>
</body>
</html>

<?php get_footer(); ?>