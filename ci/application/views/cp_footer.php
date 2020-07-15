</div>

        

    
</div>

    
    
    
    


<div class="modal fade custom-width" id="modal-6">
    <div class="modal-dialog" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">CAPTURA DE PRODUCTO</h4>
            </div>
            <div class="modal-body">

                <form id="new_product" enctype="multipart/form-data">
                
                    <div class="row mbf">
                        <div class="col-md-3">
                            <label for="products_status" class="control-label">ESTADO</label>
                            <select class="chosen-select" name="products_status" id="products_status">
                                <option value="1">DISPONIBLE</option>
                                <option value="0">AGOTADO</option>
                            </select>
                        </div>
                    
                        <div class="col-md-3">
                            <label for="id_categoria" class="control-label">CATEGORÍA PUBLICO</label>
                            <select class="chosen-select" name="id_categoria" id="id_categoria" tabindex="2">
                                <option value=""></option>
                                <? foreach($categorias_publico as $categoria_p): ?>
                                    <option value="<?=$categoria_p->categories_id?>"><?=mb_strtoupper($categoria_p->categories_name)?></option>
                                <? endforeach?>
                            </select>
                        </div>
                    
                        <div class="col-md-3">
                            <label for="fk_categoria" class="control-label">CATEGORÍA MAYOREO</label>
                            <select class="chosen-select" name="fk_categoria" id="fk_categoria" tabindex="2">
                                <option value=""></option>
                                <? foreach($categorias_mayoreo as $categoria_m): ?>
                                    <option value="<?=$categoria_m->id_categoria?>"><?=mb_strtoupper($categoria_m->categoria)?></option>
                                <? endforeach?>
                            </select>
                        </div>
                    
                        <div class="col-md-3">
                            <label for="manufacturers_id" class="control-label">FABRICANTE</label>
                            <select class="chosen-select" name="manufacturers_id" id="manufacturers_id">
                                <option value=""></option>
                                <? foreach($fabricantes as $fabricante): ?>
                                    <option value="<?=$fabricante->manufacturers_id?>"><?=mb_strtoupper($fabricante->manufacturers_name)?></option>
                                <? endforeach?>
                            </select>
                        </div>
                    </div>

                    <div class="row mbf">

                        <div class="col-md-2">
                            <label class="control-label">PRODUCTO NACIONAL</label><br>

                            <div id="label-switch" class="make-switch" data-on-label="SI" data-off-label="NO">
                                <input id="nacional" name="nacional" type="checkbox" checked>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <label for="products_name" class="control-label">NOMBRE <a id="counter_js"></a></label>
                            <input type="text" name="products_name" id="products_name" class="form-control">
                        </div>
                    
                        <div class="col-md-2">
                            <label for="products_model" class="control-label">MODELO</label>
                            <input type="text" name="products_model" id="products_model" class="form-control">
                        </div>
                    </div>
                    

                <div class="row mbf">
                    <div class="col-md-3">
                        <label for="costo" class="control-label cn_label">COSTO NACIONAL</label>
                        <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon">$</div>
                              <input type="text" class="form-control tipo_costo cn_input" id="costo" name="costo">
                            </div>
                        </div>
                    </div>
                
                    <div class="col-md-3">
                        <label for="products_price" class="control-label">PRECIO PUBLICO</label>
                        <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon">$</div>
                              <input type="text" class="form-control costo_focusout" id="products_price" name="products_price">
                            </div>
                        </div>
                    </div>
                
                    <div class="col-md-3">
                        <label for="precio_mayoreo" class="control-label">PRECIO MAYOREO</label>
                        <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon">$</div>
                              <input type="text" class="form-control costo_focusout" id="precio_mayoreo" name="precio_mayoreo">
                            </div>
                        </div>
                    </div>
                
                    <div class="col-md-3">
                        <label for="precio_distribuidor" class="control-label">PRECIO DISTRIBUIDOR</label>
                        <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon">$</div>
                              <input type="text" class="form-control costo_focusout" id="precio_distribuidor" name="precio_distribuidor">
                            </div>
                        </div>
                    </div>
                </div>

                <!--<div class="row mbf">
                   <div class="col-md-2">

                        <label for="products_image" class="control-label">IMAGEN 80px x 80px</label>
                        <div class="clearfix"></div>
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 80px; height: 80px;" data-trigger="fileinput">
                                <img src="http://placehold.it/100x100" alt="...">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 80px; max-height: 80px"></div>
                            <div>
                                <span class="btn btn-white btn-file">
                                    <span class="fileinput-new">SELECCIONA IMAGEN</span>
                                    <span class="fileinput-exists">CAMBIAR</span>
                                    <input type="file" id="products_image" name="products_image" accept="image/jpg">
                                </span>
                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">ELIMINAR</a>
                            </div>
                        </div>

                    </div>
                
                    <div class="col-md-2">
                        <label for="products_imagelarge" class="control-label">IMAGEN 666px x 500px</label>
                        <div class="clearfix"></div>
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 80px; height: 80px;" data-trigger="fileinput">
                                <img src="http://placehold.it/100x100" alt="...">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 80px; max-height: 80px"></div>
                            <div>
                                <span class="btn btn-white btn-file">
                                    <span class="fileinput-new">SELECCIONA IMAGEN</span>
                                    <span class="fileinput-exists">CAMBIAR</span>
                                    <input type="file" name="products_imagelarge" accept="image/jpg">
                                </span>
                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">ELIMINAR</a>
                            </div>
                        </div>
                    </div>
               
                    <div class="col-md-8">
                        <label for="descripcion" class="control-label">DESCRIPCIÓN</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" class="form-control wysihtml5" data-stylesheet-url="assets/css/wysihtml5-color.css"></textarea>
                    </div>
               </div>-->

                </form>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="save_product btn btn-info">Guardar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-7">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Ayuda de clientes</h4>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-md-12">

                        <div class="form-group">
                            <label for="cliente_nombre" class="control-label">Nombre</label>
                            <input type="text" id="cliente_nombre" name="cliente_nombre" class="form-control">
                        </div>  

                    </div>

                    <div class="col-md-12">
                        <div id="ayuda_lista_clientes">
                        </div>
                    </div>
                    
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-8">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Ayuda de productos</h4>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-md-12">

                        <div class="form-group">
                            <label for="producto_nombre" class="control-label">Producto</label>
                            <input type="text" id="producto_nombre" name="producto_nombre" class="form-control">
                            <input type="hidden" id="inp_tmp" value="">
                        </div>  

                    </div>

                    <div class="col-md-12">
                        <div id="ayuda_lista_productos">
                        </div>
                    </div>
                    
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-9">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Ayuda de precios</h4>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-md-12">
                        <div id="ayuda_lista_precios">
                        </div>
                    </div>
                    
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

    <link rel="stylesheet" href="<?=base_url()?>assets_cp/css/font-icons/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets_cp/js/datatables/responsive/css/datatables.responsive.css">
    <link rel="stylesheet" href="<?=base_url()?>assets_cp/js/select2/select2-bootstrap.css">
    <link rel="stylesheet" href="<?=base_url()?>assets_cp/js/select2/select2.css">

    <script src="<?=base_url()?>assets_cp/js/gsap/main-gsap.js?cb=<?=md5(time())?>"></script>
    <script src="<?=base_url()?>assets_cp/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js?cb=<?=md5(time())?>"></script>
    <script src="<?=base_url()?>assets_cp/js/bootstrap.js?cb=<?=md5(time())?>"></script>
    <script src="<?=base_url()?>assets_cp/js/joinable.js?cb=<?=md5(time())?>"></script>
    <script src="<?=base_url()?>assets_cp/js/resizeable.js?cb=<?=md5(time())?>"></script>
    <script src="<?=base_url()?>assets_cp/js/neon-api.js?cb=<?=md5(time())?>"></script>
    <script src="<?=base_url()?>assets_cp/js/jquery.dataTables.min.js?cb=<?=md5(time())?>"></script>
    <script src="<?=base_url()?>assets_cp/js/datatables/TableTools.min.js?cb=<?=md5(time())?>"></script>


    <script src="<?=base_url()?>assets_cp/js/dataTables.bootstrap.js?cb=<?=md5(time())?>"></script>
    <script src="<?=base_url()?>assets_cp/js/datatables/jquery.dataTables.columnFilter.js?cb=<?=md5(time())?>"></script>
    <script src="<?=base_url()?>assets_cp/js/datatables/lodash.min.js?cb=<?=md5(time())?>"></script>
    <script src="<?=base_url()?>assets_cp/js/datatables/responsive/js/datatables.responsive.js?cb=<?=md5(time())?>"></script>
    <script src="<?=base_url()?>assets_cp/js/select2/select2.min.js?cb=<?=md5(time())?>"></script>
    <script src="<?=base_url()?>assets_cp/js/neon-chat.js?cb=<?=md5(time())?>"></script>
    <script src="<?=base_url()?>assets_cp/js/fileinput.js?cb=<?=md5(time())?>"></script>
    <script src="<?=base_url()?>assets_cp/js/bootstrap-switch.min.js?cb=<?=md5(time())?>"></script>

    <script src="<?=base_url()?>assets_cp/js/chosen.jquery.js?cb=<?=md5(time())?>"></script>

    <script src="<?=base_url()?>assets_cp/js/neon-custom.js?cb=<?=md5(time())?>"></script>


    <script src="<?=base_url()?>assets_cp/js/neon-demo.js?cb=<?=md5(time())?>"></script>

    <script src="<?=base_url()?>assets_cp/js/ajax.js?cb=<?=md5(time())?>"></script>

    



</body>
</html>