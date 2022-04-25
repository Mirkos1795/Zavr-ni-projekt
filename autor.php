<?php
session_start();

?>



<?php include("zajednicko/header.php"); ?>

<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Životopis</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
       <link rel="stylesheet" href="css/autor.css">
   

</head>


<body>
    
    <div class="container">
        <div class="lijeva-strana">
            <div class="profil">
                <div class="slika">
                    <img src="img/profilnaslika.jpg">
                </div>

                <h2 class="ime">Mirko Posavec<br><span>mag.geografije</span></h2>
            </div>
            <div class="kontakt">
                <h3 class="naslov"> Kontakt </h3>
                <ul>
                    <li>
                        <span class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                        <span class="tekst"> mirkoposavec03@gmail.com</span>
                    </li>
                    <li>
                        <span class="icon"><i class="fa fa-linkedin-square" aria-hidden="true"></i></span>
                        <span class="tekst"> mirko-posavec-a7060b132 </span>
                    </li>
                    <li>
                        <span class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                        <span class="tekst"> Matije Gupca 11,  Nedelišće </span>


                    </li>

                    <li>
                        <span class="icon"> <i class="fa fa-globe" aria-hidden="true"></i> </span>
                        <span class="tekst"> Hrvatska</span>
                    </li>

                    <li>
                        <span class="icon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                        <span class="tekst">+385 99 878 3321 </span>
                    </li>
                </ul>
            </div>
            <div class="obrazovanje">
                <h3 class="naslov"> Obrazovanje</h3>
                <ul>
                    <li>

                        <h5>PMF ZAGREB: geografski odsjek</h5>
                        <h6>2017. - 2019.</h6>
                        <h5>Geografski informacijski sustavi
                            <br>
                            - magistar geografije

                        </h5>
                    </li>

                    <li>
                        <h6>2014. - 2017.</h6>
                        <h5> Geografija; istraživački smjer <br>
                            - prvostupnik geografije

                        </h5>
                    </li>

                    <li>
                        <h5>Srednja škola Čakovec</h5>
                        <h6>2010. - 2014.</h6>
                        <h5> klasična gimnazija<br>
                        </h5>

                    </li>

                </ul>
            </div>


            <div class="jezici">
                <h3 class="naslov"> Jezici</h3>
                <ul>
                    <li>
                        <span class="tekst">Engleski</span>
                        <span class="udio">
                            <div style="width: 90%;"></div>
                        </span>

                    </li>

                    <li>
                        <span class="tekst">Njemački</span>
                        <span class="udio">
                            <div style="width: 70%;"></div>
                        </span>

                    </li>

                    <li>
                        <span class="tekst"> Španjolski</span>
                        <span class="udio">
                            <div style="width: 60%;"></div>
                        </span>

                    </li>
                </ul>
            </div>
        </div>

</section>


        <div class="desna-strana w3-cell-row">
            <div class="omeni">
                <h2 class="naslov2">O autoru</h2>
                <hr>
                <p>Kao geografa najviše me zanima primjena GIS-a u temama društvene geografije (politika, turizam,
                    kultura,
                    energetika, sigurnost, prostorno i regionalno planiranje), a kao programera izrada WEB aplikacija
                    različite namjene.</p>
                <hr>
            </div>


            <div class="omeni">

                <h2 class="naslov2">Radno iskustvo</h2>
                <div class="box1">
                    <div class="godina">
                        <hr>
                        <h5>2020. (studeni) - 2021. (kolovoz) | Turističko - ugostiteljska i prehrambena škola Bjelovar:
                        </h5>

                        <h4>nastavnik Geografije, Turističke geografije te Turističke geografije Hrvatske</h4>
                        <hr>
                        <h5>2020. (studeni) - 2021. (srpanj) | Medicinska škola Bjelovar: </h5>

                        <h4>nastavnik Geografije</h4>
                        <hr>
                    </div>
                </div>
            </div>


            <div class="vjestine">
                <h2 class="naslov2">Digitalne vještine</h2>
                <div class="box1">

                    <h4>Računalni programi</h4>
                    <h4>MS OFFICE | ArcGIS | QGIS | SPSS | VISUAL STUDIO CODE | XAMPP </h4>
                    <br>
                    <h4>Programski jezici i vještine</h4>
                    <h4> HTML | CSS | JAVASCRIPT| PHP | BAZE PODATAKA |SQL </h4>

                </div> 
                <hr>

<div class="hobi">
    <h2>Hobiji i interesi</h2>
    <ul>
        <li> <i class="fa fa-futbol-o" aria-hidden="true"></i> nogomet </li>
        <li> <i class="fa fa-bicycle" aria-hidden="true"></i> bicikliranje </li>
        <li> <i class="fa fa-film" aria-hidden="true"> </i>   filmovi i serije </li>
        <li> <i class="fa fa-gamepad" aria-hidden="true"></i> video igre</li>
        <li>  <i class="fa fa-headphones" aria-hidden="true"></i>  latinoamerička glazba  </li>
        <li> <i class="fa fa-plane" aria-hidden="true"></i>  putovanja </li>
    </ul>
</div>

    </div>
    </div>
</div>


</body>
</html>








<?php include("zajednicko/footer.php"); ?>
