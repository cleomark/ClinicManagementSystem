<?php

session_start();
include '../../db.php';


if (isset($_GET['dental_id'])) {
    $dental_id = $_GET['dental_id'];

    // Perform the necessary database update to mark the message as read
    // Replace 'your_table_name' with the actual table name where you store the messages
    $sql = "UPDATE dental SET is_read = 1 WHERE dental_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $dental_id);
    $stmt->execute();

    // Redirect the user back to the original page or any other appropriate page
    header("Location: ../dentalrequestsemployeecollege.php");
    exit();
}

?>