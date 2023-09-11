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
        if($_SESSION['role'] == 2){
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
    <title>Nurse Dashboard</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="assets/images/dwcl.png"> 
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">
	<link rel="stylesheet" href="assets/generate.css">
    
    

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
					        <h1 class="app-page-title mb-0"></h1>
					    </div>
						
				    </div>
			    </div>
			    
                <div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
					        <div class="col-12 col-lg-auto text-center text-lg-start">
						        <h4 class="notification-title mb-1">Dynamic Reports</h4>
					        </div>
							<!--//generate report-->
				        </div><!--//row-->
				    </div><!--//app-card-header-->
                    <?php

// Define a variable to store the selected year (default to 2023).
$selected_year = isset($_POST['selected_year']) ? $_POST['selected_year'] : '2023';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['report_type']) && isset($_POST['selected_year'])) {
        $report_type = $_POST['report_type'];
        $selected_year = $_POST['selected_year'];

        switch ($report_type) {
            case 'week':
                $sql = "SELECT CONCAT(YEAR(date_created), '-', WEEK(date_created)) AS label,
                        medicine_name,
                        COUNT(medicine_name) AS total_medicine,
                        SUM(quantity) AS total_quantity
                        FROM medicine
                        WHERE admin_id = '10' AND YEAR(date_created) = $selected_year
                        GROUP BY label, medicine_name";
                $report_label = 'Weekly';
                break;

            case 'month':
                $sql = "SELECT CONCAT(YEAR(date_created), '-', MONTHNAME(date_created)) AS label,
                        medicine_name,
                        COUNT(medicine_name) AS total_medicine,
                        SUM(quantity) AS total_quantity
                        FROM medicine
                        WHERE admin_id = '10' AND YEAR(date_created) = $selected_year
                        GROUP BY label, medicine_name";
                $report_label = 'Monthly';
                break;

            case 'year':
                $sql = "SELECT CONCAT(YEAR(date_created)) AS label,
                        medicine_name,
                        COUNT(medicine_name) AS total_medicine,
                        SUM(quantity) AS total_quantity
                        FROM medicine
                        WHERE admin_id = '10' AND YEAR(date_created) = $selected_year
                        GROUP BY label, medicine_name";
                $report_label = 'Yearly';
                break;

            default:
                echo "Invalid report type selection.";
                exit;
        }

        $result = $conn->query($sql);
?>

<table>
    <thead>
        <tr>
            <th><?php echo $report_label; ?></th>
            <th>Medicine Name</th>
            <th>Total Quantity</th>
        </tr>
    </thead>
    <tbody id="healthRecordTableBody">
        <?php while ($row = $result->fetch_object()): ?>
            <tr>
                <td><?php echo $row->label; ?></td>
                <td><?php echo $row->medicine_name; ?></td>
                <td><?php echo $row->total_quantity; ?></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

         
<?php
    }
}
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <select id="tableSelect" name="report_type">
        <option value="week">Week</option>
        <option value="month">Month</option>
        <option value="year">Year</option>
    </select>

    <select id="yearSelect" name="selected_year">
        <option value="2023" <?php echo $selected_year === '2023' ? 'selected' : ''; ?>>2023</option>
        <option value="2024" <?php echo $selected_year === '2024' ? 'selected' : ''; ?>>2024</option>
        <option value="2025" <?php echo $selected_year === '2025' ? 'selected' : ''; ?>>2025</option>
    </select>

    <button type="submit">Generate Report</button>
</form>

    </script>			
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
