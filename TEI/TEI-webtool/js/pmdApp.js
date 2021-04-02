angular.module('pmdApp', ['ui.bootstrap']).
    controller('AppController', AppController);

function AppController($scope, $http) {
    $scope.cab = {};
    $scope.poema = {};
    $scope.poema.versos = "Cerrar podrá mis ojos la postrera\nsombra que me llevare el blanco día;\n";
    $scope.poema.versos += "y podrá desatar esta alma mía\nhora a su afán ansioso lisonjera.\n";
    $scope.poema.xmlfinal = "";
    $scope.angular_ok = "Angular is working: ";

    $scope.generarXML = function() {
        console.log("Generando XML...");
        var xml = "";
        xml += $scope.teiXML_inicio();
        xml += $scope.teiHeader();
        xml += $scope.textoPoema();
        xml += $scope.teiXML_fin();
        $scope.poema.xmlfinal= xml;
    }

    $scope.teiXML_inicio = function() {
        return "<TEI xmlns=\"http://www.tei-c.org/ns/1.0\">\n";
    }

    $scope.teiXML_fin = function() {
        return "</TEI>\n";
    }

    function titleStmt () {
        var ts = "";
        ts += "\t\t<titleStmt>\n";
        ts += "\t\t\t<title>" + $scope.cab.titulo + "</title>\n";
        ts += "\t\t\t<title type=\"incipit\">" + $scope.cab.incipit + "</title>\n";
        ts += "\t\t\t<author>" + $scope.cab.autor + "</author>\n";
        ts += "\t\t\t<author>" + $scope.cab.autor2 + "</author>\n";
        ts += "\t\t\t<author role=\"atr\">" + $scope.cab.attr + "</author>\n";
        ts += "\t\t\t<editor>" + $scope.cab.editor + "</editor>\n";
        ts += "\t\t</titleStmt>\n";
        return ts;
    }
    function publicationStmt() {
        var ps = "";
        ps += "\t\t<publicationStmt>\n"
        ps += "\t\t\t<publisher>Diálogo Medieval</publisher>\n";
        ps += "\t\t\t<availability>\n";
        ps += "\t\t\t\t<licence>Creative Commons Reconocimiento – CompartirIgual (by-sa)</licence>\n";
        ps += "\t\t\t</availability>\n";
        ps += "\t\t</publicationStmt>\n";
        return ps;
    }

    $scope.teiHeader = function() {
        var cab = "<teiHeader>\n";
        cab += "\t<fileDesc>\n";
        cab += titleStmt();
        cab += publicationStmt();
        cab += "\t<sourceDesc>\n";
        cab += $scope.listBibl();
        cab += "\t\t<msDesc>\n";
        cab += "\t\t\t<msIdentifier>\n";
        cab += "\t\t\t\t<repository>" + $scope.cab.repositorio_monografia+ "</repository>\n";
        cab += "\t\t\t\t<idno>" + $scope.cab.idrepo_monografia+ "</idno>\n";
        cab += "\t\t\t\t<altIdentifier>\n";
        cab += "\t\t\t\t\t<idno type=\"" + $scope.cab.tipo_monografia + "\"/>\n";
        cab += "\t\t\t\t</altIdentifier>\n";
        cab += "\t\t\t</msIdentifier>\n";
        cab += "\t\t\t<msContents>\n";
        cab += "\t\t\t\t<msItem>\n";
        cab += "\t\t\t\t\t<locus from=\"" + $scope.cab.locusfrom_monografia + "\" to=\"" + $scope.cab.locusto_monografia + "\"></locus>\n";
        cab += "\t\t\t\t\t<index><term type=\""+ $scope.cab.subtipo_monografia + "\"/></index>\n";
        cab += "\t\t\t\t</msItem>\n";
        cab += "\t\t\t</msContents>\n";
        cab += "\t\t</msDesc>\n";
        cab += "\t</sourceDesc>\n";
        cab += "\t</fileDesc>\n";
        cab += "\t<profileDesc>\n";
        cab += "\t\t<particDesc>\n";
        cab += $scope.listaPersonajes();
        cab += "\t\t</particDesc>\n";
        cab += "\t\t<settingDesc>\n";
        cab += $scope.listaLugares();
        cab += "\t\t</settingDesc>\n";
        cab += "\t\t<textClass>\n";
        cab += $scope.listaClaves();
        cab += "\t\t</textClass>\n";
        cab += $scope.otrosDatosManuscrito();
        cab += "\t</profileDesc>\n";
        cab += "</teiHeader>\n";
        cab = cab.replace(/undefined/g, '');
        return cab;
    }

    $scope.listBibl = function() {
        var xml_listBibl = "\t<listBibl>\n";
        if (numFuentes == 0) {
            xml_listBibl += "\t</listBibl>\n";
            return xml_listBibl;
        }
        angular.forEach($scope.cab.fuentes, function(fuente, key) {
            console.log(fuente);
            if (fuente.url_monografia.length >= 5) {
                xml_listBibl += "\t<bibl type='url'>\n";
                xml_listBibl += "\t<![CDATA[" + fuente.url_monografia + " >]]>\n";
                xml_listBibl += "\t</bibl>\n";
            } else if (fuente.id_monografia.length > 1) {
                xml_listBibl += "\t<bibl n='" + fuente.id_monografia + "'>\n";
                xml_listBibl += "\t\t<title>" + fuente.titulo_monografia + "</title>\n";
                xml_listBibl += "\t\t<editor>" + fuente.editor_monografia + "</editor>\n";
                xml_listBibl += "\t\t<pubPlace>" + fuente.lugar_monografia + "</pubPlace>\n";
                xml_listBibl += "\t\t<publisher>" + fuente.publisher_monografia + "</publisher>\n";
                xml_listBibl += "\t\t<date>" + fuente.fecha_monografia + "</date>\n";
                xml_listBibl += "\t\t<biblScope>" + fuente.paginas_monografia + "</biblScope>\n";
                xml_listBibl += "\t\t<idno>" + fuente.id_monografia + "</idno>\n";
                xml_listBibl += "\t</bibl>\n";
            } else {
                xml_listBibl += "\t<bibl>\n";
                xml_listBibl += "\t\t<title>" + fuente.titulo_monografia + "</title>\n";
                xml_listBibl += "\t\t<editor>" + fuente.editor_monografia + "</editor>\n";
                xml_listBibl += "\t\t<pubPlace>" + fuente.lugar_monografia + "</pubPlace>\n";
                xml_listBibl += "\t\t<publisher>" + fuente.publisher_monografia + "</publisher>\n";
                xml_listBibl += "\t\t<date>" + fuente.fecha_monografia + "</date>\n";
                xml_listBibl += "\t\t<biblScope>" + fuente.paginas_monografia + "</biblScope>\n";
                xml_listBibl += "\t\t<idno>" + fuente.id_monografia + "</idno>\n";
                xml_listBibl += "\t</bibl>\n";
            }
        });
        xml_listBibl += "\t</listBibl>\n";
        return xml_listBibl;
    }

    $scope.otrosDatosManuscrito = function () {
        var xml_otros_datos = "\t\t<creation>\n";
        xml_otros_datos += "\t\t\t<origDate notAfter=\"" + $scope.cab.notafter + "\" notBefore=\"" + $scope.cab.notbefore + "\">";
        xml_otros_datos += $scope.cab.notbefore + "-" + $scope.cab.notafter + "</origDate>\n";
        xml_otros_datos += "\t\t</creation>\n";
        xml_otros_datos += "\t\t<langUsage>\n";
        xml_otros_datos += "\t\t\t<language ident=\"" + $scope.cab.lengua_cod+ "\">";
        xml_otros_datos += $scope.cab.lengua + "</language>\n";
        xml_otros_datos += "\t\t</langUsage>\n";
        return xml_otros_datos;
    }

    $scope.listaPersonajes = function() {
        var xml_personajes = "\t\t\t<listPerson>\n";
        angular.forEach($scope.cab.personajes, function(personaje, key) {
            xml_personajes += "\t\t\t\t<person xml:id=\"" + personaje.xmlid + "\">\n";
            xml_personajes += "\t\t\t\t\t<persName type=\"standard\">" + personaje.nombre_standard + "</persName>\n";
            xml_personajes += "\t\t\t\t\t<persName type=\"form\">" + personaje.nombre_form + "</persName>\n";
            xml_personajes += "\t\t\t\t</person>\n";
        });
        xml_personajes += "\t\t\t</listPerson>\n";
        return xml_personajes;
    }
    
    $scope.listaClaves = function() {
        var xml_claves = "\t\t\t<keywords scheme=\"PMC\">\n";
        angular.forEach($scope.cab.claves, function(clave, key) {
            xml_claves+= "\t\t\t\t<term type=\"" + clave.tipo + "\">" + clave.nombre + "</term>\n";
        });
        xml_claves+= "\t\t\t</keywords>\n";
        return xml_claves;
    }

    $scope.listaLugares = function() {
        var xml_lugares = "\t\t\t<listPlace>\n";
        angular.forEach($scope.cab.lugares, function(lugar, key) {
            xml_lugares += "\t\t\t\t<place xml:id=\"" + lugar.xmlid + "\">\n";
            xml_lugares += "\t\t\t\t\t<placeName>" + lugar.nombre + "</placeName>\n";
            xml_lugares += "\t\t\t\t</place>\n";
        });
        xml_lugares += "\t\t\t</listPlace>\n";
        return xml_lugares;
    }

    $scope.analizar = function() {
        var poema = $scope.poema.versos;
        var a_lineas = poema.split("\n");
        if (a_lineas[0].indexOf("<text>") != -1) {
            alert("Parece que el poema ya tiene estructura XML");
            return;
        }
        var estrofa = 0;
        var estrofa_abierta = 0;
        var linea = 1;
        for (i=0; i<a_lineas.length; i++) {
            verso = a_lineas[i];
            if (i==0) {
                /* primera estrofa */
                estrofa = 1;
                estrofa_abierta = 1;
                verso = "\t<lg n=\"" + estrofa + "\">\n\t\t<l xml:id=\"L1\">" + verso + "</l>";
                linea++;
            } else if (verso == "") { // TODO: esto será una exp. regular
                /* comienza una estrofa nueva */
                if (estrofa == estrofa_abierta) {
                    estrofa++;
                    estrofa_abierta = estrofa;
                    verso = "\t</lg>\n\n\t<lg n=\"" + estrofa + "\">";
                }
            } else {
                /* verso */
                verso = "\t\t<l xml:id=\"L" + linea + "\">" + verso + "</l>";
                linea++;
            }
            a_lineas[i] = verso;
        };
        a_lineas.push("\t</lg>");
        var poema_analizado = a_lineas.join("\n");
        poema_analizado = "<text>\n<body>\n" + poema_analizado + "\n</body>\n</text>";
        $scope.poema.versos = poema_analizado;
    }
    $scope.validarPoema2 = function() {
        var xmlDoc;
        var parser = new DOMParser();
        var res = 0;
        try {
            xmlDoc = parser.parseFromString($scope.poema.versos, "application/xml");
        } catch(e) {
            console.log("Error: " + e.message());
        }
        if (xmlDoc.getElementsByTagName("parsererror").length>0) {
            return 0;
        } else {
            return 1;
        }
    }
    $scope.validarXML2 = function() {
        var xmlDoc;
        var parser = new DOMParser();
        var res = 0;
        try {
            xmlDoc = parser.parseFromString($scope.poema.xmlfinal, "application/xml");
        } catch(e) {
            console.log("Error: " + e.message());
        }
        if (xmlDoc.getElementsByTagName("parsererror").length>0) {
            return 0;
        } else {
            return 1;
        }
    }

    $scope.validarPoema = function() {
        if ($scope.validarPoema2() == 1) {
            alert("XML bien formado");
        } else {
            alert("Posible error en el XML");
        }
    }
    $scope.validarXML = function() {
        if ($scope.validarXML2() == 1) {
            alert("XML bien formado");
        } else {
            alert("Posible error en el XML");
        }
    }

    $scope.textoPoema = function () {
        if ($scope.validarPoema2() != 1) {
            alert("Posible error en el XML");
        }
        return $scope.poema.versos + "\n";
    }
    $scope.rima = function() {
        var textarea = document.getElementById("poema");
        if (textarea.selectionStart == textarea.selectionEnd) {
            alert("Debes seleccionar antes la rima en el texto");
            return;
        }
        var rima = prompt("Rima:");
        var poema = textarea.value;
        var anterior = poema.substring(0, textarea.selectionStart);
        var seleccionado = poema.substring(textarea.selectionStart, textarea.selectionEnd);
        var posterior = poema.substring(textarea.selectionEnd, textarea.length);
        var nuevo_poema = anterior + "<rhyme label='" + rima + "'>" + seleccionado + "</rhyme>" + posterior;
        $scope.poema.versos = nuevo_poema;
    }
    $scope.sp = function() {
        var textarea = document.getElementById("poema");
        if (textarea.selectionStart == textarea.selectionEnd) {
            alert("Debes seleccionar antes el texto");
            return;
        }
        var who = prompt("Interlocutor:");
        var poema = textarea.value;
        var anterior = poema.substring(0, textarea.selectionStart);
        var seleccionado = poema.substring(textarea.selectionStart, textarea.selectionEnd);
        var posterior = poema.substring(textarea.selectionEnd, textarea.length);
        var nuevo_poema = anterior + "<sp who='" + who+ "'>" + seleccionado + "</sp>" + posterior;
        $scope.poema.versos = nuevo_poema;
    }
    $scope.speaker = function() {
        var textarea = document.getElementById("poema");
        var who = prompt("Interlocutor:");
        var poema = textarea.value;
        var anterior = poema.substring(0, textarea.selectionStart);
        var posterior = poema.substring(textarea.selectionStart, textarea.length);
        var speaker = "\n<speaker>" + who + "</speaker>\n";
        var nuevo_poema = anterior + speaker +  posterior;
        $scope.poema.versos = nuevo_poema;
    }
    $scope.met = function() {
        var textarea = document.getElementById("poema");
        var met = prompt("M\u00E9trica:");
        var poema = textarea.value;
        var anterior = poema.substring(0, textarea.selectionStart);
        var posterior = poema.substring(textarea.selectionStart, textarea.length);
        var metrica = " met=\"" + met + "\" ";
        var nuevo_poema = anterior + metrica +  posterior;
        $scope.poema.versos = nuevo_poema;
    }
    $scope.rhyme = function() {
        var textarea = document.getElementById("poema");
        var rhyme = prompt("Rima");
        var poema = textarea.value;
        var anterior = poema.substring(0, textarea.selectionStart);
        var posterior = poema.substring(textarea.selectionStart, textarea.length);
        var rh = " rhyme=\"" + rhyme + "\" ";
        var nuevo_poema = anterior + rh +  posterior;
        $scope.poema.versos = nuevo_poema;
    }

    $scope.guardarXML = function() {
        $http({ 
            method: 'POST',
            url: 'post.php',
            data: $scope.poema.xmlfinal,
            headers: { "Content-Type": 'application/xml' }
        })
        .success (function(data, status, headers, config) {
            if (data.status == "ERR") {
                alert("ERROR guardando. Tipo de error: " + data.desc);
            } else {
                alert("Guardado correcto.");
            }
        })
        .error (function() {
            alert("Error guardando. Tipo de error: error comunicando con servidor");
        });
        
    }

    // Personajes
    var numPersonajes = 0;
    $scope.cab.personajes = [ {id:numPersonajes, nombre_standard: '', nombre_form: '', xmlid: ''} ];
    $scope.add_personaje = function () {
        numPersonajes++;
        $scope.cab.personajes.push({id:numPersonajes, nombre_standard: '', nombre_form: '', xmlid: ''});
        console.log($scope.cab.personajes);

    }
    // Lugares 
    var numLugares = 0;
    $scope.cab.lugares = [ {id:numLugares, nombre: '', xmlid: ''} ];
    $scope.add_lugar = function () {
        numLugares++;
        $scope.cab.lugares.push({id:numLugares, nombre: '', xmlid: ''});
        console.log($scope.cab.lugares);
    }
    // Claves
    var numClaves= 0;
    $scope.cab.claves= [ {id:numClaves, nombre: '', tipo: ''} ];
    $scope.add_clave = function () {
        numClaves++;
        $scope.cab.claves.push({id:numClaves, nombre: '', tipo: ''});
        console.log($scope.cab.claves);
    }

    // Fuentes
    var numFuentes = 0;
    $scope.add_fuente = function () {
        if (numFuentes == 0) {
            $scope.cab.fuentes = [{id:numFuentes, titulo_monografia: '', editor_monografia: '', lugar_monografia: '',
                                publisher_monografia: '', fecha_monografia: '', paginas_monografia: '',
                                id_monografia: '', url_monografia: ''}];
        } else {
            $scope.cab.fuentes.push({id:numFuentes, titulo_monografia: '', editor_monografia: '', lugar_monografia: '',
                                publisher_monografia: '', fecha_monografia: '', paginas_monografia: '',
                                id_monografia: '', url_monografia: ''});
        }
        numFuentes++;
        console.log($scope.cab.fuentes);
    }


} // Fin controlador

