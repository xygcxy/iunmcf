<?php 
/*
Template Name: list
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
 	$info = 'film_info';
 } else if ($communication_type) {
 	$type_id = '2';
 	$info = 'communication_info';
 } else if ($design_type) {
 	$type_id = '3';
 	$info = 'design_info';
 } else if ($innovation_type) {
 	$type_id = '4';
 	$info = 'innovation_info';
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php uazoh_breadcrumbs()?></title>
	<style>
		a{text-decoration: none;}
		.page{
			text-align: center;
		}
		.page .currentPage{
			background: none repeat scroll 0 0 #72A10E;
		    border: 1px solid #72A10E;
		    color: #FFFFFF;
		    display: inline-block;
		    height: 22px;
		    line-height: 22px;
		    text-align: center;
		    width: 26px;
			}
		.page .notCurPage{
			background: none repeat scroll 0 0 #eee;
		    border: 1px solid #bbb;
		    color: #000;
		    display: inline-block;
		    height: 22px;
		    line-height: 22px;
		    text-align: center;
		    width: 26px;
			}
		.year a:hover{
			background-color: #c9cacb
		}
		ul{
		    list-style: none;
		    padding: 0;
		    margin-top: 5px;
		    overflow: hidden;
		}
		li{
			float: left;
		}
		li a{
			display: block;
		}
	</style>
</head>
<body style="margin:0;padding:0;">
	<div style="width:960px;overflow:hidden;margin:0 auto;padding:0;">
		<!-- <div style="width:960px;height:50px;margin:0;padding:0;line-height:50px;">首页>新媒体视频>新媒体视频作品浏览</div> -->
		<div class="line"></div>
		<div style="width:200px;height:30px;margin:0;padding:0;line-height:30px;font-size:20px;line-height:34px;margin-left:10px">
		新媒体<?php if ($film_type) echo "视频";?><?php if ($communication_type) echo "传播";?><?php if ($design_type) echo "设计";?><?php if ($innovation_type) echo "创新";?>作品浏览
		</div>
		<ul>
			<li style="width:100px;margin-top:20px;padding:10px 20px 10px 20px;line-height:30px;background-color:#c9cacb;text-align:center" class="year">2015</li>
			<li style="width:100px;margin-top:20px;line-height:30px;background-color:#f1f1f2;text-align:center;margin-left:20px;" class="year"><a href="#" style="padding:10px 20px 10px 20px;">历届回顾</a></li>
		</ul>
		
		<div style="width:960px;margin:0;padding:0;padding-bottom:50px;overflow:hidden">
			
			<div style=""> 
    	
		<div style="">
            <div style="width:980px;margin:0 0 10px 0px;float:left;">                
                <div>
                    <div>  
                    </div>                    
        <!-- 读取视频图片排列-->       
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
		$sql="SELECT * from `competition` WHERE type = '$type_id'";
        $result=mysql_query($sql);		
        $count = mysql_num_rows($result); 
        $page_count = ceil($count/$Page_size); //总显示页数
        if($page_count<=0){$page_count=1;}
        $init=1; 
        $page_len=7; 
        $max_p=$page_count;
        $pages=$page_count;
        
        //判断当前页码 
        if (empty($_GET['page'])||$_GET['page']<1) { 
            $page=1; 
        } else { 
            $page=$_GET['page']; 
        } 
		  $offset=$Page_size*($page-1); 
          $sql = "SELECT * from `competition` WHERE type = '$type_id' limit $offset,$Page_size";
          $result = mysql_query($sql);
          $nums = mysql_num_rows($result); 
			?>		
			 <?php  while ($row=mysql_fetch_array($result)) { ?>
           <div style="width:290px; height:280px; border:1px solid #c9cacb;margin:10px 35px 30px 0px; float:left;">    
                <div style="margin:0px auto;">
                    <a href=<?php echo $info.'?id='.$row['id'];?>
                    <center><img src=<?php echo $http.'/wordpress/wp-content/themes/uazoh7/img/images/'.$row['id'].'.'.'jpg'?> width="290px" height="216px" /></center>
                	</a>
                </div>
                <div style="width:290px; margin:0px auto;height:60px;">
	                <a href="#">
	                    <p align="left"><?php echo $row['name']?></p>
	                </a>
                </div>
            </div>
            <?php } ?>
                	 <br/>
                    
            </div>
            </div>
			
            </div>
            <br/>
              <!--页码显示-->
<?php
                $page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数 
                $pageoffset = ($page_len-1)/2;//页码个数左右偏移量 
                
                $key='<div class="page">'; 
                $key.="<span>$page/$pages&nbsp;&nbsp;</span> "; //第几页,共几页 
                if($page!=1){ 
					$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=1\"><span>&nbsp;第一页&nbsp;</span></a> "; //第一页 
					$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."\"><span>&nbsp;上一页&nbsp;</span></a>"; //上一页 
                }
				else { 
					$key.="&nbsp;第一页&nbsp;";//第一页 
					$key.="&nbsp;上一页&nbsp;"; //上一页 
                } 
                if($pages>$page_len){ 
                //如果当前页小于等于左偏移 
					if($page<=$pageoffset){ 
						$init=1; 
						$max_p = $page_len; 
					}
					else{//如果当前页大于左偏移 
						//如果当前页码右偏移超出最大分页数 
						if($page+$pageoffset>=$pages+1){ 
							$init = $pages-$page_len+1; 
						}
						else{ 
							//左右偏移都存在时的计算 
							$init = $page-$pageoffset; 
							$max_p = $page+$pageoffset; 
							} 
                	} 
                } 
                for($i=$init;$i<=$max_p;$i++){ 
					if($i==$page){ 
						$key.=' <span class="currentPage">'.$i.'</span>'; 
					}
					else { 
						$key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".$i."\"><span class='notCurPage'>".$i."</span></a>"; 
					} 
                } 
                if($page!=$pages){ 
					$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."\">&nbsp;下一页&nbsp;</a> ";//下一页 
					$key.="<a href=\"".$_SERVER['PHP_SELF']."?page={$pages}\">&nbsp;最后一页&nbsp;</a>"; //最后一页 
                }else { 
					$key.="&nbsp;下一页&nbsp; ";//下一页 
					$key.="&nbsp;最后一页&nbsp;"; //最后一页 
                } 
                $key.='</div>'; 
                ?>
		
                <div class="page"><?php echo $key?></div>
            </div>

		</div>
		<div style=""></div>
	</div>
</body>
</html>
<?php get_footer(); ?>