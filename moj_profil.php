<?php
session_start();
if(isset($_SESSION) && $_SESSION['tipKorisnika'] !=2)  {
    header("location: index.php");
}


require_once "zajednicko/baza.class.php";
$baza = new Baza();
$broj = 1;

$id_korisnika = $_SESSION['id'];
$sql = "SELECT * FROM korisnik WHERE id = '$id_korisnika'";

$rezultat = $baza->upit($sql);

if ($rezultat->num_rows == 1) {
    while ($red = $rezultat->fetch_assoc()) {
        $korisnik[] = $red;
    }
}

?>

<?php include("zajednicko/header.php"); ?>

<div class="w3-bar w3-ios-yellow w3-center"> <h3>Moj profil</h3></div>



    <?php if(isset($_SESSION) && $_SESSION['tipKorisnika']  == 2): ?>
        <div class="w3-bar w3-green">  <a href="moj_profil-uredi.php" class="w3-button w3-green w3-bar-item w3-center"><i class='far fa-file'></i> Uredi moj profil</a></div>
    <?php endif; ?>
</section>


    <div class="w3-container">
        <div class="w3-row">
        <?php if(isset($korisnik)): ?>
            <div class="w3-container w3-quarter">
                <div class="w3-card ">
                    <div class="slika-kontejner">
                        <img src="img/kartica.jpg" alt="slika nije dostupna" width="50%">
                    </div>
                        <div class="w3-container w3-center">
                                <p><b>Ime:</b> <?=$korisnik[0]["ime"] ?></p>
                                <p><b>Prezime:</b> <?=$korisnik[0]["prezime"] ?></p>
                                <p><b>Email:</b> <?=$korisnik[0]["email"] ?></p>
                                <p><b>Datum registracije:</b> <?=$korisnik[0]["promjena"] ?></p>
                        </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>



<?php include("zajednicko/footer.php"); ?>