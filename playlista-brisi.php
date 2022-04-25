<?php
session_start();
if(!isset($_SESSION) ||  $_SESSION['tipKorisnika'] !=2)  {
    header("location: playlista.php");
}

$id = $_GET["id"];
require_once "zajednicko/baza.class.php";
$baza = new Baza();
if(isset($id)) {
    $sql = "DELETE FROM `playlista` WHERE id=".$id;
    $rezultat = $baza->upit($sql);
    header("location: playlista.php");
}else {
    echo "Dogodila se greška kod komunikacije s bazom!</br>";
    ?>
    <br/>
    <a href="playlista.php">Povratak na playlistu</a>
    <?php
}
?>