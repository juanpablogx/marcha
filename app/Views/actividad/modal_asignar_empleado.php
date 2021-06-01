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
			        <form>
						<div>
							<div class="form-group row d-flex justify-content-center">
								<label for="cod_empleado" class="col-md-10">Empleado:</label>
								<select class="form-control col-md-10" name="cod_empleado" id="cod_empleado" style="width: 80%;">
                                    <option value="Empl_1">Empl_1</option>
                                    <option value="Empl_2">Empl_2</option>
                                    <option value="Empl_3">Empl_3</option>
				                </select>
							</div>
							<div class="form-group row d-flex justify-content-center">
				                <label for="cod_act" class="col-md-10">Actividad_lote:</label>
				                <select class="form-control  mx-auto" name="cod_act" id="cod_act" style="width: 80%;">
                                    <option value="Act_Lote_1">Act_Lote_1</option>
                                    <option value="Act_Lote_2">Act_Lote_2</option>
                                    <option value="Act_Lote_3">Act_Lote_3</option>
				                </select>
				            </div>
							<div class="form-group row d-flex justify-content-center">
				                <label for="fecha_i" class="col-md-10">Fecha de Inicio:</label>
				                <input type="date" class="form-control col-md-10" name="fecha_i" id="fecha_i">
				            </div>
				            <div class="form-group row d-flex justify-content-center">
				                <label for="fecha_f" class="col-md-10">Fecha de Fin:</label>
				                <input name="fecha_f" type="date" id="fecha_f" class="form-control col-md-10">
				            </div>
				            <div class="form-group row d-flex justify-content-center">
				                <label for="cod_calificar" class="col-md-10">Calificacion:</label>
				                <select class="form-control  mx-auto" name="cod_calificar" id="cod_calificar" style="width: 80%;">
                                    <option value="Muy_bueno">Muy Bueno</option>
                                    <option value="Bueno">Bueno</option>
                                    <option value="Regular">Regular</option>
                                    <option value="Malo">Malo</option>
                                    <option value="Muy_malo">Muy Malo</option>
				                </select>
				            </div>
				            <div class="form-group row d-flex justify-content-center">
				                <label for="descripcion" class="col-md-10">Descripcion:</label>
				                <input type="text" class="form-control col-md-10" name="descripcion" id="descripcion">
				            </div>
							<div class="form-group row d-flex justify-content-center">
				                <label for="estado" class="col-md-10">Estado:</label>
				                <select class="form-control col-md-10" name="estado" id="estado">
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
		        	<button type="submit" class="btn text-white" data-dismiss="modal" style="background:#77942E;">Agregar Empleado</button>
		      	</div>
	    	</div>
	  	</div>
	</div>


<!-- futuro actualizar -->
<!-- <div class="form-group row d-flex justify-content-center">
				                <label for="edit_estado" class="col-md-10">Estado:</label>
				                <select class="form-control col-md-10" name="edit_estado" id="edit_estado">
				                    <option value="Pendiente">Pendiente</option>
				                    <option value="Proceso">Proceso</option>
				                    <option value="Terminada">Terminada</option>
				                </select>
				            </div> -->