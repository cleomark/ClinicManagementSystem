<?php
    session_start();
    include '../../db.php';

    if (!isset($_SESSION['user_id'])){
        echo '<script>window.alert("PLEASE LOGIN FIRST!!")</script>';
        echo '<script>window.location.replace("../login.php");</script>';
        exit; // Exit the script to prevent further execution
    }

    $user_id = $_SESSION['user_id'];
    $sql_query = "SELECT * FROM users WHERE user_id ='$user_id'";
    $result = $conn->query($sql_query);
    while($row = $result->fetch_array()){
        $user_id = $row['user_id'];
        $fullname = $row['fullname'];
        $idnumber = $row['idnumber'];
        require_once('../../db.php');
        if($_SESSION['leveleduc'] == 1){
            // User type 1 specific code here
        }
        else{
            header('location: ../login.php');
            exit; // Exit the script to prevent further execution
        }
    }
?>


<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>View Diagnosis Records</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="assets/images/dwcl.png"> 
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">
	<link rel="stylesheet" href="assets/style.css">


</head> 

<body class="app">   	
<?php

// Retrieve the health record for the given ID number
$sql = "SELECT * FROM patientrecord WHERE idnumber= '$idnumber'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = $result->fetch_assoc(); 
  $idnumber = $row['idnumber'];
  $fullname = $row['fullname'];
  $gradesection = $row['gradesection'];
  $vitalsigns = $row['vitalsigns'];
  $diagnosis = $row['diagnosis'];
  $status = $row['status'];
  $date_time = $row['date_time'];
    }
 else {
 } 
?>
    <?php 
        include $_SERVER['DOCUMENT_ROOT'] . "/DivineClinic/components/navbar.php";
    ?>

    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    <div class="position-relative mb-3">
				    <div class="row g-3 justify-content-between">
					   
					       
						
				    </div>
			    </div>
			    
                <div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
					       
				        </div><!--//row-->
				    </div><!--//app-card-header-->
				    <div class="app-card-body p-4">

                    <?php
							$sql = "SELECT * FROM patientrecord WHERE idnumber = '$idnumber'";
							$result = $conn->query($sql);
    						while($row = $result->fetch_array()){
						?>
                        <br>
				 <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="idnumber" class="col-sm-12 control-label">Your ID Number</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="idnumber" name="idnumber" placeholder="Enter patient ID number" value="<?php echo $row['idnumber']; ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="patient_name" class="col-sm-12 control-label">Your name</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter your Fullname" value="<?php echo $row['fullname']; ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
        <div class="form-group">
                    <label for="gradesection" class="col-sm-12 control-label">Grade & Section/Employee</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="gradesection" name="gradesection" placeholder="Enter your Fullname" value="<?php echo $row['gradesection']; ?>" readonly>
                    </div>
                </div>
            </div>
           <div class="col-sm-3">
                <div class="form-group">
                    <label for="vitalsigns" class="col-sm-12 control-label">Vital Signs</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="vitalsigns" name="vitalsigns" placeholder="If you are an employee, just type Employee" value="<?php echo $row['vitalsigns']; ?>" readonly>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
        <div class="col-sm-6">
                <div class="form-group">
                    <label for="diagnosis" class="col-sm-8 control-label">Diagnosis/Chief Complaints</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="diagnosis" name="diagnosis" value="<?php echo $row['diagnosis']; ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="diagnosis" class="col-sm-8 control-label">Status</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="diagnosis" name="status" value="<?php echo $row['status']; ?>" readonly>
                    </div>
                </div>
            </div>
   </div>

        <div class="form-group">
                <b>
                    <span>Date Visited: <?php echo date('Y-m-d', strtotime($row['date_time'])); ?></span>
                </b>
        </div>
  
        <?php } ?>
				    </div><!--//app-card-body-->
				</div>			    
		    </div>
	    </div>
    </div>  					
    <!-- Javascript -->          
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  
    
    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script> 
	
	<script>
		// Timer to remove success message after 5 seconds (5000 milliseconds)
		setTimeout(function(){
			var successMessage = document.getElementById('success-message');
			if(successMessage){
				successMessage.remove();
			}
		}, 5000);
	</script>

</body>
</html> 

