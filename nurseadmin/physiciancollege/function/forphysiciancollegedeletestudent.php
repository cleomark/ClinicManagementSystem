<?php
    session_start();
    include '../../../db.php';

    if (isset($_GET['physician_id'])) {
        $physician_id = $_GET['physician_id'];
    
        // Perform the necessary actions to mark the message as deleted on the website
    
        // Update the 'is_deleted' column to 1 for the specified 'dental_id'
        $sql = "UPDATE physician SET is_deleted_on_website = 1 WHERE physician_id = ?";
    
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $physician_id);
        $stmt->execute();
    
        // Redirect the user back to the original page or any other appropriate page
        header("Location: ../physicianstudentcollege.php");
        exit();
    } //for medical delete on website
    
 ?>

 