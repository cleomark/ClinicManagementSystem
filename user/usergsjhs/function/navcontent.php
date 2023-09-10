<?php

$items = array(
    "Health Profile" => array('healthrecordformgsjhs.php', 'menu-icon-13'),
    "Appointment" => array('#', 'menu-icon-04', 
        [
            "Request Dental Scheduling" => "adddentalmessagegsjhs.php",
            "Request Medical Scheduling" => "addmedicalmessagegsjhs.php",
            "Request Physician Scheduling" => "addphysicianmessagegsjhs.php",
        ]),
    "Clinic Records" => array('#', 'menu-icon-15', 
        [
            "Health Profile Record" => "viewhealthrecordprofile.php",
            "Dental Record" => "viewdentalappgsjhs.php",
            "Medical Record" => "viewmedicalappgsjhs.php",
            "Physician Record" => "viewphysicianappgsjhs.php",
            "Diagnosis/Chief Complaints, Management & Treatment Record" => "viewdiagnosisgsjhs.php",
            "Medical Record" => "viewschoolassesgsjhs.php",
            "Physical Examination Record" => "viewphysicalexaminationrecordgsjhs.php",
            "Physician's Order Sheet and Progress Notes" => "viewphysicianorderandprogressnotesgsjhs.php",
        ])
);
