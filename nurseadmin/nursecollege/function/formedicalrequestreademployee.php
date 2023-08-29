<?php
    session_start();
    include '../../../db.php';

    if (isset($_GET['med_id'])) {
        $med_id = $_GET['med_id'];
    
        // Perform the necessary database update to mark the message as read
        // Replace 'your_table_name' with the actual table name where you store the messages
        $sql = "UPDATE medical SET is_read = 1 WHERE med_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $med_id);
        $stmt->execute();
    
        // Redirect the user back to the original page or any other appropriate page
        header("Location: ../medicalrequestsemployeecollege.php");
        exit();
    } //for medical mark as read


    
 ?>

 