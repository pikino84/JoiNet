<?
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

    
    <script>
        var base_path='/mayoreo/';
    </script>
        
  <style type="text/css">
    .col-md-2{
        border: solid 1px #89878C;
        height: 150px;
        position: relative;
        padding: 0px 5px;
    }
    .col-md-2 .nombre{
        color: #C54832;
        font-family: 'PT Sans', sans-serif;
        /*font-weight: 700;*/
        position: absolute;
        /*right: 0px;*/
        /*text-align: right;*/
        font-size: 14px;
        display: block;
    }
    .col-md-2 .id_producto{
        color: #fff;
        font-family: 'PT Sans', sans-serif;
        /*font-weight: 700;*/
        position: absolute;
        /*left: 0px;*/
        /*bottom: 35px;*/
        bottom: 5px;
        left: 0px;
        right: 0px;
        margin: auto;
        font-size: 10px;
        background: #C54832;
        padding: 0px;
        width: 70px;
        text-align: center;
    }
    .col-md-2 .fabricante{
        position: absolute;
        left: 5px;
        bottom: 5px;
        width: 50px; 
    }
    .product_image{
        width: 70px;
        height: 70px;
        position: absolute;
        /*top: 0px;*/
        right: 0px;
        bottom: 18px;
        left: 0px;
        margin: auto;
    }
    .precio{
        font-family: 'PT Sans', sans-serif;
        font-weight: 700;
        display: block;
        background: #5F7DB8;
        color: #fff;
        position: absolute;
        right: 0px;
        bottom: 5px;
        padding: 0px 1px;
        font-size: 16px;
        width: 55px;
        text-align: right;
    }
  </style>

    

</head>
<body>




<div class="container">
    <div class="row">
        <? foreach($categories as $categorie):?>

            <? $this->data['products'] = $this->products_model->get_products(array('fk_categoria'=>$categorie->id_categoria))?>

            <? foreach($this->data['products'] as $product):?>

                <div class="col-md-2">

                    <? if($product->manufacturers_id != '89'){ /*echo $product->manufacturers_id;*/?>
                        <img class="fabricante img-responsive img-thumbnail" src="https://www.massivepc.com/images/<?=$product->manufacturers_image?>">
                    <? }?>
                    

                    <span class="nombre">
                        <?=ucfirst(mb_strtolower(character_limiter($product->products_name, 50)))?>
                    </span>

                    <img class="product_image img-responsive img-thumbnail" src="https://www.massivepc.com/images/<?=$product->products_image?>"/>

                    <span class="id_producto">
                        <?=$product->products_id?>
                    </span>

                    <span class="precio">
                        <? $con_iva = $product->products_price + (16*($product->products_price/100));?>
                        $<?=number_format(round($con_iva,2))?>
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
    
    
    <script type="text/javascript">

    $(function(){
        

    });

    </script>

</body>
    

</html>