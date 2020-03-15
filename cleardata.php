<?php
    include 'includes/autoloader.inc.php';  
    session_start();
    $test = new saldo();
    if(!$test->login($_SESSION['email'], $_SESSION['pwd'])){
        header('location: index.html');
    }
    //$test->add(7.5, "provaabc");
    $test->clearData();
    header('location: app.php');
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 
?>