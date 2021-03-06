    
<link rel="stylesheet" href="/mayoreo/assets/css/neon-forms.css?dff=<?=md5(time())?>">
<style type="text/css">
.relative{
    position: relative;
}
    .product-flags{
        position: absolute;
        top: 0px;
        left: 0px;
        right: 0px;
        bottom: 0px;
        width: 100%;
        margin: 0px;
        padding:0px;
    }
    .product-flags .remate{
        background: #EC6A06 none repeat scroll 0 0;
        box-shadow: 2px 2px 11px 0 rgba(0, 0, 0, 0.1);
        color: #fff;
        display: block;
        font-size: 1rem;
        font-weight: 600;
        text-transform: uppercase;
        left: 0px;
        display: block;
        width: 100%;
        position: absolute;
    }

    .product-flags .nuevo{
        background: #1a73ab none repeat scroll 0 0;
        box-shadow: 2px 2px 11px 0 rgba(0, 0, 0, 0.1);
        color: #fff;
        display: block;
        font-size: 1rem;
        font-weight: 600;
        width: 100%;
        float: left;
        text-transform: uppercase;
        padding: 2px;
        position: absolute;
        left: 0px;
    }

    .product-flags .oferta{
        background: red none repeat scroll 0 0;
        box-shadow: 2px 2px 11px 0 rgba(0, 0, 0, 0.1);
        color: #fff;
        display: block;
        font-size: 1rem;
        font-weight: 600;
        width: 100%;
        float: left;
        text-transform: uppercase;
        padding: 2px;
        position: absolute;
        left: 0px;
        bottom: 0px;
    }
</style>

        <div id="row">
            <div class="col-md-12">

                <div class="panel panel-default">
                      <div class="panel-heading">
                            <i class="glyphicon glyphicon-search"></i> Buscador
                            <a class="btn btn-primary btn-xs pull-right" href="<?=base_url()?>?cb=<?=md5(time()*999)?>">Limpiar</a>
                      </div>
  <div class="panel-body">
   
    <form id="filtro" method="get" action="#row">
        
        <div class="row">

            <div class="col-md-4">

                <div class="input-group">
                      <input type="text" style="margin: 0px;" class="form-control" id="palabra" name="palabra" value="<?=$palabra?>" placeholder="Descripción del producto">
                      <span class="input-group-btn">
                        <button class="btn btn-primary btn-search" type="submit">Buscar</button>
                      </span>
                </div>

            </div>

            <div class="col-md-3">
                <select id="marca" name="marca" class="chosen-select" data-placeholder="Marca" tabindex="-1">
                    <option value="">TODAS LAS MARCAS</option>
                    <? foreach($marcas as $marca):?>
                    <option <?=($marca_id == $marca->id_marca) ? 'selected' : '' ?> value="<?=$marca->id_marca?>"><?=$marca->marca?></option>
                    <? endforeach?>
                </select>
            </div>

            <div class="col-md-3">

                <select id="categoria" name="categoria" class="chosen-select" data-placeholder="Categoría" tabindex="-1">
                    <option value="">TODAS LAS CATEGORIAS</option>
                    <? foreach($categories as $categoria):?>
                    <option <?=($categoria_id == $categoria->id_categoria) ? 'selected' : '' ?> value="<?=$categoria->id_categoria?>"><?=$categoria->categoria?></option>
                    <? endforeach?>
                </select>

            </div>

            <div class="col-md-2">
                <select id="ordenar" name="ordenar" class="chosen-select" data-placeholder="Ordenar" tabindex="-1">
                    <option value="">ORDENAR POR</option>
                    <? if($ordenar == 'menor_precio'){?>
                        <option value="menor_precio" selected="">MENOR PRECIO</option>
                    <? }else{?>
                        <option value="menor_precio">MENOR PRECIO</option>
                    <? }?>                       
                    <? if($ordenar == 'mayor_precio'){?>
                        <option value="mayor_precio" selected="">MAYOR PRECIO</option>
                    <? }else{?>
                        <option value="mayor_precio">MAYOR PRECIO</option>
                    <? }?>                       
                    <? if($ordenar == 'fecha_alta'){?>
                        <option value="fecha_alta" selected="">NUEVOS PRODUCTOS</option>
                    <? }else{?>
                        <option value="fecha_alta">NUEVOS PRODUCTOS</option>
                    <? }?>

                    <? if($ordenar == 'existencia'){?>
                        <option value="existencia" selected="">EXISTENCIA</option>
                    <? }else{?>
                        <option value="existencia">EXISTENCIA</option>
                    <? }?>
                    
                    
                </select>
            </div>
        </div>

        <div class="row" style="margin-top: 5px;">

            <div class="col-md-3">

                <h6>Mostrar solo existencias</h6>

                <div id="label-switch" class="make-switch switch-small" data-on-label="SI" data-off-label="NO">
                    <input id="existencias" name="existencias" <? if($existencias=='on'){ echo 'checked';}?> type="checkbox">
                </div>

            </div>

            <div class="col-md-6 text-center" style="padding-top: 15px;">
                <h4>Mostrar todos los productos: (<a target="_blank" href="https://www.massivepc.com/mayoreo/normal">Normal</a>) (<a target="_blank" href="https://www.massivepc.com/mayoreo/todos">Carga Rápida</a>) </h4>
            </div>

            <div class="col-md-3">
            </div>

        </div>
        
    </form>

  </div>
</div>





                
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
                            <th class="text-center">PRECIO MENUDEO</th>
                            <th class="text-center">PRECIO MAYOREO > $2,500</th>
                            <th class="text-center">PRECIO DISTRIBUIDOR > $5,000 </th>
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
                        <td class="text-center relative">
                            <ul class="product-flags">
                            <? if($product->nuevo){?>
                                  <li class="nuevo">Nuevo</li>
                            <? }?>

                            <? if($product->oferta){?>
                                  <li class="oferta">Oferta</li>
                            <? }?>
                            </ul>
                            <a href="http://www.massivepc.com/-p-<?=$product->products_id?>.html" target="_blank"><?=$product->products_id?></a>
                            <? if(!empty($product->id_video_youtube)){?>
                            <br><a href="javascript:void(0);" onclick="window.open('https://www.massivepc.com/youtube.php?products_id=<?=$product->products_id?>', '_blank', 'width=600,height=350,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');">
                                <img src="https://www.massivepc.com/mayoreo/assets/img/youtube.jpg">
                                </a>
                            <? } ?>
                        </td>
                        <td>
                            <a target="_blank" class="ml2" href="http://www.massivepc.com/-p-<?=$product->products_id?>.html">
                                <?=ucfirst(mb_strtolower($product->products_name))?>
                            </a>
                        </td>
                        <td>
                            <a href="https://www.massivepc.com/mayoreo/?palabra=&marca=<?=$product->manufacturers_id?>&categoria=#row">
                                <img alt="Fabricante" src="https://www.massivepc.com/images/<?=$product->manufacturers_image?>" style="display:block; margin:auto;" > <? /*height="30" width="60"*/?>
                            </a>
                        </td>
                        <td>
                            
                            <? if(empty($product->products_image)){?>
                                <img style="padding:0px; max-width:none;" class="img-thumbnail" src="https://www.massivepc.com/mayoreo/assets/img/unboxing.jpg" alt="" width="80px" height="80px"/> 
                            <? }else{?>
                            <a href="javascript:void(0);" onclick="window.open('/galeriam.php?products_id=<?=$product->products_id?>', '_blank', 'width=800,height=900,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');">
                                <img style="padding:0px; max-width:none;" class="img-thumbnail" src="https://www.massivepc.com/images/<?=$product->products_image?>" alt="<?=ucfirst(mb_strtolower($product->products_name))?>" width="80px" height="80px"/> 
                            </a>
                            <? }?>
                        </td>
                        <td class="text-center">
                            <?
                                /*if($product->id_categoria == '44' || $product->id_categoria == '35' || $product->products_id == '13706' || $product->products_id == '13707' || $product->products_id == '14190'){
                                    if($product->sae_exist <= '0'){
                                        echo 'Agotado';
                                        $ex = 0;
                                    }else{
                                        echo $product->sae_exist;
                                        $ex = $product->sae_exist;
                                    }
                                }else{
                                    if($product->sae_exist <= '0'){
                                        echo 'Agotado';
                                        $ex = 0;
                                    }else if($product->products_id == '13565'){
                                        echo '1';
                                        $ex = '1';
                                    }else{
                                        if($product->sae_exist <= 3){
                                            echo 'Agotado';
                                            $ex = 0;
                                        }else{
                                            echo $product->sae_exist - 3;
                                            $ex = $product->sae_exist - 3;
                                        }
                                    }
                                }*/
                            ?>
                            <?
                                if($product->products_id == '8438'){
                                    echo '550';
                                    $ex = $product->sae_exist;
                                }elseif($product->products_id == '8439'){
                                    echo '571';
                                    $ex = $product->sae_exist;
                                }elseif($product->products_id == '14884'){
                                    echo '533';
                                    $ex = $product->sae_exist;
                                }elseif($product->products_id == '8437'){
                                    echo '534';
                                    $ex = $product->sae_exist;
                                }else{
                                    /*************/
                                    if($product->id_categoria == '44' || $product->id_categoria == '35' || $product->products_id == '13706' || $product->products_id == '13707'){
                                        if($product->sae_exist <= '0'){
                                            echo 'Agotado';
                                            $ex = 0;
                                        }else{
                                            echo $product->sae_exist;
                                            $ex = $product->sae_exist;
                                        }
                                    }else{
                                        if($product->sae_exist <= '0'){
                                            echo 'Agotado';
                                            $ex = 0;
                                        }else if($product->products_id == '13565'){
                                            echo '1';
                                            $ex = '1';
                                        }else{
                                            if($product->sae_exist <= 3){
                                                echo 'Agotado';
                                                $ex = 0;
                                            }else{
                                                echo $product->sae_exist - 3;
                                                $ex = $product->sae_exist - 3;
                                            }
                                        }
                                    }
                                    /*************/
                                }
                            ?>
                        </td>
                        <td class="text-center text_rojo relative">
                            <? if($product->remate){?>
                                <ul class="product-flags">
                                  <li class="remate">Remate</li>
                                </ul>
                            <? }?>
                            $<?=number_format(round($con_iva,2))?>
                            <br>
                            <span class="iva_included">iva incluido</span>
                        </td>
                        <td class="text-center text_rojo relative">
                            <? if($product->remate){?>
                                <ul class="product-flags">
                                  <li class="remate">Remate</li>
                                </ul>
                            <? }?>
                            $<?=number_format($product->precio_mayoreo)?>
                            <br>
                            <span class="iva_included">iva incluido</span>
                        </td>
                        <td class="text-center text_rojo relative">
                            <? if($product->remate){?>
                                <ul class="product-flags">
                                  <li class="remate">Remate</li>
                                </ul>
                            <? }?>
                            $<?=number_format($product->precio_distribuidor)?>
                            <br>
                            <span class="iva_included">iva incluido</span>
                        </td>
                        <td class="text-center">
                            <?
                            if($product->id_categoria == '44' || $product->id_categoria == '35' || $product->products_id == '13706' || $product->products_id == '13707' || $product->products_id == '14190'){
                                if($product->sae_exist <= '0'){
                                        ?>
                                           <input class="form-control input-sm cantidad" type="text" placeholder="Cantidad" disabled/>
                                           <a href="#" class="btn btn-sm btn-primary disabled">Agregar</a>
                                            <?
                                    }else{
                                        ?>
                                      <input id="in_<?=$product->products_id?>" class="form-control input-sm cantidad" type="text" data-exist="<?=$product->sae_exist?>" placeholder="Cantidad" />
                                       <a id="pc_<?=$product->products_id?>" href="#" data-id="<?=$product->products_id?>" data-exist="<?=$product->sae_exist?>" data-imagen="<?=$product->products_image?>" class="btn btn-sm btn-primary new_add">Agregar</a>
                                        <?
                                    }
                                }else{
                                    if($product->products_id == '13565'){
                                        ?>
                                      <input id="in_<?=$product->products_id?>" class="form-control input-sm cantidad" type="text" data-exist="<?=$product->sae_exist?>" placeholder="Cantidad" />
                                       <a id="pc_<?=$product->products_id?>" href="#" data-id="<?=$product->products_id?>" data-exist="<?=$product->sae_exist?>" data-imagen="<?=$product->products_image?>" class="btn btn-sm btn-primary new_add">Agregar</a>
                                        <?
                                    }else{
                                        if($product->sae_exist <= '3'){
                                            ?>
                                           <input class="form-control input-sm cantidad" type="text" placeholder="Cantidad" disabled/>
                                           <a href="#" class="btn btn-sm btn-primary disabled">Agregar</a>
                                            <?
                                        }else{
                                            ?>
                                          <input id="in_<?=$product->products_id?>" class="form-control input-sm cantidad" type="text" data-exist="<?=$product->sae_exist?>" placeholder="Cantidad" />
                                           <a id="pc_<?=$product->products_id?>" href="#" data-id="<?=$product->products_id?>" data-exist="<?=$ex?>" data-imagen="<?=$product->products_image?>" class="btn btn-sm btn-primary new_add">Agregar</a>
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

                    
                    <? if( is_array($where) ){?>
                        <? $this->data['products'] = $this->products_model->get_products( array( 'products_status' => '1', 'fk_categoria' => $categorie->id_categoria, 'sae_exist' => '0' ))?>
                    <? }else{?>
                        <? $this->data['products'] = $this->products_model->get_products( array( 'products_status' => '1', 'fk_categoria' => $categorie->id_categoria ))?>
                    <? }?>
                    

                    <? foreach($this->data['products'] as $product):?>
                    <? $con_iva = $product->products_price + (16*($product->products_price/100));?>
                    
                    <tr id="t_<?=$product->products_id?>">
                        <td class="text-center relative">
                            <ul class="product-flags">
                            <? if($product->nuevo){?>
                                  <li class="nuevo">Nuevo</li>
                            <? }?>

                            <? if($product->oferta){?>
                                  <li class="oferta">Oferta</li>
                            <? }?>
                            </ul>

                            <a href="http://www.massivepc.com/-p-<?=$product->products_id?>.html" target="_blank"><?=$product->products_id?></a>
                            <? if(!empty($product->id_video_youtube)){?>
                                <br><a href="javascript:void(0);" onclick="window.open('https://www.massivepc.com/youtube.php?products_id=<?=$product->products_id?>', '_blank', 'width=600,height=350,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');">
                                <img src="https://www.massivepc.com/mayoreo/assets/img/youtube.jpg">
                                </a>
                            <? } ?>
                        </td>
                        <td>
                            <a target="_blank" class="ml2" href="http://www.massivepc.com/-p-<?=$product->products_id?>.html">
                                <?=ucfirst(mb_strtolower($product->products_name))?>
                            </a>
                        </td>
                        <td>
                            <a href="https://www.massivepc.com/mayoreo/?palabra=&marca=<?=$product->manufacturers_id?>&categoria=#row">
                                <img alt="Fabricante" src="https://www.massivepc.com/images/<?=$product->manufacturers_image?>" style="display:block; margin:auto;" > <? /*height="30" width="60"*/?>
                            </a>
                        </td>
                        <td>
                            
                            <? if(empty($product->products_image)){?>
                                <img style="padding:0px; max-width:none;" class="img-thumbnail" src="https://www.massivepc.com/mayoreo/assets/img/unboxing.jpg" alt="" width="80px" height="80px"/> 
                            <? }else{?>
                            <a href="javascript:void(0);" onclick="window.open('/galeriam.php?products_id=<?=$product->products_id?>', '_blank', 'width=800,height=900,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');">
                                <img style="padding:0px; max-width:none;" class="img-thumbnail" src="https://www.massivepc.com/images/<?=$product->products_image?>" alt="<?=ucfirst(mb_strtolower($product->products_name))?>" width="80px" height="80px"/> 
                            </a>
                            <? }?>
                        </td>
                        <td class="text-center">
                            <?
                                if($product->products_id == '8438'){
                                    echo '550';
                                    $ex = $product->sae_exist;
                                }elseif($product->products_id == '8439'){
                                    echo '571';
                                    $ex = $product->sae_exist;
                                }elseif($product->products_id == '14884'){
                                    echo '533';
                                    $ex = $product->sae_exist;
                                }elseif($product->products_id == '8437'){
                                    echo '534';
                                    $ex = $product->sae_exist;
                                }else{
                                    /*************/
                                    if($categorie->id_categoria == '44' || $categorie->id_categoria == '35' || $product->products_id == '13706' || $product->products_id == '13707'){
                                        if($product->sae_exist <= '0'){
                                            echo 'Agotado';
                                            $ex = 0;
                                        }else{
                                            echo $product->sae_exist;
                                            $ex = $product->sae_exist;
                                        }
                                    }else{
                                        if($product->sae_exist <= '0'){
                                            echo 'Agotado';
                                            $ex = 0;
                                        }else if($product->products_id == '13565'){
                                            echo '1';
                                            $ex = '1';
                                        }else{
                                            if($product->sae_exist <= 3){
                                                echo 'Agotado';
                                                $ex = 0;
                                            }else{
                                                echo $product->sae_exist - 3;
                                                $ex = $product->sae_exist - 3;
                                            }
                                        }
                                    }
                                    /*************/
                                }
                            ?>
                        </td>
                        <td class="text-center text_rojo relative">
                        <? if($product->remate){?>
                                <ul class="product-flags">
                                  <li class="remate">Remate</li>
                                </ul>
                            <? }?>
                            $<?=number_format(round($con_iva,2))?>
                            <br>
                            <span class="iva_included">iva incluido</span>
                        </td>
                        <td class="text-center text_rojo relative">
                        <? if($product->remate){?>
                                <ul class="product-flags">
                                  <li class="remate">Remate</li>
                                </ul>
                            <? }?>
                            $<?=number_format($product->precio_mayoreo)?>
                            <br>
                            <span class="iva_included">iva incluido</span>
                        </td>
                        <td class="text-center text_rojo relative">
                        <? if($product->remate){?>
                                <ul class="product-flags">
                                  <li class="remate">Remate</li>
                                </ul>
                            <? }?>
                            $<?=number_format($product->precio_distribuidor)?>
                            <br>
                            <span class="iva_included">iva incluido</span>
                        </td>
                        <td class="text-center">
                            <?
                            if($categorie->id_categoria == '44' || $categorie->id_categoria == '35' || $product->products_id == '13706' || $product->products_id == '13707'){
                                if($product->sae_exist <= '0'){
                                        ?>
                                           <input class="form-control input-sm cantidad" type="text" placeholder="Cantidad" disabled/>
                                           <a href="#" class="btn btn-sm btn-primary disabled">Agregar</a>
                                            <?
                                    }else{
                                        ?>
                                      <input id="in_<?=$product->products_id?>" class="form-control input-sm cantidad" type="text" data-exist="<?=$product->sae_exist?>" placeholder="Cantidad" />
                                       <a id="pc_<?=$product->products_id?>" href="#" data-id="<?=$product->products_id?>" data-exist="<?=$product->sae_exist?>" data-imagen="<?=$product->products_image?>" class="btn btn-sm btn-primary new_add">Agregar</a>
                                        <?
                                    }
                                }else{
                                    if($product->products_id == '13565'){
                                        ?>
                                      <input id="in_<?=$product->products_id?>" class="form-control input-sm cantidad" type="text" data-exist="<?=$product->sae_exist?>" placeholder="Cantidad" />
                                       <a id="pc_<?=$product->products_id?>" href="#" data-id="<?=$product->products_id?>" data-exist="<?=$product->sae_exist?>" data-imagen="<?=$product->products_image?>" class="btn btn-sm btn-primary new_add">Agregar</a>
                                        <?
                                    }else{
                                        if($product->sae_exist <= '3'){
                                            ?>
                                           <input class="form-control input-sm cantidad" type="text" placeholder="Cantidad" disabled/>
                                           <a href="#" class="btn btn-sm btn-primary disabled">Agregar</a>
                                            <?
                                        }else{
                                            ?>
                                          <input id="in_<?=$product->products_id?>" class="form-control input-sm cantidad" type="text" data-exist="<?=$product->sae_exist?>" placeholder="Cantidad" />
                                           <a id="pc_<?=$product->products_id?>" href="#" data-id="<?=$product->products_id?>" data-exist="<?=$ex?>" data-imagen="<?=$product->products_image?>" class="btn btn-sm btn-primary new_add">Agregar</a>
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


        
        
