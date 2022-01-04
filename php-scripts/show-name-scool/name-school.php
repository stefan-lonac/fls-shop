<?php 
include '../connection/connection-OOP.php';


$schuleId = $_GET['schuleId'];
$userData = mysqli_query($con,"SELECT DISTINCT Schule FROM skole WHERE Id = $schuleId");

// $userData = mysqli_query($con,"SELECT * FROM laschentable");
$response = array();

while($row = mysqli_fetch_array($userData)){

   $response[] = $row;
}

echo json_encode($response);

exit;

?>