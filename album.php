<?php 
session_start();
if(!isset($_SESSION['email'])){
    header("location: index.php");
}
    require_once "zajednicko/baza.class.php";

    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $baza = new Baza();

        $sql = "SELECT * FROM album WHERE id=$id;";
        $rezultat = $baza->upit($sql);

        if(mysqli_num_rows($rezultat) == 1){
            $album = mysqli_fetch_assoc($rezultat);
            //var_dump($album);
        } else {
            $greska = "Taj album ne postoji!";
        }
    } else {
        header("location: izvodaci.php");
    }
?>

<?php include("zajednicko/header.php"); ?>


<section class="w3-container w3-padding-32">
<div class="w3-container w3-border w3-round w3-white w3-padding-16">
    <?php if(isset($greska)):?>
        <p><?php echo($greska) ?></p>
    <?php endif; ?>
    
    <?php if(isset($album)):?>
        <br>
        <br>
        <img  width="300px" src='<?php echo($album["slika"]); ?>' alt='<?php echo($album["naziv"]); ?>'>
        <hr class="hrlinija">
        <h1 class="naslov">Naziv albuma: <?php echo($album["naziv"]); ?></h1>
        <h2 class="naslov">Godina: <?php echo($album["godina"]); ?></h2>
        
    <?php endif; ?>
    </div>
    </section>
    </div>
<?php include("zajednicko/footer.php"); ?>
