<?PHP
$sql = "TRUNCATE TABLE aux_img ";
$strQ = $db->Execute($sql);
$fecha = $op->ToDay();
$hora = $op->Time();

$sql ="SELECT * FROM sucursal";
$query = $db->Execute($sql);
?>
<form id="formNew" action="javascript:saveForm('formNew','save.php')" class="form-horizontal" autocomplete="off" >
	<div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="exampleModalLabel">Nuevo Repuesto</h4>
				</div>
				<div class="modal-body">
					<div id="datos_ajax"></div>

					<div class="form-group">
						<label for="fecha" class="control-label col-md-2">Fecha:</label>
						<div class="col-md-4">
							<input id="fecha" name="fecha" type="text" class="form-control" value="<?=$fecha;?> <?=$hora;?>" disabled="disabled" />
						</div>
						<input id="date" name="date" type="hidden" value="<?=$fecha;?> <?=$hora;?>" />
						<input id="tabla" name="tabla" type="hidden" value="repuesto">
					</div>
					<div class="form-group">
						<label for="numParte" class="control-label col-md-2"># De Parte:</label>
						<div class="col-md-4">
							<input type="text" class="form-control" id="numParte" name="numParte" placeholder="# de Parte"
								   data-validation="required"> <!--server-->
								   <!--data-validation-url="modulo/almacen/validateCode.php"-->
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="control-label col-md-2">Repuesto:</label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="name" name="name" placeholder="Nombre Repuesto" data-validation="required">
						</div>
					</div>
					<div class="form-group">
						<label for="fromRep" class="control-label col-md-2">Repuesto Para Modelos:</label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="fromRep" name="fromRep" placeholder="Repuesto Para" data-validation="required">
						</div>
					</div>
					<div class="form-group">
						<label for="cantidad" class="control-label col-md-2">Cantidad:</label>
						<div class="col-md-4 col-xs-6">
							<input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad" data-validation="required number" >
						</div>
					</div>
					<div class="form-group">
						<label for="priceSale" class="control-label col-md-2">Precio Venta:</label>
						<div class="col-md-4 col-xs-6 input-group">
							<div class="input-group-addon">Bs</div>
							<input type="text" class="form-control" id="priceSale" name="priceSale" placeholder="Precio Venta"
							data-validation="required number"
							data-validation-error-msg-container="#error-container"
							data-validation-allowing="float" >
						</div>
						<div id="error-container"></div>
					</div>
					<div class="form-group">
						<label for="priceBuy" class="control-label col-md-2">Precio Compra:</label>
						<div class="col-md-4 col-xs-6 input-group">
							<div class="input-group-addon">Bs</div>
							<input type="text" class="form-control" id="priceBuy" name="priceBuy" placeholder="Precio Compra"
							data-validation="required number"
							data-validation-error-msg-container="#error-container1"
							data-validation-allowing="float" >
						</div>
						<div id="error-container1"></div>
					</div>
					<div class="form-group">
						<label for="detail" class="control-label col-md-2">Detalle:</label>
						<div class="col-md-10">
							<textarea class="form-control" id="detail" name="detail" data-validation="required" placeholder="Detalle" rows="3"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="detail" class="control-label col-md-2">Sucursal:</label>
						<div class="col-md-10">
						<?php
							while ($row = $query->FetchRow()) {
						?>
							<label class="radio-inline">
							 	<input type="radio" name="radioRep" id="<?=$row['id_sucursal'];?>" data-validation="required" data-validation-error-msg="Requerido" errorMessagePosition="inline" value="<?=$row['id_sucursal'];?>"> <?=$row['nameSuc'];?>
							</label>
						<?php
							}
						?>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" id="close" class="btn btn-danger" data-dismiss="modal">
						<i class="fa fa-close" aria-hidden="true"></i>
						<span>Cancelar</span>
					</button>
					<button type="submit" id="save" class="btn btn-success">
						<i class="fa fa-check" aria-hidden="true"></i>
						<span>Agregar Producto</span>
					</button>
				</div>
			</div>
		</div>
	</div>
</form>

<script>
	$('#dataRegister').on('hidden.bs.modal', function (e) {
		// do something...
		$('#formNew').get(0).reset();
		$('div.iradio_square-blue').removeClass('checked');
		//despliega('modulo/almacen/producto.php','contenido');
	});
</script>