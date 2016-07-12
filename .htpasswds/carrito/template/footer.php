<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script>
		jQuery(document).ready(function(){				   
			jQuery('.totalM').addClass('success');					   
				function removerSucce(){ $('.totalM').removeClass('success');}
				setTimeout(removerSucce, 1000);
		 });
</script>
<script src="js/jquery-1.7.1.min.js"></script>
<script src="js/jquery.masonry.min.js"></script>
<script>
 $(function(){
var $container = $('#container').masonry();
// layout Masonry again after all images have loaded
$container.imagesLoaded( function() {
  $container.masonry({
      itemSelector: '.item',
      columnWidth:10,
      isAnimated: !Modernizr.csstransitions
    });
});


});
</script>
<div class="container-fluid container">
<div class="ContFoot">ESTUDIO MULTIMEDIAL <strong>EB</strong></div>
</div>