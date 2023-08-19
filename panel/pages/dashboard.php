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
              alert("Error, ha iniciado sesión y no se puede redirigir a la página deseada.");
              window.location = "../../index.php";
              </script>';
  }//
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Si - Cum</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
 
    <!--PLANTILLAS-->
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="../resources/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="../resources/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../resources/lib/animate/animate.min.css" rel="stylesheet">
    <link href="../resources/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../resources/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../resources/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="../resources/css/style_templace.css" rel="stylesheet">
    <!--PLANTILLAS-->





    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
     <!-- Font Awesome  DUDA LINEA 31-->
     <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
      href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo $root_specific_panel.'plugins/icheck-bootstrap/icheck-bootstrap.min.css'; ?>">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo $root_specific_panel.'plugins/jqvmap/jqvmap.min.css'; ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $root_specific_panel.'css/adminlte.min.css'; ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo $root_specific_panel.'plugins/overlayScrollbars/css/OverlayScrollbars.min.css'; ?>">
      <!-- Parte Faltante -->
      <!-- Daterange picker -->
      <link rel="stylesheet" href="<?php echo $root_specific_panel.'plugins/daterangepicker/daterangepicker.css'; ?>">
      <!-- summer-note  -->
      <link rel="stylesheet" href="<?php echo $root_specific_panel.'plugins/summernote/summernote-bs4.css'; ?>">
      <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">




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
            <?php echo crear_menu_panel('dashboard');?>
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
                <h1 class="m-0">Inicio</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="./dashboard.php">Inicio</a></li>
                  <!--<li class="breadcrumb-item active">Contacto</li> -->
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!--CONTENIDO-->
        <section id="intro"> hola
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active" style="background-image: url('../img/gym1.jpg');">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>SI-CUM</h2>
                <p>Si usuarios fuertes quieres tener, un fuerte control debes tener.</p>
                <!--a href="#featured-services" class="btn-get-started scrollto">tu puedes</a-->
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url('../img/gym2.jpg');">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Alcance</h2>
                <p> Software funcional, para llevar el control de los usuarios de un gimnasios</p>
                <!--a href="#featured-services" class="btn-get-started scrollto">Get Started</a-->
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url('../img/gym3.jpg');">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Misión</h2>
                <p>Empresa de desarrollo que ofrece un sistemas de control y apoyo para gimnasios que aspiran a mejorar su administración a través de nuestro sistema tecnológico y de impacto social en la comunidad fitness llamado SI-CUM.</p>
                <!--a href="#featured-services" class="btn-get-started scrollto">Get Started</a-->
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url('../img/gym4.jpg');">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Visión</h2>
                <p>Para 2027 seremos una empresa que brinde sistemas de calidad y administración para nuestros miembros, generando valor humano y profesional a nuestra empresa, a nuestros colaboradores, usuarios y a nuestra comunidad.</p>
                <!--a href="#featured-services" class="btn-get-started scrollto">Get Started</a-->
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url('../img/gym5.jpg');">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Valores</h2>
                <p>Transparencia, Integridad, Honestidad, Responsabilidad, Cumplimiento y Seriedad.</p>
                <!--a href="#featured-services" class="btn-get-started scrollto">Get Started</a-->
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      Featured Services Section
    ============================-->
    <section id="featured-services">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 box">
            <i class="ion-ios-bookmarks-outline"></i>
            <h4 class="title"><a href="">Control </a></h4>
            <p class="description">Mejora el crecimiento de tu negocio, ayudando con un control administrativo ordenado, minimizando errores.</p>
          </div>

          <div class="col-lg-4 box box-bg">
            <i class="ion-ios-stopwatch-outline"></i>
            <h4 class="title"><a href="">Tiempo</a></h4>
            <p class="description">El sistema esta pensado y construido, para optimizar el tiempo de organizacion en su negocio.</p>
          </div>

          <div class="col-lg-4 box">
            <i class="ion-ios-heart-outline"></i>
            <h4 class="title"><a href="">Pasion</a></h4>
            <p class="description">Contruimos un sistema, donde su negocio pueda alzanzar sus metas de orden. </p>
          </div>

        </div>
      </div>
    </section><!-- #featured-services -->

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>Nosotros</h3>
          <p>Somos una empresa que ofrece un sistema para el control y monitoreo de usuarios, llevando acabo un registro de informacion de cada membresia. Ademas que el sistema tambien podra monitorear a los empleados del negocio, este sistema esta pensado para gimnasios. </p>
        </header>

        <br><br>

        <header class="section-header wow fadeInUp">
          <h3>Servicios</h3>
          <br><br>
        </header>

        <div class="row about-cols">

          <div class="col-md-4 wow fadeInUp">
            <div class="about-col">
              <div class="img">
                <img src="img/about-mission.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Control administrativo</a></h2>
              <p>
                Proceso clave para la ejecución de actividades que se llevan acabo en el negocio, con el objetivo de garantizar el crecimiento exponencial del negocio.
              </p>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
            <div class="about-col">
              <div class="img">
                <img src="img/about-plan.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-list-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Organización</a></h2>
              <p>
              Poner en orden los recursos del negocio. Aumentando la productividad, estableciendo funciones que permitan alcanzar los objetivos propuestos.
              </p>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
            <div class="about-col">
              <div class="img">
                <img src="img/about-vision.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Optimización</a></h2>
              <p>
                Buscamos aumentar la eficiencia de su negocio a través de la perfección de sus procesos haciendo un mejor uso de sus recursos. 
              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #about -->




    <!--==========================
      Skills Section
    ============================-->
    <section id="skills">
      <div class="container">

        <header class="section-header">
          <h3>Nuestras habilidades</h3>
          <p>Nuestro sistema tieene grandes posibilidades es asi que se puede adaptar perfectamente a tu negocio</p>
        </header>

        <div class="skills-content">

          <div class="progress">
            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
              <span class="skill">Facilidad de uso <i class="val"></i></span>
            </div>
          </div>

          <div class="progress">
            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
              <span class="skill">Adaptabilidad<i class="val"></i></span>
            </div>
          </div>

          <div class="progress">
            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="96" aria-valuemin="0" aria-valuemax="100">
              <span class="skill">Monitoreo de personal<i class="val"></i></span>
            </div>
          </div>

          <div class="progress">
            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100">
              <span class="skill">Control de los usuarios  <i class="val"></i></span>
            </div>
          </div>

        </div>

      </div>
    </section>

    <!--==========================
      Facts Section
    ============================-->
    <section id="facts"  class="wow fadeIn">
      <div class="container">

        <header class="section-header">
          <h3>HECHOS</h3>
          <p>Somos tu mejor opcion en el mercado</p>
        </header>

        <div class="row counters">

  				<div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">3</span>
            <p>Experiencia</p>
  				</div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">25</span>
            <p>Proyectos</p>
  				</div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">845</span>
            <p>Tiempo de dedicación</p>
  				</div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">55</span>
            <p>Competidores</p>
  				</div>

  			</div>


      </div>
    </section><!-- #facts -->

    <!--==========================
      Portfolio Section
    ============================-->
    <section id="portfolio"  class="section-bg" >
      <div class="container">

        <header class="section-header">
          <h3 class="section-title">Galeria</h3>
        </header>

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter=".filter-app">Nosotros</li>
              <li data-filter=".filter-card">Ustedes</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="../img/si-cum-p.png" class="img-fluid" alt="">
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">SI - CUM Inicio</a></h4>
                <p>Nosotros</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <figure>
                <img src="../img/si_cum2.png" class="img-fluid" alt="">
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">SI - CUM crecimiento</a></h4>
                <p>Nosotros</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <figure>
                <img src="../img/si_cum3.png" class="img-fluid" alt="">
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Nuestra experiencia</a></h4>
                <p>Nosotros</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="../img/clie1.png" class="img-fluid" alt="">
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Nuestros Clientes</a></h4>
                <p>Ustedes</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="../img/clie2.png" class="img-fluid" alt="">
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Su experiencia</a></h4>
                <p>Ustedes</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <figure>
                <img src="../img/clie3.png" class="img-fluid" alt="">
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Sus testimonios</a></h4>
                <p>Ustedes</p>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #portfolio -->


    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h3>Contactanos</h3>
          <p>Si tienes alguna duda o pregunta del sistema, puedes contactarnos a travez de:</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Dirección</h3>
              <address>Prolongacion Cuahutemoc #75 Guadalupe Ixcotla.</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Numero Celular</h3>
              <p><a href="tel:+2461233529">+52 246 123 3529</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Correo</h3>
              <p><a href="mailto:sicum@gmail.com">sicum@gmail.com</a></p>
            </div>
          </div>

        </div>

        <div class="form">
          <div id="sendmessage">Tu mensaje fue enviado, Gracias. </div>
          <div id="errormessage"></div>
          <form action="" method="post" role="form" class="contactForm">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Tu nombre" data-rule="minlen:4" data-msg="Por favor ingresa tu nombre" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Correo" data-rule="email" data-msg="Por favor ingresa tu correo" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto" data-rule="minlen:4" data-msg="Que esta pasando" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Por favor escribe tu mensaje" placeholder="Escribe tu mensaje"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><button type="submit">Enviar mensaje</button></div>
          </form>
        </div>

      </div>
    </section><!-- #contact -->

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>Si - CUM</h3>
            <p>Si usuarios fuertes quieres tener, un fuerte control debes tener.</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>A donde </h4>
            <ul>
              <li><i class="ion-ios-arrow-right"></i> <a href="./dashboard.php">Inicio</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="./empleados.php">Empleados</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="./usuarios.php">Usuarios</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contacto</h4>
            <p>
              Prolongacion Cuahutemoc # 75<br>
              Guadalupe Ixcotla<br>
              <strong>Celular:</strong> +52 246 123 3529<br>
              <strong>Email:</strong> sicum@gmail.com<br>
            </p>

          </div>


        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        Sistema <strong>Si - Cum</strong>. Tu mejor opcion
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage
        -->
      </div>
    </div>

        <!--CONTENIDO-->



    <!-- jQuery -->
    <script src="<?php echo $root_specific_panel.'plugins/jquery/jquery.min.js';?>"></script>

    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo $root_specific_panel.'plugins/jquery-ui/jquery-ui.min.js';?>"></script>

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>$.widget.bridge('uibutton', $.ui.button)</script>

       <!-- Bootstrap 4 -->
    <script src="<?php echo $root_specific_panel.'plugins/bootstrap/js/bootstrap.bundle.min.js';?>"></script>

    <!-- ChartJs-->
    <script src="<?php echo $root_specific_panel.'plugins/chart.js/Chart.min.js';?>"></script>

    <!-- Sparkline -->
    <script src="<?php echo $root_specific_panel.'plugins/sparklines/sparkline.js';?>"></script>

    <!-- JQVMap -->
    <script src="<?php echo $root_specific_panel.'plugins/jqvmap/jquery.vmap.min.js';?>"></script>
    <script src="<?php echo $root_specific_panel.'plugins/jqvmap/maps/jquery.vmap.usa.js';?>"></script>

    <!-- jQuery Knob Chart -->
    <script src="<?php echo $root_specific_panel.'plugins/jquery-knob/jquery.knob.min.js';?>"></script>

    <!-- daterangepicker -->
      <script src="<?php echo $root_specific_panel.'plugins/moment/moment.min.js';?>"></script>
      <script src="<?php echo $root_specific_panel.'plugins/daterangepicker/daterangepicker.js';?>"></script>

      <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo $root_specific_panel.'plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js';?>"></script>

    <!-- Summernote -->
    <script src="<?php echo $root_specific_panel.'plugins/summernote/summernote-bs4.min.js';?>"></script>

    <!-- overlayScrollbars -->
    <script src="<?php echo $root_specific_panel.'plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js';?>"></script>

     <!-- AdminLTE App -->
     <script src="<?php echo $root_specific_panel.'js/adminlte.js';?>"></script>

      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo $root_specific_panel.'js/pages/dashboard.js';?>"></script>

     <!-- AdminLTE for demo purposes -->
     <script src="<?php echo $root_specific_panel.'js/demo.js';?>"></script>
    


       <!-- JavaScript Libraries -->
  <script src="../resources/lib/jquery/jquery.min.js"></script>
  <script src="../resources/lib/jquery/jquery-migrate.min.js"></script>
  <script src="../resources/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../resources/lib/easing/easing.min.js"></script>
  <script src="../resources/lib/superfish/hoverIntent.js"></script>
  <script src="../resources/lib/superfish/superfish.min.js"></script>
  <script src="../resources/lib/wow/wow.min.js"></script>
  <script src="../resources/lib/waypoints/waypoints.min.js"></script>
  <script src="../resources/lib/counterup/counterup.min.js"></script>
  <script src="../resources/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="../resources/lib/isotope/isotope.pkgd.min.js"></script>
  <script src="../resources/lib/lightbox/js/lightbox.min.js"></script>
  <script src="../resources/lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="../resources/js/main_templace.js"></script>





    
  </body>

</html>