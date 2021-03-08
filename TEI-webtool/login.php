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
    require_once("config.php");
    include("nav.php");
?>
<div class="container" ng-controller="AppController">

  <div class="starter-template">

        <form class="form-horizontal" role="form" action="login2.php">
            <div class="form-group">
                <label for="Usuario" class="control-label col-sm-2">Usuario</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="user" placeholder="Usuario" name="user"/>
                </div>
            </div>
            <div class="form-group">
                <label for="Pass" class="control-label col-sm-2">Pass</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="pass" placeholder="Contraseña" name="pass"/>
                </div>
            </div>
            <div class="form-group">        
                <div class="col-sm-offset-2 col-sm-4">
                    <button type="submit" class="btn btn-default">Login</button>
                </div>
            </div>
        </form>
 
  </div> <!-- /.starter-template -->

</div><!-- /.container -->


</body>
</html>
