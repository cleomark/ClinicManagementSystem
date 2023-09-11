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
$sql = "SELECT * FROM vitalsigns WHERE idnumber= '$idnumber'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = $result->fetch_assoc(); 
  $idnumber = $row['idnumber'];
  $fullname = $row['fullname'];
  $age = $row['age'];
  $date = $row['date'];
  $time = $row['time'];
  $bp = $row['bp'];
  $t = $row['t'];
  $p = $row['p'];
  $r = $row['r'];
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
                    <div class="col-12 col-lg-auto text-center text-lg-start">
						        <h4 class="notification-title mb-1">Vital Signs Monitoring Records</h4>
					        </div>
                    </div><!--//row-->
                </div><!--//app-card-header-->
                <div class="app-card-body p-4">
                    <?php
                    $sql = "SELECT * FROM vitalsigns WHERE idnumber = '$idnumber'";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_array()) {
                    ?>
                    <br>
        
                    <div class="row">
                  <div class="col-sm-4">
                      <div class="form-group">
                          <label for="idnumber" class="col-sm-7 control-label" style="font-size: 16px">ID Number</label>
                          <div class="col-sm-11">
                              <input type="text" class="form-control" id="idnumber" name="idnumber" value="<?php echo $row['idnumber']; ?>" readonly>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-4">
                      <div class="form-group">
                          <label for="fullname" class="col-sm-4 control-label" style="font-size: 16px">Name</label>
                          <div class="col-sm-11">
                              <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $row['fullname']; ?>" readonly>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-4">
                      <div class="form-group">
                          <label for="age" class="col-sm-4 control-label" style="font-size: 16px">Age</label>
                          <div class="col-sm-11">
                              <input type="age" class="form-control" id="age" name="age" value="<?php echo $row['age']; ?>" readonly>
                          </div>
                      </div>
                  </div>
              </div>
            
              <div class="row">
                  <div class="col-sm-2">
                    <br>
                      <div class="form-group">
                          <label for="date" class="col-sm-12 control-label" style="font-size: 16px">Date</label>
                          <div class="col-sm-12">
                              <input type="date" class="form-control" id="date" name="date" value="<?php echo $row['date']; ?>" readonly>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-2">
                    <br>
                      <div class="form-group">
                          <label for="time" class="col-sm-12 control-label" style="font-size: 16px">Time</label>
                          <div class="col-sm-12">
                              <input type="time" class="form-control" id="time" name="time" value="<?php echo $row['time']; ?>" readonly>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-2">
                    <br>
                      <div class="form-group">
                          <label for="bp" class="col-sm-12 control-label" style="font-size: 16px">BP</label>
                          <div class="col-sm-12">
                              <input type="bp" class="form-control" id="bp" name="bp" value="<?php echo $row['bp']; ?>" readonly>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-2">
                    <br>
                      <div class="form-group">
                          <label for="t" class="col-sm-12 control-label" style="font-size: 16px">T</label>
                          <div class="col-sm-12">
                              <input type="t" class="form-control" id="t" name="t" value="<?php echo $row['t']; ?>" readonly>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-2">
                    <br>
                      <div class="form-group">
                          <label for="p" class="col-sm-12 control-label" style="font-size: 16px">P</label>
                          <div class="col-sm-12">
                              <input type="p" class="form-control" id="p" name="p" value="<?php echo $row['p']; ?>" readonly>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-2">
                    <br>
                      <div class="form-group">
                          <label for="r" class="col-sm-12 control-label" style="font-size: 16px">R</label>
                          <div class="col-sm-12">
                              <input type="r" class="form-control" id="r" name="r" value="<?php echo $row['r']; ?>" readonly>
                          </div>
                      </div>
                  </div>
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

