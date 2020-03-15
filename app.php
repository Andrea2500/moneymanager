<?php
    session_start();
    include 'includes/autoloader.inc.php';  
    $test = new saldo();
    if(!$test->login($_SESSION['email'], $_SESSION['pwd'])){
        header('location: index.php');
    }
    //$test->add(7.5, "provaabc");
    $test->calcolaInOut();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="includes/style.css" type="text/css">
</head>
<body>
   <?php
    
   ?>

   <section>
    <div id="topbar">
        <a href="logout.php">&nbsp;&nbsp;Esci</a>
        <a href="cleardata.php">Pulisci Conto&nbsp;&nbsp;</a>
    </div>
   
   <div class="spese">
   <div class='row-header'>
        <h3>Entrate/Uscite</h3>
        <h3>Descrizione</h3>
        <h3>Data</h3>
        </div>
    <?php
        $test->mostraMovimenti();
    ?>
    </div>


    <div id="footer">
        <div id="saldo">
        <p>Saldo attuale:<br> <?php echo $test->calcolaTot(); ?>€</p>
        <p>Entrate:<br> <?php echo $test->mostraEntrate(); ?>€</p>
        <p>Uscite:<br> <?php echo $test->mostraUscite(); ?>€</p>
        </div>

        <div id="aggiungi" >
        <form autocomplete="off" action="add.php" method="POST">
        <input type="tel" step="0.01" name="cifra" placeholder="€"  >
        <input type="text" name="descrizione" placeholder="Descrizione">
        <input type="submit" value="add">
        </div>
    </form>
    </div>
   </section>
</body>
</html>