<!-- /MODAL -->
<div class="modal fade" id="modalRegistrar" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">AGREGAR NUEVO PRODUCTO</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="formRegistrar" action="#">
					<div class="modal-body">
					
						<div>
							<div class="form-group row d-flex justify-content-center">
								<label for="nombre" class="col-md-10">Nombre:</label>
								<input type="text" class="form-control col-md-10" id="nombre" name="nombre" placeholder="Nombre del producto" required>
							</div>
							<div class="form-group row d-flex justify-content-center">
								<label for="descripcion" class="col-md-10">Descripción:</label>
								<input type="text" class="form-control col-md-10" id="descripcion" name="descripcion" placeholder="Descripción" required>
							</div>
							<div class="form-group row d-flex justify-content-center">
								<label for="medida" class="col-md-10">Medida:</label>
								<input type="number" class="form-control col-md-10" id="medida" name="medida" placeholder="Medida por unidad" required>
							</div>
							<div class="form-group row d-flex justify-content-center">
								<label for="tipo" class="col-md-10">Tipo:</label>
								<select class="form-control col-md-10" id="tipo" name="tipo" required>
									<option value="Litros">Litros</option>
									<option value="Mililitros">Mililitros</option>
									<option value="Kilos">Kilos</option>
									<option value="Gramos">Gramos</option>
									<option value="Metros">Metros</option>
									<option value="Centimetros">Centimetros</option>
									<option value="Unidades">Unidades</option>
								</select>
							</div>
							<div class="form-group row d-flex justify-content-center">
								<label for="precio_und" class="col-md-10">Precio Unitario:</label>
								<input type="number" class="form-control col-md-10" id="precio_und" name="precio_und" placeholder="Precio Unitario"required>
							</div>
							<div class="form-group row d-flex justify-content-center">
								<label for="stock" class="col-md-10">Cantidad Disponible:</label>
								<input type="number" class="form-control col-md-10" name="stock" id="stock" placeholder="Stock disponible" required>
							</div>
						</div>
					
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="submit" id="btnRegistrar" class="btn text-white" data-dismiss="modal" style="background:#77942E;">Agregar Producto</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<!-- /MODAL EDITAR-->
<div class="modal fade" id="modalEditar" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">EDITAR PRODUCTO</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="form_editar_emp" action="#">
					<div class="modal-body">
					
						<div>
							<div class="form-group row d-flex justify-content-center">
								<label for="edit_nombre" class="col-md-10">Nombre:</label>
								<input type="text" class="form-control col-md-10" id="edit_nombre" name="edit_nombre" placeholder="Nombre del producto" required>
							</div>
							<div class="form-group row d-flex justify-content-center">
								<label for="edit_descripcion" class="col-md-10">Descripción:</label>
								<input type="text" class="form-control col-md-10" id="edit_descripcion" name="edit_descripcion" placeholder="Descripción" required>
							</div>
							<div class="form-group row d-flex justify-content-center">
								<label for="edit_medida" class="col-md-10">Medida:</label>
								<input type="number" class="form-control col-md-10" id="edit_medida" name="edit_medida" placeholder="Medida por Unidad" required>
							</div>
							<div class="form-group row d-flex justify-content-center">
								<label for="edit_tipo" class="col-md-10">Tipo:</label>
								<select class="form-control col-md-10" id="edit_tipo" name="edit_tipo" required>
									<option value="Litros">Litros</option>
									<option value="Mililitros">Mililitros</option>
									<option value="Kilos">Kilos</option>
									<option value="Gramos">Gramos</option>
									<option value="Metros">Metros</option>
									<option value="Centimetros">Centimetros</option>
									<option value="Unidades">Unidades</option>
								</select>
							</div>
							<div class="form-group row d-flex justify-content-center">
								<label for="edit_precio_und" class="col-md-10">Precio Unitario:</label>
								<input type="number" class="form-control col-md-10" id="edit_precio_und" name="edit_precio_und" placeholder="Precio Unitario"required>
							</div>
							<div class="form-group row d-flex justify-content-center">
								<label for="edit_stock" class="col-md-10">Cantidad Disponible:</label>
								<input type="number" class="form-control col-md-10" name="edit_stock" id="edit_stock" placeholder="Stock disponible" required>
							</div>
						</div>
					
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="submit" id="btnEditar" class="btn text-white" data-dismiss="modal" style="background:#77942E;">Editar Producto</button>
					</div>
				</form>
			</div>
		</div>
	</div>


