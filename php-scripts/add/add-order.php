<?php
// Udje u skriptu ali ne pokupi VALUES <------------
include '../connection/connection-OOP.php';

$action = 'addedLabel';

if (isset($_GET['action'])) { 
    $add = $_GET['action'];
}

if ($action == 'addedLabel') {
    $rumnummer 		= $_POST['rumnummer'];
    $farbe  		= $_POST['farbe'];
    $laschentyp 	= $_POST['laschentyp'];
    $gebaude 	 	= $_POST['gebaude'];
    $quantity       = $_POST['quantity'];

    $sql = "INSERT INTO labels (raumnummer, farbe, laschentyp, gebaude, anzahl) 
            VALUES ('$rumnummer', '$farbe', '$laschentyp', '$gebaude', '$quantity')";

    $query = $con->query($sql);

    if ($query) {
        echo "New record created successfully.";
        echo json_encode($query);
    } else {
        echo "Error: " . $sql;
    }
}

?>