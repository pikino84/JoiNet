var opts                   = {
			"closeButton"              : true,
			"debug"                    : false,
			"positionClass"            : "toast-top-right",
			"onclick"                  : null,
			"showDuration"             : "500",
			"hideDuration"             : "3000",
			"timeOut"                  : "10000",
			"extendedTimeOut"          : "1000",
			"showEasing"               : "swing",
			"hideEasing"               : "linear",
			"showMethod"               : "fadeIn",
			"hideMethod"               : "fadeOut"
		};

function focusCodigo(){
	var idp      = $(this).parent('td').parent('tr').attr('id');
	var v        = $(this).val();
	if(v != ''){
		GetProducto(v,idp);
	}
}

function GetProducto(products_id,idp){
	$.ajax({
		method: 'POST',
		url: '/PedidosSae/GetProducto',
		dataType: 'json',
		data: { 'products_id': products_id }
	}).done(function(ret) {

		//console.log(ret);

		//var ret = products_id.split("-");

		/*console.log(ret[1]);
		
		if(ret[0]=='REMATE'){

		}*/

		if(ret == null){

			toastr.error('Producto no encontrado', 'Error', opts);

			$('#imagen-'+idp).html('<img class="thumbnail" style="height:60px; display:block; margin:auto;" src="/assets/images/error-producto.jpg" />');
			$('#nombre-'+idp).html('<strong style="color:red;">Producto no encontrado</strong>');
			$('#precio-'+idp).html('<span class="precio precio_menudeo text-success bg-success">Error</span> - <span class="precio precio_mayoreo text-info">Error</span>  - <span class="precio precio_distribuidor text-danger">Error</span> ');

			$('#menudeo-'+idp).val(0);
			$('#mayoreo-'+idp).val(0);
			$('#distribuidor-'+idp).val(0);

			$('#codigo-'+idp).attr('disabled','disabled');

			$('.GuardarPedido, .CalcularTotal, .AgregarPartida').addClass('disabled');

		}else{

			if(products_id=='REMATE'){

				$('#precio-'+idp).html('<input onkeydown="keyRemateDown(event);" onkeyup="keyRemateUp(event);" data-idp="'+idp+'" type="text" class="form-control" />');

			}else{
				$('#imagen-'+idp).html('<img class="thumbnail" style="height:60px; display:block; margin:auto;" src="http://www.massivepc.com/images/'+ret.products_image+'" />');
				$('#nombre-'+idp).html(ret.products_name);
				$('#precio-'+idp).html('<span class="precio precio_menudeo text-success bg-success">$'+(ret.products_price * 1.16).toFixed(2)+'</span> - <span class="precio precio_mayoreo text-info">$'+(ret.precio_mayoreo * 1.16).toFixed(2)+'</span>  - <span class="precio precio_distribuidor text-danger">$'+(ret.precio_distribuidor * 1.16).toFixed(2)+'</span> ');

				$('#menudeo-'+idp).val((ret.products_price * 1.16).toFixed(2));
				$('#mayoreo-'+idp).val((ret.precio_mayoreo * 1.16).toFixed(2));
				$('#distribuidor-'+idp).val((ret.precio_distribuidor * 1.16).toFixed(2));
			}

			

		}

	});
}

function keyCodigo(event){
	var vr = $(event.target);
	if( vr.hasClass('size-1') ){
		if (event.which != 8 && event.which != 0 && (event.which < 48 || event.which > 57) && (event.which < 96 || event.which > 105) ) {
			if(event.which === 13){
				$('.AgregarPartida').trigger('click');
				var index = $('.inputs').index(vr) + 1;
				$('.inputs').eq(index).focus();
			}else{
				//return false;
				event.preventDefault();
			}
		}
	}else{
		if(event.which === 13){
			var index = $('.inputs').index(vr) + 1;
			$('.inputs').eq(index).focus();
			//return false;
			event.preventDefault();
		}
	}
}
/**/

function keyRemateDown(event){
	var vr = $(event.target);
	if (event.which != 8 && event.which != 0 && (event.which < 48 || event.which > 57) && (event.which < 96 || event.which > 105) ) {
		event.preventDefault();
	}
}

function keyRemateUp(event){
	var vr = $(event.target);
	//console.log(vr.val());
	var idp = vr.data('idp');
	$('#minimo-'+idp).val(vr.val());
	$('#menudeo-'+idp).val(vr.val());
	$('#mayoreo-'+idp).val(vr.val());
	$('#distribuidor-'+idp).val(vr.val());
}



	$(function () {

		$('.modulosPreciosB').on('click', function(){
			$('.modulosPreciosB').removeClass('tile-green');
			$(this).addClass('tile-green');
			var tipoprecio = $(this).data('tipoprecio');
			//console.log(tipoprecio);
			$('#tipo_precio').val(tipoprecio);
			$('.CalcularTotal').trigger('click');
		});

		

		$('#GuardarPsae').submit(function(e){
			e.preventDefault();
		});

		$('.GuardarPedido').on('click', function(e){
			//e.preventDefault();

			var el = $(this);

			el.addClass('disabled');

			var n_cliente   = $('#n_cliente').val();
			var GuardarPsae = $('#GuardarPsae').serializeArray();
			var n_vendedor  = $('#n_vendedor option:selected').val();
			var vt          = false;
			var serie       = $('#serie').val();
			var folio       = $('#folio').val();

			$.each($('.inputs'), function(){

				if($(this).val() != ''){
					vt += true;
				}else{
					vt += false;
				}

			});

			if(n_cliente != '' && n_vendedor != '' && vt >= 2){

				if(serie != '' && folio != ''){
					var accion = 'Actualizar';
				}else{
					var accion = 'Guardar';
				}

				$.ajax({
					method  : 'POST',
					url     : '/PedidosSae/'+accion,
					dataType: 'json',
					data    : GuardarPsae
				}).done(function( return_a ) {
					toastr.success('Número de pedido: '+return_a.SERIE+return_a.FOLIO, 'Pedido guardado', opts);
					$('#serie').val(return_a.SERIE);
					$('#folio').val(return_a.FOLIO);
					$('#documento').text(return_a.SERIE+return_a.FOLIO);
					$('.btnImprimir_int').removeClass('disabled');
					$('.btnImprimir_int').attr('href','#VerDetallesPsae-'+return_a.SERIE+'/'+return_a.FOLIO);
					el.removeClass('disabled');
					VerDetallesPsae(return_a.SERIE+'/'+return_a.FOLIO);
				});

			}else{
				//console.log(vt);
				toastr.error('Los campos estan incompletos.', 'Error', opts);
			}

			//console.log('Entro');

		});

		$('.ImprimirTicketSae').on('click', function(){
    		$('.ModalImprimirBody').print({
		        	timeout: 1000
			});
    	});

	});
	
//})(jQuery, window);
