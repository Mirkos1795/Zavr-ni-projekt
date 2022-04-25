<?php
session_start();
if(isset($_SESSION) && $_SESSION['tipKorisnika'] !=1)  {
    header("location: index.php");
}


require_once "zajednicko/baza.class.php";
$baza = new Baza();
$broj = 1;

$sql = "SELECT * FROM korisnik WHERE tip_korisnika_id !=1";


$rezultat = $baza->upit($sql);

if ($rezultat->num_rows > 0) {
    $korisnici = [];
    while ($red = $rezultat->fetch_assoc()) {
        $korisnici[] = $red;
    }
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
<div class="w3-bar w3-ios-yellow w3-center"> <h3> Svi korisnici</h3></div>


<div class="w3-container w3-responsive w3-round w3-light-green">
    <table id="tablicakorisnici" class="w3-table-all w3-hoverable">
        <thead>
            <tr class="w3-green">
                <th>#</th>
                <th>Ime</th> 
                <th>Prezime</th> 
                <th>Email</th>               
                <th>Lozinka</th>
                <th>Registriran</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($korisnici as $korisnik) :  ?>
            <tr>
                <td>
                    <?php echo ($broj);
                    $broj++; ?>
                </td>
                
                <td>
                    <?php echo ($korisnik["ime"]); ?>
                </td>

                <td>
                    <?php echo ($korisnik["prezime"]); ?>
                </td>

                <td>
                    <?php echo ($korisnik["email"]); ?>
                </td>

                
                
                <td>
                    <?php echo ($korisnik["lozinka"]); ?>
                </td>

                <td>
                    <?php echo ($korisnik["promjena"]); 
                    ?>
                </td>

                <?php 
                ?>
            </tr>
        <?php endforeach;  ?>
        <tbody>
    </table>
        </div>


<?php include("zajednicko/footer.php"); ?>