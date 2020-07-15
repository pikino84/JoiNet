<?
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.js"></script>
<link href="https://www.massivepc.com/mayoreo/assets/bootstrap3/css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="/mayoreo/assets/bootstrap3/js/bootstrap.js"></script>

<meta charset="utf-8">

<form method="post" action="<?=base_url()?>ed/actualizar_2">

<input type="hidden" name="id_producto" value="<?=$id_producto?>"/>

<div class="container">

	<div class="row">

		<div class="col-md-12">

		<table class="table">

			<tr>
				<td>
					Nombre
					<input id="products_name_js" class="form-control" type="text" name="products_name" value="<?=(isset($products_name)) ? $products_name : '' ?>" />
					<br>
					<span id="counter_js"></span>
				</td>
			</tr>
			<tr>
				<td>
					Publico<input class="form-control" type="text" name="precio_pu" value="<?=(isset($precio_pu)) ? $precio_pu : '' ?>" />
				</td>
				<td>
					Mayoreo <input class="form-control" type="text" name="precio_ma" value="<?=(isset($precio_ma)) ? $precio_ma : '' ?>" />
				</td>
			</tr>
			<tr>
				<td>
					Distribuidor<input class="form-control" type="text" name="precio_di" value="<?=(isset($precio_di)) ? $precio_di : '' ?>" />
				</td>
				<td>
					Categoria 
					<select id="fk_categoria" name="fk_categoria" class="form-control" data-placeholder="Categoría" tabindex="-1">
	                    <option value="">TODAS LAS CATEGORIAS</option>
	                    <? foreach($categorias as $categoria):?>
	                    <option <?=($fk_categoria == $categoria->id_categoria) ? 'selected' : '' ?> value="<?=$categoria->id_categoria?>"><?=$categoria->categoria?></option>
	                    <? endforeach?>
                	</select>
				</td>
			</tr>
			<tr>
				<td>
					Costo ¥<input class="form-control" type="text" name="costo" value="<?=(isset($costo)) ? $costo : '' ?>" />
				</td>
				<td>
					Costo Nacional<input class="form-control" type="text" name="costo_nacional" value="<?=(isset($costo_nacional)) ? $costo_nacional : '' ?>" />
				</td>
			</tr>
			<tr>
				<td>
					Costo USD<input class="form-control" type="text" name="costo_usd" value="<?=(isset($costo_usd)) ? $costo_usd : '' ?>" />
				</td>
				<td>
					Id Video Youtube
					<input class="form-control" type="text" name="id_video_youtube" id="id_video_youtube" value="<?=(isset($id_video_youtube)) ? $id_video_youtube : '' ?>">
				</td>
			</tr>
			<tr>
				<td>
					Remate <select class="form-control" name="remate">
					
						<option <?=($remate == '0') ? 'selected=""' : '' ?> value="0">No</option>
						<option <?=($remate == '1') ? 'selected=""' : '' ?> value="1">Si</option>
						
					</select>
				</td>
				<td>
					Nuevo <select class="form-control" name="nuevo">
					
						<option <?=($nuevo == '0') ? 'selected=""' : '' ?> value="0">No</option>
						<option <?=($nuevo == '1') ? 'selected=""' : '' ?> value="1">Si</option>
						
					</select>
				</td>
			</tr>
			<tr>
				<td>
					Oferta <select class="form-control" name="oferta">
					
						<option <?=($oferta == '0') ? 'selected=""' : '' ?> value="0">No</option>
						<option <?=($oferta == '1') ? 'selected=""' : '' ?> value="1">Si</option>
						
					</select>
				</td>

				<td>
                        Proveedor

                        <select class="form-control" name="proveedor" id="proveedor" tabindex="2" >
                                <option value=""></option>
 <option <?=($proveedor == '       107') ? 'selected=""' : '' ?> value="       107">8341 (DANY) DF</option> 
 <option <?=($proveedor == '       122') ? 'selected=""' : '' ?> value="       122">A AND M</option> 
 <option <?=($proveedor == '       197') ? 'selected=""' : '' ?> value="       197">ABRAHAM CHIPS TELCEL</option> 
 <option <?=($proveedor == '       126') ? 'selected=""' : '' ?> value="       126">ACCESORIOS GENESIS PANDA</option> 
 <option <?=($proveedor == '        51') ? 'selected=""' : '' ?> value="        51">ACCESORIOS Y CONTROLES</option> 
 <option <?=($proveedor == '       186') ? 'selected=""' : '' ?> value="       186">ACCIS DIADEMA KITTY</option> 
 <option <?=($proveedor == '       159') ? 'selected=""' : '' ?> value="       159">ACCIS TECHNOLOGY</option> 
 <option <?=($proveedor == '        93') ? 'selected=""' : '' ?> value="        93">ADG TECHNOLOGIES</option> 
 <option <?=($proveedor == '       103') ? 'selected=""' : '' ?> value="       103">AION</option> 
 <option <?=($proveedor == '       154') ? 'selected=""' : '' ?> value="       154">AL GAMES</option> 
 <option <?=($proveedor == '       180') ? 'selected=""' : '' ?> value="       180">ALCANCIAS CASINO</option> 
 <option <?=($proveedor == '       112') ? 'selected=""' : '' ?> value="       112">AMAZING VISION</option> 
 <option <?=($proveedor == '        59') ? 'selected=""' : '' ?> value="        59">AMERIK</option> 
 <option <?=($proveedor == '       102') ? 'selected=""' : '' ?> value="       102">ANDAFA INNOVATORS S.A DE C.V</option> 
 <option <?=($proveedor == '       166') ? 'selected=""' : '' ?> value="       166">ANDY</option> 
 <option <?=($proveedor == '        77') ? 'selected=""' : '' ?> value="        77">ANTENAS JONATHAN BARRON</option> 
 <option <?=($proveedor == '       196') ? 'selected=""' : '' ?> value="       196">ANTENAS PLANAS DANIEL</option> 
 <option <?=($proveedor == '        11') ? 'selected=""' : '' ?> value="        11">ARANAM SA DE CV</option> 
 <option <?=($proveedor == '       175') ? 'selected=""' : '' ?> value="       175">ARUMI</option> 
 <option <?=($proveedor == '        84') ? 'selected=""' : '' ?> value="        84">ATELEFONITOS</option> 
 <option <?=($proveedor == '        94') ? 'selected=""' : '' ?> value="        94">AXVAN</option> 
 <option <?=($proveedor == '        16') ? 'selected=""' : '' ?> value="        16">ACTUALIZACIONES PARA COMPUTADORAS SA DE CV</option> 
 <option <?=($proveedor == '        14') ? 'selected=""' : '' ?> value="        14">ALBERTO DE JESUS VIRGEN MAGAÑA</option> 
 <option <?=($proveedor == '        28') ? 'selected=""' : '' ?> value="        28">AMIGO EDUARDO CHIPS TELCEL</option> 
 <option <?=($proveedor == '       173') ? 'selected=""' : '' ?> value="       173">AMOR</option> 
 <option <?=($proveedor == '        54') ? 'selected=""' : '' ?> value="        54">ARTURO ELOIR OLIVERA BARRERA</option> 
 <option <?=($proveedor == '       141') ? 'selected=""' : '' ?> value="       141">BIG BANG TECHNOLOGY</option> 
 <option <?=($proveedor == '        41') ? 'selected=""' : '' ?> value="        41">BRENDA BORES</option> 
 <option <?=($proveedor == '        30') ? 'selected=""' : '' ?> value="        30">BARWARE S.A. DE C.V.</option> 
 <option <?=($proveedor == '       117') ? 'selected=""' : '' ?> value="       117">CAGI</option> 
 <option <?=($proveedor == '        67') ? 'selected=""' : '' ?> value="        67">CANSA</option> 
 <option <?=($proveedor == '       101') ? 'selected=""' : '' ?> value="       101">CARGADORES MAPE</option> 
 <option <?=($proveedor == '       164') ? 'selected=""' : '' ?> value="       164">CARLOS CUELLAR</option> 
 <option <?=($proveedor == '        75') ? 'selected=""' : '' ?> value="        75">CARLOS ERNESTO ARELLANO JIMENEZ</option> 
 <option <?=($proveedor == '       132') ? 'selected=""' : '' ?> value="       132">CELMEX</option> 
 <option <?=($proveedor == '        66') ? 'selected=""' : '' ?> value="        66">CELULAR GOLDEN</option> 
 <option <?=($proveedor == '       125') ? 'selected=""' : '' ?> value="       125">CELULAR PLANET</option> 
 <option <?=($proveedor == '       139') ? 'selected=""' : '' ?> value="       139">CENTRAL 87</option> 
 <option <?=($proveedor == '       123') ? 'selected=""' : '' ?> value="       123">CENTROCEL TERESA</option> 
 <option <?=($proveedor == '       158') ? 'selected=""' : '' ?> value="       158">CHENS DIGITAL</option> 
 <option <?=($proveedor == '         8') ? 'selected=""' : '' ?> value="         8">CHEPE</option> 
 <option <?=($proveedor == '       183') ? 'selected=""' : '' ?> value="       183">CHINLUE LAMPARAS DE LAVA</option> 
 <option <?=($proveedor == '       108') ? 'selected=""' : '' ?> value="       108">CHIPS MOVISTAR</option> 
 <option <?=($proveedor == '       144') ? 'selected=""' : '' ?> value="       144">CHIPS TELCEL (PAUL)</option> 
 <option <?=($proveedor == '       190') ? 'selected=""' : '' ?> value="       190">CIGARROS ELECTRONICOS</option> 
 <option <?=($proveedor == '       128') ? 'selected=""' : '' ?> value="       128">CINTURON CITY</option> 
 <option <?=($proveedor == '        85') ? 'selected=""' : '' ?> value="        85">COBY</option> 
 <option <?=($proveedor == '        50') ? 'selected=""' : '' ?> value="        50">COMECO TECNOLOGIAS MEXICO S.A. DE C.V</option> 
 <option <?=($proveedor == '       199') ? 'selected=""' : '' ?> value="       199">COMPUTADORAS LUIS</option> 
 <option <?=($proveedor == '       168') ? 'selected=""' : '' ?> value="       168">CONCEPTO E IMAGEN DIGITAL S.A. DE C.V.</option> 
 <option <?=($proveedor == '        17') ? 'selected=""' : '' ?> value="        17">CORPORATIVO MONZALBO SA DE CV</option> 
 <option <?=($proveedor == '         9') ? 'selected=""' : '' ?> value="         9">CVA</option> 
 <option <?=($proveedor == '        25') ? 'selected=""' : '' ?> value="        25">CABLE MEN ( OSCAR ALEJANDRO GUERRERO CARRANZA )</option> 
 <option <?=($proveedor == '        97') ? 'selected=""' : '' ?> value="        97">CARLOS GOMEZ CHIPS</option> 
 <option <?=($proveedor == '         4') ? 'selected=""' : '' ?> value="         4">CONEXIÓN Y ENERGIA EN COMPUTACIÓN SA DE CV</option> 
 <option <?=($proveedor == '        43') ? 'selected=""' : '' ?> value="        43">CORPORATIVO EBB</option> 
 <option <?=($proveedor == '        86') ? 'selected=""' : '' ?> value="        86">DANIEL MEMORIAS</option> 
 <option <?=($proveedor == '       203') ? 'selected=""' : '' ?> value="       203">DICON</option> 
 <option <?=($proveedor == '       167') ? 'selected=""' : '' ?> value="       167">DISTRIBUIDORA LASSER</option> 
 <option <?=($proveedor == '        31') ? 'selected=""' : '' ?> value="        31">DISTRIBUIDORA TECTRON ( IVAN ISRAEL GARCIA GARCIA )</option> 
 <option <?=($proveedor == '        57') ? 'selected=""' : '' ?> value="        57">DIVERSION Y TRABAJO S.A DE C.V</option> 
 <option <?=($proveedor == '       127') ? 'selected=""' : '' ?> value="       127">DNS</option> 
 <option <?=($proveedor == '        80') ? 'selected=""' : '' ?> value="        80">DON BETO</option> 
 <option <?=($proveedor == '       138') ? 'selected=""' : '' ?> value="       138">DON DANY</option> 
 <option <?=($proveedor == '       184') ? 'selected=""' : '' ?> value="       184">DOSYU</option> 
 <option <?=($proveedor == '        68') ? 'selected=""' : '' ?> value="        68">EBENEZER IMPORTADORA S DE RL DE CV</option> 
 <option <?=($proveedor == '       104') ? 'selected=""' : '' ?> value="       104">ELE-GATE</option> 
 <option <?=($proveedor == '       147') ? 'selected=""' : '' ?> value="       147">ELECTRICA EL 45</option> 
 <option <?=($proveedor == '       160') ? 'selected=""' : '' ?> value="       160">ELECTRONICA JAIRO</option> 
 <option <?=($proveedor == '       163') ? 'selected=""' : '' ?> value="       163">EMPLEADO HARUMI</option> 
 <option <?=($proveedor == '        22') ? 'selected=""' : '' ?> value="        22">ESTAFETA MEXICANA S.A. DE C.V.</option> 
 <option <?=($proveedor == '        13') ? 'selected=""' : '' ?> value="        13">ESTAFETA MEXICANA SA DE CV</option> 
 <option <?=($proveedor == '        49') ? 'selected=""' : '' ?> value="        49">ESTAFETA SF  (BENJAMIN LEDEZMA)</option> 
 <option <?=($proveedor == '       188') ? 'selected=""' : '' ?> value="       188">EVA-Y</option> 
 <option <?=($proveedor == '        52') ? 'selected=""' : '' ?> value="        52">EDUARDO CHIPS</option> 
 <option <?=($proveedor == '        26') ? 'selected=""' : '' ?> value="        26">EL MUNDO DE LA TABLET</option> 
 <option <?=($proveedor == '        36') ? 'selected=""' : '' ?> value="        36">ELUX</option> 
 <option <?=($proveedor == '        46') ? 'selected=""' : '' ?> value="        46">ESTAFETA VIP</option> 
 <option <?=($proveedor == '        48') ? 'selected=""' : '' ?> value="        48">FEDEX SF</option> 
 <option <?=($proveedor == '       192') ? 'selected=""' : '' ?> value="       192">FERNANDO CONTROLES SKY</option> 
 <option <?=($proveedor == '       105') ? 'selected=""' : '' ?> value="       105">FIMEX</option> 
 <option <?=($proveedor == '       191') ? 'selected=""' : '' ?> value="       191">FOCAM</option> 
 <option <?=($proveedor == '       152') ? 'selected=""' : '' ?> value="       152">FON CEL</option> 
 <option <?=($proveedor == '       193') ? 'selected=""' : '' ?> value="       193">FRANCISCO BLU RAY</option> 
 <option <?=($proveedor == '       119') ? 'selected=""' : '' ?> value="       119">FULAME IMPORTACION</option> 
 <option <?=($proveedor == '        56') ? 'selected=""' : '' ?> value="        56">FUSSION ACUSTIC</option> 
 <option <?=($proveedor == '        90') ? 'selected=""' : '' ?> value="        90">FUSSION DF</option> 
 <option <?=($proveedor == '        37') ? 'selected=""' : '' ?> value="        37">FERNANDO GRIN</option> 
 <option <?=($proveedor == '       136') ? 'selected=""' : '' ?> value="       136">G MOVILE</option> 
 <option <?=($proveedor == '       153') ? 'selected=""' : '' ?> value="       153">G&N CELULARES</option> 
 <option <?=($proveedor == '       157') ? 'selected=""' : '' ?> value="       157">GENESIS PANDA</option> 
 <option <?=($proveedor == '       142') ? 'selected=""' : '' ?> value="       142">GOUMIN ZHEN</option> 
 <option <?=($proveedor == '        63') ? 'selected=""' : '' ?> value="        63">GROUPE ADAKTY S.A DE C.V</option> 
 <option <?=($proveedor == '        12') ? 'selected=""' : '' ?> value="        12">GRUPO CARABENCH SA DE CV</option> 
 <option <?=($proveedor == '        92') ? 'selected=""' : '' ?> value="        92">GRUPO YUDHA</option> 
 <option <?=($proveedor == '        38') ? 'selected=""' : '' ?> value="        38">GABRIEL LAERA</option> 
 <option <?=($proveedor == '        35') ? 'selected=""' : '' ?> value="        35">GRUPO MOVILES</option> 
 <option <?=($proveedor == '       110') ? 'selected=""' : '' ?> value="       110">HENG LIAN</option> 
 <option <?=($proveedor == '       106') ? 'selected=""' : '' ?> value="       106">HIP HOP</option> 
 <option <?=($proveedor == '       100') ? 'selected=""' : '' ?> value="       100">HUB CITY</option> 
 <option <?=($proveedor == '         5') ? 'selected=""' : '' ?> value="         5">I LIKE</option> 
 <option <?=($proveedor == '        87') ? 'selected=""' : '' ?> value="        87">IMPORTACIONES GONZALEZ</option> 
 <option <?=($proveedor == '        71') ? 'selected=""' : '' ?> value="        71">IMPORTACIONES MIMI</option> 
 <option <?=($proveedor == '        73') ? 'selected=""' : '' ?> value="        73">ISAC TEC,LADOS</option> 
 <option <?=($proveedor == '       165') ? 'selected=""' : '' ?> value="       165">IZI PAN</option> 
 <option <?=($proveedor == '       201') ? 'selected=""' : '' ?> value="       201">IZTAK EXTRA BASS</option> 
 <option <?=($proveedor == '        39') ? 'selected=""' : '' ?> value="        39">IMPORTADORA AZ-TEK SA DE CV</option> 
 <option <?=($proveedor == '        47') ? 'selected=""' : '' ?> value="        47">J GUADALUPE ROSALES RIOS</option> 
 <option <?=($proveedor == '        61') ? 'selected=""' : '' ?> value="        61">JC CELULARES Y ACCESORIOS</option> 
 <option <?=($proveedor == '       133') ? 'selected=""' : '' ?> value="       133">JIAN HENG</option> 
 <option <?=($proveedor == '       161') ? 'selected=""' : '' ?> value="       161">JIANG FANGZHEN</option> 
 <option <?=($proveedor == '        19') ? 'selected=""' : '' ?> value="        19">JIYU ELECTRONIC CO,. LIMITED</option> 
 <option <?=($proveedor == '       171') ? 'selected=""' : '' ?> value="       171">JONATHAN AUDIFONOS</option> 
 <option <?=($proveedor == '       177') ? 'selected=""' : '' ?> value="       177">JOSE ANTONIO</option> 
 <option <?=($proveedor == '        18') ? 'selected=""' : '' ?> value="        18">JOSE TRINIDAD MT LIDER</option> 
 <option <?=($proveedor == '        29') ? 'selected=""' : '' ?> value="        29">JUAN CARLOS HONOJOSA GARCIA</option> 
 <option <?=($proveedor == '       120') ? 'selected=""' : '' ?> value="       120">KAI PING</option> 
 <option <?=($proveedor == '       135') ? 'selected=""' : '' ?> value="       135">KAILI</option> 
 <option <?=($proveedor == '       176') ? 'selected=""' : '' ?> value="       176">KARINA TERESA AUDIFONOS</option> 
 <option <?=($proveedor == '       189') ? 'selected=""' : '' ?> value="       189">KIKI´S TOYS</option> 
 <option <?=($proveedor == '        79') ? 'selected=""' : '' ?> value="        79">KINGMEX</option> 
 <option <?=($proveedor == '       170') ? 'selected=""' : '' ?> value="       170">LEONARDO ZAMORANO</option> 
 <option <?=($proveedor == '        58') ? 'selected=""' : '' ?> value="        58">LIFE</option> 
 <option <?=($proveedor == '        33') ? 'selected=""' : '' ?> value="        33">LINK BITS</option> 
 <option <?=($proveedor == '       198') ? 'selected=""' : '' ?> value="       198">LITOY</option> 
 <option <?=($proveedor == '       162') ? 'selected=""' : '' ?> value="       162">LJK</option> 
 <option <?=($proveedor == '       111') ? 'selected=""' : '' ?> value="       111">LOS CHITOS</option> 
 <option <?=($proveedor == '        64') ? 'selected=""' : '' ?> value="        64">LYX LUXURY FUNDAS</option> 
 <option <?=($proveedor == '       145') ? 'selected=""' : '' ?> value="       145">MAIZ</option> 
 <option <?=($proveedor == '        72') ? 'selected=""' : '' ?> value="        72">MARTIN GUSTAVO GRIJALVA MARTINEZ</option> 
 <option <?=($proveedor == '       155') ? 'selected=""' : '' ?> value="       155">MARVO</option> 
 <option <?=($proveedor == '       178') ? 'selected=""' : '' ?> value="       178">MEGAFIRE</option> 
 <option <?=($proveedor == '       149') ? 'selected=""' : '' ?> value="       149">MEMORY ONE</option> 
 <option <?=($proveedor == '       140') ? 'selected=""' : '' ?> value="       140">MEY</option> 
 <option <?=($proveedor == '        83') ? 'selected=""' : '' ?> value="        83">MG MOBILE</option> 
 <option <?=($proveedor == '       156') ? 'selected=""' : '' ?> value="       156">MIND CONTROL</option> 
 <option <?=($proveedor == '        27') ? 'selected=""' : '' ?> value="        27">MT LIDER</option> 
 <option <?=($proveedor == '        88') ? 'selected=""' : '' ?> value="        88">MUNDO DE LA TABLET</option> 
 <option <?=($proveedor == '        69') ? 'selected=""' : '' ?> value="        69">MARISOL CHIPS</option> 
 <option <?=($proveedor == '        95') ? 'selected=""' : '' ?> value="        95">MICAS PEDRO BRAVO</option> 
 <option <?=($proveedor == '        44') ? 'selected=""' : '' ?> value="        44">MOOVE TECH</option> 
 <option <?=($proveedor == '        40') ? 'selected=""' : '' ?> value="        40">MUNDO DE LA TABLET</option> 
 <option <?=($proveedor == '       182') ? 'selected=""' : '' ?> value="       182">NEF REJAS</option> 
 <option <?=($proveedor == '       129') ? 'selected=""' : '' ?> value="       129">OSOCEL</option> 
 <option <?=($proveedor == '       116') ? 'selected=""' : '' ?> value="       116">OTROS D,F</option> 
 <option <?=($proveedor == '       143') ? 'selected=""' : '' ?> value="       143">OTROS GDL</option> 
 <option <?=($proveedor == '       114') ? 'selected=""' : '' ?> value="       114">OTTO DIGITAL</option> 
 <option <?=($proveedor == '        10') ? 'selected=""' : '' ?> value="        10">PC HARDWARE</option> 
 <option <?=($proveedor == '        60') ? 'selected=""' : '' ?> value="        60">PCH MAYOREO SA. DE CV.</option> 
 <option <?=($proveedor == '       134') ? 'selected=""' : '' ?> value="       134">PLAZA TEREZA (MAIZ)</option> 
 <option <?=($proveedor == '       150') ? 'selected=""' : '' ?> value="       150">POPULAR TECNOLOGIA</option> 
 <option <?=($proveedor == '        96') ? 'selected=""' : '' ?> value="        96">PROLICOM</option> 
 <option <?=($proveedor == '         7') ? 'selected=""' : '' ?> value="         7">PROVEEDOR DE ANTENAS WIFI SKY Y DIAMOND</option> 
 <option <?=($proveedor == '        42') ? 'selected=""' : '' ?> value="        42">PTT SOLUCIONES SA DE CV</option> 
 <option <?=($proveedor == '        23') ? 'selected=""' : '' ?> value="        23">PACIFIC. COM S.A. DE C.V.</option> 
 <option <?=($proveedor == '        55') ? 'selected=""' : '' ?> value="        55">PROVEEDOR DF</option> 
 <option <?=($proveedor == '        70') ? 'selected=""' : '' ?> value="        70">QRUZH</option> 
 <option <?=($proveedor == '       200') ? 'selected=""' : '' ?> value="       200">RAYMUNDO CIGARROS ELECTRONICOS</option> 
 <option <?=($proveedor == '       137') ? 'selected=""' : '' ?> value="       137">RAZZY</option> 
 <option <?=($proveedor == '        74') ? 'selected=""' : '' ?> value="        74">REDPACK</option>
 <option <?=($proveedor == '        551') ? 'selected=""' : '' ?> value="        551">RADOX</option>  
 <option <?=($proveedor == '        99') ? 'selected=""' : '' ?> value="        99">RIDER</option> 
 <option <?=($proveedor == '       185') ? 'selected=""' : '' ?> value="       185">ROCIO CARGADORES DF</option> 
 <option <?=($proveedor == '       194') ? 'selected=""' : '' ?> value="       194">SANDRA YU</option> 
 <option <?=($proveedor == '        91') ? 'selected=""' : '' ?> value="        91">SESUCONSA</option> 
 <option <?=($proveedor == '         1') ? 'selected=""' : '' ?> value="         1">SHENZU GROUP COL., LTD</option> 
 <option <?=($proveedor == '       113') ? 'selected=""' : '' ?> value="       113">SHINE COMPUTER</option> 
 <option <?=($proveedor == '        45') ? 'selected=""' : '' ?> value="        45">SHOPONLINE</option> 
 <option <?=($proveedor == '         2') ? 'selected=""' : '' ?> value="         2">SIMERST TRADING LIMITED</option> 
 <option <?=($proveedor == '        65') ? 'selected=""' : '' ?> value="        65">SINGUA TECNOLOGIA S.A. DE C.V.</option> 
 <option <?=($proveedor == '         6') ? 'selected=""' : '' ?> value="         6">SINOSTAR INTERNATIONAL (HK) CO.,LTD</option> 
 <option <?=($proveedor == '       172') ? 'selected=""' : '' ?> value="       172">SPACE MB</option> 
 <option <?=($proveedor == '       202') ? 'selected=""' : '' ?> value="       202">SRA VICTORIA AUDIFONOS ORIGINALES</option> 
 <option <?=($proveedor == '       118') ? 'selected=""' : '' ?> value="       118">SRA. ROCIO D,F</option> 
 <option <?=($proveedor == '        32') ? 'selected=""' : '' ?> value="        32">STOCK CELULAR (VICTOR HUGO)</option> 
 <option <?=($proveedor == '       130') ? 'selected=""' : '' ?> value="       130">SU-LY</option> 
 <option <?=($proveedor == '        15') ? 'selected=""' : '' ?> value="        15">TC MEMORY  SA DE CV</option> 
 <option <?=($proveedor == '        20') ? 'selected=""' : '' ?> value="        20">TC MEMORY, S.A. DE C.V. (FAVOR DE NO USAR, CAPTURAR CON EL NO. 15)</option> 
 <option <?=($proveedor == '        53') ? 'selected=""' : '' ?> value="        53">TECNOLOGIA & MAS</option> 
 <option <?=($proveedor == '       146') ? 'selected=""' : '' ?> value="       146">TECNOLOGIA Y NOVEDADES SOLAR</option> 
 <option <?=($proveedor == '        89') ? 'selected=""' : '' ?> value="        89">TMOVI</option> 
 <option <?=($proveedor == '         3') ? 'selected=""' : '' ?> value="         3">TVCENLINEA.COM S.A DE C.V</option> 
 <option <?=($proveedor == '       204') ? 'selected=""' : '' ?> value="       204">VELIKKA</option> 
 <option <?=($proveedor == '        76') ? 'selected=""' : '' ?> value="        76">VELIKKA</option> 
 <option <?=($proveedor == '       121') ? 'selected=""' : '' ?> value="       121">VMEX</option> 
 <option <?=($proveedor == '       124') ? 'selected=""' : '' ?> value="       124">WEI HANG</option> 
 <option <?=($proveedor == '       148') ? 'selected=""' : '' ?> value="       148">WEICSOM</option> 
 <option <?=($proveedor == '        98') ? 'selected=""' : '' ?> value="        98">WHITESTONE</option> 
 <option <?=($proveedor == '       195') ? 'selected=""' : '' ?> value="       195">WOIKA</option> 
 <option <?=($proveedor == '        62') ? 'selected=""' : '' ?> value="        62">YIFA</option> 
 <option <?=($proveedor == '       187') ? 'selected=""' : '' ?> value="       187">YIN AUDIFONOS SAMSUNG</option> 
 <option <?=($proveedor == '        21') ? 'selected=""' : '' ?> value="        21">Z.H.U. ELECTRONICA</option> 
 <option <?=($proveedor == '       169') ? 'selected=""' : '' ?> value="       169">ZANJONG</option> 
 <option <?=($proveedor == '        81') ? 'selected=""' : '' ?> value="        81">ZENEK</option> 
 <option <?=($proveedor == '       115') ? 'selected=""' : '' ?> value="       115">ZHENG JIARONG</option> 
 <option <?=($proveedor == '       131') ? 'selected=""' : '' ?> value="       131">ZHONG GUANG</option> 
 <option <?=($proveedor == '       109') ? 'selected=""' : '' ?> value="       109">ZOGIS</option> 
 <option <?=($proveedor == '        24') ? 'selected=""' : '' ?> value="        24">ZONA AZUL CELULARES SA DE CV</option> 
 <option <?=($proveedor == '        82') ? 'selected=""' : '' ?> value="        82">CHIPS TELCEL Y UNEFON</option> 
 <option <?=($proveedor == '        34') ? 'selected=""' : '' ?> value="        34">EB</option> 
 <option <?=($proveedor == '       151') ? 'selected=""' : '' ?> value="       151">HARUMI CELL</option> 
 <option <?=($proveedor == '        78') ? 'selected=""' : '' ?> value="        78">SUMEX</option> 
 
 
 
                                <!-- **************************-->
        
                                                            </select>

				</td>
				
			</tr>
			<tr>

				<td>

	                Marca
	                <select class="form-control" name="manufacturers_id" id="manufacturers_id">
	                    <option value=""></option>
	                    <? foreach($fabricantes as $fabricante): ?>
	                        
	                        <? if( $fabricante->id_marca == $manufacturers_id ){?>

	                            <option selected="" value="<?=$fabricante->id_marca?>"><?=mb_strtoupper($fabricante->marca)?></option>

	                        <? }else{?>

	                            <option value="<?=$fabricante->id_marca?>"><?=mb_strtoupper($fabricante->marca)?></option>

	                        <? }?>
	                    <? endforeach?>
	                </select>

				</td>
				
			</tr>
			<tr>
				<td>
					Numero de Cajas
					<div class="form-group">
                            <div class="input-group">
                              <input type="text" class="form-control" id="numero_cajas" name="numero_cajas" value="<?=$numero_cajas?>">
                              <div class="input-group-addon"><i class="glyphicon glyphicon-th-large"></i></div>
                            </div>
                        </div>
				</td>
				<td>
					Productos por Caja
					<div class="form-group">
                            <div class="input-group">
                              <input type="text" class="form-control" id="productos_cajas" name="productos_cajas" value="<?=$productos_cajas?>" required>
                              <div class="input-group-addon"><i class="glyphicon glyphicon-th-large"></i></div>
                            </div>
                        </div>
				</td>
			</tr>

			<tr>
				<td>
					 
				</td>
				<td>
					Precio por producto por caja
					<div class="form-group">
                            <div class="input-group">
                              <input type="text" class="form-control" id="precio_x_producto" name="precio_x_producto" value="<?=$precio_x_producto?>" required>
                              <div class="input-group-addon"><i class="glyphicon glyphicon-th-large"></i></div>
                            </div>
                        </div>
				</td>
			</tr>

			<tr>
				<td>
                        Proveedor 1

                        <select class="form-control" name="proveedor1" id="proveedor1" tabindex="2" >
                                <option value=""></option>
 <option <?=($proveedor1 == '       107') ? 'selected=""' : '' ?> value="       107">8341 (DANY) DF</option> 
 <option <?=($proveedor1 == '       122') ? 'selected=""' : '' ?> value="       122">A AND M</option> 
 <option <?=($proveedor1 == '       197') ? 'selected=""' : '' ?> value="       197">ABRAHAM CHIPS TELCEL</option> 
 <option <?=($proveedor1 == '       126') ? 'selected=""' : '' ?> value="       126">ACCESORIOS GENESIS PANDA</option> 
 <option <?=($proveedor1 == '        51') ? 'selected=""' : '' ?> value="        51">ACCESORIOS Y CONTROLES</option> 
 <option <?=($proveedor1 == '       186') ? 'selected=""' : '' ?> value="       186">ACCIS DIADEMA KITTY</option> 
 <option <?=($proveedor1 == '       159') ? 'selected=""' : '' ?> value="       159">ACCIS TECHNOLOGY</option> 
 <option <?=($proveedor1 == '        93') ? 'selected=""' : '' ?> value="        93">ADG TECHNOLOGIES</option> 
 <option <?=($proveedor1 == '       103') ? 'selected=""' : '' ?> value="       103">AION</option> 
 <option <?=($proveedor1 == '       154') ? 'selected=""' : '' ?> value="       154">AL GAMES</option> 
 <option <?=($proveedor1 == '       180') ? 'selected=""' : '' ?> value="       180">ALCANCIAS CASINO</option> 
 <option <?=($proveedor1 == '       112') ? 'selected=""' : '' ?> value="       112">AMAZING VISION</option> 
 <option <?=($proveedor1 == '        59') ? 'selected=""' : '' ?> value="        59">AMERIK</option> 
 <option <?=($proveedor1 == '       102') ? 'selected=""' : '' ?> value="       102">ANDAFA INNOVATORS S.A DE C.V</option> 
 <option <?=($proveedor1 == '       166') ? 'selected=""' : '' ?> value="       166">ANDY</option> 
 <option <?=($proveedor1 == '        77') ? 'selected=""' : '' ?> value="        77">ANTENAS JONATHAN BARRON</option> 
 <option <?=($proveedor1 == '       196') ? 'selected=""' : '' ?> value="       196">ANTENAS PLANAS DANIEL</option> 
 <option <?=($proveedor1 == '        11') ? 'selected=""' : '' ?> value="        11">ARANAM SA DE CV</option> 
 <option <?=($proveedor1 == '       175') ? 'selected=""' : '' ?> value="       175">ARUMI</option> 
 <option <?=($proveedor1 == '        84') ? 'selected=""' : '' ?> value="        84">ATELEFONITOS</option> 
 <option <?=($proveedor1 == '        94') ? 'selected=""' : '' ?> value="        94">AXVAN</option> 
 <option <?=($proveedor1 == '        16') ? 'selected=""' : '' ?> value="        16">ACTUALIZACIONES PARA COMPUTADORAS SA DE CV</option> 
 <option <?=($proveedor1 == '        14') ? 'selected=""' : '' ?> value="        14">ALBERTO DE JESUS VIRGEN MAGAÑA</option> 
 <option <?=($proveedor1 == '        28') ? 'selected=""' : '' ?> value="        28">AMIGO EDUARDO CHIPS TELCEL</option> 
 <option <?=($proveedor1 == '       173') ? 'selected=""' : '' ?> value="       173">AMOR</option> 
 <option <?=($proveedor1 == '        54') ? 'selected=""' : '' ?> value="        54">ARTURO ELOIR OLIVERA BARRERA</option> 
 <option <?=($proveedor1 == '       141') ? 'selected=""' : '' ?> value="       141">BIG BANG TECHNOLOGY</option> 
 <option <?=($proveedor1 == '        41') ? 'selected=""' : '' ?> value="        41">BRENDA BORES</option> 
 <option <?=($proveedor1 == '        30') ? 'selected=""' : '' ?> value="        30">BARWARE S.A. DE C.V.</option> 
 <option <?=($proveedor1 == '       117') ? 'selected=""' : '' ?> value="       117">CAGI</option> 
 <option <?=($proveedor1 == '        67') ? 'selected=""' : '' ?> value="        67">CANSA</option> 
 <option <?=($proveedor1 == '       101') ? 'selected=""' : '' ?> value="       101">CARGADORES MAPE</option> 
 <option <?=($proveedor1 == '       164') ? 'selected=""' : '' ?> value="       164">CARLOS CUELLAR</option> 
 <option <?=($proveedor1 == '        75') ? 'selected=""' : '' ?> value="        75">CARLOS ERNESTO ARELLANO JIMENEZ</option> 
 <option <?=($proveedor1 == '       132') ? 'selected=""' : '' ?> value="       132">CELMEX</option> 
 <option <?=($proveedor1 == '        66') ? 'selected=""' : '' ?> value="        66">CELULAR GOLDEN</option> 
 <option <?=($proveedor1 == '       125') ? 'selected=""' : '' ?> value="       125">CELULAR PLANET</option> 
 <option <?=($proveedor1 == '       139') ? 'selected=""' : '' ?> value="       139">CENTRAL 87</option> 
 <option <?=($proveedor1 == '       123') ? 'selected=""' : '' ?> value="       123">CENTROCEL TERESA</option> 
 <option <?=($proveedor1 == '       158') ? 'selected=""' : '' ?> value="       158">CHENS DIGITAL</option> 
 <option <?=($proveedor1 == '         8') ? 'selected=""' : '' ?> value="         8">CHEPE</option> 
 <option <?=($proveedor1 == '       183') ? 'selected=""' : '' ?> value="       183">CHINLUE LAMPARAS DE LAVA</option> 
 <option <?=($proveedor1 == '       108') ? 'selected=""' : '' ?> value="       108">CHIPS MOVISTAR</option> 
 <option <?=($proveedor1 == '       144') ? 'selected=""' : '' ?> value="       144">CHIPS TELCEL (PAUL)</option> 
 <option <?=($proveedor1 == '       190') ? 'selected=""' : '' ?> value="       190">CIGARROS ELECTRONICOS</option> 
 <option <?=($proveedor1 == '       128') ? 'selected=""' : '' ?> value="       128">CINTURON CITY</option> 
 <option <?=($proveedor1 == '        85') ? 'selected=""' : '' ?> value="        85">COBY</option> 
 <option <?=($proveedor1 == '        50') ? 'selected=""' : '' ?> value="        50">COMECO TECNOLOGIAS MEXICO S.A. DE C.V</option> 
 <option <?=($proveedor1 == '       199') ? 'selected=""' : '' ?> value="       199">COMPUTADORAS LUIS</option> 
 <option <?=($proveedor1 == '       168') ? 'selected=""' : '' ?> value="       168">CONCEPTO E IMAGEN DIGITAL S.A. DE C.V.</option> 
 <option <?=($proveedor1 == '        17') ? 'selected=""' : '' ?> value="        17">CORPORATIVO MONZALBO SA DE CV</option> 
 <option <?=($proveedor1 == '         9') ? 'selected=""' : '' ?> value="         9">CVA</option> 
 <option <?=($proveedor1 == '        25') ? 'selected=""' : '' ?> value="        25">CABLE MEN ( OSCAR ALEJANDRO GUERRERO CARRANZA )</option> 
 <option <?=($proveedor1 == '        97') ? 'selected=""' : '' ?> value="        97">CARLOS GOMEZ CHIPS</option> 
 <option <?=($proveedor1 == '         4') ? 'selected=""' : '' ?> value="         4">CONEXIÓN Y ENERGIA EN COMPUTACIÓN SA DE CV</option> 
 <option <?=($proveedor1 == '        43') ? 'selected=""' : '' ?> value="        43">CORPORATIVO EBB</option> 
 <option <?=($proveedor1 == '        86') ? 'selected=""' : '' ?> value="        86">DANIEL MEMORIAS</option> 
 <option <?=($proveedor1 == '       203') ? 'selected=""' : '' ?> value="       203">DICON</option> 
 <option <?=($proveedor1 == '       167') ? 'selected=""' : '' ?> value="       167">DISTRIBUIDORA LASSER</option> 
 <option <?=($proveedor1 == '        31') ? 'selected=""' : '' ?> value="        31">DISTRIBUIDORA TECTRON ( IVAN ISRAEL GARCIA GARCIA )</option> 
 <option <?=($proveedor1 == '        57') ? 'selected=""' : '' ?> value="        57">DIVERSION Y TRABAJO S.A DE C.V</option> 
 <option <?=($proveedor1 == '       127') ? 'selected=""' : '' ?> value="       127">DNS</option> 
 <option <?=($proveedor1 == '        80') ? 'selected=""' : '' ?> value="        80">DON BETO</option> 
 <option <?=($proveedor1 == '       138') ? 'selected=""' : '' ?> value="       138">DON DANY</option> 
 <option <?=($proveedor1 == '       184') ? 'selected=""' : '' ?> value="       184">DOSYU</option> 
 <option <?=($proveedor1 == '        68') ? 'selected=""' : '' ?> value="        68">EBENEZER IMPORTADORA S DE RL DE CV</option> 
 <option <?=($proveedor1 == '       104') ? 'selected=""' : '' ?> value="       104">ELE-GATE</option> 
 <option <?=($proveedor1 == '       147') ? 'selected=""' : '' ?> value="       147">ELECTRICA EL 45</option> 
 <option <?=($proveedor1 == '       160') ? 'selected=""' : '' ?> value="       160">ELECTRONICA JAIRO</option> 
 <option <?=($proveedor1 == '       163') ? 'selected=""' : '' ?> value="       163">EMPLEADO HARUMI</option> 
 <option <?=($proveedor1 == '        22') ? 'selected=""' : '' ?> value="        22">ESTAFETA MEXICANA S.A. DE C.V.</option> 
 <option <?=($proveedor1 == '        13') ? 'selected=""' : '' ?> value="        13">ESTAFETA MEXICANA SA DE CV</option> 
 <option <?=($proveedor1 == '        49') ? 'selected=""' : '' ?> value="        49">ESTAFETA SF  (BENJAMIN LEDEZMA)</option> 
 <option <?=($proveedor1 == '       188') ? 'selected=""' : '' ?> value="       188">EVA-Y</option> 
 <option <?=($proveedor1 == '        52') ? 'selected=""' : '' ?> value="        52">EDUARDO CHIPS</option> 
 <option <?=($proveedor1 == '        26') ? 'selected=""' : '' ?> value="        26">EL MUNDO DE LA TABLET</option> 
 <option <?=($proveedor1 == '        36') ? 'selected=""' : '' ?> value="        36">ELUX</option> 
 <option <?=($proveedor1 == '        46') ? 'selected=""' : '' ?> value="        46">ESTAFETA VIP</option> 
 <option <?=($proveedor1 == '        48') ? 'selected=""' : '' ?> value="        48">FEDEX SF</option> 
 <option <?=($proveedor1 == '       192') ? 'selected=""' : '' ?> value="       192">FERNANDO CONTROLES SKY</option> 
 <option <?=($proveedor1 == '       105') ? 'selected=""' : '' ?> value="       105">FIMEX</option> 
 <option <?=($proveedor1 == '       191') ? 'selected=""' : '' ?> value="       191">FOCAM</option> 
 <option <?=($proveedor1 == '       152') ? 'selected=""' : '' ?> value="       152">FON CEL</option> 
 <option <?=($proveedor1 == '       193') ? 'selected=""' : '' ?> value="       193">FRANCISCO BLU RAY</option> 
 <option <?=($proveedor1 == '       119') ? 'selected=""' : '' ?> value="       119">FULAME IMPORTACION</option> 
 <option <?=($proveedor1 == '        56') ? 'selected=""' : '' ?> value="        56">FUSSION ACUSTIC</option> 
 <option <?=($proveedor1 == '        90') ? 'selected=""' : '' ?> value="        90">FUSSION DF</option> 
 <option <?=($proveedor1 == '        37') ? 'selected=""' : '' ?> value="        37">FERNANDO GRIN</option> 
 <option <?=($proveedor1 == '       136') ? 'selected=""' : '' ?> value="       136">G MOVILE</option> 
 <option <?=($proveedor1 == '       153') ? 'selected=""' : '' ?> value="       153">G&N CELULARES</option> 
 <option <?=($proveedor1 == '       157') ? 'selected=""' : '' ?> value="       157">GENESIS PANDA</option> 
 <option <?=($proveedor1 == '       142') ? 'selected=""' : '' ?> value="       142">GOUMIN ZHEN</option> 
 <option <?=($proveedor1 == '        63') ? 'selected=""' : '' ?> value="        63">GROUPE ADAKTY S.A DE C.V</option> 
 <option <?=($proveedor1 == '        12') ? 'selected=""' : '' ?> value="        12">GRUPO CARABENCH SA DE CV</option> 
 <option <?=($proveedor1 == '        92') ? 'selected=""' : '' ?> value="        92">GRUPO YUDHA</option> 
 <option <?=($proveedor1 == '        38') ? 'selected=""' : '' ?> value="        38">GABRIEL LAERA</option> 
 <option <?=($proveedor1 == '        35') ? 'selected=""' : '' ?> value="        35">GRUPO MOVILES</option> 
 <option <?=($proveedor1 == '       110') ? 'selected=""' : '' ?> value="       110">HENG LIAN</option> 
 <option <?=($proveedor1 == '       106') ? 'selected=""' : '' ?> value="       106">HIP HOP</option> 
 <option <?=($proveedor1 == '       100') ? 'selected=""' : '' ?> value="       100">HUB CITY</option> 
 <option <?=($proveedor1 == '         5') ? 'selected=""' : '' ?> value="         5">I LIKE</option> 
 <option <?=($proveedor1 == '        87') ? 'selected=""' : '' ?> value="        87">IMPORTACIONES GONZALEZ</option> 
 <option <?=($proveedor1 == '        71') ? 'selected=""' : '' ?> value="        71">IMPORTACIONES MIMI</option> 
 <option <?=($proveedor1 == '        73') ? 'selected=""' : '' ?> value="        73">ISAC TEC,LADOS</option> 
 <option <?=($proveedor1 == '       165') ? 'selected=""' : '' ?> value="       165">IZI PAN</option> 
 <option <?=($proveedor1 == '       201') ? 'selected=""' : '' ?> value="       201">IZTAK EXTRA BASS</option> 
 <option <?=($proveedor1 == '        39') ? 'selected=""' : '' ?> value="        39">IMPORTADORA AZ-TEK SA DE CV</option> 
 <option <?=($proveedor1 == '        47') ? 'selected=""' : '' ?> value="        47">J GUADALUPE ROSALES RIOS</option> 
 <option <?=($proveedor1 == '        61') ? 'selected=""' : '' ?> value="        61">JC CELULARES Y ACCESORIOS</option> 
 <option <?=($proveedor1 == '       133') ? 'selected=""' : '' ?> value="       133">JIAN HENG</option> 
 <option <?=($proveedor1 == '       161') ? 'selected=""' : '' ?> value="       161">JIANG FANGZHEN</option> 
 <option <?=($proveedor1 == '        19') ? 'selected=""' : '' ?> value="        19">JIYU ELECTRONIC CO,. LIMITED</option> 
 <option <?=($proveedor1 == '       171') ? 'selected=""' : '' ?> value="       171">JONATHAN AUDIFONOS</option> 
 <option <?=($proveedor1 == '       177') ? 'selected=""' : '' ?> value="       177">JOSE ANTONIO</option> 
 <option <?=($proveedor1 == '        18') ? 'selected=""' : '' ?> value="        18">JOSE TRINIDAD MT LIDER</option> 
 <option <?=($proveedor1 == '        29') ? 'selected=""' : '' ?> value="        29">JUAN CARLOS HONOJOSA GARCIA</option> 
 <option <?=($proveedor1 == '       120') ? 'selected=""' : '' ?> value="       120">KAI PING</option> 
 <option <?=($proveedor1 == '       135') ? 'selected=""' : '' ?> value="       135">KAILI</option> 
 <option <?=($proveedor1 == '       176') ? 'selected=""' : '' ?> value="       176">KARINA TERESA AUDIFONOS</option> 
 <option <?=($proveedor1 == '       189') ? 'selected=""' : '' ?> value="       189">KIKI´S TOYS</option> 
 <option <?=($proveedor1 == '        79') ? 'selected=""' : '' ?> value="        79">KINGMEX</option> 
 <option <?=($proveedor1 == '       170') ? 'selected=""' : '' ?> value="       170">LEONARDO ZAMORANO</option> 
 <option <?=($proveedor1 == '        58') ? 'selected=""' : '' ?> value="        58">LIFE</option> 
 <option <?=($proveedor1 == '        33') ? 'selected=""' : '' ?> value="        33">LINK BITS</option> 
 <option <?=($proveedor1 == '       198') ? 'selected=""' : '' ?> value="       198">LITOY</option> 
 <option <?=($proveedor1 == '       162') ? 'selected=""' : '' ?> value="       162">LJK</option> 
 <option <?=($proveedor1 == '       111') ? 'selected=""' : '' ?> value="       111">LOS CHITOS</option> 
 <option <?=($proveedor1 == '        64') ? 'selected=""' : '' ?> value="        64">LYX LUXURY FUNDAS</option> 
 <option <?=($proveedor1 == '       145') ? 'selected=""' : '' ?> value="       145">MAIZ</option> 
 <option <?=($proveedor1 == '        72') ? 'selected=""' : '' ?> value="        72">MARTIN GUSTAVO GRIJALVA MARTINEZ</option> 
 <option <?=($proveedor1 == '       155') ? 'selected=""' : '' ?> value="       155">MARVO</option> 
 <option <?=($proveedor1 == '       178') ? 'selected=""' : '' ?> value="       178">MEGAFIRE</option> 
 <option <?=($proveedor1 == '       149') ? 'selected=""' : '' ?> value="       149">MEMORY ONE</option> 
 <option <?=($proveedor1 == '       140') ? 'selected=""' : '' ?> value="       140">MEY</option> 
 <option <?=($proveedor1 == '        83') ? 'selected=""' : '' ?> value="        83">MG MOBILE</option> 
 <option <?=($proveedor1 == '       156') ? 'selected=""' : '' ?> value="       156">MIND CONTROL</option> 
 <option <?=($proveedor1 == '        27') ? 'selected=""' : '' ?> value="        27">MT LIDER</option> 
 <option <?=($proveedor1 == '        88') ? 'selected=""' : '' ?> value="        88">MUNDO DE LA TABLET</option> 
 <option <?=($proveedor1 == '        69') ? 'selected=""' : '' ?> value="        69">MARISOL CHIPS</option> 
 <option <?=($proveedor1 == '        95') ? 'selected=""' : '' ?> value="        95">MICAS PEDRO BRAVO</option> 
 <option <?=($proveedor1 == '        44') ? 'selected=""' : '' ?> value="        44">MOOVE TECH</option> 
 <option <?=($proveedor1 == '        40') ? 'selected=""' : '' ?> value="        40">MUNDO DE LA TABLET</option> 
 <option <?=($proveedor1 == '       182') ? 'selected=""' : '' ?> value="       182">NEF REJAS</option> 
 <option <?=($proveedor1 == '       129') ? 'selected=""' : '' ?> value="       129">OSOCEL</option> 
 <option <?=($proveedor1 == '       116') ? 'selected=""' : '' ?> value="       116">OTROS D,F</option> 
 <option <?=($proveedor1 == '       143') ? 'selected=""' : '' ?> value="       143">OTROS GDL</option> 
 <option <?=($proveedor1 == '       114') ? 'selected=""' : '' ?> value="       114">OTTO DIGITAL</option> 
 <option <?=($proveedor1 == '        10') ? 'selected=""' : '' ?> value="        10">PC HARDWARE</option> 
 <option <?=($proveedor1 == '        60') ? 'selected=""' : '' ?> value="        60">PCH MAYOREO SA. DE CV.</option> 
 <option <?=($proveedor1 == '       134') ? 'selected=""' : '' ?> value="       134">PLAZA TEREZA (MAIZ)</option> 
 <option <?=($proveedor1 == '       150') ? 'selected=""' : '' ?> value="       150">POPULAR TECNOLOGIA</option> 
 <option <?=($proveedor1 == '        96') ? 'selected=""' : '' ?> value="        96">PROLICOM</option> 
 <option <?=($proveedor1 == '         7') ? 'selected=""' : '' ?> value="         7">PROVEEDOR DE ANTENAS WIFI SKY Y DIAMOND</option> 
 <option <?=($proveedor1 == '        42') ? 'selected=""' : '' ?> value="        42">PTT SOLUCIONES SA DE CV</option> 
 <option <?=($proveedor1 == '        23') ? 'selected=""' : '' ?> value="        23">PACIFIC. COM S.A. DE C.V.</option> 
 <option <?=($proveedor1 == '        55') ? 'selected=""' : '' ?> value="        55">PROVEEDOR DF</option> 
 <option <?=($proveedor1 == '        70') ? 'selected=""' : '' ?> value="        70">QRUZH</option> 
 <option <?=($proveedor1 == '       200') ? 'selected=""' : '' ?> value="       200">RAYMUNDO CIGARROS ELECTRONICOS</option> 
 <option <?=($proveedor1 == '       137') ? 'selected=""' : '' ?> value="       137">RAZZY</option> 
 <option <?=($proveedor1 == '        74') ? 'selected=""' : '' ?> value="        74">REDPACK</option> 
 <option <?=($proveedor1 == '        551') ? 'selected=""' : '' ?> value="        551">RADOX</option> 
 
 <option <?=($proveedor1 == '        99') ? 'selected=""' : '' ?> value="        99">RIDER</option> 
 <option <?=($proveedor1 == '       185') ? 'selected=""' : '' ?> value="       185">ROCIO CARGADORES DF</option> 
 <option <?=($proveedor1 == '       194') ? 'selected=""' : '' ?> value="       194">SANDRA YU</option> 
 <option <?=($proveedor1 == '        91') ? 'selected=""' : '' ?> value="        91">SESUCONSA</option> 
 <option <?=($proveedor1 == '         1') ? 'selected=""' : '' ?> value="         1">SHENZU GROUP COL., LTD</option> 
 <option <?=($proveedor1 == '       113') ? 'selected=""' : '' ?> value="       113">SHINE COMPUTER</option> 
 <option <?=($proveedor1 == '        45') ? 'selected=""' : '' ?> value="        45">SHOPONLINE</option> 
 <option <?=($proveedor1 == '         2') ? 'selected=""' : '' ?> value="         2">SIMERST TRADING LIMITED</option> 
 <option <?=($proveedor1 == '        65') ? 'selected=""' : '' ?> value="        65">SINGUA TECNOLOGIA S.A. DE C.V.</option> 
 <option <?=($proveedor1 == '         6') ? 'selected=""' : '' ?> value="         6">SINOSTAR INTERNATIONAL (HK) CO.,LTD</option> 
 <option <?=($proveedor1 == '       172') ? 'selected=""' : '' ?> value="       172">SPACE MB</option> 
 <option <?=($proveedor1 == '       202') ? 'selected=""' : '' ?> value="       202">SRA VICTORIA AUDIFONOS ORIGINALES</option> 
 <option <?=($proveedor1 == '       118') ? 'selected=""' : '' ?> value="       118">SRA. ROCIO D,F</option> 
 <option <?=($proveedor1 == '        32') ? 'selected=""' : '' ?> value="        32">STOCK CELULAR (VICTOR HUGO)</option> 
 <option <?=($proveedor1 == '       130') ? 'selected=""' : '' ?> value="       130">SU-LY</option> 
 <option <?=($proveedor1 == '        15') ? 'selected=""' : '' ?> value="        15">TC MEMORY  SA DE CV</option> 
 <option <?=($proveedor1 == '        20') ? 'selected=""' : '' ?> value="        20">TC MEMORY, S.A. DE C.V. (FAVOR DE NO USAR, CAPTURAR CON EL NO. 15)</option> 
 <option <?=($proveedor1 == '        53') ? 'selected=""' : '' ?> value="        53">TECNOLOGIA & MAS</option> 
 <option <?=($proveedor1 == '       146') ? 'selected=""' : '' ?> value="       146">TECNOLOGIA Y NOVEDADES SOLAR</option> 
 <option <?=($proveedor1 == '        89') ? 'selected=""' : '' ?> value="        89">TMOVI</option> 
 <option <?=($proveedor1 == '         3') ? 'selected=""' : '' ?> value="         3">TVCENLINEA.COM S.A DE C.V</option> 
 <option <?=($proveedor1 == '       204') ? 'selected=""' : '' ?> value="       204">VELIKKA</option> 
 <option <?=($proveedor1 == '        76') ? 'selected=""' : '' ?> value="        76">VELIKKA</option> 
 <option <?=($proveedor1 == '       121') ? 'selected=""' : '' ?> value="       121">VMEX</option> 
 <option <?=($proveedor1 == '       124') ? 'selected=""' : '' ?> value="       124">WEI HANG</option> 
 <option <?=($proveedor1 == '       148') ? 'selected=""' : '' ?> value="       148">WEICSOM</option> 
 <option <?=($proveedor1 == '        98') ? 'selected=""' : '' ?> value="        98">WHITESTONE</option> 
 <option <?=($proveedor1 == '       195') ? 'selected=""' : '' ?> value="       195">WOIKA</option> 
 <option <?=($proveedor1 == '        62') ? 'selected=""' : '' ?> value="        62">YIFA</option> 
 <option <?=($proveedor1 == '       187') ? 'selected=""' : '' ?> value="       187">YIN AUDIFONOS SAMSUNG</option> 
 <option <?=($proveedor1 == '        21') ? 'selected=""' : '' ?> value="        21">Z.H.U. ELECTRONICA</option> 
 <option <?=($proveedor1 == '       169') ? 'selected=""' : '' ?> value="       169">ZANJONG</option> 
 <option <?=($proveedor1 == '        81') ? 'selected=""' : '' ?> value="        81">ZENEK</option> 
 <option <?=($proveedor1 == '       115') ? 'selected=""' : '' ?> value="       115">ZHENG JIARONG</option> 
 <option <?=($proveedor1 == '       131') ? 'selected=""' : '' ?> value="       131">ZHONG GUANG</option> 
 <option <?=($proveedor1 == '       109') ? 'selected=""' : '' ?> value="       109">ZOGIS</option> 
 <option <?=($proveedor1 == '        24') ? 'selected=""' : '' ?> value="        24">ZONA AZUL CELULARES SA DE CV</option> 
 <option <?=($proveedor1 == '        82') ? 'selected=""' : '' ?> value="        82">CHIPS TELCEL Y UNEFON</option> 
 <option <?=($proveedor1 == '        34') ? 'selected=""' : '' ?> value="        34">EB</option> 
 <option <?=($proveedor1 == '       151') ? 'selected=""' : '' ?> value="       151">HARUMI CELL</option> 
 <option <?=($proveedor1 == '        78') ? 'selected=""' : '' ?> value="        78">SUMEX</option> 
 
 
 
                                <!-- **************************-->
        
                                                            </select>

				</td>
				<td>
					Costo<input class="form-control" type="text" name="costo_nacional1" value="<?=(isset($costo_nacional1)) ? $costo_nacional1 : '' ?>" />
				</td>
			</tr>

			<tr>
				<td>
                        Proveedor 2

                        <select class="form-control" name="proveedor2" id="proveedor2" tabindex="2">
                                <option value=""></option>
 <option <?=($proveedor2 == '       107') ? 'selected=""' : '' ?> value="       107">8341 (DANY) DF</option> 
 <option <?=($proveedor2 == '       122') ? 'selected=""' : '' ?> value="       122">A AND M</option> 
 <option <?=($proveedor2 == '       197') ? 'selected=""' : '' ?> value="       197">ABRAHAM CHIPS TELCEL</option> 
 <option <?=($proveedor2 == '       126') ? 'selected=""' : '' ?> value="       126">ACCESORIOS GENESIS PANDA</option> 
 <option <?=($proveedor2 == '        51') ? 'selected=""' : '' ?> value="        51">ACCESORIOS Y CONTROLES</option> 
 <option <?=($proveedor2 == '       186') ? 'selected=""' : '' ?> value="       186">ACCIS DIADEMA KITTY</option> 
 <option <?=($proveedor2 == '       159') ? 'selected=""' : '' ?> value="       159">ACCIS TECHNOLOGY</option> 
 <option <?=($proveedor2 == '        93') ? 'selected=""' : '' ?> value="        93">ADG TECHNOLOGIES</option> 
 <option <?=($proveedor2 == '       103') ? 'selected=""' : '' ?> value="       103">AION</option> 
 <option <?=($proveedor2 == '       154') ? 'selected=""' : '' ?> value="       154">AL GAMES</option> 
 <option <?=($proveedor2 == '       180') ? 'selected=""' : '' ?> value="       180">ALCANCIAS CASINO</option> 
 <option <?=($proveedor2 == '       112') ? 'selected=""' : '' ?> value="       112">AMAZING VISION</option> 
 <option <?=($proveedor2 == '        59') ? 'selected=""' : '' ?> value="        59">AMERIK</option> 
 <option <?=($proveedor2 == '       102') ? 'selected=""' : '' ?> value="       102">ANDAFA INNOVATORS S.A DE C.V</option> 
 <option <?=($proveedor2 == '       166') ? 'selected=""' : '' ?> value="       166">ANDY</option> 
 <option <?=($proveedor2 == '        77') ? 'selected=""' : '' ?> value="        77">ANTENAS JONATHAN BARRON</option> 
 <option <?=($proveedor2 == '       196') ? 'selected=""' : '' ?> value="       196">ANTENAS PLANAS DANIEL</option> 
 <option <?=($proveedor2 == '        11') ? 'selected=""' : '' ?> value="        11">ARANAM SA DE CV</option> 
 <option <?=($proveedor2 == '       175') ? 'selected=""' : '' ?> value="       175">ARUMI</option> 
 <option <?=($proveedor2 == '        84') ? 'selected=""' : '' ?> value="        84">ATELEFONITOS</option> 
 <option <?=($proveedor2 == '        94') ? 'selected=""' : '' ?> value="        94">AXVAN</option> 
 <option <?=($proveedor2 == '        16') ? 'selected=""' : '' ?> value="        16">ACTUALIZACIONES PARA COMPUTADORAS SA DE CV</option> 
 <option <?=($proveedor2 == '        14') ? 'selected=""' : '' ?> value="        14">ALBERTO DE JESUS VIRGEN MAGAÑA</option> 
 <option <?=($proveedor2 == '        28') ? 'selected=""' : '' ?> value="        28">AMIGO EDUARDO CHIPS TELCEL</option> 
 <option <?=($proveedor2 == '       173') ? 'selected=""' : '' ?> value="       173">AMOR</option> 
 <option <?=($proveedor2 == '        54') ? 'selected=""' : '' ?> value="        54">ARTURO ELOIR OLIVERA BARRERA</option> 
 <option <?=($proveedor2 == '       141') ? 'selected=""' : '' ?> value="       141">BIG BANG TECHNOLOGY</option> 
 <option <?=($proveedor2 == '        41') ? 'selected=""' : '' ?> value="        41">BRENDA BORES</option> 
 <option <?=($proveedor2 == '        30') ? 'selected=""' : '' ?> value="        30">BARWARE S.A. DE C.V.</option> 
 <option <?=($proveedor2 == '       117') ? 'selected=""' : '' ?> value="       117">CAGI</option> 
 <option <?=($proveedor2 == '        67') ? 'selected=""' : '' ?> value="        67">CANSA</option> 
 <option <?=($proveedor2 == '       101') ? 'selected=""' : '' ?> value="       101">CARGADORES MAPE</option> 
 <option <?=($proveedor2 == '       164') ? 'selected=""' : '' ?> value="       164">CARLOS CUELLAR</option> 
 <option <?=($proveedor2 == '        75') ? 'selected=""' : '' ?> value="        75">CARLOS ERNESTO ARELLANO JIMENEZ</option> 
 <option <?=($proveedor2 == '       132') ? 'selected=""' : '' ?> value="       132">CELMEX</option> 
 <option <?=($proveedor2 == '        66') ? 'selected=""' : '' ?> value="        66">CELULAR GOLDEN</option> 
 <option <?=($proveedor2 == '       125') ? 'selected=""' : '' ?> value="       125">CELULAR PLANET</option> 
 <option <?=($proveedor2 == '       139') ? 'selected=""' : '' ?> value="       139">CENTRAL 87</option> 
 <option <?=($proveedor2 == '       123') ? 'selected=""' : '' ?> value="       123">CENTROCEL TERESA</option> 
 <option <?=($proveedor2 == '       158') ? 'selected=""' : '' ?> value="       158">CHENS DIGITAL</option> 
 <option <?=($proveedor2 == '         8') ? 'selected=""' : '' ?> value="         8">CHEPE</option> 
 <option <?=($proveedor2 == '       183') ? 'selected=""' : '' ?> value="       183">CHINLUE LAMPARAS DE LAVA</option> 
 <option <?=($proveedor2 == '       108') ? 'selected=""' : '' ?> value="       108">CHIPS MOVISTAR</option> 
 <option <?=($proveedor2 == '       144') ? 'selected=""' : '' ?> value="       144">CHIPS TELCEL (PAUL)</option> 
 <option <?=($proveedor2 == '       190') ? 'selected=""' : '' ?> value="       190">CIGARROS ELECTRONICOS</option> 
 <option <?=($proveedor2 == '       128') ? 'selected=""' : '' ?> value="       128">CINTURON CITY</option> 
 <option <?=($proveedor2 == '        85') ? 'selected=""' : '' ?> value="        85">COBY</option> 
 <option <?=($proveedor2 == '        50') ? 'selected=""' : '' ?> value="        50">COMECO TECNOLOGIAS MEXICO S.A. DE C.V</option> 
 <option <?=($proveedor2 == '       199') ? 'selected=""' : '' ?> value="       199">COMPUTADORAS LUIS</option> 
 <option <?=($proveedor2 == '       168') ? 'selected=""' : '' ?> value="       168">CONCEPTO E IMAGEN DIGITAL S.A. DE C.V.</option> 
 <option <?=($proveedor2 == '        17') ? 'selected=""' : '' ?> value="        17">CORPORATIVO MONZALBO SA DE CV</option> 
 <option <?=($proveedor2 == '         9') ? 'selected=""' : '' ?> value="         9">CVA</option> 
 <option <?=($proveedor2 == '        25') ? 'selected=""' : '' ?> value="        25">CABLE MEN ( OSCAR ALEJANDRO GUERRERO CARRANZA )</option> 
 <option <?=($proveedor2 == '        97') ? 'selected=""' : '' ?> value="        97">CARLOS GOMEZ CHIPS</option> 
 <option <?=($proveedor2 == '         4') ? 'selected=""' : '' ?> value="         4">CONEXIÓN Y ENERGIA EN COMPUTACIÓN SA DE CV</option> 
 <option <?=($proveedor2 == '        43') ? 'selected=""' : '' ?> value="        43">CORPORATIVO EBB</option> 
 <option <?=($proveedor2 == '        86') ? 'selected=""' : '' ?> value="        86">DANIEL MEMORIAS</option> 
 <option <?=($proveedor2 == '       203') ? 'selected=""' : '' ?> value="       203">DICON</option> 
 <option <?=($proveedor2 == '       167') ? 'selected=""' : '' ?> value="       167">DISTRIBUIDORA LASSER</option> 
 <option <?=($proveedor2 == '        31') ? 'selected=""' : '' ?> value="        31">DISTRIBUIDORA TECTRON ( IVAN ISRAEL GARCIA GARCIA )</option> 
 <option <?=($proveedor2 == '        57') ? 'selected=""' : '' ?> value="        57">DIVERSION Y TRABAJO S.A DE C.V</option> 
 <option <?=($proveedor2 == '       127') ? 'selected=""' : '' ?> value="       127">DNS</option> 
 <option <?=($proveedor2 == '        80') ? 'selected=""' : '' ?> value="        80">DON BETO</option> 
 <option <?=($proveedor2 == '       138') ? 'selected=""' : '' ?> value="       138">DON DANY</option> 
 <option <?=($proveedor2 == '       184') ? 'selected=""' : '' ?> value="       184">DOSYU</option> 
 <option <?=($proveedor2 == '        68') ? 'selected=""' : '' ?> value="        68">EBENEZER IMPORTADORA S DE RL DE CV</option> 
 <option <?=($proveedor2 == '       104') ? 'selected=""' : '' ?> value="       104">ELE-GATE</option> 
 <option <?=($proveedor2 == '       147') ? 'selected=""' : '' ?> value="       147">ELECTRICA EL 45</option> 
 <option <?=($proveedor2 == '       160') ? 'selected=""' : '' ?> value="       160">ELECTRONICA JAIRO</option> 
 <option <?=($proveedor2 == '       163') ? 'selected=""' : '' ?> value="       163">EMPLEADO HARUMI</option> 
 <option <?=($proveedor2 == '        22') ? 'selected=""' : '' ?> value="        22">ESTAFETA MEXICANA S.A. DE C.V.</option> 
 <option <?=($proveedor2 == '        13') ? 'selected=""' : '' ?> value="        13">ESTAFETA MEXICANA SA DE CV</option> 
 <option <?=($proveedor2 == '        49') ? 'selected=""' : '' ?> value="        49">ESTAFETA SF  (BENJAMIN LEDEZMA)</option> 
 <option <?=($proveedor2 == '       188') ? 'selected=""' : '' ?> value="       188">EVA-Y</option> 
 <option <?=($proveedor2 == '        52') ? 'selected=""' : '' ?> value="        52">EDUARDO CHIPS</option> 
 <option <?=($proveedor2 == '        26') ? 'selected=""' : '' ?> value="        26">EL MUNDO DE LA TABLET</option> 
 <option <?=($proveedor2 == '        36') ? 'selected=""' : '' ?> value="        36">ELUX</option> 
 <option <?=($proveedor2 == '        46') ? 'selected=""' : '' ?> value="        46">ESTAFETA VIP</option> 
 <option <?=($proveedor2 == '        48') ? 'selected=""' : '' ?> value="        48">FEDEX SF</option> 
 <option <?=($proveedor2 == '       192') ? 'selected=""' : '' ?> value="       192">FERNANDO CONTROLES SKY</option> 
 <option <?=($proveedor2 == '       105') ? 'selected=""' : '' ?> value="       105">FIMEX</option> 
 <option <?=($proveedor2 == '       191') ? 'selected=""' : '' ?> value="       191">FOCAM</option> 
 <option <?=($proveedor2 == '       152') ? 'selected=""' : '' ?> value="       152">FON CEL</option> 
 <option <?=($proveedor2 == '       193') ? 'selected=""' : '' ?> value="       193">FRANCISCO BLU RAY</option> 
 <option <?=($proveedor2 == '       119') ? 'selected=""' : '' ?> value="       119">FULAME IMPORTACION</option> 
 <option <?=($proveedor2 == '        56') ? 'selected=""' : '' ?> value="        56">FUSSION ACUSTIC</option> 
 <option <?=($proveedor2 == '        90') ? 'selected=""' : '' ?> value="        90">FUSSION DF</option> 
 <option <?=($proveedor2 == '        37') ? 'selected=""' : '' ?> value="        37">FERNANDO GRIN</option> 
 <option <?=($proveedor2 == '       136') ? 'selected=""' : '' ?> value="       136">G MOVILE</option> 
 <option <?=($proveedor2 == '       153') ? 'selected=""' : '' ?> value="       153">G&N CELULARES</option> 
 <option <?=($proveedor2 == '       157') ? 'selected=""' : '' ?> value="       157">GENESIS PANDA</option> 
 <option <?=($proveedor2 == '       142') ? 'selected=""' : '' ?> value="       142">GOUMIN ZHEN</option> 
 <option <?=($proveedor2 == '        63') ? 'selected=""' : '' ?> value="        63">GROUPE ADAKTY S.A DE C.V</option> 
 <option <?=($proveedor2 == '        12') ? 'selected=""' : '' ?> value="        12">GRUPO CARABENCH SA DE CV</option> 
 <option <?=($proveedor2 == '        92') ? 'selected=""' : '' ?> value="        92">GRUPO YUDHA</option> 
 <option <?=($proveedor2 == '        38') ? 'selected=""' : '' ?> value="        38">GABRIEL LAERA</option> 
 <option <?=($proveedor2 == '        35') ? 'selected=""' : '' ?> value="        35">GRUPO MOVILES</option> 
 <option <?=($proveedor2 == '       110') ? 'selected=""' : '' ?> value="       110">HENG LIAN</option> 
 <option <?=($proveedor2 == '       106') ? 'selected=""' : '' ?> value="       106">HIP HOP</option> 
 <option <?=($proveedor2 == '       100') ? 'selected=""' : '' ?> value="       100">HUB CITY</option> 
 <option <?=($proveedor2 == '         5') ? 'selected=""' : '' ?> value="         5">I LIKE</option> 
 <option <?=($proveedor2 == '        87') ? 'selected=""' : '' ?> value="        87">IMPORTACIONES GONZALEZ</option> 
 <option <?=($proveedor2 == '        71') ? 'selected=""' : '' ?> value="        71">IMPORTACIONES MIMI</option> 
 <option <?=($proveedor2 == '        73') ? 'selected=""' : '' ?> value="        73">ISAC TEC,LADOS</option> 
 <option <?=($proveedor2 == '       165') ? 'selected=""' : '' ?> value="       165">IZI PAN</option> 
 <option <?=($proveedor2 == '       201') ? 'selected=""' : '' ?> value="       201">IZTAK EXTRA BASS</option> 
 <option <?=($proveedor2 == '        39') ? 'selected=""' : '' ?> value="        39">IMPORTADORA AZ-TEK SA DE CV</option> 
 <option <?=($proveedor2 == '        47') ? 'selected=""' : '' ?> value="        47">J GUADALUPE ROSALES RIOS</option> 
 <option <?=($proveedor2 == '        61') ? 'selected=""' : '' ?> value="        61">JC CELULARES Y ACCESORIOS</option> 
 <option <?=($proveedor2 == '       133') ? 'selected=""' : '' ?> value="       133">JIAN HENG</option> 
 <option <?=($proveedor2 == '       161') ? 'selected=""' : '' ?> value="       161">JIANG FANGZHEN</option> 
 <option <?=($proveedor2 == '        19') ? 'selected=""' : '' ?> value="        19">JIYU ELECTRONIC CO,. LIMITED</option> 
 <option <?=($proveedor2 == '       171') ? 'selected=""' : '' ?> value="       171">JONATHAN AUDIFONOS</option> 
 <option <?=($proveedor2 == '       177') ? 'selected=""' : '' ?> value="       177">JOSE ANTONIO</option> 
 <option <?=($proveedor2 == '        18') ? 'selected=""' : '' ?> value="        18">JOSE TRINIDAD MT LIDER</option> 
 <option <?=($proveedor2 == '        29') ? 'selected=""' : '' ?> value="        29">JUAN CARLOS HONOJOSA GARCIA</option> 
 <option <?=($proveedor2 == '       120') ? 'selected=""' : '' ?> value="       120">KAI PING</option> 
 <option <?=($proveedor2 == '       135') ? 'selected=""' : '' ?> value="       135">KAILI</option> 
 <option <?=($proveedor2 == '       176') ? 'selected=""' : '' ?> value="       176">KARINA TERESA AUDIFONOS</option> 
 <option <?=($proveedor2 == '       189') ? 'selected=""' : '' ?> value="       189">KIKI´S TOYS</option> 
 <option <?=($proveedor2 == '        79') ? 'selected=""' : '' ?> value="        79">KINGMEX</option> 
 <option <?=($proveedor2 == '       170') ? 'selected=""' : '' ?> value="       170">LEONARDO ZAMORANO</option> 
 <option <?=($proveedor2 == '        58') ? 'selected=""' : '' ?> value="        58">LIFE</option> 
 <option <?=($proveedor2 == '        33') ? 'selected=""' : '' ?> value="        33">LINK BITS</option> 
 <option <?=($proveedor2 == '       198') ? 'selected=""' : '' ?> value="       198">LITOY</option> 
 <option <?=($proveedor2 == '       162') ? 'selected=""' : '' ?> value="       162">LJK</option> 
 <option <?=($proveedor2 == '       111') ? 'selected=""' : '' ?> value="       111">LOS CHITOS</option> 
 <option <?=($proveedor2 == '        64') ? 'selected=""' : '' ?> value="        64">LYX LUXURY FUNDAS</option> 
 <option <?=($proveedor2 == '       145') ? 'selected=""' : '' ?> value="       145">MAIZ</option> 
 <option <?=($proveedor2 == '        72') ? 'selected=""' : '' ?> value="        72">MARTIN GUSTAVO GRIJALVA MARTINEZ</option> 
 <option <?=($proveedor2 == '       155') ? 'selected=""' : '' ?> value="       155">MARVO</option> 
 <option <?=($proveedor2 == '       178') ? 'selected=""' : '' ?> value="       178">MEGAFIRE</option> 
 <option <?=($proveedor2 == '       149') ? 'selected=""' : '' ?> value="       149">MEMORY ONE</option> 
 <option <?=($proveedor2 == '       140') ? 'selected=""' : '' ?> value="       140">MEY</option> 
 <option <?=($proveedor2 == '        83') ? 'selected=""' : '' ?> value="        83">MG MOBILE</option> 
 <option <?=($proveedor2 == '       156') ? 'selected=""' : '' ?> value="       156">MIND CONTROL</option> 
 <option <?=($proveedor2 == '        27') ? 'selected=""' : '' ?> value="        27">MT LIDER</option> 
 <option <?=($proveedor2 == '        88') ? 'selected=""' : '' ?> value="        88">MUNDO DE LA TABLET</option> 
 <option <?=($proveedor2 == '        69') ? 'selected=""' : '' ?> value="        69">MARISOL CHIPS</option> 
 <option <?=($proveedor2 == '        95') ? 'selected=""' : '' ?> value="        95">MICAS PEDRO BRAVO</option> 
 <option <?=($proveedor2 == '        44') ? 'selected=""' : '' ?> value="        44">MOOVE TECH</option> 
 <option <?=($proveedor2 == '        40') ? 'selected=""' : '' ?> value="        40">MUNDO DE LA TABLET</option> 
 <option <?=($proveedor2 == '       182') ? 'selected=""' : '' ?> value="       182">NEF REJAS</option> 
 <option <?=($proveedor2 == '       129') ? 'selected=""' : '' ?> value="       129">OSOCEL</option> 
 <option <?=($proveedor2 == '       116') ? 'selected=""' : '' ?> value="       116">OTROS D,F</option> 
 <option <?=($proveedor2 == '       143') ? 'selected=""' : '' ?> value="       143">OTROS GDL</option> 
 <option <?=($proveedor2 == '       114') ? 'selected=""' : '' ?> value="       114">OTTO DIGITAL</option> 
 <option <?=($proveedor2 == '        10') ? 'selected=""' : '' ?> value="        10">PC HARDWARE</option> 
 <option <?=($proveedor2 == '        60') ? 'selected=""' : '' ?> value="        60">PCH MAYOREO SA. DE CV.</option> 
 <option <?=($proveedor2 == '       134') ? 'selected=""' : '' ?> value="       134">PLAZA TEREZA (MAIZ)</option> 
 <option <?=($proveedor2 == '       150') ? 'selected=""' : '' ?> value="       150">POPULAR TECNOLOGIA</option> 
 <option <?=($proveedor2 == '        96') ? 'selected=""' : '' ?> value="        96">PROLICOM</option> 
 <option <?=($proveedor2 == '         7') ? 'selected=""' : '' ?> value="         7">PROVEEDOR DE ANTENAS WIFI SKY Y DIAMOND</option> 
 <option <?=($proveedor2 == '        42') ? 'selected=""' : '' ?> value="        42">PTT SOLUCIONES SA DE CV</option> 
 <option <?=($proveedor2 == '        23') ? 'selected=""' : '' ?> value="        23">PACIFIC. COM S.A. DE C.V.</option> 
 <option <?=($proveedor2 == '        55') ? 'selected=""' : '' ?> value="        55">PROVEEDOR DF</option> 
 <option <?=($proveedor2 == '        70') ? 'selected=""' : '' ?> value="        70">QRUZH</option> 
 <option <?=($proveedor2 == '       200') ? 'selected=""' : '' ?> value="       200">RAYMUNDO CIGARROS ELECTRONICOS</option> 
 <option <?=($proveedor2 == '       137') ? 'selected=""' : '' ?> value="       137">RAZZY</option> 
 <option <?=($proveedor2 == '        74') ? 'selected=""' : '' ?> value="        74">REDPACK</option>
 <option <?=($proveedor2 == '        551') ? 'selected=""' : '' ?> value="        551">RADOX</option> 
 <option <?=($proveedor2 == '        99') ? 'selected=""' : '' ?> value="        99">RIDER</option> 
 <option <?=($proveedor2 == '       185') ? 'selected=""' : '' ?> value="       185">ROCIO CARGADORES DF</option> 
 <option <?=($proveedor2 == '       194') ? 'selected=""' : '' ?> value="       194">SANDRA YU</option> 
 <option <?=($proveedor2 == '        91') ? 'selected=""' : '' ?> value="        91">SESUCONSA</option> 
 <option <?=($proveedor2 == '         1') ? 'selected=""' : '' ?> value="         1">SHENZU GROUP COL., LTD</option> 
 <option <?=($proveedor2 == '       113') ? 'selected=""' : '' ?> value="       113">SHINE COMPUTER</option> 
 <option <?=($proveedor2 == '        45') ? 'selected=""' : '' ?> value="        45">SHOPONLINE</option> 
 <option <?=($proveedor2 == '         2') ? 'selected=""' : '' ?> value="         2">SIMERST TRADING LIMITED</option> 
 <option <?=($proveedor2 == '        65') ? 'selected=""' : '' ?> value="        65">SINGUA TECNOLOGIA S.A. DE C.V.</option> 
 <option <?=($proveedor2 == '         6') ? 'selected=""' : '' ?> value="         6">SINOSTAR INTERNATIONAL (HK) CO.,LTD</option> 
 <option <?=($proveedor2 == '       172') ? 'selected=""' : '' ?> value="       172">SPACE MB</option> 
 <option <?=($proveedor2 == '       202') ? 'selected=""' : '' ?> value="       202">SRA VICTORIA AUDIFONOS ORIGINALES</option> 
 <option <?=($proveedor2 == '       118') ? 'selected=""' : '' ?> value="       118">SRA. ROCIO D,F</option> 
 <option <?=($proveedor2 == '        32') ? 'selected=""' : '' ?> value="        32">STOCK CELULAR (VICTOR HUGO)</option> 
 <option <?=($proveedor2 == '       130') ? 'selected=""' : '' ?> value="       130">SU-LY</option> 
 <option <?=($proveedor2 == '        15') ? 'selected=""' : '' ?> value="        15">TC MEMORY  SA DE CV</option> 
 <option <?=($proveedor2 == '        20') ? 'selected=""' : '' ?> value="        20">TC MEMORY, S.A. DE C.V. (FAVOR DE NO USAR, CAPTURAR CON EL NO. 15)</option> 
 <option <?=($proveedor2 == '        53') ? 'selected=""' : '' ?> value="        53">TECNOLOGIA & MAS</option> 
 <option <?=($proveedor2 == '       146') ? 'selected=""' : '' ?> value="       146">TECNOLOGIA Y NOVEDADES SOLAR</option> 
 <option <?=($proveedor2 == '        89') ? 'selected=""' : '' ?> value="        89">TMOVI</option> 
 <option <?=($proveedor2 == '         3') ? 'selected=""' : '' ?> value="         3">TVCENLINEA.COM S.A DE C.V</option> 
 <option <?=($proveedor2 == '       204') ? 'selected=""' : '' ?> value="       204">VELIKKA</option> 
 <option <?=($proveedor2 == '        76') ? 'selected=""' : '' ?> value="        76">VELIKKA</option> 
 <option <?=($proveedor2 == '       121') ? 'selected=""' : '' ?> value="       121">VMEX</option> 
 <option <?=($proveedor2 == '       124') ? 'selected=""' : '' ?> value="       124">WEI HANG</option> 
 <option <?=($proveedor2 == '       148') ? 'selected=""' : '' ?> value="       148">WEICSOM</option> 
 <option <?=($proveedor2 == '        98') ? 'selected=""' : '' ?> value="        98">WHITESTONE</option> 
 <option <?=($proveedor2 == '       195') ? 'selected=""' : '' ?> value="       195">WOIKA</option> 
 <option <?=($proveedor2 == '        62') ? 'selected=""' : '' ?> value="        62">YIFA</option> 
 <option <?=($proveedor2 == '       187') ? 'selected=""' : '' ?> value="       187">YIN AUDIFONOS SAMSUNG</option> 
 <option <?=($proveedor2 == '        21') ? 'selected=""' : '' ?> value="        21">Z.H.U. ELECTRONICA</option> 
 <option <?=($proveedor2 == '       169') ? 'selected=""' : '' ?> value="       169">ZANJONG</option> 
 <option <?=($proveedor2 == '        81') ? 'selected=""' : '' ?> value="        81">ZENEK</option> 
 <option <?=($proveedor2 == '       115') ? 'selected=""' : '' ?> value="       115">ZHENG JIARONG</option> 
 <option <?=($proveedor2 == '       131') ? 'selected=""' : '' ?> value="       131">ZHONG GUANG</option> 
 <option <?=($proveedor2 == '       109') ? 'selected=""' : '' ?> value="       109">ZOGIS</option> 
 <option <?=($proveedor2 == '        24') ? 'selected=""' : '' ?> value="        24">ZONA AZUL CELULARES SA DE CV</option> 
 <option <?=($proveedor2 == '        82') ? 'selected=""' : '' ?> value="        82">CHIPS TELCEL Y UNEFON</option> 
 <option <?=($proveedor2 == '        34') ? 'selected=""' : '' ?> value="        34">EB</option> 
 <option <?=($proveedor2 == '       151') ? 'selected=""' : '' ?> value="       151">HARUMI CELL</option> 
 <option <?=($proveedor2 == '        78') ? 'selected=""' : '' ?> value="        78">SUMEX</option> 
 
 
 
                                <!-- **************************-->
        
                                                            </select>

				</td>
				<td>
					Costo<input class="form-control" type="text" name="costo_nacional2" value="<?=(isset($costo_nacional2)) ? $costo_nacional2 : '' ?>" />
				</td>
			</tr>

			<tr>
				<td>
                        Proveedor 3

                        <select class="form-control" name="proveedor3" id="proveedor3" tabindex="2">
                                <option value=""></option>
 <option <?=($proveedor3 == '       107') ? 'selected=""' : '' ?> value="       107">8341 (DANY) DF</option> 
 <option <?=($proveedor3 == '       122') ? 'selected=""' : '' ?> value="       122">A AND M</option> 
 <option <?=($proveedor3 == '       197') ? 'selected=""' : '' ?> value="       197">ABRAHAM CHIPS TELCEL</option> 
 <option <?=($proveedor3 == '       126') ? 'selected=""' : '' ?> value="       126">ACCESORIOS GENESIS PANDA</option> 
 <option <?=($proveedor3 == '        51') ? 'selected=""' : '' ?> value="        51">ACCESORIOS Y CONTROLES</option> 
 <option <?=($proveedor3 == '       186') ? 'selected=""' : '' ?> value="       186">ACCIS DIADEMA KITTY</option> 
 <option <?=($proveedor3 == '       159') ? 'selected=""' : '' ?> value="       159">ACCIS TECHNOLOGY</option> 
 <option <?=($proveedor3 == '        93') ? 'selected=""' : '' ?> value="        93">ADG TECHNOLOGIES</option> 
 <option <?=($proveedor3 == '       103') ? 'selected=""' : '' ?> value="       103">AION</option> 
 <option <?=($proveedor3 == '       154') ? 'selected=""' : '' ?> value="       154">AL GAMES</option> 
 <option <?=($proveedor3 == '       180') ? 'selected=""' : '' ?> value="       180">ALCANCIAS CASINO</option> 
 <option <?=($proveedor3 == '       112') ? 'selected=""' : '' ?> value="       112">AMAZING VISION</option> 
 <option <?=($proveedor3 == '        59') ? 'selected=""' : '' ?> value="        59">AMERIK</option> 
 <option <?=($proveedor3 == '       102') ? 'selected=""' : '' ?> value="       102">ANDAFA INNOVATORS S.A DE C.V</option> 
 <option <?=($proveedor3 == '       166') ? 'selected=""' : '' ?> value="       166">ANDY</option> 
 <option <?=($proveedor3 == '        77') ? 'selected=""' : '' ?> value="        77">ANTENAS JONATHAN BARRON</option> 
 <option <?=($proveedor3 == '       196') ? 'selected=""' : '' ?> value="       196">ANTENAS PLANAS DANIEL</option> 
 <option <?=($proveedor3 == '        11') ? 'selected=""' : '' ?> value="        11">ARANAM SA DE CV</option> 
 <option <?=($proveedor3 == '       175') ? 'selected=""' : '' ?> value="       175">ARUMI</option> 
 <option <?=($proveedor3 == '        84') ? 'selected=""' : '' ?> value="        84">ATELEFONITOS</option> 
 <option <?=($proveedor3 == '        94') ? 'selected=""' : '' ?> value="        94">AXVAN</option> 
 <option <?=($proveedor3 == '        16') ? 'selected=""' : '' ?> value="        16">ACTUALIZACIONES PARA COMPUTADORAS SA DE CV</option> 
 <option <?=($proveedor3 == '        14') ? 'selected=""' : '' ?> value="        14">ALBERTO DE JESUS VIRGEN MAGAÑA</option> 
 <option <?=($proveedor3 == '        28') ? 'selected=""' : '' ?> value="        28">AMIGO EDUARDO CHIPS TELCEL</option> 
 <option <?=($proveedor3 == '       173') ? 'selected=""' : '' ?> value="       173">AMOR</option> 
 <option <?=($proveedor3 == '        54') ? 'selected=""' : '' ?> value="        54">ARTURO ELOIR OLIVERA BARRERA</option> 
 <option <?=($proveedor3 == '       141') ? 'selected=""' : '' ?> value="       141">BIG BANG TECHNOLOGY</option> 
 <option <?=($proveedor3 == '        41') ? 'selected=""' : '' ?> value="        41">BRENDA BORES</option> 
 <option <?=($proveedor3 == '        30') ? 'selected=""' : '' ?> value="        30">BARWARE S.A. DE C.V.</option> 
 <option <?=($proveedor3 == '       117') ? 'selected=""' : '' ?> value="       117">CAGI</option> 
 <option <?=($proveedor3 == '        67') ? 'selected=""' : '' ?> value="        67">CANSA</option> 
 <option <?=($proveedor3 == '       101') ? 'selected=""' : '' ?> value="       101">CARGADORES MAPE</option> 
 <option <?=($proveedor3 == '       164') ? 'selected=""' : '' ?> value="       164">CARLOS CUELLAR</option> 
 <option <?=($proveedor3 == '        75') ? 'selected=""' : '' ?> value="        75">CARLOS ERNESTO ARELLANO JIMENEZ</option> 
 <option <?=($proveedor3 == '       132') ? 'selected=""' : '' ?> value="       132">CELMEX</option> 
 <option <?=($proveedor3 == '        66') ? 'selected=""' : '' ?> value="        66">CELULAR GOLDEN</option> 
 <option <?=($proveedor3 == '       125') ? 'selected=""' : '' ?> value="       125">CELULAR PLANET</option> 
 <option <?=($proveedor3 == '       139') ? 'selected=""' : '' ?> value="       139">CENTRAL 87</option> 
 <option <?=($proveedor3 == '       123') ? 'selected=""' : '' ?> value="       123">CENTROCEL TERESA</option> 
 <option <?=($proveedor3 == '       158') ? 'selected=""' : '' ?> value="       158">CHENS DIGITAL</option> 
 <option <?=($proveedor3 == '         8') ? 'selected=""' : '' ?> value="         8">CHEPE</option> 
 <option <?=($proveedor3 == '       183') ? 'selected=""' : '' ?> value="       183">CHINLUE LAMPARAS DE LAVA</option> 
 <option <?=($proveedor3 == '       108') ? 'selected=""' : '' ?> value="       108">CHIPS MOVISTAR</option> 
 <option <?=($proveedor3 == '       144') ? 'selected=""' : '' ?> value="       144">CHIPS TELCEL (PAUL)</option> 
 <option <?=($proveedor3 == '       190') ? 'selected=""' : '' ?> value="       190">CIGARROS ELECTRONICOS</option> 
 <option <?=($proveedor3 == '       128') ? 'selected=""' : '' ?> value="       128">CINTURON CITY</option> 
 <option <?=($proveedor3 == '        85') ? 'selected=""' : '' ?> value="        85">COBY</option> 
 <option <?=($proveedor3 == '        50') ? 'selected=""' : '' ?> value="        50">COMECO TECNOLOGIAS MEXICO S.A. DE C.V</option> 
 <option <?=($proveedor3 == '       199') ? 'selected=""' : '' ?> value="       199">COMPUTADORAS LUIS</option> 
 <option <?=($proveedor3 == '       168') ? 'selected=""' : '' ?> value="       168">CONCEPTO E IMAGEN DIGITAL S.A. DE C.V.</option> 
 <option <?=($proveedor3 == '        17') ? 'selected=""' : '' ?> value="        17">CORPORATIVO MONZALBO SA DE CV</option> 
 <option <?=($proveedor3 == '         9') ? 'selected=""' : '' ?> value="         9">CVA</option> 
 <option <?=($proveedor3 == '        25') ? 'selected=""' : '' ?> value="        25">CABLE MEN ( OSCAR ALEJANDRO GUERRERO CARRANZA )</option> 
 <option <?=($proveedor3 == '        97') ? 'selected=""' : '' ?> value="        97">CARLOS GOMEZ CHIPS</option> 
 <option <?=($proveedor3 == '         4') ? 'selected=""' : '' ?> value="         4">CONEXIÓN Y ENERGIA EN COMPUTACIÓN SA DE CV</option> 
 <option <?=($proveedor3 == '        43') ? 'selected=""' : '' ?> value="        43">CORPORATIVO EBB</option> 
 <option <?=($proveedor3 == '        86') ? 'selected=""' : '' ?> value="        86">DANIEL MEMORIAS</option> 
 <option <?=($proveedor3 == '       203') ? 'selected=""' : '' ?> value="       203">DICON</option> 
 <option <?=($proveedor3 == '       167') ? 'selected=""' : '' ?> value="       167">DISTRIBUIDORA LASSER</option> 
 <option <?=($proveedor3 == '        31') ? 'selected=""' : '' ?> value="        31">DISTRIBUIDORA TECTRON ( IVAN ISRAEL GARCIA GARCIA )</option> 
 <option <?=($proveedor3 == '        57') ? 'selected=""' : '' ?> value="        57">DIVERSION Y TRABAJO S.A DE C.V</option> 
 <option <?=($proveedor3 == '       127') ? 'selected=""' : '' ?> value="       127">DNS</option> 
 <option <?=($proveedor3 == '        80') ? 'selected=""' : '' ?> value="        80">DON BETO</option> 
 <option <?=($proveedor3 == '       138') ? 'selected=""' : '' ?> value="       138">DON DANY</option> 
 <option <?=($proveedor3 == '       184') ? 'selected=""' : '' ?> value="       184">DOSYU</option> 
 <option <?=($proveedor3 == '        68') ? 'selected=""' : '' ?> value="        68">EBENEZER IMPORTADORA S DE RL DE CV</option> 
 <option <?=($proveedor3 == '       104') ? 'selected=""' : '' ?> value="       104">ELE-GATE</option> 
 <option <?=($proveedor3 == '       147') ? 'selected=""' : '' ?> value="       147">ELECTRICA EL 45</option> 
 <option <?=($proveedor3 == '       160') ? 'selected=""' : '' ?> value="       160">ELECTRONICA JAIRO</option> 
 <option <?=($proveedor3 == '       163') ? 'selected=""' : '' ?> value="       163">EMPLEADO HARUMI</option> 
 <option <?=($proveedor3 == '        22') ? 'selected=""' : '' ?> value="        22">ESTAFETA MEXICANA S.A. DE C.V.</option> 
 <option <?=($proveedor3 == '        13') ? 'selected=""' : '' ?> value="        13">ESTAFETA MEXICANA SA DE CV</option> 
 <option <?=($proveedor3 == '        49') ? 'selected=""' : '' ?> value="        49">ESTAFETA SF  (BENJAMIN LEDEZMA)</option> 
 <option <?=($proveedor3 == '       188') ? 'selected=""' : '' ?> value="       188">EVA-Y</option> 
 <option <?=($proveedor3 == '        52') ? 'selected=""' : '' ?> value="        52">EDUARDO CHIPS</option> 
 <option <?=($proveedor3 == '        26') ? 'selected=""' : '' ?> value="        26">EL MUNDO DE LA TABLET</option> 
 <option <?=($proveedor3 == '        36') ? 'selected=""' : '' ?> value="        36">ELUX</option> 
 <option <?=($proveedor3 == '        46') ? 'selected=""' : '' ?> value="        46">ESTAFETA VIP</option> 
 <option <?=($proveedor3 == '        48') ? 'selected=""' : '' ?> value="        48">FEDEX SF</option> 
 <option <?=($proveedor3 == '       192') ? 'selected=""' : '' ?> value="       192">FERNANDO CONTROLES SKY</option> 
 <option <?=($proveedor3 == '       105') ? 'selected=""' : '' ?> value="       105">FIMEX</option> 
 <option <?=($proveedor3 == '       191') ? 'selected=""' : '' ?> value="       191">FOCAM</option> 
 <option <?=($proveedor3 == '       152') ? 'selected=""' : '' ?> value="       152">FON CEL</option> 
 <option <?=($proveedor3 == '       193') ? 'selected=""' : '' ?> value="       193">FRANCISCO BLU RAY</option> 
 <option <?=($proveedor3 == '       119') ? 'selected=""' : '' ?> value="       119">FULAME IMPORTACION</option> 
 <option <?=($proveedor3 == '        56') ? 'selected=""' : '' ?> value="        56">FUSSION ACUSTIC</option> 
 <option <?=($proveedor3 == '        90') ? 'selected=""' : '' ?> value="        90">FUSSION DF</option> 
 <option <?=($proveedor3 == '        37') ? 'selected=""' : '' ?> value="        37">FERNANDO GRIN</option> 
 <option <?=($proveedor3 == '       136') ? 'selected=""' : '' ?> value="       136">G MOVILE</option> 
 <option <?=($proveedor3 == '       153') ? 'selected=""' : '' ?> value="       153">G&N CELULARES</option> 
 <option <?=($proveedor3 == '       157') ? 'selected=""' : '' ?> value="       157">GENESIS PANDA</option> 
 <option <?=($proveedor3 == '       142') ? 'selected=""' : '' ?> value="       142">GOUMIN ZHEN</option> 
 <option <?=($proveedor3 == '        63') ? 'selected=""' : '' ?> value="        63">GROUPE ADAKTY S.A DE C.V</option> 
 <option <?=($proveedor3 == '        12') ? 'selected=""' : '' ?> value="        12">GRUPO CARABENCH SA DE CV</option> 
 <option <?=($proveedor3 == '        92') ? 'selected=""' : '' ?> value="        92">GRUPO YUDHA</option> 
 <option <?=($proveedor3 == '        38') ? 'selected=""' : '' ?> value="        38">GABRIEL LAERA</option> 
 <option <?=($proveedor3 == '        35') ? 'selected=""' : '' ?> value="        35">GRUPO MOVILES</option> 
 <option <?=($proveedor3 == '       110') ? 'selected=""' : '' ?> value="       110">HENG LIAN</option> 
 <option <?=($proveedor3 == '       106') ? 'selected=""' : '' ?> value="       106">HIP HOP</option> 
 <option <?=($proveedor3 == '       100') ? 'selected=""' : '' ?> value="       100">HUB CITY</option> 
 <option <?=($proveedor3 == '         5') ? 'selected=""' : '' ?> value="         5">I LIKE</option> 
 <option <?=($proveedor3 == '        87') ? 'selected=""' : '' ?> value="        87">IMPORTACIONES GONZALEZ</option> 
 <option <?=($proveedor3 == '        71') ? 'selected=""' : '' ?> value="        71">IMPORTACIONES MIMI</option> 
 <option <?=($proveedor3 == '        73') ? 'selected=""' : '' ?> value="        73">ISAC TEC,LADOS</option> 
 <option <?=($proveedor3 == '       165') ? 'selected=""' : '' ?> value="       165">IZI PAN</option> 
 <option <?=($proveedor3 == '       201') ? 'selected=""' : '' ?> value="       201">IZTAK EXTRA BASS</option> 
 <option <?=($proveedor3 == '        39') ? 'selected=""' : '' ?> value="        39">IMPORTADORA AZ-TEK SA DE CV</option> 
 <option <?=($proveedor3 == '        47') ? 'selected=""' : '' ?> value="        47">J GUADALUPE ROSALES RIOS</option> 
 <option <?=($proveedor3 == '        61') ? 'selected=""' : '' ?> value="        61">JC CELULARES Y ACCESORIOS</option> 
 <option <?=($proveedor3 == '       133') ? 'selected=""' : '' ?> value="       133">JIAN HENG</option> 
 <option <?=($proveedor3 == '       161') ? 'selected=""' : '' ?> value="       161">JIANG FANGZHEN</option> 
 <option <?=($proveedor3 == '        19') ? 'selected=""' : '' ?> value="        19">JIYU ELECTRONIC CO,. LIMITED</option> 
 <option <?=($proveedor3 == '       171') ? 'selected=""' : '' ?> value="       171">JONATHAN AUDIFONOS</option> 
 <option <?=($proveedor3 == '       177') ? 'selected=""' : '' ?> value="       177">JOSE ANTONIO</option> 
 <option <?=($proveedor3 == '        18') ? 'selected=""' : '' ?> value="        18">JOSE TRINIDAD MT LIDER</option> 
 <option <?=($proveedor3 == '        29') ? 'selected=""' : '' ?> value="        29">JUAN CARLOS HONOJOSA GARCIA</option> 
 <option <?=($proveedor3 == '       120') ? 'selected=""' : '' ?> value="       120">KAI PING</option> 
 <option <?=($proveedor3 == '       135') ? 'selected=""' : '' ?> value="       135">KAILI</option> 
 <option <?=($proveedor3 == '       176') ? 'selected=""' : '' ?> value="       176">KARINA TERESA AUDIFONOS</option> 
 <option <?=($proveedor3 == '       189') ? 'selected=""' : '' ?> value="       189">KIKI´S TOYS</option> 
 <option <?=($proveedor3 == '        79') ? 'selected=""' : '' ?> value="        79">KINGMEX</option> 
 <option <?=($proveedor3 == '       170') ? 'selected=""' : '' ?> value="       170">LEONARDO ZAMORANO</option> 
 <option <?=($proveedor3 == '        58') ? 'selected=""' : '' ?> value="        58">LIFE</option> 
 <option <?=($proveedor3 == '        33') ? 'selected=""' : '' ?> value="        33">LINK BITS</option> 
 <option <?=($proveedor3 == '       198') ? 'selected=""' : '' ?> value="       198">LITOY</option> 
 <option <?=($proveedor3 == '       162') ? 'selected=""' : '' ?> value="       162">LJK</option> 
 <option <?=($proveedor3 == '       111') ? 'selected=""' : '' ?> value="       111">LOS CHITOS</option> 
 <option <?=($proveedor3 == '        64') ? 'selected=""' : '' ?> value="        64">LYX LUXURY FUNDAS</option> 
 <option <?=($proveedor3 == '       145') ? 'selected=""' : '' ?> value="       145">MAIZ</option> 
 <option <?=($proveedor3 == '        72') ? 'selected=""' : '' ?> value="        72">MARTIN GUSTAVO GRIJALVA MARTINEZ</option> 
 <option <?=($proveedor3 == '       155') ? 'selected=""' : '' ?> value="       155">MARVO</option> 
 <option <?=($proveedor3 == '       178') ? 'selected=""' : '' ?> value="       178">MEGAFIRE</option> 
 <option <?=($proveedor3 == '       149') ? 'selected=""' : '' ?> value="       149">MEMORY ONE</option> 
 <option <?=($proveedor3 == '       140') ? 'selected=""' : '' ?> value="       140">MEY</option> 
 <option <?=($proveedor3 == '        83') ? 'selected=""' : '' ?> value="        83">MG MOBILE</option> 
 <option <?=($proveedor3 == '       156') ? 'selected=""' : '' ?> value="       156">MIND CONTROL</option> 
 <option <?=($proveedor3 == '        27') ? 'selected=""' : '' ?> value="        27">MT LIDER</option> 
 <option <?=($proveedor3 == '        88') ? 'selected=""' : '' ?> value="        88">MUNDO DE LA TABLET</option> 
 <option <?=($proveedor3 == '        69') ? 'selected=""' : '' ?> value="        69">MARISOL CHIPS</option> 
 <option <?=($proveedor3 == '        95') ? 'selected=""' : '' ?> value="        95">MICAS PEDRO BRAVO</option> 
 <option <?=($proveedor3 == '        44') ? 'selected=""' : '' ?> value="        44">MOOVE TECH</option> 
 <option <?=($proveedor3 == '        40') ? 'selected=""' : '' ?> value="        40">MUNDO DE LA TABLET</option> 
 <option <?=($proveedor3 == '       182') ? 'selected=""' : '' ?> value="       182">NEF REJAS</option> 
 <option <?=($proveedor3 == '       129') ? 'selected=""' : '' ?> value="       129">OSOCEL</option> 
 <option <?=($proveedor3 == '       116') ? 'selected=""' : '' ?> value="       116">OTROS D,F</option> 
 <option <?=($proveedor3 == '       143') ? 'selected=""' : '' ?> value="       143">OTROS GDL</option> 
 <option <?=($proveedor3 == '       114') ? 'selected=""' : '' ?> value="       114">OTTO DIGITAL</option> 
 <option <?=($proveedor3 == '        10') ? 'selected=""' : '' ?> value="        10">PC HARDWARE</option> 
 <option <?=($proveedor3 == '        60') ? 'selected=""' : '' ?> value="        60">PCH MAYOREO SA. DE CV.</option> 
 <option <?=($proveedor3 == '       134') ? 'selected=""' : '' ?> value="       134">PLAZA TEREZA (MAIZ)</option> 
 <option <?=($proveedor3 == '       150') ? 'selected=""' : '' ?> value="       150">POPULAR TECNOLOGIA</option> 
 <option <?=($proveedor3 == '        96') ? 'selected=""' : '' ?> value="        96">PROLICOM</option> 
 <option <?=($proveedor3 == '         7') ? 'selected=""' : '' ?> value="         7">PROVEEDOR DE ANTENAS WIFI SKY Y DIAMOND</option> 
 <option <?=($proveedor3 == '        42') ? 'selected=""' : '' ?> value="        42">PTT SOLUCIONES SA DE CV</option> 
 <option <?=($proveedor3 == '        23') ? 'selected=""' : '' ?> value="        23">PACIFIC. COM S.A. DE C.V.</option> 
 <option <?=($proveedor3 == '        55') ? 'selected=""' : '' ?> value="        55">PROVEEDOR DF</option> 
 <option <?=($proveedor3 == '        70') ? 'selected=""' : '' ?> value="        70">QRUZH</option> 
 <option <?=($proveedor3 == '       200') ? 'selected=""' : '' ?> value="       200">RAYMUNDO CIGARROS ELECTRONICOS</option> 
 <option <?=($proveedor3 == '       137') ? 'selected=""' : '' ?> value="       137">RAZZY</option> 
 <option <?=($proveedor3 == '        74') ? 'selected=""' : '' ?> value="        74">REDPACK</option> 
 <option <?=($proveedor3 == '        551') ? 'selected=""' : '' ?> value="        551">RADOX</option>  
 <option <?=($proveedor3 == '        99') ? 'selected=""' : '' ?> value="        99">RIDER</option> 
 <option <?=($proveedor3 == '       185') ? 'selected=""' : '' ?> value="       185">ROCIO CARGADORES DF</option> 
 <option <?=($proveedor3 == '       194') ? 'selected=""' : '' ?> value="       194">SANDRA YU</option> 
 <option <?=($proveedor3 == '        91') ? 'selected=""' : '' ?> value="        91">SESUCONSA</option> 
 <option <?=($proveedor3 == '         1') ? 'selected=""' : '' ?> value="         1">SHENZU GROUP COL., LTD</option> 
 <option <?=($proveedor3 == '       113') ? 'selected=""' : '' ?> value="       113">SHINE COMPUTER</option> 
 <option <?=($proveedor3 == '        45') ? 'selected=""' : '' ?> value="        45">SHOPONLINE</option> 
 <option <?=($proveedor3 == '         2') ? 'selected=""' : '' ?> value="         2">SIMERST TRADING LIMITED</option> 
 <option <?=($proveedor3 == '        65') ? 'selected=""' : '' ?> value="        65">SINGUA TECNOLOGIA S.A. DE C.V.</option> 
 <option <?=($proveedor3 == '         6') ? 'selected=""' : '' ?> value="         6">SINOSTAR INTERNATIONAL (HK) CO.,LTD</option> 
 <option <?=($proveedor3 == '       172') ? 'selected=""' : '' ?> value="       172">SPACE MB</option> 
 <option <?=($proveedor3 == '       202') ? 'selected=""' : '' ?> value="       202">SRA VICTORIA AUDIFONOS ORIGINALES</option> 
 <option <?=($proveedor3 == '       118') ? 'selected=""' : '' ?> value="       118">SRA. ROCIO D,F</option> 
 <option <?=($proveedor3 == '        32') ? 'selected=""' : '' ?> value="        32">STOCK CELULAR (VICTOR HUGO)</option> 
 <option <?=($proveedor3 == '       130') ? 'selected=""' : '' ?> value="       130">SU-LY</option> 
 <option <?=($proveedor3 == '        15') ? 'selected=""' : '' ?> value="        15">TC MEMORY  SA DE CV</option> 
 <option <?=($proveedor3 == '        20') ? 'selected=""' : '' ?> value="        20">TC MEMORY, S.A. DE C.V. (FAVOR DE NO USAR, CAPTURAR CON EL NO. 15)</option> 
 <option <?=($proveedor3 == '        53') ? 'selected=""' : '' ?> value="        53">TECNOLOGIA & MAS</option> 
 <option <?=($proveedor3 == '       146') ? 'selected=""' : '' ?> value="       146">TECNOLOGIA Y NOVEDADES SOLAR</option> 
 <option <?=($proveedor3 == '        89') ? 'selected=""' : '' ?> value="        89">TMOVI</option> 
 <option <?=($proveedor3 == '         3') ? 'selected=""' : '' ?> value="         3">TVCENLINEA.COM S.A DE C.V</option> 
 <option <?=($proveedor3 == '       204') ? 'selected=""' : '' ?> value="       204">VELIKKA</option> 
 <option <?=($proveedor3 == '        76') ? 'selected=""' : '' ?> value="        76">VELIKKA</option> 
 <option <?=($proveedor3 == '       121') ? 'selected=""' : '' ?> value="       121">VMEX</option> 
 <option <?=($proveedor3 == '       124') ? 'selected=""' : '' ?> value="       124">WEI HANG</option> 
 <option <?=($proveedor3 == '       148') ? 'selected=""' : '' ?> value="       148">WEICSOM</option> 
 <option <?=($proveedor3 == '        98') ? 'selected=""' : '' ?> value="        98">WHITESTONE</option> 
 <option <?=($proveedor3 == '       195') ? 'selected=""' : '' ?> value="       195">WOIKA</option> 
 <option <?=($proveedor3 == '        62') ? 'selected=""' : '' ?> value="        62">YIFA</option> 
 <option <?=($proveedor3 == '       187') ? 'selected=""' : '' ?> value="       187">YIN AUDIFONOS SAMSUNG</option> 
 <option <?=($proveedor3 == '        21') ? 'selected=""' : '' ?> value="        21">Z.H.U. ELECTRONICA</option> 
 <option <?=($proveedor3 == '       169') ? 'selected=""' : '' ?> value="       169">ZANJONG</option> 
 <option <?=($proveedor3 == '        81') ? 'selected=""' : '' ?> value="        81">ZENEK</option> 
 <option <?=($proveedor3 == '       115') ? 'selected=""' : '' ?> value="       115">ZHENG JIARONG</option> 
 <option <?=($proveedor3 == '       131') ? 'selected=""' : '' ?> value="       131">ZHONG GUANG</option> 
 <option <?=($proveedor3 == '       109') ? 'selected=""' : '' ?> value="       109">ZOGIS</option> 
 <option <?=($proveedor3 == '        24') ? 'selected=""' : '' ?> value="        24">ZONA AZUL CELULARES SA DE CV</option> 
 <option <?=($proveedor3 == '        82') ? 'selected=""' : '' ?> value="        82">CHIPS TELCEL Y UNEFON</option> 
 <option <?=($proveedor3 == '        34') ? 'selected=""' : '' ?> value="        34">EB</option> 
 <option <?=($proveedor3 == '       151') ? 'selected=""' : '' ?> value="       151">HARUMI CELL</option> 
 <option <?=($proveedor3 == '        78') ? 'selected=""' : '' ?> value="        78">SUMEX</option> 
 
 
 
                                <!-- **************************-->
        
                                                            </select>

				</td>
				<td>
					Costo<input class="form-control" type="text" name="costo_nacional3" value="<?=(isset($costo_nacional3)) ? $costo_nacional3 : '' ?>" />
				</td>
			</tr>

			<tr>
				<td>
					<input class="btn btn-primary" type="submit" value="Guardar" />
				</td>
			</tr>

		</table>

		
	
		

		</div>
		
	</div>
</div>


	
</form>

<script type="text/javascript">


	$(function(){

         var caracteres = 140;
        $("#counter_js").html("Te quedan <strong>"+  caracteres+"</strong> caracteres.");
        $("#products_name_js").keyup(function(){
            if($(this).val().length > caracteres){
            $(this).val($(this).val().substr(0, caracteres));
            }
        var quedan = caracteres -  $(this).val().length;
        $("#counter_js").html("Te quedan <strong>"+  quedan+"</strong> caracteres.");
        if(quedan <= 10)
        {
            $("#counter_js").css("color","red");
        }
        else
        {
            $("#counter_js").css("color","black");
        }
        });
		

	
	});

</script>
