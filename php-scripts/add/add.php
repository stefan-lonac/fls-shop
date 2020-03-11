<?php
include '../connection/connection-OOP.php';

$action = 'added';

if (isset($_GET['action'])) { 
    $add = $_GET['action'];
}

if ($action == 'added') {
    $contact 		= $_POST['contact'];
    $number  		= $_POST['number'];
    $email 	 	    = $_POST['email'];
    $check 	 	    = $_POST['check'];
    $comment        = $_POST['comment'];

    $sql = "INSERT INTO orders (contact, number, email, checkRB, comment) 
            VALUES ('$contact', '$number', '$email', '$check', '$comment')";

    $query = $con->query($sql);

    if ($query) {
        echo "New record created successfully.";
        echo json_encode($query);
    } else {
        echo "Error: " . $sql;
    }
}

?>