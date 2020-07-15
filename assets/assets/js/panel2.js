(function($, window, undefined)
{
	"use strict";
	
	$(document).ready(function()
	{

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

		function get_cliente(CLAVE)
		{
			$.ajax({
				method: 'POST',
				url: '/Ajax/GetClienteClave',
				dataType: 'json',
				data: { 'CLAVE': CLAVE }
			}).done(function(ret) {

				console.log(ret.status);

				if(ret.status == '1'){
					$('.Guardar').removeClass('disabled');
				}else{
					$('.Guardar').addClass('disabled');
				}

				$('#datos_cliente').val(ret.nombre);
				
			});
		}

		click_minimo();

		function click_minimo(){
			$('.minimo').on( 'click', function() {
				var el = $(this);
				var CVE_ART = el.parent('td').parent('tr').children('td').children('input').val();
				var ID = el.parent('td').parent('tr').attr('id');
				get_minimo(CVE_ART,ID);

				if($('#chkminimo-'+ID).is(':checked'))
				{
					$('#minimo-'+ID).val('1');
				} else {
					$('#minimo-'+ID).val('0');
				}

				
			});
		}

		function click_comentarios(){
			/*$('.comentarios').on('click', function()
			{
				var t = $(this).parent('span').prev('.input_comentarios');

				if( t.is(":visible") ){
					t.hide('slide');
				}else{
					t.show('slide');
				}

			});*/
		}

		click_comentarios();

		function get_minimo(CVE_ART, ID)
		{
			$.ajax({
				method: 'POST',
				url: '/Ajax/ObjectPrecioMinimo',
				dataType: 'json',
				data: { 'CVE_ART': CVE_ART }
			}).done(function(ret) {

				$('#precio-'+ID).html('<span class="badge badge-danger badge-roundless">$'+(ret.PRECIO * 1.16).toFixed(2)+'</span>');				
			});
		}

		$('#n_cliente').focusout(function(){
			var CLAVE = $(this).val();
			get_cliente(CLAVE);
		});

		inputs();

     	function inputs()
     	{
     		$('.inputs').keydown(function (e) {
     			var el = $(this);
     			
				if (e.which === 13) {

					if( el.hasClass('size-1') ){

						$('.AgregarPartida').trigger('click');

						var index = $('.inputs').index(el) + 1;
						$('.inputs').eq(index).focus();

					}else{

						var index = $('.inputs').index(el) + 1;
						$('.inputs').eq(index).focus();

					}
					
				}
	     	});
     	}

     	$('#GuardarPsae').keydown(function (e) {
     		//console.log(e.which);
			if (e.which === 13) {
				e.preventDefault();
			}
			if (e.which === 114) {
				$('.Guardar').trigger('click');
			}
	     });

     	/*$('.size-1').keydown(function (e) {
			if (e.which === 13) {
				$('.AgregarPartida').trigger('click');
			}
	     });*/

		/*$('#n_vendedor').on('change', function(){
			var n_vendedor = $(this).val();
			get_vencedor(n_vendedor);
		});*/

		if(window.location.hash)
		{
		  	var hash_data = window.location.hash.slice(1);

	        var ret = hash_data.split("-");

	        if(ret[0] == 'VerDetallesPsae')
	        {
	        	VerDetallesPsae(ret[1]);
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

	        	case 'VerDetallesPsaeImpr':
	        		VerDetallesPsaeImpr(ret[1]);
	        	break;
	        }
	    });

		$('.chosen-select').chosen();

		//$('.typeahead').focusout(function(){
			//var t = $(this).val();
			//console.log(t);
			//var idp = $('.stb tr').last().attr('id');
			//$('.stb tr').last().children('td:nth-child(1)').children('input').val(t);
		//});

		
		/*$('.typeahead').keypress(function(e) {

			var code = $(this);

		    if(e.which == 13)
		    {
				var codigo = $(this).val();
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
				
				code.val(' ');
				
				
		    }

		});*/

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
				$.post('/Panel/OrdenarImagenes/'+data_i, order, function(theResponse){});
			}
    	});

    	$('.ImprimirPedido').on('click', function(){
    		$('.VerDetallesPsaeBody').print();
    	});
	

    	function new_input(nxt_id)
    	{
			var new_input = '<tr id="'+nxt_id+'">';
				new_input += '<td>';
				new_input += '<input type="text" id="codigo-'+nxt_id+'" name="codigo[]" class="form-control codigo inputs" required="">';
				//new_input += '<div class="input-group">';
				//new_input += '<input type="text" id="codigo-'+nxt_id+'" name="codigo[]" class="form-control input-sm codigo">';
				//new_input += '<div id="scrollable-dropdown-menu"><input type="text" name="codigo" class="form-control typeahead" data-remote="/Ajax/ObjectJson?q=%QUERY" data-template="<div class="thumb-entry"><span class="image"><img src="{{img}}" width=40 height=40 /></span><span class="text"><strong>{{value}}</strong><em>{{desc}}</em></span></div>" /></div>';
				//new_input += '<span class="input-group-btn">';
				//new_input += '<button class="btn btn-primary btn-sm" type="button"><i class="entypo-help"></i></button>';
				//new_input += '</span>';
				//new_input += '</div>';
				new_input += '</td>';
				//new_input += '<td><input type="text" name="cantidad[]" value="1" class="form-control" required=""></td>';
				new_input += '<td><div class="input-spinner">';
				new_input += '<button type="button" class="btn btn-primary btn-sm">-</button>';
				new_input += '<input type="text" name="cantidad[]" required="" class="form-control input-sm size-1 inputs" data-min="1" value="1" />';
				new_input += '<button type="button" class="btn btn-primary btn-sm">+</button>';
				new_input += '</div></td>';
				new_input += '<td><div id="imagen-'+nxt_id+'"></div></td>';
				new_input += '<td><div id="nombre-'+nxt_id+'"></div>';
				new_input += '<div class="input-group">';
				new_input += '<span class="input-group-addon"><i class="fa fa-comment-o"></i></span><input type="text" class="form-control input_comentarios" name="comentarios[]" placeholder="Comentarios / Observaciones de la partida actual.">';
				//new_input += '<span class="input-group-btn">';
				//new_input += '<button class="btn btn-primary comentarios pull-right" type="button"><i class="fa fa-comment-o"></i></button>';
				//new_input += '</span>';
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
				new_input += '<input type="checkbox" id="chkminimo-'+nxt_id+'">';//id="minimo-'+nxt_id+'"
				new_input += '</div>';
				new_input += '<input type="hidden" name="minimo[]" id="minimo-'+nxt_id+'" value="0">';
				new_input += '</td>';
				new_input += '</tr>';
			return new_input; 
		}

		function focus_codigo()
		{
			$('.codigo').focusout(function(){

				var idp = $(this).parent('td').parent('tr').attr('id');
				var v = $(this).val();
				if(v != ''){
					GetProducto(v,idp);
				}
				
			});
		}

		function GetProducto(products_id,idp)
		{
			$.ajax({
				method: 'POST',
				url: '/Ajax/GetProducto',
				dataType: 'json',
				data: { 'products_id': products_id }
			}).done(function(ret) {
				
				if(ret == null){
					alert('Producto no encontrado');
				}

				$('#imagen-'+idp).html('<img class="thumbnail" style="height:60px; display:block; margin:auto;" src="https://www.massivepc.com/images/'+ret.products_image+'" />');
				$('#nombre-'+idp).html(ret.products_name);
				//var products_price = ret.products_price;
				//$('#precio-'+idp).html('<table class="table"><thead><tr><th>Menudeo</th><th>Mayoreo</th><th>Distribuidor</th></tr></thead><tr><td><span class="precio">'+products_price+'</span></td><td><span class="precio">'+ret.precio_mayoreo+'</span></td><td><span class="precio">'+ret.precio_distribuidor+'</span></td></tr></table>');
				$('#precio-'+idp).html('<span class="precio precio_menudeo text-success bg-success">$'+(ret.products_price * 1.16).toFixed(2)+'</span> - <span class="precio precio_mayoreo text-info">$'+(ret.precio_mayoreo * 1.16).toFixed(2)+'</span>  - <span class="precio precio_distribuidor text-danger">$'+(ret.precio_distribuidor * 1.16).toFixed(2)+'</span> ');
				//var CVE_VEND = $('#n_vendedor option:selected').val();
				//get_vencedor(CVE_VEND);
			});
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
					list += '<tr> <td> <strong>'+v.codigo+' </strong></td> <td>'+v.desc+'</td> <td><img class="thumbnail" src="https://www.massivepc.com/images/'+v.manufacturers_image+'" /> </td> <td> <img src="'+v.img+'" class="thumbnail" /> </td>   <td>'+v.sae_exist+'</td> <td>$'+v.products_price+'</td> <td>$'+v.precio_mayoreo+'</td> <td>$'+v.precio_distribuidor+'</td> <td><button type="button" class="btn btn-primary btn-icon AddProd" data-id="'+v.codigo+'"> Agregar <i class="fa fa-plus"></i> </button></td>   </tr>';
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

		$('.EliminarPartida').on('click', function(){
				$(this).parent('td').parent('tr').remove();
			});

    	$('.AgregarPartida').on('click', function(){

    		var idp = $('.stb tr').last().attr('id');
    		var input_c = new_input(parseInt(idp)+1);
			$( '.stb' ).append( input_c );
			$('.EliminarPartida').on('click', function(){
				$(this).parent('td').parent('tr').remove();
			});

			focus_codigo();

			inputs();

			replaceCheckboxes();

			click_minimo();

			click_comentarios();

			//
			/**********/
			$(".input-spinner").each(function(i, el)
			{
				var $this = $(el),
					$minus = $this.find('button:first'),
					$plus = $this.find('button:last'),
					$input = $this.find('input'),

					minus_step = attrDefault($minus, 'step', -1),
					plus_step = attrDefault($minus, 'step', 1),

					min = attrDefault($input, 'min', null),
					max = attrDefault($input, 'max', null);


				$this.find('button').on('click', function(ev)
				{
					ev.preventDefault();

					var $this = $(this),
						val = $input.val(),
						step = attrDefault($this, 'step', $this[0] == $minus[0] ? -1 : 1);

					if( ! step.toString().match(/^[0-9-\.]+$/))
					{
						step = $this[0] == $minus[0] ? -1 : 1;
					}

					if( ! val.toString().match(/^[0-9-\.]+$/))
					{
						val = 0;
					}

					$input.val( parseFloat(val) + step ).trigger('keyup');
				});

				$input.keyup(function()
				{
					if(min != null && parseFloat($input.val()) < min)
					{
						$input.val(min);
					}
					else

					if(max != null && parseFloat($input.val()) > max)
					{
						$input.val(max);
					}
				});

			});
			/**********/
    	});

    	focus_codigo();

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

			$('.BtnEliminarConfirmacion').attr('href', base_url+'Panel/EliminarCategoriaMayoreo/'+categoria+'?redirect='+currenturl);

			$('.ConfirmacionBody').html('¿Deseas eliminar la siguiente categoría? <strong>'+categoria+'</strong>');

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

			console.log('EliminarBanner');

			var banner = $(this).data('banner');
			var currenturl = $(this).data('currenturl');

			$('.BtnEliminarConfirmacion').attr('href', base_url+'Panel/EliminarBanner/'+banner+'?redirect='+currenturl);

			$('.ConfirmacionBody').html('¿Deseas eliminar el siguiente banner? <strong>'+banner+'</strong>');

			$('#modal-confirm').modal('show', {backdrop: 'static'});
		
		});

		$('.EliminarFaq').on('click', function(e) {
			
			e.preventDefault();

			console.log('EliminarFaq');

			var faq = $(this).data('faq');
			var currenturl = $(this).data('currenturl');

			$('.BtnEliminarConfirmacion').attr('href', base_url+'Panel/EliminarFaq/'+faq+'?redirect='+currenturl);

			$('.ConfirmacionBody').html('¿Deseas eliminar la siguiente FAQ? <strong>'+faq+'</strong>');

			$('#modal-confirm').modal('show', {backdrop: 'static'});
		
		});

		function DetallesPedido(pedido)
		{
			var tabla = '';

			$.ajax({
				method: 'POST',
				url: '/Panel/DetallesPedido',
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
				url: '/Panel/LogProducto',
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
				url: '/Panel/LogImagenes',
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

		function VerDetallesPsae(psae)
		{
			
			$('.VerDetallesPsaeBody').html('<div class="text-center"><img src="'+base_url+'assets/images/loader-1.gif" /> <h6>Recuperando información</h6></div>');

			$.ajax({
				method: 'POST',
				url: '/Panel/VerDetallesPsae',
				dataType: 'html',
				data: { 'psae': psae }
			}).done(function(ret) {

				$('.VerDetallesPsaeBody').html(ret);

			});

			$('#modal-VerDetallesPsae').modal('show', {backdrop: 'static'});
		}

		function VerDetallesPsaeImpr(psae)
		{
			
			//$('.VerDetallesPsaeBody').html('<div class="text-center"><img src="'+base_url+'assets/images/loader-1.gif" /> <h6>Recuperando información</h6></div>');

			$.ajax({
				method: 'POST',
				url: '/Panel/VerDetallesPsae',
				dataType: 'html',
				data: { 'psae': psae }
			}).done(function(ret) {

				$('.VerDetallesPsaeBody').html(ret);
				$('.ImprimirPedido').trigger('click');

			});

			//$('#modal-VerDetallesPsae').modal('show', {backdrop: 'static'});
		}

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
		
	});
	
})(jQuery, window);
