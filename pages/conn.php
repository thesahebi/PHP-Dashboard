<?php
$username = "root";
$password = "abcd@1234";
$hostname = "localhost";
$db_name = "ultrabandsm";

//connection to the database
$mysqli = new mysqli($hostname, $username, $password, $db_name);
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
?>
