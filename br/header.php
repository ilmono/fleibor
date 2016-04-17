<?php
  $path = explode("/" , trim($_SERVER['SCRIPT_NAME']));
?>
<div class="navbar-wrapper">
  <div class="container">
    <div class="navbar navbar-inverse navbar-static-top" role="navigation">
      <div class="container">
        <div class="menuIdioma">
          <a href="https://www.facebook.com/labfleibor" target="_banck" title='facebook' ><img class="img-circle banderas" src="img/facebook.jpg"></a>
          <form method="post" action="swichIdioma.php" id="form_idioma">
            <button value="1" type="submit" name="idioma" id="espa" class="selectidioma" title='Idioma Español'><img  class="img-circle banderas"   src="img/argid.jpg"></button>
            <button value="2" type="submit" name="idioma" id="port" class="selectidioma" title='Idioma Portugues' ><img class="img-circle banderas" src="img/brasilport.jpg"></button>
          </form>
        </div>  
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" <?php if($path[2] == "index.php") echo 'href="#"'; else echo 'href="index.php"';?>><img class="img-circle logo" src="img/logoweb2.jpg" width="130"></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li <?php if($path[2] == "index.php") echo 'class="active"'; ?>><a <?php if($path[2] == "index.php") echo 'href="#"'; else echo 'href="index.php"';?>>Home</a></li>
            <li <?php if($path[2] == "productos.php") echo 'class="active"'; ?>><a <?php if($path[2] == "productos.php") echo 'href="#"'; else echo 'href="productos.php"'?>>Produtos</a></li>
            <li <?php if($path[2] == "events.php") echo 'class="active"'; ?>><a <?php if($path[2] == "events.php") echo 'href="#"'; else echo 'href="events.php"'?>>Eventos</a></li>
            <li <?php if($path[2] == "company.php") echo 'class="active"'; ?>><a <?php if($path[2] == "company.php") echo 'href="#"'; else echo 'href="company.php"'?>>Companhia</a></li>
            <li <?php if($path[2] == "contact.php") echo 'class="active"'; ?>><a <?php if($path[2] == "contact.php") echo 'href="#"'; else echo 'href="contact.php"'; ?>>Contato</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1" class=""></li>
    <li data-target="#myCarousel" data-slide-to="2" class=""></li>
  </ol>
  <div class="carousel-inner">
    <div class="item active">
      <img class="imgBanner img1" src="img/banner1.jpg">
      <div class="container">
        <div class="carousel-caption">
          <h1>Laboratorio Fleibor srl.</h1>
          <p><a class="btn btn-sm btn-primary" href="index.php" role="button">Inicio</a></p>
        </div>
      </div>
    </div>
    <div class="item">
      <img class="imgBanner img1 "  src="img/banner1.jpg">
    </div>
    <div class="item">
      <img class="imgBanner"  src="img/banner2.jpg">
      <div class="container">
        <div class="carousel-caption">
          <p><a class="btn btn-sm btn-primary" href="contact.php" role="button">Clientes Mayoristas</a></p>
        </div>
      </div>
    </div>
  </div>
  <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div>