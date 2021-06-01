$(document).ready(iniciar);

function iniciar(){
	$("#btn_registrar").on("click", guardar_empleado);
	$(".editar").off("click").on("click", editar_empleado);
	$(".eliminar").off("click").on("click", eliminar_empleado);
	$('#checkInactivos').change(listar_empleados);
	$(".restaurar").off("click").on("click", restaurar_empleado);
	
}

function listar_empleados() {
	var opcion = '';
	if($(this).is(':checked')) {
		opcion = 'inactivos';
		$('#labelCheckEmp').text('Mostrar Activos');
	} else {
		opcion = 'activos';
		$('#labelCheckEmp').text('Mostrar Inactivos');
	}

	var datos = {'opcion': opcion};

	$.ajax({
		type: "POST",
		url: URL_BASE+"BuscarActivosInactivos",
		data: datos,
		dataType: "json",
		success: function (response) {
			console.log(response);
			if(response != false) {
				$('#lista_empleados').html('');
				$.each(response, function (key, value) { 
					
					if (value.estado == 'activo') {
						jQuery('#id_boton_agregar').prop('disabled', false);
						var fila = `<tr>
									<td class="td_ced">`+value.cedula+`</td>
									<td class="td_nom">`+value.nombres+`</td>
									<td class="td_ape">`+value.apellidos+`</td>
									<td class="td_email">`+value.correo+`</td>
									<td class="td_cel">`+value.telefono+`</td>
									<td class="td_contra">`+value.tipo_contrato+`</td>
									<td class="td_sal">`+value.salario+`</td>
									<td>`+value.estado+`</td>
									<td>
										<div class="btn-group" role="group" aria-label="Basic example">

											<button type="button" class="btn btn-success editar"  data-toggle="modal" data-target="#editar_empleado" data-num_id="`+value.cedula+`">
												<i class="fas fa-edit"></i>
											</button>
											
											<button type="button" class="btn btn-danger eliminar" data-num_id="`+value.cedula+`">
												<i class="fas fa-trash-alt"></i>
											</button>
												
										</div>
									</td>
								</tr>`;
						$('#lista_empleados').prepend(fila);

						$(".editar").off("click").on("click", editar_empleado);
						$(".eliminar").off("click").on("click", eliminar_empleado);
						

					}else if (value.estado == 'inactivo') {
						jQuery('#id_boton_agregar').prop('disabled', true);
						var fila = `<tr>
									<td class="td_ced">`+value.cedula+`</td>
									<td class="td_nom">`+value.nombres+`</td>
									<td class="td_ape">`+value.apellidos+`</td>
									<td class="td_email">`+value.correo+`</td>
									<td class="td_cel">`+value.telefono+`</td>
									<td class="td_contra">`+value.tipo_contrato+`</td>
									<td class="td_sal">`+value.salario+`</td>
									<td>`+value.estado+`</td>
									<td>
										<div class="btn-group" role="group" aria-label="Basic example">
											
											<button type="button" class="btn btn-primary restaurar" data-num_id="`+value.cedula+`">
												<i class="fas fa-trash-restore"></i>
											</button>
												
										</div>
									</td>
								</tr>`;
						$('#lista_empleados').prepend(fila);

						$(".editar").off("click").on("click", editar_empleado);
						$(".restaurar").off("click").on("click", restaurar_empleado);
					}else{
						alert('Error al obtener');
					}
					
				});
			} else {
				jQuery('#id_boton_agregar').prop('disabled', false);
				$('#lista_empleados').html('');
			}
		},
		error: function (x, r, e) {
			console.log(x);
			console.log(r);
			console.log(e);
		}
	});
}

function guardar_empleado(e) {
	e.preventDefault();

	var ced = $("#cedula").val();
	var nom = $("#nombre").val();
	var ape = $("#apellido").val();
	var email = $("#email").val();
	var cel = $("#cel").val();
    var contra = $("#t_contrato").val();
	var sal = $("#salario").val();
	if (ced != '' && nom != ''  && ape != ''  && email != ''  && cel != ''  && contra != ''  && sal != '') {

		jQuery.ajax({
			type:"POST",
			data: $("#form_registrar_emp").serialize(), //los datos que quiero enviar 
			url: URL_BASE+'AgregarEmpleado', //a donde quiero llevar los datos
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
									<td class="td_ced">`+ced+`</td>
									<td class="td_nom">`+nom+`</td>
									<td class="td_ape">`+ape+`</td>
									<td class="td_email">`+email+`</td>
									<td class="td_cel">`+cel+`</td>
									<td class="td_contra">`+contra+`</td>
									<td class="td_sal">`+sal+`</td>
									<td>activo</td>
									<td>
										<div class="btn-group" role="group" aria-label="Basic example">
											<button type="button" class="btn btn-success editar" data-toggle="modal" data-target="#editar_empleado" data-num_id="`+ced+`">
												<i class="fas fa-edit"></i>
											</button>
											<button type="button" class="btn btn-danger eliminar" data-num_id="`+ced+`">
												<i class="fas fa-trash-alt"></i>
											</button>
												
										</div>
									</td>
								</tr>`;
					
					$("#lista_empleados").prepend(fila);
	
					$("#cedula").val('');
					$("#nombre").val('');
					$("#apellido").val('');
					$("#email").val('');
					$("#cel").val('');
					$("#t_contrato").val('');
					$("#salario").val('');
	
					$(".editar").off("click").on("click", editar_empleado);
					$(".eliminar").off("click").on("click", eliminar_empleado);
	
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

function editar_empleado(e){
	e.preventDefault();
	var ced = $(this).parents("tr").find(".td_ced").text();
	var nombre = $(this).parents("tr").find(".td_nom").text();
	var apellido = $(this).parents("tr").find(".td_ape").text();
	var correo = $(this).parents("tr").find(".td_email").text();
	var celular = $(this).parents("tr").find(".td_cel").text();
	var contrato = $(this).parents("tr").find(".td_contra").text();
	var salario = $(this).parents("tr").find(".td_sal").text();

	$(this).parents("tr").attr("id","por_editar");

	$("#edit_cedula").text(ced);
	$("#edit_nombre").val(nombre);
	$("#edit_apellido").val(apellido);
	$("#edit_email").val(correo);
	$("#edit_celular").val(celular);
	//$("#edit_estado").text(estado);
	$("#edit_salario").val(salario);
	//seleccionar un select automaticamente
	$("[value="+contrato+"]").attr("selected",true); 

	$("#btn_editar_em").off('click').on('click',function() { 
		actualizar_empleado(ced);
	});

}	

function actualizar_empleado(ced){
	var nuevo_nom = $("#edit_nombre").val();
	var nuevo_apellido = $("#edit_apellido").val();
	var nuevo_correo = $("#edit_email").val();
	var nuevo_cel = $("#edit_celular").val();
	var nuevo_contra = $("#edit_contrato option:selected").text();
	var nuevo_sal = $("#edit_salario").val();

	if (nuevo_nom != ''  && nuevo_apellido != ''  && nuevo_correo != ''  && nuevo_cel != ''  && nuevo_contra != ''  && nuevo_sal != '') {
		var datos = {
			'edit_cedula': ced,
			'edit_nombre': nuevo_nom,
			'edit_apellido': nuevo_apellido,
			'edit_email': nuevo_correo,
			'edit_celular': nuevo_cel,
			'edit_contrato': nuevo_contra,
			'edit_salario': nuevo_sal
		};
		jQuery.ajax({
			type:"POST",
			data: datos, //los datos que quiero enviar 
			url: URL_BASE+'EditarEmpleado', //a donde quiero llevar los datos
			dataType: 'json',
			success:function(data){ //mensaje que llega del guardar
				console.log(data);
	
				if (data.estado == 'ok'){
					Swal.fire(
						'OK',
						data.mensaje,
						'success' //icono
					);
	
					$("#por_editar").find('.td_nom').text(nuevo_nom);
					$("#por_editar").find('.td_ape').text(nuevo_apellido);
					$("#por_editar").find('.td_email').text(nuevo_correo);
					$("#por_editar").find('.td_cel').text(nuevo_cel);
					$("#por_editar").find('.td_contra').text(nuevo_contra);
					$("#por_editar").find('.td_sal').text(nuevo_sal);
	
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

function eliminar_empleado() {
	Swal.fire({
		title: 'Estas Seguro de Eliminarlo?',
		text: "Al eliminar al usuario no lo podras recuperar!!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#117E09',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, eliminar',
		cancelButtonText: 'Cancelar'
	}).then((result) => {
		if (result.isConfirmed) {
			var usuario = $(this).parents("tr").find(".td_ced").text();
			$(this).parents("tr").attr("id","eliminando");

		    var cedula = usuario;
			var datos_id = { "cedula":cedula };

			$.ajax({
				type: "POST",
				url: URL_BASE+"EliminarEmpleado",
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
function restaurar_empleado() {
	Swal.fire({
		title: 'Estas Seguro de Restaurar al empleado?',
		text: "Cuando lo restaures lo podras ver en la sesion de activos!!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#117E09',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, Restaurar',
		cancelButtonText: 'Cancelar'
	}).then((result) => {
		if (result.isConfirmed) {
			var usuario = $(this).parents("tr").find(".td_ced").text();
			$(this).parents("tr").attr("id","restaurando");

		    var cedula = usuario;
			var datos_id = { "cedula":cedula };

			$.ajax({
				type: "POST",
				url: URL_BASE+"RestaurarEmpleado",
				data: datos_id,
				dataType: "json",
				success: function (response) {
					if (response){
						Swal.fire({
							position: 'center',
							icon: 'success',
							title: 'Se ha Restaurado con exito',
							showConfirmButton: false,
							timer: 1500
						});

						$("#restaurando").remove();
					}
					else{
						Swal.fire('Lo siento, no se pudo restaurar');
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