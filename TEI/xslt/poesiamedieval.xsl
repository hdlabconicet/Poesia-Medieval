<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xmlns:xs="http://www.w3.org/2001/XMLSchema"
    xpath-default-namespace="http://www.tei-c.org/ns/1.0"
    exclude-result-prefixes="xs"
    version="2.0"
    xmlns="http://www.w3.org/1999/xhtml"
    >
    
    <xsl:output method="html" encoding="utf-8" omit-xml-declaration="yes"></xsl:output>
    
    <xsl:template match="/">
        <xsl:variable name="doc_id" select="//msItem/idno"/> <!-- Recuperamos el id del documento en una variable para nombrar el archivo de salida -->
        <!-- Redirigir el resultado hacia un archivo -->        
        <xsl:result-document method="html" encoding="utf-8"
            href="../_preguntas_respuestas/{$doc_id}-83.GC.html" omit-xml-declaration="yes">
---
layout: pregunta_respuesta
title: <xsl:apply-templates select="//title[1]"/> / Fray Pedro señor, aqueste respeto
permalink: <xsl:apply-templates select="//msItem/idno"/>-83/
type: pregunta/respuesta
button: siquieromiboton
---
        <div class="row clearfix">
        <div class="col-left px-3">
            <p class="rubrica">
                <xsl:apply-templates select="//body/head"/>
            </p>
        </div>
        </div>
        
        <div class="row clearfix">
        <div class="col-left px-3">
            <xsl:apply-templates select="//lg[1]"/>
        </div>
        </div>  
        
            <xsl:apply-templates select="//lg"/> <!-- Indicamos que las transformaciones de abajo se van a aplicar al elemento lg -->
            
        </xsl:result-document>
        <!-- Redirigir el resultado hacia un archivo -->
    </xsl:template>
    
    
    <!-- Transformaciones -->
    <xsl:template match="//lg//lg">
        <div class="estrofa">
            <p class="info">
            <xsl:value-of select="concat('Tipo de estrofa: ', @type, '; esquema métrico: ', @met, '; esquema rimático: ', @rhyme)"/>
            </p>
            <xsl:apply-templates/>
        </div>
    </xsl:template>
   
   
   
    <xsl:template match="//lg//l">
        <p class="verso">
            <xsl:apply-templates/>
        </p>
    </xsl:template>
   
   
   
    <xsl:template match="//rhyme">
        <span> 
            <xsl:attribute name="class">
                <xsl:value-of select="concat('rima_', @label)"/>
            </xsl:attribute>
            <xsl:apply-templates/>
        </span>
    </xsl:template>   
   
 
   
</xsl:stylesheet>