<?php
session_start();
if(!isset($_SESSION) ||  $_SESSION['tipKorisnika'] !=1)  {
    header("location: albumi.php");
  }
$id = $_GET["id"];
require_once "zajednicko/baza.class.php";
$baza = new Baza();
if(isset($id)) {
    $sql = "DELETE FROM `album` WHERE id=".$id;
    $rezultat = $baza->upit($sql);
    header("location: albumi.php");
}else {
    echo "Dogodila se greška kod komunikacije s bazom!</br>";
    ?>
    <br/>
    <a href="albumi.php">Povratak na albume</a>
    <?php
}
?>