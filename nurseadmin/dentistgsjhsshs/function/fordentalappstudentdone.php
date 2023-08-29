<?php
session_start();
include '../../../db.php';

if (isset($_GET['dentalapp_id'])) {
    $dentalapp_id = $_GET['dentalapp_id'];
    
    // Validate $medicalapp_id to prevent SQL injection
    if (!is_numeric($dentalapp_id)) {
        die("Invalid input");
    }

    // Update the 'is_deleted_on_website' column to 1 for the specified 'medicalapp_id'
    $sql = "UPDATE dentalapp SET is_deleted_on_website = 1 WHERE dentalapp_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $dentalapp_id);
    $stmt->execute();
    
    // Redirect the user back to the original page or any other appropriate page
    header("Location: ../dentalgsjhsshs.php");
    exit();
}


?>