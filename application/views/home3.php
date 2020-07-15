<!doctype html>

<head>
	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>Massive Pc - Mayorista en equipo de cómputo</title>

    <META name="description" content="Venta de tablets, celulares, relojes inteligentes, guadalajara" />
    <META name="keywords" content="Tablet, Tablets, Mayoreo guadalajara, Tablets baratas guadalajara, celulares economicos guadalajara, electronicos baratos guadalajara, joinet guadalajara, massive pc guadalajara, celulares, tabletas, Antenas, Espía, " />

    <link href="<?=base_url()?>assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/css/jquery.fancybox.css" rel="stylesheet" type="text/css">
    <link href="/css/jquery-ui.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/bootstrap3/css/bootstrap.css" rel="stylesheet" type="text/css">
    
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
        <strong>Carrito:</strong> <span id="total_items_j"><?=(!empty($total_items_j)) ? $total_items_j.' Productos' : 'Vacio' ?></span>
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
<a id="pagar" data-fancybox-type="iframe" class="btn btn-sm btn-success disabled fancybox" href="http://www.massivepc.com/mayoreo/pago"><strong>Cerrar pedido</strong> <span class="glyphicon glyphicon-menu-right"></span></a>
            
        </div>
       
    </div>
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
                    <a id="logo_link" href="http://www.massivepc.com" target="_blank"><img src="http://www.massivepc.com/mayoreo/Logo-Massive-Mayoreo.png" alt="Massivepc Mayoreo"></a>
                    <a id="logo_link_joinet" href="http://www.joinet.com" target="_blank"><img src="http://www.massivepc.com/mayoreo/Logo-Joinet_Mayoreo.png?tme=2" alt="Joinet"></a>
                </td>
                <td id="td300">
                    <span><br> 
                        Suscríbete a nuestro boletín para <br>obtener promociones especiales<br>
                    </span>
                    <form id="inscription_newsletter" style="border:0" name="inscription_newsletter" action="http://www.massivepc.com/inscription_newsletter.php?action=process" method="post">
                        <input id="in_mail" class="form-control input-sm" id="correo_boletin" name="newsletter_email" value="E-mail" onfocus="value=''" >&nbsp; &nbsp;
                        <input id="in_submit" class="btn btn-default btn-sm" type="submit" id="validar_mail" value="Suscribirse" name="submit">
                        <br>
                        <input name="newsletter_invite" type="hidden" value="1">
                    </form>
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
			$dias	=array( "Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
			$meses	=array( "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
			$fecha	=$dias[date( 'w')]. " ".date( 'd'). " de ".$meses[date( 'n')-1]. " del ".date( 'Y');
			echo '<span id="last_update">Última actualización: '.$fecha. '</span>';
		?>
        <br>
        <br>
        
    <a target="_blank" href="http://www.massivepc.com/JOINET-m-297.html">
        <img id="img_principal" src="http://www.massivepc.com/mayoreo/assets/img/productos-joinet.jpg" />
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
                <table class="table_1">
                    <tr>
                        <td style="width:67px;">CODIGO</td>
                        <td style="width:157px;">MODELO</td>
                        <td style="width:342px;">DESCRIPCI&Oacute;N</td>
                        <td style="width:70px;">MARCA</td>
                        <td style="width:118px;">IMAGEN</td>
                        <td style="width:118px;">EXISTENCIAS</td>
                        <td style="width:80px;">PRECIO PUBLICO</td>
                        <td style="width:97px;">PRECIO MAYOREO ($5,000)</td>
                        <td style="width:127px;">PRECIO DISTRIBUIDOR ($10,000)</td>
                        <td style="width:100px;"></td>
                    </tr>
                    <? foreach($categories as $categorie):?>
                    
                        <? if($categorie->id_categoria != 21){?>
                            <tr>
                                <td class="td_cat" colspan="10">
                                    <?=$categorie->categoria?>
                                </td>
                            </tr>
                        <? }?>

                    <? $this->data['products'] = $this->products_model->get_products(array('fk_categoria'=>$categorie->id_categoria))?>

                    <? foreach($this->data['products'] as $product):?>
                    <? $con_iva = $product->products_price + (16*($product->products_price/100));?>
					
                    <tr id="t_<?=$product->products_id?>">
                        <td class="p5 p_td td_w_67">
                            <a href="http://www.massivepc.com/-p-<?=$product->products_id?>.html" target="_blank"><?=$product->products_id?></a>
                        </td>
                        <td class="p5 p_td td_w_157">
                            <? if(!empty($product->products_model)){ echo $product->products_model; }else{ echo 'N/A'; }?>
                        </td>
                        <td class="p5 td_w_342">
                            <a target="_blank" class="ml2" href="http://www.massivepc.com/-p-<?=$product->products_id?>.html">
								<?=$product->products_name?>
                            </a>
                        </td>
                        <td class="p5 td_w_70">
							<a target="_blank" href="http://www.massivepc.com/<?=$product->manufacturers_name?>-m-<?=$product->manufacturers_id?>.html">
                                <?/*<img alt="Fabricante" src="<?=base_url()?>timthumb.php?src=/images/<?=$product->manufacturers_image?>&w=60&h=30&zc=2" height="30" width="60">*/?>
                                <img alt="Fabricante" src="/images/<?=$product->manufacturers_image?>" height="30" width="60">
                            </a>
                        </td>
                        <td class="p5 td_w_118">
                            <? /*<a class="fancybox2" href="http://www.massivepc.com/images/<?=$product->products_imagelarge?>"> */?>
                            <a href="javascript:void(0);" onclick="window.open('/galeriam.php?products_id=<?=$product->products_id?>', '_blank', 'width=800,height=900,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');">
                                <img src="/images/<?=$product->products_image?>" alt="" width="80px" height="80px"/>
                            </a>
                        </td>
                        <td class="p5 td_w_87_80">
                            <span>
                            <?
								if($product->agotado=='1'){
									echo 'Agotado';
								}else{
									if($product->sae_exist <= '0'){
										echo 'Por mostrar';
									}else{
										echo $product->sae_exist;
									}
								} 
							?>
                            </span>
                        </td>
                        <td class="p5 td_w_80_2">
                            <span>$<?=number_format(round($con_iva,2))?></span>
                        </td>
                        <td class="p5 td_w_97_2">
                        	<span>$<?=number_format($product->precio_mayoreo)?></span>
						</td>
                        <td class="p5 td_w_127_2">
                        	<span>$<?=number_format($product->precio_distribuidor)?></span>
						</td>
                        <td class="p5 td_w_100_2">
                        	<?
								if($product->agotado=='1'){
									?>
										<input class="form-control cantidad" type="text" placeholder="Cantidad" disabled />
                        	           <a href="#" data-id="<?=$product->products_id?>" data-imagen="<?=$product->products_image?>" data-price="<?=$con_iva?>" data-mayoreo="<?=$product->precio_mayoreo?>" data-distribuidor="<?=$product->precio_distribuidor?>" data-name="<?=url_title($product->products_name,' ',FALSE)?>" class="btn btn-xs btn-primary agregar disabled">Agregar</a>
										<?
								}else{
									if($product->sae_exist <= '0'){
										?>
									   <input class="form-control cantidad" type="text" placeholder="Cantidad" />
                        	           <a href="#" data-id="<?=$product->products_id?>" data-imagen="<?=$product->products_image?>" data-price="<?=$con_iva?>" data-mayoreo="<?=$product->precio_mayoreo?>" data-distribuidor="<?=$product->precio_distribuidor?>" data-name="<?=url_title($product->products_name,' ',FALSE)?>" class="btn btn-xs btn-primary agregar">Agregar</a>
										<?
									}else{
										?>
		                              <input class="form-control cantidad" type="text" placeholder="Cantidad" />
                        	           <a href="#" data-id="<?=$product->products_id?>" data-imagen="<?=$product->products_image?>" data-price="<?=$con_iva?>" data-mayoreo="<?=$product->precio_mayoreo?>" data-distribuidor="<?=$product->precio_distribuidor?>" data-name="<?=url_title($product->products_name,' ',FALSE)?>" class="btn btn-xs btn-primary agregar">Agregar</a>
										<?
                                    }
								} 
							?>
                        	
                        </td>
                    </tr>


                    <? endforeach?>

                    <? endforeach?>




                </table>
        </div>
        
        <br>
        <div id="impr_btn"><a class="btn btn-xs btn-default" href="javascript:openwindow()">Imprimir Lista</a></div>
        <br>
        <h3 class="titulos_lista">Historial de Solo Ofertas Guadalajara</h3>
        <ul id="solo_ofertas">
            <? foreach($solo_ofertas as $ofertas):?>
                <li> <a target="_blank" href="<?=base_url()?>assets/uploads/solo_ofertas/<?=$ofertas->imagen?>"> <?=$ofertas->nombre?> </a> </li>
            <? endforeach?>
        </ul>
<div style="clear:both;"></div>
        <style>
			
		</style>
        <h3 class="titulos_lista">Historial de boletines</h3>
        <div id="boletines">
        	<ul>
				<li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_laser.html">Apuntador laser</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_m8.html">Tv box 4k</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_bocinaportatil.html">Bocina portatil</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_ezcast.html">Ezcast</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_refacciones.html">Refacciones para tablets</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_estafeta.html">Guías prepagadas de estafeta</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_focos.html">Focos de led joinet</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_bocinas.html">Bocinas con agua danzantes</a></li>
			</ul>
			<ul class="b_col2">
            	<li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_quadcopter.html">Quad copter</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_smartwatch.html">Smart watch</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_powerbank.html">Power bank</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_noisy.html">J13qc noisy</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_mp3.html">Mp3 joinet</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_kimtigo.html">Memorias kimtigo</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/j13quadcore.htm">J13 quad core!</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_telcel.html">Chips telcel</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/boletin/boletin_ergostand.html">Base enfriadora</a></li>
			</ul>
			<ul class="b_col2">
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
        <div style="clear:both;"></div>
        <h3 class="titulos_lista">Material publicitario</h3>
        <div id="publicidad">
        	<ul>
				<li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/1.jpg">Funda protectora</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/2.jpg">Ipega water proff</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/3.jpg">Go pro action</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/4.jpg">Smarthphone i6</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/5.jpg">J7 quad core</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/6.jpg">Funda iguy</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/7.jpg">Adaptador wireless usb</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/8.jpg">Android s5</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/9.jpg">Antena sk-10Ttn+</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/10.jpg">Alfa network</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/11.jpg">Fundas con antigolpes</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/12.jpg">Mini cámara espía</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/13.jpg">Bocinas con agua</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/14.jpg">Bocina de lata</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/15.jpg">Brazo monopod</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/16.jpg">Cámara espía Wi-Fi</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/17.jpg">Camera drone</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/18.jpg">Consola psp</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/19.jpg">Cristal templado iphone 4,5,6</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/20.jpg">Cristal Templado</a></li>
			</ul>
			<ul class="b_col2">
				<li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/21.jpg">Base enfriadora</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/22.jpg">Extensión usb 2.0</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/23.jpg">Ezcast</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/24.jpg">Foco espía</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/25.jpg">Foco led mp3</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/26.jpg">Funda con teclado</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/27.jpg">J9 dual core</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/28.jpg">J13 dual core</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/29.jpg">J13 quad core</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/30.jpg">J13 quad core noisy</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/31.jpg">J50 dual core</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/32.jpg">Jbox quad core</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/33.jpg">Jcolors</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/34.jpg">Jgamers quad core</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/35.jpg">Jmobile</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/36.jpg">Jpocket</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/37.jpg">Memorias kimtigo</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/38.jpg">Apuntador láser</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/39.jpg">Lentes para smartphone</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/40.jpg">Llavero selfie</a></li>
			</ul>
			<ul class="b_col2">
				<li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/41.jpg">Foco con luz giratoria</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/42.jpg">Memoria usb flash</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/43.jpg">Microscopio digital</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/44.jpg">Memoria micro sd</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/45.jpg">Mini subwoofer bluetooth</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/46.jpg">Bocina portátil</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/47.jpg">Mini dv</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/48.jpg">Mini teclado</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/49.jpg">Mini tvbox</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/50.jpg">Mp3 joinet</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/51.jpg">Android note 3</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/52.jpg">Foco led joinet</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/53.jpg">Foco led bluetooth</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/54.jpg">Funda survivor ipad 1,2,3</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/55.jpg">Funda survivor ipad mini</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/56.jpg">Funda con batería iphone 6</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/57.jpg">Funda survivor iphone 5s, 6</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/58.jpg">Pluma espía</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/59.jpg">Bocina portátil</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/60.jpg">Bocina con luz</a></li>
            </ul>
            <ul class="b_col2">
				<li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/61.jpg">Guías prepagadas estafeta</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/62.jpg">Reloj despertador espía</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/63.jpg">Lámpara led</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/64.jpg">Power bank</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/65.jpg">Power bank solar</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/66.jpg">Reloj espía escritorio</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/67.jpg">Reloj espía mano</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/68.jpg">Battle robot</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/69.jpg">Funda galaxy s5</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/70.jpg">Smarthwatch s28</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/71.jpg">Smarthwatch s12</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/72.jpg">Funda protectora s5</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/73.jpg">Funda armor s5</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/74.jpg">Soloking e1500</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/75.jpg">Funda teclado ipad 2 y 3</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/76.jpg">Tvbox mk809 II</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/77.jpg">Tvbox m8</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/78.jpg">Gamepad ipega</a></li>
                <li><a target="_blank" href="http://www.massivepc.com/mayoreo/assets/uploads/publicidad/79.jpg">J13 dual +</a></li>
            </ul>
        </div>
        <br><br>
        <? /*<h3 style="color:#F72327; text-align:center; font-size:26px; margin-bottom:20px;">Boletín de la computación de Abril </h3>
            <table style="margin:auto; width:1160px;">
            <tr style="background:#fff;">
                <td><a target="_blank" href="<?=base_url()?>assets/uploads/boletin/big_0.jpg"><img style="display:block; margin:auto; border:solid thin #000000;" alt="Boletín Mayoreo" src="<?=base_url()?>timthumb.php?src=<?=base_url()?>assets/uploads/boletin/0.jpg&w=573&h=742&zc=2&q=100"></a></td>
                <td><a target="_blank" href="<?=base_url()?>assets/uploads/boletin/big_1.jpg"><img style="display:block; margin:auto; border:solid thin #000000;" alt="Boletín Mayoreo" src="<?=base_url()?>timthumb.php?src=<?=base_url()?>assets/uploads/boletin/1.jpg&w=573&h=742&zc=2&q=100"></a></td>
            </tr>
            <tr><td colspan="2" style="height:7px;"></td></tr>
            <tr>
                <td><a target="_blank" href="<?=base_url()?>assets/uploads/boletin/big_2.jpg"><img style="display:block; margin:auto; border:solid thin #000000;" alt="Boletín Mayoreo" src="<?=base_url()?>timthumb.php?src=<?=base_url()?>assets/uploads/boletin/2.jpg&w=573&h=742&zc=2&q=100"></a></td>
                <td><a target="_blank" href="<?=base_url()?>assets/uploads/boletin/big_3.jpg"><img style="display:block; margin:auto; border:solid thin #000000;" alt="Boletín Mayoreo" src="<?=base_url()?>timthumb.php?src=<?=base_url()?>assets/uploads/boletin/3.jpg&w=573&h=742&zc=2&q=100"></a></td>
            </tr>
        </table> */?>
        <br>
        <table id="table_map">
            <tr>
                <td>
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7465.758697288053!2d-103.347232!3d20.674487!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x195b5fdea7d0a86c!2sJoinet!5e0!3m2!1ses-419!2smx!4v1429721102063" width="1134" height="300" frameborder="0" style="border:0; margin-left:13px;"></iframe>
                </td>
            </tr>
        </table>
        <? /*<br>
        <table style="border-collapse: collapse;" border="1" cellspacing="0" width="774">
            <tr>
                <td align="center">
                    <a class="fancybox" href="http://www.massivepc.com/mayoreo/m6.jpg">
                        <img src="http://www.massivepc.com/mayoreo/m5.jpg" width="774" height="349" alt="" />
                    </a>
                </td>
            </tr>
        </table>*/?>
        <br>

            <table id="table_lugar">
                <tr>
                    <td>
    					<img src="<?=base_url()?>m1.jpg" alt="" />
                    </td>
                    <td>
    					<img src="<?=base_url()?>m2.jpg" alt="" />
                    </td>
                    <td class="last">
    					<img src="<?=base_url()?>assets/img/team_massivepc.jpg" alt="" />
                    </td>
                </tr>
            </table>

			<table id="table_dir">
            
            <tr>
            	<td colspan="3">
                	<img id="parabus" src="<?=base_url()?>assets/img/parabus02.jpg" />
                </td>
            </tr>

            <tr id="tr_dir">

                <td class="tr_td_258"><b>Domicilio</b>
                    <br> Av.16 de Septiembre No. 137
                    <br>(Frente a la Plaza de la Tecnología)
                    <br> Entre Av.Júarez y López Cotilla
                    <br>Guadalajara Centro
                    <br>Jalisco, México></td>
                <td class="tr_td_258">
                    <p><b>Teléfono</b>
                        <br>01 (33) 3613-4587
                        <br>
                        <p><b>Email:</b>
                            <br>mayoreo@massivepc.com</p>
                </td>
                <td class="tr_td_258">
                    <p>Contáctanos por
                        <br>
                        <img src="<?=base_url()?>watsp-01.png" width="128" height="36" alt="" />
                        <br> 333440-0228
                        <br> 332058-1734
                        <br> 332012-3946
                        <br> 331400-5144
                        <br> 332012-6743
                        <br> 331106-6729
                        <br> 331109-7339
                        

                    </p>
                </td>
            </tr>
            <tr>
                <td id="tr_tr_774" colspan="4">
                    <br><strong>CUENTAS BANCARIAS</strong>
                    <br>

<strong>BANCOMER</strong><br>
Cuenta: 0111395874<br>
CLABE Interbancaria para transferencias: 0121-8000-1113-9587-49<br>
A nombre de: URQUIZA Y GARCIA LOGISTICA SA DE CV <br><br>

<strong>SANTANDER</strong><br>
Cuenta: 65-50656553-7<br>
CLABE Interbancaria para transferencias: 0141-8065-5065-6553-79<br>
A nombre de: URQUIZA Y GARCIA LOGISTICA SA DE CV <br><br>



<!--			
					
					
                    <br><strong>BANCOMER</strong>
                    <br> Cuenta: 0194258703
                    <br> CLABE Interbancaria para transferencias: 0123-2000-1942-5870-31
                    <br> A nombre de: MASSIVE PC SA DE CV
                    <br>
                    <br>
                    <strong>SANTANDER</strong>
                    <br> Cuenta: 65-50403993-5
                    <br> CLABE Interbancaria para transferencias: 0143-2065-5040-3993-55
                    <br> A nombre de: MASSIVE PC SA DE CV
                    
                    <br><br><strong>BANORTE / IXE</strong>
                    <br> Cuenta: 0212962231
                    <br>CLABE Interbancaria para transferencias: 0723-2000-2129-6223-18
                    <br>A nombre de: MASSIVE PC SA DE CV
					-->		
                    <br>
                    <br>
                    <br> Envíos a todo México por <img alt="DHL" src="http://www.massivepc.com/mayoreo/dhl.jpg" />
                    <br> $100 Pesos por caja hasta 10Kg
                    <br><br>
                    <table id="table_chekcplus">
                        <tr>
                            <td valign="middle"><font face="Arial"><strong>Manejamos créditos con:</strong></font></td>
                            <td valign="middle"><img src="http://www.massivepc.com/boletin/checkplus.jpg?r=879"/></td>
                        </tr>
                    </table>
                    <br> *Precios con IVA incluido en MN sujetos a cambio sin previo aviso.
                    <br>
                    <br>
                </td>
            </tr>
        </table>
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

</body>
    

</html>