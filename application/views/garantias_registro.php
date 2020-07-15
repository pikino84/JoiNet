<?
ini_set("display_errors", "1");
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Massive Pc - Garantías</title>

    <link href="<?=base_url()?>assets/bootstrap3/css/bootstrap.css" rel="stylesheet">

    <link href="<?=base_url()?>assets/css/jumbotron-narrow.css" rel="stylesheet">

    <link href="<?=base_url()?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <style type="text/css">
        html{
            overflow-y: scroll;
        }
        .ajax_loading{
            background-image: url('/mayoreo/assets/img/ajax_loader.gif') no-repeat center;
        }
    </style>

  </head>

  <body>

    <div class="container">
      <div class="header clearfix">
        <!--<nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="#">Registrar garantía</a></li>
            <li role="presentation"><a href="#">Estatus de garantía</a></li>
          </ul>
        </nav>-->
        <img src="https://www.massivepc.com/mayoreo/Logo-Massive-Mayoreo.png"> <h3 class="text-muted">Solicitud de garantía</h3>
      </div>

      

      <div class="row marketing">

        <form id="datos_garantia">

        <div class="col-lg-12">
          <h4>Datos de compra</h4>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Nº de Factura ó Ticket</label>
                <input type="text" class="form-control" name="n_ticket" required>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Fecha de compra</label>
                <!--<input type="text" class="form-control fecha" name="fecha_compra" required>-->

                <div class="input-group date" id="datetimepicker1">
                    <input type='text' class="form-control fecha" name="fecha_compra" required/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>

            </div>
        </div>
        
        <div class="col-lg-12">
          <h4>Datos de cliente</h4>
        </div>
        
        <div class="col-lg-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Correo</label>
                <input type="email" class="form-control" name="correo" data-error="La dirección de correo electrónico no es valida" required>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Calle</label>
                <input type="text" class="form-control" name="calle" required>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Nº exterior</label>
                <input type="text" class="form-control" name="n_exterior" required>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Nº interior</label>
                <input type="text" class="form-control" name="n_interior" >
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Colonia</label>
                <input type="text" class="form-control" name="colonia" required>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label for="exampleInputEmail1">C.P.</label>
                <input type="text" class="form-control" name="cp" required>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Estado</label>
                <!--<input type="text" class="form-control" name="estado" >-->

                <div class="form-group">
                    <select id="estadoSelect" class="form-control" name="estado" required>
                        <? foreach($estados as $estado):?>
                            <option data-estadoid="<?=$estado->id?>" value="<?=$estado->nombre?>"><?=$estado->nombre?></option>
                        <? endforeach?>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Municipio</label>
                <!--<input type="text" class="form-control" name="municipio" >-->
                <div class="form-group">
                    <select id="municipioSelect" class="form-control" name="municipio" required>

                    </select>
                </div>

            </div>
        </div>

        <div class="col-lg-12">
          <h4>Datos de envío</h4>
        </div>

        <div class="col-lg-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Fecha de envío</label>
                <!--<input type="text" class="form-control fecha" name="envio_fecha" required>-->
                <div class="input-group date" id="datetimepicker1">
                    <input type='text' class="form-control fecha" name="envio_fecha" required/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Nº de guia</label>
                <input type="text" class="form-control" name="envio_n_guia" required>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Empresa de envío</label>
                <input type="text" class="form-control" name="envio_empresa" required>
            </div>
        </div>

        <div class="col-lg-12">
          <h4>Artículos que envía a garantía</h4>
        </div>

        <div class="col-lg-12">
            <table class="table table-border">

                <tr>
                    <td>Descripción ó Modelo</td>
                    <td>Color</td>
                    <td>Nº de Serie</td>
                </tr>

                <tr>
                    <td><input type="text" class="form-control" name="modelo[]" required></td>
                    <td><input type="text" class="form-control" name="color[]" required></td>
                    <td><input type="text" class="form-control" name="n_serie[]" required></td>
                    <td><a class="agregar btn btn-success btn-xs"><span class="glyphicon glyphicon-plus"></span></a></td>
                </tr>

            </table>
        </div>

        <div class="col-lg-10 text-right">
             
        </div>
        <div class="col-lg-2 text-right">
            <input type="submit" value="Enviar" class="btn btn-primary" />
            <a id="f_enviar"></a>
        </div>
        
        </form>
        
      </div>

      <footer class="footer">
         
      </footer>

    </div> <!-- /container -->


    <script src="/mayoreo/assets/js/jquery-1.11.3.min.js"></script>
    <script src="/mayoreo/assets/js/jquery-ui.min.js"></script>
    <script src="/mayoreo/assets/bootstrap3/js/bootstrap.js"></script>
    <script src="/mayoreo/assets/js/moment.js"></script>
    <script src="/mayoreo/assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="/mayoreo/assets/js/validator.js"></script>
    <script src="/mayoreo/assets/js/garantias.js"></script>
  </body>
</html>
