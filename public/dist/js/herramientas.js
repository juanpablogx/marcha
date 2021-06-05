$(document).ready(iniciar);

function iniciar(){
	$("#btn_registrar").on("click", guardar_herramienta);
	$(".editar").off("click").on("click", editar_herramienta);
	$(".eliminar").off("click").on("click", eliminar_herramienta);
	
}


function guardar_herramienta(e) {
	e.preventDefault();

	var cod_act = $("#cod_actL").val();
	var nom_act = $("#cod_actL option:selected").text();
	var cod_producto = $("#cod_producto").val();
	var nom_producto = $("#cod_producto option:selected").text();
	var cantidad = $("#cantidad").val();
	var tipo = $("#tipo").val();

	if (cod_act != '' && cod_producto != '' && cantidad != '' && tipo != '') {

		jQuery.ajax({
			type:"POST",
			data: $("#form_registrar_herramienta").serialize(), //los datos que quiero enviar 
			url: URL_BASE+'AgregarHerramientas', //a donde quiero llevar los datos
			dataType: "json",
			success:function(response){ //mensaje que llega del guardar

				if (response.estado == 'ok') {
					Swal.fire({
						position: 'center',
						icon: 'success',
						title: response.mensaje,
						showConfirmButton: false,
						timer: 2000
					});
	
					var fila = `<tr>
									<td class="td_act_lot">`+nom_act+`</td>
									<td class="td_producto">`+nom_producto+`</td>
									<td class="td_cantidad">`+cantidad+`</td>
									<td class="td_tipo">`+tipo+`</td>
									<td>
										<div class="btn-group" role="group" aria-label="Basic example">
											<button type="button" class="btn btn-success editar"  data-num_id="`+response.id+`" data-toggle="modal" data-target="#editar_herramienta">
												<i class="fas fa-edit"></i>
											</button>
											<button type="button" class="btn btn-danger eliminar"  data-num_id="`+response.id+`">
												<i class="fas fa-trash-alt"></i>
											</button>
												
										</div>
									</td>
								</tr>`;
					
					$("#listar_herramientas").append(fila);
	
					$("#cod_actL").val('');
					$("#cod_producto").val('');
					$("#cantidad").val('');
					$("#tipo").val('');

	
					$(".editar").off("click").on("click", editar_herramienta);
					$(".eliminar").off("click").on("click", eliminar_herramienta);
	
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

function editar_herramienta(e){
	e.preventDefault();

	var id = $(this).data('num_id');
	var actL = $(this).data('num_actL');
	console.log(actL);
	var product = $(this).data('num_product');
	var cantidad = $(this).parents("tr").find(".td_cantidad").text();
	var tipo = $(this).parents("tr").find(".td_tipo").text();

	$(this).parents("tr").attr("id","por_editar");

	$("#codigo").text(id);
	$("#edit_cod_actL").val(actL);
	// $("[value="+actL+"]").attr("selected",true);
	$("#edit_cod_producto").val(product);
	$("#edit_cantidad").val(cantidad);
	$("#edit_tipo").val(tipo);


	$("#btn_editar").off('click').on('click',function(e) { 
		e.preventDefault();
		actualizar_herramienta(id);
	});

}	

function actualizar_herramienta(id){
	var nuevo_cod_act = $("#edit_cod_actL").val();
	var nuevo_nom_act = $("#edit_cod_actL option:selected").text();
	var nuevo_cod_producto = $("#edit_cod_producto").val();
	var nuevo_nom_producto = $("#edit_cod_producto option:selected").text();
	var nueva_cantidad = $("#edit_cantidad").val();
	var nuevo_tipo = $("#edit_tipo").val();
	
	if (nuevo_cod_act != '' && nuevo_cod_producto != '' && nueva_cantidad != '' && nuevo_tipo != '') {
		
		var datos = {
			'id': id,
			'edit_cod_actL': nuevo_cod_act,  //name : nueva variable
			'edit_cod_producto': nuevo_cod_producto,
			'edit_cantidad': nueva_cantidad,
			'edit_tipo': nuevo_tipo
		};

		jQuery.ajax({
			type:"POST",
			data: datos, //los datos que quiero enviar 
			url: URL_BASE+'EditarHerramientas', //a donde quiero llevar los datos
			dataType: 'json',
			success:function(data){ //mensaje que llega del guardar
	
				if (data.estado == 'ok'){
					Swal.fire(
						'OK',
						data.mensaje,
						'success' //icono
					);
	
					$("#por_editar").find('.td_act_lot').text(nuevo_nom_act);
					$("#por_editar").find('.td_producto').text(nuevo_nom_producto);
					$("#por_editar").find('.td_cantidad').text(nueva_cantidad);
					$("#por_editar").find('.td_tipo').text(nuevo_tipo);
	
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

function eliminar_herramienta() {
	Swal.fire({
		title: 'Estas Seguro de Eliminarlo?',
		text: "Al eliminar la Herramienta no lo podras recuperar!!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#117E09',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, eliminar',
		cancelButtonText: 'Cancelar'
	}).then((result) => {
		if (result.isConfirmed) {
			var id = $(this).data('num_id');
			$(this).parents("tr").attr("id","eliminando");


			var datos_id = { "id":id};

			$.ajax({
				type: "POST",
				url: URL_BASE+"EliminarHerramientas",
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