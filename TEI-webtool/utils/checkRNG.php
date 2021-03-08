<?php

$ERR = 0;
function myErrorHandler($errno, $errstr, $errfile, $errline, $ERR) {
    global $ERR;
    echo $errstr . "<br/>";
    $ERR = 1;
}

function valida($xml_doc) {
    $xml = new DOMDocument; 
    $xml->loadXML($xml_doc); 
    set_error_handler("myErrorHandler");
    $res = $xml->relaxNGValidate("schema.rng");
}

move_uploaded_file($_FILES["xml"]["tmp_name"], "data.xml");
move_uploaded_file($_FILES["rng"]["tmp_name"], "schema.rng");
$xml=file_get_contents("data.xml");

echo "<html>";
echo "<body>";
echo "<a href='data.xml'>Fichero XML</a> | <a href='schema.rng'>Fichero RNG</a> | <a href='checkRNG.html'>Comprobar m&aacute;s ficheros</a><br/><hr/>";

valida($xml);
if ($ERR == 0) {
    echo "<p>Fichero OK</p>";
}

echo "</body>";
echo "</html>"

?>
