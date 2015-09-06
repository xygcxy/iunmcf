<?php
header("Content-Type: text/html; charset=UTF-8");
include("./lib/db.class.php");
include("./lib/connect.php");
$db = new DB();

$showtime=date("Y-m-d");
$dateArray = explode('-',$showtime);
$dataYear = substr($dateArray[0], 2, 2);

$apply_type = $_POST['apply_type'];


if ($apply_type == 'film') {
	$count = $db->count("SELECT COUNT(*) FROM `apply_film`");
	$apply_id = 'F'.$dataYear.$dateArray[1].$dateArray[2].sprintf("%05d", $count+1);
	$film_array = array(
		'work_name'	=>	$_POST['work_name'],
		'apply_id' => $apply_id,
		'work_type'	=>	$_POST['work_type'],
		'duration'	=>	$_POST['duration'],
		'instructor'	=>	$_POST['instructor'],
		'tel'	=>	$_POST['tel'],
		'email'	=>	$_POST['email'],
		'address'	=>	$_POST['address'],
		'introduction'	=>	$_POST['introduction'],
		'product_system'	=>	$_POST['product_system'],
		'manufacturer'	=>	$_POST['manufacturer'],
		'producer'	=>	$_POST['producer'],
		'director'	=>	$_POST['director'],
		'planner'	=>	$_POST['planner'],
		'photoer'	=>	$_POST['photoer'],
		'editor'	=>	$_POST['editor'],
		'sound'	=>	$_POST['sound'],
		'light'	=>	$_POST['light'],
		'actor'	=>	$_POST['actor'],
		'other'	=>	$_POST['other'],
		'contact'	=>	$_POST['contact'],
		'team_tel'	=>	$_POST['team_tel'],
		'person_name'	=>	$_POST['person_name'],
		'gender'	=>	$_POST['gender'],
		'birth'	=>	$_POST['birth'],
		'profession'	=>	$_POST['profession'],
		'edu_background'	=>	$_POST['edu_background'],
		'grade'	=>	$_POST['grade'],
		'academy'	=>	$_POST['academy'],
		'person_tel'	=>	$_POST['person_tel'],
		'person_email'	=>	$_POST['person_email'],
		'person_address'	=>	$_POST['person_address'],
		'access'	=>	$_POST['access']
	);
	if($db->insert('apply_film', $film_array)){
		echo "<script type=\"text/javascript\">alert('报名成功');</script>";
		header("Location:film_back.php?apply_id=".$apply_id);
		exit;
	}else{
		echo "<script type=\"text/javascript\">alert('报名错误,请仔细核查你所填的信息');</script>";
		echo "<script type=\"text/javascript\">history.go(-1);</script>";
	}
	
} else if ($apply_type == 'communication') {
	$count = $db->count("SELECT COUNT(*) FROM `apply_communication`");
	$apply_id = 'C'.$dataYear.$dateArray[1].$dateArray[2].sprintf("%05d", $count+1);
	$communication_array = array(
		'wechat_name'	=>	$_POST['wechat_name'],
		'apply_id' => $apply_id,
		'wechat_type'	=>	$_POST['wechat_type'],
		'manager'	=>	$_POST['manager'],
		'tel'	=>	$_POST['tel'],
		'email'	=>	$_POST['email'],
		'address'	=>	$_POST['address'],
		'person_name'	=>	$_POST['person_name'],
		'gender'	=>	$_POST['gender'],
		'edu_background'	=>	$_POST['edu_background'],
		'birth'	=>	$_POST['birth'],
		'profession'	=>	$_POST['profession'],
		'grade'	=>	$_POST['grade'],
		'id_number'	=>	$_POST['id_number'],
		'academy'	=>	$_POST['academy'],
		'person_tel'	=>	$_POST['person_tel'],
		'person_email'	=>	$_POST['person_email'],
		'person_address'	=>	$_POST['person_address'],
		'access'	=>	$_POST['access']
	);
	if($db->insert('apply_communication', $communication_array)){
		echo "<script type=\"text/javascript\">alert('报名成功');</script>";
		header("Location:communication_back.php?apply_id=".$apply_id);
		exit;
	}else{
		echo "<script type=\"text/javascript\">alert('报名错误,请仔细核查你所填的信息');</script>";
		echo "<script type=\"text/javascript\">history.go(-1);</script>";
	}
} else if ($apply_type == 'design') {
	$count = $db->count("SELECT COUNT(*) FROM `apply_design`");
	$apply_id = 'D'.$dataYear.$dateArray[1].$dateArray[2].sprintf("%05d", $count+1);
	$design_array = array(
		'design_name'	=>	$_POST['design_name'],
		'apply_id' => $apply_id,
		'online_address'	=>	$_POST['online_address'],
		'instructor'	=>	$_POST['instructor'],
		'tel'	=>	$_POST['tel'],
		'email'	=>	$_POST['email'],
		'id_number' => $_POST['id_number'],
		'address'	=>	$_POST['address'],
		'introduction'	=>	$_POST['introduction'],
		'person_name'	=>	$_POST['person_name'],
		'gender'	=>	$_POST['gender'],
		'birth'	=>	$_POST['birth'],
		'profession'	=>	$_POST['profession'],
		'edu_background'	=>	$_POST['edu_background'],
		'grade'	=>	$_POST['grade'],
		'academy'	=>	$_POST['academy'],
		'person_tel'	=>	$_POST['person_tel'],
		'person_email'	=>	$_POST['person_email'],
		'person_address'	=>	$_POST['person_address'],
		'access'	=>	$_POST['access']
	);
	if($db->insert('apply_design', $design_array)){
		echo "<script type=\"text/javascript\">alert('报名成功');</script>";
		header("Location:design_back.php?apply_id=".$apply_id);
		exit;
	}else{
		echo "<script type=\"text/javascript\">alert('报名错误,请仔细核查你所填的信息');</script>";
		echo "<script type=\"text/javascript\">history.go(-1);</script>";
	}
} else if ($apply_type == 'innovation') {
	$count = $db->count("SELECT COUNT(*) FROM `apply_innovation`");
	$apply_id = 'I'.$dataYear.$dateArray[1].$dateArray[2].sprintf("%05d", $count+1);
	$film_array = array(
		'project_name'	=>	$_POST['project_name'],
		'apply_id' => $apply_id,
		'phase'	=>	$_POST['phase'],
		'project_type'	=>	$_POST['project_type'],
		'leader'	=>	$_POST['leader'],
		'tel'	=>	$_POST['tel'],
		'email'	=>	$_POST['email'],
		'address'	=>	$_POST['address'],
		'introduction'	=>	$_POST['introduction'],
		'participate'	=>	$_POST['participate'],
		'park_name'	=>	$_POST['park_name'],
		'id_number' => $_POST['id_number'],
		'person_name'	=>	$_POST['person_name'],
		'gender'	=>	$_POST['gender'],
		'birth'	=>	$_POST['birth'],
		'profession'	=>	$_POST['profession'],
		'edu_background'	=>	$_POST['edu_background'],
		'grade'	=>	$_POST['grade'],
		'academy'	=>	$_POST['academy'],
		'person_tel'	=>	$_POST['person_tel'],
		'person_email'	=>	$_POST['person_email'],
		'person_address'	=>	$_POST['person_address'],
		'access'	=>	$_POST['access']
	);
	if($db->insert('apply_innovation', $film_array)){
		echo "<script type=\"text/javascript\">alert('报名成功');</script>";
		header("Location:innovation_back.php?apply_id=".$apply_id);
		exit;
	}else{
		echo "<script type=\"text/javascript\">alert('报名错误,请仔细核查你所填的信息');</script>";
		echo "<script type=\"text/javascript\">history.go(-1);</script>";
	}
}


?>