<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "zajednicko/baza.class.php";
    $baza = new Baza();
}
    if ($_POST) {
        extract($_POST);

        if(empty($email) || empty($lozinka)) {
            echo("Nisu popunjena sva polja!");
        } else {
            $sql = "SELECT * FROM `korisnik` WHERE email='$email';";
            $rezultat = $baza->upit($sql);
            if (mysqli_num_rows($rezultat) == 1){
                $korisnik = mysqli_fetch_assoc($rezultat);
                if(password_verify($lozinka, $korisnik["lozinka"])){
                    $_SESSION['email'] = $korisnik['email'];
                    $_SESSION['id'] = $korisnik['id'];
                    $_SESSION['tipKorisnika'] = $korisnik['tip_korisnika_id'];
                    
                    $_SESSION['prijavljen'] = true;

                    $sql = "INSERT INTO `log` (`email`, `dogadaj`) VALUES ('$email', 'Prijava korisnika'); ";
                    $rezultat = $baza->insert($sql);

                    if($rezultat > 0){
                    header("Location: index.php");
                } else {
                    echo("Pogrešna lozinka!");
                }
            }
        }
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">


   

</head>


<br>

<body class="forma-stranica">


<div class="forma">
  
<div class="w3-container w3-center w3-green"> <h3> Prijava korisnika </h3> </div>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="w3-container w3-ios-yellow  w3-mobile ">
    
  

    <input  class=" w3-input w3-center w3-margin-top" type="email" id="email" name="email" placeholder="Upiši email adresu" >

    
    <input  class=" w3-input  w3-center w3-margin-top"   type="password" id="lozinka" name="lozinka" placeholder="Upiši lozinku">

<br>
<br>
<div class="w3-container w3-center">
<button  class=" w3-button  w3-green w3-center  w3-margin-bottom " type="submit">Prijavi se</button></div>


  </form>
</div>
</div>
</div>
</div>
<br>
<br>









<?php include("zajednicko/footer.php"); ?>