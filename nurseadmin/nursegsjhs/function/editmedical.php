<?php

session_start();
include '../../../db.php';

if (isset($_POST['update_medicalrecord'])) {
    // Sanitize and validate user inputs
    $medicalapp_id = $_POST['medicalapp_id'];
    $user_id = $_POST['user_id'];
    $idnumber = $_POST['idnumber'];
    $name1 = $_POST['name1'];
    $gradecourseyear1 = $_POST['gradecourseyear1'];
    $phoneno = $_POST['phoneno'];
    $date_time = $_POST['date_time'];
    $sched_time = $_POST['sched_time'];
    $role = isset($_POST['role']) ? trim(mysqli_real_escape_string($conn, $_POST['role'])) : "";
    $onoff = $_POST['onoff'];
    $is_deleted_on_website = $_POST['is_deleted_on_website'];

    // Validate and sanitize inputs here...

    // Convert appointment datetime to a DateTime object
    date_default_timezone_set('Asia/Manila');
    $appointmentDateTime = new DateTime($date_time);
    $formattedDatetime = $appointmentDateTime->format("Y-m-d h:i A");

    // Update the record in the database
    $sql = "UPDATE medicalapp SET
    idnumber='$idnumber', name1='$name1', gradecourseyear1='$gradecourseyear1',phoneno='$phoneno',
    role='$role', date_time='$formattedDatetime', sched_time='$sched_time', onoff='$onoff'
    WHERE medicalapp_id = '$medicalapp_id'";

    if (mysqli_query($conn, $sql)) {
        // Update successful
        $_SESSION['success'] = "
            <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                <h2 style='color: #fff; font-size: 16px; margin-left: 10px;'>Medical Appointment has been updated.</h2>
            </div>
        ";
        header('Location: ../editmedicals.php?medicalapp_id=' . $medicalapp_id);
        exit(); // Make sure to exit after redirection
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
