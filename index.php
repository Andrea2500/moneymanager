<?php
session_start();
include 'includes/autoloader.inc.php';  
$test = new saldo();
    if (isset($_SESSION['email']) && isset($_SESSION['pwd'])) { 
        if($test->login($_SESSION['email'], $_SESSION['pwd'])){
            header('location: app.php');
        }}
?>
<!DOCTYPE html >
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Manager</title>
    <link rel="stylesheet" href="includes/style.css">
    
    
</head>
<body style="overflow-x:hidden;">
<section id="main" style="scroll-snap-align: center;">
<h1>Money Manager App</h1>
<h4>Andrea Pepe</h4>
<div id="action"><p id="login"><a href="#login-form">Login</a></p> <p id="signup"><a href="#signup-form">Registrati</a></p></div>
<div> <?php echo $_SESSION['error']; unset($_SESSION['error']); ?> </div>
    

</section>



    <section id="logcontr"  style="scroll-snap-align: center;" >
    <form autocomplete="off" method="POST" action="login.php" class="form-controller" id="login-form">
        <input type="email" name="email"  placeholder="Email" required>
        <input type="password" name="pwd"  placeholder="Password" required>
        <input type="submit" value="login">
    </form>
    </section>
    
    <section id="regcontr"  style="scroll-snap-align: center;" >
    <form autocomplete="off" method="POST" action="signup.php" class="form-controller" id="signup-form">
        <input type="text" name="nome"  placeholder="Nome" required>
        <input type="email" name="email"  placeholder="Email" required>
        <input type="password" name="pwd"  placeholder="Password" required>
        <input type="submit" value="Registrati">
    </section>
    </div>
    

    



</body>
</html>