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
    .modal{z-index: 200;}
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
    <button class="btn btn-primary dfsdf" type="button">
        <i class="glyphicon glyphicon-shopping-cart"></i> Carrito de compras 
    </button>
 
</div>
<div id="dialog_boletin" title="Error!">
    <p><span class="ui-icon ui-icon-alert"></span>La direccion de correo no es valida.</p>
</div>

<div id="dialog_articulo">
    
</div>


<div id="div1">
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
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <h3 class="titulos_lista">Lista de precios de Mayoreo</h3>
                </td>
            </tr>
        </table>


        <span id="wrapper_telefono_horario"><span class="glyphicon glyphicon-phone-alt"></span> <strong>Teléfono:</strong> 01 (33) 3613-4587 - <span class="glyphicon glyphicon-time"></span> <strong>Horario:</strong> Lunes a Sábado 10:30 am – 7:30 pm</span>
        
        <?
            $dias   =array( "Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
            $meses  =array( "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
            $fecha  =$dias[date( 'w')]. " ".date( 'd'). " de ".$meses[date( 'n')-1]. " del ".date( 'Y');
            echo '<span id="last_update">Última actualización: '.$fecha. '</span>';
        ?>
        <br>
        <br>
        
    <a target="_blank" href="http://www.massivepc.com/JOINET-m-297.html">
        <img id="img_principal" src="<?=base_url()?>assets/img/productos-joinet.jpg" />
    </a>
<br><br>
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
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">CODIGO</th>
                            <th class="text-center">MODELO</th>
                            <th class="text-center">DESCRIPCI&Oacute;N</th>
                            <th class="text-center">MARCA</th>
                            <th class="text-center">IMAGEN</th>
                            <th class="text-center">EXISTENCIAS</th>
                            <th class="text-center">PRECIO PUBLICO</th>
                            <th class="text-center">PRECIO MAYOREO ($5,000)</th>
                            <th class="text-center">PRECIO DISTRIBUIDOR ($10,000)</th>
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
                        <td class="text-center">
                            <? if(!empty($product->products_model)){ echo ucfirst(mb_strtolower($product->products_model)); }else{ echo 'N/A'; }?>
                        </td>
                        <td>
                            <a target="_blank" class="ml2" href="http://www.massivepc.com/-p-<?=$product->products_id?>.html">
                                <?=ucfirst(mb_strtolower($product->products_name))?>
                            </a>
                        </td>
                        <td>
                            <a target="_blank" href="http://www.massivepc.com/<?=$product->manufacturers_name?>-m-<?=$product->manufacturers_id?>.html">
                                <img alt="Fabricante" src="https://www.massivepc.com/images/<?=$product->manufacturers_image?>" height="30" width="60">
                            </a>
                        </td>
                        <td>
                            <a href="javascript:void(0);" onclick="window.open('/galeriam.php?products_id=<?=$product->products_id?>', '_blank', 'width=800,height=900,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');">
                                <img style="padding:0px; max-width:none;" class="img-thumbnail" src="https://www.massivepc.com/images/<?=$product->products_image?>" alt="" width="80px" height="80px"/> 
                            </a>
                        </td>
                        <td class="text-center">
                            <?
                                //echo $product->agotado;
                                /*if($product->agotado=='1'){
                                    echo 'Agotado';
                                }else{*/
                                    if($product->sae_exist <= '0'){
                                        //echo 'Por mostrar';
                                        echo 'Agotado';
                                    }else{
                                        echo $product->sae_exist;
                                    }
                                //} 
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
                                /*if($product->agotado=='1'){
                                    ?>
                                        <input class="form-control input-sm cantidad" type="text" placeholder="Cantidad" disabled />
                                       <a href="#" data-id="<?=$product->products_id?>" data-imagen="<?=$product->products_image?>" data-price="<?=$con_iva?>" data-mayoreo="<?=$product->precio_mayoreo?>" data-distribuidor="<?=$product->precio_distribuidor?>" data-name="<?=url_title($product->products_name,' ',FALSE)?>" class="btn btn-xs btn-primary agregar disabled">Agregar</a>
                                        <?
                                }else{*/
                                    if($product->sae_exist <= '0'){
                                        ?>
                                       <input class="form-control input-sm cantidad" type="text" placeholder="Cantidad" disabled/>
                                       <a href="#" class="btn btn-xs btn-primary disabled">Agregar</a>
                                        <?
                                    }else{
                                        ?>
                                      <input class="form-control input-sm cantidad" type="text" data-exist="<?=$product->sae_exist?>" placeholder="Cantidad" />
                                       <a href="#" data-id="<?=$product->products_id?>" data-exist="<?=$product->sae_exist?>" data-imagen="<?=$product->products_image?>" data-price="<?=$con_iva?>" data-mayoreo="<?=$product->precio_mayoreo?>" data-distribuidor="<?=$product->precio_distribuidor?>" data-name="<?=url_title($product->products_name,' ',FALSE)?>" class="btn btn-xs btn-primary dfsdf">Agregar</a>
                                        <?
                                    }
                                //} 
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
        	<a class="btn btn-primary" href="javascript:openwindow()">Imprimir Lista</a>
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
                <div class="col-md-3">
            <ul class="list-unstyled">
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_repetidor_wifi.html">Repetidor WiFi</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_bocina_joinet.html">Bocina joinet</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_jpocketplus.html">Jpocket plus</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_10tn.html">10 tn</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_note4.html">Note 4</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_jmobile_quad_core.html">Jmobile quad core</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_wintel.html">Wintel</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_base_enfriadora_m19.html">Base enfriadora m19</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_j13dualcore.html">Boletín j13 dual core</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_jwatch.html">Jwatch</a></li>
                
                
            </ul>
        </div>
        <div class="col-md-3">
            <ul class="list-unstyled">
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_j13dual+.html">Boletín j13 dual +</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_lampara_swan.html">Lampara swan</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_foco_giratorio.html">Foco giratorio</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_laser.html">Apuntador laser</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_m8.html">Tv box 4k</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_bocinaportatil.html">Bocina portatil</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_ezcast.html">Ezcast</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_refacciones.html">Refacciones para tablets</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_estafeta.html">Guías prepagadas de estafeta</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_focos.html">Focos de led joinet</a></li>
            </ul>
        </div>
        <div class="col-md-3">
            <ul class="list-unstyled">
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_alfa.html">Antena alfa</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_bocinas.html">Bocinas con agua danzantes</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_quadcopter.html">Quad copter</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_smartwatch.html">Smart watch</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_powerbank.html">Power bank</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_noisy.html">J13qc noisy</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_mp3.html">Mp3 joinet</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_kimtigo.html">Memorias kimtigo</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/j13quadcore.htm">J13 quad core!</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_telcel.html">Chips telcel</a></li>
            </ul>
        </div>
        <div class="col-md-3">
            <ul class="list-unstyled">
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
                                <td>&nbsp;Lunes a Sábado 10:30 am – 7:30 pm</td>
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
                               <div class="col-md-4">
                                    <ul class="f-sm text-center list-unstyled">
                                        <li>333440-0228<small><strong>Sergio</strong></small></li>
                                        <li>331966-9873<small><strong>David</strong></small></li>
                                        <li>331106-6729<small><strong>Luis</strong></small></li>
                                        
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                	<ul class="f-sm text-center list-unstyled">
                                    	<li>332012-6743<small><strong>Enrique</strong></small></li>
                                        <li>332012-3946<small><strong>Josefina</strong></small></li>
                                        <li>332058-1734<small><strong>Raymundo</strong></small></li>
                                	</ul>
                                </div>
                                <div class="col-md-4">
                                	<ul class="f-sm text-center list-unstyled">
                                    	<li>331918-0280<small><strong>Refugio</strong></small></li>
                                        <li>331918-0281<small><strong>Rebeca</strong></small></li>
                                        <li>331397-8690<small><strong>Imelda</strong></small></li>
                                	</ul>
                                </div>
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
                            <li>Envíos a toda la república Mexicana por DHL o Estafeta $99 pesos hasta 10 Kg.</li>
                            <li>Tiempo de entrega de 1 a 5 días dependiendo el destino.</li>
                            <li>No manejamos envíos exprés.</li>
                        </ul>
                        <div class="row">
                            <div class="col-md-12">
                                <img class="img-responsive" src="<?=base_url()?>assets/img/envios.jpg?dd=87"/>
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
                        

    <div class="media">
      <div class="media-body">
        <ul style="padding:0 0 0 13px; margin:0px;">
                            <li>Todos nuestros productos cuentan con 3 meses de garantía por escrito salvo los productos de la marca Joinet que cuentan con 1 año de garantía.</li>
                            
                        </ul>
      </div>
      <div class="media-right">
        <a href="#">
          <img class="media-object" src="<?=base_url()?>assets/img/icono-garantia.jpg">
        </a>
      </div>
    </div>

        <ul style="padding:0 0 0 13px; margin:0px;">
                            <li>Todas las garantías son válidas directamente con nosotros. <span style="display:inline-block;" class="text-right"><a target="_blank" href="http://www.massivepc.com/b_garantia.php">Ver más.</a></span></li>
                            
                        </ul>

                        
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
                        <img class="img-responsive" src="<?=base_url()?>assets/img/como-comprar.jpg">
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
                        <h3 class="panel-title"><i class="fa fa-facebook-official"></i> Sección de preguntas</h3>
                      </div>
                      <div class="panel-body">
                      
                      <div class="row">
                      	<div class="col-md-4">
                        	<div class="fb-page" data-href="https://www.facebook.com/MassivePCcom" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/MassivePCcom"><a href="https://www.facebook.com/MassivePCcom">Massive PC</a></blockquote></div></div>
                        </div>
                        <div class="col-md-8">
                        <div class="fb-comments" data-href="http://www.massivepc.com/mayoreo/" data-numposts="10" data-width="100%"></div>
                        </div>
                      </div>

                      </div>
                    </div>

                </div>
            </div>
        </div>
        
        <br>
        
        <div class="container bs-docs-container">
            <div class="row">
                <div class="col-md-12">

                *Precios con IVA incluido en MN sujetos a cambio sin previo aviso.

                <br>

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
    <script src="/mayoreo/assets/js/jquery-ui.min.js"></script>
    <script src="/mayoreo/assets/js/jquery.print.js"></script>
    <script src="/mayoreo/assets/js/jquery.fancybox.js"></script>
    <script src="/mayoreo/assets/js/jquery.currency.js"></script>
    <script src="/mayoreo/assets/bootstrap3/js/bootstrap.js"></script>
    <script src="/mayoreo/assets/js/mayoreov8_mercadopago.js"></script>

</body>
    

</html>