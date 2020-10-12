<?php



$sqlobjfind = "SELECT * FROM objave WHERE IDgrad=500";
$Objfindresult=mysqli_query($link,$sqlobjfind);
$countobjave = mysqli_num_rows($Objfindresult);

$poljeTrazi1 = "";
$grad = "BiH";
$test11 = "";
$robot = "img/animacija_1.gif";
$hideComm = "display: inline-block";
$findrez = 0;
$red1 = "Mi smo tu da Vam pružimo kvalitetne";
$red2 = "informacije o uslugama, proizvodima itd..";
$red3 = "Registrujte se i objavite vaše informacije";
$red4 = "da svi drugi znaju za Vas.";
$sponzor = "hidden";
$IDobjavePj1 = "";
$izbkategorija = "";
$PoljeTraziAdd = "";
$css = "css/styleindexnew.css";

//______zamjena slova____________________________________________________________________________________________________________________________________________________

$reg_exp = array('/Š/', '/š/', '/Č/', '/č/', '/Ć/', '/ć/', '/Ž/', '/ž/', '/Đ/', '/đ/' );
$replacment = array('S', 's', 'C', 'c', 'C', 'c', 'Z', 'z', 'Dj', 'dj');
$reg_exp1 = array('/C/', '/c/');
$replacment1 = array('Ć', 'ć');
$reg_exp2 = array('/Č/', '/č/');
$replacment2 = array('Ć', 'ć');
$reg_exp3 = array('/Ć/', '/ć/');
$replacment3 = array('Č', 'č');
$reg_exp4 = array('/C/', '/c/');
$replacment4 = array('Č', 'č');
$reg_exp5 = array('/S/', '/s/');
$replacment5 = array('Š', 'š');
$reg_exp6 = array('/DZ/', '/dz/');
$replacment6 = array('DŽ', 'dž');
$reg_exp7 = array('/Dj/', '/dj/');
$replacment7 = array('Đ', 'đ');
$reg_exp8 = array('/Z/', '/z/');
$replacment8 = array('Ž', 'ž');





if(!empty($_POST['polje-trazi'])){
    $poljeTrazi1 = $_POST['polje-trazi'];
    //$poljeTrazi = preg_replace("#[^0-9a-z]#i","",$poljeTrazi1);
    $poljeTrazi = mysqli_real_escape_string($link,$_POST['polje-trazi']);
    $PoljeTraziAdd = $poljeTrazi;


    if(substr_count($poljeTrazi," ") > 0){
      $test11 = substr_count($poljeTrazi," ");
      $poljeTraziE = explode(" ", $poljeTrazi);
      $i = 0;
      foreach($poljeTraziE as $poljeTrazi2){
        $i++;
        if($i==1){

            if (strpos($poljeTrazi2, $reg_exp) !== false){
              $LetterConvert = preg_replace($reg_exp, $replacment, $poljeTrazi);
              $PoljeTraziAdd .= " ".$LetterConvert;
            }

        }else{

            $PoljeTraziAdd .= "";

        }
      }



}elseif(!empty($_GET['poljetrazi'])){
    $poljeTrazi1 = $_GET['poljetrazi'];
    //$poljeTrazi = preg_replace("#[^0-9a-z]#i","",$poljeTrazi1);
    $poljeTrazi = mysqli_real_escape_string($link,$_GET['poljetrazi']);




}
}

//echo $PoljeTraziAdd;

//________________________________________________________________________________________________________________________________________________________________________


if(isset($_POST['visitorlant']) && isset($_POST['visitorlong'])){
  $_SESSION['visitorlant'] = $_POST['visitorlant'];
  $_SESSION['visitorlong'] = $_POST['visitorlong'];

  $visitorlant = $_POST['visitorlant'];
  $visitorlong = $_POST['visitorlong'];

}else{
  if(isset($_SESSION['visitorlant']) && isset($_SESSION['visitorlong'])){
    $visitorlant = $_SESSION['visitorlant'];
    $visitorlong = $_SESSION['visitorlong'];
  }else{
    $visitorlant = 1;
    $visitorlong = 1;
  }
}

//_______________pagination__________________________________________________________________________________

$Previous = 1;

if(isset($_POST["limit-records"])){
$limitrec = $_POST["limit-records"];
$limit = $_POST["limit-records"];

}elseif(isset($_GET["record"])){
  $limitrec = $_GET["record"];
  $limit = $_GET["record"];
}else{
  $limit = 10;
}

if(isset($_POST['polje-trazi'])){
  $page = 1;
}else{

$page = isset($_GET['page']) ? $_GET['page'] : 1;
}
$start = ($page - 1) * $limit;



//___________________________________________________________________________________________________________



//___________traženje po kategoriji ________________________________________________________________________________________________________________________

if(empty($_POST['polje-trazi']) && empty($_GET['poljetrazi'])){

if(isset($_GET['kategorija']) && !empty($_GET['kategorija'])){

  $izbkategorija = $_GET['kategorija'];
  $izbgrad = $_GET['grad'];
  $grad = $izbgrad;

  if($izbgrad == "BiH"){

    //traženje u BiH

    $sqlobjfindHome = "SELECT objave.ID, objave.IDuser, users.pravnofizicko, objave.IDobjave, objave.naslov, objave.IDkategorije, kategorije.nazivkategorije,
    objave.IDgrad, gradovi.grad, gradovi.langrad, gradovi.lnggrad, gradovi.zoom, objave.adresa, objave.tel, objave.email, objave.web,
    objave.pon, objave.uto, objave.sri, objave.cet, objave.pet, objave.sub, objave.ned, objave.radnovrijemeod, objave.radnovrijemedo,
    objave.kljuc, objave.opis, objave.rateup, objave.ratedown, objave.rate, objave.lant, objave.lng, users.IDpaid, objave.IDactive,
    objave.datetime, active.active FROM objave
    INNER JOIN gradovi ON objave.IDgrad=gradovi.IDgrad
    INNER JOIN users ON objave.IDuser=users.IDuser
    INNER JOIN kategorije ON objave.IDkategorije=kategorije.IDkategorije
    INNER JOIN active ON objave.IDactive=active.IDactive
    WHERE (objave.IDactive=1 AND objave.IDkategorije='$izbkategorija') ORDER BY users.IDpaid DESC, objave.ID DESC LIMIT $start, $limit";
    $hideComm = "display: none";

    $sqlobjfindHomePage = "SELECT objave.ID, objave.IDuser, users.pravnofizicko, objave.IDobjave, objave.naslov, objave.IDkategorije, kategorije.nazivkategorije,
    objave.IDgrad, gradovi.grad, gradovi.langrad, gradovi.lnggrad, gradovi.zoom, objave.adresa, objave.tel, objave.email, objave.web,
    objave.pon, objave.uto, objave.sri, objave.cet, objave.pet, objave.sub, objave.ned, objave.radnovrijemeod, objave.radnovrijemedo,
    objave.kljuc, objave.opis, objave.rateup, objave.ratedown, objave.rate, objave.lant, objave.lng, users.IDpaid, objave.IDactive,
    objave.datetime, active.active FROM objave
    INNER JOIN gradovi ON objave.IDgrad=gradovi.IDgrad
    INNER JOIN users ON objave.IDuser=users.IDuser
    INNER JOIN kategorije ON objave.IDkategorije=kategorije.IDkategorije
    INNER JOIN active ON objave.IDactive=active.IDactive
    WHERE (objave.IDactive=1 AND objave.IDkategorije='$izbkategorija') ORDER BY users.IDpaid DESC, objave.ID DESC";

    $sqlPj1 = "SELECT * FROM poslovnejedinice
    INNER JOIN gradovi ON poslovnejedinice.IDgrad=gradovi.IDgrad
    INNER JOIN objave ON poslovnejedinice.IDobjave=objave.ID";

    $css = "css/styleindexnewfind.css";
    $findrez = 1;

    if($resultsqlPj1 = mysqli_query($link,$sqlPj1)){
      while ($rowsqlPj1 = mysqli_fetch_assoc($resultsqlPj1)) {
        $ArrayPj1[] = $rowsqlPj1;
      }
    }


    goto e1;





  }else{

    //traženje u određenom gradu

    $sqlobjfindHome = "SELECT objave.ID, objave.IDuser, users.pravnofizicko, objave.IDobjave, objave.naslov, objave.IDkategorije, kategorije.nazivkategorije,
    objave.IDgrad, gradovi.grad, gradovi.langrad, gradovi.lnggrad, gradovi.zoom, objave.adresa, objave.tel, objave.email, objave.web,
    objave.pon, objave.uto, objave.sri, objave.cet, objave.pet, objave.sub, objave.ned, objave.radnovrijemeod, objave.radnovrijemedo,
    objave.kljuc, objave.opis, objave.rateup, objave.ratedown, objave.rate, objave.lant, objave.lng, users.IDpaid, objave.IDactive,
    objave.datetime, active.active FROM objave
    INNER JOIN gradovi ON objave.IDgrad=gradovi.IDgrad
    INNER JOIN users ON objave.IDuser=users.IDuser
    INNER JOIN kategorije ON objave.IDkategorije=kategorije.IDkategorije
    INNER JOIN active ON objave.IDactive=active.IDactive
    WHERE (objave.IDactive=1 AND gradovi.grad='$izbgrad' AND objave.IDkategorije='$izbkategorija') ORDER BY users.IDpaid DESC, objave.ID DESC LIMIT $start, $limit";
    $hideComm = "display: none";

    $sqlobjfindHomePage = "SELECT objave.ID, objave.IDuser, users.pravnofizicko, objave.IDobjave, objave.naslov, objave.IDkategorije, kategorije.nazivkategorije,
    objave.IDgrad, gradovi.grad, gradovi.langrad, gradovi.lnggrad, gradovi.zoom, objave.adresa, objave.tel, objave.email, objave.web,
    objave.pon, objave.uto, objave.sri, objave.cet, objave.pet, objave.sub, objave.ned, objave.radnovrijemeod, objave.radnovrijemedo,
    objave.kljuc, objave.opis, objave.rateup, objave.ratedown, objave.rate, objave.lant, objave.lng, users.IDpaid, objave.IDactive,
    objave.datetime, active.active FROM objave
    INNER JOIN gradovi ON objave.IDgrad=gradovi.IDgrad
    INNER JOIN users ON objave.IDuser=users.IDuser
    INNER JOIN kategorije ON objave.IDkategorije=kategorije.IDkategorije
    INNER JOIN active ON objave.IDactive=active.IDactive
    WHERE (objave.IDactive=1 AND gradovi.grad='$izbgrad' AND objave.IDkategorije='$izbkategorija') ORDER BY users.IDpaid DESC, objave.ID DESC";

    $sqlPj1 = "SELECT * FROM poslovnejedinice
    INNER JOIN gradovi ON poslovnejedinice.IDgrad=gradovi.IDgrad
    INNER JOIN objave ON poslovnejedinice.IDobjave=objave.ID";

    $css = "css/styleindexnewfind.css";
    $findrez = 1;

    if($resultsqlPj1 = mysqli_query($link,$sqlPj1)){
      while ($rowsqlPj1 = mysqli_fetch_assoc($resultsqlPj1)) {
        $ArrayPj1[] = $rowsqlPj1;
      }
    }


    goto e1;


  }

}

}

//__________________________________________________________________________________________________________________________________________________________




if(!empty($_POST['polje-trazi'])){
    $poljeTrazi1 = $_POST['polje-trazi'];
    //$poljeTrazi = preg_replace("#[^0-9a-z]#i","",$poljeTrazi1);
    $poljeTrazi = mysqli_real_escape_string($link,$_POST['polje-trazi']);
    //$poljeTrazi = preg_replace($reg_exp, $replacment, $poljeTrazi);
    //$robot = "img/animacija_2.gif";
    $hideComm = "display: none";
    $page = 1;
}else{
  if(!empty($_GET['poljetrazi'])){
    $poljeTrazi1 = $_GET['poljetrazi'];
    //$poljeTrazi = preg_replace("#[^0-9a-z]#i","",$poljeTrazi1);
    $poljeTrazi = mysqli_real_escape_string($link,$_GET['poljetrazi']);
    //$poljeTrazi = preg_replace($reg_exp, $replacment, $poljeTrazi);
    //$robot = "img/animacija_2.gif";
    $hideComm = "display: none";
  }else{

    $sqlobjfindHome = "SELECT objave.ID, objave.IDuser, users.pravnofizicko, objave.IDobjave, objave.naslov, objave.IDkategorije, kategorije.nazivkategorije,
    objave.IDgrad, gradovi.grad, gradovi.langrad, gradovi.lnggrad, gradovi.zoom, objave.adresa, objave.tel, objave.email, objave.web,
    objave.pon, objave.uto, objave.sri, objave.cet, objave.pet, objave.sub, objave.ned, objave.radnovrijemeod, objave.radnovrijemedo,
    objave.kljuc, objave.opis, objave.rateup, objave.ratedown, objave.rate, objave.lant, objave.lng, users.IDpaid, objave.IDactive,
    objave.datetime, active.active FROM objave
    INNER JOIN gradovi ON objave.IDgrad=gradovi.IDgrad
    INNER JOIN users ON objave.IDuser=users.IDuser
    INNER JOIN kategorije ON objave.IDkategorije=kategorije.IDkategorije
    INNER JOIN active ON objave.IDactive=active.IDactive
    WHERE objave.IDactive=1 ORDER BY users.IDpaid DESC, objave.ID DESC LIMIT $start, $limit";
    $hideComm = "display: none";

    $sqlobjfindHomePage = "SELECT objave.ID, objave.IDuser, users.pravnofizicko, objave.IDobjave, objave.naslov, objave.IDkategorije, kategorije.nazivkategorije,
    objave.IDgrad, gradovi.grad, gradovi.langrad, gradovi.lnggrad, gradovi.zoom, objave.adresa, objave.tel, objave.email, objave.web,
    objave.pon, objave.uto, objave.sri, objave.cet, objave.pet, objave.sub, objave.ned, objave.radnovrijemeod, objave.radnovrijemedo,
    objave.kljuc, objave.opis, objave.rateup, objave.ratedown, objave.rate, objave.lant, objave.lng, users.IDpaid, objave.IDactive,
    objave.datetime, active.active FROM objave
    INNER JOIN gradovi ON objave.IDgrad=gradovi.IDgrad
    INNER JOIN users ON objave.IDuser=users.IDuser
    INNER JOIN kategorije ON objave.IDkategorije=kategorije.IDkategorije
    INNER JOIN active ON objave.IDactive=active.IDactive
    WHERE objave.IDactive=1 ORDER BY users.IDpaid DESC, objave.ID DESC";

    $sqlPj1 = "SELECT * FROM poslovnejedinice
    INNER JOIN gradovi ON poslovnejedinice.IDgrad=gradovi.IDgrad
    INNER JOIN objave ON poslovnejedinice.IDobjave=objave.ID";

    //$css = "css/styleindexnewfind.css";

    if($resultsqlPj1 = mysqli_query($link,$sqlPj1)){
      while ($rowsqlPj1 = mysqli_fetch_assoc($resultsqlPj1)) {
        $ArrayPj1[] = $rowsqlPj1;
      }
    }

    goto e1;
  }

}





if(isset($_POST['grad'])){
  $gradFind = $_POST['grad'];
  $grad = $gradFind;
}else{
      if(isset($_GET['grad'])){
        $gradFind = $_GET['grad'];
        $grad = $gradFind;
      }else{
        goto e1;
      }
}



if($grad == "BiH"){

$sqlPj1 = "SELECT * FROM poslovnejedinice
INNER JOIN gradovi ON poslovnejedinice.IDgrad=gradovi.IDgrad
INNER JOIN objave ON poslovnejedinice.IDobjave=objave.ID";

if($resultsqlPj1 = mysqli_query($link,$sqlPj1)){
  while ($rowsqlPj1 = mysqli_fetch_assoc($resultsqlPj1)) {
    //$ArrayPj1[] = $rowsqlPj1;
  }
}


}else{

  $sqlPj1 = "SELECT * FROM poslovnejedinice
  INNER JOIN gradovi ON poslovnejedinice.IDgrad=gradovi.IDgrad
  INNER JOIN objave ON poslovnejedinice.IDobjave=objave.ID WHERE gradovi.grad='$grad'";

  if($resultsqlPj1 = mysqli_query($link,$sqlPj1)){
    while ($rowsqlPj1 = mysqli_fetch_assoc($resultsqlPj1)) {
      //$ArrayPj1[] = $rowsqlPj1;
    }
  }

}


    if($grad == "BiH"){

      $sqlobjfind = "SELECT objave.ID, objave.IDuser, users.pravnofizicko, objave.IDobjave, objave.naslov, objave.IDkategorije, kategorije.nazivkategorije,
      objave.IDgrad, gradovi.grad, gradovi.langrad, gradovi.lnggrad, gradovi.zoom, objave.adresa, objave.tel, objave.email, objave.web,
      objave.pon, objave.uto, objave.sri, objave.cet, objave.pet, objave.sub, objave.ned, objave.radnovrijemeod, objave.radnovrijemedo,
      objave.kljuc, objave.opis, objave.rateup, objave.ratedown, objave.rate, objave.lant, objave.lng, users.IDpaid, objave.IDactive,
      objave.datetime, active.active FROM objave
      INNER JOIN gradovi ON objave.IDgrad=gradovi.IDgrad
      INNER JOIN users ON objave.IDuser=users.IDuser
      INNER JOIN kategorije ON objave.IDkategorije=kategorije.IDkategorije
      INNER JOIN active ON objave.IDactive=active.IDactive WHERE (objave.IDactive=1) AND (";



        if(substr_count($poljeTrazi," ") > 0){
          $test11 = substr_count($poljeTrazi," ");
          $poljeTraziE = explode(" ", $poljeTrazi);
          $i = 0;
          foreach($poljeTraziE as $poljeTrazi2){
            $i++;
            if($i==1){
              $sqlobjfind .= "nazivkategorije LIKE '%$poljeTrazi2%'
              OR naslov LIKE '%$poljeTrazi2%' OR kljuc LIKE '%$poljeTrazi2%' OR opis LIKE '%$poljeTrazi2%'
              OR gradovi.grad LIKE '%$poljeTrazi2%' ";
            }else{
              $sqlobjfind .= "OR nazivkategorije LIKE '%$poljeTrazi2%'
              OR naslov LIKE '%$poljeTrazi2%' OR kljuc LIKE '%$poljeTrazi2%' OR opis LIKE '%$poljeTrazi2%'
              OR gradovi.grad LIKE '%$poljeTrazi2%' ";
            }
          }


          $sqlobjfind .= ") ORDER BY ";

          $i = 0;
          foreach($poljeTraziE as $poljeTrazi2){
            $i++;
            if($i==1){
              $sqlobjfind .= "+";
              $sqlobjfind .= "if(naslov LIKE '%$poljeTrazi2%',1,0)";


            }else{

              $sqlobjfind .= "+";
              $sqlobjfind .= "if(naslov LIKE '%$poljeTrazi2%',1,0)";

            }
          }


          $sqlobjfind .= " DESC, users.IDpaid DESC, objave.ID DESC";

          $sqlobjfindPage = $sqlobjfind;

          $css = "css/styleindexnewfind.css";


          $sqlobjfind .= " LIMIT $start, $limit";

        }else{



        if(substr_count($poljeTrazi,",") > 0){
          $test11 = substr_count($poljeTrazi,",");
          $poljeTraziE = explode(",", $poljeTrazi);
          $i = 0;
          foreach($poljeTraziE as $poljeTrazi2){
            $i++;
            if($i==1){
              $sqlobjfind .= "nazivkategorije LIKE '%$poljeTrazi2%'
              OR naslov LIKE '%$poljeTrazi2%' OR kljuc LIKE '%$poljeTrazi2%' OR opis LIKE '%$poljeTrazi2%'
              OR gradovi.grad LIKE '%$poljeTrazi2%' ";
            }else{
              $sqlobjfind .= "OR nazivkategorije LIKE '%$poljeTrazi2%'
              OR naslov LIKE '%$poljeTrazi2%' OR kljuc LIKE '%$poljeTrazi2%' OR opis LIKE '%$poljeTrazi2%'
              OR gradovi.grad LIKE '%$poljeTrazi2%' ";
            }
          }

          $sqlobjfind .= ") ORDER BY ";

          $i = 0;
          foreach($poljeTraziE as $poljeTrazi2){
            $i++;
            if($i==1){

              $sqlobjfind .= "+";
              $sqlobjfind .= "if(naslov LIKE '%$poljeTrazi2%',1,0)";

            }else{

              $sqlobjfind .= "+";
              $sqlobjfind .= "if(naslov LIKE '%$poljeTrazi2%',1,0)";

            }
          }


          $sqlobjfind .= " DESC, users.IDpaid DESC, objave.ID DESC";

          $sqlobjfindPage = $sqlobjfind;

          $css = "css/styleindexnewfind.css";


          $sqlobjfind .= " LIMIT $start, $limit";

        }else{

          $sqlobjfind = "SELECT objave.ID, objave.IDuser, users.pravnofizicko, objave.IDobjave, objave.naslov, objave.IDkategorije, kategorije.nazivkategorije,
          objave.IDgrad, gradovi.grad, gradovi.langrad, gradovi.lnggrad, gradovi.zoom, objave.adresa, objave.tel, objave.email, objave.web,
          objave.pon, objave.uto, objave.sri, objave.cet, objave.pet, objave.sub, objave.ned, objave.radnovrijemeod, objave.radnovrijemedo,
          objave.kljuc, objave.opis, objave.rateup, objave.ratedown, objave.rate, objave.lant, objave.lng, users.IDpaid, objave.IDactive,
          objave.datetime, active.active FROM objave
          INNER JOIN gradovi ON objave.IDgrad=gradovi.IDgrad
          INNER JOIN users ON objave.IDuser=users.IDuser
          INNER JOIN kategorije ON objave.IDkategorije=kategorije.IDkategorije
          INNER JOIN active ON objave.IDactive=active.IDactive
          WHERE (objave.IDactive=1) AND (nazivkategorije LIKE '%$poljeTrazi%'
          OR naslov LIKE '%$poljeTrazi%' OR kljuc LIKE '%$poljeTrazi%' OR opis LIKE '%$poljeTrazi%'
          OR gradovi.grad LIKE '%$poljeTrazi%') ORDER BY if(objave.naslov LIKE '%$poljeTrazi%',1,0) DESC, users.IDpaid DESC, objave.ID DESC";

          $sqlobjfindPage = $sqlobjfind;


          $sqlobjfind .= " LIMIT $start, $limit";

          $css = "css/styleindexnewfind.css";


        }

        }

    }else{

            $sqlPj1 = "SELECT * FROM poslovnejedinice
            INNER JOIN gradovi ON poslovnejedinice.IDgrad=gradovi.IDgrad
            INNER JOIN objave ON poslovnejedinice.IDobjave=objave.ID
            WHERE gradovi.grad='$gradFind'";

            if($resultsqlPj1 = mysqli_query($link,$sqlPj1)){
              while ($rowsqlPj1 = mysqli_fetch_assoc($resultsqlPj1)) {
                $IDobjavePj1 = $rowsqlPj1['ID'];
                $ArrayPj1[] = $rowsqlPj1;
              }
            }

            //echo $IDobjavePj1;


            $sqlobjfind = "SELECT objave.ID, objave.IDuser, users.pravnofizicko, objave.IDobjave, objave.naslov, objave.IDkategorije, kategorije.nazivkategorije,
            objave.IDgrad, gradovi.grad, gradovi.langrad, gradovi.lnggrad, gradovi.zoom, objave.adresa, objave.tel, objave.email, objave.web,
            objave.pon, objave.uto, objave.sri, objave.cet, objave.pet, objave.sub, objave.ned, objave.radnovrijemeod, objave.radnovrijemedo,
            objave.kljuc, objave.opis, objave.rateup, objave.ratedown, objave.rate, objave.lant, objave.lng, users.IDpaid, objave.IDactive,
            objave.datetime, active.active FROM objave
            INNER JOIN gradovi ON objave.IDgrad=gradovi.IDgrad
            INNER JOIN users ON objave.IDuser=users.IDuser
            INNER JOIN kategorije ON objave.IDkategorije=kategorije.IDkategorije
            INNER JOIN active ON objave.IDactive=active.IDactive
            WHERE (gradovi.grad='$gradFind' OR objave.ID='$IDobjavePj1') AND (objave.IDactive=1) AND (";



              if(substr_count($poljeTrazi," ") > 0){
                $test11 = substr_count($poljeTrazi," ");
                $poljeTraziE = explode(" ", $poljeTrazi);
                $i = 0;
                foreach($poljeTraziE as $poljeTrazi2){
                  $i++;
                  if($i==1){
                    $sqlobjfind .= "nazivkategorije LIKE '%$poljeTrazi2%'
                    OR naslov LIKE '%$poljeTrazi2%' OR kljuc LIKE '%$poljeTrazi2%' OR opis LIKE '%$poljeTrazi2%'
                    OR gradovi.grad LIKE '%$poljeTrazi2%' ";
                  }else{
                    $sqlobjfind .= "OR nazivkategorije LIKE '%$poljeTrazi2%'
                    OR naslov LIKE '%$poljeTrazi2%' OR kljuc LIKE '%$poljeTrazi2%' OR opis LIKE '%$poljeTrazi2%'
                    OR gradovi.grad LIKE '%$poljeTrazi2%' ";
                  }
                }

                $sqlobjfind .= ") ORDER BY ";

                $i = 0;
                foreach($poljeTraziE as $poljeTrazi2){
                  $i++;
                  if($i==1){

                    $sqlobjfind .= "+";
                    $sqlobjfind .= "if(naslov LIKE '%$poljeTrazi2%',1,0)";


                  }else{

                    $sqlobjfind .= "+";
                    $sqlobjfind .= "if(naslov LIKE '%$poljeTrazi2%',1,0)";

                  }
                }


                $sqlobjfind .= " DESC, users.IDpaid DESC, objave.ID DESC";

                $sqlobjfindPage = $sqlobjfind;


                $sqlobjfind .= " LIMIT $start, $limit";

                $css = "css/styleindexnewfind.css";


              }else{



              if(substr_count($poljeTrazi,",") > 0){
                $test11 = substr_count($poljeTrazi,",");
                $poljeTraziE = explode(",", $poljeTrazi);
                $i = 0;
                foreach($poljeTraziE as $poljeTrazi2){
                  $i++;
                  if($i==1){
                    $sqlobjfind .= "nazivkategorije LIKE '%$poljeTrazi2%'
                    OR naslov LIKE '%$poljeTrazi2%' OR kljuc LIKE '%$poljeTrazi2%' OR opis LIKE '%$poljeTrazi2%'
                    OR gradovi.grad LIKE '%$poljeTrazi2%' ";
                  }else{
                    $sqlobjfind .= "OR nazivkategorije LIKE '%$poljeTrazi2%'
                    OR naslov LIKE '%$poljeTrazi2%' OR kljuc LIKE '%$poljeTrazi2%' OR opis LIKE '%$poljeTrazi2%'
                    OR gradovi.grad LIKE '%$poljeTrazi2%' ";
                  }
                }


                $sqlobjfind .= ") ORDER BY ";

                $i = 0;
                foreach($poljeTraziE as $poljeTrazi2){
                  $i++;
                  if($i==1){

                    $sqlobjfind .= "+";
                    $sqlobjfind .= "if(naslov LIKE '%$poljeTrazi2%',1,0)";


                  }else{

                    $sqlobjfind .= "+";
                    $sqlobjfind .= "if(naslov LIKE '%$poljeTrazi2%',1,0)";

                  }
                }


                $sqlobjfind .= " DESC, users.IDpaid DESC, objave.ID DESC";

                $sqlobjfindPage = $sqlobjfind;

                $css = "css/styleindexnewfind.css";


                $sqlobjfind .= " LIMIT $start, $limit";

              }else{


                $sqlobjfind = "SELECT objave.ID, objave.IDuser, users.pravnofizicko, objave.IDobjave, objave.naslov, objave.IDkategorije, kategorije.nazivkategorije,
                objave.IDgrad, gradovi.grad, gradovi.langrad, gradovi.lnggrad, gradovi.zoom, objave.adresa, objave.tel, objave.email, objave.web,
                objave.pon, objave.uto, objave.sri, objave.cet, objave.pet, objave.sub, objave.ned, objave.radnovrijemeod, objave.radnovrijemedo,
                objave.kljuc, objave.opis, objave.rateup, objave.ratedown, objave.rate, objave.lant, objave.lng, users.IDpaid, objave.IDactive,
                objave.datetime, active.active FROM objave
                INNER JOIN gradovi ON objave.IDgrad=gradovi.IDgrad
                INNER JOIN users ON objave.IDuser=users.IDuser
                INNER JOIN kategorije ON objave.IDkategorije=kategorije.IDkategorije
                INNER JOIN active ON objave.IDactive=active.IDactive
                WHERE (gradovi.grad='$gradFind' OR objave.ID='$IDobjavePj1') AND (objave.IDactive=1)
                AND (nazivkategorije LIKE '%$poljeTrazi%' OR naslov LIKE '%$poljeTrazi%'
                OR kljuc LIKE '%$poljeTrazi%' OR opis LIKE '%$poljeTrazi%'
                OR gradovi.grad LIKE '%$poljeTrazi%') ORDER BY if(objave.naslov LIKE '%$poljeTrazi%',1,0) DESC, users.IDpaid DESC, objave.ID DESC";

                $sqlobjfindPage = $sqlobjfind;

                $css = "css/styleindexnewfind.css";


                $sqlobjfind .= " LIMIT $start, $limit";




              }
          }
    }







      if(mysqli_query($link,$sqlobjfind)){
        $Objfindresult=mysqli_query($link,$sqlobjfind);
        $countobjave = mysqli_num_rows($Objfindresult);



      }

      if($countobjave < 1){
        $robot = "img/animacija_4.gif";
        $hideComm = "display: inline-block";
        $red1 = "Nema rezultata za";
        $red2 = "pojam koji ste unijeli ili izabrali !";
        $red3 = "";
        $red4 = "U toku je popunjavanje naše baze podataka.";
        $findrez = 2;
        $ArrayPj1 = null;
        $css = "css/styleindexnew.css";

        goto e2;
      }else{
        $findrez = 1;
        goto e2;
      }

      $findResultarray = array();
      $markers = array();
//}

e1:


if(mysqli_query($link,$sqlobjfindHome)){
  $Objfindresult=mysqli_query($link,$sqlobjfindHome);
  $countobjave = mysqli_num_rows($Objfindresult);

  //if($countobjave < 1){
    //$findrez = 2;

  //}else{
  //  $findrez = 1;
    //}
}

e2:

//__________pagination_______________________________________________________________


if(isset($sqlobjfindHomePage)){
  $ObjfindresultPage=mysqli_query($link,$sqlobjfindHomePage);
  $countobjavePage = mysqli_num_rows($ObjfindresultPage);
}elseif(isset($sqlobjfindPage)){
  $ObjfindresultPage=mysqli_query($link,$sqlobjfindPage);
  $countobjavePage = mysqli_num_rows($ObjfindresultPage);

}



$total = $countobjavePage; //$custCount[0]['ID'];
$pages = ceil( $total / $limit );

if($page == 1){
  $Previous = 1;
}else{
$Previous = $page - 1;
}

if($page == $pages){
  $Next = $pages;
}else{
$Next = $page + 1;
}


//___________________________________________________________________________________

?>
