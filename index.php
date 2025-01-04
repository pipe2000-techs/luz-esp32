<?php 
error_reporting(0);
  //include("./mvc/model/ModelMenu.php");
  //include("./mvc/controller/ConMenu.php");

  //if(!isset($_SESSION['jgcasosciados'])){
    //header("Location: ./login"); 
  //}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Luz - ESP32</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="https://esp32.jgcasociados.com.co/img/icon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a class="logo logo2 d-flex align-items-center">
        <img src="https://esp32.jgcasociados.com.co/img/icon.png" alt="">
        <span class="d-none d-lg-block">Luz ESP32</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">



        

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <?php if(file_exists("./fotos/users/".$_SESSION['jgcasosciados']['url_imagen'])){ ?>
              <img src="./fotos/users/<?php echo $_SESSION['jgcasosciados']['url_imagen']; ?>" class="rounded-circle" alt="Profile"><br><br>
            <?php }else{ ?>
              <img src="https://esp32.jgcasociados.com.co/img/icon.png" class="rounded-circle" alt="Profile"><br><br>
            <?php } ?>
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['jgcasosciados']['Login']; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $_SESSION['jgcasosciados']['Nombre_Completo']; ?></h6>
              <span><?php echo $_SESSION['jgcasosciados']['Cargo']; ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="./?page=perfil/viewPerfil">
                <i class="bi bi-person"></i>
                <span>Mi Perfil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <button class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#salir">
                <i class="bi bi-box-arrow-right"></i>
                <span>Salir</span>
              </button >
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#n2" data-bs-toggle="collapse" href="#" aria-expanded="false">
            <i class="bi bi-search"></i><span>Consultas</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="n2" class="nav-content collapse" data-bs-parent="#sidebar-nav" style="">

            
              <li>
                <a href="./?page=viewConfiguracionLuces" class=""> 
                  <i class="bi bi-circle"></i><span>Listado Luces</span>
                </a>
              </li>

                        
          </ul>
        </li>



    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <!-- Pagina -->

    <?php 
    
      if (include("./mvc/view/".$_GET['page'].".php")) {

        //con el if ya se inclulle la pagina

      }else{

        //echo '<script>window.location.href = "./?page=dashboard/viewDashboard";</script>';

      }
    
    ?>

    
    <div class="modal fade" id="salir" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Ohh No!</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="text-center">
                <?php if(file_exists("./fotos/users/".$_SESSION['jgcasosciados']['url_imagen'])){ ?>
                  <img src="./fotos/users/<?php echo $_SESSION['jgcasosciados']['url_imagen']; ?>" class="rounded"  width="200" alt="..."><br><br>
                <?php }else{ ?>
                  <img src="./fotos/users/perfil.png" class="rounded"  width="200" alt="..."><br><br>
                <?php } ?>
                <p>¿Estás segur@ de que quieres cerrar sesión?</p>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <a type="button" class="btn btn-success" href="./cerrar_Sesion">Cerrar Sesión</a>
            </div>
          </div>
        </div>
      </div><!-- End Basic Modal-->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Luz Esp32</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>