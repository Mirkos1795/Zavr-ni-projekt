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

  if ($_POST) {
    extract($_POST);

    $sql = "UPDATE album 
    SET `naziv`='$naziv',`godina`='$godina', `slika`='$slika', `promjena`= NOW() WHERE id=".$id;

echo $sql;
    $rezultat = $baza->upit($sql);

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

  $sql = "SELECT `id`, `naziv`, `godina`, `slika`,  `promjena` FROM `album` WHERE id = ".$_GET["id"];
  $rezultat = $baza->upit($sql);
  $album = $rezultat->fetch_assoc();

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

  
  <section class="w3-card-4">
    <div class="w3-container w3-white banner"> <h3>Uredi album</h3> </div>
    <div class="w3-panel w3-border">
     <div class="boxcrud">

    <form action="album-uredi.php" <?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?> method="post" class="w3-container">
      <input type="hidden" name="id" value="<?=$album["id"] ?>">
      <div>
        <label for="naziv">Naziv:</label>
        <input class="w3-input w3-white" type="text" value="<?=$album["naziv"] ?>" name="naziv" placeholder="Naziv albuma" />
      </div>
      
      <div>
        <label for="slika">Slika:</label>
        <input class="w3-input w3-white" type="text" value="<?=$album["slika"] ?>" name="slika" placeholder="Link na sliku albuma" />
      </div>
      <div>
        <label for="godina">Godina:</label>
        <input class="w3-input w3-white" type="text" value="<?=$album["godina"] ?>" name="godina" placeholder="Godina"/>
      </div>
     
      <button class="w3-button w3-green w3-margin-top" type="submit"   >Uredi</button>
    </form>
    <br>
    </div>
</div>
</div>
  </section>

<?php include("zajednicko/footer.php"); ?>