(function($, window, undefined)
{
	"use strict";
	
	$(document).ready(function()
	{

		$('#cliente').keydown(function (e) {

			var el = $(this);
			
			if (e.which === 13) {

				$('.BuscarPedido').trigger('click');
			}

		});

		

		$('#RevisarGuia').keydown(function (e){
			var el    = $(this);
			if (e.which === 13)
			{
				var guia    = el.val();
				$.ajax({
					method: 'POST',
					url: '/Panel/CompararGuia',
					dataType: 'json',
					data: {'guia':guia}
				})
				.done(function( return_a ) {
					if(return_a != null){
				    	$('#'+return_a.guia).addClass('success');
				    	$('#'+return_a.guia).find('span').removeClass('label-info').addClass('label-success').text('Entregada');
				    	$('.DivMensaje').html('');
				    }else{
				    	$('.DivMensaje').html('<div class="alert alert-danger">Guia <strong>'+guia+'</strong> no encontrada.</div>');
				    }
				    $('#RevisarGuia').val('');
				});
			}
     	});

		function input_guias()
     	{

     		$('.input_guias').keydown(function (e)
     		{
				var el    = $(this);

				if (e.which === 13)
				{
					var guia    = el.val();
					var guia_id = el.attr('id');

					if(el.is(':last-child')){
						var n=Math.floor(Math.random() * 1000000);
				    	$('.container_guias').append('<input id="'+n+'" type="text" name="guia[]" class="input_guias form-control">');
					}

					$(el).next('.input_guias').focus();

					input_guias();

					$('.input_guias').each(function (i,v)
					{
					    if(guia == v.value && guia_id != v.id)//if(guia == v.value && guia_id != v.id)
					    {
					    	$('#'+v.id).remove();
					    	alert('Guia Duplicada!');
					    	//console.log('no duplicada');
					    }
					});					

				}
	     	});
     	}

     	input_guias();

     	$('#form_guias').on('submit', function(e){
		    
		    e.preventDefault();

		});

		$('#GuardarGuias').click(function(){
			//$('#form_guias').submit();
			$.ajax({
					method: 'POST',
					url: '/Panel/GuardarGuias',
					dataType: 'json',
					data: $('#form_guias').serializeArray()
				})
				.done(function( return_a ) {

					var opts = {
							"closeButton"    : true,
							"debug"          : false,
							"positionClass"  : "toast-top-full-width",
							"onclick"        : null,
							"showDuration"   : "500",
							"hideDuration"   : "1000",
							"timeOut"        : "5000",
							"extendedTimeOut": "1000",
							"showEasing"     : "swing",
							"hideEasing"     : "linear",
							"showMethod"     : "fadeIn",
							"hideMethod"     : "fadeOut"
						};

					if(return_a.error == '0')
					{
						toastr.success(return_a.mensaje, 'Guias guardadas.', opts);
						setTimeout(function(){
							location.href ='/Panel/ControlPedidos';
						}, 2000);
					}else{
						
						toastr.error(return_a.mensaje, 'Error', opts);

					}

				});
		});
	

		$('#editar_almacen').on('click', function(e){
				e.preventDefault();

				var id_pedido_      = $('#id_pedido').val();
				var id_almacenista_ = $('#id_almacenista').val();
				var password_       = $('#password_almacenista').val();
				var observaciones_  = $('#observaciones').val();
				var estatus_        = $('#estatus').val();
				
				var current_url     = $('#current_url').val();

				$.ajax({
					method: 'POST',
					url: '/Panel/ActualizarAlmacenista',
					dataType: 'json',
					data: { 'id_almacenista': id_almacenista_, 'password': password_, 'id_pedido': id_pedido_,'observaciones':observaciones_, 'estatus':estatus_ }
				})
				.done(function( return_a ) {

					var opts = {
							"closeButton"    : true,
							"debug"          : false,
							"positionClass"  : "toast-top-full-width",
							"onclick"        : null,
							"showDuration"   : "500",
							"hideDuration"   : "1000",
							"timeOut"        : "5000",
							"extendedTimeOut": "1000",
							"showEasing"     : "swing",
							"hideEasing"     : "linear",
							"showMethod"     : "fadeIn",
							"hideMethod"     : "fadeOut"
						};

					if(return_a.error == '0')
					{

						toastr.success(return_a.mensaje, 'Exito', opts);
						/*setTimeout(function(){
							location.href ='/Panel/ControlPedidos';
						}, 2000);*/

					}else{
						
						toastr.error(return_a.mensaje, 'Error', opts);

					}

				});

				
			});

		$('.GuardarEmbarque').on('click', function()
		{
			var pedidos = [];
			$('.pedido').each(function (i,v)
			{
			  	pedidos.push($(v).data('select')); 
			});

			var observaciones_vendedor = $('#observaciones_vendedor').val();
			var tipo_envio             = $('#tipo_envio option:selected').val();
			var credito                = $('#credito option:selected').val();
			
			var opts                   = {
			"closeButton"              : true,
			"debug"                    : false,
			"positionClass"            : "toast-top-right",//toast-top-full-width
			"onclick"                  : null,
			"showDuration"             : "500",
			"hideDuration"             : "3000",
			"timeOut"                  : "0",
			"extendedTimeOut"          : "1000",
			"showEasing"               : "swing",
			"hideEasing"               : "linear",
			"showMethod"               : "fadeIn",
			"hideMethod"               : "fadeOut"
			};

			$.ajax({
					method: 'POST',
					url: '/Embarques/GuardarEmbarque',
					dataType: 'json',
					data: { 'observaciones_vendedor': observaciones_vendedor, 'tipo_envio': tipo_envio, 'credito': credito,'pedidos':pedidos }
				})
				.done(function( return_a ) {

					$.each(return_a, function(i,v){

						if(v.error == false){
							toastr.success(v.error_mensaje, 'Exito', opts);
							$('#pedidos_lista').html(' ');
							$('#observaciones_vendedor').val(' ');
							$('#cliente').val(' ');
						}else{
							toastr.error(v.error_mensaje, 'Error', opts);
						}

					});
					
				});
		});

		$('.BuscarPedido').on('click', function(){

					if ($('.mppb').is(':visible')) {

					} else {
						$('#ResultadosProductosOpen').trigger('click');
					}

					$('#pedidos_lista').html('<img src="'+base_url+'/assets/images/loader-1.gif" />');

					var cliente = $('#cliente').val();
					var pedidos_lista = '<tr><td>Folio</td><td>Fecha de pedido</td><td>Cantidad</td><td>Cliente</td><td>Vendedor</td><td>DOC SIG</td><td></td></tr>';

					$.getJSON('/Ajax/GetSaePedidos/'+cliente , function( json )
					{
						$.each(json, function(i,v){
							var b64        = btoa('{ "SERIE":"'+v.SERIE+'", "FOLIO":"'+v.FOLIO+'"}');
							pedidos_lista += '<tr><td>'+v.CVE_DOC+'</td> <td>'+v.FECHA_DOC+'</td> <td>$'+v.IMPORTE+'</td> <td>'+v.NOMBRECLIENTE+'</td> <td>'+v.NOMBRE+'</td> <td>'+v.DOC_SIG+'</td> <td><a class="btn btn-success seleccionar" data-select="'+b64+'">Seleccionar</a></td></tr>';
						});

						$('#pedidos_lista').html(pedidos_lista);

						var array = [];

						$('.seleccionar').on('click', function(e)
						{
							e.preventDefault();

							$(this).parent('td').parent('tr').toggleClass('success');
							$(this).toggleClass('pedido');

							/*var data_select   = $(this).data('select');
							var b64d          = atob(data_select);
							var json_select   = JSON.parse(b64d);*/

						});

						

					});

			});
		
	});
	
})(jQuery, window);
