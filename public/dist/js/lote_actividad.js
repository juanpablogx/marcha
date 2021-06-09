$(document).ready(iniciar);

function iniciar(){
	$(".radioPrimary1").on("click", function(){
		var opcion = $("input:radio[name=r1]:checked").val();
		var datos = {'opcion': opcion};
		jQuery.ajax({ 
			type:"POST",
			data:datos, //los datos que quiero enviar 
			url: URL_BASE+'FiltrarActividadEstado', //a donde quiero llevar los datos
			dataType: "json",
			success:function(response){ //mensaje que llega del guardar
				console.log(response);
				if (response.estado) {
					
					$("#listar_lote_actividad").html('');

					
					$.each(response.datos, function (key, value) {
					var fila = `<tr>
									<td class="td_lote">`+ value.nlote +`</td>
									<td class="td_actividad">`+ value.nactividad +`</td>
									<td class="td_finicio">`+ value.f_inicio +`</td>
									<td class="td_ffinal">`+ value.f_fin +`</td>
									<td class="td_estado">
										`+ value.estado +`
										<button type="button" class="btn btn-warning act_estado" data-toggle="modal" data-target="#cambiar_estado" data-num_id="`+value.id+`" data-estado="`+value.estado+`">
											<!-- <i class="fas fa-fan"></i> -->
											<i class="fas fa-exchange-alt"></i>
										</button>
									</td>
									<td>
										<div class="btn-group" role="group" aria-label="Basic example">`;

					if (value.estado != 'Terminada') {
						fila += `<button type="button" class="btn btn-success editar" 	data-toggle="modal" data-target="#actualizar" data-num_id="`+value.id+`">
							<i class="fas fa-edit"></i>
						</button>`;
					}
					
					fila += `<button type="button" class="btn btn-danger eliminar" data-num_id="`+value.id+`">
								<i class="fas fa-trash-alt"></i>
							</button>
							
						</div>
					</td>
				</tr>`;	
					
					$("#listar_lote_actividad").prepend(fila);

					$("#lote").val('');
					$("#actividad").val('');
					$("#f_inicio").val('');
					$("#f_fin").val('');
					$("#edit_estado").val('')

					$(".act_estado").off("click").on("click", cambiar_estado);
					$(".editar").off("click").on("click", editar_loteActividad);
					$(".eliminar").off("click").on("click", eliminar_loteActividad);
				});	
				}
				else{
					Swal.fire({
						position: 'center',
						icon: 'error',
						title: 'No hay registros',
						showConfirmButton: false,
						timer: 2000
					});

					$("#listar_lote_actividad").html('');
				}
			
			},
			error: function (x, r, e) {
				console.log(x);
				console.log(r);
				console.log(e);
			}
		});
	});
	$("#radioPrimary2").click();
	$("#btn_registrar_lact").on("click", guardar_loteActividad);
    $(".act_estado").off("click").on("click", cambiar_estado);
	$(".editar").off("click").on("click", editar_loteActividad);
	$(".eliminar").off("click").on("click", eliminar_loteActividad);
	
}

function guardar_loteActividad(e) {
	e.preventDefault();

    var nomlote = $('#lote option:selected').text();
    var nomact = $('#actividad option:selected').text();

	var lote = $("#lote").val();
	var act = $("#actividad").val();
    var inicio = $("#f_inicio").val();
    var fin = $("#f_fin").val();

	if (lote != '' && act != '' && inicio != '' && fin != '') {

		jQuery.ajax({
			type:"POST",
			data: $("#form_relacionar_lote").serialize(), //los datos que quiero enviar 
			url: URL_BASE+'AgregarLoteActividad', //a donde quiero llevar los datos
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
                                    <td class="td_lote">`+ nomlote +`</td>
                                    <td class="td_actividad">`+ nomact +`</td>
                                    <td class="td_finicio">`+ inicio +`</td>
                                    <td class="td_ffinal">`+ fin +`</td>
                                    <td class="td_estado">
                                        Pendiente
                                        <button type="button" class="btn btn-warning act_estado" data-toggle="modal" data-target="#cambiar_estado" data-num_id="`+response.id+`" data-estado="Pendiente">
											<!-- <i class="fas fa-fan"></i> -->
											<i class="fas fa-exchange-alt"></i>
										</button>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-success editar" data-toggle="modal" data-target="#actualizar" data-num_id="`+response.id+`">
                                                <i class="fas fa-edit"></i>
                                            </button>

                                            <button type="button" class="btn btn-danger eliminar" data-num_id="`+response.id+`">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            
                                        </div>
                                    </td>
                                </tr>`;
					
					$("#listar_lote_actividad").prepend(fila);
	
                    $("#lote").val('');
                    $("#actividad").val('');
                    $("#f_inicio").val('');
                    $("#f_fin").val('');

                    $(".act_estado").off("click").on("click", cambiar_estado);
					$(".editar").off("click").on("click", editar_loteActividad);
					$(".eliminar").off("click").on("click", eliminar_loteActividad);
	
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

function editar_loteActividad(e){
	e.preventDefault();
	var id_lot_act = $(this).data('num_id');
    var fecha_inicio = $(this).parents("tr").find(".td_finicio").text();
    var fecha_fin = $(this).parents("tr").find(".td_ffinal").text();

	$(this).parents("tr").attr("id","por_editar");
	$("#cod").text(id_lot_act);
	$("#edit_f_inicio").val(fecha_inicio);
	$("#edit_f_fin").val(fecha_fin);

	$("#btn_editar_lact").off('click').on('click',function() { 
		actualizar_loteActividad(id_lot_act);
	});

}	

function actualizar_loteActividad(id_lote){
	var nueva_fecha_inicio = $("#edit_f_inicio").val();
	var nueva_fecha_fin = $("#edit_f_fin").val();

	if (nueva_fecha_inicio != '' && nueva_fecha_fin != '') {
		var datos = {
			'id_lote':id_lote,
			'edit_inicio': nueva_fecha_inicio,
			'edit_fin': nueva_fecha_fin
		};
		jQuery.ajax({
			type:"POST",
			data: datos, //los datos que quiero enviar 
			url: URL_BASE+'EditarLoteActividad', //a donde quiero llevar los datos
			dataType: 'json',
			success:function(data){ //mensaje que llega del guardar
				console.log(data);
	
				if (data.estado == 'ok'){
					Swal.fire(
						'OK',
						data.mensaje,
						'success' //icono
					);
	
					$("#por_editar").find('.td_finicio').text(nueva_fecha_inicio);
					$("#por_editar").find('.td_ffinal').text(nueva_fecha_fin);
	
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

function cambiar_estado(e){
	e.preventDefault();
	var id_lot_act = $(this).data('num_id');
    var estado = $(this).data('estado');

	$(this).parents("tr").attr("id","por_editar");
	$("#edit_estado").val(estado);

	$("#btn_editar_estado").off('click').on('click',function() { 
		actualizar_estado(id_lot_act, estado);
	});

}	

function actualizar_estado(id_lote, estad){
    var n_estado = $("#edit_estado").val();
	var nuevo_nom_estado = $('#edit_estado option:selected').text();
	if (n_estado != '') {
		var datos = {
			'id_lote':id_lote,
			'estado': n_estado
		};
		jQuery.ajax({
			type:"POST",
			data: datos, //los datos que quiero enviar 
			url: URL_BASE+'EditarLoteActividadEstado', //a donde quiero llevar los datos
			dataType: 'json',
			success:function(data){ //mensaje que llega del guardar
				console.log(data);
	
				if (data.estado == 'ok'){
					Swal.fire(
						'OK',
						data.mensaje,
						'success' //icono
					);
					
                    var campo = nuevo_nom_estado+`
                                <button type="button" class="btn btn-warning act_estado" data-toggle="modal" data-target="#cambiar_estado" data-num_id="`+id_lote+`">
                                    <!-- <i class="fas fa-fan"></i> -->
                                    <i class="fas fa-exchange-alt"></i>
                                </button>`;
	
					$("#por_editar").find('.td_estado').html(campo);
                    $(".act_estado").off("click").on("click", cambiar_estado);
					console.log(estad);
					console.log(n_estado);
					if (estad != n_estado) {
						$("#por_editar").remove();
					}else{
						$("#por_editar").removeAttr("id");
					}
					
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


function eliminar_loteActividad() {
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
			var id_loteact = $(this).data('num_id');
			$(this).parents("tr").attr("id","eliminando");


			var datos_id = { "id_lote":id_loteact};

			$.ajax({
				type: "POST",
				url: URL_BASE+"EliminarLoteActividad",
				data: datos_id,
				dataType: "json",
				success: function (response) {
					console.log(response);
					if (response.estado){
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

		}

	});
}