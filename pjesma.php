<?php 
session_start();
if(!isset($_SESSION['email'])){
    header("location: registracija.php");
}
    require_once "zajednicko/baza.class.php";

    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $baza = new Baza();

        $sql = "SELECT p.id as idPjesma,p.naziv as nazivPjesme,i.naziv as nazivIzvodac, p.trajanje, p.ocjena, p.tekst, p.slika,p.link, a.naziv as nazivAlbum, z.naziv as nazivZanr 
        FROM pjesma p 
        LEFT JOIN album a ON a.id=p.album_id 
        LEFT JOIN zanr z ON z.id=p.zanr_id 
        
        LEFT JOIN izvodac_album ia ON ia.album_id = a.id
        LEFT JOIN izvodac i ON i.id = ia.izvodac_id
        ORDER BY p.naziv;";
        $rezultat = $baza->upit($sql);

        if(mysqli_num_rows($rezultat) > 0){
            $pjesma = mysqli_fetch_assoc($rezultat);
            //var_dump($zanr);
        } else {
            $greska = "Ta pjesma ne postoji!";
        }
    } else {
        header("location: pjesma.php");
    }
?>

<?php include("zajednicko/header.php"); ?>

<section class="w3-container w3-padding-32">
<div class="w3-container w3-border w3-round w3-white w3-padding-16">
    <?php if(isset($greska)):?>
        <p><?php echo($greska) ?></p>
    <?php endif; ?>
    
    <?php if(isset($pjesma)):?>
        <h1 class="naslov">Pjesma: <?php echo($pjesma["nazivPjesme"]); ?></h1>
        <img width="300px" src='<?php echo($pjesma["slika"]); ?>' alt='<?php echo($pjesma["nazivPjesme"]); ?>'>
        
        <h3 class="naslov">Izvođači: <?php echo($pjesma["nazivIzvodac"]); ?></h3>
        <h3 class="naslov">Žanr: <?php echo($pjesma["nazivZanr"]); ?></h3>
        <h3 class="naslov">Tekst: <?php echo($pjesma["tekst"]); ?></h3>
        <h3 class="naslov">Trajanje: <?php echo($pjesma["trajanje"]); ?></h3>
        <h3 class="naslov">Ocjena: <?php echo($pjesma["ocjena"]); ?></h3>
    <?php endif; ?>
    </div>
    </section>
    </div>

<?php include("zajednicko/footer.php"); ?>
