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
<<<<<<< HEAD
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link rel="stylesheet" href="assets/css/portal.css">
	<link rel="stylesheet" href="assets/formstyle.css">

    <script src="assets/js/script.js"></script>
=======


    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>

    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">
	<link rel="stylesheet" href="assets/formstyle.css"> 
  

>>>>>>> 234eab6b7c132d155d699b2320a670a7ea970a02
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
					        <h1 class="app-page-title mb-0" >Fill-up Health Record Form</h1>
					    </div>
						
				    </div>
			    </div>
			    
                <div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
					        <div class="col-12 col-lg-auto text-center text-lg-start">
						        <h4 class="notification-title mb-1" >Please fill-up honestly.</h4>
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
					<p class="title_" style="color: #800000;">Personal Information</p>
					
                    <form class="form-horizontal mt-4" action="function/funct.php" method="POST" enctype="multipart/form-data">    
                    
                    <div class="align_form">

	
        <div class="input_form">

            <div class="input_wrap">
                <label for="image">Upload Image</label>
                <input type="file" name="image" id="image" required>
            </div>
            <div class="input_wrap">
                <label for="fullname">Full Name</label>
                <input name="fullname" type="text" class="input-box" value="<?= $fullname; ?>" readonly>
            </div>
            <div class="input_wrap">
                <label for="fullname">ID Number</label>
                <input name="idnumber" type="text" class="input-box" value="<?= $idnumber; ?>" readonly>
            </div>
            <div class="input_wrap">
            <label for="personal_contact">Personal Contact Number</label>
            <input id="personalContactInput" class="input-box" name="cp" type="text" placeholder="+63" >
            <p id="personalContactError" class="error-message">Invalid Phone Number</p>
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
                <input class="input-box" name="birthday" id="birthday" type="date">
            </div>
            <div class="input_wrap">
                <label for="fullname">Gender</label>
                <select class="form-select" name="gender">
                    <option disabled selected>Select Gender</option>
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                </select>
            </div>
         </div>
   
          <div class="input_form">
            <div class="input_wrap">
                <label for="fullname">Home Address</label>
                <input class="input-box" name="address" id ="address" type="text">
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
            <label for="fullname">Contact</label>
            <input id="contactInput_one" class="input-box" name="cfather" type="text" placeholder="+63" >
            <p id="contactInputOneError" class="error-message">Invalid Phone Number</p>
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
            <input id="contactInput_two" class="input-box" name="cmother" type="text" placeholder="+63">
            <p id="contactInputTwoError" class="error-message">Invalid Phone Number</p>
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

     <div class="input_form">
        <label for="fullname" style="font-size: 18px;">Student lives with:</label>
    </div>
<br>


<div class="checkbox-group">
    <div>
        <input class="checkbox" name="parent" value="bothparents" type="checkbox" id="bothparents">
        <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="bothparents">Both Parents</label>
    </div>

    <div >
        <input class="checkbox" name="parent" value="livesmother" type="checkbox" id="livesmother">
        <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="livesmother">Mother</label>
    </div>

    <div>
        <input class="checkbox" name="parent" value="livesfather" type="checkbox" id="livesfather">
        <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="livesfather">Father</label>
    </div>

    <div>
        <input class="checkbox" name="guardian" value="guardian" type="checkbox" id="guardian">
        <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="guardian">Guardian</label>
    </div>
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
            <input id="contactInput_cguardian" class="input-box" name="cguardian" type="text" placeholder="+63">            
            <p id="contactguardianError" class="error-message">Invalid Phone Number</p>
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
    </div>

    <div class="input_form">
        <div class="input_wrap">
            <label for="fullname">Contact</label>
            <input id="contactInput_acontact" class="input-box" name="acontact" type="text" placeholder="+63"> 
            <p id="contactarelationError" class="error-message">Invalid Phone Number</p>
        </div>
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

    <div class="indent">
        <div>
            <p class="title" style="font-size: 20px; font-weight: bold;">IMMUNIZATION</p>
        </div>
        <p class="instructions">Please select the box if your child/ward has completed the following Primary Immunization.</p>

        <div class="checkbox-group">
            <div>
                <input class="checkbox" name="bcg" value="bcg" type="checkbox" id="bcg">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="bcg">BCG</label>
            </div>
            <div>
                <input class="checkbox" name="dpt" value="dpt" type="checkbox" id="dpt">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="dpt">DPT</label>
            </div>
            <div>
                <input class="checkbox" name="opv" value="opv" type="checkbox" id="opv">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="opv">OPV</label>
            </div>
            <div>
                <input class="checkbox" name="hepa" value="hepa" type="checkbox" id="hepa">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="hepa">Hepa B</label>
            </div>
            <div>
                <input class="checkbox" name="measles" value="measles" type="checkbox" id="measles">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="measles">Measles</label>
            </div>
        </div>

    <div class="input-wrap">
        <label for="fullname">Others</label>
        <input class="input-box" name="others" id="others" type="text">
    </div>

    <br>
        <p>Does your child/ward have COVID-19 Vacination? (If with First, Second or Booster dose, please attach a screenshot of Vaccination Card). The Employee is required to answer this.</p>

        <div class="input_form">

            <div>
                <input class="checkbox" name="firstdose" value="firstdose" type="checkbox" id="firstdose">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="firstdose">First Dose Only</label>
            </div>
            <div>
                <input class="checkbox" name="seconddose" value="seconddose" type="checkbox" id="seconddose">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="seconddose">Second Dose</label>
            </div>
            <div>
                <input class="checkbox" name="boosterdose" value="boosterdose" type="checkbox" id="boosterdose">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="boosterdose">Booster Dose</label>
            </div>
            <div>
                <input class="checkbox" name="no" value="no" type="checkbox" id="no">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="no">No</label>
            </div>

        </div>


        <div class="input_wrap">
            <label for="imagevac">Please Attach the screenshot of yor Vaccination Card</label>
            <input style="width: fit-content;" type="file" name="imagevac" id="imagevac">
		</div>
    <br>
    <div class="medical-history">
        <p class="title" style="font-size: 20px; font-weight: bold;">MEDICAL HISTORY</p>
        <p>Does you/your child have/ or history of the following conditions?</p>

        <div class="checkbox-group">
            <div>
                <input class="checkbox" name="asthma" value="asthma" type="checkbox" id="asthma">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="asthma">Asthma</label>
            </div>

            <div>
                <input class="checkbox" name="faintingspells" value="faintingspells" type="checkbox" id="faintingspells">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="faintingspells">Fainting Spells</label>
            </div>

            <div>
                <input class="checkbox" name="allergicrhinitis" value="allergicrhinitis" type="checkbox" id="allergicrhinitis">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="allergicrhinitis">Allergic Rhinitis</label>
            </div>

            <div>
                <input class="checkbox" name="freqheadache" value="freqheadache" type="checkbox" id="freqheadache">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="freqheadache">Frequent Headache</label>
            </div>

            <div>
                <input class="checkbox" name="anxietydis" value="anxietydis" type="checkbox" id="anxietydis">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="anxietydis">Anxiety Disorder</label>
            </div>

            <div>
                <input class="checkbox" name="g6pd" value="g6pd" type="checkbox" id="g6pd">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="g6pd">G6PD</label>
            </div>

            <div>
                <input class="checkbox" name="bleedingclotting" value="bleedingclotting" type="checkbox" id="bleedingclotting">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="bleedingclotting">Bleeding/Clotting Disorder</label>
            </div>

            <div>
                <input class="checkbox" name="hearingprob" value="hearingprob" type="checkbox" id="hearingprob">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="hearingprob">Hearing Problem</label>
            </div>

            <div>
                <input class="checkbox" name="hypergas" value="hypergas" type="checkbox" id="hypergas">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="hypergas">Hyperacidity/Gastritis</label>
            </div>

            <div>
                <input  class="checkbox" name="derma" value="derma" type="checkbox" id="derma">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="derma">Dermatitis/Skin Problem</label>
            </div>

            <div>
                <input class="checkbox" name="hypertension" value="hypertension" type="checkbox" id="hypertension">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="hypertension">Hypertension</label>
            </div>

            <div>
                <input class="checkbox" name="diabetes" value="diabetes" type="checkbox" id="diabetes">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="diabetes">Diabetes Mellitus</label>
            </div>

            <div>
                <input class="checkbox" name="hyperventilation" value="hyperventilation" type="checkbox" id="hyperventilation">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="hyperventilation">Hyperventilation</label>
            </div>

            <div>
                <input class="checkbox" name="mens" value="mens" type="checkbox" id="mens">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="mens">Dysmenorrhea/Menstrual Cramps</label>
            </div>

        </div>
    </div>

            <div class="input_wrap">
                <label for="fullname">Others</label>
                <input name="othersmedical" class="input-box" id ="othersmedical" type="text" placeholder="Other Conditions">
            </div>

            <div class="input_wrap">
                <p>Do you have a heart condition? (If yes, please specify.)</p>
                <div class="row-container">
                    <div>
                        <input class="checkbox" name="yesheartcon" value="yesheartcon" type="checkbox" id="yesheartcon">
                        <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="yesheartcon">Yes</label>
                    </div>

                    <div>
                        <input class="checkbox" name="noheartcon" value="noheartcon" type="checkbox" id="noheartcon">
                        <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="noheartcon">No</label>
                    </div>

                    <div class="input_wrap">
                        <input class="input-box" name="heartcon" id="otherillnesss" type="text" placeholder="If YES, please specify">
                    </div>
                </div>
            </div>

    <div class="question">
        <p>Do you have an Eye problem? (If yes, please specify.)</p>
        <div class="row-container">
            <div>
                <input class="checkbox" name="yeseyeprob" value="yeseyeprob" type="checkbox" id="yeseyeprob">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="yeseyeprob">Yes</label>
            </div>

            <div>
                <input class="checkbox" name="noeyeprob" value="noeyeprob" type="checkbox" id="noeyeprob">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="noeyeprob">No</label>
            </div>

            <div class="input_wrap">
                <input class="input-box" name="eyeprob" id="otherillnesss" type="text" placeholder="If YES, please specify">
            </div>
        </div>
    </div>

    <div class="question">
        <p>Do you have a history of serious illness and/or hospitalization? (Please specify and include dates.)</p>
        <div class="row-container">
            <div>
                <input class="checkbox" name="yesseriousillnes" value="yesseriousillnes" type="checkbox" id="yesseriousillnes">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="yesseriousillnes">Yes</label>
            </div>

            <div>
                <input class="checkbox" name="noseriousillnes" value="noseriousillnes" type="checkbox" id="noseriousillnes">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="noseriousillnes">No</label>
            </div>

            <div class="input_wrap">
                <input class="input-box" name="seriousillnes" id="otherillnesss" type="text" placeholder="If YES, please specify">
            </div>
        </div>
    </div>

    <div class="question">
        <p>Do you have a history of surgeries and/or injuries? (Please specify and include dates.)</p>
        <div class="row-container">
            <div>
                <input class="checkbox" name="yessurgeries" value="yessurgeries" type="checkbox" id="yessurgeries">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="yessurgeries">Yes</label>
            </div>

            <div>
                <input class="checkbox" name="nosurgeries" value="nosurgeries" type="checkbox" id="nosurgeries">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="nosurgeries">No</label>
            </div>

            <div class="input_wrap">
                <input class="input-box" name="surgeries" id="otherillnesss" type="text" placeholder="If YES, please specify">
            </div>
        </div>
    </div>

    <div class="question">
        <p>Do receive any medication or medical treatment, either regularly or occasionally? (If yes, please explain.)</p>
        <div class="row-container">
            <div>
                <input class="checkbox" name="yesreceive" value="yesreceive" type="checkbox" id="yesreceive">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="yesreceive">Yes</label>
            </div>

            <div>
                <input class="checkbox" name="noreceive" value="noreceive" type="checkbox" id="noreceive">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="noreceive">No</label>
            </div>

            <div class="input_wrap">
                <input class="input-box" name="receive" id="otherillnesss" type="text" placeholder="If YES, please specify">
            </div>
        </div>
    </div>
<div class="question">
        <p>Do you have any allergies to medication? (If yes, please specify.)</p>
        <div class="row-container">
            <div>
                <input class="checkbox" name="yesallergiesmed" value="yesallergiesmed" type="checkbox" id="yesallergiesmed">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="yesallergiesmed">Yes</label>
            </div>

            <div>
                <input class="checkbox" name="noallergiesmed" value="noallergiesmed" type="checkbox" id="noallergiesmed">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="noallergiesmed">No</label>
            </div>

            <div class="input_wrap">
                <input class="input-box" name="allergiesmed" id="otherillnesss" type="text" placeholder="If YES, please specify">
            </div>
        </div>
    </div>

    <div class="question">
        <p>Do you have any allergies to food? (If yes, please specify.)</p>
        <div class="row-container">
            <div>
                <input class="checkbox" name="yesallergiesfood" value="yesallergiesfood" type="checkbox" id="yesallergiesfood">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="yesallergiesfood">Yes</label>
            </div>

            <div>
                <input class="checkbox" name="noallergiesfood" value="noallergiesfood" type="checkbox" id="noallergiesfood">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="noallergiesfood">No</label>
            </div>

            <div class="input_wrap">
                <input class="input-box" name="allergiesfood" id="otherillnesss" type="text" placeholder="If YES, please specify">
            </div>
        </div>
    </div>

    <div class="question">
        <p>Would you like to receive minor first aid (medication & treatment) given by the nurse in the school clinic?</p>
        <div class="row-container">
            <div>
                <input class="checkbox" name="yesfirstaid" value="yesfirstaid" type="checkbox" id="yesfirstaid">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="yesfirstaid">Yes</label>
            </div>

            <div>
                <input class="checkbox" name="nofirstaid" value="nofirstaid" type="checkbox" id="nofirstaid">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="nofirstaid">No</label>
            </div>
        </div>
    </div>

    <div class="question">
        <p>Do you have any concerns related to your health? (If yes, please explain.)</p>
        <div class="row-container">
            <div>
                <input class="checkbox" name="yesconcerns" value="yesconcerns" type="checkbox" id="yesconcerns">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="yesconcerns">Yes</label>
            </div>

            <div>
                <input class="checkbox" name="noconcerns" value="noconcerns" type="checkbox" id="noconcerns">
                <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="noconcerns">No</label>
            </div>

            <div class="input_wrap">
                <input class="input-box" name="concerns" id="otherillnesss" type="text" placeholder="If YES, please specify">
            </div>
        </div>
    </div>
    </div>

    
 <div class="app-card-footer px-4 py-3" style="display: flex; justify-content: center;">
	<input type="text" name="user_id" style="display: none;" value="<?= $_SESSION['user_id'];?>">
   <button name="submit_data" class="btn btn-success custom-button" style="margin-bottom: 15px; background-color: #1a14cc;">SUBMIT</button>
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

