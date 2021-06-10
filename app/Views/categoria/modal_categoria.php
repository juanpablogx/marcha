<!-- /MODAL -->
	<div class="modal fade" id="modalAgregar" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  	<div class="modal-dialog modal-dialog-centered">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="staticBackdropLabel">AGREGAR NUEVA CATEGORIA</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          	<span aria-hidden="true">&times;</span>
			        </button>
	      		</div>
				<form id="form_registrar_cat" action="#">  
		      		<div class="modal-body">
						<div>
							<div class="form-group row d-flex justify-content-center">
					      		<label for="nom_categ" class="col-md-10">Agregar Nueva Categoria:</label>
					      		<input type="text" class="form-control col-md-10" id="nom_categ" name="nom_categ" placeholder="Ejm:Vacas (leche), Pollos(huevo)..." required>
					    	</div>
					    	<div class="form-group row d-flex justify-content-center">
					      		<label for="tipo" class="col-md-10">Seleccione un tipo:</label>
								<select class="form-control col-md-10" name="t_categoria" id="t_categoria" required>
									<option value="Animal">Animal</option>
									<option value="Cultivo">Cultivo</option>
								</select>
					    	</div>
					    	<div class="form-group row d-flex justify-content-center">
					      		<label for="tp_prod" class="col-md-10">Que producira:</label>
					      		<input type="text" class="form-control col-md-10" id="tp_prod" name="tp_prod" placeholder="Ejm: leche, carne, huevos" required>
					    	</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="submit" id="btn_registrar" class="btn text-white" data-dismiss="modal" style="background:#77942E;">Agregar Categoria</button>
					</div>
				</form>
	    	</div>
	  	</div>
	</div>

<!-- /MODAL EDITAR-->
<div class="modal fade" id="editarCategoria" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">EDITAR CATEGORIA</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="form_editar_cate" action="#">
					<div class="modal-body">
					
						<div>
							<div class="form-group row d-flex justify-content-center">
					      		<strong>COD SOLICITUD:</strong>
								<p id="codigo"></p>
					    	</div>
							<div class="form-group row d-flex justify-content-center">
					      		<label for="edit_categ" class="col-md-10">Categoria:</label>
					      		<input type="text" class="form-control col-md-10" id="edit_categ" name="edit_categ" placeholder="Cambio de categoria" required>
					    	</div>
					    	<div class="form-group row d-flex justify-content-center">
					      		<label for="edit_tcategoria" class="col-md-10">Seleccione un tipo:</label>
								<select class="form-control col-md-10" name="edit_tcategoria" id="edit_tcategoria" required>
									<option value="Animal">Animal</option>
									<option value="Cultivo">Cultivo</option>
								</select>
					    	</div>
					    	<div class="form-group row d-flex justify-content-center">
					      		<label for="edit_prod" class="col-md-10">Que producira:</label>
					      		<input type="text" class="form-control col-md-10" id="edit_prod" name="edit_prod" placeholder="Cambio de producido" required>
					    	</div>
						</div>
					
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="submit" id="btn_editar_cate" class="btn text-white" data-dismiss="modal" style="background:#77942E;">Editar categoria</button>
					</div>
				</form>
			</div>
		</div>
</div>