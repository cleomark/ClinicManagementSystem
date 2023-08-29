<?php
    session_start();
    include '../../db.php';

    if (!isset($_SESSION['admin_id'])){
        echo '<script>window.alert("PLEASE LOGIN FIRST!!")</script>';
        echo '<script>window.location.replace("../login.php");</script>';
        exit; // Exit the script to prevent further execution
    }
    $admin_id = $_SESSION['admin_id'];
    $sql_query = "SELECT * FROM admins WHERE admin_id ='$admin_id'";
    $result = $conn->query($sql_query);
    while($row = $result->fetch_array()){
        $admin_id = $row['admin_id'];
        $username = $row['username'];
        require_once('../../db.php');
        if($_SESSION['role'] == 1){
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
    <title>Employee Medical Requests</title>
    
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
	<link rel="stylesheet" href="assets/table.css">
    <link rel="stylesheet" href="assets/msdental.css">

  
</head> 

<body class="app">   
<?php

$sql = "SELECT * FROM medical";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = $result->fetch_assoc(); 
    $med_id = $row['med_id'];
    $name1 = $row['name1'];
    $gradecourseyear1 = $row ['gradecourseyear1'];
    $idnumber2 = $row['idnumber2'];
    $name2 = $row['name2'];
    $gradecourseyear2 = $row ['gradecourseyear2'];
    $idnumber3 = $row['idnumber3'];
    $name3 = $row['name3'];
    $gradecourseyear3 = $row ['gradecourseyear3'];
    $idnumber4 = $row['idnumber4'];
    $name4 = $row['name4'];
    $gradecourseyear4 = $row ['gradecourseyear4'];
    $idnumber5 = $row['idnumber5'];
    $name5 = $row['name5'];
    $gradecourseyear5 = $row ['gradecourseyear5'];
    $c_enrolled = $row['c_enrolled'];
    $c_employee = $row['c_employee'];
    $onoff = $row['onoff'];
    $message = $row['message'];
    $date_created = $row['date_created'];
    $is_read = $row['is_read'];
    $is_deleted_on_website = $row['is_deleted_on_website'];
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
                <li class="submenu-item"><a class="submenu-link" href="shslist.php">Senior High School Building</a></li>
                <li class="submenu-item"><a class="submenu-link" href="collegelists.php">College Building</a></li>
            </ul>
        </div>
    </li>

    
<li class="nav-item has-submenu">
    <a class="nav-link submenu-toggle active" href="medicalgsjhs.php" data-bs-target="#submenu-4" aria-controls="submenu-4">
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
    <a class="nav-link submenu-toggle active" href="patientmanagementrecordgsjhs.php" data-bs-target="#submenu-4" aria-controls="submenu-4">
        <span class="nav-icon">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-text" viewBox="0 0 16 16">
            <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
            </svg>
        </span>
        <span class="nav-link-text">Patient's Management Record</span>
    </a>
</li>

<li class="nav-item has-submenu">
    <a class="nav-link submenu-toggle active" href="schoolhealthassessmentformgsjhs.php" data-bs-target="#submenu-4" aria-controls="submenu-4">
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
            <li class="submenu-item"><a class="submenu-link" href="healthprofilegsjhs.php">Health Profile</a></li>
            <li class="submenu-item"><a class="submenu-link" href="healthdeclarationgsjhs.php">Health Declaration</a></li>
            <li class="submenu-item"><a class="submenu-link" href="medicalcertificategsjhs.php">Medical Certificate</a></li>
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
					        <h1 class="app-page-title mb-0"></h1>
					    </div>
						
				    </div>
			    </div>
			    
                <div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
					        <div class="col-12 col-lg-auto text-center text-lg-start">
						        <h4 class="notification-title mb-1"></h4>
					        </div>
							<!--//generate report-->
				        </div><!--//row-->
				    </div><!--//app-card-header-->
                    <?php
    $sql = "SELECT * FROM medical WHERE c_employee= 'Employee in GS and JHS'";
    $result = $conn->query($sql);

    while ($row = $result->fetch_array()) {
        $med_id = $row['med_id'];
        $is_read = $row['is_read'];
        $is_deleted_on_website = $row['is_deleted_on_website'];
        ?>
     
     <div class="main-content">
     <?php if ($is_deleted_on_website == 0): ?>
        <div class="email-list-item <?php echo ($is_read == 0) ? 'unread' : ''; ?>" <?php echo ($is_read == 0) ? 'style="background-color: #F1F1F1;"' : ''; ?>>

        <div class="message">
                <b><div class="name1" style="display: inline;"><?php echo $row['name1']; ?></div></b>
                <div class="message" style="display: inline;"><?php echo $row['message']; ?></div>
                <div class="timestamp"><?php echo $row['date_created']; ?></div>
            </div>

            <?php if ($is_read == 0): ?>
                <a href="function/formedicalrequestreademployee.php?med_id=<?php echo $med_id; ?>">Mark as Read</a>
            <?php endif; ?>

            <a href="function/formedicaldeleteemployee.php?med_id=<?php echo $med_id; ?>" onclick="return confirm('Are you sure you want to delete this message?')">Deleted</a>
            
            <a href="viewmedicalrequestsemployeesgsjhs.php?date_created=<?php echo $row['date_created']; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-view-list" viewBox="0 0 16 16">
                    <path d="M3 4.5h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1H3zM1 2a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 2zm0 12a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 14z"/>
                </svg>
            </a>

        <?php endif; ?>


    </div>



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
