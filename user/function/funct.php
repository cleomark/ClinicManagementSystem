<?php
    session_start();
    include '../../db.php';

    
    if (isset($_POST['signup'])) {
        $fullname = $_POST['fullname'];
        $leveleduc = $_POST['leveleduc'];
        $role = $_POST['role'];
        $gradelevel = $_POST['gradelevel'];
        $idnumber = $_POST['idnumber'];
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        if (substr($email, -16) != '@dwc-legazpi.edu') {
            echo $_SESSION['failed'] = "
                <div>
                    <p style='font-size: 12px; color: red;'>Email is not a valid email. Please try again.</p>
                </div>
            ";
            header('Location: ../signup.php');
        } else {
            // Check if the leveleduc and email combination is already taken
            $query = mysqli_query($conn, "SELECT * FROM users WHERE leveleduc = '$leveleduc' AND email = '$email'");
            if (mysqli_num_rows($query) > 0) {
                echo $_SESSION['failed'] = "
                    <div>
                        <p style='font-size: 12px; color: red;'>Level of Education and Email combination is already taken. Please try again.</p>
                    </div>
                ";
                header('Location: ../signup.php');
            } else {
                // Hash the password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
                $sql_add = "INSERT INTO `users`(`fullname`, `leveleduc`, `role`, `gradelevel`,`idnumber`, `email`, `password`) VALUES ('$fullname','$leveleduc','$role','$gradelevel','$idnumber','$email','$hashedPassword')";
                if ($conn->query($sql_add) === TRUE) {
                    $sql = "SELECT * FROM users WHERE email = '$email'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $row = mysqli_fetch_array($result);
                        $_SESSION['user_id'] = $row['id'];
                        $_SESSION['fullname'] = $row['fullname'];
                        $_SESSION['leveleduc'] = $row['leveleduc'];
                        $_SESSION['role'] = $row['role'];
                        $_SESSION['gradelevel'] = $row['gradelevel'];
                        $_SESSION['idnumber'] = $row['idnumber'];
                        $_SESSION['email'] = $row['email'];
                        header('Location: ../login.php');
                    }
                }
            }
        }
    }
    
    
    // Rest of the code remains unchanged
    // ...
 
    
    
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $leveleduc = $_POST['leveleduc'];
        $password = $_POST['password'];
    
        // Modify the SQL query to include the leveleduc condition
        $sql = "SELECT * FROM users WHERE email = '$email' AND leveleduc = '$leveleduc'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_array($result);
            $hashedPassword = $row['password'];
    
            // Verify the password
            if (password_verify($password, $hashedPassword)) {
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['leveleduc'] = $row['leveleduc'];
                $_SESSION['idnumber'] = $row['idnumber'];
                $_SESSION['email'] = $row['email'];
    
                $role = $row['leveleduc'];
                if ($role == '1') {
                    header('Location: ../usergsjhs/healthrecordformgsjhs.php');
                } elseif ($role == '2') {
                    header('Location: ../usershs/healthrecordformshs.php');
                } elseif ($role == '3') {
                    // Handle role 3
                    header('Location: ../usercollege/studentandemployeeincollege.php');
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
                $_SESSION['failed'] = "Invalid email or password. Please try again.";
                header('Location: ../login.php');
            }
        } else {
            $_SESSION['failed'] = "Invalid email or password. Please try again.";
            header('Location: ../login.php');
        }
    }
   
    
   ?>