<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MARCHA | Avanza</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>/dist/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url();?>/dist/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>/dist/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <!-- <link rel="stylesheet" href="<?php //echo base_url();?>/dist/plugins/overlayScrollbars/css/OverlayScrollbars.min.css"> -->

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center" style="background: #234F1E;">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    <h1>MARCHA</h1>
  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand" style="background:#234F1E;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-light" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <span class="nav-link text-light">MARCHA</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block dropdown">
        <style>
        #dropdownContacto::after {display: none;}
        </style>
        <a href="#" class="nav-link text-light dropdown-toggle" id="dropdownContacto" data-toggle="dropdown">Contáctanos</a>
        <div class="dropdown-menu">
          <h6 class="dropdown-header text-left text-bold">Para contactarse con nosotros y solicitar actualizaciones en sus datos:</h6>
          <span class="dropdown-item-text">Teléfono: +57 3333333</span>
          <span class="dropdown-item-text">Correo: pruebamarcha351@gmail.com</span>
          <h6 class="dropdown-header text-left text-bold">Redes Sociales</h6>
          <a class="dropdown-item-text text-primary" href="#"><i class="fab fa-facebook"></i> Facebook</a>
          <a class="dropdown-item-text text-danger" href="#"><i class="fab fa-instagram"></i> Instagram</a>
          <a class="dropdown-item-text text-info" href="#"><i class="fab fa-twitter"></i> Twitter</a>
        </div>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto mx-3"> 
      <li class="nav-item text-light">
      Finca: <?php if(isset($session_finca)) { echo $session_finca['nombre'];} ?>
      </li>
    </ul>
    <!-- Right navbar links <-->
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4" style="background:#77942E;">
    <!-- Brand Logo -->
    <div style="background:#234F1E;">
      <a href="#" class="brand-link">
        <!-- <img src="<?php echo base_url();?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <img src="<?php echo base_url();?>/dist/img/icono5.png" alt="Logo" class="brand-image" style="opacity: 1;">
        <span class="brand-text font-weight-light text-light">MARCHA</span>
      </a>  
    </div>
    

    <!-- Sidebar -->
    <div style="background: #77942E; height: 100%;">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-map-marked-alt" style="color: white;"></i>
              <p class="text-light">
                Lote
                <i class="fas fa-angle-left right" style="color: white;"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url().'/Lotes'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color: white;"></i>
                  <p class="text-light"> Crear Lote</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'/Asig_Categoria'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color: white;"></i>
                  <p class="text-light"> Asignar Categoria</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'/LoteActividad'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color: white;"></i>
                  <p class="text-light">Asignar Lote Actividad</p>
                </a>
              </li>
            </ul>
          </li> 
          <li class="nav-item">
            <a href="<?php echo base_url().'/Categorias'; ?>" class="nav-link">
              <i class="nav-icon fas fa-chart-pie" style="color: white;"></i>
              <p class="text-light">Categoria</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url().'/Empleados'; ?>" class="nav-link">
              <i class="nav-icon fas fa-id-card" style="color: white;"></i>
              <p class="text-light">Empleado</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url().'/Inventario'; ?>" class="nav-link">
              <i class="nav-icon fas fa-cart-plus" style="color: white;"></i>
              <p class="text-light">Inventario</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tractor" style="color: white;"></i>
              <p class="text-light">
                Actividad
                <i class="fas fa-angle-left right" style="color: white;"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url().'/Actividades'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color: white;"></i>
                  <p class="text-light">Agregar Actividad</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'/herramientas'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color: white;"></i>
                  <p class="text-light">Asignar Herramientas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'/Asig_empleado'; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color: white;"></i>
                  <p class="text-light">Asignar Empleado</p>
                </a>
              </li> 
            </ul>
          </li> 
          <li class="nav-item">
              <a href="<?php echo base_url().'/inicioAdmin' ?>" class="nav-link">
                <i class="fas fa-house-user nav-icon" style="color: white;"></i>
                <p class="text-light">Ir a fincas</p>
              </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>  
    