$(function () {
	
	
	$('.subnavbar').find ('li').each (function (i) {
	
		var mod = i % 3;
		
		if (mod === 2) {
			$(this).addClass ('subnavbar-open-right');
		}
		
	});

	$(document).ready(function() {
		$('#select-permiso-usuario').change(function(event){

			$.ajax({url: "includes/ajax_request.php?action=getSelectPermisos&categoria="+event.target.value, success: function(result){
				$('#div-permiso-usuario').html(result);
			}});
		});

		$('#select-envase-medidas').change(function(event){
			$.ajax({url: "includes/ajax_request.php?action=getSelectEnvaseMedidas&envase="+event.target.value, success: function(result){
				$('#div-envase-medidas').html(result);
			}});
		});
		$('#select-medida-unidades').change(function(event){
			$.ajax({url: "includes/ajax_request.php?action=getSelectMedidaUnidades&medida="+event.target.value, success: function(result){
				$('#div-medida-unidades').html(result);
			}});
		});
		$('#select-envase-producto').change(function(event){
			$.ajax({url: "includes/ajax_request.php?action=getMedidasByEnvase&envase="+event.target.value, success: function(result){
				console.log(result);
				$('#div-envase-producto').html(result);
			}});
		});
		$(".btn-medidas").live('click', function() {
			var id = $(this).attr("id");
			if($(this).find("span").hasClass('icon-chevron-down')){
				$(this).find("span").removeClass('icon-chevron-down');
				$(this).find("span").addClass('icon-chevron-up');
			}else{
				$(this).find("span").removeClass('icon-chevron-up');
				$(this).find("span").addClass('icon-chevron-down');
			}
			$("#medida-" + id).toggle(function(){});
		});
	});






});