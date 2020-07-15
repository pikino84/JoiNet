$(function(){

            //$('#datos_garantia').validator();

            $('#datos_garantia').on('submit', function(e){
                e.preventDefault();
                _callback_sendform();
                $('#f_enviar').click();
            });

            var new_input = '<tr>';
            new_input += '<td><input type="text" class="form-control" name="modelo[]" required></td>';
            new_input += '<td><input type="text" class="form-control" name="color[]" required></td>';
            new_input += '<td><input type="text" class="form-control" name="n_serie[]" required></td>';
            new_input += '<td><a class="eliminar btn btn-danger btn-xs"><span class="glyphicon glyphicon-minus"></span></a></td>';
            new_input += '</tr>';

            $('.agregar').on('click', function(){
                $( '.table' ).append( new_input);
                _callback_remove();
                
            });

            function _callback_remove(){
                $('.eliminar').on('click', function(){
                    $(this).parent('td').parent('tr').remove();
                });
            }

            

            function _callback_sendform(){
                $('#f_enviar').on('click', function(){

                    $('.marketing').addClass('ajax_loading');

                    var datos_garantia = $('#datos_garantia').serializeArray();
                    $.ajax({
                        cache: false,
                        method: 'POST',
                        dataType: 'json',
                        data: datos_garantia,
                        url: '/mayoreo/garantias/set_g_data',
                    }).done(function(data_r) {

                        if(data_r.error == 'false'){
                            var show_msg = 'Se ha enviado su solicitud de garantía, la cual tiene el siguiente folio: GW'+data_r.folio;
                            var type_msg = 'success';
                        }else{
                            var show_msg = 'No se ha podido procesar la solicitud correctamente favor de comunicarse al 01 (33) 3613-4587';
                            var type_msg = 'warning';
                        }

                        $('.marketing').removeClass('ajax_loading');

                        $('.marketing').html('<div role="alert" class="alert alert-'+type_msg+' alert-dismissible fade in"><button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>'+show_msg+'</div>');

                    }).fail(function(jqxhr, textStatus, error) {
                        alert('Error:' + jqxhr + '-' + textStatus + '-' + error);
                    });

                });
            }

            $('.fecha').datetimepicker({
                format: 'YYYY-MM-DD'
            });

            $('#estadoSelect').on('change', function(){
                var estado_id = $('#estadoSelect :selected').data('estadoid');
                $.ajax({

                        cache: false,
                        method: 'POST',
                        dataType: 'json',
                        data: {'estado_id':estado_id},
                        url: '/mayoreo/garantias/get_municipios',

                    }).done(function(data_r) {

                        var municipioSelect = '';

                        $.each(data_r, function(k, v){
                            municipioSelect += '<option val="'+v.nombre+'">'+v.nombre+'</option>';
                        });

                        $('#municipioSelect').html(municipioSelect);
                        
                    }).fail(function(jqxhr, textStatus, error) {
                        alert('Error:' + jqxhr + '-' + textStatus + '-' + error);
                    });
            });

        });