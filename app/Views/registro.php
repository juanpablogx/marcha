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
				<a class="navbar-brand" href="index.html">MARCHA</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item ms-4">
								<a class="nav-link" href="<?php echo base_url(); ?>">Inicio</a>
						</li>
						<li class="nav-item ms-4">
								<a class="nav-link active" href="<?php echo base_url('Registro'); ?>">Registro</a>
						</li>
						<li class="nav-item ms-4">
								<a class="nav-link " href="<?php echo base_url('Ingreso'); ?>">Ingreso</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<main  style="min-height: 110vh; background-image: url(<?php echo base_url('dist/img/fondo4.jpeg'); ?>); background-size: cover;">
			
			    <div class="container pb-5">
			      <div class="row d-flex justify-content-center" style="padding-top: 4em;">
			        <div class="col-12 col-md-10 col-sm-6">
			          <div class="card text-dark" style="background: rgba(0, 0, 0, 0.4);">
			            <div class="card-body" style="color: #fff;">
			              <h2 class="card-title text-center">Registro</h2>
			              	<form id="formulario_registro" action="#" method="post" accept-charset="utf-8" class="row">
				              	<div class="mb-2 col-12">
					                <label for="cedula" class="form-label">Cedula</label>
					                <input name="cedula" type="number" id="cedula" required class="form-control">
					            </div>
					            <div class="mb-2 col-md-6">
					                <label for="nombre" class="form-label">Nombre</label>
					                <input name="nombre" type="text" id="nombre" required class="form-control">
					            </div>
					            <div class="mb-2 col-md-6">
					                <label for="apellido" class="form-label">Apellidos</label>
					                <input name="apellido" type="text" id="apellido" required class="form-control">
					            </div>
					            <div class="mb-2 col-12">
					                <label for="correo" class="form-label">Correo Electronico (Este sera Usuario)</label>
					                <input name="correo" type="email" id="correo" required  class="form-control">
					            </div>
					            <div class="mb-2 col-md-6">
					                <label for="contrasena" class="form-label">Contraseña</label>
					                <input name="contrasena" type="password" id="contrasena" required  class="form-control">
					            </div>
					            <div class="mb-2 col-md-6">
					                <label for="conf_contrasena" class="form-label">Confirmacion Contraseña</label>
					                <input name="conf_contrasena" type="password" id="conf_contrasena" required class="form-control">
					            </div>

				                <div class="col-12 text-center py-3">
				                	<button type="submit" class="btn btn-success" id="btn_registrar" style="background: rgba(41,125,22,1);border: none;">Registrar</button>
				                </div>
				              	<div id="alerta_error">
				              	</div>
			              	</form> 
			            </div>
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
	
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="<?php echo base_url('dist/js/registro_inicial.js'); ?>"></script>
  </body>
</html>



