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
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="assets/images/dwcl.png"> 
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">
	<link rel="stylesheet" href="assets/formstyles.css">

</head> 

<body class="app">   
    
<?php  	
$idnumber = $_GET['idnumber'];

// Retrieve the health record for the given ID number
$sql = "SELECT * FROM healthrecordformshs WHERE idnumber = '$idnumber'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = $result->fetch_assoc(); 
    $image = $row['image'];
    $fullname= $row['fullname'];
    $idnumber = $row['idnumber'];
    $phoneno = $row['phoneno'];
    $birthday = $row['birthday'];
    $gender = $row['gender'];
    $address = $row ['address'];
    $paddress = $row ['paddress'];
    $father = $row['father'];
    $cfather = $row['cfather'];
    $mother = $row['mother'];
    $cmother = $row['cmother'];
    $polio = $row['polio'];
    $tetanus = $row['tetanus'];
    $chickenpox = $row['chickenpox'];
    $measles = $row['measles'];
    $mumps = $row['mumps'];
    $tb = $row['tb'];
    $asthma = $row['asthma'];
    $hepatitis = $row['hepatitis'];
    $faintingspells = $row['faintingspells'];
    $seizure = $row['seizure'];
    $bleeding = ['bleeding'];
    $eyedis = $row['eyedis'];
    $heartailment = $row['heartailment'];
    $otherillness = $row['otherillness'];
    $yesfood =$row ['yesfood'];
    $nofood = $row['nofood'];
    $food =$row['food'];
    $yesmed = $row['yesmed'];
    $nomed = $row['nomed'];
    $med = $row['med'];
    $allow = $row['allow'];
    $notallow = $row['notallow'];
    $yesmedication =$row['yesmedication'];
    $nomedication =$row['nomedication'];
    $medication =$row['medication'];
    $notified =$row['notified'];
    $contact = $row['contact'];
    $relationship =$row['relationship'];


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
                  
                  <p class="title_">Personal Information</p>
                  <div class="app-card-body p-4">
                          <div class="align_form">
                              <div class="input_form">
                              <div class="input_wrap">
                          <label></label>
                          <div class="image_container">
                              <img src="<?php echo "/CAPSTONE1/upload_image/".$row['image'];?>">
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Your Image</label>
                          </div>
                      </div>

          <div class="input_wrap">
              <label for="fullname">Full Name</label>
              <input id="fullname" name="fullname" type="text" value="<?= $fullname; ?>" >
          </div>
          <div class="input_wrap">
              <label for="fullname">ID Number</label>
              <input name="idnumber" type="text" value="<?=$row['idnumber'];?>" readonly>
          </div>
          <div class="input_wrap">
              <label for="fullname">Birthday</label>
              <input name="birthday" type="text" value="<?=$row['birthday'];?>" readonly>
          </div>
       </div>
      </div>
<br><br>
      <div class="input_form">
          <div class="input_wrap">
              <label for="fullname">Personal Contact No</label>
              <input name="phoneno" type="text" value="<?=$row['phoneno'];?>" readonly>
          </div>
       <div class="input_wrap">
       <label for="fullname">Gender</label>
              <select class="form-select" name="gender">
              <option disabled selected><?= $row['gender'];?></option>
              </select>
          </div>
       </div>
 
        <div class="input_form">
          <div class="input_wrap">
              <label for="fullname">Home Address</label>
              <input name="address" id ="address" type="text" value="<?=$row['address'];?>" readonly>
          </div>
   </div>
                          
   <div class="input_form">
          <div class="input_wrap">
              <label for="fullname">Temporary Address</label>
              <input name="paddress" id="paddress" type="text" value="<?=$row['paddress'];?>" readonly>
          </div>
       </div>
  <div class="input_form">
      <div class="input_wrap">
          <label for="fullname">Father</label>
          <input name="father" id="father" type="text" value="<?=$row['father'];?>" readonly>
      </div>

      <div class="input_wrap">
          <label for="fullname">Contact</label>
          <input name="cfather" id="cfather" type="text" value="<?=$row['cfather'];?>" readonly>
      </div>
  </div>

  <div class="input_form">
      <div class="input_wrap">
          <label for="fullname">Mother</label>
          <input name="mother" id="mother" type="text" value="<?=$row['mother'];?>" readonly>
      </div>

      <div class="input_wrap">
          <label for="fullname">Contact</label>
          <input name="cmother" id="cmother" type="text" value="<?=$row['cmother'];?>" readonly>
      </div>
  </div>
<br>
  <p>Please select box if you have/had any of the following illnesses:</p>
 <div class="input_form">
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <div class="checkbox">
      <input name="polio" value="polio" type="checkbox" id="polio" value="<?= $row['polio'];?>" <?php if ($row['polio']) echo "checked"; ?>>
      <label class="labels" for="polio" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Polio</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <div class="checkbox">
      <input name="tetanus" value="tetanus" type="checkbox" id="tetanus" value="<?= $row['tetanus'];?>" <?php if ($row['tetanus']) echo "checked"; ?>>
      <label class="labels" for="tetanus" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tetanus</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <div class="checkbox">
      <input name="chickenpox" value="chickenpox" type="checkbox" id="chickenpox" value="<?= $row['chickenpox'];?>" <?php if ($row['chickenpox']) echo "checked"; ?>>
      <label class="labels" for="chickenpox" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chicken Pox</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <div class="checkbox">
      <input name="measles" value="measles" type="checkbox" id="measles" value="<?= $row['measles'];?>" <?php if ($row['measles']) echo "checked"; ?>>
      <label class="labels" for="measles" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Measles</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <div class="input_form">
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <div class="checkbox">
      <input name="mumps" value="mumps" type="checkbox" id="mumps" value="<?= $row['mumps'];?>" <?php if ($row['mumps']) echo "checked"; ?>>
      <label class="labels" for="mumps" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mumps</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <div class="checkbox">
      <input name="tb" value="tb" type="checkbox" id="tb" value="<?= $row['tb'];?>" <?php if ($row['tb']) echo "checked"; ?>>
      <label class="labels" for="tb" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pulmonary Tuberculosis</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <div class="checkbox">
      <input name="asthma" value="asthma" type="checkbox" id="asthma" value="<?= $row['asthma'];?>" <?php if ($row['asthma']) echo "checked"; ?>>
      <label class="labels" for="asthma" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Asthma</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <div class="checkbox">
      <input name="hepatitis" value="hepatitis" type="checkbox" id="hepatitis" value="<?= $row['hepatitis'];?>" <?php if ($row['hepatitis']) echo "checked"; ?>>
      <label class="labels" for="hepatitis" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hepatitis</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <div class="input_form">
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <div class="checkbox">
      <input name="faintingspells" value="faintingspells" type="checkbox" id="faintingspells" value="<?= $row['faintingspells'];?>" <?php if ($row['faintingspells']) echo "checked"; ?>>
      <label class="labels" for="faintingspells" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fainting Spells</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <div class="checkbox">
      <input name="seizure" value="seizure" type="checkbox" id="seizure" value="<?= $row['seizure'];?>" <?php if ($row['seizure']) echo "checked"; ?>>
      <label class="labels" for="seizure" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seizure/Epilepsy</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <div class="checkbox">
      <input name="bleeding" value="bleeding" type="checkbox" id="bleeding" value="<?= $row['bleeding'];?>" <?php if ($row['bleeding']) echo "checked"; ?>>
      <label class="labels" for="bleeding" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bleeding Tendencies</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <div class="checkbox">
      <input name="eyedis" value="eyedis" type="checkbox" id="eyedis" value="<?= $row['eyedis'];?>" <?php if ($row['eyedis']) echo "checked"; ?>>
      <label class="labels" for="eyedis" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Eye Disorder</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <div class="input_wrap">
              <label for="fullname">Heart Ailment (please specify)</label>
              <input name="heartailment" id ="heartailment" type="text" placeholder="Please Specify" value="<?=$row['heartailment'];?>" readonly>
          </div>
          <div class="input_wrap">
              <label for="fullname">Other Illness (please specify)</label>
              <input name="otherillness" id ="otherillness" type="text" placeholder="Please Specify" value="<?=$row['otherillness'];?>" readonly>
          </div>
      <br>
          <p>Do you have any allergy to:</p>
 <div class="input_form">
  </div>
  <div class="row-container">
  <p><b>Food:</b></p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
  <input name="yesfood" value="yesfood" type="checkbox" id="yesfood" value="<?= $row['yesfood'];?>" <?php if ($row['yesfood']) echo "checked"; ?>>
  <label class="labels" for="yesfood" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
</div>

<div class="checkbox">
  <input name="nofood" value="nofood" type="checkbox" id="nofood" value="<?= $row['nofood'];?>" <?php if ($row['nofood']) echo "checked"; ?>>
  <label class="labels" for="nofood" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<div class="input_wrap">
  <input name="food" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['food'];?>" readonly>
</div>
</div>

<div class="input_form">
  </div>
  <div class="row-container">
  <p><b>Medicine:</b></p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
  <input name="yesmed" value="yesmed" type="checkbox" id="yesmed" value="<?= $row['yesmed'];?>" <?php if ($row['yesmed']) echo "checked"; ?>>
  <label class="labels" for="yesme" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
</div>

<div class="checkbox">
  <input name="nomed" value="nomed" type="checkbox" id="nomed" value="<?= $row['nomed'];?>" <?php if ($row['nomed']) echo "checked"; ?>>
  <label class="labels" for="nomed" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<div class="input_wrap">
  <input name="med" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['med'];?>" readonly>
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
      <input name="allow" value="allow" type="checkbox" id="allow" value="<?= $row['allow'];?>" <?php if ($row['allow']) echo "checked"; ?>>
      <label class="labels" for="allow" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <div class="checkbox">
      <input name="notallow" value="notallow" type="checkbox" id="notallow" value="<?= $row['notallow'];?>" <?php if ($row['notallow']) echo "checked"; ?>>
      <label class="labels" for="notallow" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>
  <div class="input_form"> 
          <div class="input">
          <label for="fullname">Is your child taking any medications at present? If YES, please list the name of the medicine/s:</label>  <div class="row-container">
<div class="checkbox">
<input name="yesmedication" value="yesmedication" type="checkbox" id="yesmedication" value="<?= $row['yesmedication'];?>" <?php if ($row['yesmedication']) echo "checked"; ?>>
  <label class="labels" for="yesmedication" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
</div>

<div class="checkbox">
<input name="nomedication" value="nomedication" type="checkbox" id="nomedication" value="<?= $row['nomedication'];?>" <?php if ($row['nomedication']) echo "checked"; ?>>
  <label class="labels" for="nomedication" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<div class="input_wrap">
<input name="medication" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['medication'];?>" readonly>
</div>
</div>

 <div class="input_form"> 
          <div class="input_wrap">
              <label for="fullname">Person to be notified in case of emergency:</label>
              <input name="notified" id ="otherillness" type="text" value="<?=$row['notified'];?>" readonly>
          </div>
          <div class="input_wrap">
              <label for="fullname">Contact Number</label>
              <input name="contact" id ="languagess" type="text" value="<?=$row['contact'];?>" readonly>
          </div>
          <div class="input_wrap">
              <label for="fullname">Relationship</label>
              <input name="relationship" id ="otherillness" type="text" value="<?=$row['relationship'];?>" readonly>
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