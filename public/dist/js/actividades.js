$(document).ready(iniciar);

function iniciar(){
	$("#btn_registrar").on("click", guardar_actividad);
	$(".editar").off("click").on("click", editar_actividad);
	$(".eliminar").off("click").on("click", eliminar_actividad);
	
}

function guardar_actividad(e) {
	e.preventDefault();

	var nombre = $("#nombre").val();
	var descripcion = $("#descripcion").val();
	var estado = $("#estado").val();

	if (nombre != '' && descripcion != '' && estado != '') {

		jQuery.ajax({
			type:"POST",
			data: $("#form_registrar_act").serialize(), //los datos que quiero enviar 
			url: URL_BASE+'AgregarActividad', //a donde quiero llevar los datos
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
									<td class="td_nom">`+nombre+`</td>
									<td class="td_desc">`+descripcion+`</td>
									<td class="td_estado">`+estado+`</td>
									<td>
										<div class="btn-group" role="group" aria-label="Basic example">
											<button type="button" class="btn btn-success editar"  data-num_id="`+response.id+`" data-toggle="modal" data-target="#editar_actividad">
												<i class="fas fa-edit"></i>
											</button>
											<button type="button" class="btn btn-danger eliminar"  data-num_id="`+response.id+`">
												<i class="fas fa-trash-alt"></i>
											</button>
												
										</div>
									</td>
								</tr>`;
					
					$("#listar_actividad").append(fila);
	
					$("#nombre").val('');
					$("#descripcion").val('');
					$("#estado").val('');

	
					$(".editar").off("click").on("click", editar_actividad);
					$(".eliminar").off("click").on("click", eliminar_actividad);
	
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
function editar_actividad(e){
	e.preventDefault();
	var id_actividad = $(this).data('num_id');
	var nombre = $(this).parents("tr").find(".td_nom").text();
	var descripcion = $(this).parents("tr").find(".td_desc").text();
	var estado = $(this).parents("tr").find(".td_estado").text();

	$(this).parents("tr").attr("id","por_editar");

	$("#codigo").text(id_actividad);
	$("#edit_nombre").val(nombre);
	$("#edit_descripcion").val(descripcion);
	$("#edit_estado").val(estado);


	$("#btn_editar").off('click').on('click',function() { 
		actualizar_actividad(id_actividad);
	});

}	

function actualizar_actividad(id_actividad){
	var nuevo_nombre = $("#edit_nombre").val();
	var nueva_descripcion = $("#edit_descripcion").val();
	var nuevo_estado = $("#edit_estado").val();
	console.log(nuevo_nombre);
	if (nuevo_nombre != '' && nueva_descripcion != '' && nuevo_estado != '') {

		var datos = {
			'id_actividad':id_actividad,
			'nombre': nuevo_nombre,
			'descripcion': nueva_descripcion,
			'estado': nuevo_estado
		};

		jQuery.ajax({
			type:"POST",
			data: datos, //los datos que quiero enviar 
			url: URL_BASE+'EditarActividad', //a donde quiero llevar los datos
			dataType: 'json',
			success:function(data){ //mensaje que llega del guardar
				
	
				if (data.estado == 'ok'){
					Swal.fire(
						'OK',
						data.mensaje,
						'success' //icono
					);
	
					$("#por_editar").find('.td_nom').text(nuevo_nombre);
					$("#por_editar").find('.td_desc').text(nueva_descripcion);
					$("#por_editar").find('.td_estado').text(nuevo_estado);
	
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
function eliminar_actividad() {
	Swal.fire({
		title: 'Estas Seguro de Eliminarlo?',
		text: "Al eliminar la Actividad no lo podras recuperar!!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#117E09',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, eliminar',
		cancelButtonText: 'Cancelar'
	}).then((result) => {
		if (result.isConfirmed) {
			var id_actividad = $(this).data('num_id');
			$(this).parents("tr").attr("id","eliminando");


			var datos_id = { "id_actividad":id_actividad};

			$.ajax({
				type: "POST",
				url: URL_BASE+"EliminarActividad",
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