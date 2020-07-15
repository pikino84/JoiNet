(function($, window, undefined)
{
	"use strict";
	
	$(document).ready(function()
	{

		function eliminar_r(){
			$('.eliminarRow').on('click', function(){
				$(this).parent('div').parent('.row').remove();
			});
		}
		eliminar_r();
		$('.addEspModulo1').on('click', function(e){
				e.preventDefault();
				var modulo1 = '<div class="row">';
				        modulo1 += '<div class="col-md-10">';
				            modulo1 += '<div class="form-group">';
				                modulo1 += '<input type="text" class="form-control mods" data-mod="1" placeholder="Subtitulo - Ejemplo: Software">';
				            modulo1 += '</div>';
				        modulo1 += '</div>';
				        modulo1 += '<div class="col-md-2">';
				        	modulo1 += '<a class="eliminarRow btn btn-danger">Eliminar</a>';
				        modulo1 += '</div>';
				    modulo1 += '</div>';
			$('#ConteinerEspe').append(modulo1);
			eliminar_r();
		});

		$('.addEspModulo2').on('click', function(e){
				e.preventDefault();
				var modulo2 = '<div class="row">';
                    modulo2 += '<div class="col-md-5">';
                        modulo2 += '<div class="form-group">';
                            modulo2 += '<input type="text" class="form-control mods" data-mod="2" placeholder="Caracteristicas - Ejemplo: Sistema Operativo:">';
                        modulo2 += '</div>';
                    modulo2 += '</div>';
                    modulo2 += '<div class="col-md-5">';
                        modulo2 += '<div class="form-group">';
                            modulo2 += '<input type="text" class="form-control mods" data-mod="3" placeholder="Caracteristicas - Ejemplo: Android 4.4 KitKat">';
                        modulo2 += '</div>';
                    modulo2 += '</div>';
                    	modulo2 += '<div class="col-md-2">';
				        	modulo2 += '<a class="eliminarRow btn btn-danger">Eliminar</a>';
				        modulo2 += '</div>';
                modulo2 += '</div>';
			$('#ConteinerEspe').append(modulo2);
			
			eliminar_r();
		});

		$('.guardar_modulo_descripcion').on('click', function(e){
			e.preventDefault();

			var products_id = $('#products_id').val();
			var descripcion = $('#descripcion').val();
			var titulo      = $('#titulo').val();
			var visible     = 0;

			if ($('#modulo_descripcion').is(':checked')){
				var visible = 1;
			}

			$.ajax({
				method: 'POST',
				url: '/Ajax/GuardarModuloDescripcion',
				dataType: 'json',
				data: { 'fk_producto': products_id, 'descripcion':descripcion, 'titulo':titulo, 'visible':visible }
			}).done(function(ret) {
				
				var opts = {
					"closeButton"    : true,
					"debug"          : false,
					"positionClass"  : "toast-bottom-left",
					"onclick"        : null,
					"showDuration"   : "300",
					"hideDuration"   : "1000",
					"timeOut"        : "5000",
					"extendedTimeOut": "1000",
					"showEasing"     : "swing",
					"hideEasing"     : "linear",
					"showMethod"     : "fadeIn",
					"hideMethod"     : "fadeOut"
				};
				
				toastr.success('Modulo Guardado', 'Estatus', opts);

				//$('.guardar_modulo_descripcion').addClass('disabled');
				
			});
		});

		

		/*function get_modulo_especificaciones(){

			var products_id    = $('#products_id').val();
			var previewHtml    = '';
			var previewHtmlAdd = '';

			$.getJSON( '/Ajax/GetEspecificaciones?fk_producto='+products_id, function( data ) {

					previewHtml += '<table class="new_tabla" width="100%">';
						previewHtml += '<tbody>';
							previewHtml += '<tr>';
								previewHtml += '<td class="bg_td_title" colspan="2">'+data.titulo+'</td>';
							previewHtml += '</tr>';
							previewHtml += '</tbody>';
					previewHtml += '</table><p></p>';

					$('.previewHtml').html(previewHtml);

					$.getJSON('/Ajax/GetSubEspecificaciones?id_espe='+data.id_espe, function (return_d) {
						
						$.each( return_d, function( key, value ) {

							  if(value.modulo == 1){
									previewHtmlAdd += '<tr><td class="bg_td" colspan="2">'+value.descripcion+'</td></tr>';
								}

							   if(value.modulo == 2){
									previewHtmlAdd += '<tr><td>'+value.descripcion+'</td>';
							   }

							   if(value.modulo == 3){
									previewHtmlAdd += '<td>'+value.descripcion+'</td></tr>';
							   }
						});

						$('.new_tabla tbody').append(previewHtmlAdd);
					});

			});
		}*/

		//get_modulo_especificaciones();

		$('.guardar_modulo_contenido').on('click', function(e){
			e.preventDefault();

			var products_id = $('#products_id').val();
			var titulo2      = $('#titulo2').val();
			var contenido   = $('#contenido').val();
			var visible     = 0;

			if ($('#modulo_contenido').is(':checked')){
				var visible = 1;
			}

			console.log(titulo2);

			$.ajax({
				method: 'POST',
				url: '/Ajax/GuardarModuloContenido',
				dataType: 'json',
				data: { 'fk_producto': products_id, 'titulo':titulo2, 'contenido':contenido, 'visible':visible }
			}).done(function(ret) {

				var opts = {
					"closeButton": true,
					"debug": false,
					"positionClass": "toast-bottom-left",
					"onclick": null,
					"showDuration": "300",
					"hideDuration": "1000",
					"timeOut": "5000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				};
				
				toastr.success('Modulo Guardado', 'Estatus', opts);

			});


		});

		$('.guardar_modulo_especificaciones').on('click', function(e){
			e.preventDefault();

			var products_id = $('#products_id').val();
			var titulo      = $('#especificaciones').val();
			var visible     = 0;

			if ($('#modulo_especificaciones').is(':checked')){
				var visible = 1;
			}

			$.ajax({
				method: 'POST',
				url: '/Ajax/GuardarModuloEspecificaciones',
				dataType: 'json',
				data: { 'fk_producto': products_id, 'titulo':titulo, 'visible':visible }
			}).done(function(ret) {

				var insert_id = ret.insert_id;
				var orden     = 1;

				$.ajax({
					method: 'POST',
					url: '/Ajax/EliminarModuloSubEspecificaciones',
					dataType: 'json',
					data: { 'fk_espe': insert_id }
				}).done(function(retE) {

					$('.mods').each(function(i,v) {

						var el = $(this);
						var m  = el.data('mod');

					   if(m == 1){

								$.ajax({
									method: 'POST',
									url: '/Ajax/GuardarModuloSubEspecificaciones',
									dataType: 'json',
									data: { 'fk_espe': insert_id, 'descripcion':el.val(), 'modulo':m, 'orden':orden++ }
								}).done(function(ret1) {

								});
					   }

					   if(m == 2){

								$.ajax({
									method: 'POST',
									url: '/Ajax/GuardarModuloSubEspecificaciones',
									dataType: 'json',
									data: { 'fk_espe': insert_id, 'descripcion':el.val(), 'modulo':m, 'orden':orden++ }
								}).done(function(ret2) {

								});
					   }

					   if(m == 3){

								$.ajax({
									method: 'POST',
									url: '/Ajax/GuardarModuloSubEspecificaciones',
									dataType: 'json',
									data: { 'fk_espe': insert_id, 'descripcion':el.val(), 'modulo':m, 'orden':orden++ }
								}).done(function(ret3) {

								});
					   }
					   
					});

				});

				
				
				var opts = {
					"closeButton": true,
					"debug": false,
					"positionClass": "toast-bottom-left",
					"onclick": null,
					"showDuration": "300",
					"hideDuration": "1000",
					"timeOut": "5000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				};
				
				toastr.success('Modulo Guardado', 'Estatus', opts);
				
			});
		});



		$('.VistaPrevia').on('click', function(e){
			e.preventDefault();

			var previewHtml = '';

			if ($('#modulo_descripcion').is(':checked'))
			{
				var descripcion = $('#descripcion').val();
				var img         = $('.fileinput-preview').children('img').attr('src');

				if(descripcion != '' && img != '')
				{
					previewHtml += '<table class="new_tabla" width="100%">';
							previewHtml += '<tr>';
								previewHtml += '<td class="bg_td_title">';
										previewHtml += descripcion;
								previewHtml += '</td>';
							previewHtml += '</tr>';
							previewHtml += '<tr>';
								previewHtml += '<td>';
									previewHtml += '<img src="'+img+'" />';
								previewHtml += '</td>';
							previewHtml += '</tr>';
					previewHtml += '</table><p></p>';
				}
			}

			if ($('#modulo_especificaciones').is(':checked'))
			{
				var especificaciones = $('#especificaciones').val();

				previewHtml += '<table class="new_tabla" width="100%">';
						previewHtml += '<tbody>';
							previewHtml += '<tr>';
								previewHtml += '<td class="bg_td_title" colspan="2">'+especificaciones+'</td>';
							previewHtml += '</tr>';

				$('.mods').each(function(i,v) {

					var el = $(this);
					var m  = el.data('mod');

				   if(m == 1){
						previewHtml += '<tr>';
							previewHtml += '<td class="bg_td" colspan="2">'+el.val()+'</td>';
						previewHtml += '</tr>';
				   }

				   if(m == 2){
						previewHtml += '<tr>';
							previewHtml += '<td>'+el.val()+'</td>';
				   }

				   if(m == 3){
							previewHtml += '<td>'+el.val()+'</td>';
						previewHtml += '</tr>';
				   }
				   
				});

				previewHtml += '</tbody>';
					previewHtml += '</table><p></p>';
			}

			if ($('#modulo_contenido').is(':checked'))
			{
				var contenido_titulo = $('#contenido_titulo').val();
				var contenido        = $('#contenido').val();
				var contenido_img    = $('.contenido-img').children('img').attr('src');

				if(contenido_titulo != '' && contenido != '' && contenido_img != '')
				{
					previewHtml += '<table class="new_tabla" width="100%">';
							previewHtml += '<tr>';
								previewHtml += '<td class="bg_td_title">';
										previewHtml += contenido_titulo;
								previewHtml += '</td>';
							previewHtml += '</tr>';
							previewHtml += '<tr>';
								previewHtml += '<td>';
									previewHtml += contenido;
								previewHtml += '</td>';
							previewHtml += '</tr>';
							previewHtml += '<tr>';
								previewHtml += '<td>';
									previewHtml += '<img src="'+contenido_img+'" />';
								previewHtml += '</td>';
							previewHtml += '</tr>';
					previewHtml += '</table><p></p>';
				}
			}

			$('.previewHtml').html(previewHtml);
			$('#htmlResult').val(previewHtml)


		});
		
		
	});
	
})(jQuery, window);
