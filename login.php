<?php
/* user login process checks if user exists and password is correct */
//escape email to protect against SQL injections
$email=mysqli_real_escape_string($conn,$_POST['useremail']);
$checkEmail=mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
if(mysqli_num_rows($conn,$checkEmail)){
	$_SESSION['message']="User with that email doesn't exist!";
	header("location: error.php");
}
else{//user exists
//get all value for user in database table using mysqli_fetch_assoc() function
	$user=mysqli_fetch_assoc($checkEmail);
	
	if(password_verify($_POST['password'],$user['password'])){
		$_SESSION['email']=$user['email'];
		$_SESSION['name']=$user['name'];
		$_SESSION['active']=$user['active'];
		
		//this is how we'll know the user is logged in_array
		$_SESSION['logged_in']=true;
		header("location: profile.php");
	}
	else{
		$_SESSION['message']="You have entered wrong password,try again!";
		header("location: error.php");
	}
}
?>