<!-- /MODAL -->
	<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">AGREGAR NUEVO LOTE</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="form_registrar_lote" action="#">
						<div>
							<div class="form-group row d-flex justify-content-center">
								<label for="nom_lot" class="col-md-10">Asigne un nombre al lote:</label>
								<input type="text" class="form-control col-md-10" id="nom_lot" name="nom_lot" placeholder="Ejm: Lote 1, sector sur" required>
							</div>
							<div class="form-group row d-flex justify-content-center">
								<label for="tam_lote" class="col-md-10">Ingrese el tamaño:</label>
								<input type="number" class="form-control col-md-10" id="tam_lote" name="tam_lote" placeholder="Ejm: 100 mts" required>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn text-white" id="btn_registrar_lote" data-dismiss="modal" style="background:#77942E;">Agregar Lote</button>
				</div>
			</div>
		</div>
	</div>

	<!-- /MODAL EDITAR-->
	<div class="modal fade" id="editarLote" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">EDITAR NUEVO LOTE</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				<form id="form_editar_lote" action="#">
						<div>
							<div class="form-group row d-flex justify-content-center">
								<strong>COD SOLICITUD:</strong>
								<p id="codigo"></p>
							</div>
							<div class="form-group row d-flex justify-content-center">
								<label for="edit_nom_lot" class="col-md-10">Actualice el nombre del lote:</label>
								<input type="text" class="form-control col-md-10" id="edit_nom_lot" name="edit_nom_lot" placeholder="Ejm: Lote 1, sector sur" required>
							</div>
							<div class="form-group row d-flex justify-content-center">
								<label for="edit_tam_lote" class="col-md-10">Actulice el tamaño:</label>
								<input type="number" class="form-control col-md-10" id="edit_tam_lote" name="edit_tam_lote" placeholder="Ejm: 100 mts" required>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
								<button type="submit" class="btn text-white" id="btn_editar_lote" data-dismiss="modal" style="background:#77942E;">Editar Lote</button>
							</div>
						</div>
					</form>
				</div>
				
			</div>
		</div>
	</div>