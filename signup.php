<?php
include 'includes/autoloader.inc.php';  
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
$test = new saldo();
if($test->signup($_POST['nome'],$_POST['email'],$_POST['pwd'])){
    $_SESSION['email']=$_POST['email'];
    $_SESSION['pwd']=$_POST['pwd'];
    header('location: app.php');
}else {
    unset($_SESSION['email']);
    $_SESSION['error'].='Email già registrata';
    header('location: index.php');
    exit;
}