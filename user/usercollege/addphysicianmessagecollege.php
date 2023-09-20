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
        if($_SESSION['leveleduc'] == 3){
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
    <title>Request Physician Consultation Schedule</title>
    
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
        .form-group {
            margin-bottom: 20px;
        }

        label {
            color: #000 !important;
        }

        input.form-control {
            border: 3px solid #4e5864;
            background-color: #fff !important;
            padding: 10px;
            border-radius: 10px;
            transition: border-color 0.3s ease;
        }

        input.form-control:hover {
            background-color: #e0e0e0 !important;
            border-color: #4e5864 !important;
        }
        input.form-control:focus{
            background-color: #e0e0e0 !important;
        }
        .sched{
            color: #800000;
            font-size: 17px !important;
        }
        select{
            border: 3px solid #4e5864 !important;
        }
        select:hover{
            border: 1px solid #4e5864 !important;
            background-color: #e0e0e0 !important;
        }
        select:focus{
            background-color: #e0e0e0 !important;
        }
        
    </style>
   
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
                            <?php
								if(isset($_SESSION['success'])){
									echo $_SESSION['success'];
									unset($_SESSION['success']);
								}
							?>
				        </div><!--//row-->
				    </div><!--//app-card-header-->
				    <div class="app-card-body p-4">

<div class="container">
    <div class="form-container" style="margin-left: 10px;">
        <div class="form-title">
            Request Physician Schedule
        </div>

            <b><p>Please wait for a message for approval of your physician consultation request appointment.</b></p>

<form class="form-horizontal mt-4" method="post" action="function/functions.php" onsubmit="return validateForm()">

<div class="row" style="margin-left:auto">

        <div class="col-sm-3">
            <div class="form-group">
            <label for="idnumber" class="control-label">Enter your ID Number</label>
                <input type="text" class="form-control" id="idnumber" name="idnumber" placeholder="Enter ID number" required>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                <label for="patient_name" class="control-label">Enter your Fullname</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Fullname" required>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                <label for="gradesection" class="control-label">Grade & Section</label>
                <input type="text" class="form-control" id="gradesection" name="gradesection" placeholder="Enter your Grade & Section" required>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                <label for="phoneno" class="control-label">Phone Number</label>
                <input id="personalContactInput" name="phoneno" type="text" placeholder="+63" class="form-control contactInput">
                <p id="personalContactError" class="errorMessage" style="color: red; display: none;">Invalid Phone Number</p>
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

 <div class="row" style="margin-left:auto">

    <div class="col-sm-4">
        <div class="form-group">
            <label for="datetime" class="control-label">Schedule</label>
                <input type="text" class="form-control no-color-change" id="selected-date" name="date_time" placeholder="Choose Date in the Calendar" readonly>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group">
            <label for="newInput" class="control-label">Time</label>
                <input type="text" class="form-control no-color-change" id="sched_time" name="sched_time" placeholder="Select Time" readonly>
        </div>
    </div>


    <div class="col-sm-4">
        <div class="form-group">
            <label for="role" class="control-label">Role</label>
                <select id="role" name="role" class="form-control">
                <option value="">Select Role</option>
                <option value="Student in GS/JHS">Student</option>
                <option value="Employee in GS/JHS">Employee</option>
                </select>
        </div>
    </div>

</div>

    <style>
        


    /* Calendar container */
#calendar {
  font-family: Arial, sans-serif;
  width: 300px;
  margin: 0 auto;
}

/* Calendar header */
#calendar .header {
  background-color: #333;
  color: #fff;
  text-align: center;
  padding: 10px 0;
}

/* Previous and Next month links */
#calendar .prev,
#calendar .next {
  color: #fff;
  text-decoration: none;
  margin: 0 10px;
  font-size: 18px;
}

/* Calendar title */
#calendar .title {
  font-size: 20px;
}

/* Calendar labels (Mon, Tue, etc.) */
#calendar .label {
  list-style: none;
  padding: 0;
  margin: 0;
  background-color: #eee;
  text-align: center;
}

#calendar .label li {
  display: inline-block;
  width: 14.285%;
  padding: 10px 0;
  border-right: 1px solid #ccc;
  border-bottom: 1px solid #ccc;
  box-sizing: border-box;
}

/* Calendar dates */
#calendar .dates {
  list-style: none;
  padding: 0;
  margin: 0;
}

#calendar .dates li {
  display: inline-block;
  width: 14.285%;
  padding: 10px 0;
  text-align: center;
  box-sizing: border-box;
  border-right: 1px solid #ccc;
  border-bottom: 1px solid #ccc;
}

/* Highlighted start and end days */
#calendar .start {
  background-color: #337ab7;
  color: #fff;
}

#calendar .end {
  background-color: #337ab7;
  color: #fff;
}

/* Today's date */
#calendar .today {
  background-color: #5bc0de;
  color: #fff;
}

/* Disabled days */
#calendar .mask {
  color: #ccc;
}

</style>
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

<?php
    $week = [
        "monday" => [],
        "tuesday"=> [],
        "wednesday"=> [],
        "thursday"=> [],
        "friday"=> [],
    ];

    // NOTE: this method is for availability checking for each day of the week
        // do sql queries here and pass it to the array in foreach

    // foreach([$statusmed8_am,$statusmed9_am, $statusmed10_am, $statusmed11_am,
    // $statusmed1_pm, $statusmed2_pm, $statusmed3_pm,$statusmed4_pm] as $time){
    //     if($time != "Unavailable"){
    //         array_push($week["monday"], str_replace('.', '', str_replace(' ', '', $time)));
    //     }
    // }
?>

<?php 
        include $_SERVER['DOCUMENT_ROOT'] . "/DivineClinic/components/calendar.php";
?>



<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <br>
        <input type="text" name="user_id" style="display: none;" value="<?= $_SESSION['user_id'];?>">
        <button name="submit_physician" class="btn btn-success">Send Physician Appointment</button>
    </div>
</div>
</form>

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

<script>
    // Timer to remove success message after 5 seconds (5000 milliseconds)
    setTimeout(function(){
        var successMessage = document.getElementById('success-message');
        if(successMessage){
            successMessage.remove();
        }
    }, 5000);
</script>


</body>
</html> 

