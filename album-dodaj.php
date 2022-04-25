<?php
session_start();
if(!isset($_SESSION) ||  $_SESSION['tipKorisnika'] !=1)  {
  header("location: index.php");
}
/*
Kada se prvi puta učita stranica znači da smo došli s linka "Dodaj novi"
te se stranica učitava GET metodom
*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require_once "zajednicko/baza.class.php";
  $baza = new Baza();

  if(isset($_POST["naziv"]) && isset($_POST["slika"]) && isset($_POST["godina"])){
    $naziv = urediUnos($_POST["naziv"]);
    $slika = urediUnos($_POST["slika"]);
    $godina = urediUnos($_POST["godina"]);
   

    $sql = "INSERT INTO `album` (`naziv`, `slika`, `godina`, `promjena`) 
    VALUES ('$naziv','$slika','$godina', NOW())";

    // echo $sql;

    $rezultat = $baza->insert($sql);

    if ($rezultat > 0) {
      header("location: albumi.php");
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

  // trebamo izvaditi albume iz baze podataka
  $sql="SELECT id, naziv FROM album ORDER BY naziv;";
  $rezultat = $baza->upit($sql);
  $albumi=[]; # prazna lista u kojoj ću pamtiti albume
  if ($rezultat->num_rows>0) {
    while ($zapis=$rezultat->fetch_assoc()) {
      $albumi[]=$zapis;
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

<div class="w3-container w3-ios-yellow banner"> <h3> Dodavanje novog albuma </h3> </div>
  
  <div class="w3-panel w3-border">
     <div class="boxcrud">
    <form action="album-dodaj.php" <?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?> method="post" class="w3-container w3-white w3-mobile w3-padding-top">
      <div>
        <label  class="w3-text-black" for="naziv">Naziv:</label>
        <input class="w3-input w3-white"  type="text" name="naziv" placeholder="Naziv albuma" pattern="^[a-zA-Z][a-zA-Z0-9-_.]{1,12}$" title="Dopušteno je od 2 do 12 znakova" required />
      </div>
      
      <div>
        <label  class="w3-text-black" for="slika">Slika:</label>
        <input class="w3-input w3-white" type="text" name="slika" placeholder="Link na sliku albuma" pattern="https?://.+" title="Potrebno je upisati ispravni URL" required />
      </div>
      <div>
        <label  class="w3-text-black" for="godina">Godina:</label>
        <input class="w3-input w3-white" type="text" name="godina" placeholder="Godina" pattern="[0-9]+" title="Upisati samo brojeve" required/>
      </div>
     
      <button class=" w3-button w3-green w3-margin-top" type="submit">Dodaj</button>
    </form>
  <br>
  </div>
</div>
</div>

<?php include("zajednicko/footer.php"); ?>