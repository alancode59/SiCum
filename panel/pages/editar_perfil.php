<?php
    //Crea el menú
    require('../../helper/menu_panel.php');
    //Importa la ruta dependiendo de la carpeta
    require('../../helper/funciones_generales.php');
    //Se utiliza las variables de sesion
    session_start();
    //Validamos si la posicion existe y ya tiene un valor determinado por la consulta
    if(!isset($_SESSION['id_empleado'])){
        echo '<script>
                alert("No has iniciado sesión");
                window.location = "../../index.php";
                </script>';
    }//

    //Capturamos el id que se pasa por el URL
    $id_empleado = $_GET["id_empleado"];
    //Verificamos si la variable no esta vacia
    if(empty($id_empleado)){
        echo '<script>
                alert("Error, el empleado no se encontro");
                window.location = "./perfil.php";
                </script>';
    }//end empty
    else{
        //Se incoorpora la conexion
        include '../backend/admin/conexion.php';
        //Se prepara la consulta para realizar la peticion
        $query_select = 'SELECT * FROM empleados WHERE id_empleado = '.$id_empleado;
        //Petición del sql a la BD
        $query_res = mysqli_query($conexion, $query_select);
        $empleado = mysqli_fetch_array($query_res, MYSQLI_ASSOC);
        //Verificar si realmente el usuario existe
        if(sizeof($empleado) <= 0){
          echo '<script>
                alert("Error, el empleado que deseas actualizar no esxiste");
                window.location = "./perfil.php";
                </script>';
        }//
        //Se libera la conexion
        mysqli_close($conexion);
        // print("<pre>".print_r($usuario,true)."</pre>");
    }//end else
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SI-CUM | Editar perfil</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
      href="<?php echo $root_specific_panel.'plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'; ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo $root_specific_panel.'plugins/icheck-bootstrap/icheck-bootstrap.min.css'; ?>">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo $root_specific_panel.'plugins/jqvmap/jqvmap.min.css'; ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $root_specific_panel.'css/adminlte.min.css'; ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
      href="<?php echo $root_specific_panel.'plugins/overlayScrollbars/css/OverlayScrollbars.min.css'; ?>">
  </head>

  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
      </div>

      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-navicon"></i></a>
          </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Fullscreen -->
          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button" data-toggle="tooltip" data-placement="top"
              title="Fullscreen">
              <i class="fa fa-arrows-alt"></i>
            </a>
          </li>
          <!-- Perfil -->
          <li class="nav-item">
            <a class="nav-link" href="./perfil.php" role="button" data-toggle="tooltip" data-placement="top" title="Mi perfil">
              <i class="fa fa-user"></i>
            </a>
          </li>
          <!-- Logout -->
          <li class="nav-item">
            <a class="nav-link" href="../backend/admin/cerrar_sesion.php" role="button" data-toggle="tooltip" data-placement="top" title="Cerrar sesión">
              <i class="fa fa-lock    "></i>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
          <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" -->
          <!-- style="opacity: .8"> -->
          <span class="brand-text font-weight-light">SI-CUM</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            <img src="<?php echo $_SESSION["imagen_perfil"];?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <a href="./perfil.php" class="d-block"><?php echo $_SESSION["nombre_empleado"];?></a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <?php echo crear_menu_panel('');?>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Empleado Detalles</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="./dashboard.php">Inicio</a></li>
                  <li class="breadcrumb-item"><a href="./perfil.php">Perfil</a></li>
                  <li class="breadcrumb-item active">Detalles empleado</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Formulario de empleado detalles</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="form-empleado" action="../backend/crud/Empleados/update_perfil.php" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <center>
                                        <img src="<?php echo ($empleado['imagen_empleado'] == NULL) ? '../img/icono-empleado.png' : '../img/'.$empleado['imagen_empleado']; ?>" class="img-rounded" alt="" id="img-preview" width="10%">
                                    </center>
                                </div>
                            </div>
                            <input type="hidden" value="<?php echo $empleado['imagen_empleado']; ?>" name="foto_perfil_actual">
                            <input type="hidden" value="<?php echo $empleado['id_empleado']; ?>" name="id_empleado">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nombre(s)</label>
                                        <input type="text" value="<?php echo $empleado['nombre_empleado']; ?>" name="nombre" class="form-control" id="nombre" placeholder="Nombre(s)">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Apellido Paterno</label>
                                        <input type="text" value="<?php echo $empleado['ap_paterno_empleado']; ?>" name="apellido_paterno" class="form-control" id="apellido_paterno" placeholder="Apelldio Paterno">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Apellido Materno</label>
                                        <input type="text" value="<?php echo $empleado['ap_materno_empleado']; ?>" name="apellido_materno" class="form-control" id="apellido_materno" placeholder="Apelldio Paterno">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Sexo</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sexo" value="1" <?php echo ($empleado['sexo_empleado'] == 1) ? 'checked' : '';?>>
                                            <label class="form-check-label">Femenino</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sexo" value="0" <?php echo ($empleado['sexo_empleado'] == 0) ? 'checked' : '';?>>
                                            <label class="form-check-label">Masculino</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Rol</label>
                                        <select class="form-control" name="rol">
                                            <option value="">Seleccionar un rol</option>
                                            <option value="555" <?php echo ($empleado['id_rol'] == 555) ? 'selected' : '';?> >Administrador</option>
                                            <option value="444" <?php echo ($empleado['id_rol'] == 444) ? 'selected' : '';?> >Empleado</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Correo electrónico</label>
                                        <input type="email" name="email" value="<?php echo $empleado["email_empleado"]; ?>" class="form-control" id="email" placeholder="Correo electrónico">
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Contraseña</label>
                                        <input type="password" name="password" class="form-control" id="password" placeholder="***********">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Repetir Contraseña</label>
                                        <input type="password" name="repassword" class="form-control" id="repassword" placeholder="***********">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="exampleInputEmail1">Foto perfil</label>
                                    <input type="file" name="fotoperfil" id="fotoperfil" onchange="" class="form-control" id="foto-input">
                                </div>
                            </div>
                        
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                        <button type="submit" class="btn btn-primary" > Editar</button>
                        <a href="./perfil.php" class="btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                    </div>
                    <!-- /.card -->
                    </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>


      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 3.2.0
        </div>
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?php echo $root_specific_panel.'plugins/jquery/jquery.min.js';?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo $root_specific_panel.'plugins/jquery-ui/jquery-ui.min.js';?>"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo $root_specific_panel.'plugins/bootstrap/js/bootstrap.bundle.min.js';?>"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script
      src="<?php echo $root_specific_panel.'plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js';?>">
    </script>
    <!-- Summernote -->
    <script src="<?php echo $root_specific_panel.'plugins/summernote/summernote-bs4.min.js';?>"></script>
    <!-- overlayScrollbars -->
    <script src="<?php echo $root_specific_panel.'plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js';?>">
    </script>
    <!-- AdminLTE App -->
    <script src="<?php echo $root_specific_panel.'js/adminlte.js';?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo $root_specific_panel.'js/demo.js';?>"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo $root_specific_panel.'js/pages/dashboard.js';?>"></script>
    <!-- Jquery -->
    <script src="<?php echo $root_specific_panel.'plugins/jquery-validation/jquery.validate.min.js'; ?>"></script>
    <script src="<?php echo $root_specific_panel.'plugins/jquery-validation/additional-methods.min.js'; ?>"></script>
    <!-- Jquery Specific Validation -->
    <script src="../js/editar_perfil.js"></script>
  </body>

</html>