<?php
session_start();
include '../../../db.php';

if (isset($_GET['phy_id'])) {
    $phy_id = $_GET['phy_id'];
    
    // Validate $medicalapp_id to prevent SQL injection
    if (!is_numeric($phy_id)) {
        die("Invalid input");
    }

    // Update the 'is_deleted_on_website' column to 1 for the specified 'medicalapp_id'
    $sql = "UPDATE physicianapp SET is_deleted_on_website = 1 WHERE phy_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $phy_id);
    $stmt->execute();
    
    // Redirect the user back to the original page or any other appropriate page
    header("Location: ../physicianapproved.php");
    exit();
}


?>