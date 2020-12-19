<?php
	session_start();
	include('conn.php');
	
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$address=$_POST['address'];
	
	$sql ="insert into user (firstname, lastname, address) values ('$firstname', '$lastname', '$address')";
    $run = mysqli_query($conn,$sql);

    if($run){

	$_SESSION['status'] = "Student Information Saved";
	$_SESSION['status_code'] = "success";
	header('location:index.php');
	}
?>