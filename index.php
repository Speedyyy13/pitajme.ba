<?php
session_start();
require_once "php/config.php";
require_once "php/config2.php";
require_once "php/pageview.php";
require_once "php/find.php";
require_once "php/contactsendmail.php";

?>

<!DOCTYPE html>
<html lang="hr" class="js">
<head>
  <meta charset="utf-8">
  <meta name="description" content="Prvi BH online index proizvoda i usluga!">
  <meta name="keywords" content="pitaj, pitajMe, BH index">
  <meta name="author" content="Tim pitajMe.ba">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <link rel="stylesheet" href="<?php echo $css; ?>">
  <link rel="stylesheet" href="css/styleindexhf.css">
  <link rel="stylesheet" href="css/objavepagination.css">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script type="text/javascript">
    var findrez = <?php echo $findrez; ?>
  </script>
  <script src="js/deskmob.js"></script>
  <script src="js/slider.js"></script>

  <title>pitajMe.ba-Prvi BH online index proizvoda i usluga</title>

</head>
<body class="grid1">
   <!--HEADER -->
   <header class="head header">
    <h1 style="display:none;">pitajMe.ba</h1>

    <!--NAVIGACIJSKI MENI-->
      <!--NAVIGACIJA ZA DESKTOP-->
      <div class="logo-mobile">
        <a href="http://www.pitajme.ba"><img class="logo-img" src="img/logozacrnjen.png" alt=""></a>
      </div>
    <nav class="pozicija">
        <!-- <div id="indikator" class=""></div> -->
          <div class="hamburger" id="mobile-menu">
              <span class="bar"></span>
              <span class="bar"></span>
              <span class="bar"></span>
          </div>
          <ul class="nav-links">
              
              <li class="prvi"><a class="gk selected" href="home" >HOME</a></li>    
              <li class="drugi"><a href="360.php" class="gk"><b>3 6 0 °</b></a></li>
              <li class="treci desk"><a class="gk" href="ogls">OGLASI</a></li>
              <li class="cetvrti desk"><a class="gk" href="nekretnine.php">NEKRETNINE</a></li>
              <li class="peti desk"><a class="gk" href="uslg">USLUGE</a></li>
              <li class="sesti desk"><a class="gk" href="kont">KONTAKT</a></li>
              <!-- <div class="dropdown">
                <button class="gk btn">VIŠE
                  <i class="fa fa-caret-down"></i>
                </button>
                <ul class="submenu">
                  <li><a class="lk" href="ogls">Oglasi</a></li>
                  <li><a class="lk" href="nekretnine.php">Nekretnine</a></li>
                  <li><a class="lk" href="uslg">Usluge</a></li>
                  <li><a class="lk" href="kont">Kontakt</a></li>
                  <li><a class="lk" href="prij">Prijavi se</a></li>
                </ul>
              </div> -->
              <div class="dropdown">
                <button class="gk btn subnavbtn">VIŠE <i class="fa fa-caret-down"></i></button>
                <div class="subnav-content">
                  <a class="lk" href="ogls">Oglasi</a>
                  <a class="lk" href="nekretnine.php">Nekretnine</a>
                  <a class="lk" href="uslg">Usluge</a>
                  <a class="lk" href="kont">Kontakt</a>
                  <a class="lk" href="prij">Prijavi se</a>
                </div>
              </div> 
              <li class="sedmi"><a class="gk" href="regig">REGISTRACIJA</a></li>
              <li style="border-top:1px solid white" class="desk"><a href="prij" class="gk peti lista-btnprijava"><?php if(isset($_SESSION["emaillogin"])){ echo $_SESSION["emaillogin"];}else{echo "PRIJAVI SE";} ?></a>
              </li>
          </ul>
        </nav>

        <!-- <script src="js/indikator.js"></script> -->
        <script src="js/toggle.js"></script>
      <!--NAVIGACIJA ZA MOBILNU VERZIJU
        <div id="mobilnimeni">
            <nav>
              <ul>
                <li>
                <span>Meni</span>
                  <ul>
                    <li><a href="home" >Home</a></li>
                    <li><a href="ogls" >Oglasi</a></li>
                    <li><a href="uslg" >Usluge</a></li>
                    <li><a href="nekretnine.php" >Nekretnine</a></li>
                    <li><a href="kont" >Kontakt</a></li>
                    <li><a href="prij" >Prijavi se</a></li>
                    <li><a href="regi" >Registruj se</a></li>
                  </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>-->
      <!--FB INSTA-->
      <div class="fbinsta">
        <a href="https://www.facebook.com/www.pitajme.ba/" target="_blank"><img src="ico/facebook.png" alt="facebook"></a>
        <a href="https://www.instagram.com/pitajme.ba/" target="_blank"><img src="ico/instagram.png" alt="instagram"></a>
      </div>

            <!--ONLINE STATUS-->
      <div class="online" >
        <p <?php echo $showOnline ?>>online kor.: <?php echo $numonlinevisitor; ?></p>
        <p <?php echo $showOnline ?>>regist. kor.: <?php echo $numregister; ?></p>
      </div>
      <!--LOGIN-->
      <div class="logiranje">
      <a href="prij"><?php if(isset($_SESSION["emaillogin"])){ echo $_SESSION["emaillogin"];}else{echo "Prijavi se";} ?></a>
        <!--<button onclick="document.getElementById('id01').style.display='block'"><img src="ico/login.png" alt=""><span>Prijava</span></button>-->

      </div>
      <div class="search">
        <img src="ico/pretraganew.png" alt="" onclick="openSearch()">
      </div>
      <div class="sidemenimobile">
        <img src="ico/meninew.png"  onclick="openNavmobile()">
      </div>

  </header>
    <script src="js/mobilemeni.js" charset="utf-8"></script>
  <!--Kraj Headera-->
      <!--Baner i pretrazivanje-->
      <div class="baner">
  <!--LOGO SLIKA-->
        <div class="logo">
          <a href="http://www.pitajme.ba"><img class="logo-img" src="img/logozacrnjen.png" alt=""></a>
        </div>
        <div class="glavnareklama">
          <div id="slider">
            <?php include "slajdovi.php"; ?>
          </div>
          <script type="text/javascript">
                  sliderDeskMob();
                  sliderRun();
          </script>
        </div>
        <!--FORMA-->
        <div id="myOverlaysearch" class="forma overlaysearch">
          <span class="closebtnsearch" onclick="closeSearch()" title="Close Overlay">x</span>
          <div class="overlay-contentsearch">
            <form method="post" class="form1" id="form1">
                <div class="gps" onclick="changeGps()">
                    <span class="gpsopis" id="gpsopis">Prikaz vaše lokacije !</span>
                    <img src="ico/man6.png" alt="" class="gps-img" id="gpsimg">
                </div>
              <div class="podrucje">
                <!--GRADOVI-->
                <input type="text" name="visitorlant" id="visitorlant" hidden value="<?php echo $visitorlant; ?>">
                <input type="text" name="visitorlong" id="visitorlong" hidden value="<?php echo $visitorlong; ?>">
                <select class="grad" name="grad" id="grad" onchange="onchangeGrad()" class="polje-podrucje" placeholder="Izaberite grad...">
                    <option class=""><?php echo $grad; ?></option>
                    <?php while($rowg=mysqli_fetch_array($resultg)):;?>
                    <option class="form-control" value="<?php echo $rowg[1];?>"><?php echo $rowg[1];?></option>
                    <?php endwhile;?>
                </select>

              </div>
              <script type="text/javascript">
                var izG = <?php echo $izG; ?>;
              </script>
                <!--PRETRAZIVANJE-->
              <div class="trazi">
                <input type="text" class="polje-trazi" id="poljetrazi" name="polje-trazi" placeholder="Unesite pojam koji želite tražiti...">
              </div>
              <div class="trazibutton">
                <button type="button" class="btn-trazi" onclick="traziHome()" name="btn-trazi" value="pitajMe">pitajMe</button>
              </div>
            </form>
        </div>
      </div>
      <script src="js/searchmodal.js" charset="utf-8"></script>
      <!--KRAJ FORME-->
  </div>
  <!--Kraj baner pretrzivanje-->
    <!--LIJEVA STRANA-->
  <!--<div class="leftsidebarindex">-->

      <!--KATEGORIJE-->
    <!--<nav class="navigacijakategorija">
      <ul>
        <li>
          <span class="kategorija">Kategorije</span>
          <ul>
            <li><a onclick="subIndex('proizvodnja')">Proizvodnja</a></li>
            <li><a onclick="subIndex('trgovina')">Trgovina</a></li>
            <li><a onclick="subIndex('usluge')">Usluge</a></li>
            <li><a onclick="subIndex('državne')">Drzavne institucije</a></li>
            <li><a onclick="subIndex('vjerske')">Vjerske institucije</a></li>
            <li><a onclick="subIndex('kulturne')">Kulturne znamenitosti</a></li>
            <li><a onclick="subIndex('prirodne')">Prirodne ljepote</a></li>
            <li><a onclick="subIndex('sport')">Sport</a></li>
          </ul>
        </li>
      </ul>
    </nav>-->

      <!--BRZIMENI-->
    <!--<div id="brzi">
      <ul>
        <li><a onclick="subIndex('hotel motel hostel')">Hoteli</a></li>
        <li><a onclick="subIndex('restoran')">Restorani</a></li>
        <li><a onclick="subIndex('autoservis')">Autoservis</a></li>
        <li><a onclick="subIndex('vulkanizer')">Vulkanizer</a></li>
        <li><a onclick="subIndex('taxi')">Taxi</a></li>
        <li><a onclick="subIndex('apoteka')">Apoteke</a></li>
        <li><a onclick="subIndex('policija')">Policija</a></li>
        <li><a onclick="subIndex('hitna')">Hitna pomoc</a></li>
      </ul>
    </div>-->

      <!--OGLASI-->

  <!--</div>-->

      <br>
    </div>

    <!--SADRZAJ-->
  <div class="mainpart">

    <div class="listamapa">
      <button class="btn-listamapa" id="hide">Lista</button>
      <button class="btn-listamapa" id="show">Mapa</button>
    </div>

    <div class="okvirminikategorija" id="minikategorija">
      <div class="mini-nemarezultata" id="mini-nemarezultata">
        <p>Nema rezultata za unešeni pojam. U toku je popunjavanje naše baze podataka.</p>
      </div>
      <div class="minikategorije1" id="minikat">
        <div class="prviredkategorija">
          <div class="redoslijed1">
          <a href="nekretnine.php"><div class="opisslike"><img src="ico/nekretnine.png" alt=""></div></a>
          <a onclick="traziKategorije(12)"><div class="opisslike"><img src="ico/restorani.png" alt=""></div></a>
          <a onclick="traziKategorije(9)"><div class="opisslike"><img src="ico/EXCLUSIVE.png" alt=""></div></a>
          <a onclick="traziKategorije(14)"><div class="opisslike"><img src="ico/GYM.png" alt=""></div></a>
          <a onclick="traziKategorije(15)"><div class="opisslike"><img src="ico/automehanicari.png" alt=""></div></a>
          <a href="#"><div class="opisslike"><img src="ico/hamburger.png" alt="" onclick="openkategorije()"></div></a>
          <!--<a onclick="traziKategorije(12)">Restorani</a>
          <a onclick="traziKategorije(13)">Kafići</a>
          <a onclick="traziKategorije(9)">Exclusive</a>
          <a onclick="traziKategorije(14)">Fitness</a>
          <a onclick="traziKategorije(4)">Javne ustanove</a>
          <a onclick="traziKategorije(15)">Automehaničari</a>-->
        </div>
      </div>

      <div id="mykategorije" class="overlaykategorije">
          <!-- Button to close the overlay navigation -->
          <a href="javascript:void(0)" class="closebtn" onclick="closekategorije()">&times;</a>
        <!-- Overlay content -->
          <div class="overlay-contentkategorije">
            <ul>
              <li><a onclick="traziKategorije(9)"><img src="ico/miniexclusive.png" style="height:38px; width: 38px; margin-bottom:-7px;" alt=""> Exclusive</a></li>
              <li><a onclick="traziKategorije(10)"><img src="ico/minihotel.png" style="height:38px; width: 38px; margin-bottom:-7px;" alt=""> Hoteli</a></li>
              <li><a onclick="traziKategorije(11)"><img src="ico/miniklub.png" style="height:38px; width: 38px; margin-bottom:-7px;" alt=""> Klubovi</a></li>
              <li><a onclick="traziKategorije(12)"><img src="ico/minirestoran.png" style="height:38px; width: 38px; margin-bottom:-7px;" alt=""> Restorani</a></li>
              <li><a onclick="traziKategorije(13)"><img src="ico/minikafic.png" style="height:38px; width: 38px; margin-bottom:-7px;" alt=""> Kafići</a></li>
              <li><a onclick="traziKategorije(14)"><img src="ico/minifitness.png" style="height:38px; width: 38px; margin-bottom:-7px;" alt="">Fitnes</a></li>
              <li><a onclick="traziKategorije(1)"><img src="ico/minifabrika.png" style="height:38px; width: 38px; margin-bottom:-7px;" alt=""> Proizvodnja</a></li>
              <li><a onclick="traziKategorije(4)"><img src="ico/miniustanove.png" style="height:38px; width: 38px; margin-bottom:-7px;" alt=""> Državne institucije</a></li>
              <li><a onclick="traziKategorije(15)"><img src="ico/minivulkanizer.png" style="height:38px; width: 38px; margin-bottom:-7px;" alt=""> Autoservis / Vulkanizer</a></li>
              <li><a onclick="traziKategorije(16)"><img src="ico/miniapoteka.png" style="height:38px; width: 38px; margin-bottom:-7px;" alt=""> Apoteke / Ljekarne</a></li>
              <li><a onclick="traziKategorije(17)"><img src="ico/minifastfood.png" style="height:38px; width: 38px; margin-bottom:-7px;" alt=""> Fastfood</a></li>
              <li><a onclick="traziKategorije(18)"><img src="ico/miniodijevanje.png" style="height:38px; width: 38px; margin-bottom:-7px;" alt="">Odijevanje</a></li>
              <li><a onclick="traziKategorije(2)"><img src="ico/minitrgovina.png" style="height:38px; width: 38px; margin-bottom:-7px;" alt=""> Trgovina</a></li>
              <li><a onclick="traziKategorije(19)"><img src="ico/minifrizer.png" style="height:38px; width: 38px; margin-bottom:-7px;" alt=""> Salon ljepote</a></li>
              <li><a onclick="traziKategorije(20)"><img src="ico/miniprijevoz.png" style="height:38px; width: 38px; margin-bottom:-7px;" alt=""> Prijevoz</a></li>
              <li><a onclick="traziKategorije(6)"><img src="ico/minispomenici.png" style="height:38px; width: 38px; margin-bottom:-7px;" alt=""> Kulturni spomenici,prirodne ljepote</a></li>
              <li><a onclick="traziKategorije(21)"><img src="ico/mininakit.png" style="height:38px; width: 38px; margin-bottom:-7px;" alt=""> Nakit/parfemi</a></li>
              <li><a onclick="traziKategorije(22)"><img src="ico/minisvijetzivotinja.png" style="height:38px; width: 38px; margin-bottom:-7px;" alt=""> Svijet životinja</a></li>
              <li><a onclick="traziKategorije(23)"><img src="ico/minielektromaterijal.png" style="height:38px; width: 38px; margin-bottom:-7px;" alt=""> Elektromaterijal Vodomaterijal</a></li>
              <li><a onclick="traziKategorije(24)"><img src="ico/minitehnika.png" style="height:38px; width: 38px; margin-bottom:-7px;" alt=""> Tehnika</a></li>
              <li><a onclick="traziKategorije(25)"><img src="ico/minimajstori.png" style="height:38px; width: 38px; margin-bottom:-7px;" alt=""> Majstori</a></li>
              <li><a onclick="traziKategorije(3)"><img src="ico/miniusluge.png" style="height:38px; width: 38px; margin-bottom:-7px;" alt=""> Usluge</a></li>
              <li><a onclick="traziKategorije(8)"><img src="ico/minisport.png" style="height:38px; width: 38px; margin-bottom:-7px;" alt=""> Sport</a></li>
              <li><a onclick="traziKategorije(26)"><img src="ico/minipizzeria.png" style="height:38px; width: 38px; margin-bottom:-7px;" alt=""> Pizzeria</a></li>
              <li><a onclick="traziKategorije(27)"><img src="ico/miniautodijelovi.png" style="height:38px; width: 38px; margin-bottom:-7px;" alt=""> Autodijelovi</a></li>
              <li><a onclick="traziKategorije(28)"><img src="ico/minipekare.png" style="height:38px; width: 38px; margin-bottom:-7px;" alt=""> Pekare</a></li>
            </ul>
            <br>
          </div>
        </div>
      <script src="js/mobilekategorije.js" charset="utf-8"></script>
    </div>
  </div>
    <div id="lista" class="listcontent">


      <div class="objavepgnup" id="pgnpmeny">
				<nav class="navpgn">
					<ul class="ulpgn">
				    <li>
				      <a href="index.php?page=<?= $Previous; ?>&grad=<?php echo $grad ?>&poljetrazi=<?php echo $poljeTrazi1; ?>&kategorija=<?php echo $izbkategorija; ?>" aria-label="Previous">
				        <span aria-hidden="true">&laquo;Prethodna</span>
				      </a>
				    </li>
				    <?php for($i = 1; $i<= $pages; $i++) : ?>
              <?php
              $first = $page - 4;
              $last = $page + 3;

              if($i == $first){
                $hideli = "style='display: none'";
                $hidedot = "";
              }elseif($i < $first){
                $hideli = "style='display: none'";
                $hidedot = "style='display: none'";
              }elseif($i == $last){
                $hideli = "style='display: none'";
                $hidedot = "";
              }elseif($i > $last){
                $hideli = "style='display: none'";
                $hidedot = "style='display: none'";
              }else{
                $hideli = "";
                $hidedot = "style='display: none'";
              }

              ?>
              <li <?php echo $hidedot;?>>...</li>
				    	<li <?php echo $hideli;?>><a href="index.php?page=<?= $i; ?>&grad=<?php echo $grad ?>&poljetrazi=<?php echo $poljeTrazi1; ?>&kategorija=<?php echo $izbkategorija; ?>" <?php if($i == $page){echo "style='border-radius: 10px;
                  background-color: #2e2e2e;
                  color: #ffa300;'";}else{echo "style='border: none;'";} ?>><?= $i; ?></a></li>
				    <?php endfor; ?>
				    <li>
				      <a href="index.php?page=<?= $Next; ?>&grad=<?php echo $grad ?>&poljetrazi=<?php echo $poljeTrazi1; ?>&kategorija=<?php echo $izbkategorija; ?>" aria-label="Next">
				        <span aria-hidden="true">Sljedeća&raquo;</span>
				      </a>
				    </li>
				  </ul>
				</nav>
        <p>Pronađeno rezultata: <span class="total"><?php echo $total; ?></span></p>
			</div>
      <div class="okvirrezultata">
        <div class="flexrezultat">
        <?php
          //echo $test11;
          if($countobjave > 0){
            while($rowfind=mysqli_fetch_assoc($Objfindresult)){

              $findResultarray[] = $rowfind;
              $IDobjave = $rowfind['ID'];
              $prafiz = $rowfind['pravnofizicko'];
              $IDpaid = $rowfind['IDpaid'];


              if($prafiz == 2){
                $naslovColor = "style='color: lightgreen;'";
                $prav = ' (fizičko lice)';
              }elseif($prafiz == 1){
                $naslovColor = "style='color: rgb(3,219,226);'";
                $prav = ' (pravno lice)';
              }elseif($prafiz == 3){
                $naslovColor = "style='color: rgb(3,219,226);'";
                $prav = ' (pravno lice/company)';
              }

              if($IDpaid > 0){
                $sponzor = "";
              }else{
                $sponzor = "hidden";
              }
        ?>
            <!--REZULTAT PRETRAZIVANJA-->
          <div class="findresult" onclick="onClick('<?php echo $rowfind['ID']; ?>','<?php echo $rowfind['IDkategorije']; ?>', '<?php echo $prafiz; ?>')">


              <!--DETALJNO-->


            <div class="divzaslike">
            <?php

              $sqlslike = "SELECT * FROM userimage WHERE IDobjave='$IDobjave' ORDER BY IDimage ASC";
              $rezultatslike = mysqli_query($link, $sqlslike);
              $resultnumrowsslike = mysqli_num_rows($rezultatslike);

              if($resultnumrowsslike > 0){

              $rowsl = mysqli_fetch_array($rezultatslike);
              $FileName1 = $rowsl['FileName'];
              $FileNameSmall = $rowsl['FileNameSmall'];
              $IDimage1 = $rowsl['IDimage'];


                echo "
                <div class='fitimg' style='background-image: url({$FileNameSmall});'>
                </div>
                ";
              }
              ?>
            </div>
            <!--ZVJEZDICE-->

              <!--OPIS-->
              <div class="donji-dio">
                <span class="kategorijaspan"><?php echo $rowfind['nazivkategorije']; ?></span>
                <p class="findresult-naslovnp" <?php echo $naslovColor; ?>name="naslov" id="naslov1" readonly value=""><?php echo $rowfind['naslov']; ?><span style="color: rgb(189,192,192);font-size: 12px;">  <?php echo $prav; ?></span></p>

                <input type="text" name="rate" hidden value="<?php echo $rowfind['rate']?>">
                <div class="rateobj" style="color: grey;">
                  <i class="fa fa-star fa-2x" name="zvj1" <?php if($rowfind['rate'] < 1){ echo 'style="color: grey;"';}else{ echo 'style="color: green;"';} ?>></i>
                  <i class="fa fa-star fa-2x" name="zvj2" <?php if($rowfind['rate'] < 2){ echo 'style="color: grey;"';}else{ echo 'style="color: green;"';} ?>></i>
                  <i class="fa fa-star fa-2x" name="zvj3" <?php if($rowfind['rate'] < 3){ echo 'style="color: grey;"';}else{ echo 'style="color: green;"';} ?>></i>
                  <i class="fa fa-star fa-2x" name="zvj4" <?php if($rowfind['rate'] < 4){ echo 'style="color: grey;"';}else{ echo 'style="color: green;"';} ?>></i>
                  <i class="fa fa-star fa-2x" name="zvj5" <?php if($rowfind['rate'] < 5){ echo 'style="color: grey;"';}else{ echo 'style="color: green;"';} ?>></i>
                </div>
                <div class="sponzorisani" <?php echo $sponzor; ?>>
                  <span>SPONZORISANO</span>
                </div>
                <p name="podatci" class="findresult-1linijanp" readonly value=""><?php echo $rowfind['grad'].", ".$rowfind['adresa']; ?></p><!--.",<br> ".$rowfind['tel'].",<br> ".$rowfind['email'].", ".$rowfind['web']-->
                <p name="opis" class="findresult-2linijanp" readonly value=""><?php echo $rowfind['kljuc']; ?></p>
              </div>

            </div>



        <?php
          }
            }else{

            $markers = 0;

          }
          if(isset($findResultarray)){
          $markers = json_encode($findResultarray);
          //print_r($markers);
          }

          if(isset($ArrayPj1)){
          $markersPj1 = json_encode($ArrayPj1);
          //print_r($markers);
        }else{
          $markersPj1 = 0;
        }

        ?>


        <script type="text/javascript">
          var array1 = <?php echo $markers; ?>;
          var array2 = <?php echo $markersPj1; ?>;

          //onchangeGrad();

        </script>

        <!--<script type="text/javascript" src="js/starindex.js"></script>-->
      </div>
      </div>
        <div class="objavepgndwn" id="pgnpmeny1">
  				<nav class="navpgn">
  					<ul class="ulpgn">
  				    <li>
  				      <a href="index.php?page=<?= $Previous; ?>&grad=<?php echo $grad ?>&poljetrazi=<?php echo $poljeTrazi1; ?>" aria-label="Previous">
  				        <span aria-hidden="true">&laquo; Prethodna</span>
  				      </a>
  				    </li>
  				    <?php for($i = 1; $i<= $pages; $i++) : ?>

                <?php
                $first = $page - 4;
                $last = $page + 3;

                if($i == $first){
                  $hideli = "style='display: none'";
                  $hidedot = "";
                }elseif($i < $first){
                  $hideli = "style='display: none'";
                  $hidedot = "style='display: none'";
                }elseif($i == $last){
                  $hideli = "style='display: none'";
                  $hidedot = "";
                }elseif($i > $last){
                  $hideli = "style='display: none'";
                  $hidedot = "style='display: none'";
                }else{
                  $hideli = "";
                  $hidedot = "style='display: none'";
                }

                ?>
                <li <?php echo $hidedot; ?>>...</li>

  				    	<li <?php echo $hideli; ?>><a href="index.php?page=<?= $i; ?>&grad=<?php echo $grad ?>&poljetrazi=<?php echo $poljeTrazi1; ?>" <?php if($i == $page){echo "style='border-radius: 10px;
                      background-color: #2e2e2e;

                      color: #ffa300;'";}else{echo "style='border: none;'";} ?>><?= $i; ?></a></li>
  				    <?php endfor; ?>
  				    <li>
  				      <a href="index.php?page=<?= $Next; ?>&grad=<?php echo $grad ?>&poljetrazi=<?php echo $poljeTrazi1; ?>" aria-label="Next">
  				        <span aria-hidden="true">Sljedeća &raquo;</span>
  				      </a>
  				    </li>
  				  </ul>
  				</nav>
          <p>Pronađeno rezultata: <span class="total"><?php echo $total; ?></span></p>
  			</div>
      </div>








    <!--MAPA-->

        <!--Izgled prije pretrazivanja-->
        <!--Kategorije-->
        <div class="kategorije">
            <div class="kategorije-container">
                <ul>
                  <li class="kat-sakrij1"><a onclick="traziKategorije(19)"><div class="opisslike kat-sakrij1"><img src="ico/test.png" alt=""></div></a></li>
                  <li class="kat-sakrij2"><a onclick="traziKategorije(17)"><div class="opisslike kat-sakrij2"><img src="ico/fastfood.png" alt=""></div></a></li>
                  <li><a onclick="traziKategorije(12)"><div class="opisslike"><img src="ico/restorani.png" alt=""></div></a></li>
                  <li><a onclick="traziKategorije(13)"><div class="opisslike"><img src="ico/kafici.png" alt=""></div></a></li>
                  <li><a onclick="traziKategorije(9)"><div class="opisslike"><img src="ico/EXCLUSIVE.png" alt=""></div></a></li>
                  <li><a href="nekretnine.php"><div class="opisslike"><img src="ico/nekretnine.png" alt=""></div></a></li>
                  <li><a onclick="traziKategorije(14)"><div class="opisslike"><img src="ico/GYM.png" alt=""></div></a></li>
                  <li><a onclick="traziKategorije(15)"><div class="opisslike"><img src="ico/automehanicari.png" alt=""></div></a></li>
                  <li class="kat-sakrij3"><a onclick="traziKategorije(16)"><div class="opisslike kat-sakrij3"><img src="ico/apoteke.png" alt=""></div></a></li>
                  <li class="kat-sakrij1"><a onclick="traziKategorije(22"><div class="opisslike kat-sakrij1"><img src="ico/pett.png" alt=""></div></a></li>
                  <li>
                    <div class="opisslike" onclick="openTab('b1');">
                      <img src="ico/hamburger.png" alt="">
                    </div>
                  </li>
                </ul>

                <!--<a onclick="subIndex('fast food hrana')"><div class="opisslike"><button type="button" class="toggler"></button><img src="ico/hamburger.png" alt=""></div></a>-->
            </div>
            <div id="b1" class="skrivenekategorije" style="display:none;">
              <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
              <ul>
                <li><a onclick="traziKategorije(10)">Hoteli</a></li>
                <li><a onclick="traziKategorije(11)">Klubovi</a></li>
                <li><a onclick="traziKategorije(12)">Restorani</a></li>
                <li><a onclick="traziKategorije(13)">Kafići</a></li>
                <li><a onclick="traziKategorije(14)">Fitnes</a></li>
                <li><a onclick="traziKategorije(1)">Proizvodnja</a></li>
                <li><a onclick="traziKategorije(4)">Državne institucije</a></li>
                <li><a onclick="traziKategorije(15)">Autoservis / Vulkanizer</a></li>
                <li><a onclick="traziKategorije(16)">Apoteke / Ljekarne</a></li>
                <li><a onclick="traziKategorije(17)">Fastfood</a></li>
                <li><a onclick="traziKategorije(18)">Odijevanje</a></li>
                <li><a onclick="traziKategorije(2)">Trgovina</a></li>
                <li><a onclick="traziKategorije(19)">Salon ljepote</a></li>
                <li><a onclick="traziKategorije(20)">Prijevoz</a></li>
                <li><a onclick="traziKategorije(6)">Kulturni spomenici i prirodne ljepote</a></li>
                <li><a onclick="traziKategorije(21)">Nakit/parfemi</a></li>
                <li><a onclick="traziKategorije(22)">Svijet životinja</a></li>
                <li><a onclick="traziKategorije(23)">Elektromaterijal Vodomaterijal</a></li>
                <li><a onclick="traziKategorije(24)">Tehnika</a></li>
                <li><a onclick="traziKategorije(25)">Majstori</a></li>
                <li><a onclick="traziKategorije(3)">Usluge</a></li>
                <li><a onclick="traziKategorije(8)">Sport</a></li>
                <li><a onclick="traziKategorije(9)">Exclusive</a></li>
                <li><a onclick="traziKategorije(25)">Majstori</a></li>
                <li><a onclick="traziKategorije(26)">Pizzeria</a></li>
                <li><a onclick="traziKategorije(27)">Autodijelovi</a></li>
                <li><a onclick="traziKategorije(28)">Pekare</a></li>
              </ul>
            </div>
            <script>
            function openTab(tabName) {
              var i, x;
              x = document.getElementsByClassName("skrivenekategorije");
              for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
              }
                document.getElementById(tabName).style.display = "block";
            }
            </script>
        </div>
        <!--Objave prije pretrazivanja-->
        <div class="objavepp">
          <div id="map" class="mapcontent">
            <script>

              //initMap();
            </script>

            <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCc8E116MNQ8gM85NMwU6DnV8GwOYZZODY&callback=initMap" async defer></script>
            <script src="js/geocode/geo2.js"></script>
          </div>
          <div class="najviseplaceni">
            <div class="lijevi1">
              <a  onclick="plusDivs(-1)" id="left1">&#10094;</a>
            </div>
            <div class="containernajviseplaceni">
              <div class="okvirflexnp">

                  <?php
                  //select iz baze
                    $sql = "SELECT * FROM objave INNER JOIN gradovi ON objave.IDgrad=gradovi.IDgrad INNER JOIN kategorije ON objave.IDkategorije=kategorije.IDkategorije WHERE ID='252' OR ID='335' ;";
                  //
                    $rezultat = mysqli_query($link, $sql);
                    $rezultatCheck = mysqli_num_rows($rezultat);

                    if($rezultatCheck > 0){
                      while ($red = mysqli_fetch_assoc($rezultat)){?>
                      <div class="objavanp" onclick="onClick('<?php echo $red['ID']; ?>','<?php echo $red['IDkategorije']; ?>')">
                        <div class="divzaslikenp">
                        <?php
                          $IDobjavenp = $red['ID'];
                          $sqlslikenp = "SELECT * FROM userimage WHERE IDobjave='$IDobjavenp' ORDER BY IDimage ASC";
                          $rezultatslikenp = mysqli_query($link, $sqlslikenp);
                          $rowslnp = mysqli_fetch_array($rezultatslikenp);
                          $FileName1np = $rowslnp['FileName'];
                          $FileNameSmallnp = $rowslnp['FileNameSmall'];
                          $IDimage1np = $rowslnp['IDimage'];

                          if(!empty($FileNameSmallnp)){
                            echo "
                            <div>
                              <img src='{$FileName1np}' class='content-imgnp'>
                            </div>
                            ";
                          }
                          ?>
                        </div>
                        <div class="donji-dio">
                          <span class="kategorijaspan"><?php echo $red['nazivkategorije']; ?></span>
                          <p class="findresult-naslovnp" name="naslov" id="naslov1" readonly value=""><?php echo $red['naslov']; ?><span style="color: rgb(189,192,192);font-size: 12px;"></span></p>
                          <input type="text" name="rate" hidden value="<?php echo $red['rate']?>">
                          <div class="ratenp" style="color: grey;">
                            <i class="fa fa-star fa-2x" name="zvj1" <?php if($red['rate'] < 1){ echo 'style="color: grey;"';}else{ echo 'style="color: green;"';} ?>></i>
                            <i class="fa fa-star fa-2x" name="zvj2" <?php if($red['rate'] < 2){ echo 'style="color: grey;"';}else{ echo 'style="color: green;"';} ?>></i>
                            <i class="fa fa-star fa-2x" name="zvj3" <?php if($red['rate'] < 3){ echo 'style="color: grey;"';}else{ echo 'style="color: green;"';} ?>></i>
                            <i class="fa fa-star fa-2x" name="zvj4" <?php if($red['rate'] < 4){ echo 'style="color: grey;"';}else{ echo 'style="color: green;"';} ?>></i>
                            <i class="fa fa-star fa-2x" name="zvj5" <?php if($red['rate'] < 5){ echo 'style="color: grey;"';}else{ echo 'style="color: green;"';} ?>></i>
                          </div>
                          <p name="podatci" class="findresult-1linijanp" readonly value=""><?php echo $red['grad'].", ".$red['adresa']; ?></p><!--.",<br> ".$rowfind['tel'].",<br> ".$rowfind['email'].", ".$rowfind['web']-->
                          <p name="opis" class="findresult-2linijanp" readonly value=""><?php echo $red['kljuc']; ?></p>
                        </div>

                      </div>
                    <?php  }
                    }
                  ?>
                <script src="js/divslider.js"></script>
              </div>
            </div>
            <div class="desni1">
              <a onclick="plusDivs(1)" id="right1">&#10095;</a>
            </div>
          </div>
          <div class="front" style="<?php echo $hideComm; ?>;">
              <img src="img/index4.png" >
            <p><?php echo $red1; ?></p>
            <br>
            <p class="p1"style="margin-left:7%;"><?php echo $red2; ?></p>
            <br><br>
            <p class="p2"><?php echo $red3; ?></p>
            <br>
            <p class="p3" style="margin-left:7%;"><?php echo $red4; ?></p>
          </div>
          <!-- <div id="tride" class="trid objavesve">
            <div class="sp-obj">
              <span class="kategorijaspanobj">SPONZORISANO</span>
            </div>
            <div class="lijevi2">
              <a id="lefttrid">&#10094;</a>
            </div>
            <div class="containergodisnjitrid contobj">
              <div class="okvirgodisnji objokv">

                <div  class="work">

                </div>
                <div class="work">
                  
                </div>
                <div class="work">

                </div>
              </div>
            </div>
            <div class="desni2">
              <a id="righttrid">&#10095;</a>
            </div>
            
          </div> -->
          <!--360-->
          <div id="god_tri" class="trid objavesve">
            <div class="sp-obj">
              <span class="kategorijaspanobj">3 6 0 °</span>
            </div>
            <div class="lijevi2">
              <a id="left23">&#10094;</a>
            </div>
            <div class="containergodisnjitrid contobj">
              <div class="okvirgodisnji objokv">
                <div class="work">
                  <a class="link" href="https://pitajme.ba/360/sultan_ahmed_bugojno"></a>
                  <div class="divzaslike">
                    <img src="img/sultanahmed.jpg" alt="">
                  </div>          
                  <div class="info">
                    <h3>Sultan Ahmedova dzamija, Bugojno</h3>
                    <div class="cat">Kulturne znamenitosti</div>
                  </div>
                </div>
                <div class="work">
                  <a class="link" href="https://pitajme.ba/360/santos"></a>
                  <div class="divzaslike">
                    <img src="img/santos.jpg" alt="">
                  </div>
                  <div class="info">
                    <h3>Restoran - pizzeria Santos Donji Vakuf</h3>
                    <div class="cat">Restorani</div>
                  </div>
                </div>
                <div class="work">
                  <a class="link" href="https://pitajme.ba/360/oazamira"></a>
                  <div class="divzaslike">
                    <img src="img/oazamira.jpg" alt="">
                  </div>   
                  <div class="info">
                    <h3>Restoran Oaza mira Donji Vakuf</h3>
                    <div class="cat">Restorani</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="desni2">
              <a id="right23">&#10095;</a>
            </div>
            <a class="vise" href="https://pitajme.ba/360.php">Pogledajte više..</a>
          </div>
          <!--Kraj-->
          <div id="god" class="godisnji objavesve">
            <div class="sp-obj">
              <span class="kategorijaspanobj">SPONZORISANO</span>
            </div>
            <div class="lijevi2">
              <a id="left2">&#10094;</a>
            </div>
            <div class="containergodisnji contobj">
              <div class="okvirgodisnji objokv">
                <?php
                //select iz baze
                  $sqlgodisnji = "SELECT * FROM objave INNER JOIN gradovi ON objave.IDgrad=gradovi.IDgrad INNER JOIN users ON objave.IDuser=users.IDuser INNER JOIN kategorije ON objave.IDkategorije=kategorije.IDkategorije WHERE users.IDpaid > 100;";
                //
                  $rezultatgodisnji = mysqli_query($link, $sqlgodisnji);
                  $rezultatCheckgodisnji = mysqli_num_rows($rezultatgodisnji);

                  if($rezultatCheckgodisnji > 0){
                    while ($redgodisnji = mysqli_fetch_array($rezultatgodisnji)){
                      ?>
                    <div class="objava" onclick="onClick('<?php echo $redgodisnji['ID']; ?>','<?php echo $redgodisnji['IDkategorije']; ?>','<?php echo $redgodisnji['pravnofizicko']; ?>')">
                      <div class="divzaslike">
                      <?php
                        $IDobjavegodisnji = $redgodisnji['ID'];
                        $sqlslikegodisnji = "SELECT * FROM userimage WHERE IDobjave='$IDobjavegodisnji' ORDER BY IDimage ASC";
                        $rezultatslikegodisnji = mysqli_query($link, $sqlslikegodisnji);
                        $rowslgodisnji = mysqli_fetch_array($rezultatslikegodisnji);
                        $FileName1godisnji = $rowslgodisnji['FileName'];
                        $FileNameSmallgodisnji = $rowslgodisnji['FileNameSmall'];
                        $IDimage1godisnji = $rowslgodisnji['IDimage'];

                        if(!empty($FileNameSmallgodisnji)){
                          echo "
                          <div class='fitimg' style='background-image: url({$FileNameSmallgodisnji});'>
                            <img src='' class='content-imgobj'>
                          </div>
                          ";
                        }
                        ?>
                      </div>
                      <div class="donji-dioobjave">
                      <span class="kategorijaspanunobjg"><?php echo $redgodisnji['nazivkategorije']; ?></span>
                        <p class="findresult-naslovnp" name="naslov" id="naslov1" readonly value=""><?php echo $redgodisnji['naslov']; ?><span style="color: rgb(189,192,192);font-size: 12px;"></span></p>
                        <input type="text" name="rate" hidden value="<?php echo $redgodisnji['rate']?>">
                        <div class="rateobj" style="color: grey;">
                          <i class="fa fa-star fa-2x" name="zvj1" <?php if($redgodisnji['rate'] < 1){ echo 'style="color: grey;"';}else{ echo 'style="color: green;"';} ?>></i>
                          <i class="fa fa-star fa-2x" name="zvj2" <?php if($redgodisnji['rate'] < 2){ echo 'style="color: grey;"';}else{ echo 'style="color: green;"';} ?>></i>
                          <i class="fa fa-star fa-2x" name="zvj3" <?php if($redgodisnji['rate'] < 3){ echo 'style="color: grey;"';}else{ echo 'style="color: green;"';} ?>></i>
                          <i class="fa fa-star fa-2x" name="zvj4" <?php if($redgodisnji['rate'] < 4){ echo 'style="color: grey;"';}else{ echo 'style="color: green;"';} ?>></i>
                          <i class="fa fa-star fa-2x" name="zvj5" <?php if($redgodisnji['rate'] < 5){ echo 'style="color: grey;"';}else{ echo 'style="color: green;"';} ?>></i>
                        </div>
                          <p name="podatci" class="findresult-1linijanp" readonly value=""><?php echo $redgodisnji[31].", ".$redgodisnji['adresa']; ?></p><!--.",<br> ".$rowfind['tel'].",<br> ".$rowfind['email'].", ".$rowfind['web']-->
                          <p name="opis" class="findresult-2linijanp" readonly value=""><?php echo $redgodisnji['kljuc']; ?></p>
                      </div>

                    </div>
                  <?php  }
                  }
                ?>
              </div>
            </div>
            <div class="desni2">
              <a id="right2">&#10095;</a>
            </div>

          </div>
          <div id="mje" class="mjesecni objavesve">
            <div class="sp-obj">
              <span class="kategorijaspanobj">SPONZORISANO</span>
            </div>
            <div class="lijevi3">
              <a id="left3">&#10094;</a>
            </div>
            <div class="containermjesecni contobj">
              <div class="okvirmjesecni objokv">
                <?php
                //select iz baze
                  $sqlmjesecni = "SELECT * FROM objave
                  INNER JOIN gradovi ON objave.IDgrad=gradovi.IDgrad
                  INNER JOIN users ON objave.IDuser=users.IDuser INNER JOIN kategorije ON objave.IDkategorije=kategorije.IDkategorije WHERE (users.IDpaid > 0 AND users.IDpaid < 100) LIMIT 10";
                //
                  $rezultatmjesecni = mysqli_query($link, $sqlmjesecni);
                  $rezultatCheckmjesecni = mysqli_num_rows($rezultatmjesecni);

                  if($rezultatCheckmjesecni > 0){
                    while ($redmjesecni = mysqli_fetch_array($rezultatmjesecni)){
                      ?>
                    <div class="objava" onclick="onClick('<?php echo $redmjesecni['ID']; ?>','<?php echo $redmjesecni['IDkategorije']; ?>','<?php echo $redmjesecni['pravnofizicko']; ?>')">
                      <div class="divzaslike">
                      <?php
                        $IDobjavemjesecni = $redmjesecni['ID'];
                        $sqlslikemjesecni = "SELECT * FROM userimage WHERE IDobjave='$IDobjavemjesecni' ORDER BY IDimage ASC";
                        $rezultatslikemjesecni = mysqli_query($link, $sqlslikemjesecni);
                        $rowslmjesecni = mysqli_fetch_array($rezultatslikemjesecni);
                        $FileName1mjesecni = $rowslmjesecni['FileName'];
                        $FileNameSmallmjesecni = $rowslmjesecni['FileNameSmall'];
                        $IDimage1mjesecni = $rowslmjesecni['IDimage'];

                        if(!empty($FileNameSmallmjesecni)){
                          echo "
                          <div class='fitimg' style='background-image: url({$FileNameSmallmjesecni});'>
                            <img src='' class='content-imgobj'>
                          </div>
                          ";
                        }
                        ?>
                      </div>
                      <div class="donji-dioobjave">
                      <span class="kategorijaspanunobjm"><?php echo $redmjesecni['nazivkategorije']; ?></span>
                        <p class="findresult-naslovnp" name="naslov" id="naslov1" readonly value=""><?php echo $redmjesecni['naslov']; ?><span style="color: rgb(189,192,192);font-size: 12px;"></span></p>
                        <input type="text" name="rate" hidden value="<?php echo $redmjesecni['rate']?>">
                        <div class="rateobj" style="color: grey;">
                          <i class="fa fa-star fa-2x" name="zvj1" <?php if($redmjesecni['rate'] < 1){ echo 'style="color: grey;"';}else{ echo 'style="color: green;"';} ?>></i>
                          <i class="fa fa-star fa-2x" name="zvj2" <?php if($redmjesecni['rate'] < 2){ echo 'style="color: grey;"';}else{ echo 'style="color: green;"';} ?>></i>
                          <i class="fa fa-star fa-2x" name="zvj3" <?php if($redmjesecni['rate'] < 3){ echo 'style="color: grey;"';}else{ echo 'style="color: green;"';} ?>></i>
                          <i class="fa fa-star fa-2x" name="zvj4" <?php if($redmjesecni['rate'] < 4){ echo 'style="color: grey;"';}else{ echo 'style="color: green;"';} ?>></i>
                          <i class="fa fa-star fa-2x" name="zvj5" <?php if($redmjesecni['rate'] < 5){ echo 'style="color: grey;"';}else{ echo 'style="color: green;"';} ?>></i>
                        </div>

                        <p name="podatci" class="findresult-1linijanp" readonly value=""><?php echo $redmjesecni[31].", ".$redmjesecni['adresa']; ?></p><!--.",<br> ".$rowfind['tel'].",<br> ".$rowfind['email'].", ".$rowfind['web']-->
                        <p name="opis" class="findresult-2linijanp" readonly value=""><?php echo $redmjesecni['kljuc']; ?></p>
                      </div>

                    </div>
                  <?php  }
                  }
                ?>
              </div>
            </div>
            <div class="desni3">
              <a id="right3">&#10095;</a>
            </div>

          </div>
          <div id="nov" class="najnovije objavesve">
            <div class="sp-obj">
              <span class="kategorijaspanobj">NOVE OBJAVE</span>
            </div>
            <div class="lijevi4">
              <a id="left4">&#10094;</a>
            </div>
            <div class="containernajnovije contobj">
              <div class="okvirnajnovije objokv">
                <?php
                //select iz baze
                  $sqlnajnovije = "SELECT * FROM objave
                  INNER JOIN gradovi ON objave.IDgrad=gradovi.IDgrad INNER JOIN kategorije ON objave.IDkategorije=kategorije.IDkategorije
                  ORDER BY datetime DESC LIMIT 10;";
                //
                  $rezultatnajnovije = mysqli_query($link, $sqlnajnovije);
                  $rezultatChecknajnovije = mysqli_num_rows($rezultatnajnovije);

                  if($rezultatChecknajnovije > 0){
                    while ($rednajnovije = mysqli_fetch_array($rezultatnajnovije)){
                  
                      ?>
                    <div class="objava" onclick="onClick('<?php echo $rednajnovije['ID']; ?>','<?php echo $rednajnovije['IDkategorije']; ?>')">
                      <div class="divzaslike">
                      <?php
                        $IDobjavenajnovije = $rednajnovije['ID'];
                        $sqlslikenajnovije = "SELECT * FROM userimage WHERE IDobjave='$IDobjavenajnovije' ORDER BY IDimage ASC";
                        $rezultatslikenajnovije = mysqli_query($link, $sqlslikenajnovije);
                        $rowslnajnovije = mysqli_fetch_array($rezultatslikenajnovije);
                        $FileName1najnovije = $rowslnajnovije['FileName'];
                        $FileNameSmallnajnovije = $rowslnajnovije['FileNameSmall'];
                        $IDimage1najnovije = $rowslnajnovije['IDimage'];

                        if(!empty($FileNameSmallnajnovije)){
                          echo "
                          <div class='fitimg' style='background-image: url({$FileNameSmallnajnovije});'>
                            <img src='' class='content-imgobj'>
                          </div>
                          ";
                        }
                        ?>
                      </div>
                      <div class="donji-dioobjave">
                      <span class="kategorijaspanunobjn"><?php echo $rednajnovije['nazivkategorije']; ?></span>
                        <p class="findresult-naslovnp" name="naslov" id="naslov1" readonly value=""><?php echo $rednajnovije['naslov']; ?><span style="color: rgb(189,192,192);font-size: 12px;"></span></p>
                        <input type="text" name="rate" hidden value="<?php echo $rednajnovije['rate']?>">
                        <div class="rateobj" style="color: grey;">
                          <i class="fa fa-star fa-2x" name="zvj1" <?php if($rednajnovije['rate'] < 1){ echo 'style="color: grey;"';}else{ echo 'style="color: green;"';} ?>></i>
                          <i class="fa fa-star fa-2x" name="zvj2" <?php if($rednajnovije['rate'] < 2){ echo 'style="color: grey;"';}else{ echo 'style="color: green;"';} ?>></i>
                          <i class="fa fa-star fa-2x" name="zvj3" <?php if($rednajnovije['rate'] < 3){ echo 'style="color: grey;"';}else{ echo 'style="color: green;"';} ?>></i>
                          <i class="fa fa-star fa-2x" name="zvj4" <?php if($rednajnovije['rate'] < 4){ echo 'style="color: grey;"';}else{ echo 'style="color: green;"';} ?>></i>
                          <i class="fa fa-star fa-2x" name="zvj5" <?php if($rednajnovije['rate'] < 5){ echo 'style="color: grey;"';}else{ echo 'style="color: green;"';} ?>></i>
                        </div>
                        
                        <p name="podatci" class="findresult-1linijanp" readonly value=""><?php echo $rednajnovije[31].", ".$rednajnovije['adresa']; ?></p><!--.",<br> ".$rowfind['tel'].",<br> ".$rowfind['email'].", ".$rowfind['web']-->
                        <p name="opis" class="findresult-2linijanp" readonly value=""><?php echo $rednajnovije['kljuc']; ?></p>
                      </div>

                    </div>
                  <?php  }
                  }
                ?>
              </div>
            </div>
            <div class="desni4">
              <a id="right4">&#10095;</a>
            </div>

          </div>
          <div class="desnereklame">
            <div class="prva">
              <?php include "slajdovi/slajdovi1.php"; ?>
              <script src="js/slideri/slider0.js" charset="utf-8"></script>
            </div>
            <div class="druga">
              <?php include "slajdovi/slajdovi2.php"; ?>
              <script src="js/slideri/slider1.js" charset="utf-8"></script>
            </div>
            <div class="treca">
              <?php include "slajdovi/slajdovi3.php"; ?>
              <script src="js/slideri/slider2.js" charset="utf-8"></script>
            </div>
          </div>
        </div>
        <!--Oglasi-->
        <div class="oglasi-okvir" id="x">
          <div class="sp-ogl">
            <span class="kategorijaspanogl">SPONZORISANI OGLASI</span>
          </div>
          <div class="lijevi">
            <a id="left">&#10094;</a>
          </div>
          <div class="oglas-container">
            <div class="oglas-frame">

            <?php
              if($countoglasi > 0){
                while($rowsogl=mysqli_fetch_array($Oglfindresult)){
                  $Datum = $rowsogl ['datetime'];
                  $Datum1 = strtotime($Datum);
                  $OglDatum = date('d.m.Y' , $Datum1);
                  $IDoglasa = $rowsogl['IDoglasa'];
                  $IDpaidogl = $rowsogl['IDpaid'];
                  if($IDpaidogl > 0){
                    $sponzorogl = "style='display: block'";
                  }else{
                    $sponzorogl = "style='display: none'";
                  }
                  $sql8 = "SELECT * FROM oglasimage WHERE IDoglasa='$IDoglasa' ORDER BY IDimage ASC LIMIT 1"  ;
                  $resultsql8 = mysqli_query($link,$sql8);
                  $numrowssql8 = mysqli_num_rows($resultsql8);
                  if($numrowssql8 > 0){
                    while($rowoglimg=mysqli_fetch_array($resultsql8)){
                      $oglasimgsmall = $rowoglimg['FileNameSmall'];
                      $oglasimg = $rowoglimg['FileName'];
                    }
                  }else{
                    $oglasimgsmall = "";
                    $oglasimg = "";
                  }
              ?>
              <div class="oglas" id="ogl" onclick="oglclick(<?php echo $IDoglasa; ?>)">
                <div class="oglas-slika" style="background-image: url(<?php echo $oglasimgsmall;?>);">
                </div>
                <div class="oglas-info">
                  <P class="oglas-naslov"><?php echo $rowsogl['naslov']?></P>
                  <p class="oglas-datum"><?php echo $OglDatum;?></p>
                  <p class="oglas-tekst"><?php echo $rowsogl['tekstoglasa']?> </p>
                </div>

              </div>
              <?php
                }
              }
              ?>

            </div>

            <script src="js/scroll.js"></script>
          </div>
            <div class="desni">
              <a id="right">&#10095;</a>
            </div>
          </div>
          <script type="text/javascript">
              $(function(){
                var iv;
                var div = $('.oglas-container');

                $('#left').mousedown(function(){
                  iv = setInterval(function(){
                    div.scrollLeft(div.scrollLeft()-10);
                  }, 20);
                });
                $('#right').mousedown(function(){
                  iv = setInterval(function(){
                    div.scrollLeft(div.scrollLeft()+10);
                  }, 20);
                });
                $('#left, #right').on('mouseup mouseleave', function(){
                  clearInterval(iv);
                });
              });

          </script>
          <!--360-->
          <script type="text/javascript">
              $(function(){
                var iv23;
                var div23 = $('.containergodisnjitrid');

                $('#left23').mousedown(function(){
                  iv23 = setInterval(function(){
                    div23.scrollLeft(div23.scrollLeft()-10);
                  }, 20);
                });
                $('#right23').mousedown(function(){
                  iv23 = setInterval(function(){
                    div23.scrollLeft(div23.scrollLeft()+10);
                  }, 20);
                });
                $('#left23, #right23').on('mouseup mouseleave', function(){
                  clearInterval(iv23);
                });
              });

          </script>
          <!--Kraj-->
          <script type="text/javascript">
              $(function(){
                var iv2;
                var div2 = $('.containergodisnji');

                $('#left2').mousedown(function(){
                  iv2 = setInterval(function(){
                    div2.scrollLeft(div2.scrollLeft()-10);
                  }, 20);
                });
                $('#right2').mousedown(function(){
                  iv2 = setInterval(function(){
                    div2.scrollLeft(div2.scrollLeft()+10);
                  }, 20);
                });
                $('#left2, #right2').on('mouseup mouseleave', function(){
                  clearInterval(iv2);
                });
              });

          </script>
          <script type="text/javascript">
              $(function(){
                var iv3;
                var div3 = $('.containermjesecni');

                $('#left3').mousedown(function(){
                  iv3 = setInterval(function(){
                    div3.scrollLeft(div3.scrollLeft()-10);
                  }, 20);
                });
                $('#right3').mousedown(function(){
                  iv3 = setInterval(function(){
                    div3.scrollLeft(div3.scrollLeft()+10);
                  }, 20);
                });
                $('#left3, #right3').on('mouseup mouseleave', function(){
                  clearInterval(iv3);
                });
              });

          </script>
          <script type="text/javascript">
              $(function(){
                var iv4;
                var div4 = $('.containernajnovije');

                $('#left4').mousedown(function(){
                  iv4 = setInterval(function(){
                    div4.scrollLeft(div4.scrollLeft()-10);
                  }, 20);
                });
                $('#right4').mousedown(function(){
                  iv4 = setInterval(function(){
                    div4.scrollLeft(div4.scrollLeft()+10);
                  }, 20);
                });
                $('#left4, #right4').on('mouseup mouseleave', function(){
                  clearInterval(iv4);
                });
              });

          </script>
        <!--Desna strana reklama-->

  </div>
  <!--FOOTER-->
  <footer class="footer">
     <div class="kontakt">
       <h4 class="ktk">Kontaktirajte nas:</h4>
       <h3>Tel: +387 61 105 835</h3>
       <h3>info@pitajme.ba</h3>
     </div>
     <div class="copyright">
       <h2>Copyright © pitajMe.ba 2019/2020</h2>
     </div>
     <div class="fbinstafooter">
       <a href="https://www.facebook.com/www.pitajme.ba/" target="_blank"><img src="ico/facebook.png" alt="facebook"></a>
       <a href="https://www.instagram.com/pitajme.ba/" target="_blank"><img src="ico/instagram.png" alt="instagram"></a>
     </div>
     <div class="radnovrijeme">
       <h4>Radno vrijeme:</h4>
       <h4>PONEDJELJAK-PETAK</h4>
       <h4>08h-17h</h4>
     </div>
  </footer>
  <a href="#home" class="scroll-link top-link">
      <i class="fas fa-arrow-up"></i>
  </a>
</div>
    <script src="js/scrollTop.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script>
        //jQuery code for clickable dropdown menus.
        $(document).ready(function () {
            //Hides all visible dropdown menus.
            function hideall() {
                $('nav ul li ul').hide();
            }

            //When clicking anywhere on the page, hide all dropdown menus.
            $('html').bind("click touchstart", function () {
                hideall()
            });

            //User clicked on a top menu bar item.
            $('nav ul li').click(function (e) {
                //Is dropdown already hidden?
                var hidden = $("ul", this).is(":hidden");
                //Hide all dropdown menus.
                hideall()
                //If it was hidden already, show it.
                if (hidden) {
                    $("ul", this).slideDown("fast");
                }
                //Don't do html.click to hide all menus.
                e.stopPropagation()
            });

            $('a').bind("click touchstart", function (e) {
                e.stopPropagation()
            });
        });
    </script>




    <script type="text/javascript">

      var visitorlant = $('#visitorlant').val();
      var visitorlong = $('#visitorlong').val();

      if(visitorlant == 1){
        visitorGeo();
      }

      if(visitorlant == 0){
        error();
      }

      if(visitorlant > 0){
        TestMap3();
      }

    </script>
    <script>
      function openForm() {
        document.getElementById("myForm").style.display = "block";
      }

      function closeForm() {
        document.getElementById("myForm").style.display = "none";
      }
      </script>

      <script>
        function openNav() {
          document.getElementById("mySidenav").style.width = "170px";
        }

        function closeNav() {
          document.getElementById("mySidenav").style.width = "0";
        }
      </script>
      <script>
      /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
      var dropdown = document.getElementsByClassName("dropdown-btn");
      var i;

      for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
        dropdownContent.style.display = "none";
        } else {
        dropdownContent.style.display = "block";
        }
        });
      }
      </script>
      <script type="text/javascript">
    $(function() {

    //cache the ticker
    var ticker = $("#ticker");

    //wrap dt:dd pairs in divs
    ticker.children().filter("dt").each(function() {

      var dt = $(this),
        container = $("<div>");

      dt.next().appendTo(container);
      dt.prependTo(container);

      container.appendTo(ticker);
    });

    //hide the scrollbar
    ticker.css("overflow", "hidden");

    //animator function
    function animator(currentItem) {

      //work out new anim duration
      var distance = currentItem.height();
      duration = (distance + parseInt(currentItem.css("marginTop"))) / 0.025;

      //animate the first child of the ticker
      currentItem.animate({ marginTop: -distance }, duration, "linear", function() {

      //move current item to the bottom
      currentItem.appendTo(currentItem.parent()).css("marginTop", 0);

      //recurse
      animator(currentItem.parent().children(":first"));
      });
    };

    //start the ticker
    animator(ticker.children(":first"));

    //set mouseenter
    ticker.mouseenter(function() {

      //stop current animation
      ticker.children().stop();

    });

    //set mouseleave
    ticker.mouseleave(function() {

          //resume animation
      animator(ticker.children(":first"));

    });
    });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
      $("#hide").click(function(){
        $("#map").hide(800);
        //$("#minikat").hide(800)
        //$("#minikat").hide(800)
        $("#lista").show(800);
      });
      $("#show").click(function(){
        $("#map").show(800);
        $("#lista").hide(800);
      });
    });
    </script>
    <script>
    //$(document).ready(function(){
      //$("#show").click(function(){
        //$("#lista").show(800);
      //});
      //$("#show").click(function(){
        //$("#lista").hide(800);
    //  });
    //});
    </script>

    <script>
      setMob()
    </script>

    </body>
</html>
