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
    <title>Physical Examination Record</title>
    
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
                   
                   <form class="form-horizontal mt-4" method="post" action="function/physicianrecordsgsjhsshs.php">
                  
                   <div class="row">
  <div class="col-sm-3">
    <div class="form-group">
      <label for="idnumber" class="col-sm-12 control-label">Patient ID Number</label>
      <input type="text" class="form-control" id="idnumber" name="idnumber" placeholder="Enter patient ID number" required>
    </div>
  </div>
  <div class="col-sm-5">
    <div class="form-group">
      <label for="fullname" class="col-sm-12 control-label">Name</label>
      <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Last Name, First Name, MI" required>
    </div>
  </div>
  <div class="col-sm-2">
    <div class="form-group">
      <label for="age" class="col-sm-12 control-label">Age</label>
      <input type="text" class="form-control" id="age" name="age">
    </div>
  </div>
</div>
<br>
<div class="row">
  <div class="col-sm-5">
  <div class="form-group">
                           <label for="gradesection" class="col-sm-12 control-label">Grade & Section</label>
                           <input type="text" id="gradesection" name="gradesection" class="form-control" required>
                         </div>
                       </div>
     <div class="col-sm-5">
  <div class="form-group">
     <label for="fullname">Sex</label>
         <select class="form-select" name="sex">
                    <option value="" disabled selected>Select Sex</option>
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                </select>
    </div>
  </div>
                  </div>
    <br>

   <b><i> <p>Significant Medical History:</b></i></p>

   <div class="row">
  <div class="col-sm-9">
                         <div class="form-group">
                           <label for="pastsurgeries" class="col-sm-12 control-label">Past Illnesses/Surgeries</label>
                           <input type="text" id="pastsurgeries" name="pastsurgeries" class="form-control" required>
                         </div>
                       </div>
                  </div>
   <br> 
<div class="row">
  <div class="col-sm-9">
                         <div class="form-group">
                           <label for="allergies" class="col-sm-12 control-label">Allergies</label>
                           <input type="text" id="allergies" name="allergies" class="form-control" required>
                         </div>
                       </div>
                  </div>
    
                  <br> 
<div class="row">
  <div class="col-sm-9">
                         <div class="form-group">
                           <label for="familyhistory" class="col-sm-12 control-label">Family History</label>
                           <input type="text" id="familyhistory" name="familyhistory" class="form-control" required>
                         </div>
                       </div>
                  </div>

<br>
   <b><i> <p>Physical Examination:</b></i></p>

   <div class="row">
    <div class="col-sm-3">
        <div class="form-group">
            <label for="bp" class="col-sm-10 control-label" style="font-size: 16px">BP</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="bp" name="bp" required>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label for="pr" class="col-sm-10 control-label" style="font-size: 16px">PR</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="pr" name="pr" required>
            </div>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            <label for="height" class="col-sm-10 control-label" style="font-size: 16px">Height</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="height" name="height" required>
            </div>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            <label for="weight" class="col-sm-10 control-label" style="font-size: 16px">Weight</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="weight" name="weight" required>
            </div>
        </div>
    </div>
</div>

<br>
   <b><i> <p>General Appearance:</b></i></p>

   <div class="row">
  <div class="col-sm-9">
                         <div class="form-group">
                           <label for="heent" class="col-sm-12 control-label">HEENT</label>
                           <input type="text" id="heent" name="heent" class="form-control" required>
                         </div>
                       </div>
                  </div>
   <br> 
<div class="row">
  <div class="col-sm-9">
                         <div class="form-group">
                           <label for="cvs" class="col-sm-12 control-label">CVS</label>
                           <input type="text" id="cvs" name="cvs" class="form-control" required>
                         </div>
                       </div>
                  </div>
    
                  <br> 
<div class="row">
  <div class="col-sm-9">
                         <div class="form-group">
                           <label for="gis" class="col-sm-12 control-label">GIS</label>
                           <input type="text" id="gis" name="gis" class="form-control" required>
                         </div>
                       </div>
                  </div>

                  <br> 
<div class="row">
  <div class="col-sm-9">
                         <div class="form-group">
                           <label for="gus" class="col-sm-12 control-label">GUS</label>
                           <input type="text" id="gus" name="gus" class="form-control" required>
                         </div>
                       </div>
                  </div>

                  <br> 
<div class="row">
  <div class="col-sm-9">
                         <div class="form-group">
                           <label for="skin" class="col-sm-12 control-label">Skin</label>
                           <input type="text" id="skin" name="skin" class="form-control" required>
                         </div>
                       </div>
                  </div>
                  <br>
                  <div class="row">
  <div class="col-sm-9">
                         <div class="form-group">
                           <label for="musculoskeletal" class="col-sm-12 control-label">Musculoskeletal</label>
                           <input type="text" id="musculoskeletal" name="musculoskeletal" class="form-control" required>
                         </div>
                       </div>
                  </div>
                  <br>
<div class="row">
  <div class="col-sm-9">
                         <div class="form-group">
                           <label for="remarks" class="col-sm-12 control-label"><b>Remarks</b></label>
                           <input type="text" id="remarks" name="remarks" class="form-control" required>
                         </div>
                       </div>
                  </div>

                  <br><br>
<div class="row">
  <div class="col-sm-5">
                         <div class="form-group">
                           <label for="medicalexaminer" class="col-sm-12 control-label">Medical Examiner</label>
                           <input type="text" id="medicalexaminer" name="medicalexaminer" class="form-control" required>
                         </div>
                       </div>
 <div class="col-sm-5">
                         <div class="form-group">
                           <label for="dateexamined" class="col-sm-12 control-label">Date Examined</label>
                           <input type="date" id="dateexamined" name="dateexamined" class="form-control" required>
                         </div>
                       </div>
                  </div>



                  <br>
                     <div class="row">
                       <div class="col-sm-12">
                       <input type="text" name="admin_id" style="display: none;" value="<?= $_SESSION['admin_id'];?>">
                         <button name="submit_physicalshs" class="btn btn-success">Add Physical Examination</button>
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
                                 <th>Grade & Section</th>
                                 <th>Sex</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody id="healthRecordTableBody">
                             <?php
                             $sql = "SELECT * FROM physicalexaminationshs WHERE admin_id = '$admin_id'";
                             $result = mysqli_query($conn, $sql);
                             
                             while ($row = $result->fetch_assoc()) {
                                 ?>
                                 <tr>
                                     <td><?php echo $row['idnumber']; ?></td>
                                     <td><?php echo $row['fullname']; ?></td>
                                     <td><?php echo $row['age']; ?></td>
                                     <td><?php echo $row['gradesection']; ?></td>
                                     <td><?php echo $row['sex']; ?></td>
                                     <td>
                                        <center><a href="viewphysicalexamniationshs.php?idnumber=<?php echo $row['idnumber']; ?>">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-view-list" viewBox="0 0 16 16">
                                            <path d="M3 4.5h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1H3zM1 2a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 2zm0 12a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 14z"/>
                                          </svg>
                                        </a></center>
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

