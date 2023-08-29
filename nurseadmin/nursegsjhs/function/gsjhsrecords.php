<?php
    session_start();
    include '../../../db.php';
    require '../../../vendor/autoload.php';
    
    use GuzzleHttp\Client;
    use GuzzleHttp\RequestOptions;
    
    if (isset($_POST['submit_medicalgsjhs'])) {
        // Sanitize and validate user inputs
        $user_id = $_POST['user_id'];
        $idnumber = $_POST['idnumber'];
        $name1 = $_POST['name1'];
        $gradecourseyear1 = $_POST['gradecourseyear1'];
        $phoneno = $_POST['phoneno'];
        $date_time = $_POST['date_time'];
        $role = $_POST['role'];
        $onoff = $_POST['onoff'];
        $is_deleted_on_website = $_POST['is_deleted_on_website'];
    
        // Validate and sanitize inputs here...
    
        // Convert appointment datetime to a DateTime object
        date_default_timezone_set('Asia/Manila');
        $appointmentDateTime = new DateTime($date_time);
        $formattedDatetime = $appointmentDateTime->format("Y-m-d h:i A");
    
        // Calculate the reminder time (1 hour before appointment)
        $reminderDateTime = clone $appointmentDateTime;
        $reminderDateTime->modify("-2 hour");
    
        // Insert the sanitized data into the database
        $sql = "INSERT INTO medicalapp VALUES ('','$user_id','$idnumber','$name1','$gradecourseyear1','$phoneno','$role','$onoff','$formattedDatetime', NOW(),'$is_deleted_on_website')";
    
        if (mysqli_query($conn, $sql)) {
            // Check if it's time to send a reminder
            $currentTime = new DateTime(); // Current time in the specified timezone
    
            // Check if the reminder time is within 1 hour before the appointment time
            if ($currentTime >= $reminderDateTime && $currentTime < $appointmentDateTime) {
                // Send SMS reminder
                $message = "Hi {$name1}, this is a reminder for your medical appointment on {$formattedDatetime}. It's just 2 hours away. See you soon!";
    
                $client = new Client([
                    'base_uri' => "https://k3n5n1.api.infobip.com",
                    'headers' => [
                        'Authorization' => "App 06c65a798c0587c8dc83b35c0ac75dab-be21e6fb-9215-4fc1-b1fd-9754acc09cac",
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                    ]
                ]);
    
                $response = $client->request(
                    'POST',
                    'sms/2/text/advanced',
                    [
                        RequestOptions::JSON => [
                            'messages' => [
                                [
                                    'from' => 'Clinic DWCL',
                                    'destinations' => [
                                        ['to' => $phoneNumber]
                                    ],
                                    'text' => $message,
                                ]
                            ]
                        ],
                    ]
                );
    
                if ($response->getStatusCode() == 200) {
                    echo "SMS reminder sent to {$name1} successfully.\n";
                } else {
                    echo "Failed to send SMS reminder to {$name1}.\n";
                }
            }
    
            header('location: ../medicalgsjhs.php');
            $_SESSION['success'] = "
                <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                    <h2 style='
                    color: #fff;
                    font-size: 16px;
                    margin-left: 10px;'>Medical Appointment Added.</h2>
                </div>
            ";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    
        mysqli_close($conn);
    } //for medical appointment gsjhs

if(isset($_POST['submit_medicine'])){ // pag get ng data
    $admin_id = $_POST['admin_id'];
    $medicine_name = $_POST['medicine_name']; 
    $quantity = $_POST['quantity']; 

    date_default_timezone_set('Asia/Manila');
    $date_created = date('Y-m-d h:i A'); 

    $sql = "INSERT INTO medicine VALUES ('','$admin_id','$medicine_name','$quantity','$date_created')";
    if(mysqli_query($conn, $sql)){
        // echo "<script>window.history.go(-1);</script>";
        header('location: ../patientmanagementrecordgsjhs.php');
        echo $_SESSION['success'] ="
            <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                <h2 style='
                color: #fff;
                font-size: 16px;
                margin-left: 10px;'>Medicine Added.</h2>
            </div>
        ";
    }
} //for medical appointment shs
if(isset($_POST['submit_statusmedicalgsjhs'])) {
    // Retrieve the submitted form data
    $medical_id = $_POST['medical_id'];
    $statusmedmonam_1 = $_POST['statusmedmonam_1'];
    $statusmedtueam_2 = $_POST['statusmedtueam_2'];
    $statusmedwedam_3 = $_POST['statusmedwedam_3'];
    $statusmedthuam_4  = $_POST['statusmedthuam_4'];
    $statusmedfriam_5  = $_POST['statusmedfriam_5'];
    $statusmedmonpm_6  = $_POST['statusmedmonpm_6'];
    $statusmedtuepm_7  = $_POST['statusmedtuepm_7'];
    $statusmedwedpm_8  = $_POST['statusmedwedpm_8'];
    $statusmedthupm_9  = $_POST['statusmedthupm_9'];
    $statusmedfripm_10 = $_POST['statusmedfripm_10'];

    // Step 4: Execute the update query
    $sql = "UPDATE statusmedicalgsjhs SET statusmedmonam_1='$statusmedmonam_1', statusmedtueam_2='$statusmedtueam_2', 
    statusmedwedam_3='$statusmedwedam_3', statusmedthuam_4='$statusmedthuam_4', statusmedfriam_5='$statusmedfriam_5', 
    statusmedmonpm_6='$statusmedmonpm_6', statusmedtuepm_7='$statusmedtuepm_7', statusmedwedpm_8='$statusmedwedpm_8',
    statusmedthupm_9='$statusmedthupm_9', statusmedfripm_10 ='$statusmedfripm_10'
    WHERE medical_id = $medical_id";

    // Execute the query and handle the result
    if (mysqli_query($conn, $sql)) {
        // Step 5: Handle the update result
        echo '<script>alert("Successfully updated!");</script>';
        echo '<script>window.location.href="../medicalgsjhs.php";</script>';
        exit;
    } else {
        echo '<script>alert("Error: ' . mysqli_error($conn) . '");</script>';
    }
}  //for update medical schedules

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
        header('location: ../patientmanagementrecordgsjhs.php');
        echo $_SESSION['success'] ="
            <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                <h2 style='
                color: #fff;
                font-size: 16px;
                margin-left: 10px;'>Patient Record Management Added.</h2>
            </div>
        ";
    }
} // for patient record management gsjhs

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
        header('location: ../schoolhealthassessmentformgsjhs.php');
        echo $_SESSION['success'] ="
            <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                <h2 style='
                color: #fff;
                font-size: 16px;
                margin-left: 10px;'>Health Assessment Added.</h2>
            </div>
        ";
    }
} // for school health assessment form gsjhs


?>
