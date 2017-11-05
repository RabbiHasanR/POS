<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Login and Registration Form with HTML5 and CSS3</title>
		<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="LoginPageCss.css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
    </head>
    <body>
        <div class="container">
           
            <header>
                <h1>Login and Registration Form</h1>
				<h1>POS System</h1>
				
            </header>
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
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="mysuperscript.php" autocomplete="on" class="post"> 
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" > Your email </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="yourmail@mail.com"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="give your password" /> 
                                </p>
                                <p class="keeplogin"> 
									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
									<label for="loginkeeping">Keep me logged in</label>
								</p>
                                <p class="login button"> 
                                   <!--<a href="http://cookingfoodsworld.blogspot.in/" target="_blank" ></a>-->
								    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
								</p>
								<p>
								   <label for="fogetpassword"><a href="#">Forget Password?</a></label>
								</P>
                                <p class="change_link">
									Not a member yet ?
									<a href="#toregister" class="to_register">Register</a>
								</p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form  action="" autocomplete="on" method="post"> 
                                <h1> Sign up </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" >Your name</label>
                                    <input id="usernamesignup" name="usernamesignup" type="text" placeholder="your name" />
									<span class="error"><?php echo $nameErr; ?></span>
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail"  > Your email</label>
                                    <input id="emailsignup" name="emailsignup" type="email" placeholder="yourmail@mail.com"/> 
									<span class="error"><?php echo $emailErr ?></span>
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" >Your password </label>
                                    <input id="passwordsignup" name="passwordsignup" type="password" placeholder="eg. X8df!90EO"/>
									<span class="error"><?php echo $passwordErr ?></span>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" >Please confirm your password </label>
                                    <input id="passwordsignup_confirm" name="passwordsignup_confirm" type="password" placeholder="eg. X8df!90EO"/>
									<span class="error"><?php echo $confirmPasswordErr ?>
                                </p>
								
                                <p class="signin button"> 
									<input type="submit" name="submit" value="Sign up"/> 
								</p>
                                <p class="change_link">  
									Already a member ?
									<a href="#tologin" class="to_register"> Go and log in </a>
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
		<!-- register information save database
		<?php
           include('DBConnection.php');
		   
             if(isset($_POST['submit']))
             {
			 //if($_POST['usernamesignup']!="" && $_POST['usernamesignup']==$nameRegex && $_POST['emailsignup']!="" && filter_var($email,FILTER_VALIDATE_EMAIL) && $_POST['passwordsignup']!="" && $_POST['passwordsignup']==$passwordRegex && $_POST['passwordsignup']==$_POST['passwordsignup_confirm']){
               $name=mysqli_real_escape_string($conn, $_POST['usernamesignup']);
               $email=mysqli_real_escape_string($conn, $_POST['emailsignup']);
               $password=mysqli_real_escape_string($conn, $_POST['passwordsignup']);
               $query1=mysqli_query($conn,"insert into MyGuests values('','$name','$email','$password')");
			   
             if($query1)
              {
               header("location:LoginPage.php");
              }
              //}
		   }
          ?>
    </body>
</html>