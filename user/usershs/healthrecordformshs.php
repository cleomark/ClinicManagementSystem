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
        if($_SESSION['leveleduc'] == 2){
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

    <style>
        /* Define custom styles here */
        .form-container {
            background-color: #fff;
            box-shadow: 4px 4px 4px 4px rgba(76, 84, 177, 0.5);
            padding: 20px;
            border-radius: 20px;
            margin-bottom: 20px;
        }

        .form-title {
            text-align: center;
            color: #4c54b1;
            font-weight: bold;
            font-size: 24px;
            margin-bottom: 20px;
        }


        .spinner-wrapper {
      background-color: #F5F6FE;
      position: fixed;
      top: 0;
      left: 0; 
      width: 100%;
      height: 100%;
      z-index: 9999;
      display: flex;
  justify-content: center;
  align-items: center;
  transition: all 0.2s;
 
    }

 
    .spinner-wrapper img{
      width: 20%;
      height: 20%;
    }


                        .spinner-wrapper:before,
                        .spinner-wrapper:after {
                            content: "";
                            position: absolute;
                            height: 100px;
                            width: 100px;
                            background-color: #3330ca;
                            border-radius: 80%;
                            z-index: -1;
                            opacity: 0.7;
							
                        }

                        .spinner-wrapper:before {
                            animation: pulse 2s ease-out infinite;
                        }

                        .spinner-wrapper:after {
                            animation: pulse 2s 1s ease-out infinite;
                        }

                        @keyframes pulse {
                            100% {
                                transform: scale(2.6);
                                opacity: 0;
                            }
                        }


    </style>

</head> 

<body class="app">   	
    <?php 
        include $_SERVER['DOCUMENT_ROOT'] . "/DivineClinic/components/navbar.php";
    ?>

<div class="spinner-wrapper">
<img src="\DivineClinic\assets\3D\divineloader.gif" alt="">
 
</div>


    <div class="app-wrapper">
	    
    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    <div class="position-relative mb-3">
				    <div class="row g-3 justify-content-between">
						
				    </div>
			    </div>
			    
                <div class="app-card app-card-notification shadow-sm mb-4">
				        <div class="row g-3 align-items-center">

							<?php
								if(isset($_SESSION['success'])){
									echo $_SESSION['success'];
									unset($_SESSION['success']);
								}
							?>
                            </div>

<div class="app-card-body p-4">
    <div class="container">

    <div class="form-container">
        <div class="form-title">
        Health Record Form
        </div>
					
	<form class="form-horizontal mt-4" action="function/funct.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">

    <div class="align_form">

        <div class="input_form">

            <div class="input_wrap">
                <label for="image">Upload Image</label>
                <input type="file" name="image" id="image" required>
            </div>

        </div>
        <div class="input_form">

            <div class="input_wrap">
                <label for="fullname">Full Name</label>
                <input name="fullname" type="text" class="input-box" value="<?= $fullname; ?>" readonly>
            </div>
                       
            <div class="input_wrap">
                <label for="fullname">ID Number</label>
                <input id="idnumber" name="idnumber" type="text" class="input-box" value="<?= $idnumber; ?>" readonly>
            </div>
            <div class="input_wrap">
                <label for="personal_contact">Personal Contact Number</label>
                <input id="personalContactInput" class="input-box" name="phoneno" type="text" placeholder="+63">
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
                <input id="contactInput_one" class="input-box" name="cfather" type="text" placeholder="+63">
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

<br>
    <div class="medical-history">

        <p style="color: #000;" >Please select box if you have/had any of the following illnesses:</p>

        <div class="checkbox-group">

            <div>
                <input class="checkbox" name="polio" value="polio" type="checkbox" id="polio">
                <label class="checkbox-label" for="polio" style="font-size: 14px; padding-left: 30px;">Polio</label>
            </div>
            <div>
                <input class="checkbox" name="tetanus" value="tetanus" type="checkbox" id="tetanus">
                <label class="checkbox-label" for="tetanus" style="font-size: 14px; padding-left: 30px;">Tetanus</label>
            </div>
            <div>
                <input class="checkbox" name="chickenpox" value="chickenpox" type="checkbox" id="chickenpox">
                <label class="checkbox-label" for="chickenpox" style="font-size: 14px; padding-left: 30px;">Chicken Pox</label>
            </div>
            <div>
                <input class="checkbox" name="measles" value="measles" type="checkbox" id="measles">
                <label class="checkbox-label" for="measles" style="font-size: 14px; padding-left: 30px;">Measles</label>
            </div>
            <div>
                <input class="checkbox" name="mumps" value="mumps" type="checkbox" id="mumps">
                <label class="checkbox-label" for="mumps" style="font-size: 14px; padding-left: 30px;">Mumps</label>
            </div>
            <div>
                <input class="checkbox" name="tb" value="tb" type="checkbox" id="tb">
                <label class="checkbox-label" for="tb" style="font-size: 14px; padding-left: 30px;">Pulmonary Tuberculosis</label>
            </div>
            <div>
                <input class="checkbox" name="asthma" value="asthma" type="checkbox" id="asthma">
                <label class="checkbox-label" for="asthma" style="font-size: 14px; padding-left: 30px;">Asthma</label>
            </div>
            <div>
                <input class="checkbox" name="hepatitis" value="hepatitis" type="checkbox" id="hepatitis">
                <label class="checkbox-label" for="hepatitis" style="font-size: 14px; padding-left: 30px;">Hepatitis</label>
            </div>
            <div>
                <input class="checkbox" name="faintingspells" value="faintingspells" type="checkbox" id="faintingspells">
                <label class="checkbox-label" for="faintingspells" style="font-size: 14px; padding-left: 30px;">Fainting Spells</label>
            </div>
            <div>
                <input class="checkbox" name="seizure" value="seizure" type="checkbox" id="seizure">
                <label class="checkbox-label" for="seizure" style="font-size: 14px; padding-left: 30px;">Seizure/Epilepsy</label>
            </div>
            <div>
                <input class="checkbox" name="bleeding" value="bleeding" type="checkbox" id="bleeding">
                <label class="checkbox-label" for="bleeding" style="font-size: 14px; padding-left: 30px;">Bleeding Tendencies</label>
            </div>
            <div>
                <input class="checkbox" name="eyedis" value="eyedis" type="checkbox" id="eyedis">
                <label class="checkbox-label" for="eyedis" style="font-size: 14px; padding-left: 30px;">Eye Disorder</label>
            </div>

        </div>
    </div>
    
    <div class="input_form">
        <div class="input_wrap">
            <label for="fullname">Heart Ailmen</label>
            <input name="heartailment" class="input-box" id ="heartailment" type="text" placeholder="Please specify">
        </div>
    </div>
    <div class="input_form">
        <div class="input_wrap">
            <label for="fullname">Other Illness</label>
            <input name="otherillness" class="input-box" id ="otherillness" type="text" placeholder="Please specify">
        </div>
    </div>
            
        <br>
        <p style="color: #000;">Do you have any allergy to:</p>

        <div class="row-container">
            <p><b>Food:</b></p>

            <div>
                <input class="checkbox" name="yesfood" value="yesfood" type="checkbox" id="yesfood">
                <label class="checkbox-label" for="yesfood" style="font-size: 14px; padding-left: 30px;">Yes</label>
            </div>

            <div>
                <input class="checkbox" name="nofood" value="nofood" type="checkbox" id="nofood">
                <label class="checkbox-label" for="nofood" style="font-size: 14px; padding-left: 30px;">No</label>
            </div>

            <div class="input_wrap">
                <input name="food" class="input-box" id="otherillnesss" type="text" placeholder="If YES, please specify">
            </div>

            <p><b>Medicine:</b></p>

            <div>
                <input class="checkbox" name="yesmed" value="yesmed" type="checkbox" id="yesmed">
                <label class="checkbox-label" for="yesmed" style="font-size: 14px; padding-left: 30px;">Yes</label>
            </div>

            <div>
                <input class="checkbox" name="nomed" value="nomed" type="checkbox" id="nomed">
                <label class="checkbox-label" for="nomed" style="font-size: 14px; padding-left: 30px;">No</label>
            </div>

            <div class="input_wrap">
                <input class="input-box" name="med" id="otherillnesss" type="text" placeholder="If YES, please specify">
            </div>

        </div>

<div class="input_form"> 
    
    <div class="row-container">

        <div class="input_wrap">
            <label for="fullname" id="language">Would you allow your child to be given medicine (as needed) while here in the school?</label>
        </div>

        <div>
            <input class="checkbox" name="allow" value="allow" type="checkbox" id="allow">
            <label class="checkbox-label" for="allow" style="font-size: 14px; padding-left: 30px;">Yes</label>
        </div>
        <div>
            <input class="checkbox" name="notallow" value="notallow" type="checkbox" id="notallow">
            <label class="checkbox-label" for="notallow" style="font-size: 14px; padding-left: 30px;">No</label>
        </div>

    </div>
</div>

    <div class="question">

        <div class="row-container">

            <div class="input_wrap"> 
                <label for="fullname">Is your child taking any medications at present?</label>
            </div>
            
            <div>
                <input class="checkbox" name="yesmedication" value="yesmedication" type="checkbox" id="yesmedication">
                <label class="checkbox-label" for="yesmedication" style="font-size: 14px; padding-left: 30px;">Yes</label>
            </div>

            <div>
                <input class="checkbox" name="nomedication" value="nomedication" type="checkbox" id="nomedication">
                <label class="checkbox-label" for="nomedication" style="font-size: 14px; padding-left: 30px;">No</label>
            </div>

            <div class="input_wrap">
                <input name="medication" class="input-box" id="otherillnesss" type="text" placeholder="If YES, please list the name of the medicine/s.">
            </div>

        </div>

    </div>
    
    

   <div class="input_form"> 

        <div class="input_wrap">
            <label for="fullname" >Person to be notified in case of emergency:</label>
            <input class="input-box" name="notified" id ="languages" type="text">
        </div>
            
        <div class="input_wrap">
            <label for="fullname">Contact</label>
            <input name="contact" class="input-box" type="text" placeholder="+63"> 
            <p id="contactError" class="error-message">Invalid Phone Number</p>
        </div>

<script>
    const contact_Input = document.getElementById('contact_Input');
    const contactError = document.getElementById('contactError');

        contact_Input.addEventListener('input', function() {
        let inputValue = contact_Input.value.trim();

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
            contact_Input.value = inputValue;
            contactError.style.display = 'none'; // Hide the error message
        } else {
            contact_Input.value = ''; // Clear the input if it's invalid
            contactError.style.display = 'block'; // Show the error message for invalid input
        }
    });
</script>

        <div class="input_wrap">
            <label for="fullname">Relationship</label>
            <input class="input-box" name="relationship" id ="relationship" type="text">
        </div>

    </div>

    <div class="app-card-footer px-4 py-3" style="display: flex; justify-content: center;">
        <input type="text" name="user_id" style="display: none;" value="<?= $_SESSION['user_id'];?>">
        <button name="submit_data" class="btn btn-success" style="margin-bottom: 15px; background-color: #1a14cc;">SUBMIT</button>
    </div>



</form>
    </div>
    </div>

				    </div><!--//app-card-body-->
				</div>			    
		    </div>
	    </div>
    </div>  					
    <!-- Javascript -->   <script> 
const spinnerWrapperEl = document.querySelector('.spinner-wrapper');

window.addEventListener('load', () => {
  spinnerWrapperEl.style.opacity = '1';

  setTimeout(() => {
    spinnerWrapperEl.style.display = 'none';
  }, 1000);
})
</script>       
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

