<?php
require('includes/application_top.php');
require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_PRODUCT_INFO);
$product_check_query = tep_db_query("select count(*) as total from products p, products_description pd where p.products_status = 1 and p.products_id = ".(int)$HTTP_GET_VARS['products_id']);
$product_check = tep_db_fetch_array($product_check_query);

      global $customer_id;
	  $account_query = tep_db_query("select * from " . TABLE_CUSTOMERS . " where customers_id = '" . (int)$customer_id . "'");
	  $account = tep_db_fetch_array($account_query);
$ex=1;
	  /*if($account['customers_iva']==1||$_GET['iva']=='on')
		{$ex=1;}
		else {$ex=0;}*/
?>
<?php
include("imagfunction.php");
require_once('tienda.php'); 

//$query_a = "SELECT * FROM products_description pd, mayoreo_productos mp WHERE mp.fk_categoria != '21' AND pd.products_id = '". (int)$products_id . "'";
$query_a = "SELECT * FROM products_description pd
JOIN mayoreo_productos mp ON mp.fk_producto = pd.products_id
WHERE pd.products_id = '". (int)$products_id . "' AND mp.fk_categoria != 21";
$a = mysql_query($query_a, $conexion) or die(mysql_error());
$tienda = mysql_fetch_assoc($a);

//$query_c = "SELECT * FROM products where products_id = '$products_id'";
$query_c = "SELECT * FROM products pd
JOIN mayoreo_productos mp ON mp.fk_producto = pd.products_id
WHERE pd.products_id = '". $products_id . "' AND mp.fk_categoria != 21";
$c = mysql_query($query_c, $conexion) or die(mysql_error());
$pr = mysql_fetch_assoc($c);
if($pr === false){
    header("Location: http://www.massivepc.com/");
    die();
}
/*echo 'test';
echo var_dump($pr);
echo 'test';*/

$products_name = $tienda['products_name'];
$fabricante = $pr['manufacturers_id'];

$query_b = "SELECT * FROM manufacturers where manufacturers_id = '$fabricante'";
$b = mysql_query($query_b, $conexion) or die(mysql_error());
$fabricantes = mysql_fetch_assoc($b);
//$imagen_ex=$fabricantes['imag_ex'];
$imagen_ex=$fabricantes['manufacturers_image'];
?>
<?
$maxRows_tienda1 = 10;
$pageNum_tienda1 = 0;
if (isset($_GET['pageNum_tienda1'])) {
$pageNum_tienda1 = $_GET['pageNum_tienda1'];
}
$startRow_tienda1 = $pageNum_tienda1 * $maxRows_tienda1;

mysql_select_db($database_tienda1, $tienda1);
$query_tienda1 = "SELECT * FROM products_opinion where products_id = '$products_id' order by apo desc";
$query_limit_tienda1 = sprintf("%s LIMIT %d, %d", $query_tienda1, $startRow_tienda1, $maxRows_tienda1);
$tienda1 = mysql_query($query_limit_tienda1, $tienda1) or die(mysql_error());
$row_tienda1 = mysql_fetch_assoc($tienda1);

if (isset($_GET['totalRows_tienda1'])) {
$totalRows_tienda1 = $_GET['totalRows_tienda1'];
} else {
$all_tienda1 = mysql_query($query_tienda1);
$totalRows_tienda1 = mysql_num_rows($all_tienda1);
}
$totalPages_tienda1 = ceil($totalRows_tienda1/$maxRows_tienda1)-1;

$queryString_tienda1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
$params = explode("&", $_SERVER['QUERY_STRING']);
$newParams = array();
foreach ($params as $param) {
if (stristr($param, "pageNum_tienda1") == false && 
stristr($param, "totalRows_tienda1") == false) {
array_push($newParams, $param);
}
}
if (count($newParams) != 0) {
$queryString_tienda1 = "&" . htmlentities(implode("&", $newParams));
}
}
$queryString_tienda1 = sprintf("&totalRows_tienda1=%d%s", $totalRows_tienda1, $queryString_tienda1);
?>
<?
$maxRows_faqtienda = 10;
$pageNum_faqtienda = 0;
if (isset($_GET['pageNum_faqtienda'])) {
$pageNum_faqtienda = $_GET['pageNum_faqtienda'];
}
$startRow_faqtienda = $pageNum_faqtienda * $maxRows_faqtienda;

mysql_select_db($database_faqtienda, $faqtienda);
$query_faqtienda = "SELECT * FROM products_faq where (aprove is null or aprove = '1') and products_id = '$products_id' ORDER BY `faq` DESC ";
$query_limit_faqtienda = sprintf("%s LIMIT %d, %d", $query_faqtienda, $startRow_faqtienda, $maxRows_faqtienda);
$faqtienda = mysql_query($query_limit_faqtienda, $faqtienda) or die(mysql_error());
$row_faqtienda = mysql_fetch_assoc($faqtienda);

if (isset($_GET['totalRows_faqtienda'])) {
$totalRows_faqtienda = $_GET['totalRows_faqtienda'];
} else {
$all_faqtienda = mysql_query($query_faqtienda);
$totalRows_faqtienda = mysql_num_rows($all_faqtienda);
}
$totalPages_faqtienda = ceil($totalRows_faqtienda/$maxRows_faqtienda)-1;

$queryString_faqtienda = "";
if (!empty($_SERVER['QUERY_STRING'])) {
$params = explode("&", $_SERVER['QUERY_STRING']);
$newParams = array();
foreach ($params as $param) {
if (stristr($param, "pageNum_faqtienda") == false && 
stristr($param, "totalRows_faqtienda") == false) {
array_push($newParams, $param);
}
}
if (count($newParams) != 0) {
//$queryString_faqtienda = "&" . htmlentities(implode("&", $newParams));
}
}
$queryString_faqtienda = sprintf("&totalRows_faqtienda=%d%s", $totalRows_faqtienda, $queryString_faqtienda);
?>
<?php 
$maxRows_gallery = 4;
$pageNum_gallery = 0;
if (isset($_GET['pageNum_gallery'])) {
$pageNum_gallery = $_GET['pageNum_gallery'];
}
$startRow_gallery = $pageNum_gallery * $maxRows_gallery;

mysql_select_db($database_gal, $gal);
$query_gallery = "SELECT * FROM products_gallery where products_id = '$products_id' ORDER BY priority ASC";
$query_limit_gallery = sprintf("%s LIMIT %d, %d", $query_gallery, $startRow_gallery, $maxRows_gallery);
$gallery = mysql_query($query_limit_gallery, $gal) or die(mysql_error());
$row_gallery = mysql_fetch_assoc($gallery);

if (isset($_GET['totalRows_gallery'])) {
$totalRows_gallery = $_GET['totalRows_gallery'];
} else {
$all_gallery = mysql_query($query_gallery);
$totalRows_gallery = mysql_num_rows($all_gallery);
}
$totalPages_gallery = ceil($totalRows_gallery/$maxRows_gallery)-1;

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<title><?=strtoupper($tienda['products_name'])?></title>
<meta name="title" content="<?php echo $tienda['products_name']; ?>">
<meta name="author" content="<?php echo $products_id; ?>">
<meta name="keywords" content="<?php echo $tienda['products_name']; ?>">
<meta name="description" content="<?php echo $tienda['products_name']; ?>">

<meta property="fb:admins" content="100000044668260,100003114518465"/>
<base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>">
<link rel="stylesheet" type="text/css" href="stylesheet.css">
<link rel="stylesheet" type="text/css" href="css/themes/default/default.css">
<link rel="stylesheet" type="text/css" href="css/nivo-slider.css">
<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css">
<!--<link href="/mayoreo/assets/bootstrap3/css/bootstrap.css" rel="stylesheet" type="text/css">-->
<style type="text/css">
<!--
title{text-transform:uppercase;}
.Estilo1 {
	color: #1574AB;
	font-weight: bold;
}
.Estilo2 {color: #777777;
}
.Estilo3 {color: #555555;
}
-->
    .new_tabla{
        border:solid thin #D6D2D2;
        margin: 0px;
        padding: 0px;
        border-spacing: 0;
        border-collapse: collapse;
    }
    .new_tabla tr{
        margin: 0px;
        padding: 0px;
    }
    .new_tabla td{
        border:solid thin #D6D2D2;
        background:#FFFFFF;
        font-family: verdana,geneva,sans-serif;
        font-size:12px;
        color:#848282;
        width:50%;
        margin: 0px;
        padding: 2px;
    }
    td.bg_td{
        background:#CCCCCC;
        color:#ffffff;
        font-weight:bold;
        border:none;
    }
    td.bg_td_title{
        background:#F3F3F3;
        color:#848282;
        font-weight:bold;
        border:none;
    }
	
	/*********/
.new_tabla_dc img{
	max-width:100%;
	display:block;
	margin: auto auto auto auto;
}
.new_tabla_dc {
    border: thin solid #d6d2d2;
    border-collapse: collapse;
    border-spacing: 0;
    margin: 0 0 22px 0;
    padding: 0;
	width:100%;
}
.new_tabla_dc tr {
    margin: 0;
    padding: 0;
}
.new_tabla_dc td {
    background: #ffffff none repeat scroll 0 0;
    color: #848282;
    font-family: verdana,geneva,sans-serif;
    font-size: 12px;
    margin: 0;
    padding: 2px;
}
.new_tabla_dc p {
    padding: 0 15px;
}
.w50p td {
    width: 50%;
}
.bordered td{
    border: thin solid #d6d2d2;
}
td.bg_td_dc {
    background: #cccccc none repeat scroll 0 0;
    color: #ffffff;
    font-weight: bold;
}
td.bg_td_dc_title {
    background: #f3f3f3 none repeat scroll 0 0;
    color: #848282;
    font-weight: bold;
}
.n_subtitulo{
	color: #666666;
    font-size: 12px;
	font-weight:bold;
}
.precio_v{
    border-top:solid thin #cfcfcf;
    text-align: center;
    border-bottom:solid thin #cfcfcf;
    margin: 20px 0 0 0;
    height:25px;
    line-height: 25px;
}
</style>
<?php
/*<script type="text/javascript"> var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www."); document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E")); </script>
//<script type="text/javascript"> var pageTracker = _gat._getTracker("UA-1672745-3"); pageTracker._initData(); pageTracker._trackPageview(); </script>*/
?>
    <link href="https://plus.google.com/106268195137664325802" rel="publisher" />
    <? /*<script type="text/javascript" src="http://www.massivepc.com/jwplayer/jwplayer.js"></script> */ ?>
</head>
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>




<?php
    //require(DIR_WS_INCLUDES . 'header3.php');
    require(DIR_WS_INCLUDES . 'header_2.php');
?>

<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr>
<td width="100%" valign="top"><!--<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<iframe src="http://pmssrv.mercadolibre.com.mx/jm/PmsSrv?tool=5376128&creativity=30801&new=Y&ovr=Y"
 width="468" height="60" scrolling="no" align="middle" frameborder="0" marginheight="0" marginwidth="0"> </iframe><br>-->
  <?php echo tep_draw_form('cart_quantity', tep_href_link(FILENAME_PRODUCT_INFO, tep_get_all_get_params(array('action')) . 'action=add_product')); ?>
<h1 style="text-transform:uppercase;"><?php echo /*'<a href="http://www.mipccom.com"><img src="mipc3.jpg"></a><br>'.*/$tienda['products_name']; ?></h1>
<?php 
				// calculate the previous and next
				// if no cPath can be found, use the product id to find a cPath in which this product fits.
				//echo 'Categoria:::'.$cPath.'<br>';
				//if (!$cPath) {
					$cPath_query = tep_db_query ("SELECT categories_id FROM " . TABLE_PRODUCTS_TO_CATEGORIES . " WHERE products_id = $products_id");
					$cPath_row = tep_db_fetch_array($cPath_query);
					$cPath = $cPath_row['categories_id'];
					//echo 'Categoria:::'.$cPath.'<br>';
				//}
	
				$products_ids = tep_db_query("SELECT products.products_id FROM " . TABLE_PRODUCTS . " , " . TABLE_PRODUCTS_TO_CATEGORIES . " WHERE products.products_id = products_to_categories.products_id AND products.products_status= '1' AND products_to_categories.categories_id = $cPath");
				
				
				while ($product_row = tep_db_fetch_array($products_ids)) {
					$id_array[] = $product_row['products_id'];
					//echo $product_row['products_id'];
				}
				
				reset ($id_array);
				$counter = 0;
				while (list($key, $value) = each ($id_array)) {
					if ($value == $products_id) {
						$position = $counter;
						if ($key == 0)
							$previous = -1; // it was the first to be found
						else
							$previous = $id_array[$key - 1];
						
						if ($id_array[$key + 1])
							$next_item = $id_array[$key + 1];
						else {
							$next_item = $id_array[0];
						}
					}
					$last = $value;
					$counter++;
					
				}
				if ($previous == -1)
					$previous = $last;
				$category_name_query = tep_db_query("SELECT categories_name FROM " . TABLE_CATEGORIES_DESCRIPTION . " WHERE categories_id = $current_category_id AND language_id = $languages_id");
				$category_name_row = tep_db_fetch_array($category_name_query);
				//echo var_dump($category_name_row);
				?>
 
<table border="0" width="100%" cellspacing="0" cellpadding="0">
        <?php if ($product_check['total'] < 1) { echo $product_check['total'];?>

            <?php
        } else {//Modificado por JP para mostrar producto tipo 12616  01/06/2015
		//if(1==1){

//include (DIR_WS_INCLUDES . 'products_next_previous.php');
/*p.products_tax_class_id,
p.products_id_grupocva_pza,
p.products_id_pchardware,
*/
            $product_info_query = tep_db_query("select 
				p.products_id,
				pd.products_name,
				pd.products_description,
				p.products_model,
				p.products_quantity,
				p.products_image,
				pd.products_url,
				p.products_retail_price,
				p.products_retail_price2,p.retail,
				p.products_price,
                mp.precio_mayoreo,
                mp.precio_distribuidor,
				p.products_date_added,
				p.products_date_available,
				p.manufacturers_id,
				p.agotado,
				pd.products_video
				from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd, mayoreo_productos mp
                where
                p.products_status = '1' and
                mp.fk_categoria != '21' and
                mp.fk_producto = '" . (int)$HTTP_GET_VARS['products_id'] . "' and
                p.products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and
                pd.products_id = p.products_id and pd.language_id = '" . (int)$languages_id . "'");

            $product_info = tep_db_fetch_array($product_info_query);
			//echo 'Qry=='.var_dump($product_info);
            ///LEFT JOIN mayoreo_productos on p.products_id = mayoreo_productos.fk_producto

            tep_db_query("update " . TABLE_PRODUCTS_DESCRIPTION . " set products_viewed = products_viewed+1 where products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and language_id = '" . (int)$languages_id . "'");
$ivafijado=0.16;
            $cpi_mas2=$currencies->display_price($product_info['products_price'], tep_get_tax_rate($product_info['products_tax_class_id']));
	    if($cpi_mas2[0]=='$') {
                $cpi_mas3=trim($cpi_mas2,"$");
                $cpi_mas33=explode(",",$cpi_mas3);
                $cpi_mas2=$cpi_mas33[0].$cpi_mas33[1];
//$cpi_mas='$'.number_format($cpi_mas2+($cpi_mas2*0.15*$ex),2);
                $cpi_mas=number_format($cpi_mas2+(($cpi_mas2*$ivafijado)*$ex),1);
		//		echo $cpi_mas."--".$cpi_mas2."--".$cpi_mas2."/".$ivafijado2."/".$ex."--".(($cpi_mas2*$ivafijado)*$ex)."<br>";
                $cpi_mas = str_replace(",","",$cpi_mas);
                $cpi_mas2 = number_format($cpi_mas,2);
                $cpi_mas='$'.$cpi_mas2;

            }
            else {
                $cpi_mas3=trim($cpi_mas2,"US$");
                $cpi_mas33=explode(",",$cpi_mas3);
                $cpi_mas2=$cpi_mas33[0].$cpi_mas33[1];
                $cpi_mas=$cpi_mas2+(($cpi_mas2*$ivafijado)*$ex);
                $cpi_mas2 = number_format($cpi_mas,2);
                $cpi_mas='US$'.$cpi_mas2;
            }

            $products_price = $cpi_mas;

            if ($product_info['retail']>0) {
                if($product_info['retail']==1) {
                    $whats_new_retail_price = $currencies->display_price($product_info['products_retail_price'], tep_get_tax_rate($product_info['products_tax_class_id']));


                    $cpi_mas2x=$currencies->display_price($product_info['products_retail_price'], tep_get_tax_rate($product_info['products_tax_class_id']));
                    if($cpi_mas2x[0]=='$') {
                        $cpi_mas3x=trim($cpi_mas2x,"$");
                        $cpi_mas33x=explode(",",$cpi_mas3x);
                        $cpi_mas2x=$cpi_mas33x[0].$cpi_mas33x[1];
//		$cpi_masx='$'.number_format($cpi_mas2x+($cpi_mas2x*0.15*$ex),2);
                        $cpi_masx=number_format($cpi_mas2x+($cpi_mas2x*$ivafijado*$ex),1);
                        $cpi_mas2x = str_replace(",","",$cpi_masx);
                        $cpi_mas2x=number_format($cpi_mas2x,2);
                        $cpi_masx='$'.$cpi_mas2x;

                    }
                    else {
                        $cpi_mas3x=trim($cpi_mas2x,"US$");
                        $cpi_mas33x=explode(",",$cpi_mas3x);
                        $cpi_mas2x=$cpi_mas33x[0].$cpi_mas33x[1];
                        $cpi_mas2x=number_format($cpi_mas2x+($cpi_mas2x*$ivafijado*$ex),2);
                        $cpi_mas2x = str_replace(",","",$cpi_mas2x);
                        $cpi_mas2x=number_format($cpi_mas2x,2);
                        $cpi_masx='US$'.$cpi_mas2x;
                    }


                    $cpi_mas2 = str_replace(",","",$cpi_mas2);
                    $cpi_mas2x = str_replace(",","",$cpi_mas2x);
                    $retail = 'Precio de Lista: <s>&nbsp;$'. number_format($cpi_mas2x,2) . '&nbsp; </s><br>
Ahorro: $'. number_format($cpi_mas2x-$cpi_mas2,2) . '<br>
'; 


                }else {
                    $whats_new_retail_price = $currencies->display_price(($product_info['products_price']+(($product_info['products_retail_price2']*$product_info['products_price'])/100)), tep_get_tax_rate($product_info['products_tax_class_id']));


                    $cpi_mas2x=$currencies->display_price(($product_info['products_price']+(($product_info['products_retail_price2']*$product_info['products_price'])/100)), tep_get_tax_rate($product_info['products_tax_class_id']));
                    if($cpi_mas2x[0]=='$') {
                        $cpi_mas3x=trim($cpi_mas2x,"$");
                        $cpi_mas33x=explode(",",$cpi_mas3x);
                        $cpi_mas2x=$cpi_mas33x[0].$cpi_mas33x[1];
//		$cpi_masx='$'.number_format($cpi_mas2x+($cpi_mas2x*0.15*$ex),2);
                        $cpi_masx=number_format($cpi_mas2x+($cpi_mas2x*$ivafijado*$ex),1);
                        $cpi_mas2x = str_replace(",","",$cpi_masx);
                        $cpi_mas2x=number_format($cpi_mas2x,2);
                        $cpi_masx='$'.$cpi_mas2x;
                    }
                    else {
                        $cpi_mas3x=trim($cpi_mas2x,"US$");
                        $cpi_mas33x=explode(",",$cpi_mas3x);
                        $cpi_mas2x=$cpi_mas33x[0].$cpi_mas33x[1];
                        $cpi_mas2x=number_format($cpi_mas2x+($cpi_mas2x*$ivafijado*$ex),2);
                        $cpi_mas2x = str_replace(",","",$cpi_mas2x);
                        $cpi_mas2x=number_format($cpi_mas2x,2);
                        $cpi_masx='US$'.$cpi_mas2x;

                    }

                    $cpi_mas2 = str_replace(",","",$cpi_mas2);
                    $cpi_mas2x = str_replace(",","",$cpi_mas2x);
                    $retail = 'Precio de Lista: <s>&nbsp;$'. number_format($cpi_mas2x,2) . '&nbsp; </s><br>
Ahorro: $'. number_format($cpi_mas2x-$cpi_mas2,2) . '<br>
'; 

                }
            } else {
                $retail = '';
            }



if ($new_price = tep_get_products_special_price($product_info['products_id'])) {
$products_price = '<s>' . $currencies->display_price($product_info['products_price'], tep_get_tax_rate($product_info['products_tax_class_id'])) . '</s>&nbsp;<span class="productSpecialPrice">' . $currencies->display_price($new_price, tep_get_tax_rate($product_info['products_tax_class_id'])) . '</span>';
} else {
$products_price = $cpi_mas;//$currencies->display_price($product_info['products_price'], tep_get_tax_rate($product_info['products_tax_class_id']));
}
//$products_price = $cpi_mas2;
if (tep_not_null($product_info['products_model'])) {
$products_name = $product_info['products_name'] . '<br/><span class="smallText">[' . $product_info['products_model'] . ']</span>';
} else {
$products_name = $product_info['products_name'];
}
?>
<table cellspacing="0" cellpadding="0">
    <tr><td><img src="images/m35.gif" width="735" height="4"></td></tr>
</table>
<table cellspacing="0" cellpadding="0">
<tr><td class="bg3a" cellspacing="0" cellpadding="0">
<table width="100%"><tr><td align="left">
<table cellpadding="6" > <!--cellpadding="12"-->
<tr><td align="center" valign="top">
<?
	if($fabricantes['manufacturers_image'] != ""){
		echo '<a href="'. $fabricantes['manufacturers_name'] . '-m-' . $fabricante .'.html"><img src="images/'. $fabricantes['manufacturers_image'] .'" alt="'. $fabricantes['manufacturers_name'] . '"/></a><br/><br/>';
	}else{
	}
?>
<?
	if (tep_not_null($product_info['products_image'])) { ?>
<?
$siteurl = $_SERVER['REQUEST_URI'];
$GLOBALS['siteurl'] = $siteurl;
require('cookie.php');
/*if($width==800):
	echo tep_image(DIR_WS_IMAGES . $product_info['products_image'], $product_info['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, ' vspace="10" onclick="abrirpopup('."'galeria.php?products_id=" . $products_id . "'" . ',710,550);" class="hand"');
	else: 
	echo tep_image(DIR_WS_IMAGES . $product_info['products_image'], $product_info['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, ' vspace="10" onclick="abrirpopup('."'galeriam.php?products_id=" . $products_id . "'" . ',710,715);" class="hand"');
	endif;*/
?>
<a onclick="window.open('/galeriam.php?products_id=<?=$products_id?>', '_blank', 'width=800,height=900,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');" href="javascript:void(0);">
<!--<a class="fancybox" style="display:block; cursor:pointer;" data-fancybox-type="iframe" href="/galeriam.php?products_id=<? //=$products_id?>">-->
	<img border="0" vspace="10"  src="/timthumb.php?src=images/<?=$product_info['products_image']?>&w=80&h=80&zc=0" />
</a>
<br/><br/>
<?
	$products_name = $product_info['products_name'];
	$i_=0;
	if($totalRows_gallery < 1){ ?>
		<div id="thumb">
            <a onclick="window.open('/galeriam.php?products_id=<?=$products_id?>', '_blank', 'width=800,height=900,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');" href="javascript:void(0);">
                <img src="/timthumb.php?src=images/<?=$product_info['products_image']?>&w=40&h=30" alt="<?=$products_name?>" class="thumb"/>
            </a>
        </div>
<?	}else{
?>
    <div id="thumb">
    	<a onclick="window.open('/galeriam.php?products_id=<?=$products_id?>', '_blank', 'width=800,height=900,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');" href="javascript:void(0);">
            <img src="/timthumb.php?src=images/<?=$product_info['products_image']?>&w=40&h=30" alt="<?=$products_name?>" class="thumb"/>
		</a>
        <? 
            do{ $i_++;
        ?>
            <!--<a href="javascript:popImage('images/<? //=$row_gallery['imagengrande']?>','<? //=$products_name?>')">-->
			<a onclick="window.open('/galeriam.php?products_id=<?=$products_id?>', '_blank', 'width=800,height=900,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');" href="javascript:void(0);">
                <img src="/timthumb.php?src=images/<?=$row_gallery['imagengrande']?>&w=40&h=30" alt="<?=$products_name?>" class="thumb"/>
            </a>
        <?	if($i_==2){break;}
            }while($row_gallery = mysql_fetch_assoc($gallery));
        ?>
    </div>
<? } ?>
<? mysql_free_result($gallery)?>
<? } ?></td>
<td valign="top" class="borl">
<b> <a href="<? echo tep_href_link(FILENAME_PRODUCT_INFO, "products_id=$previous&cPath=$cPath"); ?>"><?php echo tep_image(DIR_WS_IMAGES . 'chevron_previous.gif', PREV_NEXT_ALT_PREVIOUS); ?></a>
<?php echo (PREV_NEXT_PRODUCT) ?><?php echo ($position+1 . "/" . $counter) ?><?php echo (PREV_NEXT_FROM) ?><?php echo ($category_name_row['categories_name']) ?>
<a href="<? echo tep_href_link(FILENAME_PRODUCT_INFO, "products_id=$next_item&cPath=$cPath"); ?>"><?php echo tep_image(DIR_WS_IMAGES . 'chevron_next.gif', PREV_NEXT_ALT_NEXT); ?></a></b><br/><br/>
<? //= strtoupper($products_name); ?>

<div class="secb2">
    <div class="secf" >
<b>Clave del producto:</b> <? echo $products_id; ?><br/>
<b>Modelo:</b> <span style="text-transform:uppercase;"><?php echo $pr['products_model']; ?></span><br/>
<!--<b>Peso:</b> <?php echo $pr['products_weight']; ?> kg<br/>
<b>Garant&iacute;a:</b> <?php echo $pr['products_warranty']; ?><br/>-->
<?php
/*
<b>Se env&iacute;a en:</b> <?php echo $pr['products_shipping']; ?><br/>
*/
echo utf8_decode('<b>Costo del env&iacute;o:</b> <span style="color:#ff0000;">$150</span> pesos a todo México hasta 20Kg por 
<a href="http://movil.estafeta.com/rastreo.html" target="_blank"><img src="estafeta.png" height="10px" alt="Estafeta"/></a>');
?>


<div style="clear:both;"></div>
<? /*$qexistencias = "SELECT * FROM products where products_id = '$products_id'";
$qe = mysql_query($qexistencias, $conexion) or die(mysql_error());
$existencias = mysql_fetch_assoc($qe);
$inventario = $existencias['products_quantity']; 
$a=substr($existencias['products_date_added'],0,4);
$m=substr($existencias['products_date_added'],5,2);
$d=substr($existencias['products_date_added'],8,2);*/
?>
<strong>Disponibilidad: </strong>
<?
	//if($pr['agotado']=='1'){
		//echo 'Agotado';
	//}else{
		/*if($pr['sae_exist'] <= '0'){
            echo 'Agotado';
		}else{
			if($pr['sae_exist'] == '1'){
				echo $pr['sae_exist'].' Pieza';
			}else{
				echo $pr['sae_exist'].' Piezas';
			}
		}*/
        if($pr['sae_exist'] <= '0'){
                                        echo 'Agotado';
                                    }else{
                                        if($pr['sae_exist'] <= 3){
                                            echo '<strong style="color:#1A73AB;">Agotado</strong>';
                                        }else{
                                            $rf = $pr['sae_exist'] - 3;
                                            //
                                            if($pr['products_id'] == '8438'){
                                                echo '<a target="_blank" href="https://www.massivepc.com/mayoreo/"><strong style="color:#1A73AB;">550</strong></a>';
                                            }elseif($pr['products_id'] == '8439'){
                                                echo '<a target="_blank" href="https://www.massivepc.com/mayoreo/"><strong style="color:#1A73AB;">571</strong></a>';
                                            }elseif($pr['products_id'] == '14884'){
                                                echo '<a target="_blank" href="https://www.massivepc.com/mayoreo/"><strong style="color:#1A73AB;">533</strong></a>';
                                            }elseif($pr['products_id'] == '8437'){
                                                echo '<a target="_blank" href="https://www.massivepc.com/mayoreo/"><strong style="color:#1A73AB;">534</strong></a>';
                                            }else{
                                                echo '<a target="_blank" href="https://www.massivepc.com/mayoreo/"><strong style="color:#1A73AB;">'.$rf.'</strong></a>';
                                            }
                                        }
                                    }
	//} 


//////if($existencias['products_ordered']>0){
//////echo "<br/><b>Cantidad vendida: </b>".$existencias['products_ordered']; if($existencias['products_ordered']>3){echo "&nbsp;<img src='firer.jpg'>";}//$d."/".$m."/".$a.03/05/2007
//////}else{
//////	echo "<br/><b>Cantidad vendida: </b>0";
//////}
/*echo "<br/><b>Disponibilidad: </b>";
if((int)$inventario>0)
    echo '<span style="color:#1d71af"><b>'.$pr['products_shipping'].'</b></span>';
else
    echo '<span style="color:red"><b>Agotado</b></span>';
*/
?>
<br>
</div>
</div><br/>
<?php 
$products_name2=str_replace('"', '', $products_name);
//stock($existencias['products_quantity'],$existencias['products_price'],$existencias['products_id'],$products_name2);?>

<?
//echo '='.$product_info['agotado'];
//if($product_info['agotado']=='1'){
if($pr['sae_exist'] <= '3'){
		echo '<img src="includes/languages/espanol/images/buttons/button_agotado.gif" align="right">';
	}else{
	   //echo '<input type="hidden" name="products_id" value="'.$product_info['products_id'].'"><input type="image" src="includes/languages/espanol/images/buttons/button_in_cart.gif" alt="Compre '.$products_name2.' ahora!" title="Compre '.$products_name2.' ahora!" align="right">';
	   echo '<a target="_blank" href="https://www.massivepc.com/mayoreo/?palabra='.$product_info['products_id'].'&pc_='.$product_info['products_id'].'#row"><img src="includes/languages/espanol/images/buttons/button_in_cart.gif" alt="Compre '.$products_name2.' ahora!" align="right"></a>';
    }
?>

<?php echo $retail;//$products_price; ?>
<br>
Menudeo: <a href="https://www.massivepc.com/mayoreo/"><span class="cy1"><?php echo $products_price; ?></span></a> <?php if($ex==0) {?>+ I.V.A.<?php }else{?> NETO<?php }?>
<br/>Mayoreo: <a href="https://www.massivepc.com/mayoreo/"><span class="cy1">$<?php echo number_format($product_info['precio_mayoreo'],2); ?></span></a> NETO 
<br/>Distribuidor: <a href="https://www.massivepc.com/mayoreo/"><span class="cy1">$<?php echo number_format($product_info['precio_distribuidor'],2); ?></span></a> NETO
<br/>pesos mexicanos
<br>
<!--<a class="ml1" target="_blank" href="https://www.massivepc.com/mayoreo/">
    <div class="precio_v">
        <b style="color:red">Solicitar precio por volumen</b>
    </div>
    
</a>-->

<br>
<?php
/*
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style ">
            <a title="Facebook" 
	       addthis:url="<?=tep_href_link(FILENAME_PRODUCT_INFO, "products_id=".$products_id."&cPath=".$cPath)?>"
	       addthis:title="<?=$products_name2?>"
	       addthis:description="<?=$products_name2?>"
	       class="addthis_button_facebook"></a>
            <a title="Twitter" 
	       addthis:url="<?=tep_href_link(FILENAME_PRODUCT_INFO, "products_id=".$products_id."&cPath=".$cPath);?>"
	       addthis:title="<?=$products_name2?>"
	       addthis:description="<?=$products_name2?>"
	       class="addthis_button_twitter"></a>
            <a title="Email" 
	       addthis:url="<?=tep_href_link(FILENAME_PRODUCT_INFO, "products_id=".$products_id."&cPath=".$cPath);?>" 
	       addthis:title="<?=$products_name2?>"
	       addthis:description="<?=$products_name2?>" 
	       class="addthis_button_email"></a>
            <a class="addthis_button_compact"></a>
            <!--<a class="addthis_button_facebook_like" 
	       addthis:url="<?//=tep_href_link(FILENAME_PRODUCT_INFO, "products_id=".$products_id."&cPath=".$cPath);?>" 
	       fb:like:layout="button_count" 
	       fb:like:locale="en_US"></a>-->
            <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
</div>

<script type="text/javascript">
var addthis_config = {"data_track_addressbar":true};
</script>



<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=massivepc"></script>
*/
?>

<!-- AddThis Button END -->
            <script type="text/javascript">
                /*var addthis_share = {
                    email_vars: {
                        hola: "Hola!",
                        massivepc: "Verdad que es interesante? Claro, Massivepc te ofrece cada dia los mejores Productos con descuentos increibles. Compra, comparte y... disfruta!",
                        email_template: "new_template",
                        asunto: "He visto este Producto y me he acordado de ti, miralo en Massivepc"
                    },
                    templates: { twitter: "{{title}}: {{url}}" }
                }
                var addthis_config = {
                    data_track_clickback: true,
                                ui_language: "es"
                }*/
            </script>
<!--
<a href="https://plus.google.com/106268195137664325802?prsrc=3" style="display:inline-block;text-decoration:none;color:#333;text-align:center;font:13px/16px arial,sans-serif;white-space:nowrap;">
    <img src="https://ssl.gstatic.com/images/icons/gplus-64.png" alt="" style="border:0;width:64px;height:64px;margin-bottom:7px;">
    <span style="font-weight:bold;">massivepc</span><br/><span> on Google+ </span></a>
<br>
<a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="massive_pc" data-lang="es">Tweet</a><script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
-->
</td>
<td width="230px" align="center">
<div class="fb-page" data-href="https://www.facebook.com/MassivePC/" data-tabs="timeline" data-width="242" data-height="275" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/MassivePC/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/MassivePC/">Massive PC</a></blockquote></div>
    <!--<b>Siguenos en Facebook y enterate de nuevas promociones</b>
<div class="fb-page" data-href="https://www.facebook.com/MassivePCcom" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/MassivePCcom"><a href="https://www.facebook.com/MassivePCcom">Massive PC</a></blockquote></div></div>
<br><br><hr><br><br>

<a href="https://twitter.com/MassivePCmx" class="twitter-follow-button" data-show-count="false" data-lang="es" data-dnt="true">Seguir a @MassivePCmx</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>-->

</td>
</tr>
</table> 

<hr/>
<br />
<table border="0" cellspacing="0" cellpadding="0" width="100%" >
    <tr><td width="100%" align="center">
	<table border="0" cellspacing="0" cellpadding="0">
	    <tr><td width="700px">
<?php 
/*if ($products_id==2180)
{echo '<object type="application/x-shockwave-flash" data="http://www.massivepc.com/bans/audio.swf"><param name="movie" value="http://www.massivepc.com/bans/audio.swf"></object><br>';
}*/
if($fabricantes!=""){
$rmp='<p style="MARGIN: 0px 5px; LINE-HEIGHT: 150%" align="center"><font style="FONT-SIZE: 9pt" face="Verdana" color="#666666"><img alt="" src="marcastodas/'.$fabricantes['imag_ex'].'" /></font></p>
<p style="MARGIN: 0px 5px; LINE-HEIGHT: 150%" align="justify"></p><br>';
}
else{
	$rmp="";
}
$cod2=str_replace("marca_imagen_xxxxxx",$rmp,$product_info['products_description']);
//$cod2=str_replace("www.massivepc.com",'204.93.196.12',$cod2);
//$cod2=str_replace("massivepc.com",'204.93.196.12',$cod2);
$cod2=str_replace('<table id="table64" style="border-collapse: collapse; width: 100%;" border="1">','<table id="table64" style="border-collapse: collapse;border-color: #D5D5D5; width: 100%;" border="1">',$cod2);
//style="border-collapse: collapse; width: 100%;" border="1">
$cod2=str_replace('style="border-collapse: collapse; width: 100%;" border="1">','style="border-collapse: collapse;border-color: #D5D5D5; width: 100%;" border="1">',$cod2);
$cod2=str_replace('<p style="MARGIN: 5px; LINE-HEIGHT: 150%"','<p style="MARGIN: 0px 5px; LINE-HEIGHT: 150%"',$cod2);
$cod2=str_replace('<p style="LINE-HEIGHT: 150%; MARGIN: 5px"','<p style="LINE-HEIGHT: 150%; MARGIN: 0px 5px"',$cod2);
$cod2c='';
//if($product_info['products_id']==7650)
//    die($cod2);
//validar youtube

/*

 * http://www.massivepc.com/consola-videojuegos-portatil-s5100android-40ddr3touch-p-11753.html
 * http://www.youtube.com/watch?feature=player_embedded&v=rRtZ-f6rnRQ
 * 
 * [ytbe.ini]rRtZ-f6rnRQ[ytbe.fin]
 * [ytbe.ini]rRtZ-f6rnRQ[ytbe.fin]
*/



if(busca_cadena($cod2, '[ytbe.ini]')){
    $videoCode=remp3($cod2, '[ytbe.ini]','[ytbe.fin]',strlen('[ytbe.ini]'));
         $cod2a=remp2($cod2, '[ytbe.ini]');
 $cod2b='<div align="center"> <div align="center" id="mediaplayer"></div> </div>
	<script type="text/javascript">
		jwplayer("mediaplayer").setup({
			autostart: true,
			flashplayer: "http://www.massivepc.com/jwplayer/player.swf",		
			file: "http://youtu.be/'.$videoCode.'",
			plugins: { sharing: { link: false } }
		})
	</script>';	 
 $cod2c=remp1($cod2, '[ytbe.fin]',strlen('[ytbe.fin]'));	 
    //hasta    remp2($str, $hasta)
    //de hasta remp3($str, $de, $hasta)
$cod2=$cod2a.$cod2b.$cod2c;
}
$videx="";
if(trim($product_info['products_video'])!=""){
   $videos=explode(',',$product_info['products_video']);
   $contv=0;
   foreach ($videos as $vid){
       $contv++;
      $videx='<div align="center"> <div align="center" id="mediaplayer'.$contv.'"></div> </div>
	<script type="text/javascript">
		jwplayer("mediaplayer'.$contv.'").setup({
			autostart: true,
                        width:700,
                        height:400,
			flashplayer: "http://www.massivepc.com/jwplayer/player.swf",		
			file: "http://youtu.be/'.$vid.'",
			plugins: { sharing: { link: false } }
		})
	</script>'; 
   }  
}
    
if(busca_cadena($cod2, 'texto_'.$product_info['products_id'].'.jpg"')){
if(busca_cadena($cod2,'<img src="images/texto_'))  {
    //echo "ZZZZZZ";
        $cod2a=remp2($cod2, '<img src="images/texto_');
    $cod2b=remp3b($cod2,'texto_'.$product_info['products_id'].'.jpg" alt="" />', 'justify"></p><br>', strlen('texto_'.$product_info['products_id'].'.jpg" alt="" />'), strlen('justify"></p><br>'));
    $cod2c=remp1b($cod2, 'justify"></p><br>', strlen('justify"></p><br>'));
//    echo "<pre>";
//    echo $cod2c;
//    echo "</pre>";
    $cod2d=remp1b($cod2c, '</span></p>',strlen('</span></p>'));
    $cod2c=remp2b($cod2c, '</span></p>',strlen('</span></p>'));
    $cod2c=$cod2a.$cod2b.$cod2c.$cod2d;
}else{
//echo "YYYYYY";
    $cod2a=remp2($cod2, '<img alt="" src=');
    $cod2b=remp3b($cod2,'texto_'.$product_info['products_id'].'.jpg" />', 'justify"></p><br>', strlen('texto_'.$product_info['products_id'].'.jpg" />'), strlen('justify"></p><br>'));
    $cod2c=remp1b($cod2, 'justify"></p><br>', strlen('justify"></p><br>'));
    $cod2d=remp1b($cod2c, '</td></tr></font></p>');
    $cod2c=remp2b($cod2c, '</td></tr></font></p>');
    $cod2c=$cod2a.$cod2c.$cod2b.$cod2d;
}
}

$query_m_desc    = mysql_query("SELECT * FROM modulo_descripcion WHERE fk_producto = '". (int)$products_id . "'", $conexion) or die(mysql_error());
$m_descripcion   = mysql_fetch_object($query_m_desc);

$query_m_espe    = mysql_query("SELECT * FROM modulo_especificaciones WHERE fk_producto = '". (int)$products_id . "'", $conexion) or die(mysql_error());
$m_espe          = mysql_fetch_object($query_m_espe);

$query_m_s_espe  = mysql_query("SELECT * FROM modulo_sub_especificaciones WHERE fk_espe = '". (int)$m_espe->id_espe . "' ORDER BY  `modulo_sub_especificaciones`.`orden` ASC ", $conexion) or die(mysql_error());
//$m_s_espe      = mysql_fetch_object($query_m_s_espe);
//

$query_contenido = mysql_query("SELECT * FROM modulo_contenido WHERE fk_producto = '". (int)$products_id . "'", $conexion) or die(mysql_error());
$m_contenido     = mysql_fetch_object($query_contenido);

?>

<? if(is_object($m_descripcion)){?>
    <table class="new_tabla" width="100%">
        <?=(is_object($m_descripcion)) ? '<tr><td class="bg_td_title">'.$m_descripcion->titulo.'</td></tr>' : '' ?>

        <?=(is_object($m_descripcion)) ? '<tr><td>'.str_replace("\n", "<br>", $m_descripcion->descripcion).'</td></tr>' : '' ?>
    
    </table><br>
<? }?>

<? if(is_object($m_espe)){?>
    <table class="new_tabla" width="100%">

        <?=(is_object($m_espe)) ? '<tr><td class="bg_td_title" colspan="2"> '.$m_espe->titulo.' </td></tr>' : '' ?>


        <?
        while ($mse = mysql_fetch_object($query_m_s_espe)) {

                        if($mse->modulo == 1){
                            echo'<tr><td class="bg_td" colspan="2"> '.$mse->descripcion.' </td></tr>';
                        }

                       if($mse->modulo == 2){
                            echo '<tr><td> '.$mse->descripcion.' </td>';
                       }

                       if($mse->modulo == 3){
                            echo '<td> '.$mse->descripcion.' </td></tr>';
                       }

                    }
                ?>

    </table><br>
<? }?>

<? if(is_object($m_contenido)){?>
    <table class="new_tabla" width="100%">
        <?=(is_object($m_contenido)) ? '<tr><td class="bg_td_title" colspan="2"> Contenido:</td></tr>' : '' ?>
        <?=(is_object($m_contenido)) ? '<tr><td>'.str_replace("\n", "<br>", $m_contenido->contenido).'</td></tr>' : '' ?>
    </table>
<? }?>

<?
/*********************/
/*Comentado por jp 06-04-2017*/
/*if(trim($cod2c)!=""){
    echo stripslashes($cod2c);
}else{
    echo stripslashes($cod2);
}*/
/*Comentado por jp 06-04-2017*/
/*********************/

//echo stripslashes($cod2);
//echo $product_info['products_description'];
//echo $product_info['products_description'];
?>

<?
    if($pr['id_video_youtube'] != '')
    {
        echo '
<table class="new_tabla">
        <tr>
            <td class="bg_td_title" colspan="2">Video</td>
        </tr>
        <tr>
            <td colspan="2">
                <iframe width="700" height="315" src="https://www.youtube.com/embed/'.$pr['id_video_youtube'].'" frameborder="0" allowfullscreen></iframe>
            </td>
        </tr>
</table>
';
    }
?>

    <?php if(trim($videx)!=""){
echo '		<table border="0" width="100%" cellspacing="0" cellpadding="0">
	
							<tr><td class="bg3a" cellspacing="0" cellpadding="0">
							<div align="center" style="margin-left:0px;width:700px; text-align:left ">
				<!--  //****************************// -->
				 <br>
				
				
'.$videx.'				
				<!--  //***************************// -->
					
					</div>
								</td></tr>

	  </table>    
';

}
?>                
                    
                    
	    </td></tr></table>
    </td></tr></table>
<br/><span style="color:white">-- <?=$product_info['products_id_grupocva_pza']?> --<br/>-- <?=$product_info['products_id_pchardware']?> --</span>
<?php
if ($products_attributes['total'] > 0) {
echo TEXT_PRODUCT_OPTIONS;
$products_attributes_query = tep_db_query("select count(*) as total from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_ATTRIBUTES . " patrib where patrib.products_id='" . (int)$HTTP_GET_VARS['products_id'] . "' and patrib.options_id = popt.products_options_id and popt.language_id = '" . (int)$languages_id . "'");
$products_attributes = tep_db_fetch_array($products_attributes_query);
echo "<br/><br/>";
} ?>



<hr/><br/>



<div class="secb3" align="center">



    <div class="secf">
        <img src="realizarpregunta.gif" alt="DEJA TU PREGUNTA SOBRE <?php echo $products_name; ?>" 
        onClick="abrirpopup('faq.php?products_id=<?php echo $products_id; ?>',550,450);" 
        class="hand"/> &nbsp;&nbsp; 
        <img src="compartiropinion.gif" alt="TU OPINION SOBRE <?php echo $products_name; ?>" 
        onClick="abrirpopup('opinion.php?products_id=<?php echo $products_id; ?>',550,500);" 
        class="hand"/> &nbsp;&nbsp; 
        <img src="recomendarproducto.gif" alt="RECOMIENDA <?php echo $products_name; ?>" 
        onClick="abrirpopup('recomendar.php?products_id=<?php echo $products_id; ?>',550,450);" 
        class="hand"/>
    </div>
</div><br/><hr/><br/>



<?php
$products_options_name_query = tep_db_query("select distinct popt.products_options_id, popt.products_options_name from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_ATTRIBUTES . " patrib where patrib.products_id='" . (int)$HTTP_GET_VARS['products_id'] . "' and patrib.options_id = popt.products_options_id and popt.language_id = '" . (int)$languages_id . "' order by popt.products_options_name");
while ($products_options_name = tep_db_fetch_array($products_options_name_query)) {
$products_options_array = array();
$products_options_query = tep_db_query("select pov.products_options_values_id, pov.products_options_values_name, pa.options_values_price, pa.price_prefix from " . TABLE_PRODUCTS_ATTRIBUTES . " pa, " . TABLE_PRODUCTS_OPTIONS_VALUES . " pov where pa.products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and pa.options_id = '" . (int)$products_options_name['products_options_id'] . "' and pa.options_values_id = pov.products_options_values_id and pov.language_id = '" . (int)$languages_id . "'");
while ($products_options = tep_db_fetch_array($products_options_query)) {
$products_options_array[] = array('id' => $products_options['products_options_values_id'], 'text' => $products_options['products_options_values_name']);
if ($products_options['options_values_price'] != '0') {
$products_options_array[sizeof($products_options_array)-1]['text'] .= ' (' . $products_options['price_prefix'] . $currencies->display_price($products_options['options_values_price'], tep_get_tax_rate($product_info['products_tax_class_id'])) .') ';
}
}

if (isset($cart->contents[$HTTP_GET_VARS['products_id']]['attributes'][$products_options_name['products_options_id']])) {
$selected_attribute = $cart->contents[$HTTP_GET_VARS['products_id']]['attributes'][$products_options_name['products_options_id']];
} else {
$selected_attribute = false;
}
?>

<?php echo $products_options_name['products_options_name'] . ':'; ?>
<?php echo tep_draw_pull_down_menu('id[' . $products_options_name['products_options_id'] . ']', $products_options_array, $selected_attribute); ?><br/><br/>
<?php } ?>
</td></tr>
</table>
</td></tr>
<tr><td><img src="images/m43.gif" width="735px" height="7"></td></tr>
</table>
				<!--  //****************************// -->
				 <!-- 
<br><br>

		<table border="0" width="100%" cellspacing="0" cellpadding="0">
							<tr><td><img src="images/m35.gif" width="735" height="4"/></td></tr>
							<tr><td class="bg3a" cellspacing="0" cellpadding="0">
							<div align="center" style="margin-left:25px;width:680px; text-align:left ">

<br>
				
				<div class="fb-comments" data-href="<?=tep_href_link(FILENAME_PRODUCT_INFO, "products_id=".$products_id."&cPath=".$cPath);?>" data-num-posts="4" data-width="680"></div>

					
					</div>
								</td></tr>
   <tr><td><img src="images/m43.gif" width="735" height="7"/></td></tr>
	  </table>    
 				
				<!--  //***************************// -->
                <br><br>
<table width="100%" cellspacing="0" cellpadding="0" border="0">
    <tbody>
        <tr>
            <td>
                <img height="4" width="735" src="images/m35.gif">
            </td>
        </tr>
        <tr>
            <td cellpadding="0" cellspacing="0" class="bg3a">
                <div align="center" style="margin-left:25;width:680px; text-align:left ">
                    <!--  //****************************// -->
                    <br>
                 
                    <div class="secb">
                        <div class="secf"><b>Matriz</b></div>
                    </div>
                    <br><br>
                    
                    <table>
                        <tr>
                            <td>
                                <a target="_blank" href="https://www.massivepc.com/mayoreo/"><img class="img-thumbnail img-responsive" style="max-width:100%;" width="260px" src="https://www.massivepc.com/img/tienda/1.jpg" /></a>
                            </td>
                            <td>
                                <a target="_blank" href="https://www.massivepc.com/mayoreo/"><img class="img-thumbnail img-responsive" style="max-width:100%;" width="260px" src="https://www.massivepc.com/img/tienda/2.jpg" /></a>
                            </td>
                            <td>
                                <a target="_blank" href="https://www.massivepc.com/mayoreo/"><img class="img-thumbnail img-responsive" style="max-width:100%;" width="260px" src="https://www.massivepc.com/img/tienda/3.jpg" /></a>
                            </td>
                            <td>
                                <a target="_blank" href="https://www.massivepc.com/mayoreo/"><img class="img-thumbnail img-responsive" style="max-width:100%;" width="260px" src="https://www.massivepc.com/img/tienda/4.jpg" /></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a target="_blank" href="https://www.massivepc.com/mayoreo/"><img class="img-thumbnail img-responsive" style="max-width:100%;" width="260px" src="https://www.massivepc.com/img/tienda/5.jpg" /></a>
                            </td>
                            <td>
                                <a target="_blank" href="https://www.massivepc.com/mayoreo/"><img class="img-thumbnail img-responsive" style="max-width:100%;" width="260px" src="https://www.massivepc.com/img/tienda/6.jpg" /></a>
                            </td>
                            <td>
                                <a target="_blank" href="https://www.massivepc.com/mayoreo/"><img class="img-thumbnail img-responsive" style="max-width:100%;" width="260px" src="https://www.massivepc.com/img/tienda/7.jpg" /></a>
                            </td>
                            <td>
                                <a target="_blank" href="https://www.massivepc.com/mayoreo/"><img class="img-thumbnail img-responsive" style="max-width:100%;" width="260px" src="https://www.massivepc.com/img/tienda/8.jpg" /></a>
                            </td>
                        </tr>
                    </table>
<?php echo utf8_decode('
                    <p><strong>Matriz Av. Ramón Corona No. 148 Esq. López cotilla
                    Entre Av.Júarez y López Cotilla
                    Guadalajara Centro
                    Jalisco, México </strong></p>                                  
                    <script type="text/javascript" src="jquery-1.7.2.min.js"></script>
                    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
                    <script type="text/javascript" src="map.js"></script>
                    <script type="text/javascript">
                    var inventMap={"zoom":18,"marker":{"lat":20.674488,"lng":-103.346531,"title":"Massive PC","description":" Av. Ramón Corona No. 148 Col. Centro\r\nGuadalajara, Jalisco, México. C.P. 44100"}};
                    </script>
                    <div id="map-canvas" style="border: 1px solid #D9D9D9;height: 263px;margin:auto;padding:4px;width:674px;position: relative; background-color: rgb(229, 227, 223); overflow: hidden;">
');   
?> 
                    
                    

                    <!--  //***************************// -->
                    
                </div>
                <br><br>
            </td>
        </tr>
        <tr>
            <td>
                <img height="7" width="735" src="images/m43.gif">
            </td>
        </tr>
    </tbody>
</table>
<br><br>

<table width="100%" cellspacing="0" cellpadding="0" border="0">
    <tbody>
        <tr>
            <td>
                <img height="4" width="735" src="images/m35.gif">
            </td>
        </tr>
        <tr>
            <td cellpadding="0" cellspacing="0" class="bg3a">
                <div align="center" style="margin-left:25;width:680px; text-align:left ">
                    <!--  //****************************// -->
                    <br>
                 
                    <div class="secb">
                        <div class="secf"><b>Formas de pago</b></div>
                    </div>
                    <br><br>
                    
                    

                    <div class="row">
           <?=utf8_decode('
                        <div class="col-md-12">
                            <ul>
                                <li>Aceptamos pagos en efectivo, con tarjeta de crédito o débito en nuestro establecimiento. <img src="https://www.massivepc.com/mayoreo/assets/img/tarjetas.jpg"/></li>
                                <li>Depósitos y transferencias bancarias en cualquiera de nuestras cuentas:</li>
                            </ul>
                        </div>');?>
                     
                        
                        <div class="col-md-4">
                            <img src="https://www.massivepc.com/mayoreo/assets/img/BAN-1.png?v=4" /><br><br>
                            <strong>BANCOMER</strong>
                            <br> Cuenta: 0111395874
                            <br> CLABE Interbancaria para transferencias: 0121-8000-1113-9587-49
                            <br> A nombre de: URQUIZA Y GARCIA LOGISTICA SA DE CV
                        </div>
                        <div class="col-md-4"><br><br>
                            <img src="https://www.massivepc.com/mayoreo/assets/img/logo-santander.jpg?asdsad=eee" /><br><br>
                            <strong>SANTANDER</strong>
                            <br> Cuenta: 65-50656553-7
                            <br> CLABE Interbancaria para transferencias: 0141-8065-5065-6553-79
                            <br> A nombre de: URQUIZA Y GARCIA LOGISTICA SA DE CV
                        </div>

                    </div>

                    <!--  //***************************// -->
                    
                </div>
                <br><br>
            </td>
        </tr>
        <tr>
            <td>
                <img height="7" width="735" src="images/m43.gif">
            </td>
        </tr>
    </tbody>
</table>
<br><br>


		<table border="0" width="100%" cellspacing="0" cellpadding="0">
							<tr><td><img src="images/m35.gif" width="735" height="4"/></td></tr>
							<tr><td class="bg3a" cellspacing="0" cellpadding="0">
							<div align="center" style="margin-left:25;width:680px; text-align:left ">
				<!--  //****************************// -->
				  
				  
				  <?php if ($totalRows_faqtienda < 1) { echo " "; } else { 
$currentPage2=tep_href_link(FILENAME_PRODUCT_INFO, "products_id=".$products_id."&cPath=".$cPath);				      
				      ?> 
				 <br>
				 
 <div class="secb">
  <div class="secf"><b>Secci&oacute;n de preguntas</b></div>
</div><br/><br/>
<?php do { ?>
<span class="right"><b><?php //echo $row_faqtienda['fecha']; ?></b></span>
<span class="Estilo3">
<b><?php echo $row_faqtienda['alias']; ?>, <?php echo $row_faqtienda['estado']; ?></b></span>
<br/><br/>

<?php echo $row_faqtienda['question']; ?>
<br/> <br/>
<span class="Estilo2">
<span class="right"><b><?php //echo $row_faqtienda['fecha2'];?></b></span>

<b><?php echo 'Respuesta';  ?></b></span>
<br/><br/>
<?php echo '<span class="Estilo2">'.$row_faqtienda['answert'].'</span>'; ?><br/>
<hr class="dotted"/><?php } while ($row_faqtienda = mysql_fetch_assoc($faqtienda)); ?><br/>
<?php if ($pageNum_faqtienda > 0) { ?><a href="<?php printf("%s?pageNum_faqtienda=%d%s", $currentPage2, 0, $queryString_faqtienda); ?>">&lt;&lt; Inicio</a> &nbsp; <?php } ?>
<?php if ($pageNum_faqtienda > 0) { ?><a href="<?php printf("%s?pageNum_faqtienda=%d%s", $currentPage2, max(0, $pageNum_faqtienda - 1), $queryString_faqtienda); ?>">&lt; Anterior</a> &nbsp; <?php } ?>
Preguntas de la <?php echo ($startRow_faqtienda + 1) ?> a la <?php echo min($startRow_faqtienda + $maxRows_faqtienda, $totalRows_faqtienda) ?> de <?php echo $totalRows_faqtienda ?>
<?php if ($pageNum_faqtienda < $totalPages_faqtienda) { ?> &nbsp; <a href="<?php printf("%s?pageNum_faqtienda=%d%s", $currentPage2, min($totalPages_faqtienda, $pageNum_faqtienda + 1), $queryString_faqtienda); ?>">Siguiente &gt;</a><?php } ?>
<?php if ($pageNum_faqtienda < $totalPages_faqtienda) { ?> &nbsp; <a href="<?php printf("%s?pageNum_faqtienda=%d%s", $currentPage2, $totalPages_faqtienda, $queryString_faqtienda); ?>">Final &gt;&gt;</a><?php } ?><br/><br/><br/><?php } ?>
<?php mysql_free_result($faqtienda); ?>
<?php } if (tep_not_null($product_info['products_url'])) { ?>
<?php echo sprintf(TEXT_MORE_INFORMATION, tep_href_link(FILENAME_REDIRECT, 'action=url&goto=' . urlencode($product_info['products_url']), 'NONSSL', true, false)); ?><br/><br/><br/>
<?php } ?>

<?php if ($totalRows_tienda1 < 1) { echo " "; } else { ?><div class="secb"><div class="secf"><b>Opiniones del producto</b></div></div><br/><br/>

<?php do { ?><span class="right"><b><?php echo $row_tienda1['fecha']; ?></b></span>

<span class="Estilo3">
<b><?php echo $row_tienda1['alias']; ?>, <?php echo $row_tienda1['estado']; ?></b></span><br>
<br/><?php echo $row_tienda1['opinion'].utf8_decode('<br/><b>Calificación</b>:'); ?> <img src="<?php echo $row_tienda1['calificacion']; ?>.gif" alt="<?php echo $products_name; ?>"/><hr class="dotted"/><?php } while ($row_tienda1 = mysql_fetch_assoc($tienda1)); ?><br/>
<?php if ($pageNum_tienda1 > 0) { ?><a href="<?php printf("%s?pageNum_tienda1=%d%s", $currentPage2, 0, $queryString_tienda1); ?>">&lt;&lt; Inicio</a> &nbsp; <?php } ?>
<?php if ($pageNum_tienda1 > 0) { ?><a href="<?php printf("%s?pageNum_tienda1=%d%s", $currentPage2, max(0, $pageNum_tienda1 - 1), $queryString_tienda1); ?>">&lt; Anterior</a> &nbsp; <?php } ?>
Registros del <?php echo ($startRow_tienda1 + 1) ?> al <?php echo min($startRow_tienda1 + $maxRows_tienda1, $totalRows_tienda1) ?> de <?php echo $totalRows_tienda1 ?>
<?php if ($pageNum_tienda1 < $totalPages_tienda1) { ?> &nbsp; <a href="<?php printf("%s?pageNum_tienda1=%d%s", $currentPage2, min($totalPages_tienda1, $pageNum_tienda1 + 1), $queryString_tienda1); ?>">Siguiente &gt;</a><?php } ?>
<?php if ($pageNum_tienda1 < $totalPages_tienda1) { ?> &nbsp; <a href="<?php printf("%s?pageNum_tienda1=%d%s", $currentPage2, $totalPages_tienda1, $queryString_tienda1); ?>">Final &gt;&gt;</a><?php } ?><br/><br/><br/><?php } ?>
<?php mysql_free_result($tienda1); ?>
				  
				  
				  
				<!--  //***************************// -->
					<br>
					</div>
								</td></tr>
   <tr><td><img src="images/m43.gif" width="735" height="7"/></td></tr>
	  </table>

<style>
.all_upper a{text-transform:uppercase;}
</style>

					<h1>Clientes que compraron este producto, tambi&eacute;n han comprado</h1>
		<table border="0" width="100%" cellspacing="0" cellpadding="0">
							
							<tr><td><img src="images/m35.gif" width="735" height="4"/></td></tr>
							
				<tr><td class="bg3a" cellspacing="0" cellpadding="0">
				
					<div align="center">
                    <br><table border='0' class="all_upper">
				    <?php 
					//if($existencias['products_ordered']>0){
					include(DIR_WS_MODULES.'also_purchased_products.php');
					//}
					?>
                    </table>
					<br><br>
					</div>
								</td></tr>
  			<tr><td><img src="images/m43.gif" width="735" height="7"/></td></tr>
	  </table>
</form></td>

<td></td>
<!--<td valign="top"><?// include('columna_derecha.php'); ?></td>-->
</tr></table>

<?php //
require(DIR_WS_INCLUDES . 'footer.php');


 ?>



</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>
<?php

	
								
/*function stock($prod_quantity,$price,$id,$name){
		$lincar='<input type="hidden" name="products_id" value="'.$id.'"><input type="image" src="includes/languages/espanol/images/buttons/button_in_cart.gif" alt="Compre '.$name.' ahora!		" title="Compre '.$name.' ahora!" align="right">';


		$lincar2='<img src="includes/languages/espanol/images/buttons/button_agotado.gif" align="right">';

		$prod_quantity = tep_get_products_stock($id);
		$boton=$lincar2;
		switch ($prod_quantity){ 
		case 0: 
		$boton=$lincar2;
		break; 
		default: 
		if($price>0&&$prod_quantity>0){
        $boton = $lincar;
		 }
		}
		echo $boton;
	}*/
	?>