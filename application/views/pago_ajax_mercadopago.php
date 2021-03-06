<style>
.form-control{
		margin-bottom:5px;
	}
</style>

<form id="datos_personales" class="form-signin" style="width:400px; margin:auto;">
    <img src="<?=base_url()?>Logo-Massive-Mayoreo.png"/>
    <br><br>
    <h5>Datos de Envío</h5>
    <input type="text" required="" name="email" id="email" placeholder="Email" class="form-control" />
    <input type="text" required="" name="nombre" id="nombre" placeholder="Nombre" class="form-control verify_disabled" disabled/>
    <input type="text" required="" name="direccion" id="direccion" placeholder="Dirección" class="form-control verify_disabled" disabled/>
    <input type="text" required="" name="colonia" id="colonia" placeholder="Colonia" class="form-control verify_disabled" disabled/>
    <input type="text" required="" name="cp" id="cp" placeholder="Código Postal" class="form-control verify_disabled solo-numeros" disabled/>
    <input type="text" required="" name="poblacion" id="poblacion" placeholder="Ciudad" class="form-control verify_disabled" disabled/>
    <input type="text" required="" name="estado" id="estado" placeholder="Estado" class="form-control verify_disabled" disabled/>
    <input type="text" name="telefono"  id="telefono" placeholder="Teléfono" class="form-control solo-numeros verify_disabled" disabled/>
    <textarea id="comentarios" name="comentarios" class="form-control verify_disabled" placeholder="Comentarios o referencia de entrega" disabled></textarea>
    
    <div class="checkbox">
        <label>
            <input id="show_fact" type="checkbox" class="verify_disabled" disabled> Haga clic si requiere factura fiscal digital.
        </label>
    </div>
    
    <p><em>Sino requiere factura fiscal se le enviara solo un comprobante de compra con validez oficial.</em></p>
    
    <div id="datos_facturacion" style="display: none;">
    	<h5>Datos de Facturación</h5>
        <input type="text" id="f_email" name="f_email" placeholder="Email" class="form-control" />
        <input type="text" id="f_nombre" name="f_nombre" placeholder="Nombre" class="form-control" />
        <input type="text" id="f_rfc" name="f_rfc" placeholder="RFC Ejemplo: MPC0603282MO" class="form-control" />
        <input type="text" id="f_direccion" name="f_direccion" placeholder="Dirección Fiscal" class="form-control" />
        <input type="text" id="f_colonia" name="f_colonia" placeholder="Colonia" class="form-control" />
        <input type="text" id="f_cp" name="f_cp" placeholder="Código Postal" class="form-control solo-numeros" />
        <input type="text" id="f_poblacion" name="f_poblacion" placeholder="Ciudad" class="form-control" />
        <input type="text" id="f_estado" name="f_estado" placeholder="Estado" class="form-control" />
        <input type="text" id="f_telefono" name="f_telefono" placeholder="Teléfono" class="form-control solo-numeros" />
    </div>
    
    <div class="text-right">
        <button id="continuar" type="submit" class="btn btn-sm btn-primary verify_disabled" disabled="disabled">Continuar <i class="glyphicon glyphicon-chevron-right"></i> </button>
    </div>

</form>