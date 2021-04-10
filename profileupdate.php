<?php
	session_start();
	include "dp.php";

	$query = "select * from user_details;";
    $userDataCollect = $connect->prepare($query);
    $userDataCollect->execute();
    $getRawUserData = $userDataCollect->get_result();
	if($_POST){
		$age = $_POST['age'];
		$dob = $_POST['dob'];
		$contact = $_POST['contact'];
		$userName = $_SESSION['username'];
		$status = 'false';
		while($refinedUserData = $getRawUserData->fetch_assoc()){
			if($_SESSION['username']){
				if($refinedUserData['User_name'] == $_SESSION['username']){
					$updatequery = "UPDATE user_details SET Age=?,DOB=?,Contact=? where User_name=?;";
					$getUserData = $connect->prepare($updatequery);
					$getUserData->bind_param("isss",$age,$dob,$contact,$userName);
					$getUserData->execute();
					$status = 'true';
					break;
				}else{
					$status = 'false';
				}
			}else{
				header("Location: index.html");
			}	
		}
		if($status == 'false'){
					$insertQuery = "INSERT INTO user_details VALUES (?,?,?,?);";
					$getUserData = $connect->prepare($insertQuery);
					$getUserData->bind_param("siss",$userName,$age,$dob,$contact);
					$getUserData->execute();
					$status = 'true';
		}
		echo $status;
	}
?>