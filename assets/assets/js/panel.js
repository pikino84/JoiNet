
function VerDetallesPsae(psae){

	$('.ImprimirTicketSae').addClass('disabled');
	$('#modal_block2').addClass('modal_block');

	$('#ModalImprimir').modal({
		backdrop: 'static',
		keyboard: false
	});

	$('#ModalImprimir').modal('show');

	$.ajax({
		method  : 'POST',
		url     : '/PedidosSae/Imprimir',
		dataType: 'json',
		data    : {'psae':psae}
	}).done(function( r ) {
		$('#tipo_documento').text('PEDIDO:');
		$('#tk_pedido').text(r.tk_pedido);
		$('#tk_vendedor').text(r.tk_vendedor);
		$('#tk_cliente_nombre').text(r.tk_cliente_nombre);
		$('#tk_cliente_numero').text(r.tk_cliente_numero);
		$('#tk_fecha').text(r.tk_fecha);
		$('#tk_descuento').text(r.tk_descuento);
		$('#tk_importe').text(r.tk_importe);
		//$('#barcodeCliente').html('<img src="'+r.barcodeCliente+'">');
		//$('#barcodePedido').html('<img src="'+r.barcodePedido+'">');

		var productos;

		var p = 0;

		var length = r.tk_productos.length;

		$.each(r.tk_productos, function(i,v){
			productos += '<tr class="partida">';
	            productos += '<td class="cstm" colspan="4">'+v.nombre+'</td>';
	        productos += '</tr>';
	        
	        var len = v.obs.length;
	        	if(len>1){
	        		productos += '<tr>';
	            		productos += '<td class="cstm" colspan="4">';
	                        productos += '<strong> COMENTARIOS: <i class="fa fa-arrow-right"></i></strong> '+v.obs;
	                    productos += '</td>';
	                productos += '</tr>';
	        	}
	            
	        productos += '<tr>';
	            productos += '<td class="text-center cstm" colspan="4">';
	                productos += '<img src="http://www.massivepc.com/images/'+v.imagen+'">';
	            productos += '</td>';
	        productos += '</tr>';
	        productos += '<tr>';
	            productos += '<td class="cstm">'+v.cantidad+'</td>';
	            productos += '<td class="cstm">'+v.clave+'</td>';
	            productos += '<td class="cstm">$'+v.precio_unit+'</td>';
	            productos += '<td class="cstm">$'+v.importe+'</td>';
	        productos += '</tr>';
			productos += '<tr>';
				productos += '<td colspan="4" class="brd1"><div></div></td>';
			productos += '</tr>';
			
		});

		var myCallBacka = function() {
			var urlActual = document.URL;
			var stripHash = urlActual.split('#');
			var segmento  = stripHash[0].split('/');

			if(segmento[4] != 'undefined' && segmento[4] == 'Nuevo'){
				$('#ModalImprimir').modal('hide');
				$('#n_cliente').val('9765');
				$('#datos_cliente').val('');
				$('#cant_max').val('');
				$('#folio').val('');
				$('#serie').val('');
				$('#documento').text('');
				$('#tipo_precio').val('menudeo');

				$( '.stb' ).empty();
				$('.AgregarPartida').trigger('click');

				$('#ImporteTotalMenudeo').text('0');
				$('#ImporteTotalMayoreo').text('0');
				$('#ImporteTotalDistribuidor').text('0');

				$('#ImporteTotalMenudeo,#ImporteTotalMayoreo,#ImporteTotalDistribuidor').removeClass('tile-green');
				$('#ImporteTotalMenudeo').addClass('tile-green');

			}

	    };

		$('#tk_productos').html(productos).promise().done(function(){
	       	$('.ModalImprimirBody').print({
		        	timeout: 1500,
		        	deferred: $.Deferred().done(myCallBacka)
			});
			$('.ImprimirTicketSae').removeClass('disabled');
			$('#modal_block2').removeClass('modal_block');
	    });

		

	});
}

function VerDetallesRsae(psae){

	$('.ImprimirTicketSae').addClass('disabled');
	$('#modal_block2').addClass('modal_block');

	$('#ModalImprimir').modal({
		backdrop: 'static',
		keyboard: false
	});

	$('#ModalImprimir').modal('show');

	$.ajax({
		method  : 'POST',
		url     : '/RemisionesSae/Imprimir',
		dataType: 'json',
		data    : {'psae':psae}
	}).done(function( r ) {

		$('#tipo_documento').text('REMISIÓN:');

		$('#tk_pedido').text(r.tk_pedido);
		$('#tk_vendedor').text(r.tk_vendedor);
		$('#tk_cliente_nombre').text(r.tk_cliente_nombre);
		$('#tk_cliente_numero').text(r.tk_cliente_numero);
		$('#tk_fecha').text(r.tk_fecha);
		$('#tk_descuento').text(r.tk_descuento);
		$('#tk_importe').text(r.tk_importe);

		var productos;
		var p = 0;
		var length = r.tk_productos.length;

		$.each(r.tk_productos, function(i,v){
			productos += '<tr class="partida">';
	            productos += '<td class="cstm" colspan="4">'+v.nombre+'</td>';
	        productos += '</tr>';
	        
	        var len = v.obs.length;
	        	if(len>1){
	        		productos += '<tr>';
	            		productos += '<td class="cstm" colspan="4">';
	                        productos += '<strong> COMENTARIOS: <i class="fa fa-arrow-right"></i></strong> '+v.obs;
	                    productos += '</td>';
	                productos += '</tr>';
	        	}
	            
	        productos += '<tr>';
	            productos += '<td class="text-center cstm" colspan="4">';
	                productos += '<img src="http://www.massivepc.com/images/'+v.imagen+'">';
	            productos += '</td>';
	        productos += '</tr>';
	        productos += '<tr>';
	            productos += '<td class="cstm">'+v.cantidad+'</td>';
	            productos += '<td class="cstm">'+v.clave+'</td>';
	            productos += '<td class="cstm">$'+v.precio_unit+'</td>';
	            productos += '<td class="cstm">$'+v.importe+'</td>';
	        productos += '</tr>';
			productos += '<tr>';
				productos += '<td colspan="4" class="brd1"><div></div></td>';
			productos += '</tr>';
			
		});

		var myCallBacka = function() {
			var urlActual = document.URL;
			var stripHash = urlActual.split('#');
			var segmento  = stripHash[0].split('/');

			if(segmento[4] != 'undefined' && segmento[4] == 'Nuevo'){
				$('#ModalImprimir').modal('hide');
				$('#n_cliente').val('MOSTR');
				$('#datos_cliente').val('');
				$('#cant_max').val('');
				$('#folio').val('');
				$('#serie').val('');
				$('#documento').text('');
				$('#tipo_precio').val('menudeo');

				$( '.stb' ).empty();
				$('.AgregarPartida').trigger('click');

				$('#ImporteTotalMenudeo').text('0');
				$('#ImporteTotalMayoreo').text('0');
				$('#ImporteTotalDistribuidor').text('0');

				$('#ImporteTotalMenudeo,#ImporteTotalMayoreo,#ImporteTotalDistribuidor').removeClass('tile-green');
				$('#ImporteTotalMenudeo').addClass('tile-green');

			}

	    };

		$('#tk_productos').html(productos).promise().done(function(){
	       	$('.ModalImprimirBody').print({
		        	timeout: 1500,
		        	deferred: $.Deferred().done(myCallBacka)
			});
			$('.ImprimirTicketSae').removeClass('disabled');
			$('#modal_block2').removeClass('modal_block');
	    });

		

	});
}






$(function () {

/***********/


		var opts                   = {
			"closeButton"              : true,
			"debug"                    : false,
			"positionClass"            : "toast-top-right",
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

		$('.actual').on('click', function(){
			var sele = $(this).children('input').val();
			console.log(sele);
		});

		$('.tet').daterangepicker({
			 "locale": {
			        "format": "YYYY-MM-DD",
			        "separator": " - ",
			        "applyLabel": "Aplicar",
			        "cancelLabel": "Cancelar",
			        "fromLabel": "Desde",
			        "toLabel": "Hasta",
			        "customRangeLabel": "Custom",
			        "daysOfWeek": [
			            "Dom",
			            "Lun",
			            "Mar",
			            "Mie",
			            "Jue",
			            "Vie",
			            "Sab"
			        ],
			        "monthNames": [
			            "Enero",
			            "Febrero",
			            "Marzo",
			            "Abril",
			            "Mayo",
			            "Junio",
			            "Julio",
			            "Agosto",
			            "Septiembre",
			            "Octubre",
			            "Noviembre",
			            "Diciembre"
			        ],
			        "firstDay": 1
			    }
			});

		var pathname = window.location.pathname;
		var path_e = pathname.split('/');

		$('.CalcularTotal').on('click', function(e){
			e.preventDefault();
			calcular_total_menudeo();
			calcular_total_mayoreo();
			calcular_total_distribuidor();
		});

		function get_vencedor(CVE_VEND)
		{
			$.ajax({
				method: 'POST',
				url: '/Ajax/ObjectVendedores',
				dataType: 'json',
				data: { 'CVE_VEND': CVE_VEND }
			}).done(function(ret) {
				
				console.log(ret);

				
			});
		}

		InputValid('size-1');

		function InputValid(css_class)
		{
			$('.'+css_class).keyup(function(){
			    var value = $(this).val();
			    value = value.replace(/^0/,"1");
			    $(this).val(value);
			});
		}


		function get_cliente(CLAVE)
		{
			$.ajax({
				method: 'POST',
				url: '/Ajax/GetClienteClave',
				dataType: 'json',
				data: { 'CLAVE': CLAVE }
			}).done(function(ret) {

				var rtcant  = parseFloat(ret.cantidad);

				//console.log(ret.cantidad);

				if(ret.status == '1'){
					$('.GuardarPedido').removeClass('disabled');
				}else{
					$('.GuardarPedido').addClass('disabled');
				}

				$('#datos_cliente').val(ret.nombre);
				$('#estado').val(ret.estado);
				$('#cant_max').val((rtcant).toFixed(2));

				$('#cant_max').priceFormat({
					prefix: '$ ',
					centsSeparator: '.',
					thousandsSeparator: ','
				});
				
			});
		}

		click_minimo();

		function click_minimo(){

			$('.minimo').on( 'change', function() {

				var el      = $(this);
				var CVE_ART = el.parent('td').parent('tr').children('td').children('input').val();
				var ID      = el.parent('td').parent('tr').attr('id');

				if($('#chkminimo-'+ID).is(':checked')){
					$('#minimo-'+ID).val('1');
					get_minimo(CVE_ART,ID);
				} else {
					$('#minimo-'+ID).val('0');
					GetProducto(CVE_ART,ID);
					calcular_total_menudeo();
					calcular_total_mayoreo();
					calcular_total_distribuidor();
				}

				
			});
		}

		function get_minimo(CVE_ART, ID)
		{
			$.ajax({
				method: 'POST',
				url: '/Ajax/ObjectPrecioMinimo',
				dataType: 'json',
				data: { 'CVE_ART': CVE_ART }
			}).done(function(ret) {

				$('#precio-'+ID).html('<span class="badge badge-danger badge-roundless">$'+(ret.PRECIO * 1.16).toFixed(2)+'</span>');
				$('#menudeo-'+ID).val((ret.PRECIO * 1.16).toFixed(2));	
				$('#mayoreo-'+ID).val((ret.PRECIO * 1.16).toFixed(2));	
				$('#distribuidor-'+ID).val((ret.PRECIO * 1.16).toFixed(2));

				calcular_total_menudeo();
				calcular_total_mayoreo();
				calcular_total_distribuidor();

			});
		}

		$('#n_cliente').focusout(function(){
			var CLAVE = $(this).val();
			get_cliente(CLAVE);
		});

		/*
			
		*/

		$('#precio_distribuidor').focusout(function(){
			var precio_distribuidor = parseInt($(this).val());
			var costo_nacional      = parseInt($('#costo_nacional').val());
			var precio_mayoreo      = parseInt($('#precio_mayoreo').val());
			var products_price      = parseInt($('#products_price').val());
			
			if(precio_distribuidor > costo_nacional && precio_distribuidor < precio_mayoreo && precio_distribuidor < products_price){
				$('.EditarProducto').removeClass('disabled');
			}else{
				$('.EditarProducto').addClass('disabled');
				$('#modal-validarPrecios').modal({
					backdrop: 'static',
					keyboard: false
				});
				$('#modal-validarPrecios').modal('show');
				$('#modal-validarPrecios .modal-body').html('Error en el precio Distribuidor no es correcto.');
			}
		});

		$('#precio_mayoreo').focusout(function(){
			var precio_mayoreo      = parseInt($(this).val());
			var precio_distribuidor = parseInt($('#precio_distribuidor').val());
			var products_price      = parseInt($('#products_price').val());
			var costo_nacional      = parseInt($('#costo_nacional').val());
			
			if(precio_mayoreo > precio_distribuidor && precio_mayoreo < products_price && precio_mayoreo > costo_nacional){
				$('.EditarProducto').removeClass('disabled');
			}else{
				$('.EditarProducto').addClass('disabled');
				$('#modal-validarPrecios').modal({
					backdrop: 'static',
					keyboard: false
				});
				$('#modal-validarPrecios').modal('show');
				$('#modal-validarPrecios .modal-body').html('Error en el precio Mayoreo no es correcto.');
			}
		});

		$('#products_price').focusout(function(){
			var products_price      = parseInt($(this).val());
			var precio_distribuidor = parseInt($('#precio_distribuidor').val());
			var precio_mayoreo      = parseInt($('#precio_mayoreo').val());
			var costo_nacional      = parseInt($('#costo_nacional').val());
			
			if(products_price > precio_mayoreo && products_price > precio_distribuidor && products_price > costo_nacional){
				$('.EditarProducto').removeClass('disabled');
			}else{
				$('.EditarProducto').addClass('disabled');
				$('#modal-validarPrecios').modal({
					backdrop: 'static',
					keyboard: false
				});
				$('#modal-validarPrecios').modal('show');
				$('#modal-validarPrecios .modal-body').html('Error en el precio Publico no es correcto.');
			}
		});

		$('#costo_nacional').focusout(function(){
			var costo_nacional      = parseInt($(this).val());
			var precio_distribuidor = parseInt($('#precio_distribuidor').val());
			var precio_mayoreo      = parseInt($('#precio_mayoreo').val());
			var products_price      = parseInt($('#products_price').val());
			
			if(costo_nacional < precio_mayoreo && costo_nacional < precio_distribuidor && costo_nacional < products_price){
				$('.EditarProducto').removeClass('disabled');
			}else{
				$('.EditarProducto').addClass('disabled');
				$('#modal-validarPrecios').modal({
					backdrop: 'static',
					keyboard: false
				});
				$('#modal-validarPrecios').modal('show');
				$('#modal-validarPrecios .modal-body').html('Error en el Costo Nacional no es correcto.');
			}
		});

		

		//inputs();

		if(path_e[2] == 'EditarPsae')
		{
			$(window).bind("beforeunload", function() { 
		    	return confirm('Salir'); 
			});
		}

     	function inputs()
     	{
     		/*$('.inputs').keydown(function (e) {

     			var el = $(this);
     			if( el.hasClass('size-1') ){
     				if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57) && (e.which < 96 || e.which > 105) ) {
						if(e.which === 13){
							$('.AgregarPartida').trigger('click');
							var index = $('.inputs').index(el) + 1;
							$('.inputs').eq(index).focus();
						}else{
							return false;
						}
					}
     			}else{
					if(e.which === 13){
						var index = $('.inputs').index(el) + 1;
						$('.inputs').eq(index).focus();
						return false;
					}
     			}
	     	});*/
     	}


   
		if(window.location.hash)
		{
		  	var hash_data = window.location.hash.slice(1);

	        var ret = hash_data.split("-");

	        if(ret[0] == 'VerDetallesPsae')
	        {
	        	VerDetallesPsae(ret[1]);
	        }

	        if(ret[0] == 'VerDetallesRsae')
	        {
	        	VerDetallesRsae(ret[1]);
	        }

	        if(ret[0] == 'VerDetallesPsaeImpr'){
	        	VerDetallesPsaeImpr(ret[1]);
	        }
	        
		}

		$(window).on('hashchange',function(){ 

	        var hash_data = location.hash.slice(1);

	        var ret = hash_data.split("-");

	        switch(ret[0])
	        {
	        	case 'VerDetalles':
	        		VerDetalles(ret[1]);
	        	break;

	        	case 'DetallesPedido':
	        		DetallesPedido(ret[1]);
	        	break;

	        	case 'VerDetallesImagenes':
	        		VerDetallesImagenes(ret[1]);
	        	break;

	        	case 'VerDetallesGaleria':
	        		VerDetallesGaleria(ret[1]);
	        	break;

	        	case 'VerDetallesPsae':
	        		VerDetallesPsae(ret[1]);
	        	break;

	        	case 'VerDetallesRsae':
	        		VerDetallesRsae(ret[1]);
	        	break;

	        	case 'VerDetallesPsaeImpr':
	        		VerDetallesPsaeImpr(ret[1]);
	        	break;

	        	case 'EditarEstatusAlmacenista':
	        		EditarEstatusAlmacenista(ret[1]);
	        	break;

	        	case 'AutorizarCredito':
	        		AutorizarCredito(ret[1]);
	        	break;

	        	case 'PausarPedido':
	        		PausarPedido(ret[1]);
	        	break;

	        	case 'ReanudarPedido':
	        		ReanudarPedido(ret[1]);
	        	break;

	        	case 'CancelarPedido':
	        		CancelarPedido(ret[1]);
	        	break;

	        	case 'VerDetallesEstatusPedidos':
	        		VerDetallesEstatusPedidos(ret[1]);
	        	break;

	        	case 'MostrarDetalleCompra':
	        		MostrarDetalleCompra(ret[1]);
	        	break;

	        	case 'ClienteSaldo':
	        		var saldo = hash_data.split("|");
	        		//console.log(saldo[1]);
	        		ClienteSaldo(saldo[1]);
	        	break;
	        }
	    });

	    function ClienteSaldo(saldo)
		{
			$('#modal-cliente-saldo').modal({
			        backdrop: 'static',
			        keyboard: false
			    });

			$('#modal-cliente-saldo').modal('show');
			
			$('#modal-cliente-saldo .modal-body').html('$'+saldo);
		}

		function MostrarDetalleCompra(idcompra)
		{
			$('#ModalMostrarDetalleCompra').modal({
			        backdrop: 'static',
			        keyboard: false
			    });

			$('#ModalMostrarDetalleCompra').modal('show');
			
			$.ajax({
				url: '/Compras/MostrarDetalleCompra/'+idcompra,
				dataType: 'json',
				success: function(response)
				{
					//$('#ModalMostrarDetalleCompra .modal-body').html(response);
					var html_r = '<table class="table table-condensed table-bordered table-hover table-striped">';
					html_r += '<tr><td>CLAVE</td><td>DESCRIPCIÓN</td><td>CANTIDAD</td><td>COSTO</td><td>DISTRIBUIDOR</td><td>MAYOREO</td><td>PUBLICO</td></tr>';
					$.each(response, function(i,v){
						html_r += '<tr><td>'+v.CVE_ART+'</td><td>'+v.DESCR+'</td><td>'+v.CANT+'</td><td>$'+v.COST+'</td><td>$'+v.DISTRIBUIDOR+' <span class="badge badge-success badge-roundless">%'+v.PR_D+'</span></td><td>$'+v.MAYOREO+' <span class="badge badge-success badge-roundless">%'+v.PR_M+'</span></td><td>$'+v.PUBLICO+' <span class="badge badge-success badge-roundless">%'+v.PR_P+'</span></td></tr>';
					});
					html_r += '</table>';
					$('#ModalMostrarDetalleCompra .modal-body').html(html_r);

					var btns_ = '';

					btns_ += '<a class="btn btn-primary enviar_compra_sae">Enviar a Prometheus</a>';
					
					$('#ModalMostrarDetalleCompra .modal-body').append(btns_);

					$('.enviar_compra_sae').on('click', function(e){
						e.preventDefault();
						$('#ModalMostrarDetalleCompra .modal-body').html('<img src="/assets/images/loader-1.gif" />');
						
						$.ajax({
							method: 'POST',
							url: '/Compras/ActualizarCompra/'+idcompra,
							dataType: 'json'
						})
						.done(function( return_t_t ) {
							$('#ModalMostrarDetalleCompra .modal-body').html('<strong>Costos y precios insertados en Prometheus</strong>');
						});

					});
				}
			});
		}

	    function CancelarPedido(idpedido)
		{
			$('#ModalCancelarPedido').modal({
			        backdrop: 'static',
			        keyboard: false
			    });
			$('#ModalCancelarPedido').modal('show');
			$('#MotivoCancelacion').keydown(function (e) {
				var el = $(this);
				if (e.which === 13) {
					$.ajax({
						method: 'POST',
						url: '/Panel/CancelarPedido',
						dataType: 'json',
						data: {'id_pedido':idpedido,'CancelarPassword':$('#CancelarPassword').val(), 'n_usuario':$('#n_usuario').val(), 'MotivoCancelacion':$('#MotivoCancelacion').val()}
					})
					.done(function( return_a ) {
						if(return_a.cancelar != ''){
							$('#CancelarMensaje').html('<div class="alert alert-success">Pedido <strong>'+idpedido+'</strong> Cancelado</div>');

							setTimeout(function(){
								location.href ='/Panel/ControlPedidos';
							}, 2000);
						}else{
							$('#CancelarMensaje').html('<div class="alert alert-danger">Autorización incorrecta</div>');
						}
					});
				}
			});
		}

	    function VerDetallesEstatusPedidos(idpedido)
		{
			$('#ModalDetallesEstatusPedidos').modal({
			        backdrop: 'static',
			        keyboard: false
			    });

			$('#ModalDetallesEstatusPedidos').modal('show');
			
			$.ajax({
				url: '/Panel/VerDetallesEstatusPedidos/'+idpedido,
				success: function(response)
				{
					$('#ModalDetallesEstatusPedidos .modal-body').html(response);
				}
			});
		}

		function ReanudarPedido(idpedido)
		{
			$('#ModalReanudarPedido').modal({
			        backdrop: 'static',
			        keyboard: false
			    });
			$('#ModalReanudarPedido').modal('show');
			$('#ReanudarPassword').keydown(function (e) {
				var el = $(this);
				if (e.which === 13) {
					$.ajax({
						method: 'POST',
						url: '/Panel/ReanudarPedido',
						dataType: 'json',
						data: {'id_pedido':idpedido,'ReanudarPassword':$('#ReanudarPassword').val(), 'id_vendedor':$('#r_id_vendedor').val()}
					})
					.done(function( return_a ) {
						if(return_a.reanudar != ''){
							$('#PausaMensaje').html('<div class="alert alert-success">Pedido <strong>'+idpedido+'</strong> Reanudado</div>');

							setTimeout(function(){
								location.href ='/Panel/ControlPedidos';
							}, 2000);
						}else{
							$('#PausaMensaje').html('<div class="alert alert-danger">Autorización incorrecta</div>');
						}
					});
				}
			});
		}

		function PausarPedido(idpedido)
		{
			$('#ModalPausarPedido').modal({
			        backdrop: 'static',
			        keyboard: false
			    });
			$('#ModalPausarPedido').modal('show');
			$('#PausarPassword').keydown(function (e) {
				var el = $(this);
				if (e.which === 13) {
					$.ajax({
						method: 'POST',
						url: '/Panel/PausarPedido',
						dataType: 'json',
						data: {'id_pedido':idpedido,'PausarPassword':$('#PausarPassword').val(), 'id_vendedor':$('#id_vendedor').val()}
					})
					.done(function( return_a ) {
						if(return_a.reanudar != ''){
							$('#PausaMensaje').html('<div class="alert alert-success">Pedido <strong>'+idpedido+'</strong> Pausado</div>');

							setTimeout(function(){
								location.href ='/Panel/ControlPedidos';
							}, 2000);
						}else{
							$('#PausaMensaje').html('<div class="alert alert-danger">Autorización incorrecta</div>');
						}
					});
				}
			});
		}

		function AutorizarCredito(idpedido)
		{
			$('#ModaleditarAutorizarCredito').modal({
			        backdrop: 'static',
			        keyboard: false
			    });
			$('#ModaleditarAutorizarCredito').modal('show');

			$('#CreditoPassword').keydown(function (e) {

				var el = $(this);
				
				if (e.which === 13) {

					$.ajax({
						method: 'POST',
						url: '/Panel/CreditoPassword',
						dataType: 'json',
						data: {'id_pedido':idpedido,'CreditoPassword':$('#CreditoPassword').val()}
					})
					.done(function( return_a ) {
						if(return_a.nombre != null){
							$('#CreditoMensaje').html('<div class="alert alert-success">Autorizado por <strong> '+return_a.nombre+'</strong></div>');

							setTimeout(function(){
								location.href ='/Panel/ControlPedidos';
							}, 2000);
						}else{
							$('#CreditoMensaje').html('<div class="alert alert-danger">Autorización incorrecta</div>');
						}
						
					});
				}

			});

		}

	    function EditarEstatusAlmacenista(idpedido)
		{
			$.ajax({
				method: 'POST',
				url: '/Ajax/GetControlPedido',
				dataType: 'json',
				data: { 'id_pedido': idpedido }
			}).done(function(ret) {
				var id_pedido        = ret.id_pedido;
				var estatus_pedido   = ret.estatus;
				var almacenista      = ret.fk_almacenista;
				var observaciones_64 = ret.observaciones;

				if(almacenista != ''){
					$('#id_almacenista').val(almacenista);
					var selectBox = $('select#id_almacenista').data('selectBox-selectBoxIt');
					selectBox.refresh();
				}
				if(estatus_pedido != ''){
					$('#estatus').val(estatus_pedido);
					var selectBoxE = $('select#estatus').data('selectBox-selectBoxIt');
					selectBoxE.refresh();
				}
				$('#observaciones').val(observaciones_64);
				$('#id_pedido').val(id_pedido);
				$('#myModaleditar').modal({
			        backdrop: 'static',
			        keyboard: false
			    });
			    $('#myModaleditar').modal('show');
			});
		}

		$('.chosen-select').chosen();

		var caracteres = 140;
		$('#counter_js').html('Quedan <strong>'+  caracteres +'</strong> caracteres.');

		$('#products_name').keyup(function(){

			validar_longitud('#products_name');
		});

		$('.photos-crud').sortable({
    		handle: '.move-box',
    		opacity: 0.6,
    		cursor: 'move',
    		revert: true,
    		update: function(x,u) {
				var order = $(this).sortable("serialize");
				var data_i = u.item.data('products_id');
				$.post('/Productos/OrdenarImagenes/'+data_i, order, function(theResponse){});
			}
    	});

    	$('.ImprimirPedido').on('click', function(){
    		$('.VerDetallesPsaeBody').print();
    	});

    	$('.ImprimirRemision').on('click', function(){
    		$('.VerDetallesRsaeBody').print();
    	});

    	
    	function new_input(nxt_id)
    	{
			var new_input = '<tr id="'+nxt_id+'">';
				new_input += '<td>';
				new_input += '<input type="text" id="codigo-'+nxt_id+'" onkeydown="keyCodigo(event);" onfocusout="focusCodigo.call(this);" name="codigo[]" class="form-control codigo inputs">';
				new_input += '</td>';
				new_input += '<td><input type="text" name="cantidad[]" onkeydown="keyCodigo(event);" class="form-control input-sm size-1 inputs"></td>';
				new_input += '<td><div id="imagen-'+nxt_id+'"></div></td>';
				new_input += '<td><div id="nombre-'+nxt_id+'"></div>';
				new_input += '<div class="input-group">';
				new_input += '<span class="input-group-addon label-primary"><i class="fa fa-comment-o"></i></span><input type="text" class="form-control input_comentarios" name="comentarios[]" placeholder="Comentarios / Observaciones de la partida actual.">';
				new_input += '</div></td>';
				new_input += '<td><div id="precio-'+nxt_id+'"></div></td>';
				new_input += '<td class="text-center">';
				new_input += '<button type="button" class="btn btn-red btn-icon EliminarPartida">';
				new_input += 'Eliminar';
				new_input += '<i class="fa fa-minus"></i>';
				new_input += '</button>';
				new_input += '</td>';
				new_input += '<td class="text-center">';
				new_input += '<div class="checkbox checkbox-replace color-red minimo">';
				new_input += '<input type="checkbox" id="chkminimo-'+nxt_id+'">';
				new_input += '</div>';
				new_input += '<input type="hidden" name="minimo[]" id="minimo-'+nxt_id+'" value="0">';
				new_input += '<input type="hidden" class="menudeo" id="menudeo-'+nxt_id+'" name="menudeo">';
				new_input += '<input type="hidden" class="mayoreo" id="mayoreo-'+nxt_id+'" name="mayoreo">';
				new_input += '<input type="hidden" class="distribuidor" id="distribuidor-'+nxt_id+'" name="distribuidor">';
				new_input += '</td>';
				new_input += '</tr>';
			return new_input; 
		}

		function focus_codigo()
		{
			/*$('.codigo').focusout(function(){
				var idp      = $(this).parent('td').parent('tr').attr('id');
				var v        = $(this).val();
				if(v != ''){
					GetProducto(v,idp);
					console.log(v+'-'+idp);
				}

			});*/
		}

		function focus_cantidad()
		{
			$('.size-1').focusout(function(){
				calcular_total_menudeo();
				calcular_total_mayoreo();
				calcular_total_distribuidor();
			});
		}

		function calcular_total_menudeo() {
			var importe_total = 0;
			$('.menudeo').each(
				function(index, value) {
					var cantidad  = $(this).parent('td').parent('tr').children('td').next('td').children('input').val();
					var menudeo   = $(this).val();
					importe_total = importe_total + eval(menudeo * cantidad);
				}
			);
			
			$('#ImporteTotalMenudeo').data('end',importe_total);
			tile_int();
		}

		function calcular_total_mayoreo() {
			var importe_total = 0;
			$('.mayoreo').each(
				function(index, value) {
					var cantidad = $(this).parent('td').parent('tr').children('td').next('td').children('input').val();
					var mayoreo = $(this).val();
					importe_total = importe_total + eval(mayoreo * cantidad);
				}
			);
			
			$('#ImporteTotalMayoreo').data('end',importe_total);
			tile_int();
		}

		function calcular_total_distribuidor() {
			var importe_total = 0;
			$('.distribuidor').each(
				function(index, value) {
					var cantidad = $(this).parent('td').parent('tr').children('td').next('td').children('input').val();
					var distribuidor = $(this).val();
					importe_total = importe_total + eval(distribuidor * cantidad);
				}
			);
			
			$('#ImporteTotalDistribuidor').data('end',importe_total);
			tile_int();
			
		}

		

		function ObjectJson(q)
		{
			

			if ($('.mppb').is(':visible')) {

			} else {
				$('#ResultadosProductosOpen').trigger('click');
			}

			$('.ResultadosProductos').html('<img src="'+base_url+'/assets/images/loader-1.gif" />');

			$.ajax({
				method: 'POST',
				url: '/Ajax/ObjectJson',
				dataType: 'json',
				data: { 'q': q }
			}).done(function(ret) {

				var list = '';

				$.each(ret, function(i,v)
				{
					list += '<tr> <td> <strong>'+v.codigo+' </strong></td> <td>'+v.desc+'</td> <td><img class="thumbnail" src="https://www.massivepc.com/images/'+v.manufacturers_image+'" /> </td> <td> <a href="#" onclick="window.open(\'https://www.massivepc.com/galeriam.php?products_id='+v.codigo+'\', \'_blank\', \'width=800,height=900,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0\');"><img src="'+v.img+'" class="thumbnail" /></a> </td>   <td>'+v.sae_exist+'</td> <td>$'+v.products_price+'</td> <td>$'+v.precio_mayoreo+'</td> <td>$'+v.precio_distribuidor+'</td> <td><button type="button" class="btn btn-primary btn-icon AddProd" data-id="'+v.codigo+'"> Agregar <i class="fa fa-plus"></i> </button></td>   </tr>';
				});

				$('.ResultadosProductos').html('<table class="table table-striped table-condensed"><thead><th>CODIGO</th> <th>DESCRIPCIÓN</th> <th>MARCA</th> <th>IMAGEN</th> <th>EXISTENCIAS</th> <th>MENUDEO</th> <th>MAYOREO</th> <th>DISTRIBUIDOR</th> <th></th> </thead><tbody>'+list+'</tbody></table>');

				$('.AddProd').on('click', function(){//dblclick

					$(this).addClass('disabled');
					$(this).removeClass('btn-primary');
					$(this).addClass('btn-green');
					$(this).text('Agregado');

					var codigo = $(this).data('id');

					var input_codigo = $('.stb tr').last().children('td:nth-child(1)').children('input').val();
					
					if(input_codigo == '')
					{

						$('.stb tr').last().children('td:nth-child(1)').children('input').val(codigo);
						var idp = $('.stb tr').last().attr('id');
						GetProducto(codigo,idp);
					}
					else
					{
						
						$('.AgregarPartida').trigger('click');
						$('.stb tr').last().children('td:nth-child(1)').children('input').val(codigo);
						var idp = $('.stb tr').last().attr('id');
						GetProducto(codigo,idp);
					}

				});
				
			});
			
		}

		$('.BuscarProducto').on('click', function(){			
			var q = $('#q').val();
			ObjectJson(q);
		});

		$('#q').keypress(function(e) {

		    if(e.which == 13){
				var q = $('#q').val();
				ObjectJson(q);
		    }

		});

		/*****************/
		
		/*****************/
		function opm()
		{
			$('.open_modal').on('click', function(e){
				e.preventDefault();
				var modal = $(this).data('modal');
				var idinp = $(this).data('idinp');
				$(modal).modal('show', {backdrop: 'static'});
				$('#inp_tmp').val(idinp);
			});
		}

		opm();

		$('.upper').keyup(function () {
			$(this).val($(this).val().toUpperCase());
		});

		$('.GetClientes').on('click', function(){

			var cliente_nombre = $('#cliente_nombre').val();

			$.ajax({
				method: 'POST',
				url: '/Ajax/GetCliente',
				dataType: 'json',
				data: { 'cliente_nombre': cliente_nombre }

			}).done(function( return_clientes ) {

				var table_clientes = '';

				table_clientes += '<table class="table table-striped table-hover">';
					table_clientes += '<thead>';
						table_clientes += '<tr>';
							table_clientes += '<th>Clave</th>';
							table_clientes += '<th>Nombre</th>';
						table_clientes += '</tr>';
					table_clientes += '</thead>';
					
					table_clientes += '<tbody>';

					$.each(return_clientes, function(i,v){
						table_clientes += '<tr class="tr_lista_cliente" data-clave="'+v.CLAVE+'">';
							table_clientes += '<td>'+v.CLAVE+'</td>';
							table_clientes += '<td>'+v.NOMBRE+'</td>';
						table_clientes += '</tr>';
					});

					table_clientes += '</tbody>';
				table_clientes += '</table>';

				$('#ayuda_lista_clientes').html(table_clientes);

				$('.tr_lista_cliente').on('dblclick', function(){
					var CLAVE = $(this).data('clave');
					$('#n_cliente').val(CLAVE);
					$('#modal-7').modal('hide');
				});
				
			});
		});

		
		EliminarPartida();

		function EliminarPartida()
		{

			$('.EliminarPartida').on('click', function(){

				var el = $(this);

				el.parent('td').parent('tr').remove();
				calcular_total_menudeo();
				calcular_total_mayoreo();
				calcular_total_distribuidor();

				$('.GuardarPedido, .CalcularTotal, .AgregarPartida').removeClass('disabled');


			});
		}


    	$('.AgregarPartida').on('click', function(){

			var idp     = $('.stb tr:last-child').attr('id');
			var input_c = new_input(parseInt(idp)+1);

			$( '.stb' ).append( input_c );
			
			InputValid('size-1');
			EliminarPartida();
			focus_codigo();
			focus_cantidad();
			//inputs();
			replaceCheckboxes();
			click_minimo();

    	});

    	focus_codigo();
    	focus_cantidad();

		function validar_longitud(id){
			if($(id).val().length > caracteres){
				$(id).val($(id).val().substr(0, caracteres));
			}
			var quedan = caracteres -  $(id).val().length;
			$('#counter_js').html('Quedan <strong>'+  quedan+'</strong> caracteres.');
			if(quedan <= 10){
				$('#counter_js').css('color','red');
			}else{
				$('#counter_js').css('color','black');
			}
		}
		
		$('#nacional').on( 'change', function() {
			if( $(this).is(':checked') ) {
				$('.cn_label').text('COSTO NACIONAL MXN');
				$('.cn_input').attr('id','costo_nacional');
				$('.cn_input').attr('name','costo_nacional');
			} else {
				$('.cn_label').text('COSTO INTERNACIONAL RMB');
				$('.cn_input').attr('id','costo');
				$('.cn_input').attr('name','costo');
			}
		});

		$('.EliminarProducto').on('click', function(e) {
			
			e.preventDefault();

			var producto = $(this).data('producto');
			var currenturl = $(this).data('currenturl');

			$('.BtnEliminarConfirmacion').attr('href', base_url+'Panel/EliminarProducto/'+producto+'?redirect='+currenturl);

			$('.ConfirmacionBody').html('¿Deseas eliminar el siguiente código? <strong>'+producto+'</strong>');

			$('#modal-confirm').modal('show', {backdrop: 'static'});
		
		});

		$('.EliminarCategoriaMayoreo').on('click', function(e) {
			
			e.preventDefault();

			var categoria = $(this).data('categoria');
			var currenturl = $(this).data('currenturl');

			$('.BtnEliminarConfirmacion').attr('href', base_url+'Categorias/Eliminar/'+categoria+'?redirect='+currenturl);

			$('.ConfirmacionBody').html('¿Deseas eliminar la siguiente categoría? <strong>'+categoria+'</strong>');

			$('#modal-confirm').modal('show', {backdrop: 'static'});
		
		});

		$('.EliminarMarca').on('click', function(e) {
			
			e.preventDefault();

			var marca = $(this).data('marca');
			var currenturl = $(this).data('currenturl');

			$('.BtnEliminarConfirmacion').attr('href', base_url+'Marcas/Eliminar/'+marca+'?redirect='+currenturl);

			$('.ConfirmacionBody').html('¿Deseas eliminar la siguiente marca? <strong>'+marca+'</strong>');

			$('#modal-confirm').modal('show', {backdrop: 'static'});
		
		});

		$('.EliminarMarca').on('click', function(e) {
			
			e.preventDefault();

			console.log('EliminarMarca');

			var marca = $(this).data('marca');
			var currenturl = $(this).data('currenturl');

			$('.BtnEliminarConfirmacion').attr('href', base_url+'Panel/EliminarMarca/'+marca+'?redirect='+currenturl);

			$('.ConfirmacionBody').html('¿Deseas eliminar la siguiente marca? <strong>'+marca+'</strong>');

			$('#modal-confirm').modal('show', {backdrop: 'static'});
		
		});

		$('.EliminarBanner').on('click', function(e) {
			
			e.preventDefault();

			var banner     = $(this).data('banner');
			var currenturl = $(this).data('currenturl');

			$('.BtnEliminarConfirmacion').attr('href', base_url+'Banners/Eliminar/'+banner+'?redirect='+currenturl);

			$('.ConfirmacionBody').html('¿Deseas eliminar el siguiente banner? <strong>'+banner+'</strong>');

			$('#modal-confirm').modal('show', {backdrop: 'static'});
		
		});

		$('.EliminarFaq').on('click', function(e) {
			
			e.preventDefault();

			var faq = $(this).data('faq');
			var currenturl = $(this).data('currenturl');

			$('.BtnEliminarConfirmacion').attr('href', base_url+'Faq/Eliminar/'+faq+'?redirect='+currenturl);

			$('.ConfirmacionBody').html('¿Deseas eliminar la siguiente FAQ? <strong>'+faq+'</strong>');

			$('#modal-confirm').modal('show', {backdrop: 'static'});
		
		});

		function DetallesPedido(pedido)
		{
			var tabla = '';

			$.ajax({
				method: 'POST',
				url: '/PedidosWeb/Detalles',
				dataType: 'json',
				data: { 'pedido': pedido }
			}).done(function( ret) {
				$('#modal-3').modal('show');

				$('#id').html('PEDIDO NO. #' + ret.data.id);
				$('#p_fecha').html(ret.data.p_fecha);

				var DatosCliente = 'Nombre: '+ ret.data.nombre + '<br>';
					DatosCliente += 'Correo: '+ ret.data.email + '<br>';
					DatosCliente += 'Teléfono: ' + ret.data.telefono + '<br>';
					DatosCliente += 'Dirección: ' + ret.data.direccion + '<br>';
					DatosCliente += 'Colonia: ' + ret.data.colonia + '<br>';
					DatosCliente += 'C.P.: ' + ret.data.cp + '<br>';
					DatosCliente += 'Población: ' + ret.data.poblacion + '<br>';
					DatosCliente += 'Estado: ' + ret.data.estado + '<br>';
					DatosCliente += 'País: ' + ret.data.pais;

				$('#DatosCliente').html(DatosCliente);

				var DatosFacturacion = 'Nombre: '+ ret.data.f_nombre + '<br>';
					DatosFacturacion += 'Correo: '+ ret.data.f_email + '<br>';
					DatosFacturacion += 'Teléfono: ' + ret.data.f_telefono + '<br>';
					DatosFacturacion += 'Dirección: ' + ret.data.f_direccion + '<br>';
					DatosFacturacion += 'Colonia: ' + ret.data.f_colonia + '<br>';
					DatosFacturacion += 'C.P.: ' + ret.data.f_cp + '<br>';
					DatosFacturacion += 'Población: ' + ret.data.f_poblacion + '<br>';
					DatosFacturacion += 'Estado: ' + ret.data.f_estado + '<br>';
					DatosFacturacion += 'País: ' + ret.data.f_pais;

				$('#DatosFacturacion').html(DatosFacturacion);

				$('#p_descripcion').html( ret.data.p_descripcion );

				if( ret.data.metodo_pago == 'proc_transfer' ){
					var metodo_pago = 'Transferencia';
				}else{
					var metodo_pago = 'PayPal';
				}

				$('#metodo_pago').html(metodo_pago);

				$('#p_comentarios').html( ret.data.comentarios );

			});
		}

		function VerDetalles(producto)
		{
			$.ajax({
				method: 'POST',
				url: '/Productos/LogProducto',
				dataType: 'json',
				data: { 'producto': producto }
			}).done(function(ret) {
				var list = '';

				$.each(ret, function(i, v){

					switch(v.accion)
					{
						case '1':
							var accion = 'Insertado';
						break;
						case '2':
							var accion = 'Editado';
						break;
						case '3':
							var accion = 'Eliminado';
						break;
					}

					list += '<li>';
						list += '<time class="cbp_tmtime" datetime="'+v.fecha_modificacion+'"><span>'+v.fecha_modificacion+'</span></time>';
						list += '<div class="cbp_tmicon bg-success">';
							list += '<i class="entypo-feather"></i>';
						list += '</div>';
						list += '<div class="cbp_tmlabel">';
							list += '<h2>'+v.nombre+'</h2>';
							list += '<p>Producto <a target="_blank" href="http://www.massivepc.com/-p-'+v.fk_product+'.html">'+v.fk_product+'</a>  '+accion+' </p>';
						list += '</div>';
					list += '</li>';
				});

				$('.cbp_tmtimeline').html(list);
			});

			$('#modal_logs').modal('show', {backdrop: 'static'});
		}

		function VerDetallesImagenes(producto)
		{
			$.ajax({
				method: 'POST',
				url: '/Productos/LogImagenes',
				dataType: 'json',
				data: { 'producto': producto }
			}).done(function(ret) {
				var list = '';

				$.each(ret, function(i, v){

					switch(v.accion)
					{
						case '1':
							var accion = 'Insertado';
						break;
						case '2':
							var accion = 'Editado';
						break;
						case '3':
							var accion = 'Eliminado';
						break;
					}
					
					list += '<li>';
						list += '<time class="cbp_tmtime" datetime="'+v.fecha_modificacion+'"><span>'+v.fecha_modificacion+'</span></time>';
						list += '<div class="cbp_tmicon bg-success">';
							list += '<i class="entypo-feather"></i>';
						list += '</div>';
						list += '<div class="cbp_tmlabel">';
							list += '<h2>'+v.nombre+'</h2>';
							list += '<p>Imagen de <strong>'+v.campo+' '+accion+'</strong> del producto <a target="_blank" href="http://www.massivepc.com/-p-'+v.fk_product+'.html">'+v.fk_product+'</a> </p>';
						list += '</div>';
					list += '</li>';
				});

				$('.cbp_tmtimeline').html(list);
			});

			$('#modal_logs').modal('show', {backdrop: 'static'});
		}

		function VerDetallesGaleria(producto)
		{
			$.ajax({
				method: 'POST',
				url: '/Panel/LogGaleria',
				dataType: 'json',
				data: { 'producto': producto }
			}).done(function(ret) {
				var list = '';

				$.each(ret, function(i, v){

					switch(v.accion)
					{
						case '1':
							var accion = 'Insertada';
						break;
						case '2':
							var accion = 'Editada';
						break;
						case '3':
							var accion = 'Eliminada';
						break;
					}
					
					list += '<li>';
						list += '<time class="cbp_tmtime" datetime="'+v.fecha_modificacion+'"><span>'+v.fecha_modificacion+'</span></time>';
						list += '<div class="cbp_tmicon bg-success">';
							list += '<i class="entypo-feather"></i>';
						list += '</div>';
						list += '<div class="cbp_tmlabel">';
							list += '<h2>'+v.nombre+'</h2>';
							list += '<p>Imagen <strong>'+accion+'</strong> en la galeria del producto <a target="_blank" href="http://www.massivepc.com/-p-'+v.fk_product+'.html">'+v.fk_product+'</a> </p>';
						list += '</div>';
					list += '</li>';
				});

				$('.cbp_tmtimeline').html(list);
			});

			$('#modal_logs').modal('show', {backdrop: 'static'});
		}

		

		/*function VerDetallesRsae(rsae)
		{
			
			$('.VerDetallesRsaeBody').html('<div class="text-center"><img src="'+base_url+'assets/images/loader-1.gif" /> <h6>Recuperando información</h6></div>');

			$.ajax({
				method: 'POST',
				url: '/Panel/VerDetallesRsae',
				dataType: 'html',
				data: { 'rsae': rsae }
			}).done(function(ret) {

				$('.VerDetallesRsaeBody').html(ret);

			});

			$('#modal-VerDetallesRsae').modal('show', {backdrop: 'static'});
		}*/

		/*function VerDetallesPsaeImpr(psae)
		{
			$.ajax({
				method: 'POST',
				url: '/Panel/VerDetallesPsae',
				dataType: 'html',
				data: { 'psae': psae }
			}).done(function(ret) {

				$('.VerDetallesPsaeBody').html(ret);
				//$('.ImprimirPedido').trigger('click');

			});
		}*/

		$('#ESTADO').on('change', function(){

			var estado_id = $(this).val();
			//console.log(estado_id);
			$.ajax({
				method: 'POST',
				url: '/Ajax/ObjectJsonMunicipios',
				dataType: 'json',
				data: { 'estado_id': estado_id }
			}).done(function(ret) {

				var list = '';

				$.each(ret, function(i, v){
					list += '<option value="'+v.nombre+'">'+v.nombre+'</option>';
				});

				$('#MUNICIPIO').html(list);

				$('#MUNICIPIO').removeAttr('disabled');

				$("#MUNICIPIO").trigger("chosen:updated");

			});

		});

		$('#tipo_precio').on('change', function(){
			var tipo_precio = $(this).val();

			$('.precio').removeClass('bg-success');
			$('.precio').removeClass('bg-info');
			$('.precio').removeClass('bg-danger');

			switch(tipo_precio){
				case 'menudeo':
					$('.precio_'+tipo_precio).addClass('bg-success');
				break;
				case 'mayoreo':
					$('.precio_'+tipo_precio).addClass('bg-info');
				break;
				case 'distribuidor':
					$('.precio_'+tipo_precio).addClass('bg-danger');
				break;
			}
			//$('.precio').hide();
			//$('.precio').removeClass('bg-success');
			//$('.precio_'+tipo_precio).show();
			//$('.precio_'+tipo_precio).addClass('bg-success');
		});

		function tile_int()
		{
			$('.tile-stats').each(function(i, el)
			{
				var $this = $(el),
					$num = $this.find('.num'),

					start = attrDefault($num, 'start', 0),
					end = attrDefault($num, 'end', 0),
					prefix = attrDefault($num, 'prefix', ''),
					postfix = attrDefault($num, 'postfix', ''),
					duration = attrDefault($num, 'duration', 1000),
					delay = attrDefault($num, 'delay', 1000);

				if(start < end)
				{
					if(typeof scrollMonitor == 'undefined')
					{
						$num.html(prefix + end + postfix);
					}
					else
					{
						var tile_stats = scrollMonitor.create( el );

						tile_stats.fullyEnterViewport(function(){

							var o = {curr: start};

							TweenLite.to(o, duration/1000, {curr: end, ease: Power1.easeInOut, delay: delay/1000, onUpdate: function()
								{
									$num.html(prefix + Math.round(o.curr) + postfix);
								}
							});

							tile_stats.destroy()
						});
					}
				}
			});
		}
/***********/
});
