<?php
//include('DBConnection.php');
require 'DBConnection.php';
require 'validation.php';

session_start();
?>

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
	<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		//if user click signin then its condition true
		if(isset($_POST['signin'])){
			//include('login.php');
			require 'login.php';
		}
		//if user click sign up then its condition true
		elseif(isset($_POST['signup'])){
			//include('register.php');
			require 'register.php';
			//require 'validation.php';
		}
	}
	
	?>
    <body>
        <div class="container">
           
            <header>
                <h1>Login and Registration Form</h1>
				<h1>POS System</h1>
				
            </header>
			
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="" autocomplete="on" method="post"> 
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" > Your email </label>
                                    <input id="useremail" name="useremail" required="required" type="text" placeholder="yourmail@mail.com"/>
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
								    <button class="btn btn-lg btn-primary btn-block" type="submit" name="signin">Sign in</button>
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
									<input type="submit" name="signup" value="Sign up"/> 
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
		
    </body>
</html>