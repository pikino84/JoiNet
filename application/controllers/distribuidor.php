<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Distribuidor extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('products_model');
		$this->load->model('varios_model');
		$this->load->library('user_agent');
	}

    public function index(){
        $this->load->library('user_agent');
        $this->load->helper('detect');
        
        detect_www();

        $dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                            
        $this->data['categories']   = $this->products_model->get_categories();
        $this->data['fecha']        = $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
        
        $this->data['solo_ofertas'] = $this->varios_model->get_solo_ofertas();

        $this->data['marcas']       = $this->products_model->get_marcas();

        $this->data['marca_id']     = $this->input->get('marca');
        $this->data['categoria_id'] = $this->input->get('categoria');
        $this->data['palabra']      = $this->input->get('palabra');

        $this->data['existencias']  = $this->input->get('existencias');
        $this->data['ordenar']      = $this->input->get('ordenar');
        
        $this->data['mostrar']      = $this->input->get('mostrar');
        $this->data['where']        = '';

        if( $this->data['mostrar'] == 'agotados'){
            $this->data['where'] = array( 'sae_exist' => '0' );
        }

        $this->data['products']     = '';

        if($this->data['marca_id'] != '' || $this->data['categoria_id'] != '' || $this->data['palabra'] != '' || $this->data['existencias'] != '' || $this->data['ordenar'] != ''){
            $this->data['products'] = $this->products_model->search($this->data['marca_id'], $this->data['categoria_id'], $this->data['palabra'], $this->data['existencias'], $this->data['ordenar']);
            if($this->data['products'] == NULL){
                $this->data['products'] = 'No se encontraron resultados, modifique su el filtro de búsqueda.';
            }
        }

        $this->load->view('header_buscador', $this->data);
        $this->load->view('home_filtro');
        $this->load->view('footer_buscador');
    }

	/*public function index()
	{
		$this->load->library('user_agent');
		$this->load->helper('detect');
		
		detect_www();

		$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
							
		$this->data['categories']	= $this->products_model->get_categories();
		$this->data['categories_a']	= $this->products_model->get_categories_volantes(92);
		$this->data['fecha']		= $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
		
		$this->data['solo_ofertas'] = $this->varios_model->get_solo_ofertas();

		$this->data['marcas']		= $this->products_model->get_marcas();

		$this->data['marca_id']		= $this->input->get('marca');
		$this->data['categoria_id'] = $this->input->get('categoria');
		$this->data['palabra']		= $this->input->get('palabra');

		$this->data['existencias']	= $this->input->get('existencias');
		$this->data['ordenar']		= $this->input->get('ordenar');
		
		$this->data['mostrar']		= $this->input->get('mostrar');
		$this->data['where'] 		= '';

		if( $this->data['mostrar'] == 'agotados'){
			$this->data['where'] = array( 'sae_exist' => '0' );
		}

		$this->data['products']		= '';

		if($this->data['marca_id'] != '' || $this->data['categoria_id'] != '' || $this->data['palabra'] != '' || $this->data['existencias'] != '' || $this->data['ordenar'] != ''){

			$products1 = $this->products_model->search($this->data['marca_id'], $this->data['categoria_id'], $this->data['palabra'], $this->data['existencias'], $this->data['ordenar']);

			if(is_numeric($this->data['palabra']))
			{
				$products2 = $this->products_model->search2($this->data['palabra'], $this->data['existencias'], $this->data['ordenar']);
				$this->data['products'] = array_merge($products1, $products2);
			}else{
				$this->data['products'] = $products1;
			}

			if($this->data['products'] == NULL){
				$this->data['products'] = 'No se encontraron resultados, modifique su el filtro de búsqueda.';
			}
		}

		$this->load->view('header_buscador', $this->data);
		$this->load->view('home_filtro_a');
		$this->load->view('footer_buscador');
	}*/

	public function get_categories(){


		$id_categoria           = $this->input->post('id_categoria');
		$this->data['products'] = $this->products_model->get_products( array( 'products_status' => '1', 'fk_categoria' => $id_categoria ));

		$output = '';
		/*****************/
		foreach($this->data['products'] as $product):
                    $con_iva = $product->products_price + (16*($product->products_price/100));
                    
                    $output .='<tr id="t_'.$product->products_id.'" class="c_'.$id_categoria.'">
                    			<td class="text-center relative">';
                             if($product->nuevo){
                                 $output .='<ul class="product-flags">
			                                  <li class="nuevo">Nuevo</li>
			                                </ul>';
                            }

                            if($product->oferta){
                                 $output .='<ul class="product-flags">
                                  <li class="oferta">Oferta</li>
                                </ul>';
                            }

                             $output .='<a href="https://joinet.com/-p-'.$product->products_id.'.html" target="_blank">'.$product->products_id.'</a>';

                             if(!empty($product->id_video_youtube)){
                                 $output .='<br><a href="javascript:void(0);" onclick="window.open(\'https://joinet.com/youtube.php?products_id='.$product->products_id.'\', \'_blank\', \'width=600,height=350,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0\');">
                                <img src="https://joinet.com/mayoreo/assets/img/youtube.jpg">
                                </a>';
                            } 
                        $output .='</td>
                        <td>
                            <a target="_blank" class="ml2" href="https://joinet.com/-p-'.$product->products_id.'.html">
                                '.ucfirst(mb_strtolower($product->products_name)).'
                            </a>
                        </td>
                        <td>
                            <a href="https://joinet.com/mayoreo/?palabra=&marca='.$product->manufacturers_id.'&categoria=#row">
                                <img alt="Fabricante" src="https://joinet.com/images/'.$product->manufacturers_image.'" style="display:block; margin:auto;" >
                            </a>
                        </td>
                        <td>';
                            
                            if(empty($product->products_image)){
                                $output .='<img style="padding:0px; max-width:none;" class="img-thumbnail" src="https://joinet.com/mayoreo/assets/img/unboxing.jpg" alt="" width="80px" height="80px"/>';
                            }else{
	                            $output .='<a href="javascript:void(0);" onclick="window.open(\'/galeriam.php?products_id='.$product->products_id.'\', \'_blank\', \'width=800,height=900,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0\');">
	                                <img style="padding:0px; max-width:none;" class="img-thumbnail" src="https://joinet.com/images/'.$product->products_image.'" alt="" width="80px" height="80px"/> 
	                            </a>';
                            }
                        $output .='</td>
                        <td class="text-center">';
                            
                                if($product->products_id == '8438'){
                                    $output .='550';
                                    $ex = $product->sae_exist;
                                }elseif($product->products_id == '8439'){
                                    $output .='571';
                                    $ex = $product->sae_exist;
                                }elseif($product->products_id == '14884'){
                                    $output .='533';
                                    $ex = $product->sae_exist;
                                }elseif($product->products_id == '8437'){
                                    $output .='534';
                                    $ex = $product->sae_exist;
                                }else{
                                    /*************/
                                    if($categorie->id_categoria == '44' || $categorie->id_categoria == '35' || $product->products_id == '13706' || $product->products_id == '13707'){
                                        if($product->sae_exist <= '0'){
                                            $output .='Agotado';
                                            $ex = 0;
                                        }else{
                                            $output .= $product->sae_exist;
                                            $ex = $product->sae_exist;
                                        }
                                    }else{
                                        if($product->sae_exist <= '0'){
                                            $output .='Agotado';
                                            $ex = 0;
                                        }else if($product->products_id == '13565'){
                                            $output .='1';
                                            $ex = '1';
                                        }else{
                                            if($product->sae_exist <= 3){
                                                $output .='Agotado';
                                                $ex = 0;
                                            }else{
                                                $output .= $product->sae_exist - 3;
                                                $ex = $product->sae_exist - 3;
                                            }
                                        }
                                    }
                                }
                            
                        $output .='</td>
                        <td class="text-center text_rojo relative">';
                         if($product->remate){
                                $output .='<ul class="product-flags">
                                  <li class="remate">Remate</li>
                                </ul>';
                             }
                            $output .='$'.number_format(round($con_iva,2));
                            $output .='<br>
                            <span class="iva_included">iva incluido</span>
                        </td>
                        <td class="text-center text_rojo relative">';
                        if($product->remate){
                                $output .='<ul class="product-flags">
                                  <li class="remate">Remate</li>
                                </ul>';
                            }
                            $output .='$'.number_format($product->precio_mayoreo);
                            $output .='<br>
                            <span class="iva_included">iva incluido</span>
                        </td>
                        <td class="text-center text_rojo relative">';
                        	if($product->remate){
                                $output .='<ul class="product-flags">
                                  <li class="remate">Remate</li>
                                </ul>';
                            }
                            $output .='$'.number_format($product->precio_distribuidor);
                            $output .='<br>
                            <span class="iva_included">iva incluido</span>
                        </td>
                        <td class="text-center">';
                            
                            if($categorie->id_categoria == '44' || $categorie->id_categoria == '35' || $product->products_id == '13706' || $product->products_id == '13707'){
                                if($product->sae_exist <= '0'){
                                        
                                           $output .='<input class="form-control input-sm cantidad" type="text" placeholder="Cantidad" disabled/>
                                           <a href="#" class="btn btn-sm btn-primary disabled">Agregar</a>';
                                            
                                    }else{
                                        
                                      $output .='<input id="in_'.$product->products_id.'" class="form-control input-sm cantidad" type="text" data-exist="'.$product->sae_exist.'" placeholder="Cantidad" />
                                       <a id="pc_'.$product->products_id.'" href="#" data-id="'.$product->products_id.'" data-exist="'.$product->sae_exist.'" data-imagen="'.$product->products_image.'" data-price="'.$con_iva.'" data-mayoreo="'.$product->precio_mayoreo.'" data-distribuidor="'.$product->precio_distribuidor.'"  class="btn btn-sm btn-primary new_add">Agregar</a>';
                                        
                                    }
                                }else{
                                    if($product->products_id == '13565'){
                                        
                                      $output .='<input id="in_'.$product->products_id.'" class="form-control input-sm cantidad" type="text" data-exist="'.$product->sae_exist.'" placeholder="Cantidad" />
                                       <a id="pc_'.$product->products_id.'" href="#" data-id="'.$product->products_id.'" data-exist="'.$product->sae_exist.'" data-imagen="'.$product->products_image.'" data-price="'.$con_iva.'" data-mayoreo="'.$product->precio_mayoreo.'" data-distribuidor="'.$product->precio_distribuidor.'"  class="btn btn-sm btn-primary new_add">Agregar</a>';
                                        
                                    }else{
                                        if($product->sae_exist <= '3'){
                                            
                                           $output .='<input class="form-control input-sm cantidad" type="text" placeholder="Cantidad" disabled/>
                                           <a href="#" class="btn btn-sm btn-primary disabled">Agregar</a>';
                                            
                                        }else{
                                            
                                          $output .='<input id="in_'.$product->products_id.'" class="form-control input-sm cantidad" type="text" data-exist="'.$product->sae_exist.'" placeholder="Cantidad" />
                                           <a id="pc_'.$product->products_id.'" href="#" data-id="'.$product->products_id.'" data-exist="'.$ex.'" data-imagen="'.$product->products_image.'" data-price="'.$con_iva.'" data-mayoreo="'.$product->precio_mayoreo.'" data-distribuidor="'.$product->precio_distribuidor.'"  class="btn btn-sm btn-primary new_add">Agregar</a>';
                                            
                                        }
                                    }
                                }
                            
                        $output .='</td>
                    </tr>';


                     endforeach;

                     echo $output;
                    

		/*****************/
	}

    public function get_categories_fix(){


        $id_categoria           = $this->input->post('id_categoria');
        $this->data['products'] = $this->products_model->get_products( array( 'products_status' => '1', 'MyBusiness20' => '1', 'fk_categoria' => $id_categoria ));

        $output = '';
        /*****************/
        foreach($this->data['products'] as $product):
                    $con_iva = $product->products_price + (16*($product->products_price/100));
                    
                    $output .='<tr id="t_'.$product->products_id.'" class="c_'.$id_categoria.'">
                                <td class="text-center relative">';
                             if($product->nuevo){
                                 $output .='<ul class="product-flags">
                                              <li class="nuevo">Nuevo</li>
                                            </ul>';
                            }

                            if($product->oferta){
                                 $output .='<ul class="product-flags">
                                  <li class="oferta">Oferta</li>
                                </ul>';
                            }

                             $output .='<a href="https://joinet.com/-p-'.$product->products_id.'.html" target="_blank">'.$product->products_id.'</a>';

                             if(!empty($product->id_video_youtube)){
                                 $output .='<br><a href="javascript:void(0);" onclick="window.open(\'https://joinet.com/youtube.php?products_id='.$product->products_id.'\', \'_blank\', \'width=600,height=350,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0\');">
                                <img src="https://joinet.com/mayoreo/assets/img/youtube.jpg">
                                </a>';
                            } 
                        $output .='</td>
                        <td>
                            <a target="_blank" class="ml2" href="https://joinet.com/-p-'.$product->products_id.'.html">
                                '.ucfirst(mb_strtolower($product->products_name)).'
                            </a>
                        </td>
                        <td>
                            <a href="https://joinet.com/mayoreo/?palabra=&marca='.$product->manufacturers_id.'&categoria=#row">
                                <img alt="Fabricante" src="https://joinet.com/images/'.$product->manufacturers_image.'" style="display:block; margin:auto;" >
                            </a>
                        </td>
                        <td>';
                            
                            if(empty($product->products_image)){
                                $output .='<img style="padding:0px; max-width:none;" class="img-thumbnail" src="https://joinet.com/mayoreo/assets/img/unboxing.jpg" alt="" width="80px" height="80px"/>';
                            }else{
                                $output .='<a href="javascript:void(0);" onclick="window.open(\'/galeriam.php?products_id='.$product->products_id.'\', \'_blank\', \'width=800,height=900,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0\');">
                                    <img style="padding:0px; max-width:none;" class="img-thumbnail" src="https://joinet.com/images/'.$product->products_image.'" alt="" width="80px" height="80px"/> 
                                </a>';
                            }
                        $output .='</td>
                        <td class="text-center">';
                            
                                if($product->products_id == '8438'){
                                    $output .='550';
                                    $ex = $product->sae_exist;
                                }elseif($product->products_id == '8439'){
                                    $output .='571';
                                    $ex = $product->sae_exist;
                                }elseif($product->products_id == '14884'){
                                    $output .='533';
                                    $ex = $product->sae_exist;
                                }elseif($product->products_id == '8437'){
                                    $output .='534';
                                    $ex = $product->sae_exist;
                                }else{
                                    /*************/
                                    if($categorie->id_categoria == '44' || $categorie->id_categoria == '35' || $product->products_id == '13706' || $product->products_id == '13707'){
                                        if($product->sae_exist <= '0'){
                                            $output .='Agotado';
                                            $ex = 0;
                                        }else{
                                            $output .= $product->sae_exist;
                                            $ex = $product->sae_exist;
                                        }
                                    }else{
                                        if($product->sae_exist <= '0'){
                                            $output .='Agotado';
                                            $ex = 0;
                                        }else if($product->products_id == '13565'){
                                            $output .='1';
                                            $ex = '1';
                                        }else{
                                            if($product->sae_exist <= 3){
                                                $output .='Agotado';
                                                $ex = 0;
                                            }else{
                                                $output .= $product->sae_exist - 3;
                                                $ex = $product->sae_exist - 3;
                                            }
                                        }
                                    }
                                }
                            
                        $output .='</td>
                        <td class="text-center text_rojo relative">';
                         if($product->remate){
                                $output .='<ul class="product-flags">
                                  <li class="remate">Remate</li>
                                </ul>';
                             }
                            $output .='$'.number_format(round($con_iva,2));
                            $output .='<br>
                            <span class="iva_included">iva incluido</span>
                        </td>
                        <td class="text-center text_rojo relative">';
                        if($product->remate){
                                $output .='<ul class="product-flags">
                                  <li class="remate">Remate</li>
                                </ul>';
                            }
                            $output .='$'.number_format($product->precio_mayoreo);
                            $output .='<br>
                            <span class="iva_included">iva incluido</span>
                        </td>
                        <td class="text-center text_rojo relative">';
                            if($product->remate){
                                $output .='<ul class="product-flags">
                                  <li class="remate">Remate</li>
                                </ul>';
                            }
                            $output .='$'.number_format($product->precio_distribuidor);
                            $output .='<br>
                            <span class="iva_included">iva incluido</span>
                        </td>
                        <td class="text-center text_rojo relative">';
                             if($product->productos_cajas > 0 && $product->precio_x_producto > 0 )
                             { 
                                $output .='$'.number_format($product->precio_x_producto);
                                $output .='<br>
                                <span class="iva_included">Caja con '.$product->productos_cajas.' piezas. $'.number_format($product->productos_cajas * $product->precio_x_producto).'</span>';
                             }
                        $output .='</td>
                        <td class="text-center">';
                            
                            if($categorie->id_categoria == '44' || $categorie->id_categoria == '35' || $product->products_id == '13706' || $product->products_id == '13707'){
                                if($product->sae_exist <= '0'){
                                        
                                           $output .='<input class="form-control input-sm cantidad" type="text" placeholder="Cantidad" disabled/>
                                           <a href="#" class="btn btn-sm btn-primary disabled">Agregar</a>';
                                            
                                    }else{
                                        
                                      $output .='<input id="in_'.$product->products_id.'" class="form-control input-sm cantidad" type="text" data-exist="'.$product->sae_exist.'" placeholder="Cantidad" />
                                        <a id="pc_'.$product->products_id.'" href="#" data-id="'.$product->products_id.'" data-exist="'.$product->sae_exist.'" data-imagen="'.$product->products_image.'" data-price="'.$con_iva.'" data-mayoreo="'.$product->precio_mayoreo.'" data-distribuidor="'.$product->precio_distribuidor.'"  class="btn btn-sm btn-primary new_add">Agregar</a>';
//                                       <a id="pc_'.$product->products_id.'" href="#" data-id="'.$product->products_id.'" class="btn btn-sm btn-primary new_add">Agregar</a>';
										}
                                }else{
                                    if($product->products_id == '13565'){
                                        
                                      $output .='<input id="in_'.$product->products_id.'" class="form-control input-sm cantidad" type="text" data-exist="'.$product->sae_exist.'" placeholder="Cantidad" />
                                        <a id="pc_'.$product->products_id.'" href="#" data-id="'.$product->products_id.'" data-exist="'.$product->sae_exist.'" data-imagen="'.$product->products_image.'" data-price="'.$con_iva.'" data-mayoreo="'.$product->precio_mayoreo.'" data-distribuidor="'.$product->precio_distribuidor.'"  class="btn btn-sm btn-primary new_add">Agregar</a>';
//                                       <a id="pc_'.$product->products_id.'" href="#" data-id="'.$product->products_id.'" class="btn btn-sm btn-primary new_add">Agregar</a>';
                                        
                                    }else{
                                        if($product->sae_exist <= '3'){
                                            
                                           $output .='<input class="form-control input-sm cantidad" type="text" placeholder="Cantidad" disabled/>
                                           <a href="#" class="btn btn-sm btn-primary disabled">Agregar</a>';
                                            
                                        }else{
                                            
                                          $output .='<input id="in_'.$product->products_id.'" class="form-control input-sm cantidad" type="text" data-exist="'.$product->sae_exist.'" placeholder="Cantidad" />
                                        <a id="pc_'.$product->products_id.'" href="#" data-id="'.$product->products_id.'" data-exist="'.$product->sae_exist.'" data-imagen="'.$product->products_image.'" data-price="'.$con_iva.'" data-mayoreo="'.$product->precio_mayoreo.'" data-distribuidor="'.$product->precio_distribuidor.'"  class="btn btn-sm btn-primary new_add">Agregar</a>';										  
//                                           <a id="pc_'.$product->products_id.'" href="#" data-id="'.$product->products_id.'" class="btn btn-sm btn-primary new_add">Agregar</a>';
                                            
                                        }
                                    }
                                }
                            
                        $output .='</td>
                    </tr>';


                     endforeach;

                     echo $output;
                    

        /*****************/
    }

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */