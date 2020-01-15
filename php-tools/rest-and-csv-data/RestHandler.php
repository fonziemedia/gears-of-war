<?php

require_once("SimpleRest.php");
require_once("DataDolla.php");

class RestHandler extends SimpleRest {

    public function encodeHtml($responseData) {

        $htmlResponse = "<table border='1'>";
        foreach ($responseData as $key => $value) {
            $htmlResponse .= "<tr><td>" . $key . "</td><td>" . $value . "</td></tr>";
        }
        $htmlResponse .= "</table>";
        return $htmlResponse;
    }

    public function encodeJson($responseData) {
        $jsonResponse = json_encode($responseData);
        return $jsonResponse;
    }

    public function encodeXml($responseData) {
        // creating object of SimpleXMLElement
        $xml = new SimpleXMLElement('<?xml version="1.0"?><mobile></mobile>');
        foreach ($responseData as $key => $value) {
            $xml->addChild($key, $value);
        }
        return $xml->asXML();
    }

    public function getDataDolla($name) {
        $comPoints = new DataDolla();
        $rawData = $comPoints->getDataDolla($name);
        //echo("<pre>");
        //print_r($rawData);
        //die();
        if (($rawData == false)) {
            $statusCode = 404;
            $rawData = array('result' => false, 'error' => 'user not found');
        } else {
            $statusCode = 200;
            $rawData = array('result' => true, 'data' => $rawData);
        }

        //$requestContentType = $_SERVER['HTTP_ACCEPT'];
        $requestContentType = 'application/json';
        $this->setHttpHeaders($requestContentType, $statusCode);
        $response = $this->encodeJson($rawData);        
        echo $response;

        /*
          if (strpos($requestContentType, 'application/json') !== false) {
          $response = $this->encodeJson($rawData);
          echo $response;
          } else if (strpos($requestContentType, 'text/html') !== false) {
          //$response = $this->encodeHtml($rawData);
          $response = $this->encodeJson($rawData);
          echo $response;
          } else if (strpos($requestContentType, 'application/xml') !== false) {
          $response = $this->encodeXml($rawData);
          echo $response;
          }
         * 
         */
    }

}

?>