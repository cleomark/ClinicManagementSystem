<?php
    session_start();
    include '../../../db.php';
    require '../../../vendor/autoload.php';
    
    use GuzzleHttp\Client;
    use GuzzleHttp\RequestOptions;
    if(isset($_POST['submit_physiciancollege'])){ // pag get ng data
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
                $message = "Hi {$fullname}, this is a reminder for your physician consultation appointment on {$formattedDatetime}. It's just 2 hours away. See you soon!";
    
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
    
            header('location: ../physicianapprovedcollege.php');
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
    } // for physician college

    if(isset($_POST['submit_statusphysiciancollege'])) {
        // Retrieve the submitted form data
        $statusphycollege_id = $_POST['statusphycollege_id'];
        $status812 = $_POST['status812'];
       
    
        // Step 4: Execute the update query
        $sql1 = "UPDATE statusphysiciancollege SET status812='$status812'
        WHERE statusphycollege_id = $statusphycollege_id";
    
        // Execute the query and handle the result
        if (mysqli_query($conn, $sql1)) {
            // Step 5: Handle the update result
            echo '<script>alert("Successfully updated!");</script>';
            echo '<script>window.location.href="../physicianapprovedcollege.php";</script>';
            exit;
        } else {
            echo '<script>alert("Error: ' . mysqli_error($conn) . '");</script>';
        }
    }
?>
