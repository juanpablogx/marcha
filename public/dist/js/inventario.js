$(document).ready(iniciar);

function iniciar(){
	$("#btnRegistrar").on("click", guardar_inventario);
	$(".editar").off("click").on("click", editar_inventario);
	$(".eliminar").off("click").on("click", eliminar_inventario);
	
}

function guardar_inventario(e) {
	e.preventDefault();

	var nombre = $("#nombre").val();
	var descripcion = $("#descripcion").val();
	var medida = $("#medida").val();
	var tipo = $("#tipo").val();
	var precio_und = $("#precio_und").val();
    var stock = $("#stock").val();
	if (nombre != '' && medida != ''  && tipo != '' && precio_und != '' && stock != '') {

		jQuery.ajax({
			type:"POST",
			data: $("#formRegistrar").serialize(), //los datos que quiero enviar 
			url: URL_BASE+'AgregarInventario', //a donde quiero llevar los datos
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
									<td class="td_nombre">`+nombre+`</td>
									<td class="td_descripcion">`+descripcion+`</td>
									<td class="td_medida">`+medida+`</td>
									<td class="td_tipo">`+tipo+`</td>
									<td class="td_precio_und">`+precio_und+`</td>
									<td class="td_stock">`+stock+`</td>
									<td>
										<div class="btn-group" role="group" aria-label="Basic example">
											<button type="button" class="btn btn-success editar" data-toggle="modal" data-target="#modalEditar" data-num_id="`+response.lastid+`">
												<i class="fas fa-edit"></i>
											</button>
											<button type="button" class="btn btn-danger eliminar" data-num_id="`+response.lastid+`">
												<i class="fas fa-trash-alt"></i>
											</button>
										</div>
									</td>
								</tr>`;
					
					$("#lista_inventario").prepend(fila);
	
					$("#nombre").val('');
					$("#descripcion").val('');
					$("#medida").val('');
					$("#tipo").val('');
					$("#precio_und").val('');
					$("#stock").val('');
	
					$(".editar").off("click").on("click", editar_inventario);
					$(".eliminar").off("click").on("click", eliminar_inventario);
	
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
			title: 'Debe llenar Todos los campos (excepto descripción)',
			showConfirmButton: false,
			timer: 2000
		});
	}
	
}

function editar_inventario(e){
	e.preventDefault();
	var id = $(this).data('num_id');
	var nombre = $(this).parents("tr").find(".td_nombre").text();
	var descripcion = $(this).parents("tr").find(".td_descripcion").text();
	var medida = $(this).parents("tr").find(".td_medida").text();
	var tipo = $(this).parents("tr").find(".td_tipo").text();
	var precio_und = $(this).parents("tr").find(".td_precio_und").text();
	var stock = $(this).parents("tr").find(".td_stock").text();

	$(this).parents("tr").attr("id","por_editar");

	$("#btnEditar").data('num_id', id);
	$("#edit_nombre").val(nombre);
	$("#edit_descripcion").val(descripcion);
	$("#edit_medida").val(medida);
	$("#edit_tipo").val(tipo);
	$("#edit_precio_und").val(precio_und);
	$("#edit_stock").val(stock);
	//seleccionar un select automaticamente
	// $("[value="+contrato+"]").attr("selected",true); 

	$("#btnEditar").off('click').on('click', actualizar_inventario);

}	

function actualizar_inventario(e){
    e.preventDefault();
    var id = $(this).data('num_id');

	var nuevo_nombre = $("#edit_nombre").val();
	var nuevo_descripcion = $("#edit_descripcion").val();
	var nuevo_medida = $("#edit_medida").val();
	var nuevo_tipo = $("#edit_tipo").val();
	var nuevo_precio_und = $("#edit_precio_und").val();
	var nuevo_stock = $("#edit_stock").val();

	if (nuevo_nombre != '' && nuevo_medida != '' && nuevo_tipo != '' && nuevo_precio_und != '' && nuevo_stock != '') {
		var datos = {
			'id_producto': id,
			'nombre': nuevo_nombre,
			'descripcion': nuevo_descripcion,
			'medida': nuevo_medida,
			'tipo': nuevo_tipo,
			'precio_und': nuevo_precio_und,
			'stock': nuevo_stock
		};
		jQuery.ajax({
			type:"POST",
			data: datos, //los datos que quiero enviar 
			url: URL_BASE+'EditarInventario', //a donde quiero llevar los datos
			dataType: 'json',
			success:function(response){ //mensaje que llega del guardar
				console.log(response);
	
				if (response.estado == 'ok'){
					Swal.fire(
						'OK',
						response.mensaje,
						'success' //icono
					);
	
					$("#por_editar").find('.td_nombre').text(nuevo_nombre);
					$("#por_editar").find('.td_descripcion').text(nuevo_descripcion);
					$("#por_editar").find('.td_medida').text(nuevo_medida);
					$("#por_editar").find('.td_tipo').text(nuevo_tipo);
					$("#por_editar").find('.td_precio_und').text(nuevo_precio_und);
					$("#por_editar").find('.td_stock').text(nuevo_stock);
	
					$("#por_editar").removeAttr("id");//remover el id
	
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
			title: 'Debe llenar Todos los campos (excepto descripción)',
			showConfirmButton: false,
			timer: 2000
		});
	}
	
	

}

function eliminar_inventario() {
	Swal.fire({
		title: 'Estas Seguro de Eliminarlo?',
		text: "Al eliminar el articulo no lo podras recuperar!!",
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

			var datos = { "id_producto":id };

			$.ajax({
				type: "POST",
				url: URL_BASE+"EliminarInventario",
				data: datos,
				dataType: "json",
				success: function (response) {
					if (response.estado){
						Swal.fire({
							position: 'center',
							icon: 'success',
							title: response.mensaje,
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