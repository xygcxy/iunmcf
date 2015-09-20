<?php
$conn = mysql_connect("localhost","root","");
if (!$conn)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_query("set names utf8");
mysql_query("set global time_zone= '+08:00'");
mysql_select_db("xikingwenhua", $conn);
$id = $_GET['id']; 
$ip = get_client_ip();//获取ip 
 

likes(1,$id,$ip); 


function likes($type,$id,$ip){ 
    $ip_sql=mysql_query("select ip from votes_ip where vid='$id' and ip='$ip'"); 
    $count=mysql_num_rows($ip_sql); 
    if($count==0){//还没有顶过 
        if($type==1){//顶 
            $sql = "update competition set vote = vote+1 where id=".$id; 
        }
        mysql_query($sql); 
         
        $sql_in = "insert into votes_ip (vid,ip) values ('$id','$ip')"; 
        mysql_query($sql_in); 
         
        if(mysql_insert_id()>0){ 
            echo jsons($id); 
        }else{ 
            $arr['success'] = 0; 
            $arr['msg'] = '操作失败，请重试'; 
            echo json_encode($arr); 
        } 
    }else{ 
        $msg = $type==1?'您已经投过票了':'您已经投过票了'; 
        $arr['success'] = 0; 
        $arr['msg'] = $msg; 
        echo json_encode($arr); 
    } 
}  

function jsons($id){
	$query = mysql_query("select * from competition where id='$id'");
	$row = mysql_fetch_array($query);
	$vote = $row['vote'];
	$type = $row['type'];
	$count_query = mysql_query("select SUM(vote) as count FROM competition where type = '$type'");
	$row_count = mysql_fetch_array($count_query);
	$arr['success']=1;
	$arr['like'] = $vote;
	$count = $row_count['count'];
	if($count != '0') {
		$like_percent = round($vote/$count,3)*100;
	} else {
		$like_percent = '0';
	}
	$arr['like_percent'] = $like_percent.'%';
	
	return json_encode($arr);
}

//获取用户真实IP
function get_client_ip() {
	if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
		$ip = getenv("HTTP_CLIENT_IP");
	else
		if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
			$ip = getenv("HTTP_X_FORWARDED_FOR");
		else
			if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
				$ip = getenv("REMOTE_ADDR");
			else
				if (isset ($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
					$ip = $_SERVER['REMOTE_ADDR'];
				else
					$ip = "unknown";
	return ($ip);
}

?>