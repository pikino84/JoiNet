<?php
header('Content-Type: text/html; charset=iso-8859-1');
include("controlSession.php");
/*
$_SESSION['desc']=$_GET['desc'];
$_SESSION['mont']=$_GET['mont'];
UNSET($_GET);
*/
require_once ('/home/massivep/www/mayoreo/ML/lib/mercadopago.php');
$mp = new MP ("2062037664686861", "HKU7lmubNXVka9ZkEDKxjaMR3ihLK82c");
$mp->sandbox_mode(TRUE);

/*
$descrip="Test mm xx";
$amount=1000.00;
*/
//if(isset($_GET['desc'])){

$descrip=$_SESSION['desc'];
$amount=$_SESSION['mont'];
	
//}
echo $descrip;
echo '<br>';
echo $amount;

//die();
$preference_data = array(
"items" => array(
array("title" => $descrip,"quantity" => 1,"currency_id" => "MXN","unit_price" => $amount)
),"back_urls" => array("success" => "","failure" => "","pending" => "")
);
$preference = $mp->create_preference($preference_data);		
$url=$preference['response']['sandbox_init_point'];
$btnPagarMP = '<a href="'.$url.'">Pagar con MercadoPago</a> ';
echo $btnPagarMP;



?>