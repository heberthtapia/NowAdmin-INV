<?PHP
$sql = "TRUNCATE TABLE aux_img ";
$strQ = $db->Execute($sql);
$fecha = $op->ToDay();
$hora = $op->Time();

$sql ="SELECT * FROM sucursal";
$query = $db->Execute($sql);
?>
<form id="formUpdate" action="javascript:updateForm('formUpdate','update.php')" class="form-horizontal" autocomplete="off" >
	<div class="modal fade" id="dataUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="exampleModalLabel">Modificar Repuesto</h4>
				</div>
				<div class="modal-body">
					<div id="datos_ajax_update"></div>

					<div class="form-group">
						<label for="fecha" class="control-label col-md-2">Fecha:</label>
						<div class="col-md-4">
							<input id="fecha" name="fecha" type="text" class="form-control" value="<?=$fecha;?> <?=$hora;?>" disabled="disabled" />
						</div>
						<input id="date" name="date" type="hidden" value="<?=$fecha;?> <?=$hora;?>" />
						<input id="tabla" name="tabla" type="hidden" value="repuesto">
						<input id="idResp" name="idResp" type="hidden">
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
							 	<input type="radio" name="radioRep" id="suc<?=$row['id_sucursal'];?>" data-validation="required" data-validation-error-msg="Requerido" errorMessagePosition="inline" value="<?=$row['id_sucursal'];?>"> <?=$row['nameSuc'];?>
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
						<span>Modificar Producto</span>
					</button>
				</div>
			</div>
		</div>
	</div>
</form>

<script>

	$('#dataUpdate').on('hidden.bs.modal', function (e) {
		// do something...
		$('#form').get(0).reset();
	});

	$('#dataUpdate').on('show.bs.modal', function (event) {

		var button  	= $(event.relatedTarget); // Botón que activó el modal
		var idResp		= button.data('idresp'); // Extraer la información de atributos de datos
		var numParte	= button.data('numparte'); // Extraer la información de atributos de datos
		var name			= button.data('name'); // Extraer la información de atributos de datos
		var detail  	= button.data('detail'); // Extraer la información de atributos de datos
		var fromRep 	= button.data('fromrep'); // Extraer la información de atributos de datos
		var cantidad  = button.data('cantidad'); // Extraer la información de atributos de datos
		var priceSale = button.data('pricesale'); // Extraer la información de atributos de datos
		var priceBuy	= button.data('pricebuy'); // Extraer la información de atributos de datos
		var idSuc			= button.data('idsuc'); // Extraer la información de atributos de datos
		var nameSuc		= button.data('namesuc'); // Extraer la información de atributos de datos

		var modal = $(this);
		modal.find('.modal-title').text('Modificar Repuesto: '+numParte);
		modal.find('.modal-body #idResp').val(idResp);
		modal.find('.modal-body #numParte').val(numParte);
		modal.find('.modal-body #name').val(name);
		modal.find('.modal-body #detail').val(detail);
		modal.find('.modal-body #fromRep').val(fromRep);
		modal.find('.modal-body #cantidad').val(cantidad);
		modal.find('.modal-body #priceSale').val(priceSale);
		modal.find('.modal-body #priceBuy').val(priceBuy);
		//$('.alert').hide();//Oculto alert

		$('input#suc'+idSuc).iCheck('check');
	});

</script>