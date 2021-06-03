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

function editar_asig_categoria(e){
	e.preventDefault();
	var id = $(this).data('num_id');
	var cantidad = $(this).parents("tr").find(".td_cantidad").text();

	$(this).parents("tr").attr("id","por_editar");

	$("#btnEditar").data('num_id', id);
	$("#edit_cantidad").val(cantidad);

	$("#btnEditar").off('click').on('click', actualizar_asig_categoria);

}	

function actualizar_asig_categoria(e){
    e.preventDefault();
    var id = $(this).data('num_id');

	var nuevo_cantidad = $("#edit_cantidad").val();

	if (nuevo_cantidad != '') {
		var datos = {
			'id': id,
			'cantidad': nuevo_cantidad,
		};
		jQuery.ajax({
			type:"POST",
			data: datos, //los datos que quiero enviar 
			url: URL_BASE+'EditarAsigCategoria', //a donde quiero llevar los datos
			dataType: 'json',
			success:function(response){ //mensaje que llega del guardar
				console.log(response);
	
				if (response.estado == 'ok'){
					Swal.fire(
						'OK',
						response.mensaje,
						'success' //icono
					);
	
					$("#por_editar").find('.td_cantidad').text(nuevo_cantidad);
	
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
			title: 'Debe llenar Todos los campos',
			showConfirmButton: false,
			timer: 2000
		});
	}
	
	

}

function eliminar_asig_categoria() {
	Swal.fire({
		title: 'Estas Seguro de Eliminar?',
		text: "Al eliminar la relación no la podrás recuperar!!",
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

			var datos = { "id":id };

            console.log(id);

			$.ajax({
				type: "POST",
				url: URL_BASE+"EliminarAsigCategoria",
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