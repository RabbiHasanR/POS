<?php
/*reset your password form, sends reset.php password link */

require 'DBConnection.php';
session_start();

//check if form submitted with methods="post"

if($_SERVER['REQUEST_METHOD']=='POST'){
	$email =mysqli_real_escape_string($_POST['email']);
	$checkEmail=mysqli_query("SELECT * FORM users WHERE email='$email'");
	//user doesn't exist
	if(mysqli_num_rows($checkEmail)){
		$_SESSION['message']="User with that email doesn't exist!";
		header("location: error.php");
	}
	//user exist (num_rows!=0)
	else{
		$user=mysqli_fetch_assoc();//user becomes array with user data
		
		$email=$user['email'];
		$hash=$user['hash'];
		$name=$user['name'];
		
		//session message to display on success.php
		$_SESSION['message']="<p>Please check your email <span>$email</span>".
		"for a confirmation link to complete your password reset!</p>";
		
		//send registration confirmation link (reset.php)
		$to=$email;
		$subject='Password Reset Link (clevertechie.com)';
		$message_body='
		Hello'.$name.',
		
		You have requested password reset!
		
		Please click this link to reset your password:
		
		http://localhost:8080/POS/reset.php?email='.$email.'$hash='.$hash;
		
		mail($to,$subject,$message_body);
		
		header("location: success.php");
	}
}
?>