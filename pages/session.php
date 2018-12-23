<?php
$link = mysqli_connect("localhost", "root", "abcd@1234", 'ultrabandsm');

session_start();

// Storing Session
$username=$_SESSION['login_user'];

// SQL Query To Fetch Complete Information Of User
    $ses_sql=mysqli_query($link, "select username from registeradmin where username='$username'");
    $row = mysqli_fetch_assoc($ses_sql);
    $login_session =$row['username'];
    
    if(!isset($login_session)){
    mysql_close($link); 
    header('Location: index.php'); 
    }

    ?>