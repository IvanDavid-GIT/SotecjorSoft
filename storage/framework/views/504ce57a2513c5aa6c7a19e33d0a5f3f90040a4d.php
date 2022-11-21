<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
  <link href="images/sotec.png" />

  <title>SotecjorSoft</title>
  <?php echo $__env->yieldContent('css'); ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">


  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <!-- Bootstrap -->
  <link href="/vendors/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">


  <!-- Custom Theme Style -->
  <link href="/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col" style="background: rgb(42 63 84)">
        <div class="left_col scroll-view" style="background: rgb(42 63 84)">
          <div class="navbar nav_title" style="background: rgb(42 63 84)">
            <a href="/dashboard/index" class="site_title"><img src="https://i.ibb.co/t8hN7PY/Logo-Sotecjor.png" width="50" height="50" alt="Logo sotecjor">
              <span style="color:white">SOTECJOR</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">

            <div class="profile_info">
              <span>
                <h2 class="text-left"></h2>
              </span>
            </div>


          </div>
          <!-- /menu profile quick info -->

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <div class="nav side-menu">
                <li style="width: 230px;"><a href="<?php echo e(route('dashboard.index')); ?>"> <svg xmlns="http://www.w3.org/2000/svg" width="75" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                      <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                      <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    <span style="color:white">Dashboard</span></a></li>

                <?php if(Auth::user()->id_rol == 1): ?>
                <li style="width: 230px;"><a href="<?php echo e(route('usuario.index')); ?>"> <svg xmlns="http://www.w3.org/2000/svg" width="75" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                      <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                      <circle cx="9" cy="7" r="4"></circle>
                      <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                      <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    <span style="color:white">Usuarios</span></a></li>




                <?php endif; ?>
                <li style="width: 230px;"><a href="<?php echo e(route('categoria.index')); ?>"> <svg xmlns="http://www.w3.org/2000/svg" width="75" height="24" viewBox="0 0 22 22" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
                      <rect x="3" y="3" width="7" height="7"></rect>
                      <rect x="14" y="3" width="7" height="7"></rect>
                      <rect x="14" y="14" width="7" height="7"></rect>
                      <rect x="3" y="14" width="7" height="7"></rect>
                    </svg>
                    <span style="color:white">Categorías</span></a></li>


                <li style="width: 230px;"><a href="<?php echo e(route('material.index')); ?>"> <svg xmlns="http://www.w3.org/2000/svg" width="75" height="24" viewBox="0 0 22 22" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-archive">
                      <polyline points="21 8 21 21 3 21 3 8"></polyline>
                      <rect x="1" y="3" width="22" height="5"></rect>
                      <line x1="10" y1="12" x2="14" y2="12"></line>
                    </svg>
                    <span style="color:white">Materiales</span></a></li>


                <li style="width: 230px;"><a href="<?php echo e(route('proyectosdeobras.index')); ?>"> <svg xmlns="http://www.w3.org/2000/svg" width="75" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-truck">
                      <rect x="1" y="3" width="15" height="13"></rect>
                      <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                      <circle cx="5.5" cy="18.5" r="2.5"></circle>
                      <circle cx="18.5" cy="18.5" r="2.5"></circle>
                    </svg>
                    <span style="color:white">Proyectos de obras</span></a></li>


                <li style="width: 230px;"><a href="<?php echo e(route('entradas.index')); ?>"> <svg xmlns="http://www.w3.org/2000/svg" width="75" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download">
                      <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                      <polyline points="7 10 12 15 17 10"></polyline>
                      <line x1="12" y1="15" x2="12" y2="3"></line>
                    </svg>
                    <span style="color:white">Entradas</span></a></li>


                <li style="width: 230px;"><a href="<?php echo e(route('salidas.index')); ?>"> <svg xmlns="http://www.w3.org/2000/svg" width="75" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload">
                      <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                      <polyline points="17 8 12 3 7 8"></polyline>
                      <line x1="12" y1="3" x2="12" y2="15"></line>
                    </svg>
                    <span style="color:white">Salidas</span></a></li>


                <li style="width: 230px;"><a href="<?php echo e(route('reporte.index')); ?>"> <svg xmlns="http://www.w3.org/2000/svg" width="75" height="24" viewBox="0 0 22 22" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard">
                      <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                      <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                    </svg>
                    <span style="color:white">Reportes</span></a></li>

                <li style="width: 230px;"><a target="_blank" href="https://www.youtube.com/playlist?list=PLnIw8F4aq4Oehyr_G0I561ZHd4So7nh-u"><svg xmlns="http://www.w3.org/2000/svg" width="75" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-help-circle">
                      <circle cx="12" cy="12" r="10"></circle>
                      <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                      <line x1="12" y1="17" x2="12.01" y2="17"></line>
                    </svg>
                    <span style="color:white">Ayuda</span></a></li>
              </div>

            </div>

          </div>
          <!-- /sidebar menu -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class=" nav_menu" style="border: 0;background: rgb(42 63 84);height:47px;">
          <div class="nav toggle" style="width:52.3px;">
            <a id="menu_toggle"><i class="fa fa-bars" style="color:white"></i></a>
          </div>
          <nav class=" nav navbar-nav">
            <ul class=" navbar-right">
              <li class="nav-item dropdown">
                <a style="color:white" id="navbarDropdown" class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  <i class="fas fa-user-circle fa-md fa-fw"></i>
                  <?php echo e(Auth::user()->name); ?>

                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="CerrarSesion()"><i class="fas fa-sign-out-alt fa-md fa-fw"></i>
                    <?php echo e(__('Cerrar sesión')); ?>

                  </a>

                  <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                    <?php echo csrf_field(); ?>
                  </form>
                </div>
              </li>
              </li>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->


      <!-- page content -->
      <div class="card right_col" role="main" style="background:#ECF0F5 ">
        <section class="content">
          <div class="card container-fluid" style="background:white">
            <?php echo $__env->yieldContent('contenido'); ?>
          </div>
        </section>








        <!-- Start to do list -->

        <!-- end of weather widget -->
      </div>
    </div>
  </div>
  </div>
  <!-- /page content -->

  <!-- footer content -->
  <footer class="card " style="background:#ECF0F5">
    <div class="pull-right">
      Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
    </div>
    <div class="clearfix"></div>
  </footer>
  <!-- /footer content -->
  </div>
  </div>


  <?php echo $__env->yieldContent('js'); ?>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://kit.fontawesome.com/e047a58b48.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- jQuery -->
  <script src="/vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="/vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="/vendors/nprogress/nprogress.js"></script>
  <!-- Chart.js -->
  <script src="/vendors/Chart.js/dist/Chart.min.js"></script>
  <!-- gauge.js -->
  <script src="/vendors/gauge.js/dist/gauge.min.js"></script>
  <!-- bootstrap-progressbar -->
  <script src="/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
  <!-- iCheck -->
  <script src="/vendors/iCheck/icheck.min.js"></script>
  <!-- Skycons -->
  <script src="/vendors/skycons/skycons.js"></script>
  <!-- Flot -->
  <script src="/vendors/Flot/jquery.flot.js"></script>
  <script src="/vendors/Flot/jquery.flot.pie.js"></script>
  <script src="/vendors/Flot/jquery.flot.time.js"></script>
  <script src="/vendors/Flot/jquery.flot.stack.js"></script>
  <script src="/vendors/Flot/jquery.flot.resize.js"></script>
  <!-- Flot plugins -->
  <script src="/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
  <script src="/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
  <script src="/vendors/flot.curvedlines/curvedLines.js"></script>
  <!-- DateJS -->
  <script src="/vendors/DateJS/build/date.js"></script>
  <!-- JQVMap -->
  <script src="/vendors/jqvmap/dist/jquery.vmap.js"></script>
  <script src="/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="/vendors/moment/min/moment.min.js"></script>
  <script src="/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="/build/js/custom.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script>
    $("#DivRegistro").delay(2200).fadeOut(300);

    $("#DivModificar").delay(2200).fadeOut(300);

    $("#DivEstado").delay(2200).fadeOut(300);

    function actualizar() {
      location.reload(true);
    }

    $(document).ready(function() {
      $("select").select2();
    });

    function soloLetras(objeto) {
      objeto.value = objeto.value.replace(/[^\a-zA-ZñÑáéíóúÁÉÍÓÚ ]/g, '');
    }

    function soloNumeros(objeto) {
      objeto.value = objeto.value.replace(/[^\d,]/g, '');
    }

    function CambiarEstadoSalidas(id) {

      Swal.fire({
        input: 'textarea',
        title: "¿Desea cambiar el estado?",
        inputPlaceholder: 'Ingrese el motivo de anulación',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, cambiar estado!'
      }).then((result) => {
        if (result.isConfirmed) {
          let datos = {
            id,
            estado: 3,
            comentario: result.value
          }
          $.ajax({
            type: "POST",
            url: "/salidas/cambiar/estado",
            data: datos,
            success: function(data) {
              if (data == "ok") {
                $("#DivRegistroSalida").css("display", "none");
                $("#DivEstadoEyS").css("display", "block");
                setInterval("actualizar()", 800);
              }



            }
          });
        }

      })

    }





    function CambiarEstadoEntradas(id) {

      Swal.fire({
        input: 'textarea',
        title: "¿Desea cambiar el estado?",
        inputPlaceholder: 'Ingrese el motivo de anulación',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, cambiar estado!'
      }).then((result) => {
        if (result.isConfirmed) {
          let datos = {
            id,
            estado: 3,
            comentario: result.value
          }
          $.ajax({
            type: "POST",
            url: "/entradas/cambiar/estado",
            data: datos,
            success: function(data) {
              if (data == "ok") {
                $("#DivRegistro").css("display", "none");
                $("#DivEstadoEyS").css("display", "block");
                setInterval("actualizar()", 800);
              };

            }
          });
        }

      })

    }



    function CambiarEstado(id) {

      Swal.fire({
        title: "¿Desea cambiar el estado?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, cambiar estado!'
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById("frmEstado" + id).submit();

        }

      })

    }

    function CerrarSesion() {
      event.preventDefault();
      Swal.fire({
        title: "¿Desea cerrar sesión?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, cerrar sesión!'
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('logout-form').submit();
        }
      })
    }


    function mostrarPassword() {
      var cambio = document.getElementById("txtPassword");
      if (cambio.type == "password") {
        cambio.type = "text";
        $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
      } else {
        cambio.type = "password";
        $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
      }
    }

    $(document).ready(function() {
      //CheckBox mostrar contraseña
      $('#ShowPassword').click(function() {
        $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
      });
    });
  </script>

  <script type="text/javascript">
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  </script>
</body>

</html><?php /**PATH C:\laragon\www\SotecjorSoft\resources\views/layout.blade.php ENDPATH**/ ?>