<?php
session_start();
if(isset($_SESSION) && $_SESSION['tipKorisnika'] !=1)  {
    header("location: izvodaci.php");
  }


require_once "zajednicko/baza.class.php";
$baza = new Baza();
$broj = 1;

$sql = "SELECT p.id as idPjesma,p.naziv as nazivPjesme,i.naziv as nazivIzvodac, p.slika,p.link, a.naziv as nazivAlbum, z.naziv as nazivZanr 
FROM pjesma p 
LEFT JOIN album a ON a.id=p.album_id 
LEFT JOIN zanr z ON z.id=p.zanr_id 

LEFT JOIN izvodac_album ia ON ia.album_id = a.id
LEFT JOIN izvodac i ON i.id = ia.izvodac_id
ORDER BY p.naziv;";


$rezultat = $baza->upit($sql);

if ($rezultat->num_rows > 0) {
    $pjesme = [];
    while ($red = $rezultat->fetch_assoc()) {
        $pjesme[] = $red;
    }
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


<div class="w3-bar w3-ios-yellow w3-center"> <h3>Pjesme</h3></div>
    <?php if(isset($_SESSION) && $_SESSION['tipKorisnika']  == 1): ?>
        <div class="w3-bar w3-green">  <a href="pjesma-dodaj.php" class="w3-button w3-bar-item w3-center w3-green"><i class='far fa-file'></i> Dodaj novu pjesmu</a></div>
    <?php endif; ?>


<section id="sekcijakategorija1" class="w3-container">
    <div id="kutijapjesme1" class="w3-container">
        <div  id="kutijared1" class="w3-row">
        <?php if(isset($pjesme)):
            foreach ($pjesme as $pjesma): ?>
            <div   id="kutijakartica1" class="w3-container w3-quarter">
                <div id="kartica1" class="w3-card">
                    <div id="slikakartica1"  class="slika-kontejner">
                <img src="<?=$pjesma["slika"] ?>" alt="<?=$pjesma["nazivPjesme"] ?>" width="100%">
        </div>
                <div  id="karticaelementi" class="w3-container w3-center pjesma">
                    <b><?=$pjesma["nazivPjesme"] ?></b>
                    <p><?=$pjesma["nazivAlbum"] ?></p>
                    <p><?=$pjesma["nazivZanr"] ?></p>

                    
                    <?php if(isset($_SESSION) && $_SESSION['tipKorisnika'] ==1): ?>
                    <a href="pjesma-uredi.php?id=<?=$pjesma["idPjesma"] ?>" class="w3-button w3-black w3-circle">
                        <i class="fa fa-pen"></i>
                    </a>
                    <a href="pjesma-brisanje.php?id=<?=$pjesma["idPjesma"] ?>" delete class="delete w3-button w3-black w3-circle" data-confirm="Da li ste sigurni da želite obrisati pjesmu?"><i class="fa fa-minus-circle"></i></a>
                    <?php endif; ?>
                    <a href="pjesma.php?id=<?= $pjesma["idPjesma"] ?>" class="w3-button w3-black w3-circle"><i class="fa fa-info"></i></a>
                    
                    <a class="w3-button w3-black w3-circle" href="<?=$pjesma["link"] ?>" target="_blank"><i class="fa fa-play"></i></a>
                    
                </div>
                </div>
            </div>
            <?php endforeach; 
                else:  ?>
                 <div class="w3-panel w3-card w3-yellow">
                     <p>Nema pjesama.</p>
                </div>
                <?php endif; ?>
        </div>
    </div>
</section>

<?php include("zajednicko/footer.php"); ?>