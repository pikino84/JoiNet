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
    <link href="<?=base_url()?>assets/bootstrap3/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
    
    <script>
		var base_path='/mayoreo/';
	</script>
        
	<script type="text/javascript">
    
      /*var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-64096462-1']);
      _gaq.push(['_trackPageview']);
    
      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();*/
    
    </script>

	<style>
		.ui-effects-transfer {
			border:solid 1px #66afe9;
		}
	</style>

</head>
<body>
<div id="wrapper_carrito">
	<a id="open_c" style="display:block; color:#747474; outline:none;" href="#">
        <span class="carrito_icon" style="margin:0 15px;"></span>
        <strong>Carrito:</strong> <span id="total_items_j">Vacio</span>
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
        <div id="wrapper_checkout" style="padding-left:15px;">
            <!--<a id="pagar" style="width:15%; color:#FFFFFF;" class="btn btn-sm btn-success disabled"><strong>Cerrar pedido</strong> <span class="glyphicon glyphicon-menu-right"></span></a>-->
<a id="pagar" style="width:15%; color:#FFFFFF;" data-fancybox-type="iframe" class="btn btn-sm btn-success disabled fancybox" href="http://massivepc.com/mayoreo/pago"><strong>Cerrar pedido</strong> <span class="glyphicon glyphicon-menu-right"></span></a>
            
        </div>
       
    </div>
</div>
<div id="dialog_boletin" title="Error!" style="display:none;">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>La direccion de correo no es valida.</p>
</div>


    <div style=" width:1160px; margin:auto;">
        <table style="margin:auto; width:900px;">
            <tr>
                <td>
                    <a href="http://www.massivepc.com" target="_blank" style="display:block; float:left; margin-right:90px;"><img src="http://www.massivepc.com/mayoreo/Logo-Massive-Mayoreo.png" alt="Massivepc Mayoreo"></a>
                    <a href="http://www.joinet.com" target="_blank" style="display:block; float:left;"><img src="http://www.massivepc.com/mayoreo/Logo-Joinet_Mayoreo.png?tme=2" alt="Joinet"></a>
                </td>
                <td style="text-align:center; width:330px;">
                    <span style="font-family:'Trebuchet MS'; font-size: 13px; font-weight: bold; display:block; line-height:12px; margin-bottom:5px; color:#F72327;"><br> 
                        Suscríbete a nuestro boletín para obtener<br>promociones especiales<br>
                    </span>
                    <form id="inscription_newsletter" style="border:0" name="inscription_newsletter" action="http://www.massivepc.com/inscription_newsletter.php?action=process" method="post">
                        <input id="correo_boletin" name="newsletter_email" value="E-mail" onfocus="value=''" style="width:200px;">
                        <input type="submit" id="validar_mail" value="Suscribirse" name="submit">
                        <br>
                        <input name="newsletter_invite" type="hidden" value="1">
                    </form>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <h3 style="text-align:center; font-size:30px; margin-bottom:20px; color:#F72327; font-weight:bold;">Lista de precios de Mayoreo</h3>
                </td>
            </tr>
        </table>

        <span style="font-size:13px; display:block; text-align:center; margin-bottom:5px;"><strong>Teléfono:</strong> 01 (33) 4162-4337 - <strong>Horario:</strong> Lunes a Sábado 10:30 am – 7:30 pm, Domingo 10:30 am - 6:30 pm</span>
        
        
    <!--    <span style="font-size:13px; display:block; text-align:center; margin-bottom:5px;"><strong>Teléfono:</strong> 01 (33) 3613-4587 - <strong>Horario:</strong> Lunes a Sábado 10:30 am – 7:30 pm</span> -->
        
        
        <?
			$dias	=array( "Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
			$meses	=array( "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
			$fecha	=$dias[date( 'w')]. " ".date( 'd'). " de ".$meses[date( 'n')-1]. " del ".date( 'Y');
			echo '<span style="font-size:13px; display:block; text-align:center;">Última actualización: '.$fecha. '</span>';
		?>
        <br>
        <br>

        <!--<ul id="banners">
            <? /*foreach($banners as $banner):?>
            <li>
                <a target="_blank" href="<?=$banner->link?>">
                	<img alt="" src="<?=base_url()?>banners/<?=$banner->banner?>"/>
                </a>
            </li>
            <? endforeach*/?>
           
        </ul>-->
        <div style="clear:both;"></div>
		
        <br>
        <div id="seleccion">
            <!--<tr>-->
                <table class="table_1">
                    <tr>
                        <td>CODIGO</td>
                        <td>MODELO</td>
                        <td>DESCRIPCI&Oacute;N</td>
                        <td>MARCA</td>
                        <td>IMAGEN</td>
                        <td>PRECIO PUBLICO</td>
                        <td>PRECIO MAYOREO ($5,000)</td>
                        <td>PRECIO DISTRIBUIDOR ($20,000)</td>
                        <td></td>
                    </tr>
                    <? foreach($categories as $categorie):?>
                    <tr>
                        <td class="td_cat" colspan="9">
                            <?=$categorie->categoria?>
                        </td>
                    </tr>

                    <? $this->data['products'] = $this->products_model->get_products(array('fk_categoria'=>$categorie->id_categoria))?>

                    <? foreach($this->data['products'] as $product):?>
                    <? $con_iva = $product->products_price + (16*($product->products_price/100));?>
					
                    <tr>
                        <td class="p5 p_td" style="width:67px;">
                            <a href="http://www.massivepc.com/-p-<?=$product->products_id?>.html" target="_blank"><?=$product->products_id?></a>
                        </td>
                        <td class="p5 p_td" style="text-align: center; text-transform:uppercase; width:157px;">
                            <? if(!empty($product->products_model)){ echo $product->products_model; }else{ echo 'N/A'; }?>
                        </td>
                        <td class="p5" style="height:87px; width:342px; background:#ffffff;">
                            <a style=" text-align:left; display:block; text-transform:uppercase; font-size: 14px;" target="_blank" class="ml2" href="http://www.massivepc.com/-p-<?=$product->products_id?>.html">
								<?=$product->products_name?>
                            </a>
                        </td>
                        <td class="p5" style="text-align:center; background:#ffffff; width:70px;">
							<img alt="Fabricante" src="<?=base_url()?>timthumb.php?src=/images/<?=$product->manufacturers_image?>&w=60&h=30&zc=2" height="30" width="60">
                        </td>
                        <td class="p5" style="text-align: center; background:#ffffff; width:118px;">
                            <a target="_blank" href="http://www.massivepc.com/-p-<?=$product->products_id?>.html">
                            	<img src="<?=base_url()?>timthumb.php?src=/images/<?=$product->products_image?>&w=80&h=60&zc=2" alt=" "/>
                            </a>
                        </td>
                        <td class="p5" style="background:#fff; height:87px; width:80px;">
                            <span style="color:#F72327; font-size:15px;">$<?=number_format(round($con_iva,2))?></span>
                        </td>
                        <td class="p5" style="background:#fff; height:87px; width:97px;">
                        	<span style="color:#F72327; font-size:15px;">$<?=number_format($product->precio_mayoreo)?></span>
						</td>
                        <td class="p5" style="background:#fff; height:87px; width:127px;">
                        	<span style="color:#F72327; font-size:15px;">$<?=number_format($product->precio_distribuidor)?></span>
						</td>
                        <td class="p5" style="width:100px;">
                        	<input class="form-control cantidad" type="text" placeholder="Cantidad" style="font-weight:normal;" />
                        	<a href="#" data-id="<?=$product->products_id?>" data-imagen="<?=$product->products_image?>" data-price="<?=$con_iva?>" data-mayoreo="<?=$product->precio_mayoreo?>" data-distribuidor="<?=$product->precio_distribuidor?>" data-name="<?=url_title($product->products_name,' ',FALSE)?>" class="btn btn-xs btn-primary agregar">Agregar</a>
                        </td>
                    </tr>


                    <? endforeach?>

                    <? endforeach?>




                </table>
        </div>
        
        <br>
        <div style="width:100px; margin:auto;"><a class="btn btn-xs btn-default" href="javascript:openwindow()">Imprimir Lista</a></div>
        <br>
        <style>
			#boletines{ width:700px; margin:auto;}
			#boletines ul{float:left; width:33%;}
			#boletines ul li{ text-transform:uppercase;}
			.b_col2{padding-left:50px;}
		</style>
        <h3 style="color:#F72327; text-align:center; font-size:26px; margin-bottom:20px;">Historial de boletines</h3>
        <div id="boletines">
        	<ul>
				<li><a target="_blank" href="http://massivepc.com/boletin/boletin_refacciones.html">Refacciones para Tablets</a></li>
                <li><a target="_blank" href="http://massivepc.com/boletin/boletin_estafeta.html">Guías prepagadas de Estafeta</a></li>
                <li><a target="_blank" href="http://massivepc.com/boletin/boletin_focos.html">Focos de led Joinet</a></li>
                <li><a target="_blank" href="http://massivepc.com/boletin/boletin_bocinas.html">Bocinas con agua danzantes</a></li>
                <li><a target="_blank" href="http://massivepc.com/boletin/boletin_ergostand.html">Base enfriadora</a></li>
                <li><a target="_blank" href="http://massivepc.com/boletin/boletin_focos_led.html">Foco de led mp3 bluetooth</a></li>
            	<li><a target="_blank" href="http://massivepc.com/boletin/j13quadcore.htm">J13 Quad Core!</a></li>
			</ul>
			<ul class="b_col2">
            	<li><a target="_blank" href="http://massivepc.com/boletin/boletin_quadcopter.html">Quad Copter</a></li>
                <li><a target="_blank" href="http://massivepc.com/boletin/boletin_smartwatch.html">Smart Watch</a></li>
                <li><a target="_blank" href="http://massivepc.com/boletin/boletin_powerbank.html">Power Bank</a></li>
                <li><a target="_blank" href="http://massivepc.com/boletin/boletin_noisy.html">J13QC Noisy</a></li>
                <li><a target="_blank" href="http://massivepc.com/boletin/boletin_mp3.html">Mp3 Joinet</a></li>
                <li><a target="_blank" href="http://massivepc.com/boletin/boletin_kimtigo.html">Memorias Kimtigo</a></li>
                <li><a target="_blank" href="http://massivepc.com/boletin/boletin_telcel.html">Chips Telcel</a></li>
			</ul>
			<ul class="b_col2">
            	<li><a target="_blank" href="http://massivepc.com/boletin/boletin_bocina_links.html">Bocinas Links Bits</a></li>
            	<li><a target="_blank" href="http://massivepc.com/boletin/boletin_jgamers.html">Jgamers Quad Core</a></li>
                <li><a target="_blank" href="http://massivepc.com/boletin/boletin_jpocket.html">JPocket</a></li>
                <li><a target="_blank" href="http://massivepc.com/boletin/boletin_j90.html">J90 Quad Core</a></li>
                <li><a target="_blank" href="http://massivepc.com/boletin/boletin_fundasconteclado.html">Fundas con teclado</a></li>
                <li><a target="_blank" href="http://massivepc.com/boletin/boletin_fundas_silicon.html">Fundas de silicón</a></li>
                <li><a target="_blank" href="http://massivepc.com/boletin/boletin_cristal.html">Cristal Templado</a></li>
                <li><a target="_blank" href="http://massivepc.com/boletin/boletin_case_motomo.html">Cases Motomo iPhone 6</a></li>
            </ul>
        </div>
        <div style="clear:both;"></div>
        <br>
        <h3 style="color:#F72327; text-align:center; font-size:26px; margin-bottom:20px;">Boletín de la computación de Abril </h3>
        <table style="margin:auto; width:1160px; border:solid thin #000000;">
            <tr style="background:#fff;">
                <td style="border:solid thin #000000;"><img alt="Boletín Mayoreo" src="<?=base_url()?>timthumb.php?src=<?=base_url()?>assets/uploads/boletin/0.jpg&w=578&h=748&zc=2"></td>
                <td style="border:solid thin #000000;"><img alt="Boletín Mayoreo" src="<?=base_url()?>timthumb.php?src=<?=base_url()?>assets/uploads/boletin/1.jpg&w=578&h=748&zc=2"></td>
            </tr>
            <tr>
                <td style="border:solid thin #000000;"><img alt="Boletín Mayoreo" src="<?=base_url()?>timthumb.php?src=<?=base_url()?>assets/uploads/boletin/2.jpg&w=578&h=748&zc=2"></td>
                <td style="border:solid thin #000000;"><img alt="Boletín Mayoreo" src="<?=base_url()?>timthumb.php?src=<?=base_url()?>assets/uploads/boletin/3.jpg&w=578&h=748&zc=2"></td>
            </tr>
        </table>
        <br>
        <table style="border:solid thin #000000; margin:auto; width:774px; height:330px;">
            <tr style="background:#fff;">
                <td>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3732.8793486440263!2d-103.34723199999995!3d20.674487000000006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428b1fa80084ef9%3A0x195b5fdea7d0a86c!2sJoinet!5e0!3m2!1ses!2smx!4v1414014584784" style="border:0; width:746px; height:300px; margin:auto;"></iframe>
                </td>
            </tr>
        </table>
        <!--<br>
        <table style="border-collapse: collapse;" border="1" cellspacing="0" width="774">
            <tr>
                <td align="center">
                    <a class="fancybox" href="http://massivepc.com/mayoreo/m6.jpg">
                        <img src="http://massivepc.com/mayoreo/m5.jpg" width="774" height="349" alt="" />
                    </a>
                </td>
            </tr>
        </table>-->
        <br>
        <table style="font-family: Arial, Helvetica, sans-serif;  font-size:12px; margin:auto; width:774px; height:200px; border:solid thin #000000;">
            <tr style="text-align:center; background:#f2f2f2;">
                <td style="width:385px; height:300px;border-right:solid thin #000000;">
					<img src="<?=base_url()?>timthumb.php?src=m1.jpg&w=384&h=300&zc=2" width="384" height="300" alt="" />
                </td>
                <td style="width:387px; height:300px;">
					<img src="<?=base_url()?>timthumb.php?src=m2.jpg&w=384&h=300&zc=2" width="387" height="300" alt="" />
                </td>
            </tr>
            </table>
			<table style="font-family: Arial, Helvetica, sans-serif;  font-size:12px; margin:auto; width:774px; height:200px; border:solid thin #000000;">

            <tr style="text-align:center; background:#f2f2f2;">
                <!--<td style="width:193px; height:200px; border:solid thin #000000;">
                	<img src="http://massivepc.com/mayoreo/masivejoinetlogos.png" width="150" height="150" alt="" />
                </td>-->
                <td style="width:258px; height:200px; border:solid thin #000000;"><b>Domicilio</b>
                    <br> Av.16 de Septiembre No. 137
                    <br>(Frente a la Plaza de la Tecnología)
                    <br> Entre Av.Júarez y López Cotilla
                    <br>Guadalajara Centro
                    <br>Jalisco, México></td>
                <td style="width:258px; height:200px; border:solid thin #000000;">
                    <p><b>Teléfono</b>
                        <br>01 (33) 3613-4587
                        <br>
                        <p><b>Email:</b>
                            <br>mayoreo@massivepc.com</p>
                </td>
                <td style="width:258px; height:200px; border:solid thin #000000;">
                    <p>Contáctanos por
                        <br>
                        <img src="http://massivepc.com/mayoreo/watsp-01.png" width="128" height="36" alt="" />
                        <br> 333440-0228
                        <br> 332012-3946
                        <br> 331400-5144
                        <br> 332012-6743
                        <br> 331106-6729
                        <br> 331109-7339
                    </p>
                </td>
            </tr>
            <tr>
                <td style="text-align:center; width:774px; height:60px; background:#f2f2f2;" colspan="4">
                    <br><strong>CUENTAS BANCARIAS</strong>
                    
                    
                    <br>
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
				
					
<strong>BANAMEX</strong>
						<br> Cuenta: 3461378
<br> Sucursal: 7013 
<br> CLABE Interbancaria para transferencias: 0023-2070-1334-6137-84
<br> A nombre de: MASSIVE PC SA DE CV
      <br><br>	                    
                    
                    <strong>BANCOMER</strong>
                    <br> Cuenta: 0194258703
                    <br> CLABE Interbancaria para transferencias: 0123-2000-1942-587-031
                    <br> A nombre de: MASSIVE PC SA DE CV
                    <br>
                    <br>
                    <strong>SANTANDER</strong>
                    <br> Cuenta: 65-50403993-5
                    <br> CLABE Interbancaria para transferencias: 0143-2065-5040-399-355
                    <br> A nombre de: MASSIVE PC SA DE CV
                    
                    <br><br><strong>IXE / BANORTE</strong>
                    <br> Cuenta: 0212962231
                    <br>CLABE Interbancaria para transferencias: 072-320-00212962231-8
                    <br>A nombre de: MASSIVE PC SA DE CV
-->						
                    <br>
                    <br>
                    <br> Envíos a todo México por <img alt="DHL" src="http://massivepc.com/mayoreo/dhl.jpg" />
                    <br> $100 Pesos por caja hasta 10Kg
                    <br><br>
                    <table style="margin:auto;">
            <tr>
                <td valign="middle"><font face="Arial"><strong>Manejamos créditos con:</strong></font></td>
                <td valign="middle"><img src="http://massivepc.com/boletin/checkplus.jpg?r=879"/></td>
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
    	<a id="ver_pago" class="fancybox" data-fancybox-type="iframe" href="http://massivepc.com/mayoreo/pago"></a>
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
    <script type="text/javascript">
	
		function imprSelec(nombre){
			var ficha = document.getElementById(nombre);
			var ventimp = window.open(' ', 'popimpr');
			ventimp.document.write(ficha.innerHTML);
			ventimp.document.close();
			ventimp.print();
			ventimp.close();
		}
		
		function openwindow()
		{
			window.open("http://massivepc.com/ci/panel/productos_print","mywindow","menubar=0,resizable=0,width=1,height=1");
		}
			
		$(document).ready(function(){
			
			$('.fancybox').fancybox({
				afterClose:function(){
					//$('#actualizar')[0].click();
					location.href='?';
				}
			});
			
			total_items();
			contents();
						
			console.log('<?=$this->agent->browser().'-'.$this->agent->version()?>');
			
			$('#open_c').on('click',function(e){
				e.preventDefault();
				
				//$('#arrow_triangle').removeClass('glyphicon-triangle-bottom');
				$('#arrow_triangle').addClass('cerrar_btn');
				$('#wrapper_carrito').css('margin','auto').animate({
					position:'absolute',
					width:1160,
					height:'100%', 
					top:0,
					bottom:0,
					left:0,
					right:0,
					'margin':'auto'
				},'slow','',function(){
					$('#wrapper_items').slideDown();
				});
			});
			
			$('#arrow_triangle').on('click', function(e){
				e.preventDefault();
				$('#arrow_triangle').removeClass('cerrar_btn');
				//$('#arrow_triangle').addClass('glyphicon-triangle-bottom');
				$('#wrapper_items').slideUp('slow',function(){
					$('#wrapper_carrito').animate({
						width: 250,
						height:45,
						position:'fixed',
						top:20,
						right:20
					}).css({left:'auto',bottom:'auto'});
				});
			});

            $('#validar_mail').click(function() {
                var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
                if (regex.test($('#correo_boletin').val().trim())) {} else {
                    $('#inscription_newsletter').on('submit', function(e) {
                        e.preventDefault();
                    });
                    $('#dialog_boletin').dialog({
                        modal: true
                    });
                }
            });
			
            $('.agregar').on('click', function(e) {
				
                e.preventDefault();
				
                var id = $(this).data('id');
                var price = $(this).data('price');
				var mayoreo = $(this).data('mayoreo');
				var distribuidor = $(this).data('distribuidor');
                var name = $(this).data('name');
				var imagen = $(this).data('imagen');
                var qty = $(this).prev('input').val();
                var dataS = {
                    'id': id,
                    'name': name,
                    'qty': qty,
					'price': price,
					'mayoreo': mayoreo,
					'distribuidor': distribuidor,
					'imagen': imagen
                };
				
				$(this).effect('transfer', { to: $('#wrapper_carrito')}, 1000, function(){
					//
					$.ajax({
						url: base_path+'carrito/agregar',
						type: "POST",
						data: dataS,
						dataType: 'json',
						success: function(data_tra){
							console.log(data_tra);
							total_items();
							//$('#total_items_j').html(data_tra+' Productos');
							contents();
							$('.cantidad').val('');
						},
						error: function(w,t,f) {
							alert(w + "\n" + t + "\n" + f);
						}
					});
				
				});
                
            });
			
			function total_items(){
				$.getJSON(base_path+'carrito/total_items',function(data_total){
					console.log(data_total);
					$('#total_items_j').html(data_total+' Productos');
					//document.getElementById('total_items_j').innerHTML = data_total+' Productos';
					/*var htmlString = data_total+' Productos';
					$('#total_items_j').text( htmlString );*/
				});
			}
			
			function remove_p(){
				$('.remove_p').on('click', function(e){
					e.preventDefault();
					var rowid_d=$(this).data('id');
					var dataS = {'rowid':rowid_d};
					$.getJSON(base_path+'carrito/eliminar',dataS,function(data_e_g){
						total_items();
						contents();
					});
				});
			}
			
			function editar_qty(dataSe){
				$.ajax({
					url: base_path+'carrito/editar',
					type: "POST",
					data: dataSe,
					dataType: 'json',
					success: function(data_edit) {
						total_items();
						contents();
					}
				});
			}
			
			
			
			function contents(){
				var producto='<li> <span style="text-align:center; margin-left:0px;"><strong>Producto(s)</strong></span> <span style="text-align:center; margin-left:730px;"><strong>Cantidad</strong></span> <span style="text-align:center;"><strong>P.Unitario</strong></span> <span style="text-align:center;"><strong>Subtotal</strong></span> <span style="text-align:center;"><strong>Quitar</strong></span> <div class="clearfix"></div></li>';
				var p_precio=0;
				var p_mayoreo=0;
				var p_distribuidor=0;
				$.getJSON(base_path+'carrito/contents',function(data){
					$.each(data, function(i, v) {
						producto +='<li class="item_cart" id="'+v.rowid+'">';
							producto +='<img src="http://www.massivepc.com/images/'+v.options.imagen+'" />';
							producto +='<p>'+v.name+'</p>';
							producto +='<input type="text" class="form-control qty_key" value="'+v.qty+'" />';
							producto +='<span class="list_pp">'+v.price+'</span>';
							producto +='<span class="list_pp">'+parseInt(v.price * v.qty)+'</span>';
							producto +='<span class="list_pm">'+v.options.mayoreo+'</span>';
							producto +='<span class="list_pm">'+parseInt(v.options.mayoreo * v.qty)+'</span>';
							producto +='<span class="list_pd">'+v.options.distribuidor+'</span>';
							producto +='<span class="list_pd">'+parseInt(v.options.distribuidor * v.qty)+'</span>';
							producto +='<a href="#x" data-id="'+v.rowid+'" class="remove_p btn btn-xs btn-danger glyphicon glyphicon-remove"></a>';
							producto +='<div class="clearfix"></div>';
						producto +='</li>';
						p_precio += parseInt(v.price * v.qty);
						p_mayoreo += parseInt(v.options.mayoreo * v.qty);
						p_distribuidor += parseInt(v.options.distribuidor * v.qty);
					});
					var label_act='';
					$('#items').html('<ul>'+producto+'<li style="display:none;"><br>'+label_act+'<br><button id="actualizar" class="btn btn-xs btn-primary" type="button">Actualizar carrito</button></li></ul>');
					
					$('#subtotal_publico,#subtotal_mayoreo,#subtotal_distribuidor').removeClass('tachado');
					$('#subtotal_publico,#subtotal_mayoreo,#subtotal_distribuidor').removeClass('validado');
					$('.list_pp,.list_pm,.list_pd').hide();
					
					if(p_distribuidor > 19999){
						$('#subtotal_mayoreo').addClass('tachado');
						$('#subtotal_publico').addClass('tachado');
						$('#subtotal_distribuidor').addClass('validado');
						$('#total').text(p_distribuidor + 99);
						$('#pagar,#actualizar').removeClass('disabled');
						$('.list_pd').show();
					}else if(p_mayoreo > 4999){
						$('#subtotal_publico').addClass('tachado');
						$('#subtotal_distribuidor').addClass('tachado');
						$('#subtotal_mayoreo').addClass('validado');
						$('#total').text(p_mayoreo + 99);
						$('#pagar,#actualizar').removeClass('disabled');
						$('.list_pm').show();
					}else{
						$('#subtotal_distribuidor').addClass('tachado');
						$('#subtotal_mayoreo').addClass('tachado');
						$('#subtotal_publico').addClass('validado');
						$('#total').text(p_precio + 99);
						if($('#total').text()<=99){
							$('#pagar,#actualizar').addClass('disabled');
						}else{
							$('#pagar,#actualizar').removeClass('disabled');
						}
						$('.list_pp').show();
					}
					
					$('#subtotal_publico').text(p_precio);
					$('#subtotal_mayoreo').text(p_mayoreo);
					$('#subtotal_distribuidor').text(p_distribuidor);
					$('#subtotal_publico,#subtotal_mayoreo,#subtotal_distribuidor,.list_pp,.list_pm,.list_pd').currency({
						region: 'MXN'
					});
					
					$('#total').currency({
						region: 'MXN'
					});
					
					$('.qty_key').keyup(function() {
						var arr_m = new Array;
						$('.item_cart').each(function() {
							var rowid = $(this).attr('id');
							var qty = $(this).find('input').val();
							arr_m.push({'rowid':rowid,'qty':qty});
						});
						var myJsonString = JSON.stringify(arr_m);
						$.ajax({
							url: base_path+'carrito/editar',
							type: "POST",
							data: {'data':myJsonString},
							dataType: 'json',
							success: function(data_r_ku){
								console.log(data_r_ku);
								total_items();
								contents();
							}
						});
					});
					
					remove_p();
					
				});
			}


        });
    </script>

</body>
    

</html>