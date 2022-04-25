<?php
    session_start();
    
    require_once "zajednicko/baza.class.php";
    $baza = new Baza();

    $email = $_SESSION['email'];

    $sql = "INSERT INTO `log` (`email`, `dogadaj`) VALUES ('$email', 'Odjava korisnika'); ";
    $rezultat = $baza->insert($sql);
    
    session_destroy();
    header("Location: index.php");
?>