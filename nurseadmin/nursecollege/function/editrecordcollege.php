<?php

session_start();
include '../../../db.php';

    if (isset($_POST['update_recordcollege'])){
        $healthcollege_id = $_POST['healthcollege_id'];
        $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : "";
       
        
         // Get the existing image name from the database
    $sqlImage = "SELECT image FROM healthrecordformcollege WHERE healthcollege_id = '$healthcollege_id'";
    $resultImage = $conn->query($sqlImage);
    $rowImage = $resultImage->fetch_assoc();
    $existingImage = $rowImage['image'];

    $image = $_FILES['image']['name'];
    if (empty($image)) {
        // If no new image provided, use the existing image name
        $image = $existingImage;
    }
        $fullname = trim(mysqli_real_escape_string($conn, $_POST['fullname']));
        $courseyear = trim(mysqli_real_escape_string($conn, $_POST['courseyear']));
        $role = isset($_POST['role']) ? trim(mysqli_real_escape_string($conn, $_POST['role'])) : "";
        $idnumber = trim(mysqli_real_escape_string($conn, $_POST['idnumber']));
        $gender = isset($_POST['gender']) ? trim(mysqli_real_escape_string($conn, $_POST['gender'])) : "";
        $address = trim(mysqli_real_escape_string($conn, $_POST['address']));
        $pcontact = trim(mysqli_real_escape_string($conn, $_POST['pcontact']));
        $nationality = trim(mysqli_real_escape_string($conn, $_POST['nationality']));
        $birthday = trim(mysqli_real_escape_string($conn, $_POST['birthday']));
        $religion = trim(mysqli_real_escape_string($conn, $_POST['religion']));
        $fguardian = trim(mysqli_real_escape_string($conn, $_POST['fguardian']));
        $occupation1 = trim(mysqli_real_escape_string($conn, $_POST['occupation1']));
        $mother = trim(mysqli_real_escape_string($conn, $_POST['mother']));
        $occupation2 = trim(mysqli_real_escape_string($conn, $_POST['occupation2']));
        $contactemer = trim(mysqli_real_escape_string($conn, $_POST['contactemer']));
        $contactno = trim(mysqli_real_escape_string($conn, $_POST['contactno']));
        $address2 = trim(mysqli_real_escape_string($conn, $_POST['address2']));
        $relation = trim(mysqli_real_escape_string($conn, $_POST['relation']));
        $referral = trim(mysqli_real_escape_string($conn, $_POST['referral']));
        $contactno2 = trim(mysqli_real_escape_string($conn, $_POST['contactno2']));
        $physiciannumcall = trim(mysqli_real_escape_string($conn, $_POST['physiciannumcall']));
        $addresshospital = trim(mysqli_real_escape_string($conn, $_POST['addresshospital']));
        $td = trim(mysqli_real_escape_string($conn, $_POST['td']));
        $mmr = trim(mysqli_real_escape_string($conn, $_POST['mmr']));
        $hepab = trim(mysqli_real_escape_string($conn, $_POST['hepab']));
        $varicella = trim(mysqli_real_escape_string($conn, $_POST['varicella']));
        $yesasthma = isset($_POST['yesasthma']) ? trim(mysqli_real_escape_string($conn, $_POST['yesasthma'])) : "";
        $noasthma = isset($_POST['noasthma']) ? trim(mysqli_real_escape_string($conn, $_POST['noasthma'])) : "";
        $relationasthma = trim(mysqli_real_escape_string($conn, $_POST['relationasthma']));
        $yesbleeding = trim(mysqli_real_escape_string($conn, $_POST['yesbleeding']));
        $nobleeding = trim(mysqli_real_escape_string($conn, $_POST['nobleeding']));
        $relationbleeding = trim(mysqli_real_escape_string($conn, $_POST['relationbleeding']));
        $yescancer = trim(mysqli_real_escape_string($conn, $_POST['yescancer']));
        $nocancer = trim(mysqli_real_escape_string($conn, $_POST['nocancer']));
        $relationcancer = trim(mysqli_real_escape_string($conn, $_POST['relationcancer']));
        $yesdiabetes = trim(mysqli_real_escape_string($conn, $_POST['yesdiabetes']));
        $nodiabetes = trim(mysqli_real_escape_string($conn, $_POST['nodiabetes']));
        $relationdiabetes = trim(mysqli_real_escape_string($conn, $_POST['relationdiabetes']));
        $yesheartdis = trim(mysqli_real_escape_string($conn, $_POST['yesheartdis']));
        $noheartdis = trim(mysqli_real_escape_string($conn, $_POST['noheartdis']));
        $relationheartdis = trim(mysqli_real_escape_string($conn, $_POST['relationheartdis']));
        $yesbp = trim(mysqli_real_escape_string($conn, $_POST['yesbp']));
        $nobp = trim(mysqli_real_escape_string($conn, $_POST['nobp']));
        $relationbp = trim(mysqli_real_escape_string($conn, $_POST['relationbp']));
        $yeskidney = trim(mysqli_real_escape_string($conn, $_POST['yeskidney']));
        $nokidney = trim(mysqli_real_escape_string($conn, $_POST['nokidney']));
        $relationkidney = trim(mysqli_real_escape_string($conn, $_POST['relationkidney']));
        $yesmental = trim(mysqli_real_escape_string($conn, $_POST['yesmental']));
        $nomental = trim(mysqli_real_escape_string($conn, $_POST['nomental']));
        $relationmental = trim(mysqli_real_escape_string($conn, $_POST['relationmental']));
        $yesobese = trim(mysqli_real_escape_string($conn, $_POST['yesobese']));
        $noobese = trim(mysqli_real_escape_string($conn, $_POST['noobese']));
        $relationobese = trim(mysqli_real_escape_string($conn, $_POST['relationobese']));
        $yesseizure = trim(mysqli_real_escape_string($conn, $_POST['yesseizure']));
        $noseizure = trim(mysqli_real_escape_string($conn, $_POST['noseizure']));
        $relationseizure = trim(mysqli_real_escape_string($conn, $_POST['relationseizure']));
        $yesstroke = trim(mysqli_real_escape_string($conn, $_POST['yesstroke']));
        $nostroke = trim(mysqli_real_escape_string($conn, $_POST['nostroke']));
        $relationstroke = trim(mysqli_real_escape_string($conn, $_POST['relationstroke']));
        $yestb = trim(mysqli_real_escape_string($conn, $_POST['yestb']));
        $notb = trim(mysqli_real_escape_string($conn, $_POST['notb']));
        $relationtb = trim(mysqli_real_escape_string($conn, $_POST['relationtb']));
        $yescancer = trim(mysqli_real_escape_string($conn, $_POST['yescancer']));
        $nocancer = trim(mysqli_real_escape_string($conn, $_POST['nocancer']));
        $relationcancer = trim(mysqli_real_escape_string($conn, $_POST['relationcancer']));
        $allergy = trim(mysqli_real_escape_string($conn, $_POST['allergy']));
        $asthma = trim(mysqli_real_escape_string($conn, $_POST['asthma']));
        $behavioral = trim(mysqli_real_escape_string($conn, $_POST['behavioral']));
        $bleedingprob = trim(mysqli_real_escape_string($conn, $_POST['bleedingprob']));
        $blood = trim(mysqli_real_escape_string($conn, $_POST['blood']));
        $chickenpox = trim(mysqli_real_escape_string($conn, $_POST['chickenpox']));
        $convulsion = trim(mysqli_real_escape_string($conn, $_POST['convulsion']));
        $dengue = trim(mysqli_real_escape_string($conn, $_POST['dengue']));
        $diabetess = trim(mysqli_real_escape_string($conn, $_POST['diabetess']));
        $earproblem = trim(mysqli_real_escape_string($conn, $_POST['earproblem']));
        $eating_disorder = trim(mysqli_real_escape_string($conn, $_POST['eating_disorder']));
        $epilepsy = trim(mysqli_real_escape_string($conn, $_POST['epilepsy']));
        $eyeproblemm = trim(mysqli_real_escape_string($conn, $_POST['eyeprolemm']));
        $fracture = trim(mysqli_real_escape_string($conn, $_POST['fracture']));
        $hearing_problem = trim(mysqli_real_escape_string($conn, $_POST['hearing_problem']));
        $heart_disorder = trim(mysqli_real_escape_string($conn, $_POST['heart_disorder']));
        $hyperacidity = trim(mysqli_real_escape_string($conn, $_POST['hyperacidity']));
        $indigestion = trim(mysqli_real_escape_string($conn, $_POST['indigestion']));
        $insomia = trim(mysqli_real_escape_string($conn, $_POST['insomia']));
        $kidney_problem = trim(mysqli_real_escape_string($conn, $_POST['kidney_probelem']));
        $liver_problem = trim(mysqli_real_escape_string($conn, $_POST['liver_problem']));
        $measless = trim(mysqli_real_escape_string($conn, $_POST['measless']));
        $mumpss = trim(mysqli_real_escape_string($conn, $_POST['mumpss']));
        $parasitism = trim(mysqli_real_escape_string($conn, $_POST['parasitism']));
        $pneumonia = trim(mysqli_real_escape_string($conn, $_POST['pneumonia']));
        $primary_complex = trim(mysqli_real_escape_string($conn, $_POST['primary_complex']));
        $scoliosis = trim(mysqli_real_escape_string($conn, $_POST['scoliosis']));
        $skin_problem = trim(mysqli_real_escape_string($conn, $_POST['skin_problem']));
        $tonsillitis = trim(mysqli_real_escape_string($conn, $_POST['tonsillitis']));
        $typhoid_fever = trim(mysqli_real_escape_string($conn, $_POST['bleedingprob']));
        $vision_defect = trim(mysqli_real_escape_string($conn, $_POST['vision_defect']));
        $yeshospitalization = trim(mysqli_real_escape_string($conn, $_POST['yeshospitalization']));
        $nohospitalization = trim(mysqli_real_escape_string($conn, $_POST['nohospitalization']));
        $yessurgical = trim(mysqli_real_escape_string($conn, $_POST['yessurgical']));
        $nosurgical = trim(mysqli_real_escape_string($conn, $_POST['nosurgical']));
        $specialmed = trim(mysqli_real_escape_string($conn, $_POST['specialmed']));
        $allergicdrugs = trim(mysqli_real_escape_string($conn, $_POST['allergicdrugs']));
        $otherrelevant = trim(mysqli_real_escape_string($conn, $_POST['otherrelevant']));

        $sql = "UPDATE healthrecordformcollege SET
        image='$image', fullname='$fullname', courseyear='$courseyear', role='$role', idnumber='$idnumber',
        gender='$gender', address='$address', pcontact='$pcontact', nationality='$nationality', birthday='$birthday', 
        religion='$religion', fguardian='$fguardian', occupation1='$occupation1', mother='$mother', occupation2='$occupation2',
        contactemer='$contactemer', contactno='$contactno', address2='$address2', relation='$relation', referral='$referral',
        contactno2='$contactno2', physiciannumcall='$physiciannumcall', addresshospital='$addresshospital', td='$td', 
        mmr='$mmr', hepab='$hepab', varicella='$varicella', yesasthma='$yesasthma', noasthma='$noasthma', relationasthma='$relationasthma', 
        yesbleeding='$yesbleeding', nobleeding='$nobleeding', relationbleeding='$relationbleeding', yescancer ='$yescancer', 
        nocancer='$nocancer', relationcancer='$relationcancer', yesdiabetes='$yesdiabetes', nodiabetes='$nodiabetes', relationdiabetes ='$relationdiabetes', 
        yesheartdis='$yesheartdis', noheartdis='$noheartdis', relationheartdis ='$relationheartdis', yesbp ='$yesbp', nobp='$nobp', relationbp ='$relationbp',
        yeskidney='$yeskidney', nokidney='$nokidney', relationkidney='$relationkidney', yesmental='$yesmental', nomental='$nomental', relationmental='$relationmental',
        yesobese='$yesobese', noobese='$noobese', relationobese='$relationobese', yesseizure='$yesseizure', noseizure='$noseizure', relationseizure='$relationseizure',
        yesstroke='$yesstroke', nostroke='$nostroke', relationstroke='$relationstroke', yestb='$yestb',notb='$notb',relationtb='$relationtb',allergy='$allergy',
        anemia='$anemia', asthma='$asthma',behavioral='$behavioral', bleedingprob='$bleedingprob',blood='$blood',chickenpox='$chickenpox',convulsion='$convulsion',
        dengue='$dengue',diabetess='$diabetess',earproblem='$earproblem',eating_disorder='$eating_disorder',epilepsy='$epilepsy',eyeproblemm='$eyeproblem',
        fracture='$fracture', hearing_problem='$hearing_problem',heart_disorder='$heart_disorder',hyperacidity='$hyperacidity',indigestion='$indigestion',
        insomia='$insomia',kidney_problem='$kidney_problem',liver_problem='$liver_problem',measless='$measless',mumpss='$mumpss',parasitism='$parasitism',pneumonia='$pneumonia',
        primary_complex='$primary_complex',scoliosis='$scoliosis',skin_problem='$skin_problem',tonsillitis='$tonsillitis',yesheartdis='$yesheartdis',typhoid_fever='$typhoid_fever',
        vision_defect='$vision_defect',yeshospitalization='$yeshospitalization',nohospitalization='$nohospitalization',yessurgical='$yessurgical',nosurgical='$nosurgical',specialmed='$specialmed',
        allergicdrugs='$allergicdrugs',otherrelevant='$otherrelevant' WHERE healthcollege_id = '$healthcollege_id'";
    
      
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
            header('Location: ../editcollege.php?healthcollege_id=' . $healthcollege_id);
            exit(); // Make sure to exit after setting a header location
        }
        
      }
  
    }

    if(isset($_GET['healthcollege_id'])){
	
        $healthcollege_id = $_GET['healthcollege_id'];
    
        $query = "DELETE FROM healthrecordformcollege WHERE healthcollege_id = '$healthcollege_id' ";
    
        if($conn->query($query) === TRUE){
    
            header('Location: ../collegelists.php?msg=Successfully Deleted!');
            
        }else{
            
            // echo"Error!!!";
            echo '<script>window.alert("ERROR!")</script>';
        }
        
    }

   
  ?>