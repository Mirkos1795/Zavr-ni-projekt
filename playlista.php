<?php session_start(); 
if(!isset($_SESSION['email'])){
    header("location: registracija.php");
}
$korisnik_id = $_SESSION['id'];


require_once "zajednicko/baza.class.php";
$baza = new Baza();
$broj = 1;


if($_SESSION['tipKorisnika'] == 1){
$sql = "SELECT playlista.id, playlista.naziv, playlista.slika, korisnik.email
        FROM playlista
        LEFT JOIN korisnik
        ON playlista.korisnik_id = korisnik.id;";
}
else {
    $sql = "SELECT playlista.id, playlista.naziv, playlista.slika, korisnik.email
        FROM playlista
        LEFT JOIN korisnik
        ON playlista.korisnik_id = korisnik.id
        WHERE korisnik.id = $korisnik_id;";
}

$rezultat = $baza->upit($sql);

if (mysqli_num_rows($rezultat) > 0) {
    $playliste = [];
    while ($red = mysqli_fetch_assoc($rezultat)) {
        $playliste[] = $red;
    }
} else {
    echo "Dogodila se greška kod komunikacije s bazom!";
}

?>




<?php include("zajednicko/header.php"); ?>
<div class="w3-bar w3-ios-yellow w3-center">
    <h3>Playliste</h3>
</div>


<?php if(isset($_SESSION) && isset($_SESSION['tipKorisnika']) && $_SESSION['tipKorisnika'] ==2): ?>
<div class="w3-bar w3-green"> <a href="playlista-dodaj.php" class="w3-bar-item w3-center w3-green"><i
            class='far fa-file'></i> Dodaj novu playlistu</a></div>
<?php endif; ?>


<section id="sekcijakategorija" class="w3-container">
    <br>
    <div id="kutija" class="w3-container">
        <div id="kutijared" class="w3-row">
            <?php if(isset($playliste)):
            foreach ($playliste as $playlista): ?>
            <div id="kutijakartica" class="w3-container w3-quarter">
                <div id="kartica"  class=" w3-card w3-khaki">
                    <div id="slikakartica" class="slika-kontejner">
                        <img src="<?=$playlista["slika"] ?>" alt="<?=$playlista["naziv"] ?>" width="100%">
                    </div>
                    <div id="karticaelementi" class="w3-container w3-center">

                        <p>Naziv: <?=$playlista["naziv"] ?></p>
                        <p>Autor: <?=$playlista["email"] ?></p>



                        <a href="playlista-pregled.php?id=<?php echo ($playlista["id"]); ?>"><i class='far fa-eye'></i></a>
                        <?php if(isset($_SESSION) && isset($_SESSION['tipKorisnika']) && $_SESSION['tipKorisnika'] ==2): ?>
                        <a href="playlista-uredi.php?id=<?=$playlista["id"] ?>" class="w3-button w3-black w3-circle"> <i class="fa fa-pen"></i></a>
                        <a href="playlista-brisi.php?id=<?=$playlista["id"] ?>" class="delete w3-button w3-black w3-circle" data-confirm="Da li ste sigurni da želite obrisati playlistu?"><i class="fas fa-minus-circle"></i></a>
                        <?php endif; ?>


                    </div>
                </div>
            </div>
            <?php endforeach; 
                else:  ?>
            <div class="w3-panel w3-card w3-yellow">
                <p>Nema playliste.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>


</section>


<?php include('zajednicko/footer.php'); ?>