
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="height: auto;">
	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	      	<div class="container-fluid">
	        	<div class="row mb-2">
	          		<div class="col-sm-6">
	            		<h1 class="m-0">MARCHA\Categoria-Lote</h1>
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
										<th>Categoría</th>
										<th>Lote</th>
										<th>Cantidad</th>
										<th>Acciones</th>
									</tr>
									<tr class="bg-dark">
										<th>
											<select class="form-control mx-auto" name="categoria" id="categoria" style="width: 80%;">
											<?php foreach ($categorias as $cate): ?>
												<option value="<?php echo $cate['id_cat'] ?>"><?php echo $cate['categoria'] ?></option>
												<?php endforeach; ?>
											</select>
										</th>
										<th>
											<select class="form-control mx-auto" name="lote" id="lote" style="width: 80%;">
												<?php foreach ($lotes as $lote): ?>
												<option value="<?php echo $lote['id_lote'] ?>"><?php echo $lote['nombre'] ?></option>
												<?php endforeach; ?>
											</select>											
										</th>
										<th>
											<input type="number" name="cantidad" id="cantidad" class="form-control mx-auto" style="width: 80%;">
										</th>
										<th>
											<button type="submit" class="btn text-white" style="background:#77942E;">Agregar</button> 
										</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach ($asigcategoria as $asigcate): ?>
									<tr>
										<td><?php echo $asigcate['categoria'] ?></td>
										<td><?php echo $asigcate['lote'] ?></td>
										<td style="width: 25%;"><?php echo $asigcate['cantidad'] ?></td>
										<td>
											<div class="btn-group" role="group" aria-label="Basic example">

												<button type="button" class="btn btn-success editar" data-toggle="modal" data-target="#modalEditar" data-num_id="<?php echo $asigcate['id_lot_cat'] ?>">
													<i class="fas fa-edit"></i>
												</button>

												<button type="button" class="btn btn-danger eliminar" data-num_id="<?php echo $asigcate['id_lot_cat'] ?>">
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
	