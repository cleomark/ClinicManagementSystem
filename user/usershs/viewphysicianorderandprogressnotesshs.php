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
    <title>View Physician's Order Sheet and Progress Notes</title>
    
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
	  <link rel="stylesheet" href="assets/style.css">

    <style>
        /* Define custom styles here */
        .form-container {
            background-color: #fff;
            box-shadow: 4px 4px 4px 4px rgba(76, 84, 177, 0.5);
            padding: 20px;
            border-radius: 20px;
            margin-bottom: 20px;
        }

        .form-title {
            text-align: center;
            color: #4c54b1;
            font-weight: bold;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }

        label {
            color: #000 !important;
        }
        input.form-control {
            border: 3px solid #4e5864;
            background-color: #fff !important;
            padding: 10px;
            border-radius: 10px;
            transition: border-color 0.3s ease;
        }
        input.form-control:hover {
            background-color: #e0e0e0 !important;
            border-color: #4e5864 !important;
        }
        input.form-control:focus{
            background-color: #e0e0e0 !important;
        }
        .sched{
            color: #800000;
            font-size: 17px !important;
        }
        textarea{
          border: 3px solid #4e5864 !important;
          background-color: #fff !important;
        }
        /* Hide placeholder text on hover and focus */
        input.form-control:hover::placeholder,
        input.form-control:focus::placeholder {
            color: transparent !important;
        }
    </style>

</head> 

<body class="app">
<?php  	


// Retrieve the health record for the given ID number
$sql = "SELECT * FROM physicianorderprogressshs WHERE idnumber = '$idnumber'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = $result->fetch_assoc(); 
    $datetime = $row['datetime'];
    $progressnotes = $row['progressnotes'];
    $doctorsorder = $row['doctorsorder'];
    $idnumber = $row['idnumber'];
    $fullname = $row['fullname'];
    $age= $row['age'];
    $grade = $row['grade'];
  
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

				    </div>
			    </div>
			    
                <div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
					       
				        </div><!--//row-->
				    </div><!--//app-card-header-->
				    <div class="app-card-body p-4">

                    <?php
							$sql = "SELECT * FROM physicianorderprogressshs WHERE idnumber = '$idnumber'";
							$result = $conn->query($sql);
    						while($row = $result->fetch_array()){
						?>

<div class="container">
  <div class="form-container">

    <div class="form-title">
      Physician's Order Sheet and Progress Notes
    </div>

    <div class="row">

      <div class="col-sm-3">
        <div class="form-group">
          <label for="datetime" class="control-label">Date & Time</label>
          <input type="datetime-local" class="form-control" id="datetime" name="datetime" value="<?= date('Y-m-d\TH:i', strtotime($datetime)); ?>" readonly>
        </div>
      </div>
    
    </div>

    <div class="row">

      <div class="col-sm-4">
        <div class="form-group">
          <label for="progressnotes" class="control-label">Progress Notes</label>
          <textarea class="form-control" id="progressnotes" name="progressnotes" readonly><?php echo $row['progressnotes']; ?></textarea>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="form-group">
          <label for="doctorsorder" class="control-label">Doctor's Order</label>
          <textarea class="form-control" id="doctorsorder" name="doctorsorder" readonly><?php echo $row['doctorsorder']; ?></textarea>
        </div>
      </div>
      
    </div>
  <hr>

    <div class="row">

      <div class="col-sm-5">
        <label for="fullname" class="control-label">Fullname</label>
        <input type="text" id="fullname" name="fullname" class="form-control"  value="<?=$row['fullname'];?>" readonly>
      </div>

      <div class="col-sm-2">
        <label for="idnumber" class="control-label">ID Number</label>
        <input type="text" id="idnumber" name="idnumber" class="form-control" value="<?=$row['idnumber'];?>" readonly>
      </div>                

      <div class="col-sm-1">
        <label for="age" class="control-label">Age</label>
        <input type="text" id="age" name="age" class="form-control"  value="<?=$row['age'];?>" readonly>
      </div>

      <div class="col-sm-3">
        <div class="form-group">
          <label for="grade" class="control-label">Grade</label>
          <select class="form-control" name="grade">
            <option disabled selected><?= $row['grade'];?></option>
          </select>
        </div>
      </div>
      
    </div>
    <br>

  </div>
</div>
        <?php } ?>
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

