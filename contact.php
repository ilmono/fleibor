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
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.validate.js"></script>
    <script type="text/javascript" src="js/general.js"></script>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53cd63e656cc5fc1"></script>

	</head>
	<body>
  	<?php
      include("header.php");
    ?>
    <div class="container contact">
        <div class="container contactform row">
          <h3 class="letter-title text-center">Contactenos</h3>
          <?php 
              if ( isset($_GET['envio']) == "ok"){
                
                echo '<div class="alert alert-success" role="alert">El envió se realizó correctamente</div>';

              }else{
                if ( isset($_GET['envio']) == "no"){
                  echo '<div class="alert alert-danger" role="alert">No se pudo enviar el mail correctamente verifique su correo electrónico </div>';
                }
              }
          ?>
          <hr class="featurette-divider">
          <div class="content description col-md-6">
            <h3><img src="img/arg_ch.jpg" alt="ARGENTINA" /> Argentina (Fábrica)</h3>
            <p><span class="strong">Dirección:</span> 30 de Agosto 162</p>
            <p><span class="strong">Localidad:</span> Tablada Provincia de Buenos aires - Provincia de Buenos Aires</p>
            <p><span class="strong">Código Postal:</span> 1766</p>
            <p><span class="strong">Telefono:</span> 4652-8035 (lineas rotativas)</p>
            <p><span class="strong">Información:</span><a href="mailto:alemoreno@laboratoriofleibor.com.ar "> alemoreno@laboratoriofleibor.com.ar </a></p>
            <p><span class="strong">Ventas:</span><a href="mailto:ventas@laboratoriofleibor.com.ar"> ventas@laboratoriofleibor.com.ar</a></p>
          </div>
          <form action="form-contact.php" class="col-md-5" id="contact-form" role="form" method="post">
            <div class="form-group">
              <label for="name" class="control-label">Nombre</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Nombre">
            </div>
            <div class="form-group">
              <label for="direccion" class="control-label">Dirección </label>
              <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección">
            </div>
            <div class="form-group">
              <label for="Código Postal" class="control-label">Código Postal </label>
              <input type="text" class="form-control" id="codPostal" name="codPostal" placeholder="Código Postal">
            </div>
            <div class="form-group">
              <label for="Localidad" class="control-label">Localidad </label>
              <input type="text" class="form-control" id="localidad" name="localidad" placeholder="Localidad">
            </div>
            <div class="form-group">
              <label for="Provincia" class="control-label">Provincia </label>
              <input type="text" class="form-control" id="provincia" name="provincia" placeholder="Provincia">
            </div>
            <div class="form-group">
              <label for="mail">Email (obligatorio) <span class="emailNo" style="display:none; color:red">Falta email</span></label>
              <input type="email" class="form-control" id="mail" name="email" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="">Telefono</label>
                <input type="text" class="form-control" id="tel" name="phone" placeholder="Telefono">
            </div>
            <div class="form-group">
              <label for="query">Consulta</label>
              <textarea class="form-control" name="query" rows="5"></textarea>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-warning pull-right">Enviar</button>
            </div>
          </form>
          <div class="content costa-rica col-md-4">
            <h3><img src="img/crica_ch.jpg" alt="BRASIL" /> Costa Rica (Distribuidor)</h3>
            <p><span class="strong">Nombre:</span> TIPS, S. A.</p>
            <p><span class="strong">PBX:</span> 506-2543.2100 Ext 151</p>
            <p><span class="strong">Telefono:</span> 506-2543.2151</p>
            <p><span class="strong">Fax:</span> 506-2543.2113</p>
            <p><span class="strong">Localidad:</span> Panamericano - Sao Paulo - Brasil</p>
            <p><span class="strong">E-Mail:</span><a href="MAILTO:mvilchez@tipscr.com"> mvilchez@tipscr.com </a></p>
            <p><span class="strong">Skype:</span> mvilchez_tips</p>
          </div>
          <div class="content uruguay col-md-4">
            <h3><img src="img/uru_ch.jpg" alt="uruguay" /> Uruguay (Distribuidor)</h3>
            <p><span class="strong">Nombre:</span> Zanetti</p>
            <p><span class="strong">Dirección:</span> Colonia 917 </p>
            <p><span class="strong">Localidad:</span> Montevideo </p>
            <p><span class="strong">Código Postal:</span> 1100 </p>
            <p><span class="strong">Telefono:</span> 598-2903-0470 </p>
            <p><span class="strong">E-Mail:</span><a href="MAILTO:roberto@zanetti.com.uy"> roberto@zanetti.com.uy </a></p>
            <p><span class="strong">WebSite:</span><a href="http://www.zanetti.com.uy " target="_blank"> http://www.zanetti.com.uy </a></p>
          </div>
          <div class="content chile col-md-4">
            <h3><img src="img/chile.jpg" alt="chile" /> Chile (Distribuidor) </h3>
            <p><span class="strong">Nombre:</span> Mano Dulce LTDA</p>
            <p><span class="strong">Direccion:</span> Camino Buin Maipo 2815 </p>
            <p><span class="strong">Localidad:</span> Santiago de Chile - Chile </p>
            <p><span class="strong">Telefono:</span> 78999270 </p>
            <p><span class="strong">E-Mail:</span><a href="mailto:cortezmatta@hotmail.com"> cortezmatta@hotmail.com </a></p>
          </div>
        </div>
      <hr class="featurette-divider">
      <?php
        include("footer.php");
      ?>
    </div>
	</body>
</html>