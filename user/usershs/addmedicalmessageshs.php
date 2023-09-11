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
    <title>Request Medical Schedule</title>
    
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
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
                        <div class="col-12 col-lg-auto text-center text-lg-start">
						        <h4 class="notification-title mb-1">Request Medical Schedule</h4>
					        </div>
                            <?php
								if(isset($_SESSION['success'])){
									echo $_SESSION['success'];
									unset($_SESSION['success']);
								}
							?>
				        </div><!--//row-->
				    </div><!--//app-card-header-->
            <div class="app-card-body p-4">
                    <b><p>Please wait for a message for approval of your medical request appointment.</b></p>
<form class="form-horizontal mt-4" method="post" action="function/functions.php" onsubmit="return validateForm()">
<div class="row">
  <div class="col-sm-3">
    <div class="form-group">
      <label for="idnumber" class="col-sm-12 control-label" style="font-size: 16px">Student/Employee 1 ID Number</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="idnumber" name="idnumber" placeholder="Enter ID number" required>
      </div>
    </div>
  </div>

  <div class="col-sm-3">
    <div class="form-group">
      <label for="patient_name" class="col-sm-12 control-label" style="font-size: 16px">Student/Employee 1 Fullname</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="name" name="name1" placeholder="Enter Fullname" required>
      </div>
    </div>
  </div>

  <div class="col-sm-3">
    <div class="form-group">
      <label for="gradecourseyear1" class="col-sm-12 control-label" style="font-size: 16px">Grade & Section</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="gradecourseyear1" name="gradecourseyear1" placeholder="Enter Grade & Section">
      </div>
    </div>
  </div>

  <div class="col-sm-3">
  <div class="form-group">
    <label for="phoneno" class="col-sm-12 control-label" style="font-size: 16px">Phone Number</label>
    <div class="col-sm-12">
      <input id="personalContactInput" name="phoneno" type="text" placeholder="+63" class="form-control contactInput">
      <p id="personalContactError" class="errorMessage" style="color: red; display: none;">Invalid Phone Number</p>
    </div>
  </div>
</div>

<script>
    const personalContactInput = document.getElementById('personalContactInput');
    const personalContactError = document.getElementById('personalContactError');

    personalContactInput.addEventListener('input', function() {
        let inputValue = personalContactInput.value.trim();

        // Ensure that the input always starts with "+63"
        if (!inputValue.startsWith('+63')) {
            inputValue = '+63' + inputValue;
        }

        // Remove any extra characters beyond the maximum length
        if (inputValue.length > 13) {
            inputValue = inputValue.slice(0, 13);
        }

        // Check if the input is valid
        if (inputValue === '+63' || (inputValue.startsWith('+63') && inputValue.length <= 13 && inputValue[3] === '9')) {
            personalContactInput.value = inputValue;
            personalContactError.style.display = 'none'; // Hide the error message
        } else {
            personalContactInput.value = ''; // Clear the input if it's invalid
            personalContactError.style.display = 'block'; // Show the error message for invalid input
        }
    });
</script>
</div>

<br>

<br>
<div class="row">

<div class="col-sm-3">
    <div class="form-group">
        <label for="datetime" class="col-sm-12 control-label" style="font-size: 16px">Schedule</label>
        <div class="col-sm-12">
            <input type="text" class="form-control no-color-change" id="selected-date" name="date_time" placeholder="Choose Date in the Calendar" readonly>
        </div>
    </div>
</div>

<div class="col-sm-3">
    <div class="form-group">
        <label for="newInput" class="col-sm-12 control-label" style="font-size: 16px">Time</label>
        <div class="col-sm-12">
            <input type="text" class="form-control no-color-change" id="sched_time" name="sched_time" placeholder="Select Time" readonly>
        </div>
    </div>
</div>



    <div class="col-sm-3">
        <div class="form-group">
            <label for="role" class="col-sm-12 control-label" style="font-size: 16px">Role</label>
            <div class="col-sm-12">
                <select id="role" name="role" class="form-control">
                    <option value="">Select Role</option>
                    <option value="Student in SHS">Student</option>
                    <option value="Employee in SHS">Employee</option>
                </select>
            </div>
        </div>
    </div>


    <div class="col-sm-3">
        <div class="form-group">
            <label for="onoff" class="col-sm-12 control-label" style="font-size: 16px">On-campus/Off-campus Activity</label>
            <div class="col-sm-12">
                <select id="onoff" name="onoff" class="form-control" required>
                    <option value="">Select</option>
                    <option value="On-campus Activity">On-campus Activity</option>
                    <option value="Off-campus Activity">Off-campus Activity</option>
                </select>
            </div>
        </div>
    </div>
</div>

<br><br>

<?php
    class Calendar {
  

             //Constructor
             
            public function __construct(){     
                $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
            }
             
            // PROPERTY
            private $dayLabels = array("Mon","Tue","Wed","Thu","Fri","Sat","Sun");
             
            private $currentYear=0;
             
            private $currentMonth=0;
             
            private $currentDay=0;
             
            private $currentDate=null;
             
            private $daysInMonth=0;
             
            private $naviHref= null;
             
          //PUBLIC 
                
            // print out the calendar
            
            public function show() {
                $year  = null;
                 
                $month = null;
                 
                if(null==$year&&isset($_GET['year'])){
         
                    $year = $_GET['year'];
                 
                }else if(null==$year){
         
                    $year = date("Y",time());  
                 
                }          
                 
                if(null==$month&&isset($_GET['month'])){
         
                    $month = $_GET['month'];
                 
                }else if(null==$month){
         
                    $month = date("m",time());
                 
                }                  
                 
                $this->currentYear=$year;
                 
                $this->currentMonth=$month;
                 
                $this->daysInMonth=$this->_daysInMonth($month,$year);  
                 
                $content='<div id="calendar">'.
                                '<div class="box">'.
                                $this->_createNavi().
                                '</div>'.
                                '<div class="box-content">'.
                                        '<ul class="label">'.$this->_createLabels().'</ul>';   
                                        $content.='<div class="clear"></div>';     
                                        $content.='<ul class="dates">';    
                                         
                                        $weeksInMonth = $this->_weeksInMonth($month,$year);
                                        // Create weeks in a month
                                        for( $i=0; $i<$weeksInMonth; $i++ ){
                                             
                                            //Create days in a week
                                            for($j=1;$j<=7;$j++){
                                                $content.=$this->_showDay($i*7+$j);
                                            }
                                        }
                                         
                                        $content.='</ul>';
                                         
                                        $content.='<div class="clear"></div>';     
                     
                                $content.='</div>';
                         
                $content.='</div>';
                return $content;   
            }
             
            //PRIVATE 
            //create the li element for ul
            
            private function _showDay($cellNumber) {
                if ($this->currentDay == 0) {
                    $firstDayOfTheWeek = date('N', strtotime($this->currentYear . '-' . $this->currentMonth . '-01'));
            
                    if (intval($cellNumber) == intval($firstDayOfTheWeek)) {
                        $this->currentDay = 1;
                    }
                }
            
                if (($this->currentDay != 0) && ($this->currentDay <= $this->daysInMonth)) {
                    $this->currentDate = date('Y-m-d', strtotime($this->currentYear . '-' . $this->currentMonth . '-' . ($this->currentDay)));
                    $cellContent = $this->currentDay;
            
                    // Add data attributes for year and month
                    $dataYear = $this->currentYear;
                    $dataMonth = $this->currentMonth;
                    $this->currentDay++;
                } else {
                    $this->currentDate = null;
                    $cellContent = null;
                    $dataYear = null;
                    $dataMonth = null;
                }
            
                return '<li id="li-' . $this->currentDate . '" class="' . ($cellNumber % 7 == 1 ? ' start ' : ($cellNumber % 7 == 0 ? ' end ' : ' ')) .
                    ($cellContent == null ? 'mask' : '') . '" data-year="' . $dataYear . '" data-month="' . $dataMonth . '">' . $cellContent . '</li>';
            }
             
            
            // create navigation
            
            private function _createNavi(){
                 
                $nextMonth = $this->currentMonth==12?1:intval($this->currentMonth)+1;
                 
                $nextYear = $this->currentMonth==12?intval($this->currentYear)+1:$this->currentYear;
                 
                $preMonth = $this->currentMonth==1?12:intval($this->currentMonth)-1;
                 
                $preYear = $this->currentMonth==1?intval($this->currentYear)-1:$this->currentYear;
                 
                return
                    '<div class="header">'.
                        '<a class="prev" href="'.$this->naviHref.'?month='.sprintf('%02d',$preMonth).'&year='.$preYear.'">Prev</a>'.
                            '<span class="title">'.date('Y M',strtotime($this->currentYear.'-'.$this->currentMonth.'-1')).'</span>'.
                        '<a class="next" href="'.$this->naviHref.'?month='.sprintf("%02d", $nextMonth).'&year='.$nextYear.'">Next</a>'.
                    '</div>';
            }
                 
            
            //create calendar week labels
            
            private function _createLabels(){  
                         
                $content='';
                 
                foreach($this->dayLabels as $index=>$label){
                     
                    $content.='<li class="'.($label==6?'end title':'start title').' title">'.$label.'</li>';
         
                }
                 
                return $content;
            }
             
             
             
            
            //calculate number of weeks in a particular month
            
            private function _weeksInMonth($month=null,$year=null){
                 
                if( null==($year) ) {
                    $year =  date("Y",time()); 
                }
                 
                if(null==($month)) {
                    $month = date("m",time());
                }
                 
                // find number of days in this month
                $daysInMonths = $this->_daysInMonth($month,$year);
                 
                $numOfweeks = ($daysInMonths%7==0?0:1) + intval($daysInMonths/7);
                 
                $monthEndingDay= date('N',strtotime($year.'-'.$month.'-'.$daysInMonths));
                 
                $monthStartDay = date('N',strtotime($year.'-'.$month.'-01'));
                 
                if($monthEndingDay<$monthStartDay){
                     
                    $numOfweeks++;
                 
                }
                 
                return $numOfweeks;
            }
         
            //calculate number of days in a particular month
            
            private function _daysInMonth($month=null,$year=null){
                 
                if(null==($year))
                    $year =  date("Y",time()); 
         
                if(null==($month))
                    $month = date("m",time());
                     
                return date('t',strtotime($year.'-'.$month.'-01'));
            }
             
        

        // Add a method to generate the calendar
        public function generateCalendar() {
            $year = $this->currentYear;
            $month = $this->currentMonth;
            
            $calendarHTML = $this->show(); // Generate the calendar HTML
            
            echo $calendarHTML;
        }
    }

    // Create an instance of the Calendar class
    $calendar = new Calendar();
    ?>


    <div id="calendar-container">
        <?php
        // Generate and display the calendar
        $calendar->generateCalendar();
        ?>
    </div>
    <br>
    <?php
    $sql1 = "SELECT * FROM statusmedicalshsmonday";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1)) {
        $row1 = $result1->fetch_assoc();

        $statusmed8_am = $row1['statusmed8_am'];
        $statusmed9_am = $row1['statusmed9_am'];
        $statusmed10_am = $row1['statusmed10_am'];
        $statusmed11_am = $row1['statusmed11_am'];
        $statusmed1_pm = $row1['statusmed1_pm'];
        $statusmed2_pm = $row1['statusmed2_pm'];
        $statusmed3_pm = $row1['statusmed3_pm'];
        $statusmed4_pm = $row1['statusmed4_pm'];
    }
    ?>

<table class="schedule-table" id="monday-table">
<th colspan="4" id="selected-day-header"><span id="selected-date-display"></span></th>

  <tr>
 
  <td class="<?php echo ($statusmed8_am == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed8_am; ?>')"><?php echo $statusmed8_am; ?></td>
  <td class="<?php echo ($statusmed9_am == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed9_am; ?>')"><?php echo $statusmed9_am; ?> <span id="selected-date-display"></span></td>
    <td class="<?php echo ($statusmed10_am == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed10_am; ?>')"><?php echo $statusmed10_am; ?> <span id="selected-date-display"></span></td>
<td class="<?php echo ($statusmed11_am == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed11_am; ?>')"><?php echo $statusmed11_am; ?> <span id="selected-date-display"></span></td>
  </tr>
  <tr>
    <td class="<?php echo ($statusmed1_pm == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed1_pm; ?>')"><?php echo $statusmed1_pm; ?></td>
    <td class="<?php echo ($statusmed2_pm == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed2_pm; ?>')"><?php echo $statusmed2_pm; ?></td>
    <td class="<?php echo ($statusmed3_pm == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed3_pm; ?>')"><?php echo $statusmed3_pm; ?></td>
    <td class="<?php echo ($statusmed4_pm == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed4_pm; ?>')"><?php echo $statusmed4_pm; ?></td>
  </tr>
</table>

<?php
    $sql1 = "SELECT * FROM statusmedicalshstuesday";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1)) {
        $row1 = $result1->fetch_assoc();

        $statusmed8_am = $row1['statusmed8_am'];
        $statusmed9_am = $row1['statusmed9_am'];
        $statusmed10_am = $row1['statusmed10_am'];
        $statusmed11_am = $row1['statusmed11_am'];
        $statusmed1_pm = $row1['statusmed1_pm'];
        $statusmed2_pm = $row1['statusmed2_pm'];
        $statusmed3_pm = $row1['statusmed3_pm'];
        $statusmed4_pm = $row1['statusmed4_pm'];
    }
    ?>
<table class="schedule-table" id="tuesday-table">
<th colspan ="4"><span id="tuesday-date-display"></span></th>
  <tr>
 
    <td class="<?php echo ($statusmed8_am == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed8_am; ?>')"><?php echo $statusmed8_am; ?></td>
    <td class="<?php echo ($statusmed9_am == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed9_am; ?>')"><?php echo $statusmed9_am; ?></td>
    <td class="<?php echo ($statusmed10_am == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed10_am; ?>')"><?php echo $statusmed10_am; ?></td>
    <td class="<?php echo ($statusmed11_am == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed11_am; ?>')"><?php echo $statusmed11_am; ?></td>
  </tr>
  <tr>
    <td class="<?php echo ($statusmed1_pm == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed1_pm; ?>')"><?php echo $statusmed1_pm; ?></td>
    <td class="<?php echo ($statusmed2_pm == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed2_pm; ?>')"><?php echo $statusmed2_pm; ?></td>
    <td class="<?php echo ($statusmed3_pm == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed3_pm; ?>')"><?php echo $statusmed3_pm; ?></td>
    <td class="<?php echo ($statusmed4_pm == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed4_pm; ?>')"><?php echo $statusmed4_pm; ?></td>
  </tr>
</table>

<?php
    $sql1 = "SELECT * FROM statusmedicalshswednesday";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1)) {
        $row1 = $result1->fetch_assoc();

        $statusmed8_am = $row1['statusmed8_am'];
        $statusmed9_am = $row1['statusmed9_am'];
        $statusmed10_am = $row1['statusmed10_am'];
        $statusmed11_am = $row1['statusmed11_am'];
        $statusmed1_pm = $row1['statusmed1_pm'];
        $statusmed2_pm = $row1['statusmed2_pm'];
        $statusmed3_pm = $row1['statusmed3_pm'];
        $statusmed4_pm = $row1['statusmed4_pm'];
    }
    ?>
<table class="schedule-table" id="wednesday-table">
<th colspan ="4"><span id="wednesday-date-display"></span></th>
  <tr>
 
    <td class="<?php echo ($statusmed8_am == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed8_am; ?>')"><?php echo $statusmed8_am; ?></td>
    <td class="<?php echo ($statusmed9_am == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed9_am; ?>')"><?php echo $statusmed9_am; ?></td>
    <td class="<?php echo ($statusmed10_am == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed10_am; ?>')"><?php echo $statusmed10_am; ?></td>
    <td class="<?php echo ($statusmed11_am == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed11_am; ?>')"><?php echo $statusmed11_am; ?></td>
  </tr>
  <tr>
    <td class="<?php echo ($statusmed1_pm == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed1_pm; ?>')"><?php echo $statusmed1_pm; ?></td>
    <td class="<?php echo ($statusmed2_pm == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed2_pm; ?>')"><?php echo $statusmed2_pm; ?></td>
    <td class="<?php echo ($statusmed3_pm == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed3_pm; ?>')"><?php echo $statusmed3_pm; ?></td>
    <td class="<?php echo ($statusmed4_pm == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed4_pm; ?>')"><?php echo $statusmed4_pm; ?></td>
  </tr>
</table>

<?php
    $sql1 = "SELECT * FROM statusmedicalshsthursday";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1)) {
        $row1 = $result1->fetch_assoc();

        $statusmed8_am = $row1['statusmed8_am'];
        $statusmed9_am = $row1['statusmed9_am'];
        $statusmed10_am = $row1['statusmed10_am'];
        $statusmed11_am = $row1['statusmed11_am'];
        $statusmed1_pm = $row1['statusmed1_pm'];
        $statusmed2_pm = $row1['statusmed2_pm'];
        $statusmed3_pm = $row1['statusmed3_pm'];
        $statusmed4_pm = $row1['statusmed4_pm'];
    }
    ?>
<table class="schedule-table" id="thursday-table">
<th colspan ="4"><span id="thursday-date-display"></span></th>
  <tr>
 
    <td class="<?php echo ($statusmed8_am == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed8_am; ?>')"><?php echo $statusmed8_am; ?></td>
    <td class="<?php echo ($statusmed9_am == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed9_am; ?>')"><?php echo $statusmed9_am; ?></td>
    <td class="<?php echo ($statusmed10_am == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed10_am; ?>')"><?php echo $statusmed10_am; ?></td>
    <td class="<?php echo ($statusmed11_am == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed11_am; ?>')"><?php echo $statusmed11_am; ?></td>
  </tr>
  <tr>
    <td class="<?php echo ($statusmed1_pm == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed1_pm; ?>')"><?php echo $statusmed1_pm; ?></td>
    <td class="<?php echo ($statusmed2_pm == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed2_pm; ?>')"><?php echo $statusmed2_pm; ?></td>
    <td class="<?php echo ($statusmed3_pm == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed3_pm; ?>')"><?php echo $statusmed3_pm; ?></td>
    <td class="<?php echo ($statusmed4_pm == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed4_pm; ?>')"><?php echo $statusmed4_pm; ?></td>
  </tr>
</table>

<?php
    $sql1 = "SELECT * FROM statusmedicalshsfriday";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1)) {
        $row1 = $result1->fetch_assoc();

        $statusmed8_am = $row1['statusmed8_am'];
        $statusmed9_am = $row1['statusmed9_am'];
        $statusmed10_am = $row1['statusmed10_am'];
        $statusmed11_am = $row1['statusmed11_am'];
        $statusmed1_pm = $row1['statusmed1_pm'];
        $statusmed2_pm = $row1['statusmed2_pm'];
        $statusmed3_pm = $row1['statusmed3_pm'];
        $statusmed4_pm = $row1['statusmed4_pm'];
    }
    ?>
<table class="schedule-table" id="friday-table">
<th colspan ="4"><span id="friday-date-display"></span></th>
  <tr>
 
    <td class="<?php echo ($statusmed8_am == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed8_am; ?>')"><?php echo $statusmed8_am; ?></td>
    <td class="<?php echo ($statusmed9_am == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed9_am; ?>')"><?php echo $statusmed9_am; ?></td>
    <td class="<?php echo ($statusmed10_am == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed10_am; ?>')"><?php echo $statusmed10_am; ?></td>
    <td class="<?php echo ($statusmed11_am == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed11_am; ?>')"><?php echo $statusmed11_am; ?></td>
  </tr>
  <tr>
    <td class="<?php echo ($statusmed1_pm == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed1_pm; ?>')"><?php echo $statusmed1_pm; ?></td>
    <td class="<?php echo ($statusmed2_pm == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed2_pm; ?>')"><?php echo $statusmed2_pm; ?></td>
    <td class="<?php echo ($statusmed3_pm == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed3_pm; ?>')"><?php echo $statusmed3_pm; ?></td>
    <td class="<?php echo ($statusmed4_pm == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusmed4_pm; ?>')"><?php echo $statusmed4_pm; ?></td>
  </tr>
</table>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <br>
        <input type="text" name="user_id" style="display: none;" value="<?= $_SESSION['user_id'];?>">
        <button name="submit_medical" class="btn btn-success">Send Medical Appointment</button>
    </div>
</div>
</form>

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
  <!-- jQuery library (make sure to include it) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
$(document).ready(function() {
    // Hide all time tables initially
    $('.schedule-table').hide();

    $('.dates li').click(function() {
    // Remove the "selected" class from all date cells
    $('.dates li').removeClass('selected');

    // Add the "selected" class to the clicked date cell
    $(this).addClass('selected');

    // Get the text content of the clicked date cell
    var selectedDay = $(this).text();

    // Get the year and month from the data attributes
    var selectedYear = $(this).data('year');
    var selectedMonth = $(this).data('month');

    // Create a JavaScript Date object with the selected year, month, and day
    var selectedDate = new Date(selectedYear, selectedMonth - 1, selectedDay);

    // Adjust for the time zone offset
    var timezoneOffsetMinutes = selectedDate.getTimezoneOffset();
    selectedDate.setMinutes(selectedDate.getMinutes() - timezoneOffsetMinutes);

    // Format the date as "Monday September 4, 2023"
    var formattedDate = selectedDate.toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });

    // Display the selected date in the Monday table header
    $('#selected-day-header').text(formattedDate);

    // Set the value of the input field with the selected date
    $('#selected-date').val(formattedDate);

    // Determine the day of the week for the selected date
    var selectedDayOfWeek = selectedDate.toLocaleDateString('en-US', { weekday: 'long' });

    // Update the displayed table based on the selected day of the week
    updateDisplayedTable(selectedDayOfWeek);
    // Update the respective day headers for Tuesday, Wednesday, Thursday, and Friday
    if (selectedDayOfWeek === 'Tuesday') {
        $('#tuesday-date-display').text(formattedDate);
    } else if (selectedDayOfWeek === 'Wednesday') {
        $('#wednesday-date-display').text(formattedDate);
    } else if (selectedDayOfWeek === 'Thursday') {
        $('#thursday-date-display').text(formattedDate);
    } else if (selectedDayOfWeek === 'Friday') {
        $('#friday-date-display').text(formattedDate);
    }
});

    // Function to update the displayed table based on the selected date
    function updateDisplayedTable(selectedDayOfWeek) {
        // Hide all time tables
        $('.schedule-table').hide();

        // Determine which table to display based on the selected day of the week
        if (selectedDayOfWeek === 'Monday') {
            $('#monday-table').show(); // Show the Monday table
        } else if (selectedDayOfWeek === 'Tuesday') {
            $('#tuesday-table').show(); // Show the Tuesday table
        } else if (selectedDayOfWeek === 'Wednesday') {
            $('#wednesday-table').show(); // Show the Wednesday table
        }else if (selectedDayOfWeek === 'Thursday') {
            $('#thursday-table').show(); // Show the Thursday table
    }else if (selectedDayOfWeek === 'Friday') {
            $('#friday-table').show(); // Show the Friday table
  }
}
});


// Function to handle clicking an available time
function handleLabelClick(time) {
    document.getElementById('sched_time').value = time;
}

    </script>




</body>
</html> 

