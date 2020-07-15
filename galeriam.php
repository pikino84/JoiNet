<?php 

error_reporting(-1);

require_once('tienda.php'); 

//('fecha.php'); 

$maxRows_gallery = 100;

$pageNum_gallery = 0;



$products_id=$_GET['products_id'];



if (isset($_GET['pageNum_gallery'])) {

$pageNum_gallery = $_GET['pageNum_gallery'];



}

$startRow_gallery = $pageNum_gallery * $maxRows_gallery;



mysql_select_db($database_gal, $gal);

$query_gallery = "SELECT * FROM products_gallery where products_id = '$products_id' ORDER BY priority ASC";

$query_limit_gallery = sprintf("%s LIMIT %d, %d", $query_gallery, $startRow_gallery, $maxRows_gallery);

$gallery = mysql_query($query_limit_gallery, $gal) or die(mysql_error());

$row_gallery = mysql_fetch_assoc($gallery);



$query_gallery2 = "SELECT * FROM products where products_id = '$products_id'";

$gallery2 = mysql_query($query_gallery2, $gal) or die(mysql_error());

$row_gallery2 = mysql_fetch_assoc($gallery2);



if (isset($_GET['totalRows_gallery'])) {

$totalRows_gallery = $_GET['totalRows_gallery'];

} else {

$all_gallery = mysql_query($query_gallery);

$totalRows_gallery = mysql_num_rows($all_gallery);

}

$totalPages_gallery = ceil($totalRows_gallery/$maxRows_gallery)-1;

//SELECT * FROM products where products_id = '$products_id'

$query_c = "

	



	SELECT * FROM products

	JOIN products_description ON products_description.products_id = products.products_id

	JOIN mayoreo_productos ON mayoreo_productos.fk_producto = products.products_id

	WHERE products.products_id = '$products_id'

";

$c = mysql_query($query_c, $conexion) or die(mysql_error());

$pr = mysql_fetch_assoc($c);

?>

<html>

<head>
		<meta charset="UTF-8">
		<title>.: ELE-GATE - Tienda OnLine :.</title>
		<meta http-equiv=imagetoolbar content=no>
		<style>body{margin:10px;}</style>
		<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
		<script src="https://www.massivepc.com/js/lightslider.js?t=8"></script>		
		<link rel="stylesheet" type="text/css" href="https://www.massivepc.com/css/lightslider.min.css?t=1">
		<link rel="stylesheet" type="text/css" href="https://www.massivepc.com/lib/css/stylesheet.min.css">
		<style>
    		.lSSlideOuter { border-bottom:solid thin #DADADA; }
    		#lightSlider li {list-style: none;}
			.lSSlideOuter .lSPager.lSGallery img{display: block;height: 60px;width: 80px;max-width: 100%;border:solid thin #DADADA;}	
			.lSSlideWrapper {max-width: 100%;overflow: hidden;position: relative;border-bottom:solid thin #DADADA;}	
		</style> 
	</head>

<body onselectstart="return false" ondragstart="return false">

<img style="display:block; margin:0 auto 10px;" src="http://elegate.mx/mayoreo/assets/img/logo_elegate.png?tme=2" alt="TIENDA ONLINE"/>


<!--
<div class="secbb">
	<center>
    	<img style="margin:15px;" id="img_big" src="/timthumb.php?src=/images/<?php 
		if($pr['products_imagelarge'] != ""){echo $pr['products_imagelarge'];}
		else{?>imagelargedefault.gif<?php } ?>&w=666&h=500&zc=2"/>
<?php     //   < ! --<img id="img_big" src="/images/<?php if($row_gallery['imagengrande'] != ""){echo $row_gallery['imagengrande'];}else{? >imagelargedefault.gif< ? php } ? >"/>-- >
?>	<center>
</div>
<br/>
-->
<?php /*if ($totalRows_gallery < 1) { echo ""; } else {*/
if($pr['products_imagelarge'] != ""){
$img_src='timthumb.php?src=images/'.$pr['products_imagelarge'].'&w=666&h=500&zc=2';	
	}
		else{
$img_src='timthumb.php?src=images/imagelargedefault.gif&w=666&h=500&zc=2';				
 }

 $img_gallery = '';

$img_gallery.='<li data-thumb="'.$img_src.'"><img src="'.$img_src.'" height="500px" /></li>';

?>
<div class="secbb"><center>
<!--
<img style="cursor:pointer;" src="/timthumb.php?src=/images/<?=$pr['products_imagelarge']?>&w=80&h=60" data-image="<?=$pr['products_imagelarge']?>" class="thumbbig hand"/>
-->

<?php if ($totalRows_gallery >= 1) {?>
<?php do { 
$img_src='timthumb.php?src=images/'.$row_gallery['imagengrande'].'&w=666&h=500&zc=2';
$img_gallery.='<li data-thumb="'.$img_src.'"><img src="'.$img_src.'" height="500px" /></li>';
?>

<!--
<img style="cursor:pointer;" src="/timthumb.php?src=images/<?=$row_gallery['imagengrande']?>&w=80&h=60" data-image="<?=$row_gallery['imagengrande']?>" alt="<?=$products_name?>" class="thumbbig hand"/>
-->
	<?php } while ($row_gallery = mysql_fetch_assoc($gallery)); ?></center></div>
<?php } ?>

<br/>

<center>
<script>
	$(function(){
		$('.thumbbig').on('click', function(){
			$('#img_big').attr('src','/timthumb.php?src=/images/'+$(this).data('image')+'&w=666&h=500&zc=2');
		});
		$('#image-gallery').lightSlider({
                gallery:true,
                item:1,
                thumbItem:9,
                slideMargin: 0,
                speed:500,
                auto:false,
                loop:false,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }  
            });		
	});
</script>

<!--<b><span style="font-size:14px">-->

<?php 

//echo '<span style="color:red">Existencias actuales: ';

//echo '<span style="color:red">Llamar por tel�fono. ';

// strftime("%d de ").$mes[date('n')].':</span> <span style="color:#1574AB ">';

 // if($row_gallery2['products_quantity']>0) 

 // echo $row_gallery2['products_quantity'];

 // else echo "Agotado";

//echo '</span>';

?><!--</span>

<br>-->

<? // echo 'Hora: '.date("h:i A"); ?>

				<div style="width: 666px;">
        <div class="item" style=" margin-bottom: 10px;">            
            <div class="clearfix" style="max-width:666px;" >
                <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
<?php echo $img_gallery;?>				 
                </ul>
            </div>
        </div>

    </div>

<div>

<?=mb_strtoupper($pr['products_name'])?> <br><br/>



Menudeo: <span style="color: red;"><strong>$<?=number_format(round($pr['products_price'] * 1.16,2)) ?></strong></span> &nbsp &nbsp &nbsp



Mayoreo: <span style="color: red;"><strong>$<?=number_format(round($pr['precio_mayoreo'],2)) ?></strong></span> &nbsp &nbsp &nbsp



Distribuidor: <span style="color: red;"><strong>$<?=number_format(round($pr['precio_distribuidor'],2)) ?></strong></span>



<br><br/>



Código:<?=$pr['products_id']?> &nbsp &nbsp &nbsp &nbsp &nbsp 



Disponibilidad: 

<?

	$query_gallery_cat = "SELECT * FROM mayoreo_productos where fk_producto = '$products_id' ;";

	$gallery2_cat = mysql_query($query_gallery_cat, $gal) or die(mysql_error());

	$row_gallery2_cat = mysql_fetch_assoc($gallery2_cat);



	$id_categoria = $row_gallery2_cat['fk_categoria'];



	//echo var_dump($row_gallery2_cat);



	$query_gallery_cat2 = "SELECT * FROM mayoreo_categorias where id_categoria = '$id_categoria' ;";

	$gallery2_cat2 = mysql_query($query_gallery_cat2, $gal) or die(mysql_error());

	$row_gallery2_cat2 = mysql_fetch_assoc($gallery2_cat2);




								if($products_id == '17508'){
                                    $ex = '350';
                                }elseif($products_id == '8438'){
                                    $ex = '550';
                                }elseif($products_id == '8439'){
                                    $ex = '571';
                                }elseif($products_id == '14884'){
                                    $ex = '533';
                                }elseif($products_id == '8437'){
                                    $ex = '534';
                                }else{
                                	$ex = $row_gallery2['sae_exist'] - 3;
                                }


	if($row_gallery2_cat2['id_categoria'] == '35'){
		if($row_gallery2['sae_exist'] <= '0'){
		    echo '<span style="color:#1A73AB;">Agotado</span>';
		}else{
			echo '<span style="color:#1A73AB;">'.$ex.'</span>';
		}
	}else{
		if($row_gallery2['sae_exist'] <= '0'){
		    echo '<span style="color:#1A73AB;">Agotado</span>';
		}else{
		    if($row_gallery2['sae_exist'] <= 3){
		        echo '<span style="color:#1A73AB;">Agotado</span>';
		    }else{
		    	$f = $row_gallery2['sae_exist'] - 3;
		        echo '<span style="color:#1A73AB;">' . $ex . '</span>';
		    }
		}
	}

?> 

</div>

<br>

Tel: 01 (33) 3613-4587 &nbsp &nbsp &nbsp &nbsp &nbsp Email: <a href="mailto:ventas@massivepc.com">ventas@massivepc.com</a>

<br/>

<br>





NOTA: Debido a las actualizaciones hechas por los fabricantes, es posible que las imágenes difieran del actual producto. 

Pueden ser enviadas versiones nuevas de este producto antes que la imagen sea actualizada.<br/><br/>

Copyright © <?=date('Y')?> Massive PC. Todos los derechos reservados.<br/>

Todas las marcas y logotipos son propiedad de sus respectivos dueños.


<br/>




</body>

</html>