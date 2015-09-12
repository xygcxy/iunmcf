<?php
	header("Content-Type: text/html; charset=utf-8");
    function select(){
        $conn = mysql_connect("localhost","root","");
        if (!$conn)
          {
          die('Could not connect: ' . mysql_error());
          }
        mysql_query("set names utf8");
        mysql_query("set global time_zone= '+08:00'");
        mysql_select_db("xikingwenhua", $conn);
        $type_id = $_GET['type_id'];
        $sql = "SELECT * from `competition` order by rand() limit 5 where `type` = '$type_id'";
        $result = mysql_query($sql); 
        $nums = mysql_num_rows($result);
        while ($row=mysql_fetch_array($result)){
               $data[]=$row;
        }
        echo json_encode($data);
    }
    echo select(); 
?>