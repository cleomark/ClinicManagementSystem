<?php
    session_start();
    include '../../../db.php';
    require '../../../vendor/autoload.php';

    use GuzzleHttp\Client;
    use GuzzleHttp\RequestOptions;
    
   
    if (isset($_POST['submit_dental'])) {
        $user_id = $_POST['user_id'];
        $idnumber = $_POST['idnumber'];
        $fullname = $_POST['fullname'];
        $service = $_POST['service'];
        $phoneno= $_POST['phoneno'];
        $gradecourseyear = $_POST ['gradecourseyear'];
        $role = $_POST['role'];
        $date_time = $_POST['date_time'];
        $is_deleted_on_website = $_POST['is_deleted_on_website'];
        
        // Set the time zone to Asia/Manila
        date_default_timezone_set('Asia/Manila');
        $appointmentDateTime = new DateTime($date_time);
        $formattedDatetime = $appointmentDateTime->format("Y-m-d h:i A");
    
        // Calculate the reminder time (1 hour before appointment)
        $reminderDateTime = clone $appointmentDateTime;
        $reminderDateTime->modify("-2 hour");
        
    
        $sql = "INSERT INTO dentalapp VALUES ('','$user_id','$idnumber','$fullname','$service','$phoneno','$gradecourseyear','$role','$formattedDatetime',NOW(),'$is_deleted_on_website')";
    
        if (mysqli_query($conn, $sql)) {
            // Check if it's time to send a reminder
            $currentTime = new DateTime(); // Current time in the specified timezone
    
            // Check if the reminder time is within 1 hour before the appointment time
            if ($currentTime >= $reminderDateTime && $currentTime < $appointmentDateTime) {
                // Send SMS reminder
                $message = "Hi {$fullname}, this is a reminder for your dental appointment on {$formattedDatetime}. It's just 2 hours away. See you soon!";
    
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
                                        ['to' => $phoneno]
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
    
            header('location: ../adddentalmessageshs.php');
            $_SESSION['success'] = "
                <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                    <h2 style='
                    color: #fff;
                    font-size: 16px;
                    margin-left: 10px;'>Dental Request Appointment Added.</h2>
                </div>
            ";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    
        mysqli_close($conn);
    } //for dental appointment shs
    
    
    if (isset($_POST['submit_medical'])) {
        $user_id = $_POST['user_id'];
        $idnumber = $_POST['idnumber'];
        $name1 = $_POST['name1'];
        $gradecourseyear1 = $_POST ['gradecourseyear1'];
        $phoneno = $_POST ['phoneno'];
        $date_time = $_POST ['date_time'];
        $role = $_POST['role'];
        $onoff = $_POST['onoff'];
        $is_deleted_on_website = $_POST['is_deleted_on_website'];
        
        // Set the time zone to Asia/Manila
        date_default_timezone_set('Asia/Manila');
        $appointmentDateTime = new DateTime($date_time);
        $formattedDatetime = $appointmentDateTime->format("Y-m-d h:i A");
    
        // Calculate the reminder time (1 hour before appointment)
        $reminderDateTime = clone $appointmentDateTime;
        $reminderDateTime->modify("-2 hour");
    
        // Insert the sanitized data into the database
        $sql = "INSERT INTO medicalapp VALUES ('','$user_id','$idnumber','$name1','$gradecourseyear1','$phoneno','$formattedDatetime', '$role','$onoff',NOW(),'$is_deleted_on_website')";
    
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
                                        ['to' => $phoneno]
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
    
            header('location: ../addmedicalmessageshs.php');
            $_SESSION['success'] = "
                <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                    <h2 style='
                    color: #fff;
                    font-size: 16px;
                    margin-left: 10px;'>Medical Request Appointment Added.</h2>
                </div>
            ";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    
        mysqli_close($conn);
    } //for medical appointment shs

    if (isset($_POST['submit_physician'])) {
        $user_id = $_POST['user_id'];
        $idnumber = $_POST['idnumber'];
        $name = $_POST['name'];
        $phoneno = $_POST ['phoneno'];
        $gradesection = $_POST ['gradesection'];
        $role = $_POST['role'];
        $date_time = $_POST ['date_time'];
        $is_deleted_on_website = $_POST['is_deleted_on_website'];
        
        // Set the time zone to Asia/Manila
        date_default_timezone_set('Asia/Manila');
        $appointmentDateTime = new DateTime($date_time);
        $formattedDatetime = $appointmentDateTime->format("Y-m-d h:i A");
    
        // Calculate the reminder time (1 hour before appointment)
        $reminderDateTime = clone $appointmentDateTime;
        $reminderDateTime->modify("-2 hour");
    
        // Insert the sanitized data into the database
        $sql = "INSERT INTO physicianapp VALUES ('','$user_id','$idnumber','$name','$phoneno','$gradesection','$role','$formattedDatetime',NOW(),'$is_deleted_on_website')";
    
        if (mysqli_query($conn, $sql)) {
            // Check if it's time to send a reminder
            $currentTime = new DateTime(); // Current time in the specified timezone
    
            // Check if the reminder time is within 1 hour before the appointment time
            if ($currentTime >= $reminderDateTime && $currentTime < $appointmentDateTime) {
                // Send SMS reminder
                $message = "Hi {$name}, this is a reminder for your physician consultation appointment on {$formattedDatetime}. It's just 2 hours away. See you soon!";
    
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
                                        ['to' => $phoneno]
                                    ],
                                    'text' => $message,
                                ]
                            ]
                        ],
                    ]
                );
    
                if ($response->getStatusCode() == 200) {
                    echo "SMS reminder sent to {$name} successfully.\n";
                } else {
                    echo "Failed to send SMS reminder to {$name}.\n";
                }
            }
    
            header('location: ../addphysicianmessageshs.php');
            $_SESSION['success'] = "
                <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                    <h2 style='
                    color: #fff;
                    font-size: 16px;
                    margin-left: 10px;'>Physician Consultation Request Appointment Added.</h2>
                </div>
            ";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    
        mysqli_close($conn);
    } //for physician appointment shs

?> 