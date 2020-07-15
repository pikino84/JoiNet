<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <title>Panel de usuario</title>

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
	padding: 0 11px 0 13px;
	width: 400px;
	font-size: 15px;
	font-weight: 300;
}
#pac-input:focus {
	margin-left: -1px;
	padding-left: 14px;
	width: 401px;
}
#type-selector {
	color: #fff;
	background-color: #4d90fe;
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


</head>
<body>

<div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#" style="padding:5px;"><img src="<?=base_url()?>assets/img/logo.png" style="height:50px;"/></a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown" style="line-height:50px;">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <?=$logged_user->nombre?> <i class="caret">
                            </i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="<?=base_url()?>panel/salir">Salir</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <!--
                            Salud dental
                            Casos médicos
                        -->
                        <ul class="nav">
                            <li <?=($this->uri->segment(2)=='categorias')?'class="active"':''?> style="line-height:50px;">
                                <a href="<?=base_url()?>panel/categorias">Categorias</a>
                            </li> 
                            <li <?=($this->uri->segment(2)=='posts')?'class="active"':''?> style="line-height:50px;">
                                <a href="<?=base_url()?>panel/posts">Posts</a>
                            </li> 
                            <li <?=($this->uri->segment(2)=='acerca_de_mi')?'class="active"':''?> style="line-height:50px;">
                                <a href="<?=base_url()?>panel/acerca_de_mi">Acerca de mi</a>
                            </li> 
                            <li <?=($this->uri->segment(2)=='portafolio_descripcion')?'class="active"':''?> style="line-height:50px;">
                                <a href="<?=base_url()?>panel/portafolio_descripcion">Portafolio descripción</a>
                            </li>
                            <li <?=($this->uri->segment(2)=='portafolio_imagenes')?'class="active"':''?> style="line-height:50px;">
                                <a href="<?=base_url()?>panel/portafolio_imagenes">Portafolio imagenes</a>
                            </li>
                            <li <?=($this->uri->segment(2)=='multimedia')?'class="active"':''?> style="line-height:50px;">
                                <a href="<?=base_url()?>panel/multimedia">Multimedia</a>
                            </li>  
                            <li <?=($this->uri->segment(2)=='slider')?'class="active"':''?> style="line-height:50px;">
                                <a href="<?=base_url()?>panel/slider">Slider</a>
                            </li> 
                            <li <?=($this->uri->segment(2)=='banners_laterales')?'class="active"':''?> style="line-height:50px;">
                                <a href="<?=base_url()?>panel/banners_laterales">Banners laterales</a>
                            </li>
                            <li <?=($this->uri->segment(2)=='footer_imagenes')?'class="active"':''?> style="line-height:50px;">
                                <a href="<?=base_url()?>panel/footer_imagenes">Imagenes Footer</a>
                            </li>                            
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        
        
	<div style="height:30px;"></div>  
    <div>