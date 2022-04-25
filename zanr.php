<?php 
session_start();
if(!isset($_SESSION['email'])){
    header("location: index.php");
}

    require_once "zajednicko/baza.class.php";

    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $baza = new Baza();

        $sql = "SELECT zanr.naziv, zanr.slika, zanr.opis, album.naziv AS albumNaziv, pjesma.naziv AS pjesmaNaziv
                FROM zanr
                LEFT JOIN pjesma
                ON zanr.id = pjesma.zanr_id
                LEFT JOIN album
                ON album.id = pjesma.album_id 
                WHERE zanr.id = $id;";
        $rezultat = $baza->upit($sql);
        
        if($rezultat->num_rows > 0){
            $podaci = []; 
            while ($red = $rezultat->fetch_assoc()) {
                $podaci[] = $red;
            }
            //var_dump($podaci);
        } else {
            $greska = "Taj žanr ne postoji!";
        }
    } else {
        header("location: zanrovi.php");
    }
?>

<?php include("zajednicko/header.php"); ?>


<section class="w3-container w3-padding-32">
<div class="w3-container w3-border w3-round w3-white w3-padding-16">
    <?php if(isset($greska)):?>
        <p><?php echo($greska) ?></p>
    <?php endif; ?>
    
    <?php if(isset($podaci)):?>
        <h1 class="naslov">Žanr: <?php echo($podaci[0]["naziv"]); ?></h1>
        <img width="300px" src='<?php echo($podaci[0]["slika"]); ?>' alt='<?php echo($podaci[0]["naziv"]); ?>'>
        <p><?php echo($podaci[0]["opis"]); ?></p>
        <h2 class="naslov">Pjesme: <?php 
            foreach ($podaci as $podatak){
                echo $podatak["pjesmaNaziv"] . ", "; 
                }
                ?>
        </h2>
        <h3 class="naslov">Album: <?php echo($podaci[0]["albumNaziv"]); ?></h3>
    <?php endif; ?>
    </section>
    </div>
<?php include("zajednicko/footer.php"); ?>
