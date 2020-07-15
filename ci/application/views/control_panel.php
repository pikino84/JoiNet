
        

        <div class="row">
            <div class="col-sm-12">

            <button type="button" class="btn btn-green btn-icon open_modal" data-modal="#modal-6">
                Nuevo
                <i class="fa fa-plus"></i>
            </button>

            <br><br>
        
        <table class="table table-bordered datatable" id="table-3">
            <thead>
                <tr class="replace-inputs">
                    <th>Clave</th>
                    <th>Nombre</th>
                    <th>P. Publico</th>
                    <th>P. Mayoreo</th>
                    <th>P. Distribuidor</th>
                    <th>Costo Nac.</th>
                    <th></th>
                </tr>
                <tr>
                    <th>Clave</th>
                    <th>Nombre</th>
                    <th>P. Publico</th>
                    <th>P. Mayoreo</th>
                    <th>P. Distribuidor</th>
                    <th>Costo Nac.</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <? foreach($productos as $producto): ?>
                    <tr class="gradeA">
                        <td class="text-center"><img class="img-thumbnail" width="50px" height="50px" src="https://www.massivepc.com/images/<?=$producto->products_image?>"/><br><?=$producto->products_id?></td>
                        <td><?=mb_strtoupper(character_limiter($producto->products_name, 40))?></td>
                        <td><?=round(($producto->products_price * 1.16))?></td>
                        <td><?=$producto->precio_mayoreo?></td>
                        <td><?=$producto->precio_distribuidor?></td>
                        <td><?=$producto->costo_nacional?></td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-blue dropdown-toggle" data-toggle="dropdown">
                                    Acción <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-blue" role="menu">
                                    <li><a class="edit_info" href="http://massivepc.com/ci/control_panel/edit_product/<?=$producto->products_id?>">Editar información</a></li>
                                    <li><a class="edit_images" data-id="<?=$producto->products_id?>" href="#">Editar imagenes</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Vincular con SAE</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <? endforeach?>
                
            </tbody>
            <tfoot>
                <tr>
                    <th>Clave</th>
                    <th>Nombre</th>
                    <th>P. Publico</th>
                    <th>P. Mayoreo</th>
                    <th>P. Distribuidor</th>
                    <th>Costo Nac.</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
        
        <script type="text/javascript">
            jQuery(document).ready(function($)
            {
                var table = $("#table-3").dataTable({
                    "sPaginationType": "bootstrap",
                    "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    "bStateSave": true
                });
                
                table.columnFilter({
                    "sPlaceHolder" : "head:after"
                });
            });
        </script>
        
        <br />

            </div>
        </div>
        
        
        
        
        
    
    