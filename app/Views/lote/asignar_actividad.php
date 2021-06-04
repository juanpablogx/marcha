
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="height: auto;">
	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	      	<div class="container-fluid">
	        	<div class="row mb-2">
	          		<div class="col-sm-6">
	            		<h1 class="m-0">MARCHA\Actividad-Lote</h1>
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
							Agregar Lote 
						</button>
					</div>
				</div>

				<div class="row">
			        <div class="col-12">
			            <div class="card">
			              	<div class="card-header">
			                	<h3 class="card-title">Tabla de contenido</h3>

			                	<div class="card-tools">
									<div class="form-group clearfix">
										<div class="d-inline mr-2">
											<span>Filtrar por:</span>
										</div>
										<div class="icheck-primary d-inline">
											<input type="radio" id="radioPrimary1" class="radioPrimary1" name="r1" value="proceso">
											<label for="radioPrimary1">Proceso</label>
										</div>
										<div class="icheck-warning d-inline">
											<input type="radio" id="radioPrimary2" class="radioPrimary1" name="r1" value="pendiente">
											<label for="radioPrimary2">Pendiente</label>
										</div>
										<div class="icheck-success d-inline">
											<input type="radio" id="radioPrimary3" class="radioPrimary1" name="r1" value="terminada">
											<label for="radioPrimary3">Terminada</label>
										</div>
									</div>
								</div>
			              </div>
			              <!-- /.card-header -->
			              <div class="card-body table-responsive p-0" style="height: 40vh;">
			                <table class="table table-head-fixed text-nowrap text-center">
								<thead>
									<tr>
										<th>Lote</th>
										<th>Actividad</th>
										<th>Fecha inicio</th>
										<th>Fecha fin</th>
										<th>Estado</th>
										<th>Acción</th>
									</tr>
								</thead>
			                  	<tbody id="listar_lote_actividad">
									<?php foreach ($loteactividad as $lact): ?>
										<tr>
											<td class="td_lote"><?php echo $lact['nlote'] ?></td>
											<td class="td_actividad"><?php echo $lact['nactividad'] ?></td>
											<td class="td_finicio"><?php echo $lact['f_inicio'] ?></td>
											<td class="td_ffinal"><?php echo $lact['f_fin'] ?></td>
											<td class="td_estado">
												<?php echo $lact['estado'] ?>
												<button type="button" class="btn btn-warning act_estado" data-toggle="modal" data-target="#cambiar_estado" data-num_id="<?php echo $lact['id'] ?>">
													<!-- <i class="fas fa-fan"></i> -->
													<i class="fas fa-exchange-alt"></i>
												</button>
											</td>
											<td>
												<div class="btn-group" role="group" aria-label="Basic example">
													<button type="button" class="btn btn-success editar" data-toggle="modal" data-target="#actualizar" data-num_id="<?php echo $lact['id'] ?>">
														<i class="fas fa-edit"></i>
													</button>

													<button type="button" class="btn btn-danger eliminar" data-num_id="<?php echo $lact['id'] ?>">
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
	