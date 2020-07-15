<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prv2 extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('products_model');
		$this->load->model('varios_model');
		$this->load->library('user_agent');
	}


	public function index(){

		$this->load->model('compras_model');

		/*$proveedores = array(218=>' CARGADOR INALAMBRICO DANIEL JACOB MARTINEZ CERDA',107=>'8341 (DANY) DF',122=>'A AND M',197=>'ABRAHAM CHIPS TELCEL',126=>'ACCESORIOS GENESIS PANDA',51=>'ACCESORIOS Y CONTROLES',186=>'ACCIS DIADEMA KITTY',159=>'ACCIS TECHNOLOGY',93=>'ADG TECHNOLOGIES',103=>'AION',154=>'AL GAMES',180=>'ALCANCIAS CASINO',112=>'AMAZING VISION',59=>'AMERIK',102=>'ANDAFA INNOVATORS S.A DE C.V',166=>'ANDY',77=>'ANTENAS JONATHAN BARRON',196=>'ANTENAS PLANAS DANIEL',11=>'ARANAM SA DE CV',175=>'ARUMI',84=>'ATELEFONITOS',94=>'AXVAN',16=>'ACTUALIZACIONES PARA COMPUTADORAS SA DE CV',14=>'ALBERTO DE JESUS VIRGEN MAGAÑA',28=>'AMIGO EDUARDO CHIPS TELCEL',173=>'AMOR',54=>'ARTURO ELOIR OLIVERA BARRERA',141=>'BIG BANG TECHNOLOGY',41=>'BRENDA BORES',30=>'BARWARE S.A. DE C.V.',117=>'CAGI',67=>'CANSA',101=>'CARGADORES MAPE',164=>'CARLOS CUELLAR',75=>'CARLOS ERNESTO ARELLANO JIMENEZ',132=>'CELMEX',66=>'CELULAR GOLDEN',125=>'CELULAR PLANET',139=>'CENTRAL 87',123=>'CENTROCEL TERESA',158=>'CHENS DIGITAL',8=>'CHEPE',183=>'CHINLUE LAMPARAS DE LAVA',108=>'CHIPS MOVISTAR',144=>'CHIPS TELCEL (PAUL)',190=>'CIGARROS ELECTRONICOS',219=>'CIGARROS ELECTRONICOS RICARDO MARQUEZ',128=>'CINTURON CITY',85=>'COBY',50=>'COMECO TECNOLOGIAS MEXICO S.A. DE C.V',199=>'COMPUTADORAS LUIS',168=>'CONCEPTO E IMAGEN DIGITAL S.A. DE C.V.',17=>'CORPORATIVO MONZALBO SA DE CV',9=>'CVA',25=>'CABLE MEN ( OSCAR ALEJANDRO GUERRERO CARRANZA )',97=>'CARLOS GOMEZ CHIPS',4=>'CONEXIÓN Y ENERGIA EN COMPUTACIÓN SA DE CV',43=>'CORPORATIVO EBB',86=>'DANIEL MEMORIAS',203=>'DICON',167=>'DISTRIBUIDORA LASSER',31=>'DISTRIBUIDORA TECTRON ( IVAN ISRAEL GARCIA GARCIA )',57=>'DIVERSION Y TRABAJO S.A DE C.V',127=>'DNS',80=>'DON BETO',138=>'DON DANY',184=>'DOSYU',68=>'EBENEZER IMPORTADORA S DE RL DE CV',213=>'EL BAZAR DE CHARBEL',104=>'ELE-GATE',147=>'ELECTRICA EL 45',160=>'ELECTRONICA JAIRO',163=>'EMPLEADO HARUMI',22=>'ESTAFETA MEXICANA S.A. DE C.V.',13=>'ESTAFETA MEXICANA SA DE CV',49=>'ESTAFETA SF (BENJAMIN LEDEZMA)',188=>'EVA-Y',52=>'EDUARDO CHIPS',26=>'EL MUNDO DE LA TABLET',36=>'ELUX',46=>'ESTAFETA VIP',48=>'FEDEX SF',192=>'FERNANDO CONTROLES SKY',105=>'FIMEX',191=>'FOCAM',152=>'FON CEL',193=>'FRANCISCO BLU RAY',119=>'FULAME IMPORTACION',56=>'FUSSION ACUSTIC',90=>'FUSSION DF',37=>'FERNANDO GRIN',136=>'G MOVILE',157=>'GENESIS PANDA',142=>'GOUMIN ZHEN',63=>'GROUPE ADAKTY S.A DE C.V',12=>'GRUPO CARABENCH SA DE CV',92=>'GRUPO YUDHA',38=>'GABRIEL LAERA',35=>'GRUPO MOVILES',110=>'HENG LIAN',106=>'HIP HOP',100=>'HUB CITY',220=>'HX',5=>'I LIKE',87=>'IMPORTACIONES GONZALEZ',71=>'IMPORTACIONES MIMI',73=>'ISAC TEC,LADOS',216=>'IVAN SASO CONNECT',165=>'IZI PAN',201=>'IZTAK EXTRA BASS',39=>'IMPORTADORA AZ-TEK SA DE CV',47=>'J GUADALUPE ROSALES RIOS',61=>'JC CELULARES Y ACCESORIOS',133=>'JIAN HENG',161=>'JIANG FANGZHEN',208=>'JIULI',19=>'JIYU ELECTRONIC CO,. LIMITED',171=>'JONATHAN AUDIFONOS',177=>'JOSE ANTONIO',18=>'JOSE TRINIDAD MT LIDER',29=>'JUAN CARLOS HONOJOSA GARCIA',120=>'KAI PING',135=>'KAILI',176=>'KARINA TERESA AUDIFONOS',189=>'KIKI´S TOYS',79=>'KINGMEX',170=>'LEONARDO ZAMORANO',58=>'LIFE',33=>'LINK BITS',198=>'LITOY',162=>'LJK',111=>'LOS CHITOS',215=>'LOS PORFIRIOS',64=>'LYX LUXURY FUNDAS',206=>'MACHUKA',145=>'MAIZ',72=>'MARTIN GUSTAVO GRIJALVA MARTINEZ',155=>'MARVO',178=>'MEGAFIRE',149=>'MEMORY ONE',140=>'MEY',83=>'MG MOBILE',156=>'MIND CONTROL',205=>'MOCHILAS DF',27=>'MT LIDER',88=>'MUNDO DE LA TABLET',69=>'MARISOL CHIPS',95=>'MICAS PEDRO BRAVO',44=>'MOOVE TECH',40=>'MUNDO DE LA TABLET',182=>'NEF REJAS',207=>'NOVEDADES DE ORIENTE',129=>'OSOCEL',116=>'OTROS D,F',143=>'OTROS GDL',114=>'OTTO DIGITAL',10=>'PC HARDWARE',60=>'PCH MAYOREO SA. DE CV.',134=>'PLAZA TEREZA (MAIZ)',150=>'POPULAR TECNOLOGIA',214=>'PRODUCTOS OCULTOS NO RESURTIBLES',96=>'PROLICOM',7=>'PROVEEDOR DE ANTENAS WIFI SKY Y DIAMOND',42=>'PTT SOLUCIONES SA DE CV',23=>'PACIFIC. COM S.A. DE C.V.',55=>'PROVEEDOR DF',70=>'QRUZH',200=>'RAYMUNDO CIGARROS ELECTRONICOS',137=>'RAZZY',153=>'RED5',74=>'REDPACK',99=>'RIDER',185=>'ROCIO CARGADORES DF',194=>'SANDRA YU',91=>'SESUCONSA',1=>'SHENZU GROUP COL., LTD',113=>'SHINE COMPUTER',45=>'SHOPONLINE',2=>'SIMERST TRADING LIMITED',65=>'SINGUA TECNOLOGIA S.A. DE C.V.',6=>'SINOSTAR INTERNATIONAL (HK) CO.,LTD',172=>'SPACE MB',202=>'SRA VICTORIA AUDIFONOS ORIGINALES',118=>'SRA. ROCIO D,F',32=>'STOCK CELULAR (VICTOR HUGO)',130=>'SU-LY',15=>'TC MEMORY SA DE CV',53=>'TECNOLOGIA & MAS',146=>'TECNOLOGIA Y NOVEDADES SOLAR',89=>'TMOVI',3=>'TVCENLINEA.COM S.A DE C.V',204=>'VELIKKA',76=>'VELIKKA',121=>'VMEX',209=>'WE TECCH',210=>'WE TECH',124=>'WEI HANG',148=>'WEICSOM',211=>'WETECH',98=>'WHITESTONE',217=>'WIMO',195=>'WOIKA',221=>'XH',62=>'YIFA',187=>'YIN AUDIFONOS SAMSUNG',21=>'Z.H.U. ELECTRONICA',169=>'ZANJONG',81=>'ZENEK',115=>'ZHENG JIARONG',131=>'ZHONG GUANG',109=>'ZOGIS',24=>'ZONA AZUL CELULARES SA DE CV',82=>'CHIPS TELCEL Y UNEFON',34=>'EB',151=>'HARUMI CELL',78=>'SUMEX');*/

		//$prov = $this->products_model->custom_re("SELECT DISTINCT(proveedor) AS proveedor FROM products WHERE proveedor <> '';");
		$prov = $this->compras_model->get_proveedores_sae();

		echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>';
		
		echo '<div class="container-fluid">';

		$sumado1 = 0;
		$nuevo   = array();

		foreach ($prov as $k => $v) {

			$productos    = $this->products_model->get_products(array('TRIM(proveedor)'=> $v->clave));
			$p            = trim($v->clave);
			$sumado2      = 0;
			$sumado_exist = 0;
            
            foreach($productos as $producto){
				$sumado2      += $producto->sae_exist * $producto->precio_distribuidor;
				$sumado_exist += $producto->sae_exist;
            }

            $n = array(
				'proveedor' => $v->nombre,//$proveedores[$p],
				'exist'     => $sumado_exist,
				'total'     => $sumado2
            );

            array_push($nuevo, $n);

            $sumado1 += $sumado2;
            //echo '<i>$'.number_format($sumado2).'</i></div>';
            
		}

		foreach ($nuevo as $key => $row) {
		    $aux[$key] = $row['total'];
		}

		array_multisort($aux, SORT_DESC, $nuevo);
		echo '<table class="table table-striped table-dark table-sm float-left" style="font-size:9px; width:250px;">';

		$iz = 0;

		foreach ($nuevo as $k => $v) {

			if($v['total'] >= 1){

				$iz++;
			
				echo '<tr"><td><strong><a title="'.$v['proveedor'].'">'.character_limiter($v['proveedor'], 12,'...').'</a>:</strong> </td>';
				echo '<td style="color:#F7FE2E;">'.$v['exist'].' </td>';
				echo '<td style="color:#00FF00;">$'.number_format($v['total']).'</td>';
				echo '</tr>';
				//if($k == 32 || $k == 65 || $k == 97 || $k == 129 || $k == 161){
				if($iz % 15 == 0){
					echo '</table><table class="table table-striped table-dark table-sm float-left" style="font-size:9px; width:250px;">';
				
				}

			}
			
		}

		echo '<tr><td style="color:#FF0000;">Total:</td><td></td><td style="color:#FF0000;">$'.number_format($sumado1).'</td></tr>';

		echo '</table>';

		echo '</div>';
	}


}

/* End of file proveedores.php */
/* Location: ./application/controllers/proveedores.php */