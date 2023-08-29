<?php

session_start();
include '../../../db.php';

    if (isset($_POST['update_record'])){
        $healthnogsjhs_id = $_POST['healthnogsjhs_id'];
        $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : "";
       
        
         // Get the existing image name from the database
    $sqlImage = "SELECT image FROM healthrecordformgsjhs WHERE healthnogsjhs_id = '$healthnogsjhs_id'";
    $resultImage = $conn->query($sqlImage);
    $rowImage = $resultImage->fetch_assoc();
    $existingImage = $rowImage['image'];

    $image = $_FILES['image']['name'];
    if (empty($image)) {
        // If no new image provided, use the existing image name
        $image = $existingImage;
    }
        $gradelevel = trim(mysqli_real_escape_string($conn, $_POST['gradelevel']));
        $role = isset($_POST['role']) ? trim(mysqli_real_escape_string($conn, $_POST['role'])) : "";
        $fullname = trim(mysqli_real_escape_string($conn, $_POST['fullname']));
        $idnumber = trim(mysqli_real_escape_string($conn, $_POST['idnumber']));
        $cp = trim(mysqli_real_escape_string($conn, $_POST['cp']));
        $age = trim(mysqli_real_escape_string($conn, $_POST['age']));
        $gender = isset($_POST['gender']) ? trim(mysqli_real_escape_string($conn, $_POST['gender'])) : "";
        $address = trim(mysqli_real_escape_string($conn, $_POST['address']));
        $paddress = trim(mysqli_real_escape_string($conn, $_POST['paddress']));
        $father = trim(mysqli_real_escape_string($conn, $_POST['father']));
        $cfather = trim(mysqli_real_escape_string($conn, $_POST['cfather']));
        $mother = trim(mysqli_real_escape_string($conn, $_POST['mother']));
        $cmother = trim(mysqli_real_escape_string($conn, $_POST['cmother']));
        $religion = trim(mysqli_real_escape_string($conn, $_POST['religion']));
        $nationality = trim(mysqli_real_escape_string($conn, $_POST['nationality']));
        $language = trim(mysqli_real_escape_string($conn, $_POST['language']));
        $bothparents = isset($_POST['bothparents']) ? trim(mysqli_real_escape_string($conn, $_POST['bothparents'])) : "";
        $livesmother = isset($_POST['livesmother']) ? trim(mysqli_real_escape_string($conn, $_POST['livesmother'])) : "";
        $livesfather = isset($_POST['livesfather']) ? trim(mysqli_real_escape_string($conn, $_POST['livesfather'])) : "";
        $guardian = isset($_POST['guardian']) ? trim(mysqli_real_escape_string($conn, $_POST['guardian'])) : "";
        $guardianname = trim(mysqli_real_escape_string($conn, $_POST['guardianname']));
        $guardianrelation = trim(mysqli_real_escape_string($conn, $_POST['guardianrelation']));
        $cguardian = trim(mysqli_real_escape_string($conn, $_POST['cguardian']));
        $altrelation = isset($_POST['altrelation']) ? trim(mysqli_real_escape_string($conn, $_POST['altrelation'])) : "";
        $altrel = trim(mysqli_real_escape_string($conn, $_POST['altrel']));
        $acontact = trim(mysqli_real_escape_string($conn, $_POST['acontact']));
        $bcg = isset($_POST['bcg']) ? trim(mysqli_real_escape_string($conn, $_POST['bcg'])) : "";
        $dpt = isset($_POST['dpt']) ? trim(mysqli_real_escape_string($conn, $_POST['dpt'])) : "";
        $opv = isset($_POST['opv']) ? trim(mysqli_real_escape_string($conn, $_POST['opv'])) : "";
        $hepa = isset($_POST['hepa']) ? trim(mysqli_real_escape_string($conn, $_POST['hepa'])) : "";
        $measles = isset($_POST['measles']) ? trim(mysqli_real_escape_string($conn, $_POST['measles'])) : "";
        $others = trim(mysqli_real_escape_string($conn, $_POST['others']));
        $firstdose = isset($_POST['firstdose']) ? trim(mysqli_real_escape_string($conn, $_POST['firstdose'])) : "";
        $seconddose = isset($_POST['seconddose']) ? trim(mysqli_real_escape_string($conn, $_POST['seconddose'])) : "";
        $boosterdose = isset($_POST['boosterdose']) ? trim(mysqli_real_escape_string($conn, $_POST['boosterdose'])) : "";
        $no = isset($_POST['no']) ? trim(mysqli_real_escape_string($conn, $_POST['no'])) : "";
           
        // Get the existing image name from the database
   
 $sqlImage = "SELECT imagevac FROM healthrecordformgsjhs WHERE healthnogsjhs_id = '$healthnogsjhs_id'";
    $resultImage = $conn->query($sqlImage);
    $rowImage = $resultImage->fetch_assoc();
    $existingImage = $rowImage['imagevac'];

    $imagevac = $_FILES['imagevac']['name'];
    if (empty($imagevac)) {
        // If no new image provided, use the existing image name
        $imagevac = $existingImage;
    }
        $asthma = isset($_POST['asthma']) ? trim(mysqli_real_escape_string($conn, $_POST['asthma'])) : "";
        $faintingspells = isset($_POST['faintingspells']) ? trim(mysqli_real_escape_string($conn, $_POST['faintingspells'])) : "";
        $allergicrhinitis = isset($_POST['allergicrhinitis']) ? trim(mysqli_real_escape_string($conn, $_POST['allergicrhinitis'])) : "";
        $freqheadache = isset($_POST['freqheadache']) ? trim(mysqli_real_escape_string($conn, $_POST['freqheadache'])) : "";
        $anxietydis = isset($_POST['anxietydis']) ? trim(mysqli_real_escape_string($conn, $_POST['anxietydis'])) : "";
        $g6pd = isset($_POST['g6pd']) ? trim(mysqli_real_escape_string($conn, $_POST['g6pd'])) : "";
        $bleedingclotting = isset($_POST['bleedingclotting']) ? trim(mysqli_real_escape_string($conn, $_POST['bleedingclotting'])) : "";
        $hearingprob = isset($_POST['hearingprob']) ? trim(mysqli_real_escape_string($conn, $_POST['hearingprob'])) : "";
        $hypergas = isset($_POST['hypergas']) ? trim(mysqli_real_escape_string($conn, $_POST['hypergas'])) : "";
        $derma = isset($_POST['derma']) ? trim(mysqli_real_escape_string($conn, $_POST['derma'])) : "";
        $hypertension  = isset($_POST['hypertension']) ? trim(mysqli_real_escape_string($conn, $_POST['hypertension'])) : "";
        $diabetes = isset($_POST['diabetes']) ? trim(mysqli_real_escape_string($conn, $_POST['diabetes'])) : "";
        $hyperventilation  = isset($_POST['hyperventilation']) ? trim(mysqli_real_escape_string($conn, $_POST['hyperventilation'])) : "";
        $mens = isset($_POST['mens']) ? trim(mysqli_real_escape_string($conn, $_POST['mens'])) : "";
        $othersmedical = isset($_POST['othersmedical']) ? trim(mysqli_real_escape_string($conn, $_POST['othersmedical'])) : "";
        $heartcondition = trim(mysqli_real_escape_string($conn, $_POST['heartcondition']));
        $eyeproblem = trim(mysqli_real_escape_string($conn, $_POST['eyeproblem']));
        $illness = trim(mysqli_real_escape_string($conn, $_POST['illness']));
        $injuries = trim(mysqli_real_escape_string($conn, $_POST['injuries']));
        $treatment = trim(mysqli_real_escape_string($conn, $_POST['treatment']));
        $medication = trim(mysqli_real_escape_string($conn, $_POST['medication']));
        $food = trim(mysqli_real_escape_string($conn, $_POST['food']));
        $firstaid = trim(mysqli_real_escape_string($conn, $_POST['firstaid']));
        $concernshealth = trim(mysqli_real_escape_string($conn, $_POST['concernshealth']));

        $sql = "UPDATE healthrecordformgsjhs SET
        image='$image', gradelevel='$gradelevel', role='$role', fullname='$fullname', idnumber='$idnumber',
        cp='$cp', age='$age', gender='$gender', address='$address', paddress='$paddress', father='$father',
        cfather='$cfather', mother='$mother', cmother='$cmother', religion='$religion', nationality='$nationality',
        language='$language', bothparents='$bothparents', livesmother='$livesmother', livesfather='$livesfather',
        guardian='$guardian', guardianname='$guardianname', guardianrelation='$guardianrelation',
        cguardian='$cguardian', altrelation='$altrelation', altrel='$altrel', acontact='$acontact',
        bcg='$bcg', dpt='$dpt', opv='$opv', hepa='$hepa', measles='$measles', others='$others',
        firstdose='$firstdose', seconddose='$seconddose', boosterdose='$boosterdose', no='$no',
        imagevac='$imagevac', asthma='$asthma', faintingspells='$faintingspells',
        allergicrhinitis='$allergicrhinitis', freqheadache='$freqheadache', anxietydis='$anxietydis',
        g6pd='$g6pd', bleedingclotting='$bleedingclotting', hearingprob='$hearingprob',
        hypergas='$hypergas', derma='$derma', hypertension='$hypertension', diabetes='$diabetes',
        hyperventilation='$hyperventilation', mens='$mens', othersmedical='$othersmedical',
        heartcondition='$heartcondition', eyeproblem='$eyeproblem', illness='$illness', injuries='$injuries',
        treatment='$treatment', medication='$medication', food='$food', firstaid='$firstaid',
        concernshealth='$concernshealth'
        WHERE healthnogsjhs_id = '$healthnogsjhs_id'";
    
      
      $imageUploadSuccess = false;
      $secondFileUploadSuccess = false;
  
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
    
          // Check if the second image was uploaded successfully
          if (isset($_FILES["imagevac"]) && $_FILES["imagevac"]["error"] === UPLOAD_ERR_OK) {
              $secondFileUploadSuccess = move_uploaded_file($_FILES["imagevac"]["tmp_name"], "/xampp/htdocs/CAPSTONE1/upload_image/" . $_FILES["imagevac"]["name"]);
          } else {
              // Handle the case when no file was uploaded or other errors occurred
              if ($_FILES["imagevac"]["error"] === UPLOAD_ERR_NO_FILE) {
                  // If no file was attached, set the second file upload as successful
                  $secondFileUploadSuccess = true;
              } else {
                  echo "Error uploading the second image: " . $_FILES["imagevac"]["error"];
              }
          }
  
          if ($imageUploadSuccess && $secondFileUploadSuccess) {
              // Both files were uploaded successfully
              $_SESSION['success'] = "
                  <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                      <h2 style='color: #fff; font-size: 16px; margin-left: 10px;'>The health profile record has been updated.</h2>
                  </div>
              ";
              $healthnogsjhs_id = /* Logic to retrieve the value */
              header('Location: ../editrecordgsjhslist.php?healthnogsjhs_id=' . $healthnogsjhs_id);
              

          }
      }
  
    }

    if(isset($_GET['healthnogsjhs_id'])){
	
        $healthnogsjhs_id = $_GET['healthnogsjhs_id'];
    
        $query = "DELETE FROM healthrecordformgsjhs WHERE healthnogsjhs_id = '$healthnogsjhs_id' ";
    
        if($conn->query($query) === TRUE){
    
            header('Location: ../gsjhslists.php?msg=Successfully Deleted!');
            
        }else{
            
            // echo"Error!!!";
            echo '<script>window.alert("ERROR!")</script>';
        }
        
    }

    
    
  ?>