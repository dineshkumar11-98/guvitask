<?php
include 'dp.php';
session_start();
$post =$_POST;
$query = "select * from users;";
$allData = $connect->prepare($query);
$allData->execute();
$getData = $allData->get_result();
$Checkstatus = "false";
while($datas = $getData->fetch_assoc()){
	if($datas['User_name'] == $post['username'] && $datas['Password'] == $post['password']){
		$_SESSION['name'] = $datas['Name'];
		$_SESSION['username'] = $datas['User_name'];
		$_SESSION['email'] = $datas['E_mail'];
		$Checkstatus = "true";
		break;
	}else {
		$Checkstatus = "false";
	}
}
echo $Checkstatus;
?>