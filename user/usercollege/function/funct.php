<?php
    session_start();
    include '../../../db.php';

    if(isset($_POST['submit_data'])){ // pag get ng data 
        $user_id = $_POST['user_id'];
        $image = $_FILES['image']['name'];
        $fullname = trim(mysqli_real_escape_string($conn, $_POST['fullname']));
        $courseyear= trim(mysqli_real_escape_string($conn, $_POST['courseyear']));
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
        $yesbleeding = isset($_POST['yesbleeding']) ? trim(mysqli_real_escape_string($conn, $_POST['yesbleeding'])) : "";
        $nobleeding = isset($_POST['nobleeding']) ? trim(mysqli_real_escape_string($conn, $_POST['nobleeding'])) : "";
        $relationbleeding = trim(mysqli_real_escape_string($conn, $_POST['relationbleeding']));
        $yescancer = isset($_POST['yescancer']) ? trim(mysqli_real_escape_string($conn, $_POST['yescancer'])) : "";
        $nocancer = isset($_POST['nocancer']) ? trim(mysqli_real_escape_string($conn, $_POST['nocancer'])) : "";
        $relationcancer = trim(mysqli_real_escape_string($conn, $_POST['relationcancer']));
        $yesdiabetes = isset($_POST['yesdiabetes']) ? trim(mysqli_real_escape_string($conn, $_POST['yesdiabetes'])) : "";
        $nodiabetes = isset($_POST['nodiabetes']) ? trim(mysqli_real_escape_string($conn, $_POST['nodiabetes'])) : "";
        $relationdiabetes = trim(mysqli_real_escape_string($conn, $_POST['relationdiabetes']));
        $yesdiabetes = isset($_POST['yesdiabetes']) ? trim(mysqli_real_escape_string($conn, $_POST['yesdiabetes'])) : "";
        $nodiabetes = isset($_POST['nodiabetes']) ? trim(mysqli_real_escape_string($conn, $_POST['nodiabetes'])) : "";
        $relationdiabetes = trim(mysqli_real_escape_string($conn, $_POST['relationdiabetes']));
        $yesheartdis = isset($_POST['yesheartdis']) ? trim(mysqli_real_escape_string($conn, $_POST['yesheartdis'])) : "";
        $noheartdis = isset($_POST['noheartdis']) ? trim(mysqli_real_escape_string($conn, $_POST['noheartdis'])) : "";
        $relationheartdis = trim(mysqli_real_escape_string($conn, $_POST['relationheartdis']));
        $yesbp = isset($_POST['yesbp']) ? trim(mysqli_real_escape_string($conn, $_POST['yesbp'])) : "";
        $nobp = isset($_POST['nobp']) ? trim(mysqli_real_escape_string($conn, $_POST['nobp'])) : "";
        $relationbp = trim(mysqli_real_escape_string($conn, $_POST['relationbp']));
        $yeskidney = isset($_POST['yeskidney']) ? trim(mysqli_real_escape_string($conn, $_POST['yeskidney'])) : "";
        $nokidney = isset($_POST['nokidney']) ? trim(mysqli_real_escape_string($conn, $_POST['nokidney'])) : "";
        $relationkidney = trim(mysqli_real_escape_string($conn, $_POST['relationkidney']));
        $yesmental = isset($_POST['yesmental']) ? trim(mysqli_real_escape_string($conn, $_POST['yesmental'])) : "";
        $nomental = isset($_POST['nomental']) ? trim(mysqli_real_escape_string($conn, $_POST['nomental'])) : "";
        $relationmental = trim(mysqli_real_escape_string($conn, $_POST['relationmental']));
        $yesobese = isset($_POST['yesobese']) ? trim(mysqli_real_escape_string($conn, $_POST['yesobese'])) : "";
        $noobese = isset($_POST['noobese']) ? trim(mysqli_real_escape_string($conn, $_POST['noobese'])) : "";
        $relationobese = trim(mysqli_real_escape_string($conn, $_POST['relationobese']));
        $yesseizure = isset($_POST['yesseizure']) ? trim(mysqli_real_escape_string($conn, $_POST['yesseizure'])) : "";
        $noseizure = isset($_POST['noseizure']) ? trim(mysqli_real_escape_string($conn, $_POST['noseizure'])) : "";
        $relationseizure= trim(mysqli_real_escape_string($conn, $_POST['relationseizure']));
        $yesstroke = isset($_POST['yesstroke']) ? trim(mysqli_real_escape_string($conn, $_POST['yesstroke'])) : "";
        $nostroke = isset($_POST['nostroke']) ? trim(mysqli_real_escape_string($conn, $_POST['nostroke'])) : "";
        $relationstroke = trim(mysqli_real_escape_string($conn, $_POST['relationstroke']));
        $yestb = isset($_POST['yestb']) ? trim(mysqli_real_escape_string($conn, $_POST['yestb'])) : "";
        $notb = isset($_POST['notb']) ? trim(mysqli_real_escape_string($conn, $_POST['notb'])) : "";
        $relationtb = trim(mysqli_real_escape_string($conn, $_POST['relationtb']));
        $allergy = isset($_POST['allergy']) ? trim(mysqli_real_escape_string($conn, $_POST['allergy'])) : "";
        $anemia = isset($_POST['anemia']) ? trim(mysqli_real_escape_string($conn, $_POST['anemia'])) : "";
        $asthma = isset($_POST['asthma']) ? trim(mysqli_real_escape_string($conn, $_POST['asthma'])) : "";
        $behavioral = isset($_POST['behavioral']) ? trim(mysqli_real_escape_string($conn, $_POST['behavioral'])) : "";
        $bleedingprob = isset($_POST['bleedingprob']) ? trim(mysqli_real_escape_string($conn, $_POST['bleedingprob'])) : "";
        $blood = isset($_POST['blood']) ? trim(mysqli_real_escape_string($conn, $_POST['blood'])) : "";
        $chickenpox = isset($_POST['chickenpox']) ? trim(mysqli_real_escape_string($conn, $_POST['chickenpox'])) : "";
        $convulsion = isset($_POST['convulsion']) ? trim(mysqli_real_escape_string($conn, $_POST['convulsion'])) : "";
        $dengue = isset($_POST['dengue']) ? trim(mysqli_real_escape_string($conn, $_POST['dengue'])) : "";
        $diabetess = isset($_POST['diabetess']) ? trim(mysqli_real_escape_string($conn, $_POST['diabetess'])) : "";
        $earproblem = isset($_POST['earproblem']) ? trim(mysqli_real_escape_string($conn, $_POST['earproblem'])) : "";
        $eating_disorder = isset($_POST['eating_disorder']) ? trim(mysqli_real_escape_string($conn, $_POST['eating_disorder'])) : "";
        $epilepsy = isset($_POST['epilepsy']) ? trim(mysqli_real_escape_string($conn, $_POST['epilepsy'])) : "";
        $eyeproblemm = isset($_POST['eyeproblemm']) ? trim(mysqli_real_escape_string($conn, $_POST['eyeproblemm'])) : "";
        $fracture = isset($_POST['fracture']) ? trim(mysqli_real_escape_string($conn, $_POST['fracture'])) : "";
        $hearing_problem = isset($_POST['hearing_problem']) ? trim(mysqli_real_escape_string($conn, $_POST['hearing_problem'])) : "";
        $heart_disorder = isset($_POST['heart_disorder']) ? trim(mysqli_real_escape_string($conn, $_POST['heart_disorder'])) : "";
        $hyperacidity = isset($_POST['hyperacidity']) ? trim(mysqli_real_escape_string($conn, $_POST['hyperacidity'])) : "";
        $indigestion = isset($_POST['indigestion']) ? trim(mysqli_real_escape_string($conn, $_POST['indigestion'])) : "";
        $insomia = isset($_POST['insomia']) ? trim(mysqli_real_escape_string($conn, $_POST['insomia'])) : "";
        $kidney_problem = isset($_POST['kidney_problem']) ? trim(mysqli_real_escape_string($conn, $_POST['kidney_problem'])) : "";
        $liver_problem = isset($_POST['liver_problem']) ? trim(mysqli_real_escape_string($conn, $_POST['liver_problem'])) : "";
        $measless = isset($_POST['measless']) ? trim(mysqli_real_escape_string($conn, $_POST['measless'])) : "";
        $mumpss = isset($_POST['mumpss']) ? trim(mysqli_real_escape_string($conn, $_POST['mumpss'])) : "";
        $parasitism = isset($_POST['parasitism']) ? trim(mysqli_real_escape_string($conn, $_POST['parasitism'])) : "";
        $pneumonia = isset($_POST['pneumonia']) ? trim(mysqli_real_escape_string($conn, $_POST['pneumonia'])) : "";
        $primary_complex = isset($_POST['primary_complex']) ? trim(mysqli_real_escape_string($conn, $_POST['primary_complex'])) : "";
        $scoliosis = isset($_POST['scoliosis']) ? trim(mysqli_real_escape_string($conn, $_POST['scoliosis'])) : "";
        $skin_problem = isset($_POST['skin_problem']) ? trim(mysqli_real_escape_string($conn, $_POST['skin_problem'])) : "";
        $tonsillitis = isset($_POST['tonsillitis']) ? trim(mysqli_real_escape_string($conn, $_POST['tonsillitis'])) : "";
        $typhoid_fever = isset($_POST['typhoid_fever']) ? trim(mysqli_real_escape_string($conn, $_POST['typhoid_fever'])) : "";
        $vision_defect = isset($_POST['vision_defect']) ? trim(mysqli_real_escape_string($conn, $_POST['vision_defect'])) : "";
        $yeshospitalization = isset($_POST['yeshospitalization']) ? trim(mysqli_real_escape_string($conn, $_POST['yeshospitalization'])) : "";
        $nohospitalization = isset($_POST['nohospitalization']) ? trim(mysqli_real_escape_string($conn, $_POST['nohospitalization'])) : "";
        $yessurgical = isset($_POST['yessurgical']) ? trim(mysqli_real_escape_string($conn, $_POST['yessurgical'])) : "";
        $nosurgical = isset($_POST['nosurgical']) ? trim(mysqli_real_escape_string($conn, $_POST['nosurgical'])) : "";
        $specialmed = trim(mysqli_real_escape_string($conn, $_POST['specialmed']));
        $allergicdrugs = trim(mysqli_real_escape_string($conn, $_POST['allergicdrugs']));
        $otherrelevant = trim(mysqli_real_escape_string($conn, $_POST['otherrelevant']));

        $sql = "INSERT INTO healthrecordformcollege VALUES ('','$user_id','$image','$fullname','$courseyear','$role','$idnumber','$gender','$address',
        '$pcontact','$nationality','$birthday','$religion','$fguardian','$occupation1','$mother','$occupation2','$contactemer','$contactno',
        '$address2','$relation','$referral','$contactno2','$physiciannumcall','$addresshospital','$td','$mmr','$hepab', '$varicella','$yesasthma',
        '$noasthma','$relationasthma','$yesbleeding','$nobleeding','$relationbleeding','$yescancer','$nocancer','$relationcancer','$yesdiabetes',
        '$nodiabetes','$relationdiabetes','$yesheartdis','$noheartdis','$relationheartdis','$yesbp','$nobp','$relationbp',
        '$yeskidney','$nokidney','$relationkidney','$yesmental','$nomental','$relationmental','$yesobese','$noobese','$relationobese',
        '$yesseizure','$noseizure','$relationseizure','$yesstroke','$nostroke','$relationstroke','$yestb','$notb','$relationtb','$allergy',
        '$anemia', '$asthma','$behavioral','$bleedingprob','$blood','$chickenpox','$convulsion','$dengue','$diabetess','$earproblem',
        '$eating_disorder','$epilepsy','$eyeproblemm','$fracture','$hearing_problem','$heart_disorder','$hyperacidity','$indigestion','$insomia',
        '$kidney_problem','$liver_problem','$measless','$mumpss','$parasitism','$pneumonia','$primary_complex','$scoliosis','$skin_problem','$tonsillitis',
        '$typhoid_fever','$vision_defect','$yeshospitalization','$nohospitalization','$yessurgical','$nosurgical','$specialmed','$allergicdrugs','$otherrelevant')";
      
        
      if (mysqli_query($conn, $sql)) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], "/xampp/htdocs/CAPSTONE1/upload_image/" . $_FILES["image"]["name"])) {
            $_SESSION['success'] = "
                <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                    <h2 style='color: #fff; font-size: 16px; margin-left: 10px;'>Your health record has been submitted.</h2>
                </div>
            ";
            header('location: ../healthrecordformcollege.php');
        } else {
            // There was an error uploading the file
            echo "Error: " . $_FILES["image"]["error"];
        }
    }
}
  ?>
  