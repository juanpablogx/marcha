<!-- /MODAL REGISTRAR-->
	<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  	<div class="modal-dialog modal-dialog-centered">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="staticBackdropLabel">AGREGAR ACTIVIDAD</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          	<span aria-hidden="true">&times;</span>
			        </button>
	      		</div>
	      		<form id="form_registrar_act" action="#">
		      		<div class="modal-body">
						<div>
							<div class="form-group row d-flex justify-content-center">
				                <label for="nombre" class="col-md-10">Nombre:</label>
				                <input  type="text" class="form-control col-md-10" id="nombre" name="nombre" placeholder="Ej: Desparacitación">
				            </div>
				            <div class="form-group row d-flex justify-content-center">
				                <label for="descripcion" class="col-md-10">Descripcion:</label>
				                <textarea type="text" class="form-control col-md-10" name="descripcion" id="descripcion"></textarea>
				            </div>
						</div>
					</div>
			      	<div class="modal-footer">
			        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			        	<button type="submit" id="btn_registrar" class="btn text-white" data-dismiss="modal" style="background:#77942E;">Agregar Actividad</button>
			      	</div>
				</form>
	    	</div>
	  	</div>
	</div>


<!-- /MODAL EDITAR-->
	<div class="modal fade" id="editar_actividad" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  	<div class="modal-dialog modal-dialog-centered">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="staticBackdropLabel">EDITAR ACTIVIDAD</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          	<span aria-hidden="true">&times;</span>
			        </button>
	      		</div>
	      		<form id="form_editar_act" action="#">
		      		<div class="modal-body">
						<div>
							<div class="form-group row d-flex justify-content-center">
								<strong>COD SOLICITUD:</strong>
								<p class="mx-3" id="codigo"></p>
							</div>
							<div class="form-group row d-flex justify-content-center">
				                <label for="edit_nombre" class="col-md-10">Nombre:</label>
				                <input  type="text" class="form-control col-md-10" id="edit_nombre" name="edit_nombre" placeholder="Ej: Desparacitación">
				            </div>
				            <div class="form-group row d-flex justify-content-center">
				                <label for="edit_descripcion" class="col-md-10">Descripcion:</label>
				                <textarea type="text" class="form-control col-md-10" name="edit_descripcion" id="edit_descripcion"></textarea>
				            </div>
						</div>
					</div>
			      	<div class="modal-footer">
			        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			        	<button type="submit" id="btn_editar" class="btn text-white" data-dismiss="modal" style="background:#77942E;">Editar Actividad</button>
			      	</div>
				</form>
	    	</div>
	  	</div>
	</div>