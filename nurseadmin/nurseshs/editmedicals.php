<?php
    session_start();
    include '../../db.php';
    require '../../vendor/autoload.php';


    if (!isset($_SESSION['admin_id'])){
        echo '<script>window.alert("PLEASE LOGIN FIRST!!")</script>';
        echo '<script>window.location.replace("../login.php");</script>';
        exit; // Exit the script to prevent further execution
    }
    $admin_id = $_SESSION['admin_id'];
    $sql_query = "SELECT * FROM admins WHERE admin_id ='$admin_id'";
    $result = $conn->query($sql_query);
    while($row = $result->fetch_array()){
        $admin_id = $row['admin_id'];
        $username = $row['username'];
        require_once('../../db.php');
        if($_SESSION['role'] == 2){
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
    <title>Medical Appointments</title>
    
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
    <link rel="stylesheet" href="assets/dentalstyles.css">

</head> 

<body class="app">   	
<?php
$sql = "SELECT * FROM medicalappshs";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = $result->fetch_assoc(); 
  $idnumber = $row['idnumber'];
  $fullname = $row['name1'];
  $gradecourseyear1 = $row['gradecourseyear1'];
  $role = $row['role'];
  $onoff  = $row['onoff'];
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
					    <div class="col-auto">
					        <h1 class="app-page-title mb-0"></h1>
					    </div>
						
				    </div>
			    </div>
			    
                <div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
					        <div class="col-12 col-lg-auto text-center text-lg-start">
						        <h4 class="notification-title mb-1">Medical Appointments</h4>
					        </div>
                            <?php
								if(isset($_SESSION['success'])){
									echo $_SESSION['success'];
									unset($_SESSION['success']);
								}
							?>
				        </div><!--//row-->
				    </div><!--//app-card-header-->
				    <div class="app-card-body p-4">
                   
    <?php  	
    $medicalapp_id = $_GET['medicalapp_id'];
    $sql = "SELECT * FROM medicalappshs WHERE medicalapp_id='$medicalapp_id'";

    $result = mysqli_query($conn, $sql);

    while($row = $result->fetch_assoc()){
        $medicalapp_id = $row['medicalapp_id'];
    ?>
                    <form class="form-horizontal mt-4" method="post" action="function/editmedical.php">
 
                    <div class="row">
  <div class="col-sm-3">
    <div class="form-group">
      <label for="idnumber" class="col-sm-12 control-label" style="font-size: 16px">Student/Employee ID Number</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="idnumber" name="idnumber" value="<?=$row['idnumber'];?>">
      </div>
    </div>
  </div>

  <div class="col-sm-3">
    <div class="form-group">
      <label for="patient_name" class="col-sm-12 control-label" style="font-size: 16px">Student/Employee Fullname</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="name" name="name1" value="<?=$row['name1'];?>">
      </div>
    </div>
  </div>

  <div class="col-sm-3">
    <div class="form-group">
      <label for="gradecourseyear1" class="col-sm-12 control-label" style="font-size: 16px">Grade & Section</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="gradecourseyear1" name="gradecourseyear1" value="<?=$row['gradecourseyear1'];?>">
      </div>
    </div>
  </div>

  <div class="col-sm-3">
    <div class="form-group">
      <label for="phoneno" class="col-sm-12 control-label" style="font-size: 16px">Phone Number</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="phoneno" name="phoneno" value="<?=$row['phoneno'];?>">
      </div>
    </div>
  </div>
</div>
<br>
<div class="row">
<div class="col-sm-3">
        <div class="form-group">
            <label for="datetime" class="col-sm-12 control-label" style="font-size: 16px">Schedule Date</label>
            <div class="col-sm-12">
                <input type="date" class="form-control" id="datetime" name="date_time" value="<?php echo date('Y-m-d', strtotime($row['date_time'])); ?>">
            </div>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            <label for="datetime" class="col-sm-12 control-label" style="font-size: 16px">Schedule Time</label>
            <div class="col-sm-12">
            <input type="text" class="form-control" id="datetime" name="sched_time" value="<?php echo date('h:i A', strtotime($row['sched_time'])); ?>">
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label for="role" class="col-sm-12 control-label" style="font-size: 16px">Role</label>
            <div class="col-sm-12">
                <select id="role" name="role" class="form-control">
                <option value="" <?php if(empty($row['role'])) echo "selected"; ?>>Select Role</option>
                <option value="Student in SHS" <?php if($row['role'] == "Student in SHS") echo "selected"; ?>>Student</option>
                <option value="Employee in SHS" <?php if($row['role'] == "Employee in SHS") echo "selected"; ?>>Employee</option>
            </select>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label for="onoff" class="col-sm-12 control-label" style="font-size: 16px">On or Off-campus Activity</label>
            <div class="col-sm-12">
                <select id="onoff" name="onoff" class="form-control">
                <option value="" <?php if(empty($row['onoff'])) echo "selected"; ?>>Select</option>
                <option value="On-campus Activity" <?php if($row['onoff'] == "On-campus Activity") echo "selected"; ?>>On-campus Activity</option>
                <option value="Off-campus Activity" <?php if($row['onoff'] == "Off-campus Activity") echo "selected"; ?>>Off-campus Activity</option>
                </select>
            </div>
        </div>
    </div>
</div>
 </br>
    <div class="row">
      <div class="col-sm-12">
      <input type="hidden" name="medicalapp_id" value="<?php echo $medicalapp_id; ?>">
                    <input type="submit" name="update_medicalrecord" value="Update">
      </div>
    </div>
  </form>
  <?php

    }

    ?>
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

