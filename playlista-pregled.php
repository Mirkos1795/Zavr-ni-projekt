<?php 
session_start();
if(!isset($_SESSION['email'])){
    header("location: index.php");
}
    require_once "zajednicko/baza.class.php";

    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $baza = new Baza();

        $sql = "SELECT * FROM playlista WHERE id=$id;";
        $rezultat = $baza->upit($sql);

        if(mysqli_num_rows($rezultat) == 1){
            $playlista = mysqli_fetch_assoc($rezultat);
            //var_dump($izvodac);
        } else {
            $greska = "Ta playlista ne postoji!";
        }
    } else {
        header("location: playlista-pregled.php");
    }
?>

<?php include("zajednicko/header.php"); ?>

<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">


    <link rel="stylesheet" href="css/style3.css">

</head>

<section class="w3-container w3-padding-32">
<div class="w3-container w3-border w3-round w3-white w3-padding-16">


<div class="flex-container">



<?php if(isset($greska)):?>
<p><?php echo($greska) ?></p>
<?php endif; ?>

<?php if(isset($playlista)):?>

<div class="element1">
<img class="slika" width="150px" src='<?php echo($playlista["slika"]); ?>'
            alt='<?php echo($playlista["naziv"]); ?>'>
        
    
        <h3 class="naslov"><?php echo($playlista["naziv"]); ?></h3>
        
        <?php endif; ?>
</div>




  

  <div class="element3"> 
      
 <?php if(isset($_SESSION) && $_SESSION['tipKorisnika'] ==2): ?>



    

<a href="playlista-pjesma-dodaj.php?id=<?=$playlista["id"] ?>" class="  button w3-button w3-red w3-right"> <i class="fa fa-file"></i> Dodaj pjesmu u playlistu</a>

    <?php endif; ?>
</div>
  </div>

   
       


   
  
    
    









<?php





require_once "zajednicko/baza.class.php";
$baza = new Baza();
$broj = 1;

$sql = "SELECT pjesma.naziv AS nazivPjesma, pjesma.trajanje AS trajanjePjesma, pjesma.ocjena AS ocjenaPjesma, playlista.naziv AS nazivPlaylista, korisnik.email AS korisnik
        FROM playlista 
        JOIN playlista_pjesma
        ON playlista.id = playlista_pjesma.playlista_ID
        JOIN pjesma
        ON playlista_pjesma.pjesma_ID = pjesma.id
        JOIN korisnik
        ON playlista.korisnik_id = korisnik.id
        WHERE playlista.id = $id;";


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


<?php if(!empty($pjesme)):?>
    <div class="w3-container w3-border w3-round w3-light-green">
        <table id="table" class="w3-table-all w3-hoverable">
            <thead>
                <tr class="w3-green">
                    <th>#</th>
                    <th>Naziv pjesme</th>
                    <th>Trajanje pjesme</th>
                    <th>Ocjena pjesme</th>
                    <th> Korisnik</th>
                 
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
                        <?php echo ($pjesma["nazivPjesma"]); ?>
                    </td>

                    <td>
                        <?php echo ($pjesma["trajanjePjesma"]); ?>
                    </td>

                    <td>
                        <?php echo ($pjesma["ocjenaPjesma"]); 
                    ?>
                    </td>

                    <td>
                        <?php echo ($pjesma["korisnik"]); 
                    ?>
                    </td>
                    
                   

                    

                   
                </tr>
                <?php endforeach;  ?>
            <tbody>
        </table>
    </div>


    <?php else:?>
        <div>
            <p>Playlista je prazna.</p>
        </div>

<?php endif; ?>
</div>
    </section>
    </div>

<?php include("zajednicko/footer.php"); ?>