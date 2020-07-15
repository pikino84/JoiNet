<!doctype html>

<head>
	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>Massive Pc - Mayorista en equipo de cómputo</title>

    <meta name="description" content="Venta de tablets, celulares, relojes inteligentes, guadalajara" />
    <meta name="keywords" content="Tablet, Tablets, Mayoreo guadalajara, Tablets baratas guadalajara, celulares economicos guadalajara, electronicos baratos guadalajara, joinet guadalajara, massive pc guadalajara, celulares, tabletas, Antenas, Espía, " />

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/bootstrap3/css/bootstrap.css" >
    <link rel="stylesheet" type="text/css" href="/css/jquery-ui.css" >
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/stylev5.css" >
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/jquery.fancybox.css" >
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



	

</head>
<body>
<div id="wrapper_carrito">
	<a id="open_c" href="#">
        <span class="carrito_icon"></span>
        <strong>Carrito de compras</strong> 
        <div style="clear:both;"></div>
	</a>
        <span id="arrow_triangle"></span>
    
    
    <div id="wrapper_items">
        <div id="items"></div>
        <div id="wrapper_adicional">
        	<span class="label_d">Envío:</span> <span>$99.00</span><br>
            <span class="label_d">Precio Publico:</span> <span id="subtotal_publico"></span><br>
            <span class="label_d">Precio Mayoreo:</span> <span id="subtotal_mayoreo"></span><br>
            <span class="label_d">Precio Distribuidor:</span> <span id="subtotal_distribuidor"></span>
            <hr/>
            <strong>Total:</strong> <span id="total"></span>
        </div>
        <div id="wrapper_checkout">
            <a id="pagar" data-fancybox-type="iframe" class="btn btn-sm btn-success disabled fancybox" href="http://www.massivepc.com/mayoreo/pago">
                <strong>Cerrar pedido</strong>
                <span class="glyphicon glyphicon-menu-right"></span>
            </a>
            
        </div>
       
    </div>
</div>

<div id="boletin_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-minus-circle"></i> La direccion de correo no es valida.</h4>
      </div>
      <div class="modal-body">
        Por favor compruebe que su correo este bien escrito.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<div id="dialog_articulo">
    
</div>


    <div class="container-fluid">

        <div class="row">
          <div id="wrap_logo_massive" class="col-md-5 text-right">
                <a href="http://www.massivepc.com" target="_blank"><img src="http://www.massivepc.com/mayoreo/Logo-Massive-Mayoreo.png" alt="Massivepc Mayoreo"></a>
          </div>
          <div class="col-md-2 text-center">
            <a href="http://www.joinet.com" target="_blank"><img src="http://www.massivepc.com/mayoreo/Logo-Joinet_Mayoreo.png" alt="Joinet"></a>
          </div>
          <div class="col-md-5">

            <div class="row">
                <div class="col-md-5">

                    <span><br> 
                        Suscríbete a nuestro boletín para <br>obtener promociones especiales<br>
                    </span>
                    <form id="inscription_newsletter" name="inscription_newsletter" action="http://www.massivepc.com/inscription_newsletter.php?action=process" method="post">

                            <div class="input-group input-group-sm">

                                <input type="text" id="correo_boletin" placeholder="E-mail" class="form-control input-sm" name="newsletter_email">
                                <span class="input-group-btn" id="validar_mail">
                                    <input class="btn btn-default btn-xs" type="submit" value="Suscribirse" name="submit">
                                </span>

                            </div>
                        
                        <input name="newsletter_invite" type="hidden" value="1">
                    </form>

                </div>
            </div>

            
          </div>
        </div>



        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <h3 class="titulos_lista">Lista de precios de Mayoreo</h3>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <span id="wrapper_telefono_horario"><span class="glyphicon glyphicon-phone-alt"></span> <strong>Teléfono:</strong> 01 (33) 3613-4587 - <span class="glyphicon glyphicon-time"></span> <strong>Horario:</strong> Lunes a Sábado 10:30 am – 7:30 pm</span>
          </div>
        </div>



        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <span id="last_update">Última actualización: <?=$fecha?> </span>
          </div>
        </div> 

<br>

        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <a target="_blank" href="http://www.massivepc.com/JOINET-m-297.html">
                <img class="img-responsive" src="http://www.massivepc.com/mayoreo/assets/img/productos-joinet.jpg" />
            </a>
          </div>
        </div>       
       
        
<div style="clear:both;"></div>

        <br><br>
        <!--<div id="seleccion">-->
        <div class="container bs-docs-container">

            <div class="row">


                <ul id="myTabs" class="nav nav-pills" role="tablist">

                    <? foreach($categories as $categorie):?>
                        <? if($categorie->id_categoria != 21){?>
                            <li role="presentation" <?=($categorie->id_categoria=='1') ? 'class="active"' : ''?>>
                                <a href="#cat<?=$categorie->id_categoria?>" aria-expanded="true" aria-controls="cat<?=$categorie->id_categoria?>" role="tab" data-toggle="tab"><?=$categorie->categoria?></a>
                            </li>
                        <? }?>
                    <? endforeach?>
                            <li role="presentation">
                                <a id="tabAll" href="#cat">MOSTRAR TODO</a>
                            </li>
                </ul>
                    
                    <div class="clearfix"></div><br>

                    <div class="tab-content">

                    <? foreach($categories as $categorie):?>
                        
                       
                            <div role="tabpanel" class="tab-pane <?=($categorie->id_categoria=='1') ? 'active' : ''?>" id="cat<?=$categorie->id_categoria?>">

                                <div class="clearfix"></div>
                                <div class="panel panel-info">
                                  <div class="panel-heading">
                                    <?=$categorie->categoria?>
                                  </div>
                                </div>
                                <div class="clearfix"></div>

                    <? $this->data['products'] = $this->products_model->get_products(array('fk_categoria'=>$categorie->id_categoria))?>

                    <? foreach($this->data['products'] as $product):?>
                    <? $con_iva = $product->products_price + (16*($product->products_price/100));?>

                        <div class="col-sm-3"> 

                            <div class="thumbnail">
                                <div class="pull-right label label-info"><?=$product->products_id?></div>
                                <div class="clearfix"></div>
                                <a href="javascript:void(0);" onclick="window.open('/galeriam.php?products_id=<?=$product->products_id?>', '_blank', 'width=800,height=900,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');">
                                    <img src="/images/<?=$product->products_image?>" alt=""/>
                                </a>

                          <div class="caption">

                            <h4 class="text-center">
                                <? if(!empty($product->products_model)){ echo $product->products_model; }else{ echo 'N/A'; }?>
                            </h4>
                            

                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                              <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="heading<?=$product->products_id?>">
                                  <h5 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$product->products_id?>" aria-expanded="true" aria-controls="collapse<?=$product->products_id?>">
                                      Descripción
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapse<?=$product->products_id?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=$product->products_id?>">
                                  <div class="panel-body">
                                    <small><?=$product->products_name?> <a target="_blank" href="http://www.massivepc.com/-p-<?=$product->products_id?>.html"><br/>DETALLES</a></small>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="list-group">

                              <li class="list-group-item"><span class="badge">$<?=number_format(round($con_iva,2))?></span> Precio Publico</li>
                              <li class="list-group-item"><span class="badge">$<?=number_format($product->precio_mayoreo)?></span> Precio Mayoreo</li>
                              <li class="list-group-item"><span class="badge">$<?=number_format($product->precio_distribuidor)?></span> Precio Distribuidor</li>
                              
                                <?
                                    if($product->sae_exist <= '0'){
                                        echo '<li class="list-group-item disabled"><span class="badge">Agotado</span> Existencias</li>';
                                    }else{
                                        echo '<li class="list-group-item active"><span class="badge">'.$product->sae_exist.'</span> Existencias</li>';
                                    }
                                ?>
                              
                            </div>

                            
                                <div class="input-group">
                            
                                <?
                                    if($product->sae_exist <= '0'){
                                        ?>
                                        <input type="text" class="form-control cantidad" placeholder="Cantidad..." disabled>
                                          <span class="input-group-btn">
                                            <a href="#" data-id="<?=$product->products_id?>" data-imagen="<?=$product->products_image?>" data-price="<?=$con_iva?>" data-mayoreo="<?=$product->precio_mayoreo?>" data-distribuidor="<?=$product->precio_distribuidor?>" data-name="<?=url_title($product->products_name,' ',FALSE)?>" class="btn btn-primary disabled">Agregar</a>
                                          </span>

                                        <?
                                    }else{
                                        ?>
                                        <input type="text" class="form-control cantidad" placeholder="Cantidad..." />
                                       <span class="input-group-btn">
                                        <a href="#" data-id="<?=$product->products_id?>" data-imagen="<?=$product->products_image?>" data-price="<?=$con_iva?>" data-mayoreo="<?=$product->precio_mayoreo?>" data-distribuidor="<?=$product->precio_distribuidor?>" data-name="<?=url_title($product->products_name,' ',FALSE)?>" class="btn btn-primary agregar">Agregar</a>
                                        </span>
                                        <?
                                    }
                                ?>
                            </div><!-- /input-group -->
                              

                          </div>
                        </div>
                      </div>
					
                       


                    <? endforeach?>

                        </div>

                    <? endforeach?>

                        

                    </div>


                </div>
        </div>
        
        
        
        <div class="container bs-docs-container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 text-center">
                    <a class="btn btn-default" href="javascript:openwindow()">Imprimir Lista</a>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>

        <br>

        
<div class="container bs-docs-container">

        
        <div class="clearfix"></div>
                <div class="panel panel-info">
                  <div class="panel-heading">
                    Historial de Solo Ofertas Guadalajara
                  </div>
                </div>
            <div class="clearfix"></div>
        
        <div class="row">
            
            <div class="col-md-3">
                <div class="list-group">
                             <a class="list-group-item" href="http://www.massivepc.com/mayoreo/assets/uploads/solo_ofertas/4ef8a-1022.jpg" target="_blank"> Edición 1022 </a> 
                             <a class="list-group-item" href="http://www.massivepc.com/mayoreo/assets/uploads/solo_ofertas/9986b-1027.jpg" target="_blank"> Edición 1027 </a> 
                             <a class="list-group-item" href="http://www.massivepc.com/mayoreo/assets/uploads/solo_ofertas/715ff-1032.jpg" target="_blank"> Edición 1032 </a> 
                             <a class="list-group-item" href="http://www.massivepc.com/mayoreo/assets/uploads/solo_ofertas/65f4d-1035.jpg" target="_blank"> Edición 1035 </a> 
                             <a class="list-group-item" href="http://www.massivepc.com/mayoreo/assets/uploads/solo_ofertas/be59c-1036.jpg" target="_blank"> Edición 1036 </a> 
                             <a class="list-group-item" href="http://www.massivepc.com/mayoreo/assets/uploads/solo_ofertas/abc2e-1037.jpg" target="_blank"> Edición 1037 </a> 
                             <a class="list-group-item" href="http://www.massivepc.com/mayoreo/assets/uploads/solo_ofertas/3eaf5-1038.jpg" target="_blank"> Edición 1038 </a> 
                             <a class="list-group-item" href="http://www.massivepc.com/mayoreo/assets/uploads/solo_ofertas/1d365-1039.jpg" target="_blank"> Edición 1039 </a> 
                             <a class="list-group-item" href="http://www.massivepc.com/mayoreo/assets/uploads/solo_ofertas/6fc7e-1040.jpg" target="_blank"> Edición 1040 </a>
                         </div>
                     </div>

                     <div class="col-md-3">
                <div class="list-group">
                             <a class="list-group-item" href="http://www.massivepc.com/mayoreo/assets/uploads/solo_ofertas/c1b58-1041.jpg" target="_blank"> Edición 1041 </a> 
                             <a class="list-group-item" href="http://www.massivepc.com/mayoreo/assets/uploads/solo_ofertas/4491c-1042.jpg" target="_blank"> Edición 1042 </a> 
                             <a class="list-group-item" href="http://www.massivepc.com/mayoreo/assets/uploads/solo_ofertas/448a8-1044.jpg" target="_blank"> Edición 1044 </a> 
                             <a class="list-group-item" href="http://www.massivepc.com/mayoreo/assets/uploads/solo_ofertas/45302-1046.jpg" target="_blank"> Edición 1046 </a> 
                             <a class="list-group-item" href="http://www.massivepc.com/mayoreo/assets/uploads/solo_ofertas/43a27-1047.jpg" target="_blank"> Edición 1047 </a> 
                             <a class="list-group-item" href="http://www.massivepc.com/mayoreo/assets/uploads/solo_ofertas/5fb96-1048.jpg" target="_blank"> Edición 1048 </a> 
                             <a class="list-group-item" href="http://www.massivepc.com/mayoreo/assets/uploads/solo_ofertas/6748b-1050.jpg" target="_blank"> Edición 1050 </a> 
                             <a class="list-group-item" href="http://www.massivepc.com/mayoreo/assets/uploads/solo_ofertas/2608b-1051.jpg" target="_blank"> Edición 1051 </a> 
                             <a class="list-group-item" href="http://www.massivepc.com/mayoreo/assets/uploads/solo_ofertas/99d48-1053.jpg" target="_blank"> Edición 1053 </a> 
                         </div>
                     </div>

                     <div class="col-md-3">
                <div class="list-group">
                             <a class="list-group-item" href="http://www.massivepc.com/mayoreo/assets/uploads/solo_ofertas/2c6ee-1054.jpg" target="_blank"> Edición 1054 </a> 
                             <a class="list-group-item" href="http://www.massivepc.com/mayoreo/assets/uploads/solo_ofertas/b4440-1055.jpg" target="_blank"> Edición 1055 </a> 
                             <a class="list-group-item" href="http://www.massivepc.com/mayoreo/assets/uploads/solo_ofertas/5bc22-1066.jpg" target="_blank"> Edición 1066 </a> 
                             <a class="list-group-item" href="http://www.massivepc.com/mayoreo/assets/uploads/solo_ofertas/8fbfe-1082.jpg" target="_blank"> Edición 1082 </a> 
                             <a class="list-group-item" href="http://www.massivepc.com/mayoreo/assets/uploads/solo_ofertas/a96c4-1084.jpg" target="_blank"> Edición 1084 </a> 
                             <a class="list-group-item" href="http://www.massivepc.com/mayoreo/assets/uploads/solo_ofertas/6937c-1086.jpg" target="_blank"> Edición 1086 </a> 
                             <a class="list-group-item" href="http://www.massivepc.com/mayoreo/assets/uploads/solo_ofertas/99cdb-1088.jpg" target="_blank"> Edición 1088 </a> 
                             <a class="list-group-item" href="http://www.massivepc.com/mayoreo/assets/uploads/solo_ofertas/0e075-1103.jpg" target="_blank"> Edición 1103 </a> 
                             <a class="list-group-item" href="http://www.massivepc.com/mayoreo/assets/uploads/solo_ofertas/92974-1104.jpg" target="_blank"> Edición 1104 </a>
                            </div>
                        </div>

                        <div class="col-md-3">
                <div class="list-group">
                             <a class="list-group-item" href="http://www.massivepc.com/mayoreo/assets/uploads/solo_ofertas/e9a8d-1105.jpg" target="_blank"> Edición 1105 </a> 
                             <a class="list-group-item" href="http://www.massivepc.com/mayoreo/assets/uploads/solo_ofertas/c2f4e-1106.jpg" target="_blank"> Edición 1106 </a> 
                             <a class="list-group-item" href="http://www.massivepc.com/mayoreo/assets/uploads/solo_ofertas/8024c-1107.jpg" target="_blank"> Edición 1107 </a> 
                             <a class="list-group-item" href="http://www.massivepc.com/mayoreo/assets/uploads/solo_ofertas/d7cc8-1108.jpg" target="_blank"> Edición 1108 </a> 
                             <a class="list-group-item" href="http://www.massivepc.com/mayoreo/assets/uploads/solo_ofertas/b42bd-1116.jpg" target="_blank"> Edición 1116 </a> 
                             <a class="list-group-item" href="http://www.massivepc.com/mayoreo/assets/uploads/solo_ofertas/b1ef7-1118.jpg" target="_blank"> Edición 1118 </a> 
                             <a class="list-group-item" href="http://www.massivepc.com/mayoreo/assets/uploads/solo_ofertas/66523-1120.jpg" target="_blank"> Edición 1120 </a> 
                             <a class="list-group-item" href="http://www.massivepc.com/mayoreo/assets/uploads/solo_ofertas/7da16-1129.jpg" target="_blank"> Edición 1129 </a>
                         </div>
                     </div>

                 </div>
                   
</div>

        
        <div class="container bs-docs-container">

            <div class="clearfix"></div>
                <div class="panel panel-info">
                  <div class="panel-heading">
                    Historial de boletines
                  </div>
                </div>
            <div class="clearfix"></div>

          <div class="row">
            
            <div class="col-md-4">
                <div class="list-group">
                    <a class="list-group-item" target="_blank" href="http://www.massivepc.com/boletin/boletin_laser.html">Apuntador laser</a>
                    <a class="list-group-item" target="_blank" href="http://www.massivepc.com/boletin/boletin_m8.html">Tv box 4k</a>
                    <a class="list-group-item" target="_blank" href="http://www.massivepc.com/boletin/boletin_bocinaportatil.html">Bocina portatil</a>
                    <a class="list-group-item" target="_blank" href="http://www.massivepc.com/boletin/boletin_ezcast.html">Ezcast</a>
                    <a class="list-group-item" target="_blank" href="http://www.massivepc.com/boletin/boletin_refacciones.html">Refacciones para tablets</a>
                    <a class="list-group-item" target="_blank" href="http://www.massivepc.com/boletin/boletin_estafeta.html">Guías prepagadas de estafeta</a>
                    <a class="list-group-item" target="_blank" href="http://www.massivepc.com/boletin/boletin_focos.html">Focos de led joinet</a>
                    <a class="list-group-item" target="_blank" href="http://www.massivepc.com/boletin/boletin_bocinas.html">Bocinas con agua danzantes</a>
                    <a class="list-group-item" target="_blank" href="http://www.massivepc.com/boletin/boletin_ergostand.html">Base enfriadora</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="list-group">
                    <a class="list-group-item" target="_blank" href="http://www.massivepc.com/boletin/boletin_quadcopter.html">Quad copter</a>
                    <a class="list-group-item" target="_blank" href="http://www.massivepc.com/boletin/boletin_smartwatch.html">Smart watch</a>
                    <a class="list-group-item" target="_blank" href="http://www.massivepc.com/boletin/boletin_powerbank.html">Power bank</a>
                    <a class="list-group-item" target="_blank" href="http://www.massivepc.com/boletin/boletin_noisy.html">J13qc noisy</a>
                    <a class="list-group-item" target="_blank" href="http://www.massivepc.com/boletin/boletin_mp3.html">Mp3 joinet</a>
                    <a class="list-group-item" target="_blank" href="http://www.massivepc.com/boletin/boletin_kimtigo.html">Memorias kimtigo</a>
                    <a class="list-group-item" target="_blank" href="http://www.massivepc.com/boletin/j13quadcore.htm">J13 quad core!</a>
                    <a class="list-group-item" target="_blank" href="http://www.massivepc.com/boletin/boletin_telcel.html">Chips telcel</a>
                    <a class="list-group-item" target="_blank" href="http://www.massivepc.com/boletin/boletin_focos_led.html">Foco de led mp3</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="list-group">
                    <a class="list-group-item" target="_blank" href="http://www.massivepc.com/boletin/boletin_bocina_links.html">Bocinas links bits</a>
                    <a class="list-group-item" target="_blank" href="http://www.massivepc.com/boletin/boletin_jgamers.html">Jgamers quad core</a>
                    <a class="list-group-item" target="_blank" href="http://www.massivepc.com/boletin/boletin_jpocket.html">Jpocket</a>
                    <a class="list-group-item" target="_blank" href="http://www.massivepc.com/boletin/boletin_j90.html">J90 quad core</a>
                    <a class="list-group-item" target="_blank" href="http://www.massivepc.com/boletin/boletin_fundasconteclado.html">Fundas con teclado</a>
                    <a class="list-group-item" target="_blank" href="http://www.massivepc.com/boletin/boletin_fundas_silicon.html">Fundas de silicón</a>
                    <a class="list-group-item" target="_blank" href="http://www.massivepc.com/boletin/boletin_cristal.html">Cristal templado</a>
                    <a class="list-group-item" target="_blank" href="http://www.massivepc.com/boletin/boletin_case_motomo.html">Cases iphone 6</a>
                </div>
            </div>
            
        </div>
          
        

</div>
        
       <div class="container bs-docs-container">

        <div class="clearfix"></div>
                <div class="panel panel-info">
                  <div class="panel-heading">
                    Material publicitario
                  </div>
                </div>
        <div class="clearfix"></div>

        <div class="row">

        	<div class="col-md-3">
                <div class="list-group">
				<a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/1.jpg">Funda protectora</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/2.jpg">Ipega water proff</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/3.jpg">Go pro action</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/4.jpg">Smarthphone i6</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/5.jpg">J7 quad core</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/6.jpg">Funda iguy</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/7.jpg">Adaptador wireless usb</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/8.jpg">Android s5</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/9.jpg">Antena sk-10Ttn+</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/10.jpg">Alfa network</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/11.jpg">Fundas con antigolpes</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/12.jpg">Mini cámara espía</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/13.jpg">Bocinas con agua</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/14.jpg">Bocina de lata</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/15.jpg">Brazo monopod</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/16.jpg">Cámara espía Wi-Fi</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/17.jpg">Camera drone</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/18.jpg">Consola psp</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/19.jpg">Cristal templado iphone 4,5,6</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/20.jpg">Cristal Templado</a>
			</div>
        </div>
			<div class="col-md-3">
                <div class="list-group">
				<a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/21.jpg">Base enfriadora</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/22.jpg">Extensión usb 2.0</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/23.jpg">Ezcast</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/24.jpg">Foco espía</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/25.jpg">Foco led mp3</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/26.jpg">Funda con teclado</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/27.jpg">J9 dual core</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/28.jpg">J13 dual core</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/29.jpg">J13 quad core</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/30.jpg">J13 quad core noisy</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/31.jpg">J50 dual core</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/32.jpg">Jbox quad core</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/33.jpg">Jcolors</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/34.jpg">Jgamers quad core</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/35.jpg">Jmobile</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/36.jpg">Jpocket</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/37.jpg">Memorias kimtigo</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/38.jpg">Apuntador láser</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/39.jpg">Lentes para smartphone</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/40.jpg">Llavero selfie</a>
			</div>
        </div>

			<div class="col-md-3">
                <div class="list-group">
				<a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/41.jpg">Foco con luz giratoria</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/42.jpg">Memoria usb flash</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/43.jpg">Microscopio digital</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/44.jpg">Memoria micro sd</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/45.jpg">Mini subwoofer bluetooth</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/46.jpg">Bocina portátil</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/47.jpg">Mini dv</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/48.jpg">Mini teclado</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/49.jpg">Mini tvbox</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/50.jpg">Mp3 joinet</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/51.jpg">Android note 3</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/52.jpg">Foco led joinet</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/53.jpg">Foco led bluetooth</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/54.jpg">Funda survivor ipad 1,2,3</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/55.jpg">Funda survivor ipad mini</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/56.jpg">Funda con batería iphone 6</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/57.jpg">Funda survivor iphone 5s, 6</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/58.jpg">Pluma espía</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/59.jpg">Bocina portátil</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/60.jpg">Bocina con luz</a>
            </div>
        </div>
            <div class="col-md-3">
                <div class="list-group">
				<a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/61.jpg">Guías prepagadas estafeta</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/62.jpg">Reloj despertador espía</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/63.jpg">Lámpara led</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/64.jpg">Power bank</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/65.jpg">Power bank solar</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/66.jpg">Reloj espía escritorio</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/67.jpg">Reloj espía mano</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/68.jpg">Battle robot</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/69.jpg">Funda galaxy s5</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/70.jpg">Smarthwatch s28</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/71.jpg">Smarthwatch s12</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/72.jpg">Funda protectora s5</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/73.jpg">Funda armor s5</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/74.jpg">Soloking e1500</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/75.jpg">Funda teclado ipad 2 y 3</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/76.jpg">Tvbox mk809 II</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/77.jpg">Tvbox m8</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/78.jpg">Gamepad ipega</a>
                <a class="list-group-item" target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/79.jpg">J13 dual +</a>
            </div>
        </div>
        </div>

    </div>
        <br>
        
        
        
        
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
                <div class="col-md-4 text-center">
                    <img class="img-thumbnail img-responsive" src="<?=base_url()?>assets/img/baner1.jpg" alt="" />
                </div>
                <div class="col-md-4 text-center">
                    <img class="img-thumbnail img-responsive" src="<?=base_url()?>assets/img/baner2.jpg" alt="" />
                </div>
                <div class="col-md-4 text-center">
                    <img class="img-thumbnail img-responsive" src="<?=base_url()?>assets/img/baner3.jpg" alt="" />
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

        <div class="container bs-docs-container">
            <div class="row">


                <div class="col-md-4">

                    <div class="panel panel-info h_190">
                      <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-map-marker"></i> Domicilio</h3>
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
                        <h3 class="panel-title"><i class="glyphicon glyphicon-phone-alt"></i> Llámanos ó Escríbenos</h3>
                      </div>
                      <div class="panel-body">
                        <address>
                            01 (33) 3613-4587<br>
                            <a href="mailto:mayoreo@massivepc.com">mayoreo@massivepc.com</a>
                        </address>
                      </div>
                    </div>

                </div>

                <div class="col-md-4">

                    <div class="panel panel-info h_190">
                      <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-whatsapp"></i> Contáctanos por whatsapp</h3>
                      </div>
                      <div class="panel-body">

                        <div class="row">
                            <div class="col-md-4">
                                333440-0228<br>
                                332058-1734<br>
                                332012-3946

                            </div>
                            <div class="col-md-4">
                                331400-5144<br>
                                332012-6743<br>
                                331106-6729
                            </div>
                            <div class="col-md-4">
                                331109-7339
                            </div>
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
                        <h3 class="panel-title"><i class="fa fa-university"></i> Cuentas Bancarias</h3>
                      </div>
                      <div class="panel-body">

                        <div class="row">

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
                                <strong>BANCOMER</strong>
                                <br> Cuenta: 0194258703
                                <br> CLABE Interbancaria para transferencias: 0123-2000-1942-5870-31
                                <br> A nombre de: MASSIVE PC SA DE CV
                            </div>
                            <div class="col-md-4">
                                <strong>SANTANDER</strong>
                                <br> Cuenta: 65-50403993-5
                                <br> CLABE Interbancaria para transferencias: 0143-2065-5040-3993-55
                                <br> A nombre de: MASSIVE PC SA DE CV
                            </div>
                            <div class="col-md-4">
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

                Envíos a todo México por <strong>DHL</strong> $100 Pesos por caja hasta 10Kg
                <br><br>
                <table>
                    <tr>
                        <td valign="middle">Manejamos créditos con:</td>
                        <td valign="middle"><img src="http://www.massivepc.com/boletin/checkplus.jpg?r=879"/></td>
                    </tr>
                </table>

                <br>

                *Precios con IVA incluido en MN sujetos a cambio sin previo aviso.

                <br><br>

                </div>
            </div>
        </div>
                

    </div>
    


    <div style="display:none;">
    	<a id="ver_pago" class="fancybox" data-fancybox-type="iframe" href="http://www.massivepc.com/mayoreo/pago"></a>
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


    
    <script src="https://code.jquery.com/jquery-1.11.2.js"></script>
    <script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="/mayoreo/assets/js/jquery.fancybox.js"></script>
    <script src="/mayoreo/assets/js/jquery.currency.js"></script>
    <script src="/mayoreo/assets/bootstrap3/js/bootstrap.js"></script>
    <script src="/mayoreo/assets/js/mayoreo.js"></script>

    <script type="text/javascript">
        $(function(){
            $('#myTabs a').click(function (e) {
                e.preventDefault()
                $(this).tab('show');
            });
            $('#tabAll').click(function(){
              $('#tabAll').addClass('active');  
              $('.tab-pane').each(function(i,t){
                $('#myTabs li').removeClass('active'); 
                $(this).addClass('active');  
              });
            });

            $('#validar_mail').click(function() {

                var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;

                if (regex.test($('#correo_boletin').val().trim())) {
                  //$('#boletin_modal').modal('show');
                  console.log('1');
                } else {
                    $('#inscription_newsletter').on('submit', function(e) {
                        e.preventDefault();
                    });
                    console.log('2');
                  $('#boletin_modal').modal('show');
                }

            });

        });
    </script>

</body>
    

</html>