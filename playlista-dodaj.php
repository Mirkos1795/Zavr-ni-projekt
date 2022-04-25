<?php
session_start();
if(!isset($_SESSION) ||  $_SESSION['tipKorisnika'] !=2)  {
  header("location: index.php");
}

$email = $_SESSION['email'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require_once "zajednicko/baza.class.php";
  $baza = new Baza();

  if(isset($_POST["naziv"]) && isset($_POST["slika"]) &&  isset($_POST["opis"])){
    $naziv = urediUnos($_POST["naziv"]);
    $opis = urediUnos($_POST["opis"]);
    $slika = urediUnos($_POST["slika"]);
    $korisnik_id = $_SESSION['id'];
    
    $sql = "INSERT INTO playlista(`naziv`, `opis`, `slika`, `korisnik_id`, `kreirano`) 
    VALUES ('$naziv','$opis','$slika', '$korisnik_id', NOW())";

    // echo $sql;

    $rezultat = $baza->insert($sql);

    if ($rezultat > 0) {
      $sql = "INSERT INTO `log` (`email`, `dogadaj`) VALUES ('$email', 'Dodavanje nove playliste'); ";
      $rezultat = $baza->insert($sql);
      if ($rezultat > 0) {
        header("location: playlista.php");
      }
      else {
        echo ("Greška kod zapisa loga");
      }
    } else {
      echo "Dogodila se greška kod komunikacije s bazom!</br>";
    }
  } else {
    echo ("Nisu popunjena sva polja!");
  }
}
else {
  // povezivanje na bazu
  require_once "zajednicko/baza.class.php";
  $baza = new Baza();

  // trebamo izvaditi pjesme iz baze podataka
  $sql="SELECT id, naziv FROM pjesma ORDER BY naziv;";
  $rezultat = $baza->upit($sql);
  $pjesme=[]; # prazna lista u kojoj ću pamtiti pjesme
  if ($rezultat->num_rows>0) {
    while ($zapis=$rezultat->fetch_assoc()) {
      $pjesme[]=$zapis;
    }
  }

}

function urediUnos($unos)
{
  $unos = trim($unos);
  $unos = stripslashes($unos);
  $unos = htmlspecialchars($unos);
  return $unos;
}

?>

<?php include("zajednicko/header.php"); ?>

<div class="w3-container w3-ios-yellow  banner">
    <h3> Dodavanje nove playliste </h3>
</div>
<div class="w3-panel w3-border">
    <div class="boxcrud">

        <form action="playlista-dodaj.php" <?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?> method="post" class="w3-container w3-white w3-mobile w3-padding-top ">
            <div>
                <label class="w3-text-black" for="naziv">Naziv:</label>
                <input class="w3-input w3-white" type="text" name="naziv" placeholder="Naziv playliste" pattern="^[a-zA-Z][a-zA-Z0-9-_.]{5,12}$" title="Dopušteno je od 6 do 12 znakova" required/>
            </div>
            <div>
                <label class="w3-text-black" for="opis">Tekst:</label>
                <textarea class="w3-input w3-white " name="opis" cols="30" rows="10" placeholder="Opis playliste" pattern="^[a-zA-Z][a-zA-Z0-9-_.]{5,50}$" title="Dopušteno je od 6 do 50 znakova" required></textarea>
            </div>
            <div>
                <label class="w3-text-black" for="slika">Slika:</label>
                <input class="w3-input w3-white" type="text" name="slika" placeholder="Link na sliku playliste" pattern="https?://.+" title="Potrebno je upisati ispravni URL" required />
            </div>
            <div>


                <button class="w3-button w3-green w3-margin-top" type="submit">Dodaj</button>
        </form>
        <br>
    </div>
</div>
</div>
<?php include("zajednicko/footer.php"); ?>