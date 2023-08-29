<?php
    session_start();
    include '../../db.php';
   
if (isset($_GET['dental_id'])) {
    $dental_id = $_GET['dental_id'];

    // Perform the necessary actions to mark the message as deleted on the website

    // Update the 'is_deleted' column to 1 for the specified 'dental_id'
    $sql = "UPDATE dental SET is_deleted_on_website = 1 WHERE dental_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $dental_id);
    $stmt->execute();

    // Redirect the user back to the original page or any other appropriate page
    header("Location: ../dentalrequestsemployeecollege.php");
    exit();
}

if (isset($_GET['med_id'])) {
    $med_id = $_GET['med_id'];

    // Perform the necessary actions to mark the message as deleted on the website

    // Update the 'is_deleted' column to 1 for the specified 'dental_id'
    $sql = "UPDATE medical SET is_deleted_on_website = 1 WHERE med_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $med_id);
    $stmt->execute();

    // Redirect the user back to the original page or any other appropriate page
    header("Location: ../medicalrequestcollege.php");
    exit();
}

if (isset($_GET['med_id'])) {
    $med_id = $_GET['med_id'];

    // Perform the necessary actions to mark the message as deleted on the website

    // Update the 'is_deleted' column to 1 for the specified 'dental_id'
    $sql = "UPDATE medical SET is_deleted_on_website = 1 WHERE med_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $med_id);
    $stmt->execute();

    // Redirect the user back to the original page or any other appropriate page
    header("Location: ../medicalrequestsemployeecollege.php");
    exit();
}

if (isset($_GET['physician_id'])) {
    $med_id = $_GET['physician_id'];

    // Perform the necessary actions to mark the message as deleted on the website

    // Update the 'is_deleted' column to 1 for the specified 'dental_id'
    $sql = "UPDATE physician SET is_deleted_on_website = 1 WHERE physician_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $med_id);
    $stmt->execute();

    // Redirect the user back to the original page or any other appropriate page
    header("Location: ../physicianstudentcollege.php");
    exit();

}
 
    ?>