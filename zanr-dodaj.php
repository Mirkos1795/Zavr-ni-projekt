<?php 
session_start();
if(!isset($_SESSION) ||  $_SESSION['tipKorisnika'] !=1)  {
    header("location: index.php");
}


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once "zajednicko/baza.class.php";
    $baza = new Baza(); 

   

    if(isset($_POST["naziv"]) && isset($_POST["slika"]) && isset($_POST["opis"])){
        $naziv = urediUnos($_POST["naziv"]);
        $slika = urediUnos($_POST["slika"]);
        $opis = urediUnos($_POST["opis"]);
        

        $sql = "INSERT INTO zanr (naziv, slika, opis) VALUES ('$naziv', '$slika', '$opis')"; 

        $rezultat = $baza->insert($sql);

        if($rezultat > 0){
            header( "location: zanrovi.php");
        }else {
            echo "Dogodila se greška kod komunikacije s bazom!</br>";
        }
    } else {
        echo("Nisu popunjena sva polja!");
    }
}

function urediUnos($unos){
    $unos = trim($unos);
    $unos = stripslashes($unos);
    $unos = htmlspecialchars($unos);
    return $unos;
}

?>

<?php include("zajednicko/header.php"); ?>

<div class="w3-container w3-ios-yellow  banner"> <h3> Dodavanje novog žanra </h3> </div>
  
<div class="w3-panel w3-border">
   <div class="boxcrud">
        
        <form action="zanr-dodaj.php" <?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?> method="post" class="w3-container w3-white w3-mobile w3-padding-top">
                <div>
                <label class="w3-text-black" for="naziv">Naziv:</label>
                    <input class="w3-input w3-white" type="text" name="naziv" placeholder="Naziv žanra" pattern="[A-Za-z]+" title="Dopuštena su samo slova" required/>
                </div>
                <div>
                    <label class="w3-text-black" for="opis">Opis:</label>
                    <textarea  class="w3-input w3-white" name="opis" cols="30" rows="10" placeholder="Opis žanra"  pattern="^[a-zA-Z][a-zA-Z0-9-_.]{5,50}$" title="Dopušteno je od 6 do 50 znakova" required></textarea>
                </div>
                <div>
                    <label class="w3-text-black" for="slika">Slika:</label>
                    <input  class="w3-input w3-white" type="text" name="slika" placeholder="Link na sliku žanra" pattern="https?://.+" title="Potrebno je upisati ispravni URL" required/>
                </div>
            
                <button class="w3-button w3-green w3-margin-top" type="submit">Dodaj</button>
               
        </form>
        <br>
</div>
</div>
</div>

<?php include("zajednicko/footer.php"); ?>
