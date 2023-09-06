<?php
    session_start();
    include '../../../db.php';

    if(isset($_POST['submit_data'])){ // pag get ng data 
        $user_id = $_POST['user_id'];
        $image = $_FILES['image']['name'];
        $fullname = trim(mysqli_real_escape_string($conn, $_POST['fullname']));
        $idnumber = trim(mysqli_real_escape_string($conn, $_POST['idnumber']));
        $birthday = trim(mysqli_real_escape_string($conn, $_POST['birthday']));
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
        $chickenpox= isset($_POST['chickenpox']) ? trim(mysqli_real_escape_string($conn, $_POST['chickenpox'])) : "";
        $measles = isset($_POST['measles']) ? trim(mysqli_real_escape_string($conn, $_POST['measles'])) : "";
        $mumps = isset($_POST['mumps']) ? trim(mysqli_real_escape_string($conn, $_POST['mumps'])) : "";
        $tb = isset($_POST['tb']) ? trim(mysqli_real_escape_string($conn, $_POST['tb'])) : "";
        $asthma = isset($_POST['asthma']) ? trim(mysqli_real_escape_string($conn, $_POST['asthma'])) : "";
        $hepatitis = isset($_POST['hepatitis']) ? trim(mysqli_real_escape_string($conn, $_POST['hepatitis'])) : "";
        $faintingspells = isset($_POST['faintingspells']) ? trim(mysqli_real_escape_string($conn, $_POST['faintingspells'])) : "";
        $seizure = isset($_POST['seizure']) ? trim(mysqli_real_escape_string($conn, $_POST['seizure'])) : "";
        $bleeding = isset($_POST['bleeding']) ? trim(mysqli_real_escape_string($conn, $_POST['bleeding'])) : "";
        $eyedis = isset($_POST['eyedis']) ? trim(mysqli_real_escape_string($conn, $_POST['eyedis'])) : "";
        $heartailment = trim(mysqli_real_escape_string($conn, $_POST['otherillness']));
        $otherillness = trim(mysqli_real_escape_string($conn, $_POST['otherillness']));
        $yesfood = isset($_POST['yesfood']) ? trim(mysqli_real_escape_string($conn, $_POST['yesfood'])) : "";
        $nofood = isset($_POST['nofood']) ? trim(mysqli_real_escape_string($conn, $_POST['nofood'])) : "";
        $food = trim(mysqli_real_escape_string($conn, $_POST['food']));
        $yesmed = isset($_POST['yesmed']) ? trim(mysqli_real_escape_string($conn, $_POST['yesmed'])) : "";
        $nomed = isset($_POST['nomed']) ? trim(mysqli_real_escape_string($conn, $_POST['nomed'])) : "";
        $med = trim(mysqli_real_escape_string($conn, $_POST['med']));
        $allow = isset($_POST['allow']) ? trim(mysqli_real_escape_string($conn, $_POST['allow'])) : "";
        $notallow = isset($_POST['notallow']) ? trim(mysqli_real_escape_string($conn, $_POST['notallow'])) : "";
        $yesmedication = isset($_POST['yesmedication']) ? trim(mysqli_real_escape_string($conn, $_POST['yesmedication'])) : "";
        $nomedication = isset($_POST['nomedication']) ? trim(mysqli_real_escape_string($conn, $_POST['nomedication'])) : "";
        $medication = trim(mysqli_real_escape_string($conn, $_POST['medication']));
        $notified= trim(mysqli_real_escape_string($conn, $_POST['notified']));
        $contact = trim(mysqli_real_escape_string($conn, $_POST['contact']));
        $relationship = trim(mysqli_real_escape_string($conn, $_POST['relationship']));

        $sql = "INSERT INTO healthrecordformshs VALUES ('','$user_id','$image','$fullname','$idnumber','$birthday','$phoneno',
        '$gender','$address','$paddress','$father','$cfather','$mother','$cmother','$polio','$tetanus','$chickenpox','$measles',
        '$mumps','$tb','$asthma','$hepatitis','$faintingspells','$seizure','$bleeding','$eyedis','$heartailment','$otherillness',
        '$yesfood','$nofood','$food','$yesmed','$nomed','$med','$allow','$notallow','$yesmedication','$nomedication','$medication','$notified','$contact',
        '$relationship')";
      
      if (mysqli_query($conn, $sql)) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], "/xampp/htdocs/divineclinic/upload_image/" . $_FILES["image"]["name"])) {
            $_SESSION['success'] = "
                <div id='success-message' style='position:absolute; right:30px; background-color:#15a362; padding: 10px 10px; width:auto; border-radius: 10px;'>
                    <h2 style='color: #fff; font-size: 16px; margin-left: 10px;'>Your health record has been submitted.</h2>
                </div>
            ";
            header('location: ../healthrecordformshs.php');
        } else {
            // There was an error uploading the file
            echo "Error: " . $_FILES["image"]["error"];
        }
    }
}
  ?>

  
  
  