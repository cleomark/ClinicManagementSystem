<?php
session_start();
include '../../../db.php';

if (isset($_GET['medicalapp_id'])) {
    $medicalapp_id = $_GET['medicalapp_id'];
    
    // Validate $medicalapp_id to prevent SQL injection
    if (!is_numeric($medicalapp_id)) {
        die("Invalid input");
    }

    // Update the 'is_deleted_on_website' column to 1 for the specified 'medicalapp_id'
    $sql = "UPDATE medicalapp SET is_deleted_on_website = 1 WHERE medicalapp_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $medicalapp_id);
    $stmt->execute();
    
    // Redirect the user back to the original page or any other appropriate page
    header("Location: ../medicalgsjhs.php");
    exit();
}



?>