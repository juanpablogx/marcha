
    <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper" style="height: auto;">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">MARCHA\actividad</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">  
							<li class="breadcrumb-item active">Ponte en MARCHA y AVANZA</li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div><!-- /.content-header -->

		<div class="content">
			<div class="container">
				<div class="p-4 mt-2 mb-2 text-white rounded" style="background: #234F1E;">
					<div class="d-flex justify-content-center">
						<button type="button" class="btn text-white" data-toggle="modal" data-target="#staticBackdrop" style="background:#77942E;">
							Agregar Actividad
						</button>
					</div>
				</div>

				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Tabla de contenido</h3>	
							</div>
							<!-- /.card-header -->
							<div class="card-body table-responsive p-0" style="height: 40vh;">
								<table class="table table-head-fixed text-nowrap text-center">
								<thead>
									<tr>
										<th>Nombre</th>
										<th>Descripcion</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody id="listar_actividad">
									<?php foreach ($actividades as $actividad): ?>
										<tr>
											<td class="td_nom"><?php echo $actividad['nombre'] ?></td>
											<td class="td_desc"><?php echo $actividad['descripcion'] ?></td>
											<td>
												<div class="btn-group" role="group" aria-label="Basic example">

													<button type="button" class="btn btn-success editar"  data-toggle="modal" data-target="#editar_actividad" data-num_id="<?php echo $actividad['id_actividad'] ?>">
														<i class="fas fa-edit"></i>
													</button>

													<button type="button" class="btn btn-danger eliminar" data-num_id="<?php echo $actividad['id_actividad'] ?>">
														<i class="fas fa-trash-alt"></i>
													</button>
														
												</div>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
								</table>
							</div>
						<!-- /.card-body -->
						</div>
						<!-- /.card -->
					</div>
				</div>	

			</div>	    	
		</div>
	</div>

