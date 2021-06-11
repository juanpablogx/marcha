<!DOCTYPE html>
<html lang="es">   
    <head> 
    <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="<?php echo base_url('dist/css/bootstrap.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('dist/css/cards.css'); ?>">
        <link rel="icon" type="image/x-icon" href="<?php echo base_url('dist/img/icono2.png'); ?>" />
        <title>MARCHA | Avanza</title>
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark" id="menuPrincipal" style="background-color: #234F1E;border-bottom: none; ">
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
						<li class="nav-item ms-1 ms-md-4">
								<a class="nav-link active  " href="<?php echo base_url(); ?>">Inicio</a>
						</li>
						<li class="nav-item ms-1 ms-md-4">
								<a class="nav-link" href="<?php echo base_url('Registro'); ?>">Registro</a>
						</li>
						<li class="nav-item ms-1 ms-md-4">
								<a class="nav-link " href="<?php echo base_url('Ingreso'); ?>">Ingreso</a>
						</li>
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
				</div>
			</div>
		</nav>

		<main style="background: #D3D0CB ;min-height: 90vh;">
			<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?php echo base_url('dist/img/campo1.jpg'); ?>" class="d-block w-100" alt="..." style="min-height: 50vh; max-height: 70vh; filter: brightness(60%);">
                        <div class="carousel-caption d-none d-md-block" >
                        <h2 class="display-4">Bienvenido a MARCHA</h2>
                        <p class="text-">Ponte en MARCHA y avanza.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="<?php echo base_url('dist/img/campo2.jpg'); ?>" class="d-block w-100" alt="..." style="min-height: 50vh; max-height: 70vh; filter: brightness(60%);">
                        <div class="carousel-caption d-none d-md-block">
                        <h2 class="display-4">Administración de Fincas Agropecuarias</h2>
                        <p>Registrate y crea tu finca.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="<?php echo base_url('dist/img/campo3.jpg'); ?>" class="d-block w-100" alt="..."style="min-height: 50vh; max-height: 70vh; filter: brightness(60%);">
                        <div class="carousel-caption d-none d-md-block">
                        <h2 class="display-4">Toda tu información en un solo lugar</h2>
                        <p>Todo lo que hacías en papel, ahora digital.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <section class="container-fluid">
                <div class="contenedor_card">
                    <div class="card">
                        <img src="<?php echo base_url('dist/img/card1.jpeg'); ?>">
                        <h5 class="card-title mt-3">Variedad de animales</h5>
                        <p class="card-text mb-3">Nuestra plataforma abarca tematicas generales para el registro asociada a una variedad de animales de granja.</p>
                    </div>
                    <div class="card">
                        <img src="<?php echo base_url('dist/img/card2.jpeg'); ?>">
                        <h5 class="card-title mt-3">Mayor Atencion</h5>
                        <p class="card-text mb-3">Marcha es pensado para tener presente cada actividad planeada, acorde a tiempos e importancia.</p>
                    </div>
                    <div class="card">
                        <img src="<?php echo base_url('dist/img/card3.jpeg'); ?>">
                        <h5 class="card-title mt-3">Sistematizacion de proceso administrativo</h5>
                        <p class="card-text mb-3">Mayor seguridad y nueva metodologia para manejo y control de la informacion.</p>
                    </div>	
                </div>
            </section>
            <div class="container">
                <div class="row pb-4" style="margin-top: 1em;">
                    <div class="col-12 col-md-12 col-sm-12  d-flex justify-content-center">
                        <div class="card mb-3" style="border-radius: 10px;">
                            <div class="row g-0">
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title" style="color: #638E3D; ">SOBRE NOSOTROS</h5>
                                        <p class="card-text">Somos un grupo de jovenes colombianos Tecnologos en Desarrollo de Software que buscan hacer un mundo mejor. Nuestro producto esta validado para los sectores agropecuarios del pais.</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <img class="img-fluid p-2" src="<?php echo base_url('dist/img/campo4.jpg'); ?>" alt="foto participantes">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12  d-flex justify-content-center">
                        <div class="card mb-3" style=" border-radius: 10px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img class="img-fluid p-2" src="<?php echo base_url('dist/img/campo5.jpg'); ?>" alt="mision" style=" border-radius: 10px;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"  style="color: #638E3D;">MISION</h5>
                                        <p class="card-text">Proveemos soluciones de software, brindando una excelente experiencia con nuestras herramientas para el sector Agropecuario. Ofrecemos un servicio oportuno y de calidad, garantizando la tranquilidad, confiabilidad y desarrollo sostenible de nuestros clientes.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12  d-flex justify-content-center">
                        <div class="card mb-3" style="border-radius: 10px; ">
                            <div class="row g-0">
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"  style="color: #638E3D;">VISION</h5>
                                        <p class="card-text">Alcanzar el reconocimiento a nivel nacional como una empresa proveedora de soluciones de software, impactando positivamente con nuestro Proyecto MARCHA a todo el sector Agropecuario.</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <img class="img-fluid p-2" src="<?php echo base_url('dist/img/campo6.jpg'); ?>" alt="vision">
                                </div>
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
					<a href="<?php echo base_url('TerminosCondiciones'); ?>" target="_blank" class="link-light">Términos y Condiciones</a>
				</div>
			</footer>
		</div>
	
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="<?php echo base_url('dist/js/slider.js'); ?>"></script>
    </body>
</html>



