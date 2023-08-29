<?php
    session_start();
    include '../../../db.php';

    if(isset($_POST['submit_data'])){ // pag get ng data 
        $user_id = $_POST['user_id'];
        $image = $_FILES['image']['name'];
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
        $imagevac = $_FILES['imagevac']['name'];
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
        $medications = isset($_POST['medications']) ? trim(mysqli_real_escape_string($conn, $_POST['medications'])) : "";
        $food = trim(mysqli_real_escape_string($conn, $_POST['food']));
        $firstaid = trim(mysqli_real_escape_string($conn, $_POST['firstaid']));
        $concernshealth = trim(mysqli_real_escape_string($conn, $_POST['concernshealth']));

        $sql = "INSERT INTO healthrecordformgsjhs VALUES ('','$user_id','$image','$gradelevel','$role','$fullname','$idnumber','$cp','$age',
        '$gender','$address','$paddress','$father','$cfather','$mother','$cmother','$religion','$nationality','$language','$bothparents',
        '$livesfather','$livesmother','$guardian','$guardianname','$guardianrelation','$cguardian','$altrelation','$altrel','$acontact','$bcg',
        '$dpt','$opv','$hepa','$measles','$others','$firstdose','$seconddose','$boosterdose','$no','$imagevac','$asthma',
        '$faintingspells','$allergicrhinitis','$freqheadache','$anxietydis','$g6pd',
        '$bleedingclotting','$hearingprob','$hypergas','$derma','$hypertension',
        '$diabetes','$hyperventilation','$mens','$othersmedical','$heartcondition',
        '$eyeproblem','$illness','$injuries','$treatment','$medications','$food','$firstaid','$concernshealth')";
      
      $imageUploadSuccess = false;
      $secondFileUploadSuccess = false;
  
      if (mysqli_query($conn, $sql)) {
          // Check if the first image was uploaded successfully
          if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
              $imageUploadSuccess = move_uploaded_file($_FILES["image"]["tmp_name"], "/xampp/htdocs/CAPSTONE1/upload_image/" . $_FILES["image"]["name"]);
          } else {
              echo "Error uploading the first image: " . $_FILES["image"]["error"];
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
                      <h2 style='color: #fff; font-size: 16px; margin-left: 10px;'>Your health record has been submitted.</h2>
                  </div>
              ";
              header('location: ../healthrecordformgsjhs.php');
          }
      }
  }

  ?>

  
  
  