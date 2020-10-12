<?php

date_default_timezone_set("Europe/Sarajevo");
$onlinesession = session_id();
$onlinetime = time();


require_once("config.php");
require_once('userinfo/UserInfo.php');


// gets the user IP Address
$user_ip = UserInfo::get_ip();
$user_devices = UserInfo::get_device();
$user_os = UserInfo::get_os();
$user_browser = UserInfo::get_browser();
$IDuseronline = 0;
$datetime = date("Y/m/d H:i:s");
$countonline = NULL;


if(isset($_SESSION["IDuser"])){
  $IDuseronline = $_SESSION["IDuser"];
}


$sqlonline1 = "SELECT * FROM onlinevisitor WHERE session='$onlinesession'";

if(!mysqli_query($link,$sqlonline1)){
  echo "nemože sqlonline1";
}else{
  $resultonline1 = mysqli_query($link,$sqlonline1);
  $countonline = mysqli_num_rows($resultonline1);
}



if($countonline == NULL){

    $sql3 = "INSERT INTO onlinevisitor (userip, device, os, browser, IDuser, datetime, session, time)
    VALUES ('$user_ip','$user_devices','$user_os','$user_browser','$IDuseronline','$datetime','$onlinesession','$onlinetime')";

    if(!mysqli_query($link,$sql3)){
      goto ee;
      }

  }else{
    $sql4 = "UPDATE onlinevisitor SET time='$onlinetime', IDuser='$IDuseronline' WHERE session='$onlinesession'";

    if(!mysqli_query($link,$sql4)){
      goto ee;
      }

  }

  $sqlonline1 = "SELECT * FROM onlinevisitor";
  $resultonline1 = mysqli_query($link,$sqlonline1);
  $countonline = mysqli_num_rows($resultonline1);

  $sqlregister1 = "SELECT * FROM users";
  $resultregister1 = mysqli_query($link,$sqlregister1);
  $numregister = mysqli_num_rows($resultregister1);


ee:

$numonlinevisitor = $countonline;

$sql5 = "SELECT * FROM onlinevisitor WHERE time < '$onlinetime'-300";

if(mysqli_query($link,$sql5)){

  $resultsql5 = mysqli_query($link,$sql5);

  while($rowgsql5=mysqli_fetch_array($resultsql5)){

    $sql5a = "INSERT INTO totalvisitor (userip, device, os, browser, IDuser, datetime, session, time, closesession)
    VALUES ('$rowgsql5[1]','$rowgsql5[2]','$rowgsql5[3]','$rowgsql5[4]','$rowgsql5[5]','$rowgsql5[6]','$rowgsql5[7]','$rowgsql5[8]','$datetime')";

    if(mysqli_query($link,$sql5a)){
      $sql6 = "DELETE FROM onlinevisitor WHERE session='$rowgsql5[7]'";
      if(!mysqli_query($link,$sql6)){

        }
    }

  }


}




?>
