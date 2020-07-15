		function imprSelec(nombre){
			var ficha = document.getElementById(nombre);
			var ventimp = window.open(' ', 'popimpr');
			ventimp.document.write(ficha.innerHTML);
			ventimp.document.close();
			ventimp.print();
			ventimp.close();
		}
		
		function openwindow()
		{
			window.open("http://massivepc.com/ci/panel/productos_print","mywindow","menubar=0,resizable=0,width=1,height=1");
		}
			
		$(document).ready(function(){
			
			/*$('#slider').nivoSlider({
				effect:'fade',
				controlNav: false
			});*/

			
			$('.fancybox').fancybox({
				afterClose:function(){
					location.href='?';
				}
			});
			
			$('.fancybox2').fancybox();
						
			contents();
									
			$('#open_c').on('click',function(e){
				e.preventDefault();
				
				$('#arrow_triangle').addClass('cerrar_btn');
				$('#wrapper_carrito').css('margin','auto').animate({
					position:'absolute',
					width:1160,
					height:'100%', 
					top:0,
					bottom:0,
					left:0,
					right:0,
					'margin':'auto'
				},'slow','',function(){
					$('#wrapper_items').slideDown();
				});
			});
			
			$('#arrow_triangle').on('click', function(e){
				e.preventDefault();
				$('#arrow_triangle').removeClass('cerrar_btn');
				$('#wrapper_items').slideUp('slow',function(){
					$('#wrapper_carrito').animate({
						width: 190,
						height:45,
						position:'fixed',
						top:20,
						right:20
					}).css({left:'auto',bottom:'auto'});
				});
			});

            /*$('#validar_mail').click(function() {

                var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;

                if (regex.test($('#correo_boletin').val().trim())) {
                	$('#boletin_modal').modal('show');
                	console.log('1');
                } else {
                    $('#inscription_newsletter').on('submit', function(e) {
                        e.preventDefault();
                    });
                    console.log('2');
            		$('#boletin_modal').modal('show');
                }

            });*/
			
            $('.agregar').on('click', function(e) {
				
                e.preventDefault();
				
                var id = $(this).data('id');
                var price = $(this).data('price');
				var mayoreo = $(this).data('mayoreo');
				var distribuidor = $(this).data('distribuidor');
                var name = $(this).data('name');
				var imagen = $(this).data('imagen');
                var qty = $(this).prev('input').val();
                var dataS = {
                    'id': id,
                    'name': name,
                    'qty': qty,
					'price': price,
					'mayoreo': mayoreo,
					'distribuidor': distribuidor,
					'imagen': imagen
                };
				
					location.href= 'http://www.massivepc.com/mayoreo/carrito/g_agregar?id='+id+'&name='+name+'&qty='+qty+'&price='+price+'&mayoreo='+mayoreo+'&distribuidor='+distribuidor+'&imagen='+imagen;
            });
			
			function remove_p(){
			}
			
			function editar_qty(dataSe){
				$.ajax({
					url: base_path+'carrito/editar',
					type: "POST",
					data: dataSe,
					dataType: 'json',
					success: function(data_edit) {
						total_items();
						contents();
					}
				});
			}
			
			
			
			function contents(){
				var producto='<li> <span style="text-align:center; margin-left:0px;"><strong>Producto(s)</strong></span> <span style="text-align:center; margin-left:730px;"><strong>Cantidad</strong></span> <span style="text-align:center;"><strong>P.Unitario</strong></span> <span style="text-align:center;"><strong>Subtotal</strong></span> <span style="text-align:center;"><strong>Quitar</strong></span> <div class="clearfix"></div></li>';
				var p_precio=0;
				var p_mayoreo=0;
				var p_distribuidor=0;
				$.getJSON(base_path+'carrito/contents',function(data){
					$.each(data, function(i, v) {
						producto +='<li class="item_cart" id="'+v.rowid+'">';
							producto +='<img src="http://www.massivepc.com/images/'+v.options.imagen+'" />';
							producto +='<p>'+v.name+'</p>';
							producto +='<input type="text" class="form-control qty_key" value="'+v.qty+'" />';
							producto +='<span class="list_pp">'+v.price+'</span>';
							producto +='<span class="list_pp">'+parseInt(v.price * v.qty)+'</span>';
							producto +='<span class="list_pm">'+v.options.mayoreo+'</span>';
							producto +='<span class="list_pm">'+parseInt(v.options.mayoreo * v.qty)+'</span>';
							producto +='<span class="list_pd">'+v.options.distribuidor+'</span>';
							producto +='<span class="list_pd">'+parseInt(v.options.distribuidor * v.qty)+'</span>';
							producto +='<a href="http://www.massivepc.com/mayoreo/carrito/g_eliminar/?id='+v.rowid+'&rowid='+v.rowid+'" data-id="'+v.rowid+'" class="remove_p"></a>';
							producto +='<div class="clearfix"></div>';
						producto +='</li>';
						p_precio += parseInt(v.price * v.qty);
						p_mayoreo += parseInt(v.options.mayoreo * v.qty);
						p_distribuidor += parseInt(v.options.distribuidor * v.qty);
					});
					var label_act='';
					$('#items').html('<ul>'+producto+'<li style="display:none;"><br>'+label_act+'<br><button id="actualizar" class="btn btn-xs btn-primary" type="button">Actualizar carrito</button></li></ul>');
					
					$('#subtotal_publico,#subtotal_mayoreo,#subtotal_distribuidor').removeClass('tachado');
					$('#subtotal_publico,#subtotal_mayoreo,#subtotal_distribuidor').removeClass('validado');
					$('.list_pp,.list_pm,.list_pd').hide();
					
					if(p_distribuidor > 9999){
						$('#subtotal_mayoreo').addClass('tachado');
						$('#subtotal_publico').addClass('tachado');
						$('#subtotal_distribuidor').addClass('validado');
						$('#total').text(p_distribuidor + 99);
						$('#pagar,#actualizar').removeClass('disabled');
						$('.list_pd').show();
					}else if(p_mayoreo > 4999){
						$('#subtotal_publico').addClass('tachado');
						$('#subtotal_distribuidor').addClass('tachado');
						$('#subtotal_mayoreo').addClass('validado');
						$('#total').text(p_mayoreo + 99);
						$('#pagar,#actualizar').removeClass('disabled');
						$('.list_pm').show();
					}else{
						$('#subtotal_distribuidor').addClass('tachado');
						$('#subtotal_mayoreo').addClass('tachado');
						$('#subtotal_publico').addClass('validado');
						$('#total').text(p_precio + 99);
						if($('#total').text()<=99){
							$('#pagar,#actualizar').addClass('disabled');
						}else{
							$('#pagar,#actualizar').removeClass('disabled');
						}
						$('.list_pp').show();
					}
					
					$('#subtotal_publico').text(p_precio);
					$('#subtotal_mayoreo').text(p_mayoreo);
					$('#subtotal_distribuidor').text(p_distribuidor);
					$('#subtotal_publico,#subtotal_mayoreo,#subtotal_distribuidor,.list_pp,.list_pm,.list_pd').currency({
						region: 'MXN'
					});
					
					$('#total').currency({
						region: 'MXN'
					});
					
					$('.qty_key').keyup(function() {
						var arr_m = new Array;
						$('.item_cart').each(function() {
							var rowid = $(this).attr('id');
							var qty = $(this).find('input').val();
							arr_m.push({'rowid':rowid,'qty':qty});
						});
						var myJsonString = JSON.stringify(arr_m);
						$.ajax({
							url: base_path+'carrito/editar',
							type: "POST",
							data: {'data':myJsonString},
							dataType: 'json',
							success: function(data_r_ku){	
                                location.href='http://www.massivepc.com/mayoreo/';
							}
						});
					});
					remove_p();
				});
			}


        });