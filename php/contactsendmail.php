
<?php

define('SITE_KEY', '6Ldd9rkUAAAAACccBXM5eEBlUwCe8zapn2hyT6cX');
define('SECRET_KEY', '6Ldd9rkUAAAAAGrTJPjQ5WkQZOqAVzqKJ5cSDvYd');

$resultsendmail = "";
$ime = "";
$prezime = "";
$email = "";
$nazivf = "";
$web = "";
$message = "";
$adresa = "";
$rsultSecure = "";



if(isset($_POST['send'])){

  if(isset($_POST['ime']) && !empty($_POST['ime'])){
    $ime = $_POST['ime'];
  }else{
    $resultsendmail = "Morate unijeti ime !";
    goto e;
  }

  if(isset($_POST['prezime']) && !empty($_POST['prezime'])){
    $prezime = $_POST['prezime'];
  }else{
    $resultsendmail = "Morate unijeti prezime !";
    goto e;
  }

  if(isset($_POST['email']) && !empty($_POST['email'])){
    $email = $_POST['email'];
  }else{
    $resultsendmail = "Morate unijeti e-mail !";
    goto e;
  }

  $adresa = $_POST['adresa'];
  $nazivf = $_POST['nazivf'];
  $web = $_POST['web'];



  if(isset($_POST['message']) && !empty($_POST['message'])){
    $message = $_POST['message'];
  }else{
    $resultsendmail = "Morate unijeti tekst poruke !";
    goto e;
  }





  function getCaptcha($SecretKey){
    $Response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".SECRET_KEY."&response={$SecretKey}");
    $Return = json_decode($Response);
    return $Return;
  }
  $Return = getCaptcha($_POST['g-recaptcha-response']);

  if($Return->success == true && $Return->score > 0.5){
    $resultsendmail = "Uspješno poslan e-mail !!!";
  }else{
    $resultsendmail = "Neuspješno slanje e-mail poruke, pokušajte ponovo !!!!";
    $rsultSecure = "style='display: none;'";
    goto e;
  }



  require_once "sendmail2.php";

}

e:


?>
