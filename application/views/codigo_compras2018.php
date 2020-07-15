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

<?
$prov = array(107=>'8341 (Dany) df',122=>'A AND M',126=>'ACCESORIOS GENESIS PANDA',51=>'ACCESORIOS Y CONTROLES',159=>'ACCIS TECHNOLOGY',93=>'ADG TECHNOLOGIES',103=>'AION',154=>'AL GAMES',180=>'ALCANCIAS CASINO',112=>'AMAZING VISION',59=>'AMERIK',102=>'ANDAFA INNOVATORS S.A DE C.V',166=>'ANDY',77=>'ANTENAS JONATHAN BARRON',11=>'ARANAM SA DE CV',175=>'ARUMI',84=>'ATELEFONITOS',94=>'AXVan',16=>'Actualizaciones para computadoras SA de CV',14=>'Alberto de Jesus Virgen Magaña',28=>'Amigo Eduardo Chips Telcel',173=>'Amor',54=>'Arturo Eloir Olivera Barrera',141=>'BIG BANG TECHNOLOGY',41=>'BRENDA BORES',30=>'Barware S.A. De C.V.',117=>'CAGI',67=>'CANSA',101=>'CARGADORES MAPE',164=>'CARLOS CUELLAR',75=>'CARLOS ERNESTO ARELLANO JIMENEZ',132=>'CELMEX',66=>'CELULAR GOLDEN',125=>'CELULAR PLANET',139=>'CENTRAL 87',123=>'CENTROCEL TERESA',158=>'CHENS DIGITAL',8=>'CHEPE',183=>'CHINLUE LAMPARAS DE LAVA',108=>'CHIPS MOVISTAR',144=>'CHIPS TELCEL (Paul)',128=>'CINTURON CITY',85=>'COBY',50=>'COMECO TECNOLOGIAS MEXICO S.A. DE C.V',168=>'CONCEPTO E IMAGEN DIGITAL S.A. DE C.V.',17=>'CORPORATIVO MONZALBO SA DE CV',9=>'CVA',25=>'Cable Men ( Oscar Alejandro Guerrero Carranza )',97=>'Carlos Gomez Chips',4=>'Conexión y Energia en computación sa de cv',43=>'Corporativo Ebb',86=>'DANIEL MEMORIAS',167=>'DISTRIBUIDORA LASSER',31=>'DISTRIBUIDORA TECTRON ( IVAN ISRAEL GARCIA GARCIA )',57=>'DIVERSION Y TRABAJO S.A DE C.V',127=>'DNS',80=>'DON BETO',138=>'DON DANY',184=>'DOSYU',68=>'EBENEZER IMPORTADORA S DE RL DE CV',104=>'ELE-GATE',147=>'ELECTRICA EL 45',160=>'ELECTRONICA JAIRO',163=>'EMPLEADO HARUMI',22=>'ESTAFETA MEXICANA S.A. DE C.V.',13=>'ESTAFETA MEXICANA SA DE CV',49=>'ESTAFETA SF (BENJAMIN LEDEZMA)',52=>'Eduardo Chips',26=>'El Mundo De La Tablet',36=>'Elux',46=>'Estafeta vip',48=>'FEDEX SF',105=>'FIMEX',152=>'FON CEL',119=>'FULAME IMPORTACION',56=>'FUSSION ACUSTIC',90=>'FUSSION DF',37=>'Fernando Grin',136=>'G MOVILE',153=>'G&N CELULARES',157=>'GENESIS PANDA',142=>'GOUMIN ZHEN',63=>'GROUPE ADAKTY S.A DE C.V',12=>'GRUPO CARABENCH SA DE CV',92=>'GRUPO YUDHA',38=>'Gabriel Laera',35=>'Grupo Moviles',110=>'HENG LIAN',106=>'HIP HOP',100=>'HUB CITY',5=>'I LIKE',87=>'IMPORTACIONES GONZALEZ',71=>'IMPORTACIONES MIMI',73=>'ISAC TEC,LADOS',165=>'IZI PAN',39=>'Importadora Az-tek SA de CV',47=>'J GUADALUPE ROSALES RIOS',61=>'JC CELULARES Y ACCESORIOS',133=>'JIAN HENG',161=>'JIANG FANGZHEN',19=>'JIYU ELECTRONIC CO,. LIMITED',171=>'JONATHAN AUDIFONOS',177=>'JOSE ANTONIO',18=>'Jose Trinidad MT Lider',29=>'Juan Carlos Honojosa Garcia',120=>'KAI PING',135=>'KAILI',176=>'KARINA TERESA AUDIFONOS',79=>'KINGMEX',170=>'LEONARDO ZAMORANO',58=>'LIFE',162=>'LJK',111=>'LOS CHITOS',64=>'LYX LUXURY FUNDAS',145=>'MAIZ',72=>'MARTIN GUSTAVO GRIJALVA MARTINEZ',155=>'MARVO',178=>'MEGAFIRE',149=>'MEMORY ONE',140=>'MEY',83=>'MG MOBILE',156=>'MIND CONTROL',27=>'MT Lider',88=>'MUNDO DE LA TABLET',69=>'Marisol Chips',95=>'Micas Pedro Bravo',44=>'Moove tech',40=>'Mundo de la Tablet',182=>'NEF REJAS',129=>'OSOCEL',116=>'OTROS D,F',143=>'OTROS GDL',114=>'OTTO DIGITAL',10=>'PC HARDWARE',60=>'PCH MAYOREO SA. DE CV.',134=>'PLAZA TEREZA (maiz)',150=>'POPULAR TECNOLOGIA',96=>'PROLICOM',7=>'PROVEEDOR DE ANTENAS WIFI SKY Y DIAMOND',42=>'PTT SOLUCIONES SA DE CV',23=>'Pacific. Com S.A. De C.V.',55=>'Proveedor Df',70=>'QRUZH',137=>'RAZZY',74=>'REDPACK',99=>'RIDER',91=>'SESUCONSA',1=>'SHENZU GROUP COL., LTD',113=>'SHINE COMPUTER',45=>'SHOPONLINE',2=>'SIMERST TRADING LIMITED',65=>'SINGUA TECNOLOGIA S.A. DE C.V.',6=>'SINOSTAR INTERNATIONAL (HK) CO.,LTD',172=>'SPACE MB',118=>'SRA. ROCIO D,F',32=>'STOCK CELULAR (VICTOR HUGO)',130=>'SU-LY',15=>'TC MEMORY SA DE CV',20=>'TC MEMORY, S.A. DE C.V. (FAVOR DE NO USAR, CAPTURAR CON EL No. 15)',53=>'TECNOLOGIA & MAS',146=>'TECNOLOGIA Y NOVEDADES SOLAR',89=>'TMOVI',3=>'TVCENLINEA.COM S.A DE C.V',76=>'VELIKKA',121=>'VMEX',124=>'WEI HANG',148=>'WEICSOM',98=>'WHITESTONE',62=>'YIFA',21=>'Z.H.U. ELECTRONICA',169=>'ZANJONG',81=>'ZENEK',115=>'ZHENG JIARONG',131=>'ZHONG GUANG',109=>'ZOGIS',24=>'Zona Azul Celulares SA De CV',33=>'alta tecnologia y vanguardia en accesorios',82=>'chips telcel y unefon',34=>'eb',151=>'harumi cell',78=>'sumex',186=>'ACCIS DIADEMA KITTY',185=>'ROCIO CARGADORES DF') ;
?>


<div class="container-fluid">
<br>
<h5 class="text-center" style="text-decoration: underline;"><a href="<?=$_SERVER["REQUEST_URI"]?>">Para actualizar la página presione <b>Ctrl + F5</b></a></h5> 
<br>              
        <div style="clear:both;"></div>
        
        <div id="seleccion">
        
            <!--<tr>-->
                <table class="table table-bordered" >
                    <thead>
                        <tr>
                            <th class="text-center">CLAVE</th>
                            <th class="text-center">PRODUCTO</th>
                            <th class="text-center">NOMBRE</th>

                            <th class="text-center">MARCA</th>
                            
                            <th class="text-center">EXIS</th>

                            <th class="text-center">STOCK MIN</th>
                            <th class="text-center">STOCK MAX</th>
                            
                            <th class="text-center">PRECIO MENUDEO</th>
                            <th class="text-center">PRECIO MAYOREO</th>
                            <th class="text-center">PRECIO DISTRIBUIDOR</th>
                            <th class="text-center">PRECIO X CAJA</th>
                            <th class="text-center">COSTO NAC</th> 
                            <th class="text-center">PRODUCTOS POR CAJA</th>
                        </tr>
                    </thead>
                    <tbody>

                    <? if($products != ''){

                        foreach ($products as $product):

                        $con_iva = $product->products_price + (16*($product->products_price/100));

                        if(!empty($product->peso)){
                            $costo_gramo = $product->peso / 1000 * 5;
                            $costo_gramo2 = round($usd_to_mxn * $costo_gramo,2);
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
                        </td>

                        <td class="text-center ">
                            
                            <a href="javascript:void(0);" onclick="window.open('/galeriam.php?products_id=<?=$product->products_id?>', '_blank', 'width=800,height=900,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');">
                                <img style="padding:0px; max-width:none;" class="img-thumbnail" src="https://www.massivepc.com/images/<?=$product->products_image?>" alt="" width="80px" height="80px"/> 
                            </a>

                        </td>

                        <td style="text-transform:uppercase;" class="text-left">
                            <?
                                echo $product->products_name;

                                if($product->descontinuado == '1'){
                                    echo '<h4 style="color:red;">Descontinuado, no resurtir</h4>';
                                }
                            ?>
                        </td>

                        

                        <td>
                            <img alt="Fabricante" src="https://www.massivepc.com/images/<?=$product->manufacturers_image?>" style="display:block; margin:auto;">
                        </td>

                        

                        <td class="text-center">
                            <?
                                if($product->sae_exist <= '0'){
                                    echo 'Agotado';
                                }else{
                                    echo $product->sae_exist;
                                }
                            ?>
                        </td>

                        <td class="text-center">
                            <?
                                echo $product->stock_min;
                            ?>
                        </td>

                        <td class="text-center">
                            <?
                                echo $product->stock_max;
                            ?>
                        </td>
                       
                       
                        <td>$<?=number_format(round($con_iva,2))?></td>
                        <td>$<?=number_format($product->precio_mayoreo)?></td>
                        <td>$<?=number_format($product->precio_distribuidor)?></td>
                        <td>$<?=number_format($product->precio_x_producto)?></td>
                        <td class="">
                            <?
                                if(!empty($product->costo_nacional)){
                                    echo '$'.$product->costo_nacional;
                                }
                            ?>
                        </td> 
                        <td class="text-center">
                            <?=$product->productos_cajas?>
                        </td>

                    </tr>

                    <?

                    endforeach;

                     }else{?>


                    <? foreach($categories as $categorie):?>
                    
                        <? if($categorie->id_categoria != 24){?>
                            <tr>
                                <td class="bg-info text-center" colspan="20">
                                    <strong><?=$categorie->categoria?></strong>
                                </td>
                            </tr>
                        <? }?>

                    <? $this->data['products'] = $this->products_model->get_products(array('fk_categoria'=>$categorie->id_categoria))?>

                    <? foreach($this->data['products'] as $product):?> <!-- Inicia bucle de productos -->

                    <?

                    $con_iva = $product->products_price + (16*($product->products_price/100));

                    if(!empty($product->peso)){
                        $costo_gramo = $product->peso / 1000 * 5;
                        $costo_gramo2 = round($usd_to_mxn * $costo_gramo,2);
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

                        </td>

                        <td style="text-transform:uppercase;" class="text-left">
                            <?
                                echo $product->products_name;

                                if($product->descontinuado == '1'){
                                    echo '<h4 style="color:red;">Descontinuado</h4>';
                                }
                            ?>
                        </td>

                       

                        <td>
                            <img alt="Fabricante" src="https://www.massivepc.com/images/<?=$product->manufacturers_image?>" style="display:block; margin:auto;" > <? /*height="30" width="60"*/?>
                        </td>

                        <td class="text-center ">
                            <?
                                if($product->sae_exist <= '0'){
                                    echo 'Agotado';
                                }else{
                                    echo $product->sae_exist;
                                }
                            ?>
                        </td>

                        <td class="text-center">
                            <?
                                echo $product->stock_min;
                            ?>
                        </td>

                        <td class="text-center">
                            <?
                                echo $product->stock_max;
                            ?>
                        </td>


                        <td>$<?=number_format(round($con_iva,2))?></td>
                        <td>$<?=number_format($product->precio_mayoreo)?></td>
                        <td>$<?=number_format($product->precio_distribuidor)?></td>
                       
                        <td class="">
                            <?
                                if(!empty($product->costo_nacional)){
                                    echo '$'.$product->costo_nacional;
                                }
                            ?>
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