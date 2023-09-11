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
    <link rel="stylesheet" href="assets/formstyle.css">

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
						        <h4 class="notification-title mb-1">Physician's Order Sheet and Progress Notes (Grade School and Junior High School)</h4>
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
                   
                   <form class="form-horizontal mt-4" method="post" action="function/physicianrecordsgsjhsshs.php">
                  
                   <div class="row">
  <div class="col-sm-4">
    <div class="form-group">
      <label for="datetime" class="col-sm-12 control-label">Date & Time</label>
      <input type="datetime-local" class="form-control" id="datetime" name="datetime" required>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="form-group">
      <label for="progressnotes" class="col-sm-12 control-label">Progress Notes</label>
      <textarea class="form-control" id="progressnotes" name="progressnotes" placeholder="Enter Progress Notes" required></textarea>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="form-group">
      <label for="doctorsorder" class="col-sm-12 control-label">Doctor's Order</label>
      <textarea class="form-control" id="doctorsorder" name="doctorsorder"></textarea>
    </div>
  </div>
</div>
<br><br>
<div class="row">
  <div class="col-sm-3">
    <label for="idnumber" class="col-sm-6 control-label">ID Number</label>
  </div>
  <div class="col-sm-3" style="margin-left:-150px">
    <input type="text" id="idnumber" name="idnumber" class="form-control" required>
  </div>
</div>
<br>
<div class="row">
  <div class="col-sm-3">
    <label for="fullname" class="col-sm-6 control-label">Fullname</label>
  </div>
  <div class="col-sm-5" style="margin-left:-150px">
    <input type="text" id="fullname" name="fullname" class="form-control" required>
  </div>
</div>
<br>
<div class="row">
  <div class="col-sm-3">
    <label for="age" class="col-sm-6 control-label">Age</label>
  </div>
  <div class="col-sm-1" style="margin-left:-150px">
    <input type="text" id="age" name="age" class="form-control" required>
  </div>
  <div class="col-sm-3">
    <label for="levelsection" class="col-sm-6 control-label">Level/Section</label>
  </div>
  <div class="col-sm-3" style="margin-left:-150px">
    <input type="text" id="levelsection" name="levelsection" class="form-control" required>
  </div>
</div>


    <br>

                     <div class="row">
                       <div class="col-sm-12">
                       <input type="text" name="admin_id" style="display: none;" value="<?= $_SESSION['admin_id'];?>">
                         <button name="submit_pysicianordergsjhs" class="btn btn-success">Add Physical Examination</button>
                       </div>
                     </div>
                   </form>
                   
                 </div><!--//app-card-body-->
                 <center>
                   
                     <table class="styled-table">
                         <thead>
                             <tr>
                                 <th>ID Number</th>
                                 <th>Name</th>
                                 <th>Age</th>
                                 <th>Level/Section</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody id="healthRecordTableBody">
                             <?php
                             $sql = "SELECT * FROM physicianorderprogressgsjhs WHERE admin_id = '$admin_id'";
                             $result = mysqli_query($conn, $sql);
                             
                             while ($row = $result->fetch_assoc()) {
                                 ?>
                                 <tr>
                                     <td><?php echo $row['idnumber']; ?></td>
                                     <td><?php echo $row['fullname']; ?></td>
                                     <td><?php echo $row['age']; ?></td>
                                     <td><?php echo $row['levelsection']; ?></td>
                                     <td>
                                        <a href="viewphysicianordergsjhs.php?datetime=<?php echo $row['datetime']; ?>">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-view-list" viewBox="0 0 16 16">
                                            <path d="M3 4.5h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1H3zM1 2a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 2zm0 12a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 14z"/>
                                          </svg>
                                        </a>
          </td>
                                 </tr>
                             <?php } ?>
                         </tbody>
                     </table>
                     <br>
                 </center>



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

