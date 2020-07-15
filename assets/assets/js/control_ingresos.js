(function($, window, undefined)
{
	"use strict";
	
	$(document).ready(function()
	{

		/*$('#cliente').keydown(function (e) {

			var el = $(this);
			
			if (e.which === 13) {

				$('.BuscarPedido').trigger('click');
			}

		});*/

		$('.BuscarCotizacion').on('click', function(){

					if ($('.mppb').is(':visible')) {

					} else {
						$('#ResultadosProductosOpen').trigger('click');
					}

					$('#pedidos_lista').html('<img src="'+base_url+'/assets/images/loader-1.gif" />');

					var folio = $('#folio').val();
					var pedidos_lista = '<tr><td>Folio</td><td>Fecha de pedido</td><td>Cantidad</td><td>Cliente</td><td>Vendedor</td><td>DOC SIG</td><td></td></tr>';

					$.getJSON('/Ajax/GetSaeCotizaciones/'+folio , function( json )
					{
						$.each(json, function(i,v){
							var b64        = btoa('{"CVE_VEND":"'+v.CVE_VEND+'", "SERIE":"'+v.SERIE+'", "FOLIO":"'+v.FOLIO+'","CVE_CLPV":"'+v.CVE_CLPV+'","CVE_DOC":"'+v.CVE_DOC+'", "FECHA_DOC":"'+v.FECHA_DOC+'", "CAN_TOT":"'+v.CAN_TOT+'", "IMP_TOT4":"'+v.IMP_TOT4+'", "DOC_SIG":"'+v.DOC_SIG+'", "cliente_nombre":"'+v.NOMBRECLIENTE+'"}');
							pedidos_lista += '<tr><td>'+v.CVE_DOC+'</td> <td>'+v.FECHA_DOC+'</td> <td>$'+v.IMPORTE+'</td> <td>'+v.NOMBRECLIENTE+'</td> <td>'+v.NOMBRE+'</td> <td>'+v.DOC_SIG+'</td> <td><a class="btn btn-success seleccionar" data-select="'+b64+'">Seleccionar</a></td></tr>';
						});

						$('#pedidos_lista').html(pedidos_lista);

						$('.seleccionar').on('click', function(e)
						{
							e.preventDefault();
							$('#pedidos_lista tr').removeClass('success');
							$(this).parent('td').parent('tr').addClass('success');

							var data_select   = $(this).data('select');
							var b64d          = atob(data_select);
							var json_select   = JSON.parse(b64d);

							$('#fk_vendedor')            .val((json_select.CVE_VEND).trim());
							$('#serie')                  .val(json_select.SERIE);
							$('#folio')                  .val(json_select.FOLIO);
							$('#cliente_clave')          .val((json_select.CVE_CLPV).trim());
							$('#cliente_nombre')         .val((json_select.cliente_nombre).trim());
							$('#cant_tot')               .val(json_select.CAN_TOT);
							$('#imp_tot')                .val(json_select.IMP_TOT4);
							$('#doc_sig')                .val(json_select.DOC_SIG);
							$('#fecha_eleboro_pedido')   .val(json_select.FECHA_DOC);

							

						});
					});

			});
		
	});
	
})(jQuery, window);
