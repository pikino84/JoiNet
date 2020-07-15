<!DOCTYPE html>

<!--[if lt IE 7 ]><html lang="en" class="ie6 ielt7 ielt8 ielt9"><![endif]-->

<!--[if IE 7 ]><html lang="en" class="ie7 ielt8 ielt9"><![endif]-->

<!--[if IE 8 ]><html lang="en" class="ie8 ielt9"><![endif]-->

<!--[if IE 9 ]><html lang="en" class="ie9"> <![endif]-->

<!--[if (gt IE 9)|!(IE)]><!--> 

<html class="no-js"><!--<![endif]--> 

	<head>

		<meta charset="utf-8">

		<title>Administrador</title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0">



        <link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/grocery_crud/themes/twitter-bootstrap/css/bootstrap.min.css" />

        <link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/grocery_crud/themes/twitter-bootstrap/css/bootstrap-responsive.min.css" />

        <link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/grocery_crud/themes/twitter-bootstrap/css/style.css" />

        <script src="<?=base_url()?>assets/grocery_crud/js/jquery-1.10.2.min.js"></script>

        <script src="<?=base_url()?>assets/grocery_crud/themes/twitter-bootstrap/js/jquery-ui/jquery-ui-1.9.2.custom.js"></script>

        <script src="<?=base_url()?>assets/grocery_crud/themes/twitter-bootstrap/js/libs/bootstrap/bootstrap.min.js"></script>

        <script src="<?=base_url()?>assets/grocery_crud/themes/twitter-bootstrap/js/libs/tablesorter/jquery.tablesorter.min.js"></script>

        <script>

		$(function(){

			$('#login').on('click',function(){

				var email=$('#email').val();

				var password=$('#password').val();

				var sendData={'email':email,'password':password}

				$.getJSON('auth',sendData,function(data){

					console.log(data);

					 if(data.auth==true){

						$('#auth').text('Bienvenido!');

						location.href='http://elegate.mx/ci/Panel/productos';

					}else{

						$('#auth').text('Email ó Password Incorrecto.');

					} 

				});

			});

		});

	</script>

        <style>

			.image-thumbnail img{width:50px; height:50px;}

			.container div.row div.span3 div.well ul.nav li a{color:#777777;}

		</style>

  

	</head>

<body>

    <div class="container">

        <div class="row">

            <div id="login-page" class="container" style="width:230px; margin:100px auto;">

                <h1><img style="display:block; margin:auto;" src="<?=base_url()?>assets/img/logo.png"/></h1>

                <form id="login-form" class="well">

                    <input type="text" class="span2" placeholder="Email" id="email" /><br />

                    <input type="password" class="span2" placeholder="Password" id="password" /><br />

                    <a id="login" class="btn btn-primary">Entrar</a>

                </form>

                <div id="auth">

                </div>

            </div>

        </div>

    </div>

    

</body>

</html>





























