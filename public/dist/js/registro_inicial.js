$(document).ready(function($) {
	
	$("#formulario_registro").submit(function(event) {
		event.preventDefault();
		crear_usuario();
	});

});


function crear_usuario() {

	var doc = $("#cedula").val();
	var nombre = $("#nombre").val();
	var apellido = $("#apellido").val();
	var email = $("#correo").val();
	var pass = $("#contrasena").val();
	var conf_pass = $("#conf_contrasena").val();

	if (doc!="" && nombre!="" && apellido!="" && email!="" && pass!="" && conf_pass!=""){
		if (pass == conf_pass) {
			var datos_usuario = {
				"documento":doc,
				"nombre":nombre,
				"apellido":apellido,
				"email":email,
				"pass":pass,
				"confi_pass":conf_pass
			};

			$.ajax({
				url:"http://localhost/marcha/public/crearRegistroUsuario", 
				type: 'POST',
				dataType: 'json',
				data: datos_usuario
			})
			.done(function(resultado) {
				console.log("success");
				console.log(resultado);

				if (resultado.estado == 'OK') {
					var alerta = `<div class="alert alert-success alert-dismissible fade show" role="alert">
									<strong>Felicidades:</strong> <p>`+ resultado.mensaje +`</p>
									<strong>Ingrese a este link para iniciar sesion:</strong> 
									<a class="nav-link " href="<?php echo base_url('Ingreso'); ?>">Ingreso</a>
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>`;

					$("#alerta_error").append(alerta);

					$("#cedula").val('');
					$("#nombre").val('');
					$("#apellido").val('');
					$("#correo").val('');
					$("#contrasena").val('');
					$("#conf_contrasena").val('');
				} else{
					var alerta = `<div class="alert alert-warning alert-dismissible fade show" role="alert">
									<strong>ERROR:</strong> <p>`+ resultado.mensaje +`</p>
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>`;

					$("#alerta_error").append(alerta);
				}
			})
			.fail(function(data) {
				console.log("error");
				console.log(data);
			});
		} else {
			var alerta = `<div class="alert alert-warning alert-dismissible fade show" role="alert">
									<strong>ERROR:</strong> <p>Las contraseñas no coinciden</p>
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>`;

			$("#alerta_error").append(alerta);
			$("#conf_contrasena").val('');
		}
	}else{
		alert("Todos los campos son obligatorios");
	}
}