<!DOCTYPE html>
<html lang="es"> 
	<head> 
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" type="text/css" href="<?php echo base_url('dist/css/bootstrap.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('dist/css/estilosPropios.css'); ?>">

			<!-- Tempusdominus Bootstrap 4 -->
		<link rel="stylesheet" href="<?php echo base_url('dist/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">

		  <!-- Font Awesome -->
  		<link rel="stylesheet" href="<?php echo base_url();?>/dist/plugins/fontawesome-free/css/all.min.css">

        <link rel="icon" type="image/x-icon" href="<?php echo base_url('dist/img/icono2.png'); ?>" />
		<title>MARCHA | Avanza</title>
	</head>
	<body>

		<nav class="navbar navbar-expand-lg navbar-dark" id="menuPrincipal" style="background-color: #234F1E ;border-bottom: none;">
			<div class="container">
				<a class="navbar-brand" href="#">
                    <img src="<?php echo base_url();?>/dist/img/icono5.png" alt="Logo" class="d-inline-block pd-5 img-fluid" style="opacity: 1; width:35px;">
                    <span class="align-text-top">MARCHA</span> 
                </a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navnav">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navnav">
					<ul class="navbar-nav">
                        <li class="nav-item ms-1 dropdown ms-md-4">
							<style>
							#dropdownContacto::after {display: none;}
							</style>
							<a href="#" class="nav-link text-light dropdown-toggle" id="dropdownContacto" data-bs-toggle="dropdown">Contáctanos</a>
							<div class="dropdown-menu" style="min-width: 280px;">
								<h6 class="dropdown-header text-left text-bold">Para contactarse con nosotros y <br>solicitar actualizaciones en sus datos:</h6>
                                <h6 class="dropdown-header text-left">Teléfono:</h6>
								<span class="dropdown-item-text">Teléfono: +57 3333333</span>
                                <h6 class="dropdown-header text-left">Correo:</h6>
								<span class="dropdown-item-text">pruebamarcha351@gmail.com</span>
								<h6 class="dropdown-header text-left text-bold">Redes Sociales</h6>
								<a class="dropdown-item-text text-primary" href="#"><i class="fab fa-facebook"></i> Facebook</a>
								<a class="dropdown-item-text text-danger" href="#"><i class="fab fa-instagram"></i> Instagram</a>
								<a class="dropdown-item-text text-info" href="#"><i class="fab fa-twitter"></i> Twitter</a>
							</div>
						</li>
					</ul>
					<a href="<?php echo base_url('logOut') ?>" class="btn btn-success">
						<i class="fas fa-sign-out-alt nav-icon mx-2" style="color: white;"></i>
						Cerrar Sesión
					</a>
				</div>
				
			</div>
		</nav>

		<main class="container-fluid" style="background: #D3D0CB ;min-height: 87vh;">

			<div class="container">
				<h1 class="text-center pt-4 pb-4">Bienvenid@ <?php echo $session['nombres']." ".$session['apellidos'];?> </h1>
				
				<div class="row justify-content-center mt-4" id="seccion_fincas">
					<div class="col-sm-8 col-md-4 col-lg-3">
						<div class="card rounded-3">
							<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#agregarFinca">
								<img src="<?php echo base_url('dist/img/agregar_finca3.png'); ?>" class="pt-2" width="56" alt="agregar_finca_nueva" >
								<div class="card-body">
									<h5 class="card-title">Agregar Nueva Finca</h5>
								</div>
							</button>
						</div>
					</div>
					<?php 
					if(isset($fincas)): 
						foreach ($fincas as $finca):
						?>
						<div class="col-sm-8 col-md-4 col-lg-3">
							<div class="card rounded-3 text-center pt-2 padre">
								<a class="btn" href="<?php echo base_url(); ?>/Dashboard/<?php echo $finca['id_finca']; ?>">
									<div class="card-body hijo">
										<h4 class="card-title cd_nombre"><?php echo $finca['nombre'] ?></h4>
										<h5 class="card-subtitle mb-2 text-muted"><?php echo $finca['departamento'].', '.$finca['municipio'] ?></h5>
										<p class="card-text cd_extension"><?php echo $finca['extencion'] ?></p>
									</div>
								</a>
								<div>
									<button type="button" class="btn btn-success mb-3 editar" data-bs-toggle="modal" data-bs-target="#editarFinca" data-id_finca="<?php echo $finca['id_finca']; ?>">
										
									<i class="fas fa-edit"></i>
									</button>
									<button type="button" class="btn btn-danger mb-3 eliminar" data-bs-toggle="modal" data-bs-target="#eliminarFinca" data-id_finca="<?php echo $finca['id_finca']; ?>" data-nom_finca="<?php echo $finca['nombre'] ?>">
										<i class="fas fa-trash-alt"></i>
									</button>
								</div>
							</div>
						</div>
						<?php
						endforeach;
					?>
					
					<?php endif; ?>
				</div>
			</div>


		</main>

		<div class="container-fluid" style="background:#77942E">
			<footer class="container py-4 px-3">
				<div class="d-flex justify-content-around">
					<span class="text-light">Copyright MARCHA&copy; 2021.</span>
					<a href="<?php echo base_url('TerminosCondiciones'); ?>" target="_blank" class="link-light">Términos y Condiciones</a>
				</div>
			</footer>
		</div>

		<!-- Modal Agregar Finca-->
		<div class="modal fade" id="agregarFinca" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Nueva Finca</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form id="formAgregar" action="#" method="POST">
						<div class="modal-body">
							<div class="mb-3">
								<label for="nombre" class="form-label">Nombre de la Finca</label>
								<input type="text" class="form-control" id="nombre" name="nombre" required>
							</div>
							<div class="mb-3">
								<label for="departamento" class="form-label">Departamento</label>
								<select name="departamento" id="departamento" class="form-select">
									<option value="" selected>Seleccione un Departamento</option>
									<?php foreach ($deptos as $depto): ?>
									<option value="<?php echo $depto['id_departamento']; ?>"><?php echo $depto['departamento'] ?></option>
									<?php endforeach; ?>
								</select>
							</div> 
							<div class="mb-3">
								<label for="municipio" class="form-label">Municipio</label>
								<select name="municipio" id="municipio" class="form-select">
									<option value="" selected>Seleccione primero un Departamento</option>
								</select>
							</div>
							<div class="mb-3">
								<label for="extension" class="form-label">Extensión (metros cuadrados)</label>
								<input type="number" class="form-control" id="extension" name="extension" required>
							</div>
							<span id="alertaAgregar" class="text-danger"></span>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-success" id="btnAgregar">Agregar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
			
		<!-- Modal EDITAR Finca-->
		<div class="modal fade" id="editarFinca" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Editar Finca</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form id="formEditar" action="#" method="POST">
						<div class="modal-body">
							<div class="form-group row d-flex justify-content-center">
								<strong>COD SOLICITUD:</strong>
								<p id="codigo"></p>
							</div>
							<div class="mb-3">
								<label for="edit_nombre" class="form-label">Nuevo nombre de la Finca</label>
								<input type="text" class="form-control" id="edit_nombre" name="edit_nombre" required>
							</div>
							<div class="mb-3">
								<label for="edit_extension" class="form-label">Nueva extensión (metros cuadrados)</label>
								<input type="number" class="form-control" id="edit_extension" name="edit_extension" required>
							</div>
							<span id="alertaEditar" class="text-danger"></span>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-success" id="btn_editar_finca">Editar</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- Modal Eliminar Finca-->
		<div class="modal fade" id="eliminarFinca" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Enviar petición para eliminar Finca</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form id="formEliminar_f" action="#" method="POST">
						<div class="modal-body">
							<div class="col-md-10 mx-auto">
								<strong>Finca a Eliminar: </strong>
								<p id="nom_finca"></p>
							</div>
							<div class="col-md-10 mx-auto">
								<label for="asuntoEliminar" class="form-label fw-bolder">Asunto por la cual desea eliminarlo:</label>
								<textarea type="number" class="form-control" id="asuntoEliminar" name="asuntoEliminar" required></textarea>
							</div>
							<span id="alertaEliminar" class="text-danger"></span>

							<hr>

							<p>Por medio de este formulario se le enviara su peticion al correo pruebamarcha351@gmail.com, donde sus dirigentes le daran respuesta</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-success" id="btnEliminar">Enviar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
		<script src="<?php echo base_url('dist/js/fincas.js'); ?>"></script>
	</body>
</html>