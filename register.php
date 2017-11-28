<!-- register information save database
		<?php
		
		//Set session variables to be used on user profile.php page
		$_SESSION['email']=$_POST['emailsignup'];
		$_SESSION['name']=$_POST['usernamesignup'];
           //include('DBConnection.php');
		   
             //if(isset($_POST['signup']))
             //{
			 //if($_POST['usernamesignup']!="" && $_POST['usernamesignup']==$nameRegex && $_POST['emailsignup']!="" && filter_var($email,FILTER_VALIDATE_EMAIL) && $_POST['passwordsignup']!="" && $_POST['passwordsignup']==$passwordRegex && $_POST['passwordsignup']==$_POST['passwordsignup_confirm']){
               $name=mysqli_real_escape_string($conn, $_POST['usernamesignup']);
               $email=mysqli_real_escape_string($conn, $_POST['emailsignup']);
			   //using password_hash() for more secure password and use password_BCRYPT algorithm
               $password=mysqli_real_escape_string($conn,password_hash($_POST['passwordsignup'],PASSWORD_BCRYPT) );
			   $hash=mysqli_real_escape_string($conn,md5(rand(0,1000)));
               //check if user with that email already exists
			   
			    $checkEmail=mysqli_query($conn,"SELECT * FROM users WHERE email='$email'") or die(mysqli_error());
				
				//we know user email exists if the rows returned are more than 0
				$rowCount=mysqli_num_rows($conn,$checkEmail);
				if($rowCount>0){
					$_SESSION['message']='User with this email already exists!';
					//header("location:error.php");
				}
				else{//email doesn't already exist in a database ,proceed...
					//active is 0 by DEFAULT(no need to include it here)
					$sql="INSERT into users(name,email,password,hash)"
					."VALUES('$name','$email','$password','$hash')";
					
					//Add user to the database
					if(mysqli_query($conn,$sql)){
						$_SESSION['active']=0;//0 until user activates their account with verify.php
						$_SESSION['logged_in']=true;//so we know the user has logged in
						$_SESSION['message']="Confirmation link has been sent to $email,please verify your account by clicking on the link in the message!";
						
					    //send registration confirmation link (verify.php)
						//$to=$email;
						$subject='Account Verification (clevertechie.com)';
						$message_body='Hello'.$name.',
						
						Thank you for signing up!
						
						Please click this link to activate your account:
						
						http://localhost:8080/POS/verify.php?email='.$email.'&hash='.$hash;
						//send mail using mail() function
						mail($email,$subject,$message_body);
						//them we gp to our profile page
						header("location:profile.php");
					}
					else{
						$_SESSION['message']='Registration failed!';
						header("location: error.php");
					}
				}
			   
			   
			   //$query1=mysqli_query($conn,"insert into users values('','$name','$email','$password','$hash','')");
						 
             
			 /*if($query1)
              {
               header("location:LoginPage.php");
              }*/
              //}
		   //}
          ?>