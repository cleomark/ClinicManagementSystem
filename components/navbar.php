

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
    if(!isset($fullname)){
        if (isset($_SESSION['username'])){
            $fullname = $_SESSION['username'];
        }
    }
    include './function/navcontent.php';
    include $_SERVER['DOCUMENT_ROOT'] . "/DivineClinic/components/icons.php";
?>

<header class="app-header fixed-top">	   	 
    <div class="main-wrapper"></div>
    <div class="header">
    <div class="header-left">
    <a href="#" class="logo">
    <img src="../../assets/img/dwcl.png" width="35" height="35" alt> <span>DWCL Clinic</span>
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
    <img src="../../assets/img/user.png">
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
                    <a href="<?php echo $content[0] ?>" <?php if(basename($_SERVER["SCRIPT_FILENAME"]) == $content[0]) echo 'class=\'active\''?>><span class="menu-side"><img src="../../assets/img/icons/<?php
                        $selectedIcon = $content[1];
                        foreach($icons as $key => $icon){
                            if(str_contains(strtolower($title), $key)){
                                $selectedIcon =  $icon;
                                break;
                            }
                        }
                        echo $selectedIcon;
                    ?>.svg" alt></span> <span><?php echo$title ?></span></a>
                </li>
                <?php
            }else{
                ?>
                    <li class="submenu">
                        <a href="#" class='<?php if(in_array(basename($_SERVER["SCRIPT_FILENAME"]), $content[2])) echo 'active'  ?>'><span class="menu-side"><img src="../../assets/img/icons/<?php
                            $selectedIcon = $content[1];
                            foreach($icons as $key => $icon){
                                if(str_contains(strtolower($title), $key)){
                                    $selectedIcon =  $icon;
                                    break;
                                }
                            }
                            echo $selectedIcon;
                        ?>.svg" alt></span> <span> <?php echo $title ?> </span> <span class="menu-arrow"></span></a>
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
    </div>
    </div>
</header>


<div class="sidebar-overlay" data-reff></div>

<script src="../../assets/js/jquery-3.6.1.min.js"></script>
<?php 
if(in_array( basename($_SERVER["SCRIPT_FILENAME"]), 
["addmedicalmessageshs.php", "adddentalmessageshs.php", "addphysicianmessagegsjhs.php",
 "adddentalmessagecollege.php", "addmedicalmessagecollege.php", "medicalcollege.php",  ])
){
    ?>
        <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <?php
}
?>

<script src="../../assets/js/feather.min.js"></script>

<script src="../../assets/js/jquery.slimscroll.js"></script>

<script src="../../assets/js/select2.min.js"></script>

<script src="../../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../assets/plugins/datatables/datatables.min.js"></script>

<script src="../../assets/plugins/simple-calendar/jquery.simple-calendar.js"></script>
<script src="../../assets/js/calander.js"></script>

<script src="../../assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="../../assets/plugins/apexchart/chart-data.js"></script>

<script src="../../assets/js/circle-progress.min.js"></script>

<script src="../../assets/plugins/slick/slick.js"></script>

<script src="../../assets/js/app.js"></script>

<link rel="stylesheet" href="../../assets/css/newstyle.css">