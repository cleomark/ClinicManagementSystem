<?php
    session_start();
    include '../../db.php';
    require '../../vendor/autoload.php';

    if (!isset($_SESSION['admin_id'])){
        echo '<script>window.alert("PLEASE LOGIN FIRST!!")</script>';
        echo '<script>window.location.replace("../login.php");</script>';
        exit; // Exit the script to prevent further execution
    }

  
?>


<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>View Student Medical Request</title>
    
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
	<link rel="stylesheet" href="assets/viewdental.css">

</head> 

<body class="app"> 
    <?php  	
$date_created = $_GET['date_created'];

// Retrieve the health record for the given ID number
$sql = "SELECT * FROM medical WHERE date_created = '$date_created'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = $result->fetch_assoc(); 
  $idnumber = $row['idnumber'];
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
    }
 else {
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
						        <h4 class="notification-title mb-1">Medical Appointments</h4>
					        </div>
            
				        </div><!--//row-->
				    </div><!--//app-card-header-->
				    <div class="app-card-body p-4">

 
  <div class="row">
  <div class="col-sm-4">
    <div class="form-group">
      <label for="idnumber" class="col-sm-12 control-label" style="font-size: 16px">Student/Employee 1 ID Number</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="idnumber" name="idnumber" placeholder="Enter ID number" value="<?php echo $row['idnumber']; ?>" readonly>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="form-group">
      <label for="patient_name" class="col-sm-12 control-label" style="font-size: 16px">Student/Employee 1 Fullname</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="name" name="name1" placeholder="Enter Fullname" value="<?php echo $row['name1']; ?>" readonly>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="form-group">
      <label for="gradecourseyear1" class="col-sm-12 control-label" style="font-size: 16px">Grade & Section/Course & Year</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="gradecourseyear1" name="gradecourseyear1" placeholder="Enter Grade & Section/Course & Year" value="<?php echo $row['gradecourseyear1']; ?>" readonly>
      </div>
    </div>
  </div>
</div>
<br>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label for="idnumber" class="col-sm-12 control-label" style="font-size: 16px">Student/Employee 2 ID Number</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="idnumber" name="idnumber1" placeholder="Enter ID number" value="<?php echo $row['idnumber2']; ?>" readonly>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="patient_name" class="col-sm-12 control-label" style="font-size: 16px">Student/Employee Fullname</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="name" name="name1" placeholder="Enter Fullname" value="<?php echo $row['name2']; ?>" readonly>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
    <div class="form-group">
      <label for="gradecourseyear2" class="col-sm-12 control-label" style="font-size: 16px">Grade & Section/Course & Year</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="gradecourseyear2" name="gradecourseyear2" placeholder="Enter Grade & Section/Course & Year" value="<?php echo $row['gradecourseyear2']; ?>" readonly>
      </div>
    </div>
  </div>
</div>
<br>
 
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label for="idnumber" class="col-sm-12 control-label" style="font-size: 16px">Student/Employee 3 ID Number</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="idnumber" name="idnumber2" placeholder="Enter ID number" value="<?php echo $row['idnumber3']; ?>" readonly>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="patient_name" class="col-sm-12 control-label" style="font-size: 16px">Student/Employee 3 Fullname</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="name" name="name2" placeholder="Enter Fullname" value="<?php echo $row['name3']; ?>" readonly>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
    <div class="form-group">
      <label for="gradecourseyear3" class="col-sm-12 control-label" style="font-size: 16px">Grade & Section/Course & Year</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="gradecourseyear3" name="gradecourseyear3" placeholder="Enter Grade & Section/Course & Year" value="<?php echo $row['gradecourseyear3']; ?>" readonly>
      </div>
    </div>
  </div>
</div>
<br>
<div class="row">
<div class="col-sm-4">
        <div class="form-group">
            <label for="idnumber" class="col-sm-12 control-label" style="font-size: 16px">Student/Employee 4 ID Number</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="idnumber" name="idnumber3" placeholder="Enter ID number" value="<?php echo $row['idnumber4']; ?>" readonly>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="patient_name" class="col-sm-12 control-label" style="font-size: 16px">Student/Employee Fullname</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="name" name="name3" placeholder="Enter Fullname" value="<?php echo $row['name4']; ?>" readonly>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
    <div class="form-group">
      <label for="gradecourseyear4" class="col-sm-12 control-label" style="font-size: 16px">Grade & Section/Course & Year</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="gradecourseyear4" name="gradecourseyear4" placeholder="Enter Grade & Section/Course & Year" value="<?php echo $row['gradecourseyear4']; ?>" readonly>
      </div>
    </div>
  </div>
</div>
<br>
<div class="row">
<div class="col-sm-4">
        <div class="form-group">
            <label for="idnumber" class="col-sm-12 control-label" style="font-size: 16px">Student/Employee 5 ID Number</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="idnumber" name="idnumber4" placeholder="Enter ID number" value="<?php echo $row['idnumber5']; ?>" readonly>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="patient_name" class="col-sm-12 control-label" style="font-size: 16px">Student/Employee Fullname</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="name" name="name4" placeholder="Enter Fullname" value="<?php echo $row['name5']; ?>" readonly>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
    <div class="form-group">
      <label for="gradecourseyear5" class="col-sm-12 control-label" style="font-size: 16px">Grade & Section/Course & Year</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="gradecourseyear5" name="gradecourseyear5" placeholder="Enter Grade & Section/Course & Year" value="<?php echo $row['gradecourseyear5']; ?>" readonly>
      </div>
    </div>
  </div>
</div>
<br>
<div class="row">
<div class="col-sm-4">
                <div class="form-group">
                    <label for="c_employee" class="col-sm-12 control-label">For Student</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="c_enrolled" name="c_enrolled" value="<?php echo $row['c_enrolled']; ?>" readonly>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="c_employee" class="col-sm-12 control-label">For Employee</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="c_employee" name="c_employee" value="<?php echo $row['c_employee']; ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="c_employee" class="col-sm-12 control-label">On-campus Activity or Off-campus Activity</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="c_employee" name="onoff" value="<?php echo $row['onoff']; ?>" readonly>
                    </div>
                </div>
            </div>
</div>
<div class="row">
            <div class="form-group">
                <br>
                <label for="message" class="col-sm-5 control-label">Message</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="message" name="message" placeholder="Enter your message...." value="<?php echo $row['message']; ?>" readonly>
                </div>
            </div>
        </div>

        <div class="form-group">
            <span><?php echo $row['date_created']; ?></span>
        </div>
        <a href="" data-bs-toggle="modal" data-bs-target="#myModal">Approve</a>
        
<!--Modal-->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Send Approved Message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="inputTo" class="form-label">To</label>
                        <input type="text" class="form-control" id="inputTo" name="phone" placeholder="63">
                    </div>
                    <div class="mb-3">
                        <label for="messagesms" class="form-label">Message</label>
                        <textarea class="form-control" id="messagesms" name="message" rows="4">Good Day! Your request for medical appointment is approved. Your schedule will be on June 30, 2023 at 10:30 A.M</textarea>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" value="Send">Send</button>
                    </div>
                </form>
                <?php
/**
 * Send an SMS message directly by calling the HTTP endpoint.
 *
 * For your convenience, environment variables are already pre-populated with your account data
 * like authentication, base URL, and phone number.
 *
 * Please find detailed information in the readme file.
 */

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $phoneNumber = $_POST['phone'];
    $message = $_POST['message'];

    // Send the SMS using the Infobip API
    $client = new Client([
        'base_uri' => "https://2kw6nm.api.infobip.com/",
        'headers' => [
            'Authorization' => "App 47d7c2b8394b7802f3eb4e49f8da3a40-aee5ec9a-6fae-4e23-b89f-246ee2b98f4a",
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ]
    ]);

    $response = $client->request(
        'POST',
        'sms/2/text/advanced',
        [
            RequestOptions::JSON => [
                'messages' => [
                    [
                        'from' => 'Clinic',
                        'destinations' => [
                            ['to' => $phoneNumber]
                        ],
                        'text' => $message,
                    ]
                ]
            ],
        ]
    );

    // Prepare the SQL query
    $sql = "INSERT INTO sms_message (phone, message) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind the parameters and execute the query
    $stmt->bind_param("ss", $phoneNumber, $message);
    $stmt->execute();

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>


            </div>
        </div>
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

