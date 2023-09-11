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
						        <h4 class="notification-title mb-1">Fill-up the Form</h4>
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
    $healthnogsjhs_id = $_GET['healthnogsjhs_id'];
    $sql = "SELECT * FROM healthrecordformgsjhs WHERE healthnogsjhs_id='$healthnogsjhs_id'";

    $result = mysqli_query($conn, $sql);

    while($row = $result->fetch_assoc()){
        $healthnogsjhs_id = $row['healthnogsjhs_id'];
    ?>

  <form class="form-horizontal mt-4" action="function/editrecord.php" method="POST" enctype="multipart/form-data">
                   
                    <div class="align_form">
								<div class="input_form">
								<div class="input_wrap">
							<label></label>
							<div class="image_container">
							<br>
								<img src="<?php echo "/CAPSTONE1/upload_image/".$row['image'];?>">
                                <input type="file" name="image" id="image">

								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Your Image</label>
							</div>
						</div>
                        

        <div class="input_wrap">
                <label for="fullname">Full Name</label>
                <input id="fullname" name="fullname" type="text" value="<?=$row['fullname'];?>">
            </div>
       
            <div class="input_wrap">
                <label for="fullname">ID Number</label>
                <input name="idnumber" type="text" value="<?=$row['idnumber'];?>">
            </div>
            <div class="input_wrap">
                <label for="fullname">Personal Contact Number</label>
        <input id="personalContactInput" name="cp" type="text" placeholder="+63" class="contactInput" value="<?=$row['cp'];?>">
    <p id="personalContactError" class="errorMessage" style="color: red; display: none;">Invalid Phone Number</p>
</div>

<script>
    const personalContactInput = document.getElementById('personalContactInput');
    const personalContactError = document.getElementById('personalContactError');

    personalContactInput.addEventListener('input', function() {
        let inputValue = personalContactInput.value.trim();

        // Ensure that the input always starts with "+63"
        if (!inputValue.startsWith('+63')) {
            inputValue = '+63' + inputValue;
        }

        // Remove any extra characters beyond the maximum length
        if (inputValue.length > 13) {
            inputValue = inputValue.slice(0, 13);
        }

        // Check if the input is valid
        if (inputValue === '+63' || (inputValue.startsWith('+63') && inputValue.length <= 13 && inputValue[3] === '9')) {
            personalContactInput.value = inputValue;
            personalContactError.style.display = 'none'; // Hide the error message
        } else {
            personalContactInput.value = ''; // Clear the input if it's invalid
            personalContactError.style.display = 'block'; // Show the error message for invalid input
        }
    });
</script>
</div>
   </div>
            <br><br>
<div class="input_form">
            <div class="input_wrap">
                <label for="fullname">Birthday</label>
                <input name="birthday" type="date" value="<?=$row['birthday'];?>">
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
                <label for="fullname">Present Address</label>
                <input name="paddress" id="paddress" type="text" value="<?=$row['paddress'];?>">
            </div>
         </div>
    <div class="input_form">
        <div class="input_wrap">
            <label for="fullname">Name of Father</label>
            <input name="father" id="father" type="text" value="<?=$row['father'];?>">
        </div>

        <div class="input_wrap">
            <label for="fullname">Contact</label>
            <input id="contactInput_one" name="cfather" type="text" placeholder="+63" class="contactInput" value="<?=$row['cfather'];?>">
    <p id="contactInputOneError" class="errorMessage" style="color: red; display: none;">Invalid Phone Number</p>
</div>

<script>
    const contactInput_one = document.getElementById('contactInput_one');
    const contactInputOneError = document.getElementById('contactInputOneError');

        contactInput_one.addEventListener('input', function() {
        let inputValue = contactInput_one.value.trim();

        // Ensure that the input always starts with "+63"
        if (!inputValue.startsWith('+63')) {
            inputValue = '+63' + inputValue;
        }

        // Remove any extra characters beyond the maximum length
        if (inputValue.length > 13) {
            inputValue = inputValue.slice(0, 13);
        }

        // Check if the input is valid
        if (inputValue === '+63' || (inputValue.startsWith('+63') && inputValue.length <= 13 && inputValue[3] === '9')) {
            contactInput_one.value = inputValue;
            contactInputOneError.style.display = 'none'; // Hide the error message
        } else {
            contactInput_one.value = ''; // Clear the input if it's invalid
            contactInputOneError.style.display = 'block'; // Show the error message for invalid input
        }
    });
</script>
        </div>

    <div class="input_form">
        <div class="input_wrap">
            <label for="fullname">Name of Mother</label>
            <input name="mother" id="mother" type="text" value="<?=$row['mother'];?>">
        </div>

        <div class="input_wrap">
            <label for="fullname">Contact</label>
            <input id="contactInput_two" name="cmother" type="text" placeholder="+63" class="contactInput" value="<?=$row['cmother'];?>">            
            <p id="contactInputTwoError" class="errorMessage" style="color: red; display: none;">Invalid Phone Number</p>
</div>

<script>
    const contactInput_two = document.getElementById('contactInput_two');
    const contactInputTwoError = document.getElementById('contactInputTwoError');

        contactInput_two.addEventListener('input', function() {
        let inputValue = contactInput_two.value.trim();

        // Ensure that the input always starts with "+63"
        if (!inputValue.startsWith('+63')) {
            inputValue = '+63' + inputValue;
        }

        // Remove any extra characters beyond the maximum length
        if (inputValue.length > 13) {
            inputValue = inputValue.slice(0, 13);
        }

        // Check if the input is valid
        if (inputValue === '+63' || (inputValue.startsWith('+63') && inputValue.length <= 13 && inputValue[3] === '9')) {
            contactInput_two.value = inputValue;
            contactInputTwoError.style.display = 'none'; // Hide the error message
        } else {
            contactInput_two.value = ''; // Clear the input if it's invalid
            contactInputTwoError.style.display = 'block'; // Show the error message for invalid input
        }
    });
</script>
        </div>

    <div class="input_form">
        <div class="input_wrap">
            <label for="fullname">Religion</label>
            <input name="religion" id="religion" type="text" value="<?=$row['religion'];?>">
        </div>

        <div class="input_wrap">
            <label for="fullname">Nationality</label>
            <input name="nationality" id="nationality" type="text" value="<?=$row['nationality'];?>">
        </div>
    </div>

    <div class="input_form">
            <div class="input_wrap">
                <label for="fullname">Primary Language Spoken (Bicol, Tagalog, English, etc.)</label>
                <input name="language" id ="language" type="text" value="<?=$row['language'];?>">
            </div>
     </div>
<br>
         <div class="input_form">
            <label for="fullname">Student lives with: </label>
        </div><br>
        <div class="checkbox">
            <input name="bothparents" type="checkbox" id="bothparents" value="bothparents" <?php if($row['bothparents']=="bothparents") {echo "checked";} ?>>
            <label class="labels" for="bothparents" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Both Parents</label>
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="checkbox">
        <input name="livesmother" type="checkbox" id="livesmother" value="bothparents" <?php if($row['livesmother']=="livesmother") {echo "checked";} ?>>
            <label class="labels" for="livesmother" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mother</label>
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="checkbox">
        <input name="livesfather" type="checkbox" id="livesfather" value="livesfather" <?php if($row['livesfather']=="livesfather") {echo "checked";} ?>>
            <label class="labels" for="livesfather" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Father</label>
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="checkbox">
        <input name="guardian" type="checkbox" id="guardian" value="guardian" <?php if($row['guardian']=="guardian") {echo "checked";} ?>>
            <label class="labels" for="guardian" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Guardian</label>
        </div>
        <div class="input_form">
        <div class="input_wrap">
            <label for="fullname">Guardian's Name (In case the student is living with Guadian)</label>
            <input name="guardianname" id="guardianname" type="text" value="<?=$row['guardianname'];?>">
        </div>
        <div class="input_wrap">
            <label for="fullname">Guardian's relation to the student/employee</label>
            <input name="guardianrelation" id="guardianrelation" type="text" value="<?=$row['guardianrelation'];?>">
        </div>
    </div>
    <div class="input_form">
        <div class="input_wrap">
            <label for="fullname">Contact</label>
            <input id="contactInput_cguardian" name="cguardian" type="text" placeholder="+63" class="contactInput" value="<?=$row['cguardian'];?>">                        <p id="contactguardianError" class="errorMessage" style="color: red; display: none;">Invalid Phone Number</p>
</div>

<script>
    const contactInput_cguardian = document.getElementById('contactInput_cguardian');
    const contactguardianError = document.getElementById('contactguardianError');

        contactInput_cguardian.addEventListener('input', function() {
        let inputValue = contactInput_cguardian.value.trim();

        // Ensure that the input always starts with "+63"
        if (!inputValue.startsWith('+63')) {
            inputValue = '+63' + inputValue;
        }

        // Remove any extra characters beyond the maximum length
        if (inputValue.length > 13) {
            inputValue = inputValue.slice(0, 13);
        }

        // Check if the input is valid
        if (inputValue === '+63' || (inputValue.startsWith('+63') && inputValue.length <= 13 && inputValue[3] === '9')) {
            contactInput_cguardian.value = inputValue;
            contactguardianError.style.display = 'none'; // Hide the error message
        } else {
            contactInput_cguardian.value = ''; // Clear the input if it's invalid
            contactguardianError.style.display = 'block'; // Show the error message for invalid input
        }
    });
</script>
    </div>
    <div class="input_form">
        <div class="input_wrap">
            <label for="fullname">Alternation Person to Contact in Case of Emergency</label>
            <input name="altrelation" id="altrelation" type="text" value="<?=$row['altrelation'];?>">
        </div>
        <div class="input_wrap">
            <label for="fullname">Relationship to the student/employee</label>
            <input name="altrel" id="altrel" type="text" value="<?=$row['altrel'];?>">
        </div>
        <div class="input_wrap">
            <label for="fullname">Contact</label>
            <input id="contactInput_acontact" name="acontact" type="text" placeholder="+63" class="contactInput" value="<?=$row['acontact'];?>"> 
            <p id="contactarelationError" class="errorMessage" style="color: red; display: none;">Invalid Phone Number</p>
</div>

<script>
    const contactInput_acontact = document.getElementById('contactInput_acontact');
    const contactarelationError = document.getElementById('contactarelationError');

        contactInput_acontact.addEventListener('input', function() {
        let inputValue = contactInput_acontact.value.trim();

        // Ensure that the input always starts with "+63"
        if (!inputValue.startsWith('+63')) {
            inputValue = '+63' + inputValue;
        }

        // Remove any extra characters beyond the maximum length
        if (inputValue.length > 13) {
            inputValue = inputValue.slice(0, 13);
        }

        // Check if the input is valid
        if (inputValue === '+63' || (inputValue.startsWith('+63') && inputValue.length <= 13 && inputValue[3] === '9')) {
            contactInput_acontact.value = inputValue;
            contactarelationError.style.display = 'none'; // Hide the error message
        } else {
            contactInput_acontact.value = ''; // Clear the input if it's invalid
            contactarelationError.style.display = 'block'; // Show the error message for invalid input
        }
    });
</script>
    </div>

    <div>
        <p class="title_">IMMUNIZATION</p>
    </div>
    <p>Please select the box if your child/ward had completed the following Primary Immunization. The Employee may ignore this.</p>

    <div class="input_form">
        </div>
        <div class="checkbox">
        <input name="bcg" type="checkbox" id="bcg" value="bcg" <?php if($row['bcg']=="bcg") {echo "checked";} ?>>
            <label class="labels" for="bcg" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BCG</label>
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="checkbox">
        <input name="dpt" type="checkbox" id="dpt" value="bcg" <?php if($row['dpt']=="dpt") {echo "checked";} ?>>
            <label class="labels" for="dpt" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DPT</label>
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="checkbox">
        <input name="opv" type="checkbox" id="opv" value="opv" <?php if($row['opv']=="opv") {echo "checked";} ?>>
            <label class="labels" for="opv" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OPV</label>
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="checkbox">
        <input name="hepa" type="checkbox" id="hepa" value="hepa" <?php if($row['hepa']=="hepa") {echo "checked";} ?>>
            <label class="labels" for="hepa" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hepa B</label>
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="checkbox">
        <input name="measles" type="checkbox" id="measles" value="measles" <?php if($row['measles']=="measles") {echo "checked";} ?>>
            <label class="labels" for="measles" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Measles</label>
        </div>
        <div class="input_wrap">
            <label for="fullname">Others</label>
            <input name="others" id="others" type="text" value="<?=$row['others'];?>">
        </div>
<br>
        <p>Does your child/ward have COVID-19 Vacination? (If with First, Second or Booster dose, please attach a screenshot of Vaccination Card). The Employee is required to answer this.</p>

<div class="input_form">
    </div>
    <div class="checkbox">
    <input name="firstdose" type="checkbox" id="firstdose" value="firstdose" <?php if($row['firstdose']=="firstdose") {echo "checked";} ?>>
        <label class="labels" for="firstdose" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;First Dose Only</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
    <input name="seconddose" type="checkbox" id="seconddose" value="seconddose" <?php if($row['seconddose']=="seconddose") {echo "checked";} ?>>
        <label class="labels" for="seconddose" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Second Dose</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
    <input name="boosterdose" type="checkbox" id="boosterdose" value="boosterdose" <?php if($row['boosterdose']=="boosterdose") {echo "checked";} ?>>
        <label class="labels" for="boosterdose" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Booster Dose</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
    <input name="no" type="checkbox" id="no" value="no" <?php if($row['no']=="no") {echo "checked";} ?>>
        <label class="labels" for="no" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="input_wrap">
							<label></label>
							<div class="image_container">
							<br>
								<img src="<?php echo "/CAPSTONE1/upload_image/".$row['imagevac'];?>">
                                <input type="file" name="imagevac" id="imagevac">

								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Your Image</label>
							</div>
						</div>

<br><br><br>
    <div>
        <p class="title_">Medical History</p>
    </div>
    <p>Does you/your child have/ or history of the following conditions?
   <div class="input_form">
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
    <input name="asthma" type="checkbox" id="asthma" value="asthma" <?php if($row['asthma']=="asthma") {echo "checked";} ?>>
        <label class="labels" for="asthma" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Asthma</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
    <input name="faintingspells" type="checkbox" id="faintingspells" value="faintingspells" <?php if($row['faintingspells']=="faintingspells") {echo "checked";} ?>>
        <label class="labels" for="faintingspells" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fainting Spells</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
    <input name="allergicrhinitis" type="checkbox" id="allergicrhinitis" value="allergicrhinitis" <?php if($row['allergicrhinitis']=="allergicrhinitis") {echo "checked";} ?>>
        <label class="labels" for="allergicrhinitis" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Allergic Rhinitis</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
    <input name="freqheadache" type="checkbox" id="freqheadache" value="freqheadache" <?php if($row['freqheadache']=="freqheadache") {echo "checked";} ?>>
        <label class="labels" for="freqheadache" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Frequent Headache</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="input_form">
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
    <input name="anxietydis" type="checkbox" id="anxietydis" value="anxietydis" <?php if($row['anxietydis']=="anxietydis") {echo "checked";} ?>>
        <label class="labels" for="anxietydis" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Anxiety Disoder</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
    <input name="g6pd" type="checkbox" id="g6pd" value="g6pd" <?php if($row['g6pd']=="g6pd") {echo "checked";} ?>>
        <label class="labels" for="g6pd" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;G6PD</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
    <input name="bleedingclotting" type="checkbox" id="bleedingclotting" value="bleedingclotting" <?php if($row['bleedingclotting']=="bleedingclotting") {echo "checked";} ?>>
        <label class="labels" for="bleedingclotting" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bleeding/Clotting Disorder</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
    <input name="hearingprob" type="checkbox" id="hearingprob" value="hearingprob" <?php if($row['hearingprob']=="hearingprob") {echo "checked";} ?>>
        <label class="labels" for="hearingprob" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hearing Problem</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <br><br>
    <div class="input_form">
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
    <input name="hypergas" type="checkbox" id="hypergas" value="hypergas" <?php if($row['hypergas']=="hypergas") {echo "checked";} ?>>
        <label class="labels" for="hypergas" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hyperacidity/Gastritis</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
    <input name="derma" type="checkbox" id="derma" value="derma" <?php if($row['derma']=="derma") {echo "checked";} ?>>
        <label class="labels" for="derma" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dermatitis/Skin Problem</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
    <input name="hypertension" type="checkbox" id="hypertension" value="hypertension" <?php if($row['hypertension']=="hypertension") {echo "checked";} ?>>
        <label class="labels" for="hypertension" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hypertension</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
    <input name="diabetes" type="checkbox" id="diabetes" value="diabetes" <?php if($row['diabetes']=="diabetes") {echo "checked";} ?>>
        <label class="labels" for="diabetes" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Diabetes Mellitus</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <br><br>
    <div class="input_form">
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
    <input name="hyperventilation" type="checkbox" id="hyperventilation" value="hyperventilation" <?php if($row['hyperventilation']=="hyperventilation") {echo "checked";} ?>>
        <label class="labels" for="hyperventilation" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hyperventilation</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
    <input name="mens" type="checkbox" id="mens" value="mens" <?php if($row['mens']=="mens") {echo "checked";} ?>>
        <label class="labels" for="mens" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dysmenorrhea/Menstrual Cramps</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   
            <div class="input_wrap">
                <label for="fullname">Others</label>
                <input name="othersmedical" id ="othersmedical" type="text" value="<?=$row['othersmedical'];?>">
            </div>
   
            <br>
<p>Do you have a heart condition? (If yes, please specify.)</p>
<div class="row-container">
  <div class="checkbox">
  <input name="yesheartcon" type="checkbox" id="yesheartcon" value="yesheartcon" <?php if($row['yesheartcon']=="yesheartcon") {echo "checked";} ?>>
      <label class="labels" for="yesheartcon" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">
  <input name="noheartcon" type="checkbox" id="noheartcon" value="noheartcon" <?php if($row['noheartcon']=="noheartcon") {echo "checked";} ?>>
    <label class="labels" for="noheartcon" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
  <input name="heartcon" id ="othersmedical" type="text" value="<?=$row['heartcon'];?>">
  </div>
</div>

<br>
<p>Do you have an Eye problem? (If yes, please specify.)</p>
<div class="row-container">
  <div class="checkbox">
  <input name="yeseyeprob" type="checkbox" id="yeseyeprob" value="yeseyeprob" <?php if($row['yeseyeprob']=="yeseyeprob") {echo "checked";} ?>>
      <label class="labels" for="yeseyeprob" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">
  <input name="noeyeprob" type="checkbox" id="noeyeprob" value="noeyeprob" <?php if($row['noeyeprob']=="noeyeprob") {echo "checked";} ?>>
    <label class="labels" for="noheartcon" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
  <input name="eyeprob" id ="othersmedical" type="text" value="<?=$row['eyeprob'];?>">
  </div>
</div>

<br>
<p>Do you have a history of serious illness and/or hospitalization? (Please specify and include dates.)</p>
<div class="row-container">
  <div class="checkbox">
  <input name="yesseriousillnes" type="checkbox" id="yesseriousillnes" value="yesseriousillnes" <?php if($row['yesseriousillnes']=="yesseriousillnes") {echo "checked";} ?>>
      <label class="labels" for="yesseriousillnes" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">
  <input name="noseriousillnes" type="checkbox" id="noseriousillnes" value="noseriousillnes" <?php if($row['noseriousillnes']=="noseriousillnes") {echo "checked";} ?>>
    <label class="labels" for="noheartcon" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
  <input name="seriousillnes" id ="othersmedical" type="text" value="<?=$row['seriousillnes'];?>">
  </div>
</div>

<br>
<p>Do you have a history of surgeries and/or injuries? (Please specify and include dates.)</p>
<div class="row-container">
  <div class="checkbox">
  <input name="yessurgeries" type="checkbox" id="yessurgeries" value="yessurgeries" <?php if($row['yessurgeries']=="yessurgeries") {echo "checked";} ?>>
      <label class="labels" for="yessurgeries" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">
  <input name="nosurgeries" type="checkbox" id="nosurgeries" value="nosurgeries" <?php if($row['nosurgeries']=="nosurgeries") {echo "checked";} ?>>
    <label class="labels" for="nosurgeries" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
  <input name="surgeries" id ="othersmedical" type="text" value="<?=$row['surgeries'];?>">
  </div>
</div>

<br>
<p>Do receive any medication or medical treatment, either regulary or occasionally? (If yes, please explain.)</p>
<div class="row-container">
  <div class="checkbox">
  <input name="yesreceive" type="checkbox" id="yesreceive" value="yesreceive" <?php if($row['yesreceive']=="yesreceive") {echo "checked";} ?>>
      <label class="labels" for="yesreceive" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">
  <input name="noreceive" type="checkbox" id="noreceive" value="noreceive" <?php if($row['noreceive']=="noreceive") {echo "checked";} ?>>
    <label class="labels" for="noreceive" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
  <input name="receive" id ="othersmedical" type="text" value="<?=$row['receive'];?>">
  </div>
</div>

<br>
<p>Do you have any allergies to medication? (If yes, please specify.)</p>
<div class="row-container">
  <div class="checkbox">
  <input name="yesallergiesmed" type="checkbox" id="yesallergiesmed" value="yesallergiesmed" <?php if($row['yesallergiesmed']=="yesallergiesmed") {echo "checked";} ?>>
      <label class="labels" for="yesallergiesmed" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">
  <input name="noallergiesmed" type="checkbox" id="noallergiesmed" value="noallergiesmed" <?php if($row['noallergiesmed']=="noallergiesmed") {echo "checked";} ?>>
    <label class="labels" for="noallergiesmed" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
  <input name="allergiesmed" id ="othersmedical" type="text" value="<?=$row['allergiesmed'];?>">
  </div>
</div>

<br>
<p>Do you have any allergies to food? (If yes, please specify.)</p>
<div class="row-container">
  <div class="checkbox">
  <input name="yesallergiesfood" type="checkbox" id="yesallergiesfood" value="yesallergiesfood" <?php if($row['yesallergiesfood']=="yesallergiesfood") {echo "checked";} ?>>
      <label class="labels" for="yesallergiesfood" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">
  <input name="noallergiesfood" type="checkbox" id="noallergiesfood" value="noallergiesfood" <?php if($row['noallergiesfood']=="noallergiesfood") {echo "checked";} ?>>
    <label class="labels" for="noallergiesfood" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
  <input name="allergiesfood" id ="othersmedical" type="text" value="<?=$row['allergiesfood'];?>">
  </div>
</div>

<br>
<p>Would you like to receive minor first aid (medication & treatment) given by the nurse in the school clinic?</p>
<div class="row-container">
  <div class="checkbox">
  <input name="yesfirstaid" type="checkbox" id="yesfirstaid" value="yesfirstaid" <?php if($row['yesfirstaid']=="yesfirstaid") {echo "checked";} ?>>
      <label class="labels" for="yesfirstaid" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">
  <input name="nofirstaid" type="checkbox" id="nofirstaid" value="nofirstaid" <?php if($row['nofirstaid']=="nofirstaid") {echo "checked";} ?>>
    <label class="labels" for="nofirstaid" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>
</div>

<br>
<p>Do you have any concerns related to your health? (If yes, please explain.)</p>
<div class="row-container">
  <div class="checkbox">
  <input name="yesconcerns" type="checkbox" id="yesconcerns" value="yesconcerns" <?php if($row['yesconcerns']=="yesconcerns") {echo "checked";} ?>>
      <label class="labels" for="yesconcerns" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">
  <input name="noconcerns" type="checkbox" id="noconcerns" value="noconcerns" <?php if($row['noconcerns']=="noconcerns") {echo "checked";} ?>>
    <label class="labels" for="noconcerns" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
  <input name="concerns" id ="othersmedical" type="text" value="<?=$row['concerns'];?>">
  </div>
</div>
                            <input type="hidden" id ="language" name="hidden" value="<?=$row['user_id'];?>">
                            <input type="hidden" name="healthnogsjhs_id" value="<?php echo $healthnogsjhs_id; ?>">
                    <input type="submit" name="update_record" value="Update">
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


</body>
</html> 
