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
        if($_SESSION['leveleduc'] == 2){
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
    <title>Request Dental Schedule</title>
    
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
						        <h4 class="notification-title mb-1">Request Dental Schedule</h4>
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
                    <b><p>Please wait for a message for approval of your dental request appointment.</b></p>

                    <form class="form-horizontal mt-4" method="post" action="function/functions.php" onsubmit="return validateForm()">
                    <div class="row">
    <div class="col-sm-3">
        <div class="form-group">
            <label for="idnumber" class="col-sm-12 control-label" style="font-size: 16px">Enter your ID Number</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="idnumber" name="idnumber" placeholder="ID number" required>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label for="patient_name" class="col-sm-12 control-label" style="font-size: 16px">Enter your Fullname</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="name" name="fullname" placeholder="Enter your Fullname" required>
            </div>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            <label for="dental_service" class="col-sm-12 control-label" style="font-size: 16px">Dental Services</label>
            <div class="col-sm-12">
                <select id="dental_service" name="service" class="form-control" required>
                    <option value="">Select Service</option>
                    <option value="Cleaning">Cleaning</option>
                    <option value="Tooth Extraction">Tooth Extraction</option>
                </select>
            </div>
        </div>
    </div>

    <div class="col-sm-3">
  <div class="form-group">
    <label for="phoneno" class="col-sm-12 control-label" style="font-size: 16px">Phone Number</label>
    <div class="col-sm-12">
      <input type="text" class="form-control contactInput" name="phoneno" placeholder="+63">
      <p class="errorMessage" style="color: red; display: none;">Invalid Phone Number</p>
    </div>
  </div>
</div>

<script>
  function validateForm() {
    var contactInputs = document.getElementsByClassName("contactInput");
    var isValid = true;

    for (var i = 0; i < contactInputs.length; i++) {
      var contactInput = contactInputs[i].value;

      if (!contactInput.startsWith("+63")) {
        isValid = false;
        document.getElementsByClassName("errorMessage")[i].style.display = "block";
      } else {
        document.getElementsByClassName("errorMessage")[i].style.display = "none";
      }
    }

    return isValid;
  }
</script>

</div>

<br>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label for="gradecourseyear" class="control-label" style="font-size: 16px">Grade & Section</label>
            <input type="text" class="form-control" id="igradecourseyear" name="gradecourseyear" placeholder="Enter Grade & Section">
        </div>
    </div>
    
    <div class="col-sm-4">
        <div class="form-group">
            <label for="fullname" style="font-size: 16px">Role</label>
            <select id="role" name="role" class="form-control">
                <option value="">--Select--</option>
                <option value="Student in SHS">Student</option>
                <option value="Employee in SHS">Employee</option>
            </select>
        </div>
    </div>
    
    <div class="col-sm-4">
        <div class="form-group">
            <label for="datetime" class="control-label" style="font-size: 16px">Schedule</label>
            <input type="datetime-local" class="form-control" id="datetime" name="date_time">
        </div>
    </div>
</div>


<br>

<div class="container">
  <div class="text-box">
    <center>
      <p>Available Day and Time <b>IN GS, JHS and SHS</b></p>
    </center>

    <?php
    $sql1 = "SELECT * FROM status";
    $result1 = mysqli_query($conn, $sql1);

 
    if (mysqli_num_rows($result1)) {
        $row1 = $result1->fetch_assoc();

        $statuses1030_1 = $row1['statuses1030_1']; // Update column name to 'statuses1030'
        $statuses1130_2 = $row1['statuses1130_2']; // Update column name to 'statuses1130'
        $statuses230_3 = $row1['statuses230_3']; // Update column name to 'statuses230'
        $statuses330_4 = $row1['statuses330_4']; // Update column name to 'statuses330'
        $statuses430_5 = $row1['statuses430_5']; // Update column name to 'statuses430'
    }else{
      
    }
    ?>
    <p>
      <div class="<?php echo ($statuses1030_1 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statuses1030_1; ?></div>
      Monday - 9:00 A.M - 11:00 A.M.
      <br><br><div class="<?php echo ($statuses1130_2 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statuses1130_2; ?></div>
      Tuesday - 9:00 A.M - 11:00 A.M.
      <br><br><div class="<?php echo ($statuses230_3 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statuses230_3; ?></div>
      Wednesday - 9:00 A.M - 11:00 A.M.
      <br><br>
      <div class="<?php echo ($statuses330_4 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statuses330_4; ?></div>
      Thursday- 9:00 A.M - 11:00 A.M.
      <br><br><div class="<?php echo ($statuses430_5 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statuses430_5; ?></div>
      Friday- 9:00 A.M - 11:00 A.M.
    </p>
  </div>

  <div class="text-box">
    <center>
      <p>Available Day and Time <b>IN COLLEGE</b></p>
    </center>
    <p>
    </p>

    <?php
    $sql3 = "SELECT * FROM statuscollege";
    $result3 = mysqli_query($conn, $sql3);

    if (mysqli_num_rows($result3)) {
        $row3 = $result3->fetch_assoc();

        $statuses1030_1 = $row3['statuses1030_1']; // Update column name to 'statuses1030'
        $statuses1130_2 = $row3['statuses1130_2']; // Update column name to 'statuses1130'
        $statuses230_3 = $row3['statuses230_3']; // Update column name to 'statuses230'
        $statuses330_4 = $row3['statuses330_4']; // Update column name to 'statuses330'
        $statuses430_5 = $row3['statuses430_5']; // Update column name to 'statuses330'
    }
    ?>
     <p>
      <div class="<?php echo ($statuses1030_1 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statuses1030_1; ?></div>
      Monday - 8:00 A.M - 12:00 P.M.
      <br><br><div class="<?php echo ($statuses1130_2 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statuses1130_2; ?></div>
      Tuesday - 8:00 A.M - 12:00 A.M.
      <br><br><div class="<?php echo ($statuses230_3 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statuses230_3; ?></div>
      Wednesday - 8:00 A.M - 12:00 P.M.
      <br><br>
      <div class="<?php echo ($statuses330_4 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statuses330_4; ?></div>
      Thursday- 8:00 A.M - 12:00 P.M.
      <br><br><div class="<?php echo ($statuses430_5 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $statuses430_5; ?></div>
      Friday- 8:00 A.M - 12:00 P.M.
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





<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <br>
        <input type="text" name="user_id" style="display: none;" value="<?= $_SESSION['user_id'];?>">
        <button name="submit_dental" class="btn btn-success">Send Dental Appointment</button>
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

