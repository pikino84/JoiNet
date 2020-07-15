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
    var p_mayoreo = 0;
    var p_distribuidor = 0;

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

    function _open_modal_alert(msg,redirect){
        $('#modal_alert').modal('show');
        $('#content_alert').html(msg);
        if(redirect != false){
            $('#modal_alert').on('hidden.bs.modal', function (e) {
                location.href=redirect;
            });
        }
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

    $('.cantidad').keyup(function() {

        var stock_j  = $(this).data('exist');
        var existp_j = $(this).val();

        if(existp_j > 0){

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

        }else{
            $(this).val('');
        }

        

    });
    /*NEW AGREGAR ON*/
        $('.new_add').on('click', function(e){

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
                    _open_modal_alert('<div class="alert alert-danger" role="alert">Stock insuficiente para el producto:'+id+' - '+name+'</div>',false);
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
                url: '/mayoreo/carrito/agregar/' + cacheBusterGeneral + '?cb=' + cacheBusterGeneral,

            }).done(function(data_response) {
               // _open_modal_alert('<div class="alert alert-success" role="alert">Productos agregados</div>',false);
               _open_modal_alert_cb('<div class="alert alert-success" role="alert">Productos agregados</div>',true);
            });

        });
        
    /*NEW AGREGAR OFF*/
    /*DETALLE TOTAL ON*/
    function get_content_cart(){

        $.getJSON('/mayoreo/carrito/contents', function(data_dt){

            var p_precio = 0;
            var p_mayoreo = 0;
            var p_distribuidor = 0;
            var write_r = '<form method="post" action="'+base_path+'carrito/actualizar"><table class="table table-striped">';
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
                write_r += '<tr>';
                write_r += '<td>' + v2.id + '<input type="hidden" value="'+v2.rowid+'" name="rowid['+zx+']"></td>';
                write_r += '<td><img style="max-width:none;" height="80px" width="80px" src="/images/' + v2.options.imagen + '" class="img-thumbnail"></td>';
                write_r += '<td><a target="_blank" href="http://www.massivepc.com/-p-' + v2.id + '.html">' + v2.name + '</a></td>';
                write_r += '<td><input class="form-control input-sm qty_v_edit text-center" data-id_editar="' + v2.rowid + '" name="qty['+zx+']" style="width:50px;" value="' + v2.qty + '"></td>';
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
            write_r += '<span class="label_d text-right">Envío:</span> <span style="width:75px;display: inline-block;">$120.00 </span><hr>';
            write_r += '<strong class="label_d text-right">Total:</strong> <span id="total_j" style="width:75px;display: inline-block;"> </span>';
            write_r += '</td>';
            write_r += '</tr>';
            write_r += '<tr>';
            write_r += '<td colspan="4"><input type="submit" value="Actualice su Carrito" class="btn btn-success"></td> <td colspan="3" class="text-right"><a id="btn_sig_1" class="btn btn-primary" disabled="disabled">Siguiente <span class="glyphicon glyphicon-arrow-right"></span></a></td>';
            write_r += '</tr>';
            write_r += '</table></form>';

            $('.modal-title').text('Productos agregados.');
            $('.modal-body').html(write_r);
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
                $('#pagar_j,#actualizar_j').removeClass('disabled');
                $('#btn_sig_1').removeAttr('disabled');
                $('.list_pd_j').show();
            } else if (p_mayoreo > 4999) {
                $('#subtotal_publico_j').addClass('tachado');
                $('#subtotal_distribuidor_j').addClass('tachado');
                $('#subtotal_mayoreo_j').addClass('validado');
                $('#total_j').text(p_mayoreo + 120);
                $('#pagar_j,#actualizar_j').removeClass('disabled');
                $('#btn_sig_1').removeAttr('disabled');
                $('.list_pm_j').show();
            } else {
                $('#subtotal_distribuidor_j').addClass('tachado');
                $('#subtotal_mayoreo_j').addClass('tachado');
                $('#subtotal_publico_j').addClass('validado');
                $('#total_j').text(p_precio + 120);
                if ($('#total_j').text() <= 120) {
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
                $.ajax({
                    cache: false,
                    method: 'POST',
                    data: 'rowid=' + id_eliminar,
                    url: '/mayoreo/carrito/eliminar/' + cacheBusterGeneral + '?cb=' + cacheBusterGeneral,
                }).done(function(data_response) {
                    $('#myModal').modal('hide');
                    _open_modal_alert('<div class="alert alert-success" role="alert">Producto eliminado</div>', 'https://www.massivepc.com/mayoreo/?cb='+cacheBusterGeneral);
                }).fail(function(jqxhr, textStatus, error) {
                    _open_modal_alert('<div class="alert alert-danger" role="alert">Error:' + jqxhr + '-' + textStatus + '-' + error+'</div>',false);
                });
            });
            /*Eliminar OFF*/
            $('.cantidad').val('');

            $('#destroy').on('click', function(e){
                e.preventDefault();
                $.getJSON('/mayoreo/carrito/destroy_cart', function( json ) {
                    
                });
            });
            
            $('#btn_sig_1').on('click', function(e) {
                e.preventDefault();
                $('.modal-body').html('<div class="ajax_loading_js"></div>');
                $('.modal-title').text('Datos de envío y facturación');
                var vl_1 = '0';

                vl_1++;
                if(vl_1 == '1'){
                    
                    /*Condicion ON*/
                    /*Carga ventana de pago ON*/
                $('.modal-body').load('/mayoreo/pago/ajax_paypal'+ '?rand=' + new Date().getTime(), function(responseTxt, statusTxt, xhr) {
                    vl_1++;
                    
                    //console.log(vl_1);
                    
                    if(vl_1 == '2'){

                        /*Ejecuta Instruccion ON*/
                        //console.log('Entro'+vl_1);

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
                            
                            $.ajax({
                                headers: { "cache-control": "no-cache" },
                                method: 'POST',
                                dataType: 'json',
                                data: 'email=' + email_pago,
                                async: true,
                                url: '/mayoreo/pago/member'+ '?rand=' + new Date().getTime(),
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

                                /*Validar RFC ON*/
                                $('#f_rfc').on('focusout', function() {
                                    var con = $('#f_rfc').val().trim();
                                    if(ValidaRfc(con) == false){
                                        $('#continuar').attr('disabled','disabled');
                                        alert('El rfc es incorrecto.');
                                    }else{
                                        $('#continuar').removeAttr('disabled');
                                    }
                                });
                                /*Validar RFC OFF*/

                                /*Validar Numeros ON*/
                                $('.solo-numeros').keyup(function (){
                                    this.value = (this.value + '').replace(/[^0-9]/g, '');
                                });
                                /*Validar Numeros OFF*/
                                
                                /*Proceso continuar ON*/
                                $('#continuar').on('click', function(e) {
                                    e.preventDefault();
                                    $(this).attr('disabled','disabled');
                                    $.ajax({
                                        cache: false,
                                        method: 'POST',
                                        dataType: 'json',
                                        data: $('#datos_personales').serializeArray(),
                                        url: '/mayoreo/pago/generar/' + cacheBusterGeneral,
                                    }).done(function(data_pago) {
                                        $('.modal-body').html('<div class="ajax_loading_js"></div>');
                                        $('.modal-body').html(data_pago.contenido);
                                        $('.modal-body').append(data_pago.btn_print);
                                        $('.modal-title').text('Detalles del pedido');
                                        $('#print_pago').on('click', function(e){
                                            e.preventDefault();
                                            console.log('imprimir');
                                            $('.modal-body').print();
                                        });
                                    }).fail(function(jqxhr, textStatus, error) {
                                        alert('Error:' + jqxhr + '-' + textStatus + '-' + error);
                                    });
                                });
                                /*Proceso continuar OFF*/

                                /*Proceso continuar_paypal ON*/
                                $('#continuar_paypal').on('click', function(e) {
                                    e.preventDefault();
                                    $(this).attr('disabled','disabled');
                                    $('.modal-title').text('Procesando…');
                                    $.ajax({
                                        cache: false,
                                        method: 'POST',
                                        dataType: 'html',
                                        data: $('#datos_personales').serializeArray(),
                                        url: '/mayoreo/pago/ajax_paypal_send',
                                    }).done(function(data_pago) {
                                        $('.modal-body').html(data_pago);
                                    }).fail(function(jqxhr, textStatus, error) {
                                        alert('Error:' + jqxhr + '-' + textStatus + '-' + error);
                                    });
                                });
                                /*Proceso continuar_paypal OFF*/
                                

                            }).fail(function(jqxhr, textStatus, error) {
                                alert('Error:' + jqxhr + '-' + textStatus + '-' + error);
                            });
                        } else {

                            $('.verify_disabled').attr('disabled', 'disabled');
                            alert('El formato del correo es incorrecto.');
                        }
                    });
                    /*Ejecuta Instruccion OFF*/
                    }
                });
                /*Carga ventana de pago OFF*/
                    /*Condicion OFF*/
                }
                //$('.modal-body').html(write_r);   
            });

        });
    }
    $('.detalle_total').on('click', function(e) {
        e.preventDefault();
        get_content_cart();
        $('.cantidad').val('');
    });
	/*DETALLE TOTAL OFF*/
  

    var hash_z = window.location.hash.substr(1);
    var hash_z2 = hash_z.split('-');

    if(hash_z == 'modal_products'){
        $('.detalle_total')[0].click();
    }

    if(hash_z2[0] != ''){
        s_e_p(hash_z2[0],hash_z2[1]);
    }

    /*function get_status_pedido(p_status,code_enc){
        $.getJSON(base_path+'pago/set_status',{'p_status':p_status,'code_enc':code_enc}, function(return_e) {
            console.log(return_e);
        });
    }*/

    function s_e_p(op,nc){
        $.getJSON(base_path+'pago/s_e_p',{'op':op,'nc':nc}, function(return_e) {

            console.log(return_e.estatus_return);

            if(return_e.estatus_return == 'Cancelado'){

                _open_modal_alert('<div class="alert alert-danger" role="alert">Pedido '+return_e.pedido.id+' cancelado</div>',false);

            }else if(return_e.estatus_return == 'Completado'){

                _open_modal_alert('<div class="alert alert-success" role="alert">Pedido '+return_e.pedido.id+' pagado</div>',false);

            }
            
        });
    }
    

});

    