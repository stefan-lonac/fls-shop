<?php 
include '../connection/connection-OOP.php';


$farbeName = $_GET['farbeFilters'];
$baseData = mysqli_query($con,"SELECT DISTINCT farbe FROM laschentable WHERE Idskola = $farbeName");

// $userData = mysqli_query($con,"SELECT * FROM laschentable");
$response = array();

while($row = mysqli_fetch_array($baseData)){
   $response[] = $row;
}

echo json_encode($response);

// echo $schuleId;

exit;

?>