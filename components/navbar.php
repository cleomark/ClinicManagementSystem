<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">

<link rel="stylesheet" href="../../assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="../../assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" type="text/css" href="../../assets/css/select2.min.css">

<link rel="stylesheet" href="../../assets/plugins/simple-calendar/simple-calendar.css">

<link rel="stylesheet" href="../../assets/plugins/datatables/datatables.min.css">

<link rel="stylesheet" type="text/css" href="../../assets/plugins/slick/slick.css">
<link rel="stylesheet" type="text/css" href="../../assets/plugins/slick/slick-theme.css">

<link rel="stylesheet" href="../../assets/plugins/feather/feather.css">

<link rel="stylesheet" type="text/css" href="../../assets/css/style.css">

<?php 
    include './function/navcontent.php';
?>

<header class="app-header fixed-top">	   	 
    <div class="main-wrapper">
    <div class="header">
    <div class="header-left">
    <a href="#" class="logo">
    <img src="../assets/images/dwcl.png" width="35" height="35" alt> <span>DWCL Clinic</span>
    </a>
    </div>
    <a id="toggle_btn" href="javascript:void(0);"><img src="../../assets/img/icons/bar-icon.svg" alt></a>
    <a id="mobile_btn" class="mobile_btn float-start" href="#sidebar"><img src="../../assets/img/icons/bar-icon.svg" alt></a>
    <ul class="nav user-menu float-end">
    <li class="nav-item dropdown d-none d-md-block">
    <li class="nav-item dropdown has-arrow user-profile-list">
    <a href="#" class="dropdown-toggle nav-link user-link" data-bs-toggle="dropdown">
    <div class="user-names">
    <h5><?= $fullname;?></h5>
    </div>
    <span class="user-img">
    <img src="assets/images/user.png">
    </span>
    </a>
    <div class="dropdown-menu">
    <a class="dropdown-item" href="function/logout.php">Log Out</a>
    </div>
    </li>
    </ul>
    </div>
    <div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
    <ul>
    <li class="menu-title">Main</li>
    <?php 
        foreach ($items as $title => $content) {
            if($content[0] != "#"){
                ?>
                <li>
                    <a href="<?php echo $content[0] ?>" <?php if(basename($_SERVER["SCRIPT_FILENAME"]) == $content[0]) echo 'class=\'active\''?>><span class="menu-side"><img src="../../assets/img/icons/<?php echo $content[1] ?>.svg" alt></span> <span><?php echo$title ?></span></a>
                </li>
                <?php
            }else{
                ?>
                    <li class="submenu">
                        <a href="#" class='<?php if(in_array(basename($_SERVER["SCRIPT_FILENAME"]), $content[2])) echo 'active'  ?>'><span class="menu-side"><img src="../../assets/img/icons/<?php echo $content[1] ?>.svg" alt></span> <span> <?php echo $title ?> </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <?php
                                foreach($content[2] as $sub => $link){
                                    ?> 
                                        <li class="submenu-item"><a class="submenu-link <?php if(basename($_SERVER["SCRIPT_FILENAME"]) == $link) echo 'active'?>" href="<?php echo $link ?>"><?php echo $sub ?></a></li>
                                    <?php
                                }
                            ?>
                        </ul>
                    </li>
                <?php
            }
        };
    ?>
    <!-- 
    <li>
        <a href="healthrecordformgsjhs.php" class="active"><span class="menu-side"><img src="../../assets/img/icons/menu-icon-13.svg" alt></span> <span>Health Profile</span></a>
    </li>
    <li class="submenu">
        <a href="#"><span class="menu-side"><img src="../../assets/img/icons/menu-icon-04.svg" alt></span> <span> Appointment </span> <span class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li class="submenu-item"><a class="submenu-link" href="adddentalmessagegsjhs.php">Request Dental Scheduling</a></li>
            <li class="submenu-item"><a class="submenu-link" href="addmedicalmessagegsjhs.php">Request Medical Scheduling</a></li>
            <li class="submenu-item"><a class="submenu-link" href="addphysicianmessagegsjhs.php">Request Physician Scheduling</a></li>
        </ul>
    </li>
    <li class="submenu">
    <a href="#"><span class="menu-side"><img src="../../assets/img/icons/menu-icon-15.svg" alt></span>  <span> Clinic Records </span> <span class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li class="submenu-item"> <a class="submenu-link" href="viewhealthrecordprofile.php">Health Profile Record</a>
            <li class="submenu-item"> <a class="submenu-link" href="viewdentalappgsjhs.php">Dental Record</a>
            <li class="submenu-item"> <a class="submenu-link" href="viewmedicalappgsjhs.php">Medical Record</a>
            <li class="submenu-item"> <a class="submenu-link" href="viewphysicianappgsjhs.php">Physician Record</a>
            <li class="submenu-item"> <a class="submenu-link" href="viewdiagnosisgsjhs.php">Diagnosis/Chief Complaints, Management & Treatment Record</a>
            <li class="submenu-item"> <a class="submenu-link" href="viewschoolassesgsjhs.php">School Health Assessment Record</a>
            <li class="submenu-item"> <a class="submenu-link" href="viewphysicalexaminationrecordgsjhs.php">Physical Examination Record</a>
            <li class="submenu-item"> <a class="submenu-link" href="viewphysicianorderandprogressnotesgsjhs.php">Physician's Order Sheet and Progress Notes Record</a>
        </ul>
    </li> 
    -->
    </div>
    </div>
</header>

