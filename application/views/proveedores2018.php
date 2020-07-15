<!doctype html>

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title> </title>

    <link href="/css/jquery-ui.css" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://www.massivepc.com/mayoreo/assets/css/style_buscador.css?cb=4872a7d95911e9a0d94afe66ef807ea5" rel="stylesheet" type="text/css">
    <link href="https://www.massivepc.com/mayoreo/assets/bootstrap3/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="https://www.massivepc.com/mayoreo/assets/css/bootstrap-chosen.css" rel="stylesheet" type="text/css" media="screen" />
    
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
$prov = array(1=>'SHENZU GROUP COL., LTD',2=>'SIMERST TRADING LIMITED',3=>'TVCENLINEA.COM S.A DE C.V',4=>'CONEXIÓN Y ENERGIA EN COMPUTACIÓN SA DE CV',5=>'I LIKE',6=>'SINOSTAR INTERNATIONAL (HK) CO.,LTD',7=>'PROVEEDOR DE ANTENAS WIFI SKY Y DIAMOND',8=>'CHEPE',9=>'CVA',10=>'PC HARDWARE',11=>'ARANAM SA DE CV',12=>'GRUPO CARABENCH SA DE CV',13=>'ESTAFETA MEXICANA SA DE CV',14=>'ALBERTO DE JESUS VIRGEN MAGAÑA',15=>'TC MEMORY  SA DE CV',16=>'ACTUALIZACIONES PARA COMPUTADORAS SA DE CV',17=>'CORPORATIVO MONZALBO SA DE CV',18=>'JOSE TRINIDAD MT LIDER',19=>'JIYU ELECTRONIC CO,. LIMITED',20=>'TC MEMORY, S.A. DE C.V. (FAVOR DE NO USAR, CAPTURAR CON EL NO. 15)',21=>'Z.H.U. ELECTRONICA',22=>'ESTAFETA MEXICANA S.A. DE C.V.',23=>'PACIFIC. COM S.A. DE C.V.',24=>'ZONA AZUL CELULARES SA DE CV',25=>'CABLE MEN ( OSCAR ALEJANDRO GUERRERO CARRANZA )',26=>'EL MUNDO DE LA TABLET',27=>'MT LIDER',28=>'AMIGO EDUARDO CHIPS TELCEL',29=>'JUAN CARLOS HONOJOSA GARCIA',30=>'BARWARE S.A. DE C.V.',31=>'DISTRIBUIDORA TECTRON ( IVAN ISRAEL GARCIA GARCIA )',32=>'STOCK CELULAR (VICTOR HUGO)',33=>'LINK BITS',34=>'EB',35=>'GRUPO MOVILES',36=>'ELUX',37=>'FERNANDO GRIN',38=>'GABRIEL LAERA',39=>'IMPORTADORA AZ-TEK SA DE CV',40=>'MUNDO DE LA TABLET',41=>'BRENDA BORES',42=>'PTT SOLUCIONES SA DE CV',43=>'CORPORATIVO EBB',44=>'MOOVE TECH',45=>'SHOPONLINE',46=>'ESTAFETA VIP',47=>'J GUADALUPE ROSALES RIOS',48=>'FEDEX SF',49=>'ESTAFETA SF  (BENJAMIN LEDEZMA)',50=>'COMECO TECNOLOGIAS MEXICO S.A. DE C.V',51=>'ACCESORIOS Y CONTROLES',52=>'EDUARDO CHIPS',53=>'TECNOLOGIA & MAS',54=>'ARTURO ELOIR OLIVERA BARRERA',55=>'PROVEEDOR DF',56=>'FUSSION ACUSTIC',57=>'DIVERSION Y TRABAJO S.A DE C.V',58=>'LIFE',59=>'AMERIK',60=>'PCH MAYOREO SA. DE CV.',61=>'JC CELULARES Y ACCESORIOS',62=>'YIFA',63=>'GROUPE ADAKTY S.A DE C.V',64=>'LYX LUXURY FUNDAS',65=>'SINGUA TECNOLOGIA S.A. DE C.V.',66=>'CELULAR GOLDEN',67=>'CANSA',68=>'EBENEZER IMPORTADORA S DE RL DE CV',69=>'MARISOL CHIPS',70=>'QRUZH',71=>'IMPORTACIONES MIMI',72=>'MARTIN GUSTAVO GRIJALVA MARTINEZ',73=>'ISAC TEC,LADOS',74=>'REDPACK',75=>'CARLOS ERNESTO ARELLANO JIMENEZ',76=>'VELIKKA',77=>'ANTENAS JONATHAN BARRON',78=>'SUMEX',79=>'KINGMEX',80=>'DON BETO',81=>'ZENEK',82=>'CHIPS TELCEL Y UNEFON',83=>'MG MOBILE',84=>'ATELEFONITOS',85=>'COBY',86=>'DANIEL MEMORIAS',87=>'IMPORTACIONES GONZALEZ',88=>'MUNDO DE LA TABLET',89=>'TMOVI',90=>'FUSSION DF',91=>'SESUCONSA',92=>'GRUPO YUDHA',93=>'ADG TECHNOLOGIES',94=>'AXVAN',95=>'MICAS PEDRO BRAVO',96=>'PROLICOM',97=>'CARLOS GOMEZ CHIPS',98=>'WHITESTONE',99=>'RIDER',100=>'HUB CITY',101=>'CARGADORES MAPE',102=>'ANDAFA INNOVATORS S.A DE C.V',103=>'AION',104=>'ELE-GATE',105=>'FIMEX',106=>'HIP HOP',107=>'8341 (DANY) DF',108=>'CHIPS MOVISTAR',109=>'ZOGIS',110=>'HENG LIAN',111=>'LOS CHITOS',112=>'AMAZING VISION',113=>'SHINE COMPUTER',114=>'OTTO DIGITAL',115=>'ZHENG JIARONG',116=>'OTROS D,F',117=>'CAGI',118=>'SRA. ROCIO D,F',119=>'FULAME IMPORTACION',120=>'KAI PING',121=>'VMEX',122=>'A AND M',123=>'CENTROCEL TERESA',124=>'WEI HANG',125=>'CELULAR PLANET',126=>'ACCESORIOS GENESIS PANDA',127=>'DNS',128=>'CINTURON CITY',129=>'OSOCEL',130=>'SU-LY',131=>'ZHONG GUANG',132=>'CELMEX',133=>'JIAN HENG',134=>'PLAZA TEREZA (MAIZ)',135=>'KAILI',136=>'G MOVILE',137=>'RAZZY',138=>'DON DANY',139=>'CENTRAL 87',140=>'MEY',141=>'BIG BANG TECHNOLOGY',142=>'GOUMIN ZHEN',143=>'OTROS GDL',144=>'CHIPS TELCEL (PAUL)',145=>'MAIZ',146=>'TECNOLOGIA Y NOVEDADES SOLAR',147=>'ELECTRICA EL 45',148=>'WEICSOM',149=>'MEMORY ONE',150=>'POPULAR TECNOLOGIA',151=>'HARUMI CELL',152=>'FON CEL',153=>'RED5',154=>'AL GAMES',155=>'MARVO',156=>'MIND CONTROL',157=>'GENESIS PANDA',158=>'CHENS DIGITAL',159=>'ACCIS TECHNOLOGY',160=>'ELECTRONICA JAIRO',161=>'JIANG FANGZHEN',162=>'LJK',163=>'EMPLEADO HARUMI',164=>'CARLOS CUELLAR',165=>'IZI PAN',166=>'ANDY',167=>'DISTRIBUIDORA LASSER',168=>'CONCEPTO E IMAGEN DIGITAL S.A. DE C.V.',169=>'ZANJONG',170=>'LEONARDO ZAMORANO',171=>'JONATHAN AUDIFONOS',172=>'SPACE MB',173=>'AMOR',174=>'CHINLUE S.A. DE C.V.',175=>'ARUMI',176=>'KARINA TERESA AUDIFONOS',177=>'JOSE ANTONIO',178=>'MEGAFIRE',179=>'JOSE ANTONIO',180=>'ALCANCIAS CASINO',181=>'LAMPARAS LAVA',182=>'NEF REJAS',183=>'CHINLUE LAMPARAS DE LAVA',184=>'DOSYU',185=>'ROCIO CARGADORES DF',186=>'ACCIS DIADEMA KITTY',187=>'YIN AUDIFONOS SAMSUNG',188=>'EVA-Y',189=>'KIKI´S TOYS',190=>'CIGARROS ELECTRONICOS',191=>'FOCAM',192=>'FERNANDO CONTROLES SKY',193=>'FRANCISCO BLU RAY',194=>'SANDRA YU',195=>'WOIKA',196=>'ANTENAS PLANAS DANIEL',197=>'ABRAHAM CHIPS TELCEL',198=>'LITOY',199=>'COMPUTADORAS LUIS',200=>'RAYMUNDO CIGARROS ELECTRONICOS',201=>'IZTAK EXTRA BASS',202=>'SRA VICTORIA AUDIFONOS ORIGINALES',203=>'DICON',204=>'VELIKKA',205=>'MOCHILAS DF',206=>'MACHUKA',207=>'NOVEDADES DE ORIENTE',208=>'JIULI',209=>'WE TECCH',210=>'WE TECH',211=>'WETECH',212=>'JAIRO CARGADORES',213=>'EL BAZAR DE CHARBEL',214=>'PRODUCTOS OCULTOS NO RESURTIBLES',215=>'LOS PORFIRIOS',216=>'IVAN SASO CONNECT',217=>'WIMO',218=>' CARGADOR INALAMBRICO DANIEL JACOB MARTINEZ CERDA',219=>'CIGARROS ELECTRONICOS RICARDO MARQUEZ',220=>'HX',221=>'XH',222=>'XDF',223=>'HELERGON',551=>'RADOX');
?>


<div class="container-fluid">
               
        <div style="clear:both;"></div>
        
        <div id="seleccion">
            
            <div class="row">
                <div class="col-md-12">

                <div class="panel panel-default">

  <div class="panel-body">
   
    <form id="filtro" method="get" action="#row">
        
        <div class="row">

            <div class="col-md-12">

<select id="proveedor_id" name="proveedor_id" class="chosen-select" data-placeholder="PROVEEDOR" tabindex="-1">
 <option value="">PROVEEDOR</option>
 <?
    foreach ($prov01 as $k => $v) {
        $select = '';
        if($proveedor_id == $v->clave){
            $select = 'selected=""';
        }
        echo '<option '.$select.'  value="'.$v->clave.'">'.$v->nombre.'</option> ';
    }
 ?>
 <!--<option <?=($proveedor_id == '         1') ? 'selected=""' : '' ?> value="         1">SHENZU GROUP COL., LTD</option> 
 <option <?=($proveedor_id == '         2') ? 'selected=""' : '' ?> value="         2">SIMERST TRADING LIMITED</option> 
 <option <?=($proveedor_id == '         3') ? 'selected=""' : '' ?> value="         3">TVCENLINEA.COM S.A DE C.V</option> 
 <option <?=($proveedor_id == '         4') ? 'selected=""' : '' ?> value="         4">CONEXIÓN Y ENERGIA EN COMPUTACIÓN SA DE CV</option> 
 <option <?=($proveedor_id == '         5') ? 'selected=""' : '' ?> value="         5">I LIKE</option> 
 <option <?=($proveedor_id == '         6') ? 'selected=""' : '' ?> value="         6">SINOSTAR INTERNATIONAL (HK) CO.,LTD</option> 
 <option <?=($proveedor_id == '         7') ? 'selected=""' : '' ?> value="         7">PROVEEDOR DE ANTENAS WIFI SKY Y DIAMOND</option> 
 <option <?=($proveedor_id == '         8') ? 'selected=""' : '' ?> value="         8">CHEPE</option> 
 <option <?=($proveedor_id == '         9') ? 'selected=""' : '' ?> value="         9">CVA</option> 
 <option <?=($proveedor_id == '        10') ? 'selected=""' : '' ?> value="        10">PC HARDWARE</option> 
 <option <?=($proveedor_id == '        11') ? 'selected=""' : '' ?> value="        11">ARANAM SA DE CV</option> 
 <option <?=($proveedor_id == '        12') ? 'selected=""' : '' ?> value="        12">GRUPO CARABENCH SA DE CV</option> 
 <option <?=($proveedor_id == '        13') ? 'selected=""' : '' ?> value="        13">ESTAFETA MEXICANA SA DE CV</option> 
 <option <?=($proveedor_id == '        14') ? 'selected=""' : '' ?> value="        14">ALBERTO DE JESUS VIRGEN MAGAÑA</option> 
 <option <?=($proveedor_id == '        15') ? 'selected=""' : '' ?> value="        15">TC MEMORY  SA DE CV</option> 
 <option <?=($proveedor_id == '        16') ? 'selected=""' : '' ?> value="        16">ACTUALIZACIONES PARA COMPUTADORAS SA DE CV</option> 
 <option <?=($proveedor_id == '        17') ? 'selected=""' : '' ?> value="        17">CORPORATIVO MONZALBO SA DE CV</option> 
 <option <?=($proveedor_id == '        18') ? 'selected=""' : '' ?> value="        18">JOSE TRINIDAD MT LIDER</option> 
 <option <?=($proveedor_id == '        19') ? 'selected=""' : '' ?> value="        19">JIYU ELECTRONIC CO,. LIMITED</option> 
 <option <?=($proveedor_id == '        20') ? 'selected=""' : '' ?> value="        20">TC MEMORY, S.A. DE C.V. (FAVOR DE NO USAR, CAPTURAR CON EL NO. 15)</option> 
 <option <?=($proveedor_id == '        21') ? 'selected=""' : '' ?> value="        21">Z.H.U. ELECTRONICA</option> 
 <option <?=($proveedor_id == '        22') ? 'selected=""' : '' ?> value="        22">ESTAFETA MEXICANA S.A. DE C.V.</option> 
 <option <?=($proveedor_id == '        23') ? 'selected=""' : '' ?> value="        23">PACIFIC. COM S.A. DE C.V.</option> 
 <option <?=($proveedor_id == '        24') ? 'selected=""' : '' ?> value="        24">ZONA AZUL CELULARES SA DE CV</option> 
 <option <?=($proveedor_id == '        25') ? 'selected=""' : '' ?> value="        25">CABLE MEN ( OSCAR ALEJANDRO GUERRERO CARRANZA )</option> 
 <option <?=($proveedor_id == '        26') ? 'selected=""' : '' ?> value="        26">EL MUNDO DE LA TABLET</option> 
 <option <?=($proveedor_id == '        27') ? 'selected=""' : '' ?> value="        27">MT LIDER</option> 
 <option <?=($proveedor_id == '        28') ? 'selected=""' : '' ?> value="        28">AMIGO EDUARDO CHIPS TELCEL</option> 
 <option <?=($proveedor_id == '        29') ? 'selected=""' : '' ?> value="        29">JUAN CARLOS HONOJOSA GARCIA</option> 
 <option <?=($proveedor_id == '        30') ? 'selected=""' : '' ?> value="        30">BARWARE S.A. DE C.V.</option> 
 <option <?=($proveedor_id == '        31') ? 'selected=""' : '' ?> value="        31">DISTRIBUIDORA TECTRON ( IVAN ISRAEL GARCIA GARCIA )</option> 
 <option <?=($proveedor_id == '        32') ? 'selected=""' : '' ?> value="        32">STOCK CELULAR (VICTOR HUGO)</option> 
 <option <?=($proveedor_id == '        33') ? 'selected=""' : '' ?> value="        33">LINK BITS</option> 
 <option <?=($proveedor_id == '        34') ? 'selected=""' : '' ?> value="        34">EB</option> 
 <option <?=($proveedor_id == '        35') ? 'selected=""' : '' ?> value="        35">GRUPO MOVILES</option> 
 <option <?=($proveedor_id == '        36') ? 'selected=""' : '' ?> value="        36">ELUX</option> 
 <option <?=($proveedor_id == '        37') ? 'selected=""' : '' ?> value="        37">FERNANDO GRIN</option> 
 <option <?=($proveedor_id == '        38') ? 'selected=""' : '' ?> value="        38">GABRIEL LAERA</option> 
 <option <?=($proveedor_id == '        39') ? 'selected=""' : '' ?> value="        39">IMPORTADORA AZ-TEK SA DE CV</option> 
 <option <?=($proveedor_id == '        40') ? 'selected=""' : '' ?> value="        40">MUNDO DE LA TABLET</option> 
 <option <?=($proveedor_id == '        41') ? 'selected=""' : '' ?> value="        41">BRENDA BORES</option> 
 <option <?=($proveedor_id == '        42') ? 'selected=""' : '' ?> value="        42">PTT SOLUCIONES SA DE CV</option> 
 <option <?=($proveedor_id == '        43') ? 'selected=""' : '' ?> value="        43">CORPORATIVO EBB</option> 
 <option <?=($proveedor_id == '        44') ? 'selected=""' : '' ?> value="        44">MOOVE TECH</option> 
 <option <?=($proveedor_id == '        45') ? 'selected=""' : '' ?> value="        45">SHOPONLINE</option> 
 <option <?=($proveedor_id == '        46') ? 'selected=""' : '' ?> value="        46">ESTAFETA VIP</option> 
 <option <?=($proveedor_id == '        47') ? 'selected=""' : '' ?> value="        47">J GUADALUPE ROSALES RIOS</option> 
 <option <?=($proveedor_id == '        48') ? 'selected=""' : '' ?> value="        48">FEDEX SF</option> 
 <option <?=($proveedor_id == '        49') ? 'selected=""' : '' ?> value="        49">ESTAFETA SF  (BENJAMIN LEDEZMA)</option> 
 <option <?=($proveedor_id == '        50') ? 'selected=""' : '' ?> value="        50">COMECO TECNOLOGIAS MEXICO S.A. DE C.V</option> 
 <option <?=($proveedor_id == '        51') ? 'selected=""' : '' ?> value="        51">ACCESORIOS Y CONTROLES</option> 
 <option <?=($proveedor_id == '        52') ? 'selected=""' : '' ?> value="        52">EDUARDO CHIPS</option> 
 <option <?=($proveedor_id == '        53') ? 'selected=""' : '' ?> value="        53">TECNOLOGIA & MAS</option> 
 <option <?=($proveedor_id == '        54') ? 'selected=""' : '' ?> value="        54">ARTURO ELOIR OLIVERA BARRERA</option> 
 <option <?=($proveedor_id == '        55') ? 'selected=""' : '' ?> value="        55">PROVEEDOR DF</option> 
 <option <?=($proveedor_id == '        56') ? 'selected=""' : '' ?> value="        56">FUSSION ACUSTIC</option> 
 <option <?=($proveedor_id == '        57') ? 'selected=""' : '' ?> value="        57">DIVERSION Y TRABAJO S.A DE C.V</option> 
 <option <?=($proveedor_id == '        58') ? 'selected=""' : '' ?> value="        58">LIFE</option> 
 <option <?=($proveedor_id == '        59') ? 'selected=""' : '' ?> value="        59">AMERIK</option> 
 <option <?=($proveedor_id == '        60') ? 'selected=""' : '' ?> value="        60">PCH MAYOREO SA. DE CV.</option> 
 <option <?=($proveedor_id == '        61') ? 'selected=""' : '' ?> value="        61">JC CELULARES Y ACCESORIOS</option> 
 <option <?=($proveedor_id == '        62') ? 'selected=""' : '' ?> value="        62">YIFA</option> 
 <option <?=($proveedor_id == '        63') ? 'selected=""' : '' ?> value="        63">GROUPE ADAKTY S.A DE C.V</option> 
 <option <?=($proveedor_id == '        64') ? 'selected=""' : '' ?> value="        64">LYX LUXURY FUNDAS</option> 
 <option <?=($proveedor_id == '        65') ? 'selected=""' : '' ?> value="        65">SINGUA TECNOLOGIA S.A. DE C.V.</option> 
 <option <?=($proveedor_id == '        66') ? 'selected=""' : '' ?> value="        66">CELULAR GOLDEN</option> 
 <option <?=($proveedor_id == '        67') ? 'selected=""' : '' ?> value="        67">CANSA</option> 
 <option <?=($proveedor_id == '        68') ? 'selected=""' : '' ?> value="        68">EBENEZER IMPORTADORA S DE RL DE CV</option> 
 <option <?=($proveedor_id == '        69') ? 'selected=""' : '' ?> value="        69">MARISOL CHIPS</option> 
 <option <?=($proveedor_id == '        70') ? 'selected=""' : '' ?> value="        70">QRUZH</option> 
 <option <?=($proveedor_id == '        71') ? 'selected=""' : '' ?> value="        71">IMPORTACIONES MIMI</option> 
 <option <?=($proveedor_id == '        72') ? 'selected=""' : '' ?> value="        72">MARTIN GUSTAVO GRIJALVA MARTINEZ</option> 
 <option <?=($proveedor_id == '        73') ? 'selected=""' : '' ?> value="        73">ISAC TEC,LADOS</option> 
 <option <?=($proveedor_id == '        74') ? 'selected=""' : '' ?> value="        74">REDPACK</option> 
 <option <?=($proveedor_id == '        551') ? 'selected=""' : '' ?> value="        551">RADOX</option>  
 <option <?=($proveedor_id == '        75') ? 'selected=""' : '' ?> value="        75">CARLOS ERNESTO ARELLANO JIMENEZ</option> 
 <option <?=($proveedor_id == '        76') ? 'selected=""' : '' ?> value="        76">VELIKKA</option> 
 <option <?=($proveedor_id == '        77') ? 'selected=""' : '' ?> value="        77">ANTENAS JONATHAN BARRON</option> 
 <option <?=($proveedor_id == '        78') ? 'selected=""' : '' ?> value="        78">SUMEX</option> 
 <option <?=($proveedor_id == '        79') ? 'selected=""' : '' ?> value="        79">KINGMEX</option> 
 <option <?=($proveedor_id == '        80') ? 'selected=""' : '' ?> value="        80">DON BETO</option> 
 <option <?=($proveedor_id == '        81') ? 'selected=""' : '' ?> value="        81">ZENEK</option> 
 <option <?=($proveedor_id == '        82') ? 'selected=""' : '' ?> value="        82">CHIPS TELCEL Y UNEFON</option> 
 <option <?=($proveedor_id == '        83') ? 'selected=""' : '' ?> value="        83">MG MOBILE</option> 
 <option <?=($proveedor_id == '        84') ? 'selected=""' : '' ?> value="        84">ATELEFONITOS</option> 
 <option <?=($proveedor_id == '        85') ? 'selected=""' : '' ?> value="        85">COBY</option> 
 <option <?=($proveedor_id == '        86') ? 'selected=""' : '' ?> value="        86">DANIEL MEMORIAS</option> 
 <option <?=($proveedor_id == '        87') ? 'selected=""' : '' ?> value="        87">IMPORTACIONES GONZALEZ</option> 
 <option <?=($proveedor_id == '        88') ? 'selected=""' : '' ?> value="        88">MUNDO DE LA TABLET</option> 
 <option <?=($proveedor_id == '        89') ? 'selected=""' : '' ?> value="        89">TMOVI</option> 
 <option <?=($proveedor_id == '        90') ? 'selected=""' : '' ?> value="        90">FUSSION DF</option> 
 <option <?=($proveedor_id == '        91') ? 'selected=""' : '' ?> value="        91">SESUCONSA</option> 
 <option <?=($proveedor_id == '        92') ? 'selected=""' : '' ?> value="        92">GRUPO YUDHA</option> 
 <option <?=($proveedor_id == '        93') ? 'selected=""' : '' ?> value="        93">ADG TECHNOLOGIES</option> 
 <option <?=($proveedor_id == '        94') ? 'selected=""' : '' ?> value="        94">AXVAN</option> 
 <option <?=($proveedor_id == '        95') ? 'selected=""' : '' ?> value="        95">MICAS PEDRO BRAVO</option> 
 <option <?=($proveedor_id == '        96') ? 'selected=""' : '' ?> value="        96">PROLICOM</option> 
 <option <?=($proveedor_id == '        97') ? 'selected=""' : '' ?> value="        97">CARLOS GOMEZ CHIPS</option> 
 <option <?=($proveedor_id == '        98') ? 'selected=""' : '' ?> value="        98">WHITESTONE</option> 
 <option <?=($proveedor_id == '        99') ? 'selected=""' : '' ?> value="        99">RIDER</option> 
 <option <?=($proveedor_id == '       100') ? 'selected=""' : '' ?> value="       100">HUB CITY</option> 
 <option <?=($proveedor_id == '       101') ? 'selected=""' : '' ?> value="       101">CARGADORES MAPE</option> 
 <option <?=($proveedor_id == '       102') ? 'selected=""' : '' ?> value="       102">ANDAFA INNOVATORS S.A DE C.V</option> 
 <option <?=($proveedor_id == '       103') ? 'selected=""' : '' ?> value="       103">AION</option> 
 <option <?=($proveedor_id == '       104') ? 'selected=""' : '' ?> value="       104">ELE-GATE</option> 
 <option <?=($proveedor_id == '       105') ? 'selected=""' : '' ?> value="       105">FIMEX</option> 
 <option <?=($proveedor_id == '       106') ? 'selected=""' : '' ?> value="       106">HIP HOP</option> 
 <option <?=($proveedor_id == '       107') ? 'selected=""' : '' ?> value="       107">8341 (DANY) DF</option> 
 <option <?=($proveedor_id == '       108') ? 'selected=""' : '' ?> value="       108">CHIPS MOVISTAR</option> 
 <option <?=($proveedor_id == '       109') ? 'selected=""' : '' ?> value="       109">ZOGIS</option> 
 <option <?=($proveedor_id == '       110') ? 'selected=""' : '' ?> value="       110">HENG LIAN</option> 
 <option <?=($proveedor_id == '       111') ? 'selected=""' : '' ?> value="       111">LOS CHITOS</option> 
 <option <?=($proveedor_id == '       112') ? 'selected=""' : '' ?> value="       112">AMAZING VISION</option> 
 <option <?=($proveedor_id == '       113') ? 'selected=""' : '' ?> value="       113">SHINE COMPUTER</option> 
 <option <?=($proveedor_id == '       114') ? 'selected=""' : '' ?> value="       114">OTTO DIGITAL</option> 
 <option <?=($proveedor_id == '       115') ? 'selected=""' : '' ?> value="       115">ZHENG JIARONG</option> 
 <option <?=($proveedor_id == '       116') ? 'selected=""' : '' ?> value="       116">OTROS D,F</option> 
 <option <?=($proveedor_id == '       117') ? 'selected=""' : '' ?> value="       117">CAGI</option> 
 <option <?=($proveedor_id == '       118') ? 'selected=""' : '' ?> value="       118">SRA. ROCIO D,F</option> 
 <option <?=($proveedor_id == '       119') ? 'selected=""' : '' ?> value="       119">FULAME IMPORTACION</option> 
 <option <?=($proveedor_id == '       120') ? 'selected=""' : '' ?> value="       120">KAI PING</option> 
 <option <?=($proveedor_id == '       121') ? 'selected=""' : '' ?> value="       121">VMEX</option> 
 <option <?=($proveedor_id == '       122') ? 'selected=""' : '' ?> value="       122">A AND M</option> 
 <option <?=($proveedor_id == '       123') ? 'selected=""' : '' ?> value="       123">CENTROCEL TERESA</option> 
 <option <?=($proveedor_id == '       124') ? 'selected=""' : '' ?> value="       124">WEI HANG</option> 
 <option <?=($proveedor_id == '       125') ? 'selected=""' : '' ?> value="       125">CELULAR PLANET</option> 
 <option <?=($proveedor_id == '       126') ? 'selected=""' : '' ?> value="       126">ACCESORIOS GENESIS PANDA</option> 
 <option <?=($proveedor_id == '       127') ? 'selected=""' : '' ?> value="       127">DNS</option> 
 <option <?=($proveedor_id == '       128') ? 'selected=""' : '' ?> value="       128">CINTURON CITY</option> 
 <option <?=($proveedor_id == '       129') ? 'selected=""' : '' ?> value="       129">OSOCEL</option> 
 <option <?=($proveedor_id == '       130') ? 'selected=""' : '' ?> value="       130">SU-LY</option> 
 <option <?=($proveedor_id == '       131') ? 'selected=""' : '' ?> value="       131">ZHONG GUANG</option> 
 <option <?=($proveedor_id == '       132') ? 'selected=""' : '' ?> value="       132">CELMEX</option> 
 <option <?=($proveedor_id == '       133') ? 'selected=""' : '' ?> value="       133">JIAN HENG</option> 
 <option <?=($proveedor_id == '       134') ? 'selected=""' : '' ?> value="       134">PLAZA TEREZA (MAIZ)</option> 
 <option <?=($proveedor_id == '       135') ? 'selected=""' : '' ?> value="       135">KAILI</option> 
 <option <?=($proveedor_id == '       136') ? 'selected=""' : '' ?> value="       136">G MOVILE</option> 
 <option <?=($proveedor_id == '       137') ? 'selected=""' : '' ?> value="       137">RAZZY</option> 
 <option <?=($proveedor_id == '       138') ? 'selected=""' : '' ?> value="       138">DON DANY</option> 
 <option <?=($proveedor_id == '       139') ? 'selected=""' : '' ?> value="       139">CENTRAL 87</option> 
 <option <?=($proveedor_id == '       140') ? 'selected=""' : '' ?> value="       140">MEY</option> 
 <option <?=($proveedor_id == '       141') ? 'selected=""' : '' ?> value="       141">BIG BANG TECHNOLOGY</option> 
 <option <?=($proveedor_id == '       142') ? 'selected=""' : '' ?> value="       142">GOUMIN ZHEN</option> 
 <option <?=($proveedor_id == '       143') ? 'selected=""' : '' ?> value="       143">OTROS GDL</option> 
 <option <?=($proveedor_id == '       144') ? 'selected=""' : '' ?> value="       144">CHIPS TELCEL (PAUL)</option> 
 <option <?=($proveedor_id == '       145') ? 'selected=""' : '' ?> value="       145">MAIZ</option> 
 <option <?=($proveedor_id == '       146') ? 'selected=""' : '' ?> value="       146">TECNOLOGIA Y NOVEDADES SOLAR</option> 
 <option <?=($proveedor_id == '       147') ? 'selected=""' : '' ?> value="       147">ELECTRICA EL 45</option> 
 <option <?=($proveedor_id == '       148') ? 'selected=""' : '' ?> value="       148">WEICSOM</option> 
 <option <?=($proveedor_id == '       149') ? 'selected=""' : '' ?> value="       149">MEMORY ONE</option> 
 <option <?=($proveedor_id == '       150') ? 'selected=""' : '' ?> value="       150">POPULAR TECNOLOGIA</option> 
 <option <?=($proveedor_id == '       151') ? 'selected=""' : '' ?> value="       151">HARUMI CELL</option> 
 <option <?=($proveedor_id == '       152') ? 'selected=""' : '' ?> value="       152">FON CEL</option> 
 <option <?=($proveedor_id == '       153') ? 'selected=""' : '' ?> value="       153">RED5</option> 
 <option <?=($proveedor_id == '       154') ? 'selected=""' : '' ?> value="       154">AL GAMES</option> 
 <option <?=($proveedor_id == '       155') ? 'selected=""' : '' ?> value="       155">MARVO</option> 
 <option <?=($proveedor_id == '       156') ? 'selected=""' : '' ?> value="       156">MIND CONTROL</option> 
 <option <?=($proveedor_id == '       157') ? 'selected=""' : '' ?> value="       157">GENESIS PANDA</option> 
 <option <?=($proveedor_id == '       158') ? 'selected=""' : '' ?> value="       158">CHENS DIGITAL</option> 
 <option <?=($proveedor_id == '       159') ? 'selected=""' : '' ?> value="       159">ACCIS TECHNOLOGY</option> 
 <option <?=($proveedor_id == '       160') ? 'selected=""' : '' ?> value="       160">ELECTRONICA JAIRO</option> 
 <option <?=($proveedor_id == '       161') ? 'selected=""' : '' ?> value="       161">JIANG FANGZHEN</option> 
 <option <?=($proveedor_id == '       162') ? 'selected=""' : '' ?> value="       162">LJK</option> 
 <option <?=($proveedor_id == '       163') ? 'selected=""' : '' ?> value="       163">EMPLEADO HARUMI</option> 
 <option <?=($proveedor_id == '       164') ? 'selected=""' : '' ?> value="       164">CARLOS CUELLAR</option> 
 <option <?=($proveedor_id == '       165') ? 'selected=""' : '' ?> value="       165">IZI PAN</option> 
 <option <?=($proveedor_id == '       166') ? 'selected=""' : '' ?> value="       166">ANDY</option> 
 <option <?=($proveedor_id == '       167') ? 'selected=""' : '' ?> value="       167">DISTRIBUIDORA LASSER</option> 
 <option <?=($proveedor_id == '       168') ? 'selected=""' : '' ?> value="       168">CONCEPTO E IMAGEN DIGITAL S.A. DE C.V.</option> 
 <option <?=($proveedor_id == '       169') ? 'selected=""' : '' ?> value="       169">ZANJONG</option> 
 <option <?=($proveedor_id == '       170') ? 'selected=""' : '' ?> value="       170">LEONARDO ZAMORANO</option> 
 <option <?=($proveedor_id == '       171') ? 'selected=""' : '' ?> value="       171">JONATHAN AUDIFONOS</option> 
 <option <?=($proveedor_id == '       172') ? 'selected=""' : '' ?> value="       172">SPACE MB</option> 
 <option <?=($proveedor_id == '       173') ? 'selected=""' : '' ?> value="       173">AMOR</option> 
 <option <?=($proveedor_id == '       174') ? 'selected=""' : '' ?> value="       174">CHINLUE S.A. DE C.V.</option> 
 <option <?=($proveedor_id == '       175') ? 'selected=""' : '' ?> value="       175">ARUMI</option> 
 <option <?=($proveedor_id == '       176') ? 'selected=""' : '' ?> value="       176">KARINA TERESA AUDIFONOS</option> 
 <option <?=($proveedor_id == '       177') ? 'selected=""' : '' ?> value="       177">JOSE ANTONIO</option> 
 <option <?=($proveedor_id == '       178') ? 'selected=""' : '' ?> value="       178">MEGAFIRE</option> 
 <option <?=($proveedor_id == '       179') ? 'selected=""' : '' ?> value="       179">JOSE ANTONIO</option> 
 <option <?=($proveedor_id == '       180') ? 'selected=""' : '' ?> value="       180">ALCANCIAS CASINO</option> 
 <option <?=($proveedor_id == '       181') ? 'selected=""' : '' ?> value="       181">LAMPARAS LAVA</option> 
 <option <?=($proveedor_id == '       182') ? 'selected=""' : '' ?> value="       182">NEF REJAS</option> 
 <option <?=($proveedor_id == '       183') ? 'selected=""' : '' ?> value="       183">CHINLUE LAMPARAS DE LAVA</option> 
 <option <?=($proveedor_id == '       184') ? 'selected=""' : '' ?> value="       184">DOSYU</option> 
 <option <?=($proveedor_id == '       185') ? 'selected=""' : '' ?> value="       185">ROCIO CARGADORES DF</option> 
 <option <?=($proveedor_id == '       186') ? 'selected=""' : '' ?> value="       186">ACCIS DIADEMA KITTY</option> 
 <option <?=($proveedor_id == '       187') ? 'selected=""' : '' ?> value="       187">YIN AUDIFONOS SAMSUNG</option> 
 <option <?=($proveedor_id == '       188') ? 'selected=""' : '' ?> value="       188">EVA-Y</option> 
 <option <?=($proveedor_id == '       189') ? 'selected=""' : '' ?> value="       189">KIKI´S TOYS</option> 
 <option <?=($proveedor_id == '       190') ? 'selected=""' : '' ?> value="       190">CIGARROS ELECTRONICOS</option> 
 <option <?=($proveedor_id == '       191') ? 'selected=""' : '' ?> value="       191">FOCAM</option> 
 <option <?=($proveedor_id == '       192') ? 'selected=""' : '' ?> value="       192">FERNANDO CONTROLES SKY</option> 
 <option <?=($proveedor_id == '       193') ? 'selected=""' : '' ?> value="       193">FRANCISCO BLU RAY</option> 
 <option <?=($proveedor_id == '       194') ? 'selected=""' : '' ?> value="       194">SANDRA YU</option> 
 <option <?=($proveedor_id == '       195') ? 'selected=""' : '' ?> value="       195">WOIKA</option> 
 <option <?=($proveedor_id == '       196') ? 'selected=""' : '' ?> value="       196">ANTENAS PLANAS DANIEL</option> 
 <option <?=($proveedor_id == '       197') ? 'selected=""' : '' ?> value="       197">ABRAHAM CHIPS TELCEL</option> 
 <option <?=($proveedor_id == '       198') ? 'selected=""' : '' ?> value="       198">LITOY</option> 
 <option <?=($proveedor_id == '       199') ? 'selected=""' : '' ?> value="       199">COMPUTADORAS LUIS</option> 
 <option <?=($proveedor_id == '       200') ? 'selected=""' : '' ?> value="       200">RAYMUNDO CIGARROS ELECTRONICOS</option> 
 <option <?=($proveedor_id == '       201') ? 'selected=""' : '' ?> value="       201">IZTAK EXTRA BASS</option> 
 <option <?=($proveedor_id == '       202') ? 'selected=""' : '' ?> value="       202">SRA VICTORIA AUDIFONOS ORIGINALES</option> 
 <option <?=($proveedor_id == '       203') ? 'selected=""' : '' ?> value="       203">DICON</option> 
 <option <?=($proveedor_id == '       204') ? 'selected=""' : '' ?> value="       204">VELIKKA</option> 
 <option <?=($proveedor_id == '       205') ? 'selected=""' : '' ?> value="       205">MOCHILAS DF</option> 
 <option <?=($proveedor_id == '       206') ? 'selected=""' : '' ?> value="       206">MACHUKA</option> 
 <option <?=($proveedor_id == '       207') ? 'selected=""' : '' ?> value="       207">NOVEDADES DE ORIENTE</option> 
 <option <?=($proveedor_id == '       208') ? 'selected=""' : '' ?> value="       208">JIULI</option> 
 <option <?=($proveedor_id == '       209') ? 'selected=""' : '' ?> value="       209">WE TECCH</option> 
 <option <?=($proveedor_id == '       210') ? 'selected=""' : '' ?> value="       210">WE TECH</option> 
 <option <?=($proveedor_id == '       211') ? 'selected=""' : '' ?> value="       211">WETECH</option> 
 <option <?=($proveedor_id == '       212') ? 'selected=""' : '' ?> value="       212">JAIRO CARGADORES</option> 
 <option <?=($proveedor_id == '       213') ? 'selected=""' : '' ?> value="       213">EL BAZAR DE CHARBEL</option> 
 <option <?=($proveedor_id == '       214') ? 'selected=""' : '' ?> value="       214">PRODUCTOS OCULTOS NO RESURTIBLES</option> 
 <option <?=($proveedor_id == '       215') ? 'selected=""' : '' ?> value="       215">LOS PORFIRIOS</option> 
 <option <?=($proveedor_id == '       216') ? 'selected=""' : '' ?> value="       216">IVAN SASO CONNECT</option> 
 <option <?=($proveedor_id == '       217') ? 'selected=""' : '' ?> value="       217">WIMO</option> 
 <option <?=($proveedor_id == '       218') ? 'selected=""' : '' ?> value="       218"> CARGADOR INALAMBRICO DANIEL JACOB MARTINEZ CERDA</option> 
 <option <?=($proveedor_id == '       219') ? 'selected=""' : '' ?> value="       219">CIGARROS ELECTRONICOS RICARDO MARQUEZ</option> 
 <option <?=($proveedor_id == '       220') ? 'selected=""' : '' ?> value="       220">HX</option> 
 <option <?=($proveedor_id == '       221') ? 'selected=""' : '' ?> value="       221">XH</option> 
 <option <?=($proveedor_id == '       222') ? 'selected=""' : '' ?> value="       222">XDF</option> 
 <option <?=($proveedor_id == '       223') ? 'selected=""' : '' ?> value="       223">HELERGON</option> -->
 
 
 
 
                                <!-- **************************-->
</select>
            </div>
            
            <div class="col-md-12">
                <button style="display: none;" class="btn btn-primary btn-search" type="submit">Buscar</button>
            </div>

        </div>

    
        
    </form>

  </div>
</div>
                
            </div>

            </div>

            
            <? if(isset($provmd5))
            {
                echo '<a target="_blank" href="https://www.massivepc.com/mayoreo/proveedores2018/codigo/'.$provmd5.'/'.trim($proveedor_id).'?rnd='.md5(time()).'">https://www.massivepc.com/mayoreo/proveedores/codigo/'.$provmd5.'/'.trim($proveedor_id).'?rnd='.md5(time()).'</a>';
            }

            ?>

        </div>
        
    </table>


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