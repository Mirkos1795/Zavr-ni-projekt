<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "zajednicko/baza.class.php";
    $baza = new Baza();
}
    if ($_POST) {
        extract($_POST);
        
        //var_dump($email);
        //var_dump($lozinka);
        //var_dump($lozinkaPonovi);

        //1. provjeri ako se lozinke podudaraju
        if($lozinka == $lozinkaPonovi){
             //2. provjeri ako email nije zauzet
             $sql = "SELECT * FROM `korisnik` WHERE email='$email';";
             $rezultat = $baza->upit($sql);
             if (mysqli_num_rows($rezultat) == 0){
                //3. opcionalno: hashirati lozinku
                // kasnije se provjerava sa password_verify($lozinka, $lozinkaHash)
                $lozinkaHash = password_hash($lozinka, PASSWORD_DEFAULT);
                //4. dodati korisnika u bazu
                $sql = "INSERT INTO `korisnik` (`ime`,`prezime`,`email`, `lozinka`, `tip_korisnika_id`) VALUES ('$ime','$prezime','$email', '$lozinkaHash', 2); ";
                $rezultat = $baza->insert($sql);

                if($rezultat > 0){
                    $sql = "INSERT INTO `log` (`ime`,`prezime`,`email`, `dogadaj`) VALUES ('$ime','$prezime','$email', 'Registracija korisnika'); ";
                    $rezultat = $baza->insert($sql);


                if($rezultat > 0){
                
                    header("Location: prijava.php");
                } else {
                    // odraditi obradu greske, problem kod unosa u bazu
                }
             } else {
                // odraditi obradu greske, kada korisnik vec postoji
                echo '<script type="text/JavaScript"> 
                        alert("Korisnik postoji!");
                      </script>';
             }


             //var_dump($sql); 
        } else {
            // odraditi obradu greske, kad se lozinke ne podudaraju
            echo("Lozinke nisu iste!");
        }
    }
}

?>

<?php include("zajednicko/header.php"); ?>

<script src="js/validacija.js"></script>


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



<body class="forma-stranica">
    <br>
    <br>

           

<div class="forma">

<div class="w3-container w3-center w3-green"> <h3> Registracija novog korisnika </h3></div>
<form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" name="forma" method="post" class="w3-container w3-ios-yellow  w3-mobile"   onsubmit="return provjeraPolja()">




    <input class="w3-input w3-center w3-margin-top" type="text"  name="ime" placeholder="Upiši ime"  id="ime" >


    <input class="w3-input w3-center w3-margin-top" type="text" name="prezime" placeholder="Upiši prezime" id="prezime" >




    <input class="w3-input w3-center w3-margin-top" type="email" name="email" placeholder="Upiši email" id="email"  >



    <input class="w3-input w3-center w3-margin-top" type="password"  name="lozinka" placeholder="Upiši lozinku" id="lozinka"  >


    <input class="w3-input w3-center w3-margin-top" type="password" name="lozinkaPonovi" placeholder="Ponovo upiši lozinku"  id="lozinkaPonovi"   >

        <div class="w3-container w3-center">
    <input class="w3-input w3-center w3-margin-top" type="checkbox" style="margin-top:10px" name="privola" id="privola"
        value="privola" required> <label class="w3-text-black"> Slažem se sa uvjetima korištenja.</label></div>


    <br>
    <br>
    <div class="w3-container w3-center">
        <button class=" w3-button  w3-green w3-center  w3-margin-bottom " type="submit">Registriraj se</button>
    </div>



</form>
</div>
<br>
<br>










<?php include("zajednicko/footer.php"); ?>