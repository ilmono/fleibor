<html lang="en">
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="En Laboratorio Fleibor srl trabajamos para dar la personalidad que su producto merece y tambien buscando en forma cotidiana nuevos productos que perfeccionen su trabajo. Llegamos al mercado a través de dos líneas de productos: artesanías y alimenticios.">
    <meta name="author" content="Estudio Multimedia EB">
    <link rel="shortcut icon" href="img/fleibor.ico">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/carousel.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Fleibor Website</title>
    <style id="holderjs-style" type="text/css"></style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53cd63e656cc5fc1"></script>
	  <script src="js/general.js"></script>
	</head>
	<body>
  	<?php
      include("header.php");
    ?>
    <div class="container letter-cont">
	
      <h3 class="letter-title">Productos</h3>
      <div class="row">
        <div class="col-lg-4 letter-color">
          <img class="img-circle" data-src="holder.js/140x140" alt="140x140" src="img/alimenticios.jpg" style="width: 140px; height: 140px;">
          <h4>Alimenticios</h4>
          <p class="download"><button id="bt-alimenticios" class="btn btn-default" type="button" >Ver »</button></p>
		  <div id="li-alimenticios" class="list-group">
		  <a href="golosina.php#title" id="bt-golosinas" class="list-group-item">Golosinas</button>
		  <a href="bebidassa.php#title" id="bt-bebidassa" class="list-group-item">Bebidas sin alcohol</a>
          <a href="bebidasca.php#title" id="bt-bebidasca" class="list-group-item">Bebidas con alcohol</a>
          <a href="helados.php#title" id="bt-helados" class="list-group-item">Helados</a>
          <a href="reposteria.php#title" id="bt-reposteria" class="list-group-item">Reposter&iacute;a hogare&ntilde;a</a>          
		  <a href="panaderia.php#title" id="bt-panaderia" class="list-group-item">Panader&iacute;a y confiter&iacute;a</a>
		  <a href="chocolates.php#title" id="bt-chocolates" class="list-group-item">Chocolates</a>
		  <a href="lacteos.php#title" id="bt-lacteos" class="list-group-item">L&aacute;cteos</a>
          </div>
        </div>
        <div class="col-lg-4 letter-color">
          <img class="img-circle" data-src="holder.js/140x140" alt="140x140" src="img/artesanias.jpg" style="width: 140px; height: 140px;">
          <h4>Artesan&iacute;as</h4>
          <p class="download"><button id="bt-artesanias" class="btn btn-default" type="button" >Ver »</button></p>
		  <div id="li-artesanias" class="list-group">
		  <a href="porcelana.php#title" id="bt-porcelana" class="list-group-item">Art&iacute;culos para porcelana en fr&iacute;o</a>
		  <a href="jabones.php#title" id="bt-jabones" class="list-group-item">Art&iacute;culos para jabones artesanales</a>
          <a href="velas.php#title" id="bt-velas" class="list-group-item">Art&iacute;culos para velas artesanales</a>
          <a href="especialidades.php#title" id="bt-especialidades" class="list-group-item">Especialidades</a>
          </div>
        </div>
        <div class="col-lg-4 letter-color">
          <img class="img-circle" data-src="holder.js/140x140" alt="140x140" src="img/recetas.jpg" style="width: 140px; height: 140px;">
          <h4>Mis Recetas</h4>
          <p class="download"><button id="bt-recetas" class="btn btn-default" type="button" >Ver »</button></p>
		  <div id="li-recetas" class="list-group">
		  <a href="recetas.php#title" id="bt-recetas" class="list-group-item">Listado de Recetas</a>
          </div>
        </div>


      </div>
	  <hr class="featurette-divider">





      <?php
        include("footer.php");
      ?>
    </div>
	</body>
</html>