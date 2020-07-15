<form id="buscar_correo" class="form-signin" style="width:400px; margin:auto;">

    <h5>Ingresa tu correo</h5>

    <input type="text" required="" name="email_u" id="email_u" placeholder="Correo" class="form-control" /><br>
   
    <button id="continuar" type="submit" class="btn btn-sm btn-primary">Siguiente <span class="glyphicon glyphicon-arrow-right"></span> </button>

</form>

<script>
	$(function(){
		$('#buscar_correo').on('submit', function(e){
			e.preventDefault();
			//console.log('entro');
			var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
			if (regex.test($('#email_u').val().trim())){
				
				alert('siguiente');
				
				}else{
					
				alert('El formato del correo es incorrecto.');
				
			}
				
		});
		
		
	});
</script>