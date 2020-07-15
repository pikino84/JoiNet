<style>
.form-control{
		margin-bottom:5px;
	}
</style>

    <form id="datos_personales" class="form-signin" action="/mayoreo/pago/procesar_pedido">

        <div class="container">

            <div id="row" class="row">

                <div class="alert alert-success" role="alert">
                    Estimado <strong><?=$nombre?></strong>, su pedido <strong><?=$id?></strong> será procesado en cuanto nos confirme su pago enviando el comprobante escaneado o fotografiado a la siguiente dirección: <strong><a href="mailto:ventas@massivepc.com">ventas@massivepc.com</a></strong><br>
                    <br><strong>No manejamos sistemas de apartado, por favor realice y confirme su pago lo antes posible.</strong>
                </div>
                
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><h4>Detalle de pedido</h4></li>
                    </ol>
                    <?=$p_descripcion?>
                    <br>
                </div>

                
<div style="clear:both;"></div>

                <div class="col-md-4">

                    <ol class="breadcrumb">
                        <li><h4>Datos de Envío</h4></li>
                    </ol>
                    <ul class="list-group">
                        <li class="list-group-item"><?=$nombre?></li>
                        <li class="list-group-item"><?=$email?></li>
                        <li class="list-group-item"><?=$direccion?></li>
                        <li class="list-group-item"><?=$cp?></li>
                        <li class="list-group-item"><?=$estado?></li>
                        <li class="list-group-item"><?=$poblacion?></li>
                        <li class="list-group-item"><?=$colonia?></li>
                        <li class="list-group-item"><?=$telefono?></li>
                        <li class="list-group-item"><?=$comentarios?></li>
                    </ul>
                    
                </div>

                <div class="col-md-4">

                    <div id="datos_facturacion">
                        <ol class="breadcrumb">
                        <li><h4>Datos de Facturación</h4></li>
                        </ol>
                        <ul class="list-group">
                            <li class="list-group-item"><?=$f_rfc?></li>
                            <li class="list-group-item"><?=$f_nombre?></li>
                            <li class="list-group-item"><?=$f_email?></li>
                            <li class="list-group-item"><?=$f_direccion?></li>
                            <li class="list-group-item"><?=$f_cp?></li>
                            <li class="list-group-item"><?=$f_estado?></li>
                            <li class="list-group-item"><?=$f_poblacion?></li>
                            <li class="list-group-item"><?=$f_colonia?></li>
                            <li class="list-group-item"><?=$f_telefono?></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4">

                    <ol class="breadcrumb">
                        <li><h4>Método de Pago</h4></li>
                    </ol>
                        <ul class="list-group">
                    <?
                        if($metodo_pago == 'transferencia'){
                            echo ' <li class="list-group-item">Depósito en ventanilla o transferencia electrónica en Banamex </li>';
                        }else{
                            echo ' <li class="list-group-item">PayPal (Aplica 24hrs hábiles). Por su seguridad, solamente se aceptarán operaciones en donde la dirección de ENVÍO coincida con la dirección predeterminada registrada en Paypal.</li>';
                        }
                    ?>
                    </ul>
                </div>

                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><h4>Cuentas bancarias</h4></li>
                    </ol>

<div class="panel panel-default">
                      <div class="panel-body">
                        <strong>BANCOMER</strong><br>                        
Cuenta: 0111395874<br>                        
CLABE Interbancaria para transferencias: 0121-8000-1113-9587-49<br>                        
A nombre de: URQUIZA Y GARCIA LOGISTICA SA DE CV
                      </div>
                    </div>

                    

<div class="panel panel-default">
                      <div class="panel-body">
                        <strong>SANTANDER</strong><br>                        
Cuenta: 65-50656553-7<br>                        
CLABE Interbancaria para transferencias: 0141-8065-5065-6553-79<br>                        
A nombre de: URQUIZA Y GARCIA LOGISTICA SA DE CV
                      </div>
                    </div>
<!--
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <strong>BANCOMER</strong><br>
                        Cuenta: 0194258703<br>
                        CLABE Interbancaria para transferencias: 0123-2000-1942-5870-31<br>
                        A nombre de: MASSIVE PC SA DE CV
                      </div>
                    </div>

                    <div class="panel panel-default">
                      <div class="panel-body">
                        <strong>SANTANDER</strong><br>
                        Cuenta: 65-50403993-5<br>
                        CLABE Interbancaria para transferencias: 0143-2065-5040-3993-55<br>
                        A nombre de: MASSIVE PC SA DE CV
                      </div>
                    </div>

					                    <div class="panel panel-default">
                      <div class="panel-body">
                        <strong>BANAMEX</strong>
						<br> Cuenta: 3461378
<br> Sucursal: 7013 
<br> CLABE Interbancaria para transferencias: 0023-2070-1334-6137-84
<br> A nombre de: MASSIVE PC SA DE CV
                      </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <strong>BANORTE / IXE </strong><br>
                        Cuenta: 0212962231<br>
                        CLABE Interbancaria para transferencias: 0723-2000-2129-6223-18<br>
                        A nombre de: MASSIVE PC SA DE CV
                      </div>
                    </div>
-->
                        
                </div>

                <div class="col-md-12">
                    <div class="text-center">
                        <a href="#" onclick="$('#row').print()" class="btn btn-success" >Imprimir pedido</a>
                    </div>
                </div>

            </div>


        </div>

    </form>