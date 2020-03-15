<?php
include 'includes/autoloader.inc.php';  
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
$test = new saldo();
    if($test->login($_POST['email'],$_POST['pwd'])){
    $_SESSION['email']=$_POST['email'];
    $_SESSION['pwd']=$_POST['pwd'];
    header('location: app.php');
    exit;
    }else {
    $_SESSION['email']=$_POST['email'];
    $_SESSION['pwd']=$_POST['pwd'];
    header('location: index.php');
    exit;
    }