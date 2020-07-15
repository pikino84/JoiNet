(function($, window, undefined)
{
	"use strict";
	
	$(document).ready(function()
	{

		var opts                   = {
			"closeButton"              : true,
			"debug"                    : false,
			"positionClass"            : "toast-top-right",
			"onclick"                  : null,
			"showDuration"             : "500",
			"hideDuration"             : "3000",
			"timeOut"                  : "2000",
			"extendedTimeOut"          : "1000",
			"showEasing"               : "swing",
			"hideEasing"               : "linear",
			"showMethod"               : "fadeIn",
			"hideMethod"               : "fadeOut"
			};

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

		function get_embarques_estatus(id_embarque){
			$.ajax({
				method: 'POST',
				url: '/Embarques/get_embarques_estatus',
				dataType: 'json',
				data: {'fk_embarque':id_embarque}
			})
			.done(function( r ) {
				
				if(r.nombre1 != null){
					$('#fk_surtidor_iniciado').replaceWith('<label id="fk_surtidor_iniciado" class="control-label text-danger">'+r.nombre1+'</label>');
				}else{
					GetAlmacenistas('fk_surtidor_iniciado');
				}
				
				if(r.nombre2 != null){
					$('#fk_surtidor_finalizado').replaceWith('<label id="fk_surtidor_finalizado" class="control-label text-danger">'+r.nombre2+'</label>');
				}else{
					GetAlmacenistas('fk_surtidor_finalizado');
				}

				if(r.nombre3 != null){
					$('#fk_revision_iniciado').replaceWith('<label id="fk_revision_iniciado" class="control-label text-danger">'+r.nombre3+'</label>');
				}else{
					GetVigilantes('fk_revision_iniciado');
				}
				
				if(r.nombre4 != null){
					$('#fk_revision_finalizado').replaceWith('<label id="fk_revision_finalizado" class="control-label text-danger">'+r.nombre4+'</label>');
				}else{
					GetVigilantes('fk_revision_finalizado');
				}

				if(r.nombre5 != null){
					$('#fk_empacador').replaceWith('<label id="fk_empacador" class="control-label text-danger">'+r.nombre5+'</label>');
				}else{
					GetAlmacenistas('fk_empacador');
				}

				if(r.nombre6 != null){
					$('#fk_emplayador').replaceWith('<label id="fk_emplayador" class="control-label text-danger">'+r.nombre6+'</label>');
				}else{
					GetAlmacenistas('fk_emplayador');
				}
				
				var success =  $('#success').val();
				
				$('#success').val(success += 1);


			});
		}

		function GetAlmacenistas(id){
			$('#'+id).chosen('destroy');
			$('#'+id).replaceWith('<label id="'+id+'"></label>');
			$.ajax({
				method: 'POST',
				url: '/Embarques/GetAlmacenistas',
				dataType: 'json'
			})
			.done(function( return_a ) {
				var almacenistas = '<option value=""> </option>';

				$.each(return_a, function(i,v){
					almacenistas += '<option value="'+v.id_almacenista+'">'+v.nombre+'</option>';
				});

				$('#'+id).replaceWith('<select class="chosen-select" name="'+id+'" id="'+id+'"></select>');

				$('#'+id).append(almacenistas);

				$('#'+id).chosen();

				var success =  $('#success').val();
				
				$('#success').val(success += 1);
			});
		}

		function GetVigilantes(id){
			$('#'+id).chosen('destroy');
			$('#'+id).replaceWith('<label id="'+id+'"></label>');
			$.ajax({
				method: 'POST',
				url: '/Embarques/GetVigilantes',
				dataType: 'json'
			})
			.done(function( return_a ) {
				var vigilantes = '<option value=""> </option>';

				$.each(return_a, function(i,v){
					vigilantes += '<option value="'+v.id_vigilante+'">'+v.nombre+'</option>';
				});

				$('#'+id+'').replaceWith('<select class="chosen-select" name="'+id+'" id="'+id+'"></select>');

				$('#'+id).append(vigilantes);

				$('#'+id).chosen();

				var success =  $('#success').val();

				$('#success').val(success += 1);

			});
		}



		$('.agregarPedido').on('click', function(e){

			e.preventDefault();

			$('#agregarPedido').modal({
				backdrop: 'static',
				keyboard: false
			});

			$('#agregarPedido').modal('show');

			var cliente     = $(this).data('cliente');
			var id_embarque = $(this).data('id_embarque');

			//console.log(cliente);

			$.ajax({
				method: 'POST',
				url: '/Embarques/get_pedidos_clientes',
				dataType: 'json',
				data: {'cliente':cliente, 'id_embarque':id_embarque}
			})
			.done(function( r ) {

				var pedidos = '<tr><td>Pedido</td><td>Fecha</td><td>Importe</td><td>Cliente</td><td>Vendedor</td><td></td></tr>';

				$.each(r, function(i,v){
pedidos += '<tr><td>'+v.CVE_DOC+'</td><td>'+v.FECHA_DOC+'</td><td>'+v.IMPORTE+'</td><td>'+v.NOMBRECLIENTE+'</td><td>'+v.NOMBRE+'</td><td><a data-embarque="" data-serie="'+v.SERIE+'" data-folio="'+v.FOLIO+'" class="btn btn-success set_pedido">Agregar</a></td></tr>';
				});

				$('#agregarPedido .modal-body > table').html(pedidos);

				$('.set_pedido').on('click', function(e){
					e.preventDefault();
					var serie = $(this).data('serie');
					var folio = $(this).data('folio');

					$.ajax({
						method: 'POST',
						url: '/Embarques/set_pedido',
						dataType: 'json',
						data: {'id_embarque':id_embarque, 'serie':serie, 'folio':folio}
					})
					.done(function( r ) {
						if(r.id_pedido != null){
							toastr.success(r.mensaje, 'Exito', opts);
						}else{
							toastr.error(r.mensaje, 'Error', opts);
						}
						
					});

				});
				
			});

		});


		

		$('.editarEmbarque').on('click', function(e){

			e.preventDefault();

			$('#editarEmbarque').modal({
				backdrop: 'static',
				keyboard: false
			});
			$('#editarEmbarque').modal('show');

			$('#modal_block').addClass('modal_block');

			$('#cajones_asignados').multiSelect('deselect_all');

			$('.chosen-select').chosen('destroy');

			$('#success').val('');

			var id_embarque = $(this).data('id_embarque');

			$('#m_pedidos').html('');

			$('#id_embarque').val(id_embarque);

			$.ajax({
				method: 'POST',
				url: '/Embarques/GetEmbarque',
				dataType: 'json',
				data: {'id_embarque':id_embarque}
			})
			.done(function( r ) {

				var m_tipo_envio = '<button type="button" class="btn btn-xs btn-red btn-icon"> Local <i class="fa fa-user"></i> </button>';
				if(r.tipo_envio == 2){
					var m_tipo_envio = '<button type="button" class="btn btn-xs btn-blue btn-icon"> Foráneo <i class="fa fa-truck"></i> </button>';
				}
				$('#m_tipo_envio').html(m_tipo_envio);

				var m_credito = 'No';
				if(r.credito == true){
					var m_credito = 'Si';
				}
				$('#m_credito').html(m_credito);
				$('#m_observaciones_vendedor').text(r.observaciones_vendedor);
				$('#n_cajas').val(r.n_cajas);
				$('#observaciones_almacen').val(r.observaciones_almacen);

				var success =  $('#success').val();
				$('#success').val(success += 1);
			});

			$.ajax({
				method: 'POST',
				url: '/Embarques/get_cajones_asignados',
				dataType: 'json',
				data: {'fk_embarque':id_embarque}
			})
			.done(function( return_a ) {
				$.each(return_a, function(i,v){
					$('#cajones_asignados option[value='+v.fk_cajon+']').prop('selected', true);
				});
				var success =  $('#success').val();
				$('#success').val(success += 1);
			});

			$.ajax({
				method: 'POST',
				url: '/Embarques/GetPedidos',
				dataType: 'json',
				data: {'fk_embarque':id_embarque}
			})
			.done(function( return_a ) {
				$.each(return_a, function(i,v){
					$('#m_pedidos').append('<a href="#VerDetallesPsae-'+v.serie+'/'+v.folio+'">['+v.serie+v.folio+']</a> ');
				});
				var success =  $('#success').val();
				$('#success').val(success += 1);
			});			

			/**/

			var timer =setInterval(function(){ 

				var success =  $('#success').val();

				//console.log('succ='+success);

				if(success == '111'){

					clearInterval(timer);

					setTimeout(function(){
						
						get_embarques_estatus(id_embarque);
						
						$('#cajones_asignados').multiSelect('refresh');

						$('#modal_block').removeClass('modal_block');


					}, 1000);
					
				}

			}, 500);

		});

		$('.ActualizarEmbarque').on('click', function(e){

			e.preventDefault();

			var fk_embarque           = $('#id_embarque').val();
			var n_cajas               = $('#n_cajas').val();
			var observaciones_almacen = $('#observaciones_almacen').val();
			var total_error           = 2;

			var fk_surtidor_iniciado   = $('#fk_surtidor_iniciado option:selected').val();
			var fk_surtidor_finalizado = $('#fk_surtidor_finalizado option:selected').val();
			var fk_revision_iniciado   = $('#fk_revision_iniciado option:selected').val();
			var fk_revision_finalizado = $('#fk_revision_finalizado option:selected').val();
			var fk_empacador           = $('#fk_empacador option:selected').val();
			var fk_emplayador          = $('#fk_emplayador option:selected').val();
			
			var cajones               = $('#cajones_asignados option:selected').map(function(){
				return this.value
			}).get();

			$.ajax({
				method: 'POST',
				url: '/Embarques/set_embarques_estatus',
				dataType: 'json',
				data: {
					'fk_embarque'           : fk_embarque,
					'fk_surtidor_iniciado'  : fk_surtidor_iniciado,
					'fk_surtidor_finalizado': fk_surtidor_finalizado,
					'fk_revision_iniciado'  : fk_revision_iniciado,
					'fk_revision_finalizado': fk_revision_finalizado,
					'fk_empacador'          : fk_empacador,
					'fk_emplayador'         : fk_emplayador
				}
			})
			.done(function( return_a ) {
				//console.log(return_a);
			});

			$.ajax({
				method: 'POST',
				url: '/Embarques/set_cajones_asignados',
				dataType: 'json',
				data: {'fk_embarque':fk_embarque, 'cajones':cajones}
			})
			.done(function( return_a ) {
				//console.log(return_a);
			});

			$.ajax({
				method: 'POST',
				url: '/Embarques/update_embarque',
				dataType: 'json',
				data: {'id_embarque':fk_embarque, 'n_cajas':n_cajas, 'observaciones_almacen':observaciones_almacen}
			})
			.done(function( return_a ) {
				//console.log(return_a);
			});

			toastr.success('Embarque <strong>'+fk_embarque+'</strong> actualizado', 'Exito', opts);

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
			var el = $(this);

			el.addClass('disabled');

			var pedidos = [];
			$('.pedido').each(function (i,v){
			  	pedidos.push($(v).data('select')); 
			});

			var observaciones_vendedor = $('#observaciones_vendedor').val();
			var tipo_envio             = $('#tipo_envio option:selected').val();
			var credito                = $('#credito option:selected').val();
			var cliente                = $('#cliente').val();
			
			$.ajax({
					method: 'POST',
					url: '/Embarques/GuardarEmbarque',
					dataType: 'json',
					data: { 'observaciones_vendedor': observaciones_vendedor, 'tipo_envio': tipo_envio, 'credito': credito,'pedidos':pedidos, 'cliente':cliente }
				})
				.done(function( return_a ) {

					el.removeClass('disabled');

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

						});

						

					});

			});
		
	});
	
})(jQuery, window);
