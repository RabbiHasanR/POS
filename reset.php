<?php
/* The password reset form, the link to this page is included
   from the forgot.php email message
*/
require 'DBConnection.php';
session_start();

// Make sure email and hash variables aren't empty
if( isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']) )
{
    $email = $mysqli->escape_string($_GET['email']); 
    $hash = $mysqli->escape_string($_GET['hash']); 

    // Make sure user email with matching hash exist
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email' AND hash='$hash'");

    if ( $result->num_rows == 0 )
    { 
        $_SESSION['message'] = "You have entered invalid URL for password reset!";
        header("location: error.php");
    }
}
else {
    $_SESSION['message'] = "Sorry, verification failed, try again!";
    header("location: error.php");  
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Reset your password </title>
</head>
<body>
<div>
<h1>Chose your new password</h1>

<form action="reset_password.php" method="post">
<div>
<label>New Password</label>
<input type="password" required name="newpassword" autocomplete="off"/>
</div>
<div>
<label>Confirm New Password</label>
<input type="password" required name="confirmnewpassword" autocomplete="off"/>
</div>

<button type="submit" name="reset">Reset</button>
</form>
</div>
</body>
</html>