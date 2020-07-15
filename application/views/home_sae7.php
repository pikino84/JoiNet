
        <div id="row">
            <div class="col-md-12">

                <div class="panel panel-default">
  <div class="panel-heading"><i class="glyphicon glyphicon-search"></i> Filtrar</div>
  <div class="panel-body">
   
    <form method="get" action="#row">
        
        <div class="row">

            <div class="col-md-3">
                <input type="text" class="form-control" id="palabra" name="palabra" value="<?=$palabra?>" placeholder="Nombre o Código del producto">
            </div>

            <div class="col-md-3">
                <select id="marca" name="marca" class="form-control">
                    <option value="" selected>MARCA</option>
                    <? foreach($marcas as $marca):?>
                    <option <?=($marca_id == $marca->id_marca) ? 'selected' : '' ?> value="<?=$marca->id_marca?>"><?=$marca->marca?></option>
                    <? endforeach?>
                </select>
            </div>

            <div class="col-md-3">

                <select id="categoria" name="categoria" class="form-control">
                    <option value="" selected>CATEGORIA</option>
                    <? foreach($categories as $categoria):?>
                    <option <?=($categoria_id == $categoria->id_categoria) ? 'selected' : '' ?> value="<?=$categoria->id_categoria?>"><?=$categoria->categoria?></option>
                    <? endforeach?>
                </select>

            </div>

            <div class="col-md-3">
                <div class="row">
                        <input type="submit" class="btn btn-primary col-md-6 btn-search" value="Buscar" />
                            
                            <div class="col-md-1"></div>
                            
                        <a href="https://www.massivepc.com/mayoreo" class="btn btn-primary col-md-4">Limpiar</a>

                </div>
                
                
            </div>

           
            
   
    </div>
        
    </form>

  </div>
</div>


<style type="text/css">
    .stock_sae{
        color: #666666;
        font-size: 10px;
        text-align: left;
    }
</style>


                
            </div>
            <div class="col-md-12">

                <?
                    /*$t =get_cookie('masda_data_envio');
                    echo var_dump($t);*/
                ?>

            <table id="listado_productos" class="table table-bordered table-hover" style="background:#fff;">
                    <thead>
                        <tr>
                            <th class="text-center">CODIGO</th>
                            <th class="text-center">DESCRIPCI&Oacute;N</th>
                            <th class="text-center">MARCA</th>
                            <th class="text-center">IMAGEN</th>
                            <th class="text-center">EXISTENCIAS</th>
                            <th class="text-center">PRECIO PUBLICO</th>
                            <th class="text-center">PRECIO MAYOREO > $5,000</th>
                            <th class="text-center">PRECIO DISTRIBUIDOR > $10,000 </th>
                            <th class="t_w_90"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <? if($products != ''){?>

                    <? if(!is_array($products)){
                        echo '<tr><td colspan="9"><div class="alert alert-danger" role="alert">'.$products.'</div></td></tr>';
                        $products = array();
                    }?>

                    <? foreach($products as $product):?>
                    <? $con_iva = $product->products_price + (16*($product->products_price/100));?>
                    
                    <tr id="t_<?=$product->products_id?>">
                        <td class="text-center">
                            <a href="http://www.massivepc.com/-p-<?=$product->products_id?>.html" target="_blank"><?=$product->products_id?></a>
                        </td>
                        <td>
                            <a target="_blank" class="ml2" href="http://www.massivepc.com/-p-<?=$product->products_id?>.html">
                                <?=ucfirst(mb_strtolower($product->products_name))?>
                            </a>
                        </td>
                        <td>
                            <a target="_blank" href="http://www.massivepc.com/<?=$product->manufacturers_name?>-m-<?=$product->manufacturers_id?>.html">
                                <img alt="Fabricante" src="https://www.massivepc.com/images/<?=$product->manufacturers_image?>" style="display:block; margin:auto;" > <? /*height="30" width="60"*/?>
                            </a>
                        </td>
                        <td>
                            
                            <? if(empty($product->products_image)){?>
                                <img style="padding:0px; max-width:none;" class="img-thumbnail" src="https://www.massivepc.com/mayoreo/assets/img/unboxing.jpg" alt="" width="80px" height="80px"/> 
                            <? }else{?>
                            <a href="javascript:void(0);" onclick="window.open('/galeriam.php?products_id=<?=$product->products_id?>', '_blank', 'width=800,height=900,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');">
                                <img style="padding:0px; max-width:none;" class="img-thumbnail" src="https://www.massivepc.com/images/<?=$product->products_image?>" alt="" width="80px" height="80px"/> 
                            </a>
                            <? }?>
                        </td>
                        <td class="text-center">
                            
                            <div class="pull-left stock_sae text-center">Tienda</div> <div class="pull-right stock_sae text-center">Bodega</div>
                            <div class="clearfix"> </div>
                            <div class="pull-left stock_sae text-center">
                            <?
                                if($product->sae_exist_7_1 <= '0'){
                                    echo 'Agotado';
                                    $ex = 0;
                                }else{
                                    echo $product->sae_exist_7_1;
                                    $ex = $product->sae_exist_7_1;
                                }
                            ?>
                            </div>
                            <div class="pull-right stock_sae text-center">
                            <?
                                if($product->sae_exist_7_2 <= '0'){
                                    echo 'Agotado';
                                    $ex = 0;
                                }else{
                                    echo $product->sae_exist_7_2;
                                    $ex = $product->sae_exist_7_2;
                                }
                            ?>
                            </div>
                            <div class="clearfix"> </div>
                            
                        </td>
                        <td class="text-center text_rojo">
                            $<?=number_format(round($con_iva,2))?>
                            <br>
                            <span class="iva_included">iva incluido</span>
                        </td>
                        <td class="text-center text_rojo">
                            $<?=number_format($product->precio_mayoreo)?>
                            <br>
                            <span class="iva_included">iva incluido</span>
                        </td>
                        <td class="text-center text_rojo">
                            $<?=number_format($product->precio_distribuidor)?>
                            <br>
                            <span class="iva_included">iva incluido</span>
                        </td>
                        <td class="text-center">
                            <?
                            if($product->id_categoria == '44' || $product->id_categoria == '35' || $product->products_id == '13706' || $product->products_id == '13707' || $product->products_id == '14190'){
                                if($product->sae_exist_7_2 <= '0'){
                                        ?>
                                           <input class="form-control input-sm cantidad" type="text" placeholder="Cantidad" disabled/>
                                           <a href="#" class="btn btn-sm btn-primary disabled">Agregar</a>
                                            <?
                                    }else{
                                        ?>
                                      <input id="in_<?=$product->products_id?>" class="form-control input-sm cantidad" type="text" data-exist="<?=$product->sae_exist_7_2?>" placeholder="Cantidad" />
                                       <a id="pc_<?=$product->products_id?>" href="#" data-id="<?=$product->products_id?>" data-exist="<?=$product->sae_exist_7_2?>" data-imagen="<?=$product->products_image?>" data-price="<?=$con_iva?>" data-mayoreo="<?=$product->precio_mayoreo?>" data-distribuidor="<?=$product->precio_distribuidor?>" data-name="<?=ucfirst(mb_strtolower(url_title($product->products_name, ' ', TRUE)))?>" class="btn btn-sm btn-primary new_add">Agregar</a>
                                        <?
                                    }
                                }else{
                                    if($product->products_id == '13565'){
                                        ?>
                                      <input id="in_<?=$product->products_id?>" class="form-control input-sm cantidad" type="text" data-exist="<?=$product->sae_exist_7_2?>" placeholder="Cantidad" />
                                       <a id="pc_<?=$product->products_id?>" href="#" data-id="<?=$product->products_id?>" data-exist="<?=$product->sae_exist_7_2?>" data-imagen="<?=$product->products_image?>" data-price="<?=$con_iva?>" data-mayoreo="<?=$product->precio_mayoreo?>" data-distribuidor="<?=$product->precio_distribuidor?>" data-name="<?=ucfirst(mb_strtolower(url_title($product->products_name, ' ', TRUE)))?>" class="btn btn-sm btn-primary new_add">Agregar</a>
                                        <?
                                    }else{
                                        if($product->sae_exist_7_2 <= '3'){
                                            ?>
                                           <input class="form-control input-sm cantidad" type="text" placeholder="Cantidad" disabled/>
                                           <a href="#" class="btn btn-sm btn-primary disabled">Agregar</a>
                                            <?
                                        }else{
                                            ?>
                                          <input id="in_<?=$product->products_id?>" class="form-control input-sm cantidad" type="text" data-exist="<?=$product->sae_exist_7_2?>" placeholder="Cantidad" />
                                           <a id="pc_<?=$product->products_id?>" href="#" data-id="<?=$product->products_id?>" data-exist="<?=$ex?>" data-imagen="<?=$product->products_image?>" data-price="<?=$con_iva?>" data-mayoreo="<?=$product->precio_mayoreo?>" data-distribuidor="<?=$product->precio_distribuidor?>" data-name="<?=ucfirst(mb_strtolower(url_title($product->products_name, ' ', TRUE)))?>" class="btn btn-sm btn-primary new_add">Agregar</a>
                                            <?
                                        }
                                    }
                                }
                            ?>
                        </td>
                    </tr>


                    <? endforeach?>

                    <? }else{?>

                    <? foreach($categories as $categorie):?>
                    
                        <? if($categorie->id_categoria != 21){?>
                            <tr>
                                <td class="bg-info text-center" colspan="10">
                                    <strong><?=$categorie->categoria?></strong>
                                </td>
                            </tr>
                        <? }?>

                    <? $this->data['products'] = $this->products_model->get_products(array('fk_categoria'=>$categorie->id_categoria))?>

                    <? foreach($this->data['products'] as $product):?>
                    <? $con_iva = $product->products_price + (16*($product->products_price/100));?>
                    
                    <tr id="t_<?=$product->products_id?>">
                        <td class="text-center">
                            <a href="http://www.massivepc.com/-p-<?=$product->products_id?>.html" target="_blank"><?=$product->products_id?></a>
                        </td>
                        <td>
                            <a target="_blank" class="ml2" href="http://www.massivepc.com/-p-<?=$product->products_id?>.html">
                                <?=ucfirst(mb_strtolower($product->products_name))?>
                            </a>
                        </td>
                        <td>
                            <a target="_blank" href="http://www.massivepc.com/<?=$product->manufacturers_name?>-m-<?=$product->manufacturers_id?>.html">
                                <img alt="Fabricante" src="https://www.massivepc.com/images/<?=$product->manufacturers_image?>" style="display:block; margin:auto;" > <? /*height="30" width="60"*/?>
                            </a>
                        </td>
                        <td>
                            
                            <? if(empty($product->products_image)){?>
                                <img style="padding:0px; max-width:none;" class="img-thumbnail" src="https://www.massivepc.com/mayoreo/assets/img/unboxing.jpg" alt="" width="80px" height="80px"/> 
                            <? }else{?>
                            <a href="javascript:void(0);" onclick="window.open('/galeriam.php?products_id=<?=$product->products_id?>', '_blank', 'width=800,height=900,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');">
                                <img style="padding:0px; max-width:none;" class="img-thumbnail" src="https://www.massivepc.com/images/<?=$product->products_image?>" alt="" width="80px" height="80px"/> 
                            </a>
                            <? }?>
                        </td>
                        <td class="text-center">
                            <div class="pull-left stock_sae text-center">Tienda</div> <div class="pull-right stock_sae text-center">Bodega</div>
                            <div class="clearfix"> </div>
                            <div class="pull-left stock_sae text-center">
                            <?
                                if($product->sae_exist_7_1 <= '0'){
                                    echo 'Agotado';
                                    $ex = 0;
                                }else{
                                    echo $product->sae_exist_7_1;
                                    $ex = $product->sae_exist_7_1;
                                }
                            ?>
                            </div>
                            <div class="pull-right stock_sae text-center">
                            <?
                                if($product->sae_exist_7_2 <= '0'){
                                    echo 'Agotado';
                                    $ex = 0;
                                }else{
                                    echo $product->sae_exist_7_2;
                                    $ex = $product->sae_exist_7_2;
                                }
                            ?>
                            </div>
                            <div class="clearfix"> </div>
                        </td>
                        <td class="text-center text_rojo">
                            $<?=number_format(round($con_iva,2))?>
                            <br>
                            <span class="iva_included">iva incluido</span>
                        </td>
                        <td class="text-center text_rojo">
                            $<?=number_format($product->precio_mayoreo)?>
                            <br>
                            <span class="iva_included">iva incluido</span>
                        </td>
                        <td class="text-center text_rojo">
                            $<?=number_format($product->precio_distribuidor)?>
                            <br>
                            <span class="iva_included">iva incluido</span>
                        </td>
                        <td class="text-center">
                            <?
                            if($categorie->id_categoria == '44' || $categorie->id_categoria == '35' || $product->products_id == '13706' || $product->products_id == '13707'){
                                if($product->sae_exist_7_2 <= '0'){
                                        ?>
                                           <input class="form-control input-sm cantidad" type="text" placeholder="Cantidad" disabled/>
                                           <a href="#" class="btn btn-sm btn-primary disabled">Agregar</a>
                                            <?
                                    }else{
                                        ?>
                                      <input id="in_<?=$product->products_id?>" class="form-control input-sm cantidad" type="text" data-exist="<?=$product->sae_exist_7_2?>" placeholder="Cantidad" />
                                       <a id="pc_<?=$product->products_id?>" href="#" data-id="<?=$product->products_id?>" data-exist="<?=$product->sae_exist_7_2?>" data-imagen="<?=$product->products_image?>" data-price="<?=$con_iva?>" data-mayoreo="<?=$product->precio_mayoreo?>" data-distribuidor="<?=$product->precio_distribuidor?>" data-name="<?=ucfirst(mb_strtolower(url_title($product->products_name, ' ', TRUE)))?>" class="btn btn-sm btn-primary new_add">Agregar</a>
                                        <?
                                    }
                                }else{
                                    if($product->products_id == '13565'){
                                        ?>
                                      <input id="in_<?=$product->products_id?>" class="form-control input-sm cantidad" type="text" data-exist="<?=$product->sae_exist_7_2?>" placeholder="Cantidad" />
                                       <a id="pc_<?=$product->products_id?>" href="#" data-id="<?=$product->products_id?>" data-exist="<?=$product->sae_exist_7_2?>" data-imagen="<?=$product->products_image?>" data-price="<?=$con_iva?>" data-mayoreo="<?=$product->precio_mayoreo?>" data-distribuidor="<?=$product->precio_distribuidor?>" data-name="<?=ucfirst(mb_strtolower(url_title($product->products_name, ' ', TRUE)))?>" class="btn btn-sm btn-primary new_add">Agregar</a>
                                        <?
                                    }else{
                                        if($product->sae_exist_7_2 <= '3'){
                                            ?>
                                           <input class="form-control input-sm cantidad" type="text" placeholder="Cantidad" disabled/>
                                           <a href="#" class="btn btn-sm btn-primary disabled">Agregar</a>
                                            <?
                                        }else{
                                            ?>
                                          <input id="in_<?=$product->products_id?>" class="form-control input-sm cantidad" type="text" data-exist="<?=$product->sae_exist_7_2?>" placeholder="Cantidad" />
                                           <a id="pc_<?=$product->products_id?>" href="#" data-id="<?=$product->products_id?>" data-exist="<?=$ex?>" data-imagen="<?=$product->products_image?>" data-price="<?=$con_iva?>" data-mayoreo="<?=$product->precio_mayoreo?>" data-distribuidor="<?=$product->precio_distribuidor?>" data-name="<?=ucfirst(mb_strtolower(url_title($product->products_name, ' ', TRUE)))?>" class="btn btn-sm btn-primary new_add">Agregar</a>
                                            <?
                                        }
                                    }
                                }
                            ?>
                        </td>
                    </tr>


                    <? endforeach?>

                    <? endforeach?>


                    <? }?>
                    
                    </tbody>


                </table>

            </div>
                
        </div>
        
        <br>
        <div id="impr_btn">
            <a class="btn btn-primary" onclick="$('#listado_productos').print()">Imprimir Lista</a>
        </div>
        <br>


        
        
