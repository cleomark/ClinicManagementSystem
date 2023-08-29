<?php

$sname = "localhost";
$sroot = "root";
$spass = "";

$db_name = "capstone1";

$conn  = mysqli_connect($sname, $sroot, $spass, $db_name);
if(!$conn){
    echo "Connection failed:". mysqli_connect_error();
}