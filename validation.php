<!-- validation -->
			<?php
//variable contains regex
$nameRegex="/^[a-zA-Z ]*$/";
//contains at least 1 lowercase,1 uppercase alphabetical character,1 numeric character,1 special character,must be 8 character or longer.
$passwordRegex="/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/";
//declear variable and set empty value
$name=$email=$password=$confirmPassword="";
//declear error messege variable and set empty value
$nameErr=$emailErr=$passwordErr=$confirmPasswordErr="";
//condition check if the request is  $_POST then condition true
if($_SERVER["REQUEST_METHOD"]=="POST"){
	//name validation for sign up 
	if(empty($_POST['usernamesignup'])){
		$nameErr="Name is required";
	}
	else{
		$name=test_input($_POST['usernamesignup']);
		//check if name only contains letters and whitespace
		if(!preg_match($nameRegex,$name)){
			$nameErr="Only Letters and white space allowed";
		}
	}
	//email validation for sing up  
	if(empty($_POST['emailsignup'])){
		$emailErr="Email is reuquired";
	}
	else{
		$email=test_input($_POST['emailsignup']);
		//check if e-mail address is well-formed
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			$emailErr="Invalid email format";
		}
	}
	
	//password validation for sign up
	if(empty($_POST['passwordsignup'])){
		$passwordErr="Password is required";
	}
	else{
		$password=test_input($_POST['passwordsignup']);
		//check if password contains at least 1 lowercase,1 uppercase alphabetical character,1 numeric character,1 special character,must be 8 character or longer.
		if(!preg_match($passwordRegex,$password)){
			$passwordErr="password contains at least 1 lowercase,1 uppercase alphabetical character,1 numeric character,1 special character,must be 8 character or longer.";
		}
	}
	
	//confirm password validation for sign up 
	if(empty($_POST['passwordsignup_confirm'])){
		$confirmPasswordErr="Confirm password is required";
	}
	else{
		//check confirm password match password 
		if($_POST['passwordsignup']==$_POST['passwordsignup_confirm']){
			$confirmPassword=test_input($_POST['passwordsignup_confirm']);
		}
		else{
			$confirmPasswordErr="Password not match";
		}
			
	}
}
//test input functon
function test_input($data){
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}
?>