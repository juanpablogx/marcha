<!-- /MODAL -->   
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">AGREGAR NUEVA RELACION LOTE ACTIVIDAD</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="form_relacionar_lote" action="#">
                        <div>
                            <div class="form-group row d-flex justify-content-center">
								<label for="lote" class="col-md-10">Seleccione un lote:</label>
								<select class="form-control col-md-10" name="lote" id="lote" required>
									<option value="" selected>Seleccione lote</option>
									<?php foreach ($lotes as $lote): ?>
										<option value="<?php echo $lote['id_lote']; ?>"><?php echo $lote['nombre'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
                            <div class="form-group row d-flex justify-content-center">
								<label for="actividad" class="col-md-10">Seleccione una actividad:</label>
								<select class="form-control col-md-10" name="actividad" id="actividad" required>
									<option value="" selected>Seleccione actividad</option>
									<?php foreach ($actividades as $act): ?>
										<option value="<?php echo $act['id_actividad']; ?>"><?php echo $act['nombre'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
                            <?php $fcha = date("Y-m-d");?>
                            <div class="form-group row d-flex justify-content-center">
                                <label for="f_inicio" class="col-md-10">Fecha de Inicio:</label>
                                <input class="form-control"  type="date" id="f_inicio" name="f_inicio"
                                    value="<?php echo $fcha;?>">
							</div>
                            <div class="form-group row d-flex justify-content-center">
                                <label for="f_fin" class="col-md-10">Fecha de Fin:</label>
                                <input class="form-control"  type="date" id="f_fin" name="f_fin">
							</div>
                        </div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn text-white" id="btn_registrar_lact" data-dismiss="modal" style="background:#77942E;">Agregar Lote Actividad</button>
				</div>
			</div>
		</div>
	</div>




<!-- /MODAL ACTUALIZAR-->   
	<div class="modal fade" id="actualizar" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">ACTUALIZAR FECHAS DE RESULTADO</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="form_editar_relacionar_lote" action="#">
                        <div>
							<h4 class="text-center">Actualizar las fechas</h4>
							<div class="d-flex justify-content-center">
								<strong>Solicitud N°:</strong> <span id="cod"></span>
							</div>
							
                            <?php $fcha = date("Y-m-d");?>
                            <div class="form-group row d-flex justify-content-center">
                                <label for="edit_f_inicio" class="col-md-10">Fecha de Inicio:</label>
                                <input class="form-control"  type="date" id="edit_f_inicio" name="edit_f_inicio"
                                    value="<?php echo $fcha;?>">
							</div>
                            <div class="form-group row d-flex justify-content-center">
                                <label for="edit_f_fin" class="col-md-10">Fecha de Fin:</label>
                                <input class="form-control"  type="date" id="edit_f_fin" name="edit_f_fin">
							</div>
                        </div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn text-white" id="btn_editar_lact" data-dismiss="modal" style="background:#77942E;">Agregar Lote Actividad</button>
				</div>
			</div>
		</div>
	</div>

<!-- Small modal -->
	<div class="modal fade" id="cambiar_estado" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">CAMBIO ESTADO</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="form_editar_estado" action="#">
						<div>
							<div class="form-group">
								<label>Seleccione el nuevo estado:</label>
								<select class="form-control" name="edit_estado" id="edit_estado">
									<option value="Pendiente">Pendiente</option>
									<option value="Proceso">Proceso</option>
									<option value="Terminada">Terminada</option>
								</select>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-warning text-white" id="btn_editar_estado" data-dismiss="modal">Actualizar</button>
				</div>							
			</div>
		</div>
	</div>