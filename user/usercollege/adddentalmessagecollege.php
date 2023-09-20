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

    <!-- App CSS -->  S
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
            Request Dental Schedule
        </div>

        <b><p>Please wait for a message for approval of your dental request appointment.</b></p>

        <form class="form-horizontal mt-4" method="post" action="function/functions.php" onsubmit="return validateForm()">

        <div class="row" style="margin-left:auto">

            <div class="col-sm-3">
                <div class="form-group">
                    <label for="idnumber" class="control-label">Enter your ID Number</label>
                    <input type="text" class="form-control" id="idnumber" name="idnumber" placeholder="ID number" required>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="patient_name" class="control-label">Enter your Fullname</label>
                    <input type="text" class="form-control" id="name" name="fullname" placeholder="Enter your Fullname" required>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="dental_service" class="control-label">Dental Services</label>
                    <select id="dental_service" name="service" class="form-control" required>
                        <option value="">Select Service</option>
                        <option value="Cleaning">Cleaning</option>
                        <option value="Tooth Extraction">Tooth Extraction</option>
                    </select>
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
        <div class="row" style="margin-left: auto;" >

        
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="datetime" class="control-label">Schedule</label>
                        <input type="text" class="form-control no-color-change" id="selected-date" name="date_time" placeholder="Choose Date in the Calendar" readonly>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label for="newInput" class="control-label">Time</label>
                        <input type="text" class="form-control no-color-change" id="sched_time" name="sched_time" placeholder="Select Time" readonly>
                </div>
            </div>


            <div class="col-sm-3">
                <div class="form-group">
                    <label for="gradecourseyear" class="control-label">Grade & Section</label>
                    <input type="text" class="form-control" id="igradecourseyear" name="gradecourseyear" placeholder="Enter Grade & Section">
                </div>
            </div>
                
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="fullname">Role</label>
                    <select id="role" name="role" class="form-control">
                        <option value="">--Select--</option>
                        <option value="Student in GS/JHS">Student</option>
                        <option value="Employee in GS/JHS">Employee</option>
                    </select>
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


<script>
</script>

<!-- --------------------------------------------------------UPPER MAINTENANCE---------------------------------------------- -->
    <?php

    $week = [
        "monday" => [],
        "tuesday"=> [],
        "wednesday"=> [],
        "thursday"=> [],
        "friday"=> [],
    ];
    $sql1 = "SELECT * FROM statusdentalgsjhsshsmonday";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1)) {
        $row1 = $result1->fetch_assoc();
        $statusden9_am = $row1['statusden9_am'];
        $statusden10_am = $row1['statusden10_am'];
        $statusden11_am = $row1['statusden11_am'];
        foreach([$statusden9_am,$statusden10_am, $statusden11_am] as $time){
            if($time != "Unavailable"){
                array_push($week["monday"], str_replace('.', '', str_replace(' ', '', $time)));
            }
        }
    }

    $sql1 = "SELECT * FROM statusdentalgsjhsshstuesday";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1)) {
        $row1 = $result1->fetch_assoc(); 

        $statusden9_am = $row1['statusden9_am'];
        $statusden10_am = $row1['statusden10_am'];
        $statusden11_am = $row1['statusden11_am'];
        foreach([$statusden9_am,$statusden10_am, $statusden11_am] as $time){
            if($time != "Unavailable"){
                array_push($week["tuesday"], str_replace('.', '', str_replace(' ', '', $time)));
            }
        }
    }

    $sql1 = "SELECT * FROM statusdentalgsjhsshswednesday";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1)) {
        $row1 = $result1->fetch_assoc();

        $statusden9_am = $row1['statusden9_am'];
        $statusden10_am = $row1['statusden10_am'];
        $statusden11_am = $row1['statusden11_am'];
        foreach([$statusden9_am,$statusden10_am, $statusden11_am] as $time){
            if($time != "Unavailable"){
                array_push($week["wednesday"], str_replace('.', '', str_replace(' ', '', $time)));
            }
        }
    }

    $sql1 = "SELECT * FROM statusdentalgsjhsshsthursday";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1)) {
        $row1 = $result1->fetch_assoc();

        $statusden9_am = $row1['statusden9_am'];
        $statusden10_am = $row1['statusden10_am'];
        $statusden11_am = $row1['statusden11_am'];
        foreach([$statusden9_am,$statusden10_am, $statusden11_am] as $time){
            if($time != "Unavailable"){
                array_push($week["thursday"], str_replace('.', '', str_replace(' ', '', $time)));
            }
        }
        
        $sql1 = "SELECT * FROM statusdentalgsjhsshsfriday";
        $result1 = mysqli_query($conn, $sql1);
    
        if (mysqli_num_rows($result1)) {
            $row1 = $result1->fetch_assoc();
            $statusden9_am = $row1['statusden9_am'];
            $statusden10_am = $row1['statusden10_am'];
            $statusden11_am = $row1['statusden11_am'];
            foreach([$statusden9_am,$statusden10_am, $statusden11_am] as $time){
                if($time != "Unavailable"){
                    array_push($week["friday"], str_replace('.', '', str_replace(' ', '', $time)));
                }
            }
        }
    }
    ?>
    
    <?php 
        include $_SERVER['DOCUMENT_ROOT'] . "/DivineClinic/components/calendar.php";
    ?>

<!-- ------------------------------------------------------------------------------------------------------------------------ -->

<!-- -------------------------------------------------UNDER MAINTENANCE-------------------------------------------------- -->


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <br>
        <input type="text" name="user_id" style="display: none;" value="<?= $_SESSION['user_id'];?>">
        <button name="submit_dental" class="btn btn-success">Send Dental Appointment</button>
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
  <!-- jQuery library (make sure to include it) -->
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    
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

