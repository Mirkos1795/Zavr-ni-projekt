<?php session_start();

?>
<?php include('zajednicko/header.php'); ?>

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





   
        <div class="w3-bar w3-ios-yellow w3-center">
            <h3>Venegas Music club platforma  </h3>
            
        </div>
      
    

    










            <?php 
require_once "zajednicko/baza.class.php";
$baza = new Baza();
$broj = 1;



 $sql = "SELECT * FROM zanr  ORDER BY rang ASC  LIMIT 4";



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

<br>
<div class=" pocetna">


<div  class=" w3-bar  w3-ios-dark-blue w3-center"> <h3>Top žanrovi</h3></div>

            <section id="sekcijakategorijapocetna"  class="w3-container w3-mobile kutija">
            



                <div  id="kutijaredpocetna"class="w3-row w3-mobile   red">
                    <?php if(isset($zanrovi)):
            foreach ($zanrovi as $zanr): ?>
                    <div  id="kutijakarticapocetna" class="w3-container w3-mobile   w3-quarter">
                         <div id="karticapocetna" class="w3-card w3-mobile  kartica">
                            <div id="slikakarticapocetna" class="slikapocetna">
                                <img src="<?=$zanr["slika"] ?>" alt="<?=$zanr["naziv"] ?>" width="100%">
                            </div>
                            <div id="karticaelementi2" class="w3-container w3-mobile  w3-center">

                                <b><?=$zanr["naziv"] ?></b>



                            </div>
                        </div>
                    </div>
                    <?php endforeach; 
                else:  ?>
                    <div class="w3-panel w3-card w3-yellow">
                        <p>Nema žanra.</p>
                    </div>
                    <?php endif; ?>
                </div>
        </div>




    </div>

    </div>
    </section>


   









<?php 
require_once "zajednicko/baza.class.php";
$baza = new Baza();
$broj = 1;



 $sql = "SELECT * FROM izvodac ORDER BY rang ASC  LIMIT 4";



$rezultat = $baza->upit($sql);

if (mysqli_num_rows($rezultat) > 0) {
    $izvodaci = [];
    while ($red = mysqli_fetch_assoc($rezultat)) {
        $izvodaci[] = $red;
    }
} else {
    echo "Dogodila se greška kod komunikacije s bazom!";
}

?>

<div class=" pocetna">
 
<div class="w3-bar w3-ios-dark-blue w3-center"> <h3>Top izvođači</h3></div>
            <section id="sekcijakategorijapocetna"  class="w3-container w3-mobile   kutija">
            



                <div  id="kutijaredpocetna" class="w3-row w3-mobile  red">
                    <?php if(isset($izvodaci)):
            foreach ($izvodaci as $izvodac): ?>
                    <div   id="kutijakarticapocetna" class="w3-container w3-mobile  w3-quarter">
                        <div   id="karticapocetna" class="w3-card w3-mobile  kartica">
                            <div id="slikakartica2pocetna"  class="slikapocetna w3-mobile ">
                                <img src="<?=$izvodac["slika"] ?>" alt="<?=$izvodac["naziv"] ?>" width="100%">
                            </div>
                            <div   id="karticaelementi2" class="w3-container w3-mobile   w3-center">

                                <b><?=$izvodac["naziv"] ?></b>



                            </div>
                        </div>
                    </div>
                    <?php endforeach; 
                else:  ?>
                    <div class="w3-panel w3-card w3-yellow">
                        <p>Nema izvođača.</p>
                    </div>
                    <?php endif; ?>
                </div>
        </div>


    </div>

    </div>
    </section>
                



    

        <?php

require_once "zajednicko/baza.class.php";
$baza = new Baza();
$broj = 1;



$sql = "SELECT * FROM pjesma";


$rezultat = $baza->upit($sql);

if ($rezultat->num_rows > 0) {
    $pjesme = [];
    while ($red = $rezultat->fetch_assoc()) {
        $pjesme[] = $red;
    }
}

?>



 
 
            



            

                
 
        
    
        
<?php foreach ($pjesme as $pjesma):  ?>
           
           <?php endforeach;  ?>






        <?php 
require_once "zajednicko/baza.class.php";
$baza = new Baza();
$broj = 1;



 $sql = "SELECT * FROM pjesma ORDER BY ocjena DESC";



$rezultat = $baza->upit($sql);

if (mysqli_num_rows($rezultat) > 0) {
    $pjesme = [];
    while ($red = mysqli_fetch_assoc($rezultat)) {
        $pjesme[] = $red;
    }
} else {
    echo "Dogodila se greška kod komunikacije s bazom!";
}

?>

<div class=" pocetna">
 
<div class="w3-bar w3-ios-dark-blue w3-center"> <h3>Top pjesme</h3></div>
            <section id="sekcijakategorijapocetna2"  class="w3-container w3-mobile   kutija">
            
            


                <div  id="kutijaredpocetna2" class="w3-row  w3-mobile red">
                    <?php if(isset($pjesma)):
            foreach ($pjesme as $pjesma): ?>
                    <div   id="kutijakarticapocetna2" class="w3-container w3-large  w3-mobile  w3-quarter">
                        <div   id="karticapocetna2" class="w3-card w3-mobile  kartica">
                            <div id="slikakarticapocetna2"  class=" w3-mobile slikapocetna">
                                <img src="<?=$pjesma["slika"] ?>" alt="<?=$pjesma["naziv"] ?>" width="100%">
                            </div>
                            <div   id="karticaelementi23" class="w3-container w3-mobile   w3-center">

                                <b><?=$pjesma["naziv"] ?></b>
                                <br>
                               

                                

                            </div>
                        </div>
                    </div>
                    <?php endforeach; 
                else:  ?>
                    <div class="w3-panel w3-card w3-yellow">
                        <p>Nema  pjesama.</p>
                    </div>
                    <?php endif; ?>
                </div>
        </div>


    </div>

    </div>
    </section>




















    <?php include('zajednicko/footer.php'); ?>