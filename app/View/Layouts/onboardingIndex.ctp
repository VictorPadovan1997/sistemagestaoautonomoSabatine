
<!DOCTYPE html>
<html lang="PT-BR">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ONBOARDING | ADMIN</title>

  <!-- Custom fonts for this template-->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <?php
        echo $this->Html->css('all.min');
        echo $this->Html->css('sb-admin-2.min');
    ?>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-tasks"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ONBOARDING</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="./dashboards">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">


      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="./estabelecimentos">
          <i class="fas fa-fw fa-cog"></i>
          <span>Estabelecimentos</span>
        </a>
       
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="./modulos">
          <i class="fas fa-fw fa-table"></i>
          <span>Modulos</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="./usuarios">
          <i class="fas fa-fw fa-table"></i>
          <span>Usuarios</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="./notificacoes">
          <i class="fas fa-fw fa-table"></i>
          <span>Notificações</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fas fa-chevron-left"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
            
            <?php $usuarioLogado = AuthComponent::user()['nome']?>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $usuarioLogado?></span>
                <img class="img-profile rounded-circle" src="https://w7.pngwing.com/pngs/470/131/png-transparent-computer-icons-user-profile-avatar-avatar-heroes-desktop-wallpaper-share-icon.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <?php echo $this->Html->link('Sair', '/usuarios/logout', array('escape' => false, 'class' => 'btn btn-label btn-label-brand btn-sm btn-bold')); ?>
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">





        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
        <?php
        $controllerName = $this->request->params['controller'];
        ?>
          <div class="card shadow mb-4">
            <div class="card-header py-3">

              <h6 class="m-0 font-weight-bold text-primary"><?php echo strtoupper($controllerName) ?></h6>
            </div>
            <div class="card-body">

            <main role="main" class="container" id="content"> 

          <?php 
          echo $this->Flash->render();
          echo $this->fetch('content');
          ?>
          </main>

              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
   
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <!-- Bootstrap core JavaScript-->
  <?php
    echo $this->Html->script('jquery.min'); //Buffer|Todo projeto|
    echo $this->Html->script('bootstrap.bundle.min');
    echo $this->Html->script('jquery.easing');
    echo $this->Html->script('sb-admin');
    echo $this->Html->script('chart');
    echo $this->Html->script('chart-area');
    echo $this->Html->script('pie');
    echo $this->Html->script('fontwasema');
    echo $this->Html->script('projeto');
    echo $this->Js->writeBuffer();
    ?>
  

</body>

</html>
