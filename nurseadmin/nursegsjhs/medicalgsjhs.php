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
        if($_SESSION['role'] == 1){
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
  $phoneno = $row['phoneno'];
  $date_time = $row['date_time'];
  $sched_time = $row['sched_time'];
  $role = $row['role'];
  $onoff  = $row['onoff'];
    }
 else {
 } 
?>
<?php 
        include $_SERVER['DOCUMENT_ROOT'] . "/DivineClinic/components/navbar.php";
    ?>

<style> 
.styled-table thead tr {
   
    background-color: #2E37A4;

}

.btn-secondary {
    background-color: #2E37A4;
   
}

.btn:hover {
    background-color: #2E37A4;
}

.btn:active {
    background-color: #2E37A4;
}

.btn:disabled {
    background-color: #2E37A4;
}

.modal-body {
    justify-content: center;
    text-align: center;
    
}
 
.modal-btnn {
    width: 40%;
    margin-bottom: 10px;
}

</style>


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
  
  
<div style="text-align: right;">
<button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#updateScheduleModal">
    Update Medical Schedule
</button>


</div>

<div class="main-content">
    <table class="styled-table">
        <thead>
            <tr>
                <th>Number</th>
                <th>ID Number</th>
                <th>Fullname</th>
                <th>Grade & Section</th>
                <th>Phone Number</th>
                <th>Date</th>
                <th>Time</th>
                <th>Role</th>
                <th>On or Off-campus Activity</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="healthRecordTableBody">
            <?php
            $sql = "SELECT * FROM medicalapp WHERE (role = 'Student in GS/JHS' OR role = 'Employee in GS/JHS') AND is_deleted_on_website = 0 ORDER BY date_time";

            $result = mysqli_query($conn, $sql);

            // Create an empty array to store the data
            $rows = [];

            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }

            // Sort the array by date_time in ascending order
            usort($rows, function ($a, $b) {
                return strtotime($a['date_time']) - strtotime($b['date_time']);
            });

            foreach ($rows as $row) :
                $medicalapp_id = $row['medicalapp_id'];
            ?>
                <tr>
                    <td><?php echo $row['medicalapp_id']; ?></td>
                    <td><?php echo $row['idnumber']; ?></td>
                    <td><?php echo $row['name1']; ?></td>
                    <td><?php echo $row['gradecourseyear1']; ?></td>
                    <td><?php echo $row['phoneno']; ?></td>
                    <td><?php echo $row['date_time']; ?></td>
                    <td><?php echo $row['sched_time']; ?></td>
                    <td><?php echo $row['role']; ?></td>
                    <td><?php echo $row['onoff']; ?></td>

                    <td>
                    
                    <a href="#openModal<?= $medicalapp_id; ?>" class="modal-link" data-bs-toggle="modal" data-bs-target="#openModal<?= $medicalapp_id; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                    <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                    </svg>
                     </a>
                    <a href="editmedicals.php?medicalapp_id=<?php echo $medicalapp_id; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </a>  
                        <a href="function/formedicalappstudentdone.php?medicalapp_id=<?php echo $row['medicalapp_id']; ?>"
                        onclick="return confirm('Are you sure you want to delete this record?')">
                            <!-- Replace the anchor element with SVG icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                            </svg>
                        </a>
                       
                        </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- Approve Modal -->
<div class="modal fade" id="openModal<?= $medicalapp_id; ?>" tabindex="-1" aria-labelledby="modalLabel<?= $medicalapp_id; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel<?= $medicalapp_id; ?>">Send Message</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="inputTo" class="form-label">To</label>
                        <input type="text" class="form-control" id="inputTo" name="phone" value="<?= $phoneno; ?>">  
                    </div>
                    <div class="mb-3">
                        <label for="messagesms" class="form-label">Message</label>
                        <textarea class="form-control" id="messagesms" name="message" rows="4">Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M</textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
                </div>
                        </div>
                    </div>
                </div>
        </tbody>
    </table>
</div>

<div class="modal fade" id="updateScheduleModal" tabindex="-1" aria-labelledby="updateScheduleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateScheduleModalLabel">Update Medical Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <button type="button" class="btn modal-btnn btn-secondary" data-bs-toggle="modal" data-bs-target="#updateMondayModal">
                Monday Schedule
            </button>

            <button type="button" class="btn modal-btnn btn-secondary" data-bs-toggle="modal" data-bs-target="#updateTuesdayModal">
                Tuesday Schedule
            </button>

            <button type="button" class="btn modal-btnn btn-secondary" data-bs-toggle="modal" data-bs-target="#updateWednesdayModal">
                Wednesday Schedule
            </button>

            <button type="button" class="btn modal-btnn btn-secondary" data-bs-toggle="modal" data-bs-target="#updateThursdayModal">
                Thursday Schedule
            </button>

            <button type="button" class="btn modal-btnn btn-secondary" data-bs-toggle="modal" data-bs-target="#updateFridayModal">
                Friday Schedule
            </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateMondayModal" tabindex="-1" aria-labelledby="updateMondayModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateMondayModalLabel">Monday Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <?php
                $sql1 = "SELECT * FROM statusmedicalgsjhsmonday";
                $result1 = mysqli_query($conn, $sql1);

                if (mysqli_num_rows($result1) > 0) {
                    while ($row1 = $result1->fetch_assoc()) {
                        $medical_id = $row1['medical_id'];
                        $statusmed8_am = $row1['statusmed8_am'];
                        $statusmed9_am = $row1['statusmed9_am'];
                        $statusmed10_am = $row1['statusmed10_am'];
                        $statusmed11_am = $row1['statusmed11_am'];
                        $statusmed1_pm = $row1['statusmed1_pm'];
                        $statusmed2_pm = $row1['statusmed2_pm'];
                        $statusmed3_pm = $row1['statusmed3_pm'];
                        $statusmed4_pm = $row1['statusmed4_pm'];

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
                  <form action="function/gsjhsrecords.php" method="POST">
                    <input type="hidden" name="medical_id" value="<?php echo $medical_id; ?>">
                    <div class="mb-3">
                    <label for="inputStatus1030_1" class="form-label">08:00 A.M</label>
                    <select class="form-select" id="inputStatus1030_1" name="statusmed8_am">
                        <option value="08:00 A.M " <?php if ($statusmed8_am == 'Available') echo 'selected'; ?>>Available</option>
                        <option value="Unavailable" <?php if ($statusmed8_am == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                    </select>

                    </div>
                    <div class="mb-3">
                        <label for="inputStatus1130" class="form-label">09:00 A.M</label>
                        <select class="form-select" id="inputStatus1130" name="statusmed9_am">
                            <option value="09:00 A.M" <?php if ($statusmed9_am == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmed9_am == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus230" class="form-label">10:00 A.M</label>
                        <select class="form-select" id="inputStatus230" name="statusmed10_am">
                            <option value="10:00 A.M" <?php if ($statusmed10_am == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmed10_am == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus330" class="form-label">11:00 A.M</label>
                        <select class="form-select" id="inputStatus330" name="statusmed11_am">
                            <option value="11:00 A.M" <?php if ($statusmed11_am == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmed11_am == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus430" class="form-label">01:00 P.M</label>
                        <select class="form-select" id="inputStatus430" name="statusmed1_pm">
                            <option value="01:00 P.M" <?php if ($statusmed1_pm  == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmed1_pm  == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus430" class="form-label">02:00 P.M.</label>
                        <select class="form-select" id="inputStatus430" name="statusmed2_pm">
                            <option value="02:00 P.M" <?php if ($statusmed2_pm == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmed2_pm == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus430" class="form-label">03:00 P.M.</label>
                        <select class="form-select" id="inputStatus430" name="statusmed3_pm">
                            <option value="03:00 P.M." <?php if ($statusmed3_pm == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmed3_pm == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus430" class="form-label">04:00 P.M</label>
                        <select class="form-select" id="inputStatus430" name="statusmed4_pm">
                            <option value="04:00 P.M" <?php if ($statusmed4_pm == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmed4_pm == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal" >Close</button>
                        <button type="submit" name="submit_statusmedicalgsjhs" class="btn btn-light">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateTuesdayModal" tabindex="-1" aria-labelledby="updateTuesdayModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateTuesdayModalLabel">Tuesday Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <?php
                $sql1 = "SELECT * FROM statusmedicalgsjhstuesday";
                $result1 = mysqli_query($conn, $sql1);

                if (mysqli_num_rows($result1) > 0) {
                    while ($row1 = $result1->fetch_assoc()) {
                        $medical_id = $row1['medical_id'];
                        $statusmed8_am = $row1['statusmed8_am'];
                        $statusmed9_am = $row1['statusmed9_am'];
                        $statusmed10_am = $row1['statusmed10_am'];
                        $statusmed11_am = $row1['statusmed11_am'];
                        $statusmed1_pm = $row1['statusmed1_pm'];
                        $statusmed2_pm = $row1['statusmed2_pm'];
                        $statusmed3_pm = $row1['statusmed3_pm'];
                        $statusmed4_pm = $row1['statusmed4_pm'];

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
                  <form action="function/gsjhsrecords.php" method="POST">
                    <input type="hidden" name="medical_id" value="<?php echo $medical_id; ?>">
                    <div class="mb-3">
                    <label for="inputStatus1030_1" class="form-label">08:00 A.M</label>
                    <select class="form-select" id="inputStatus1030_1" name="statusmed8_am">
                        <option value="08:00 A.M " <?php if ($statusmed8_am == 'Available') echo 'selected'; ?>>Available</option>
                        <option value="Unavailable" <?php if ($statusmed8_am == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                    </select>

                    </div>
                    <div class="mb-3">
                        <label for="inputStatus1130" class="form-label">09:00 A.M</label>
                        <select class="form-select" id="inputStatus1130" name="statusmed9_am">
                            <option value="09:00 A.M" <?php if ($statusmed9_am == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmed9_am == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus230" class="form-label">10:00 A.M</label>
                        <select class="form-select" id="inputStatus230" name="statusmed10_am">
                            <option value="10:00 A.M" <?php if ($statusmed10_am == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmed10_am == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus330" class="form-label">11:00 A.M</label>
                        <select class="form-select" id="inputStatus330" name="statusmed11_am">
                            <option value="11:00 A.M" <?php if ($statusmed11_am == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmed11_am == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus430" class="form-label">01:00 P.M</label>
                        <select class="form-select" id="inputStatus430" name="statusmed1_pm">
                            <option value="01:00 P.M" <?php if ($statusmed1_pm  == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmed1_pm  == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus430" class="form-label">02:00 P.M.</label>
                        <select class="form-select" id="inputStatus430" name="statusmed2_pm">
                            <option value="02:00 P.M" <?php if ($statusmed2_pm == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmed2_pm == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus430" class="form-label">03:00 P.M.</label>
                        <select class="form-select" id="inputStatus430" name="statusmed3_pm">
                            <option value="03:00 P.M." <?php if ($statusmed3_pm == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmed3_pm == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus430" class="form-label">04:00 P.M</label>
                        <select class="form-select" id="inputStatus430" name="statusmed4_pm">
                            <option value="04:00 P.M" <?php if ($statusmed4_pm == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmed4_pm == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal" >Close</button>
                        <button type="submit" name="submit_statusmedicalgsjhstue" class="btn btn-light">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateWednesdayModal" tabindex="-1" aria-labelledby="updateWednesdayModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateWednesdayModalLabel">Wednesday Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <?php
                $sql1 = "SELECT * FROM statusmedicalgsjhswednesday";
                $result1 = mysqli_query($conn, $sql1);

                if (mysqli_num_rows($result1) > 0) {
                    while ($row1 = $result1->fetch_assoc()) {
                        $medical_id = $row1['medical_id'];
                        $statusmed8_am = $row1['statusmed8_am'];
                        $statusmed9_am = $row1['statusmed9_am'];
                        $statusmed10_am = $row1['statusmed10_am'];
                        $statusmed11_am = $row1['statusmed11_am'];
                        $statusmed1_pm = $row1['statusmed1_pm'];
                        $statusmed2_pm = $row1['statusmed2_pm'];
                        $statusmed3_pm = $row1['statusmed3_pm'];
                        $statusmed4_pm = $row1['statusmed4_pm'];

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
                  <form action="function/gsjhsrecords.php" method="POST">
                    <input type="hidden" name="medical_id" value="<?php echo $medical_id; ?>">
                    <div class="mb-3">
                    <label for="inputStatus1030_1" class="form-label">08:00 A.M</label>
                    <select class="form-select" id="inputStatus1030_1" name="statusmed8_am">
                        <option value="08:00 A.M " <?php if ($statusmed8_am == 'Available') echo 'selected'; ?>>Available</option>
                        <option value="Unavailable" <?php if ($statusmed8_am == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                    </select>

                    </div>
                    <div class="mb-3">
                        <label for="inputStatus1130" class="form-label">09:00 A.M</label>
                        <select class="form-select" id="inputStatus1130" name="statusmed9_am">
                            <option value="09:00 A.M" <?php if ($statusmed9_am == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmed9_am == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus230" class="form-label">10:00 A.M</label>
                        <select class="form-select" id="inputStatus230" name="statusmed10_am">
                            <option value="10:00 A.M" <?php if ($statusmed10_am == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmed10_am == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus330" class="form-label">11:00 A.M</label>
                        <select class="form-select" id="inputStatus330" name="statusmed11_am">
                            <option value="11:00 A.M" <?php if ($statusmed11_am == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmed11_am == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus430" class="form-label">01:00 P.M</label>
                        <select class="form-select" id="inputStatus430" name="statusmed1_pm">
                            <option value="01:00 P.M" <?php if ($statusmed1_pm  == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmed1_pm  == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus430" class="form-label">02:00 P.M.</label>
                        <select class="form-select" id="inputStatus430" name="statusmed2_pm">
                            <option value="02:00 P.M" <?php if ($statusmed2_pm == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmed2_pm == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus430" class="form-label">03:00 P.M.</label>
                        <select class="form-select" id="inputStatus430" name="statusmed3_pm">
                            <option value="03:00 P.M." <?php if ($statusmed3_pm == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmed3_pm == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus430" class="form-label">04:00 P.M</label>
                        <select class="form-select" id="inputStatus430" name="statusmed4_pm">
                            <option value="04:00 P.M" <?php if ($statusmed4_pm == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmed4_pm == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal" >Close</button>
                        <button type="submit" name="submit_statusmedicalgsjhswed" class="btn btn-light">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateThursdayModal" tabindex="-1" aria-labelledby="updateThursdayModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateThursdayModalLabel">Thursday Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <?php
                $sql1 = "SELECT * FROM statusmedicalgsjhsthursday";
                $result1 = mysqli_query($conn, $sql1);

                if (mysqli_num_rows($result1) > 0) {
                    while ($row1 = $result1->fetch_assoc()) {
                        $medical_id = $row1['medical_id'];
                        $statusmed8_am = $row1['statusmed8_am'];
                        $statusmed9_am = $row1['statusmed9_am'];
                        $statusmed10_am = $row1['statusmed10_am'];
                        $statusmed11_am = $row1['statusmed11_am'];
                        $statusmed1_pm = $row1['statusmed1_pm'];
                        $statusmed2_pm = $row1['statusmed2_pm'];
                        $statusmed3_pm = $row1['statusmed3_pm'];
                        $statusmed4_pm = $row1['statusmed4_pm'];

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
                  <form action="function/gsjhsrecords.php" method="POST">
                    <input type="hidden" name="medical_id" value="<?php echo $medical_id; ?>">
                    <div class="mb-3">
                    <label for="inputStatus1030_1" class="form-label">08:00 A.M</label>
                    <select class="form-select" id="inputStatus1030_1" name="statusmed8_am">
                        <option value="08:00 A.M " <?php if ($statusmed8_am == 'Available') echo 'selected'; ?>>Available</option>
                        <option value="Unavailable" <?php if ($statusmed8_am == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                    </select>

                    </div>
                    <div class="mb-3">
                        <label for="inputStatus1130" class="form-label">09:00 A.M</label>
                        <select class="form-select" id="inputStatus1130" name="statusmed9_am">
                            <option value="09:00 A.M" <?php if ($statusmed9_am == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmed9_am == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus230" class="form-label">10:00 A.M</label>
                        <select class="form-select" id="inputStatus230" name="statusmed10_am">
                            <option value="10:00 A.M" <?php if ($statusmed10_am == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmed10_am == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus330" class="form-label">11:00 A.M</label>
                        <select class="form-select" id="inputStatus330" name="statusmed11_am">
                            <option value="11:00 A.M" <?php if ($statusmed11_am == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmed11_am == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus430" class="form-label">01:00 P.M</label>
                        <select class="form-select" id="inputStatus430" name="statusmed1_pm">
                            <option value="01:00 P.M" <?php if ($statusmed1_pm  == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmed1_pm  == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus430" class="form-label">02:00 P.M.</label>
                        <select class="form-select" id="inputStatus430" name="statusmed2_pm">
                            <option value="02:00 P.M" <?php if ($statusmed2_pm == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmed2_pm == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus430" class="form-label">03:00 P.M.</label>
                        <select class="form-select" id="inputStatus430" name="statusmed3_pm">
                            <option value="03:00 P.M." <?php if ($statusmed3_pm == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmed3_pm == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus430" class="form-label">04:00 P.M</label>
                        <select class="form-select" id="inputStatus430" name="statusmed4_pm">
                            <option value="04:00 P.M" <?php if ($statusmed4_pm == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmed4_pm == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal" >Close</button>
                        <button type="submit" name="submit_statusmedicalgsjhsthu" class="btn btn-light">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateFridayModal" tabindex="-1" aria-labelledby="updateFridayModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateThursdayModalLabel">Friday Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <?php
                $sql1 = "SELECT * FROM statusmedicalgsjhsfriday";
                $result1 = mysqli_query($conn, $sql1);

                if (mysqli_num_rows($result1) > 0) {
                    while ($row1 = $result1->fetch_assoc()) {
                        $medical_id = $row1['medical_id'];
                        $statusmed8_am = $row1['statusmed8_am'];
                        $statusmed9_am = $row1['statusmed9_am'];
                        $statusmed10_am = $row1['statusmed10_am'];
                        $statusmed11_am = $row1['statusmed11_am'];
                        $statusmed1_pm = $row1['statusmed1_pm'];
                        $statusmed2_pm = $row1['statusmed2_pm'];
                        $statusmed3_pm = $row1['statusmed3_pm'];
                        $statusmed4_pm = $row1['statusmed4_pm'];

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
                  <form action="function/gsjhsrecords.php" method="POST">
                    <input type="hidden" name="medical_id" value="<?php echo $medical_id; ?>">
                    <div class="mb-3">
                    <label for="inputStatus1030_1" class="form-label">08:00 A.M</label>
                    <select class="form-select" id="inputStatus1030_1" name="statusmed8_am">
                        <option value="08:00 A.M " <?php if ($statusmed8_am == 'Available') echo 'selected'; ?>>Available</option>
                        <option value="Unavailable" <?php if ($statusmed8_am == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                    </select>

                    </div>
                    <div class="mb-3">
                        <label for="inputStatus1130" class="form-label">09:00 A.M</label>
                        <select class="form-select" id="inputStatus1130" name="statusmed9_am">
                            <option value="09:00 A.M" <?php if ($statusmed9_am == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmed9_am == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus230" class="form-label">10:00 A.M</label>
                        <select class="form-select" id="inputStatus230" name="statusmed10_am">
                            <option value="10:00 A.M" <?php if ($statusmed10_am == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmed10_am == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus330" class="form-label">11:00 A.M</label>
                        <select class="form-select" id="inputStatus330" name="statusmed11_am">
                            <option value="11:00 A.M" <?php if ($statusmed11_am == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmed11_am == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus430" class="form-label">01:00 P.M</label>
                        <select class="form-select" id="inputStatus430" name="statusmed1_pm">
                            <option value="01:00 P.M" <?php if ($statusmed1_pm  == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmed1_pm  == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus430" class="form-label">02:00 P.M.</label>
                        <select class="form-select" id="inputStatus430" name="statusmed2_pm">
                            <option value="02:00 P.M" <?php if ($statusmed2_pm == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmed2_pm == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus430" class="form-label">03:00 P.M.</label>
                        <select class="form-select" id="inputStatus430" name="statusmed3_pm">
                            <option value="03:00 P.M." <?php if ($statusmed3_pm == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmed3_pm == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus430" class="form-label">04:00 P.M</label>
                        <select class="form-select" id="inputStatus430" name="statusmed4_pm">
                            <option value="04:00 P.M" <?php if ($statusmed4_pm == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmed4_pm == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal" >Close</button>
                        <button type="submit" name="submit_statusmedicalgsjhsfri" class="btn btn-light">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
/**
 * Send an SMS message directly by calling the HTTP endpoint.
 *
 * For your convenience, environment variables are already pre-populated with your account data
 * like authentication, base URL, and phone number.
 *
 * Please find detailed information in the readme file.
 */
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $phoneNumber = $_POST['phone'];
    $message = $_POST['message'];
    date_default_timezone_set('Asia/Manila');
    $date_created = date('Y-m-d h:i A'); 

    // Send the SMS using the Infobip API
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

    // Prepare the SQL query
    $sql = "INSERT INTO sms_message (phone, message, date_created) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind the parameters and execute the query
    $stmt->bind_param("sss", $phoneNumber, $message, $date_created);
    $stmt->execute();

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

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

