<?php
session_start();
if(!isset($_SESSION['email'])){
    header("location: registracija.php");
}
require_once "zajednicko/baza.class.php";
$baza = new Baza();
$broj = 1;



 $sql = "SELECT * FROM album";



$rezultat = $baza->upit($sql);

if (mysqli_num_rows($rezultat) > 0) {
    $albumi = [];
    while ($red = mysqli_fetch_assoc($rezultat)) {
        $albumi[] = $red;
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


<div class="w3-bar w3-ios-yellow w3-center"> <h3>Albumi</h3></div>
    <?php if(isset($_SESSION) && isset($_SESSION['tipKorisnika']) && $_SESSION['tipKorisnika'] ==1): ?>
        <div class="w3-bar w3-green"> <a href="album-dodaj.php" class="w3-button w3-bar-item w3-center w3-green"><i class='far fa-file'></i> Dodaj novi album</a> </div>
    <?php endif; ?>


<section id="sekcijakategorija" class="w3-container">
    <br>
    <div id="kutija" class="w3-container">
        <div  id="kutijared" class="w3-row">
        <?php if(isset($albumi)):
            foreach ($albumi as $album): ?>
            <div id="kutijakartica" class="w3-container w3-quarter">
                <div id ="kartica" class="w3-card">
                    <div   id="slikakartica" class="slika-kontejner">
                    <img src="<?=$album["slika"] ?>" alt="<?=$album["naziv"] ?>" width="100%"> </div>
                <div  id="karticaelementi" class="w3-container w3-center">
                
                    <b><?=$album["naziv"] ?></b>
                    <p><?=$album["godina"] ?></p>
                    

                    <a href="album.php?id=<?php echo ($album["id"]); ?>"><i class='fa fa-eye'></i></a>

                    <?php if(isset($_SESSION) && isset($_SESSION['tipKorisnika']) && $_SESSION['tipKorisnika'] ==1): ?>
                    <a href="album-uredi.php?id=<?=$album["id"] ?>" class="w3-button w3-black w3-circle">
                        <i class="fa fa-pen"></i> </a>
                    <a href="album-brisi.php?id=<?=$album["id"] ?>" class="delete w3-button w3-black w3-circle" data-confirm="Da li ste sigurni da želite obrisati album?"><i class="fa fa-minus-circle"></i></a>
                    <?php endif; ?>
                    
                    
                </div>
                </div>
            </div>
            <?php endforeach; 
                else:  ?>
                 <div class="w3-panel w3-card w3-yellow">
                     <p>Nema albuma.</p>
                </div>
                <?php endif; ?>
        </div>
    </div>
</section>

<?php include("zajednicko/footer.php"); ?>