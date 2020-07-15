<?

ini_set("display_errors", "1");

error_reporting(E_ALL);

?>

<!doctype html>



<head>

    

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    

    <title>Massive Pc - Mayorista en equipo de cómputo</title>



    <META name="description" content="Venta de tablets, celulares, relojes inteligentes, guadalajara" />

    <META name="keywords" content="Tablet, Tablets, Mayoreo guadalajara, Tablets baratas guadalajara, celulares economicos guadalajara, electronicos baratos guadalajara, joinet guadalajara, massive pc guadalajara, celulares, tabletas, Antenas, Espía, " />

    <link href="<?=base_url()?>assets/css/stylev4.css" rel="stylesheet" type="text/css">

    <link href="<?=base_url()?>assets/css/jquery.fancybox.css" rel="stylesheet" type="text/css">

    <link href="/css/jquery-ui.css" rel="stylesheet" type="text/css">

    <link href="<?=base_url()?>assets/bootstrap3/css/bootstrap.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" >

    <link rel="stylesheet" href="<?=base_url()?>assets/css/themes/default/default.css" type="text/css" media="screen" />

    <link rel="stylesheet" href="<?=base_url()?>assets/css/nivo-slider.css" type="text/css" media="screen" />

    

    <script>

        var base_path='/mayoreo/';

    </script>

        

    <script type="text/javascript">

    

      var _gaq = _gaq || [];

      _gaq.push(['_setAccount', 'UA-64096462-1']);

      _gaq.push(['_trackPageview']);

    

      (function() {

        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;

        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';

        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);

      })();

    

    </script>



    <style type="text/css">

        html body.modal-open div#myModal.modal.fade.in div.modal-backdrop{

            position: fixed;

        }

        html,body{

            /*overflow-x:hidden;*/

            /*background: url(https://www.massivepc.com/mayoreo/assets/img/bg.gif?aaaa=bbbb) repeat;*/

        }

        .container{

            padding:0px;

        }

    </style>



    



</head>

<body>



<div id="fb-root"></div>

<script>(function(d, s, id) {

  var js, fjs = d.getElementsByTagName(s)[0];

  if (d.getElementById(id)) return;

  js = d.createElement(s); js.id = id;

  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.3";

  fjs.parentNode.insertBefore(js, fjs);

}(document, 'script', 'facebook-jssdk'));</script>







<div id="wrapper_carrito">

    <button class="btn btn-primary detalle_total" type="button">

        <i class="glyphicon glyphicon-shopping-cart"></i> Carrito de compras 

    </button>

 

</div>

<div id="dialog_boletin" title="Error!">

    <p><span class="ui-icon ui-icon-alert"></span>La direccion de correo no es valida.</p>

</div>



<div id="dialog_articulo">
</div>


<div class="container">

        <table id="table1">

            <tr>

                <td>

                    <a id="logo_link" href="http://www.massivepc.com" target="_blank"><img src="<?=base_url()?>Logo-Massive-Mayoreo.png" alt="Massivepc Mayoreo"></a>

                    <a id="logo_link_joinet" href="http://www.joinet.com" target="_blank"><img src="<?=base_url()?>Logo-Joinet_Mayoreo.png?tme=2" alt="Joinet"></a>

                </td>

                <td id="td300">

                    <span><br> 

                        Suscríbete a nuestro boletín para <br>obtener promociones especiales<br>

                    </span>

                    <form id="inscription_newsletter" style="border:0" name="inscription_newsletter" >

                        <div class="input-group">

                          <input id="correo_boletin" type="text" class="form-control input-sm" placeholder="Email" style="width:200px;">

                          <span class="input-group-btn">

                            <button id="validar_mail" class="btn btn-default btn-sm" type="button">Suscribirse</button>

                          </span>

                        </div>

                        <input name="newsletter_invite" type="hidden" value="1">

                    </form>



                </td>

            </tr>

            <tr>

                <td style="padding-right:46px;" class="text-right" colspan="2">

                    <a target="_blank" href="https://www.facebook.com/MassivePCcom?_rdr=p"><img src="<?=base_url()?>assets/img/facebook.png?df=fd"></a>

                    <a target="_blank" href="https://twitter.com/massivepcmx"><img src="<?=base_url()?>assets/img/twitter.png?df=fd"></a>

                    <div class="fb-like" data-href="https://www.facebook.com/MassivePCcom" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>

                </td>

            </tr>

            <tr>

                <td colspan="2">

                    <h3 class="titulos_lista">Lista de precios de Mayoreo</h3>

                </td>

            </tr>

        </table>





        <span id="wrapper_telefono_horario"><span class="glyphicon glyphicon-phone-alt"></span> <strong>Teléfono:</strong> 01 (33) 3613-4587 - <span class="glyphicon glyphicon-time"></span> <strong>Horario:</strong> Lunes a Sábado 10:30 am – 7:30 pm, Domingo 10:30 am - 6:30 pm</span>

        

        <?

            $dias   =array( "Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");

            $meses  =array( "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

            $fecha  =$dias[date( 'w')]. " ".date( 'd'). " de ".$meses[date( 'n')-1]. " del ".date( 'Y');

            date_default_timezone_set('America/Mexico_City');

            echo '<span id="last_update">Última actualización: '.$fecha. ' - '.date('h:i:s a').'</span>';

            $script_tz = date_default_timezone_get();





        ?>

        <br>

        

        <!--<div class="slider-wrapper theme-default" style="width:531px; height:143px; margin:auto;">

            <div id="slider" class="nivoSlider">

                <img src="https://www.massivepc.com/baners/281c6-nuevos02.jpg">

                <img src="https://www.massivepc.com/baners/f1791-nuevos01.jpg">

                <img src="https://www.massivepc.com/baners/7eb60-nuevos00.jpg">

            </div>

        </div><br><br>-->



    <a target="_blank" href="https://www.massivepc.com/mayoreo">

        <img id="img_principal" class="img-responsive" src="<?=base_url()?>assets/img/productos-joinet.png?ssss=tttt" />

    </a>

    <br><br>

    <h5 class="text-center" style="text-decoration: underline;"><a href="<?=base_url()?>?cb=<?=md5(time()*666)?>">Para actualizar la página presione <b>Shift + F5</b></a></h5>

    

<br>

        <? /*<ul id="banners">

            <? /*foreach($banners as $banner):?>

            <li>

                <a target="_blank" href="<?=$banner->link?>">

                    <img alt="" src="<?=base_url()?>banners/<?=$banner->banner?>"/>

                </a>

            </li>

            <? endforeach?>

           

        </ul>

        

        <div class="slider-wrapper theme-default" style="border:solid thin #000;">

            <div id="slider" class="nivoSlider">

                <img src="<?=base_url()?>assets/uploads/slider/1_drone.jpg" alt="" />

                <img src="<?=base_url()?>assets/uploads/slider/2_j13qc.jpg" alt="" />

                <img src="<?=base_url()?>assets/uploads/slider/3_j90qc.jpg" alt="" />

                <img src="<?=base_url()?>assets/uploads/slider/4_jbox.jpg" alt="" />

                <img src="<?=base_url()?>assets/uploads/slider/5_jgamer.jpg" alt="" />

                <img src="<?=base_url()?>assets/uploads/slider/6_jmobile.jpg" alt="" />

                <img src="<?=base_url()?>assets/uploads/slider/7_jpocket.jpg" alt="" />

            </div>

        </div>

        

        <div style="clear:both;"></div>

        <br><br> */?>

        

        

        

        

        <div style="clear:both;"></div>

        

        <br><br>

        <div id="seleccion">

            <!--<tr>-->

                <table id="listado_productos" class="table table-bordered table-hover" style="background:#fff;">

                    <thead>

                        <tr>

                            <th class="text-center">CODIGO</th>

                            <? /*<th class="text-center">MODELO</th> */?>

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

                        <?php /*?><td class="text-center">

                            <? if(!empty($product->products_model)){ echo ucfirst(mb_strtolower($product->products_model)); }else{ echo 'N/A'; }?>

                        </td><?php */?>

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

                            <?
                                if($product->products_id == '8439'){
                                    echo '271';
                                }elseif($product->products_id == '8437'){
                                    echo '234';
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



                                if($product->sae_exist <= '0'){

                                        ?>

                                           <input class="form-control input-sm cantidad" type="text" placeholder="Cantidad" disabled/>

                                           <a href="#" class="btn btn-xs btn-primary disabled">Agregar</a>

                                            <?

                                    }else{

                                        ?>

                                      <input class="form-control input-sm cantidad" type="text" data-exist="<?=$product->sae_exist?>" placeholder="Cantidad" />

                                       <a href="#" data-id="<?=$product->products_id?>" data-exist="<?=$product->sae_exist?>" data-imagen="<?=$product->products_image?>" data-price="<?=$con_iva?>" data-mayoreo="<?=$product->precio_mayoreo?>" data-distribuidor="<?=$product->precio_distribuidor?>" data-name="<?=url_title($product->products_name,' ',FALSE)?>" class="btn btn-xs btn-primary new_add">Agregar</a>

                                        <?

                                    }



                                

                                    

                                }else{



                                    if($product->products_id == '13565'){

                                        ?>

                                      <input class="form-control input-sm cantidad" type="text" data-exist="<?=$product->sae_exist?>" placeholder="Cantidad" />

                                       <a href="#" data-id="<?=$product->products_id?>" data-exist="<?=$product->sae_exist?>" data-imagen="<?=$product->products_image?>" data-price="<?=$con_iva?>" data-mayoreo="<?=$product->precio_mayoreo?>" data-distribuidor="<?=$product->precio_distribuidor?>" data-name="<?=url_title($product->products_name,' ',FALSE)?>" class="btn btn-xs btn-primary new_add">Agregar</a>

                                        <?

                                    }else{



                                        if($product->sae_exist <= '3'){

                                            ?>

                                           <input class="form-control input-sm cantidad" type="text" placeholder="Cantidad" disabled/>

                                           <a href="#" class="btn btn-xs btn-primary disabled">Agregar</a>

                                            <?

                                        }else{

                                            ?>

                                          <input class="form-control input-sm cantidad" type="text" data-exist="<?=$product->sae_exist?>" placeholder="Cantidad" />

                                           <a href="#" data-id="<?=$product->products_id?>" data-exist="<?=$ex?>" data-imagen="<?=$product->products_image?>" data-price="<?=$con_iva?>" data-mayoreo="<?=$product->precio_mayoreo?>" data-distribuidor="<?=$product->precio_distribuidor?>" data-name="<?=url_title($product->products_name,' ',FALSE)?>" class="btn btn-xs btn-primary new_add">Agregar</a>

                                            <?

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

        

        <br>

        <div id="impr_btn">

            <a class="btn btn-primary" onclick="$('#listado_productos').print()">Imprimir Lista</a>

        </div>

        <br>

        <h3 class="titulos_lista">Historial de Solo Ofertas Guadalajara</h3>

        <ul id="solo_ofertas" class="list-unstyled">

            <? foreach($solo_ofertas as $ofertas):?>

                <li> <a target="_blank" href="<?=base_url()?>assets/uploads/solo_ofertas/<?=$ofertas->imagen?>"> <?=$ofertas->nombre?> </a> </li>

            <? endforeach?>

        </ul>

<div style="clear:both;"></div>

        <style>

            

        </style>

        <h3 class="titulos_lista">Historial de boletines</h3>

        <div class="container">



            <div class="row">

                <div class="col-md-2"></div>

                <div class="col-md-2">

            <ul class="list-unstyled">

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_jwatchu9.html">Jwatch u9</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_decofeb.html">Decodificador coby</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_jpadtv.html">Jpad tv</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_movistar.html">Chips Movistar</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_decodificador_iviwe.html">Decodificador iviwe</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_jscooter.html">Jscooter</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_decodificador_coby.html">Decodificador coby</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_soloofertas.html">Solo ofertas</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_feliz_navidad.html">Feliz navidad</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_navidad_drones.html">Navidrone</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_drones_profesionales.html">Drones profesionales</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_estereos.html">Autoestéreos</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_drones.html">Drones</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_buenfin.html">Buen fin</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_bocina_portatil.html">Bocina portatil joinet</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_monopod.html">Monopod joinet</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_ventilador_joinet.html">Ventilador luminoso</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_powerbank79.html">Power bank joinet</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_bocina_karaoke.html">Bocina karaoke</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_quadcopter_planet.html">Quadcopter</a></li>

            </ul>

        </div>

        <div class="col-md-2">

            <ul class="list-unstyled">

            <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_jpocketplus.html">Jpocket plus</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_note4.html">Note 4</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_jmobile_quad_core.html">Jmobile quad core</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_kimtigo.html">Memorias kimtigo</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_j5quadcore.html">J5 quad core</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_control_xbox_one.html">Xbox one control</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_iguy.html">Funda iguy</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_jwatch.html">Jwatch</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_j13dual+.html">Boletín j13 dual +</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_lampara_swan.html">Lampara swan</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_foco_giratorio.html">Foco giratorio</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_laser.html">Apuntador laser</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_m8.html">Tv box 4k</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_bocinaportatil.html">Bocina portatil</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_ezcast.html">Ezcast</a></li>

                 <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_cristal_templado.html">Cristal templado</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_audifonos_joinet.html">Audífonos joinet</a></li> 

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_jpocket4.html">Jpocket 4</a></li>

            </ul>

        </div>

        <div class="col-md-2">

            <ul class="list-unstyled">

            <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_bocina_joinet.html">Bocina joinet</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_10tn.html">10 tn</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/j13quadcore.htm">J13 quad core!</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_mp3.html">Mp3 joinet</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_base_enfriadora_m19.html">Base enfriadora m19</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_wintel.html">Wintel</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_estafeta.html">Guías prepagadas de estafeta</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_s6.html">Android S6</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_alfa.html">Antena alfa</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_bocinas.html">Bocinas con agua danzantes</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_quadcopter.html">Quad copter</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_smartwatch.html">Smart watch</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_powerbank.html">Power bank</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_s6.html">Android s6</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_i6plus.html">i6 plus</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_jwatchv8.html">Jwatch v8</a></li>

            </ul>

        </div>

        <div class="col-md-2">

            <ul class="list-unstyled">

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_noisy.html">J13qc noisy</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_j13dualcore.html">Boletín j13 dual core</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_refacciones.html">Refacciones para tablets</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_focos.html">Focos de led joinet</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_telcel.html">Chips telcel</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_ergostand.html">Base enfriadora</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_bocina_links.html">Bocinas links bits</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_jgamers.html">Jgamers quad core</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_jpocket.html">Jpocket</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_j90.html">J90 quad core</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_fundasconteclado.html">Fundas con teclado</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_fundas_silicon.html">Fundas de silicón</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_cristal.html">Cristal templado</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_case_motomo.html">Cases iphone 6</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_focos_led.html">Foco de led mp3</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_repetidor_wifi.html">Repetidor wifi</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_robot.html">Robot</a></li>

                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_smartlife.html">Smartlife</a></li>

            </ul>

        </div>

        </div>



        </div>

        <div style="clear:both;"></div>

                <br><br>

        <div class="container bs-docs-container">

            <div class="row">

                <div class="col-md-12">

                    <iframe class="mapa" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7465.758697288053!2d-103.347232!3d20.674487!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x195b5fdea7d0a86c!2sJoinet!5e0!3m2!1ses-419!2smx!4v1429721102063" width="100%" height="300" ></iframe>

                </div>

            </div>

        </div>

        <br>



  <div class="container bs-docs-container">

            <div class="row">

                <div class="col-md-3 text-center">

                    <img class="img-thumbnail img-responsive" src="<?=base_url()?>assets/img/baner1.jpg" alt="" />

                </div>

                <div class="col-md-3 text-center">

                    <img class="img-thumbnail img-responsive" src="<?=base_url()?>assets/img/baner2.jpg" alt="" />

                </div>

                <div class="col-md-3 text-center">

                    <img class="img-thumbnail img-responsive" src="<?=base_url()?>assets/img/baner3.jpg" alt="" />

                </div>

                <div class="col-md-3 text-center">

                    <img class="img-thumbnail img-responsive" src="<?=base_url()?>assets/img/baner4.jpg" alt="" />

                </div>

            </div>

                <br>

            <div class="row">

                <div class="col-md-3 text-center">

                    <img class="img-thumbnail img-responsive" src="<?=base_url()?>assets/img/baner5.jpg" alt="" />

                </div>

                <div class="col-md-3 text-center">

                    <img class="img-thumbnail img-responsive" src="<?=base_url()?>assets/img/baner6.jpg" alt="" />

                </div>

                <div class="col-md-3 text-center">

                    <img class="img-thumbnail img-responsive" src="<?=base_url()?>assets/img/baner7.jpg" alt="" />

                </div>

                <div class="col-md-3 text-center">

                    <img class="img-thumbnail img-responsive" src="<?=base_url()?>assets/img/baner8.jpg" alt="" />

                </div>

            </div>

        </div>



        <br>

        <div class="container bs-docs-container">

            <div class="row">

                <div class="col-md-12 text-center">

                    <img class="img-thumbnail img-responsive" src="<?=base_url()?>assets/img/parabus02.jpg" />

                </div>

            </div>

        </div>



          <br>

          

    </table>



    <div class="container bs-docs-container">

        <div class="row">





                <div class="col-md-4">



                    <div class="panel panel-info h_190">

                      <div class="panel-heading">

                        <h3 class="panel-title"><i class="fa fa-street-view"></i> Domicilio</h3>

                      </div>

                      <div class="panel-body">

                        <address>

                            Av.16 de Septiembre No. 137<br>

                            (Frente a la Plaza de la Tecnología)<br>

                            Entre Av.Júarez y López Cotilla<br>

                            Guadalajara Centro<br>

                            Jalisco, México

                        </address>

                      </div>

                    </div>



                </div>



                <div class="col-md-4">



                    <div class="panel panel-info h_190">

                      <div class="panel-heading">

                        <h3 class="panel-title"><i class="glyphicon glyphicon-phone-alt"></i> Contacto</h3>

                      </div>

                      <div class="panel-body">

                        <table>

                            <tr>

                                <td></td>

                                <td class="text-left"><strong>Teléfono:</strong></td>

                                <td>&nbsp;01 (33) 3613-4587</td>

                            </tr>

                            <tr>

                                <td></td>

                                <td class="text-left"><strong>Horario:</strong></td>

                                <td>&nbsp;Lunes a Sábado 10:30 am – 7:30 pm, Domingo 10:30 am - 6:30 pm</td>

                            </tr>

                            <tr>

                                <td></i></td>

                                <td class="text-left"><strong>Email:</strong></td>

                                <td>&nbsp;<a href="mailto:mayoreo@massivepc.com">mayoreo@massivepc.com</a></td>

                            </tr>

                        </table>

                      </div>

                    </div>



                </div>



                <div class="col-md-4">



                    <div class="panel panel-info h_190">

                      <div class="panel-heading">

                        <h3 class="panel-title"><i class="fa fa-whatsapp"></i> Contacto personalizado</h3>

                      </div>

                      <div class="panel-body">

                        

                            <div class="row">

                               <div class="col-md-6">

                                    <ul class="f-sm text-center list-unstyled">
                                        <li>333440-0228<small><strong>Sergio</strong></small></li>
                                        <li>331928-5987<small><strong>David</strong></small></li>
                                        <li>331572-9242<small><strong>Julio</strong></small></li>
                                        <li>331880-6404<small><strong>Tania</strong></small></li>
                                        <li>331367-9354<small><strong>Luis</strong></small></li>
                                        <li>332012-6743<small><strong>Enrique</strong></small></li>
                                    </ul>

                                </div>

                                <div class="col-md-6">

                                    <ul class="f-sm text-center list-unstyled">
                                        <li>331918-0281<small><strong>Rebeca</strong></small></li>
                                        <li>331584-8058<small><strong>Refugio</strong></small></li>
                                        <li>331154-0005<small><strong>Rafael</strong></small></li>
                                        <li>331950-5056<small><strong>Juan Pablo</strong></small></li>
                                        <li>331176-3227<small><strong>Josefina</strong></small></li>
                                        <li>331054-8840<small><strong>Alan</strong></small></li>
                                    </ul>

                                </div>

                                <!--<div class="col-md-4">

                                    <ul class="f-sm text-center list-unstyled">

                                        

                                    </ul>

                                </div>-->

                                </div>

                            <!--<tr>

                                <td colspan="2">

                                    

                                    <div class="media">

                                      <div class="media-body">

                                        También por

                                      </div>

                                      <div class="media-right">

                                        <img src="<?=base_url()?>assets/img/whatsapp-logo.png"/>

                                      </div>

                                    </div>

                                    

                                </td>

                            </tr>-->

                                

                            

                           

                            

                        </div>

                      </div>

                    </div>



                </div>





            </div>

            

            

            

            

            

            

            

            

            <!--Envios-Garantias-creditos-->

            <div class="container bs-docs-container">

        <div class="row">





                <div class="col-md-4">



                    <div class="panel panel-info m-h-225">

                      <div class="panel-heading">

                        <h3 class="panel-title"><i class="fa fa-truck"></i> Envíos</h3>

                      </div>

                      <div class="panel-body">

                        



                        <ul style="padding:0 0 0 13px; margin:0px;">

                            <li>Envíos a toda la república Mexicana por DHL $120 pesos hasta 10 Kg.</li>

                            <li>Tiempo de entrega de 1 a 5 días dependiendo el destino.</li>

                            <li>No manejamos envíos exprés.</li>

                        </ul>

                        <div class="row">

                            <div class="col-md-12">

                                <img class="img-responsive" src="<?=base_url()?>assets/img/DHL.png?dd=87"/>

                            </div>

                        </div>

                        <span style="display:block;" class="text-right"><a target="_blank" href="http://www.massivepc.com/b_envios.php">Ver más.</a></span>

                      </div>

                    </div>



                </div>



                <div class="col-md-4">



                    <div class="panel panel-info m-h-225">

                      <div class="panel-heading">

                        <h3 class="panel-title"><i class="fa fa-list-alt"></i> Garantías</h3>

                      </div>

                      <div class="panel-body">



                        <ul style="padding:0 0 0 13px; margin:0px;">

                            <li>Todos nuestros productos cuentan con 3 meses de garantía por escrito salvo los productos de la marca Joinet que cuentan con 1 año de garantía.</li>

                        </ul>



    <div class="media">

      <div class="media-body">

        <ul style="padding:0 0 0 13px; margin:0px;">

            <li>Todas las garantías son válidas directamente con nosotros.</li>

            <li>En drones no hay garantía debido al tipo de producto y los golpes que pudiesen recibir al estarlos volado.</li>

        </ul>

      </div>

      <div class="media-right">

        <img class="media-object" style="width:70px; height:70px; margin-top:-4px;" src="<?=base_url()?>assets/img/icono-garantia.jpg">

        <span style="display:block;" class="text-right"><a target="_blank" href="http://www.massivepc.com/b_garantia.php">Ver más.</a></span>

      </div>

    </div>



                        

                        



                        

                      </div>

                    </div>



                </div>



                <div class="col-md-4">



                    <div class="panel panel-info m-h-225">

                      <div class="panel-heading">

                        <h3 class="panel-title"><i class="glyphicon glyphicon-usd"></i> Créditos</h3>

                      </div>

                      <div class="panel-body">

                        <img src="<?=base_url()?>assets/img/logo-checkplus.jpg"/><br><br>

                       <p>

                        Manejamos créditos mediante Check Plus.<br>

                        Para más información haz clic <a target="_blank" href="http://www.checkplus.com.mx/">aquí</a>.

                       </p>

                            

                        </div>

                      </div>

                    </div>



                </div>





            </div>

            <!--/Envios-Garantias-creditos-->

            

            

            

            

            

            

            

            

            

            

            

            

        </div>





  <div class="container bs-docs-container">

            <div class="row">

                <div class="col-md-12">



                    <div class="panel panel-info">

                      <div class="panel-heading">

                        <h3 class="panel-title"><i class="fa fa-credit-card"></i> Formas de pago</h3>

                      </div>

                      <div class="panel-body">



                        <div class="row">

                            <div class="col-md-12">

                                <ul>

                                    <li>Aceptamos pagos en efectivo, con tarjeta de crédito o débito en nuestro establecimiento. <img src="<?=base_url()?>assets/img/tarjetas.jpg"/></li>

                                    <li>Depósitos y transferencias bancarias en cualquiera de nuestras cuentas:</li>

                                </ul>

                            </div>

<div class="col-md-4">                                <img src="<?=base_url()?>assets/img/BAN-1.png?v=4" /><br><br>                                
<strong>BANCOMER</strong>                                <br> 
Cuenta: 0111395874                                <br> 
CLABE Interbancaria para transferencias: 0121-8000-1113-9587-49                                <br> 
A nombre de: URQUIZA Y GARCIA LOGISTICA SA DE CV
                            </div>
                            
<div class="col-md-4">                                <img src="<?=base_url()?>assets/img/logo-santander.jpg?asdsad=eee" /><br><br>                                
<strong>SANTANDER</strong>                                <br> 
Cuenta: 65-50656553-7                                <br> 
CLABE Interbancaria para transferencias: 0141-8065-5065-6553-79                                <br> 
A nombre de: URQUIZA Y GARCIA LOGISTICA SA DE CV
                            </div>		

<!--							
						
                            <div class="col-md-4">

                                <img src="<?=base_url()?>assets/img/BAN-1.png?v=4" /><br><br>

                                <strong>BANCOMER</strong>

                                <br> Cuenta: 0194258703

                                <br> CLABE Interbancaria para transferencias: 0123-2000-1942-5870-31

                                <br> A nombre de: MASSIVE PC SA DE CV

                            </div>

                            <div class="col-md-4">

                                <img src="<?=base_url()?>assets/img/logo-santander.jpg?asdsad=eee" /><br><br>

                                <strong>SANTANDER</strong>

                                <br> Cuenta: 65-50403993-5

                                <br> CLABE Interbancaria para transferencias: 0143-2065-5040-3993-55

                                <br> A nombre de: MASSIVE PC SA DE CV

                            </div>

                            <div class="col-md-4">

                                <img src="<?=base_url()?>assets/img/logo-ixe.jpg?r=c" /><br><br>

                                <strong>BANORTE / IXE</strong>

                                <br> Cuenta: 0212962231

                                <br>CLABE Interbancaria para transferencias: 0723-2000-2129-6223-18

                                <br>A nombre de: MASSIVE PC SA DE CV

                            </div>
-->								
							
							

                        </div>





                        



                      </div>

                    </div>



                </div>

            </div>

        </div>

        

        

        

        

        

        

        

        

        <div class="container bs-docs-container">

            <div class="row">

                <div class="col-md-12">

                    <div class="panel panel-info">

                      <div class="panel-heading">

                        <h3 class="panel-title"><i class="glyphicon glyphicon-shopping-cart"></i> Por qué comprar con nosotros</h3>

                      </div>

                      <div class="panel-body">

                        <ul>

                            <li>Somos una empresa establecida en la ciudad de Guadalajara con más de 5 años en el mercado y una de las mejores tiendas en línea de México.</li>

                            <li>Contamos con venta al público y online y fabricantes de nuestra marca.</li>

                            <li>Somos importadores directos (por lo que puedes acceder a los mejores precios).</li>

                            <li>Puedes consultar nuestro stock en línea.</li>

                            <li>Manejamos factura y garantía en todos nuestros productos.</li>

                        </ul>

                        <span style="display:block;" class="text-right"><a target="_blank" href="http://www.massivepc.com/b_quienessomos.php">Ver más.</a></span>

                      </div>

                    </div>

                </div>

            </div>

        </div>

        

        

        

        <div class="container bs-docs-container">

            <div class="row">

                <div class="col-md-12">

                    <div class="panel panel-info">

                      <div class="panel-heading">

                        <h3 class="panel-title"><i class="fa fa-cart-plus"></i> Como comprar</h3>

                      </div>

                      <div class="panel-body">

                        <ul>

                            <li>Agrega los productos y cantidades deseadas al carrito de compras <i class="glyphicon glyphicon-arrow-right"></i></li>

                            <li>Ingresa tus datos de envió y coloca el pedido <i class="glyphicon glyphicon-arrow-right"></i> Recibirás un correo con la confirmación.</li>

                            <li>Realiza el pago y posteriormente confírmalo enviando el comprobante de pago a <a href="mailto:ventas@massivepc.com">ventas@massivepc.com</a></li>

                            <li>Espera a recibir tu número de guía y posteriormente tú pedido.</li>

                        </ul>

                        <!--<img style=" margin: 0 auto;" class="img-responsive" src="<?=base_url()?>assets/img/como-comprar.jpg">-->

                            <ul class="list-inline" style="font-size:11px;">

                                <li class="text-center"><img src="<?=base_url()?>assets/img/icon-1.jpg"><br>Agrega los productos <br>al carrito de compras</li>

                                <li class="text-center"><img src="<?=base_url()?>assets/img/icon-2.jpg"><br>Indique la dirección de<br> entrega y confirma tu pedido</li>

                                <li class="text-center"><img src="<?=base_url()?>assets/img/icon-3.jpg"><br>Realiza y confirma <br>tu pago</li>

                                <li class="text-center"><img src="<?=base_url()?>assets/img/icon-4.jpg"><br>Tu guía y pedido son<br> enviados</li>

                                <li class="text-center"><img src="<?=base_url()?>assets/img/icon-5.jpg"><br>Garantía <br>de devolución</li>

                                <li class="text-center"><img src="<?=base_url()?>assets/img/icon-6.jpg"><br>Atención al cliente <br>por teléfono, chat o email</li>

                            </ul>

                      </div>

                    </div>

                </div>

            </div>







        <hr style="background:#D9EDF7; border:solid 1px #D9EDF7; margin-top:0px; margin-bottom:0px;">



            <div class="row">

                

                <div class="col-md-3">

                    <img src="<?=base_url()?>assets/img/paypal-icons.gif?fj=poui">

                </div>



                <div class="col-md-5" style="font-size:11px;">

                    Aceptamos pagos con Tarjetas de credito<br>

                    <a target="_blank" href="http://www.massivepc.com/b_politicas_privacidad.php">Políticas de privacidad</a>  <!--|  <a target="_blank" href="http://www.massivepc.com/b_proveedores.php">Proveedores</a>-->  |  <a target="_blank" href="http://www.massivepc.com/b_derechosdeautor.php">Derechos de autor</a> | <a target="_blank" href="http://www.massivepc.com/aviso-de-privacidad.php">Aviso de privacidad</a>  | <a target="_blank" href="http://www.massivepc.com/terminos-y-condiciones.php">Terminos y Condiciones</a> <br>

                    Todos los precios son mostrados en pesos mexicanos por default y con I.V.A.<br>

                    Copyright © 2015 Massive PC. Todos los derechos reservados.<br>

                    <?=$fecha?>. 39103190 peticiones desde viernes 07 julio, 2006<br>

                    *Precios con IVA incluido en MN sujetos a cambio sin previo aviso.<br>

                    <br>

                </div>



                <div class="col-md-2" style="padding-top:10px;">

                    <a target="_blank" href="https://sellosdeconfianza.org.mx/MuestraCertificado.php?NUMERO_SERIE=MD_t161"><img src="https://www.massivepc.com/images/sellodeconfianza.jpg"></a>

                </div>



                <div class="col-md-2 text-right">

<table width="135" border="0" cellpadding="2" cellspacing="0" title="Haga clic para verificar: este sitio elige SSL de Symantec para las comunicaciones confidenciales y el comercio electrónico seguro">

<tr>

<td width="135" align="center" valign="top"><script type="text/javascript" src="https://seal.websecurity.norton.com/getseal?host_name=www.massivepc.com&amp;size=S&amp;use_flash=NO&amp;use_transparent=NO&amp;lang=es"></script><br />

<a href="https://www.symantec.com/es/es/ssl-certificates" target="_blank"  style="color:#000000; text-decoration:none; font:bold 7px verdana,sans-serif; letter-spacing:.5px; text-align:center; margin:0px; padding:0px;">ACERCA DE LOS CERTIFICADOS SSL</a></td>

</tr>

</table>

                </div>



            </div>

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



<div id="modal_alert" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">

  <div class="modal-dialog modal-sm">

    <div class="modal-content">



      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title">Mensaje</h4>

      </div>



      <div id="content_alert" class="modal-body">

        

      </div>



      <div class="modal-footer">



      </div>



      

      

    </div>

  </div>

</div>







    <!--Start of Zopim Live Chat Script-->

    <script type="text/javascript">

        window.$zopim || (function(d, s) {

            var z = $zopim = function(c) {z._.push(c)},

                $ = z.s =d.createElement(s),

                e = d.getElementsByTagName(s)[0];

            z.set = function(o) {z.set._.push(o)};

            z._ = [];z.set._ = [];$.async = !0;

            $.setAttribute('charset', 'utf-8');

            $.src = '//v2.zopim.com/?2mmQYXaBCuLaX1EBuNcdm8NNsTN2bqU0';

            z.t = +new Date;$.type = 'text/javascript';

            e.parentNode.insertBefore($, e)

        })(document, 'script');

    </script>

    

    <script src="/mayoreo/assets/js/jquery-1.11.3.min.js"></script>

    <script src="/mayoreo/assets/js/jquery_print.js"></script>

    <script src="/mayoreo/assets/js/jquery-ui.min.js"></script>

    <script src="/mayoreo/assets/js/jquery.print.js"></script>

    <script src="/mayoreo/assets/js/jquery.fancybox.js"></script>

    <script src="/mayoreo/assets/js/jquery.currency.js"></script>

    <script src="/mayoreo/assets/bootstrap3/js/bootstrap.js"></script>

    <script src="/mayoreo/assets/js/mayoreov8_ajax.js?<?=md5(time())?>=<?=md5(time())?>"></script>

    <script src="/mayoreo/assets/js/jquery.nivo.slider.js"></script>

    <script type="text/javascript">



    $(function(){



        setTimeout(function(){

            location.href='https://www.massivepc.com/mayoreo/?cb=<?=md5(time()*666)?>';

        }, 3600000);



        $('#slider').nivoSlider();



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