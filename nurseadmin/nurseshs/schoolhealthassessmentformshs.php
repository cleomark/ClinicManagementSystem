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
        if($_SESSION['role'] == 2){
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
    <title>School Health Assessment Form</title>
    
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
	<link rel="stylesheet" href="assets/table.css">
    
    

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
					    <div class="col-auto">
					        <h1 class="app-page-title mb-0"></h1>
					    </div>


						
				    </div>
			    </div>
			    
                <div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
					        <div class="col-12 col-lg-auto text-center text-lg-start">
						        <h4 class="notification-title mb-1">School Health Assessment Form</h4>
					        </div>
                            <?php
								if(isset($_SESSION['success'])){
									echo $_SESSION['success'];
									unset($_SESSION['success']);
								}
							?>
							<!--//generate report-->
				        </div><!--//row-->
				    </div><!--//app-card-header-->
				    <div class="app-card-body p-4">
                     <form class="form-horizontal mt-4" method="post" action="function/shsrecords.php">
                    
                    <div class="row">
                      
    <div class="col-sm-6">
        <div class="form-group">
            <label for="idnumber" class="col-sm-4 control-label" style="font-size: 16px">Enter the ID Number</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="idnumber" name="idnumber" placeholder="Enter patient ID number" required>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="patient_name" class="col-sm-4 control-label" style="font-size: 16px">Enter the Fullname</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter the Fullname" required>
            </div>
        </div>
    </div>
</div>

<br>

<div class="row">
<div class="col-sm-6">
        <div class="form-group">
            <label for="birthday" class="col-sm-4 control-label" style="font-size: 16px">Birthday</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="birthday" name="birthday" placeholder="Birthday" required>
            </div>
        </div>
    </div>
 

    <div class="col-sm-6">
    <div class="form-group">
        <label for="gender" class="col-sm-4 control-label" style="font-size: 16px">Gender</label>
        <div class="col-sm-10">
            <select class="form-control" id="gender" name="gender" required>
                <option value="">--Select Gender--</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
    </div>
</div>

<p><b><br>A. PHYSICAL EXAMINATION</p></b>
<div class="row">

<div class="col-md-2">
      <div class="form-group">
        <label for="date">Date</label>
        <input type="date" class="form-control" id="date" name="date" required>
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label for="weight">Weight</label>
        <input type="text" class="form-control" id="weight" name="weight" required>
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label for="height">Height (in cm)</label>
        <input type="text" class="form-control" id="height" name="height" required>
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label for="bmi">BMI</label>
        <input type="text" class="form-control" id="bmi" name="bmi" required>
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label for="pr">Pulse Rate</label>
        <input type="text" class="form-control" id="pr" name="pr" required>
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label for="bp">Blood Pressure</label>
        <input type="text" class="form-control" id="bp" name="bp" required>
      </div>
    </div>


  <div class="row">

  <div class="col-md-2">
    <br>
      <div class="form-group">
        <label for="scalp">Scalp</label>
        <input type="text" class="form-control" id="scalp" name="scalp" required>
      </div>
   </div>

    <div class="col-md-2">
    <br>
      <div class="form-group">
        <label for="skin_nails">Skin & Nails</label>
        <input type="text" class="form-control" id="skin_nails" name="skin_nails" required>
      </div>
    </div>

    <div class="col-md-2">
        <br>
      <div class="form-group">
        <label for="eyes">Eyes</label>
        <input type="text" class="form-control" id="eyes" name="eyes" required>
      </div>
    </div>

    <div class="col-md-2">
        <br>
      <div class="form-group">
        <label for="visual_acuity">Visual Acuity</label>
        <input type="text" class="form-control" id="visual_acuity" name="visual_acuity" required>
      </div>
    </div>

    <div class="col-md-2">
        <br>
      <div class="form-group">
        <label for="ears">Ears</label>
        <input type="text" class="form-control" id="ears" name="ears" required>
      </div>
    </div>

    <div class="col-md-2">
        <br>
      <div class="form-group">
        <label for="hearing_test">Hearing Test</label>
        <input type="text" class="form-control" id="hearing_test" name="hearing_test" required>
      </div>
    </div>
  </div>

  <div class="row">

  <div class="col-md-2">
        <br>
      <div class="form-group">
        <label for="nose">Nose</label>
        <input type="text" class="form-control" id="nose" name="nose" required>
      </div>
    </div>

    <div class="col-md-2">
    <br>
      <div class="form-group">
        <label for="throat">Throat</label>
        <input type="text" class="form-control" id="throat" name="throat" required>
      </div>
    </div>

    <div class="col-md-2">
        <br>
      <div class="form-group">
        <label for="mouth_tongue">Mouth & Tongue</label>
        <input type="text" class="form-control" id="mouth_tongue" name="mouth_tongue" required>
      </div>
    </div>

    <div class="col-md-2">
        <br>
      <div class="form-group">
        <label for="teeth_gums">Teeth & Gums</label>
        <input type="text" class="form-control" id="teeth_gums" name="teeth_gums" required>
      </div>
    </div>

    <div class="col-md-2">
        <br>
      <div class="form-group">
        <label for="chest_breasts">Chest & Breasts</label>
        <input type="text" class="form-control" id="chest_breasts" name="chest_breasts" required>
      </div>
    </div>

    <div class="col-md-2">
        <br>
      <div class="form-group">
        <label for="heart">Heart</label>
        <input type="text" class="form-control" id="heart" name="heart" required>
      </div>
    </div>
  </div>

  <div class="row">

  <div class="col-md-2">
        <br>
      <div class="form-group">
        <label for="lungs">Lungs</label>
        <input type="text" class="form-control" id="lungs" name="lungs" required>
      </div>
    </div>

    <div class="col-md-2">
    <br>
      <div class="form-group">
        <label for="abdomen">Abdomen</label>
        <input type="text" class="form-control" id="abdomen" name="abdomen" required>
      </div>
    </div>

    <div class="col-md-2">
        <br>
      <div class="form-group">
        <label for="genitalia">Genitalia</label>
        <input type="text" class="form-control" id="genitalia" name="genitalia" required>
      </div>
    </div>

    <div class="col-md-2">
        <br>
      <div class="form-group">
        <label for="spine_extremities">Spine & Extremities</label>
        <input type="text" class="form-control" id="spine_extremities" name="spine_extremities" required>
      </div>
    </div>

    <div class="col-md-4">
        <br>
      <div class="form-group">
        <label for="sexual">Sexual Maturity Rating</label>
        <input type="text" class="form-control" id="sexual" name="sexual" required>
      </div>
    </div>

    <div class="col-md-4">
        <br>
      <div class="form-group">
        <label for="screening">Screening, Risk Taking Behavior</label>
        <input type="text" class="form-control" id="screening" name="screening" required>
      </div>
    </div>

    <div class="col-md-4">
        <br>
      <div class="form-group">
        <label for="otherfindings">Other Findings</label>
        <input type="text" class="form-control" id="otherfindings" name="otherfindings">
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-10">
    <br>
      <div class="form-group">
        <label for="remarks">Remarks</label>
        <input type="text" class="form-control" id="remarks" name="remarks" required>
      </div>
    </div>
  </div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <br>
        <input type="text" name="admin_id" style="display: none;" value="<?= $_SESSION['admin_id'];?>">
        <button name="submit_schoolhealthassesform" class="btn btn-success">Submit</button>
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

