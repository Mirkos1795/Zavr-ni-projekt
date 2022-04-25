<?php 
session_start();
if(!isset($_SESSION) || $_SESSION['tipKorisnika'] !=2)  {
    header("location: index.php");
}


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $id_playlista = $_POST['id'];
    $id_pjesme = $_POST['pjesma'];

    require_once "zajednicko/baza.class.php";
    $baza = new Baza(); 
    
    
    $sql = "INSERT INTO playlista_pjesma (playlista_ID, pjesma_ID) VALUES ('$id_playlista ','$id_pjesme')";

        $rezultat = $baza->insert($sql);

        if($rezultat > 0){
          $lokacija = "location: playlista-pregled.php?id=" . $id_playlista;
            header( $lokacija);
        }else {
            echo "Dogodila se greška kod komunikacije s bazom!</br>";
        }
    }

else{
  require_once "zajednicko/baza.class.php";
  $baza = new Baza();

  $sql="SELECT id, naziv FROM pjesma ORDER BY naziv;";
  $rezultat = $baza->upit($sql);
  $pjesme=[];
  if ($rezultat->num_rows>0) {
    while ($zapis=$rezultat->fetch_assoc()) {
      $pjesme[]=$zapis;
    }
  }
}

?>

<?php include("zajednicko/header.php"); ?>
<div class="w3-container w3-white banner"> <h3> Dodavanje nove pjesme u playlistu </h3> </div>
  
<div class="w3-panel w3-border">
     <div class="boxcrud">
   
       
        <form action="playlista-pjesma-dodaj.php"  <?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>   method="post" class="w3-container  w3-white w3-mobile w3-padding-top">
        <input type="hidden" name="id" value="<?=$_GET["id"] ?>">
        <label class="w3-text-black"  for="pjesma">Pjesma:</label>
        <select name="pjesma">
          <?php foreach($pjesme as $pjesma): ?>
            <option value="<?php echo $pjesma['id'];?>"><?php echo $pjesma['naziv'];?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div>
            
                <button type="submit">Dodaj</button>
        </form>
  <br>
    </div>
          </div>
          </div>

<?php include("zajednicko/footer.php"); ?>
