<?php
session_start();
if(!isset($_SESSION) ||  $_SESSION['tipKorisnika'] !=1)  {
    header("location: zanrovi.php");
  }

$id = $_GET["id"];
require_once "zajednicko/baza.class.php";
$baza = new Baza();


if(isset($id))   {
    $sql = "DELETE FROM `zanr` WHERE id=".$id;
    $rezultat = $baza->upit($sql);
    header("location: zanrovi.php");
}else {
    echo "Dogodila se greška kod komunikacije s bazom!</br>";
    ?>
    <br/>
    <a href="zanrovi.php">Povratak na žanrove</a>
  
  <?php
}
?>