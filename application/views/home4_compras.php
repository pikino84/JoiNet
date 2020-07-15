<? //error_reporting(-1); ?>

<!doctype html>

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title> </title>

    <!--<link href="<?=base_url()?>assets/css/stylev4.css" rel="stylesheet" type="text/css">-->
    <link href="/css/jquery-ui.css" rel="stylesheet" type="text/css">
    <!--<link href="<?=base_url()?>assets/bootstrap3/css/bootstrap.css" rel="stylesheet" type="text/css">-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" >

    <link href="https://www.massivepc.com/mayoreo/assets/css/style_buscador.css?cb=4872a7d95911e9a0d94afe66ef807ea5" rel="stylesheet" type="text/css">
    <link href="https://www.massivepc.com/mayoreo/assets/bootstrap3/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://www.massivepc.com/mayoreo/assets/css/bootstrap-chosen.css" type="text/css" media="screen" />
    
    <script>
        var base_path='/mayoreo/';
    </script>
        
    <style type="text/css">
    html body.modal-open div#myModal.modal.fade.in div.modal-backdrop{
        position: fixed;
    }
    .label{
        display: inline-block;
        margin: 5px 0 0 0;
        text-align: left;
    }
    .text-center.text_rojo label.btn.btn-success,
    .text-center.text_rojo label.btn.btn-danger{
        display: inline-block;
        text-align: left;
        font-size: 10px;
        font-weight: normal;
    }
    .text-center.text_rojo label.btn.btn-success.btn-xs span.badge{
        font-size: 10px;
        font-weight: normal;
    }
    td,th{
        font-size: 10px;
    }
    .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td{
        padding: 1px;
    }
    .btn-xs, .btn-group-xs > .btn{
        padding: 1px;
    }
    .product-flags{
        position: relative;
        width: 100%;
        margin:5px;
    }
    .product-flags .remate{
        background: #EC6A06 none repeat scroll 0 0;
        box-shadow: 2px 2px 11px 0 rgba(0, 0, 0, 0.1);
        color: #fff;
        display: block;
        font-size: 1rem;
        font-weight: 600;
        left: -0.4375rem;
        min-height: 1.875rem;
        min-width: 3.125rem;
        padding: 0.3125rem 0.4375rem;
        position: absolute;
        text-transform: uppercase;
        top: 0.4375rem;
    }

    .product-flags .nuevo{
        background: #1a73ab none repeat scroll 0 0;
        box-shadow: 2px 2px 11px 0 rgba(0, 0, 0, 0.1);
        color: #fff;
        display: block;
        font-size: 1rem;
        font-weight: 600;
        left: -0.4375rem;
        min-height: 1.875rem;
        min-width: 3.125rem;
        padding: 0.3125rem 0.4375rem;
        position: absolute;
        text-transform: uppercase;
        top: 0.4375rem;
    }
    </style>

</head>
<body>



<div class="container-fluid">
               
        <div style="clear:both;"></div>
        
        <div id="seleccion">
            <h3>Tipo de cambio</h3>

            <?
                $cny_to_mxn = conversor_monedas('CNY','MXN',1);
                $usd_to_mxn = conversor_monedas('USD','MXN',1);
                $cny_to_usd = conversor_monedas('CNY','USD',1);

                $atts = array(
                    'width'      => '200',
                    'height'     => '100',
                    'scrollbars' => 'no',
                    'status'     => 'no',
                    'resizable'  => 'no',
                    'screenx'    => '500',
                    'screeny'    => '500'
                );
            ?>

            <label class="btn btn-primary btn-xs">
            1 Yuan renminbi chino <span class="badge"><?=$cny_to_mxn?></span> MXN </label><br><br>

            <label class="btn btn-primary btn-xs">
            1 Dolar estadunidense <span class="badge"><?=round($usd_to_mxn,3)?></span> MXN</label><br><br>

            <label class="btn btn-primary btn-xs">
            1 Yuan renminbi chino <span class="badge"><?=$cny_to_usd?></span> USD</label><br><br>
<div style="clear:both;"></div>
            <?
            $productos222 = $this->products_model->get_products(array('products_status'=>'1', 'products.MyBusiness20' => '1'));
            //echo var_dump($productos);
            //die();
            $sumado  = 0;
            $sumado2 = 0;
            $sumado3 = count($productos222);
            $sumado4 = 0;
            $sumado4a = 0;			
            echo '<table border="1">';
            echo '<tr><td align="center">Distribuidor</td><td align="center">Costo</td></tr>';
            foreach($productos222 as $producto){
                $sumado4 += $producto->sae_exist * $producto->precio_distribuidor;
				if(trim($producto->costo_nacional)!="")
                $sumado4a += $producto->sae_exist * $producto->costo_nacional;				
				
            }
            echo '<tr><td>$'.number_format($sumado4).'</td><td>$'.number_format($sumado4a).'</td></tr>';
            echo '</table>';
            ?><br>

            <div style="position: absolute; top: 0px; left: 200px; width: 88%; height: 500px;">
                <!--<iframe style="width:100%; height: 400px;" src="https://www.massivepc.com/mayoreo/prv2" frameborder="0"></iframe>-->
            </div>

<div style="clear:both;"></div>
 
            <div class="row" style="margin:150px 0 0 0;">
                <div class="col-md-12">

                <div class="panel panel-default">
                      <div class="panel-heading">
                            <i class="glyphicon glyphicon-search"></i> Buscador
                            <a class="btn btn-primary btn-xs pull-right" href="https://www.massivepc.com/mayoreo/home/compras/dc483e80a7a0bd9ef71d8cf973673924">Limpiar</a>
                      </div>
  <div class="panel-body">
   
    <form id="filtro" method="get" action="#row">

        <input type="hidden" name="rnd" value="<?=md5(time())?>">
        
        <div class="row">

            <div class="col-md-2">
                <div class="input-group">
                    <input type="text" style="margin: 0px;" class="form-control" id="palabra" name="palabra" value="<?=$palabra?>" placeholder="Descripción del producto">
                    <span class="input-group-btn">
                        <button class="btn btn-primary btn-search" type="submit">Buscar</button>
                    </span>
                </div>
            </div>

            <div class="col-md-3">
                <select id="marca" name="marca" class="chosen-select" data-placeholder="Marca" tabindex="-1">
                    <option value="">TODAS LAS MARCAS</option>
                    <? foreach($marcas as $marca):?>
                        <option <?=($marca_id == $marca->id_marca) ? 'selected' : '' ?> value="<?=$marca->id_marca?>"><?=$marca->marca?></option>
                    <? endforeach?>
                </select>
            </div>

            <div class="col-md-3">

                <select id="categoria" name="categoria" class="chosen-select" data-placeholder="Categoría" tabindex="-1">
                    <option value="">TODAS LAS CATEGORIAS</option>
                    <option <?=($categoria_id == '21') ? 'selected' : '' ?> value="21">OCULTAS</option>
                    <? foreach($categories as $categoria):?>
                    <option <?=($categoria_id == $categoria->id_categoria) ? 'selected' : '' ?> value="<?=$categoria->id_categoria?>"><?=$categoria->categoria?></option>
                    <? endforeach?>
                </select>

            </div>

            <div class="col-md-2">
                <select id="ordenar" name="ordenar" class="chosen-select" data-placeholder="Ordenar" tabindex="-1">
                    <option value="">ORDENAR POR</option>
                    <? if($ordenar == 'menor_precio'){?>
                        <option value="menor_precio" selected="">MENOR PRECIO</option>
                    <? }else{?>
                        <option value="menor_precio">MENOR PRECIO</option>
                    <? }?>                       
                    <? if($ordenar == 'mayor_precio'){?>
                        <option value="mayor_precio" selected="">MAYOR PRECIO</option>
                    <? }else{?>
                        <option value="mayor_precio">MAYOR PRECIO</option>
                    <? }?>                       
                    <? if($ordenar == 'ventas'){?>
                        <option value="ventas" selected="">VENTAS</option>
                    <? }else{?>
                        <option value="ventas">VENTAS</option>
                    <? }?>
                    <? if($ordenar == 'ventas1'){?>
                        <option value="ventas1" selected="">VENTAS 1 MES</option>
                    <? }else{?>
                        <option value="ventas1">VENTAS 1 MES</option>
                    <? }?>                    
                    <? if($ordenar == 'ventas3'){?>
                        <option value="ventas3" selected="">VENTAS 3 MESES</option>
                    <? }else{?>
                        <option value="ventas3">VENTAS 3 MESES</option>
                    <? }?>        
                    <? if($ordenar == 'ventas6'){?>
                        <option value="ventas6" selected="">VENTAS 6 MESES</option>
                    <? }else{?>
                        <option value="ventas6">VENTAS 6 MESES</option>
                    <? }?>  
					
                    <? if($ordenar == 'ventas12'){?>
                        <option value="ventas12" selected="">VENTAS 12 MESES</option>
                    <? }else{?>
                        <option value="ventas12">VENTAS 12 MESES</option>
                    <? }?>   					
                    <? if($ordenar == 'fecha_alta'){?>
                        <option value="fecha_alta" selected="">FECHA ALTA</option>
                    <? }else{?>
                        <option value="fecha_alta">FECHA ALTA</option>
                    <? }?>

                    <? if($ordenar == 'existencia'){?>
                        <option value="existencia" selected="">EXISTENCIA</option>
                    <? }else{?>
                        <option value="existencia">EXISTENCIA</option>
                    <? }?>
                    
                    
                </select>
            </div>
            <div class="col-md-2">


<select id="proveedor_id" name="proveedor_id" class="chosen-select" data-placeholder="PROVEEDOR" tabindex="-1">
 <option value="">PROVEEDOR.</option>
 <? foreach ($prov as $k => $v) {?>
     <option <?=($proveedor_id == $v->id_prov) ? 'selected=""' : '' ?> value="<?=$v->id_prov?>"><?=$v->nombre?></option> 
<? }?>
  <!--<option <?=($proveedor_id == '       245') ? 'selected=""' : '' ?> value="       245">RADOX</option> 
<option <?=($proveedor_id == '       107') ? 'selected=""' : '' ?> value="       107">8341 (Dany) df</option> 
 <option <?=($proveedor_id == '       122') ? 'selected=""' : '' ?> value="       122">A AND M</option> 
 <option <?=($proveedor_id == '       126') ? 'selected=""' : '' ?> value="       126">ACCESORIOS GENESIS PANDA</option> 
 <option <?=($proveedor_id == '        51') ? 'selected=""' : '' ?> value="        51">ACCESORIOS Y CONTROLES</option> 
 <option <?=($proveedor_id == '       186') ? 'selected=""' : '' ?> value="       186">ACCIS DIADEMA KITTY</option> 
 <option <?=($proveedor_id == '       159') ? 'selected=""' : '' ?> value="       159">ACCIS TECHNOLOGY</option> 
 <option <?=($proveedor_id == '        93') ? 'selected=""' : '' ?> value="        93">ADG TECHNOLOGIES</option> 
 <option <?=($proveedor_id == '       103') ? 'selected=""' : '' ?> value="       103">AION</option> 
 <option <?=($proveedor_id == '       154') ? 'selected=""' : '' ?> value="       154">AL GAMES</option> 
 <option <?=($proveedor_id == '       180') ? 'selected=""' : '' ?> value="       180">ALCANCIAS CASINO</option> 
 <option <?=($proveedor_id == '       112') ? 'selected=""' : '' ?> value="       112">AMAZING VISION</option> 
 <option <?=($proveedor_id == '        59') ? 'selected=""' : '' ?> value="        59">AMERIK</option> 
 <option <?=($proveedor_id == '       102') ? 'selected=""' : '' ?> value="       102">ANDAFA INNOVATORS S.A DE C.V</option> 
 <option <?=($proveedor_id == '       166') ? 'selected=""' : '' ?> value="       166">ANDY</option> 
 <option <?=($proveedor_id == '        77') ? 'selected=""' : '' ?> value="        77">ANTENAS JONATHAN BARRON</option> 
 <option <?=($proveedor_id == '        11') ? 'selected=""' : '' ?> value="        11">ARANAM SA DE CV</option> 
 <option <?=($proveedor_id == '       175') ? 'selected=""' : '' ?> value="       175">ARUMI</option> 
 <option <?=($proveedor_id == '        84') ? 'selected=""' : '' ?> value="        84">ATELEFONITOS</option> 
 <option <?=($proveedor_id == '        94') ? 'selected=""' : '' ?> value="        94">AXVan</option> 
 <option <?=($proveedor_id == '        16') ? 'selected=""' : '' ?> value="        16">Actualizaciones para computadoras SA de CV</option> 
 <option <?=($proveedor_id == '        14') ? 'selected=""' : '' ?> value="        14">Alberto de Jesus Virgen Magaña</option> 
 <option <?=($proveedor_id == '        28') ? 'selected=""' : '' ?> value="        28">Amigo Eduardo Chips Telcel</option> 
 <option <?=($proveedor_id == '       173') ? 'selected=""' : '' ?> value="       173">Amor</option> 
 <option <?=($proveedor_id == '        54') ? 'selected=""' : '' ?> value="        54">Arturo Eloir Olivera Barrera</option> 
 <option <?=($proveedor_id == '       141') ? 'selected=""' : '' ?> value="       141">BIG BANG TECHNOLOGY</option> 
 <option <?=($proveedor_id == '        41') ? 'selected=""' : '' ?> value="        41">BRENDA BORES</option> 
 <option <?=($proveedor_id == '        30') ? 'selected=""' : '' ?> value="        30">Barware S.A. De C.V.</option> 
 <option <?=($proveedor_id == '       117') ? 'selected=""' : '' ?> value="       117">CAGI</option> 
 <option <?=($proveedor_id == '        67') ? 'selected=""' : '' ?> value="        67">CANSA</option> 
 <option <?=($proveedor_id == '       101') ? 'selected=""' : '' ?> value="       101">CARGADORES MAPE</option> 
 <option <?=($proveedor_id == '       164') ? 'selected=""' : '' ?> value="       164">CARLOS CUELLAR</option> 
 <option <?=($proveedor_id == '        75') ? 'selected=""' : '' ?> value="        75">CARLOS ERNESTO ARELLANO JIMENEZ</option> 
 <option <?=($proveedor_id == '       132') ? 'selected=""' : '' ?> value="       132">CELMEX</option> 
 <option <?=($proveedor_id == '        66') ? 'selected=""' : '' ?> value="        66">CELULAR GOLDEN</option> 
 <option <?=($proveedor_id == '       125') ? 'selected=""' : '' ?> value="       125">CELULAR PLANET</option> 
 <option <?=($proveedor_id == '       139') ? 'selected=""' : '' ?> value="       139">CENTRAL 87</option> 
 <option <?=($proveedor_id == '       123') ? 'selected=""' : '' ?> value="       123">CENTROCEL TERESA</option> 
 <option <?=($proveedor_id == '       158') ? 'selected=""' : '' ?> value="       158">CHENS DIGITAL</option> 
 <option <?=($proveedor_id == '         8') ? 'selected=""' : '' ?> value="         8">CHEPE</option> 
 <option <?=($proveedor_id == '       183') ? 'selected=""' : '' ?> value="       183">CHINLUE LAMPARAS DE LAVA</option> 
 <option <?=($proveedor_id == '       108') ? 'selected=""' : '' ?> value="       108">CHIPS MOVISTAR</option> 
 <option <?=($proveedor_id == '       144') ? 'selected=""' : '' ?> value="       144">CHIPS TELCEL (Paul)</option> 
 <option <?=($proveedor_id == '       128') ? 'selected=""' : '' ?> value="       128">CINTURON CITY</option> 
 <option <?=($proveedor_id == '        85') ? 'selected=""' : '' ?> value="        85">COBY</option> 
 <option <?=($proveedor_id == '        50') ? 'selected=""' : '' ?> value="        50">COMECO TECNOLOGIAS MEXICO S.A. DE C.V</option> 
 <option <?=($proveedor_id == '       168') ? 'selected=""' : '' ?> value="       168">CONCEPTO E IMAGEN DIGITAL S.A. DE C.V.</option> 
 <option <?=($proveedor_id == '        17') ? 'selected=""' : '' ?> value="        17">CORPORATIVO MONZALBO SA DE CV</option> 
 <option <?=($proveedor_id == '         9') ? 'selected=""' : '' ?> value="         9">CVA</option> 
 <option <?=($proveedor_id == '        25') ? 'selected=""' : '' ?> value="        25">Cable Men ( Oscar Alejandro Guerrero Carranza )</option> 
 <option <?=($proveedor_id == '        97') ? 'selected=""' : '' ?> value="        97">Carlos Gomez Chips</option> 
 <option <?=($proveedor_id == '         4') ? 'selected=""' : '' ?> value="         4">Conexión y Energia en computación sa de cv</option> 
 <option <?=($proveedor_id == '        43') ? 'selected=""' : '' ?> value="        43">Corporativo Ebb</option> 
 <option <?=($proveedor_id == '        86') ? 'selected=""' : '' ?> value="        86">DANIEL MEMORIAS</option> 
 <option <?=($proveedor_id == '       167') ? 'selected=""' : '' ?> value="       167">DISTRIBUIDORA LASSER</option> 
 <option <?=($proveedor_id == '        31') ? 'selected=""' : '' ?> value="        31">DISTRIBUIDORA TECTRON ( IVAN ISRAEL GARCIA GARCIA )</option> 
 <option <?=($proveedor_id == '        57') ? 'selected=""' : '' ?> value="        57">DIVERSION Y TRABAJO S.A DE C.V</option> 
 <option <?=($proveedor_id == '       127') ? 'selected=""' : '' ?> value="       127">DNS</option> 
 <option <?=($proveedor_id == '        80') ? 'selected=""' : '' ?> value="        80">DON BETO</option> 
 <option <?=($proveedor_id == '       138') ? 'selected=""' : '' ?> value="       138">DON DANY</option> 
 <option <?=($proveedor_id == '       184') ? 'selected=""' : '' ?> value="       184">DOSYU</option> 
 <option <?=($proveedor_id == '        68') ? 'selected=""' : '' ?> value="        68">EBENEZER IMPORTADORA S DE RL DE CV</option> 
 <option <?=($proveedor_id == '       104') ? 'selected=""' : '' ?> value="       104">ELE-GATE</option> 
 <option <?=($proveedor_id == '       147') ? 'selected=""' : '' ?> value="       147">ELECTRICA EL 45</option> 
 <option <?=($proveedor_id == '       160') ? 'selected=""' : '' ?> value="       160">ELECTRONICA JAIRO</option> 
 <option <?=($proveedor_id == '       163') ? 'selected=""' : '' ?> value="       163">EMPLEADO HARUMI</option> 
 <option <?=($proveedor_id == '        22') ? 'selected=""' : '' ?> value="        22">ESTAFETA MEXICANA S.A. DE C.V.</option> 
 <option <?=($proveedor_id == '        13') ? 'selected=""' : '' ?> value="        13">ESTAFETA MEXICANA SA DE CV</option> 
 <option <?=($proveedor_id == '        49') ? 'selected=""' : '' ?> value="        49">ESTAFETA SF  (BENJAMIN LEDEZMA)</option> 
 <option <?=($proveedor_id == '       188') ? 'selected=""' : '' ?> value="       188">EVA-Y</option> 
 <option <?=($proveedor_id == '        52') ? 'selected=""' : '' ?> value="        52">Eduardo Chips</option> 
 <option <?=($proveedor_id == '        26') ? 'selected=""' : '' ?> value="        26">El Mundo De La Tablet</option> 
 <option <?=($proveedor_id == '        36') ? 'selected=""' : '' ?> value="        36">Elux</option> 
 <option <?=($proveedor_id == '        46') ? 'selected=""' : '' ?> value="        46">Estafeta vip</option> 
 <option <?=($proveedor_id == '        48') ? 'selected=""' : '' ?> value="        48">FEDEX SF</option> 
 <option <?=($proveedor_id == '       105') ? 'selected=""' : '' ?> value="       105">FIMEX</option> 
 <option <?=($proveedor_id == '       152') ? 'selected=""' : '' ?> value="       152">FON CEL</option> 
 <option <?=($proveedor_id == '       119') ? 'selected=""' : '' ?> value="       119">FULAME IMPORTACION</option> 
 <option <?=($proveedor_id == '        56') ? 'selected=""' : '' ?> value="        56">FUSSION ACUSTIC</option> 
 <option <?=($proveedor_id == '        90') ? 'selected=""' : '' ?> value="        90">FUSSION DF</option> 
 <option <?=($proveedor_id == '        37') ? 'selected=""' : '' ?> value="        37">Fernando Grin</option> 
 <option <?=($proveedor_id == '       136') ? 'selected=""' : '' ?> value="       136">G MOVILE</option> 
 <option <?=($proveedor_id == '       153') ? 'selected=""' : '' ?> value="       153">G&N CELULARES</option> 
 <option <?=($proveedor_id == '       157') ? 'selected=""' : '' ?> value="       157">GENESIS PANDA</option> 
 <option <?=($proveedor_id == '       142') ? 'selected=""' : '' ?> value="       142">GOUMIN ZHEN</option> 
 <option <?=($proveedor_id == '        63') ? 'selected=""' : '' ?> value="        63">GROUPE ADAKTY S.A DE C.V</option> 
 <option <?=($proveedor_id == '        12') ? 'selected=""' : '' ?> value="        12">GRUPO CARABENCH SA DE CV</option> 
 <option <?=($proveedor_id == '        92') ? 'selected=""' : '' ?> value="        92">GRUPO YUDHA</option> 
 <option <?=($proveedor_id == '        38') ? 'selected=""' : '' ?> value="        38">Gabriel Laera</option> 
 <option <?=($proveedor_id == '        35') ? 'selected=""' : '' ?> value="        35">Grupo Moviles</option> 
 <option <?=($proveedor_id == '       110') ? 'selected=""' : '' ?> value="       110">HENG LIAN</option> 
 <option <?=($proveedor_id == '       106') ? 'selected=""' : '' ?> value="       106">HIP HOP</option> 
 <option <?=($proveedor_id == '       100') ? 'selected=""' : '' ?> value="       100">HUB CITY</option> 
 <option <?=($proveedor_id == '         5') ? 'selected=""' : '' ?> value="         5">I LIKE</option> 
 <option <?=($proveedor_id == '        87') ? 'selected=""' : '' ?> value="        87">IMPORTACIONES GONZALEZ</option> 
 <option <?=($proveedor_id == '        71') ? 'selected=""' : '' ?> value="        71">IMPORTACIONES MIMI</option> 
 <option <?=($proveedor_id == '        73') ? 'selected=""' : '' ?> value="        73">ISAC TEC,LADOS</option> 
 <option <?=($proveedor_id == '       165') ? 'selected=""' : '' ?> value="       165">IZI PAN</option> 
 <option <?=($proveedor_id == '        39') ? 'selected=""' : '' ?> value="        39">Importadora Az-tek SA de CV</option> 
 <option <?=($proveedor_id == '        47') ? 'selected=""' : '' ?> value="        47">J GUADALUPE ROSALES RIOS</option> 
 <option <?=($proveedor_id == '        61') ? 'selected=""' : '' ?> value="        61">JC CELULARES Y ACCESORIOS</option> 
 <option <?=($proveedor_id == '       133') ? 'selected=""' : '' ?> value="       133">JIAN HENG</option> 
 <option <?=($proveedor_id == '       161') ? 'selected=""' : '' ?> value="       161">JIANG FANGZHEN</option> 
 <option <?=($proveedor_id == '        19') ? 'selected=""' : '' ?> value="        19">JIYU ELECTRONIC CO,. LIMITED</option> 
 <option <?=($proveedor_id == '       171') ? 'selected=""' : '' ?> value="       171">JONATHAN AUDIFONOS</option> 
 <option <?=($proveedor_id == '       177') ? 'selected=""' : '' ?> value="       177">JOSE ANTONIO</option> 
 <option <?=($proveedor_id == '        18') ? 'selected=""' : '' ?> value="        18">Jose Trinidad MT Lider</option> 
 <option <?=($proveedor_id == '        29') ? 'selected=""' : '' ?> value="        29">Juan Carlos Honojosa Garcia</option> 
 <option <?=($proveedor_id == '       120') ? 'selected=""' : '' ?> value="       120">KAI PING</option> 
 <option <?=($proveedor_id == '       135') ? 'selected=""' : '' ?> value="       135">KAILI</option> 
 <option <?=($proveedor_id == '       176') ? 'selected=""' : '' ?> value="       176">KARINA TERESA AUDIFONOS</option> 
 <option <?=($proveedor_id == '       189') ? 'selected=""' : '' ?> value="       189">KIKI´S TOYS</option> 
 <option <?=($proveedor_id == '        79') ? 'selected=""' : '' ?> value="        79">KINGMEX</option> 
 <option <?=($proveedor_id == '       170') ? 'selected=""' : '' ?> value="       170">LEONARDO ZAMORANO</option> 
 <option <?=($proveedor_id == '        58') ? 'selected=""' : '' ?> value="        58">LIFE</option> 
 <option <?=($proveedor_id == '       162') ? 'selected=""' : '' ?> value="       162">LJK</option> 
 <option <?=($proveedor_id == '       111') ? 'selected=""' : '' ?> value="       111">LOS CHITOS</option> 
 <option <?=($proveedor_id == '        64') ? 'selected=""' : '' ?> value="        64">LYX LUXURY FUNDAS</option> 
 <option <?=($proveedor_id == '       145') ? 'selected=""' : '' ?> value="       145">MAIZ</option> 
 <option <?=($proveedor_id == '        72') ? 'selected=""' : '' ?> value="        72">MARTIN GUSTAVO GRIJALVA MARTINEZ</option> 
 <option <?=($proveedor_id == '       155') ? 'selected=""' : '' ?> value="       155">MARVO</option> 
 <option <?=($proveedor_id == '       178') ? 'selected=""' : '' ?> value="       178">MEGAFIRE</option> 
 <option <?=($proveedor_id == '       149') ? 'selected=""' : '' ?> value="       149">MEMORY ONE</option> 
 <option <?=($proveedor_id == '       140') ? 'selected=""' : '' ?> value="       140">MEY</option> 
 <option <?=($proveedor_id == '        83') ? 'selected=""' : '' ?> value="        83">MG MOBILE</option> 
 <option <?=($proveedor_id == '       156') ? 'selected=""' : '' ?> value="       156">MIND CONTROL</option> 
 <option <?=($proveedor_id == '        27') ? 'selected=""' : '' ?> value="        27">MT Lider</option> 
 <option <?=($proveedor_id == '        88') ? 'selected=""' : '' ?> value="        88">MUNDO DE LA TABLET</option> 
 <option <?=($proveedor_id == '        69') ? 'selected=""' : '' ?> value="        69">Marisol Chips</option> 
 <option <?=($proveedor_id == '        95') ? 'selected=""' : '' ?> value="        95">Micas Pedro Bravo</option> 
 <option <?=($proveedor_id == '        44') ? 'selected=""' : '' ?> value="        44">Moove tech</option> 
 <option <?=($proveedor_id == '        40') ? 'selected=""' : '' ?> value="        40">Mundo de la Tablet</option> 
 <option <?=($proveedor_id == '       182') ? 'selected=""' : '' ?> value="       182">NEF REJAS</option> 
 <option <?=($proveedor_id == '       129') ? 'selected=""' : '' ?> value="       129">OSOCEL</option> 
 <option <?=($proveedor_id == '       116') ? 'selected=""' : '' ?> value="       116">OTROS D,F</option> 
 <option <?=($proveedor_id == '       143') ? 'selected=""' : '' ?> value="       143">OTROS GDL</option> 
 <option <?=($proveedor_id == '       114') ? 'selected=""' : '' ?> value="       114">OTTO DIGITAL</option> 
 <option <?=($proveedor_id == '        10') ? 'selected=""' : '' ?> value="        10">PC HARDWARE</option> 
 <option <?=($proveedor_id == '        60') ? 'selected=""' : '' ?> value="        60">PCH MAYOREO SA. DE CV.</option> 
 <option <?=($proveedor_id == '       134') ? 'selected=""' : '' ?> value="       134">PLAZA TEREZA (maiz)</option> 
 <option <?=($proveedor_id == '       150') ? 'selected=""' : '' ?> value="       150">POPULAR TECNOLOGIA</option> 
 <option <?=($proveedor_id == '        96') ? 'selected=""' : '' ?> value="        96">PROLICOM</option> 
 <option <?=($proveedor_id == '         7') ? 'selected=""' : '' ?> value="         7">PROVEEDOR DE ANTENAS WIFI SKY Y DIAMOND</option> 
 <option <?=($proveedor_id == '        42') ? 'selected=""' : '' ?> value="        42">PTT SOLUCIONES SA DE CV</option> 
 <option <?=($proveedor_id == '        23') ? 'selected=""' : '' ?> value="        23">Pacific. Com S.A. De C.V.</option> 
 <option <?=($proveedor_id == '        55') ? 'selected=""' : '' ?> value="        55">Proveedor Df</option> 
 <option <?=($proveedor_id == '        70') ? 'selected=""' : '' ?> value="        70">QRUZH</option> 
 <option <?=($proveedor_id == '       137') ? 'selected=""' : '' ?> value="       137">RAZZY</option> 
 <option <?=($proveedor_id == '        74') ? 'selected=""' : '' ?> value="        74">REDPACK</option> 
 <option <?=($proveedor_id == '        99') ? 'selected=""' : '' ?> value="        99">RIDER</option> 
 <option <?=($proveedor_id == '       185') ? 'selected=""' : '' ?> value="       185">ROCIO CARGADORES DF</option> 

 <option <?=($proveedor_id == '        91') ? 'selected=""' : '' ?> value="        91">SESUCONSA</option> 
 <option <?=($proveedor_id == '         1') ? 'selected=""' : '' ?> value="         1">SHENZU GROUP COL., LTD</option> 
 <option <?=($proveedor_id == '       113') ? 'selected=""' : '' ?> value="       113">SHINE COMPUTER</option> 
 <option <?=($proveedor_id == '        45') ? 'selected=""' : '' ?> value="        45">SHOPONLINE</option> 
 <option <?=($proveedor_id == '         2') ? 'selected=""' : '' ?> value="         2">SIMERST TRADING LIMITED</option> 
 <option <?=($proveedor_id == '        65') ? 'selected=""' : '' ?> value="        65">SINGUA TECNOLOGIA S.A. DE C.V.</option> 
 <option <?=($proveedor_id == '         6') ? 'selected=""' : '' ?> value="         6">SINOSTAR INTERNATIONAL (HK) CO.,LTD</option> 
 <option <?=($proveedor_id == '       172') ? 'selected=""' : '' ?> value="       172">SPACE MB</option> 
 <option <?=($proveedor_id == '       118') ? 'selected=""' : '' ?> value="       118">SRA. ROCIO D,F</option> 
 <option <?=($proveedor_id == '        32') ? 'selected=""' : '' ?> value="        32">STOCK CELULAR (VICTOR HUGO)</option> 
 <option <?=($proveedor_id == '       130') ? 'selected=""' : '' ?> value="       130">SU-LY</option> 
 <option <?=($proveedor_id == '        15') ? 'selected=""' : '' ?> value="        15">TC MEMORY  SA DE CV</option> 
 <option <?=($proveedor_id == '        20') ? 'selected=""' : '' ?> value="        20">TC MEMORY, S.A. DE C.V. (FAVOR DE NO USAR, CAPTURAR CON EL No. 15)</option> 
 <option <?=($proveedor_id == '        53') ? 'selected=""' : '' ?> value="        53">TECNOLOGIA & MAS</option> 
 <option <?=($proveedor_id == '       146') ? 'selected=""' : '' ?> value="       146">TECNOLOGIA Y NOVEDADES SOLAR</option> 
 <option <?=($proveedor_id == '        89') ? 'selected=""' : '' ?> value="        89">TMOVI</option> 
 <option <?=($proveedor_id == '         3') ? 'selected=""' : '' ?> value="         3">TVCENLINEA.COM S.A DE C.V</option> 
 <option <?=($proveedor_id == '        76') ? 'selected=""' : '' ?> value="        76">VELIKKA</option> 
 <option <?=($proveedor_id == '       121') ? 'selected=""' : '' ?> value="       121">VMEX</option> 
 <option <?=($proveedor_id == '       124') ? 'selected=""' : '' ?> value="       124">WEI HANG</option> 
 <option <?=($proveedor_id == '       148') ? 'selected=""' : '' ?> value="       148">WEICSOM</option> 
 <option <?=($proveedor_id == '        98') ? 'selected=""' : '' ?> value="        98">WHITESTONE</option> 
 <option <?=($proveedor_id == '        62') ? 'selected=""' : '' ?> value="        62">YIFA</option> 
 <option <?=($proveedor_id == '       187') ? 'selected=""' : '' ?> value="       187">YIN AUDIFONOS SAMSUNG</option> 
 <option <?=($proveedor_id == '        21') ? 'selected=""' : '' ?> value="        21">Z.H.U. ELECTRONICA</option> 
 <option <?=($proveedor_id == '       169') ? 'selected=""' : '' ?> value="       169">ZANJONG</option> 
 <option <?=($proveedor_id == '        81') ? 'selected=""' : '' ?> value="        81">ZENEK</option> 
 <option <?=($proveedor_id == '       115') ? 'selected=""' : '' ?> value="       115">ZHENG JIARONG</option> 
 <option <?=($proveedor_id == '       131') ? 'selected=""' : '' ?> value="       131">ZHONG GUANG</option> 
 <option <?=($proveedor_id == '       109') ? 'selected=""' : '' ?> value="       109">ZOGIS</option> 
 <option <?=($proveedor_id == '        24') ? 'selected=""' : '' ?> value="        24">Zona Azul Celulares SA De CV</option> 
 <option <?=($proveedor_id == '        33') ? 'selected=""' : '' ?> value="        33">alta tecnologia y vanguardia en accesorios</option> 
 <option <?=($proveedor_id == '        82') ? 'selected=""' : '' ?> value="        82">chips telcel y unefon</option> 
 <option <?=($proveedor_id == '        34') ? 'selected=""' : '' ?> value="        34">eb</option> 
 <option <?=($proveedor_id == '       151') ? 'selected=""' : '' ?> value="       151">harumi cell</option> 
 <option <?=($proveedor_id == '        78') ? 'selected=""' : '' ?> value="        78">sumex</option> -->
  
 
 
                                <!-- **************************-->
</select>
            </div>
            <div class="col-md-2">
                <select id="ultasv" name="ultasv" class="chosen-select" data-placeholder="Ultimas ventas" tabindex="-1">
                    <option value=""></option>
                    <?
//if(isset($_REQUEST['ultasv'])){
					if($_REQUEST['ultasv'] == 'ventas_mes'){?>
                        <option value="ventas_mes" selected="">Ultimo MES</option>
                    <? }else{?>
                        <option value="ventas_mes">Ultimo MES</option>
                    <? }?>                       
                    <? if($_REQUEST['ultasv'] == 'ventas_mes6'){?>
                        <option value="ventas_mes6" selected="">Ultimos 6 MESES</option>
                    <? }else{?>
                        <option value="ventas_mes6">Ultimos 6 MESES</option>
                    <? }
					?>                       
            
                    
                </select>
            </div>			
			
        </div>

        <div class="row" style="margin-top: 5px;">

            <div class="col-md-6">

                <h6>Mostrar solo existencias</h6>

                <div id="label-switch" class="make-switch switch-small" data-on-label="SI" data-off-label="NO">
                    <input id="existencias" name="existencias" <? if($existencias=='on'){ echo 'checked';}?> type="checkbox">
                </div>

            </div>

        </div>
        
    </form>

  </div>
</div>
                
            </div>

            </div>

            
            <!--<tr>-->
                <table class="table table-bordered" style="width:950px;">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:90px;">PRODUCTO</th>
                            <th class="text-center" style="width:170px;">NOMBRE</th>
                            <th class="text-center" style="width:170px;">PROVEEDOR</th>
                            <th class="text-center" style="width:170px;">CATEGORIA</th>
                            <th class="text-center" style="width:40px;">EXIS</th>
                            <th class="text-center" style="width:40px;">STOCK MÍNIMO</th>
                            <th class="text-center" style="width:40px;">VEN</th>
                            <th class="text-center" style="width:40px;">UCom</th>                            
                            <th class="text-center" style="width:40px;">PESO</th>
                            <th class="text-center" style="width:40px;">COSTO<br>RMB</th>
                            <th class="text-center" style="width:40px;">COSTO<br>USD</th>
                            <th class="text-center" style="width:40px;">COSTO<br>MXN</th>
                            <th class="text-center" style="width:40px;">COSTO <br>MXN + IVA</th>
                            <th class="text-center" style="width:40px;">COSTO USD</th>
                            <th class="text-center" style="width:40px;">COSTO<br>ENVÍO</th>
                            <th class="text-center" style="width:40px;">COSTO MXN +<br>IVA + ENVÍO</th>
                            <th class="text-center" style="width:40px;">COSTO NAC</th>
                            <th class="text-center" style="width:40px;">PRECIO<br>PUB.</th>
                            <th class="text-center" style="width:40px;">PRECIO<br>MAY.</th>
                            <th class="text-center" style="width:40px;">PRECIO<br>DIS.</th>
                            <th class="text-center" style="width:40px;">PRECIO<br>POR CAJA</th>
                            <th class="text-center" style="width:40px;">DESCONTINUADO</th>
                            <th class="text-center" style="width:40px;">Activo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    <? if($products != ''){

                        foreach ($products as $product):

                        //echo var_dump($products);

                        $con_iva = $product->products_price + (16*($product->products_price/100));

                        if(!empty($product->peso)){
                            /*$costo_gramo = $product->peso / 1000 * 5;
                            $costo_gramo2 = round($usd_to_mxn * $costo_gramo,2);*/
                        }

                        if(!empty($product->costo)){

                            $pc_iva = $product->costo * $cny_to_mxn;
                            $costo_mas_iva = round($con_iva_cny = $pc_iva + (16*($pc_iva/100)),2);
                        }

                        if(!empty($product->costo_nacional)){
                            $tr_nacional = 'info';
                        }else{
                            $tr_nacional = '';
                        }
                    
                    ?>

                    <tr class="<?=$tr_nacional?>" id="t_<?=$product->products_id?>">

                        <td class="text-center ">
                            <strong><a href="http://www.massivepc.com/-p-<?=$product->products_id?>.html" target="_blank"><?=$product->products_id?></a></strong>
                            <br>
                            <a href="javascript:void(0);" onclick="window.open('/galeriam.php?products_id=<?=$product->products_id?>', '_blank', 'width=800,height=900,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');">
                                <img style="padding:0px; max-width:none;" class="img-thumbnail" src="https://www.massivepc.com/images/<?=$product->products_image?>" alt="" width="80px" height="80px"/> 
                            </a>
<br><br><a class="btn btn-primary btn-xs" onclick="window.open('<?=base_url()?>ed/producto_2/<?=$product->products_id?>?rnd=<?=md5(time())?>', '_blank', 'width=800,height=680,scrollbars=yes,status=no,resizable=no,screenx=200,screeny=100');" href="javascript:void(0);">Editar</a>

                        </td>

                        <td style="width:6.2%;text-transform:uppercase;" class="text-center">
                            <?
                                echo $product->products_name;
                            ?>
                        </td>

                        <td>
                            <?
                                /*$prv=trim($product->proveedor);
                                echo $prov[$prv]->nombre;*/
                                echo $product->prov_n;
                            ?>
                        </td>

                        <td>
                            <?=$product->categoria?>
                        </td>

                        <td class="text-center">
                            <?
                                if($product->sae_exist <= '0'){
                                    echo 'Agotado';
                                }else{
                                    echo $product->sae_exist;
                                }
                            ?>
                            <a class="btn btn-primary btn-xs" href="javascript:void(0);" onclick="window.open('http://192.168.0.3:666/sae/ext/<?=$product->products_id?>', '_blank', 'width=800,height=900,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');"> Editar</a>
                        </td>
                        <td class="text-center">
                            <?=$product->stock_min?>
                        </td>
                        <td class="text-center">
                           <?=$product->products_quantity_ct."<br>";?>
                           <?php 
                           
                           if(trim($product->products_name_ct)!=""){
$yactual=date("y");
$actual=date("m");//$actual="08";
$menos=5;
if(isset($_REQUEST['ultasv'])){
	if($_REQUEST['ultasv']=='ventas_mes')
		$menos=0;
}
//$ultasv == 'ventas_mes'
$res=$actual-$menos;
if($res<=0){$yactual=$yactual-1;	
	$res=12+$res;}
$zerofill = 2;
$str=$yactual.str_pad($res, $zerofill, '0', STR_PAD_LEFT); 

echo "<!--
filtv ".$_REQUEST['ultasv']."<br>
menos ".$menos."<br>
month ".$actual."<br>";
echo "year ".$yactual."<br>";
echo "Result ".$str."<br>";
echo $str."<br>-->";

						   echo "<table border='1'>
                               <tr><td>Mes</td><td>Año</td><td></td></tr>";
                           $arrVen = explode(",",$product->products_name_ct);
                           rsort($arrVen);
foreach ($arrVen as $clave) {
    $clave2=trim($clave);
if(	$clave2>$str)
    echo "<tr><td>".substr($clave2, 2, 2)."</td><td>".substr($clave2, 0, 2)."</td><td>".substr($clave2, 5)."</td></tr>";
}
echo "</table>";
                               
                           }

                           ?>
                        </td>
                        <td class="text-center">
                           <?php 
                           $arrFech = explode("-",$product->products_id_ct);
                           if(count($arrFech)>1)echo $arrFech[2]."/".$arrFech[1]."/".$arrFech[0];
                           ?>                            
      
                        </td>                        
                        <td class="text-center ">
                            <?=$product->peso?>
                        </td>

                        <td class="text-center ">
                            ¥<?=round($product->costo,2)?>
                        </td>

                        <td class="text-center ">
                            $<?=round($product->costo * $cny_to_usd,2)?>
                        </td>

                        <td class="text-center ">
                            $<?=round($product->costo * $cny_to_mxn,2)?>
                        </td>

                        <td class="text-center ">
                            $<?=round($costo_mas_iva,2)?>
                        </td>

                        <td>
                            <?=$product->costo_usd?>
                        </td>

                        <td class="text-center ">
                            $<?//=$costo_gramo2?>
                        </td>

                        <td class="text-center ">
                            $<?//=round($costo_mas_iva+ $costo_gramo2,2)?>
                        </td>

                        <td class="">
                            <?
                                if(!empty($product->costo_nacional)){
                                    echo '$'.$product->costo_nacional;
                                }
                            ?>
                        </td>

                        <td class="text-center text_rojo ">

                            <?
                            echo '$'.number_format(round($con_iva,2));
                            if(!empty($product->costo_nacional)){

                                    //$pc_iva2 = $product->costo * $cny_to_mxn;
                                    //$con_iva_cny2 = $pc_iva2 + (16*($pc_iva2/100));
                                    $resultado1 = $con_iva - $product->costo_nacional;
                                    $resultado2 = $resultado1 / $product->costo_nacional;
                                    $resultado3 = $resultado2 * 100;
                                    if($resultado3>0) {
                                        $class_td = 'success';
                                        $arrow    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td = 'danger';
                                        $arrow    = 'fa fa-arrow-down';
                                    }
                                    $utilidad = '%'.round($resultado3);

                                    ?>
                                    <label class="btn btn-<?=$class_td?> btn-xs"> U: <span class="badge"><?=$utilidad?></span></label>
                                    <br>
                                    <?
                                

                            }else{

                                
                                if(!empty($product->costo)){
                                    $pc_iva2 = $product->costo * $cny_to_mxn;
                                    $con_iva_cny2 = $pc_iva2 + (16*($pc_iva2/100));
                                    $resultado1 = $con_iva - $con_iva_cny2;
                                    $resultado2 = $resultado1 / $con_iva_cny2;
                                    $resultado3 = $resultado2 * 100;
                                    if($resultado3>0) {
                                        $class_td = 'success';
                                        $arrow    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td = 'danger';
                                        $arrow    = 'fa fa-arrow-down';
                                    }
                                    $utilidad = '%'.round($resultado3);
                                }else{
                                    $utilidad = '';
                                    $class_td = '';
                                }
                            ?>
                            <br>
                            <label class="btn btn-<?=$class_td?> btn-xs"> U: <span class="badge"><?=$utilidad?></span></label>
                            <br>
                            <?
                                if(!empty($product->costo) && !empty($product->peso)){
                                    $costo_gramoz = $product->peso / 1000 * 5;
                                    $costo_gramo3 = round($usd_to_mxn * $costo_gramoz,2);
                                    $pc_iva_z = $product->costo * $cny_to_mxn;
                                    $costo_mas_iva_z = round($con_iva_cny = $pc_iva_z + (16*($pc_iva_z/100)),2);
                                    $costo_iva_envio = $costo_mas_iva_z + $costo_gramo3;
                                    $resultado_env1 = $con_iva - $costo_iva_envio;
                                    $resultado_env2 = $resultado_env1 / $costo_iva_envio;
                                    $resultado_env3 = $resultado_env2 * 100;
                                    if($resultado_env3>=0) {
                                        $class_td2 = 'success';
                                        $arrow2    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td2 = 'danger';
                                        $arrow2    = 'fa fa-arrow-down';
                                    }
                                     $utilidad2 = '%'.round($resultado_env3);
                                }
                                if(!empty($product->costo) and !empty($product->peso) and !empty($utilidad2)){
                                    echo '<label class="btn btn-'.$class_td2.' btn-xs">  UE: <span class="badge">'.$utilidad2.'</span></label>';
                                }

                            }
                                
                            ?>
                            <br><a onclick="window.open('<?=base_url()?>ed/producto/pu/<?=$product->products_id?>?rnd=<?=md5(time())?>', '_blank', 'width=200,height=100,scrollbars=no,status=no,resizable=no,screenx=500,screeny=500');" href="javascript:void(0);">Editar</a>
                        </td>



                        <td class="text-center text_rojo ">

                            <?
                            echo '$'.number_format($product->precio_mayoreo);
                            if(!empty($product->costo_nacional)){

                                    $resultado1 = $product->precio_mayoreo - $product->costo_nacional;
                                    $resultado2 = $resultado1 / $product->costo_nacional;
                                    $resultado3 = $resultado2 * 100;
                                    if($resultado3>0) {
                                        $class_td = 'success';
                                        $arrow    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td = 'danger';
                                        $arrow    = 'fa fa-arrow-down';
                                    }
                                    $utilidad = '%'.round($resultado3);

                                    ?>
                                    <label class="btn btn-<?=$class_td?> btn-xs"> U: <span class="badge"><?=$utilidad?></span></label>
                                    <br>
                                    <?
                                

                            }else{

                                
                                if(!empty($product->costo)){
                                    $pc_iva2 = $product->costo * $cny_to_mxn;
                                    $con_iva_cny2 = $pc_iva2 + (16*($pc_iva2/100));
                                    $resultado1 = $product->precio_mayoreo - $con_iva_cny2;
                                    $resultado2 = $resultado1 / $con_iva_cny2;
                                    $resultado3 = $resultado2 * 100;
                                    if($resultado3>0) {
                                        $class_td = 'success';
                                        $arrow    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td = 'danger';
                                        $arrow    = 'fa fa-arrow-down';
                                    }
                                    $utilidad = '%'.round($resultado3);
                                }else{
                                    $utilidad = '';
                                    $class_td = '';
                                }
                            ?>
                            <br>
                            <label class="btn btn-<?=$class_td?> btn-xs"> U: <span class="badge"><?=$utilidad?></span></label>
                            <br>
                            <?
                                if(!empty($product->costo) && !empty($product->peso)){
                                    $costo_gramoz = $product->peso / 1000 * 5;
                                    $costo_gramo3 = round($usd_to_mxn * $costo_gramoz,2);
                                    $pc_iva_z = $product->costo * $cny_to_mxn;
                                    $costo_mas_iva_z = round($con_iva_cny = $pc_iva_z + (16*($pc_iva_z/100)),2);
                                    $costo_iva_envio = $costo_mas_iva_z + $costo_gramo3;
                                    $resultado_env1 = $product->precio_mayoreo - $costo_iva_envio;
                                    $resultado_env2 = $resultado_env1 / $costo_iva_envio;
                                    $resultado_env3 = $resultado_env2 * 100;
                                    if($resultado_env3>=0) {
                                        $class_td2 = 'success';
                                        $arrow2    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td2 = 'danger';
                                        $arrow2    = 'fa fa-arrow-down';
                                    }
                                     $utilidad2 = '%'.round($resultado_env3);
                                }
                                if(!empty($product->costo) and !empty($product->peso) and !empty($utilidad2)){
                                    echo '<label class="btn btn-'.$class_td2.' btn-xs">  UE: <span class="badge">'.$utilidad2.'</span></label>';
                                }

                            }
                                
                            ?>
                            <br>
                            <a onclick="window.open('<?=base_url()?>ed/producto/ma/<?=$product->products_id?>?rnd=<?=md5(time())?>', '_blank', 'width=200,height=100,scrollbars=no,status=no,resizable=no,screenx=500,screeny=500');" href="javascript:void(0);">Editar</a>
                            
                        </td>

                        <td class="text-center text_rojo ">
                            <?
                            echo '$'.number_format($product->precio_distribuidor);
                            if(!empty($product->costo_nacional)){

                                $resultado1 = $product->precio_distribuidor - $product->costo_nacional;
                                    $resultado2 = $resultado1 / $product->costo_nacional;
                                    $resultado3 = $resultado2 * 100;
                                    if($resultado3>0) {
                                        $class_td = 'success';
                                        $arrow    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td = 'danger';
                                        $arrow    = 'fa fa-arrow-down';
                                    }
                                    $utilidad = '%'.round($resultado3);

                                    ?>
                                    <label class="btn btn-<?=$class_td?> btn-xs"> U: <span class="badge"><?=$utilidad?></span></label>
                                    <br>
                                    <?

                            }else{

                                
                                if(!empty($product->costo)){
                                    $pc_iva2 = $product->costo * $cny_to_mxn;
                                    $con_iva_cny2 = $pc_iva2 + (16*($pc_iva2/100));
                                    $resultado1 = $product->precio_distribuidor - $con_iva_cny2;
                                    $resultado2 = $resultado1 / $con_iva_cny2;
                                    $resultado3 = $resultado2 * 100;
                                    if($resultado3>0) {
                                        $class_td = 'success';
                                        $arrow    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td = 'danger';
                                        $arrow    = 'fa fa-arrow-down';
                                    }
                                    $utilidad = '%'.round($resultado3);
                                }else{
                                    $utilidad = '';
                                    $class_td = '';
                                }
                            ?>
                            <br>
                            <label class="btn btn-<?=$class_td?> btn-xs"> U: <span class="badge"><?=$utilidad?></span></label>
                            <br>
                            <?
                                if(!empty($product->costo) && !empty($product->peso)){
                                    $costo_gramoz = $product->peso / 1000 * 5;
                                    $costo_gramo3 = round($usd_to_mxn * $costo_gramoz,2);
                                    $pc_iva_z = $product->costo * $cny_to_mxn;
                                    $costo_mas_iva_z = round($con_iva_cny = $pc_iva_z + (16*($pc_iva_z/100)),2);
                                    $costo_iva_envio = $costo_mas_iva_z + $costo_gramo3;
                                    $resultado_env1 = $product->precio_distribuidor - $costo_iva_envio;
                                    $resultado_env2 = $resultado_env1 / $costo_iva_envio;
                                    $resultado_env3 = $resultado_env2 * 100;
                                    if($resultado_env3>=0) {
                                        $class_td2 = 'success';
                                        $arrow2    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td2 = 'danger';
                                        $arrow2    = 'fa fa-arrow-down';
                                    }
                                     $utilidad2 = '%'.round($resultado_env3);
                                }
                                if(!empty($product->costo) and !empty($product->peso) and !empty($utilidad2)){
                                    echo '<label class="btn btn-'.$class_td2.' btn-xs">  UE: <span class="badge">'.$utilidad2.'</span></label>';
                                }

                            }
                            
                            ?>
                            <br>
                            <a onclick="window.open('<?=base_url()?>ed/producto/di/<?=$product->products_id?>?rnd=<?=md5(time())?>', '_blank', 'width=200,height=100,scrollbars=no,status=no,resizable=no,screenx=500,screeny=500');" href="javascript:void(0);">Editar</a>
                        </td>



                        <td class="text-center text_rojo ">
                            <?
                            echo '$'.number_format($product->precio_x_producto);
                            if(!empty($product->costo_nacional)){

                                $resultado1 = $product->precio_x_producto - $product->costo_nacional;
                                    $resultado2 = $resultado1 / $product->costo_nacional;
                                    $resultado3 = $resultado2 * 100;
                                    if($resultado3>0) {
                                        $class_td = 'success';
                                        $arrow    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td = 'danger';
                                        $arrow    = 'fa fa-arrow-down';
                                    }
                                    $utilidad = '%'.round($resultado3);

                                    ?>
                                    <label class="btn btn-<?=$class_td?> btn-xs"> U: <span class="badge"><?=$utilidad?></span></label>
                                    <br>
                                    <?

                            }else{

                                
                                if(!empty($product->costo)){
                                    $pc_iva2 = $product->costo * $cny_to_mxn;
                                    $con_iva_cny2 = $pc_iva2 + (16*($pc_iva2/100));
                                    $resultado1 = $product->precio_x_producto - $con_iva_cny2;
                                    $resultado2 = $resultado1 / $con_iva_cny2;
                                    $resultado3 = $resultado2 * 100;
                                    if($resultado3>0) {
                                        $class_td = 'success';
                                        $arrow    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td = 'danger';
                                        $arrow    = 'fa fa-arrow-down';
                                    }
                                    $utilidad = '%'.round($resultado3);
                                }else{
                                    $utilidad = '';
                                    $class_td = '';
                                }
                            ?>
                            <br>
                            <label class="btn btn-<?=$class_td?> btn-xs"> U: <span class="badge"><?=$utilidad?></span></label>
                            <br>
                            <?
                                if(!empty($product->costo) && !empty($product->peso)){
                                    $costo_gramoz = $product->peso / 1000 * 5;
                                    $costo_gramo3 = round($usd_to_mxn * $costo_gramoz,2);
                                    $pc_iva_z = $product->costo * $cny_to_mxn;
                                    $costo_mas_iva_z = round($con_iva_cny = $pc_iva_z + (16*($pc_iva_z/100)),2);
                                    $costo_iva_envio = $costo_mas_iva_z + $costo_gramo3;
                                    $resultado_env1 = $product->precio_distribuidor - $costo_iva_envio;
                                    $resultado_env2 = $resultado_env1 / $costo_iva_envio;
                                    $resultado_env3 = $resultado_env2 * 100;
                                    if($resultado_env3>=0) {
                                        $class_td2 = 'success';
                                        $arrow2    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td2 = 'danger';
                                        $arrow2    = 'fa fa-arrow-down';
                                    }
                                     $utilidad2 = '%'.round($resultado_env3);
                                }
                                if(!empty($product->costo) and !empty($product->peso) and !empty($utilidad2)){
                                    echo '<label class="btn btn-'.$class_td2.' btn-xs">  UE: <span class="badge">'.$utilidad2.'</span></label>';
                                }

                            }
                            
                            ?>
                            <br>
                            <a onclick="window.open('<?=base_url()?>ed/producto/di/<?=$product->products_id?>?rnd=<?=md5(time())?>', '_blank', 'width=200,height=100,scrollbars=no,status=no,resizable=no,screenx=500,screeny=500');" href="javascript:void(0);">Editar</a>
                        </td>

                        <td class="text-center">
                             <input class="descontinuado"  <?//=($product->descontinuado == '1') ? 'checked=""' : ''?> type="checkbox" name="descontinuado" id="<?=$product->products_id?>">
                        </td>
                        <td>
                            <?
                                if($product->products_status == '1'){
                                    echo '<a data-status="Ocultar" data-products_id="'.$product->products_id.'" href="https://www.massivepc.com/mayoreo/home/compras/dc483e80a7a0bd9ef71d8cf973673924?products_status=ocultar&products_id='.$product->products_id.'&palabra='.$palabra.'&marca='.$marca_id.'&categoria='.$categoria_id.'&ordenar='.$ordenar.'&rnd='.md5(time()*4).'" class="btn btn-success products_status">Ocultar Web</a>';
                                }else{
                                    echo '<a data-status="Mostrar" data-products_id="'.$product->products_id.'" href="https://www.massivepc.com/mayoreo/home/compras/dc483e80a7a0bd9ef71d8cf973673924?products_status=mostrar&products_id='.$product->products_id.'&palabra='.$palabra.'&marca='.$marca_id.'&categoria='.$categoria_id.'&ordenar='.$ordenar.'&rnd='.md5(time()*4).'" class="btn btn-danger products_status">Mostrar Web</a>';
                                }
                            ?>
                        </td>

                        <td>
                            <? if($product->nuevo){?>
                                <ul class="product-flags">
                                  <li class="nuevo">Nuevo</li>
                                </ul>
                            <? }?>

                            <? if($product->remate){?>
                                <ul class="product-flags">
                                  <li class="remate">Remate</li>
                                </ul>
                            <? }?>
                        </td>
                       
                    </tr>

                    <?

                    endforeach;

                     }else{?>


                    <? foreach($categories as $categorie):?>
                    
                        <? //if($categorie->id_categoria != 24){?>
                            <tr>
                                <td class="bg-info text-center" colspan="20">
                                    <strong><?=$categorie->categoria?></strong>
                                </td>
                            </tr>
                        <? //}?>

                    <? $this->data['products'] = $this->compras_model->get_products(array('MyBusiness20'=>1, 'fk_categoria'=>$categorie->id_categoria))?>

                    <? foreach($this->data['products'] as $product):?> <!-- Inicia bucle de productos -->

                    <?

                    $con_iva = $product->products_price + (16*($product->products_price/100));

                    if(!empty($product->peso)){
                        /*$costo_gramo = $product->peso / 1000 * 5;
                        $costo_gramo2 = round($usd_to_mxn * $costo_gramo,2);*/
                    }

                    if(!empty($product->costo)){

                        $pc_iva = $product->costo * $cny_to_mxn;
                        $costo_mas_iva = round($con_iva_cny = $pc_iva + (16*($pc_iva/100)),2);
                    }

                    if(!empty($product->costo_nacional)){
                        $tr_nacional = 'info';
                    }else{
                        $tr_nacional = '';
                    }

                    ?>
                    
                    <tr class="<?=$tr_nacional?>" id="t_<?=$product->products_id?>">

                        <td class="text-center ">
                            <strong><a href="http://www.massivepc.com/-p-<?=$product->products_id?>.html" target="_blank"><?=$product->products_id?></a></strong>
                            <br>
                            <a href="javascript:void(0);" onclick="window.open('/galeriam.php?products_id=<?=$product->products_id?>', '_blank', 'width=800,height=900,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');">
                                <img style="padding:0px; max-width:none;" class="img-thumbnail" src="https://www.massivepc.com/images/<?=$product->products_image?>" alt="" width="80px" height="80px"/> 
                            </a>
<br><br><a class="btn btn-primary btn-xs" onclick="window.open('<?=base_url()?>ed/producto_2/<?=$product->products_id?>?rnd=<?=md5(time())?>', '_blank', 'width=800,height=680,scrollbars=yes,status=no,resizable=no,screenx=200,screeny=100');" href="javascript:void(0);">Editar</a>

                        </td>

                        <td style="width:6.2%;text-transform:uppercase;" class="text-center">
                            <?
                                echo $product->products_name;
                            ?>
                        </td>

                        <td>
                            <?
                                /*$prv=trim($product->proveedor);
                                echo $prov[$prv];*/
                                echo $product->prov_n;
                            ?>
                        </td>

                        <td>
                            <?=$product->categoria?>
                        </td>

                        <td class="text-center ">
                            <?
                                if($product->sae_exist <= '0'){
                                    echo 'Agotado';
                                }else{
                                    echo $product->sae_exist;
                                }
                            ?>
                            <a class="btn btn-primary btn-xs" href="javascript:void(0);" onclick="window.open('http://192.168.0.3:666/sae/ext/<?=$product->products_id?>', '_blank', 'width=800,height=900,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');"> Editar</a>
                        </td>
                        <td class="text-center">
                            <?=$product->stock_min?>
                        </td>
                        <td class="text-center">
                           <?=$product->products_quantity_ct."<br>";?>
                           <?php 
                           if(trim($product->products_name_ct)!=""){
$yactual=date("y");
$actual=date("m");//$actual="08";
$menos=5;
if(isset($_REQUEST['ultasv'])){
	if($_REQUEST['ultasv']=='ventas_mes')
		$menos=0;
}
$res=$actual-$menos;
if($res<=0){$yactual=$yactual-1;	
	$res=12+$res;}
$zerofill = 2;
$str=$yactual.str_pad($res, $zerofill, '0', STR_PAD_LEFT); 

echo "<!--
filtv ".$_REQUEST['ultasv']."<br>
menos ".$menos."<br>
month ".$actual."<br>";
echo "year ".$yactual."<br>";
echo "Result ".$str."<br>";
echo $str."<br>-->";							   
                               echo "<table border='1'>
                               <tr><td>Mes</td><td>Año</td><td></td></tr>";							   
                           $arrVen = explode(",",$product->products_name_ct);
                           rsort($arrVen);
foreach ($arrVen as $clave) {
    $clave2=trim($clave);
if($clave2>$str)	
    echo "<tr><td>".substr($clave2, 2, 2)."</td><td>".substr($clave2, 0, 2)."</td><td>".substr($clave2, 5)."</td></tr>";
}
echo "</table>";
    
}
                           ?>
                        </td>
                        <td class="text-center">
                           <?php 
                           $arrFech = explode("-",$product->products_id_ct);
                           if(count($arrFech)>1)echo $arrFech[2]."/".$arrFech[1]."/".$arrFech[0];
                           ?>   
                        </td>                         
                        <td class="text-center">
                            <?=$product->peso?>
                        </td>

                        <td class="text-center">
                            ¥<?=round($product->costo,2)?>
                        </td>

                        <td class="text-center">
                            $<?=round($product->costo * $cny_to_usd,2)?>
                        </td>

                        <td class="text-center">
                            $<?=round($product->costo * $cny_to_mxn,2)?>
                        </td>

                        <td class="text-center">
                            $<?//=round($costo_mas_iva,2)?>
                        </td>

                        <td>
                            <?=$product->costo_usd?>
                        </td>

                        <td class="text-center">
                            $<?//=$costo_gramo2?>
                        </td>

                        <td class="text-center">
                            $<?//=round($costo_mas_iva+ $costo_gramo2,2)?>
                        </td>

                        <td class="">
                            <?
                                if(!empty($product->costo_nacional)){
                                    echo '$'.$product->costo_nacional;
                                }
                            ?>
                        </td>

                        <td class="text-center text_rojo">

                            <?
                            echo '$'.number_format(round($con_iva,2));
                            if(!empty($product->costo_nacional)){

                                    //$pc_iva2 = $product->costo * $cny_to_mxn;
                                    //$con_iva_cny2 = $pc_iva2 + (16*($pc_iva2/100));
                                    $resultado1 = $con_iva - $product->costo_nacional;
                                    $resultado2 = $resultado1 / $product->costo_nacional;
                                    $resultado3 = $resultado2 * 100;
                                    if($resultado3>0) {
                                        $class_td = 'success';
                                        $arrow    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td = 'danger';
                                        $arrow    = 'fa fa-arrow-down';
                                    }
                                    $utilidad = '%'.round($resultado3);

                                    ?>
                                    <label class="btn btn-<?=$class_td?> btn-xs"> U: <span class="badge"><?=$utilidad?></span></label>
                                    <br>
                                    <?
                                

                            }else{

                                
                                if(!empty($product->costo)){
                                    $pc_iva2 = $product->costo * $cny_to_mxn;
                                    $con_iva_cny2 = $pc_iva2 + (16*($pc_iva2/100));
                                    $resultado1 = $con_iva - $con_iva_cny2;
                                    $resultado2 = $resultado1 / $con_iva_cny2;
                                    $resultado3 = $resultado2 * 100;
                                    if($resultado3>0) {
                                        $class_td = 'success';
                                        $arrow    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td = 'danger';
                                        $arrow    = 'fa fa-arrow-down';
                                    }
                                    $utilidad = '%'.round($resultado3);
                                }else{
                                    $utilidad = '';
                                    $class_td = '';
                                }
                            ?>
                            <br>
                            <label class="btn btn-<?=$class_td?> btn-xs"> U: <span class="badge"><?=$utilidad?></span></label>
                            <br>
                            <?
                                if(!empty($product->costo) && !empty($product->peso)){
                                    $costo_gramoz    = $product->peso / 1000 * 5;
                                    $costo_gramo3    = round($usd_to_mxn * $costo_gramoz,2);
                                    $pc_iva_z        = $product->costo * $cny_to_mxn;
                                    $costo_mas_iva_z = round($con_iva_cny = $pc_iva_z + (16*($pc_iva_z/100)),2);
                                    $costo_iva_envio = $costo_mas_iva_z + $costo_gramo3;
                                    $resultado_env1  = $con_iva - $costo_iva_envio;
                                    $resultado_env2  = $resultado_env1 / $costo_iva_envio;
                                    $resultado_env3  = $resultado_env2 * 100;
                                    if($resultado_env3>=0) {
                                        $class_td2 = 'success';
                                        $arrow2    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td2 = 'danger';
                                        $arrow2    = 'fa fa-arrow-down';
                                    }
                                     $utilidad2 = '%'.round($resultado_env3);
                                }
                                if(!empty($product->costo) and !empty($product->peso) and !empty($utilidad2)){
                                    echo '<label class="btn btn-'.$class_td2.' btn-xs">  UE: <span class="badge">'.$utilidad2.'</span></label>';
                                }

                            }
                                
                            ?>
                            <br><a onclick="window.open('<?=base_url()?>ed/producto/pu/<?=$product->products_id?>?rnd=<?=md5(time())?>', '_blank', 'width=200,height=100,scrollbars=no,status=no,resizable=no,screenx=500,screeny=500');" href="javascript:void(0);">Editar</a>
                        </td>



                        <td class="text-center text_rojo ">

                            <?
                            echo '$'.number_format($product->precio_mayoreo);
                            if(!empty($product->costo_nacional)){

                                    $resultado1 = $product->precio_mayoreo - $product->costo_nacional;
                                    $resultado2 = $resultado1 / $product->costo_nacional;
                                    $resultado3 = $resultado2 * 100;
                                    if($resultado3>0) {
                                        $class_td = 'success';
                                        $arrow    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td = 'danger';
                                        $arrow    = 'fa fa-arrow-down';
                                    }
                                    $utilidad = '%'.round($resultado3);

                                    ?>
                                    <label class="btn btn-<?=$class_td?> btn-xs"> U: <span class="badge"><?=$utilidad?></span></label>
                                    <br>
                                    <?
                                

                            }else{

                                
                                if(!empty($product->costo)){
                                    $pc_iva2 = $product->costo * $cny_to_mxn;
                                    $con_iva_cny2 = $pc_iva2 + (16*($pc_iva2/100));
                                    $resultado1 = $product->precio_mayoreo - $con_iva_cny2;
                                    $resultado2 = $resultado1 / $con_iva_cny2;
                                    $resultado3 = $resultado2 * 100;
                                    if($resultado3>0) {
                                        $class_td = 'success';
                                        $arrow    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td = 'danger';
                                        $arrow    = 'fa fa-arrow-down';
                                    }
                                    $utilidad = '%'.round($resultado3);
                                }else{
                                    $utilidad = '';
                                    $class_td = '';
                                }
                            ?>
                            <br>
                            <label class="btn btn-<?=$class_td?> btn-xs"> U: <span class="badge"><?=$utilidad?></span></label>
                            <br>
                            <?
                                if(!empty($product->costo) && !empty($product->peso)){
                                    $costo_gramoz = $product->peso / 1000 * 5;
                                    $costo_gramo3 = round($usd_to_mxn * $costo_gramoz,2);
                                    $pc_iva_z = $product->costo * $cny_to_mxn;
                                    $costo_mas_iva_z = round($con_iva_cny = $pc_iva_z + (16*($pc_iva_z/100)),2);
                                    $costo_iva_envio = $costo_mas_iva_z + $costo_gramo3;
                                    $resultado_env1 = $product->precio_mayoreo - $costo_iva_envio;
                                    $resultado_env2 = $resultado_env1 / $costo_iva_envio;
                                    $resultado_env3 = $resultado_env2 * 100;
                                    if($resultado_env3>=0) {
                                        $class_td2 = 'success';
                                        $arrow2    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td2 = 'danger';
                                        $arrow2    = 'fa fa-arrow-down';
                                    }
                                     $utilidad2 = '%'.round($resultado_env3);
                                }
                                if(!empty($product->costo) and !empty($product->peso) and !empty($utilidad2)){
                                    echo '<label class="btn btn-'.$class_td2.' btn-xs">  UE: <span class="badge">'.$utilidad2.'</span></label>';
                                }

                            }
                                
                            ?>
                            <br>
                            <a onclick="window.open('<?=base_url()?>ed/producto/ma/<?=$product->products_id?>?rnd=<?=md5(time())?>', '_blank', 'width=200,height=100,scrollbars=no,status=no,resizable=no,screenx=500,screeny=500');" href="javascript:void(0);">Editar</a>
                            
                        </td>

                        <td class="text-center text_rojo ">


                            <?
                            echo '$'.number_format($product->precio_distribuidor);
                            if(!empty($product->costo_nacional)){

                                $resultado1 = $product->precio_distribuidor - $product->costo_nacional;
                                    $resultado2 = $resultado1 / $product->costo_nacional;
                                    $resultado3 = $resultado2 * 100;
                                    if($resultado3>0) {
                                        $class_td = 'success';
                                        $arrow    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td = 'danger';
                                        $arrow    = 'fa fa-arrow-down';
                                    }
                                    $utilidad = '%'.round($resultado3);

                                    ?>
                                    <label class="btn btn-<?=$class_td?> btn-xs"> U: <span class="badge"><?=$utilidad?></span></label>
                                    <br>
                                    <?

                            }else{

                                
                                if(!empty($product->costo)){
                                    $pc_iva2 = $product->costo * $cny_to_mxn;
                                    $con_iva_cny2 = $pc_iva2 + (16*($pc_iva2/100));
                                    $resultado1 = $product->precio_distribuidor - $con_iva_cny2;
                                    $resultado2 = $resultado1 / $con_iva_cny2;
                                    $resultado3 = $resultado2 * 100;
                                    if($resultado3>0) {
                                        $class_td = 'success';
                                        $arrow    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td = 'danger';
                                        $arrow    = 'fa fa-arrow-down';
                                    }
                                    $utilidad = '%'.round($resultado3);
                                }else{
                                    $utilidad = '';
                                    $class_td = '';
                                }
                            ?>
                            <br>
                            <label class="btn btn-<?=$class_td?> btn-xs"> U: <span class="badge"><?=$utilidad?></span></label>
                            <br>
                            <?
                                if(!empty($product->costo) && !empty($product->peso)){
                                    $costo_gramoz = $product->peso / 1000 * 5;
                                    $costo_gramo3 = round($usd_to_mxn * $costo_gramoz,2);
                                    $pc_iva_z = $product->costo * $cny_to_mxn;
                                    $costo_mas_iva_z = round($con_iva_cny = $pc_iva_z + (16*($pc_iva_z/100)),2);
                                    $costo_iva_envio = $costo_mas_iva_z + $costo_gramo3;
                                    $resultado_env1 = $product->precio_distribuidor - $costo_iva_envio;
                                    $resultado_env2 = $resultado_env1 / $costo_iva_envio;
                                    $resultado_env3 = $resultado_env2 * 100;
                                    if($resultado_env3>=0) {
                                        $class_td2 = 'success';
                                        $arrow2    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td2 = 'danger';
                                        $arrow2    = 'fa fa-arrow-down';
                                    }
                                     $utilidad2 = '%'.round($resultado_env3);
                                }
                                if(!empty($product->costo) and !empty($product->peso) and !empty($utilidad2)){
                                    echo '<label class="btn btn-'.$class_td2.' btn-xs">  UE: <span class="badge">'.$utilidad2.'</span></label>';
                                }

                            }
                            
                            ?>
                            <br>
                            <a onclick="window.open('<?=base_url()?>ed/producto/di/<?=$product->products_id?>?rnd=<?=md5(time())?>', '_blank', 'width=200,height=100,scrollbars=no,status=no,resizable=no,screenx=500,screeny=500');" href="javascript:void(0);">Editar</a>
                        </td>

                        <td class="text-center text_rojo ">


                            <?
                            echo '$'.number_format($product->precio_x_producto);
                            if(!empty($product->costo_nacional)){

                                $resultado1 = $product->precio_x_producto - $product->costo_nacional;
                                    $resultado2 = $resultado1 / $product->costo_nacional;
                                    $resultado3 = $resultado2 * 100;
                                    if($resultado3>0) {
                                        $class_td = 'success';
                                        $arrow    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td = 'danger';
                                        $arrow    = 'fa fa-arrow-down';
                                    }
                                    $utilidad = '%'.round($resultado3);

                                    ?>
                                    <label class="btn btn-<?=$class_td?> btn-xs"> U: <span class="badge"><?=$utilidad?></span></label>
                                    <br>
                                    <?

                            }else{

                                
                                if(!empty($product->costo)){
                                    $pc_iva2 = $product->costo * $cny_to_mxn;
                                    $con_iva_cny2 = $pc_iva2 + (16*($pc_iva2/100));
                                    $resultado1 = $product->precio_x_producto - $con_iva_cny2;
                                    $resultado2 = $resultado1 / $con_iva_cny2;
                                    $resultado3 = $resultado2 * 100;
                                    if($resultado3>0) {
                                        $class_td = 'success';
                                        $arrow    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td = 'danger';
                                        $arrow    = 'fa fa-arrow-down';
                                    }
                                    $utilidad = '%'.round($resultado3);
                                }else{
                                    $utilidad = '';
                                    $class_td = '';
                                }
                            ?>
                            <br>
                            <label class="btn btn-<?=$class_td?> btn-xs"> U: <span class="badge"><?=$utilidad?></span></label>
                            <br>
                            <?
                                if(!empty($product->costo) && !empty($product->peso)){
                                    $costo_gramoz = $product->peso / 1000 * 5;
                                    $costo_gramo3 = round($usd_to_mxn * $costo_gramoz,2);
                                    $pc_iva_z = $product->costo * $cny_to_mxn;
                                    $costo_mas_iva_z = round($con_iva_cny = $pc_iva_z + (16*($pc_iva_z/100)),2);
                                    $costo_iva_envio = $costo_mas_iva_z + $costo_gramo3;
                                    $resultado_env1 = $product->precio_x_producto - $costo_iva_envio;
                                    $resultado_env2 = $resultado_env1 / $costo_iva_envio;
                                    $resultado_env3 = $resultado_env2 * 100;
                                    if($resultado_env3>=0) {
                                        $class_td2 = 'success';
                                        $arrow2    = 'fa fa-arrow-up';
                                    }else{
                                        $class_td2 = 'danger';
                                        $arrow2    = 'fa fa-arrow-down';
                                    }
                                     $utilidad2 = '%'.round($resultado_env3);
                                }
                                if(!empty($product->costo) and !empty($product->peso) and !empty($utilidad2)){
                                    echo '<label class="btn btn-'.$class_td2.' btn-xs">  UE: <span class="badge">'.$utilidad2.'</span></label>';
                                }

                            }
                            
                            ?>
                            <br>
                            <a onclick="window.open('<?=base_url()?>ed/producto/di/<?=$product->products_id?>?rnd=<?=md5(time())?>', '_blank', 'width=200,height=100,scrollbars=no,status=no,resizable=no,screenx=500,screeny=500');" href="javascript:void(0);">Editar</a>
                        </td>

                        <td class="text-center">
                             <input class="descontinuado"  <?//=($product->descontinuado == '1') ? 'checked=""' : ''?> type="checkbox" name="descontinuado" id="<?=$product->products_id?>">
                        </td>
                        <td>
                            <?
                                if($product->products_status == '1'){
                                    echo '<a data-status="Ocultar" data-products_id="'.$product->products_id.'" href="https://www.massivepc.com/mayoreo/home/compras/dc483e80a7a0bd9ef71d8cf973673924?products_status=ocultar&products_id='.$product->products_id.'&palabra='.$palabra.'&marca='.$marca_id.'&categoria='.$categoria_id.'&ordenar='.$ordenar.'&rnd='.md5(time()*4).'" class="btn btn-success products_status">Ocultar Web</a>';
                                }else{
                                    echo '<a data-status="Mostrar" data-products_id="'.$product->products_id.'" href="https://www.massivepc.com/mayoreo/home/compras/dc483e80a7a0bd9ef71d8cf973673924?products_status=mostrar&products_id='.$product->products_id.'&palabra='.$palabra.'&marca='.$marca_id.'&categoria='.$categoria_id.'&ordenar='.$ordenar.'&rnd='.md5(time()*4).'" class="btn btn-danger products_status">Mostrar Web</a>';
                                }
                            ?>
                        </td>

                        <td>
                            <? if($product->nuevo){?>
                                <ul class="product-flags">
                                  <li class="nuevo">Nuevo</li>
                                </ul>
                            <? }?>

                            <? if($product->remate){?>
                                <ul class="product-flags">
                                  <li class="remate">Remate</li>
                                </ul>
                            <? }?>
                            
                        </td>
                       
                    </tr>


                    <? endforeach?>

                    <? endforeach?>

                    <? }?>

                    </tbody>


                </table>
        </div>
        

     

          
    </table>


            
            
            
            
            
            
            
     
            
            
            
            
            
            
            
            
            
        </div>



        
        
        
        
  

        












</div>

    
    
    <div style="display:none;">
        <a id="ver_pago" class="fancybox" data-fancybox-type="iframe" href="<?=base_url()?>pago"></a>
    </div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display:none;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">...</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      
    </div>
  </div>
</div>

<div class="modal fade" id="boletinModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display:none;">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Suscríbete a nuestro boletín</h4>
      </div>
      <div class="modal-body">
        
            <div class="input-group">
              <input id="correo_boletin2" type="text" class="form-control" placeholder="Email" >
              <span class="input-group-btn">
                <button id="validar_mail2" class="btn btn-default" type="button">Suscribirse</button>
              </span>
            </div>

        <div id="boletin_status" role="alert" class="alert fade in" style="display:none;margin-top:10px;">
          <span id="boletin_msg"></span>
        </div>

      </div>
      
    </div>
  </div>
</div>




    
    <script src="/mayoreo/assets/js/jquery-1.11.3.min.js"></script>
    <script src="/mayoreo/assets/js/jquery-ui.min.js"></script>
    <script src="/mayoreo/assets/js/jquery.print.js"></script>
    <script src="/mayoreo/assets/js/jquery.fancybox.js"></script>
    <script src="/mayoreo/assets/js/jquery.currency.js"></script>
    <script src="/mayoreo/assets/bootstrap3/js/bootstrap.js"></script>
    <script src="/mayoreo/assets/js/jquery.sticky.js"></script>
    <script src="/mayoreo/assets/js/chosen.jquery.js"></script>
    <script src="/mayoreo/assets/js/mayoreov8.js"></script>
    <script type="text/javascript">

    $(function(){

        $('#existencias').change(function() {
            $('.btn-search')[0].click();
        });

        $('.descontinuado').on('click', function()
        {
            var products_id = $(this).attr('id');

            if ($(this).is(':checked'))
            {
                var descontinuado = '1';

            }else{
                var descontinuado = '0';
            }

            $.ajax({
                cache   : false,
                method  : 'POST',
                dataType: 'json',
                data    : {'descontinuado':descontinuado, 'products_id':products_id},
                url     : '/mayoreo/home/p_descontinuado?cb=' + cacheBusterGeneral,
            }).done(function(ret) {

            });
        });

        $('.products_status').on('click', function (e){
            e.preventDefault();
            //var estatus = $(this).data('status');
            var estatus     = $(this).attr('data-status');
            var products_id = $(this).attr('data-products_id');
            var el          = $(this);
            console.log(estatus);

            if(estatus == 'Ocultar')
            {
                $(this).removeClass('btn-success');
                $(this).addClass('btn-danger');
                $(this).text('Mostrar Web');
                $(this).attr('data-status','Mostrar');
                $(this).addClass('disabled');

                $.ajax({
                    cache   : false,
                    method  : 'POST',
                    dataType: 'json',
                    data    : {'estatus':0, 'products_id':products_id},
                    url     : '/mayoreo/home/p_estatus?cb=' + cacheBusterGeneral,
                }).done(function(ret) {
                    el.removeClass('disabled');
                });

            }else{

                $(this).removeClass('btn-danger');
                $(this).addClass('btn-success');
                $(this).text('Ocultar Web');
                $(this).attr('data-status','Ocultar');
                $(this).addClass('disabled');

                $.ajax({
                    cache   : false,
                    method  : 'POST',
                    dataType: 'json',
                    data    : {'estatus':1, 'products_id':products_id},
                    url     : '/mayoreo/home/p_estatus?cb=' + cacheBusterGeneral,
                }).done(function(ret) {
                    el.removeClass('disabled');
                });
            }
    });

    $('#marca').change(function() {
        $('#palabra').val('');
        $('#categoria').val('');
        $('#proveedor_id').val();
        $('.btn-search')[0].click();
    });

    $('#categoria').change(function() {
        $('#palabra').val('');
        $('#marca').val('');
        $('#proveedor_id').val();
        $('.btn-search')[0].click();
    });

    $('#proveedor_id').change(function() {
        $('#palabra').val('');
        $('#marca').val('');
        $('.btn-search')[0].click();
    });

    $('#ultasv').change(function() {
        $('#palabra').val('');
        $('.btn-search')[0].click();
    });
    $('#ordenar').change(function() {
        $('#palabra').val('');
        $('.btn-search')[0].click();
    });
    $('.btn-search').on('click', function(){
        var palabra = $('#palabra').val();

        console.log(palabra);

        if(palabra == '')
        {
            $('#filtro').submit();
        }else{

            $('#categoria').val('');
            $('#marca').val('');
            $('#filtro').submit();
        }
    });

    $('#palabra').keypress(function(e) {

            if(e.which == 13){

                var palabra = $('#palabra').val();

                console.log(palabra);

                if(palabra == '')
                {
                    $('#filtro').submit();
                }else{

                    $('#categoria').val('');
                    $('#marca').val('');
                    $('#filtro').submit();
                }

            }

    });

        $('.chosen-select').chosen();

        $('#header').sticky({ topSpacing: 0 });

        $('[data-toggle="tooltip"]').tooltip();

        var hash = window.location.hash.substr(1);
        //console.log(type);
        if(hash == 'boletin'){
            $('#boletinModal').modal({
                backdrop: 'static',
                keyboard: false
            });
            $('#boletinModal').modal('show');
            $('#validar_mail2').click(function() {
                var correo_boletin = $('#correo_boletin2').val();
                var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;

                if (regex.test(correo_boletin.trim())) {
                    $.ajax({

                        cache: false,
                        method: 'POST',
                        dataType: 'json',
                        data: 'email=' + correo_boletin,
                        url: '/mayoreo/boletin/validar/?cb=' + cacheBusterGeneral,

                    }).done(function(email_response) {
                        
                        if(email_response.code=='1'){
                            $('#boletin_status').removeClass('alert-danger');
                            $('#boletin_status').addClass('alert-success');
                        }else{
                            $('#boletin_status').removeClass('alert-success');
                            $('#boletin_status').addClass('alert-danger');
                        }

                        $('#boletin_msg').html(email_response.msg);
                        $('#boletin_status').show();

                    });
                } else {
                    $('#boletin_status').removeClass('alert-success');
                    $('#boletin_status').addClass('alert-danger');
                    $('#boletin_msg').html('<i class="glyphicon glyphicon-warning-sign"></i> Formato de correo invalido.');
                    $('#boletin_status').show();
                }

            });
        }

    });

    </script>

</body>
    

</html>