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
				<a class="navbar-brand" href="">MARCHA</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					
				</div>
			</div>
		</nav>

		<main  style="min-height: 110vh; background-image: url(<?php echo base_url('dist/img/fondo4.jpeg'); ?>); background-size: cover;">

			<div class="container" > 
				<div class="row d-flex justify-content-center" style="padding-top: 9em;">
					<div class="col-12 col-md-6 col-lg-4">
						<div class="card" style="background: rgba(0, 0, 0, 0.4);">
							<div class="card-body" style="color: #fff;"> 
								<h2 class="card-title text-center">Cambiar Contraseña</h2>
								<form class="row g-3" action="<?php echo base_url('editarContrasena') ?>" method="POST"> 
									<div class="row g-3">
										<div class="col-md-12">
											<label for="contrasena" class="form-label">Contraseña</label>
											<input type="password" class="form-control" id="contrasena" name="contrasena" required>
										</div>
                                        <div class="col-md-12">
											<label for="confcontrasena" class="form-label">Confirmar Contraseña</label>
											<input type="password" class="form-control" id="confcontrasena" name="confcontrasena" required>
										</div>
									</div>
									<div class="col-12 text-center py-3">
										<button type="submit" class="btn" style="background: rgba(41,125,22,1);border: none; color: #fff;">Cambiar</button>
									</div>
								</form>
							</div>
							<?php if (isset($estado) && $estado=="error") { ?>
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<strong>Error:</strong>
									<strong><?php echo $mensaje; ?></strong> 
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

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </body>
</html>



