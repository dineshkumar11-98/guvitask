<?php
$connect = new mysqli('localhost','root','','guvi');
if($connect->connect_error){
	die("connection error ".connect->connect->error);
}
?>