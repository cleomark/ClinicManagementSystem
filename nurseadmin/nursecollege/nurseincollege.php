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
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['report_type']) && isset($_POST['selected_year'])) {
                    $report_type = $_POST['report_type'];
                    $selected_year = $_POST['selected_year'];
            
                    $chartData = array();
            
                    switch ($report_type) {
                        case 'week':
                            $sql = "SELECT CONCAT(YEAR(date_time), '-', WEEK(date_time)) AS label,
                                    SUM(role = 'student in college') AS total_student,
                                    SUM(role = 'employee in college') AS total_employee
                                    FROM medicalapp
                                    WHERE YEAR(date_time) = ?
                                    GROUP BY label";
                            $report_label = 'Weekly';
                            break;
            
                        case 'month':
                            $sql = "SELECT CONCAT(YEAR(date_time), '-', MONTHNAME(date_time)) AS label,
                                    SUM(role = 'student in college') AS total_student,
                                    SUM(role = 'employee in college') AS total_employee
                                    FROM medicalapp
                                    WHERE YEAR(date_time) = ?
                                    GROUP BY label";
                            $report_label = 'Monthly';
                            break;
            
                        case 'year':
                            $sql = "SELECT CONCAT(YEAR(date_time)) AS label,
                                    SUM(role = 'student in college') AS total_student,
                                    SUM(role = 'employee in college') AS total_employee
                                    FROM medicalapp
                                    WHERE YEAR(date_time) = ?
                                    GROUP BY label";
                            $report_label = 'Yearly';
                            break;
            
                        default:
                            echo "Invalid report type selection.";
                            exit;
                    }
            
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i",$selected_year);
                    $stmt->execute();
                    $result = $stmt->get_result();
            
                    while ($row = $result->fetch_object()) {
                        $chartData['labels'][] = $row->label;
                        $chartData['total_student'][] = $row->total_student;
                        $chartData['total_employee'][] = $row->total_employee;
                    }
            
                    header("Content-Type: application/json");
                    echo json_encode($chartData);
                    exit;
                }
            }
        
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   

</head> 

<body class="app">   	
<?php 
        include $_SERVER['DOCUMENT_ROOT'] . "/DivineClinic/components/navbar.php";
    ?>

    
<div class="spinner-wrapper">
<img src="/DivineClinic/assets/3D/divineloader.gif" alt="">
</div>

<style>

#tableSelectYear {
    font-size: 16px!important;
    padding: 8px!important;
    border: 1px solid #ccc!important;
    border-radius: 4px!important;
    width: 100px!important;
}


#tableSelectYear option {
    font-size: 14px!important;
    padding: 4px!important;
    background-color: #f7f7f7!important;
}


#tableSelectYear option:checked {
    background-color: #007bff!important;
    color: #fff!important;
}

        /* Style the container to have fixed size and enable scrolling */
        .chart-container {
            width: 800px;
            height: 400px;
            overflow: auto;
        }

        #reportForm {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
    }

    #generateReport {
        background-color: #007bff; /* Clinic blue */
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    /* Clinic chart title styling */
    .chart-title {
        font-size: 24px;
        font-weight: bold;
        color: #007bff; /* Clinic blue */
        margin-bottom: 10px;
    }

    /* Clinic chart container styling */
    .chart-container {
        background-color: #f8f9fa; /* Clinic light gray */
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 20px;
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
				    <div class="app-card-body p-4">
                        
                    <form id="reportForm">
        <select id="tableSelect" name="report_type">
            <option value="week">Week</option>
            <option value="month">Month</option>
            <option value="year">Year</option>
        </select>

        <select id="tableSelectYear" name="selected_year">
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
            <option value="2026">2026</option>
            <option value="2027">2027</option>
            <option value="2028">2028</option>
            <option value="2029">2029</option>
            <option value="2030">2039</option>
        </select>

        <!-- Replace the submit button with a regular button -->
        <button type="button" id="generateReport">Generate Report</button>
    </form>
    <br>
    <p>Total Medical Appointments Report</p>
    <!-- Fixed-sized container for the graph -->
    <div class="chart-container">
        <canvas id="barChart" width="2000" height="800" text-align="center"></canvas>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const generateButton = document.getElementById("generateReport");
            generateButton.addEventListener("click", function () {
                fetchChartData();
            });

            function fetchChartData() {
                const form = document.getElementById("reportForm");
                const formData = new FormData(form);

                fetch("nurseincollege.php", {
                    method: "POST",
                    body: formData,
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json();
                })
                .then(data => {
                    drawBarChart(data);
                })
                .catch(error => {
                    console.error("Error fetching data:", error);
                });
            }

            function drawBarChart(data) {
                const ctx = document.getElementById("barChart").getContext("2d");

                const chartData = {
                    labels: data.labels,
                    datasets: [
                        {
                            label: "Total of Student",
                            data: data.total_student,
                            backgroundColor: "rgba(46, 55, 164)", // You can change the color here
                        },
                        {
                            label: "Total of Employees",
                            data: data.total_employee,
                            backgroundColor: "rgba(255,87,87)", // You can change the color here
                        },
                    ],
                };
    const options = {
    responsive: true,
    scales: {
        x: {
            stacked: true,
        },
        y: {
            beginAtZero: true,
            stacked: true,
            ticks: {
                stepSize: 5,
                max: 80,
                callback: function (value, index, values) {
                    // Define the custom labels
                    const customLabels = ['0','5','10','15','20','25','30','35'];
                    return customLabels[index];
                },
            },
        },
    },
};

// Destroy the previous chart if it exists
const existingChart = window.myChart;
if (existingChart) {
    existingChart.destroy();
}

// Create a new chart instance
window.myChart = new Chart(ctx, {
    type: "bar",
    data: chartData,
    options: options,
});

            }

            // Fetch and draw the chart when the page loads
            fetchChartData();
        });
    </script>

    
				    </div><!--//app-card-body-->


    
				</div>			    
		    </div>
	    </div>
    </div>  					
    <!-- Javascript -->    
    
    <script> 
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

