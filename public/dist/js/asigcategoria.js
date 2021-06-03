$(document).ready(iniciar);

function iniciar(){
	$("#btnRegistrar").on("click", guardar_asig_categoria);
	$(".editar").off("click").on("click", editar_asig_categoria);
	$(".eliminar").off("click").on("click", eliminar_asig_categoria);
}

function guardar_asig_categoria(e) {
	e.preventDefault();

	var lote = $("#lote").val();
	var categoria = $("#categoria").val();
	var cantidad = $("#cantidad").val();
	if (lote != '' && categoria != ''  && cantidad != '') {
        lote = $("#lote option:selected").text();
        categoria = $("#categoria option:selected").text();

		jQuery.ajax({
			type:"POST",
			data: $("#formRegistrar").serialize(), //los datos que quiero enviar 
			url: URL_BASE+'AgregarAsigCategoria', //a donde quiero llevar los datos
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
                                    <td class="td_categoria">`+categoria+`</td>
                                    <td class="td_lote">`+lote+`</td>
                                    <td style="width: 25%;" class="td_cantidad">`+cantidad+`</td>
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
					
					$("#lista_asig_categoria").prepend(fila);
	
					// $("#lote").val('');
					// $("#categoria").val('');
					$("#cantidad").val('');
	
					$(".editar").off("click").on("click", editar_asig_categoria);
					$(".eliminar").off("click").on("click", eliminar_asig_categoria);
	
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

// Desde acá todavía no funciona

function editar_asig_categoria(e){
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

function eliminar_asig_categoria() {
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
					if (response.estado == 'ok'){
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