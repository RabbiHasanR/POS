<?php
/* display all error message */

session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Error</title>
</head>

<body>
<div>
<h1>Error</h1>
<p>
<?php
if(isset($_SESSION['message']) AND !empty($_SESSION['message'])){
	echo $_SESSION['message'];
}
else{
	header("location:LoginPage.php");
}
?>
<a href="LoginPage.php">Login</a>
</p>
</div>
</body>
</html>