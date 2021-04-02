<?php
require_once("config.php");
include("session.php");
//include("BaseXClient.php");
include("eXist.php");

$ERR = 0;

function myErrorHandler($errno, $errstr, $errfile, $errline, $ERR) {
    global $ERR;
    error_log("Error validando XML: " . $errstr);
    $ERR = 1;
}

function valida($xml_doc) {
    $xml = new DOMDocument; 
    $xml->loadXML($xml_doc); 
    set_error_handler("myErrorHandler");
    $res = $xml->relaxNGValidate("myTEI.rng");
}


$file_size = $_SERVER["CONTENT_LENGTH"];
$rawData = file_get_contents("php://input", NULL, NULL, -1, $file_size);
$fileName = $fecha=date("YmdHis") . ".xml";
if (file_put_contents($XML_PATH . "/$fileName", $rawData) != $file_size) {
    error_log("Error escribiendo fichero xml en disco");
    echo '{"status":"ERR", "desc":"Error escribiendo fichero xml en disco"}';
    die;
}
valida($rawData);
if ($ERR == 0) {
    // Guardamos en eXist
    $oExist = new eXist("admin", "admin");
    $oExist->setURL("http://localhost:8080/exist/rest/db/apps/dialogo/data/" . $fileName );
    $res = $oExist->save($rawData);
    error_log("eXist->save: " . $res);
    echo '{"status":"OK", "desc":"OK"}';
} else {
    echo '{"status":"ERR", "desc":"Error validando RelaxNG"}';
}

?>
