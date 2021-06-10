$(document).ready(iniciar);

function iniciar() {
    $('#departamento').change(obtenerMunicipios);
    $('#formAgregar').submit(function(e) {
        e.preventDefault();
        agregarfinca();
    });
    $(".editar").off("click").on("click", editar_finca);
    $(".eliminar").off("click").on("click", eliminar_finca);
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

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: response.mensaje,
                    showConfirmButton: false,
                    timer: 2000
                });
        
                if(response.estado == 'ok') {
                    var card = `<div class="col-sm-8 col-md-4 col-lg-3">
                                    <div class="card rounded-3 text-center pt-2 padre">
                                        <a class="btn" href="http://localhost/marcha/public/Dashboard/`+response.id+`">
                                            <div class="card-body">
                                                <h4 class="card-title cd_nombre">`+nombre+`</h4>
                                                <h5 class="card-subtitle mb-2 text-muted ">`+nomdepto+', '+nommun+`</h5>
                                                <p class="card-text cd_extension">`+extension+`</p>
                                            </div>
                                        </a>
                                        <div>
                                            <button type="button" class="btn btn-success mb-3 editar" data-bs-toggle="modal" data-bs-target="#editarFinca" data-id_finca="`+response.id+`">   
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger mb-3 eliminar" data-bs-toggle="modal" data-bs-target="#eliminarFinca" data-id_finca="`+response.id+`" data-nom_finca="`+nombre+`">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>`;

                    $('#seccion_fincas').append(card);
                    $(".editar").off("click").on("click", editar_finca);
                    $(".eliminar").off("click").on("click", eliminar_finca);

                    $('#nombre').val('');       
                    $('#departamento').val('');
                    $('#municipio').val('');
                    $('#extension').val('');
                } else {
                    Swal.fire({
						position: 'center',
						icon: 'error',
						title: response.mensaje,
						showConfirmButton: false,
						timer: 2000
					});
                    $('#nombre').val('');       
                    $('#departamento').val('');
                    $('#municipio').val('');
                    $('#extension').val('');
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

function editar_finca(e){
	e.preventDefault();
	var id_finca = $(this).data('id_finca');
	var nom_finca = $(this).parents(".padre").find(".cd_nombre").text();
	var extension = $(this).parents(".padre").find(".cd_extension").text();

	$(this).parents(".padre").attr("id","por_editar");
	$("#codigo").text(id_finca);
	$("#edit_nombre").val(nom_finca);
	$("#edit_extension").val(extension);

    $("#btn_editar_finca").data('ant_extension', extension);

	$("#btn_editar_finca").off('click').on('click',function(e) { 
        e.preventDefault();
		actualizar_finca(id_finca);
	});

}	

function actualizar_finca(id_finca){
	var nuevo_nom_finca = $("#edit_nombre").val();
	var nueva_extension = $("#edit_extension").val();
    var anterior_extension = $("#btn_editar_finca").data('ant_extension');

	if (nuevo_nom_finca != '' && nueva_extension != '') {
		var datos = {
			'id_finca':id_finca,
			'edit_nombre': nuevo_nom_finca,
			'edit_extension': nueva_extension,
            'ant_extension': anterior_extension
		};
		jQuery.ajax({
			type:"POST",
			data: datos, //los datos que quiero enviar 
			url:"http://localhost/marcha/public/EditarFinca", //a donde quiero llevar los datos
			dataType: 'json',
			success:function(data){ //mensaje que llega del guardar
				console.log(data);
	
				if (data.estado == 'ok'){
					Swal.fire(
						'OK',
						data.mensaje,
						'success' //icono
					);
	
					$("#por_editar").find('.cd_nombre').text(nuevo_nom_finca);
					$("#por_editar").find('.cd_extension').text(nueva_extension);
	
					$("#por_editar").removeAttr("id");//remover el id
	
				}
				else{
					Swal.fire(data.mensaje);
				}
			},
			error: function (x, r, e) {
				console.log(x);
				console.log(r);
				console.log(e);
			}
	
		});
	}else{
		Swal.fire({
			position: 'center',
			icon: 'error',
			title: 'Debe llenar Todos los campos',
			showConfirmButton: false,
			timer: 2000
		});
	}
	
	

}

function eliminar_finca() {
    var id_finca = $(this).data('id_finca');
    var nom_finca = $(this).data('nom_finca');

    $('#nom_finca').text(nom_finca);
    $('#btnEliminar').data('id_finca', id_finca);

    $("#btnEliminar").on('click',peticion_eliminar_finca);
}

function peticion_eliminar_finca(e) {
    e.preventDefault();
    var id_finca = $(this).data('id_finca');
    var asunto = $('#asuntoEliminar').val();

    if(id_finca != '' && asunto != '') {

        $("#btnEliminar").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...');

        $("#btnEliminar").attr('disabled', true);
        $.ajax({
            type: "POST",
            url: "http://localhost/marcha/public/EliminarFinca",
            data: {'id_finca': id_finca, 'asunto': asunto},
            dataType: "json",
            success: function (response) {
                if(response.estado) {
                    Swal.fire({
						position: 'center',
						icon: 'success',
						title: response.mensaje,
						showConfirmButton: false,
						timer: 2000
					});
                    $('#asuntoEliminar').val('');
                    $("#btnEliminar").html('Enviar');
                    $("#btnEliminar").attr('disabled', false);
                } else {
                    // alert('No se pudo enviar la petición');
                    $('#alertaEliminar').text(response.mensaje);
                }
            },
            error: function (x, r, e) {
                console.log(x);
                console.log(r);
                console.log(e);
            }
        });
    } else {
        $('#alertaEliminar').text('Los campos son obligatorios');
    }
}