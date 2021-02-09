<?php
// here you can change the user and password as per your requirment
$server = 'localhost';
$user = 'root';
$password = '';

// make the connection to the server
$con = mysqli_connect($server,$user,$password);

//select the database 
$database = 'upload_images';

// make the connection to the Database
mysqli_select_db($con,$database);

?>