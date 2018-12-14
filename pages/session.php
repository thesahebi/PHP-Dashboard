<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$link = mysqli_connect("localhost", "root", "abcd@1234", 'ultrabandsm');
session_start();// Starting Session
// Storing Session
$email=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($link, "select email from login where email='$email'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['email'];
if(!isset($login_session)){
mysql_close($link); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}
?>