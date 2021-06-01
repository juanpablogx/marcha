$(document).ready(iniciar);

function iniciar() {
    $('#departamento').change(obtenerMunicipios);
    $('#formAgregar').submit(function(e) {
        e.preventDefault();
        agregarfinca();
    });
}

function obtenerMunicipios() {
    var depto = $(this).val();
    $.ajax({
        type: "POST",
        url: "http://localhost/marcha/public/getMunicipios",
        data: {'depto': depto},
        dataType: "json",
        success: function (response) {
            $('#municipio').html('<option value="" selected>Seleccione un Municipio</option>');
            response.forEach(mun => {
                var option = '<option value="'+mun.id_municipio+'">'+mun.municipio+'</option>';
                $('#municipio').append(option);
            });
        },
    });
}

function agregarfinca() {
    var nomdepto = $('#departamento option:selected').text();
    var nommun = $('#municipio option:selected').text();
    var nombre = $('#nombre').val();
    var departamento = $('#departamento').val();
    var municipio = $('#municipio').val();
    var extension = $('#extension').val();

    if(nombre == '' || departamento == '' || municipio == '' || extension == '') {
        $('#alerta').text('*Los campos son obligatorios*');
    } else {
        var datos = {
            'nombre': nombre,
            'departamento': departamento,
            'municipio': municipio,
            'extension': extension
        };
        $.ajax({
            type: "POST",
            url: "http://localhost/marcha/public/registrarFinca",
            data: datos,
            dataType: "json",
            success: function (response) {
                console.log(response);
        
                if(response.estado == 'ok') {
                    var card = `<div class="col-sm-8 col-md-4 col-lg-3">
                                    <div class="card rounded-3 text-center pt-2">
                                        <a class="btn" href="http://localhost/marcha/public/Dashboard/`+response.id+`">
                                            <div class="card-body">
                                                <h4 class="card-title">`+nombre+`</h4>
                                                <h5 class="card-subtitle mb-2 text-muted">`+nomdepto+', '+nommun+`</h5>
                                                <p class="card-text">`+extension+`</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>`;
                    $('#seccion_fincas').append(card);

                    $('#nombre').val('');       
                    $('#departamento').val('');
                    $('#municipio').val('');
                    $('#extension').val('');
                } else {
                    Swal.fire(response.mensaje);
                }
            },
            error: function (r, x, e) {
                console.log(r);
                console.log(x);
                console.log(e);
            }
        });
    }
}