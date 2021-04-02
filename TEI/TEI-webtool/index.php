<?php
    require_once("config.php");
    include("session.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" ng-app="pmdApp">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Poesía medieval dialogada</title>
<script src="js/jquery-2.1.3.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
<link href="estilos.css" rel="stylesheet">

</head>
<body>
<?php
    include("nav.php");
?>

<div class="container" ng-controller="AppController">

  <div class="starter-template">

<tabset> 
    <tab heading="Datos de la obra">
        <br/>
        <form class="form-horizontal">
        <div class="form-group">
            <label for="titulo" class="col-sm-1 control-label">Título</label>
            <div class="col-sm-10">
                <input type="text" ng-model="cab.titulo" class="form-control" id="titulo" placeholder="título" name="titulo"/>
            </div>
        </div>
        <div class="form-group">
            <label for="incipit" class="col-sm-1 control-label">Íncipit</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="incipit" placeholder="íncipit" name="incipit" ng-model="cab.incipit"/>
            </div>
        </div>
        <div class="form-group">
            <label for="autor" class="col-sm-1 control-label">Autor</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="autor" placeholder="autor" name="autor" ng-model="cab.autor"/>
            </div>
        </div>
        <div class="form-group">
            <label for="autor2" class="col-sm-1 control-label">Autor 2</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="autor2" placeholder="autor2" name="autor2" ng-model="cab.autor2"/>
            </div>
        </div>
        <div class="form-group">
            <label for="attr" class="col-sm-1 control-label">Atribución</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="attr" placeholder="attr" name="attr" ng-model="cab.attr"/>
            </div>
        </div>
        <div class="form-group">
            <label for="editor" class="col-sm-1 control-label">Editor</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="editor" placeholder="editor" name="editor" ng-model="cab.editor"/>
            </div>
        </div>
        </form>
    </tab>

    <tab heading="Manuscrito">
        <br/>
        <form class="form-horizontal">
        <div class="form-group">
            <label for="repositorio_monografia" class="col-sm-1 control-label">Repositorio</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="repositorio_monografia" placeholder="Repositorio" name="repositorio_monografia" ng-model="cab.repositorio_monografia"/>
            </div>
        </div>
        <div class="form-group">
            <label for="idrepo_monografia" class="col-sm-1 control-label">ID monografía.</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="idrepo_monografia" placeholder="ID de monografía" name="idrepo_monografia" ng-model="cab.idrepo_monografia"/>
            </div>
        </div>
        <div class="form-group">
            <label for="tipo_monografia" class="col-sm-1 control-label">ID alt.</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="tipo_monografia" placeholder="ID alternativo de la monografía" name="tipo_monografia" ng-model="cab.tipo_monografia"/>
            </div>
        </div>
        <div class="form-group">
            <label for="subtipo_monografia" class="col-sm-1 control-label">Subtipo</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="subtipo_monografia" placeholder="subtipo dentro de la monografía" name="subtipo_monografia" ng-model="cab.subtipo_monografia"/>
            </div>
        </div>
        <div class="form-group">
            <label for="locusfrom_monografia" class="col-sm-1 control-label">Locus (desde)</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="locusfrom_monografia" placeholder="desde (folio)" name="locusfrom_monografia" ng-model="cab.locusfrom_monografia"/>
            </div>
        </div>
        <div class="form-group">
            <label for="locusto_monografia" class="col-sm-1 control-label">Locus (hasta)</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="locusto_monografia" placeholder="hasta (folio)" name="locusto_monografia" ng-model="cab.locusto_monografia"/>
            </div>
        </div>

        <div class="form-group">
            <label for="notafter" class="col-sm-1 control-label">No posterior</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="notafter" placeholder="no posterior (not after)" name="notafter" ng-model="cab.notafter"/>
            </div>
        </div>
        <div class="form-group">
            <label for="notbefore" class="col-sm-1 control-label">No anterior</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="notbefore" placeholder="no anterior (not before)" name="notbefore" ng-model="cab.notbefore"/>
            </div>
        </div>
        <div class="form-group">
            <label for="lengua" class="col-sm-1 control-label">Lengua</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="lengua" placeholder="lengua" name="lengua" ng-model="cab.lengua"/>
            </div>
        </div>
        <div class="form-group">
            <label for="lengua_cod" class="col-sm-1 control-label">Código lengua</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="lengua_cod" placeholder="código lengua" name="lengua_cod" ng-model="cab.lengua_cod"/>
            </div>
        </div>

        </form>
    </tab>

    <tab heading="Fuentes">
        <br/>
            <div class="col-sm-16 text-left">
                <button type="button" class="btn btn-primary" id="add_fuente" ng-click="add_fuente()">Añadir fuente</button>
            </div>
        <form class="form-horizontal" ng-repeat="fuente in cab.fuentes">
            <hr/>
            <div class="col-sm-16 text-left">
                <b>Fuente {{fuente.id + 1}}</b>
                <br/>
                <br/>
            </div>
            <div class="form-group">
                <label for="titulo_monografia_{{fuente.id}}" class="col-sm-1 control-label">Título</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="titulo_monografia_{{fuente.id}}" placeholder="título de la monografía" name="titulo_monografia_{{fuente.id}}" ng-model="cab.fuentes[fuente.id].titulo_monografia"/>
                </div>
            </div>

            <div class="form-group">
                <label for="editor_monografia_{{fuente.id}}" class="col-sm-1 control-label">Editor</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="editor_monografia_{{fuente.id}}" placeholder="editor de la monografía" name="editor_monografia_{{fuente.id}}" ng-model="cab.fuentes[fuente.id].editor_monografia"/>
                </div>
            </div>

            <div class="form-group">
                <label for="lugar_monografia_{{fuente.id}}" class="col-sm-1 control-label">Lugar</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="lugar_monografia_{{fuente.id}}" placeholder="lugar de edición de la monografía" name="lugar_monografia_{{fuente.id}}" ng-model="cab.fuentes[fuente.id].lugar_monografia"/>
                </div>
            </div>

            <div class="form-group">
                <label for="publisher_monografia_{{fuente.id}}" class="col-sm-1 control-label">Entidad</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="publisher_monografia_{{fuente.id}}" placeholder="entidad que publica la monografía" name="publisher_monografia_{{fuente.id}}" ng-model="cab.fuentes[fuente.id].publisher_monografia"/>
                </div>
            </div>

            <div class="form-group">
                <label for="fecha_monografia_{{fuente.id}}" class="col-sm-1 control-label">Fecha</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="fecha_monografia_{{fuente.id}}" placeholder="fecha de publicación" name="fecha_monografia_{{fuente.id}}" ng-model="cab.fuentes[fuente.id].fecha_monografia"/>
                </div>
            </div>

            <div class="form-group">
                <label for="paginas_monografia_{{fuente.id}}" class="col-sm-1 control-label">Páginas</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="paginas_monografia_{{fuente.id}}" placeholder="páginas (scope)" name="paginas_monografia_{{fuente.id}}" ng-model="cab.fuentes[fuente.id].paginas_monografia"/>
                </div>
            </div>

            <div class="form-group">
                <label for="id_monografia_{{fuente.id}}" class="col-sm-1 control-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_monografia_{{fuente.id}}" placeholder="id de la monografía" name="id_monografia_{{fuente.id}}" ng-model="cab.fuentes[fuente.id].id_monografia"/>
                </div>
            </div>

            <div class="form-group">
                <label for="url_monografia_{{fuente.id}}" class="col-sm-1 control-label">URL</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="url_monografia_{{fuente.id}}" placeholder="url de la monografía" name="url_monografia_{{fuente.id}}" ng-model="cab.fuentes[fuente.id].url_monografia"/>
                </div>
            </div>

        </form>

    </tab>

    <tab heading="Personas">
        <br/>
        <form class="form-horizontal">
            <div class="form-group" ng-repeat="personaje in cab.personajes">
                <label for="personaje{{personaje.id}}" class="col-sm-1 control-label">Persona({{personaje.id + 1}})</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="personaje_{{personaje.id}}" placeholder="Nombre de la persona (standard)" name="personaje_{{personaje.id}}" ng-model="cab.personajes[personaje.id].nombre_standard"/>
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="personaje_{{personaje.id}}" placeholder="Nombre de la persona (form)" name="personaje_{{personaje.id}}" ng-model="cab.personajes[personaje.id].nombre_form"/>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="personaje_{{personaje.id}}" placeholder="ID (XML)" name="personaje_{{personaje.id}}" ng-model="cab.personajes[personaje.id].xmlid"/>
                </div>
            </div>

            <div class="col-sm-16 text-left">
                <hr/>
                <button type="button" class="btn btn-primary" id="add_personaje" ng-click="add_personaje()">Añadir persona</button>
                <hr/>
            </div>
        </form>

    </tab>

    <tab heading="Lugares">
        <br/>
        <form class="form-horizontal">
            <div class="form-group" ng-repeat="lugar in cab.lugares">
                <label for="lugar{{lugar.id}}" class="col-sm-1 control-label">Lugar({{lugar.id + 1}})</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="lugar_{{lugar.id}}" placeholder="Lugar (placeName)" name="lugar_{{lugar.id}}" ng-model="cab.lugares[lugar.id].nombre"/>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="lugar_{{lugar.id}}" placeholder="ID (XML)" name="lugar_{{lugar.id}}" ng-model="cab.lugares[lugar.id].xmlid"/>
                </div>
            </div>

            <div class="col-sm-16 text-left">
                <hr/>
                <button type="button" class="btn btn-primary" id="add_lugar" ng-click="add_lugar()">Añadir lugar</button>
                <hr/>
            </div>
        </form>
    </tab>

    <tab heading="Keywords">
        <br/>
        <form class="form-horizontal">
            <div class="form-group" ng-repeat="clave in cab.claves">
                <label for="clave{{clave.id}}" class="col-sm-1 control-label">Palabra clave({{clave.id + 1}})</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="clave_{{clave.id}}" placeholder="Palabra clave (keyword)" name="clave_{{clave.id}}" ng-model="cab.claves[clave.id].nombre"/>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="clave_{{clave.id}}" placeholder="Tipo" name="clave_{{clave.id}}" ng-model="cab.claves[clave.id].tipo"/>
                </div>
            </div>

            <div class="col-sm-16 text-left">
                <hr/>
                <button type="button" class="btn btn-primary" id="add_clave" ng-click="add_clave()">Añadir palabra clave</button>
                <hr/>
            </div>
        </form>
    </tab>

    <tab heading="Poema">
        <br/>
        <form class="form-inline">
            <div class="form-group">
                <button type="button" class="btn btn-primary" id="estrofas" ng-click="analizar()">Añadir estrofas y versos</button>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-primary" id="rima" ng-click="rima()">&lt;rhyme&gt;</button>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-primary" id="sp" ng-click="sp()">&lt;sp&gt;</button>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-primary" id="speaker" ng-click="speaker()">&lt;speaker&gt;</button>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-primary" id="met" ng-click="met()">met="8,8,8,8..."</button>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-primary" id="met" ng-click="rhyme()">rhyme="abba..."</button>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-primary" id="validar" ng-click="validarPoema()">Validar</button>
            </div>
        </form>

        <textarea ng-model="poema.versos" id="poema" class="form-control" rows="20"></textarea>
    </tab>
    <tab heading="XML" select="generarXML()">
         <br/>
        <form class="form-inline">
            <div class="form-group">
                <button type="button" class="btn btn-primary" id="validar_xml" ng-click="validarXML()">Validar XML</button>
                <button type="button" class="btn btn-primary" id="guardar_xml" ng-click="guardarXML()">Guardar</button>
            </div>
        </form>


        <textarea ng-model="poema.xmlfinal" id="xmlfinal" class="form-control" rows="20"></textarea>
    </tab>
</tabset>

  </div> <!-- /.starter-template -->

</div><!-- /.container -->

<script src="js/angular.js"></script>
<script src="js/ui-bootstrap-tpls-0.12.1.min.js"></script>
<script src="js/pmdApp.js"></script>
</body>
</html>
