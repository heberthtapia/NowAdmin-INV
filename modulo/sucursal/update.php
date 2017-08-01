<?PHP
	session_start();

	include '../../adodb5/adodb.inc.php';
	include '../../inc/function.php';

	$db = NewADOConnection('mysqli');

	$db->Connect();

	$op = new cnFunction();

	$fecha = $op->ToDay();
	$hora = $op->Time();

	$data = stripslashes($_POST['res']);

	$data = json_decode($data);

	$strQuery = "UPDATE repuesto SET dateReg = '".$fecha." ".$hora."', ";
	$strQuery.= "numParte = '".$data->numParte."', name = '".$data->name."', fromRep = '".$data->fromRep."', ";
	$strQuery.= "priceSale = '".$data->priceSale."', priceBuy = '".$data->priceBuy."', detail='".$data->detail."', status = 'Activo' ";
	$strQuery.= "WHERE id_repuesto = '".$data->idResp."' ";

	$sql = $db->Execute($strQuery);

	$strQuery = "UPDATE almacen SET dateReg = '".$fecha." ".$hora."', ";
	$strQuery.= "id_sucursal = '".$data->radioRep."', cantidad = '".$data->cantidad."', status = 'Activo' ";
	$strQuery.= "WHERE id_repuesto = '".$data->idResp."' ";

	$sql = $db->Execute($strQuery);

	if($sql)
		echo json_encode($data);
	else
		echo 0;

?>