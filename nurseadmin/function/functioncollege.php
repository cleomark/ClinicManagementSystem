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
    header("Location: ../dentalrequestscollege.php");
    exit();
}

 
if(isset($_POST['submit_patientmngmt'])){ // pag get ng data
    $admin_id = $_POST['admin_id']; 
    $idnumber = $_POST['idnumber']; 
    $fullname = $_POST['fullname']; 
    $gradesection = $_POST['gradesection'];
    $vitalsigns = $_POST['vitalsigns'];
    $diagnosis = $_POST['diagnosis'];

    date_default_timezone_set('Asia/Manila');
    
    $date_time = date('Y-m-d h:i A'); // Include time in the date with AM/PM format

    $sql = "INSERT INTO patientrecord VALUES ('','$admin_id','$idnumber','$fullname','$gradesection','$vitalsigns','$diagnosis','$date_time')";
    if(mysqli_query($conn, $sql)){
        // echo "<script>window.history.go(-1);</script>";
        header('location: ../patientmanagementrecordcollege.php');
        echo $_SESSION['success'] ="
            <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                <h2 style='
                color: #fff;
                font-size: 16px;
                margin-left: 10px;'>Patient Management Record Added.</h2>
            </div>
        ";
    }
}


if(isset($_POST['submit_schoolhealthassesform'])){ // pag get ng data
    $admin_id = $_POST['admin_id']; 
    $idnumber = $_POST['idnumber']; 
    $fullname = $_POST['fullname']; 
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $date = $_POST['date'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $bmi = $_POST['bmi'];
    $bp = $_POST['bp'];
    $pr = $_POST['pr'];
    $scalp = $_POST['scalp'];
    $skin_nails = $_POST['skin_nails'];
    $eyes = $_POST['eyes'];
    $visual_acuity = $_POST['visual_acuity'];
    $ears = $_POST['ears'];
    $hearing_test = $_POST['hearing_test'];
    $nose = $_POST['nose'];
    $throat = $_POST['throat'];
    $mouth_tongue = $_POST['mouth_tongue'];
    $teeth_gums = $_POST['teeth_gums'];
    $chest_breasts = $_POST['chest_breasts'];
    $heart = $_POST['heart'];
    $lungs = $_POST['lungs'];
    $abdomen = $_POST['abdomen'];
    $genitalia = $_POST['genitalia'];
    $spine_extremities = $_POST['spine_extremities'];
    $sexual = $_POST['sexual'];
    $screening = $_POST['screening'];
    $otherfindings = $_POST['otherfindings'];
    $remarks = $_POST['remarks'];
    
    $sql = "INSERT INTO schoolhealthasses VALUES ('','$admin_id','$idnumber','$fullname','$birthday','$gender','$date','$weight','$height',
    '$bmi','$bp','$pr','$scalp','$skin_nails','$eyes','$visual_acuity','$ears','$hearing_test',
    '$nose','$throat','$mouth_tongue','$teeth_gums','$chest_breasts','$heart','$lungs','$abdomen',
    '$genitalia','$spine_extremities','$sexual','$screening','$otherfindings','$remarks')";
    if(mysqli_query($conn, $sql)){
        // echo "<script>window.history.go(-1);</script>";
        header('location: ../schoolhealthassessmentformcollege.php');
        echo $_SESSION['success'] ="
            <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                <h2 style='
                color: #fff;
                font-size: 16px;
                margin-left: 10px;'>Health Assessment Added.</h2>
            </div>
        ";
    }
}

if (isset($_GET['med_id'])) {
    $med_id = $_GET['med_id'];

    // Perform the necessary database update to mark the message as read
    // Replace 'your_table_name' with the actual table name where you store the messages
    $sql = "UPDATE medical SET is_read = 1 WHERE med_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $med_id);
    $stmt->execute();

    // Redirect the user back to the original page or any other appropriate page
    header("Location: ../medicalrequestcollege.php");
    exit();
}





?>
