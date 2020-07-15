<!doctype html>

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title> </title>

    <link href="<?=base_url()?>assets/css/stylev4.css" rel="stylesheet" type="text/css">
    <link href="/css/jquery-ui.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/bootstrap3/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" >
    
    <script>
        var base_path='/mayoreo/';
    </script>
        
    <style type="text/css">
    html body.modal-open div#myModal.modal.fade.in div.modal-backdrop{
        position: fixed;
    }
    .label{
        display: block;
        margin: 5px 0 0 0;
        text-align: left;
    }
    .text-center.text_rojo label.btn.btn-success,
    .text-center.text_rojo label.btn.btn-danger{
        display: block;
        text-align: left;
    }
    </style>

</head>
<body>


<div class="container-fluid">
               
        <div style="clear:both;"></div>
        
        <div id="seleccion">
            
            <div class="row">
                <div class="col-md-2">
                    <h3>Tipo de cambio</h3>

            <?
                $cny_to_mxn = conversor_monedas('CNY','MXN',1);
                $usd_to_mxn = conversor_monedas('USD','MXN',1);
                $cny_to_usd = conversor_monedas('CNY','USD',1);

                $atts = array(
                    'width'      => '200',
                    'height'     => '100',
                    'scrollbars' => 'no',
                    'status'     => 'no',
                    'resizable'  => 'no',
                    'screenx'    => '500',
                    'screeny'    => '500'
                );
            ?>

            <label class="btn btn-primary btn-xs">
            1 Yuan renminbi chino <span class="badge"><?=$cny_to_mxn?></span> MXN </label><br><br>

            <label class="btn btn-primary btn-xs">
            1 Dolar estadunidense <span class="badge"><?=round($usd_to_mxn,3)?></span> MXN</label><br><br>

            <label class="btn btn-primary btn-xs">
            1 Yuan renminbi chino <span class="badge"><?=$cny_to_usd?></span> USD</label><br><br>
                </div>
                <div class="col-md-2">
<form method="get">
                
  <div class="form-group">
    <label for="fleteinternacional">Flete Internacional</label>
    <input type="text" class="form-control input-sm" id="fleteinternacional" name="sumc[]">
  </div>
  <div class="form-group">
    <label for="fletenacional">Flete Nacional</label>
    <input type="text" class="form-control input-sm" id="fletenacional" name="sumc[]">
  </div>
  <div class="form-group">
    <label for="custodia">Custodia</label>
    <input type="text" class="form-control input-sm" id="custodia" name="sumc[]">
  </div>
  




                </div>
                <div class="col-md-2">
                    <div class="form-group">
    <label for="impuestosaduanales">Impuestos Aduanales</label>
    <input type="text" class="form-control input-sm" id="impuestosaduanales" name="sumc[]">
  </div>
  <div class="form-group">
    <label for="otros">Otros</label>
    <input type="text" class="form-control input-sm" id="otros" name="sumc[]">
  </div>
  
  <button type="submit" class="btn btn-default">Calcular</button>
                </div>
                <div class="col-md-2">
                     <?
 $sum = $this->products_model->get_products_k();
 $sumc = array_sum($sumc);
 echo '<strong>Total de costos:</strong> $'. round($sum->costo_total, 2).'<br>';
 echo '<strong>Total de gastos:</strong> $'. round($sumc, 2);
 ?>
                </div>
            </div>

            </form>
                        
            <!--<tr>-->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">PRODUCTO</th>
                            <th class="text-center">EXISTENCIAS</th>
                            <th class="text-center">PESO</th>
                            <th class="text-center">COSTO<br>RMB</th>
                            <th class="text-center">COSTO<br>USD</th>
                            <th class="text-center">COSTO<br>MXN</th>
                            <th class="text-center">% TOTAL</th>
                            <th class="text-center">GASTOS POR PZA</th>
                            <th class="text-center">COSTO TOTAL</th>
                            <th class="text-center">COSTO <br>MXN + IVA</th>
                            <th class="text-center">COSTO<br>ENVÍO</th>
                            <th class="text-center">COSTO MXN +<br>IVA + ENVÍO</th>
                            <th class="text-center">COSTO NACIONAL</th>
                            <th class="text-center">PRECIO<br>PUBLICO</th>
                            <th class="text-center">PRECIO<br>MAYOREO</th>
                            <th class="text-center">PRECIO<br>DISTRIBUIDOR</th>
                            <th class="text-center">50<br>TABLETS</th>
                            <th class="text-center">100<br>TABLETS</th>
                            <th class="text-center">1000<br>TABLETS</th>
                        </tr>
                    </thead>
                    <tbody>
                    <? $costo_total_pza = ''?>
                    <? foreach($categories as $categorie):?>
                    
                        <? if($categorie->id_categoria != 24){?>
                            <tr>
                                <td class="bg-info text-center" colspan="17">
                                    <strong><?=$categorie->categoria?></strong>
                                </td>
                            </tr>
                        <? }?>

                    <? $this->data['products'] = $this->products_model->get_products(array('fk_categoria'=>$categorie->id_categoria))?>

                    <? foreach($this->data['products'] as $product):?> <!-- Inicia bucle de productos -->

                    <?

                    $con_iva = $product->products_price + (16*($product->products_price/100));

                    if(!empty($product->peso)){
                        $costo_gramo = $product->peso / 1000 * 5;
                        $costo_gramo2 = round($usd_to_mxn * $costo_gramo,2);
                    }

                    if(!empty($product->costo)){

                        $pc_iva = $product->costo * $cny_to_mxn;
                        $costo_mas_iva = round($con_iva_cny = $pc_iva + (16*($pc_iva/100)),2);
                    }

                    if(!empty($product->costo_nacional)){
                        $tr_nacional = 'info';
                    }else{
                        $tr_nacional = '';
                    }

                    ?>
                    
                    <tr class="<?=$tr_nacional?>" id="t_<?=$product->products_id?>">

                        <td style="width:6.2%;" class="text-center ">
                            <strong><a href="http://www.massivepc.com/-p-<?=$product->products_id?>.html" target="_blank"><?=$product->products_id?></a></strong>
                            <br>
                            <a href="javascript:void(0);" onclick="window.open('/galeriam.php?products_id=<?=$product->products_id?>', '_blank', 'width=800,height=900,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');">
                                <img style="padding:0px; max-width:none;" class="img-thumbnail" src="https://www.massivepc.com/images/<?=$product->products_image?>" alt="" width="80px" height="80px"/> 
                            </a>
                            <? //=character_limiter(ucfirst(mb_strtolower($product->products_name)),20)?>
                        </td>

                        <td style="width:6.2%;" class="text-center ">
                            <?
                                if($product->sae_exist <= '0'){
                                    echo 'Agotado';
                                }else{
                                    echo $product->sae_exist;
                                }
                            ?>
                        </td>

                        <td style="width:6.2%;" class="text-center ">
                            <?=$product->peso?>
                        </td>

                        <td style="width:6.2%;" class="text-center ">
                            ¥<?=round($product->costo,2)?>
                        </td>

                        <td style="width:6.2%;" class="text-center ">
                            $<?=round($product->costo * $cny_to_usd,2)?>
                        </td>

                        <td style="width:6.2%;" class="text-center ">
                            $<?=round($product->costo * $cny_to_mxn,2)?>
                        </td>

                        <td style="width:6.2%;" class="text-center ">
                            <? $cos = $product->costo * $cny_to_mxn;
                                $cs = $cos/$sum->costo_total;
                                echo $cs;
                            ?>
                        </td>

                        <td style="width:6.2%;" class="text-center ">
                            <?
                                $gastoxpza = $sumc * $cs;
                                echo '$'.$gastoxpza;
                            ?>
                        </td>
                        <td style="width:6.2%;" class="text-center ">
                            <?
                                $tr1 = $product->costo * $cny_to_mxn;
                                $tr2 = $gastoxpza + $tr1;
                                echo '$'.$tr2;
                            ?>
                        </td>

                        <td style="width:6.2%;" class="text-center ">
                            $<?=round($costo_mas_iva,2)?>
                        </td>

                        <td style="width:6.2%;" class="text-center ">
                            $<?=$costo_gramo2?>
                        </td>

                        <td style="width:6.2%;" class="text-center ">
                            $<?=round($costo_mas_iva+ $costo_gramo2,2)?>
                        </td>

                        <td style="width:6.2%;" class="">
                            <?
                                if(!empty($product->costo_nacional)){
                                    echo '$'.$product->costo_nacional;
                                }
                            ?>
                        </td>

                        <td style="width:6.2%;" class="text-center text_rojo ">
<a onclick="window.open('<?=base_url()?>ed/producto/pu/<?=$product->products_id?>?rnd=<?=md5(time())?>', '_blank', 'width=200,height=100,scrollbars=no,status=no,resizable=no,screenx=500,screeny=500');" href="javascript:void(0);">Editar</a>
                            <?
                            echo '$'.number_format(round($con_iva,2));
                            if(!empty($product->costo_nacional)){

                                    //$pc_iva2 = $product->costo * $cny_to_mxn;
                                    //$con_iva_cny2 = $pc_iva2 + (16*($pc_iva2/100));
                                    $resultado1 = $con_iva - $product->costo_nacional;
                                    $resultado2 = $resultado1 / $product->costo_nacional;
                                    $resultado3 = $resultado2 * 100;
                                    if($resultado3>0) {
                                        $class_td = 'success';
                                        $arrow    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td = 'danger';
                                        $arrow    = 'fa fa-arrow-down';
                                    }
                                    $utilidad = '%'.round($resultado3);

                                    ?>
                                    <label class="btn btn-<?=$class_td?> btn-xs"> <i class="<?=$arrow?>"></i> Utilidad: <span class="badge"><?=$utilidad?></span></label>
                                    <br>
                                    <?
                                

                            }else{

                                
                                if(!empty($product->costo)){
                                    $pc_iva2 = $product->costo * $cny_to_mxn;
                                    $con_iva_cny2 = $pc_iva2 + (16*($pc_iva2/100));
                                    $resultado1 = $con_iva - $con_iva_cny2;
                                    $resultado2 = $resultado1 / $con_iva_cny2;
                                    $resultado3 = $resultado2 * 100;
                                    if($resultado3>0) {
                                        $class_td = 'success';
                                        $arrow    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td = 'danger';
                                        $arrow    = 'fa fa-arrow-down';
                                    }
                                    $utilidad = '%'.round($resultado3);
                                }else{
                                    $utilidad = '';
                                    $class_td = '';
                                }
                            ?>
                            <br>
                            <label class="btn btn-<?=$class_td?> btn-xs"> <i class="<?=$arrow?>"></i> Utilidad: <span class="badge"><?=$utilidad?></span></label>
                            <br>
                            <?
                                if(!empty($product->costo) && !empty($product->peso)){
                                    $costo_gramoz = $product->peso / 1000 * 5;
                                    $costo_gramo3 = round($usd_to_mxn * $costo_gramoz,2);
                                    $pc_iva_z = $product->costo * $cny_to_mxn;
                                    $costo_mas_iva_z = round($con_iva_cny = $pc_iva_z + (16*($pc_iva_z/100)),2);
                                    $costo_iva_envio = $costo_mas_iva_z + $costo_gramo3;
                                    $resultado_env1 = $con_iva - $costo_iva_envio;
                                    $resultado_env2 = $resultado_env1 / $costo_iva_envio;
                                    $resultado_env3 = $resultado_env2 * 100;
                                    if($resultado_env3>=0) {
                                        $class_td2 = 'success';
                                        $arrow2    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td2 = 'danger';
                                        $arrow2    = 'fa fa-arrow-down';
                                    }
                                     $utilidad2 = '%'.round($resultado_env3);
                                }
                                if(!empty($product->costo) and !empty($product->peso) and !empty($utilidad2)){
                                    echo '<label class="btn btn-'.$class_td2.' btn-xs"> <i class="'.$arrow2.'"></i> U. Envío: <span class="badge">'.$utilidad2.'</span></label>';
                                }

                            }
                                
                            ?>
                            
                        </td>



                        <td style="width:6.2%;" class="text-center text_rojo ">
<a onclick="window.open('<?=base_url()?>ed/producto/ma/<?=$product->products_id?>?rnd=<?=md5(time())?>', '_blank', 'width=200,height=100,scrollbars=no,status=no,resizable=no,screenx=500,screeny=500');" href="javascript:void(0);">Editar</a>
                            <?
                            echo '$'.number_format($product->precio_mayoreo);
                            if(!empty($product->costo_nacional)){

                                    $resultado1 = $product->precio_mayoreo - $product->costo_nacional;
                                    $resultado2 = $resultado1 / $product->costo_nacional;
                                    $resultado3 = $resultado2 * 100;
                                    if($resultado3>0) {
                                        $class_td = 'success';
                                        $arrow    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td = 'danger';
                                        $arrow    = 'fa fa-arrow-down';
                                    }
                                    $utilidad = '%'.round($resultado3);

                                    ?>
                                    <label class="btn btn-<?=$class_td?> btn-xs"> <i class="<?=$arrow?>"></i> Utilidad: <span class="badge"><?=$utilidad?></span></label>
                                    <br>
                                    <?
                                

                            }else{

                                
                                if(!empty($product->costo)){
                                    $pc_iva2 = $product->costo * $cny_to_mxn;
                                    $con_iva_cny2 = $pc_iva2 + (16*($pc_iva2/100));
                                    $resultado1 = $product->precio_mayoreo - $con_iva_cny2;
                                    $resultado2 = $resultado1 / $con_iva_cny2;
                                    $resultado3 = $resultado2 * 100;
                                    if($resultado3>0) {
                                        $class_td = 'success';
                                        $arrow    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td = 'danger';
                                        $arrow    = 'fa fa-arrow-down';
                                    }
                                    $utilidad = '%'.round($resultado3);
                                }else{
                                    $utilidad = '';
                                    $class_td = '';
                                }
                            ?>
                            <br>
                            <label class="btn btn-<?=$class_td?> btn-xs"> <i class="<?=$arrow?>"></i> Utilidad: <span class="badge"><?=$utilidad?></span></label>
                            <br>
                            <?
                                if(!empty($product->costo) && !empty($product->peso)){
                                    $costo_gramoz = $product->peso / 1000 * 5;
                                    $costo_gramo3 = round($usd_to_mxn * $costo_gramoz,2);
                                    $pc_iva_z = $product->costo * $cny_to_mxn;
                                    $costo_mas_iva_z = round($con_iva_cny = $pc_iva_z + (16*($pc_iva_z/100)),2);
                                    $costo_iva_envio = $costo_mas_iva_z + $costo_gramo3;
                                    $resultado_env1 = $product->precio_mayoreo - $costo_iva_envio;
                                    $resultado_env2 = $resultado_env1 / $costo_iva_envio;
                                    $resultado_env3 = $resultado_env2 * 100;
                                    if($resultado_env3>=0) {
                                        $class_td2 = 'success';
                                        $arrow2    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td2 = 'danger';
                                        $arrow2    = 'fa fa-arrow-down';
                                    }
                                     $utilidad2 = '%'.round($resultado_env3);
                                }
                                if(!empty($product->costo) and !empty($product->peso) and !empty($utilidad2)){
                                    echo '<label class="btn btn-'.$class_td2.' btn-xs"> <i class="'.$arrow2.'"></i> U. Envío: <span class="badge">'.$utilidad2.'</span></label>';
                                }

                            }
                                
                            ?>

                            
                        </td>

                        <td style="width:6.2%;" class="text-center text_rojo ">
<a onclick="window.open('<?=base_url()?>ed/producto/di/<?=$product->products_id?>?rnd=<?=md5(time())?>', '_blank', 'width=200,height=100,scrollbars=no,status=no,resizable=no,screenx=500,screeny=500');" href="javascript:void(0);">Editar</a>

                            <?
                            echo '$'.number_format($product->precio_distribuidor);
                            if(!empty($product->costo_nacional)){

                                $resultado1 = $product->precio_distribuidor - $product->costo_nacional;
                                    $resultado2 = $resultado1 / $product->costo_nacional;
                                    $resultado3 = $resultado2 * 100;
                                    if($resultado3>0) {
                                        $class_td = 'success';
                                        $arrow    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td = 'danger';
                                        $arrow    = 'fa fa-arrow-down';
                                    }
                                    $utilidad = '%'.round($resultado3);

                                    ?>
                                    <label class="btn btn-<?=$class_td?> btn-xs"> <i class="<?=$arrow?>"></i> Utilidad: <span class="badge"><?=$utilidad?></span></label>
                                    <br>
                                    <?

                            }else{

                                
                                if(!empty($product->costo)){
                                    $pc_iva2 = $product->costo * $cny_to_mxn;
                                    $con_iva_cny2 = $pc_iva2 + (16*($pc_iva2/100));
                                    $resultado1 = $product->precio_distribuidor - $con_iva_cny2;
                                    $resultado2 = $resultado1 / $con_iva_cny2;
                                    $resultado3 = $resultado2 * 100;
                                    if($resultado3>0) {
                                        $class_td = 'success';
                                        $arrow    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td = 'danger';
                                        $arrow    = 'fa fa-arrow-down';
                                    }
                                    $utilidad = '%'.round($resultado3);
                                }else{
                                    $utilidad = '';
                                    $class_td = '';
                                }
                            ?>
                            <br>
                            <label class="btn btn-<?=$class_td?> btn-xs"> <i class="<?=$arrow?>"></i> Utilidad: <span class="badge"><?=$utilidad?></span></label>
                            <br>
                            <?
                                if(!empty($product->costo) && !empty($product->peso)){
                                    $costo_gramoz = $product->peso / 1000 * 5;
                                    $costo_gramo3 = round($usd_to_mxn * $costo_gramoz,2);
                                    $pc_iva_z = $product->costo * $cny_to_mxn;
                                    $costo_mas_iva_z = round($con_iva_cny = $pc_iva_z + (16*($pc_iva_z/100)),2);
                                    $costo_iva_envio = $costo_mas_iva_z + $costo_gramo3;
                                    $resultado_env1 = $product->precio_distribuidor - $costo_iva_envio;
                                    $resultado_env2 = $resultado_env1 / $costo_iva_envio;
                                    $resultado_env3 = $resultado_env2 * 100;
                                    if($resultado_env3>=0) {
                                        $class_td2 = 'success';
                                        $arrow2    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td2 = 'danger';
                                        $arrow2    = 'fa fa-arrow-down';
                                    }
                                     $utilidad2 = '%'.round($resultado_env3);
                                }
                                if(!empty($product->costo) and !empty($product->peso) and !empty($utilidad2)){
                                    echo '<label class="btn btn-'.$class_td2.' btn-xs"> <i class="'.$arrow2.'"></i> U. Envío: <span class="badge">'.$utilidad2.'</span></label>';
                                }

                            }
                            
                            ?>

                        </td>

                        <td style="width:6.2%;" class="text-center text_rojo ">
<a onclick="window.open('<?=base_url()?>ed/producto/t50/<?=$product->products_id?>?rnd=<?=md5(time())?>', '_blank', 'width=200,height=100,scrollbars=no,status=no,resizable=no,screenx=500,screeny=500');" href="javascript:void(0);">Editar</a>

                            <?
                            if(!empty($product->precio_4)){
                                echo '$'.number_format($product->precio_4);

                            
                            if(!empty($product->costo_nacional)){

                                $resultado1 = $product->precio_4 - $product->costo_nacional;
                                    $resultado2 = $resultado1 / $product->costo_nacional;
                                    $resultado3 = $resultado2 * 100;
                                    if($resultado3>0) {
                                        $class_td = 'success';
                                        $arrow    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td = 'danger';
                                        $arrow    = 'fa fa-arrow-down';
                                    }
                                    $utilidad = '%'.round($resultado3);

                                    ?>
                                    <label class="btn btn-<?=$class_td?> btn-xs"> <i class="<?=$arrow?>"></i> Utilidad: <span class="badge"><?=$utilidad?></span></label>
                                    <br>
                                    <?

                            }else{

                                
                                if(!empty($product->costo)){
                                    $pc_iva2 = $product->costo * $cny_to_mxn;
                                    $con_iva_cny2 = $pc_iva2 + (16*($pc_iva2/100));
                                    $resultado1 = $product->precio_4 - $con_iva_cny2;
                                    $resultado2 = $resultado1 / $con_iva_cny2;
                                    $resultado3 = $resultado2 * 100;
                                    if($resultado3>0) {
                                        $class_td = 'success';
                                        $arrow    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td = 'danger';
                                        $arrow    = 'fa fa-arrow-down';
                                    }
                                    $utilidad = '%'.round($resultado3);
                                }else{
                                    $utilidad = '';
                                    $class_td = '';
                                }
                            ?>
                            <br>
                            <label class="btn btn-<?=$class_td?> btn-xs"> <i class="<?=$arrow?>"></i> Utilidad: <span class="badge"><?=$utilidad?></span></label>
                            <br>
                            <?
                                if(!empty($product->costo) && !empty($product->peso)){
                                    $costo_gramoz = $product->peso / 1000 * 5;
                                    $costo_gramo3 = round($usd_to_mxn * $costo_gramoz,2);
                                    $pc_iva_z = $product->costo * $cny_to_mxn;
                                    $costo_mas_iva_z = round($con_iva_cny = $pc_iva_z + (16*($pc_iva_z/100)),2);
                                    $costo_iva_envio = $costo_mas_iva_z + $costo_gramo3;
                                    $resultado_env1 = $product->precio_4 - $costo_iva_envio;
                                    $resultado_env2 = $resultado_env1 / $costo_iva_envio;
                                    $resultado_env3 = $resultado_env2 * 100;
                                    if($resultado_env3>=0) {
                                        $class_td2 = 'success';
                                        $arrow2    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td2 = 'danger';
                                        $arrow2    = 'fa fa-arrow-down';
                                    }
                                     $utilidad2 = '%'.round($resultado_env3);
                                }
                                if(!empty($product->costo) and !empty($product->peso) and !empty($utilidad2)){
                                    echo '<label class="btn btn-'.$class_td2.' btn-xs"> <i class="'.$arrow2.'"></i> U. Envío: <span class="badge">'.$utilidad2.'</span></label>';
                                }

                            }
                            
                        }

                            
                            ?>
                        </td>

                        <td style="width:6.2%;" class="text-center text_rojo ">
<a onclick="window.open('<?=base_url()?>ed/producto/t100/<?=$product->products_id?>?rnd=<?=md5(time())?>', '_blank', 'width=200,height=100,scrollbars=no,status=no,resizable=no,screenx=500,screeny=500');" href="javascript:void(0);">Editar</a>

                            <?
                            if(!empty($product->precio_5)){
                                echo '$'.number_format($product->precio_5);

                            
                            if(!empty($product->costo_nacional)){

                                $resultado1 = $product->precio_5 - $product->costo_nacional;
                                    $resultado2 = $resultado1 / $product->costo_nacional;
                                    $resultado3 = $resultado2 * 100;
                                    if($resultado3>0) {
                                        $class_td = 'success';
                                        $arrow    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td = 'danger';
                                        $arrow    = 'fa fa-arrow-down';
                                    }
                                    $utilidad = '%'.round($resultado3);

                                    ?>
                                    <label class="btn btn-<?=$class_td?> btn-xs"> <i class="<?=$arrow?>"></i> Utilidad: <span class="badge"><?=$utilidad?></span></label>
                                    <br>
                                    <?

                            }else{

                                
                                if(!empty($product->costo)){
                                    $pc_iva2 = $product->costo * $cny_to_mxn;
                                    $con_iva_cny2 = $pc_iva2 + (16*($pc_iva2/100));
                                    $resultado1 = $product->precio_5 - $con_iva_cny2;
                                    $resultado2 = $resultado1 / $con_iva_cny2;
                                    $resultado3 = $resultado2 * 100;
                                    if($resultado3>0) {
                                        $class_td = 'success';
                                        $arrow    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td = 'danger';
                                        $arrow    = 'fa fa-arrow-down';
                                    }
                                    $utilidad = '%'.round($resultado3);
                                }else{
                                    $utilidad = '';
                                    $class_td = '';
                                }
                            ?>
                            <br>
                            <label class="btn btn-<?=$class_td?> btn-xs"> <i class="<?=$arrow?>"></i> Utilidad: <span class="badge"><?=$utilidad?></span></label>
                            <br>
                            <?
                                if(!empty($product->costo) && !empty($product->peso)){
                                    $costo_gramoz = $product->peso / 1000 * 5;
                                    $costo_gramo3 = round($usd_to_mxn * $costo_gramoz,2);
                                    $pc_iva_z = $product->costo * $cny_to_mxn;
                                    $costo_mas_iva_z = round($con_iva_cny = $pc_iva_z + (16*($pc_iva_z/100)),2);
                                    $costo_iva_envio = $costo_mas_iva_z + $costo_gramo3;
                                    $resultado_env1 = $product->precio_5 - $costo_iva_envio;
                                    $resultado_env2 = $resultado_env1 / $costo_iva_envio;
                                    $resultado_env3 = $resultado_env2 * 100;
                                    if($resultado_env3>=0) {
                                        $class_td2 = 'success';
                                        $arrow2    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td2 = 'danger';
                                        $arrow2    = 'fa fa-arrow-down';
                                    }
                                     $utilidad2 = '%'.round($resultado_env3);
                                }
                                if(!empty($product->costo) and !empty($product->peso) and !empty($utilidad2)){
                                    echo '<label class="btn btn-'.$class_td2.' btn-xs"> <i class="'.$arrow2.'"></i> U. Envío: <span class="badge">'.$utilidad2.'</span></label>';
                                }

                            }
                            
                        }

                            
                            ?>
                        </td>

                        <td>
<a onclick="window.open('<?=base_url()?>ed/producto/t1000/<?=$product->products_id?>?rnd=<?=md5(time())?>', '_blank', 'width=200,height=100,scrollbars=no,status=no,resizable=no,screenx=500,screeny=500');" href="javascript:void(0);">Editar</a>

                            <?
                            if(!empty($product->precio_6)){
                                echo '$'.number_format($product->precio_6);

                            
                            if(!empty($product->costo_nacional)){

                                $resultado1 = $product->precio_6 - $product->costo_nacional;
                                    $resultado2 = $resultado1 / $product->costo_nacional;
                                    $resultado3 = $resultado2 * 100;
                                    if($resultado3>0) {
                                        $class_td = 'success';
                                        $arrow    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td = 'danger';
                                        $arrow    = 'fa fa-arrow-down';
                                    }
                                    $utilidad = '%'.round($resultado3);

                                    ?>
                                    <label class="btn btn-<?=$class_td?> btn-xs"> <i class="<?=$arrow?>"></i> Utilidad: <span class="badge"><?=$utilidad?></span></label>
                                    <br>
                                    <?

                            }else{

                                
                                if(!empty($product->costo)){
                                    $pc_iva2 = $product->costo * $cny_to_mxn;
                                    $con_iva_cny2 = $pc_iva2 + (16*($pc_iva2/100));
                                    $resultado1 = $product->precio_6 - $con_iva_cny2;
                                    $resultado2 = $resultado1 / $con_iva_cny2;
                                    $resultado3 = $resultado2 * 100;
                                    if($resultado3>0) {
                                        $class_td = 'success';
                                        $arrow    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td = 'danger';
                                        $arrow    = 'fa fa-arrow-down';
                                    }
                                    $utilidad = '%'.round($resultado3);
                                }else{
                                    $utilidad = '';
                                    $class_td = '';
                                }
                            ?>
                            <br>
                            <label class="btn btn-<?=$class_td?> btn-xs"> <i class="<?=$arrow?>"></i> Utilidad: <span class="badge"><?=$utilidad?></span></label>
                            <br>
                            <?
                                if(!empty($product->costo) && !empty($product->peso)){
                                    $costo_gramoz = $product->peso / 1000 * 5;
                                    $costo_gramo3 = round($usd_to_mxn * $costo_gramoz,2);
                                    $pc_iva_z = $product->costo * $cny_to_mxn;
                                    $costo_mas_iva_z = round($con_iva_cny = $pc_iva_z + (16*($pc_iva_z/100)),2);
                                    $costo_iva_envio = $costo_mas_iva_z + $costo_gramo3;
                                    $resultado_env1 = $product->precio_6 - $costo_iva_envio;
                                    $resultado_env2 = $resultado_env1 / $costo_iva_envio;
                                    $resultado_env3 = $resultado_env2 * 100;
                                    if($resultado_env3>=0) {
                                        $class_td2 = 'success';
                                        $arrow2    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td2 = 'danger';
                                        $arrow2    = 'fa fa-arrow-down';
                                    }
                                     $utilidad2 = '%'.round($resultado_env3);
                                }
                                if(!empty($product->costo) and !empty($product->peso) and !empty($utilidad2)){
                                    echo '<label class="btn btn-'.$class_td2.' btn-xs"> <i class="'.$arrow2.'"></i> U. Envío: <span class="badge">'.$utilidad2.'</span></label>';
                                }

                            }
                            
                        }

                            
                            ?>
                        </td>
                       
                    </tr>


                    <? endforeach?>

                    <? endforeach?>

                    </tbody>


                </table>
        </div>
        

     

          
    </table>


            
            
            
            
            
            
            
     
            
            
            
            
            
            
            
            
            
        </div>



        
        
        
        
  

        












</div>

    
    
    <div style="display:none;">
        <a id="ver_pago" class="fancybox" data-fancybox-type="iframe" href="<?=base_url()?>pago"></a>
    </div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display:none;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">...</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      
    </div>
  </div>
</div>

<div class="modal fade" id="boletinModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display:none;">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Suscríbete a nuestro boletín</h4>
      </div>
      <div class="modal-body">
        
            <div class="input-group">
              <input id="correo_boletin2" type="text" class="form-control" placeholder="Email" >
              <span class="input-group-btn">
                <button id="validar_mail2" class="btn btn-default" type="button">Suscribirse</button>
              </span>
            </div>

        <div id="boletin_status" role="alert" class="alert fade in" style="display:none;margin-top:10px;">
          <span id="boletin_msg"></span>
        </div>

      </div>
      
    </div>
  </div>
</div>




    
    <script src="/mayoreo/assets/js/jquery-1.11.3.min.js"></script>
    <script src="/mayoreo/assets/js/jquery-ui.min.js"></script>
    <script src="/mayoreo/assets/js/jquery.print.js"></script>
    <script src="/mayoreo/assets/js/jquery.fancybox.js"></script>
    <script src="/mayoreo/assets/js/jquery.currency.js"></script>
    <script src="/mayoreo/assets/bootstrap3/js/bootstrap.js"></script>
    <script src="/mayoreo/assets/js/jquery.sticky.js"></script>
    <script src="/mayoreo/assets/js/mayoreov8.js"></script>
    <script type="text/javascript">

    $(function(){

        $('#header').sticky({ topSpacing: 0 });

        $('[data-toggle="tooltip"]').tooltip();

        var hash = window.location.hash.substr(1);
        //console.log(type);
        if(hash == 'boletin'){
            $('#boletinModal').modal({
                backdrop: 'static',
                keyboard: false
            });
            $('#boletinModal').modal('show');
            $('#validar_mail2').click(function() {
                var correo_boletin = $('#correo_boletin2').val();
                var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;

                if (regex.test(correo_boletin.trim())) {
                    $.ajax({

                        cache: false,
                        method: 'POST',
                        dataType: 'json',
                        data: 'email=' + correo_boletin,
                        url: '/mayoreo/boletin/validar/?cb=' + cacheBusterGeneral,

                    }).done(function(email_response) {
                        
                        if(email_response.code=='1'){
                            $('#boletin_status').removeClass('alert-danger');
                            $('#boletin_status').addClass('alert-success');
                        }else{
                            $('#boletin_status').removeClass('alert-success');
                            $('#boletin_status').addClass('alert-danger');
                        }

                        $('#boletin_msg').html(email_response.msg);
                        $('#boletin_status').show();

                    });
                } else {
                    $('#boletin_status').removeClass('alert-success');
                    $('#boletin_status').addClass('alert-danger');
                    $('#boletin_msg').html('<i class="glyphicon glyphicon-warning-sign"></i> Formato de correo invalido.');
                    $('#boletin_status').show();
                }

            });
        }

    });

    </script>

</body>
    

</html>