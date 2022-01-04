<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "fls_shop";


// Create connection
$con = new mysqli($servername, $username, $password, $database);

/* change character set to utf8 */
if (!$con->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $con->error);
    exit();
} 
// else {
//     printf("Current character set: %s\n", $con->character_set_name());
// }


// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
// else {
//     echo "Connected successfully";
// }

?>