  <?php include ('header.php'); ?>
  <?php include ('dashboard.php'); ?>
  <?php
    $contadorVenda = "SELECT count(*) cc FROM vendas";
    $contadorProduto = "SELECT count(*) cc FROM produtos";
    $contadorUsuario = "SELECT count(*) cc FROM usuarios";
    $contadorSetor = "SELECT count(*) cc FROM setores";
    $resultVenda = $conexao->query($contadorVenda);
    $resultProduto = $conexao->query($contadorProduto);
    $resultUsuario = $conexao->query($contadorUsuario);
    $resultSetor = $conexao->query($contadorSetor);
    $rowVenda = $resultVenda->fetch_assoc();
    $rowProduto = $resultProduto->fetch_assoc();
    $rowUsuario = $resultUsuario->fetch_assoc();
    $rowSetor = $resultSetor->fetch_assoc();
  ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) --> 
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <!--Algum conteudo aqui-->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $rowVenda['cc'] ; ?></h3>

                <p>Vendas</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="listaVendas.php" class="small-box-footer">Veja mais <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $rowProduto['cc'] ; ?></h3>

                <p>Produtos</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="listaProdutos.php" class="small-box-footer">Veja mais <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $rowUsuario['cc'] ; ?></h3>

                <p>Usuários</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="listaUsuario.php" class="small-box-footer">Veja mais <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $rowSetor['cc'] ; ?></h3>

                <p>Setores</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="listaSetores.php" class="small-box-footer">Veja mais <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include ('footer.php');