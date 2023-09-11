<?php
    session_start();
    include '../../db.php';

    if (!isset($_SESSION['admin_id'])){
        echo '<script>window.alert("PLEASE LOGIN FIRST!!")</script>';
        echo '<script>window.location.replace("../login.php");</script>';
        exit; // Exit the script to prevent further execution
    }

  
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>View Health Profile Record</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <link rel="shortcut icon" href="assets/images/dwcl.png"> 
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">
	<link rel="stylesheet" href="assets/style.css">
	<link rel="stylesheet" href="assets/formstyle.css">

</head> 

<body class="app">   
    
<?php  	
$idnumber = $_GET['idnumber'];

// Retrieve the health record for the given ID number
$sql = "SELECT * FROM healthrecordformgsjhs WHERE idnumber = '$idnumber'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = $result->fetch_assoc(); 
    $image = $row['image'];
    $fullname= $row['fullname'];
    $idnumber = $row['idnumber'];
    $cp = $row['cp'];
    $birthday = $row['birthday'];
    $gender = $row['gender'];
    $address = $row ['address'];
    $paddress = $row ['paddress'];
    $father = $row['father'];
    $cfather = $row['cfather'];
    $mother = $row['mother'];
    $cmother = $row['cmother'];
    $religion = $row['religion'];
    $nationality = $row['nationality'];
    $language = $row['language'];
    $bothparents = $row['bothparents'];
    $livesfather = $row['livesfather'];
    $livesmother = $row['livesmother'];
    $guardian = $row['guardian'];
    $guardianname = $row['guardianname'];
    $guardianrelation = $row['guardianrelation'];
    $cguardian = $row['cguardian'];
    $altrelation = $row['altrelation'];
    $altrel = $row['altrel'];
    $acontact = $row['acontact'];
    $bcg = $row['bcg'];
    $dpt = $row['dpt'];
    $opv = ['opv'];
    $hepa = $row['hepa'];
    $measles = $row['measles'];
    $others = $row['others'];
    $firstdose =$row ['firstdose'];
    $seconddose = $row['seconddose'];
    $boosterdose =$row['boosterdose'];
    $no = $row['no'];
    $imagevac = $row['imagevac'];
    $asthma = $row['asthma'];
    $faintingspells = $row['faintingspells'];
    $allergicrhinitis = $row['allergicrhinitis'];
    $freqheadache =$row['freqheadache'];
    $anxietydis =$row['anxietydis'];
    $g6pd = $row['g6pd'];
    $bleedingclotting =$row['bleedingclotting'];
    $hearingprob =$row['hearingprob'];
    $hypergas = $row['hypergas'];
    $derma =$row['derma'];
    $hypertension =$row['hypertension'];
    $diabetes = $row['diabetes'];
    $hyperventilation =$row['hyperventilation'];
    $mens =$row['mens'];
    $othersmedical = $row['othersmedical'];
    $yesheartcon = $row['yesheartcon'];
    $noheartcon = $row['noheartcon'];
    $heartcon = $row['heartcon'];
    $yeseyeprob = $row['yeseyeprob'];
    $noeyeprob = $row['noeyeprob'];
    $eyeprob = $row['eyeprob'];
    $yesseriousillnes = $row['yesseriousillnes'];
    $noseriousillnes = $row['noseriousillnes'];
    $seriousillnes = $row['seriousillnes'];
    $yessurgeries = $row['yessurgeries'];
    $nosurgeries = $row['nosurgeries'];
    $surgeries = $row['surgeries'];
    $yesreceive = $row['yesreceive'];
    $noreceive = $row['noreceive'];
    $receive = $row['receive'];
    $yesallergiesmed = $row['yesallergiesmed'];
    $noallergiesmed = $row['noallergiesmed'];
    $allergiesmed = $row['allergiesmed'];
    $yesallergiesfood = $row['yesallergiesfood'];
    $noallergiesfood = $row['noallergiesfood'];
    $allergiesfood = $row['allergiesfood'];
    $yesfirstaid = $row['yesfirstaid'];
    $nofirstaid = $row['nofirstaid'];
    $yesconcerns = $row['yesconcerns'];
    $noconcerns = $row['noconcerns'];
    $concerns = $row['concerns'];
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
					        <h1 class="app-page-title mb-0">Fill-up Health Record Form</h1>
					    </div>
				    </div>
			    </div>
			    
                <div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
					        <div class="col-12 col-lg-auto text-center text-lg-start">
						        <h4 class="notification-title mb-1">Please fill-up honestly.</h4>
					        </div><!--//col-->
				        </div><!--//row-->
				    </div><!--//app-card-header-->
                    <div class="app-card-body p-4">
							<div class="align_form">
								<div class="input_form">
								<div class="input_wrap">
							<label></label>
							<div class="image_container">
							<br>
								<img src="<?php echo "/CAPSTONE1/upload_image/".$row['image'];?>">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Your Image</label>
							</div>
						</div>
<div class="input_wrap">
        <label for="fullname">Full Name</label>
        <input id="fullname" name="fullname" type="text" value="<?= $fullname; ?>" >
    </div>

    <div class="input_wrap">
        <label for="fullname">ID Number</label>
        <input name="idnumber" type="text" value="<?=$row['idnumber'];?>" readonly >
    </div>
    <div class="input_wrap">
        <label for="fullname">Personal Contact Number</label>
        <input name="cp" type="text" value="<?=$row['cp'];?>" readonly>
    </div>
                    </div>
                    </div>
                    <br><br>
<div class="input_form">
    <div class="input_wrap">
        <label for="fullname">Birthday</label>
        <input name="birthday" type="text" value="<?=$row['birthday'];?>" readonly>
    </div>
 <div class="input_wrap">
        <label for="fullname">Gender</label>
        <select class="form-select" name="gender">
        <option disabled selected><?= $row['gender'];?></option>
        </select>
    </div>
 </div>

  <div class="input_form">
    <div class="input_wrap">
        <label for="fullname">Home Address</label>
        <input name="address" id ="address" type="text" value="<?=$row['address'];?>" readonly>
    </div>
</div>
                    
<div class="input_form">
    <div class="input_wrap">
        <label for="fullname">Present Address</label>
        <input name="paddress" id="paddress" type="text" value="<?=$row['paddress'];?>" readonly>
    </div>
 </div>
<div class="input_form">
<div class="input_wrap">
    <label for="fullname">Name of Father</label>
    <input name="fathername" id="father" type="text" value="<?=$row['father'];?>" readonly>
</div>

<div class="input_wrap">
    <label for="fullname">Contact</label>
    <input name="cfather" id="cfather" type="text" value="<?=$row['cfather'];?>" readonly>
</div>
</div>

<div class="input_form">
<div class="input_wrap">
    <label for="fullname">Name of Mother</label>
    <input name="mothername" id="mother" type="text" value="<?=$row['mother'];?>" readonly>
</div>

<div class="input_wrap">
    <label for="fullname">Contact</label>
    <input name="cmother" id="cmother" type="text" value="<?=$row['cmother'];?>" readonly>
</div>
</div>

<div class="input_form">
<div class="input_wrap">
    <label for="fullname">Religion</label>
    <input name="religion" id="religion" type="text" value="<?=$row['religion'];?>" readonly>
</div>

<div class="input_wrap">
    <label for="fullname">Nationality</label>
    <input name="nationality" id="nationality" type="text" value="<?=$row['nationality'];?>" readonly>
</div>
</div>

<div class="input_form">
    <div class="input_wrap">
        <label for="fullname">Primary Language Spoken (Bicol, Tagalog, English, etc.)</label>
        <input name="language" id ="language" type="text" value="<?=$row['language'];?>" readonly>
    </div>
</div>
<br>
 <div class="input_form">
    <label for="fullname">Student lives with: </label>
</div><br>
<div class="checkbox">
<input name="bothparents"  type="checkbox" id="bothparents" value="<?= $row['bothparents'];?>" <?php if ($row['bothparents']) echo "checked"; ?>>
    <label class="labels" for="bothparents" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Both Parents</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
<input name="livesmother"  type="checkbox" id="livesmother" value="<?= $row['livesmother'];?>" <?php if ($row['livesmother']) echo "checked"; ?>>
    <label class="labels" for="livesmother" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mother</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
<input name="livesfather"  type="checkbox" id="livesfather" value="<?= $row['livesfather'];?>" <?php if ($row['livesfather']) echo "checked"; ?>>
    <label class="labels" for="livesfather" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Father</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
<input name="guardian"  type="checkbox" id="guardian" value="<?= $row['guardian'];?>" <?php if ($row['guardian']) echo "checked"; ?>>
    <label class="labels" for="guardian" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Guardian</label>
</div>
<div class="input_form">
<div class="input_wrap">
    <label for="fullname">Guardian's Name (In case the student is living with Guadian)</label>
    <input name="guardianname" id="guardianname" type="text"  value="<?=$row['guardianname'];?>" readonly>
</div>
<div class="input_wrap">
    <label for="fullname">Guardian's relation to the student/employee</label>
    <input name="guardianrelation" id="guardianrelation" type="text" value="<?=$row['guardianrelation'];?>" readonly>
</div>
</div>
<div class="input_form">
<div class="input_wrap">
    <label for="fullname">Contact</label>
    <input name="cguardian" id="cguardian" type="text"  value="<?=$row['cguardian'];?>" readonly>
</div>
</div>
<div class="input_form">
<div class="input_wrap">
    <label for="fullname">Alternation Person to Contact in Case of Emergency</label>
    <input name="altrelation" id="altrelation" type="text" value="<?=$row['altrelation'];?>" readonly>
</div>
<div class="input_wrap">
    <label for="fullname">Relationship to the student/employee</label>
    <input name="altrel" id="altrel" type="text" value="<?=$row['altrel'];?>" readonly>
</div>
<div class="input_wrap">
    <label for="fullname">Contact</label>
    <input name="acontact" id="acontact" type="text" value="<?=$row['acontact'];?>" readonly>
</div>
</div>

<div>
<p class="title_">IMMUNIZATION</p>
</div>
<p>Please select the box if your child/ward had completed the following Primary Immunization. The Employee may ignore this.</p>

<div class="input_form">
</div>
<div class="checkbox">
    <input name="bcg" value="bcg" type="checkbox" id="bcg" value="<?= $row['bcg'];?>" <?php if ($row['bcg']) echo "checked"; ?>>
    <label class="labels" for="bcg" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BCG</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
    <input name="dpt" value="dpt" type="checkbox" id="dpt" value="<?= $row['dpt'];?>" <?php if ($row['dpt']) echo "checked"; ?>>
    <label class="labels" for="dpt" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DPT</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
    <input name="opv" value="opv" type="checkbox" id="opv" value="<?= $row['opv'];?>" <?php if ($row['opv']) echo "checked"; ?>>
    <label class="labels" for="opv" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OPV</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
    <input name="hepa" value="hepa" type="checkbox" id="hepa" value="<?= $row['hepa'];?>" <?php if ($row['hepa']) echo "checked"; ?>>
    <label class="labels" for="hepa" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hepa B</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
    <input name="measles" value="measles" type="checkbox" id="measles" value="<?= $row['measles'];?>" <?php if ($row['measles']) echo "checked"; ?>>
    <label class="labels" for="measles" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Measles</label>
</div>
<div class="input_wrap">
    <label for="fullname">Others</label>
    <input name="others" id="others" type="text" value="<?=$row['others'];?>" readonly>
</div>
<br>
<p>Does your child/ward have COVID-19 Vacination? (If with First, Second or Booster dose, please attach a screenshot of Vaccination Card). The Employee is required to answer this.</p>

<div class="input_form">
</div>
<div class="checkbox">
<input name="firstdose" value="firstdose" type="checkbox" id="firstdose" value="<?= $row['firstdose'];?>" <?php if ($row['firstdose']) echo "checked"; ?>>
<label class="labels" for="firstdose" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;First Dose Only</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
<input name="seconddose" value="seconddose" type="checkbox" id="seconddose" value="<?= $row['seconddose'];?>" <?php if ($row['seconddose']) echo "checked"; ?>>
<label class="labels" for="seconddose" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Second Dose</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
<input name="boosterdose" type="checkbox" id="boosterdose" value="<?= $row['boosterdose'];?>" <?php if ($row['boosterdose']) echo "checked"; ?>>
<label class="labels" for="boosterdose" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Booster Dose</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
<input name="no" value="no" type="checkbox" id="no" value="<?= $row['no'];?>" <?php if ($row['no']) echo "checked"; ?>>
<label class="labels" for="no" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="input_wrap">
<div class="image_container">
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Vaccination Attachment</label>
    <img src="<?php echo "/CAPSTONE1/upload_image/".$row['imagevac'];?>">
</div>
    </div>

<div>
    <br><br>
<p class="title_">Medical History</p>
</div>
<p>Does you/your child have/ or history of the following conditions?
<div class="input_form">
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
<input name="asthma" value="asthma" type="checkbox" id="asthma" value="<?= $row['asthma'];?>" <?php if ($row['asthma']) echo "checked"; ?>>
<label class="labels" for="asthma" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Asthma</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
<input name="faintingspells" value="faintingspells" type="checkbox" id="faintingspells" value="<?= $row['faintingspells'];?>" <?php if ($row['faintingspells']) echo "checked"; ?>>
<label class="labels" for="faintingspells" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fainting Spells</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
<input name="allergicrhinitis" value="allergicrhinitis" type="checkbox" id="allergicrhinitis" value="<?= $row['allergicrhinitis'];?>" <?php if ($row['allergicrhinitis']) echo "checked"; ?>>
<label class="labels" for="allergicrhinitis" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Allergic Rhinitis</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
<input name="freqheadache" value="freqheadache" type="checkbox" id="freqheadache" value="<?= $row['freqheadache'];?>" <?php if ($row['freqheadache']) echo "checked"; ?>>
<label class="labels" for="freqheadache" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Frequent Headache</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="input_form">
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
<input name="anxietydis" value="anxietydis" type="checkbox" id="anxietydis" value="<?= $row['anxietydis'];?>" <?php if ($row['anxietydis']) echo "checked"; ?>>
<label class="labels" for="anxietydis" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Anxiety Disoder</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
<input name="g6pd" value="g6pd" type="checkbox" id="g6pd" value="<?= $row['g6pd'];?>" <?php if ($row['g6pd']) echo "checked"; ?>>
<label class="labels" for="g6pd" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;G6PD</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
<input name="bleedingclotting" value="bleedingclotting" type="checkbox" id="bleedingclotting" value="<?= $row['bleedingclotting'];?>" <?php if ($row['bleedingclotting']) echo "checked"; ?>>
<label class="labels" for="bleedingclotting" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bleeding/Clotting Disorder</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
<input name="hearingprob" value="hearingprob" type="checkbox" id="hearingprob" value="<?= $row['hearingprob'];?>" <?php if ($row['hearingprob']) echo "checked"; ?>>
<label class="labels" for="hearingprob" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hearing Problem</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<br><br>
<div class="input_form">
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
<input name="hypergas" value="hypergas" type="checkbox" id="hypergas" value="<?= $row['hypergas'];?>" <?php if ($row['hypergas']) echo "checked"; ?>>
<label class="labels" for="hypergas" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hyperacidity/Gastritis</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
<input name="derma" value="derma" type="checkbox" id="derma" value="<?= $row['derma'];?>" <?php if ($row['derma']) echo "checked"; ?>>
<label class="labels" for="derma" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dermatitis/Skin Problem</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
<input name="hypertension" value="hypertension" type="checkbox" id="hypertension" value="<?= $row['hypertension'];?>" <?php if ($row['hypertension']) echo "checked"; ?>>
<label class="labels" for="hypertension" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hypertension</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
<input name="diabetes" value="diabetes" type="checkbox" id="diabetes" value="<?= $row['diabetes'];?>" <?php if ($row['diabetes']) echo "checked"; ?>>
<label class="labels" for="diabetes" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Diabetes Mellitus</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<br><br>
<div class="input_form">
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
<input name="hyperventilation" value="hyperventilation" type="checkbox" id="hyperventilation" value="<?= $row['hyperventilation'];?>" <?php if ($row['hyperventilation']) echo "checked"; ?>>
<label class="labels" for="hyperventilation" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hyperventilation</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
<input name="mens" value="mens" type="checkbox" id="mens" value="<?= $row['mens'];?>" <?php if ($row['mens']) echo "checked"; ?>>
<label class="labels" for="mens" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dysmenorrhea/Menstrual Cramps</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <div class="input_wrap">
        <label for="fullname">Others</label>
        <input name="othersmedical" id ="othersmedical" type="text" placeholder="Other Conditions"  value="<?=$row['othersmedical'];?>" readonly>
    </div>

    <br>
<p>Do you have a heart condition? (If yes, please specify.)</p>
<div class="row-container">
  <div class="checkbox">
      <input name="yesheartcon" value="yesheartcon" type="checkbox" id="yesheartcon" value="<?= $row['yesheartcon'];?>" <?php if ($row['yesheartcon']) echo "checked"; ?>>
      <label class="labels" for="yesheartcon" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">
    <input name="noheartcon" value="noheartcon" type="checkbox" id="noheartcon" value="<?= $row['noheartcon'];?>" <?php if ($row['noheartcon']) echo "checked"; ?>>
    <label class="labels" for="noheartcon" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
  <input name="heartcon" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['heartcon'];?>" readonly>
  </div>
</div>
<br>
<p>Do you have an Eye problem? (If yes, please specify.)</p>
<div class="row-container">
  <div class="checkbox">
  <input name="yeseyeprob" value="yeseyeprob" type="checkbox" id="yeseyeprob" value="<?= $row['yeseyeprob'];?>" <?php if ($row['yeseyeprob']) echo "checked"; ?>>
    <label class="labels" for="yeseyeprob" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">
  <input name="noeyeprob" value="noeyeprob" type="checkbox" id="noeyeprob" value="<?= $row['noeyeprob'];?>" <?php if ($row['noeyeprob']) echo "checked"; ?>>
    <label class="labels" for="noeyeprob" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
  <input name="eyeprob" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['eyeprob'];?>" readonly>  
</div>
</div>
<br>
<p>Do you have a history of serious illness and/or hospitalization? (Please specify and include dates.)</p>
<div class="row-container">
  <div class="checkbox">
  <input name="yesseriousillnes" value="yesseriousillnes" type="checkbox" id="yesseriousillnes" value="<?= $row['yesseriousillnes'];?>" <?php if ($row['yesseriousillnes']) echo "checked"; ?>>
    <label class="labels" for="yesseriousillnes" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">
  <input name="noseriousillnes" value="noseriousillnes" type="checkbox" id="noseriousillnes" value="<?= $row['noseriousillnes'];?>" <?php if ($row['noseriousillnes']) echo "checked"; ?>>
    <label class="labels" for="noseriousillnes" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
  <input name="seriousillnes" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['seriousillnes'];?>" readonly>
  </div>
</div>

<br>
<p>Do you have a history of surgeries and/or injuries? (Please specify and include dates.)</p><div class="row-container">
  <div class="checkbox">
  <input name="yessurgeries" value="yessurgeries" type="checkbox" id="yessurgeries" value="<?= $row['yessurgeries'];?>" <?php if ($row['yessurgeries']) echo "checked"; ?>>
    <label class="labels" for="yesseriousillnes" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">
  <input name="nosurgeries" value="nosurgeries" type="checkbox" id="nosurgeries" value="<?= $row['nosurgeries'];?>" <?php if ($row['nosurgeries']) echo "checked"; ?>>
    <label class="labels" for="noseriousillnes" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
  <input name="surgeries" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['surgeries'];?>" readonly>
  </div>
</div>

<br>
<p>Do receive any medication or medical treatment, either regulary or occasionally? (If yes, please explain.)</p>
<div class="row-container">
  <div class="checkbox">
  <input name="yesreceive" value="yesreceive" type="checkbox" id="yesreceive" value="<?= $row['yesreceive'];?>" <?php if ($row['yesreceive']) echo "checked"; ?>>
    <label class="labels" for="yesseriousillnes" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">
  <input name="noreceive" value="noreceive" type="checkbox" id="noreceive" value="<?= $row['noreceive'];?>" <?php if ($row['noreceive']) echo "checked"; ?>>
    <label class="labels" for="noseriousillnes" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
  <input name="receive" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['receive'];?>" readonly>
  </div>
</div>
<br>
<p>Do you have any allergies to medication? (If yes, please specify.)</p>
<div class="row-container">
  <div class="checkbox">
  <input name="yesallergiesmed" value="yesallergiesmed" type="checkbox" id="yesallergiesmed" value="<?= $row['yesallergiesmed'];?>" <?php if ($row['yesallergiesmed']) echo "checked"; ?>>
    <label class="labels" for="yesseriousillnes" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">
  <input name="noallergiesmed" value="noallergiesmed" type="checkbox" id="noallergiesmed" value="<?= $row['noallergiesmed'];?>" <?php if ($row['noallergiesmed']) echo "checked"; ?>>
    <label class="labels" for="noseriousillnes" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
  <input name="allergiesmed" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['allergiesmed'];?>" readonly>
  </div>
</div>

<br>
<p>Do you have any allergies to food? (If yes, please specify.)</p>
<div class="row-container">
  <div class="checkbox">
  <input name="yesallergiesfood" value="yesallergiesfood" type="checkbox" id="yesallergiesfood" value="<?= $row['yesallergiesfood'];?>" <?php if ($row['yesallergiesfood']) echo "checked"; ?>>
    <label class="labels" for="yesseriousillnes" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">
  <input name="noallergiesfood" value="noallergiesfood" type="checkbox" id="noallergiesfood" value="<?= $row['noallergiesfood'];?>" <?php if ($row['noallergiesfood']) echo "checked"; ?>>
    <label class="labels" for="noseriousillnes" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
  <input name="allergiesfood" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['allergiesfood'];?>" readonly>
  </div>
</div>

<br>
<p>Would you like to receive minor first aid (medication & treatment) given by the nurse in the school clinic?</p>
<div class="row-container">
  <div class="checkbox">
  <input name="yesfirstaid" value="yesfirstaid" type="checkbox" id="yesfirstaid" value="<?= $row['yesfirstaid'];?>" <?php if ($row['yesfirstaid']) echo "checked"; ?>>
    <label class="labels" for="yesfirstaid" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">
  <input name="nofirstaid" value="nofirstaid" type="checkbox" id="nofirstaid" value="<?= $row['nofirstaid'];?>" <?php if ($row['nofirstaid']) echo "checked"; ?>>
    <label class="labels" for="noseriousillnes" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>
</div>

<br>
<p>Do you have any concerns related to your health? (If yes, please explain.)</p>
<div class="row-container">
  <div class="checkbox">
  <input name="yesconcerns" value="yesconcerns" type="checkbox" id="yesconcerns" value="<?= $row['yesconcerns'];?>" <?php if ($row['yesconcerns']) echo "checked"; ?>>
    <label class="labels" for="yesseriousillnes" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes</label>
  </div>

  <div class="checkbox">
  <input name="noconcerns" value="noconcerns" type="checkbox" id="noconcerns" value="<?= $row['noconcerns'];?>" <?php if ($row['noconcerns']) echo "checked"; ?>>
    <label class="labels" for="noconcerns" style="font-size: 14px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No</label>
  </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <div class="input_wrap">
  <input name="concerns" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['concerns'];?>" readonly>
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


</body>
</html> 
