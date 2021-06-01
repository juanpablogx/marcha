$(document).ready(iniciar);

function iniciar(){
	$("#btn_registrar").on("click", guardar_categoria);
    $(".eliminar").on("click", eliminar_categoria);
    $(".editar").on("click", editar_categoria);
    listar_categorias();
}

function guardar_categoria(e) {
	e.preventDefault();

    var cate = $("#nom_categ").val();
	var tipo = $("#t_categoria").val();
	var prod = $("#tp_prod").val();

		jQuery.ajax({
			type:"POST",
			data: $("#form_registrar_cat").serialize(), //los datos que quiero enviar 
			url: URL_BASE+'AgregarCategoria', //a donde quiero llevar los datos
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
                                    <td class="td_cate">`+cate+`</td>
                                    <td class="td_tipo">`+tipo+`</td>
                                    <td class="td_prod">`+prod+`</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">

                                            <button type="button" class="btn btn-success editar"  data-toggle="modal" data-target="#editarCategoria" data-num_id="`+response.id+`">
                                                <i class="fas fa-edit"></i>
                                            </button>

                                            <button type="button" class="btn btn-danger eliminar" data-num_id="`+response.id+`">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>   
                                        </div>
                                    </td>
                                </tr>`;

					$("#lista_categorias").prepend(fila);

					$("#nom_categ").val('');
					$("#t_categoria").val('');
					$("#tp_prod").val('');

                    $(".eliminar").on("click", eliminar_categoria);
                    $(".editar").on("click", editar_categoria);
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

function eliminar_categoria(){
    Swal.fire({
		title: 'Estas Seguro de Eliminarlo?',
		text: "Al eliminar la categoria no la podras recuperar!!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#117E09',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, eliminar',
		cancelButtonText: 'Cancelar'
	}).then((result) => {
		if (result.isConfirmed) {
			var id_cate = $(this).data('num_id');
			$(this).parents("tr").attr("id","eliminando");

			var datos_id = { "id_categoria":id_cate };

			$.ajax({
				type: "POST",
				url: URL_BASE+"EliminarCategoria",
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

function editar_categoria(e){
	e.preventDefault();
    var id_cate = $(this).data('num_id');
	var cate = $(this).parents("tr").find(".td_cate").text();
	var tipo = $(this).parents("tr").find(".td_tipo").text();
	var prod = $(this).parents("tr").find(".td_prod").text();

	$(this).parents("tr").attr("id","editando");

    $("#codigo").text(id_cate);
	$("#edit_categ").val(cate);

    //seleccionar un select automaticamente
	$("[value="+tipo+"]").attr("selected",true); 
    

	$("#edit_prod").val(prod);
	

	$("#btn_editar_cate").off('click').on('click',function() { 
		actualizar_categoria(id_cate);
	});

}	

function actualizar_categoria(id){
	var nueva_cat = $("#edit_categ").val();
	var nuevo_tcat = $("#edit_tcategoria").val();
	var nuevo_prod = $("#edit_prod").val();

	if (nueva_cat != ''  && nuevo_tcat != ''  && nuevo_prod != '') {
		var datos = {
			'id_cate': id,
			'edit_categoria': nueva_cat,
			'edit_tipocategoria': nuevo_tcat,
			'edit_producido': nuevo_prod
		};
		jQuery.ajax({
			type:"POST",
			data: datos, //los datos que quiero enviar 
			url: URL_BASE+'EditarCategoria', //a donde quiero llevar los datos
			dataType: 'json',
			success:function(data){ //mensaje que llega del guardar
				console.log(data);
	
				if (data){
					Swal.fire(
						'OK',
						data.mensaje,
						'success' //icono
					);
	
					$("#editando").find('.td_cate').text(nueva_cat);
					$("#editando").find('.td_tipo').text(nuevo_tcat);
					$("#editando").find('.td_prod').text(nuevo_prod);
	
					$("#editando").removeAttr("id");//remover el id
	
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



