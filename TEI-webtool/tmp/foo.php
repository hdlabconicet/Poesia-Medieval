<?php

// XML
$xml_doc = new DOMDocument();
$xml_doc->load("das2.xml");


// XSL
$xsl_doc = new DOMDocument();
$xsl_doc->load("prueba.xsl");

// Proc
$proc = new XSLTProcessor();
$proc->importStylesheet($xsl_doc);
$newdom = $proc->transformToDoc($xml_doc);

print $newdom->saveXML();

?>

