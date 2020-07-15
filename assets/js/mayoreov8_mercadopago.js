/*
* 
* @Author Juan Pablo Cruz García
* @version 8
* 
* 
* - Mayoreo.js
* 
* 
*/
var cacheBusterGeneral = new Date().getTime();

var p_precio = 0;
        var p_mayoreo = 0;
        var p_distribuidor = 0;
        var cacheBuster1 = new Date().getTime();

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

function get_pedido(id_pedido){
    $.getJSON('/mayoreo/pago/get_pedido/'+id_pedido+'?cb=' + cacheBusterGeneral, function(g_data_response_) {
        //console.log( "success" );
    });
}

$(document).ready(function() {

    $.ajaxSetup({
        cache: false
    });

    $('.fancybox2').fancybox();

    $('#validar_mail').click(function() {
        var correo_boletin = $('#correo_boletin').val();
        var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;

        if (regex.test(correo_boletin.trim())) {

            $.ajax({

                cache: false,
                method: 'POST',
                dataType: 'json',
                data: 'email=' + correo_boletin,
                url: '/mayoreo/boletin/validar/?cb=' + cacheBusterGeneral,

            }).done(function(email_response) {
                $('.modal-body').html(email_response.msg);

            });

            $('.modal-title').text('Boletín');
            $('#myModal').modal({
                backdrop: 'static',
                keyboard: false
            });
            $('#myModal').modal('show');

        } else {
            $('.modal-title').text('Boletín');
            $('.modal-body').html('<span class="glyphicon glyphicon-warning-sign"></span> Formato de correo invalido.');
            $('#myModal').modal({
                backdrop: 'static',
                keyboard: false
            });
            $('#myModal').modal('show');

        }

    });

    $('.cantidad').keyup(function() {

        var stock_j  = $(this).data('exist');
        var existp_j = $(this).val();

        console.log('Stock='+stock_j+' Pedido='+existp_j);

        if(existp_j > stock_j){

            $('.cantidad').attr('disabled','disabled');
            $('.dfsdf').addClass('disabled');
            $(this).removeAttr('disabled');

            $(this).popover({
                html:true,
                trigger:'manual',
                content:'<i class="fa fa-cube"></i> Stock insuficiente'
            });

            $(this).popover('show');

        }else{

            $(this).popover('hide');
            $('.cantidad').removeAttr('disabled');
            $('.dfsdf').removeClass('disabled');

        }

    });

    $('.dfsdf').on('click', function(e) {
        e.preventDefault();
        var arrText = new Array();

        $('.cantidad').each(function(i, v) {

            var id = $(this).next('a').data('id');
            var exist = $(this).next('a').data('exist');
            var price = $(this).next('a').data('price');
            var mayoreo = $(this).next('a').data('mayoreo');
            var distribuidor = $(this).next('a').data('distribuidor');
            var name = $(this).next('a').data('name');
            var imagen = $(this).next('a').data('imagen');
            if(exist < $(this).val()){
                alert('Stock insuficiente para el producto:'+id+' - '+name);
                return false;
            }else{
                if ($(this).val() != '') {
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

        var myJsonString = JSON.stringify(arrText);
		
        $.ajax({

            cache: false,
            method: 'POST',
            data: 'set_data=' + myJsonString,
            dataType: 'json',
            url: '/mayoreo/carrito/agregar/' + cacheBuster1 + '?cb=' + cacheBuster1,

            }).done(function(data_response) {

            var write_r = '<table class="table table-striped">';
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

            //response = JSON.parse(data_response);

            $.each(data_response, function(i2, v2) {
                write_r += '<tr>';
                write_r += '<td>' + v2.id + '</td>';
                write_r += '<td><img style="max-width:none;" height="80px" width="80px" src="/images/' + v2.options.imagen + '" class="img-thumbnail"></td>';
                write_r += '<td><a target="_blank" href="http://www.massivepc.com/-p-' + v2.id + '.html">' + v2.name + '</a></td>';
                write_r += '<td><input class="form-control input-sm qty_v_edit text-center" data-id_editar="' + v2.rowid + '" style="width:50px;" value="' + v2.qty + '"></td>';
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
                write_r += '<a data-id_eliminar="' + v2.rowid + '" class="btn btn-danger btn-xs eliminar_ajax" href="#_-_"><span class="glyphicon glyphicon-trash"></span> Eliminar</a>';
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
            write_r += '<span class="label_d text-right">Envío:</span> <span style="width:75px;display: inline-block;">$99.00 </span><hr>';
            write_r += '<strong class="label_d text-right">Total:</strong> <span id="total_j" style="width:75px;display: inline-block;"> </span>';
            write_r += '</td>';
            write_r += '</tr>';
            write_r += '<tr>';
            write_r += '<td colspan="4"></td> <td colspan="3" class="text-right"><a id="btn_sig_1" class="btn btn-primary" disabled="disabled">Siguiente <span class="glyphicon glyphicon-arrow-right"></span></a></td>';
            write_r += '</tr>';
            write_r += '</table>';

            $('.modal-title').text('Productos agregados correctamente.');
            $('.modal-body').html(write_r);
            $('#myModal').modal({
                backdrop: 'static',
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
                $('#total_j').text(p_distribuidor + 99);
                $('#pagar_j,#actualizar_j').removeClass('disabled');
                $('#btn_sig_1').removeAttr('disabled');
                $('.list_pd_j').show();
            } else if (p_mayoreo > 4999) {
                $('#subtotal_publico_j').addClass('tachado');
                $('#subtotal_distribuidor_j').addClass('tachado');
                $('#subtotal_mayoreo_j').addClass('validado');
                $('#total_j').text(p_mayoreo + 99);
                $('#pagar_j,#actualizar_j').removeClass('disabled');
                $('#btn_sig_1').removeAttr('disabled');
                $('.list_pm_j').show();
            } else {
                $('#subtotal_distribuidor_j').addClass('tachado');
                $('#subtotal_mayoreo_j').addClass('tachado');
                $('#subtotal_publico_j').addClass('validado');
                $('#total_j').text(p_precio + 99);
                if ($('#total_j').text() <= 99) {
                    $('#pagar_j,#actualizar_j').addClass('disabled');
                    $('#btn_sig_1').attr('disabled', 'disabled');
                } else {
                    $('#pagar_j,#actualizar_j').removeClass('disabled');
                    $('#btn_sig_1').removeAttr('disabled');
                }
                $('.list_pp_j').show();
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

            /*Eliminar*/
            $('.eliminar_ajax').on('click', function(e) {
                e.preventDefault();
                var id_eliminar = $(this).data('id_eliminar');
                var cacheBuster2 = new Date().getTime();
                $.ajax({

                    cache: false,
                    method: 'POST',
                    data: 'rowid=' + id_eliminar,
                    url: '/mayoreo/carrito/eliminar/' + cacheBuster2 + '?cb=' + cacheBuster2,
                }).done(function(data_response) {
                    $('#myModal').modal('hide');
                    /*$('#myModal').on('hidden.bs.modal', function (e) {
                      $('.dfsdf').trigger('click');
                    });*/
                    //cart_content();
                }).fail(function(jqxhr, textStatus, error) {
                    alert('Error:' + jqxhr + '-' + textStatus + '-' + error);
                });
            });
            /*Eliminar OFF*/

            /*Editar*/
            $('.qty_v_edit').keyup(function() {
                var rowid = $(this).data('id_editar');
                var new_qty = $(this).val();
                var cacheBuster3 = new Date().getTime();
                $.ajax({

                    cache: false,
                    method: 'POST',
                    data: 'rowid=' + rowid + '&qty=' + new_qty,
                    url: '/mayoreo/carrito/editar_ajax/' + cacheBuster3 + '?cb=' + cacheBuster3,
                }).done(function(data_response) {
                    $('#myModal').modal('hide');
                    /*$('#myModal').on('hidden.bs.modal', function (e) {
                      $('.dfsdf').trigger('click');
                    });*/
                    //cart_content();
                }).fail(function(jqxhr, textStatus, error) {
                    alert('Error:' + jqxhr + '-' + textStatus + '-' + error);
                });
            });
            /*Editar OFF*/
            $('.cantidad').val('');
            /**/

            $('#btn_sig_1').on('click', function() {
                $('.modal-body').html('<div class="ajax_loading_js"></div>');
                $('.modal-title').text('Datos de envío y facturación');
                $('.modal-body').load('/mayoreo/pago/ajax_mercadopago', function() {

                    
                    /***************/
                    $('#email').on('focusout', function() {

                        var email_pago = $(this).val();
                        var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;

                        if (regex.test(email_pago.trim())) {

                            $('.verify_disabled').removeAttr('disabled');

                            $('#show_fact').on('click', function() {
                                if ($('#show_fact').is(':checked')) {
                                    $('#datos_facturacion').slideDown();

                                } else {
                                    $('#datos_facturacion').slideUp();
                                }
                            });

                            var cacheBuster4 = new Date().getTime();

                            $.ajax({

                                cache: false,
                                method: 'POST',
                                dataType: 'json',
                                data: 'email=' + email_pago,
                                url: '/mayoreo/pago/member/' + cacheBuster4,
                            }).done(function(data_member) {

                                $.each(data_member, function(index, value) {
                                    $('#email').val(value.email);
                                    $('#nombre').val(value.nombre);
                                    $('#direccion').val(value.direccion);
                                    $('#colonia').val(value.colonia);
                                    $('#cp').val(value.cp);
                                    $('#poblacion').val(value.poblacion);
                                    $('#estado').val(value.estado);
                                    $('#telefono').val(value.telefono);

                                    $('#f_nombre').val(value.f_nombre);
                                    $('#f_rfc').val(value.f_rfc);
                                    $('#f_direccion').val(value.f_direccion);
                                    $('#f_colonia').val(value.f_colonia);
                                    $('#f_cp').val(value.f_cp);
                                    $('#f_poblacion').val(value.f_poblacion);
                                    $('#f_estado').val(value.f_estado);
                                    $('#f_telefono').val(value.f_telefono);
                                });


                                $('#f_rfc').on('focusout', function() {

                                    var con = $('#f_rfc').val().trim();
                                    if(ValidaRfc(con) == false){
                                        $('#continuar').attr('disabled','disabled');
                                        alert('El rfc es incorrecto.');
                                    }else{
                                        $('#continuar').removeAttr('disabled');
                                        
                                    }
                                });

                                $('.solo-numeros').keyup(function (){
                                    this.value = (this.value + '').replace(/[^0-9]/g, '');
                                });

                                $('#continuar').on('click', function(e) {

                                        e.preventDefault();

                                        $(this).attr('disabled','disabled');

                                        $.ajax({
                                            cache: false,
                                            method: 'POST',
                                            dataType: 'json',
                                            data: $('#datos_personales').serializeArray(),
                                            url: '/mayoreo/pago/generar_mercadopago/' + cacheBuster4,

                                        }).done(function(data_pago) {

                                            $('.modal-body').html('<div class="ajax_loading_js"></div>');
                                            $('.modal-title').text('Elige el método de pago');
                                            $('.modal-body').load('/mayoreo/pago/metodo/'+data_pago.pedido_id, function() {

                                                $.getScript('https://resources.mlstatic.com/mptools/render.js')
                                                  .done(function( script, textStatus ) {

                                                    var init_point_massivepc   = $('#cont_mp_').attr('href');

                                                    $('.btn_metodo_').on('click', function(e){

                                                        e.preventDefault();
                                                        $('.modal-title').text('Procesando…');
                                                        $('.modal-body').html('<div class="ajax_loading_js"></div>');
                                                        $('.btn_metodo_').attr('disabled','disabled');

                                                        var metodo = $(this).data('metodo');

                                                        if(metodo == 'metodo_mercadopago'){

                                                            $('#myModal').modal('hide');

                                                            $MPC.openCheckout ({
                                                                url: init_point_massivepc,
                                                                mode: '[modal]',
                                                                onreturn: function(data) {
                                                                    if (data.collection_status=='approved'){
                                                                        console.log('Pago aprobado.');
                                                                    } else if(data.collection_status=='pending'){
                                                                        console.log ('No completó el pago.');
                                                                    } else if(data.collection_status=='in_process'){    
                                                                        console.log ('Pago en proceso de revisión.');    
                                                                    } else if(data.collection_status=='rejected'){
                                                                        console.log ('Pago rechazado, intente nuevamente.');
                                                                    } else if(data.collection_status==null){
                                                                        console.log ('No se completó el proceso de pago, no se ha generado ningún pago.');
                                                                    }
                                                                }
                                                            });

                                                        }else{
                                                            //console.log('Metodo deposito');
                                                            $.getJSON('/mayoreo/pago/get_pedido/'+data_pago.pedido_id+'?cb=' + cacheBusterGeneral, function(g_data_response_) {
                                                                //console.log( "success" );
                                                                $('.modal-title').text('Detalle del pedido #'+data_pago.pedido_id);
                                                                $('.modal-body').html(g_data_response_.contenido);
                                                            });

                                                        }

                                                    });


                                                  });


                                        });

                                                              

                                    });

                                });

                            }).fail(function(jqxhr, textStatus, error) {
                                alert('Error:' + jqxhr + '-' + textStatus + '-' + error);
                            });

                        } else {

                            $('.verify_disabled').attr('disabled', 'disabled');
                            alert('El formato del correo es incorrecto.');

                        }

                    });
                });
            });

        }).fail(function(jqxhr, textStatus, error) {

            $('.modal-title').text('Error');
            $('.modal-body').text(jqxhr + '-' + textStatus + '-' + error);
            $('#myModal').modal({
                backdrop: 'static',
                keyboard: false
            });
            $('#myModal').modal('show');
        });


    });

});