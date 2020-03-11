<?php 
include 'php-scripts/connection/connection-OOP.php';

// Fetch Countries


  $result = mysqli_query($con,"SELECT skole.* FROM skole");
  
  $response = array();
  while($row = mysqli_fetch_assoc($result)){
    $id         = $row['Id'];

    $PLZ 	= substr($row['PLZ'], 6);
   	$PLZnum = preg_replace("/[^0-9]/", "", $row['PLZ']);

    $response[] = array("Id"=>$id,"PLZ"=>$PLZ, "postalcode" => $PLZnum);

    mysqli_query($con,"UPDATE skole SET PLZ_pc = '$PLZnum', PLZ_city = '$PLZ'  WHERE Id = '$id' ");
  }

  echo json_encode($response);
  // print_r($response[]);
  exit;



