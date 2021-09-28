<?php
ob_start();
if(!isset($_SESSION)) 
     { 
         session_start(); 
     }
$conn  = mysqli_connect("localhost","root","","bloodsample");
require_once 'helperfunction.php';
require_once 'common.php';
?>