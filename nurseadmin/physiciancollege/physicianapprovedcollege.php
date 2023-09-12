<?php
    session_start();
    include '../../db.php';

    if (!isset($_SESSION['admin_id'])){
        echo '<script>window.alert("PLEASE LOGIN FIRST!!")</script>';
        echo '<script>window.location.replace("login.php");</script>';
        exit; // Exit the script to prevent further execution
    }
    $admin_id = $_SESSION['admin_id'];
    $sql_query = "SELECT * FROM admins WHERE admin_id ='$admin_id'";
    $result = $conn->query($sql_query);
    while($row = $result->fetch_array()){
        $admin_id = $row['admin_id'];
        $username = $row['username'];
        require_once('../../db.php');
        if($_SESSION['role'] == 7){
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
    <title>Physician Consultation Appointments</title>
    
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
$sql = "SELECT * FROM dentalapp";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = $result->fetch_assoc(); 
  $idnumber = $row['idnumber'];
  $fullname = $row['fullname'];
  $cenrolled = $row['cenrolled'];
  $role = $row['role'];
  $date_time = $row['date_time'];
  $date_created = $row['date_created'];
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
						        <h4 class="notification-title mb-1">Physician Student Appointments</h4>
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
                   
                   <form class="form-horizontal mt-4" method="post" action="function/physicianrecordcollege.php">
                  
                   <div class="row">
  <div class="col-sm-4">
    <div class="form-group">
      <label for="idnumber" class="col-sm-12 control-label">Patient ID Number</label>
      <input type="text" class="form-control" id="idnumber" name="idnumber" placeholder="Enter patient ID number" required>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="form-group">
      <label for="fullname" class="col-sm-12 control-label">Name</label>
      <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter patient name" required>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="form-group">
      <label for="cenrolled" class="col-sm-12 control-label">Currently enrolled in</label>
      <input type="text" class="form-control" id="cenrolled" name="cenrolled" placeholder="Enter patient name">
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
                           <label for="date_time" class="col-sm-12 control-label">Schedule</label>
                           <input type="datetime-local" id="date_time" name="date_time" class="form-control" required>
                         </div>
                       </div>
 <div class="col-sm-4">
    <div class="form-group">
      <label for="phoneNumber" class="col-sm-12 control-label" style="font-size: 16px">Phone Number</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="phoneNumber" name="phoneNumber">
      </div>
    </div>
  </div>

                     <div class="row">
                       <div class="col-sm-12"><br><br>
                       <input type="text" name="admin_id" style="display: none;" value="<?= $_SESSION['admin_id'];?>">
                         <button name="submit_physiciancollege" class="btn btn-success">Add Physician Consultation Appointment</button>
                       </div>
                     </div>
                   </form>
                   
                   </div>
                 <br>
                 <div style="text-align: right; margin-right: 48px;">
                     <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#myModal">
                         Update Physician Schedule
                     </button>
                 </div>
                 
                 <?php
// Fetch and display dental records
$sql = "SELECT * FROM physicianapp WHERE admin_id = '13' AND is_deleted_on_website = 0";
$result = $conn->query($sql);
?>
<center>
<div class="main-content">
    <table class="styled-table">
        <thead>
            <tr>
                <th>ID Number</th>
                <th>Fullname</th>
                <th>Currently Enrolled in</th>
                <th>Campus</th>
                <th>Schedule</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="healthRecordTableBody">
            <?php
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row['idnumber']; ?></td>
                    <td><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['cenrolled']; ?></td>
                    <td><?php echo $row['role']; ?></td>
                    <td><?php echo $row['date_time']; ?></td>
                 
                    <td>
                    <center>   
                        <a href="function/forphysicianappstudentdone.php?phy_id=<?php echo $row['phy_id']; ?>"
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
                $sql1 = "SELECT * FROM statusphysiciancollege ";
                $result1 = mysqli_query($conn, $sql1);

                if (mysqli_num_rows($result1) > 0) {
                    while ($row1 = $result1->fetch_assoc()) {
                        $statusphycollege_id = $row1['statusphycollege_id'];
                        $status812 = $row1['status812'];
                    }
                } else {

                }
                ?>
                <?php
                // Step 1: Retrieve the data to be updated
                if (isset($_GET['statusphycollege_id'])) {
                    $statusphycollege_id = $_GET['statusphycollege_id'];
                }

                ?>
                <form action="function/physicianrecordcollege.php" method="POST">
                    <input type="hidden" name="statusphycollege_id" value="<?php echo $statusphycollege_id; ?>">
                    <div class="mb-3">
                        <label for="inputStatus811" class="form-label">Wendesday - 8:00 A.M - 12:00 P.M.</label>
                        <select class="form-select" id="inputStatus811" name="status812">
                            <option value="Available" <?php if ($status812 == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($status812 == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit_statusphysiciancollege" class="btn btn-light">Update</button>
                    </div>
                </form>
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
