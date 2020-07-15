
        

        <div class="row">
            <div class="col-sm-12">

            
        
        <form id="new_product" enctype="multipart/form-data">
                
                    <div class="row mbf">
                        <div class="col-md-3">
                            <label for="products_status" class="control-label">ESTADO</label>
                            <select class="chosen-select" name="products_status" id="products_status">
                                <? if($producto->products_status == '1'){?>
                                    <option select value="1">DISPONIBLE</option>
                                <? }else{?>
                                    <option value="0">AGOTADO</option>
                                <? }?>
                            </select>
                        </div>
                    
                        <div class="col-md-3">
                            <label for="id_categoria" class="control-label">CATEGORÍA PUBLICO</label>
                            <select class="chosen-select" name="id_categoria" id="id_categoria" tabindex="2">
                                <option value=""></option>
                                <? foreach($categorias_publico as $categoria_p): ?>
                                    <? if($producto->categories_id == $categoria_p->categories_id){?>
                                        <option select value="<?=$categoria_p->categories_id?>"><?=mb_strtoupper($categoria_p->categories_name)?></option>
                                    <? }else{?>
                                        <option value="<?=$categoria_p->categories_id?>"><?=mb_strtoupper($categoria_p->categories_name)?></option>
                                    <? }?>
                                    
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
                                    <? if($producto->manufacturers_id == $fabricante->manufacturers_id){?>
                                        <option select value="<?=$fabricante->manufacturers_id?>"><?=mb_strtoupper($fabricante->manufacturers_name)?></option>
                                    <? }else{?>
                                        <option value="<?=$fabricante->manufacturers_id?>"><?=mb_strtoupper($fabricante->manufacturers_name)?></option>
                                    <¿ }¿>
                                    
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
                            <input type="text" name="products_name" id="products_name" class="form-control" value="<?=$producto->products_name?>">
                        </div>
                    
                        <div class="col-md-2">
                            <label for="products_model" class="control-label">MODELO</label>
                            <input type="text" name="products_model" id="products_model" class="form-control" value="<?=$producto->products_model?>">
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
                              <input type="text" class="form-control costo_focusout" id="products_price" name="products_price" value="<?=$producto->products_price?>">
                            </div>
                        </div>
                    </div>
                
                    <div class="col-md-3">
                        <label for="precio_mayoreo" class="control-label">PRECIO MAYOREO</label>
                        <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon">$</div>
                              <input type="text" class="form-control costo_focusout" id="precio_mayoreo" name="precio_mayoreo" value="<?=$producto->precio_mayoreo?>">
                            </div>
                        </div>
                    </div>
                
                    <div class="col-md-3">
                        <label for="precio_distribuidor" class="control-label">PRECIO DISTRIBUIDOR</label>
                        <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon">$</div>
                              <input type="text" class="form-control costo_focusout" id="precio_distribuidor" name="precio_distribuidor" value="<?=$producto->precio_distribuidor?>">
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
        
      
        
        <br />

            </div>
        </div>

        <script type="text/javascript">
            
            (function($, window, undefined){
            "use strict";

                $(document).ready(function(){

                    $('.chosen-select').chosen();

                });

            })(jQuery, window);

        </script>