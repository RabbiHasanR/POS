<?php
require 'DBConnection.php';
session_start();

//Make sure email and hash variables aren't empty
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
	$email=mysqli_real_escape_string($conn,$_GET['email']);
	$hash=mysqli_real_escape_string($conn,$_GET['hash']);
	
	//select user with matching email and hash,who hasn't verified their account yet(active=0)
	$checkEmailAndHash=mysqli_query("SELECT * FROM users WHERE email='$email' AND hash='$hash' AND active='0'");
	
	if(mysqli_num_rows($checkEmailAndHash)==0){
		$_SESSION['message']="Account has already been activated or the URL is invalid!";
		
		header("location:error.php");
	}
	else{
		$_SESSION['message']="Your Accout has been activated!";
		
		//Set the user status to active(active=1)
		mysqli_query($conn,"UPDATE users SET active='1' WHERE email='$email'") or die($conn,mysqli_error());
		$_SESSION['active']=1;
		header("location:success.php");
	}
}
else{
	$_SESSION['message']="Invalid parameters provided for account verification!";
	header(location: error.php);
}
?>