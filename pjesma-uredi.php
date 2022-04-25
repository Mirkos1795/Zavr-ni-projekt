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

    $sql = "UPDATE pjesma 
    SET `naziv`='".$naziv."',`tekst`='".htmlspecialchars($tekst, ENT_QUOTES)."',`slika`='".$slika."',`link`='".$link."',`album_id`='".$album."',`zanr_id`='".$zanr."', `promjena`= NOW() WHERE id=".$id;

echo $sql;
    $rezultat = $baza->upit($sql);

    if ($rezultat > 0) {
      header("location: pjesme.php");
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

  $sql="SELECT id, naziv FROM zanr ORDER BY naziv;";
  $rezultat = $baza->upit($sql);
  $zanrovi=[]; # prazna lista u kojoj ću pamtiti zanrove
  if ($rezultat->num_rows>0) {
    while ($zapis=$rezultat->fetch_assoc()) {
      $zanrovi[]=$zapis;
    }
  }
  
  $sql="SELECT id, naziv FROM izvodac ORDER BY naziv;";
  $rezultat = $baza->upit($sql);
  $izvodaci=[]; # prazna lista u kojoj ću pamtiti izvodace
  if ($rezultat->num_rows>0) {
    while ($zapis=$rezultat->fetch_assoc()) {
      $izvodaci[]=$zapis;
    }
  }


  $sql = "SELECT `id`, `naziv`, `tekst`, `slika`, `link`, `album_id`, `zanr_id`, `promjena` FROM `pjesma` WHERE id = ".$_GET["id"];
  $rezultat = $baza->upit($sql);
  $pjesma = $rezultat->fetch_assoc();

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

<div class="w3-container w3-white banner"> <h3> Uređivanje pjesme</h3> </div>
  
  <div class="w3-panel w3-border">
     <div class="boxcrud">

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="w3-container w3-white w3-mobile w3-padding-top">
      <input type="hidden" name="id" value="<?=$pjesma["id"] ?>">
      <div>
        <label  class="w3-text-black" for="naziv">Naziv:</label>
        <input class="w3-input w3-white " type="text" value="<?=$pjesma["naziv"] ?>" name="naziv" placeholder="Naziv pjesme" />
      </div>
      <div>
        <label  class="w3-text-black" for="textarea">Tekst:</label>
        <textarea class="w3-input w3-white " name="tekst" cols="30" rows="10" placeholder="Tekst pjesme"><?=$pjesma["tekst"] ?></textarea>
      </div>
      <div>
        <label  class="w3-text-black" for="slika">Slika:</label>
        <input class="w3-input w3-white" type="text" name="slika" value="<?=$pjesma["slika"] ?>" placeholder="Link na sliku izvođača" />
      </div>
      <div>
        <label class="w3-text-black" for="link">Link:</label>
        <input class="w3-input w3-white " type="text" name="link" value="<?=$pjesma["link"] ?>" placeholder="Linka na pjesmu" />
      </div>
      <div>
        <!-- dodavanje albuma preko padajuće liste -->
        <label class="w3-text-black" for="album">Album:</label>
        <select name="album">
          <?php foreach($albumi as $album): ?>
            <?php
            if($pjesma["album_id"] == $album["id"]){
              ?>
              <option value="<?php echo $album['id'];?>" selected><?php echo $album['naziv'];?></option>
              <?php
            }else{
              ?>
              <option value="<?php echo $album['id'];?>"><?php echo $album['naziv'];?></option>
              <?php
            }
            ?>
          <?php endforeach; ?>
        </select>
      </div>
      <div>
        <!-- dodavanje albuma preko padajuće liste -->
        <label  class="w3-text-black" for="zanr">Žanr:</label>
        <select name="zanr">
          <?php foreach($zanrovi as $zanr): ?>
            <?php
            if($pjesma["zanr_id"] == $zanr["id"]){
              ?>
              <option value="<?php echo $zanr['id'];?>" selected><?php echo $zanr['naziv'];?></option>
              <?php
            } else {
              ?>
              <option value="<?php echo $zanr['id'];?>"><?php echo $zanr['naziv'];?></option>
              <?php
            }
            ?>
          <?php endforeach; ?>
        </select>
      </div>
      <button  class="w3-button w3-green w3-margin-top" type="submit">Uredi</button>
    </form>
 
<br>
    </div>
</div>
</div>
<?php include("zajednicko/footer.php"); ?>