<?php
    session_start();
    include '../../db.php';


    if(isset($_POST['signup'])){
        $username = $_POST['username'];
        $role = $_POST['role'];
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        if(substr($email, -16) != '@dwc-legazpi.edu'){
            echo $_SESSION['failed'] = "
                <div>
                    <p style='font-size: 12px; color: red;'>Email is not a valid email. Please try again.</p>
                </div>
            ";
            header('Location: ../signup.php');
        } else {
            $query = mysqli_query($conn, "SELECT * FROM admins WHERE username = '$username'");
            if(mysqli_num_rows($query) > 0){
                echo $_SESSION['failed'] = "
                    <div>
                        <p style='font-size: 12px; color: red;'>Email is already taken. Please try again.</p>
                    </div>
                ";
                header('Location: ../signup.php');
            } else {
                // Hash the password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
                $sql_add = "INSERT INTO `admins`(`role`, `username`, `email`, `password`) VALUES ('$role','$username','$email','$hashedPassword')";
                if($conn->query($sql_add) === TRUE){
                    $sql = "SELECT * FROM admins WHERE username = '$username'";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0){
                        $row = mysqli_fetch_array($result);
                        $_SESSION['admin_id'] = $row['id'];
                        $_SESSION['role'] = $row['role'];
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['email'] = $row['email'];
                        header('Location: ../signup.php');
                    }
                }
            }
        }
    }
    
    
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        $sql = "SELECT * FROM admins WHERE username = '$username'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_array($result);
            $hashedPassword = $row['password'];
    
            // Verify the password
            if (password_verify($password, $hashedPassword)) {
                $_SESSION['admin_id'] = $row['admin_id'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];
    
                $role = $row['role'];
                if ($role == '1') {
                    header('Location: ../nursegsjhs/nurseingsjhs.php');
                } elseif ($role == '2') {
                    header('Location: ../nurseshs/nurseinshs.php');
                } elseif ($role == '3') {
                    // Handle role 3
                    header('Location: ../nursecollege/nurseincollege.php');
                } elseif ($role == '4') {
                    // Handle role 4
                    header('Location: ../dentistgsjhsshs/dentistingsjhsshs.php');
                } elseif ($role == '5') {
                    // Handle role 5
                    header('Location: ../dentistcollege/dentistincollege.php');
                } elseif ($role == '6') {
                    // Handle role 6
                    header('Location: ../physiciangsjhsshs/physiciangsjhsshs.php');
                } elseif ($role == '7') {
                    // Handle role 7
                    header('Location: ../physiciancollege/physiciancollege.php');
                } else {
                    // Handle other roles or scenarios as needed
                    header('Location: ../dashboard.php');
                }
            } else {
                $_SESSION['failed'] = "Invalid username or password. Please try again.";
                header('Location: ../login.php');
            }
        } else {
            $_SESSION['failed'] = "Invalid username or password. Please try again.";
            header('Location: ../login.php');
        }
    }
    
    if (isset($_POST['submit_dental'])) {
        // Get the submitted form data
        $admin_id = $_POST['admin_id'];
        $idnumber = $_POST['idnumber']; 
        $fullname = $_POST['fullname'];
        $role = $_POST['role'];
        $cenrolled = $_POST['cenrolled'];
        $service = $_POST['service'];
        $date_time = $_POST['date_time'];
        $dentist_name = $_POST['dentist_name'];
    
        date_default_timezone_set('Asia/Manila');
        $date_created = date('Y-m-d h:i A'); 
    
        $sql = "INSERT INTO dentalapp VALUES ('','$admin_id','$idnumber','$fullname','$role','$cenrolled','$service','$date_time','$dentist_name','$date_created')";
        if (mysqli_query($conn, $sql)) {
            // Redirect to dentalgsjhs.php
            header('location: ../dentalgsjhs.php');
            exit;
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
        }
    }
    
      
    if (isset($_POST['submit_dentalshs'])) {
        // Get the submitted form data
        $admin_id = $_POST['admin_id'];
        $idnumber = $_POST['idnumber']; 
        $fullname = $_POST['fullname'];
        $role = $_POST['role'];
        $cenrolled = $_POST['cenrolled'];
        $service = $_POST['service'];
        $date_time = $_POST['date_time'];
    
        date_default_timezone_set('Asia/Manila');
        $date_created = date('Y-m-d h:i A'); 
    
        $sql = "INSERT INTO dentalapp VALUES ('','$admin_id','$idnumber','$fullname','$role','$cenrolled','$service','$date_time','$date_created')";
        if (mysqli_query($conn, $sql)) {
            // Redirect to dentalgsjhs.php
            header('location: ../dentalgsjhsshs.php');
            exit;
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
        }
    }
    
    
    if(isset($_POST['submit_dentalcollege'])){ // pag get ng data
        $admin_id = $_POST['admin_id'];
        $idnumber = $_POST['idnumber']; 
        $fullname = $_POST['fullname'];
        $role = $_POST['role'];
        $cenrolled = $_POST['cenrolled'];
        $service = $_POST['service'];
        $date_time = $_POST['date_time'];
        $dentist_name = $_POST['dentist_name'];

        date_default_timezone_set('Asia/Manila');
        $date_created = date('Y-m-d h:i A'); 

        $sql = "INSERT INTO dentalapp VALUES ('','$admin_id','$idnumber','$fullname','$role','$cenrolled','$service','$date_time','$dentist_name','$date_created')";
        if(mysqli_query($conn, $sql)){
            // echo "<script>window.history.go(-1);</script>";
            header('location: ../dentalcollege.php');
            echo $_SESSION['success'] ="
                <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                    <h2 style='
                    color: #fff;
                    font-size: 16px;
                    margin-left: 10px;'>Dental Appointment Added.</h2>
                </div>
            ";
        }
    }

// Step 3: Handle the form submission

// Assuming you have the $role variable defined somewhere
if(isset($_POST['submit_status'])) {
    // Retrieve the submitted form data
    $status_id = $_POST['status_id'];
    $statuses1030_1 = $_POST['statuses1030_1'];
    $statuses1130_2 = $_POST['statuses1130_2'];
    $statuses230_3 = $_POST['statuses230_3'];
    $statuses330_4 = $_POST['statuses330_4'];
    $statuses430_5 = $_POST['statuses430_5'];

    // Step 4: Execute the update query
    $sql = "UPDATE status SET statuses1030_1='$statuses1030_1', statuses1130_2='$statuses1130_2', statuses230_3='$statuses230_3', statuses330_4='$statuses330_4', statuses430_5='$statuses430_5' WHERE status_id = $status_id";

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



if(isset($_POST['submit_statusshs'])) {
    // Retrieve the submitted form data
    $status_id = $_POST['status_id'];
    $statuses1030_1 = $_POST['statuses1030_1'];
    $statuses1130_2 = $_POST['statuses1130_2'];
    $statuses230_3 = $_POST['statuses230_3'];
    $statuses330_4 = $_POST['statuses330_4'];

    // Step 4: Execute the update query
    $sql = "UPDATE statusshs SET statuses1030_1='$statuses1030_1', statuses1130_2='$statuses1130_2', statuses230_3='$statuses230_3', statuses330_4='$statuses330_4' WHERE status_id = $status_id";

    // Execute the query and handle the result
    if (mysqli_query($conn, $sql)) {
        // Step 5: Handle the update result
        echo '<script>alert("Successfully updated!");</script>';
        echo '<script>window.location.href="../dentalshs.php";</script>';
        exit;
    } else {
        echo '<script>alert("Error: ' . mysqli_error($conn) . '");</script>';
    }
}  


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
}  

if(isset($_POST['submit_statusmedicalshs'])) {
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
    $sql = "UPDATE statusmedicalshs SET statusmedmonam_1='$statusmedmonam_1', statusmedtueam_2='$statusmedtueam_2', 
    statusmedwedam_3='$statusmedwedam_3', statusmedthuam_4='$statusmedthuam_4', statusmedfriam_5='$statusmedfriam_5', 
    statusmedmonpm_6='$statusmedmonpm_6', statusmedtuepm_7='$statusmedtuepm_7', statusmedwedpm_8='$statusmedwedpm_8',
    statusmedthupm_9='$statusmedthupm_9', statusmedfripm_10 ='$statusmedfripm_10'
    WHERE medical_id = $medical_id";

    // Execute the query and handle the result
    if (mysqli_query($conn, $sql)) {
        // Step 5: Handle the update result
        echo '<script>alert("Successfully updated!");</script>';
        echo '<script>window.location.href="../medicalshs.php";</script>';
        exit;
    } else {
        echo '<script>alert("Error: ' . mysqli_error($conn) . '");</script>';
    }
}  

if(isset($_POST['submit_statusmedicalcollege'])) {
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
    $sql = "UPDATE statusmedicalcollege SET statusmedmonam_1='$statusmedmonam_1', statusmedtueam_2='$statusmedtueam_2', 
    statusmedwedam_3='$statusmedwedam_3', statusmedthuam_4='$statusmedthuam_4', statusmedfriam_5='$statusmedfriam_5', 
    statusmedmonpm_6='$statusmedmonpm_6', statusmedtuepm_7='$statusmedtuepm_7', statusmedwedpm_8='$statusmedwedpm_8',
    statusmedthupm_9='$statusmedthupm_9', statusmedfripm_10 ='$statusmedfripm_10'
    WHERE medical_id = $medical_id";

    // Execute the query and handle the result
    if (mysqli_query($conn, $sql)) {
        // Step 5: Handle the update result
        echo '<script>alert("Successfully updated!");</script>';
        echo '<script>window.location.href="../medicalcollege.php";</script>';
        exit;
    } else {
        echo '<script>alert("Error: ' . mysqli_error($conn) . '");</script>';
    }
}  

if(isset($_POST['submit_medicalgsjhs'])){ // pag get ng data
    $admin_id = $_POST['admin_id'];
    $idnumber = $_POST['idnumber']; 
    $name1 = $_POST['name1'];
    $gradecourseyear1 = $_POST['gradecourseyear1'];
    $role = $_POST['role'];
    $onoff = $_POST['onoff'];
    $date_time = $_POST['date_time'];

    date_default_timezone_set('Asia/Manila');
    $date_created = date('Y-m-d h:i A'); 

    $sql = "INSERT INTO medicalapp VALUES ('','$admin_id','$idnumber','$name1','$gradecourseyear1','$role','$onoff','$date_time','$date_created')";
    if(mysqli_query($conn, $sql)){
        // echo "<script>window.history.go(-1);</script>";
        header('location: ../medicalgsjhs.php');
        echo $_SESSION['success'] ="
            <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                <h2 style='
                color: #fff;
                font-size: 16px;
                margin-left: 10px;'>Medical Appointment Added.</h2>
            </div>
        ";
    }
}

if(isset($_POST['submit_medicalshs'])){ // pag get ng data
    $admin_id = $_POST['admin_id'];
    $idnumber = $_POST['idnumber']; 
    $name1 = $_POST['name1'];
    $gradecourseyear1 = $_POST['gradecourseyear1'];
    $role = $_POST['role'];
    $onoff = $_POST['onoff'];
    $date_time = $_POST['date_time'];

    date_default_timezone_set('Asia/Manila');
    $date_created = date('Y-m-d h:i A'); 

    $sql = "INSERT INTO medicalapp VALUES ('','$admin_id','$idnumber','$name1','$gradecourseyear1','$role','$onoff','$date_time','$date_created')";
    if(mysqli_query($conn, $sql)){
        // echo "<script>window.history.go(-1);</script>";
        header('location: ../medicalshs.php');
        echo $_SESSION['success'] ="
            <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                <h2 style='
                color: #fff;
                font-size: 16px;
                margin-left: 10px;'>Medical Appointment Added.</h2>
            </div>
        ";
    }
}

if(isset($_POST['submit_medicalcollege'])){ // pag get ng data
    $admin_id = $_POST['admin_id'];
    $idnumber = $_POST['idnumber']; 
    $name1 = $_POST['name1'];
    $gradecourseyear1 = $_POST['gradecourseyear1'];
    $role = $_POST['role'];
    $onoff = $_POST['onoff'];
    $date_time = $_POST['date_time'];

    date_default_timezone_set('Asia/Manila');
    $date_created = date('Y-m-d h:i A'); 

    $sql = "INSERT INTO medicalapp VALUES ('','$admin_id','$idnumber','$name1','$gradecourseyear1','$role','$onoff','$date_time','$date_created')";
    if(mysqli_query($conn, $sql)){
        // echo "<script>window.history.go(-1);</script>";
        header('location: ../medicalcollege.php');
        echo $_SESSION['success'] ="
            <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                <h2 style='
                color: #fff;
                font-size: 16px;
                margin-left: 10px;'>Medical Appointment Added.</h2>
            </div>
        ";
    }
}



if(isset($_POST['submit_physiciancollege'])){ // pag get ng data
    $admin_id = $_POST['admin_id'];
    $idnumber = $_POST['idnumber']; 
    $fullname = $_POST['fullname'];
    $cenrolled = $_POST['cenrolled'];
    $role = $_POST['role'];
    $date_time = $_POST['date_time'];
   
    date_default_timezone_set('Asia/Manila');
    $date_created = date('Y-m-d h:i A'); 

    $sql = "INSERT INTO physicianapp VALUES ('','$admin_id','$idnumber','$fullname','$cenrolled','$role','$date_time','$date_created')";
    if(mysqli_query($conn, $sql)){
        // echo "<script>window.history.go(-1);</script>";
        header('location: ../physicianstudentcollegeapproved.php');
        echo $_SESSION['success'] ="
            <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                <h2 style='
                color: #fff;
                font-size: 16px;
                margin-left: 10px;'>Physician Consultation Appointment Added.</h2>
            </div>
        ";
    }
}

if(isset($_POST['submit_physiciancollegeemployee'])){ // pag get ng data
    $admin_id = $_POST['admin_id'];
    $idnumber = $_POST['idnumber']; 
    $fullname = $_POST['fullname'];
    $cenrolled = $_POST['cenrolled'];
    $role = $_POST['role'];
    $date_time = $_POST['date_time'];
   
    date_default_timezone_set('Asia/Manila');
    $date_created = date('Y-m-d h:i A'); 

    $sql = "INSERT INTO physicianapp VALUES ('','$admin_id','$idnumber','$fullname','$cenrolled','$role','$date_time','$date_created')";
    if(mysqli_query($conn, $sql)){
        // echo "<script>window.history.go(-1);</script>";
        header('location: ../physicianemployeecollegeapproved.php');
        echo $_SESSION['success'] ="
            <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                <h2 style='
                color: #fff;
                font-size: 16px;
                margin-left: 10px;'>Physician Consultation Appointment Added.</h2>
            </div>
        ";
    }
}


?>
