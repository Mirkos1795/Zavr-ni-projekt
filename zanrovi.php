<?php
session_start();
if(!isset($_SESSION['email'])){
    header("location: registracija.php");
}

require_once "zajednicko/baza.class.php";
$baza = new Baza();
$broj = 1;

$sql = "SELECT * FROM zanr";
$rezultat = $baza->upit($sql);

if (mysqli_num_rows($rezultat) > 0) {
    $zanrovi = [];
    while ($red = mysqli_fetch_assoc($rezultat)) {
        $zanrovi[] = $red;
    }
} else {
    echo "Dogodila se greška kod komunikacije s bazom!";
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
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-ios.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="css/style4.css">
</head>


<div class="w3-bar w3-ios-yellow w3-center"> <h3>Žanrovi</h3></div>

    <?php if(isset($_SESSION) && isset($_SESSION['tipKorisnika']) && $_SESSION['tipKorisnika'] ==1): ?>
    <div class="w3-bar w3-green"><a href="zanr-dodaj.php" class=" w3-button w3-bar-item w3-center w3-green"><i class='fa fa-file'></i> Dodaj novi žanr</a></div>

    <?php endif; ?>



<section class="w3-container">
   
<div class="w3-responsive">
    <table id="tablica" class="w3-table-all  w3-mobile w3-hoverable">
        <thead>
            <tr class="w3-green">
                <th>#</th>
                <th>Slika</th>
                <th>Naziv</th>
                <th>Opis</th>
                <th>Zadnja promjena</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($zanrovi as $zanr) :  ?>
            <tr>
                <td>
                    <?php echo ($broj);
                    $broj++; ?>
                </td>
                <td>
                    <img class="w3-round" width="100px" src="<?php echo ($zanr["slika"]); ?>"
                        alt="<?php echo ($zanr["naziv"]); ?>">
                </td>
                <td>
                    <?php echo ($zanr["naziv"]); ?>
                </td>
                <td>
                    <span><?php echo ($zanr["opis"]); ?></span>
                </td>
                <td>
                    <?php echo ($zanr["promjena"]); ?>
                </td>
                <td>
                    <a href="zanr.php?id=<?php echo ($zanr["id"]); ?>"><i class='fa fa-eye'></i></a> |
                    <?php if(isset($_SESSION) && isset($_SESSION['tipKorisnika']) && $_SESSION['tipKorisnika'] ==1): ?>
                    <a href="zanr-uredi.php?id=<?php echo ($zanr["id"]); ?>"><i class='fa fa-edit'></i></a> |
                    <a href="zanr-brisi.php?id=<?=$zanr["id"] ?>" class="delete" data-confirm="Da li ste sigurni da želite obrisati žanr?"><i class="fa fa-trash-alt"></i></a>
                    <?php endif; ?>
                </td>
                <?php //var_dump($zanr) 
                ?>
            </tr>
            <?php endforeach;  ?>
        <tbody>
    </table>
</section>
                    </div>
                   
<?php include("zajednicko/footer.php"); ?>

