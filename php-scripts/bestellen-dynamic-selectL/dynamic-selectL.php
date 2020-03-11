<?php 
include '../connection/connection-OOP.php';


switch ($_GET['request']) {
    case 'school':
        $sql = "SELECT * FROM schools";
        break;

    case 'city':
        $sql = "SELECT * FROM cities WHERE cities_id = ". $_GET['cities_id'];
        break;
     
    default:
        break;
}

$result = $con->query($sql);

$response = [];
while($row = mysqli_fetch_assoc($result)){
   $response[] = array("id"=>$row['id'], "name"=>$row['name']);
}

echo json_encode($response);

?>