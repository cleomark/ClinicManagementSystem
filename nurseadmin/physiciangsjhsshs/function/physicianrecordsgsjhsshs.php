<?php
    session_start();
    include '../../../db.php';
    require '../../../vendor/autoload.php';
    
    use GuzzleHttp\Client;
    use GuzzleHttp\RequestOptions;
    if(isset($_POST['submit_physiciangsjhsshs'])){ // pag get ng data
        $admin_id = $_POST['admin_id'];
        $idnumber = $_POST['idnumber']; 
        $fullname = $_POST['fullname'];
        $cenrolled = $_POST['cenrolled'];
        $role = $_POST['role'];
        $date_time = $_POST['date_time'];
        $phoneNumber = $_POST['phoneNumber'];
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
        $sql = "INSERT INTO physicianapp VALUES ('','$admin_id','$idnumber','$fullname','$cenrolled','$role','$formattedDatetime', NOW(), '$phoneNumber', '$is_deleted_on_website')";
    
        if (mysqli_query($conn, $sql)) {
            // Check if it's time to send a reminder
            $currentTime = new DateTime(); // Current time in the specified timezone
    
            // Check if the reminder time is within 2 hour before the appointment time
            if ($currentTime >= $reminderDateTime && $currentTime < $appointmentDateTime) {
                // Send SMS reminder
                $message = "Hi {$fullname}, this is a reminder for your physician consultation appointment on {$formattedDatetime}. It's just 1 hour away. See you soon!";
    
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
                    echo "SMS reminder sent to {$fullname} successfully.\n";
                } else {
                    echo "Failed to send SMS reminder to {$fullname}.\n";
                }
            }
    
            header('location: ../physicianapproved.php');
            $_SESSION['success'] = "
                <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                    <h2 style='
                    color: #fff;
                    font-size: 16px;
                    margin-left: 10px;'>Physician Consultation Appointment Added.</h2>
                </div>
            ";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    
        mysqli_close($conn);
    }// for physician gsjhsshs

    if(isset($_POST['submit_physicalgsjhs'])){ // pag get ng data
        $admin_id = $_POST['admin_id'];
        $idnumber = $_POST['idnumber']; 
        $fullname = $_POST['fullname'];
        $age = $_POST['age'];
        $sex = $_POST['sex'];
        $levelsection = $_POST['levelsection'];
        $pastsurgeries = $_POST['pastsurgeries'];
        $allergies = $_POST['allergies'];
        $familyhistory = $_POST['familyhistory'];
        $bp = $_POST['bp'];
        $pr = $_POST['pr'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $bmi = $_POST['bmi'];
        $heent = $_POST['heent'];
        $cvs = $_POST['cvs'];
        $gis = $_POST['gis'];
        $gus = $_POST['gus'];
        $extremities = $_POST['extremities'];
        $remarks = $_POST['remarks'];
        $medicalexaminer = $_POST['medicalexaminer'];
        $dateexamined = $_POST['dateexamined'];

       
     
        $sql = "INSERT INTO physicalexaminationgsjhs VALUES ('','$admin_id','$idnumber','$fullname','$age','$sex','$levelsection','$pastsurgeries', '$allergies',
        '$familyhistory', '$bp', '$pr', '$height', '$weight', '$bmi', '$heent', '$cvs', '$gis', '$gus', '$extremities', '$remarks', '$medicalexaminer', '$dateexamined')";
        if(mysqli_query($conn, $sql)){
            // echo "<script>window.history.go(-1);</script>";
            header('location: ../physicalexaminationgsjhs.php');
            echo $_SESSION['success'] ="
                <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                    <h2 style='
                    color: #fff;
                    font-size: 16px;
                    margin-left: 10px;'>Physical Examination Record Added.</h2>
                </div>
            ";
        }
    } // for physical gsjhs

    if(isset($_POST['submit_physicalshs'])){ // pag get ng data
        $admin_id = $_POST['admin_id'];
        $idnumber = $_POST['idnumber']; 
        $fullname = $_POST['fullname'];
        $age = $_POST['age'];
        $gradesection = $_POST['gradesection'];
        $sex = $_POST['sex'];
        $pastsurgeries = $_POST['pastsurgeries'];
        $allergies = $_POST['allergies'];
        $familyhistory = $_POST['familyhistory'];
        $bp = $_POST['bp'];
        $pr = $_POST['pr'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $heent = $_POST['heent'];
        $cvs = $_POST['cvs'];
        $gis = $_POST['gis'];
        $gus = $_POST['gus'];
        $skin = $_POST['skin'];
        $musculoskeletal = $_POST['musculoskeletal'];
        $remarks = $_POST['remarks'];
        $medicalexaminer = $_POST['medicalexaminer'];
        $dateexamined = $_POST['dateexamined'];

       
     
        $sql = "INSERT INTO physicalexaminationshs VALUES ('','$admin_id','$idnumber','$fullname','$age','$gradesection','$sex','$pastsurgeries', '$allergies',
        '$familyhistory', '$bp', '$pr', '$height', '$weight','$heent', '$cvs', '$gis', '$gus', '$skin','$musculoskeletal','$remarks', '$medicalexaminer', '$dateexamined')";
        if(mysqli_query($conn, $sql)){
            // echo "<script>window.history.go(-1);</script>";
            header('location: ../physicalexaminationshs.php');
            echo $_SESSION['success'] ="
                <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                    <h2 style='
                    color: #fff;
                    font-size: 16px;
                    margin-left: 10px;'>Physical Examination Record Added.</h2>
                </div>
            ";
        }
    } // for physical shs

    if(isset($_POST['submit_pysicianordergsjhs'])){ // pag get ng data
        $admin_id = $_POST['admin_id'];
        $datetime = $_POST['datetime'];
        $formattedDatetime = date("Y-m-d h:i A", strtotime($datetime));

        $progressnotes = $_POST['progressnotes']; 
        $doctorsorder = $_POST['doctorsorder'];
        $idnumber = $_POST['idnumber'];
        $fullname = $_POST['fullname'];
        $age = $_POST['age'];
        $levelsection = $_POST['levelsection'];
    
    
        $sql = "INSERT INTO physicianorderprogressgsjhs VALUES ('','$admin_id','$formattedDatetime','$progressnotes','$doctorsorder','$idnumber','$fullname','$age','$levelsection')";
        if(mysqli_query($conn, $sql)){
            // echo "<script>window.history.go(-1);</script>";
            header('location: ../physicianorderandprogressgsjhs.php');
            echo $_SESSION['success'] ="
                <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                    <h2 style='
                    color: #fff;
                    font-size: 16px;
                    margin-left: 10px;'>Physician's Order Sheet and Progress Notes Added.</h2>
                </div>
            ";
        }
    } // for physician gsjhsshs

    if(isset($_POST['submit_pysicianordershs'])){ // pag get ng data
        $admin_id = $_POST['admin_id'];
        $datetime = $_POST['datetime'];
        $formattedDatetime = date("Y-m-d h:i A", strtotime($datetime));

        $progressnotes = $_POST['progressnotes']; 
        $doctorsorder = $_POST['doctorsorder'];
        $idnumber = $_POST['idnumber'];
        $fullname = $_POST['fullname'];
        $age = $_POST['age'];
        $grade = $_POST['grade'];
    
    
        $sql = "INSERT INTO physicianorderprogressshs VALUES ('','$admin_id','$formattedDatetime','$progressnotes','$doctorsorder','$idnumber','$fullname','$age','$grade')";
        if(mysqli_query($conn, $sql)){
            // echo "<script>window.history.go(-1);</script>";
            header('location: ../physicianorderandprogressshs.php');
            echo $_SESSION['success'] ="
                <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                    <h2 style='
                    color: #fff;
                    font-size: 16px;
                    margin-left: 10px;'>Physician's Order Sheet and Progress Notes Added.</h2>
                </div>
            ";
        }
    } // for physician shs

    if(isset($_POST['submit_statusphysiciangsjhsshs'])) {
        // Retrieve the submitted form data
        $statphysician_id = $_POST['statphysician_id'];
        $status811 = $_POST['status811'];
       
    
        // Step 4: Execute the update query
        $sql = "UPDATE statusphysiciangsjhsshs SET status811='$status811'
        WHERE statphysician_id = $statphysician_id";
    
        // Execute the query and handle the result
        if (mysqli_query($conn, $sql)) {
            // Step 5: Handle the update result
            echo '<script>alert("Successfully updated!");</script>';
            echo '<script>window.location.href="../physicianapproved.php";</script>';
            exit;
        } else {
            echo '<script>alert("Error: ' . mysqli_error($conn) . '");</script>';
        }
    }
?>
