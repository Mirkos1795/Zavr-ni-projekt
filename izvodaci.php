<?php session_start(); 
if(!isset($_SESSION['email'])){
    header("location: registracija.php");
}

require_once "zajednicko/baza.class.php";
$baza = new Baza();
$broj = 1;

$sql = "SELECT * FROM izvodac";


$rezultat = $baza->upit($sql);

if (mysqli_num_rows($rezultat) > 0) {
    $izvodaci = [];
    while ($red = mysqli_fetch_assoc($rezultat)) {
        $izvodaci[] = $red;
    }
} else {
    echo "Dogodila se greška kod komunikacije s bazom!";
}

?>




<?php include("zajednicko/header.php"); ?>
<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-ios.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>



    <link rel="stylesheet" href="css/style4.css">

</head>




<div class="w3-bar w3-ios-yellow w3-center">
    <h3>Izvođači</h3>
</div>

<?php if(isset($_SESSION) && isset($_SESSION['tipKorisnika']) && $_SESSION['tipKorisnika'] ==1): ?>
<div class="w3-bar w3-green"> <a href="izvodac-dodaj.php" class="w3-button w3-bar-item w3-center w3-green "><i
            class='far fa-file'></i> Dodaj novog izvođača</a>
    <?php endif; ?>
</div>





<section id="sekcijakategorija" class="w3-container">

    <br>
    <div id="kutija" class="w3-container">
        <div id="kutijared" class="w3-row">
            <?php if(isset($izvodaci)):
            foreach ($izvodaci as $izvodac): ?>
            <div id="kutijakartica" class="w3-container w3-quarter">

                <div id="kartica" class="w3-card">
                    <div id="slikakartica" class="slika-kontejner">
                        <img src="<?=$izvodac["slika"] ?>" alt="<?=$izvodac["naziv"] ?>" width="100%">
                    </div>
                    <div id="karticaelementi" class="w3-container w3-center">

                        <p><?=$izvodac["naziv"] ?></p>




                        <a href="izvodac.php?id=<?php echo ($izvodac["id"]); ?>"><i class='far fa-eye'></i></a>
                        <?php if(isset($_SESSION) && isset($_SESSION['tipKorisnika']) && $_SESSION['tipKorisnika'] ==1): ?>
                        <a href="izvodac-uredi.php?id=<?=$izvodac["id"] ?>" class="w3-button w3-black w3-circle">
                            <i class="fa fa-pen"></i></a>
                        <a href="izvodac-brisi.php?id=<?=$izvodac["id"] ?>" class="delete w3-button w3-black w3-circle" data-confirm="Da li ste sigurni da želite obrisati album?"><i class="fa fa-minus-circle"></i></a>
                        <?php endif; ?>


                    </div>
                </div>
            </div>

            <?php endforeach; 
                else:  ?>
            <div class="w3-panel w3-card w3-yellow">
                <p>Nema izvođača.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>


</section>


<?php include('zajednicko/footer.php'); ?>