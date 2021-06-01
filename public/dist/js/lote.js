$(document).ready(iniciar);

function iniciar(){
	$("#btn_registrar_lote").on("click", guardar_lote);
	$(".editar").off("click").on("click", editar_lote);
	$(".eliminar").off("click").on("click", eliminar_lote);
	
}


function guardar_lote(e) {
	e.preventDefault();

	var nom = $("#nom_lot").val();
	var extencion = $("#tam_lote").val();

	if (nom != '' && extencion != '') {

		jQuery.ajax({
			type:"POST",
			data: $("#form_registrar_lote").serialize(), //los datos que quiero enviar 
			url: URL_BASE+'AgregarLote', //a donde quiero llevar los datos
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
									<td class="td_nom_lote">`+nom+`</td>
									<td class="td_extencion">`+extencion+`</td>
									<td>
										<div class="btn-group" role="group" aria-label="Basic example">
											<button type="button" class="btn btn-success editar"  data-num_id="`+response.id+`" data-toggle="modal" data-target="#editarLote">
												<i class="fas fa-edit"></i>
											</button>
											<button type="button" class="btn btn-danger eliminar"  data-num_id="`+response.id+`">
												<i class="fas fa-trash-alt"></i>
											</button>
												
										</div>
									</td>
								</tr>`;
					
					$("#lista_lote").append(fila);
	
					$("#nom_lot").val('');
					$("#tam_lote").val('');

	
					$(".editar").off("click").on("click", editar_lote);
					$(".eliminar").off("click").on("click", eliminar_lote);
	
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

function editar_lote(e){
	e.preventDefault();
	var id_lote = $(this).data('num_id');
	var nom_lote = $(this).parents("tr").find(".td_nom_lote").text();
	var extencion = $(this).parents("tr").find(".td_extencion").text();

	$(this).parents("tr").attr("id","por_editar");
	$("#codigo").text(id_lote);
	$("#edit_nom_lot").val(nom_lote);
	$("#edit_tam_lote").val(extencion);

	$("#btn_editar_lote").off('click').on('click',function() { 
		actualizar_lote(id_lote);
	});

}	

function actualizar_lote(id_lote){
	var nuevo_nom_lote = $("#edit_nom_lot").val();
	var nueva_extencion = $("#edit_tam_lote").val();

	if (nuevo_nom_lote != '' && nueva_extencion != '') {
		var datos = {
			'id_lote':id_lote,
			'edit_nom_lot': nuevo_nom_lote,
			'edit_tam_lote': nueva_extencion
		};
		jQuery.ajax({
			type:"POST",
			data: datos, //los datos que quiero enviar 
			url: URL_BASE+'EditarLote', //a donde quiero llevar los datos
			dataType: 'json',
			success:function(data){ //mensaje que llega del guardar
				console.log(data);
	
				if (data.estado == 'ok'){
					Swal.fire(
						'OK',
						data.mensaje,
						'success' //icono
					);
	
					$("#por_editar").find('.td_nom').text(nuevo_nom_lote);
					$("#por_editar").find('.td_extencion').text(nueva_extencion);
	
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
function eliminar_lote() {
	Swal.fire({
		title: 'Estas Seguro de Eliminarlo?',
		text: "Al eliminar el lote no lo podras recuperar!!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#117E09',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, eliminar',
		cancelButtonText: 'Cancelar'
	}).then((result) => {
		if (result.isConfirmed) {
			var id_lote = $(this).data('num_id');
			$(this).parents("tr").attr("id","eliminando");


			var datos_id = { "id_lote":id_lote};

			$.ajax({
				type: "POST",
				url: URL_BASE+"EliminarLote",
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