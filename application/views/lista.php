<?
set_time_limit(0);

ini_set("display_errors", "1");
error_reporting(E_ALL);


?>
<!doctype html>

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title> </title>

    <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href="<?=base_url()?>assets/css/style_buscador.css?cb=<?=md5(time())?>" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/bootstrap3/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" >

    <style type="text/css">
        
        @font-face {
            font-family: 'Myriad Pro';
            src: url('<?=base_url()?>assets/fonts/MyriadPro-BoldIt.eot');
            src: url('<?=base_url()?>assets/fonts/MyriadPro-BoldIt.eot?#iefix') format('embedded-opentype'),
                url('<?=base_url()?>assets/fonts/MyriadPro-BoldIt.woff') format('woff'),
                url('<?=base_url()?>assets/fonts/MyriadPro-BoldIt.ttf') format('truetype');
            font-weight: bold;
            font-style: italic;
        }

    </style>

</head>
<body>




<div class="container" style="width:1170px;">

    <div class="row" style="width:1170px;">

    <? //=var_dump($categories)?>

            <? foreach($categories as $categorie):?>

                <? $this->data['products'] = $this->products_model->get_products_volantes( array('fk_categoria'=>$categorie->id_categoria) )?>

                <? foreach($this->data['products'] as $product):?>

                    <div class="cl2" style="border: solid 1px #0000ff;width:390px;height: 90px;position: relative;padding: 0px 5px;float: left;">

                        <span class="id_producto" style="font-weight: 700;color: #000;font-family: 'PT Sans', sans-serif; position: absolute; left: 5px; font-size: 24px;padding: 0px;width: 90px;text-align: left;">
                            <?=$product->products_id?>
                        </span>

                        <span class="precio" style="font-family: 'PT Sans', sans-serif; font-weight: 700; display: block;background: #C54832;color: #fff;position: absolute; right: 0px;padding: 0px 1px;font-size: 24px;width: 85px;text-align: right;">
                            <? $con_iva = $product->products_price + (16*($product->products_price/100));?>
                            $<?=number_format(round($con_iva,2))?>
                        </span>

                        <span class="nombre" style="color: #000;font-family: 'PT Sans', sans-serif;position: absolute;line-height: 15px;font-size: 16px;display: block; left: 0px; top: 35px; padding: 0 5px 0 5px;">
                            <?=ucfirst(mb_strtolower($product->products_name))?>
                        </span>

                        

                    </div>

                <? endforeach?>

            <? endforeach?>

    </div>


</div>
    
    
    <script src="/mayoreo/assets/js/jquery-1.11.3.min.js"></script>
    <script src="/mayoreo/assets/js/jquery.print.js"></script>
    <script src="/mayoreo/assets/js/jquery.currency.js"></script>
    <script src="/mayoreo/assets/bootstrap3/js/bootstrap.js"></script>
    <script src="/mayoreo/assets/js/mayoreo_buscador.js?<?=md5(time())?>=<?=md5(time())?>"></script>
    
    
  

</body>
    

</html>