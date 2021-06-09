<!-- /MODAL -->
	<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">AGREGAR EMPLEDO ASIGNADO</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="form_registrar_asig_empleado">
						<div>
							<div class="form-group row d-flex justify-content-center">
								<label for="cod_empleado" class="col-md-10">Empleado:</label>
								<select class="form-control col-9 col-md-8" name="cod_empleado" id="cod_empleado" style="width: 80%;">
								<option value="">Seleccione un Empleado</option>
									<?php foreach ($asig_emp as $asig): ?>
										<option value="<?php echo $asig['id_empleado']; ?>"><?php echo $asig['nombres']." ". $asig['apellidos']?></option>
									<?php endforeach; ?>
								</select>
								<a class="btn btn-warning col-2 col-md-1 ml-2" href="<?php echo base_url().'/Empleados'; ?>" class="nav-link">	
									<i class="fas fa-plus-square" style="color: white;"></i>
								</a>
							</div>
							<div class="form-group row d-flex justify-content-center">
								<label for="cod_act" class="col-md-10">Actividad_lote:</label>
								<select class="form-control  col-9 col-md-8" name="cod_act" id="cod_act" style="width: 80%;">
								<option value="">Seleccione una Actividad_lote</option>
									<?php foreach ($actividad_l as $act_lote): ?>
										<option value="<?php echo $act_lote['id']; ?>"><?php echo $act_lote['nomact']." - ".$act_lote['nomlote']." - ".$act_lote['f_fin'] ?></option>
									<?php endforeach; ?>
								</select>
								<a class="btn btn-warning col-2 col-md-1 ml-2" href="<?php echo base_url().'/LoteActividad'; ?>" class="nav-link">	
									<i class="fas fa-plus-square" style="color: white;"></i>
								</a>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="submit" id="btn_registrar_asig_empleado" class="btn text-white" data-dismiss="modal" style="background:#77942E;">Agregar Empleado</button>
				</div>
			</div>
		</div>
	</div>

<!-- MODAL EDITAR -->
	<div class="modal fade" id="modal_editar_asig_empleado" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">EDITAR EMPLEDO ASIGNADO</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div>
							<div class="form-group row d-flex justify-content-center">
								<strong>COD SOLICITUD:</strong>
								<p id="codigo"></p>
							</div>
							<div class="form-group row d-flex justify-content-center">
								<label for="cod_calificar" class="col-md-10">Calificacion:</label>
								<select class="form-control  mx-auto" name="edit_cod_calificar" id="edit_cod_calificar" style="width: 80%;">
									<option value="Pendiente" disabled>Pendiente</option>
									<option value="Muy_bueno">Muy Bueno</option>
									<option value="Bueno">Bueno</option>
									<option value="Regular">Regular</option>
									<option value="Malo">Malo</option>
									<option value="Muy_malo">Muy Malo</option>
								</select>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="submit" id="btn_editar_asig_empleado" class="btn text-white" data-dismiss="modal" style="background:#77942E;">Editar</button>
				</div>
			</div>
		</div>
	</div>
	