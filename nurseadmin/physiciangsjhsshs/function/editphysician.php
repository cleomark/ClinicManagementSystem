<?php

session_start();
include '../../../db.php';

if (isset($_POST['update_physicianrecord'])) {
    // Sanitize and validate user inputs
    $phy_id = $_POST['phy_id'];
    $user_id = $_POST['user_id'];
    $idnumber = $_POST['idnumber'];
    $name = $_POST['name'];
    $gradesection = $_POST['gradesection'];
    $date_time = $_POST['date_time'];
    $sched_time = $_POST['sched_time'];
    $phoneno = $_POST['phoneno'];
    $role = $_POST['role'];
    $is_deleted_on_website = $_POST['is_deleted_on_website'];

    // Validate and sanitize inputs here...

    // Convert appointment datetime to a DateTime object
    date_default_timezone_set('Asia/Manila');
    $appointmentDateTime = new DateTime($date_time);
    $formattedDatetime = $appointmentDateTime->format("Y-m-d h:i A");

    // Update the record in the database
    $sql = "UPDATE physicianapp SET
    idnumber='$idnumber', name='$name',gradesection = '$gradesection',  phoneno='$phoneno',
    date_time='$formattedDatetime', sched_time='$sched_time', role='$role'
    WHERE phy_id = '$phy_id'";

    if (mysqli_query($conn, $sql)) {
        // Update successful
        $_SESSION['success'] = "
            <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                <h2 style='color: #fff; font-size: 16px; margin-left: 10px;'>Physician Consultation Appointment has been updated.</h2>
            </div>
        ";
        header('Location: ../editphysician.php?phy_id=' . $phy_id);
        exit(); // Make sure to exit after redirection
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
