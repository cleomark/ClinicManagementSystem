<?php
    session_start();
    include '../../db.php';

    if (!isset($_SESSION['admin_id'])){
        echo '<script>window.alert("PLEASE LOGIN FIRST!!")</script>';
        echo '<script>window.location.replace("../login.php");</script>';
        exit; // Exit the script to prevent further execution
    }

  
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>View Health Profile Record</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <link rel="shortcut icon" href="assets/images/dwcl.png"> 
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">
	<link rel="stylesheet" href="assets/style.css">
	<link rel="stylesheet" href="assets/formstyles.css">

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
					        <h1 class="app-page-title mb-0">Fill-up Health Record Form</h1>
					    </div>
						
				    </div>
			    </div>
			    
                <div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
					        <div class="col-12 col-lg-auto text-center text-lg-start">
						        <h4 class="notification-title mb-1">Please fill-up honestly.</h4>
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

                    <?php  	
    $healthshs_id = $_GET['healthshs_id'];
    $sql = "SELECT * FROM healthrecordformshs WHERE healthshs_id='$healthshs_id'";

    $result = mysqli_query($conn, $sql);

    while($row = $result->fetch_assoc()){
        $healthshs_id = $row['healthshs_id'];
    ?>


					<p class="title_">Personal Information</p>
					
					<form class="form-horizontal mt-4" action="function/editrecord.php" method="POST" enctype="multipart/form-data">
                    <div class="align_form">
								<div class="input_form">
								<div class="input_wrap">
							<label></label>
							<div class="image_container">
							<br>
								<img src="<?php echo "/CAPSTONE1/upload_image/".$row['image'];?>">
                                <input type="file" name="image" id="image">
							</div>
						</div>
            <div class="input_wrap">
                <label for="gradelevel">Grade Level</label>
                <input id="gradelevel" name="gradelevel" type="text" value="<?=$row['gradelevel'];?>">
            </div>
            <div class="input_wrap">
                <label for="fullname">Full Name</label>
                <input id="fullname" name="fullname" type="text" value="<?=$row['fullname'];?>" >
            </div>
            <div class="input_wrap">
    <label for="fullname">Role</label>
    <select class="form-select" name="role">
        <option value="" <?php if(empty($row['role'])) echo "selected"; ?>>Select Role</option>
        <option value="Student in SHS" <?php if($row['role'] == "Student in SHS") echo "selected"; ?>>Student in GS/JHS</option>
        <option value="Employee in SHS" <?php if($row['role'] == "Employee in SHS") echo "selected"; ?>>Employee in GS/JHS</option>
    </select>
</div>
       
                            </div>
                            </div><br><br>
        <div class="input_form">
            <div class="input_wrap">
                <label for="fullname">ID Number</label>
                <input name="idnumber" type="text" value="<?=$row['idnumber'];?>">
            </div>
            <div class="input_wrap">
                <label for="fullname">Age</label>
                <input name="age" type="text" value="<?=$row['age'];?>">
            </div>
            <div class="input_wrap">
                <label for="fullname">Personal Contact No</label>
                <input name="pcontact" type="text" value="<?=$row['pcontact'];?>">
            </div>
            <div class="input_wrap">
                <label for="fullname">Gender</label>
                <select class="form-select" name="gender">
                    <option value="" <?php if(empty($row['gender'])) echo "selected"; ?>>Select Gender</option>
                    <option value="Female" <?php if($row['gender'] == "Female") echo "selected"; ?>>Female</option>
                    <option value="Male" <?php if($row['gender'] == "Male") echo "selected"; ?>>Male</option>
                </select>
            </div>
         </div>
   
          <div class="input_form">
            <div class="input_wrap">
                <label for="fullname">Home Address</label>
                <input name="address" id ="address" type="text" value="<?=$row['address'];?>">
            </div>
     </div>
                            
     <div class="input_form">
            <div class="input_wrap">
                <label for="fullname">Temporary Address</label>
                <input name="paddress" id="paddress" type="text" value="<?=$row['paddress'];?>">
            </div>
         </div>
    <div class="input_form">
        <div class="input_wrap">
            <label for="fullname">Father</label>
            <input name="father" id="father" type="text" value="<?=$row['father'];?>">
        </div>

        <div class="input_wrap">
            <label for="fullname">Contact</label>
            <input name="cfather" id="cfather" type="text" value="<?=$row['cfather'];?>">
        </div>
    </div>

    <div class="input_form">
        <div class="input_wrap">
            <label for="fullname">Mother</label>
            <input name="mother" id="mother" type="text">
        </div>

        <div class="input_wrap">
            <label for="fullname">Contact</label>
            <input name="cmother" id="cmother" type="text">
        </div>
    </div>
<br>
    <p>Please select box if you have/had any of the following illnesses:</p>
   <div class="input_form">
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="polio" value="polio" type="checkbox" id="polio">
        <label class="labels" for="polio" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Polio</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="tetanus" value="tetanus" type="checkbox" id="tetanus">
        <label class="labels" for="tetanus" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tetanus</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="chickenpox" value="chickenpox" type="checkbox" id="chickenpox">
        <label class="labels" for="chickenpox" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chicken Pox</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="measles" value="measles" type="checkbox" id="measles">
        <label class="labels" for="measles" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Measles</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="input_form">
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="mumps" value="mumps" type="checkbox" id="mumps">
        <label class="labels" for="mumps" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mumps</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="tb" value="tb" type="checkbox" id="tb">
        <label class="labels" for="tb" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pulmonary Tuberculosis</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="asthma" value="asthma" type="checkbox" id="asthma">
        <label class="labels" for="asthma" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Asthma</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="hepatitis" value="hepatitis" type="checkbox" id="hepatitis">
        <label class="labels" for="hepatitis" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hepatitis</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="input_form">
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="faintingspells" value="faintingspells" type="checkbox" id="faintingspells">
        <label class="labels" for="faintingspells" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fainting Spells</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="seizure" value="seizure" type="checkbox" id="seizure">
        <label class="labels" for="seizure" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seizure/Epilepsy</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="bleeding" value="bleeding" type="checkbox" id="bleeding">
        <label class="labels" for="bleeding" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bleeding Tendencies</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="eyedis" value="eyedis" type="checkbox" id="eyedis">
        <label class="labels" for="eyedis" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Eye Disorder</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="input_wrap">
                <label for="fullname">Heart Ailment (please specify)</label>
                <input name="heartailment" id ="heartailment" type="text" placeholder="Please Specify">
            </div>
            <div class="input_wrap">
                <label for="fullname">Other Illness (please specify)</label>
                <input name="otherillness" id ="otherillness" type="text" placeholder="Please Specify">
            </div>
        <br>
            <p>Do you have any allergy to:</p>
   <div class="input_form">
    </div>
    <div class="row-container">
    <p><b>Food:</b></p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <div class="checkbox">
    <input name="yesfood" value="yesfood" type="checkbox" id="yesfood">
    <label class="labels" for="yesfood" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">
    <input name="nofood" value="nofood" type="checkbox" id="nofood">
    <label class="labels" for="nofood" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
    <input name="food" id="otherillnesss" type="text" placeholder="If YES, please specify">
  </div>
</div>

<div class="input_form">
    </div>
    <div class="row-container">
    <p><b>Medicine:</b></p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <div class="checkbox">
    <input name="yesmed" value="yesmed" type="checkbox" id="yesmed">
    <label class="labels" for="yesme" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">
    <input name="nomed" value="nomed" type="checkbox" id="nomed">
    <label class="labels" for="nomed" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
    <input name="med" id="otherillnesss" type="text" placeholder="If YES, please specify">
  </div>
</div>

<div class="input_form"> 
  <div class="input_wrap">
    <label for="fullname" id="language">Would you allow your child to be given medicine (as needed) while here in the school?</label>
  </div>
                            </div>
  <div class="input_form">
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="allow" value="allow" type="checkbox" id="allow">
        <label class="labels" for="allow" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="notallow" value="notallow" type="checkbox" id="notallow">
        <label class="labels" for="notallow" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
    </div>
   <div class="input_form"> 
            <div class="input_wrap">
                <label for="fullname">Is your child taking any medications at present? If YES, please list the name of the medicine/s:</label>
                <input name="medpresent" id ="language" type="text">
            </div>
   </div>

   <div class="input_form"> 
            <div class="input_wrap">
                <label for="fullname" >Person to be notified in case of emergency:</label>
                <input name="notified" id ="languages" type="text">
            </div>
            <div class="input_wrap">
                <label for="fullname">Contact Number</label>
                <input name="contact" id ="languagess" type="text">
            </div>
            <div class="input_wrap">
                <label for="fullname">Relationship</label>
                <input name="relationship" id ="relationship" type="text">
            </div>
            </div>
                            <input type="hidden" id ="language" name="hidden" value="<?=$row['user_id'];?>">
                            <input type="hidden" name="healthshs_id" value="<?php echo $healthshs_id; ?>">
                    <input type="submit" name="update_recordshs" value="Update">


</form>

<?php

    }
?>

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


