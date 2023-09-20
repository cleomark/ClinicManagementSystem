<?php
    session_start();
    include '../../db.php';

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
        if($_SESSION['role'] == 3){
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
$sql = "SELECT * FROM medicalapp";
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
                    <b><p>Note: We will accommodate 1 to 5 students/employees per year level. Only one (1) student/employee will message to have a medical request scheduling appointment.</p></b>
  <form class="form-horizontal mt-4" method="post" action="function/collegerecords.php">
 
  <div class="row">
  <div class="col-sm-4">
    <div class="form-group">
      <label for="idnumber" class="col-sm-12 control-label" style="font-size: 16px">Student/Employee ID Number</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="idnumber" name="idnumber" placeholder="Enter ID number" required>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="form-group">
      <label for="patient_name" class="col-sm-12 control-label" style="font-size: 16px">Student/Employee Fullname</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="name" name="name1" placeholder="Enter Fullname" required>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="form-group">
      <label for="gradecourseyear1" class="col-sm-12 control-label" style="font-size: 16px">Course & Year</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="gradecourseyear1" name="gradecourseyear1" placeholder="Enter Grade & Section/Course & Year">
      </div>
    </div>
  </div>
</div>
<br>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label for="role" class="col-sm-12 control-label" style="font-size: 16px">Role</label>
            <div class="col-sm-12">
                <select id="role" name="role" class="form-control" required>
                <option value="">Select</option>
                <option value="Student">Student</option>
                <option value="Employee">Employee</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="onoff" class="col-sm-12 control-label" style="font-size: 16px">On-campus Activity or Off-campus Activity</label>
            <div class="col-sm-12">
                <select id="onoff" name="onoff" class="form-control" required>
                <option value="">Select</option>
                <option value="On-campus Activity">On-campus Activity</option>
                <option value="Off-campus Activity">Off-campus Activity</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
    <div class="form-group">
      <label for="datetime" class="col-sm-12 control-label" style="font-size: 16px">Date & Time</label>
      <div class="col-sm-12">
        <input type="datetime-local" class="form-control" id="datetime" name="date_time">
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="form-group"><br>
      <label for="phoneNumber" class="col-sm-12 control-label" style="font-size: 16px">Phone Number</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="phoneNumber" name="phoneNumber">
      </div>
    </div>
  </div>
</div>
 </br>
    <div class="row">
      <div class="col-sm-12">
      <input type="text" name="admin_id" style="display: none;" value="<?= $_SESSION['admin_id'];?>">
        <button name="submit_medicalcollege" class="btn btn-success">Add Medical Appointment</button>
      </div>
    </div>
  </form>
  
</div><!--//app-card-body-->
<br>
<div style="text-align: right; margin-right: 48px;">
    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#myModal">
        Update Dental Schedule
    </button>
</div>

<style>

.btn-secondary {
    background-color: #0000FF!important;
    color: #fff!important;
}

.btn:hover {
    background-color: #0000FF!important;
    color: #fff!important;
}

.btn:active {
    background-color: #0000FF!important;
    color: #fff!important;
}

.btn:disabled {
    background-color: #0000FF!important;
    color: #fff!important;
}
</style>
<?php
// Fetch and display medical records
$sql = "SELECT * FROM medicalappadmin WHERE admin_id = '11' AND is_deleted_on_website = 0";
$result = $conn->query($sql);
?>
<center>
<div class="main-content">
    <table class="styled-table">
        <thead>
            <tr>
                <th>ID Number</th>
                <th>Fullname</th>
                <th>Course & Year</th>
                <th>Role</th>
                <th>On-campus Activity or Off-campus Activity</th>
                <th>Time & Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="healthRecordTableBody">
            <?php
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row['idnumber']; ?></td>
                    <td><?php echo $row['name1']; ?></td>
                    <td><?php echo $row['gradecourseyear1']; ?></td>
                    <td><?php echo $row['role']; ?></td>
                    <td><?php echo $row['onoff']; ?></td>
                    <td><?php echo $row['date_time']; ?></td>
                 
                    <td>
                    <center>   
                        <a href="function/formedicalappstudentdone.php?medicalapp_id=<?php echo $row['medicalapp_id']; ?>"
                        onclick="return confirm('Are you sure you want to delete this record?')">
                            <!-- Replace the anchor element with SVG icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                            </svg>
                        </a>
                        </center>
                    </td>
        
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <br><br>
</div>
        </center>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                $sql3 = "SELECT * FROM statusmedicalcollege";
                $result3 = mysqli_query($conn, $sql3);

                if (mysqli_num_rows($result3) > 0) {
                    while ($row3 = $result3->fetch_assoc()) {
                        $medical_id = $row3['medical_id'];
                        $statusmedmonam_1 = $row3['statusmedmonam_1'];
                        $statusmedtueam_2 = $row3['statusmedtueam_2'];
                        $statusmedwedam_3 = $row3['statusmedwedam_3'];
                        $statusmedthuam_4 = $row3['statusmedthuam_4'];
                        $statusmedfriam_5 = $row3['statusmedfriam_5'];
                        $statusmedmonpm_6 = $row3['statusmedmonpm_6'];
                        $statusmedtuepm_7 = $row3['statusmedtuepm_7'];
                        $statusmedwedpm_8 = $row3['statusmedwedpm_8'];
                        $statusmedthupm_9 = $row3['statusmedthupm_9'];
                        $statusmedfripm_10 = $row3['statusmedfripm_10'];
                    }
                } else {

                }
                ?>
                <?php
                // Step 1: Retrieve the data to be updated
                if (isset($_GET['medical_id'])) {
                    $medical_id = $_GET['medical_id'];
                }

                ?>
                <form action="function/collegerecords.php" method="POST">
                    <input type="hidden" name="medical_id" value="<?php echo $medical_id; ?>">
                    <div class="mb-3">
                        <label for="inputStatus1030_1" class="form-label">Monday - 8:00 A.M - 11:00 A.M.</label>
                        <select class="form-select" id="inputStatus1030_1" name="statusmedmonam_1">
                            <option value="Available" <?php if ($statusmedmonam_1 == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmedmonam_1 == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus1130" class="form-label">Tuesday - 8:00 A.M - 11:00 A.M.</label>
                        <select class="form-select" id="inputStatus1130" name="statusmedtueam_2">
                            <option value="Available" <?php if ($statusmedtueam_2 == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmedtueam_2 == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus230" class="form-label">Wednesday - 8:00 A.M - 11:00 A.M.</label>
                        <select class="form-select" id="inputStatus230" name="statusmedwedam_3">
                            <option value="Available" <?php if ($statusmedwedam_3 == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmedwedam_3 == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus330" class="form-label">Thursday - 8:00 A.M - 11:00 A.M.</label>
                        <select class="form-select" id="inputStatus330" name="statusmedthuam_4">
                            <option value="Available" <?php if ($statusmedthuam_4 == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmedthuam_4 == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus430" class="form-label">Friday - 8:00 A.M - 11:00 A.M.</label>
                        <select class="form-select" id="inputStatus430" name="statusmedfriam_5">
                            <option value="Available" <?php if ($statusmedfriam_5  == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmedfriam_5  == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus430" class="form-label">Monday - 1:30 P.M - 4:00 P.M.</label>
                        <select class="form-select" id="inputStatus430" name="statusmedmonpm_6">
                            <option value="Available" <?php if ($statusmedmonpm_6 == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmedmonpm_6 == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus430" class="form-label">Tuesday - 1:30 P.M - 4:00 P.M.</label>
                        <select class="form-select" id="inputStatus430" name="statusmedtuepm_7">
                            <option value="Available" <?php if ($statusmedtuepm_7 == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmedtuepm_7 == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus430" class="form-label">Wednesday - 1:30 P.M - 4:00 P.M.</label>
                        <select class="form-select" id="inputStatus430" name="statusmedwedpm_8">
                            <option value="Available" <?php if ($statusmedwedpm_8 == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmedwedpm_8 == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus430" class="form-label">Thursday - 1:30 P.M - 4:00 P.M.</label>
                        <select class="form-select" id="inputStatus430" name="statusmedthupm_9">
                            <option value="Available" <?php if ($statusmedthupm_9 == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmedthupm_9 == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus430" class="form-label">Friday - 1:30 P.M - 4:00 P.M.</label>
                        <select class="form-select" id="inputStatus430" name="statusmedfripm_10">
                            <option value="Available" <?php if ($statusmedfripm_10 == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmedfripm_10 == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal" >Close</button>
                        <button type="submit" name="submit_statusmedicalcollege" class="btn btn-light">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>


td {
    text-align: left!important; 
}

.styled-table thead tr{
    background-color: #0000FF!important;
    color: #fff!important;}

</style>

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

