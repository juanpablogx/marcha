<!-- /MODAL -->
	<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">AGREGAR NUEVO EMPLEADO</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="form_registrar_emp" action="#">
					<div class="modal-body">
					
						<div>
							<div class="form-group row d-flex justify-content-center">
								<label for="cedula" class="col-md-10">Cedula:</label>
								<input type="number" class="form-control col-md-10" id="cedula" name="cedula" placeholder="Numero cedula empleado" required>
							</div>
							<div class="form-group row d-flex justify-content-center">
								<label for="nombre" class="col-md-10">Nombres:</label>
								<input type="text" class="form-control col-md-10" id="nombre" name="nombre" placeholder="Pedro.." required>
							</div>
							<div class="form-group row d-flex justify-content-center">
								<label for="apellido" class="col-md-10">Apellidos:</label>
								<input type="text" class="form-control col-md-10" id="apellido" name="apellido" placeholder="Diaz.." required>
							</div>
							<div class="form-group row d-flex justify-content-center">
								<label for="email" class="col-md-10">Correo Electronico:</label>
								<input type="email" class="form-control col-md-10" id="email" name="email" placeholder="pedrodiaz@mail.com"required>
							</div>
							<div class="form-group row d-flex justify-content-center">
								<label for="cel" class="col-md-10">Celular:</label>
								<input type="number" class="form-control col-md-10" id="cel" name="cel" placeholder="Numero de Telefono"required>
							</div>
							<div class="form-group row d-flex justify-content-center">
								<label for="t_contrato" class="col-md-10">Tipo Contrato:</label>
								<select class="form-control col-md-10" name="t_contrato" id="t_contrato" required>
									<option value="Fijo">Fijo</option>
									<option value="Temporal">Temporal</option>
								</select>
							</div>
							<div class="form-group row d-flex justify-content-center">
								<label for="salario" class="col-md-10">Salario:</label>
								<input type="number" class="form-control col-md-10" id="salario" name="salario" placeholder="Mensual - Ejm: $780.000" required>
							</div>
						</div>
					
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="submit" id="btn_registrar" class="btn text-white" data-dismiss="modal" style="background:#77942E;">Agregar Empleado</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<!-- /MODAL EDITAR-->
<div class="modal fade" id="editar_empleado" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">EDITAR EMPLEADO</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="form_editar_emp" action="#">
					<div class="modal-body">
					
						<div>
							<div class="row d-flex justify-content-center">
								<strong class="mr-2">Cedula:</strong><span id="edit_cedula"></span>
							</div>
							<div class="form-group row d-flex justify-content-center">
								<label for="nombre" class="col-md-10">Nombres:</label>
								<input type="text" class="form-control col-md-10" id="edit_nombre" name="edit_nombre" placeholder="Pedro.." required>
							</div>
							<div class="form-group row d-flex justify-content-center">
								<label for="apellido" class="col-md-10">Apellidos:</label>
								<input type="text" class="form-control col-md-10" id="edit_apellido" name="edit_apellido" placeholder="Diaz.." required>
							</div>
							<div class="form-group row d-flex justify-content-center">
								<label for="email" class="col-md-10">Correo Electronico:</label>
								<input type="email" class="form-control col-md-10" id="edit_email" name="edit_email" placeholder="pedrodiaz@mail.com" required>
							</div>
							<div class="form-group row d-flex justify-content-center">
								<label for="cel" class="col-md-10">Celular:</label>
								<input type="number" class="form-control col-md-10" id="edit_celular" name="edit_celular" placeholder="Numero de Telefono" required>
							</div>
							<div class="form-group row d-flex justify-content-center">
								<label for="t_contrato" class="col-md-10">Tipo Contrato:</label>
								<select class="form-control col-md-10" name="edit_contrato" id="edit_contrato" required>
									<option value="Fijo">Fijo</option>
									<option value="Temporal">Temporal</option>
								</select>
							</div>
							<div class="form-group row d-flex justify-content-center">
								<label for="salario" class="col-md-10">Salario:</label>
								<input type="number" class="form-control col-md-10" id="edit_salario" name="edit_salario" placeholder="Mensual - Ejm: $780.000" required>
							</div>
						</div>
					
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="submit" id="btn_editar_em" class="btn text-white" data-dismiss="modal" style="background:#77942E;">Agregar Empleado</button>
					</div>
				</form>
			</div>
		</div>
	</div>


