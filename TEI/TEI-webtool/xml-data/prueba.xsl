<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html"/>

    <xsl:template match="/">
        <html>
            <body>
                <h1>
                    <xsl:apply-templates select="TEI/body/lg/l"/>
                </h1>
            </body>
        </html>
    </xsl:template>

    <xsl:template match="TEI/body/lg/l">
        <xsl:value-of select="."/>
    </xsl:template>

</xsl:stylesheet>

