 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Lojão Seu Zé</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="Imagem Usuário">
        </div>
        <div class="info">
          <a href="viewUsuario.php?id=<?php echo $_SESSION['id'] ?>"> <?php echo $_SESSION['nome'] ; ?></a> <a href="logout.php"><i data-toggle="tooltip" title="Logout " class="fa fa-sign-out-alt"></i></a>
          <span class="brand-text font-weight-light d-block" style="color: #FFF;"> <?php echo $_SESSION['tipo']; ?></span>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="inicio.php" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Início
              </p>
            </a>
          </li>     
          <?php if ($_SESSION['cargo'] == "Administrador") { ?>
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fa fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <?php } ?>
          <?php if ($_SESSION['cargo'] == "Administrador") { ?> 
          <li class="nav-header">Pessoas</li>
          <li class="nav-item">
            <a href="listaFuncionarios.php" class="nav-link">
              <i class="nav-icon fa fa-user-lock"></i>
              <p>
                Funcionários
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="listaClientes.php" class="nav-link">
              <i class="nav-icon fa fa-user-tag"></i>
              <p>
                Clientes
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="listaUsuario.php" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Usuários
              </p>
            </a>
          </li>
         
          <li class="nav-header">Financeiro</li>
          <?php } ?>
           <li class="nav-item">
            <a href="listaProdutos.php" class="nav-link">
              <i class="nav-icon fa fa-cubes"></i>
              <p>
                Produtos
              </p>
            </a>
          </li>
          <?php if ($_SESSION['cargo'] == "Administrador") { ?>
          <li class="nav-item">
            <a href="listaSetores.php" class="nav-link">
              <i class="nav-icon fa fa-table"></i>
              <p>
                Setores
              </p>
            </a>
          </li>
          <?php } ?>
          <?php if ($_SESSION['cargo'] == "Administrador" || $_SESSION['cargo'] == "Vendedor") { ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-funnel-dollar "></i>
              <p>
                Vendas
              </p>
            </a>
          </li>
          <?php } ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>