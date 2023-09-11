<?php

$items = array(
    "Health Profile" => array('healthrecordformcollege.php', 'menu-icon-13'),
    "Appointment" => array('#', 'menu-icon-04', 
        [
            "Request Dental Scheduling" => "adddentalmessagecollege.php",
            "Request Medical Scheduling" => "addmedicalmessagecollege.php",
            "Request Physician Scheduling" => "addphysicianmessagecollege.php",
    ]),
    "Clinic Records" => array('#', 'menu-icon-15', 
        [
            "Health Profile Record" => "viewhealthrecordprofilecollege.php",
            "Dental Record" => "viewdentalappcollege.php",
            "Medical Record" => "viewmedicalappcollege.php",
            "Physician Record" => "viewphysicianappcollege.php",
            "Diagnosis/Chief Complaints, Management & Treatment Record" => "viewdiagnosisappcollege.php",
            "Consultation Form Record" => "viewconsultationformcollege.php",
            "School Health Assessment Record" => "viewschoolassescollege.php",
        ])
);
    