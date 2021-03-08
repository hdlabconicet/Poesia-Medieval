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
$fecha = date("YmdHis");
$fileNameAux = $fecha . "-" . rand() . ".dat";
if (file_put_contents($XML_PATH . "/$fileNameAux", $rawData) != $file_size) {
    error_log("Error escribiendo fichero .dat en disco");
}
$xml=simplexml_load_string($rawData);
if (!$xml) {
    error_log("Error en xml=simplexml_load_string");
    echo '{"status":"ERR", "desc":"XML incorrecto"}';
    die;
}
$title = strtolower($xml->teiHeader->fileDesc->titleStmt->title[0]);
$fileName = preg_replace('/\W/', '', $title) . ".xml";
//$fileName = $fecha=date("YmdHis") . ".xml";
if (file_put_contents($XML_PATH . "/$fileName", $rawData) != $file_size) {
    error_log("Error escribiendo fichero xml en disco");
    echo '{"status":"ERR", "desc":"Error escribiendo fichero xml en disco"}';
    die;
}
valida($rawData);
if ($ERR == 0 || $DEVMODE == "1") {
    // Guardamos en eXist
    error_log("\n\nValida RNG OK: Guardando en eXist\n\n");
    $oExist = new eXist($EXIST_USER, $EXIST_PASS);
    $oExist->setURL($EXIST_URL . "/data/" . $fileName );
    $res = $oExist->save($rawData);
    if ($res == 200 | $res == 201) {
        echo '{"status":"OK", "desc":"OK"}';
    } else {
        error_log("eXist->save: " . $res);
        echo '{"status":"ERR", "desc":"Error guardando en eXist-db"}';
    }
} else {
    // Guardamos en eXist pero el XML no responde al RNG
    error_log("\n\nValida RNG NOK: Guardando en eXist\n\n");
    $oExist = new eXist($EXIST_USER, $EXIST_PASS);
    $oExist->setURL($EXIST_URL . "/data/" . $fileName );
    $res = $oExist->save($rawData);
    if ($res == 200 | $res == 201) {
        echo '{"status":"ERR", "desc":"OK pero el XML no responde al RNG"}';
    } else {
        error_log("eXist->save: " . $res);
        echo '{"status":"ERR", "desc":"Error guardando en eXist-db"}';
    }
}

?>
