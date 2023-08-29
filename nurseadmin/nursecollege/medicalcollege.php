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
        if($_SESSION['role'] == 3){
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
    <title>Medical Appointments</title>
    
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
    <link rel="stylesheet" href="assets/dentalstyles.css">

</head> 

<body class="app">   	
<?php
$sql = "SELECT * FROM medicalapp";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = $result->fetch_assoc(); 
  $idnumber = $row['idnumber'];
  $fullname = $row['name1'];
  $gradecourseyear1 = $row['gradecourseyear1'];
  $role = $row['role'];
  $onoff  = $row['onoff'];
  $date_time = $row['date_time'];
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
    <a class="nav-link submenu-toggle active" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-5" aria-expanded="false" aria-controls="submenu-5">
        <span class="nav-icon">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                  <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
            </svg>
        </span>
        <span class="nav-link-text">Medical Requests</span>
        <span class="submenu-arrow">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
            </svg>
        </span>
    </a>
    <div id="submenu-5" class="collapse submenu submenu-3" data-bs-parent="#menu-accordion">
        <ul class="submenu-list list-unstyled">
            <li class="submenu-item"><a class="submenu-link" href="medicalrequestcollege.php">College</a></li>
            <li class="submenu-item"><a class="submenu-link" href="medicalrequestsemployeecollege.php">Employee</a></li>
        </ul>
    </div>
</li>

    
<li class="nav-item has-submenu">
    <a class="nav-link submenu-toggle active" href="medicalcollege.php" data-bs-target="#submenu-4" aria-controls="submenu-4">
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
    <a class="nav-link submenu-toggle active" href="consultationformcollege.php" data-bs-target="#submenu-4" aria-controls="submenu-4">
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
    <a class="nav-link submenu-toggle active" href="schoolhealthassessmentformcollege.php" data-bs-target="#submenu-4" aria-controls="submenu-4">
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
            <li class="submenu-item"><a class="submenu-link" href="healthprofilecollege.php">Health Profile</a></li>
            <li class="submenu-item"><a class="submenu-link" href="healthdeclarationcollege.php">Health Declaration</a></li>
            <li class="submenu-item"><a class="submenu-link" href="medicalcertificatecollege.php">Medical Certificate</a></li>
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
						        <h4 class="notification-title mb-1">Medical Appointments</h4>
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
                    <b><p>Note: We will accommodate 1 to 5 students/employees per year level. Only one (1) student/employee will message to have a medical request scheduling appointment.</p></b>
  <form class="form-horizontal mt-4" method="post" action="function/collegerecords.php">
 
  <div class="row">
  <div class="col-sm-4">
    <div class="form-group">
      <label for="idnumber" class="col-sm-12 control-label" style="font-size: 16px">Student/Employee ID Number</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="idnumber" name="idnumber" placeholder="Enter ID number" required>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="form-group">
      <label for="patient_name" class="col-sm-12 control-label" style="font-size: 16px">Student/Employee Fullname</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="name" name="name1" placeholder="Enter Fullname" required>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="form-group">
      <label for="gradecourseyear1" class="col-sm-12 control-label" style="font-size: 16px">Course & Year</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="gradecourseyear1" name="gradecourseyear1" placeholder="Enter Grade & Section/Course & Year">
      </div>
    </div>
  </div>
</div>
<br>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label for="role" class="col-sm-12 control-label" style="font-size: 16px">Role</label>
            <div class="col-sm-12">
                <select id="role" name="role" class="form-control" required>
                <option value="">Select</option>
                <option value="Student">Student</option>
                <option value="Employee">Employee</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="onoff" class="col-sm-12 control-label" style="font-size: 16px">On-campus Activity or Off-campus Activity</label>
            <div class="col-sm-12">
                <select id="onoff" name="onoff" class="form-control" required>
                <option value="">Select</option>
                <option value="On-campus Activity">On-campus Activity</option>
                <option value="Off-campus Activity">Off-campus Activity</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
    <div class="form-group">
      <label for="datetime" class="col-sm-12 control-label" style="font-size: 16px">Date & Time</label>
      <div class="col-sm-12">
        <input type="datetime-local" class="form-control" id="datetime" name="date_time">
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="form-group"><br>
      <label for="phoneNumber" class="col-sm-12 control-label" style="font-size: 16px">Phone Number</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="phoneNumber" name="phoneNumber">
      </div>
    </div>
  </div>
</div>
 </br>
    <div class="row">
      <div class="col-sm-12">
      <input type="text" name="admin_id" style="display: none;" value="<?= $_SESSION['admin_id'];?>">
        <button name="submit_medicalcollege" class="btn btn-success">Add Medical Appointment</button>
      </div>
    </div>
  </form>
  
</div><!--//app-card-body-->
<br>
<div style="text-align: right; margin-right: 48px;">
    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#myModal">
        Update Dental Schedule
    </button>
</div>
<?php
// Fetch and display medical records
$sql = "SELECT * FROM medicalapp WHERE admin_id = '11' AND is_deleted_on_website = 0";
$result = $conn->query($sql);
?>
<center>
<div class="main-content">
    <table class="styled-table">
        <thead>
            <tr>
                <th>ID Number</th>
                <th>Fullname</th>
                <th>Course & Year</th>
                <th>Role</th>
                <th>On-campus Activity or Off-campus Activity</th>
                <th>Time & Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="healthRecordTableBody">
            <?php
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row['idnumber']; ?></td>
                    <td><?php echo $row['name1']; ?></td>
                    <td><?php echo $row['gradecourseyear1']; ?></td>
                    <td><?php echo $row['role']; ?></td>
                    <td><?php echo $row['onoff']; ?></td>
                    <td><?php echo $row['date_time']; ?></td>
                 
                    <td>
                    <center>   
                        <a href="function/formedicalappstudentdone.php?medicalapp_id=<?php echo $row['medicalapp_id']; ?>"
                        onclick="return confirm('Are you sure you want to delete this record?')">
                            <!-- Replace the anchor element with SVG icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                            </svg>
                        </a>
                        </center>
                    </td>
        
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <br><br>
</div>
        </center>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                $sql3 = "SELECT * FROM statusmedicalcollege";
                $result3 = mysqli_query($conn, $sql3);

                if (mysqli_num_rows($result3) > 0) {
                    while ($row3 = $result3->fetch_assoc()) {
                        $medical_id = $row3['medical_id'];
                        $statusmedmonam_1 = $row3['statusmedmonam_1'];
                        $statusmedtueam_2 = $row3['statusmedtueam_2'];
                        $statusmedwedam_3 = $row3['statusmedwedam_3'];
                        $statusmedthuam_4 = $row3['statusmedthuam_4'];
                        $statusmedfriam_5 = $row3['statusmedfriam_5'];
                        $statusmedmonpm_6 = $row3['statusmedmonpm_6'];
                        $statusmedtuepm_7 = $row3['statusmedtuepm_7'];
                        $statusmedwedpm_8 = $row3['statusmedwedpm_8'];
                        $statusmedthupm_9 = $row3['statusmedthupm_9'];
                        $statusmedfripm_10 = $row3['statusmedfripm_10'];
                    }
                } else {

                }
                ?>
                <?php
                // Step 1: Retrieve the data to be updated
                if (isset($_GET['medical_id'])) {
                    $medical_id = $_GET['medical_id'];
                }

                ?>
                <form action="function/collegerecords.php" method="POST">
                    <input type="hidden" name="medical_id" value="<?php echo $medical_id; ?>">
                    <div class="mb-3">
                        <label for="inputStatus1030_1" class="form-label">Monday - 8:00 A.M - 11:00 A.M.</label>
                        <select class="form-select" id="inputStatus1030_1" name="statusmedmonam_1">
                            <option value="Available" <?php if ($statusmedmonam_1 == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmedmonam_1 == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus1130" class="form-label">Tuesday - 8:00 A.M - 11:00 A.M.</label>
                        <select class="form-select" id="inputStatus1130" name="statusmedtueam_2">
                            <option value="Available" <?php if ($statusmedtueam_2 == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmedtueam_2 == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus230" class="form-label">Wednesday - 8:00 A.M - 11:00 A.M.</label>
                        <select class="form-select" id="inputStatus230" name="statusmedwedam_3">
                            <option value="Available" <?php if ($statusmedwedam_3 == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmedwedam_3 == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus330" class="form-label">Thursday - 8:00 A.M - 11:00 A.M.</label>
                        <select class="form-select" id="inputStatus330" name="statusmedthuam_4">
                            <option value="Available" <?php if ($statusmedthuam_4 == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmedthuam_4 == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus430" class="form-label">Friday - 8:00 A.M - 11:00 A.M.</label>
                        <select class="form-select" id="inputStatus430" name="statusmedfriam_5">
                            <option value="Available" <?php if ($statusmedfriam_5  == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmedfriam_5  == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus430" class="form-label">Monday - 1:30 P.M - 4:00 P.M.</label>
                        <select class="form-select" id="inputStatus430" name="statusmedmonpm_6">
                            <option value="Available" <?php if ($statusmedmonpm_6 == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmedmonpm_6 == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus430" class="form-label">Tuesday - 1:30 P.M - 4:00 P.M.</label>
                        <select class="form-select" id="inputStatus430" name="statusmedtuepm_7">
                            <option value="Available" <?php if ($statusmedtuepm_7 == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmedtuepm_7 == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus430" class="form-label">Wednesday - 1:30 P.M - 4:00 P.M.</label>
                        <select class="form-select" id="inputStatus430" name="statusmedwedpm_8">
                            <option value="Available" <?php if ($statusmedwedpm_8 == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmedwedpm_8 == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus430" class="form-label">Thursday - 1:30 P.M - 4:00 P.M.</label>
                        <select class="form-select" id="inputStatus430" name="statusmedthupm_9">
                            <option value="Available" <?php if ($statusmedthupm_9 == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmedthupm_9 == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputStatus430" class="form-label">Friday - 1:30 P.M - 4:00 P.M.</label>
                        <select class="form-select" id="inputStatus430" name="statusmedfripm_10">
                            <option value="Available" <?php if ($statusmedfripm_10 == 'Available') echo 'selected'; ?>>Available</option>
                            <option value="Unavailable" <?php if ($statusmedfripm_10 == 'Unavailable') echo 'selected'; ?>>Unavailable</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal" >Close</button>
                        <button type="submit" name="submit_statusmedicalcollege" class="btn btn-light">Update</button>
                    </div>
                </form>
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

