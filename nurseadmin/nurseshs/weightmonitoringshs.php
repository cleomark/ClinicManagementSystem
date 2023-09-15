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
            header('location: ../../login.php');
            exit; // Exit the script to prevent further execution
        }
    }

?>


<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Nurse Dashboard</title>
    
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
    
    <style> 

    .btn-submit { 
    background-color: #2E37A4!important;
    color: #fff!important;
    padding: 6px 12px!important;
    font-size: 14px!important;

    }

    .btn-submit:hover { 
    background-color: #28308f!important;
    color: #fff!important;
   
    }
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
					    <div class="col-auto">
					        <h1 class="app-page-title mb-0"></h1>
					    </div>
						
				    </div>
			    </div>
			    
                <div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
					        <div class="col-12 col-lg-auto text-center text-lg-start">
						        <h4 class="notification-title mb-1">
                                    Weight Monitoring Sheet
                                </h4>
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
                    <form class="form-horizontal mt-4" method="post" action="function/shsrecords.php">

<div class="row">
                  <div class="col-sm-3">
                      <div class="form-group">
                          <label for="idnumber" class="col-sm-7 control-label" style="font-size: 16px">ID Number</label>
                          <div class="col-sm-11">
                              <input type="text" class="form-control" id="idnumber" name="idnumber" placeholder="Enter patient ID number" required>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-3">
                      <div class="form-group">
                          <label for="fullname" class="col-sm-4 control-label" style="font-size: 16px">Name</label>
                          <div class="col-sm-11">
                              <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter Name"required>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-3">
                      <div class="form-group">
                          <label for="age" class="col-sm-4 control-label" style="font-size: 16px">Age</label>
                          <div class="col-sm-11">
                              <input type="age" class="form-control" id="age" name="age" placeholder="Enter age" required>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-3">
                      <div class="form-group">
                          <label for="gradesection" class="col-sm-10 control-label" style="font-size: 16px">Employee/Grade & Section</label>
                          <div class="col-sm-11">
                              <input type="text" class="form-control" id="gradesection" name="gradesection" placeholder="Enter Grade & Section" required>
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
                              <input type="text" class="form-control" id="weight" name="weight" placeholder="Enter weight" required>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-8">
                    <br>
                      <div class="form-group">
                          <label for="remarks" class="col-sm-4 control-label" style="font-size: 16px">Remarks</label>
                          <div class="col-sm-15">
                              <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Enter remarks" required>
                          </div>
                      </div>
                  </div>
              </div>
              

<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
    <br>
    <input type="text" name="admin_id" style="display: none;" value="<?= $_SESSION['admin_id'];?>">
    <button name="submit_weightmonitor" class="btn btn-submit">Submit</button>
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

