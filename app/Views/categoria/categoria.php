
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper" style="height: auto;">
	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	      	<div class="container-fluid">
	        	<div class="row mb-2">
	          		<div class="col-sm-6">
	            		<h1 class="m-0">MARCHA\categoria</h1>
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
						<button type="button" class="btn text-white" data-toggle="modal" data-target="#modalAgregar" style="background:#77942E;">
						  	Agregar Categoria 
						</button>
					</div>
				</div>

				<div class="row">
			        <div class="col-12">
			            <div class="card">
			              	<div class="card-header">
			                	<h3 class="card-title">Tabla de contenido</h3>

			                	<div class="card-tools">
			                 	 	<div class="input-group input-group-sm" style="width: 150px;">
			                    		<input type="text" name="table_search" class="form-control float-right" placeholder="Search">

			                    		<div class="input-group-append">
			                      			<button type="submit" class="btn btn-default">
			                        		<i class="fas fa-search"></i>
			                      			</button>
			                    		</div>
			                  		</div>
			                	</div>
			              	</div>
			              	<!-- /.card-header -->
			              	<div class="card-body table-responsive p-0" style="height: 300px;">
			                	<table class="table table-head-fixed text-nowrap text-center">
									<thead>
										<tr>
											<th>Categoria</th>
											<th>Tipo</th>
											<th>Produce</th>
											<th>ACCIONES</th>
											<th>Acciones</th>
										</tr>
									</thead>
									<tbody id="lista_categorias">
										<?php foreach ($categorias as $cate): ?>
											<tr>
												<td class="td_cate"><?php echo $cate['categoria'] ?></td>
												<td class="td_tipo"><?php echo $cate['tipo'] ?></td>
												<td class="td_prod"><?php echo $cate['produce'] ?></td>
												<td>
													<div class="btn-group" role="group" aria-label="Basic example">

														<button type="button" class="btn btn-success editar"  data-toggle="modal" data-target="#editarCategoria" data-num_id="<?php echo $cate['id_cat'] ?>">
															<i class="fas fa-edit"></i>
														</button>

														<button type="button" class="btn btn-danger eliminar" data-num_id="<?php echo $cate['id_cat'] ?>">
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

	SE MOSTRARA EN TABLA
	</div>
	