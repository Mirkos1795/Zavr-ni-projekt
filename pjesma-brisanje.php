<?php
session_start();
if(!isset($_SESSION) ||  $_SESSION['tipKorisnika'] !=1)  {
    header("location: pjesme.php");
  }
$id = $_GET["id"];
require_once "zajednicko/baza.class.php";
$baza = new Baza();
if(isset($id)) {
    $sql = "DELETE FROM `pjesma` WHERE id=".$id;
    $rezultat = $baza->upit($sql);
    header("location: pjesme.php");
}else {
    echo "Dogodila se greška kod komunikacije s bazom!</br>";
    ?>
    <br/>
    <a href="pjesme.php">Povratak na pjesme</a>
    <?php
}
?>