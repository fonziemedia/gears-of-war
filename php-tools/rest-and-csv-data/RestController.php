<?php
header("Access-Control-Allow-Origin: *");
require_once("RestHandler.php");

$view = "";
if (isset($_GET["view"]))
    $view = $_GET["view"];
/*
  controls the RESTful services
  URL mapping
 */
switch ($view) {

    case "datadolla":
        // to handle REST Url /mobile/show/<id>/        
        if (isset($_GET["name"])) {
            $RestHandler = new RestHandler();
            $RestHandler->getDataDolla($_GET["name"]);
        }
        break;

    case "" :
        //404 - not found;
        break;
}
?>