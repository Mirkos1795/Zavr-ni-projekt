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

    $sql = "UPDATE izvodac 
    SET `naziv`='".$naziv."',`bio`='".htmlspecialchars($bio, ENT_QUOTES)."',`slika`='".$slika."', promjena= NOW() WHERE id=".$id;

echo $sql;
    $rezultat = $baza->upit($sql);

    if ($rezultat > 0) {
      header("location: izvodaci.php");
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

  $sql = "SELECT `id`, `naziv`, `bio`, `slika`, `promjena` FROM `izvodac` WHERE id = ".$_GET["id"];
  $rezultat = $baza->upit($sql);
  $izvodac = $rezultat->fetch_assoc();

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

<div class="w3-container w3-white banner"> <h3> Uređivanje izvođača</h3> </div>
  
  <div class="w3-panel w3-border">
     <div class="boxcrud">
  

  
    <form action="izvodac-uredi.php" <?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?> method="post" class="w3-container  w3-white w3-mobile w3-padding-top">
      <input type="hidden" name="id" value="<?=$izvodac["id"] ?>">
      <div>
        <label class="w3-text-black"  for="naziv">Naziv:</label>
        <input class="w3-input w3-white" type="text" value="<?=$izvodac["naziv"] ?>" name="naziv" placeholder="Naziv izvodaca" />
      </div>
      
      <div>
        <label class="w3-text-black"  for="slika">Slika:</label>
        <input class="w3-input w3-white " type="text" value="<?=$izvodac["slika"] ?>" name="slika" placeholder="Link na sliku izvodaca" />
      </div>
      <div>
        <label class="w3-text-black"  for="bio">Biografija:</label>
        <textarea class="w3-input w3-white" type="text" value="<?=$izvodac["bio"] ?>" name="bio" placeholder="Biografija"><?=$izvodac["bio"] ?></textarea>
      </div>

      <button class="w3-button w3-green w3-margin-top" type="submit">Uredi</button>
    </form>
  <br>
    </div>
</div>
</div>

<?php include("zajednicko/footer.php"); ?>