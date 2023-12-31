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
			require_once('../../db.php');
			if($_SESSION['leveleduc'] == 1){
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
    </style>

</head> 

<body class="app">   	
   
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
				    <div class="row g-3 align-items-center"></div>
				    
<div class="app-card-body p-4">
    <?php
			$sql = "SELECT * FROM healthrecordformgsjhs WHERE user_id = '$user_id'";
			$result = $conn->query($sql);
    		while($row = $result->fetch_array()){
		?>

<div class="container">

  <div class="form-container">
    <div class="form-title">
    Health Record Form
    </div>
    
              <div class="input_form">
                
                <div class="input_wrap" style="text-align: center;">
                  <div class="image_container" style="display: inline-block; text-align: center;">
                      <img src="<?php echo "/CAPSTONE1/upload_image/".$row['image'];?>" style="display: block; margin: 0 auto;">
                      <label style="text-align: center; display: block;">Your Image</label>
                  </div>
                </div>

              </div>
              <br>

                <div class="input_form">

                  <div class="input_wrap">
                    <label for="fullname">Full Name</label>
                    <input name="fullname" type="text" class="input-box" value="<?= $fullname; ?>" readonly >
                  </div>

                  <div class="input_wrap">
                    <label for="fullname">ID Number</label>
                    <input name="idnumber" type="text" class="input-box" value="<?=$row['idnumber'];?>" readonly >
                  </div>

                  <div class="input_wrap">
                    <label for="fullname">Personal Contact Number</label>
                    <input name="cp" type="text" class="input-box" value="<?=$row['cp'];?>" readonly>
                  </div>

                </div>

<div class="input_form">

  <div class="input_wrap">
    <label for="fullname">Birthday</label>
    <input name="birthday" type="text" class="input-box" value="<?=$row['birthday'];?>" readonly>
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
        <input class="input-box" name="address" id ="address" type="text" value="<?=$row['address'];?>" readonly>
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
    <input class="input-box" name="cfather" id="contactInput_one" type="text" value="<?=$row['cfather'];?>" readonly>
  </div>

</div>

<div class="input_form">

  <div class="input_wrap">
      <label for="fullname">Name of Mother</label>
      <input name="mothername" id="mother" type="text" value="<?=$row['mother'];?>" readonly>
  </div>

  <div class="input_wrap">
      <label for="fullname">Contact</label>
      <input class="input-box" name="cmother" id="contactInput_two" type="text" value="<?=$row['cmother'];?>" readonly>
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

<div class="input_form">
    <label for="fullname" style="font-size: 18px;">Student lives with: </label>
</div>
<br>

<div class="checkbox-group">

  <div>
    <input  class="checkbox" name="parent" value="bothparents" type="checkbox" id="bothparents" value="<?= $row['bothparents'];?>" <?php if ($row['bothparents']) echo "checked"; ?>>
    <label class="checkbox-label" for="bothparents" style="font-size: 14px; padding-left: 30px;">Both Parents</label>
  </div>

  <div>
    <input class="checkbox" name="parent" value="livesmother" type="checkbox" id="livesmother" value="<?= $row['mother'];?>" <?php if ($row['mother']) echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;"  for="livesmother">Mother</label>
  </div>

  <div>
    <input class="checkbox" name="parent" value="livesfather" type="checkbox" id="livesfather" value="<?= $row['father'];?>" <?php if ($row['father']) echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;"  for="livesfather">Father</label>
  </div>

  <div>
    <input class="checkbox" name="guardian" value="guardian" type="checkbox" id="guardian" value="<?= $row['guardian'];?>" <?php if ($row['guardian']) echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;"  for="guardian">Guardian</label>
  </div>

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
      <input id="contactInput_cguardian" class="input-box" name="cguardian" type="text"  value="<?=$row['cguardian'];?>" readonly>
  </div>
</div>

<div class="input_form">

  <div class="input_wrap">
    <label for="fullname">Alternation Person to Contact in Case of Emergency</label>
    <input name="altrelation" id="altrelation" type="text" value="<?= isset($row['altrelation']) ? htmlspecialchars($row['altrelation']) : ''; ?>" readonly>
  </div>

  <div class="input_wrap">
      <label for="fullname">Relationship to the student/employee</label>
      <input name="altrel" id="altrel" type="text" value="<?= isset($row['altrel']) ? htmlspecialchars($row['altrel']) : ''; ?>" readonly>
  </div>
</div>

<div class="input_form">

  <div class="input_wrap">
      <label for="fullname">Contact</label>
      <input id="contactInput_acontact" class="input-box" name="acontact" type="text" value="<?= isset($row['acontact']) ? htmlspecialchars($row['acontact']) : ''; ?>" readonly>
  </div>

</div>

  <div>
    <p class="title" style="font-size: 20px; font-weight: bold;">IMMUNIZATION</p>
  </div>
  <p class="instructions">Please select the box if your child/ward has completed the following Primary Immunization.</p>

  <div class="checkbox-group">

    <div>
      <input class="checkbox" name="bcg" value="bcg" type="checkbox" id="bcg" value="<?= $row['bcg'];?>" <?php if ($row['bcg']) echo "checked"; ?>>
      <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="bcg">BCG</label>
    </div>

    <div>
      <input class="checkbox" name="dpt" value="dpt" type="checkbox" id="dpt" value="<?= $row['dpt'];?>" <?php if ($row['dpt']) echo "checked"; ?>>
      <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="dpt">DPT</label>
    </div>

    <div>
      <input class="checkbox" name="opv" value="opv" type="checkbox" id="opv" value="<?= $row['opv'];?>" <?php if ($row['opv']) echo "checked"; ?>>
      <label class="checkbox-label"  style="font-size: 14px; padding-left: 30px;" for="opv">OPV</label>
    </div>

    <div>
      <input class="checkbox" name="hepa" value="hepa" type="checkbox" id="hepa" value="<?= $row['hepa'];?>" <?php if ($row['hepa']) echo "checked"; ?>>
      <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="hepa">Hepa B</label>
    </div>

    <div>
      <input class="checkbox" name="measles" value="measles" type="checkbox" id="measles" value="<?= $row['measles'];?>" <?php if ($row['measles']) echo "checked"; ?>>
      <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="measles">Measles</label>
    </div>

  </div>


<div class="input_wrap">
    <label for="fullname">Others</label>
    <input class="input-box" name="others" id="others" type="text" value="<?=$row['others'];?>" readonly>
</div>

<br>
<p>Does your child/ward have COVID-19 Vacination? (If with First, Second or Booster dose, please attach a screenshot of Vaccination Card).</p> <p>The Employee is required to answer this.</p>



<div class="input_form">

  <div>
    <input class="checkbox" name="firstdose" value="firstdose" type="checkbox" id="firstdose" value="<?= $row['firstdose'];?>" <?php if ($row['firstdose']) echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="firstdose">First Dose Only</label>
  </div>

  <div>
    <input class="checkbox" name="seconddose" value="seconddose" type="checkbox" id="seconddose" value="<?= $row['seconddose'];?>" <?php if ($row['seconddose']) echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="seconddose">Second Dose</label>
  </div>

  <div>
    <input class="checkbox" name="boosterdose" type="checkbox" id="boosterdose" value="<?= $row['boosterdose'];?>" <?php if ($row['boosterdose']) echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="boosterdose">Booster Dose</label>
  </div>

  <div>
    <input class="checkbox" name="no" value="no" type="checkbox" id="no" value="<?= $row['no'];?>" <?php if ($row['no']) echo "checked"; ?>>
    <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="no">No</label>
  </div>  

</div>

<div class="input_wrap">
  <div class="image_container">
    <label>Vaccination Attachment</label>
      <img src="<?php echo "/CAPSTONE1/upload_image/".$row['imagevac'];?>">
  </div>
</div>

<br>
<div class="medical-history">

  <p class="title" style="font-size: 20px; font-weight: bold;">MEDICAL HISTORY</p>
  <p>Does you/your child have/ or history of the following conditions?

  <div class="checkbox-group">

    <div>
      <input class="checkbox" name="asthma" value="asthma" type="checkbox" id="asthma" value="<?= $row['asthma'];?>" <?php if ($row['asthma']) echo "checked"; ?>>
      <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="asthma">Asthma</label>
    </div>

    <div>
      <input  class="checkbox" name="faintingspells" value="faintingspells" type="checkbox" id="faintingspells" value="<?= $row['faintingspells'];?>" <?php if ($row['faintingspells']) echo "checked"; ?>>
      <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="faintingspells">Fainting Spells</label>
    </div>

    <div>
      <input class="checkbox" name="allergicrhinitis" value="allergicrhinitis" type="checkbox" id="allergicrhinitis" value="<?= $row['allergicrhinitis'];?>" <?php if ($row['allergicrhinitis']) echo "checked"; ?>>
      <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="allergicrhinitis">Allergic Rhinitis</label>
    </div>

    <div>
      <input class="checkbox" name="freqheadache" value="freqheadache" type="checkbox" id="freqheadache" value="<?= $row['freqheadache'];?>" <?php if ($row['freqheadache']) echo "checked"; ?>>
      <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="freqheadache">Frequent Headache</label>
    </div>

    <div>
      <input class="checkbox" name="anxietydis" value="anxietydis" type="checkbox" id="anxietydis" value="<?= $row['anxietydis'];?>" <?php if ($row['anxietydis']) echo "checked"; ?>>
      <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="anxietydis">Anxiety Disoder</label>
    </div>

    <div>
      <input class="checkbox" name="g6pd" value="g6pd" type="checkbox" id="g6pd" value="<?= $row['g6pd'];?>" <?php if ($row['g6pd']) echo "checked"; ?>>
      <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="g6pd">G6PD</label>
    </div>

    <div>
      <input class="checkbox" name="bleedingclotting" value="bleedingclotting" type="checkbox" id="bleedingclotting" value="<?= $row['bleedingclotting'];?>" <?php if ($row['bleedingclotting']) echo "checked"; ?>>
      <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="bleedingclotting">Bleeding/Clotting Disorder</label>
    </div>

    <div>
      <input class="checkbox" name="hearingprob" value="hearingprob" type="checkbox" id="hearingprob" value="<?= $row['hearingprob'];?>" <?php if ($row['hearingprob']) echo "checked"; ?>>
      <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="hearingprob">Hearing Problem</label>
    </div> 
    
    <div>
      <input class="checkbox" name="hypergas" value="hypergas" type="checkbox" id="hypergas" value="<?= $row['hypergas'];?>" <?php if ($row['hypergas']) echo "checked"; ?>>
      <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="hypergas">Hyperacidity/Gastritis</label>
    </div>

    <div>
      <input class="checkbox" name="derma" value="derma" type="checkbox" id="derma" value="<?= $row['derma'];?>" <?php if ($row['derma']) echo "checked"; ?>>
      <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="derma">Dermatitis/Skin Problem</label>
    </div>

    <div>
      <input class="checkbox" name="hypertension" value="hypertension" type="checkbox" id="hypertension" value="<?= $row['hypertension'];?>" <?php if ($row['hypertension']) echo "checked"; ?>>
      <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="hypertension">Hypertension</label>
    </div>

    <div>
      <input class="checkbox" name="diabetes" value="diabetes" type="checkbox" id="diabetes" value="<?= $row['diabetes'];?>" <?php if ($row['diabetes']) echo "checked"; ?>>
      <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="diabetes">Diabetes Mellitus</label>
    </div>

    <div>
      <input class="checkbox" name="hyperventilation" value="hyperventilation" type="checkbox" id="hyperventilation" value="<?= $row['hyperventilation'];?>" <?php if ($row['hyperventilation']) echo "checked"; ?>>
      <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="hyperventilation">Hyperventilation</label>
    </div>

    <div>
      <input class="checkbox" name="mens" value="mens" type="checkbox" id="mens" value="<?= $row['mens'];?>" <?php if ($row['mens']) echo "checked"; ?>>
      <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="mens">Dysmenorrhea/Menstrual Cramps</label>
    </div>

  </div>
</div>


    <div class="input_wrap">
        <label for="fullname">Others</label>
        <input name="othersmedical" class="input-box" id ="othersmedical" type="text" placeholder="Other Conditions"  value="<?=$row['othersmedical'];?>" readonly>
    </div>

<div class="input_wrap">
  <p>Do you have a heart condition? (If yes, please specify.)</p>                

  <div class="row-container">
    <div>
        <input class="checkbox" name="yesheartcon" value="yesheartcon" type="checkbox" id="yesheartcon" value="<?= $row['yesheartcon'];?>" <?php if ($row['yesheartcon']) echo "checked"; ?>>
        <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="yesheartcon">Yes</label>
    </div>

    <div>
      <input class="checkbox" name="noheartcon" value="noheartcon" type="checkbox" id="noheartcon" value="<?= $row['noheartcon'];?>" <?php if ($row['noheartcon']) echo "checked"; ?>>
      <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="noheartcon">No</label>
    </div>

    <div class="input_wrap">
      <input name="heartcon" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['heartcon'];?>" readonly>
    </div>
  </div>
</div>

<div class="question">
<p>Do you have an Eye problem? (If yes, please specify.)</p>

  <div class="row-container">

    <div>
      <input class="checkbox" name="yeseyeprob" value="yeseyeprob" type="checkbox" id="yeseyeprob" value="<?= $row['yeseyeprob'];?>" <?php if ($row['yeseyeprob']) echo "checked"; ?>>
      <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="yeseyeprob">Yes</label>
    </div>

    <div>
      <input class="checkbox" name="noeyeprob" value="noeyeprob" type="checkbox" id="noeyeprob" value="<?= $row['noeyeprob'];?>" <?php if ($row['noeyeprob']) echo "checked"; ?>>
      <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="noeyeprob">No</label>
    </div>

    <div class="input_wrap">
      <input class="input-box" name="eyeprob" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['eyeprob'];?>" readonly>  
    </div>

  </div>

</div>

<div class="question">

  <p>Do you have a history of serious illness and/or hospitalization? (Please specify and include dates.)</p>

  <div class="row-container">

    <div>
      <input class="checkbox" name="yesseriousillnes" value="yesseriousillnes" type="checkbox" id="yesseriousillnes" value="<?= $row['yesseriousillnes'];?>" <?php if ($row['yesseriousillnes']) echo "checked"; ?>>
      <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="yesseriousillnes">Yes</label>
    </div>

    <div>
      <input class="checkbox" name="noseriousillnes" value="noseriousillnes" type="checkbox" id="noseriousillnes" value="<?= $row['noseriousillnes'];?>" <?php if ($row['noseriousillnes']) echo "checked"; ?>>
      <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="noseriousillnes">No</label>
    </div>

    <div class="input_wrap">
      <input class="input-box" name="seriousillnes" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['seriousillnes'];?>" readonly>
    </div>

  </div>

</div>

<div class="question">

  <p>Do you have a history of surgeries and/or injuries? (Please specify and include dates.)</p>

  <div class="row-container">

    <div>
      <input class="checkbox" name="yessurgeries" value="yessurgeries" type="checkbox" id="yessurgeries" value="<?= $row['yessurgeries'];?>" <?php if ($row['yessurgeries']) echo "checked"; ?>>
      <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="yesseriousillnes">
      Yes</label>
    </div>

    <div>
      <input class="checkbox" name="nosurgeries" value="nosurgeries" type="checkbox" id="nosurgeries" value="<?= $row['nosurgeries'];?>" <?php if ($row['nosurgeries']) echo "checked"; ?>>
      <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="noseriousillnes">
      No</label>
    </div>

    <div class="input_wrap">
      <input class="input-box" name="surgeries" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['surgeries'];?>" readonly>
    </div>

  </div>

</div>

<div class="question">

  <p>Do receive any medication or medical treatment, either regulary or occasionally? (If yes, please explain.)</p>
  <div class="row-container">

    <div>
      <input class="checkbox" name="yesreceive" value="yesreceive" type="checkbox" id="yesreceive" value="<?= $row['yesreceive'];?>" <?php if ($row['yesreceive']) echo "checked"; ?>>
      <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="yesseriousillnes">Yes</label>
    </div>

    <div>
      <input class="checkbox" name="noreceive" value="noreceive" type="checkbox" id="noreceive" value="<?= $row['noreceive'];?>" <?php if ($row['noreceive']) echo "checked"; ?>>
      <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="noseriousillnes">No</label>
    </div>

    <div class="input_wrap">
      <input class="input-box" name="receive" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['receive'];?>" readonly>
    </div>
  </div>

</div>

<div class="question">

  <p>Do you have any allergies to medication? (If yes, please specify.)</p>
  <div class="row-container">

    <div>
      <input class="checkbox" name="yesallergiesmed" value="yesallergiesmed" type="checkbox" id="yesallergiesmed" value="<?= $row['yesallergiesmed'];?>" <?php if ($row['yesallergiesmed']) echo "checked"; ?>>
      <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="yesseriousillnes">Yes</label>
    </div>

    <div>
      <input class="checkbox" name="noallergiesmed" value="noallergiesmed" type="checkbox" id="noallergiesmed" value="<?= $row['noallergiesmed'];?>" <?php if ($row['noallergiesmed']) echo "checked"; ?>>
      <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="noseriousillnes">No</label>
    </div>

    <div class="input_wrap">
    <input class="input-box" name="allergiesmed" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['allergiesmed'];?>" readonly>
    </div>
  </div>

</div>

<div class="question">

  <p>Do you have any allergies to food? (If yes, please specify.)</p>
  <div class="row-container">
    <div>
      <input class="checkbox" name="yesallergiesfood" value="yesallergiesfood" type="checkbox" id="yesallergiesfood" value="<?= $row['yesallergiesfood'];?>" <?php if ($row['yesallergiesfood']) echo "checked"; ?>>
      <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="yesseriousillnes">Yes</label>
    </div>

    <div>
      <input class="checkbox" name="noallergiesfood" value="noallergiesfood" type="checkbox" id="noallergiesfood" value="<?= $row['noallergiesfood'];?>" <?php if ($row['noallergiesfood']) echo "checked"; ?>>
      <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="noseriousillnes">No</label>
    </div>

    <div class="input_wrap">
      <input class="input-box" name="allergiesfood" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['allergiesfood'];?>" readonly>
    </div>
    
  </div>

</div>

<div class="question">

  <p>Would you like to receive minor first aid (medication & treatment) given by the nurse in the school clinic?</p>
  <div class="row-container">
    <div>
      <input class="checkbox" name="yesfirstaid" value="yesfirstaid" type="checkbox" id="yesfirstaid" value="<?= $row['yesfirstaid'];?>" <?php if ($row['yesfirstaid']) echo "checked"; ?>>
      <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="yesfirstaid">Yes</label>
    </div>

    <div>
      <input class="checkbox" name="nofirstaid" value="nofirstaid" type="checkbox" id="nofirstaid" value="<?= $row['nofirstaid'];?>" <?php if ($row['nofirstaid']) echo "checked"; ?>>
      <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="noseriousillnes">No</label>
    </div>
  </div>

</div>

<div class="question">

<p>Do you have any concerns related to your health? (If yes, please explain.)</p>
  <div class="row-container">
    <div>
      <input class="checkbox" name="yesconcerns" value="yesconcerns" type="checkbox" id="yesconcerns" value="<?= $row['yesconcerns'];?>" <?php if ($row['yesconcerns']) echo "checked"; ?>>
      <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="yesseriousillnes">Yes</label>
    </div>

    <div>
      <input class="checkbox" name="noconcerns" value="noconcerns" type="checkbox" id="noconcerns" value="<?= $row['noconcerns'];?>" <?php if ($row['noconcerns']) echo "checked"; ?>>
      <label class="checkbox-label" style="font-size: 14px; padding-left: 30px;" for="noconcerns">No</label>
    </div>

    <div class="input_wrap">
      <input class="input-box" name="concerns" id="otherillnesss" type="text" placeholder="If YES, please specify" value="<?=$row['concerns'];?>" readonly>
    </div>

  </div>

</div>
					<?php
							}
						?>
				    </div><!--//app-card-body-->
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
