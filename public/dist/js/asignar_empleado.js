$(document).ready(iniciar);

function iniciar(){
	$("#btn_registrar_asig_empleado").on("click", guardar_asig_empleado);
	$(".editar").off("click").on("click", editar_asig_empleado);
	$(".eliminar").off("click").on("click", eliminar_asig_empleado);
}

function guardar_asig_empleado(e) {
	e.preventDefault();

	var empleado = $("#cod_empleado").val();
	var actividad_l = $("#cod_act").val();

	if (empleado != '' && actividad_l != '') {
		empleado = $("#cod_empleado option:selected").text();
		actividad_l = $("#cod_act option:selected").text();
		jQuery.ajax({
			type:"POST",
			data: $("#form_registrar_asig_empleado").serialize(), //los datos que quiero enviar 
			url: URL_BASE+'AgregarAsigEmpleado', //a donde quiero llevar los datos
			dataType: "json",
			success:function(response){ //mensaje que llega del guardar
				console.log(response);

				if (response.estado == 'ok') {
					Swal.fire({
						position: 'center',
						icon: 'success',
						title: response.mensaje,
						showConfirmButton: false,
						timer: 2000
					});
					
					var fila = `<tr>
									<td class="td_nom_empleado">`+empleado+`</td>
									<td class="td_act_lote">`+actividad_l+`</td>
									<td class="td_calificacion">Pendiente</td>
									<td>
										<div class="btn-group" role="group" aria-label="Basic example">
											<button type="button" class="btn btn-success editar" data-num_id="`+response.id+`" data-toggle="modal" data-target="#modal_editar_asig_empleado">
												<i class="fas fa-edit"></i>
											</button>
											<button type="button" class="btn btn-danger eliminar" data-num_id="`+response.id+`">
												<i class="fas fa-trash-alt"></i>
											</button>
												
										</div>
									</td>
								</tr>`;
					
					$("#listarAsignacion").prepend(fila);
	
					$("#cod_empleado").val('');
					$("#cod_act").val('');
					$("#cod_calificar").val('');

					$(".editar").off("click").on("click", editar_asig_empleado);
					$(".eliminar").off("click").on("click", eliminar_asig_empleado);
				}
				else{
					Swal.fire({
						position: 'center',
						icon: 'error',
						title: response.mensaje,
						showConfirmButton: false,
						timer: 2000
					});
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
function editar_asig_empleado(e){
	e.preventDefault();
	var id_asig_empleado = $(this).data('num_id');
	var calificacion = $(this).parents("tr").find(".td_calificacion").text();

	$(this).parents("tr").attr("id","por_editar");

	$("#codigo").text(id_asig_empleado);
	$("#edit_cod_calificar").val(calificacion);


	$("#btn_editar_asig_empleado").off('click').on('click',function() { 
		actualizar_asig_empleado(id_asig_empleado);
	});

}	

function actualizar_asig_empleado(id_asig_empleado){
	var nueva_calificacion = $("#edit_cod_calificar").val();
	console.log(nueva_calificacion);
	if (nueva_calificacion != '') {

		var datos = {
			'id_asig_empleado':id_asig_empleado,
			'edit_cod_calificar': nueva_calificacion
		};

		jQuery.ajax({
			type:"POST",
			data: datos, //los datos que quiero enviar 
			url: URL_BASE+'EditarAsigEmpleado', //a donde quiero llevar los datos
			dataType: 'json',
			success:function(data){ //mensaje que llega del guardar
				
	
				if (data.estado == 'ok'){
					Swal.fire(
						'OK',
						data.mensaje,
						'success' //icono
					);
					$("#por_editar").find('.td_calificacion').text(nueva_calificacion);

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
function eliminar_asig_empleado() {
	Swal.fire({
		title: 'Estas Seguro de Eliminarlo?',
		text: "Al eliminar Asignar Empleado no lo podras recuperar!!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#117E09',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, eliminar',
		cancelButtonText: 'Cancelar'
	}).then((result) => {
		if (result.isConfirmed) {
			var id_asig_empleado = $(this).data('num_id');
			$(this).parents("tr").attr("id","eliminando");


			var datos_id = { "id_asig_empleado":id_asig_empleado};

			$.ajax({
				type: "POST",
				url: URL_BASE+"EliminarAsigEmpleado",
				data: datos_id,
				dataType: "json",
				success: function (response) {
					if (response){
						Swal.fire({
							position: 'center',
							icon: 'success',
							title: 'Se ha Eliminado con exito',
							showConfirmButton: false,
							timer: 1500
						});

						$("#eliminando").remove();
					}
					else{
						Swal.fire('Lo siento, no se pudo eliminar');
					}
				},
				error: function (x, r, e) {
					console.log(x);
					console.log(r);
					console.log(e);
				}
			});

		}

	});
}