<!DOCTYPE html>
<html lang="es">  
  <head>  
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  	<link rel="stylesheet" type="text/css" href="<?php echo base_url('dist/css/bootstrap.css'); ?>">

    <title>MARCHA | Avanza</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark" id="menuPrincipal" style="background-color: #234F1E ;border-bottom: none; ">
			<div class="container">
				<a class="navbar-brand" href="<?php echo base_url(); ?>">
                    <img src="<?php echo base_url();?>/dist/img/icono5.png" alt="Logo" class="d-inline-block pd-5 img-fluid" style="opacity: 1; width:35px;">
                    <span class="align-text-top">MARCHA</span> 
                </a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item ms-4">
								<a class="nav-link" href="<?php echo base_url(); ?>">Inicio</a>
						</li>
						<li class="nav-item ms-4">
								<a class="nav-link" href="<?php echo base_url('Registro'); ?>">Registro</a>
						</li>
						<li class="nav-item ms-4">
								<a class="nav-link active" href="<?php echo base_url('Ingreso'); ?>">Ingreso</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<main  style="min-height: 110vh; background-image: url(<?php echo base_url('dist/img/fondo4.jpeg'); ?>); background-size: cover;">

			<div class="container" > 
				<div class="row d-flex justify-content-center" style="padding-top: 9em;">
					<div class="col-12 col-md-6 col-lg-4">
						<div class="card" style="background: rgba(0, 0, 0, 0.4);">
							<div class="card-body" style="color: #fff;"> 
								<h2 class="card-title text-center">Inicio de Sesión</h2>
								<form class="row g-3" action="<?php echo base_url('validarIngreso') ?>" method="POST"> 
									<div class="row g-3">
										<div class="col-md-12">
											<label for="usuario" class="form-label">Correo</label>
											<input type="text" class="form-control" id="usuario" name="email" value="<?php echo (isset($valor_email))? $valor_email:''; ?>">
										</div>
										<div class="col-md-12">
											<label for="contrasena" class="form-label">Contraseña</label>
											<input type="password" class="form-control" id="contrasena" name="password">
										</div>
									</div>
									<div class="col-12 text-center py-3">
										<button type="submit" class="btn" style="background: rgba(41,125,22,1);border: none; color: #fff;">Ingresar</button>
									</div>
								</form>
								<a href="#recuperar" class="card-text text-white" data-bs-toggle="modal" data-bs-target="#modalRecuperar">¿Olvidaste tu contraseña?</a>
							</div>
							<?php if (isset($mensaje_ingreso) && $mensaje_ingreso=="ERROR") { ?>
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<strong>Error:</strong>
									<strong>Datos Incorrectos</strong> 
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>

		</main>
		<div class="container-fluid" style="background:#77942E">
			<footer class="container py-4 px-3">
				<div class="d-flex justify-content-around">
					<span class="text-light">Copyright MARCHA&copy; 2021.</span>
					<a href="#" class="link-light">Términos y Condiciones</a>
				</div>
			</footer>
		</div>

	<!-- Modal -->
			<div class="modal fade" id="modalRecuperar" tabindex="-1">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Recuperar Cuenta</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<div class="row g-3">
								<div class="col-md-12">
									<label for="correoReiniciar" class="form-label">Correo Electrónico</label>
									<input type="email" class="form-control" id="correoReiniciar">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
							<button type="button" class="btn btn-primary" id="btnRecuperar">Enviar</button>
						</div>
					</div>
				</div>
			</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="<?php echo base_url('dist/js/ingreso.js'); ?>"></script>
  </body>
</html>



