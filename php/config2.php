<?php

if(isset($_GET['id'])){
  $IDizabOglasa = $_GET['id'];
}else{
  $IDizabOglasa = "0";
}


//read gradovi from gradovi
$queryg = "SELECT * FROM gradovi ORDER BY grad ASC";
$resultg = mysqli_query($link,$queryg);
$grad = "BiH";

$sqloglasi= "SELECT oglasi.IDoglasa, oglasi.IDuser, oglasi.naslov, oglasi.tekstoglasa, oglasi.IDactive,
oglasi.datetime, users.IDpaid FROM oglasi
INNER JOIN users ON oglasi.IDuser=users.IDuser
WHERE IDactive=1
ORDER BY users.IDpaid DESC, oglasi.IDoglasa DESC LIMIT 15";
$Oglfindresult=mysqli_query($link,$sqloglasi);
$countoglasi=mysqli_num_rows($Oglfindresult);

$sqloglasiuvecano = "SELECT oglasi.IDoglasa, oglasi.IDuser, oglasi.naslov, oglasi.tekstoglasa, oglasi.IDactive,
oglasi.datetime, users.IDpaid FROM oglasi
INNER JOIN users ON oglasi.IDuser=users.IDuser
WHERE IDactive=1
ORDER BY users.IDpaid DESC, oglasi.IDoglasa DESC";
$Oglfindresultuvecano = mysqli_query($link, $sqloglasiuvecano);
$countoglasiuvecano = mysqli_num_rows($Oglfindresultuvecano);




$sqlnovosti="SELECT * FROM objave WHERE IDactive=1";
$Novostifindresult=mysqli_query($link,$sqlnovosti);
$countnovosti=mysqli_num_rows($Novostifindresult);

$queryizg = "SELECT * FROM gradovi ORDER BY grad ASC";
$resultizg = mysqli_query($link,$queryizg);

while($rowizg=mysqli_fetch_assoc($resultizg)){

  $izgResultarray[] = $rowizg;

  }

  $izG = json_encode($izgResultarray);

  if(isset($_SESSION['IDusvr'])){
    if($_SESSION['IDusvr'] == 5){
      $showOnline = "";
    }else{
      $showOnline = "hidden";
    }
    }else{
      $showOnline = "hidden";
  }

?>
