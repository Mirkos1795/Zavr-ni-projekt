<?php
session_start();
if(!isset($_SESSION) ||  $_SESSION['tipKorisnika'] !=2)  {
    header("location: index.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "zajednicko/baza.class.php";
    $baza = new Baza();
  
    if ($_POST) {
        extract($_POST);

        //1. provjeri ako se lozinke podudaraju
        if($lozinka == $lozinkaPonovi){
                $lozinkaHash = password_hash($lozinka, PASSWORD_DEFAULT);
                $sql = "UPDATE korisnik 
                        SET `email`='$email', `lozinka`='$lozinkaHash' WHERE id=".$_SESSION['id'];
                $rezultat = $baza->upit($sql);
                var_dump($rezultat);
                if($rezultat > 0){
                    header("Location: index.php");
                }
             }
            else {
                echo("Lozinke nisu iste!");
            }
        }
    }

?>

<?php include("zajednicko/header.php"); ?>

<div class="w3-container w3-white banner"> <h3> Uredi moj profil</h3> </div>
  
  <div class="w3-panel w3-border">
     <div>



<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="w3-container w3-white w3-center w3-mobile w3-padding-top">
    <div>
        <label class="w3-text-black w3-left" for="email1">Novi email:</label>
        <input class="w3-input w3-white" type="text1" name="email1" placeholder="Upiši novi email" />
    </div>
    <div>
        <label  class="w3-text-black w3-left" for="lozinka1">Nova lozinka:</label>
        <input class="w3-input w3-white" type="password1" name="lozinka1" placeholder=" Upiši novu lozinku" />
    </div>
    <div>
        <label class="w3-text-black w3-left"  for="lozinkaPonovi">Ponovi novu lozinku:</label>
        <input class="w3-input w3-white" type="password1" name="lozinkaPonovi" placeholder="Upiši ponovo novu lozinku" />
    </div>
    
    <button  class="w3-green w3-margin-top"   type="submit">Spremi promjene</button>
</form>
</div>
          </div>
          </div>


<?php include("zajednicko/footer.php"); ?>