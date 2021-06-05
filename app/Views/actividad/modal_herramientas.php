<!-- /MODAL REGISTRAR-->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  	<div class="modal-dialog modal-dialog-centered">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="staticBackdropLabel">AGREGAR ACTIVIDAD-INVENTARIO</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          	<span aria-hidden="true">&times;</span>
			        </button>
	      		</div>
	      		<form id="form_registrar_herramienta" action="#">
		      		<div class="modal-body">
						<div>
                            <div class="form-group row d-flex justify-content-center">
                                <label for="cod_actL" class="col-md-10">Actividad_Lote: </label>
                                <select class="form-control col-md-10" name="cod_actL" id="cod_actL">
                                    <?php foreach ($actividad_l as $act_l): ?>
                                		<option value="<?php echo $act_l['id']; ?>"><?php echo $act_l['nactividad']."-".$act_l['nlote'] ?></option>
									<?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group row d-flex justify-content-center">
                            	<label for="cod_producto" class="col-md-10">Producto: </label>
                            	<select class="form-control col-md-10" name="cod_producto" id="cod_producto">
                            		<?php foreach ($inventario as $inv): ?>
                                    	<option value="<?php echo $inv['id_producto']; ?>"><?php echo $inv['nombre'] ?></option>
									<?php endforeach; ?>
			                    </select>
							</div>
							<div class="form-group row d-flex justify-content-center">
								<label for="cantidad" class="col-md-10">Cantidad: </label>
								<input type="number" class="form-control col-md-10" id="cantidad" name="cantidad">
							</div>
							<div class="form-group row d-flex justify-content-center">
								<label for="tipo" class="col-md-10">Tipo: </label>
								<select class="form-control col-md-10" id="tipo" name="tipo">
									<option value="Litros">Litros</option>
									<option value="Mililitros">Mililitros</option>
									<option value="Kilos">Kilos</option>
									<option value="Gramos">Gramos</option>
									<option value="Metros">Metros</option>
									<option value="Centimetros">Centimetros</option>
									<option value="Unidades">Unidades</option>
								</select>
							</div>
						</div>
					</div>
			      	<div class="modal-footer">
			        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			        	<button type="submit" id="btn_registrar" class="btn text-white" data-dismiss="modal" style="background:#77942E;">Agregar</button>
			      	</div>
				</form>
	    	</div>
	  	</div>
	</div>

<!-- /MODAL EDITAR-->
<div class="modal fade" id="editar_herramienta" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  	<div class="modal-dialog modal-dialog-centered">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h5 class="modal-title" id="staticBackdropLabel">EDITAR ACTIVIDAD-INVENTARIO</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          	<span aria-hidden="true">&times;</span>
		        </button>
      		</div>
      		<form id="form_editar_herramienta" action="#">
	      		<div class="modal-body">
					<div>
						<div class="form-group row d-flex justify-content-center">
							<strong>COD SOLICITUD:</strong>
							<p class="mx-3" id="codigo"></p>
						</div>
                        <div class="form-group row d-flex justify-content-center">
                            <label for="edit_cod_actL" class="col-md-10">Actividad_Lote: </label>
                            <select class="form-control col-md-10" name="edit_cod_actL" id="edit_cod_actL">
                                <?php foreach ($actividad_l as $act_l): ?>
                                	<option value="<?php echo $act_l['id']; ?>"><?php echo $act_l['nactividad']."-".$act_l['nlote'] ?></option>
								<?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group row d-flex justify-content-center">
                        	<label for="edit_cod_producto" class="col-md-10">Producto: </label>
                        	<select class="form-control col-md-10" name="edit_cod_producto" id="edit_cod_producto">
                        		<?php foreach ($inventario as $inv): ?>
                                	<option value="<?php echo $inv['id_producto']; ?>"><?php echo $inv['nombre'] ?></option>
								<?php endforeach; ?>
		                    </select>
						</div>
						<div class="form-group row d-flex justify-content-center">
							<label for="edit_cantidad" class="col-md-10">Cantidad: </label>
							<input type="number" class="form-control col-md-10" id="edit_cantidad" name="edit_cantidad">
						</div>
						<div class="form-group row d-flex justify-content-center">
							<label for="edit_tipo" class="col-md-10">Tipo: </label>
							<select class="form-control col-md-10" id="edit_tipo" name="edit_tipo">
								<option value="Litros">Litros</option>
								<option value="Mililitros">Mililitros</option>
								<option value="Kilos">Kilos</option>
								<option value="Gramos">Gramos</option>
								<option value="Metros">Metros</option>
								<option value="Centimetros">Centimetros</option>
								<option value="Unidades">Unidades</option>
							</select>
						</div>
					</div>
				</div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		        	<button type="submit" id="btn_editar" class="btn text-white" data-dismiss="modal" style="background:#77942E;">Editar</button>
		      	</div>
			</form>
    	</div>
  	</div>
</div>