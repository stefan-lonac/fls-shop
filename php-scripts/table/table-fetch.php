<?php 
include '../connection/connection-OOP.php';


$schuleId = $_GET['schoolTable'];
$userData = mysqli_query($con,"SELECT * FROM laschentable WHERE Idskola = $schuleId");

// $userData = mysqli_query($con,"SELECT * FROM laschentable");
$response = array();

while($row = mysqli_fetch_array($userData)){

   $response[] = $row;
}


echo json_encode($response);


// echo $schuleId;

exit;

?>