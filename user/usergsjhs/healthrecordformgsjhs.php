<?php
    session_start();
    include '../../db.php';

    if (!isset($_SESSION['user_id'])){
        echo '<script>window.alert("PLEASE LOGIN FIRST!!")</script>';
        echo '<script>window.location.replace("../login.php");</script>';
        exit; // Exit the script to prevent further execution
    }

    $user_id = $_SESSION['user_id'];
    $sql_query = "SELECT * FROM users WHERE user_id ='$user_id'";
    $result = $conn->query($sql_query);
    while($row = $result->fetch_array()){
        $user_id = $row['user_id'];
        $fullname = $row['fullname'];
        $idnumber = $row['idnumber'];
        require_once('../../db.php');
        if($_SESSION['leveleduc'] == 1){
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
    <title>Health Profile Form</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/dwcl.png"> 


    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>

    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">
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
					<p class="title_">Personal Information</p>
					
                    <form class="form-horizontal mt-4" action="function/funct.php" method="POST" enctype="multipart/form-data">    
                    
                    <div class="align_form">

	
        <div class="input_form">

		<div class="input_wrap">
                <label for="image">Upload Image</label>
                <input type="file" name="image" id="image" required>
			</div>
        <div class="input_wrap">
                <label for="fullname">Full Name</label>
                <input id="fullname" name="fullname" type="text" value="<?= $fullname; ?>" readonly>
            </div>
            <div class="input_wrap">
                <label for="fullname">ID Number</label>
                <input name="idnumber" type="text" value="<?= $idnumber; ?>" readonly>
            </div>
            <div class="input_wrap">
    <label for="personal_contact">Personal Contact Number</label>
    <input id="personalContactInput" name="cp" type="text" placeholder="+63" class="contactInput">
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
        <div class="input_form">
    
            <div class="input_wrap">
                <label for="fullname">Birthday</label>
                <input name="birthday" id="birthday" type="date">
            </div>
         <div class="input_wrap">
                <label for="fullname">Gender</label>
                <select class="form-select" name="gender">
                    <option value="" disabled selected>Select Gender</option>
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                </select>
            </div>
         </div>
   
          <div class="input_form">
            <div class="input_wrap">
                <label for="fullname">Home Address</label>
                <input name="address" id ="address" type="text">
            </div>
     </div>
                            
     <div class="input_form">
            <div class="input_wrap">
                <label for="fullname">Present Address</label>
                <input name="paddress" id="paddress" type="text">
            </div>
         </div>
    <div class="input_form">
        <div class="input_wrap">
            <label for="fullname">Name of Father</label>
            <input name="father" id="father" type="text">
        </div>

        <div class="input_wrap">
    <label for="contact">Contact</label>
    <input id="contactInput_one" name="cfather" type="text" placeholder="+63" class="contactInput">
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
            <input name="mother" id="mother" type="text">
        </div>

        <div class="input_wrap">
            <label for="fullname">Contact</label>
            <input id="contactInput_two" name="cmother" type="text" placeholder="+63" class="contactInput">            <p class="errorMessage" style="color: red; display: none;">Invalid Phone Number</p>
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
            <input name="religion" id="religion" type="text">
        </div>

        <div class="input_wrap">
            <label for="fullname">Nationality</label>
            <input name="nationality" id="nationality" type="text">
        </div>
    </div>

    <div class="input_form">
            <div class="input_wrap">
                <label for="fullname">Primary Language Spoken (Bicol, Tagalog, English, etc.)</label>
                <input name="language" id ="language" type="text">
            </div>
     </div>
<br>
         <div class="input_form">
            <label for="fullname">Student lives with: </label>
        </div><br>
        <div class="checkbox">
            <input name="bothparents" value="bothparents" type="checkbox" id="bothparents">
            <label class="labels" for="bothparents" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Both Parents</label>
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="checkbox">
            <input name="livesmother" value="livesmother" type="checkbox" id="livesmother">
            <label class="labels" for="livesmother" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mother</label>
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="checkbox">
            <input name="livesfather" value="livesfather" type="checkbox" id="livesfather">
            <label class="labels" for="livesfather" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Father</label>
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="checkbox">
            <input name="guardian" value="guardian" type="checkbox" id="guardian">
            <label class="labels" for="guardian" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Guardian</label>
        </div>
        <div class="input_form">
        <div class="input_wrap">
            <label for="fullname">Guardian's Name (In case the student is living with Guadian)</label>
            <input name="guardianname" id="guardianname" type="text">
        </div>
        <div class="input_wrap">
            <label for="fullname">Guardian's relation to the student/employee</label>
            <input name="guardianrelation" id="guardianrelation" type="text">
        </div>
    </div>
    <div class="input_form">
    <div class="input_wrap">
            <label for="fullname">Contact</label>
            <input id="contactInput_cguardian" name="cguardian" type="text" placeholder="+63" class="contactInput">            <p class="errorMessage" style="color: red; display: none;">Invalid Phone Number</p>
            <p id="contactguardianError" class="errorMessage" style="color: red; display: none;">Invalid Phone Number</p>
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
            <input name="altrelation" id="altrelation" type="text">
        </div>
        <div class="input_wrap">
            <label for="fullname">Relationship to the student/employee</label>
            <input name="altrel" id="altrel" type="text">
        </div>
        <div class="input_wrap">
            <label for="fullname">Contact</label>
            <input id="contactInput_acontact" name="acontact" type="text" placeholder="+63" class="contactInput"> 
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
    <p>Please select the box if your child/ward had completed the following Primary Immunization.</p>

    <div class="input_form">
        </div>
        <div class="checkbox">
            <input name="bcg" value="bcg" type="checkbox" id="bcg">
            <label class="labels" for="bcg" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BCG</label>
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="checkbox">
            <input name="dpt" value="dpt" type="checkbox" id="dpt">
            <label class="labels" for="dpt" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DPT</label>
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="checkbox">
            <input name="opv" value="opv" type="checkbox" id="opv">
            <label class="labels" for="opv" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OPV</label>
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="checkbox">
            <input name="hepa" value="hepa" type="checkbox" id="hepa">
            <label class="labels" for="hepa" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hepa B</label>
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="checkbox">
            <input name="measles" value="measles" type="checkbox" id="measles">
            <label class="labels" for="measles" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Measles</label>
        </div>
        <div class="input_wrap">
            <label for="fullname">Others</label>
            <input name="others" id="others" type="text">
        </div>
<br>
        <p>Does your child/ward have COVID-19 Vacination? (If with First, Second or Booster dose, please attach a screenshot of Vaccination Card). The Employee is required to answer this.</p>

<div class="input_form">
    </div>
    <div class="checkbox">
        <input name="firstdose" value="firstdose" type="checkbox" id="firstdose">
        <label class="labels" for="firstdose" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;First Dose Only</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="seconddose" value="seconddose" type="checkbox" id="seconddose">
        <label class="labels" for="seconddose" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Second Dose</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="boosterdose" value="boosterdose" type="checkbox" id="boosterdose">
        <label class="labels" for="boosterdose" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Booster Dose</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="no" value="no" type="checkbox" id="no">
        <label class="labels" for="no" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="input_wrap">
                <label for="imagevac">Please Attach the screenshot of yor Vaccination Card</label>
                <input type="file" name="imagevac" id="imagevac">
			</div>

    <div>
        <p class="title_">Medical History</p>
    </div>
    <p>Does you/your child have/ or history of the following conditions?
   <div class="input_form">
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="asthma" value="asthma" type="checkbox" id="asthma">
        <label class="labels" for="asthma" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Asthma</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="faintingspells" value="faintingspells" type="checkbox" id="faintingspells">
        <label class="labels" for="faintingspells" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fainting Spells</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="allergicrhinitis" value="allergicrhinitis" type="checkbox" id="allergicrhinitis">
        <label class="labels" for="allergicrhinitis" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Allergic Rhinitis</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="freqheadache" value="freqheadache" type="checkbox" id="freqheadache">
        <label class="labels" for="freqheadache" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Frequent Headache</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="input_form">
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="anxietydis" value="anxietydis" type="checkbox" id="anxietydis">
        <label class="labels" for="anxietydis" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Anxiety Disoder</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="g6pd" value="g6pd" type="checkbox" id="g6pd">
        <label class="labels" for="g6pd" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;G6PD</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="bleedingclotting" value="bleedingclotting" type="checkbox" id="bleedingclotting">
        <label class="labels" for="bleedingclotting" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bleeding/Clotting Disorder</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="hearingprob" value="hearingprob" type="checkbox" id="hearingprob">
        <label class="labels" for="hearingprob" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hearing Problem</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <br><br>
    <div class="input_form">
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="hypergas" value="hypergas" type="checkbox" id="hypergas">
        <label class="labels" for="hypergas" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hyperacidity/Gastritis</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="derma" value="derma" type="checkbox" id="derma">
        <label class="labels" for="derma" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dermatitis/Skin Problem</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="hypertension" value="hypertension" type="checkbox" id="hypertension">
        <label class="labels" for="hypertension" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hypertension</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="diabetes" value="diabetes" type="checkbox" id="diabetes">
        <label class="labels" for="diabetes" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Diabetes Mellitus</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <br><br>
    <div class="input_form">
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="hyperventilation" value="hyperventilation" type="checkbox" id="hyperventilation">
        <label class="labels" for="hyperventilation" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hyperventilation</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="checkbox">
        <input name="mens" value="mens" type="checkbox" id="mens">
        <label class="labels" for="mens" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dysmenorrhea/Menstrual Cramps</label>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   
            <div class="input_wrap">
                <label for="fullname">Others</label>
                <input name="othersmedical" id ="othersmedical" type="text" placeholder="Other Conditions">
            </div>
   
            <br>
<p>Do you have a heart condition? (If yes, please specify.)</p>
<div class="row-container">
  <div class="checkbox">
    <input name="yesheartcon" value="yesheartcon" type="checkbox" id="yesheartcon">
    <label class="labels" for="yesheartcon" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">
    <input name="noheartcon" value="noheartcon" type="checkbox" id="noheartcon">
    <label class="labels" for="noheartcon" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
    <input name="heartcon" id="otherillnesss" type="text" placeholder="If YES, please specify">
  </div>
</div>

<br>
<p>Do you have an Eye problem? (If yes, please specify.)</p>
<div class="row-container">
  <div class="checkbox">
    <input name="yeseyeprob" value="yeseyeprob" type="checkbox" id="yeseyeprob">
    <label class="labels" for="yeseyeprob" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">
    <input name="noeyeprob" value="noeyeprob" type="checkbox" id="noeyeprob">
    <label class="labels" for="noeyeprob" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
    <input name="eyeprob" id="otherillnesss" type="text" placeholder="If YES, please specify">
  </div>
</div>
<br>
<p>Do you have a history of serious illness and/or hospitalization? (Please specify and include dates.)</p>
<div class="row-container">
  <div class="checkbox">
    <input name="yesseriousillnes" value="yesseriousillnes" type="checkbox" id="yesseriousillnes">
    <label class="labels" for="yesseriousillnes" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">
    <input name="noseriousillnes" value="noseriousillnes" type="checkbox" id="noseriousillnes">
    <label class="labels" for="noseriousillnes" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
    <input name="seriousillnes" id="otherillnesss" type="text" placeholder="If YES, please specify">
  </div>
</div>

<br>
<p>Do you have a history of surgeries and/or injuries? (Please specify and include dates.)</p>
<div class="row-container">
  <div class="checkbox">
    <input name="yessurgeries" value="yessurgeries" type="checkbox" id="yessurgeries">
    <label class="labels" for="yessurgeries" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">
    <input name="nosurgeries" value="nosurgeries" type="checkbox" id="nosurgeries">
    <label class="labels" for="nosurgeries" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
    <input name="surgeries" id="otherillnesss" type="text" placeholder="If YES, please specify">
  </div>
</div>

<br>
<p>Do receive any medication or medical treatment, either regulary or occasionally? (If yes, please explain.)</p>
<div class="row-container">
  <div class="checkbox">
    <input name="yesreceive" value="yesreceive" type="checkbox" id="yesreceive">
    <label class="labels" for="yesreceive" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">
    <input name="noreceive" value="noreceive" type="checkbox" id="noreceive">
    <label class="labels" for="noreceive" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
    <input name="receive" id="otherillnesss" type="text" placeholder="If YES, please specify">
  </div>
</div>

<br>
<p>Do you have any allergies to medication? (If yes, please specify.)</p>
<div class="row-container">
  <div class="checkbox">
    <input name="yesallergiesmed" value="yesallergiesmed" type="checkbox" id="yesallergiesmed">
    <label class="labels" for="yesallergiesmed" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">
    <input name="noallergiesmed" value="noallergiesmed" type="checkbox" id="noallergiesmed">
    <label class="labels" for="noallergiesmed" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
    <input name="allergiesmed" id="otherillnesss" type="text" placeholder="If YES, please specify">
  </div>
</div>
<br>
<p>Do you have any allergies to food? (If yes, please specify.)</p>
<div class="row-container">
  <div class="checkbox">
    <input name="yesallergiesfood" value="yesallergiesfood" type="checkbox" id="yesallergiesfood">
    <label class="labels" for="yesallergiesfood" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">
    <input name="noallergiesfood" value="noallergiesfood" type="checkbox" id="noallergiesfood">
    <label class="labels" for="noallergiesfood" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
    <input name="allergiesfood" id="otherillnesss" type="text" placeholder="If YES, please specify">
  </div>
</div>
<br>
<p>Would you like to receive minor first aid (medication & treatment) given by the nurse in the school clinic?</p>
<div class="row-container">
  <div class="checkbox">
    <input name="yesfirstaid" value="yesfirstaid" type="checkbox" id="yesfirstaid">
    <label class="labels" for="yesfirstaid" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">
    <input name="nofirstaid" value="nofirstaid" type="checkbox" id="nofirstaid">
    <label class="labels" for="nofirstaid" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>
</div>
<br>
<p>Do you have any concerns related to your health? (If yes, please explain.)</p>
<div class="row-container">
  <div class="checkbox">
    <input name="yesconcerns" value="yesconcerns" type="checkbox" id="yesconcerns">
    <label class="labels" for="yesconcerns" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">
    <input name="noconcerns" value="noconcerns" type="checkbox" id="noconcerns">
    <label class="labels" for="noconcerns" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
    <input name="concerns" id="otherillnesss" type="text" placeholder="If YES, please specify">
  </div>
</div>
 <div class="app-card-footer px-4 py-3" style="display: flex; justify-content: center;">
	<input type="text" name="user_id" style="display: none;" value="<?= $_SESSION['user_id'];?>">
   <button name="submit_data" class="btn btn-success">SUBMIT</button>
    </div>
</form>

				    </div><!--//app-card-body-->
				</div>			    
		    </div>
	    </div>
    </div>  	
    
  
    <!-- Javascript -->          
    <!-- <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>   -->
    
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



<div class="sidebar-overlay" data-reff></div>

<script src="../../assets/js/jquery-3.6.1.min.js"></script>

<script src="../../assets/js/bootstrap.bundle.min.js"></script>

<script src="../../assets/js/feather.min.js"></script>

<script src="../../assets/js/jquery.slimscroll.js"></script>

<script src="../../assets/js/select2.min.js"></script>

<script src="../../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../assets/plugins/datatables/datatables.min.js"></script>

<script src="../../assets/plugins/simple-calendar/jquery.simple-calendar.js"></script>
<script src="../../assets/js/calander.js"></script>

<script src="../../assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="../../assets/plugins/apexchart/chart-data.js"></script>

<script src="../../assets/js/circle-progress.min.js"></script>

<script src="../../assets/plugins/slick/slick.js"></script>

<script src="../../assets/js/app.js"></script>

</body>
</html> 

