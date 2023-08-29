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
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="assets/images/dwcl.png"> 
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">
	<link rel="stylesheet" href="assets/formstyless.css">

  

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

    <a class="nav-link submenu-toggle active" href="healthrecordformgsjhs.php" data-bs-target="#submenu-4" aria-controls="submenu-4">
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
										<li class="submenu-item"><a class="submenu-link" href="adddentalmessagegsjhs.php">Request Dental Scheduling</a></li>
										<li class="submenu-item"><a class="submenu-link" href="addmedicalmessagegsjhs.php">Request Medical Scheduling</a></li>
										<li class="submenu-item"><a class="submenu-link" href="addphysicianmessagegsjhs.php">Request Physician Scheduling</a></li>
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
									<li class="submenu-item"> <a class="submenu-link" href="viewhealthrecordprofile.php">Health Profile Record</a>
									<li class="submenu-item"> <a class="submenu-link" href="viewdentalappgsjhs.php">Dental Record</a>
                                    <li class="submenu-item"> <a class="submenu-link" href="viewmedicalappgsjhs.php">Medical Record</a>
                                    <li class="submenu-item"> <a class="submenu-link" href="viewphysicianappgsjhs.php">Physician Record</a>
									<li class="submenu-item"> <a class="submenu-link" href="viewdiagnosisgsjhs.php">Diagnosis/Chief Complaints, Management & Treatment Record</a>
									<li class="submenu-item"> <a class="submenu-link" href="viewschoolassesgsjhs.php">School Health Assessment Record</a>
									<li class="submenu-item"> <a class="submenu-link" href="viewphysicalexaminationrecordgsjhs.php">Physical Examination Record</a>
									<li class="submenu-item"> <a class="submenu-link" href="viewphysicianorderandprogressnotesgsjhs.php">Physician's Order Sheet and Progress Notes Record</a>
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
					
                    <form class="form-horizontal mt-4" action="function/funct.php" method="POST" enctype="multipart/form-data"  onsubmit="return validateForm()">    
                    
                    <div class="align_form">

	
        <div class="input_form">

		<div class="input_wrap">
                <label for="image">Upload Image</label>
                <input type="file" name="image" id="image" required>
			</div>
            <div class="input_wrap">
                <label for="gradelevel">Grade Level</label>
                <input id="gradelevel" name="gradelevel" type="text">
            </div>
        <div class="input_wrap">
                <label for="fullname">Role</label>
                <select class="form-select" name="role">
                    <option value="" selected>Select Role</option>
                    <option value="Student in GS/JHS">Student in GS/JHS</option>
                    <option value="Employee in GS/JHS">Employee in GS/JHS</option>
                </select>
        </div>
        <div class="input_wrap">
                <label for="fullname">Full Name</label>
                <input id="fullname" name="fullname" type="text" value="<?= $fullname; ?>" readonly>
            </div>
                            </div>
                            </div>
        <div class="input_form">
            <div class="input_wrap">
                <label for="fullname">ID Number</label>
                <input name="idnumber" type="text" value="<?= $idnumber; ?>" readonly>
            </div>
            <div class="input_wrap">
            <label for="fullname">Personal Contact Number</label>
            <input name="cp" type="text" placeholder="+63" class="contactInput">
            <p class="errorMessage" style="color: red; display: none;">Invalid Phone Number</p>
        </div>

    
            <div class="input_wrap">
                <label for="fullname">Age</label>
                <input name="age" type="text">
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
            <label for="fullname">Contact</label>
            <input name="cfather" type="text" placeholder="+63" class="contactInput">
            <p class="errorMessage" style="color: red; display: none;">Invalid Phone Number</p>
        </div>
                            </div>

    <div class="input_form">
        <div class="input_wrap">
            <label for="fullname">Name of Mother</label>
            <input name="mother" id="mother" type="text">
        </div>

        <div class="input_wrap">
            <label for="fullname">Contact</label>
            <input name="cmother" type="text" placeholder="+63" class="contactInput">
            <p class="errorMessage" style="color: red; display: none;">Invalid Phone Number</p>
        </div>
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
            <input name="cguardian" type="text" placeholder="+63" class="contactInput">
            <p class="errorMessage" style="color: red; display: none;">Invalid Phone Number</p>
        </div>
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
            <input name="acontact" type="text" placeholder="+63" class="contactInput">
            <p class="errorMessage" style="color: red; display: none;">Invalid Phone Number</p>
        </div>
    </div>

    <div>
        <p class="title_">IMMUNIZATION</p>
    </div>
    <p>Please select the box if your child/ward had completed the following Primary Immunization. The Employee may ignore this.</p>

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
        <input name="boosterdose" value="booseterdose" type="checkbox" id="boosterdose">
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
   
            <div class="input_form">   
            <div class="input_wrap">
                <label for="fullname">Do you have a heart condition? (If yes, please specify.)</label>
                <input name="heartcondition" id ="language" type="text">
            </div>   
 </div>
            <div class="input_form">   
            <div class="input_wrap">
                <label for="fullname">Do you have an Eye problem? (If yes, please specify.)</label>
                <input name="eyeproblem" id ="language" type="text">
            </div>
  </div>
  <div class="input_form"> 
            <div class="input_wrap">
                <label for="fullname">Do you have a history of serious illness and/or hospitalization? (Please specify and include dates.)</label>
                <input name="illness" id ="language" type="text">
            </div>
   </div>

   <div class="input_form"> 
            <div class="input_wrap">
                <label for="fullname">Do you have a history of surgeries and/or injuries? (Please specify and include dates.)</label>
                <input name="injuries" id ="language" type="text">
            </div>
   </div>

   <div class="input_form"> 
            <div class="input_wrap">
                <label for="fullname">Do receive any medication or medical treatment, either regulary or occasionally? (If yes, please explain.)</label>
                <input name="treatment" id ="language" type="text">
            </div>
   </div>

   <div class="input_form"> 
            <div class="input_wrap">
                <label for="fullname">Do you have any allergies to medication? (If yes, please specify.)</label>
                <input name="medication" id ="language" type="text">
            </div>
   </div>

   <div class="input_form"> 
            <div class="input_wrap">
                <label for="fullname">Do you have any allergies to food? (If yes, please specify.)</label>
                <input name="food" id ="language" type="text">
            </div>
   </div>

   <div class="input_form"> 
            <div class="input_wrap">
                <label for="fullname">Would you like to receive minor first aid (medication & treatment) given
                    by the nurse in the school clinic?</label>
                <input name="firstaid" id ="language" type="text">
            </div>
                            </div>
 <div class="input_form"> 
            <div class="input_wrap">
                <label for="fullname">Do you have any concerns related to your health? (If yes, please explain.)</label>
                <input name="concernshealth" id ="language" type="text">
 </div>
                            </div>
 <div class="app-card-footer px-4 py-3" style="display: flex; justify-content: center;">
	<input type="text" name="user_id" style="display: none;" value="<?= $_SESSION['user_id'];?>">
   <button name="submit_data" class="btn btn-success">SUBMIT</button>
    </div>
</form>

<script>
        function validateForm() {
            var contactInputs = document.getElementsByClassName("contactInput");
            var isValid = true;

            for (var i = 0; i < contactInputs.length; i++) {
                var contactInput = contactInputs[i].value;

                if (!contactInput.startsWith("+63")) {
                    isValid = false;
                    document.getElementsByClassName("errorMessage")[i].style.display = "block";
                } else {
                    document.getElementsByClassName("errorMessage")[i].style.display = "none";
                }
            }

            return isValid;
        }
    </script>



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

