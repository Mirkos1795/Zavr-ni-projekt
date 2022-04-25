<?php
session_start();
if(!isset($_SESSION) ||  $_SESSION['tipKorisnika'] !=1)  {
    header("location: izvodaci.php");
  }
$id = $_GET["id"];
require_once "zajednicko/baza.class.php";
$baza = new Baza();
if(isset($id)) {
    $sql = "DELETE FROM `izvodac` WHERE id=".$id;
    $rezultat = $baza->upit($sql);
    header("location: izvodaci.php");
}else {
    echo "Dogodila se greška kod komunikacije s bazom!</br>";
    ?>
    <br/>
    <a href="izvodaci.php">Povratak na izvođače.</a>
    <?php
}
?>