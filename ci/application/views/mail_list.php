<!doctype html>
<!--[if lt IE 7 ]> <html class="ie ie6 ie-lt10 ie-lt9 ie-lt8 ie-lt7 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 ie-lt10 ie-lt9 ie-lt8 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 ie-lt10 ie-lt9 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 ie-lt10 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
<!-- the "no-js" class is for Modernizr. --> 

<head>

	<meta charset="utf-8">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<title></title>
	<meta name="author" content="" />
	<meta name="description" content="" />
	<meta name="google-site-verification" content="" />
	<meta name="Copyright" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="shortcut icon" href="favicon.ico" />
	<link rel="stylesheet" href="<?=base_url()?>assets/css/reset.css" />
	<link rel="stylesheet" href="<?=base_url()?>assets/css/style.css" />
	
	<script src="<?=base_url()?>assets/js/libs/prefixfree.min.js"></script>
	<script src="<?=base_url()?>assets/js/libs/modernizr-2.7.1.dev.js"></script>
    
    <style>
		td{border:solid thin #000000; padding:5px;}
		.correcto{display:block; background:#00FF4C;}
		.incorrecto{display:block; background:#FF0004;}
	</style>


</head>

<body>

<div class="wrapper">

	<table>
	<? $i=1; foreach($mails as $mail):?>
    	<tr>
        	<td><?=$i++?></td>
            <td><a href="#_"><?=strtolower($mail->customers_newsletter_email)?></a></td>
            <td>
            	<? if (valid_email($mail->customers_newsletter_email)){
						echo '<span class="correcto">Correcto</span>';
					}else{
						echo '<span class="incorrecto">Incorrecto</span>';
					}?>
            </td>
		</tr>
	<? endforeach?>
	</table>
    
    
    
    
    
</div>

<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="<?=base_url()?>assets/js/functions.js"></script>


  
</body>
</html>
