<?php
/**
 * Created by PhpStorm.
 * User: SONY
 * Date: 23/9/2016
 * Time: 16:25
 */
session_start();

include '../../adodb5/adodb.inc.php';
include '../../inc/function.php';

$db = NewADOConnection('mysqli');
//$db->debug = true;
$db->Connect();

$op = new cnFunction();
?>
<script type="text/javascript" language="javascript" class="init">

    $(document).ready(function() {
        $('#tablaList').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ filas por pagina",
                "zeroRecords": "No se encontro nada - Lo siento",
                "info": "Mostrando _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(Filtrada de _MAX_ registros en total)",
                "search":         "Buscar:",
                "paginate": {
                    "first":      "Primero",
                    "last":       "Ultimo",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                }
            },
            "columnDefs": [
                {
                    "targets": [ 1 ],
                    "visible": false,
                    "searchable": false
                }
            ]
        });

        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            //increaseArea: '100%' // optional
          });

        $('input').on('ifChecked', function(event){
            id = $(this).attr('id');
            statusEmp(id, 'Activo');
        });
        $('input').on('ifUnchecked',function(event){
            id = $(this).attr('id');
            statusEmp(id, 'Inactivo');
        });

    });
    $.validate({
        lang: 'es',
        modules : 'security',
        modules : 'modules/logic'
    });
    $('#obser').restrictLength( $('#max-length-element') );
</script>
<table id="tablaList" class="table table-bordered table-striped table-condensed" width="100%">
  <thead>
  <tr>
      <th>Nº</th>
      <th>Fecha</th>
      <th># Parte</th>
      <th>Nombre</th>
      <th>Detalle</th>
      <th>Para Modelos</th>
      <th>Cantidad</th>
      <th>Precio Venta</th>
      <th>Precio Compra</th>
      <th>Almacenado Sucursal</th>
      <th>Acciones</th>
  </tr>
  </thead>
  <tbody>
  <?PHP
  $sql   = "SELECT r.id_repuesto, r.numParte, r.name, r.detail, r.fromRep, a.cantidad, r.priceSale, r.priceBuy, s.id_sucursal, s.nameSuc ";
  $sql  .= "FROM repuesto AS r, almacen AS a, sucursal AS s WHERE r.id_repuesto = a.id_repuesto ";
  $sql  .= "AND a.id_sucursal = s.id_sucursal ORDER BY (r.dateReg) DESC ";

  $cont = 1;

  $srtQuery = $db->Execute($sql);
  if($srtQuery === false)
      die("failed");

  while( $row = $srtQuery->FetchRow()){

      ?>
      <tr id="tb<?=$row[0]?>">
          <td align="center"><?=$cont++;?></td>
          <td align="center"><?=$row['dateReg']?></td>
          <td align="center"><?=$row['numParte'];?></td>
          <td align="center"><?=$row['name'];?></td>
          <td align="center"><?=$row['detail'];?></td>
          <td align="center"><?=$row['fromRep'];?></td>
          <td align="center"><?=$row['cantidad'];?></td>
          <td align="center"><?=$row['priceSale'];?></td>
          <td align="center"><?=$row['priceBuy'];?></td>
          <td align="center"><?=$row['nameSuc'];?></td>
          <td width="14%">
              <div class="btn-group" style="width: 171px">
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#dataUpdate"
                      data-idResp     =   "<?=$row['id_repuesto']?>"
                      data-numParte   =   "<?=$row['numParte']?>"
                      data-name       =   "<?=$row['name']?>"
                      data-detail     =   "<?=$row['detail']?>"
                      data-fromRep    =   "<?=$row['fromRep']?>"
                      data-cantidad   =   "<?=$row['cantidad']?>"
                      data-priceSale  =   "<?=$row['priceSale']?>"
                      data-priceBuy   =   "<?=$row['priceBuy']?>"
                      data-idSuc      =   "<?=$row['id_sucursal']?>"
                      data-nameSuc    =   "<?=$row['nameSuc']?>">
                      <i class='glyphicon glyphicon-edit'></i> Modificar
                  </button>

                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dataDelete" data-id="<?=$row['id_repuesto']?>"  >
                      <i class='glyphicon glyphicon-trash'></i> Eliminar
                  </button>
              </div>
          </td>
      </tr>
      <?PHP
  }
  ?>
  </tbody>
  <tfoot>
  <tr>
      <th>Nº</th>
      <th>Fecha</th>
      <th># Parte</th>
      <th>Nombre</th>
      <th>Detalle</th>
      <th>Para Modelos</th>
      <th>Cantidad</th>
      <th>Precio Venta</th>
      <th>Precio Compra</th>
      <th>Almacenado Sucursal</th>
      <th>Acciones</th>
  </tr>
  </tfoot>
</table>