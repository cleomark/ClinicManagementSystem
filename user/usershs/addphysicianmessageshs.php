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
    <title>Request Physician Consultation Schedule</title>
    
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
            <b><p>Please wait for a message for approval of your physician consultation request appointment.</b></p>

<form class="form-horizontal mt-4" method="post" action="function/functions.php" onsubmit="return validateForm()">
<div class="row">
  <div class="col-sm-4">
    <div class="form-group">
      <label for="idnumber" class="col-sm-10 control-label" style="font-size: 16px">Enter your ID Number</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="idnumber" name="idnumber" placeholder="Enter ID number" required>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="form-group">
      <label for="patient_name" class="col-sm-10 control-label" style="font-size: 16px">Enter your Fullname</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Fullname" required>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
  <div class="form-group">
    <label for="phoneno" class="col-sm-10 control-label" style="font-size: 16px">Phone Number</label>
    <div class="col-sm-10">
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
      <label for="gradesection" class="col-sm-10 control-label" style="font-size: 16px">Grade & Section</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="gradesection" name="gradesection" placeholder="Enter your Grade & Section">
      </div>
    </div>
  </div>

 <div class="col-sm-4">
        <div class="form-group">
            <label for="role" class="col-sm-10 control-label" style="font-size: 16px">Role</label>
            <div class="col-sm-12">
                <select id="role" name="role" class="form-control">
                <option value="">Select Role</option>
                <option value="Student in SHS">Student</option>
                <option value="Employee in SHS">Employee</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="datetime" class="control-label" style="font-size: 16px">Schedule</label>
            <input type="datetime-local" class="form-control" id="datetime" name="date_time">
        </div>
    </div>
</div>

   
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

