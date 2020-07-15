(function($, window, undefined)
{
	"use strict";
	
	$(document).ready(function()
	{

		var caracteres = 140;
		$('#counter_js').html('Quedan <strong>'+  caracteres+'</strong> caracteres.');

		$('#products_name').keyup(function(){

			validar_longitud('#products_name');
		});

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
		
		/*function costo_focusout(){
			$('.costo_focusout').focusout(function(){
				var precio = $(this).val();
				var costo = $('#costo').val();

				if(precio >= costo){
					alert('El precio del producto no puede ser igual o menor al costo del mismo.');
					$(this).val('');
				}

			});
		}

		costo_focusout();*/

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

			
		$('.open_modal').on('click', function(e){
			e.preventDefault();
			var modal = $(this).data('modal');
			//var idinp = $(this).data('idinp');
			$(modal).modal('show', {backdrop: 'static'});
			//$('#inp_tmp').val(idinp);

			setTimeout(function(){
				$('.chosen-select').chosen();
			}, 1000);

		});

		/*$('.edit_info').on('click', function(){
			var products_id = $(this).data('id');
			console.log(products_id);
			$.ajax({
				url: '/ci/control_panel/get_product',
				dataType: 'json',
				cache: false,
				data: {'products_id':products_id},                         
				type: 'post',
				success: function(response){
					$('#products_status').val(response.products_status);
					$('#id_categoria').val(response.categories_id);
					$('#fk_categoria').val(response.fk_categoria);
					$('#manufacturers_id').val(response.manufacturers_id);
					$('#products_name').val(response.products_name);
					$('#products_model').val(response.products_model);
					$('#costo').val(response.costo);
					$('#costo_nacional').val(response.costo_nacional);
					$('#products_price').val(response.products_price);
					$('#precio_mayoreo').val(response.precio_mayoreo);
					$('#precio_distribuidor').val(response.precio_distribuidor);
				}
			});

		});*/

		$('.save_product').on('click', function() {
			var formData = new FormData($('#new_product')[0]);
			$.ajax({
				url: '/ci/control_panel/save_product',
				dataType: 'json',
				cache: false,
				processData: false,
				contentType: false,
				data: formData,                         
				type: 'post',
				success: function(response){
					/*$.each(response, function(index,value){
						console.log(value);
					});*/
				}
			});
		});

		
	
		
	});
	
})(jQuery, window);
