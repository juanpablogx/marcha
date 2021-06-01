
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
			              <div class="card-body table-responsive p-0" style="height: 40vh;">
			                <table class="table table-head-fixed text-nowrap text-center">
			                  <thead>
							  <tr>
			                      <th>ID</th>
			                      <th>Actividad_Lote</th>
			                      <th>Producto</th>
			                      <th>Cantidad</th>
                                  <th>Accion</th>
			                    </tr>
                                <tr class="bg-dark">
                                <th></th>
                                <th>
                                   <select class="form-control  mx-auto" name="cod_act" id="cod_act" style="width: 80%;">
                                        <option value="Act_Lote_1">Act_Lote_1</option>
                                        <option value="Act_Lote_2">Act_Lote_2</option>
                                        <option value="Act_Lote_3">Act_Lote_3</option>
				                    </select>
                                </th>
                                <th>
                                   <select class="form-control mx-auto" name="cod_producto" id="cod_producto" style="width: 80%;">
                                        <option value="Produc_1">Produc_1</option>
                                        <option value="Produc_2">Product_2</option>
                                        <option value="Produc_3">Produc_3</option>
				                    </select>
                                </th>
                                <th></th>
                                <th>
                                    <button type="submit" class="btn text-white" data-dismiss="modal" style="background:#77942E;">Agregar</button> 
                                </th>
                                </tr>
			                  </thead>
			                  <tbody>
			                    <tr>
			                      <td>1</td>
			                      <td>Gallinas</td>
			                      <td>Brucelas</td>
								  <td>30</td>
			                      <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-primary ver" data-num_id="1">
                                                <i class="fas fa-eye"></i>
                                            </button>

                                            <button type="button" class="btn btn-success editar" data-num_id="1">
                                                <i class="fas fa-edit"></i>
                                            </button>

                                            <button type="button" class="btn btn-danger eliminar" data-num_id="1">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            
                                        </div>
                                    </td>
			                    </tr>
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
	