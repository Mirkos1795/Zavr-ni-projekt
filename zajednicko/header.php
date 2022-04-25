<?php
?>

<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <title>Venegas Music club</title>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-ios.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/style3.css">
    <link rel="stylesheet" href="css/style4.css">



</head>

<body>


    <nav class=" w3-container  w3-green w3-mobile">

        <a href="index.php" class="w3-bar-item w3-button w3-mobile w3-green">Početna</a>
        <?php if (isset($_SESSION['email'])): ?>

        <a href="izvodaci.php" class="w3-bar-item w3-button w3-mobile w3-green">Izvođači</a>


        <a href="zanrovi.php" class="w3-bar-item w3-button w3-mobile w3-green">Žanrovi</a>


        <a href="albumi.php" class="w3-bar-item w3-button w3-mobile w3-green">Albumi</a>

        <a href="pjesme.php" class="w3-bar-item w3-button w3-mobile w3-green">Pjesme</a>

        <a href="playlista.php" class="w3-bar-item w3-button w3-mobile w3-green">Playliste</a>

        <?php endif; ?>

        <a href="autor.php" class="w3-bar-item w3-button w3-mobile w3-green "> O autoru </a>







        <?php if(empty($_SESSION['email'])): ?>

        <a href="registracija.php" class="w3-bar-item w3-button w3-mobile w3-green w3-right ">Registracija</a>
        <a href="prijava.php" class="w3-bar-item w3-button w3-mobile w3-green w3-right">Prijava</a>
        <?php else: ?>
        <a href="odjava.php" class="w3-bar-item w3-button w3-mobile w3-right">Odjava</a>
        <?php endif; ?>
        </div>

        <?php if(isset($_SESSION) && !empty($_SESSION['email'])): ?>

<div class="w3-bar-item w3-mobile w3-green w3-right w3-hide"> Pozdrav, <?=$_SESSION['email'] ?></div>

<?php  endif; ?>



        <?php if(isset($_SESSION) && isset($_SESSION['tipKorisnika']) && $_SESSION['tipKorisnika'] == 2): ?>
        <a href="moj_profil.php" class="w3-bar-item w3-button w3-mobile w3-green w3-right">Moj profil</a>
        <?php endif;?>

        <?php if(isset($_SESSION) && isset($_SESSION['tipKorisnika']) && $_SESSION['tipKorisnika'] == 1): ?>
        <a href="korisnici.php" class="w3-bar-item w3-button w3-mobile w3-green w3-right">Korisnici</a>

        <a href="zapisnik.php" class="w3-bar-item w3-button w3-mobile w3-green w3-right">Zapisnik događaja</a>
        <?php endif;?>


    </nav>