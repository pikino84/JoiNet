<form accept-charset="utf-8" method="post" action="<?=base_url()?>carrito/actualizar">

    <table cellpadding="6" cellspacing="1" style="width:100%" border="0">

    <tr>
      <th><strong>Cantidad</strong></th>
      <th> </th>
      <th><strong>Descripción</strong></th>
      <th class="text-right"><strong>Precio</strong></th>
      <th class="text-right"><strong>Sub-Total</strong></th>
    </tr>

    <? $i = 1; ?>

    <? foreach ($this->cart->contents() as $items): ?>

      <?=form_hidden('rowid['.$i.']', $items['rowid']); ?>

      <tr>
        <td><input type="text" style="width:50px;" class="form-control input-sm" value="<?=$items['qty']?>" name="qty[<?=$i?>]"></td>
        <td><a class="btn btn-default btn-xs" href="<?=base_url()?>carrito/eliminar/<?=$items['rowid']?>"><span class="glyphicon glyphicon-remove"></span> Eliminar</a></td>
        <td>
        <?=$items['name']?>

          <? if ($this->cart->has_options($items['rowid']) == TRUE): ?>

            <p>
              <? foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                <strong><?=$option_name; ?>:</strong> <?=$option_value?><br />

              <? endforeach?>
            </p>

          <? endif?>

        </td>
        <td class="text-right"><?=$this->cart->format_number($items['price'])?></td>
        <td class="text-right">$<?=$this->cart->format_number($items['subtotal'])?></td>
      </tr>

    <? $i++; ?>

    <? endforeach; ?>

    <tr>
      <td colspan="3"> </td>
      <td class="text-right"><strong>Total</strong></td>
      <td class="text-right">$<?=$this->cart->format_number($this->cart->total()); ?></td>
    </tr>

    </table>

    <p>
        <input class="btn btn-default btn-xs" type="submit" value="Actualice su Carrito" name="">
        <a id="siguiente" class="btn btn-primary btn-xs">Siguiente</a>   
    </p>

</form>