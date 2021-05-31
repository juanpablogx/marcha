
    <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper" style="height: auto;">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">MARCHA\empleado</h1>
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
			<div class="container-fluid">
				<div class="p-4 mt-2 mb-2 text-white rounded" style="background: #234F1E;">
					<div class="d-flex justify-content-center">
						<button type="button" class="btn text-white" id="id_boton_agregar" data-toggle="modal" data-target="#staticBackdrop" style="background:#77942E;">
							Agregar Empleado
						</button>
					</div>
				</div>

				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Tabla de contenido</h3>

								<div class="card-tools">
									<form>
										<div class="custom-control custom-switch custom-switch-on-success">
											<input type="checkbox" class="custom-control-input" id="checkInactivos">
											<label class="custom-control-label" id="labelCheckEmp" for="checkInactivos">Mostrar Inactivos</label>
										</div>
									</form>
								</div>
							</div>
							<!-- /.card-header -->
							<div class="card-body table-responsive p-0" style="height: 300px;">
								<table class="table table-head-fixed text-nowrap text-center">
								<thead>
									<tr>
										<th>Cedula</th>
										<th>Nombre</th>
										<th>Apellido</th>
										<th>Correo</th>
										<th>Celular</th>
										<th>T_contrato</th>
										<th>Salario</th>
										<th>Estado</th>
										<th></th>
									</tr>
								</thead>
								<tbody id="lista_empleados">
									<?php foreach ($empleados as $empleado): ?>
										<tr>
											<td class="td_ced"><?php echo $empleado['cedula'] ?></td>
											<td class="td_nom"><?php echo $empleado['nombres'] ?></td>
											<td class="td_ape"><?php echo $empleado['apellidos'] ?></td>
											<td class="td_email"><?php echo $empleado['correo'] ?></td>
											<td class="td_cel"><?php echo $empleado['telefono'] ?></td>
											<td class="td_contra"><?php echo $empleado['tipo_contrato'] ?></td>
											<td class="td_sal"><?php echo $empleado['salario'] ?></td>
											<td><?php echo $empleado['estado'] ?></td>
											<td>
												<div class="btn-group" role="group" aria-label="Basic example">

													<button type="button" class="btn btn-success editar"  data-toggle="modal" data-target="#editar_empleado" data-num_id="<?php echo $empleado['cedula'] ?>">
														<i class="fas fa-edit"></i>
													</button>

													<button type="button" class="btn btn-danger eliminar" data-num_id="<?php echo $empleado['cedula'] ?>">
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

	<!-- /CONTENEDOR -->
	</div>

