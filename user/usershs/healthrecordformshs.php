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

</head> 

<body class="app">   	
<header class="app-header fixed-top">	   	            
        <div class="app-header-inner">  
	        <div class="container-fluid py-2">
		        <div class="app-header-content"> 
		            <div class="row justify-content-between align-items-center">
				    <div class="col-auto">
					    <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
						    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img"><title>Menu</title><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path></svg>
					    </a>
				    </div><!--//col-->
		            <div class="app-utilities col-auto">		            
			            <div class="app-utility-item app-user-dropdown dropdown">

				            <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><img src="assets/images/user.png"><?= $fullname;?></a>
				            <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
								<li><a class="dropdown-item" href="function/logout.php">Log Out</a></li>
							</ul>
			            </div>
		            </div>
		        </div>
	            </div>
	        </div>
        </div>
        <div id="app-sidepanel" class="app-sidepanel sidepanel-hidden"> 
			<div id="sidepanel-drop" class="sidepanel-drop"></div>
				<div class="sidepanel-inner d-flex flex-column">
		        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
		        <div class="app_logo">
					<img style="width: 150px; display:flex; margin-left: 50px; margin-top: 10px;" src="assets/images/dwcl.png" alt="logo">
		        </div>
			    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
				<ul class="app-menu list-unstyled accordion" id="menu-accordion">
                <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
				<ul class="app-menu list-unstyled accordion" id="menu-accordion">
                <li class="nav-item has-submenu">

    <a class="nav-link submenu-toggle active" href="healthrecordformshs.php" data-bs-target="#submenu-4" aria-controls="submenu-4">
        <span class="nav-icon">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
           <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-files" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4z"/>
                    <path d="M6 0h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1H4a2 2 0 0 1 2-2z"/>
                </svg>
        </span>
        <span class="nav-link-text">Health Profile</span>
    </a>
</li>



	<li class="nav-item has-submenu">
								<a class="nav-link submenu-toggle active" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-2" aria-expanded="false" aria-controls="submenu-2">
									<span class="nav-icon">
										<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-plus" viewBox="0 0 16 16">
											<path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/>
											<path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z"/>
											</svg>
									</span>
									<span class="nav-link-text">Request Scheduling Appointment</span>
									<span class="submenu-arrow">
										<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
										</svg>
									</span>
								</a>
								<div id="submenu-2" class="collapse submenu submenu-2" data-bs-parent="#menu-accordion">
									<ul class="submenu-list list-unstyled">
										<li class="submenu-item"><a class="submenu-link" href="adddentalmessageshs.php">Request Dental Scheduling</a></li>
										<li class="submenu-item"><a class="submenu-link" href="addmedicalmessageshs.php">Request Medical Scheduling</a></li>
										<li class="submenu-item"><a class="submenu-link" href="addphysicianmessageshs.php">Request Physician Scheduling</a></li>
									</ul>
								</div>
							</li>


							<li class="nav-item has-submenu">
								<a class="nav-link submenu-toggle active" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-3" aria-expanded="false" aria-controls="submenu-3">
									<span class="nav-icon">
										<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-stickies" viewBox="0 0 16 16">
										<path d="M1.5 0A1.5 1.5 0 0 0 0 1.5V13a1 1 0 0 0 1 1V1.5a.5.5 0 0 1 .5-.5H14a1 1 0 0 0-1-1H1.5z"/>
										<path d="M3.5 2A1.5 1.5 0 0 0 2 3.5v11A1.5 1.5 0 0 0 3.5 16h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 16 9.586V3.5A1.5 1.5 0 0 0 14.5 2h-11zM3 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V9h-4.5A1.5 1.5 0 0 0 9 10.5V15H3.5a.5.5 0 0 1-.5-.5v-11zm7 11.293V10.5a.5.5 0 0 1 .5-.5h4.293L10 14.793z"/>
										</svg>
									</span>
									<span class="nav-link-text">Clinic Records</span>
									<span class="submenu-arrow">
										<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
										</svg>
									</span>
								</a>
								<div id="submenu-3" class="collapse submenu submenu-3" data-bs-parent="#menu-accordion">
									<ul class="submenu-list list-unstyled">
									<li class="submenu-item"> <a class="submenu-link" href="viewhealthrecordprofileshs.php">Health Profile Record</a>
									<li class="submenu-item"> <a class="submenu-link" href="viewdentalappshs.php">Dental Record</a>
                                    <li class="submenu-item"> <a class="submenu-link" href="viewmedicalappshs.php">Medical Record</a>
                                    <li class="submenu-item"> <a class="submenu-link" href="viewphysicianappshs.php">Physician Record</a>
									<li class="submenu-item"> <a class="submenu-link" href="viewdiagnosisappshs.php">Diagnosis/Chief Complaints, Management & Treatment Record</a>
									<li class="submenu-item"> <a class="submenu-link" href="viewconsultationformshs.php">Consultation Form Record</a>
									<li class="submenu-item"> <a class="submenu-link" href="viewschoolassesshs.php">School Health Assessment Record</a>
									<li class="submenu-item"> <a class="submenu-link" href="viewweightmonitoringshs.php">Weight Monitoring Record</a>
									<li class="submenu-item"> <a class="submenu-link" href="viewvitalsignsshs.php">Vital Signs Monitoring Record</a>
									<li class="submenu-item"> <a class="submenu-link" href="viewphysicalexaminationrecordshs.php">Physical Examination Record</a>	
									<li class="submenu-item"> <a class="submenu-link" href="viewnursenotesshs.php">Nurse's Notes Record</a>					
									<li class="submenu-item"> <a class="submenu-link" href="viewphysicianorderandprogressnotesshs.php">Physician's Order Sheet and Progress Notes Record</a>
								</li>
									</ul>
								</div>
							</li>
				    </ul>
			    </nav>
	        </div>
	    </div>
    </header>
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
				    <div class="app-card-header px-4 py-3" style="background-color: #1a14cc;">
				        <div class="row g-3 align-items-center">
					        <div class="col-12 col-lg-auto text-center text-lg-start">
						        <h4 class="notification-title mb-1" style="color: #fff;">Please fill-up honestly.</h4>
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
                <input id="fullname" name="fullname" type="text" class="input-box" value="<?= $fullname; ?>" readonly>
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

