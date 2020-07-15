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
	.container{ height:760px; width:750px; position:relative;}
	#loader_ajax_{width:150px; margin:auto; text-align:center;}
	</style>
    <script>
		var base_path='/mayoreo/';
	</script>
    
    <script src="/mayoreo/assets/js/jquery-1.10.1.min.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/mayoreo/assets/bootstrap3/js/bootstrap.js"></script>
    
    <script>
		$(function(){
			
			$('#show_fact').on('click',function(){
				$('#datos_facturacion').toggle();
			});
			
			$('#datos_personales').on('submit', function(e){
				e.preventDefault();
				
				var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
                if (regex.test($('#email').val().trim())){
					
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
							$('.container').append('<div id="wrapper_impresion"><strong>Pulsa <a class="imprimir" href="#">aquí</a> para imprimir página</strong></div>');
							$('.imprimir').click(function(){
								window.print();
								return false;
							});
						}
					});
					
				}else{
                    alert('El formato del correo es incorrecto.');
                }
				
				
				
			});
		});
	</script>
    
</head>

<body>
	
    <div class="container">
    <img src="http://www.massivepc.com/mayoreo/Logo-Massive-Mayoreo.png" style="display:block; margin:auto;" />
      <form id="datos_personales" class="form-signin" style="width:400px; margin:auto;">
        <h2 class="form-signin-heading">Datos de Envío</h2>
        <input type="text" required="" name="nombre" placeholder="Nombre" class="form-control" />
        <input type="text" required="" name="direccion" placeholder="Dirección" class="form-control" />
        <input type="text" required="" name="colonia" placeholder="Colonia" class="form-control" />
        <input type="text" required="" name="cp" placeholder="Código Postal" class="form-control" />
        <input type="text" required="" name="poblacion" placeholder="Ciudad" class="form-control" />
        <input type="text" required="" name="estado" placeholder="Estado" class="form-control" />
        <input type="text" required="" name="telefono" placeholder="Teléfono" class="form-control" />
        <input type="text" required="" name="email" id="email" placeholder="Correo" class="form-control" />
        <input type="hidden" name="pais" value="mex"/>
        
        <div class="checkbox">
            <label>
            	<input id="show_fact" type="checkbox"> Haga clic si requiere factura fiscal digital.
            </label>
        </div>
        
        <div id="datos_facturacion" style="display: none;">
            <input type="text" name="f_nombre" placeholder="Nombre" class="form-control" />
            <input type="text" name="f_rfc" placeholder="RFC" class="form-control" />
            <input type="text" name="f_direccion" placeholder="Dirección Fiscal" class="form-control" />
            <input type="text" name="f_colonia" placeholder="Colonia" class="form-control" />
            <input type="text" name="f_cp" placeholder="Código Postal" class="form-control" />
            <input type="text" name="f_poblacion" placeholder="Población" class="form-control" />
            <input type="text" name="f_estado" placeholder="Estado" class="form-control" />
            <input type="text" name="f_telefono" placeholder="Teléfono" class="form-control" />
        </div>
        
        <input id="continuar" type="submit" class="btn btn-lg btn-primary btn-block" value="Continuar"></input>
        
      </form>
      
    </div>
<br>
	<div style="clear:both;"></div>



    <br><br><br>
    
    
</body>



</html>