<?php
$servername="localhost";
$username="root";
$password="";
$databasename="pos";
//create connection
$conn=mysqli_connect($servername,$username,$password,$databasename);
//check connecton
if(!$conn){
	die("Connection failed: " .mysqli_connect_error());
}

//create databasename
/*$sql="CREATE DATABASE pos";
if(mysqli_query($conn,$sql)){
	echo "Database created successfully";
}
else{
	echo "Error creating database: " .mysqli_error($conn);
}*/

//sql to create table
/*$sql="CREATE TABLE MyGuests(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
password VARCHAR(30) NOT NULL
)";
if(mysqli_query($conn,$sql)){
	echo "Table MyGuests created successfully";
}else{
	echo "Error creating table: " .mysqli_error($conn);
}*/

//alter table and add new colum
/*$sql="ALTER TABLE MyGuests 
ADD hash VARCHAR(50) NOT NULL ,
ADD active BOOL NOT NULL DEFAULT 0";
//rename table
//$sql="RENAME TABLE MyGuests to users";
if(mysqli_query($conn,$sql)){
	echo "Alter table successfully";
}else{
	echo "Error Alter table: " .mysqli_error($conn);
}*/
?>