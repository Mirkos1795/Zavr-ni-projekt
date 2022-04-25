<?php
session_start();
if(isset($_SESSION) && $_SESSION['tipKorisnika'] !=1)  {
    header("location: index.php");
}


require_once "zajednicko/baza.class.php";
$baza = new Baza();
$broj = 1;

$sql = "SELECT * FROM `log`";


$rezultat = $baza->upit($sql);

if ($rezultat->num_rows > 0) {
    $logovi = [];
    while ($red = $rezultat->fetch_assoc()) {
        $logovi[] = $red;
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

<div class="w3-bar w3-ios-yellow w3-center"> <h3>Zapisnik događaja</h3></div>


<div class="w3-container w3-responsive  w3-center w3-light-green">
    <table id="tablicazapisnik" class="w3-table-all  w3-center w3-mobile">
        <thead>
            <tr class=" w3-green  w3-mobile">
                <th>#</th>
                
                <th>Email korisnika</th>               
                <th>Događaj</th>
                <th>Vrijeme</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($logovi as $log) :  ?>
            <tr>
                <td>
                    <?php echo ($broj);
                    $broj++; ?>
                </td>
                
               

                <td>
                    <?php echo ($log["email"]); ?>
                </td>

                
                
                <td>
                    <?php echo ($log["dogadaj"]); ?>
                </td>

                <td>
                    <?php echo ($log["vrijeme"]); 
                    ?>
                </td>

                <?php 
                ?>
            </tr>
        <?php endforeach;  ?>
        </tbody>
    </table>
        </div>
        </div>

<?php include("zajednicko/footer.php"); ?>