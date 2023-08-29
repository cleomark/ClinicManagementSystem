<?php
    session_start();
    include '../../db.php';

    if (isset($_POST['submit_dental'])) {
        $user_id = $_POST['user_id'];
        $idnumber = $_POST['idnumber'];
        $name = $_POST['name'];
        $dental_service = $_POST['dental_service'];
        $c_enrolled = $_POST['c_enrolled'];
        $gradecourseyear = $_POST ['gradecourseyear'];
        $c_employee = $_POST['c_employee'];
        $message = $_POST['message'];
        
        // Set the time zone to Asia/Manila
        date_default_timezone_set('Asia/Manila');
    
        $date_created = date('Y-m-d h:i A'); // Include time in the date with AM/PM format
        $is_read = $_POST['is_read'];
        $is_deleted_on_website = $_POST['is_deleted_on_website'];
    
        $sql = "INSERT INTO dental VALUES ('','$user_id','$idnumber','$name','$dental_service','$c_enrolled','$gradecourseyear','$c_employee','$message','$date_created','$is_read','$is_deleted_on_website')";
    
        if (mysqli_query($conn, $sql)) {
            header('location: ../adddentalmessage.php');
            echo $_SESSION['success'] = "
                <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                    <h2 style='color: #fff; font-size: 16px; margin-left: 10px;'>Dental Appointment Added.</h2>
                </div>
            ";
        }
    }
    
    
    if (isset($_POST['submit_medical'])) {
        $user_id = $_POST['user_id'];
        $idnumber = $_POST['idnumber'];
        $name1 = $_POST['name1'];
        $gradecourseyear1 = $_POST ['gradecourseyear1'];
        $idnumber2 = $_POST['idnumber2'];
        $name2 = $_POST['name2'];
        $gradecourseyear2 = $_POST ['gradecourseyear2'];
        $idnumber3 = $_POST['idnumber3'];
        $name3 = $_POST['name3'];
        $gradecourseyear3 = $_POST ['gradecourseyear3'];
        $idnumber4 = $_POST['idnumber4'];
        $name4 = $_POST['name4'];
        $gradecourseyear4 = $_POST ['gradecourseyear4'];
        $idnumber5 = $_POST['idnumber5'];
        $name5 = $_POST['name5'];
        $gradecourseyear5 = $_POST ['gradecourseyear5'];
        $c_enrolled = $_POST['c_enrolled'];
        $c_employee= $_POST['c_employee'];
        $onoff = $_POST['onoff'];
        $message = $_POST['message'];
        
        // Set the time zone to Asia/Manila
        date_default_timezone_set('Asia/Manila');
    
        $date_created = date('Y-m-d h:i A'); // Include time in the date with AM/PM format
        $is_read = $_POST['is_read'];
        $is_deleted_on_website = $_POST['is_deleted_on_website'];
    
        $sql = "INSERT INTO medical VALUES ('','$user_id','$idnumber','$name1','$gradecourseyear1',
        '$idnumber2','$name2','$gradecourseyear2','$idnumber3','$name3','$gradecourseyear3',
        '$idnumber4','$name4','$gradecourseyear4','$idnumber5','$name5','$gradecourseyear5',
        '$c_enrolled','$c_employee','$onoff','$message','$date_created','$is_read','$is_deleted_on_website')";
    
        if (mysqli_query($conn, $sql)) {
            header('location: ../addmedicalmessage.php');
            echo $_SESSION['success'] = "
                <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                    <h2 style='color: #fff; font-size: 16px; margin-left: 10px;'>Request Medical Appointment Submitted.</h2>
                </div>
            ";
        }
    }

    if (isset($_POST['submit_physician'])) {
        $user_id = $_POST['user_id'];
        $idnumber = $_POST['idnumber'];
        $name = $_POST['name'];
        $gradecourseyear = $_POST ['gradecourseyear'];
        $role = $_POST ['role'];
        $message = $_POST ['message'];
        
        // Set the time zone to Asia/Manila
        date_default_timezone_set('Asia/Manila');
    
        $date_created = date('Y-m-d h:i A'); // Include time in the date with AM/PM format
        $is_read = $_POST['is_read'];
        $is_deleted_on_website = $_POST['is_deleted_on_website'];
    
        $sql = "INSERT INTO physician VALUES ('','$user_id','$idnumber','$name','$gradecourseyear','$role','$message','$date_created','$is_read','$is_deleted_on_website')";
    
        if (mysqli_query($conn, $sql)) {
            header('location: ../addphysicianmessage.php');
            echo $_SESSION['success'] = "
                <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                    <h2 style='color: #fff; font-size: 16px; margin-left: 10px;'>Request Physician Consultation Appointment Submitted.</h2>
                </div>
            ";
        }
    }
    
    
    
?>