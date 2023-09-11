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
        require_once('../../db.php');
        if($_SESSION['leveleduc'] == 3){
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
    <title>Request Medical Schedule</title>
    
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
	<link rel="stylesheet" href="assets/styless.css">

   
</style>
</head> 

<body class="app">   
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
                        <div class="col-12 col-lg-auto text-center text-lg-start">
						        <h4 class="notification-title mb-1">Request Medical Schedule</h4>
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

<form class="form-horizontal mt-4" method="post" action="function/functions.php">
<div class="row">
  <div class="col-sm-4">
    <div class="form-group">
      <label for="idnumber" class="col-sm-12 control-label" style="font-size: 16px">Student/Employee 1 ID Number</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="idnumber" name="idnumber" placeholder="Enter ID number" required>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="form-group">
      <label for="patient_name" class="col-sm-12 control-label" style="font-size: 16px">Student/Employee 1 Fullname</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="name" name="name1" placeholder="Enter Fullname" required>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="form-group">
      <label for="gradecourseyear1" class="col-sm-12 control-label" style="font-size: 16px">Grade & Section/Course & Year</label>
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
            <label for="idnumber" class="col-sm-12 control-label" style="font-size: 16px">Student/Employee 2 ID Number</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="idnumber" name="idnumber2" placeholder="Enter ID number">
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="patient_name" class="col-sm-12 control-label" style="font-size: 16px">Student/Employee Fullname</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="name" name="name2" placeholder="Enter Fullname">
            </div>
        </div>
    </div>
    <div class="col-sm-4">
    <div class="form-group">
      <label for="gradecourseyear2" class="col-sm-12 control-label" style="font-size: 16px">Grade & Section/Course & Year</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="gradecourseyear2" name="gradecourseyear2" placeholder="Enter Grade & Section/Course & Year">
      </div>
    </div>
  </div>
</div>

<br>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label for="idnumber" class="col-sm-12 control-label" style="font-size: 16px">Student/Employee 3 ID Number</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="idnumber" name="idnumber3" placeholder="Enter ID number">
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="patient_name" class="col-sm-12 control-label" style="font-size: 16px">Student/Employee 3 Fullname</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="name" name="name3" placeholder="Enter Fullname">
            </div>
        </div>
    </div>
    <div class="col-sm-4">
    <div class="form-group">
      <label for="gradecourseyear3" class="col-sm-12 control-label" style="font-size: 16px">Grade & Section/Course & Year</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="gradecourseyear3" name="gradecourseyear3" placeholder="Enter Grade & Section/Course & Year">
      </div>
    </div>
  </div>
</div>

<br>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label for="idnumber" class="col-sm-12 control-label" style="font-size: 16px">Student/Employee 4 ID Number</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="idnumber" name="idnumber4" placeholder="Enter ID number">
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="patient_name" class="col-sm-12 control-label" style="font-size: 16px">Student/Employee Fullname</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="name" name="name4" placeholder="Enter Fullname">
            </div>
        </div>
    </div>
    <div class="col-sm-4">
    <div class="form-group">
      <label for="gradecourseyear4" class="col-sm-12 control-label" style="font-size: 16px">Grade & Section/Course & Year</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="gradecourseyear4" name="gradecourseyear4" placeholder="Enter Grade & Section/Course & Year">
      </div>
    </div>
  </div>
</div>
<br>
<div class="row">
<div class="col-sm-4">
        <div class="form-group">
            <label for="idnumber" class="col-sm-12 control-label" style="font-size: 16px">Student/Employee 5 ID Number</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="idnumber" name="idnumber5" placeholder="Enter ID number">
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="patient_name" class="col-sm-12 control-label" style="font-size: 16px">Student/Employee Fullname</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="name" name="name5" placeholder="Enter Fullname">
            </div>
        </div>
    </div>
    <div class="col-sm-4">
    <div class="form-group">
      <label for="gradecourseyear5" class="col-sm-12 control-label" style="font-size: 16px">Grade & Section/Course & Year</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="gradecourseyear5" name="gradecourseyear5" placeholder="Enter Grade & Section/Course & Year">
      </div>
    </div>
  </div>
</div>

<br>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label for="c_enrolled" class="col-sm-12 control-label" style="font-size: 16px">For Student</label>
            <div class="col-sm-12">
                <select id="c_enrolled" name="c_enrolled" class="form-control">
                <option value="">Select Level of Education</option>
                <option value="Grade School & Junior High School">Grade School & Junior High School</option>
                <option value="Senior High School">Senior High School</option>
                <option value="College">College</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="fullname" style="col-sm-12 font-size: 16px">For Employee</label>
            <div class="col-sm-12">
            <select id="c_employee" name="c_employee" class="form-control">
                <option value="">--Select--</option>
                <option value="Employee in GS and JHS">Employee in GS and JHS</option>
                <option value="Employee in SHS">Employee in Senior High School</option>
                <option value="Employee in College">Employee in College</option>
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
</div>
<br><br>

<div class="container">
  <div class="text-box">
    <center>
      <p>Available Day and Time <b>IN GS and JHS</b></p>
    </center>

    <?php
    $sql1 = "SELECT * FROM statusmedicalgsjhs";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1)) {
        $row1 = $result1->fetch_assoc();

        $statusmedmonam_1 = $row1['statusmedmonam_1']; 
        $statusmedtueam_2 = $row1['statusmedtueam_2']; 
        $statusmedwedam_3 = $row1['statusmedwedam_3']; 
        $statusmedthuam_4 = $row1['statusmedthuam_4']; 
        $statusmedfriam_5 = $row1['statusmedfriam_5']; 
        $statusmedmonpm_6 = $row1['statusmedmonpm_6']; 
        $statusmedtuepm_7 = $row1['statusmedtuepm_7']; 
        $statusmedwedpm_8 = $row1['statusmedwedpm_8']; 
        $statusmedthupm_9 = $row1['statusmedthupm_9']; 
        $statusmedfripm_10 = $row1['statusmedfripm_10']; 
    }
    ?>
    <p>
    <b><p>Morning</p></b>
      <div class="<?php echo ($statusmedmonam_1 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedmonam_1; ?></div>
      Monday - 8:00 A.M - 11:00 A.M.
      <br><br><div class="<?php echo ($statusmedtueam_2 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedtueam_2; ?></div>
      Tuesday - 8:00 A.M - 11:00 A.M.
      <br><br><div class="<?php echo ($statusmedwedam_3 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedwedam_3; ?></div>
      Wednesday - 8:00 A.M - 11:00 A.M.
      <br><br>
      <div class="<?php echo ($statusmedthuam_4 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedthuam_4; ?></div>
      Thursday- 8:00 A.M - 11:00 A.M.
      <br><br><div class="<?php echo ($statusmedfriam_5  == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedfriam_5; ?></div>
      Friday- 8:00 A.M - 11:00 A.M.
<br><br>
<b><p>Afternoon</b></p>
      <div class="<?php echo ($statusmedmonpm_6 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedmonpm_6; ?></div>
      Monday - 1:30 P.M - 4:00 P.M.
      <br><br><div class="<?php echo ($statusmedtuepm_7 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedtuepm_7; ?></div>
      Tuesday - 1:30 P.M - 4:00 P.M..
      <br><br><div class="<?php echo ($statusmedwedpm_8 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedwedpm_8; ?></div>
      Wednesday - 1:30 P.M - 4:00 P.M.
      <br><br>
      <div class="<?php echo ($statusmedthupm_9 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedthupm_9; ?></div>
      Thursday- 1:30 P.M - 4:00 P.M.
      <br><br><div class="<?php echo ($statusmedfripm_10 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedfripm_10; ?></div>
      Friday- 1:30 P.M - 4:00 P.M.
    </p>
  </div>

  <div class="text-box">
    <center>
      <p>Available Day and Time <b>IN SHS</b></p>
    </center>
     <?php
    $sql2 = "SELECT * FROM statusmedicalshs";
    $result2 = mysqli_query($conn, $sql2);

    if (mysqli_num_rows($result2)) {
        $row2 = $result2->fetch_assoc();

        $statusmedmonam_1 = $row2['statusmedmonam_1']; 
        $statusmedtueam_2 = $row2['statusmedtueam_2']; 
        $statusmedwedam_3 = $row2['statusmedwedam_3']; 
        $statusmedthuam_4 = $row2['statusmedthuam_4']; 
        $statusmedfriam_5 = $row2['statusmedfriam_5']; 
        $statusmedmonpm_6 = $row2['statusmedmonpm_6']; 
        $statusmedtuepm_7 = $row2['statusmedtuepm_7']; 
        $statusmedwedpm_8 = $row2['statusmedwedpm_8']; 
        $statusmedthupm_9 = $row2['statusmedthupm_9']; 
        $statusmedfripm_10 = $row2['statusmedfripm_10']; 
    }
    ?>
    <p>
    <b><p>Morning</p></b>
      <div class="<?php echo ($statusmedmonam_1 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedmonam_1; ?></div>
      Monday - 8:00 A.M - 11:00 A.M.
      <br><br><div class="<?php echo ($statusmedtueam_2 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedtueam_2; ?></div>
      Tuesday - 8:00 A.M - 11:00 A.M.
      <br><br><div class="<?php echo ($statusmedwedam_3 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedwedam_3; ?></div>
      Wednesday - 8:00 A.M - 11:00 A.M.
      <br><br>
      <div class="<?php echo ($statusmedthuam_4 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedthuam_4; ?></div>
      Thursday- 8:00 A.M - 11:00 A.M.
      <br><br><div class="<?php echo ($statusmedfriam_5  == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedfriam_5; ?></div>
      Friday- 8:00 A.M - 11:00 A.M.
<br><br>
<b><p>Afternoon</b></p>
      <div class="<?php echo ($statusmedmonpm_6 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedmonpm_6; ?></div>
      Monday - 1:30 P.M - 4:00 P.M.
      <br><br><div class="<?php echo ($statusmedtuepm_7 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedtuepm_7; ?></div>
      Tuesday - 1:30 P.M - 4:00 P.M..
      <br><br><div class="<?php echo ($statusmedwedpm_8 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedwedpm_8; ?></div>
      Wednesday - 1:30 P.M - 4:00 P.M.
      <br><br>
      <div class="<?php echo ($statusmedthupm_9 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedthupm_9; ?></div>
      Thursday- 1:30 P.M - 4:00 P.M.
      <br><br><div class="<?php echo ($statusmedfripm_10 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedfripm_10; ?></div>
      Friday- 1:30 P.M - 4:00 P.M.
    </p>
  </div>


  <div class="text-box">
    <center>
      <p>Available Day and Time <b>IN COLLEGE</b></p>
    </center>
     <?php
    $sql3 = "SELECT * FROM statusmedicalcollege";
    $result3 = mysqli_query($conn, $sql3);

    if (mysqli_num_rows($result3)) {
        $row3 = $result3->fetch_assoc();

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
    ?>
    <p>
    <b><p>Morning</p></b>
      <div class="<?php echo ($statusmedmonam_1 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedmonam_1; ?></div>
      Monday - 8:00 A.M - 11:00 A.M.
      <br><br><div class="<?php echo ($statusmedtueam_2 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedtueam_2; ?></div>
      Tuesday - 8:00 A.M - 11:00 A.M.
      <br><br><div class="<?php echo ($statusmedwedam_3 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedwedam_3; ?></div>
      Wednesday - 8:00 A.M - 11:00 A.M.
      <br><br>
      <div class="<?php echo ($statusmedthuam_4 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedthuam_4; ?></div>
      Thursday- 8:00 A.M - 11:00 A.M.
      <br><br><div class="<?php echo ($statusmedfriam_5  == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedfriam_5; ?></div>
      Friday- 8:00 A.M - 11:00 A.M.
<br><br>
<b><p>Afternoon</b></p>
      <div class="<?php echo ($statusmedmonpm_6 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedmonpm_6; ?></div>
      Monday - 1:30 P.M - 4:00 P.M.
      <br><br><div class="<?php echo ($statusmedtuepm_7 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedtuepm_7; ?></div>
      Tuesday - 1:30 P.M - 4:00 P.M..
      <br><br><div class="<?php echo ($statusmedwedpm_8 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedwedpm_8; ?></div>
      Wednesday - 1:30 P.M - 4:00 P.M.
      <br><br>
      <div class="<?php echo ($statusmedthupm_9 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedthupm_9; ?></div>
      Thursday- 1:30 P.M - 4:00 P.M.
      <br><br><div class="<?php echo ($statusmedfripm_10 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statusmedfripm_10; ?></div>
      Friday- 1:30 P.M - 4:00 P.M.
    </p>
  </div>
</div>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    function updateColor() {
      var selectedValue = $(this).val();
      $(this).removeClass('available unavailable').addClass(selectedValue.toLowerCase());
    }

    $('select').each(updateColor).change(updateColor);
  });
</script>





<div class="row">
    <div class="form-group">
        <br>
        <label for="message" class="col-sm-10 control-label">Write a message.... (State what for is the medical scheduling and Date and Time)</label>
        <div class="col-sm-12">
            <textarea type="text" class="form-control" id="message" name="message" placeholder="Enter your message.... Ex. July 08, 2023 Monday 8:00AM" required></textarea>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <br>
        <input type="text" name="user_id" style="display: none;" value="<?= $_SESSION['user_id'];?>">
        <button name="submit_medical" class="btn btn-success">Send Medical Appointment</button>
    </div>
</div>
</form>
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

