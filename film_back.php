<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" >
<head>
<link rel="stylesheet" type="text/css" href="./styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="./styles/apply_back.css">
	<title>报名成功</title>
</head>
<body>
<div class="main">
<div class="change-en container">Change Language:English</div>
<div class="zh">
	<div class="container"><span>恭喜您线上报名成功！</span></div>
	<div class="container">您的唯一提交报名编号为<span>【<?php echo $_GET['apply_id'] ?>】</span>，请保存！</div>
	<div class="container">接下来请您下载填写<span>【<a href="">新媒体视频参赛授权书</a>】</span>另附<span>【作品光盘】</span>邮寄至国际大学生新媒体文化节组委会（邮寄地址在授权书尾页）</div>
	<div class="container">
	文件下载
		<a href="./document/新媒体视频参赛授权书.zip" class="down"></a>
	</div>
	</div>
	<div class="en">
		<div class="container"><span>Congratulations! Your registration is successfully delivered!
</span></div>
	<div class="container">Your only registration code is<span>【<?php echo $_GET['apply_id'] ?>】</span></div>
	<div class="container"> Now please download and fill in the<span>【<a href="">New Media Video Authorization Form.</a></span>】Please send the <span>CD Of Your Work</span> to IUNWCF Organizing Committee. (The address is included at the bottom of the authorization form)

</div>
	<div class="container">
	Download：
		<a href="./document/新媒体传播参赛授权书.zip" class="down"></a>
	</div>
	</div>
	</div>
	<script type="text/javascript" src="./scripts/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="./scripts/apply.js"></script>

</body>
</html>