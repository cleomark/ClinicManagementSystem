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
    <title>Request Dental Schedule</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="assets/images/dwcl.png"> 
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- Google Font Link for Icons (CALENDAR)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">

    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">
	  <link rel="stylesheet" href="assets/style.css">

    <link type="text/css" href="css/bootstrap.min.css" />
        <link type="text/css" href="css/bootstrap-timepicker.min.css" />
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-timepicker.min.js"></script>
    <!-- Include Bootstrap CDN -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- Include Moment.js CDN -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

    <!-- Include Bootstrap DateTimePicker CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <script src ="calendar.js"></script>

    



   
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
						        <h4 class="notification-title mb-1">Request Dental Schedule</h4>
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
                    <b><p>Please wait for a message for approval of your dental request appointment.</b></p>

                    <form class="form-horizontal mt-4" method="post" action="function/functions.php" onsubmit="return validateForm()">
                    <div class="row">
    <div class="col-sm-3">
        <div class="form-group">
            <label for="idnumber" class="col-sm-12 control-label" style="font-size: 16px">Enter your ID Number</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="idnumber" name="idnumber" placeholder="ID number" required>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label for="patient_name" class="col-sm-12 control-label" style="font-size: 16px">Enter your Fullname</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="name" name="fullname" placeholder="Enter your Fullname" required>
            </div>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            <label for="dental_service" class="col-sm-12 control-label" style="font-size: 16px">Dental Services</label>
            <div class="col-sm-12">
                <select id="dental_service" name="service" class="form-control" required>
                    <option value="">Select Service</option>
                    <option value="Cleaning">Cleaning</option>
                    <option value="Tooth Extraction">Tooth Extraction</option>
                </select>
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
            <label for="gradecourseyear" class="control-label" style="font-size: 16px">Grade & Section</label>
            <input type="text" class="form-control" id="igradecourseyear" name="gradecourseyear" placeholder="Enter Grade & Section">
        </div>
    </div>
    
    <div class="col-sm-3">
        <div class="form-group">
            <label for="fullname" style="font-size: 16px">Role</label>
            <select id="role" name="role" class="form-control">
                <option value="">--Select--</option>
                <option value="Student in GS/JHS">Student</option>
                <option value="Employee in GS/JHS">Employee</option>
            </select>
        </div>
    </div>
</div>

<br><br>
<style>
    /* Calendar container
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
  background-color: #5579c6 !important;
  color:white!important;
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
 */



/* CALENDAR-NEW */
/* Import Google font - Poppins */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  display: flex;
  align-items: center;
  padding: 0 10px;
  justify-content: center;
  min-height: 100vh;
  background: #ddd;
}
.wrapper{
  width: 550px;
  height:490px;
  background: #fff;`
  border-radius: 10px;
  box-shadow: 0 15px 40px rgba(0,0,0,0.12);
  margin:0% 25%;
}
.wrapper header{
  display: flex;
  align-items: center;
  padding: 25px 30px 10px;
  justify-content: space-between;
}
header .icons{
  display: flex;
}
header .icons span{
  height: 38px;
  width: 38px;
  margin: 0 1px;
  cursor: pointer;
  color: #878787;
  text-align: center;
  line-height: 38px;
  font-size: 1.9rem;
  user-select: none;
  border-radius: 50%;
}
.icons span:last-child{
  margin-right: -10px;
}
header .icons span:hover{
  background: #f2f2f2;
}
header .current-date{
  font-size: 1.45rem;
  font-weight: 500;
  padding-left:35px;
}
.calendar{
  padding: 20px;
  height:350px;
}
.calendar ul{
  display: flex;
  flex-wrap: wrap;
  list-style: none;
  text-align: center;
}
.calendar .days{
  margin-bottom: 20px;
}
.calendar li{
  color: #333;
  width: calc(100% / 7);
  font-size: 1.07rem;
}
.calendar .weeks li{
  font-weight: 500;
  cursor: default;
}
.calendar .days li{
  z-index: 1;
  cursor: pointer;
  position: relative;
  margin-top: 30px;
}
.days li.inactive{
  color: #aaa;
}
.days li.inactive:hover{
  color: #281818;
  
}
.days li.active{
  color: #fff;
}
.days li::before{
  position: absolute;
  content: "";
  left: 50%;
  top: 50%;
  height: 40px;
  width: 40px;
  z-index: -1;
  border-radius: 50%;
  transform: translate(-50%, -50%);
}
.days li.active::before{
  background: #f78536;
}
.days li:not(.active):hover::before{
  background: #e7a4a4;
}


/* Modal Content */
.modal{
   
    top:30%;
    left:6%;
}
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  right:2%;
  width: 400px;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

/* TIme  */
/* (A) WRAPPER */
#tp-wrap * {
	font-family: arial, sans-serif;
	box-sizing: border-box;
  }
  #tp-wrap *::selection {
	background: transparent;
  }
  #tp-wrap {
	width: 100vw; height: 100vh;
	position: fixed; top: 0; left: 0; z-index: 999;
	background: rgba(0, 0, 0, 0.7);
	opacity: 0; visibility: hidden;
	transition: opacity 0.3s;
  }
  #tp-wrap.show {
	opacity: 1; visibility: visible;
  }
  
  /* (B) BOX */
  #tp-box {
	position: absolute;
	top: 55%; left: 54%;
	transform: translate(-50%, -50%);
	width: 320px;
	display: flex; flex-wrap: wrap;
	border: 1px solid #000;
	background: #fff;
  }
  
  /* (C) HR/MIN/AM/PM */
  .tp-cell {
	width: 33.3%; padding: 0 15px;
	text-align: center;
  }
  .tp-up, .tp-down {
	padding: 10px 0;
	color: #e01717;
	font-size: 32px; font-weight: 1000;
	cursor: pointer;
  }
  .tp-val {
	width: 100%; padding: 10px 0;
	text-align: center; font-size: 22px;
	background: #fff;
  }
  
  /* (D) CLOSE & SET BUTTON */
  #tp-close, #tp-set {
	width: 50%; padding: 15px 0; border: 0;
	font-size: 18px; font-weight: 700;
	color: #fff; cursor: pointer;
  }
  #tp-close { background: #951a1a; }
  #tp-set { background: #1339a7; }
  
  /* (E) 24-HOUR MODIFY */
  #tp-wrap.tp-24 #tp-ap { display: none; }
  #tp-wrap.tp-24 #tp-hr, #tp-wrap.tp-24 #tp-min { width: 50%; }
  
  /* (X) CSS DOES NOT MATTER - FOR COSMETICS */

  /* WIDGET */
  .widget-wrap {
	width: 500px;
	border-radius: 20px;
  }
  .widget-wrap label, .widget-wrap input {
	display: block;
	padding: 10px;
	width: 100%;
  }
  #demoA{
    background:blue;
    border-color:blue;
    padding: 5px;
    border-radius:10px;
    width:150px;
    justify:space-evenly;
    margin-left:40%;
    cursor:pointer;
    text-align: center;
    color:white;
  }
  #demoA:hover{
    border-color:#00b2ca;
    background:#00b2ca;
    padding: 5px;
    border-radius:10px;
    width:150px;
    justify:space-evenly;
    margin-left:40%;
    cursor:pointer;
    text-align: center;
    color:black;
  }

  input::placeholder{
  color: #fff;
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






 <!-- --------------------------------------------------CALENDAR-NEW--------------------------------------------------------------------- -->

    <!-- This hold the entire calendar -->
    <div class="wrapper"> 
      <header>
        <p class="current-date"></p>
        <!-- This act as next and previous button -->
        <div class="icons">
          <span id="prev" class="material-symbols-rounded">chevron_left</span>
          <span id="next" class="material-symbols-rounded">chevron_right</span>
        </div>
      </header>
      <!--  -->
      <div class="calendar">
        <ul class="weeks">
          <li>Sun</li>
          <li>Mon</li>
          <li>Tue</li>
          <li>Wed</li>
          <li>Thu</li>
          <li>Fri</li>
          <li>Sat</li>
        </ul>
        <ul class="days" id="myBtn"></ul>
    </div>


    <div class="widget-wrap">
            <div id="hash"></div>
            <input type="text" id="demoA" placeholder="SELECT TIME"/>  
        </div>
      </div>
        
      <!-- The Modal -->
      <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
          <span class="close">&times; </span>
          
        </div>
      </div>
    

<!-- ------------------------------------------------------------------------------------------------------------------------ -->

<script>

const daysTag = document.querySelector(".days"),
currentDate = document.querySelector(".current-date"),
prevNextIcon = document.querySelectorAll(".icons span");

// getting new date, current year and month
let date = new Date(),
currYear = date.getFullYear(),
currMonth = date.getMonth();

// storing full name of all months in array
const months = ["January", "February", "March", "April", "May", "June", "July",
              "August", "September", "October", "November", "December"];

const renderCalendar = () => {
    let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(), // getting first day of month
    lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(), // getting last date of month
    lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(), // getting last day of month
    lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate(); // getting last date of previous month
    let liTag = "";

    for (let i = firstDayofMonth; i > 0; i--) { // creating li of previous month last days
        liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
    }

    for (let i = 1; i <= lastDateofMonth; i++) { // creating li of all days of current month
        // adding active class to li if the current day, month, and year matched
        let isToday = i === date.getDate() && currMonth === new Date().getMonth() 
                     && currYear === new Date().getFullYear() ? "active" : "";
        liTag += `<li class="${isToday}">${i}</li>`;
    }

    for (let i = lastDayofMonth; i < 6; i++) { // creating li of next month first days
        liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`
    }
    currentDate.innerText = `${months[currMonth]} ${currYear}`; // passing current mon and yr as currentDate text
    daysTag.innerHTML = liTag;
}
renderCalendar();

prevNextIcon.forEach(icon => { // getting prev and next icons
    icon.addEventListener("click", () => { // adding click event on both icons
        // if clicked icon is previous icon then decrement current month by 1 else increment it by 1
        currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;

        if(currMonth < 0 || currMonth > 11) { // if current month is less than 0 or greater than 11
            // creating a new date of current year & month and pass it as date value
            date = new Date(currYear, currMonth, new Date().getDate());
            currYear = date.getFullYear(); // updating current year with new date year
            currMonth = date.getMonth(); // updating current month with new date month
        } else {
            date = new Date(); // pass the current date as date value
        }
        renderCalendar(); // calling renderCalendar function
    });
});


// // Get the modal
// var modal = document.getElementById("myModal");

// // Get the button that opens the modal
// var btn = document.getElementById("myBtn");

// // Get the <span> element that closes the modal
// var span = document.getElementsByClassName("close")[0];

// // When the user clicks the button, open the modal 
// btn.onclick = function() {
//   modal.style.display = "block";
// }

// // When the user clicks on <span> (x), close the modal
// span.onclick = function() {
//   modal.style.display = "none";
// }

// // When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//   if (event.target == modal) {
//     modal.style.display = "none";
//   }
// }

//time

var tp = {
  // (A) INIT - GENERATE TIME PICKER HTML
  hwrap : null, // entire html time picker
  hhr : null,   // html hour value
  hmin : null,  // html min value
  hap : null,   // html am/pm value
  init : () => {
    // (A1) ADD TIME PICKER TO BODY
    tp.hwrap = document.createElement("div");
    tp.hwrap.id = "tp-wrap";
    document.body.appendChild(tp.hwrap);

    // (A2) TIME PICKER INNER HTML
    tp.hwrap.innerHTML =
    `<div id="tp-box">
      <div class="tp-cell" id="tp-hr">
        <div class="tp-up">&#65087;</div> <div class="tp-val">0</div> <div class="tp-down">&#65088;</div>
      </div>
      <div class="tp-cell" id="tp-min">
        <div class="tp-up">&#65087;</div> <div class="tp-val">0</div> <div class="tp-down">&#65088;</div>
      </div>
      <div class="tp-cell" id="tp-ap">
        <div class="tp-up">&#65087;</div> <div class="tp-val">AM</div> <div class="tp-down">&#65088;</div>
      </div>
      <button id="tp-close" onclick="tp.hwrap.classList.remove('show')">Close</button>
      <button id="tp-set" onclick="tp.set()">Set</button>
    </div>`;

    // (A3) GET VALUE ELEMENTS + SET CLICK ACTIONS
    for (let segment of ["hr", "min", "ap"]) {
      let up = tp.hwrap.querySelector(`#tp-${segment} .tp-up`),
          down = tp.hwrap.querySelector(`#tp-${segment} .tp-down`);
      tp["h"+segment] = tp.hwrap.querySelector(`#tp-${segment} .tp-val`);

      if (segment=="ap") {
        up.onclick = () => tp.spin(true, segment);
        down.onclick = () => tp.spin(true, segment);
      } else {
        up.onmousedown = () => tp.spin(true, segment);
        down.onmousedown = () => tp.spin(false, segment);
        up.onmouseup = () => tp.spin(null);
        down.onmouseup = () => tp.spin(null);
        up.onmouseleave = () => tp.spin(null);
        down.onmouseleave = () => tp.spin(null);
      }
    }
  },

  // (B) SPIN HOUR/MIN/AM/PM
  //  direction : true (up), false (down), null (stop)
  //  segment : "hr", "min", "ap" (am/pm)
  timer : null, // for "continous" time spin
  minhr : 1,    // min spin limit for hour
  maxhr : 12,   // max spin limit for hour
  minmin : 0,   // min spin limit for minute
  maxmin : 0,  // max spin limit for minute
  spin : (direction, segment) => {
    // (B1) CLEAR TIMER
    if (direction==null) { if (tp.timer!=null) {
      clearTimeout(tp.timer);
      tp.timer = null;
    }}

    // (B2) SPIN FOR AM/PM
    else if (segment=="ap") { tp.hap.innerHTML = tp.hap.innerHTML=="AM" ? "PM" : "AM"; }

    // (B3) SPIN FOR HR/MIN
    else {
      // (B3-1) INCREMENT/DECREMENT
      let next = +tp["h"+segment].innerHTML;
      next = direction ? next+1 : next-1;

      // (B3-2) MIN/MAX
      if (segment=="hr") {
        if (next > tp.maxhr) { next = tp.maxhr; }
        if (next < tp.minhr) { next = tp.minhr; }
      } else {
        if (next > tp.maxmin) { next = tp.maxmin; }
        if (next < tp.minmin) { next = tp.minmin; }
      }

      // (B3-3) SET VALUE
      if (next<10) { next = "0"+next; }
      tp["h"+segment].innerHTML = next;

      // (B3-4) KEEP ROLLING - LOWER TIMEOUT WILL SPIN FASTER
      tp.timer = setTimeout(() => tp.spin(direction, segment), 100);
    }
  },

  // (C) ATTACH TIME PICKER TO HTML FIELD
  //  target : html field to attach to
  //  24 : 24 hours time? default false.
  //  after : optional, function to run after selecting time
  attach : instance => {
    // (C1) READONLY FIELD + NO AUTOCOMPLETE
    // IMPORTANT, PREVENTS ON-SCREEN KEYBOARD
    instance.target.readOnly = true;
    instance.target.setAttribute("autocomplete", "off");

    // (C2) DEFAULT 12 HOURS MODE
    if (instance["24"]==undefined) { instance["24"] = false; }

    // (C3) CLICK TO OPEN TIME PICKER
    instance.target.addEventListener("click", () => tp.show(instance));
  },

  // (D) SHOW TIME PICKER
  setfield : null, // set selected time to this html field
  set24 : false,   // 24 hours mode? default false.
  setafter : null, // run this after selecting time
  show : instance => {
    // (D1) INIT FIELDS TO SET + OPTIONS
    tp.setfield = instance.target;
    tp.setafter = instance.after;
    tp.set24 = instance["12"];
    tp.minhr = tp.set24 ? 1 : 8 ;
    tp.maxhr = tp.set24 ? 3 : 11 ;

    // (D2) READ CURRENT VALUE
    let val = tp.setfield.value;
    if (val=="") {
      tp.hhr.innerHTML = "0"+tp.minhr;
      tp.hmin.innerHTML = "0"+tp.minmin;
      tp.hap.innerHTML = "AM";
    } else {
      tp.hhr.innerHTML = val.substring(0, 2);
      if (tp.set24) {
        tp.hmin.innerHTML = val.substring(2, 4);
      } else {
        tp.hmin.innerHTML = val.substring(3, 5);
        tp.hap.innerHTML = val.substring(6, 8);
      }
    }

    // (D3) SHOW TIME PICKER
    if (tp.set24) { tp.hwrap.classList.add("tp-24"); }
    else { tp.hwrap.classList.remove("tp-24"); }
    tp.hwrap.classList.add("show");
  },

  // (E) SET TIME
  set : () => {
    // (E1) TIME TO FIELD
    if (tp.set24) {
      tp.setfield.value = tp.hhr.innerHTML + tp.hmin.innerHTML;
    } else {
      tp.setfield.value = tp.hhr.innerHTML + ":" + tp.hmin.innerHTML + " " + tp.hap.innerHTML;
    }
    tp.hwrap.classList.remove("show");

    // (E2) RUN AFTER, IF SET
    if (tp.setafter) { tp.setafter(tp.setfield.value); }
  }
};
document.addEventListener("DOMContentLoaded", tp.init);

// (F) ATTACH ON PAGE LOAD
document.addEventListener("DOMContentLoaded", () => {
  tp.init();
  tp.attach({
    target: document.getElementById("demoA")
  });
  // tp.attach({
  //   target: document.getElementById("demoB"),
  //   "24" : true, // 24 hours time
  //   after : time => alert(time) // run function after select
  // });
});

</script>





<!-- ------------------------------------------------------------------------------------------------------------------------ -->

    <!-- ALION MO YADI BOSS WARA YADI SILBI MWAH -->
   <!-- <div id="calendar-container">
        <?php
        // Generate and display the calendar
        $calendar->generateCalendar();
        ?>
    </div>  -->


    <br>
<!-- --------------------------------------------------------UPPER MAINTENANCE---------------------------------------------- -->
    <?php
    $sql1 = "SELECT * FROM statusdentalgsjhsshsmonday";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1)) {
        $row1 = $result1->fetch_assoc();

        $statusden9_am = $row1['statusden9_am'];
        $statusden10_am = $row1['statusden10_am'];
        $statusden11_am = $row1['statusden11_am'];
    }
    ?>

 <table class="schedule-table" id="monday-table">
<th colspan="4" id="selected-day-header"><span id="selected-date-display"></span></th>
  <tr>
    <td class="<?php echo ($statusden9_am == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusden9_am; ?>')"><?php echo $statusden9_am; ?></td>
    <td class="<?php echo ($statusden10_am == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusden10_am; ?>')"><?php echo $statusden10_am; ?></td>
    <td class="<?php echo ($statusden11_am == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusden11_am; ?>')"><?php echo $statusden11_am; ?></td>
  </tr>
</table>

<?php
    $sql1 = "SELECT * FROM statusdentalgsjhsshstuesday";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1)) {
        $row1 = $result1->fetch_assoc();

        $statusden9_am = $row1['statusden9_am'];
        $statusden10_am = $row1['statusden10_am'];
        $statusden11_am = $row1['statusden11_am'];
    }
    ?>

<table class="schedule-table" id="tuesday-table">
<th colspan ="4"><span id="tuesday-date-display"></span></th>
  <tr>
    <td class="<?php echo ($statusden9_am == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusden9_am; ?>')"><?php echo $statusden9_am; ?></td>
    <td class="<?php echo ($statusden10_am == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusden10_am; ?>')"><?php echo $statusden10_am; ?></td>
    <td class="<?php echo ($statusden11_am == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusden11_am; ?>')"><?php echo $statusden11_am; ?></td>
  </tr>
</table>

<?php
    $sql1 = "SELECT * FROM statusdentalgsjhsshswednesday";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1)) {
        $row1 = $result1->fetch_assoc();

        $statusden9_am = $row1['statusden9_am'];
        $statusden10_am = $row1['statusden10_am'];
        $statusden11_am = $row1['statusden11_am'];
    }
    ?>
<table class="schedule-table" id="wednesday-table">
<th colspan ="4"><span id="wednesday-date-display"></span></th>
  <tr>
    <td class="<?php echo ($statusden9_am == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusden9_am; ?>')"><?php echo $statusden9_am; ?></td>
    <td class="<?php echo ($statusden10_am == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusden10_am; ?>')"><?php echo $statusden10_am; ?></td>
    <td class="<?php echo ($statusden11_am == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusden11_am; ?>')"><?php echo $statusden11_am; ?></td>
  </tr>
</table>

<?php
    $sql1 = "SELECT * FROM statusdentalgsjhsshsthursday";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1)) {
        $row1 = $result1->fetch_assoc();

        $statusden9_am = $row1['statusden9_am'];
        $statusden10_am = $row1['statusden10_am'];
        $statusden11_am = $row1['statusden11_am'];
    }
    ?>
<table class="schedule-table" id="thursday-table">
<th colspan ="4"><span id="thursday-date-display"></span></th>
  <tr>
    <td class="<?php echo ($statusden9_am == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusden9_am; ?>')"><?php echo $statusden9_am; ?></td>
    <td class="<?php echo ($statusden10_am == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusden10_am; ?>')"><?php echo $statusden10_am; ?></td>
    <td class="<?php echo ($statusden11_am == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusden11_am; ?>')"><?php echo $statusden11_am; ?></td>
  </tr>
</table>

<?php
    $sql1 = "SELECT * FROM statusdentalgsjhsshsfriday";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1)) {
        $row1 = $result1->fetch_assoc();
        $statusden9_am = $row1['statusden9_am'];
        $statusden10_am = $row1['statusden10_am'];
        $statusden11_am = $row1['statusden11_am'];
    }
    ?>
<table class="schedule-table" id="friday-table">
<th colspan ="4"><span id="friday-date-display"></span></th>
<tr>
  <td class="<?php echo ($statusden9_am == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusden9_am; ?>')"><?php echo $statusden9_am; ?></td>
    <td class="<?php echo ($statusden10_am == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusden10_am; ?>')"><?php echo $statusden10_am; ?></td>
    <td class="<?php echo ($statusden11_am == 'Unavailable') ? 'unavailable' : 'available'; ?>" onclick="handleLabelClick('<?php echo $statusden11_am; ?>')"><?php echo $statusden11_am; ?></td>
  </tr>
</table>




<!-- -------------------------------------------------UNDER MAINTENANCE-------------------------------------------------- -->





<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <br>
        <input type="text" name="user_id" style="display: none;" value="<?= $_SESSION['user_id'];?>">
        <button name="submit_dental" class="btn btn-success">Send Dental Appointment</button>
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

