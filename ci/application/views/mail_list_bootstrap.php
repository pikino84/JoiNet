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
			
			$('.fancybox').fancybox();
			
			<?
				if(!empty($mailchimp)){
				?>
					$('#trigger_fancybox').trigger('click');
				<?
				}
			?>
			
			$('#set_mailchimp').on('click', function(e){
				e.preventDefault();
				
				$('#trigger_loading').trigger('click');
				
				$.getJSON('/ci/panel/set_mailchimp_batch',function(data){
					
					setTimeout(function() {
						  location.href='http://massivepc.com/ci/panel/mail_list/?mailchimp=true';
					}, 2000);
					
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
          <a class="navbar-brand" href="http://massivepc.com/ci/panel/mail_list">Massivepc</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="http://massivepc.com/ci/panel/mail_list">Correos Boletín</a></li>
            <li><a href="http://massivepc.com/ci/panel/mail_list2">Correos Registro</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
              <li><a href="<?=base_url()?>panel/salir">Salir</a></li>
		</ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container theme-showcase" role="main">


      <!--<div class="page-header">
        <h1>Acciones</h1>
      </div>-->

      <p>
        <!--<button type="button" class="btn btn-sm btn-default">Exportar</button>-->
        <button id="set_mailchimp" type="button" class="btn btn-sm btn-primary">Importar a MailChimp</button>
      </p>

      <?=$this->pagination->create_links()?> 
      
      <div class="row">
        <div class="col-md-12">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                
                <th>Correo</th>
                <th>Sintaxis</th>
                <th>MailChimp</th>
                <th>Fecha</th>
              </tr>
            </thead>
            <tbody>
            <? $i=1; foreach($mails as $mail):?>
            	
                <tr>
                    <td><?=strtolower($mail->customers_newsletter_email)?></td>
                    <td>
						<? if (valid_email($mail->customers_newsletter_email)){
                            echo '<span class="label label-success">Correcto</span>';
                        }else{
                            echo '<span class="label label-danger">Incorrecto</span>';
                        }?>
                    </td>
                    <td>
						<? if ($mail->mailchimp == '1'){
                            echo '<span class="label label-primary">Si</span>';
                        }else{
                            echo '<span class="label label-default">No</span>';
                        }?>
                    </td>
                    <td>
                    	<?=$mail->fecha_alta?>
                    </td>
                </tr>
                <? //if ($i % 5 == 0) {ob_flush();flush();sleep(1);}?>
            <? endforeach?>
            </tbody>
          </table>
        </div>
        
      </div>
      
<?=$this->pagination->create_links()?> 

    
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
