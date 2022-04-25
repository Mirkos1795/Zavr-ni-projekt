<?php 
session_start();
if(!isset($_SESSION['email'])){
    header("location: index.php");
}
    require_once "zajednicko/baza.class.php";

    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $baza = new Baza();

        $sql = "SELECT * FROM izvodac WHERE id=$id;";
        $rezultat = $baza->upit($sql);

        if(mysqli_num_rows($rezultat) == 1){
            $izvodac = mysqli_fetch_assoc($rezultat);
            //var_dump($izvodac);
        } else {
            $greska = "Taj izvodac ne postoji!";
        }
    } else {
        header("location: izvodaci.php");
    }
?>

<?php include("zajednicko/header.php"); ?>


<section class="w3-container">
<br>
<br>
<div class="w3-container w3-border w3-white">
    <?php if(isset($greska)):?>
        <p><?php echo($greska) ?></p>
    <?php endif; ?>
    
    <?php if(isset($izvodac)):?>
        
        <img width="300px" src='<?php echo($izvodac["slika"]); ?>' alt='<?php echo($izvodac["naziv"]); ?>'>
        <h3 class="naslov">Naziv izvođača: <?php echo($izvodac["naziv"]); ?></h3>
        <h4 class="naslov">Biografija: <?php echo($izvodac["bio"]); ?></h4>
        
    <?php endif; ?>

</div>
</section>

<br>
<br>






<?php 

require_once "zajednicko/baza.class.php";
$baza = new Baza();
$broj = 1;



 $sql = "SELECT album.naziv AS albumNaziv, album.godina, album.slika, izvodac.naziv AS izvodacNaziv
         FROM izvodac
         JOIN izvodac_album
         ON izvodac.id = izvodac_album.izvodac_id
         JOIN album
         ON izvodac_album.album_id = album.id
         WHERE izvodac.id = $id;";



$rezultat = $baza->upit($sql);

if (mysqli_num_rows($rezultat) > 0) {
    $albumi = [];
    while ($red = mysqli_fetch_assoc($rezultat)) {
        $albumi[] = $red;
    }
    //var_dump($albumi);
} else {
    echo "Dogodila se greška kod komunikacije s bazom!";
}

?>  

<section class="w3-container">

    <div class="w3-container  w3-border w3-round w3-white w3-padding-16">
        <div class="w3-row w3-container">
        <?php if(isset($albumi)):
            foreach ($albumi as $album): ?>
            <div class="w3-container w3-quarter">
                <div class="w3-card w3-khaki">
                    <div class="slika-kontejner">
                    <img src="<?=$album["slika"] ?>" alt="<?=$album["albumNaziv"] ?>" width="100%">
        </div>
                <div class="w3-container w3-center">
                
                    <b><?=$album["albumNaziv"] ?></b>
                    <p><?=$album["godina"] ?></p>

                    </div>
                </div>
            </div>
            <?php endforeach; 
                else:  ?>
                 <div class="w3-panel w3-card w3-yellow">
                     <p>Nema albuma.</p>
                </div>
                <?php endif; ?>
        </div>
    </div>
    

</section>
                </div>





<?php

require_once "zajednicko/baza.class.php";
$baza = new Baza();
$broj = 1;



$sql = "SELECT pjesma.naziv as pjesmaNaziv, pjesma.trajanje, pjesma.ocjena, zanr.naziv as zanrNaziv, album.naziv as albumNaziv, izvodac.naziv as izvodacNaziv
        FROM izvodac 
        JOIN izvodac_album
        ON izvodac.id = izvodac_album.izvodac_id
        JOIN album
        ON izvodac_album.album_id = album.id
        JOIN pjesma
        ON pjesma.album_id = album.id
        JOIN zanr 
        ON pjesma.zanr_id = zanr.id
        WHERE izvodac.id = $id;";


$rezultat = $baza->upit($sql);

if ($rezultat->num_rows > 0) {
    $pjesme = [];
    while ($red = $rezultat->fetch_assoc()) {
        $pjesme[] = $red;
    }
}

?>
<br>
<br>

<div class="w3-container w3-responsive w3-border w3-round ">
<table id="tablica" class="w3-table-all w3-white w3-hoverable">
        <thead>
            <tr class="w3-green w3-center">
                <th>#</th>
                <th>Naziv pjesme</th>               
                <th>Trajanje pjesme</th>
                <th>Ocjena pjesme</th>
                <th>Žanr pjesme</th>
                <th>Album</th>

                
                
            </tr>
        </thead>
        <tbody>
        <?php foreach ($pjesme as $pjesma) :  ?>
            <tr>
                <td>
                    <?php echo ($broj);
                    $broj++; ?>
                </td>
                
                <td>
                    <?php echo ($pjesma["pjesmaNaziv"]); ?>
                </td>

                
                
                <td>
                    <?php echo ($pjesma["trajanje"]); ?>
                </td>

                <td>
                    <?php echo ($pjesma["ocjena"]); 
                    ?>
                </td>


                <td>
                    <?php echo ($pjesma["zanrNaziv"]); ?>
                </td>

                <td>
                    <?php echo ($pjesma["albumNaziv"]); ?>
                </td>


                <?php 
                ?>
            </tr>
        <?php endforeach;  ?>
        </tbody>
    </table>
        </div>

      

<?php include("zajednicko/footer.php"); ?>
