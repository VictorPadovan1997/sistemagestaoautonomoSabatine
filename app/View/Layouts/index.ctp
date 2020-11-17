
<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard


* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>HomeDev</title>
  <!-- Favicon -->
  <link rel="icon" href="assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <?php
        echo $this->Html->css('argon/fontawesome');
        echo $this->Html->css('argon/argon');
        echo $this->Html->css('argon/all.min');
        echo $this->Html->css('argon/nucleo');
        echo $this->Html->css('argon/projeto');
    ?>
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
          <hr class="my-2">
            <?php 
              echo   
              $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-home ml-2')) .
              $this->Html->tag('span', 'Dashboard', array('class' => 'nav-link-text ml-4')),
              '/dashboards', array('escape'=>false, 'class' => 'dropdown-item'));
            ?>
            <?php 
              echo   
              $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-tags ml-2')) .
              $this->Html->tag('span', 'Categorias', array('class' => 'nav-link-text ml-4')),
              '/categorias', array('escape'=>false, 'class' => 'dropdown-item'));
            ?>
            <?php 
              echo   
              $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-tags ml-2')) .
              $this->Html->tag('span', 'Matéria Prima', array('class' => 'nav-link-text ml-4')),
              '/materias', array('escape'=>false, 'class' => 'dropdown-item'));
            ?>
            <?php 
              echo   
              $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-shopping-bag ml-2')) .
              $this->Html->tag('span', 'Produtos', array('class' => 'nav-link-text ml-4')),
              '/produtos', array('escape'=>false, 'class' => 'dropdown-item'));
            ?>
            <?php 
              echo   
              $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-users ml-2')) .
              $this->Html->tag('span', 'Clientes', array('class' => 'nav-link-text ml-4')),
              '/clientes', array('escape'=>false, 'class' => 'dropdown-item'));
            ?>
            <?php 
              echo   
              $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-cart-plus ml-2')) .
              $this->Html->tag('span', 'Vendas', array('class' => 'nav-link-text ml-4')),
              '/vendas', array('escape'=>false, 'class' => 'dropdown-item'));
            ?>
            <?php 
              echo   
              $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-cart-plus ml-2')) .
              $this->Html->tag('span', 'Estoque', array('class' => 'nav-link-text ml-4')),
              '/vendas', array('escape'=>false, 'class' => 'dropdown-item'));
            ?>
            <?php 
              echo   
              $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-cart-plus ml-2')) .
              $this->Html->tag('span', 'Caixa', array('class' => 'nav-link-text ml-4')),
              '/vendas', array('escape'=>false, 'class' => 'dropdown-item'));
            ?>
          </ul>
          <!-- Divider -->
          <hr class="my-3">

          <!-- <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Estoque</span>
          </h6> -->

        </div>
      </div>
    </div>
  </nav>
  <div class="main-content" id="panel">
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Manu Hamburguer-->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="https://i.ibb.co/VqnMyWx/user-2493635-640.png">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?php echo AuthComponent::user()['Usuario']['nome'] ?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
              <?php
              echo   
                $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-home')) .
                $this->Html->tag('span', 'Estabelecimento', array('class' => 'nav-link-text')),
                '/vendas', array('escape'=>false, 'class' => 'dropdown-item'));
              ?>
              <?php
              echo   
               $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-home')) .
               $this->Html->tag('span', 'Sair', array('class' => 'nav-link-text')),
               '/usuarios/logout', array('escape'=>false, 'class' => 'dropdown-item'));
              ?>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark"></ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--6">
  <div class="row">
    <div class="container-fluid mt--6">
          <div class="row">
            <div class="col">
              <div class="card">
                <div class="card-header border-0"></div>
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
  </div>
  <?php
    echo $this->Html->script('argon/jquery-3.4.1.min.js');
    echo $this->Html->script('argon/tratamentoAddProdutos');
    echo $this->Html->script('argon/jquery');
    echo $this->Html->script('argon/jquery-scrollLock.min');
    echo $this->Html->script('argon/jquery.scrollbar.min');
    echo $this->Html->script('argon/argon'); //Buffer|Todo projeto|
    echo $this->Html->script('argon/bootstrap.bundle.min');
    echo $this->Html->script('argon/projeto');
    echo $this->Html->script('argon/fontAwesome');
    echo $this->Html->script('argon/jqueryInputMask');
    echo $this->Js->writeBuffer();
    ?>
</body>

</html>
