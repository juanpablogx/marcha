
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="height: auto;">
	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	      	<div class="container-fluid">
	        	<div class="row mb-2">
	          		<div class="col-sm-6">
	            		<h1 class="m-0">MARCHA\Actividad-Inventario</h1>
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
							Agregar Herramienta
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
			                      <th>Actividad_Lote</th>
			                      <th>Producto</th>
			                      <th>Cantidad</th>
								  <th>Tipo</th>
                                  <th>Accion</th>
			                	</tr>
			                  </thead>
			                  <tbody id="listar_herramientas">
			                    <?php foreach ($herramientas as $herramienta): ?>
									<tr>
										<td class="td_act_lot"><?php echo $herramienta['actividad']."-".$herramienta['lote']."-".$herramienta['f_fin'] ?></td>
										<td class="td_producto"><?php echo $herramienta['nombre'] ?></td>
										<td class="td_cantidad"><?php echo $herramienta['cantidad'] ?></td>
										<td class="td_tipo"><?php echo $herramienta['tipo'] ?></td>
										<td>
											<div class="btn-group" role="group" aria-label="Basic example">

												<button type="button" class="btn btn-success editar"  data-toggle="modal" data-target="#editar_herramienta" data-num_id="<?php echo $herramienta['id'] ?>" data-num_actl="<?php echo $herramienta['id_act_lote'] ?>" data-num_product="<?php echo $herramienta['cod_producto'] ?>">
													<i class="fas fa-edit"></i>
												</button>

												<button type="button" class="btn btn-danger eliminar" data-num_id="<?php echo $herramienta['id'] ?>">
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
	