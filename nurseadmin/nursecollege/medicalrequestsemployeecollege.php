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
    <title>Employee Medical Request</title>
    
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
<?php 
        include $_SERVER['DOCUMENT_ROOT'] . "/DivineClinic/components/navbar.php";
    ?>
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
    $sql = "SELECT * FROM medical WHERE c_employee = 'Employee in College'";
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
            
            <a href="viewmedicalrequestsemployeecollege.php?date_created=<?php echo $row['date_created']; ?>">
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
