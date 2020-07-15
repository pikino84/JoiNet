<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Pago</title>
	<link href="/css/jquery-ui.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/bootstrap3/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/bootstrap3/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
    <style>
	.form-control{
		margin-bottom:5px;
	}
	/*.container{ height:760px; width:750px; position:relative;}*/
	#loader_ajax_{width:150px; margin:auto; text-align:center;}
	</style>
    <script>
		var base_path='/mayoreo/';
	</script>
    
    <script src="/mayoreo/assets/js/jquery-1.10.1.min.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/mayoreo/assets/bootstrap3/js/bootstrap.js"></script>
    
    <script>

	function ValidaRfc(rfcStr) {
		var strCorrecta;
		strCorrecta = rfcStr;	
		if (rfcStr.length == 12){
		var valid = '^(([A-Z]|[a-z]){3})([0-9]{6})((([A-Z]|[a-z]|[0-9]){3}))';
		}else{
		var valid = '^(([A-Z]|[a-z]|\s){1})(([A-Z]|[a-z]){3})([0-9]{6})((([A-Z]|[a-z]|[0-9]){3}))';
		}
		var validRfc=new RegExp(valid);
		var matchArray=strCorrecta.match(validRfc);
		if (matchArray==null) {
			return false;
		}else{
			return true;
		}
		
	}

	function send_data() {
		$('#continuar').addClass('disabled');
		$('#datos_personales').hide();
		$('#datos_facturacion').hide();
		$('.container').append('<div id="loader_ajax_"><img src="http://www.massivepc.com/mayoreo/assets/img/ajax_loader.gif"/><br><strong>Procesando…</strong></div>');
		$.ajax({
			url: base_path+'pago/generar',
			type: "POST",
			data: $('#datos_personales').serializeArray(),
			dataType: 'json',
			success: function(data) {
				$('.container').html(data.contenido);
				$('.container').append('<div id="wrapper_impresion"><strong>Haz clic <a class="imprimir" href="#">aquí</a> para imprimir.</strong></div>');
				$('.imprimir').click(function(){
					window.print();
					return false;
				});
			}
		});
	}

		$(function(){
			
			$('#show_fact').on('click',function(){
				//$('#datos_facturacion').toggle();
				if($('#show_fact').is(':checked')){
					$('#datos_facturacion').slideDown();
				}else{
					$('#datos_facturacion').slideUp();
				}
			});

			$('.solo-numeros').keyup(function (){
				this.value = (this.value + '').replace(/[^0-9]/g, '');
			});
			
			$('#datos_personales').on('submit', function(e){
				e.preventDefault();


				var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
                if (regex.test($('#email').val().trim())){

                	if($('#show_fact').is(':checked')){
						var con = $('#rfc').val().trim();
						if(ValidaRfc(con) == true){
							send_data();
						}else{
							alert('El rfc es incorrecto.');
						}
					}else{
						send_data();
					}

					
					
					
				}else{
                    alert('El formato del correo es incorrecto.');
                }
				
				
				
			});
		});
	</script>
    
</head>

<body>
	
    <!--<div class="container">
    <img src="http://www.massivepc.com/mayoreo/Logo-Massive-Mayoreo.png" style="display:block; margin:auto;" />-->
      <form id="datos_personales" class="form-signin" style="width:400px; margin:auto;">
        <h5>Datos de Envío</h5>
        <input type="text" required="" name="nombre" placeholder="Nombre" class="form-control" />
        <input type="text" required="" name="direccion" placeholder="Dirección" class="form-control" />
        <input type="text" required="" name="colonia" placeholder="Colonia" class="form-control" />
        <input type="text" required="" name="cp" placeholder="Código Postal" class="form-control solo-numeros" />
        <input type="text" required="" name="poblacion" placeholder="Ciudad" class="form-control" />
        <input type="text" required="" name="estado" placeholder="Estado" class="form-control" />
        <input type="text" required="" name="telefono" placeholder="Teléfono" class="form-control solo-numeros" />
        <input type="text" required="" name="email" id="email" placeholder="Correo" class="form-control" />
        <input type="hidden" name="pais" value="mex"/>
        
        <div class="checkbox">
            <label>
            	<input id="show_fact" type="checkbox"> Haga clic si requiere factura fiscal digital.
            </label>
        </div>
        <p><em>Sino requiere factura fiscal se le enviara solo un comprobante de compra con validez oficial.</em></p>
        
        <div id="datos_facturacion" style="display: none;">
            <input type="text" name="f_nombre" placeholder="Nombre" class="form-control" />
            <input type="text" id="rfc" name="f_rfc" placeholder="RFC Ejemplo: MPC0603282MO" class="form-control" />
            <input type="text" name="f_direccion" placeholder="Dirección Fiscal" class="form-control" />
            <input type="text" name="f_colonia" placeholder="Colonia" class="form-control" />
            <input type="text" name="f_cp" placeholder="Código Postal" class="form-control solo-numeros" />
            <input type="text" name="f_poblacion" placeholder="Población" class="form-control" />
            <input type="text" name="f_estado" placeholder="Estado" class="form-control" />
            <input type="text" name="f_telefono" placeholder="Teléfono" class="form-control solo-numeros" />
        </div>
        
        <button id="continuar" type="submit" class="btn btn-lg btn-primary btn-block">Continuar <i class="glyphicon glyphicon-chevron-right"></i> </button>
        
      </form>
      
    <!--</div>-->
<br>
	<div style="clear:both;"></div>



    <br><br><br>
    
    
</body>



</html>