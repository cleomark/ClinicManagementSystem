<?php
    session_start();
    include '../../../db.php';
    require '../../../vendor/autoload.php';
    
    use GuzzleHttp\Client;
    use GuzzleHttp\RequestOptions;
    if(isset($_POST['submit_dentalgsjhsshs'])){ // pag get ng data
        $admin_id = $_POST['admin_id'];
        $idnumber = $_POST['idnumber']; 
        $fullname = $_POST['fullname'];
        $role = $_POST['role'];
        $cenrolled = $_POST['cenrolled'];
        $service = $_POST['service'];
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
        $sql = "INSERT INTO dentalapp VALUES ('','$admin_id','$idnumber','$fullname','$role','$cenrolled','$service','$formattedDatetime', NOW(), '$phoneNumber', '$is_deleted_on_website')";
    
        if (mysqli_query($conn, $sql)) {
            // Check if it's time to send a reminder
            $currentTime = new DateTime(); // Current time in the specified timezone
    
            // Check if the reminder time is within 2 hour before the appointment time
            if ($currentTime >= $reminderDateTime && $currentTime < $appointmentDateTime) {
                // Send SMS reminder
                $message = "Hi {$fullname}, this is a reminder for your medical appointment on {$formattedDatetime}. It's just 1 hour away. See you soon!";
    
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
    
            header('location: ../dentalgsjhsshs.php');
            $_SESSION['success'] = "
                <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                    <h2 style='
                    color: #fff;
                    font-size: 16px;
                    margin-left: 10px;'>Dental Appointment Added.</h2>
                </div>
            ";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    
        mysqli_close($conn);
    }  // for dental gsjhshs

    if(isset($_POST['submit_statusdentalgsjhsshsmon'])) {
        // Retrieve the submitted form data
        $status_id = $_POST['status_id'];
        $statusden9_am = $_POST['statusden9_am'];
        $statusden10_am = $_POST['statusden10_am'];
        $statusden11_am  = $_POST['statusden11_am'];
    
        // Step 4: Execute the update query
        $sql = "UPDATE statusdentalgsjhsshsmonday SET statusden9_am='$statusden9_am', statusden10_am='$statusden10_am', statusden11_am='$statusden11_am'
        WHERE status_id = $status_id";
    
        // Execute the query and handle the result
        if (mysqli_query($conn, $sql)) {
            // Step 5: Handle the update result
            echo '<script>alert("Successfully updated!");</script>';
            echo '<script>window.location.href="../dentalgsjhsshs.php";</script>';
            exit;
        } else {
            echo '<script>alert("Error: ' . mysqli_error($conn) . '");</script>';
        }
    }  //for update dental gsjhsshs

    if(isset($_POST['submit_statusdentalgsjhsshstue'])) {
        // Retrieve the submitted form data
        $status_id = $_POST['status_id'];
        $statusden9_am = $_POST['statusden9_am'];
        $statusden10_am = $_POST['statusden10_am'];
        $statusden11_am  = $_POST['statusden11_am'];
    
        // Step 4: Execute the update query
        $sql = "UPDATE statusdentalgsjhsshstuesday SET statusden9_am='$statusden9_am', statusden10_am='$statusden10_am', statusden11_am='$statusden11_am'
        WHERE status_id = $status_id";
    
        // Execute the query and handle the result
        if (mysqli_query($conn, $sql)) {
            // Step 5: Handle the update result
            echo '<script>alert("Successfully updated!");</script>';
            echo '<script>window.location.href="../dentalgsjhsshs.php";</script>';
            exit;
        } else {
            echo '<script>alert("Error: ' . mysqli_error($conn) . '");</script>';
        }
    }  //for update dental gsjhsshs


    if(isset($_POST['submit_statusdentalgsjhsshswed'])) {
        // Retrieve the submitted form data
        $status_id = $_POST['status_id'];
        $statusden9_am = $_POST['statusden9_am'];
        $statusden10_am = $_POST['statusden10_am'];
        $statusden11_am  = $_POST['statusden11_am'];
    
        // Step 4: Execute the update query
        $sql = "UPDATE statusdentalgsjhsshswednesday SET statusden9_am='$statusden9_am', statusden10_am='$statusden10_am', statusden11_am='$statusden11_am'
        WHERE status_id = $status_id";
    
        // Execute the query and handle the result
        if (mysqli_query($conn, $sql)) {
            // Step 5: Handle the update result
            echo '<script>alert("Successfully updated!");</script>';
            echo '<script>window.location.href="../dentalgsjhsshs.php";</script>';
            exit;
        } else {
            echo '<script>alert("Error: ' . mysqli_error($conn) . '");</script>';
        }
    }  //for update dental gsjhsshs

    if(isset($_POST['submit_statusdentalgsjhsshsthu'])) {
        // Retrieve the submitted form data
        $status_id = $_POST['status_id'];
        $statusden9_am = $_POST['statusden9_am'];
        $statusden10_am = $_POST['statusden10_am'];
        $statusden11_am  = $_POST['statusden11_am'];
    
        // Step 4: Execute the update query
        $sql = "UPDATE statusdentalgsjhsshsthursday SET statusden9_am='$statusden9_am', statusden10_am='$statusden10_am', statusden11_am='$statusden11_am'
        WHERE status_id = $status_id";
    
        // Execute the query and handle the result
        if (mysqli_query($conn, $sql)) {
            // Step 5: Handle the update result
            echo '<script>alert("Successfully updated!");</script>';
            echo '<script>window.location.href="../dentalgsjhsshs.php";</script>';
            exit;
        } else {
            echo '<script>alert("Error: ' . mysqli_error($conn) . '");</script>';
        }
    }  //for update dental gsjhsshs

    if(isset($_POST['submit_statusdentalgsjhsshsfri'])) {
        // Retrieve the submitted form data
        $status_id = $_POST['status_id'];
        $statusden9_am = $_POST['statusden9_am'];
        $statusden10_am = $_POST['statusden10_am'];
        $statusden11_am  = $_POST['statusden11_am'];
    
        // Step 4: Execute the update query
        $sql = "UPDATE statusdentalgsjhsshsfriday SET statusden9_am='$statusden9_am', statusden10_am='$statusden10_am', statusden11_am='$statusden11_am'
        WHERE status_id = $status_id";
    
        // Execute the query and handle the result
        if (mysqli_query($conn, $sql)) {
            // Step 5: Handle the update result
            echo '<script>alert("Successfully updated!");</script>';
            echo '<script>window.location.href="../dentalgsjhsshs.php";</script>';
            exit;
        } else {
            echo '<script>alert("Error: ' . mysqli_error($conn) . '");</script>';
        }
    } 
?>
