<?php

session_start();
include '../../../db.php';

    if (isset($_POST['update_recordshs'])){
        $healthshs_id = $_POST['healthshs_id'];
        $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : "";
       
        
         // Get the existing image name from the database
    $sqlImage = "SELECT image FROM healthrecordformshs WHERE healthshs_id = '$healthshs_id'";
    $resultImage = $conn->query($sqlImage);
    $rowImage = $resultImage->fetch_assoc();
    $existingImage = $rowImage['image'];

    $image = $_FILES['image']['name'];
    if (empty($image)) {
        // If no new image provided, use the existing image name
        $image = $existingImage;
    }
        $gradelevel = trim(mysqli_real_escape_string($conn, $_POST['gradelevel']));
        $fullname = trim(mysqli_real_escape_string($conn, $_POST['fullname']));
        $role = isset($_POST['role']) ? trim(mysqli_real_escape_string($conn, $_POST['role'])) : "";
        $idnumber = trim(mysqli_real_escape_string($conn, $_POST['idnumber']));
        $age = trim(mysqli_real_escape_string($conn, $_POST['age']));
        $phoneno = trim(mysqli_real_escape_string($conn, $_POST['phoneno']));
        $gender = isset($_POST['gender']) ? trim(mysqli_real_escape_string($conn, $_POST['gender'])) : "";
        $address = trim(mysqli_real_escape_string($conn, $_POST['address']));
        $paddress = trim(mysqli_real_escape_string($conn, $_POST['paddress']));
        $father = trim(mysqli_real_escape_string($conn, $_POST['father']));
        $cfather = trim(mysqli_real_escape_string($conn, $_POST['cfather']));
        $mother = trim(mysqli_real_escape_string($conn, $_POST['mother']));
        $cmother = trim(mysqli_real_escape_string($conn, $_POST['cmother']));
        $polio = isset($_POST['polio']) ? trim(mysqli_real_escape_string($conn, $_POST['polio'])) : "";
        $tetanus = isset($_POST['tetanus']) ? trim(mysqli_real_escape_string($conn, $_POST['tetanus'])) : "";
        $chickenpox = isset($_POST['chickenpox']) ? trim(mysqli_real_escape_string($conn, $_POST['chickenpox'])) : "";
        $measles = isset($_POST['measles']) ? trim(mysqli_real_escape_string($conn, $_POST['measles'])) : "";
        $mumps = isset($_POST['mumps']) ? trim(mysqli_real_escape_string($conn, $_POST['mumps'])) : "";
        $tb = isset($_POST['tb']) ? trim(mysqli_real_escape_string($conn, $_POST['tb'])) : "";
        $asthma = isset($_POST['asthma']) ? trim(mysqli_real_escape_string($conn, $_POST['asthma'])) : "";
        $hepatitis = isset($_POST['hepatitis']) ? trim(mysqli_real_escape_string($conn, $_POST['hepatitis'])) : "";
        $faintingspells = isset($_POST['faintingspells']) ? trim(mysqli_real_escape_string($conn, $_POST['faintingspells'])) : "";
        $seizure = isset($_POST['seizure']) ? trim(mysqli_real_escape_string($conn, $_POST['seizure'])) : "";
        $bleeding = isset($_POST['bleeding']) ? trim(mysqli_real_escape_string($conn, $_POST['bleeding'])) : "";
        $eyedis = isset($_POST['eyedis']) ? trim(mysqli_real_escape_string($conn, $_POST['eyedis'])) : "";
        $heartailment = trim(mysqli_real_escape_string($conn, $_POST['heartailment']));
        $otherillness = trim(mysqli_real_escape_string($conn, $_POST['otherillness']));
        $yesfood = isset($_POST['yesfood']) ? trim(mysqli_real_escape_string($conn, $_POST['yesfood'])) : "";
        $nofood = isset($_POST['nofood']) ? trim(mysqli_real_escape_string($conn, $_POST['nofood'])) : "";
        $food = trim(mysqli_real_escape_string($conn, $_POST['food']));
        $yesmed = isset($_POST['yesmed']) ? trim(mysqli_real_escape_string($conn, $_POST['yesmed'])) : "";
        $nomed = isset($_POST['nomed']) ? trim(mysqli_real_escape_string($conn, $_POST['nomed'])) : "";
        $med = trim(mysqli_real_escape_string($conn, $_POST['med']));
        $allow = isset($_POST['allow']) ? trim(mysqli_real_escape_string($conn, $_POST['allow'])) : "";
        $notallow = isset($_POST['notallow']) ? trim(mysqli_real_escape_string($conn, $_POST['notallow'])) : "";
        $medpresent = trim(mysqli_real_escape_string($conn, $_POST['medpresent']));
        $notified = trim(mysqli_real_escape_string($conn, $_POST['notified']));
        $contact = trim(mysqli_real_escape_string($conn, $_POST['contact']));
        $relationship = trim(mysqli_real_escape_string($conn, $_POST['relationship']));

           
        // Get the existing image name from the database

        $sql = "UPDATE healthrecordformshs SET
        image='$image', gradelevel='$gradelevel', fullname='$fullname', role='$role', idnumber='$idnumber',
        age='$age', phoneno='$phoneno', gender='$gender', address='$address', paddress='$paddress', father='$father',
        cfather='$cfather', mother='$mother', cmother='$cmother', polio='$polio', tetanus='$tetanus', chickenpox='$chickenpox',
        measles='$measles', mumps='$mumps', tb='$tb', asthma='$asthma', hepatitis='$hepatitis',
        faintingspells='$faintingspells', seizure='$seizure', bleeding='$bleeding', eyedis='$eyedis', 
        bleeding='$bleeding', eyedis='$eyedis', heartailment='$heartailment', yesfood='$yesfood',
        nofood='$nofood', food='$food', yesmed='$yesmed', nomed='$nomed', med='$med', allow='$allow', 
        notallow='$notallow', medpresent ='$medpresent', notified='$notified', contact='$contact',
        relationship='$relationship' WHERE healthshs_id = '$healthshs_id'";
    
      
      $imageUploadSuccess = false;
    
      if (mysqli_query($conn, $sql)) {
        // Check if the first image was uploaded successfully
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
            $imageUploadSuccess = move_uploaded_file($_FILES["image"]["tmp_name"], "/xampp/htdocs/CAPSTONE1/upload_image/" . $_FILES["image"]["name"]);
        } else {
            // Handle the case when no file was uploaded or other errors occurred
            if ($_FILES["image"]["error"] === UPLOAD_ERR_NO_FILE) {
                // If no file was attached, set the second file upload as successful
                $imageUploadSuccess = true;
            } else {
                echo "Error uploading the first image: " . $_FILES["image"]["error"];
            }
        }
    
        if ($imageUploadSuccess) {
            $_SESSION['success'] = "
                <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                    <h2 style='color: #fff; font-size: 16px; margin-left: 10px;'>The health profile record has been updated.</h2>
                </div>
            ";
            
            // Use $healthshs_id in the redirection URL
            header('Location: ../editrecordshslist.php?healthshs_id=' . $healthshs_id);
            exit(); // Make sure to exit after setting a header location
        }
        
      }
  
    }

    if(isset($_GET['healthshs_id'])){
	
        $healthshs_id = $_GET['healthshs_id'];
    
        $query = "DELETE FROM healthrecordformshs WHERE healthshs_id = '$healthshs_id' ";
    
        if($conn->query($query) === TRUE){
    
            header('Location: ../shslist.php?msg=Successfully Deleted!');
            
        }else{
            
            // echo"Error!!!";
            echo '<script>window.alert("ERROR!")</script>';
        }
        
    }

   
  ?>