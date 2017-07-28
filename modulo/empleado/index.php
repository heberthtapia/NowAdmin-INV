<?PHP
  session_start();

  include '../../adodb5/adodb.inc.php';
  include '../../inc/function.php';

  $db = NewADOConnection('mysqli');
  //$db->debug = true;
  $db->Connect();

  $op = new cnFunction();

  $cargo = $_SESSION['cargo'];
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>ADMINISTRADOR - CMS</title>

    <!-- Bootstrap core CSS -->
    <link href="../../assets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/bootstrap-datetimepicker.min.css">
    <!--external css-->
    <link href="../../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="../../assets/css/style.css" rel="stylesheet">
    <link href="../../assets/css/style-responsive.css" rel="stylesheet">

    <link href="../../assets/css/table-responsive.css" rel="stylesheet">

    <link href="../../assets/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../../assets/css/square/blue.css" rel="stylesheet">
    <link href="../../uploadify/uploadify.css" rel="stylesheet">
    <link href="../../assets/css/theme-default.css" rel="stylesheet">
    <link type="text/css" href="../../assets/css/myStyle.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>ADMINISTRADOR - CMS</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-tasks"></i>
                            <span class="badge bg-theme">4</span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">You have 4 pending tasks</p>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">DashGum Admin Panel</div>
                                        <div class="percent">40%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Database Update</div>
                                        <div class="percent">60%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Product Development</div>
                                        <div class="percent">80%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Payments Sent</div>
                                        <div class="percent">70%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                            <span class="sr-only">70% Complete (Important)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="external">
                                <a href="#">See All Tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- settings end -->
                    <!-- inbox dropdown start-->
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge bg-theme">5</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">You have 5 new messages</p>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="../../assets/img/ui-zac.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Zac Snider</span>
                                    <span class="time">Just now</span>
                                    </span>
                                    <span class="message">
                                        Hi mate, how is everything?
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="../../assets/img/ui-divya.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Divya Manian</span>
                                    <span class="time">40 mins.</span>
                                    </span>
                                    <span class="message">
                                     Hi, I need your help with this.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="../../assets/img/ui-danro.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Dan Rogers</span>
                                    <span class="time">2 hrs.</span>
                                    </span>
                                    <span class="message">
                                        Love your new Dashboard.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="../../assets/img/ui-sherman.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Dj Sherman</span>
                                    <span class="time">4 hrs.</span>
                                    </span>
                                    <span class="message">
                                        Please, answer asap.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">See all messages</a>
                            </li>
                        </ul>
                    </li>
                    <!-- inbox dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.html">Cerrar Session</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

              	  <p class="centered"><a href="profile.html"><img src="../../assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">Marcel Newman</h5>

                  <li class="mt">
                      <a href="../../admin.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Tablero</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a class="active" href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Empleados</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="index.php">Lista de Empleados</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>UI Elements</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="general.html">General</a></li>
                          <li><a  href="buttons.html">Buttons</a></li>
                          <li><a  href="panels.html">Panels</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Components</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="calendar.html">Calendar</a></li>
                          <li><a  href="gallery.html">Gallery</a></li>
                          <li><a  href="todo_list.html">Todo List</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Extra Pages</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="blank.html">Blank Page</a></li>
                          <li><a  href="login.html">Login</a></li>
                          <li><a  href="lock_screen.html">Lock Screen</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-tasks"></i>
                          <span>Forms</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="form_component.html">Form Components</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>Data Tables</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="basic_table.html">Basic Table</a></li>
                          <li class="active"><a  href="responsive_table.html">Responsive Table</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class=" fa fa-bar-chart-o"></i>
                          <span>Charts</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="morris.html">Morris</a></li>
                          <li><a  href="chartjs.html">Chartjs</a></li>
                      </ul>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            <h1 class="avisos" align="center"><strong>EMPLEADOS</strong></h1>
          	<h3><i class="fa fa-angle-right"></i> Lista de Empleados</h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <!-- <h4><i class="fa fa-angle-right"></i> Responsive Table</h4> -->
              <div class="pull-right"><br>
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#dataRegister">
                      <i class="fa fa-plus" aria-hidden="true"></i>
                      <span>Agregar Empleado</span>
                  </button>
              </div>
              <div class="clearfix"></div>
              <br>
              <section id="unseen">
               <!--  <table id="tablaList" class="table table-striped table-bordered" cellspacing="0" width="100%"> -->
                <table id="tablaList" class="table table-bordered table-striped table-condensed">
                  <thead>
                  <tr>
                      <th>Nº</th>
                      <th>Fecha</th>
                      <th>Foto</th>
                      <th>Nombre</th>
                      <th>Ap. Paterno</th>
                      <th>Ap. Materno</th>
                      <th>Cargo</th>
                      <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?PHP
                    $sql = "SELECT * ";
                    $sql.= "FROM empleado AS e, usuario AS u ";
                    $sql.= "WHERE e.id_empleado = u.id_empleado ";
                    $sql.= "ORDER BY (e.dateReg) DESC ";

                    $cont = 1;

                    $srtQuery = $db->Execute($sql);
                    if($srtQuery === false)
                        die("failed");

                    while( $row = $srtQuery->FetchRow()){
                  ?>
                      <tr id="tb<?=$row[0]?>">
                          <td align="center"><?=$cont++;?></td>
                          <td><?=$row['dateReg']?></td>
                          <td align="center" width="10%">
                              <?PHP
                              if( $row['foto'] != '' )
                              {
                                  ?>
                                  <img class="thumb" src="../../thumb/phpThumb.php?src=../modulo/empleado/uploads/<?=($row['foto']);?>&amp;w=120&amp;h=80&amp;far=1&amp;bg=FFFFFF&amp;hash=361c2f150d825e79283a1dcc44502a76" alt="">

                                  <?PHP
                              }
                              else{
                                  ?>
                                  <img class="thumb" src="../../thumb/phpThumb.php?src=../modulo/empleado/uploads/sin_imagen.jpg&amp;w=120&amp;h=80&amp;far=1&amp;bg=FFFFFF&amp;hash=361c2f150d825e79283a1dcc44502a76" alt="">
                                  <?PHP
                              }
                              ?>
                          </td>
                          <td><?=$row['nombre'];?></td>
                          <td><?=$row['apP'];?></td>
                          <td><?=$row['apM'];?></td>
                          <td><?=$op->toSelect($row['cargo']);?></td>
                          <td width="15%">
                              <div class="btn-group">
                                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#dataPreview"
                                                  data-foto="<?=$row['foto']?>"
                                                  data-name="<?=$row['nombre']?>"
                                                  data-paterno="<?=$row['apP']?>"
                                                  data-materno="<?=$row['apM']?>"
                                                  data-ci="<?=$row['id_empleado']?>"
                                                  data-dep="<?=$row['depa']?>"
                                                  data-dateNac="<?=$row['dateNac']?>"
                                                  data-fono="<?=$row['phone']?>"
                                                  data-celular="<?=$row['celular']?>"
                                                  data-emailC="<?=$row['email']?>"
                                                  data-cargo="<?=$row['cargo']?>"
                                                  data-codUser="<?=$row['user']?>"
                                                  data-password="<?=$row['pass']?>"
                                                  data-addresC="<?=$row['direccion']?>"
                                                  data-Nro="<?=$row['numero']?>"
                                                  data-cx="<?=$row['coorX']?>"
                                                  data-cy="<?=$row['coorY']?>"
                                                  data-obser="<?=$row['obser']?>"
                                          >
                                            <i class='fa fa-external-link'></i>
                                            <span>Vista Previa</span>
                                          </button>

                                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#dataUpdate"
                                                  data-foto="<?=$row['foto']?>"
                                                  data-name="<?=$row['nombre']?>"
                                                  data-paterno="<?=$row['apP']?>"
                                                  data-materno="<?=$row['apM']?>"
                                                  data-ci="<?=$row['id_empleado']?>"
                                                  data-dep="<?=$row['depa']?>"
                                                  data-dateNac="<?=$row['dateNac']?>"
                                                  data-fono="<?=$row['phone']?>"
                                                  data-celular="<?=$row['celular']?>"
                                                  data-emailC="<?=$row['email']?>"
                                                  data-cargo="<?=$row['cargo']?>"
                                                  data-codUser="<?=$row['user']?>"
                                                  data-password="<?=$row['pass']?>"
                                                  data-addresC="<?=$row['direccion']?>"
                                                  data-Nro="<?=$row['numero']?>"
                                                  data-cx="<?=$row['coorX']?>"
                                                  data-cy="<?=$row['coorY']?>"
                                                  data-obser="<?=$row['obser']?>"
                                          >
                                            <i class='fa fa-pencil-square-o '></i>
                                            <span>Modificar</span>
                                          </button>
                              </div>
                              <div style="margin-top: 5px">
                                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dataDelete" data-id="<?=$row['id_empleado']?>"  ><i class='glyphicon glyphicon-trash'></i> Eliminar
                                  </button>

                                  <div class="checkbox" id="status<?=$row['id_empleado']?>">
                                          <?PHP
                                          if( $row['statusEmp'] == 'Activo' ){
                                          ?>
                                              <input type="checkbox" name="checks" checked id="<?=$row['id_empleado']?>"/>
                                              <label>Status</label>
                                          <?PHP
                                          }else{
                                          ?>
                                              <input type="checkbox" name="checks" id="<?=$row['id_empleado']?>"/>
                                              <label>Status</label>
                                          <?PHP
                                          }
                                          ?>
                                  </div>
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
                      <th>Foto</th>
                      <th>Nombre</th>
                      <th>Ap. Paterno</th>
                      <th>Ap. Materno</th>
                      <th>Cargo</th>
                      <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
              </section>
            </div><!-- /content-panel -->
          </div><!-- /col-lg-4 -->
        </div><!-- /row -->

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2014 - Alvarez.is
              <a href="responsive_table.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="../../assets/js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../../assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="../../assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script type="text/javascript" src="../../assets/js/jquery.scrollTo.min.js"></script>
    <script type="text/javascript" src="../../assets/js/jquery.nicescroll.js"></script>
    <!--common script for all pages-->
    <script src="../../assets/js/common-scripts.js"></script>
    <!--script for this page-->
    <script type="text/javascript" src="../../assets/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="../../assets/js/dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="../../assets/js/jquery.json-2.3.js"></script>
    <script type="text/javascript" src="../../assets/js/jquery.form-validator.js"></script>

    <!--DatePicker-->
    <script type="text/javascript" src="../../assets/js/es-ES.js"></script>
    <script type="text/javascript" src="../../assets/js/moment.js"></script>
    <script type="text/javascript" src="../../assets/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="../../assets/js/es.js"></script>
    <!--icheck-->
    <script type="text/javascript" src="../../assets/js/icheck.js"></script>
    <!--camara WEB-->
    <script type="text/javascript" src="../../assets/webcam/webcam.js"></script>
    <script type="text/javascript" src="../../assets/js/script.js"></script>
    <!--uploadIfy-->
    <script type="text/javascript" src="../../uploadify/jquery.uploadify-3.1.js"></script>

    <script type="text/javascript" src="../../assets/js/myJavaScript.js"></script>

    <script>
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
                    "targets": [ 1, 4 ],
                    "visible": false,
                    "searchable": true
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

      $('#obser').restrictLength( $('#max-length-element') );
    </script>

  <?PHP
    include 'newEmpleado.php';
    include 'editEmpleado.php';
    include 'previewEmpleado.php';
    include 'delEmpleado.php';
  ?>

    <!--google maps-->
    <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIG-WEdvtbElIhE06jzL5Kk1QkFWCvymQ&force=lite"></script>
  </body>
</html>
