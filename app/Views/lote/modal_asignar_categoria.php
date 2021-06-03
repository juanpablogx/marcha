
<!-- /MODAL EDITAR-->
<div class="modal fade" id="modalEditar" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">EDITAR</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="form_editar_emp" action="#">
					<div class="modal-body">
					
						<div>
							<div class="form-group row d-flex justify-content-center">
								<label for="edit_cantidad" class="col-md-10">Nueva Cantidad:</label>
								<input type="text" class="form-control col-md-10" id="edit_cantidad" name="edit_cantidad" placeholder="Cantidad" required>
							</div>
						</div>
					
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="submit" id="btnEditar" class="btn text-white" data-dismiss="modal" style="background:#77942E;">Editar</button>
					</div>
				</form>
			</div>
		</div>
</div>


