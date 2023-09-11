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
    <title>View Weight Monitoring Record</title>
    
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
$sql = "SELECT * FROM weightmonitor WHERE idnumber= '$idnumber'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = $result->fetch_assoc(); 
  $idnumber = $row['idnumber'];
  $fullname = $row['fullname'];
  $age = $row['age'];
  $gradesection = $row['gradesection'];
  $date_time = $row['date_time'];
  $weight = $row['weight'];
  $remarks = $row['remarks'];
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
                    $sql = "SELECT * FROM weightmonitor WHERE idnumber = '$idnumber'";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_array()) {
                    ?>
                    <br>
        
<div class="row">
                  <div class="col-sm-3">
                      <div class="form-group">
                          <label for="idnumber" class="col-sm-7 control-label" style="font-size: 16px">ID Number</label>
                          <div class="col-sm-11">
                              <input type="text" class="form-control" id="idnumber" name="idnumber" value="<?php echo $row['idnumber']; ?>" readonly>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-3">
                      <div class="form-group">
                          <label for="fullname" class="col-sm-4 control-label" style="font-size: 16px">Name</label>
                          <div class="col-sm-11">
                              <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $row['fullname']; ?>" readonly>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-3">
                      <div class="form-group">
                          <label for="age" class="col-sm-4 control-label" style="font-size: 16px">Age</label>
                          <div class="col-sm-11">
                              <input type="age" class="form-control" id="age" name="age" value="<?php echo $row['age']; ?>" readonly>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-3">
                      <div class="form-group">
                          <label for="gradesection" class="col-sm-10 control-label" style="font-size: 16px">Employee/Grade & Section</label>
                          <div class="col-sm-11">
                              <input type="text" class="form-control" id="gradesection" name="gradesection" value="<?php echo $row['gradesection']; ?>" readonly>
                          </div>
                      </div>
                  </div>
              </div>
            
              <div class="row">
                  
                  <div class="col-sm-3">
                    <br>
                      <div class="form-group">
                          <label for="weight" class="col-sm-5 control-label" style="font-size: 16px">Weight (kg)</label>
                          <div class="col-sm-11">
                              <input type="text" class="form-control" id="weight" name="weight" value="<?php echo $row['weight']; ?>" readonly>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-8">
                    <br>
                      <div class="form-group">
                          <label for="remarks" class="col-sm-4 control-label" style="font-size: 16px">Remarks</label>
                          <div class="col-sm-15">
                              <input type="text" class="form-control" id="remarks" name="remarks" value="<?php echo $row['remarks']; ?>" readonly>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="form-group">
                            <span><b>Date & Time:</b> <?php echo $row['date_time']; ?></span>
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

