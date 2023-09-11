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
        if($_SESSION['role'] == 6){
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
    <title>Physician's Order Sheet and Progress Notes</title>
    
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
$datetime = $_GET['datetime'];

// Retrieve the health record for the given ID number
$sql = "SELECT * FROM physicianorderprogressshs WHERE datetime = '$datetime'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = $result->fetch_assoc(); 
    $datetime = $row['datetime'];
    $progressnotes = $row['progressnotes'];
    $doctorsorder = $row['doctorsorder'];
    $idnumber = $row['idnumber'];
    $fullname = $row['fullname'];
    $age= $row['age'];
    $grade = $row['grade'];
  
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
						        <h4 class="notification-title mb-1">Physical Examination Record</h4>
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
                   
             
<div class="row">
  <div class="col-sm-4">
    <div class="form-group">
      <label for="datetime" class="col-sm-12 control-label">Date & Time</label>
      <input type="datetime-local" class="form-control" id="datetime" name="datetime" value="<?= date('Y-m-d\TH:i', strtotime($datetime)); ?>" readonly>

    </div>
  </div>
  <div class="col-sm-4">
    <div class="form-group">
      <label for="progressnotes" class="col-sm-12 control-label">Progress Notes</label>
      <textarea class="form-control" id="progressnotes" name="progressnotes" readonly><?php echo $row['progressnotes']; ?></textarea>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="form-group">
      <label for="doctorsorder" class="col-sm-12 control-label">Doctor's Order</label>
      <textarea class="form-control" id="doctorsorder" name="doctorsorder" readonly><?php echo $row['doctorsorder']; ?></textarea>
    </div>
  </div>
</div>
<br><br>
<div class="row">
  <div class="col-sm-3">
    <label for="idnumber" class="col-sm-6 control-label">ID Number</label>
  </div>
  <div class="col-sm-3" style="margin-left:-150px">
    <input type="text" id="idnumber" name="idnumber" class="form-control" value="<?=$row['idnumber'];?>" readonly>
  </div>
</div>
<br>
<div class="row">
  <div class="col-sm-3">
    <label for="fullname" class="col-sm-6 control-label">Fullname</label>
  </div>
  <div class="col-sm-5" style="margin-left:-150px">
    <input type="text" id="fullname" name="fullname" class="form-control"  value="<?=$row['fullname'];?>" readonly>
  </div>
</div>
<br>
<div class="row">
  <div class="col-sm-3">
    <label for="age" class="col-sm-6 control-label">Age</label>
  </div>
  <div class="col-sm-1" style="margin-left:-150px">
    <input type="text" id="age" name="age" class="form-control"  value="<?=$row['age'];?>" readonly>
  </div>
  <div class="col-sm-3">
    <label for="grade" class="col-sm-6 control-label">Grade</label>
  </div>
  <div class="col-sm-2" style="margin-left:-200px">
                <select class="form-select" name="grade">
                <option disabled selected><?= $row['grade'];?></option>
                </select>
  </div>
</div>




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

