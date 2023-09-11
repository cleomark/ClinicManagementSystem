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
    <title>Request Physician COnsultation Schedule</title>
    
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
						        <h4 class="notification-title mb-1">Request Physician Consultation Schedule</h4>
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
<form class="form-horizontal mt-4" method="post" action="function/functions.php">
<div class="row">
  <div class="col-sm-6">
    <div class="form-group">
      <label for="idnumber" class="col-sm-6 control-label" style="font-size: 16px">Student/Employee ID Number</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="idnumber" name="idnumber" placeholder="Enter ID number" required>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="form-group">
      <label for="patient_name" class="col-sm-6 control-label" style="font-size: 16px">Student/Employee Fullname</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Fullname" required>
      </div>
    </div>
  </div>
 </div>
<br>
 <div class="row">


 <div class="col-sm-6">
        <div class="form-group">
            <label for="role" class="col-sm-4 control-label" style="font-size: 16px">Role</label>
            <div class="col-sm-10">
                <select id="role" name="role" class="form-control">
                <option value="">Select Role</option>
                <option value="Student in North Campus">Student in North Campus</option>
                <option value="Student in South Campus">Student in South Campus</option>
                <option value="Employee in North Campus">Employee in North Campus</option>
                <option value="Employee in South Campus">Employee in South Campus</option>
                </select>
            </div>
        </div>
                            </div>
  <div class="col-sm-6">
    <div class="form-group">
      <label for="gradecourseyear" class="col-sm-6 control-label" style="font-size: 16px">Grade & Section/Course & Year (If Student)</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="gradecourseyear" name="gradecourseyear" placeholder="Enter Grade & Section/Course & Year">
      </div>
    </div>
  </div>
  
    </div>

      <p><b><br>Note: </b> The PHYSICIAN will ONLY be available every <b>WEDNESDAY (8:00 A.M to 11:00 A.M)</b>. If your request has been approved, a text message will be sent to you.</p>
 
<div class="container">
  <div class="text-box">
    <center>
      <p>Available Day and Time <b>IN GS, JHS and SHS</b></p>
    </center>

    <?php
    $sql = "SELECT * FROM statusphysiciangsjhsshs ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result)) {
        $row = $result->fetch_assoc();

        $status811 = $row['status811']; 
       
    }
    ?>
    <p>
    <b><p>Morning</p></b>
      <div class="<?php echo ($status811 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $status811; ?></div>
      Wednesday - 8:00 A.M - 11:00 A.M.
     
  </div>

  <div class="text-box">
    <center>
      <p>Available Day and Time <b>IN COLLEGE</b></p>
    </center>

    <?php
    $sql1 = "SELECT * FROM statusphysiciancollege ";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1)) {
        $row1 = $result1->fetch_assoc();

        $status812 = $row1['status812']; 
       
    }
    ?>
    <p>
    <b><p>Morning</p></b>
      <div class="<?php echo ($status812 == 'Unavailable') ? 'unavailable' : 'available'; ?> status-label" disabled><?php echo $status812; ?></div>
      Wednesday - 8:00 A.M - 12:00 P.M.
     
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
        <label for="message" class="col-sm-10 control-label">Write a message.... (State Date and Time)</label>
        <div class="col-sm-12">
            <textarea type="text" class="form-control" id="message" name="message" placeholder="Enter your message.... Ex. July 08, 2023 Monday 8:00AM" required></textarea>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <br>
        <input type="text" name="user_id" style="display: none;" value="<?= $_SESSION['user_id'];?>">
        <button name="submit_physician" class="btn btn-success">Send Physician Consultation Appointment</button>
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

