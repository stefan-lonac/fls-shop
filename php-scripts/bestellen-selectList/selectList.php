<?php 
include '../connection/connection-OOP.php';

$request = $_GET['request'];

// Fetch Countries
if($request == 'country'){

  $result = mysqli_query($con,"SELECT skole.* FROM
                              (SELECT DISTINCT PLZ_city, Id FROM skole GROUP BY PLZ_city DESC) a
                              INNER JOIN skole skole ON (skole.Id = a.Id) ORDER BY PLZ_city ASC");
  
  $response = array();
  while($row = mysqli_fetch_assoc($result)){
    $id         = $row['Id'];
    // $PLZ        = trim($row['PLZ'],1234567890);

    $PLZ          = substr($row['PLZ'], 6);
    $PLZ_city     = $row['PLZ_city'];
    $PLZnum       = preg_replace("/[^0-9]/", "", $row['PLZ']);

    $response[] = array("Id"=>$id,"PLZ"=>$PLZ, "PLZ_pc"=>$PLZnum, "PLZ_city"=>$PLZ_city);
  }

  echo json_encode($response);
  // print_r($response[]);
  exit;
}




// Fetch States of a Country
if($request == 'school'){
  $country  = $_GET['PLZ_city'];
  // $schule   = $_GET['schule'];
  $result   = mysqli_query($con,"SELECT * FROM skole WHERE PLZ_city = (SELECT PLZ_city FROM skole WHERE Id = $country )ORDER BY Schule ASC ");

  $response = array();
  while($row = mysqli_fetch_assoc($result)){
    $id         = $row['Id'];
    $PLZ        = trim($row['PLZ'], 1234567890);
    $school     = $row['Schule'];
    $city       = $row['PLZ_city'];

    $response[] = array("Id"=>$id,"Schule"=>$school, "PLZ_city"=>$city, "PLZ"=>$PLZ);
  }

  // echo json_encode($country);
  echo json_encode($response);
  exit;
}







// // Fetch States of a Country
// if($request == 'school'){
//   $country  = $_GET['PLZ'];
//   // $schule   = $_GET['schule'];
//   $result   = mysqli_query($con,"SELECT * FROM skole WHERE PLZ = (SELECT PLZ FROM skole WHERE Id = $country )ORDER BY Schule ASC ");

//   $response = array();
//   while($row = mysqli_fetch_assoc($result)){
//     $id         = $row['Id'];
//     $PLZ        = trim($row['PLZ'], 1234567890);
//     $school     = $row['Schule'];

//     $response[] = array("Id"=>$id,"Schule"=>$school,"PLZ"=>$PLZ);
//   }

//   // echo json_encode($country);
//   echo json_encode($response);
//   exit;
// }

var_dump($country, $result, $response);

?>

