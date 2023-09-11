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
    <title>Nurse's Notes</title>
    
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
						        <h4 class="notification-title mb-1">Nurse's Notes</h4>
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
                      <div class="col-sm-4">
                          <div class="form-group">
                              <label for="idnumber" class="col-sm-4 control-label" style="font-size: 16px">ID Number</label>
                              <div class="col-sm-11">
                                  <input type="text" class="form-control" id="idnumber" name="idnumber" placeholder="Enter patient ID number" required>
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-4">
                          <div class="form-group">
                              <label for="fullname" class="col-sm-4 control-label" style="font-size: 16px">Name</label>
                              <div class="col-sm-11">
                                  <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter Name"required>
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-4">
                          <div class="form-group">
                              <label for="gradesection" class="col-sm-6 control-label" style="font-size: 16px">Grade & Section</label>
                              <div class="col-sm-11">
                                  <input type="text" class="form-control" id="gradesection" name="gradesection" required>
                              </div>
                          </div>
                      </div>
                  </div>
                  
     <div class="row">
                      <div class="col-sm-4">
                          <div class="form-group">
                            <br>
                              <label for="datetime" class="col-sm-8 control-label" style="font-size: 16px">Date/Time</label>
                              <div class="col-sm-11">
                                  <input type="datetime-local" class="form-control" id="datetime" name="datetime" required>
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-4">
                          <div class="form-group">
                            <br>
                              <label for="vitalsigns" class="col-sm-8 control-label" style="font-size: 16px">Vital Signs</label>
                              <div class="col-sm-11">
                                  <input type="text" class="form-control" id="vitalsigns" name="vitalsigns" placeholder="Enter Vital Signs" required>
                              </div>
                          </div>
                      </div>
                </div>
         <div class="row">
                      <div class="col-sm-17">
                          <div class="form-group">
                            <br>
                              <label for="nursenotes" class="col-sm-8 control-label" style="font-size: 16px">Nurse's Notes</label>
                              <div class="col-sm-11">
                                  <textarea class="form-control" id="nursenotes" name="nursenotes" required></textarea>
                              </div>
                          </div>
                      </div> 
                </div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <br>
        <input type="text" name="admin_id" style="display: none;" value="<?= $_SESSION['admin_id'];?>">
        <button name="submit_nursenotes" class="btn btn-success">Submit</button>
    </div>
</div>
</form>

<center>
                   
                   <table class="styled-table">
                       <thead>
                           <tr>
                               <th>ID Number</th>
                               <th>Name</th>
                               <th>Grade & Section</th>
                               <th>Date & Time</th>
                               <th>Vital Signs</th>
                               <th>Nurse's Notes</th>
                           </tr>
                       </thead>
                       <tbody id="healthRecordTableBody">
                           <?php
                           $sql = "SELECT * FROM nursenotesshs WHERE admin_id = '$admin_id'";
                           $result = mysqli_query($conn, $sql);
                           
                           while ($row = $result->fetch_assoc()) {
                               ?>
                               <tr>
                                   <td><?php echo $row['idnumber']; ?></td>
                                   <td><?php echo $row['fullname']; ?></td>
                                   <td><?php echo $row['gradesection']; ?></td>
                                   <td><?php echo $row['datetime']; ?></td>
                                   <td><?php echo $row['vitalsigns']; ?></td>
                                   <td><?php echo $row['nursenotes']; ?></td>
            
                               </tr>
                           <?php } ?>
                       </tbody>
                   </table>
                   <br>
               </center>

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

