<?php
$link = mysqli_connect("localhost", "root", "abcd@1234", 'ultrabandsm');

session_start();

// Storing Session
$email=$_SESSION['login_user'];

// SQL Query To Fetch Complete Information Of User
    $ses_sql=mysqli_query($link, "select email from login where email='$email'");
    $row = mysqli_fetch_assoc($ses_sql);
    $login_session =$row['email'];
    
    if(!isset($login_session)){
    mysql_close($link); 
    header('Location: index.php'); 
    }
    ?>