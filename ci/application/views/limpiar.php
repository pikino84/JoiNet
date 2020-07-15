<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Massivepc</title>
    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>assets/bootstrap3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="<?=base_url()?>assets/bootstrap3/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/bootstrap3/css/jquery.fancybox.css" rel="stylesheet">

    <style>
	body {
	  padding-top: 70px;
	  padding-bottom: 30px;
	}
	
	.theme-dropdown .dropdown-menu {
	  position: static;
	  display: block;
	  margin-bottom: 20px;
	}
	
	.theme-showcase > p > .btn {
	  margin: 5px 0;
	}
	
	.theme-showcase .navbar .container {
	  width: auto;
	}
	</style>

    <script src="<?=base_url()?>assets/bootstrap3/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/bootstrap3/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/bootstrap3/js/docs.min.js"></script>
    <script src="<?=base_url()?>assets/bootstrap3/js/ie10-viewport-bug-workaround.js"></script>
    <script src="<?=base_url()?>assets/bootstrap3/js/jquery.fancybox.pack.js"></script>
    
    <script>
	$(function(){
		$('#limpiar').on('click', function(){
			
			$.ajax({
				url: '/ci/mail/set_mailchimp_batch',
				type: 'POST',
				data: {'data':$('#contenido').val()},
				dataType: 'json',
				success: function(data){
					//console.log(data);
					var tr;
					$.each(data, function(i,v){
						tr += '<tr><td>'+v+'</td></tr>';
					});
					$('#result').html(tr);
				}
			});
			
		});
	});
	</script>
    
  </head>

  <body role="document">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Massivepc</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          
          
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container theme-showcase" role="main">

      <div class="row">
        <div class="col-md-12">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> </th>
              </tr>
            </thead>
            <tbody id="result">
            	
                <tr>
                   
                    <td>
                    	<form method="post">
                        	<textarea id="contenido" name="contenido" style="width:100%; height:130px; resize:none;" class="form-control"></textarea><br>
                            <a id="limpiar" href="#limpiar" class="btn btn-sm btn-primary">Limpiar</a>
                        </form>
                        <?
							/*$string = $this->input->post('contenido');
							$string = preg_match_all('#([a-z0-9\._-]+@[a-z0-9\._-]+)#is',$string,$emails);
							$str2=array_unique($emails[1]);
							foreach ($str2 as $val){
								echo $val.'<br>';
							}*/
						?>
                    </td>
                </tr>
                
            </tbody>
          </table>
        </div>
        
      </div>
      
    </div> <!-- /container -->
    
    <div id="response_loading" style="width:200px; height:211px; text-align:center; display:none;">
    	<img src="http://massivepc.com/ci/assets/bootstrap3/img/loading.gif" style="display:block; width:128px; height:128px; margin:auto;"/><br>
		<h4><span class="label label-primary">Importando...</span></h4>
    </div>
    <a id="trigger_loading" class="fancybox" href="#response_loading"></a>

	<div id="response_fancybox" style="width:430px; height:230px; display:none;">
    	<img src="https://us10.admin.mailchimp.com/release/10.0.45/images/navigation/freddie_o.svg" style="display:block; width:100px; margin:auto;"/>
        
        <br>
        
        <div role="alert" class="alert alert-success" style="text-align:center;">
        	Correos importados correctmente a <a href="http://mailchimp.com/" target="_blank">MailChimp</a>
      	</div>
    </div>
    <a id="trigger_fancybox" class="fancybox" href="#response_fancybox"></a>
    
    
  </body>
</html>
