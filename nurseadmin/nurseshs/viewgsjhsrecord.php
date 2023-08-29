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
$idnumber = $_GET['idnumber'];

// Retrieve the health record for the given ID number
$sql = "SELECT * FROM healthrecordformgsjhs WHERE idnumber = '$idnumber'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = $result->fetch_assoc(); 
  $image = $row['image'];
  $gradelevel = $row['gradelevel'];
  $idnumber = $row['role'];
  $fullname= $row['fullname'];
  $cp = $row['cp'];
  $age = $row['idnumber'];
  $gender = $row['gender'];
  $address = $row ['address'];
  $paddress = $row ['paddress'];
  $father = $row['father'];
  $cfather = $row['cfather'];
  $mother = $row['mother'];
  $cmother = $row['cmother'];
  $religion = $row['religion'];
  $nationality = $row['nationality'];
  $language = $row['language'];
  $bothparents = $row['bothparents'];
  $livesfather = $row['livesfather'];
  $livesmother = $row['livesmother'];
  $guardian = $row['guardian'];
  $guardianname = $row['guardianname'];
  $guardianrelation = $row['guardianrelation'];
  $cguardian = $row['cguardian'];
  $altrelation = $row['altrelation'];
  $altrel = $row['altrel'];
  $acontact = $row['acontact'];
  $bcg = $row['bcg'];
  $dpt = $row['dpt'];
  $opv = ['opv'];
  $hepa = $row['hepa'];
  $measles = $row['measles'];
  $others = $row['others'];
  $firstdose =$row ['firstdose'];
  $seconddose = $row['seconddose'];
  $boosterdose =$row['boosterdose'];
  $no = $row['no'];
  $imagevac = $row['imagevac'];
  $asthma = $row['asthma'];
  $faintingspells = $row['faintingspells'];
  $allergicrhinitis = $row['allergicrhinitis'];
  $freqheadache =$row['freqheadache'];
  $anxietydis =$row['anxietydis'];
  $g6pd = $row['g6pd'];
  $bleedingclotting =$row['bleedingclotting'];
  $hearingprob =$row['hearingprob'];
  $hypergas = $row['hypergas'];
  $derma =$row['derma'];
  $hypertension =$row['hypertension'];
  $diabetes = $row['diabetes'];
  $hyperventilation =$row['hyperventilation'];
  $mens =$row['mens'];
  $othersmedical = $row['othersmedical'];
  $heartcondition =$row['heartcondition'];
  $eyeproblem =$row['eyeproblem'];
  $illness = $row['illness'];
  $injuries =$row['injuries'];
  $treatment =$row['treatment'];
  $medication = $row['medication'];
  $food =$row['food'];
  $firstaid =$row['firstaid'];
  $concernshealth =$row['concernshealth'];


    }
 else {
 } 
?>
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
				            <img src="assets/images/user.png">
				             <div class="app-utility-item app-user-dropdown dropdown">

                   <?php  if (isset($_SESSION['username'])) : ?>
                                    <p><?php echo $_SESSION['username']; ?></p>
                                    <?php endif ?></a>
                   </div>
				   <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"></a>
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


                <li class="nav-item has-submenu">
        <a class="nav-link submenu-toggle active" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-3" aria-expanded="false" aria-controls="submenu-3">
            <span class="nav-icon">
                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-flag" viewBox="0 0 16 16">
                <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001M14 1.221c-.22.078-.48.167-.766.255-.81.252-1.872.523-2.734.523-.886 0-1.592-.286-2.203-.534l-.008-.003C7.662 1.21 7.139 1 6.5 1c-.669 0-1.606.229-2.415.478A21.294 21.294 0 0 0 3 1.845v6.433c.22-.078.48-.167.766-.255C4.576 7.77 5.638 7.5 6.5 7.5c.847 0 1.548.28 2.158.525l.028.01C9.32 8.29 9.86 8.5 10.5 8.5c.668 0 1.606-.229 2.415-.478A21.317 21.317 0 0 0 14 7.655V1.222z"/>
                </svg>
            </span>
            <span class="nav-link-text">Report Generation</span>
            <span class="submenu-arrow">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                </svg>
            </span>
        </a>
        <div id="submenu-3" class="collapse submenu submenu-1" data-bs-parent="#menu-accordion">
            <ul class="submenu-list list-unstyled">
                <li class="submenu-item"><a class="submenu-link" href="totalappointments.php">Total Medical Appointment Reports</a></li>
                <li class="submenu-item"><a class="submenu-link" href="totaldentalappointments.php">Total Dental Appointment Reports</a></li>
                <li class="submenu-item"><a class="submenu-link" href="totalphysicianappointments.php">Total Physician Appointment Reports</a></li>
                <li class="submenu-item"><a class="submenu-link" href="totalvisitors.php">Total Clinic Visitors</a></li>
                <li class="submenu-item"><a class="submenu-link" href="totalmedicines.php">Total Medicine Cosumes</a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item has-submenu">
        <a class="nav-link submenu-toggle active" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-1" aria-expanded="false" aria-controls="submenu-1">
            <span class="nav-icon">
                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-files" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4z"/>
                    <path d="M6 0h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1H4a2 2 0 0 1 2-2z"/>
                </svg>
            </span>
            <span class="nav-link-text">Health Profiles</span>
            <span class="submenu-arrow">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                </svg>
            </span>
        </a>
        <div id="submenu-1" class="collapse submenu submenu-1" data-bs-parent="#menu-accordion">
            <ul class="submenu-list list-unstyled">
            <li class="submenu-item"><a class="submenu-link active" href="gsjhslists.php">Grade School and Junior High School Building</a></li>
                <li class="submenu-item"><a class="submenu-link" href="shslist.php">Senior High School Building</a></li>
                <li class="submenu-item"><a class="submenu-link" href="collegelists.php">College Building</a></li>
            </ul>
        </div>
    </li>

<li class="nav-item has-submenu">
    <a class="nav-link submenu-toggle active" href="medicalshs.php" data-bs-target="#submenu-4" aria-controls="submenu-4">
        <span class="nav-icon">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-check" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
            </svg>
        </span>
        <span class="nav-link-text">Medical Approved Appointments</span>
    </a>
</li>

    <li class="nav-item has-submenu">
    <a class="nav-link submenu-toggle active" href="consultationformshs.php" data-bs-target="#submenu-4" aria-controls="submenu-4">
        <span class="nav-icon">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-text" viewBox="0 0 16 16">
            <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
            </svg>
        </span>
        <span class="nav-link-text">Consultation Form</span>
    </a>
</li>

<li class="nav-item has-submenu">
    <a class="nav-link submenu-toggle active" href="schoolhealthassessmentformshs.php" data-bs-target="#submenu-4" aria-controls="submenu-4">
        <span class="nav-icon">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-medical" viewBox="0 0 16 16">
            <path d="M8.5 4.5a.5.5 0 0 0-1 0v.634l-.549-.317a.5.5 0 1 0-.5.866L7 6l-.549.317a.5.5 0 1 0 .5.866l.549-.317V7.5a.5.5 0 1 0 1 0v-.634l.549.317a.5.5 0 1 0 .5-.866L9 6l.549-.317a.5.5 0 1 0-.5-.866l-.549.317V4.5zM5.5 9a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 2a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"/>
            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
            </svg>
        </span>
        <span class="nav-link-text">School Health Assessment Form</span>
    </a>
</li>

<li class="nav-item has-submenu">
    <a class="nav-link submenu-toggle active" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-6" aria-expanded="false" aria-controls="submenu-5">
        <span class="nav-icon">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-diff" viewBox="0 0 16 16">
            <path d="M8 5a.5.5 0 0 1 .5.5V7H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V8H6a.5.5 0 0 1 0-1h1.5V5.5A.5.5 0 0 1 8 5zm-2.5 6.5A.5.5 0 0 1 6 11h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"/>
            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
            </svg>
        </span>
        <span class="nav-link-text">Monitoring Sheet</span>
        <span class="submenu-arrow">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
            </svg>
        </span>
    </a>
    <div id="submenu-6" class="collapse submenu submenu-3" data-bs-parent="#menu-accordion">
        <ul class="submenu-list list-unstyled">
            <li class="submenu-item"><a class="submenu-link" href="weightmonitoringshs.php">Weight Monitoring Sheet</a></li>
            <li class="submenu-item"><a class="submenu-link" href="vitalsignsmonitoringshs.php">Vital Signs Monitoring Sheet</a></li>
        </ul>
    </div>
</li>

<li class="nav-item has-submenu">
    <a class="nav-link submenu-toggle active" href="nursenotesshs.php" data-bs-target="#submenu-7" aria-controls="submenu-4">
        <span class="nav-icon">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-plus" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5z"/>
            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
            </svg>
        </span>
        <span class="nav-link-text">Nurse's Notes</span>
    </a>
</li>

<li class="nav-item has-submenu">
    <a class="nav-link submenu-toggle active" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-8" aria-expanded="false" aria-controls="submenu-5">
        <span class="nav-icon">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
            <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
            </svg>
        </span>
        <span class="nav-link-text">Printable Papers</span>
        <span class="submenu-arrow">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
            </svg>
        </span>
    </a>
    <div id="submenu-8" class="collapse submenu submenu-8" data-bs-parent="#menu-accordion">
        <ul class="submenu-list list-unstyled">
            <li class="submenu-item"><a class="submenu-link" href="healthprofileshs.php">Health Profile</a></li>
            <li class="submenu-item"><a class="submenu-link" href="healthdeclarationshs.php">Health Declaration</a></li>
            <li class="submenu-item"><a class="submenu-link" href="medicalcertificateshs.php">Medical Certificate</a></li>
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
					        </div><!--//col-->
				        </div><!--//row-->
				    </div><!--//app-card-header-->
				    <div class="app-card-body p-4">
							<div class="align_form">
								<div class="input_form">
								<div class="input_wrap">
							<label></label>
							<div class="image_container">
							<br>
								<img src="<?php echo "/CAPSTONE1/upload_image/".$row['image'];?>">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Your Image</label>
							</div>
						</div>

    <div class="input_wrap">
        <label for="gradelevel">Grade Level</label>
        <input id="gradelevel" name="gradelevel" type="text" value="<?=$row['gradelevel'];?>" readonly >
    </div>
    <div class="input_wrap">
                <label for="fullname">Role</label>
                <select class="form-select" name="role">
                <option disabled selected><?= $row['role'];?></option>
                </select>
        </div>
<div class="input_wrap">
        <label for="fullname">Full Name</label>
        <input id="fullname" name="fullname" type="text" value="<?= $fullname; ?>" >
    </div>
                    </div>
                    </div>
                    <br><br>
<div class="input_form">
    <div class="input_wrap">
    
        <label for="fullname">ID Number</label>
        <input name="idnumber" type="text" value="<?=$row['idnumber'];?>" readonly >
    </div>
    <div class="input_wrap">
        <label for="fullname">Personal Contact Number</label>
        <input name="cp" type="text" value="<?=$row['cp'];?>" readonly>
    </div>
    <div class="input_wrap">
        <label for="fullname">Age</label>
        <input name="age" type="text" value="<?=$row['age'];?>" readonly>
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
        <label for="fullname">Present Address</label>
        <input name="paddress" id="paddress" type="text" value="<?=$row['paddress'];?>" readonly>
    </div>
 </div>
<div class="input_form">
<div class="input_wrap">
    <label for="fullname">Name of Father</label>
    <input name="fathername" id="father" type="text" value="<?=$row['father'];?>" readonly>
</div>

<div class="input_wrap">
    <label for="fullname">Contact</label>
    <input name="cfather" id="cfather" type="text" value="<?=$row['cfather'];?>" readonly>
</div>
</div>

<div class="input_form">
<div class="input_wrap">
    <label for="fullname">Name of Mother</label>
    <input name="mothername" id="mother" type="text" value="<?=$row['mother'];?>" readonly>
</div>

<div class="input_wrap">
    <label for="fullname">Contact</label>
    <input name="cmother" id="cmother" type="text" value="<?=$row['cmother'];?>" readonly>
</div>
</div>

<div class="input_form">
<div class="input_wrap">
    <label for="fullname">Religion</label>
    <input name="religion" id="religion" type="text" value="<?=$row['religion'];?>" readonly>
</div>

<div class="input_wrap">
    <label for="fullname">Nationality</label>
    <input name="nationality" id="nationality" type="text" value="<?=$row['nationality'];?>" readonly>
</div>
</div>

<div class="input_form">
    <div class="input_wrap">
        <label for="fullname">Primary Language Spoken (Bicol, Tagalog, English, etc.)</label>
        <input name="language" id ="language" type="text" value="<?=$row['language'];?>" readonly>
    </div>
</div>
<br>
 <div class="input_form">
    <label for="fullname">Student lives with: </label>
</div><br>
<div class="checkbox">
    <input name="bothparents" value="bothparents" type="checkbox" id="bothparents" value="<?= $row['bothparents'];?>" <?php if ($row['bothparents']) echo "checked"; ?>>
    <label class="labels" for="bothparents" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Both Parents</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
    <input name="livesmother" value="livesmother" type="checkbox" id="mother" value="<?= $row['mother'];?>" <?php if ($row['mother']) echo "checked"; ?>>
    <label class="labels" for="livesmother" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mother</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
    <input name="livesfather" value="livesfather" type="checkbox" id="father" value="<?= $row['father'];?>" <?php if ($row['father']) echo "checked"; ?>>
    <label class="labels" for="livesfather" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Father</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
    <input name="guardian" value="guardian" type="checkbox" id="guardian" value="<?= $row['guardian'];?>" <?php if ($row['guardian']) echo "checked"; ?>>
    <label class="labels" for="guardian" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Guardian</label>
</div>
<div class="input_form">
<div class="input_wrap">
    <label for="fullname">Guardian's Name (In case the student is living with Guadian)</label>
    <input name="guardianname" id="guardianname" type="text"  value="<?=$row['guardianname'];?>" readonly>
</div>
<div class="input_wrap">
    <label for="fullname">Guardian's relation to the student/employee</label>
    <input name="guardianrelation" id="guardianrelation" type="text" value="<?=$row['guardianrelation'];?>" readonly>
</div>
</div>
<div class="input_form">
<div class="input_wrap">
    <label for="fullname">Contact</label>
    <input name="cguardian" id="cguardian" type="text"  value="<?=$row['cguardian'];?>" readonly>
</div>
</div>
<div class="input_form">
<div class="input_wrap">
    <label for="fullname">Alternation Person to Contact in Case of Emergency</label>
    <input name="altrelation" id="altrelation" type="text" value="<?=$row['altrelation'];?>" readonly>
</div>
<div class="input_wrap">
    <label for="fullname">Relationship to the student/employee</label>
    <input name="altrel" id="altrel" type="text" value="<?=$row['altrel'];?>" readonly>
</div>
<div class="input_wrap">
    <label for="fullname">Contact</label>
    <input name="acontact" id="acontact" type="text" value="<?=$row['acontact'];?>" readonly>
</div>
</div>

<div>
<p class="title_">IMMUNIZATION</p>
</div>
<p>Please select the box if your child/ward had completed the following Primary Immunization. The Employee may ignore this.</p>

<div class="input_form">
</div>
<div class="checkbox">
    <input name="bcg" value="bcg" type="checkbox" id="bcg" value="<?= $row['bcg'];?>" <?php if ($row['bcg']) echo "checked"; ?>>
    <label class="labels" for="bcg" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BCG</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
    <input name="dpt" value="dpt" type="checkbox" id="dpt" value="<?= $row['dpt'];?>" <?php if ($row['dpt']) echo "checked"; ?>>
    <label class="labels" for="dpt" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DPT</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
    <input name="opv" value="opv" type="checkbox" id="opv" value="<?= $row['opv'];?>" <?php if ($row['opv']) echo "checked"; ?>>
    <label class="labels" for="opv" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OPV</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
    <input name="hepa" value="hepa" type="checkbox" id="hepa" value="<?= $row['hepa'];?>" <?php if ($row['hepa']) echo "checked"; ?>>
    <label class="labels" for="hepa" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hepa B</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
    <input name="measles" value="measles" type="checkbox" id="measles" value="<?= $row['measles'];?>" <?php if ($row['measles']) echo "checked"; ?>>
    <label class="labels" for="measles" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Measles</label>
</div>
<div class="input_wrap">
    <label for="fullname">Others</label>
    <input name="others" id="others" type="text" value="<?=$row['others'];?>" readonly>
</div>
<br>
<p>Does your child/ward have COVID-19 Vacination? (If with First, Second or Booster dose, please attach a screenshot of Vaccination Card). The Employee is required to answer this.</p>

<div class="input_form">
</div>
<div class="checkbox">
<input name="firstdose" value="firstdose" type="checkbox" id="firstdose" value="<?= $row['firstdose'];?>" <?php if ($row['firstdose']) echo "checked"; ?>>
<label class="labels" for="firstdose" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;First Dose Only</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
<input name="seconddose" value="seconddose" type="checkbox" id="seconddose" value="<?= $row['seconddose'];?>" <?php if ($row['seconddose']) echo "checked"; ?>>
<label class="labels" for="seconddose" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Second Dose</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
<input name="boosterdose" type="checkbox" id="boosterdose" value="<?= $row['boosterdose'];?>" <?php if ($row['boosterdose']) echo "checked"; ?>>
<label class="labels" for="boosterdose" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Booster Dose</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
<input name="no" value="no" type="checkbox" id="no" value="<?= $row['no'];?>" <?php if ($row['no']) echo "checked"; ?>>
<label class="labels" for="no" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="input_wrap">
<div class="image_container">
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Vaccination Attachment</label>
    <img src="<?php echo "/CAPSTONE1/upload_image/".$row['imagevac'];?>">
</div>
    </div>

<div>
    <br><br>
<p class="title_">Medical History</p>
</div>
<p>Does you/your child have/ or history of the following conditions?
<div class="input_form">
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
<input name="asthma" value="asthma" type="checkbox" id="asthma" value="<?= $row['asthma'];?>" <?php if ($row['asthma']) echo "checked"; ?>>
<label class="labels" for="asthma" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Asthma</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
<input name="faintingspells" value="faintingspells" type="checkbox" id="faintingspells" value="<?= $row['faintingspells'];?>" <?php if ($row['faintingspells']) echo "checked"; ?>>
<label class="labels" for="faintingspells" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fainting Spells</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
<input name="allergicrhinitis" value="allergicrhinitis" type="checkbox" id="allergicrhinitis" value="<?= $row['allergicrhinitis'];?>" <?php if ($row['allergicrhinitis']) echo "checked"; ?>>
<label class="labels" for="allergicrhinitis" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Allergic Rhinitis</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
<input name="freqheadache" value="freqheadache" type="checkbox" id="freqheadache" value="<?= $row['freqheadache'];?>" <?php if ($row['freqheadache']) echo "checked"; ?>>
<label class="labels" for="freqheadache" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Frequent Headache</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="input_form">
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
<input name="anxietydis" value="anxietydis" type="checkbox" id="anxietydis" value="<?= $row['anxietydis'];?>" <?php if ($row['anxietydis']) echo "checked"; ?>>
<label class="labels" for="anxietydis" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Anxiety Disoder</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
<input name="g6pd" value="g6pd" type="checkbox" id="g6pd" value="<?= $row['g6pd'];?>" <?php if ($row['g6pd']) echo "checked"; ?>>
<label class="labels" for="g6pd" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;G6PD</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
<input name="bleedingclotting" value="bleedingclotting" type="checkbox" id="bleedingclotting" value="<?= $row['bleedingclotting'];?>" <?php if ($row['bleedingclotting']) echo "checked"; ?>>
<label class="labels" for="bleedingclotting" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bleeding/Clotting Disorder</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
<input name="hearingprob" value="hearingprob" type="checkbox" id="hearingprob" value="<?= $row['hearingprob'];?>" <?php if ($row['hearingprob']) echo "checked"; ?>>
<label class="labels" for="hearingprob" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hearing Problem</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<br><br>
<div class="input_form">
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
<input name="hypergas" value="hypergas" type="checkbox" id="hypergas" value="<?= $row['hypergas'];?>" <?php if ($row['hypergas']) echo "checked"; ?>>
<label class="labels" for="hypergas" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hyperacidity/Gastritis</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
<input name="derma" value="derma" type="checkbox" id="derma" value="<?= $row['derma'];?>" <?php if ($row['derma']) echo "checked"; ?>>
<label class="labels" for="derma" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dermatitis/Skin Problem</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
<input name="hypertension" value="hypertension" type="checkbox" id="hypertension" value="<?= $row['hypertension'];?>" <?php if ($row['hypertension']) echo "checked"; ?>>
<label class="labels" for="hypertension" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hypertension</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
<input name="diabetes" value="diabetes" type="checkbox" id="diabetes" value="<?= $row['diabetes'];?>" <?php if ($row['diabetes']) echo "checked"; ?>>
<label class="labels" for="diabetes" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Diabetes Mellitus</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<br><br>
<div class="input_form">
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
<input name="hyperventilation" value="hyperventilation" type="checkbox" id="hyperventilation" value="<?= $row['hyperventilation'];?>" <?php if ($row['hyperventilation']) echo "checked"; ?>>
<label class="labels" for="hyperventilation" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hyperventilation</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
<input name="mens" value="mens" type="checkbox" id="mens" value="<?= $row['mens'];?>" <?php if ($row['mens']) echo "checked"; ?>>
<label class="labels" for="mens" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dysmenorrhea/Menstrual Cramps</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <div class="input_wrap">
        <label for="fullname">Others</label>
        <input name="othersmedical" id ="othersmedical" type="text" placeholder="Other Conditions"  value="<?=$row['othersmedical'];?>" readonly>
    </div>

    <div class="input_form">   
    <div class="input_wrap">
        <label for="fullname">Do you have a heart condition? (If yes, please specify.)</label>
        <input name="heartcondition" id ="language" type="text" value="<?=$row['heartcondition'];?>" readonly>
    </div>   
</div>
    <div class="input_form">   
    <div class="input_wrap">
        <label for="fullname">Do you have an Eye problem? (If yes, please specify.)</label>
        <input name="eyeproblem" id ="language" type="text" value="<?=$row['eyeproblem'];?>" readonly>
    </div>
</div>
<div class="input_form"> 
    <div class="input_wrap">
        <label for="fullname">Do you have a history of serious illness and/or hospitalization? (Please specify and include dates.)</label>
        <input name="illness" id ="language" type="text" value="<?=$row['illness'];?>" readonly>
    </div>
</div>

<div class="input_form"> 
    <div class="input_wrap">
        <label for="fullname">Do you have a history of surgeries and/or injuries? (Please specify and include dates.)</label>
        <input name="injuries" id ="language" type="text" value="<?=$row['injuries'];?>" readonly>
    </div>
</div>

<div class="input_form"> 
    <div class="input_wrap">
        <label for="fullname">Do receive any medication or medical treatment, either regulary or occasionally? (If yes, please explain.)</label>
        <input name="treatment" id ="language" type="text" value="<?=$row['treatment'];?>" readonly>
    </div>
</div>

<div class="input_form"> 
    <div class="input_wrap">
        <label for="fullname">Do you have any allergies to medication? (If yes, please specify.)</label>
        <input name="medication" id ="language" type="text" value="<?=$row['medication'];?>" readonly>
    </div>
</div>

<div class="input_form"> 
    <div class="input_wrap">
        <label for="fullname">Do you have any allergies to food? (If yes, please specify.)</label>
        <input name="food" id ="language" type="text" value="<?=$row['food'];?>" readonly>
    </div>
</div>

<div class="input_form"> 
    <div class="input_wrap">
        <label for="fullname">Would you like to receive minor first aid (medication & treatment) given
            by the nurse in the school clinic?</label>
        <input name="firstaid" id ="language" type="text" value="<?=$row['firstaid'];?>" readonly>
    </div>
                    </div>
<div class="input_form"> 
    <div class="input_wrap">
        <label for="fullname">Do you have any concerns related to your health? (If yes, please explain.)</label>
        <input name="concernshealth" id ="language" type="text" value="<?=$row['concernshealth'];?>" readonly>
</div>
                    </div>

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
