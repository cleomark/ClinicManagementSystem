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
					
					<form class="form-horizontal mt-4" action="function/editrecordshs.php" method="POST" enctype="multipart/form-data">
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
                <label for="fullname">Full Name</label>
                <input id="fullname" name="fullname" type="text" value="<?=$row['fullname'];?>" >
            </div>
            <div class="input_wrap">
                <label for="fullname">ID Number</label>
                <input name="idnumber" type="text" value="<?=$row['idnumber'];?>">
            </div>
            <div class="input_wrap">
                <label for="fullname">Birthday</label>
                <input name="birthday" type="text" value="<?=$row['birthday'];?>">
            </div>
        </div>
    </div>
                <br><br>
        <div class="input_form">
            <div class="input_wrap">
                <label for="fullname">Personal Contact No</label>
                <input name="phoneno" type="text" value="<?=$row['phoneno'];?>">
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
            <input name="mother" id="mother" type="text" value="<?=$row['mother'];?>">
        </div>

        <div class="input_wrap">
            <label for="fullname">Contact</label>
            <input name="cmother" id="cmother" type="text" value="<?=$row['cmother'];?>">
        </div>
    </div>
<br>
    <p>Please select box if you have/had any of the following illnesses:</p>
   <div class="input_form">
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="polio" value="polio" type="checkbox" id="polio" <?php if($row['polio']=="polio") {echo "checked";} ?>>
        <label class="labels" for="polio" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Polio</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="tetanus" value="tetanus" type="checkbox" id="tetanus" <?php if($row['tetanus']=="tetanus") {echo "checked";} ?>>
        <label class="labels" for="tetanus" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tetanus</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="chickenpox" value="chickenpox" type="checkbox" id="chickenpox" <?php if($row['chickenpox']=="chickenpox") {echo "checked";} ?>>
        <label class="labels" for="chickenpox" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chicken Pox</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="measles" value="measles" type="checkbox" id="measles" <?php if($row['measles']=="measles") {echo "checked";} ?>>
        <label class="labels" for="measles" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Measles</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="input_form">
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="mumps" value="mumps" type="checkbox" id="mumps" <?php if($row['mumps']=="mumps") {echo "checked";} ?>>
        <label class="labels" for="mumps" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mumps</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="tb" value="tb" type="checkbox" id="tb" <?php if($row['mumps']=="mumps") {echo "checked";} ?>>
        <label class="labels" for="tb" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pulmonary Tuberculosis</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="asthma" value="asthma" type="checkbox" id="asthma" <?php if($row['asthma']=="asthma") {echo "checked";} ?>>
        <label class="labels" for="asthma" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Asthma</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="hepatitis" value="hepatitis" type="checkbox" id="hepatitis" <?php if($row['hepatitis']=="hepatitis") {echo "checked";} ?>>
        <label class="labels" for="hepatitis" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hepatitis</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="input_form">
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="faintingspells" value="faintingspells" type="checkbox" id="faintingspells" <?php if($row['faintingspells']=="faintingspells") {echo "checked";} ?>>
        <label class="labels" for="faintingspells" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fainting Spells</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="seizure" value="seizure" type="checkbox" id="seizure" <?php if($row['seizure']=="seizure") {echo "checked";} ?>>
        <label class="labels" for="seizure" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seizure/Epilepsy</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="bleeding" value="bleeding" type="checkbox" id="bleeding" <?php if($row['bleeding']=="bleeding") {echo "checked";} ?>>
        <label class="labels" for="bleeding" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bleeding Tendencies</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="eyedis" value="eyedis" type="checkbox" id="eyedis" <?php if($row['eyedis']=="eyedis") {echo "checked";} ?>>
        <label class="labels" for="eyedis" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Eye Disorder</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="input_wrap">
                <label for="fullname">Heart Ailment (please specify)</label>
                <input name="heartailment" id ="heartailment" type="text" placeholder="Please Specify" value="<?=$row['heartailment'];?>">
            </div>
            <div class="input_wrap">
                <label for="fullname">Other Illness (please specify)</label>
                <input name="otherillness" id ="otherillness" type="text" placeholder="Please Specify" value="<?=$row['otherillness'];?>">
            </div>
        <br>
            <p>Do you have any allergy to:</p>
   <div class="input_form">
    </div>
    <div class="row-container">
    <p><b>Food:</b></p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <div class="checkbox">
    <input name="yesfood" value="yesfood" type="checkbox" id="yesfood" <?php if($row['yesfood']=="yesfood") {echo "checked";} ?>>
    <label class="labels" for="yesfood" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">
    <input name="nofood" value="nofood" type="checkbox" id="nofood" <?php if($row['nofood']=="nofood") {echo "checked";} ?>>
    <label class="labels" for="nofood" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
    <input name="food" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['food'];?>">
  </div>
</div>

<div class="input_form">
    </div>
    <div class="row-container">
    <p><b>Medicine:</b></p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <div class="checkbox">
  <input name="yesmed" value="yesmed" type="checkbox" id="yesmed" <?php if($row['yesmed']=="yesmed") {echo "checked";} ?>>
    <label class="labels" for="yesmed" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">
    <input name="nomed" value="nomed" type="checkbox" id="nomed" <?php if($row['nomed']=="nomed") {echo "checked";} ?>>
    <label class="labels" for="nomed" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
    <input name="med" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['med'];?>">
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
        <input name="allow" value="allow" type="checkbox" id="allow" <?php if($row['allow']=="allow") {echo "checked";} ?>>
        <label class="labels" for="allow" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="notallow" value="notallow" type="checkbox" id="notallow" <?php if($row['notallow']=="notallow") {echo "checked";} ?>>
        <label class="labels" for="notallow" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
    </div>
    <div class="input_form"> 
            <div class="input">
            <label for="fullname">Is your child taking any medications at present? If YES, please list the name of the medicine/s:</label>  <div class="row-container">
  <div class="checkbox">
  <input name="yesmedication" value="yesmedication" type="checkbox" id="yesmedication" <?php if($row['yesmedication']=="yesmedication") {echo "checked";} ?>>
    <label class="labels" for="yesmedication" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">
  <input name="nomedication" value="nomedication" type="checkbox" id="nomedication" <?php if($row['nomedication']=="nomedication") {echo "checked";} ?>>
    <label class="labels" for="nomedication" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
  <input name="medication" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['medication'];?>">
  </div>
</div>


   <div class="input_form"> 
            <div class="input_wrap">
                <label for="fullname" >Person to be notified in case of emergency:</label>
                <input name="notified" id ="relationship" type="text" value="<?=$row['notified'];?>">
            </div>
            <div class="input_wrap">
                <label for="fullname">Contact Number</label>
                <input name="contact" id ="relationship" type="text" value="<?=$row['contact'];?>">
            </div>
            <div class="input_wrap">
                <label for="fullname">Relationship</label>
                <input name="relationship" id ="relationship" type="text" value="<?=$row['relationship'];?>">
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


