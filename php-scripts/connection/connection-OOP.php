<?php

// $servername = "localhost";
// $username = "inko_db";
// $password = "MPXDmd23wHPZg5kV";
// $database = "stefan_db";

$servername = "localhost";
$username = "farblo_13";
$password = "Fhp4YccTtpM1Y4eu";
$database = "farblo_shop_2016_10";


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