<?php

switch ($cone) {

  

  case "planta":

    $serverName = "192.168.16.5\SQLEXPRESS";
    $conecctionInfo = array("Database"=>"CERVALLE_CONSOLIDADA","UID"=>"sac","PWD"=>"2016","CharacterSet"=>"UTF-8");
    $con = sqlsrv_connect($serverName,$conecctionInfo);

  break;

  case "santa_elena":

    $serverName = "192.168.5.2\SQLEXPRESS";
    $conecctionInfo = array("Database"=>"santa_elena","UID"=>"sac","PWD"=>"2016","CharacterSet"=>"UTF-8");
    $con = sqlsrv_connect($serverName,$conecctionInfo);

   break;

  case "alameda":

    $serverName = "192.168.2.2\SQLEXPRESS";
    $conecctionInfo = array("Database"=>"alameda","UID"=>"sac","PWD"=>"2016","CharacterSet"=>"UTF-8");
    $con = sqlsrv_connect($serverName,$conecctionInfo);

   break;

   case "independencia":

    $serverName = "192.168.3.250\SQLEXPRESS";
    $conecctionInfo = array("Database"=>"CERVALLE3","UID"=>"sac","PWD"=>"2016","CharacterSet"=>"UTF-8");
    $con = sqlsrv_connect($serverName,$conecctionInfo);

   break;

   case "santa_monica":

    $serverName = "192.168.4.2\SQLEXPRESS";
    $conecctionInfo = array("Database"=>"santa_monica","UID"=>"sac","PWD"=>"2016","CharacterSet"=>"UTF-8");
    $con = sqlsrv_connect($serverName,$conecctionInfo);

   break;

   case "cdjardin":

    $serverName = "192.168.6.2\SQLEXPRESS";
    $conecctionInfo = array("Database"=>"cdjardin","UID"=>"sac","PWD"=>"2016","CharacterSet"=>"UTF-8");
    $con = sqlsrv_connect($serverName,$conecctionInfo);

   break;

   case "caney":

    $serverName = "192.168.30.2\SQLEXPRESS";
    $conecctionInfo = array("Database"=>"caney","UID"=>"sac","PWD"=>"2016","CharacterSet"=>"UTF-8");
    $con = sqlsrv_connect($serverName,$conecctionInfo);

   break;

  default:
    echo "No escogio";
}
    
    
   
    

 

?>
