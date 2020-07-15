<?
ini_set("display_errors", "1");
error_reporting(E_ALL);
?>
<!doctype html>

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>Elegate - Mayorista en equipo de cómputo</title>

    <META name="description" content="Venta de tablets, celulares, relojes inteligentes, guadalajara" />
    <META name="keywords" content="Tablet, Tablets, Mayoreo guadalajara, Tablets baratas guadalajara, celulares economicos guadalajara, electronicos baratos guadalajara, joinet guadalajara, elegate guadalajara, celulares, tabletas, Antenas, Espía, " />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style_buscador.css?cb=<?=md5(time())?>" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/bootstrap3/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?=base_url()?>assets/css/themes/default/default.css"/>
    <link rel="stylesheet" type="text/css" media="screen" href="<?=base_url()?>assets/css/nivo-slider.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?=base_url()?>assets/css/bootstrap-chosen.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?=base_url()?>assets/css/bootstrap-image-gallery.min.css" />
    
    <script>
        var base_path='/';
    </script>
        


    <style type="text/css">
        html body.modal-open div#myModal.modal.fade.in div.modal-backdrop{
            position: fixed;
        }
        .container{
            padding:0px;
        }
        html body div#wrapper_carrito{
            background:#fff;
            border:1px solid #bce8f1;
            border-radius: 0px;
            text-align: center;
            padding: 10px;
            min-width: 190px;
            width: auto;
        }
        #wrapper_carrito{
            cursor: pointer;
        }

        .ganador{
            position: fixed;
            top: 3%;
            left: 3%;
        }
        #plugin_facebook_mpc{
            right: 20px;
            top: 95px;
            z-index: 50;
            position: absolute;
            width: 250px;
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

<div id="wrapper_carrito" class="detalle_total">
    <a href="#" class="data_total btn btn-link"> </a> 
    <button class="btn btn-primary btn-xs" type="button">
        <i class="glyphicon glyphicon-shopping-cart"></i>
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
                    
                    <a id="logo_link_joinet" href="<?=base_url()?>?cb=<?=md5(time()*234)?>"><img src="<?=base_url()?>assets/img/logo_elegate.png?tme=2" alt="Joinet"></a>
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
                    <?
                    /*<a target="_blank" href="https://www.facebook.com/MassivePC/"><img src="<?=base_url()?>assets/img/facebook.png?df=fd"></a>
                    <a target="_blank" href="https://twitter.com/massivepcmx"><img src="<?=base_url()?>assets/img/twitter.png?df=fd"></a>
                    <a target="_blank" href="https://www.instagram.com/?hl=es-la"><img src="<?=base_url()?>assets/img/Insta.jpg?df=fd"></a>                    
                    <a target="_blank" href="https://www.youtube.com/channel/UCLVj-1wp2oUPTRtX7H5oahA?view_as=subscriber"><img src="<?=base_url()?>assets/img/you.jpg?df=fd"></a>                     
                    <div class="fb-like" data-href="https://www.facebook.com/MassivePC/" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>*/
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <h3 class="titulos_lista">Compra en Línea de Mayoreo</h3>
                </td>
            </tr>
        </table>

    <span id="wrapper_telefono_horario">
		<span class="glyphicon glyphicon-phone-alt"></span> <strong>Teléfono:</strong> 01 (33) 36247968 - 
		<span class="glyphicon glyphicon-time"></span> <strong>Horario:</strong> Lunes a Sabado 10:00 am – 7:00 pm<!--<br> Dom 10:30 am - 6:00 pm-->
		</span>
<!--        <span id="wrapper_telefono_horario"><span class="glyphicon glyphicon-phone-alt"></span> <strong>Teléfono:</strong> 01 (33) 3613-4587 - <span class="glyphicon glyphicon-time"></span> <strong>Horario:</strong> Lunes a Domingo 10:00 am – 7:30 pm <!--<br> Dom 10:30 am - 6:00 pm</span>-->
       
        <?
            $dias   =array( "Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
            $meses  =array( "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
            $fecha  =$dias[date( 'w')]. " ".date( 'd'). " de ".$meses[date( 'n')-1]. " del ".date( 'Y');
            date_default_timezone_set('America/Mexico_City');
            echo '<span id="last_update">Última actualización: '.$fecha. ' - '.date('h:i:s a').'</span>';
            $script_tz = date_default_timezone_get();
        ?>
        <br>

        

    <a target="_blank" href="<?=base_url()?>?cb=<?=md5(time())?>">
        <img id="img_principal" class="img-responsive" src="<?=base_url()?>assets/img/banner_principal.jpg?wwwwww=<?=md5(time())?>" />
    </a>
<br>
<img class="img-responsive" style="display: block; margin:auto;" src="<?=base_url()?>assets/img/BANNER-ELE-GATE.jpg?rnd=<?=md5(time())?>">

    <br>
    <h5 class="text-center" style="text-decoration: underline;"><a href="<?=base_url()?>?cb=<?=md5(time()*666)?>">Para actualizar la página presione <b>Ctrl + F5</b></a></h5><br>

    <h5 class="text-center" >Esta página carga más rápido en 
	<a target="_blank" href="http://www.microsoft.com/es-mx/windows/microsoft-edge">
	<img src="<?=base_url()?>assets/img/logo-edge.jpg?asdv=<?=md5(time())?>"></a> o 
	<a target="_blank" href="https://www.mozilla.org/es-MX/firefox/new/?scene=2">
	<img src="<?=base_url()?>assets/img/logo-firefox.jpg?asdv=<?=md5(time())?>"></a> </h5>
    
        
        <div style="clear:both;"></div>
        
        <br>