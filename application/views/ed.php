<?
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<link href="https://www.massivepc.com/mayoreo/assets/css/style_buscador.css?cb=4872a7d95911e9a0d94afe66ef807ea5" rel="stylesheet" type="text/css">
<link href="https://www.massivepc.com/mayoreo/assets/bootstrap3/css/bootstrap.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" >

<div class="container">
	<form method="post" action="<?=base_url()?>ed/actualizar">
		<input type="hidden" name="type" value="<?=$type?>"/>
		<input type="hidden" name="id_producto" value="<?=$id_producto?>"/>
		<input class="form-control" type="text"   name="precio" value="<?=(isset($precio)) ? $precio : '' ?>" /><br>
		<input class="btn btn-primary" type="submit" value="Guardar" />
	</form>
</div>


