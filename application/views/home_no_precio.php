<!doctype html>

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>Massive Pc - Mayorista en equipo de cómputo</title>

    <META name="description" content="Venta de tablets, celulares, relojes inteligentes, guadalajara" />
    <META name="keywords" content="Tablet, Tablets, Mayoreo guadalajara, Tablets baratas guadalajara, celulares economicos guadalajara, electronicos baratos guadalajara, joinet guadalajara, massive pc guadalajara, celulares, tabletas, Antenas, Espía, " />
    <link href="<?=base_url()?>assets/css/stylev4.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/css/jquery.fancybox.css" rel="stylesheet" type="text/css">
    <link href="/css/jquery-ui.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>assets/bootstrap3/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" >
    
    <script>
        var base_path='/mayoreo/';
    </script>
        
    <script type="text/javascript">
    
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-64096462-1']);
      _gaq.push(['_trackPageview']);
    
      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    
    </script>

    <style type="text/css">
		html body.modal-open div#myModal.modal.fade.in div.modal-backdrop{
			position: fixed;
		}
		html,body{
			overflow-x:hidden;
            /*background: url(https://www.massivepc.com/mayoreo/assets/img/new-bg.jpg) repeat;*/
		}
		.container{
			padding:0px;
		}
    </style>

    

</head>
<body>








<div class="container">
                
        <div style="clear:both;"></div>
        
        <br><br>
        <div id="seleccion">
            <!--<tr>-->
                <table class="table table-bordered table-hover" style="background:#fff;">
                    <thead>
                        <tr>
                            <th class="text-center">CODIGO</th>
                            <th class="text-center">MODELO</th>
                            <th class="text-center">DESCRIPCI&Oacute;N</th>
                            <th class="text-center">MARCA</th>
                            <th class="text-center">IMAGEN</th>
                            <th class="text-center">EXISTENCIAS</th>
                            <th class="text-center">PRECIO </th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <? foreach($categories as $categorie):?>
                    
                        <? if($categorie->id_categoria != 21){?>
                            <tr>
                                <td class="bg-info text-center" colspan="10">
                                    <strong><?=$categorie->categoria?></strong>
                                </td>
                            </tr>
                        <? }?>

                    <? $this->data['products'] = $this->products_model->get_products(array('fk_categoria'=>$categorie->id_categoria))?>

                    <? foreach($this->data['products'] as $product):?>
                    <? $con_iva = $product->products_price + (16*($product->products_price/100));?>
                    
                    <tr id="t_<?=$product->products_id?>">
                        <td class="text-center">
                            <?=$product->products_id?>
                        </td>
                        <td class="text-center">
                            <? if(!empty($product->products_model)){ echo ucfirst(mb_strtolower($product->products_model)); }else{ echo 'N/A'; }?>
                        </td>
                        <td>
                            <?=ucfirst(mb_strtolower($product->products_name))?>
                        </td>
                        <td>
                            <img alt="Fabricante" src="https://www.massivepc.com/images/<?=$product->manufacturers_image?>" height="30" width="60">
                        </td>
                        <td>
                            <img style="padding:0px; max-width:none;" class="img-thumbnail" src="https://www.massivepc.com/images/<?=$product->products_image?>" alt="" width="80px" height="80px"/> 
                        </td>
                        <td class="text-center">
                            <?
                                //echo $product->agotado;
                                /*if($product->agotado=='1'){
                                    echo 'Agotado';
                                }else{*/
                                    if($product->sae_exist <= '0'){
                                        //echo 'Por mostrar';
                                        echo 'Agotado';
                                    }else{
                                        //echo $product->sae_exist;
                                        if($product->sae_exist <= 3){
                                            echo 'Agotado';
                                        }else{
                                            echo $product->sae_exist - 3;
                                        }
                                    }
                                //} 
                            ?>
                        </td>
                        <td class="text-center text_rojo">
                           
                        </td>
                        
                        
                    </tr>


                    <? endforeach?>

                    <? endforeach?>

                    </tbody>


                </table>
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
    <script src="/mayoreo/assets/js/mayoreov8.js?<?=md5(time())?>=<?=md5(time())?>"></script>
    <script type="text/javascript">

    $(function(){

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