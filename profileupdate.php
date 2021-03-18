<?php
	include "dp.php";
	session_start();
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
					$updatequery = "UPDATE user_details SET Age=$age,DOB='$dob',Contact='$contact' where User_name='$userName';";
					$getUserData = $connect->prepare($updatequery);
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
					$insertQuery = "INSERT INTO user_details VALUES ('$userName',$age,'$dob','$contact');";
					$getUserData = $connect->prepare($insertQuery);
					$getUserData->execute();
					$status = 'true';
		}
		echo $status;
	}
?>