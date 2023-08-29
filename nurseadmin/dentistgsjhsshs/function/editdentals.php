<?php

session_start();
include '../../../db.php';

if (isset($_POST['update_dentalrecord'])) {
    // Sanitize and validate user inputs
    $dentalapp_id = $_POST['dentalapp_id'];
    $user_id = $_POST['user_id'];
    $idnumber = $_POST['idnumber'];
    $fullname = $_POST['fullname'];
    $service = $_POST['service'];
    $phoneno= $_POST['phoneno'];
    $gradecourseyear= $_POST['gradecourseyear'];
    $role = $_POST['role'];
    $date_time = $_POST['date_time'];
    $is_deleted_on_website = $_POST['is_deleted_on_website'];

    // Validate and sanitize inputs here...

    // Convert appointment datetime to a DateTime object
    date_default_timezone_set('Asia/Manila');
    $appointmentDateTime = new DateTime($date_time);
    $formattedDatetime = $appointmentDateTime->format("Y-m-d h:i A");

    // Update the record in the database
    $sql = "UPDATE dentalapp SET
    idnumber='$idnumber', fullname='$fullname', service='$service',phoneno='$phoneno',
    gradecourseyear = '$gradecourseyear', role='$role', date_time='$formattedDatetime'
    WHERE dentalapp_id = '$dentalapp_id'";

    if (mysqli_query($conn, $sql)) {
        // Update successful
        $_SESSION['success'] = "
            <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                <h2 style='color: #fff; font-size: 16px; margin-left: 10px;'>Dental Appointment has been updated.</h2>
            </div>
        ";
        header('Location: ../editdental.php?dentalapp_id=' . $dentalapp_id);
        exit(); // Make sure to exit after redirection
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
