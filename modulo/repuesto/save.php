<?PHP
	session_start();

	include '../../adodb5/adodb.inc.php';
	include '../../inc/function.php';

	$db = NewADOConnection('mysqli');
	//$db->debug = true;
	$db->Connect();

	$op = new cnFunction();

	$fecha = $op->ToDay();
	$hora = $op->Time();

	$data = stripslashes($_POST['res']);

	$data = json_decode($data);

	//$cargo = $op->toCargo($data->cargo);

	$strQuery = "INSERT INTO repuesto ( numParte,  name, fromRep, priceSale, priceBuy, detail, dateReg, status ) ";
	$strQuery.= "VALUES ('".$data->numParte."', '".$data->name."', '".$data->fromRep."','".$data->priceSale."','".$data->priceBuy."', ";
	$strQuery.= "'".$data->detail."', '".$data->date."', 'Activo' )";

	$sql = $db->Execute($strQuery);

	$lastId = $db->insert_Id();

	$strQuery = "INSERT INTO almacen ( id_repuesto, id_sucursal, cantidad, dateReg, status ) ";
	$strQuery.= "VALUES ('".$lastId."', '".$data->radioRep."', '".$data->cantidad."', '".$data->date."', 'Activo' )";

	$sql = $db->Execute($strQuery);

	if($sql)
		echo json_encode($data);
	else
		echo 0;

?>