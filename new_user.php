<?php
include 'dp.php';
$post = $_POST;
$query = "select User_name from users;";
$selectedData = $connect->prepare($query);
$selectedData->execute();
$result = $selectedData->get_result();
$userExistStatus = false;
while($users = $result->fetch_assoc()){
	if($post['username'] == $users['User_name']){
		$userExistStatus = true;
		break;
	}elseif($post['username'] !=$users['User_name']) {
		$userExistStatus = false;
	}
}
$selectedData->close();
if($userExistStatus == true ){
	echo "false";
}elseif ($userExistStatus == false) {
	$insertquery = "insert into users values(?,?,?,?);";
	$insertData = $connect->prepare($insertquery);
	$insertData->bind_param("ssss",$post['name'],$post['email'],$post['username'],$post['npassword']);
	$insertData->execute();
	$insertData->close();
	$rawJsonFileData = file_get_contents("users.json");
	$decodeJsonFileData = json_decode($rawJsonFileData,true);
	$jsonDatas = array(
		"Name" => $post['name'],
		"Email" => $post['email'],
		"UserName" => $post['username'],
		"Password" => $post['npassword'],
	);
	$decodeJsonFileData[$post['username']] = $jsonDatas;
	file_put_contents("users.json",json_encode($decodeJsonFileData));
	echo "true";
}
$connect->close();
?>