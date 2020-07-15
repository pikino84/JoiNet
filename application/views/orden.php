<style>
.form-control{
		margin-bottom:5px;
	}
</style>

    <form id="datos_personales" class="form-signin" action="/mayoreo/pago/verificar?cd=<?=md5(time())?>#row" method="post">

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
                    <input type="text" required="" name="nombre" id="nombre" placeholder="Nombre" class="form-control input-sm" />
                    <input type="email" required="" name="email" id="email" placeholder="Email" class="form-control input-sm" />
                    <input type="text" required="" name="direccion" id="direccion" placeholder="Dirección" class="form-control input-sm" />
                    <input type="number" required="" name="cp" id="cp" placeholder="Código Postal" class="form-control solo-numeros input-sm" />
                    <select id="estado" name="estado" class="form-control input-sm">
                        <? foreach($estados as $estado):?>
                            <option data-id="<?=$estado->id?>" value="<?=$estado->nombre?>"><?=$estado->nombre?></option>
                        <? endforeach?>
                    </select>
                    <input type="text" required="" name="poblacion" id="poblacion" placeholder="Ciudad" class="form-control input-sm" />
                    <input type="text" required="" name="colonia" id="colonia" placeholder="Colonia" class="form-control input-sm" />
                    <input type="number"  required="" name="telefono"  id="telefono" placeholder="Teléfono" class="form-control solo-numeros input-sm" />
                    <textarea id="comentarios" name="comentarios" class="form-control input-sm" placeholder="Comentarios o referencia de entrega" ></textarea>

                </div>

                <div class="col-md-4">

                    <div id="datos_facturacion">
                        <ol class="breadcrumb">
                        <li><h4>Datos de Facturación</h4></li>
                        </ol>
                        <input type="text" id="f_rfc" name="f_rfc" placeholder="RFC Ejemplo: MPC0603282MO" class="form-control input-sm" />
                        <input type="text" id="f_nombre" name="f_nombre" placeholder="Nombre" class="form-control input-sm" />
                        <input type="email" id="f_email" name="f_email" placeholder="Email" class="form-control input-sm" />
                        <input type="text" id="f_direccion" name="f_direccion" placeholder="Dirección Fiscal" class="form-control input-sm" />
                        <input type="number" id="f_cp" name="f_cp" placeholder="Código Postal" class="form-control solo-numeros input-sm" />
                        <select id="f_estado" name="f_estado" class="form-control input-sm">
                            <? foreach($estados as $estado):?>
                                <option data-id="<?=$estado->id?>" value="<?=$estado->nombre?>"><?=$estado->nombre?></option>
                            <? endforeach?>
                        </select>
                        <input type="text" id="f_poblacion" name="f_poblacion" placeholder="Ciudad" class="form-control input-sm" />
                        <input type="text" id="f_colonia" name="f_colonia" placeholder="Colonia" class="form-control input-sm" />
                        <input type="number" id="f_telefono" name="f_telefono" placeholder="Teléfono" class="form-control solo-numeros input-sm" />
                    </div>
                    <p><em>Sino requiere factura fiscal se le enviara solo un comprobante de compra con validez oficial.</em></p>
                </div>

                <div class="col-md-4">

                    <ol class="breadcrumb">
                        <li><h4>Método de Pago</h4></li>
                    </ol>

                    <div class="radio">
                      <label>
                        <input type="radio" name="metodo_pago" class="metodo_pago" value="transferencia" checked>
                        Depósito en ventanilla o transferencia electrónica en BANCOMER, SANTANDER
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="metodo_pago" class="metodo_pago" value="paypal">
                        PayPal (Aplica 24hrs hábiles). Por su seguridad, solamente se aceptarán operaciones en donde la dirección de ENVÍO coincida con la dirección predeterminada registrada en Paypal.
                      </label>
                    </div>

                    

                    <div class="checkbox">
                        <label>
                            <input id="btn_suscripcion_boletin" name="btn_suscripcion_boletin" type="checkbox"> Deseo suscribirme al boletín de Massive PC.
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input id="btn_aviso_privacidad" type="checkbox"> He leído y estoy de acuerdo con el <a target="_blank" href="http://www.massivepc.com/aviso-de-privacidad.php">Aviso de Privacidad</a>
                        </label>
                    </div>
                    
                    <!--<div class="text-center">
                        <button style="width:160px;" id="continuar" type="submit" class="btn btn-sm btn-info verify_disabled" disabled="disabled"> Transferencia  </button>
                        <button style="width:160px;" id="continuar_paypal" type="submit" class="btn btn-sm btn-info verify_disabled" disabled="disabled"> PayPal  </button>
                    </div>-->
                    
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 text-left">
                            <a class="btn btn-primary" href="<?=base_url()?>">Continuar Comprando</a>
                        </div>
                        <div class="col-md-6 text-right">
                            <input type="submit" name="verificar" value="Verificar" class="btn btn-succes btn-verificar" disabled />
                        </div>
                    </div>
                </div>

            </div>


        </div>

    </form>