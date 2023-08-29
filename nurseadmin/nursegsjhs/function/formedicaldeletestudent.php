<?php
    session_start();
    include '../../../db.php';

    if (isset($_GET['med_id'])) {
        $med_id = $_GET['med_id'];
    
        // Perform the necessary actions to mark the message as deleted on the website
    
        // Update the 'is_deleted' column to 1 for the specified 'dental_id'
        $sql = "UPDATE medical SET is_deleted_on_website = 1 WHERE med_id = ?";
    
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $med_id);
        $stmt->execute();
    
        // Redirect the user back to the original page or any other appropriate page
        header("Location: ../medicalrequestgsjhs.php");
        exit();
    } //for medical delete on website
    
 ?>

 