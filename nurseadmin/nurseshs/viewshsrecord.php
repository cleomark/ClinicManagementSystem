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
	<link rel="stylesheet" href="assets/formstyle.css">

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
  $gradelevel = $row['gradelevel'];
  $fullname= $row['fullname'];
  $idnumber = $row['role'];
  $phoneno = $row['phoneno'];
  $age = $row['idnumber'];
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
  $medpresent =$row['medpresent'];
  $notified =$row['notified'];
  $contact = $row['contact'];
  $relationship =$row['relationship'];


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
            <li class="submenu-item"><a class="submenu-link" href="gsjhslists.php">Grade School and Junior High School Building</a></li>
                <li class="submenu-item"><a class="submenu-link active" href="shslist.php">Senior High School Building</a></li>
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
                            </div>
                    <br><br>
        <div class="input_form">
            <div class="input_wrap">
                <label for="fullname">ID Number</label>
                <input name="idnumber" type="text" value="<?=$row['idnumber'];?>" readonly>
            </div>
            <div class="input_wrap">
                <label for="fullname">Age</label>
                <input name="age" type="text" value="<?=$row['age'];?>" readonly>
            </div>
            <div class="input_wrap">
                <label for="fullname">Personal Contact No</label>
                <input name="phoneno" type="text" value="<?=$row['phoneno'];?>" readonly>
            </div>
         <div class="input_wrap">
         <label for="fullname">Role</label>
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
            <div class="input_wrap">
                <label for="fullname">Is your child taking any medications at present? If YES, please list the name of the medicine/s:</label>
                <input name="medpresent" id ="language" type="text" value="<?=$row['medpresent'];?>" readonly>
            </div>
   </div>

   <div class="input_form"> 
            <div class="input_wrap">
                <label for="fullname">Person to be notified in case of emergency:</label>
                <input name="notified" id ="languagessss" type="text" value="<?=$row['notified'];?>" readonly>
            </div>
            <div class="input_wrap">
                <label for="fullname">Contact Number</label>
                <input name="contact" id ="languagess" type="text" value="<?=$row['contact'];?>" readonly>
            </div>
            <div class="input_wrap">
                <label for="fullname">Relationship</label>
                <input name="relationship" id ="relationship" type="text" value="<?=$row['relationship'];?>" readonly>
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

V