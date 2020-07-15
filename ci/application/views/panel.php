<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <title>Panel de usuario</title>
<? foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?=$file?>" />
<? endforeach?>
<? foreach($js_files as $file): ?>
	<script src="<?=$file?>"></script>
<? endforeach?>
<script>
$(function(){
	/*$('input[type=text]').keyup(function() {
		$(this).val($(this).val().toUpperCase());
	});*/
});
</script>
<link href="<?=base_url()?>assets/vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
<link href="<?=base_url()?>assets/styles.css" rel="stylesheet" media="screen">
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
<script src="<?=base_url()?>assets/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
<style type='text/css'>
/*body
{
	font-family: Arial;
	font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
	text-decoration: underline;
}*/
.form-field-box{
	border:solid thin #8C8C8C;
	margin-bottom:5px;
	border-radius: 6px;
	padding:5px 0 0 5px;
	background:#CDCDCD;
}
.image-thumbnail img{width:50px; height:50px;}
	
.ui-timepicker-div .ui-widget-header { margin-bottom: 8px; }
.ui-timepicker-div dl { text-align: left; }
.ui-timepicker-div dl dt { float: left; clear:left; padding: 0 0 0 5px; }
.ui-timepicker-div dl dd { margin: 0 10px 10px 45%; }
.ui-timepicker-div td { font-size: 90%; }
.ui-tpicker-grid-label { background: none; border: none; margin: 0; padding: 0; }

.ui-timepicker-rtl{ direction: rtl; }
.ui-timepicker-rtl dl { text-align: right; padding: 0 5px 0 0; }
.ui-timepicker-rtl dl dt{ float: right; clear: right; }
.ui-timepicker-rtl dl dd { margin: 0 45% 10px 10px; }

.form-display-as-box{font-weight:bold;}

#map-canvas{
	width:100%;
	height:300px;
}
.controls {
	margin-top: 16px;
	height: 32px;
}
#pac-input {
    background-color: #fff;
    font-size: 15px;
    font-weight: 300;
    padding: 0 11px 0 13px;
    width: 400px;
}
#pac-input:focus {
	margin-left: -1px;
	padding-left: 14px;
	width: 401px;
}
#type-selector {
    background-color: #4d90fe;
    color: #fff;
    padding: 5px 11px 0px 11px;
}
#type-selector label {
	font-family: Roboto;
	font-size: 13px;
	font-weight: 300;
}
#target {
	width: 345px;
}
</style>
<!--<script src="vendors/jquery-1.9.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>-->
<script src="<?=base_url()?>assets/vendors/easypiechart/jquery.easy-pie-chart.js"></script>
<script src="<?=base_url()?>assets/js/jquery.mask.js"></script>
<script src="<?=base_url()?>assets/scripts.js"></script>
<script>
	$(function(){
		$('.fancybox').fancybox({
			autoWidth:true,
			autoHeight:true
		});	
	});
</script>
<!--<script src="/js/jquery.fancybox.pack.js"></script>-->
<style>
.dpblnk{position:absolute; width:100%; height:100%; background:#FFFFFF; z-index:9999999;}
</style>
</head>
<body>
<div id="dpblnk"></div>
<!--<div id="open_sae_iframe" style="display:none;">
	<iframe width="500" height="500" src="http://187.194.192.11:2425/"></iframe>
</div>-->

<div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#"><img style="height:50px" src="http://elegate.mx/mayoreo/assets/img/logo_elegate.png?tme=2"/></a>
                    
                    <? if($this->uri->segment(2)=='productos_print'){?>
						<script>
                            $(function(){
								$('body').css('padding','0');
								$('#dpblnk').addClass('dpblnk');
                                $('.print-anchor')[0].click();
                            });
                        </script>
                    <? }?>
                    
                    <div class="nav-collapse collapse" <?=($this->uri->segment(2)=='productos_print')?'style="display:none;"':''?>>
                        <ul class="nav pull-right">
                        	<!--<li>
                            	<span class="btn btn-danger fancybox" href="#open_sae_iframe">SAE</span>
                                
                        	</li>-->
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <?=$this->user->nombre?> <i class="caret">
                            </i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="<?=base_url()?>Panel/salir">Salir</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav">
                        	<? if($this->user->id_user=='1'){?>
                            <li style="line-height:50px;" <?=($this->uri->segment(2)=='productos')?'class="active"':''?>>
                                <a href="<?=base_url()?>Panel/productos">Productos Act.</a>
                            </li>
                            <li style="line-height:50px;" <?=($this->uri->segment(2)=='productos_todos')?'class="active"':''?>>
                                <a href="<?=base_url()?>Panel/productos_todos">Todos los productos</a>
                            </li>
                            <li style="line-height:50px;" <?=($this->uri->segment(2)=='uploads_2015')?'class="active"':''?>>
                                <a href="<?=base_url()?>Panel/uploads_2015">Multimedia</a>
                            </li>
                            <li style="line-height:50px;" <?=($this->uri->segment(2)=='mayoreo_archivos_admin')?'class="active"':''?>>
                                <a href="<?=base_url()?>Panel/mayoreo_archivos_admin">Archivos Mayoreo</a>
                            </li>
                            <li style="line-height:50px;" <?=($this->uri->segment(2)=='banners_header')?'class="active"':''?>>
                                <a href="<?=base_url()?>Panel/banners_header">Banners Header</a>
                            </li>
                            <li style="line-height:50px;" <?=($this->uri->segment(2)=='mayoreo_categorias')?'class="active"':''?>>
                                <a href="<?=base_url()?>Panel/mayoreo_categorias">Categorias Mayoreo</a>
                            </li>
                            <li style="line-height:50px;" <?=($this->uri->segment(2)=='mayoreo_productos')?'class="active"':''?>>
                                <a href="<?=base_url()?>Panel/mayoreo_productos">Productos Mayoreo</a>
                            </li>
                            <li style="line-height:50px;" <?=($this->uri->segment(2)=='marcas')?'class="active"':''?>>
                                <a href="<?=base_url()?>Panel/marcas">Marcas</a>
                            </li>
                            <li style="line-height:50px;" <?=($this->uri->segment(2)=='products_faq')?'class="active"':''?>>
                                <a href="<?=base_url()?>Panel/products_faq">Preguntas</a>
                            </li>
                            <li style="line-height:50px;" <?=($this->uri->segment(2)=='products_opinion')?'class="active"':''?>>
                                <a href="<?=base_url()?>Panel/products_opinion">Opiniones</a>
                            </li>
                            <li style="line-height:50px;" <?=($this->uri->segment(2)=='mayoreo_garantias')?'class="active"':''?>>
                                <a href="<?=base_url()?>Panel/mayoreo_garantias">Garantias</a>
                            </li>
                            <li style="line-height:50px;" <?=($this->uri->segment(2)=='mayoreo_garantias_cierres')?'class="active"':''?>>
                                <a href="<?=base_url()?>Panel/mayoreo_garantias_cierres">Cierres</a>
                            </li>
                            <li style="line-height:50px;" <?=($this->uri->segment(2)=='mayoreo_garantias_envios')?'class="active"':''?>>
                                <a href="<?=base_url()?>Panel/mayoreo_garantias_envios">Envíos</a>
                            </li>
                            <li style="line-height:50px;">
                                    <a target="_blank" href="https://elegate.mx/mayoreo/home/compras/a3807781fa06fa7cb5c11014839d2ea6">Compras Web</a>

                                </li>
                            <? }elseif($this->user->id_user=='4'){?>
                            	<li style="line-height:50px;" <?=($this->uri->segment(2)=='mayoreo_pedidos')?'class="active"':''?>>
                               	 	<a href="<?=base_url()?>Panel/mayoreo_pedidos">Mayoreo Pedidos</a>
                            	</li>
                                <li style="line-height:50px;" <?=($this->uri->segment(2)=='products_faq')?'class="active"':''?>>
                               	 	<a href="<?=base_url()?>Panel/products_faq">Preguntas</a>
                            	</li>
                                <li style="line-height:50px;" <?=($this->uri->segment(2)=='products_opinion')?'class="active"':''?>>
                                    <a href="<?=base_url()?>Panel/products_opinion">Opiniones</a>
                                </li>
                                <li style="line-height:50px;" <?=($this->uri->segment(2)=='mayoreo_garantias')?'class="active"':''?>>
                                    <a href="<?=base_url()?>Panel/mayoreo_garantias">Garantias</a>
                                </li>
                                <li style="line-height:50px;" <?=($this->uri->segment(2)=='mayoreo_garantias_envios')?'class="active"':''?>>
                                    <a href="<?=base_url()?>Panel/mayoreo_garantias_envios">Envíos</a>
                                </li>
                            <? }elseif($this->user->id_user=='5'){?>
                            	<li style="line-height:50px;" <?=($this->uri->segment(2)=='productos_inventario')?'class="active"':''?>>
                               	 	<a href="<?=base_url()?>Panel/productos_inventario">Productos</a>
                            	</li>
                            <? }elseif($this->user->id_user=='3'){?>
                            	<li style="line-height:50px;" <?=($this->uri->segment(2)=='correos_listas')?'class="active"':''?>>
                               	 	<a href="<?=base_url()?>Panel/correos_listas">Lista de correo</a>
                            	</li>
                                <li style="line-height:50px;" <?=($this->uri->segment(2)=='correos_totales')?'class="active"':''?>>
                               	 	<a href="<?=base_url()?>Panel/correos_totales">Todos los correos</a>
                            	</li>
                                <li style="line-height:50px;">
                                    <?
                                    	$atts = array(
										  'width'      => '800',
										  'height'     => '600',
										  'scrollbars' => 'yes',
										  'status'     => 'yes',
										  'resizable'  => 'yes',
										  'screenx'    => '0',
										  'screeny'    => '0'
										);
										echo anchor_popup('mail/limpiar2', 'Agregar Varios', $atts);
									?>
                            	</li>
                            <? }elseif($this->user->id_user=='9'){?>

                                <li style="line-height:50px;" <?=($this->uri->segment(2)=='productos_compras')?'class="active"':''?>>
                                    <a href="<?=base_url()?>Panel/productos_compras">Productos Act.</a>
                                </li>
                                <li style="line-height:50px;" <?=($this->uri->segment(2)=='productos_todos')?'class="active"':''?>>
                                <a href="<?=base_url()?>Panel/productos_todos">Todos los productos</a>
                            </li>
                                <li style="line-height:50px;" <?=($this->uri->segment(2)=='mayoreo_categorias')?'class="active"':''?>>
                                    <a href="<?=base_url()?>Panel/mayoreo_categorias">Categorias Mayoreo</a>
                                </li>
                                <li style="line-height:50px;" <?=($this->uri->segment(2)=='mayoreo_productos_compras')?'class="active"':''?>>
                                    <a href="<?=base_url()?>Panel/mayoreo_productos_compras">Productos Mayoreo</a>
                                </li>
                                <li style="line-height:50px;">
                                    <a target="_blank" href="https://elegate.mx/mayoreo/home/compras/a3807781fa06fa7cb5c11014839d2ea6">Compras Web</a>

                                </li>
                                <li style="line-height:50px;" <?=($this->uri->segment(2)=='ch_orders')?'class="active"':''?>>
                                    <a href="<?=base_url()?>Panel/ch_orders">China stock</a>
                                </li>

                            <? }elseif($this->user->id_user=='10'){?>

                                <li style="line-height:50px;" <?=($this->uri->segment(2)=='products_faq')?'class="active"':''?>>
                                    <a href="<?=base_url()?>Panel/products_faq">Preguntas</a>
                                </li>
                                <li style="line-height:50px;" <?=($this->uri->segment(2)=='products_opinion')?'class="active"':''?>>
                                    <a href="<?=base_url()?>Panel/products_opinion">Opiniones</a>
                                </li>

                            <? }elseif($this->user->id_user=='11'){?>

                                <li style="line-height:50px;" <?=($this->uri->segment(2)=='products_faq')?'class="active"':''?>>
                                    <a href="<?=base_url()?>Panel/products_faq">Preguntas</a>
                                </li>
                                <li style="line-height:50px;" <?=($this->uri->segment(2)=='products_opinion')?'class="active"':''?>>
                                    <a href="<?=base_url()?>Panel/products_opinion">Opiniones</a>
                                </li>

                                <? }elseif($this->user->id_user=='18'){?>

                                <li style="line-height:50px;" <?=($this->uri->segment(2)=='products_faq')?'class="active"':''?>>
                                    <a href="<?=base_url()?>Panel/products_faq">Preguntas</a>
                                </li>
                                <li style="line-height:50px;" <?=($this->uri->segment(2)=='products_opinion')?'class="active"':''?>>
                                    <a href="<?=base_url()?>Panel/products_opinion">Opiniones</a>
                                </li>

                            <? }elseif($this->user->id_user=='12'){?>

                                <li style="line-height:50px;" <?=($this->uri->segment(2)=='mayoreo_garantias')?'class="active"':''?>>
                                    <a href="<?=base_url()?>Panel/mayoreo_garantias">Garantias</a>
                                </li>
                                <li style="line-height:50px;" <?=($this->uri->segment(2)=='mayoreo_garantias_cierres')?'class="active"':''?>>
                                    <a href="<?=base_url()?>Panel/mayoreo_garantias_cierres">Cierres</a>
                                </li>
                                <li style="line-height:50px;" <?=($this->uri->segment(2)=='mayoreo_garantias_envios')?'class="active"':''?>>
                                    <a href="<?=base_url()?>Panel/mayoreo_garantias_envios">Envíos</a>
                                </li>
                            
                            <? }elseif($this->user->id_user=='13' || $this->user->id_user=='14' || $this->user->id_user=='15' || $this->user->id_user=='16'){?>
                                <li style="line-height:50px;" <?=($this->uri->segment(2)=='mayoreo_garantias')?'class="active"':''?>>
                                    <a href="<?=base_url()?>Panel/mayoreo_garantias">Garantias</a>
                                </li>

                            <? }elseif($this->user->id_user=='17'){?>
                                <li style="line-height:50px;" <?=($this->uri->segment(2)=='mayoreo_garantias')?'class="active"':''?>>
                                    <a href="<?=base_url()?>Panel/mayoreo_garantias">Garantias</a>
                                </li>

                            <? }elseif($this->user->id_user=='19'){?>
                                <li style="line-height:50px;" <?=($this->uri->segment(2)=='productos_compras_p')?'class="active"':''?>>
                                    <a href="<?=base_url()?>Panel/productos_compras_p">Productos</a>
                                </li>

                            <? }elseif($this->user->id_user=='20'){?>
                                <li style="line-height:50px;" <?=($this->uri->segment(2)=='ch_orders')?'class="active"':''?>>
                                    <a href="<?=base_url()?>Panel/ch_orders">China stock</a>
                                </li>

                            <? }else{?>
                            
                            <li style="line-height:50px;" <?=($this->uri->segment(2)=='productos_descripcion')?'class="active"':''?>>
                                <a href="<?=base_url()?>Panel/productos_descripcion">Productos</a>
                            </li>
                            <li style="line-height:50px;" <?=($this->uri->segment(2)=='uploads_2015')?'class="active"':''?>>
                                <a href="<?=base_url()?>Panel/uploads_2015">Multimedia</a>
                            </li>
                            
                            
                            <? }?>

                            
                            
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <style>
			.sae{position:fixed; right:10px; top:250px; z-index:999999;}
		</style>
        <? if($this->user->id_user=='1' || $this->user->id_user=='9'){?>
       <?
	   /*$atts = array(
              'width'      => '800',
              'height'     => '600',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0',
			  'class'	   =>'btn btn-danger'
            );

			echo '<div class="sae">'.anchor_popup('http://192.168.0.3:8080/', 'MyBusiness20', $atts).'</div>';*/
	   ?>
        <? }?>
	<div style="height:150px;"></div>  
    <div>
		<?=$output?>
    </div>
    <script type="text/javascript">


	$(function(){

         var caracteres = 140;
        $("#counter_js").html("Te quedan <strong>"+  caracteres+"</strong> caracteres.");
        $("#products_name_js").keyup(function(){
            if($(this).val().length > caracteres){
            $(this).val($(this).val().substr(0, caracteres));
            }
        var quedan = caracteres -  $(this).val().length;
        $("#counter_js").html("Te quedan <strong>"+  quedan+"</strong> caracteres.");
        if(quedan <= 10)
        {
            $("#counter_js").css("color","red");
        }
        else
        {
            $("#counter_js").css("color","black");
        }
        });
		
		/*$('#precio').blur(function(){
			valor = $('#precio').val();
			porc = 16/100;
			if(valor!=""){
				$('#precio_iva').val(parseFloat(valor*porc)+parseFloat(valor));
			}
		});*/
			
		$('#field-precio_neto').blur(function(){
			valor = $('#field-precio_neto').val();
			porc = 16/100;
			/*A1/(1+(B2/100))*/ 
			if(valor!=""){
				$('#field-products_price').val(valor/(1+porc));
			}
		});	
	
	});
	</script>
</body>
</html>
