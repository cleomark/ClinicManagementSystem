<?php
    session_start();
    include '../../db.php';

    if (!isset($_SESSION['admin_id'])){
        echo '<script>window.alert("PLEASE LOGIN FIRST!!")</script>';
        echo '<script>window.location.replace("login.php");</script>';
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
  $gradelevel = $row['gradelevel'];
  $idnumber = $row['role'];
  $fullname= $row['fullname'];
  $cp = $row['cp'];
  $age = $row['idnumber'];
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
  $heartcondition =$row['heartcondition'];
  $eyeproblem =$row['eyeproblem'];
  $illness = $row['illness'];
  $injuries =$row['injuries'];
  $treatment =$row['treatment'];
  $medication = $row['medication'];
  $food =$row['food'];
  $firstaid =$row['firstaid'];
  $concernshealth =$row['concernshealth'];


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
        <label for="gradelevel">Grade Level</label>
        <input id="gradelevel" name="gradelevel" type="text" value="<?=$row['gradelevel'];?>" readonly >
    </div>
    <div class="input_wrap">
                <label for="fullname">Role</label>
                <select class="form-select" name="role">
                <option disabled selected><?= $row['role'];?></option>
                </select>
        </div>
<div class="input_wrap">
        <label for="fullname">Full Name</label>
        <input id="fullname" name="fullname" type="text" value="<?= $fullname; ?>" >
    </div>
                    </div>
                    </div>
                    <br><br>
<div class="input_form">
    <div class="input_wrap">
    
        <label for="fullname">ID Number</label>
        <input name="idnumber" type="text" value="<?=$row['idnumber'];?>" readonly >
    </div>
    <div class="input_wrap">
        <label for="fullname">Personal Contact Number</label>
        <input name="cp" type="text" value="<?=$row['cp'];?>" readonly>
    </div>
    <div class="input_wrap">
        <label for="fullname">Age</label>
        <input name="age" type="text" value="<?=$row['age'];?>" readonly>
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
    <input name="bothparents" value="bothparents" type="checkbox" id="bothparents" value="<?= $row['bothparents'];?>" <?php if ($row['bothparents']) echo "checked"; ?>>
    <label class="labels" for="bothparents" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Both Parents</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
    <input name="livesmother" value="livesmother" type="checkbox" id="mother" value="<?= $row['mother'];?>" <?php if ($row['mother']) echo "checked"; ?>>
    <label class="labels" for="livesmother" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mother</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
    <input name="livesfather" value="livesfather" type="checkbox" id="father" value="<?= $row['father'];?>" <?php if ($row['father']) echo "checked"; ?>>
    <label class="labels" for="livesfather" style="font-size: 14px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Father</label>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="checkbox">
    <input name="guardian" value="guardian" type="checkbox" id="guardian" value="<?= $row['guardian'];?>" <?php if ($row['guardian']) echo "checked"; ?>>
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

    <div class="input_form">   
    <div class="input_wrap">
        <label for="fullname">Do you have a heart condition? (If yes, please specify.)</label>
        <input name="heartcondition" id ="language" type="text" value="<?=$row['heartcondition'];?>" readonly>
    </div>   
</div>
    <div class="input_form">   
    <div class="input_wrap">
        <label for="fullname">Do you have an Eye problem? (If yes, please specify.)</label>
        <input name="eyeproblem" id ="language" type="text" value="<?=$row['eyeproblem'];?>" readonly>
    </div>
</div>
<div class="input_form"> 
    <div class="input_wrap">
        <label for="fullname">Do you have a history of serious illness and/or hospitalization? (Please specify and include dates.)</label>
        <input name="illness" id ="language" type="text" value="<?=$row['illness'];?>" readonly>
    </div>
</div>

<div class="input_form"> 
    <div class="input_wrap">
        <label for="fullname">Do you have a history of surgeries and/or injuries? (Please specify and include dates.)</label>
        <input name="injuries" id ="language" type="text" value="<?=$row['injuries'];?>" readonly>
    </div>
</div>

<div class="input_form"> 
    <div class="input_wrap">
        <label for="fullname">Do receive any medication or medical treatment, either regulary or occasionally? (If yes, please explain.)</label>
        <input name="treatment" id ="language" type="text" value="<?=$row['treatment'];?>" readonly>
    </div>
</div>

<div class="input_form"> 
    <div class="input_wrap">
        <label for="fullname">Do you have any allergies to medication? (If yes, please specify.)</label>
        <input name="medication" id ="language" type="text" value="<?=$row['medication'];?>" readonly>
    </div>
</div>

<div class="input_form"> 
    <div class="input_wrap">
        <label for="fullname">Do you have any allergies to food? (If yes, please specify.)</label>
        <input name="food" id ="language" type="text" value="<?=$row['food'];?>" readonly>
    </div>
</div>

<div class="input_form"> 
    <div class="input_wrap">
        <label for="fullname">Would you like to receive minor first aid (medication & treatment) given
            by the nurse in the school clinic?</label>
        <input name="firstaid" id ="language" type="text" value="<?=$row['firstaid'];?>" readonly>
    </div>
                    </div>
<div class="input_form"> 
    <div class="input_wrap">
        <label for="fullname">Do you have any concerns related to your health? (If yes, please explain.)</label>
        <input name="concernshealth" id ="language" type="text" value="<?=$row['concernshealth'];?>" readonly>
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
