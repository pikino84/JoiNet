<style>
.form-control{
		margin-bottom:5px;
	}
</style>

    <form id="datos_personales" class="form-signin" action="<?=$action?>" method="post">

        <div class="container">

            <div id="row" class="row">
                
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><h4>Detalle de pedido</h4></li>
                    </ol>
                    <?
                        $p_precio ='';
                        $p_mayoreo ='';
                        $p_distribuidor ='';
                        
                        foreach($cart_contents as $product1){
                            $p_precio       += $product1['price'] * $product1['qty'];
                            $p_mayoreo      += $product1['options']['mayoreo'] * $product1['qty'];
                            $p_distribuidor += $product1['options']['distribuidor'] * $product1['qty'];
                        }
                         
                        $content  = '<table class="table table-bordered">';
                            $content .= '<tr>';
                                $content .= '<td><b>Producto</b></td>';
                                $content .= '<td class="text-center"><b>Cantidad</b></td>';
                                $content .= '<td class="text-center"><b>Precio</b></td>';
                                $content .= '<td class="text-center"><b>Subtotal</b></td>';
                            $content .= '</tr>';
                            
                            foreach($cart_contents as $product){
                                
                                if($p_distribuidor > 9999){
                                    $p_final_u   = $product['options']['distribuidor'];
                                    $p_final_sub = $product['options']['distribuidor'] * $product['qty'];
                                    $total       = $p_distribuidor;
                                    $tipo        = '3';
                                }else if($p_mayoreo > 4999){
                                    $p_final_u   = $product['options']['mayoreo'];
                                    $p_final_sub = $product['options']['mayoreo'] * $product['qty'];
                                    $total       = $p_mayoreo;
                                    $tipo        = '2';
                                }else{
                                    $p_final_u   = $product['price'];
                                    $p_final_sub = $product['price'] * $product['qty'];
                                    $total       = $p_precio;
                                    $tipo        = '1';
                                }
                                
                                $content .= '<tr>';
                                    $content .= '<td>'.ucfirst(mb_strtolower($product['name'])).'</td>';
                                    $content .= '<td class="text-center">'.$product['qty'].'</td>';
                                    $content .= '<td class="text-center">$'.number_format($p_final_u).'</td>';
                                    $content .= '<td class="text-center">$'.number_format($p_final_sub).'</td>';
                                $content .= '</tr>';
                            }
                            $content .= '<tr>';
                                $content .= '<td colspan="2"></td><td class="text-right">Envío:</td><td class="text-center">$120.00</td>';
                            $content .= '</tr>';
                            $content .= '<tr>';
                                $content .= '<td colspan="2"></td>';
                                $content .= '<td class="text-right">Total:</td>';
                                $content .= '<td class="text-center"><strong>$'.number_format($total+120).'</strong></td>';
                            $content .= '</tr>';
                        $content .= '</table>';
                        echo $content;
                    ?>
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

                    <?
                        if($metodo_pago == 'transferencia'){
                            echo 'Depósito en ventanilla o transferencia electrónica en BANCOMER, SANTANDER';
                        }else{
                            echo 'PayPal (Aplica 24hrs hábiles). Por su seguridad, solamente se aceptarán operaciones en donde la dirección de ENVÍO coincida con la dirección predeterminada registrada en Paypal.';
                        }
                    ?>                    
                    
                    <div class="text-right">
                        <input type="hidden" name="p_codigo" value="<?=$p_codigo?>">
                        <input type="submit" name="procesar" value="Confirmar" class="btn btn-success" />
                    </div>
                    

                    <!--<div class="text-center">
                        <button style="width:160px;" id="continuar" type="submit" class="btn btn-sm btn-info verify_disabled" disabled="disabled"> Transferencia  </button>
                        <button style="width:160px;" id="continuar_paypal" type="submit" class="btn btn-sm btn-info verify_disabled" disabled="disabled"> PayPal  </button>
                    </div>-->
                    
                </div>

            </div>


        </div>

    </form>