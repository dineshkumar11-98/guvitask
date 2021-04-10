<?php
include "dp.php";
session_start();

$age = 'N/A';
$dob = 'N/A';
$contact = 'N/A';
if($_SESSION['username']){
    $query = "select * from user_details;";
    $dataCollect = $connect->prepare($query);
    $dataCollect->execute();
    $getRawData = $dataCollect->get_result();
    if($getRawData){
        while($refinedData = $getRawData->fetch_assoc()){
            if($refinedData['User_name'] == $_SESSION['username']){
                if($refinedData['Age']){
                    $age = $refinedData['Age'];
                }
                if($refinedData['DOB']){
                    $dob = $refinedData['DOB'];
                }
                if($refinedData['Contact']){
                    $contact = $refinedData['Contact'];
                }
                break;
            }
        }
    }
    $personalData = array("age"=> $age,"dob"=> $dob,"contact"=>$contact,"username"=>$_SESSION['username'],"name"=>$_SESSION['name'],"email"=>$_SESSION['email']);
    echo json_encode($personalData,true);
}else{
    header("Location: index.html");
}

?>