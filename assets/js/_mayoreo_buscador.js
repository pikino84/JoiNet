/*
* 
* @Author Juan Pablo Cruz García
* @version 9 Buscador
* 
* 
* - mayoreo_buscador.js
* 
* 
*/
var cacheBusterGeneral = new Date().getTime();
var p_mayoreo = 0;
var p_distribuidor = 0;

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

function imprSelec(nombre) {
    var ficha = document.getElementById(nombre);
    var ventimp = window.open(' ', 'popimpr');
    ventimp.document.write(ficha.innerHTML);
    ventimp.document.close();
    ventimp.print();
    ventimp.close();
}
 
function ValidaRfc(rfcStr) {
    var strCorrecta;
    strCorrecta = rfcStr;   
    if (rfcStr.length == 12){
        var valid = '^(([A-Z]|[a-z]){3})([0-9]{6})((([A-Z]|[a-z]|[0-9]){3}))';
    }else{
        var valid = '^(([A-Z]|[a-z]|\s){1})(([A-Z]|[a-z]){3})([0-9]{6})((([A-Z]|[a-z]|[0-9]){3}))';
    }
        var validRfc=new RegExp(valid);
        var matchArray=strCorrecta.match(validRfc);
    if (matchArray==null) {
        return false;
    }else{
        return true;
    }  
}

function openwindow() {
    window.open("http://massivepc.com/ci/panel/productos_print", "mywindow", "menubar=0,resizable=0,width=1,height=1");
}

$(document).ready(function() {

    var u_marca = getUrlParameter('marca');
    var u_categoria = getUrlParameter('categoria');
    var u_palabra = getUrlParameter('palabra');

    function dt(total_items,total){
        $('.data_total').text(total_items+' producto(s) - $'+total);
    }

    function get_totales(){
        $.ajax({
            headers: { "cache-control": "no-cache" },
            cache: false,
            async: false,
            method: 'POST',
            dataType: 'json',
            url: '/mayoreo/carrito/get_tti?cb=' + cacheBusterGeneral,
        }).done(function(er) {
            dt(er.total_items,er.total)
        });
    }

    function edit_qty(rowid,qty){
        $.ajax({
            headers: { "cache-control": "no-cache" },
            cache: false,
            async: false,
            method: 'POST',
            dataType: 'json',
            data: {'qty':qty, 'rowid':rowid},
            url: '/mayoreo/carrito/editar_ajax?cb=' + cacheBusterGeneral,
        }).done(function(er) {
            get_content_cart();
            $('#titulo_v').html('Productos en su carrito');
        });
    }

    function _open_modal_alert(msg,redirect){
        $('#modal_alert').modal('show');
        $('#content_alert').html(msg);
        if(redirect != false){
            $('#modal_alert').on('hidden.bs.modal', function (e) {
                location.href=redirect;
            });
        }
    }

    function _open_alert(msg){
        alert(msg);
        /*$('#modal_alert').modal('show');
        $('#content_alert').html(msg);
        if(redirect != false){
            $('#modal_alert').on('hidden.bs.modal', function (e) {
                location.href=redirect;
            });
        }*/
    }

    function _open_modal_alert_cb(msg,callback){
        $('#modal_alert').modal('show');
        $('#content_alert').html(msg);
        if(callback != false){
            $('#modal_alert').on('hidden.bs.modal', function (e) {
                get_content_cart();
            });
        }
    }

    $.ajaxSetup({
        cache: false
    });

    /*Get data mail on*/

    $('#f_rfc').typeWatch({
    highlight: true, wait: 800, captureLength: 0, callback: function(val){
        var con = $('#f_rfc').val().trim();
        if(ValidaRfc(con) == false){
            $('#continuar').attr('disabled','disabled');
            _open_modal_alert('<div class="alert alert-danger" role="alert"> Formato de RFC incorrecto </div>',false);
        }else{
            $('#continuar').removeAttr('disabled');
        }
    }
    });

    $('.solo-numeros').keyup(function (){
        this.value = (this.value + '').replace(/[^0-9]/g, '');
    });

    $('#validar_mail').click(function() {
        var correo_boletin = $('#correo_boletin').val();
        var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
        if (regex.test(correo_boletin.trim())) {
            $.ajax({
                headers: { "cache-control": "no-cache" },
                cache: false,
                async: false,
                method: 'POST',
                dataType: 'json',
                data: 'email=' + correo_boletin,
                url: '/mayoreo/boletin/validar/?cb=' + cacheBusterGeneral,
            }).done(function(email_response) {
                $('.modal-body').html(email_response.msg);
            });
            $('.modal-title').text('Boletín');
            $('#myModal').modal({
                keyboard: false
            });
            $('#myModal').modal('show');
        } else {
            $('.modal-title').text('Boletín');
            $('.modal-body').html('<span class="glyphicon glyphicon-warning-sign"></span> Formato de correo invalido.');
            $('#myModal').modal({
                keyboard: false
            });
            $('#myModal').modal('show');
        }
    });

function frm_datos(){

    var write_r = '<form id="datos_personales" class="form-signin" action="" method="post">';
                write_r += '<ul id="order_step" class="step clearfix">';
                write_r += '<li class="step_todo first"><a href="#01-Productos"><span><em>01.</em> Productos</span></a></li>';
                write_r += '<li class="step_current second"><span><em>02.</em> Datos</span></li>';
                write_r += '<li class="step_todo last" id="step_end"><span><em>03.</em> Pagar</span></li>';
                write_r += '</ul>';

                write_r += '<div class="row">';

                write_r += '<div class="col-md-12">';
                            write_r += '<div id="msg_envio_data" class="alert alert-dismissible" role="alert" style="display:none;">';
                                write_r += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                                write_r += '<p></p>';
                            write_r += '</div>';
                            write_r += '<h5 class="text-danger"> <i class="glyphicon glyphicon-asterisk text-danger"></i>  Campos obligatorios </h5>';
                        write_r += '</div>';


                    write_r += '<div id="envio_data" class="col-md-12">';
                        write_r += '<fieldset><legend>Datos de envío</legend></fieldset>';

                        write_r += '<div class="form-group has-feedback">';
                            write_r += '<label class="control-label" for="nombre">Nombre</label>';
                            write_r += '<input type="text" class="form-control" id="nombre" name="nombre" required="">';
                            write_r += '<span class="text-danger glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>';
                        write_r += '</div>';

                        write_r += '<div class="form-group has-feedback">';
                            write_r += '<label class="control-label" for="email">Email</label>';
                            write_r += '<input type="text" class="form-control" id="email" name="email" required="">';
                            write_r += '<span class="text-danger glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>';
                        write_r += '</div>';

                        write_r += '<div class="form-group">';
                            write_r += '<label class="control-label" for="telefono">Teléfono</label>';
                            write_r += '<input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ejemplo: 3336134587">';
                        write_r += '</div>';

                        write_r += '<div class="form-group has-feedback">';
                            write_r += '<label class="control-label" for="direccion">Dirección</label>';
                            write_r += '<input type="text" class="form-control" id="direccion" name="direccion" required="">';
                            write_r += '<span class="text-danger glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>';
                        write_r += '</div>';

                        write_r += '<div class="form-group has-feedback">';
                            write_r += '<label class="control-label" for="colonia">Colonia</label>';
                            write_r += '<input type="text" class="form-control" id="colonia" name="colonia" required="">';
                            write_r += '<span class="text-danger glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>';
                        write_r += '</div>';

                        write_r += '<div class="form-group has-feedback">';
                            write_r += '<label class="control-label" for="estado">Estado</label>';
                            write_r += '<input type="text" class="form-control" id="estado" name="estado" required="">';
                            write_r += '<span class="text-danger glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>';
                        write_r += '</div>';

                        write_r += '<div class="form-group has-feedback">';
                            write_r += '<label class="control-label" for="poblacion">Ciudad</label>';
                            write_r += '<input type="text" class="form-control" id="poblacion" name="poblacion" required="">';
                            write_r += '<span class="text-danger glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>';
                        write_r += '</div>';

                        write_r += '<div class="form-group has-feedback">';
                            write_r += '<label class="control-label" for="cp">Código Postal</label>';
                            write_r += '<input type="text" class="form-control" id="cp" name="cp" required="">';
                            write_r += '<span class="text-danger glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>';
                        write_r += '</div>';

                        write_r += '<div class="form-group has-feedback">';
                            write_r += '<label class="control-label" for="comentarios">Comentarios o referencia de entrega</label>';
                            write_r += '<textarea id="comentarios" name="comentarios" class="form-control" placeholder="Comentarios o referencia de entrega"></textarea>';
                        write_r += '</div>';

                    write_r += '</div>';

                    write_r += '<div id="fact_data" class="col-md-6" style="display:none;">';
                        write_r += '<fieldset><legend>Datos de Facturación</legend></fieldset>';

                        write_r += '<div class="form-group has-feedback">';
                            write_r += '<label class="control-label" for="f_rfc">RFC</label>';
                            write_r += '<input type="text" class="form-control" id="f_rfc" name="f_rfc">';
                            write_r += '<span class="text-danger glyphicon glyphicon-asterisk form-control-feedback" placeholder="Ejemplo: MPC0603282MO" aria-hidden="true"></span>';
                        write_r += '</div>';

                        write_r += '<div class="form-group has-feedback">';
                            write_r += '<label class="control-label" for="f_nombre">Nombre</label>';
                            write_r += '<input type="text" class="form-control" id="f_nombre" name="f_nombre">';
                            write_r += '<span class="text-danger glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>';
                        write_r += '</div>';

                        write_r += '<div class="form-group has-feedback">';
                            write_r += '<label class="control-label" for="f_email">Email</label>';
                            write_r += '<input type="text" class="form-control" id="f_email" name="f_email">';
                            write_r += '<span class="text-danger glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>';
                        write_r += '</div>';

                        write_r += '<div class="form-group">';
                            write_r += '<label class="control-label" for="f_telefono">Teléfono</label>';
                            write_r += '<input type="text" class="form-control" id="f_telefono" name="f_telefono">';
                        write_r += '</div>';

                        write_r += '<div class="form-group has-feedback">';
                            write_r += '<label class="control-label" for="f_direccion">Dirección Fiscal</label>';
                            write_r += '<input type="text" class="form-control" id="f_direccion" name="f_direccion">';
                            write_r += '<span class="text-danger glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>';
                        write_r += '</div>';

                        write_r += '<div class="form-group has-feedback">';
                            write_r += '<label class="control-label" for="f_colonia">Colonia</label>';
                            write_r += '<input type="text" class="form-control" id="f_colonia" name="f_colonia">';
                            write_r += '<span class="text-danger glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>';
                        write_r += '</div>';

                        write_r += '<div class="form-group has-feedback">';
                            write_r += '<label class="control-label" for="f_estado">Estado</label>';
                            write_r += '<input type="text" class="form-control" id="f_estado" name="f_estado">';
                            write_r += '<span class="text-danger glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>';
                        write_r += '</div>';

                        write_r += '<div class="form-group has-feedback">';
                            write_r += '<label class="control-label" for="f_poblacion">Ciudad</label>';
                            write_r += '<input type="text" class="form-control" id="f_poblacion" name="f_poblacion">';
                            write_r += '<span class="text-danger glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>';
                        write_r += '</div>';

                        write_r += '<div class="form-group has-feedback">';
                            write_r += '<label class="control-label" for="f_cp">Código Postal</label>';
                            write_r += '<input type="text" class="form-control" id="f_cp" name="f_cp">';
                            write_r += '<span class="text-danger glyphicon glyphicon-asterisk form-control-feedback" aria-hidden="true"></span>';
                        write_r += '</div>';

                        write_r += '<p><em>Sino requiere factura fiscal se le enviara solo un comprobante de compra con validez oficial.</em></p>';
                    write_r += '</div>';

                    write_r +='<div class="col-md-12">';
                        write_r += '<div class="checkbox">';
                        write_r += '<label>';
                        write_r += '<input id="show_fact" type="checkbox"> Haga clic si requiere factura fiscal digital. ';
                        write_r += '</label>';
                        write_r += '</div>';
                        write_r += '<div class="checkbox">';
                        write_r += '<label>';
                        write_r += '<input id="btn_aviso_privacidad" type="checkbox"> He leído y estoy de acuerdo con el <a target="_blank" href="http://www.massivepc.com/aviso-de-privacidad.php">Aviso de Privacidad</a>';
                        write_r += '</label>';
                        write_r += '</div>';
                        write_r +='<div class="row">';
                        write_r +='<div class="col-md-6 text-left">';
                        //write_r +='<!--<a class="btn btn-primary" href="#">Continuar Comprando</a>-->';
                        write_r +='</div>';
                        write_r +='<div class="col-md-6 text-right">';
                        write_r +='<input id="continuar_pagar" type="submit" name="verificar" value="Continuar" class="btn btn-success btn-lg disabled"/>';
                        write_r +='</div>';
                        write_r +='</div>';
                    write_r +='</div>';

                write_r += '</div>';
                write_r += '</form>';

                $('#titulo_v').text('Datos de Envío y Facturación');
                $('#content_cart_details').html(write_r);

                /**********/
                    $.ajax({
                        headers: { "cache-control": "no-cache" },
                        cache: false,
                        async: false,
                        method: 'POST',
                        dataType: 'json',
                        url: '/mayoreo/carrito/get_cookies_datos/?cb=' + cacheBusterGeneral
                    }).done(function(dat_co){
                        $('#nombre').val(dat_co.nombre);
                        $('#email').val(dat_co.email);
                        $('#telefono').val(dat_co.telefono);
                        $('#direccion').val(dat_co.direccion);
                        $('#colonia').val(dat_co.colonia);
                        $('#cp').val(dat_co.cp);
                        $('#poblacion').val(dat_co.poblacion);
                        $('#estado').val(dat_co.estado);
                        $('#comentarios').val(dat_co.comentarios);

                        $('#f_nombre').val(dat_co.f_nombre);
                        $('#f_rfc').val(dat_co.f_rfc);
                        $('#f_direccion').val(dat_co.f_direccion);
                        $('#f_colonia').val(dat_co.f_colonia);
                        $('#f_cp').val(dat_co.f_cp);
                        $('#f_poblacion').val(dat_co.f_poblacion);
                        $('#f_estado').val(dat_co.f_estado);
                        $('#f_telefono').val(dat_co.f_telefono);
                        $('#f_email').val(dat_co.f_email);
                    });
                    /**********/

                $('#show_fact').on('click', function(e){
                    if($('#show_fact').prop('checked') ) {
                        $('#envio_data').removeClass('col-md-12');
                        $('#envio_data').addClass('col-md-6');
                        $('#fact_data').show();
                    }else{
                        $('#fact_data').hide();
                        $('#envio_data').removeClass('col-md-6');
                        $('#envio_data').addClass('col-md-12');
                    }
                });

                $('#btn_aviso_privacidad').on('click', function(){
                    if( $('#btn_aviso_privacidad').prop('checked') ) {
                        $('#continuar_pagar').removeClass('disabled');
                    }else{
                        $('#continuar_pagar').addClass('disabled');
                    }
                });

                $('#datos_personales').on('submit', function(e){
                    e.preventDefault();
                    var continue_f = false;
                    /************/
                        var form_email = $('#email').val();
                        var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;

                        if(regex.test(form_email.trim())) {
                            $('#msg_envio_data').hide();
                            continue_f = true;
                        }else{
                            $('#msg_envio_data').addClass('alert-danger').show();
                            $('#msg_envio_data p').text('Formato de Correo invalido.');
                            continue_f = false;
                        }

                        var form_telefono = $('#telefono').val();
                        var regex_telefono = /^[0-9]{10}$/;

                        if(regex_telefono.test(form_telefono.trim())) {
                            $('#msg_envio_data').hide();
                            continue_f = true;
                        }else{
                            $('#msg_envio_data').addClass('alert-danger').show();
                            $('#msg_envio_data p').text('Formato del Teléfono invalido.');
                            continue_f = false;
                        }

                        var form_cp = $('#cp').val();
                        var regex_cp = /^[0-9]{5}$/;

                        if(regex_cp.test(form_cp.trim())) {
                            $('#msg_envio_data').hide();
                            continue_f = true;
                        }else{
                            $('#msg_envio_data').addClass('alert-danger').show();
                            $('#msg_envio_data p').text('Formato del Código Postal invalido.');
                            continue_f = false;
                        }

                    /************/
                    

                        if($('#show_fact').prop('checked')){

                            if($('#f_nombre').val() == ''){
                                $('#msg_envio_data').addClass('alert-danger').show();
                                $('#msg_envio_data p').text('Campo obligatorio.');
                                continue_f = false;
                            }

                            if($('#f_rfc').val() == ''){
                                $('#msg_envio_data').addClass('alert-danger').show();
                                $('#msg_envio_data p').text('Campo obligatorio.');
                                continue_f = false;
                            }

                            if($('#f_direccion').val() == ''){
                                $('#msg_envio_data').addClass('alert-danger').show();
                                $('#msg_envio_data p').text('Campo obligatorio.');
                                continue_f = false;
                            }

                            if($('#f_colonia').val() == ''){
                                $('#msg_envio_data').addClass('alert-danger').show();
                                $('#msg_envio_data p').text('Campo obligatorio.');
                                continue_f = false;
                            }

                            if($('#f_cp').val() == ''){
                                $('#msg_envio_data').addClass('alert-danger').show();
                                $('#msg_envio_data p').text('Campo obligatorio.');
                                continue_f = false;
                            }

                            if($('#f_poblacion').val() == ''){
                                $('#msg_envio_data').addClass('alert-danger').show();
                                $('#msg_envio_data p').text('Campo obligatorio.');
                                continue_f = false;
                            }

                            if($('#f_estado').val() == ''){
                                $('#msg_envio_data').addClass('alert-danger').show();
                                $('#msg_envio_data p').text('Campo obligatorio.');
                                continue_f = false;
                            }

                            if($('#f_email').val() == ''){
                                $('#msg_envio_data').addClass('alert-danger').show();
                                $('#msg_envio_data p').text('Campo obligatorio.');
                                continue_f = false;
                            }

                        }

                        if(continue_f == false){
                            return false;
                        }

                    $.ajax({
                        headers: { "cache-control": "no-cache" },
                        cache: false,
                        async: false,
                        method: 'POST',
                        dataType: 'json',
                        data: $('#datos_personales').serialize(),
                        url: '/mayoreo/pago/verificar?cd='+cacheBusterGeneral,

                    }).done(function(dr_) {

                        var nr_ = '';
                        nr_ += '<ul id="order_step" class="step clearfix">';
                            nr_ += '<li class="step_todo first"><a href="#01-Productos"><span><em>01.</em> Productos</span></a></li>';
                            nr_ += '<li class="step_todo second"><a href="#02-Datos"><span><em>02.</em> Datos</span></a></li>';
                            nr_ += '<li class="step_current last" id="step_end"><span><em>03.</em> Pagar</span></li>';
                        nr_ += '</ul>';

                        nr_ += '<div class="row">';

                            nr_ += '<div class="col-md-12"><fieldset><legend>Productos en su carrito</legend></fieldset>'+dr_.p_descripcion+'</div>';

                             nr_ += '<div class="col-md-6">';
                                 nr_ += '<fieldset><legend>Datos de Envío</legend></fieldset>';
                                 nr_ += '<ul class="list-group">';
                                     nr_ += '<li class="list-group-item">'+dr_.nombre+'</li>';
                                     nr_ += '<li class="list-group-item">'+dr_.email+'</li>';
                                     nr_ += '<li class="list-group-item">'+dr_.telefono+'</li>';
                                     nr_ += '<li class="list-group-item">'+dr_.direccion+'</li>';
                                     nr_ += '<li class="list-group-item">'+dr_.colonia+'</li>';
                                     nr_ += '<li class="list-group-item">'+dr_.cp+'</li>';
                                     nr_ += '<li class="list-group-item">'+dr_.estado+'</li>';
                                     nr_ += '<li class="list-group-item">'+dr_.poblacion+'</li>';
                                     if(dr_.comentarios != ''){
                                        nr_ += '<li class="list-group-item">'+dr_.comentarios+'</li>';
                                     }
                                 nr_ += '</ul>';
                            nr_ += '</div>';

                            if(dr_.f_rfc != ''){
                                nr_ += '<div class="col-md-6">';
                                    nr_ += '<div id="datos_facturacion">';
                                        nr_ += '<fieldset><legend>Datos de Facturación</legend></fieldset>';
                                        nr_ += '<ul class="list-group">';
                                            nr_ += '<li class="list-group-item">'+dr_.f_rfc+'</li>';
                                            nr_ += '<li class="list-group-item">'+dr_.f_nombre+'</li>';
                                            nr_ += '<li class="list-group-item">'+dr_.f_email+'</li>';
                                            nr_ += '<li class="list-group-item">'+dr_.f_direccion+'</li>';
                                            nr_ += '<li class="list-group-item">'+dr_.f_cp+'</li>';
                                            nr_ += '<li class="list-group-item">'+dr_.f_estado+'</li>';
                                            nr_ += '<li class="list-group-item">'+dr_.f_poblacion+'</li>';
                                            nr_ += '<li class="list-group-item">'+dr_.f_colonia+'</li>';
                                            nr_ += '<li class="list-group-item">'+dr_.f_telefono+'</li>';
                                        nr_ += '</ul>';
                                    nr_ += '</div>';
                                nr_ += '</div>';
                            }
                            
                                nr_ += '<div id="pay_data" class="col-md-12"> <form id="frm_pago" class="form-signin" method="post">';

                                        nr_ += '<fieldset><legend>Método de Pago</legend></fieldset>';

                                        nr_ += '<div class="panel panel-default">';
                                            nr_ += '<div class="panel-body">';
                                                nr_ += '<div class="radio">';
                                                    nr_ += '<label>';
                                                    nr_ += '<input type="radio" name="metodo_pago" class="metodo_pago" value="proc_transfer" checked>';
                                                    nr_ += 'Depósito en ventanilla o transferencia electrónica en BANCOMER SANTANDER BANORTE / IXE';
                                                    nr_ += '</label>';
                                                nr_ += '</div>';
                                                nr_ += '<img src="/mayoreo/assets/img/BAN-1.png"/> <img src="/mayoreo/assets/img/logo-santander.jpg"/> <img src="/mayoreo/assets/img/logo-ixe.jpg"/>';
                                            nr_ += '</div>';
                                        nr_ += '</div>';

                                        nr_ += '<div class="panel panel-default">';
                                            nr_ += '<div class="panel-body">';
                                                nr_ += '<div class="radio">';
                                                    nr_ += '<label>';
                                                    nr_ += '<input type="radio" name="metodo_pago" class="metodo_pago" value="proc_paypal">';
                                                    nr_ += 'PayPal (Aplica 24hrs hábiles).';
                                                    nr_ += '</label>';
                                                nr_ += '</div>';
                                                nr_ += '<img src="/mayoreo/assets/img/paypal-icons.gif"/>';
                                            nr_ += '</div>';
                                        nr_ += '</div>';
                                        
                                        //nr_ += '<input type="hidden" value="'+dr_.p_codigo+'"> </form> </div>';

                                nr_ +='<div class="col-md-12 text-right">';
                                    nr_ +=' <a id="pagar" class="btn btn-success btn-lg">Pagar</a>';
                                nr_ +='</div>';

                        nr_ += '</div>';

                        

                        $('#titulo_v').text('Método de pago');
                        $('#content_cart_details').html(nr_);

                        $('#pagar').on('click', function(e){
                            e.preventDefault();
                            $('#frm_pago').trigger('submit');                            
                        });

                        $('#frm_pago').on('submit', function(e){
                            e.preventDefault();

                            var metodo_pago = $('input:radio[name=metodo_pago]:checked').val();

                            $.ajax({
                                headers: { "cache-control": "no-cache" },
                                cache: false,
                                async: false,
                                method: 'POST',
                                dataType: 'json',
                                data: $('#frm_pago').serialize(),
                                url: '/mayoreo/pago/'+metodo_pago+'?cd='+cacheBusterGeneral,

                            }).done(function(rv_) {
                                //$('#titulo_v').text('Método de pago');
                                $('#content_cart_details').html(rv_.return_content);
                            });

                        });
                    });
                });

}

/*Colocar pedido ON*/
    function btn_pagar(){

        $('#btn_pagar').on('click', function(e){
            e.preventDefault();
            frm_datos();
        });

    }
    
/*Colocar pedido OFF*/

    /*NEW AGREGAR ON*/
        $('.new_add').on('click', function(e){

            e.preventDefault();
            var arrText = new Array();
            var items_c = 0;
            var continue_e = 0;

            $('.cantidad').each(function(i, v) {
                var id = $(this).next('a').data('id');
                var exist = $(this).next('a').data('exist');
                var price = $(this).next('a').data('price');
                var mayoreo = $(this).next('a').data('mayoreo');
                var distribuidor = $(this).next('a').data('distribuidor');
                var name = $(this).next('a').data('name');
                var imagen = $(this).next('a').data('imagen');
                var cantidada_c = $(this).val();
                if(exist < cantidada_c){
                    //_open_modal_alert('<div class="alert alert-danger" role="alert">Existencia insuficiente</div>',false);
                    _open_alert('Existencia insuficiente');
                     continue_e = 0;
                }else{
                     continue_e = 1;
                    if(cantidada_c > 0){
                        items_c += 1;
                        arrText.push({
                            'id': id,
                            'name': name,
                            'qty': $(this).val(),
                            'exist': exist,
                            'price': price,
                            'mayoreo': mayoreo,
                            'distribuidor': distribuidor,
                            'imagen': imagen
                        });
                    }
                }
            });

            if(continue_e == 1){
                if(items_c > 0){
                    var myJsonString = JSON.stringify(arrText);
                    $.ajax({
                        headers: { "cache-control": "no-cache" },
                        cache: false,
                        async: false,
                        method: 'POST',
                        data: 'set_data=' + myJsonString,
                        dataType: 'json',
                        url: '/mayoreo/carrito/add_ajax_e?cb=' + cacheBusterGeneral,
                    }).done(function(drv) {
                        $('.cantidad').val('');
                        get_content_cart();
                    });
                }
            }
            
        });
        
    /*NEW AGREGAR OFF*/
    
    

   
    function myCall(id_product) {
        var output;
        var request = $.ajax({
            url: '/mayoreo/carrito/get_name_product',
            type: "GET",            
            dataType: "json",
            async: false,
            data:{'id_product':id_product}
        });
        request.done(function(msg) {
            output = msg;
        });
        return output.products_name;
    }

    /*DETALLE TOTAL ON*/
    function get_content_cart(){
        get_totales();

        $.getJSON('/mayoreo/carrito/contents', function(data_dt){

            var count_qty = 0;
            var p_precio = 0;
            var p_mayoreo = 0;
            var p_distribuidor = 0;
            var write_r = '';
            write_r += '<ul id="order_step" class="step clearfix">';
            write_r += '<li class="step_current first"><span><em>01.</em> Productos</span></li>';
            write_r += '<li class="step_todo second"><span><em>02.</em> Datos</span></li>';
            write_r += '<li class="step_todo last" id="step_end"><span><em>03.</em> Pagar</span></li>';
            write_r += '</ul>';
            write_r += '<form method="post" action="'+base_path+'carrito/actualizar"><table class="table table-striped">';
            write_r += '<thead>';
            write_r += '<tr>';
            write_r += '<th>Código</th>';
            write_r += '<th></th>';
            write_r += '<th>Producto</th>';
            write_r += '<th>Cantidad</th>';
            write_r += '<th>P.Unitario</th>';
            write_r += '<th>Subtotal</th>';
            write_r += '<th> </th>';
            write_r += '</tr>';
            write_r += '</thead>';
            var zx = 0;
            $.each(data_dt, function(i2, v2) {
                zx ++;
                count_qty += parseInt(v2.qty);
                write_r += '<tr>';
                write_r += '<td>' + v2.id + '<input type="hidden" value="'+v2.rowid+'" name="rowid['+zx+']"></td>';
                write_r += '<td><img style="max-width:none;" height="80px" width="80px" src="/images/' + v2.options.imagen + '" class="img-thumbnail"></td>';
                write_r += '<td><a target="_blank" href="http://www.massivepc.com/-p-' + v2.id + '.html">' + myCall(v2.id)  + '</a></td>';
                write_r += '<td><input class="form-control input-sm qty_v_edit text-center" data-qty_act="' + v2.qty + '" data-exist="'+v2.options.exist+'" data-id_editar="' + v2.rowid + '" name="qty['+zx+']" style="width:52px;" value="' + v2.qty + '"> <a class="btn btn-default btn-xs subtractqty"><i class="text-danger glyphicon glyphicon-minus-sign"></i></a> <a class="btn btn-default btn-xs plusqty"><i class="text-success glyphicon glyphicon-plus-sign"></i></a> </td>';
                write_r += '<td class="text-right">';
                write_r += '<span class="list_pp_j">' + v2.price + '</span>';
                write_r += '<span class="list_pm_j">' + v2.options.mayoreo + '</span>';
                write_r += '<span class="list_pd_j">' + v2.options.distribuidor + '</span>';
                write_r += '</td>';
                write_r += '<td class="text-right">';
                write_r += '<span class="list_pp_j">' + parseInt(v2.price * v2.qty) + '</span>';
                write_r += '<span class="list_pm_j">' + parseInt(v2.options.mayoreo * v2.qty) + '</span>';
                write_r += '<span class="list_pd_j">' + parseInt(v2.options.distribuidor * v2.qty) + '</span>';
                write_r += '</td>';
                write_r += '<td>';
                write_r += '<a data-id_eliminar="' + v2.rowid + '" class="btn btn-danger btn-sm eliminar_ajax" href="#_-_"><span class="glyphicon glyphicon-trash"></span> Eliminar</a>';
                write_r += '</td>';
                write_r += '</tr>';
                p_precio += parseInt(v2.price * v2.qty);
                p_mayoreo += parseInt(v2.options.mayoreo * v2.qty);
                p_distribuidor += parseInt(v2.options.distribuidor * v2.qty);
            });
            write_r += '<tr>';
            write_r += '<td colspan="3"></td>';
            write_r += '<td colspan="4" class="text-right">';
            write_r += '<span class="label_d text-right">Precio Publico:</span> <span id="subtotal_publico_j"> </span><br>';
            write_r += '<span class="label_d text-right">Precio Mayoreo:</span> <span id="subtotal_mayoreo_j"> </span><br>';
            write_r += '<span class="label_d text-right">Precio Distribuidor:</span> <span id="subtotal_distribuidor_j"> </span><br>';
            write_r += '<span class="label_d text-right">Envío por DHL (Hasta 20 kg):</span> <span style="width:75px;display: inline-block;">$120.00 </span><hr>';
            write_r += '<strong class="label_d text-right">Total:</strong> <span id="total_j" style="width:75px;display: inline-block;"> </span>';
            write_r += '</td>';
            write_r += '</tr>';
            write_r += '<p id="msg_empty_cart" class="alert alert-warning">Su carrito está vacío.</p>';
            write_r += '<tr>';
            write_r += '<td colspan="7"><div class="row"><div class="col-md-4 text-left"><a class="btn btn-primary btn-lg" href="#continuar_comprando" onClick="$(\'#myModal\').modal(\'hide\');">Continuar comprando</a></div><div class="col-md-4 text-center"><div class="alert alert-info" role="alert"> Precio aplicado <strong id="p_aplicado"></strong> </div></div><div class="col-md-4 text-right"><a href="#" id="btn_pagar" class="btn btn-success btn-lg">Colocar pedido <span class="glyphicon glyphicon-arrow-right"></span></a></div></div></td>';
            write_r += '</tr>';
            write_r += '</table></form>';

            $('#titulo_v').html('Productos en su carrito');
            $('#content_cart_details').html(write_r);
            $('#myModal').modal({
                keyboard: false
            });
            $('#myModal').modal('show');
            $('#subtotal_publico_j,#subtotal_mayoreo_j,#subtotal_distribuidor_j').removeClass('tachado');
            $('#subtotal_publico_j,#subtotal_mayoreo_j,#subtotal_distribuidor_j').removeClass('validado');
            $('.list_pp_j,.list_pm_j,.list_pd_j').css('display', 'none');

            /**/
            if (p_distribuidor > 9999) {
                $('#subtotal_mayoreo_j').addClass('tachado');
                $('#subtotal_publico_j').addClass('tachado');
                $('#subtotal_distribuidor_j').addClass('validado');
                $('#total_j').text(p_distribuidor + 120);
                //$('#pagar_j,#actualizar_j').removeClass('disabled');
                $('#msg_empty_cart').hide();
                $('#btn_pagar').removeAttr('disabled');
                $('.list_pd_j').show();
                $('#p_aplicado').text('Distribuidor');
            } else if (p_mayoreo > 4999) {
                $('#subtotal_publico_j').addClass('tachado');
                $('#subtotal_distribuidor_j').addClass('tachado');
                $('#subtotal_mayoreo_j').addClass('validado');
                $('#total_j').text(p_mayoreo + 120);
                //$('#pagar_j,#actualizar_j').removeClass('disabled');
                $('#msg_empty_cart').hide();
                $('#btn_pagar').removeAttr('disabled');
                $('.list_pm_j').show();
                $('#p_aplicado').text('Mayoreo');
            } else {
                $('#subtotal_distribuidor_j').addClass('tachado');
                $('#subtotal_mayoreo_j').addClass('tachado');
                $('#subtotal_publico_j').addClass('validado');
                $('#total_j').text(p_precio + 120);
                if ($('#total_j').text() <= 120) {
                    $('#btn_pagar').addClass('disabled');
                    $('#btn_pagar').attr('disabled','disabled');
                    $('#msg_empty_cart').show();
                } else {
                    $('#btn_pagar').removeClass('disabled');
                    $('#btn_pagar').removeAttr('disabled');
                    $('#msg_empty_cart').hide();
                }
                $('.list_pp_j').show();
                $('#p_aplicado').text('Publico');
            }

            $('#subtotal_publico_j').text(p_precio);
            $('#subtotal_mayoreo_j').text(p_mayoreo);
            $('#subtotal_distribuidor_j').text(p_distribuidor);
            $('#subtotal_publico_j,#subtotal_mayoreo_j,#subtotal_distribuidor_j,.list_pp_j,.list_pm_j,.list_pd_j').currency({
                region: 'MXN'
            });

            $('#total_j').currency({
                region: 'MXN'
            });

            btn_pagar();

            $(window).on('hashchange',function(){

                var hj = location.hash.slice(1);
                if(hj == '02-Datos'){
                    console.log('Entro');
                    frm_datos();
                    window.location.hash = '#massivepc';
                }

            });

            

            $('.plusqty').bind('click', function() {
                $('#titulo_v').html('Cargando <img width="20px" height="20px" src="https://www.massivepc.com/mayoreo/assets/img/loading.gif" />');
                $(this).parent().find('input[name*=\'qty\']').val(Number($(this).parent().find('input[name*=\'qty\']').val())+1);
                var row = $(this).parent().find('input[name*=\'qty\']').data('id_editar');
                var exist = $(this).parent().find('input[name*=\'qty\']').data('exist');
                var qty_act = $(this).parent().find('input[name*=\'qty\']').data('exist');
                var val = $(this).parent().find('input[name*=\'qty\']').val();
                if(val > exist){
                    //_open_modal_alert('<div class="alert alert-danger" role="alert">Existencia insuficiente</div>',false);
                    _open_alert('Existencia insuficiente');
                    $('#titulo_v').html('Productos en su carrito');
                    $(this).parent().find('input[name*=\'qty\']').val(qty_act);
                }else{
                    edit_qty(row,val);
                }
            });

            $('.subtractqty').bind('click', function() {
                $('#titulo_v').html('Cargando <img width="20px" height="20px" src="https://www.massivepc.com/mayoreo/assets/img/loading.gif" />');
                $(this).parent().find('input[name*=\'qty\']').val(Number($(this).parent().find('input[name*=\'qty\']').val())-1);
                var row = $(this).parent().find('input[name*=\'qty\']').data('id_editar');
                var exist = $(this).parent().find('input[name*=\'qty\']').data('exist');
                var qty_act = $(this).parent().find('input[name*=\'qty\']').data('exist');
                var val = $(this).parent().find('input[name*=\'qty\']').val();
                if(val > exist){
                    //_open_modal_alert('<div class="alert alert-danger" role="alert">Existencia insuficiente</div>',false);
                    _open_alert('Existencia insuficiente');
                    $('#titulo_v').html('Productos en su carrito');
                    $(this).parent().find('input[name*=\'qty\']').val(qty_act);
                }else{
                    edit_qty(row,val);
                }
            });

            $('.qty_v_edit').typeWatch({
                highlight: true, wait: 600, captureLength: 0, callback: function(val){
                    $('#titulo_v').html('Cargando <img width="20px" height="20px" src="https://www.massivepc.com/mayoreo/assets/img/loading.gif" />');
                    var ob = this.el;
                    var row = $(ob).data('id_editar');
                    var exist = $(ob).data('exist');
                    var qty_act = $(ob).data('qty_act');
                    if(val > exist){
                        //_open_modal_alert('<div class="alert alert-danger" role="alert">Existencia insuficiente</div>',false);
                        _open_alert('Existencia insuficiente');
                        $('#titulo_v').html('Productos en su carrito');
                        $(ob).val(qty_act);

                    }else{
                        edit_qty(row,val);
                    }
                }
            });

            /*Eliminar*/

            $('.eliminar_ajax').on('click', function(e) {
                e.preventDefault();

                $('#titulo_v').html('Cargando <img width="20px" height="20px" src="https://www.massivepc.com/mayoreo/assets/img/loading.gif" />');
                var id_eliminar = $(this).data('id_eliminar');
                $.ajax({
                    headers: { "cache-control": "no-cache" },
                    cache: false,
                    async: false,
                    method: 'POST',
                    dataType: 'json',
                    data: 'rowid=' + id_eliminar,
                    url: '/mayoreo/carrito/delete_ajax/?cb=' + cacheBusterGeneral,
                }).done(function(dc) {

                    get_content_cart();
                    $('#titulo_v').html('Productos en su carrito');

                }).fail(function(jqxhr, textStatus, error) {
                    _open_modal_alert('<div class="alert alert-danger" role="alert"> Ocurrió un error por favor vuelva a intentarlo </div>',false);
                });
            });

            /*Eliminar OFF*/

            $('.cantidad').val('');

        });
    }
    $('.detalle_total').on('click', function(e) {
        e.preventDefault();
        get_content_cart();
    });
    /*DETALLE TOTAL OFF*/

    get_totales();

    var hash_z = window.location.hash.substr(1);
    
    var hash_z2 = hash_z.split('-');

    if(hash_z == 'modal_products'){
        $('.detalle_total')[0].click();
    }

    if(hash_z2[0] != ''){
        s_e_p(hash_z2[0],hash_z2[1]);
    }

    $(window).on('hashchange',function(){ 
        var hj = location.hash.slice(1);
        if(hj == '01-Productos'){
            $('.detalle_total')[0].click();
            window.location.hash = '#massivepc';
        }
    });

    function s_e_p(op,nc){
        $.getJSON(base_path+'pago/s_e_p',{'op':op,'nc':nc}, function(return_e) {
            if(return_e.estatus_return == 'Cancelado'){
                _open_modal_alert('<div class="alert alert-danger" role="alert">Pedido '+return_e.pedido.id+' cancelado</div>',false);
            }else if(return_e.estatus_return == 'Completado'){
                _open_modal_alert('<div class="alert alert-success" role="alert">Pedido '+return_e.pedido.id+' pagado</div>',false);
            }
        });
    }
    

});

    