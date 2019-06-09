<?php require('header.php'); ?>
<?php require('dashboard.php'); ?>
<?php
$sqlFuncionarios = "SELECT * FROM usuarios WHERE tipo = 'Funcionario'"; 
$sqlClientes = "SELECT * FROM usuarios WHERE tipo = 'Cliente'"; 
$sqlProdutos = "SELECT * FROM produtos"; 
$resultFuncionarios = $conexao->query($sqlFuncionarios);
$resultClientes = $conexao->query($sqlClientes);
$resultProdutos = $conexao->query($sqlProdutos);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Visualização de Venda</h1>
        </div><!-- /.col -->
        <div class="col-sm-3">
        </div><!-- nada aqui -->
        <div class="col-sm-3">
          <a href="listaVendas.php"><button type="button" class="btn btn-block btn-secondary"><i class="nav-icon fa fa-undo"></i> Voltar sem cadastrar</button></a>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
                  <?php
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM vendas WHERE id = $id";
                    $result = $conexao->query($sql);

                    $row = $result->fetch_assoc();
                    ?>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Informações</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="" method="POST" target="_self" role="form">
              <div id="DIVprodutos" class="card-body">
                <div class="row">
                  <div class="form-group col-md-3">
                    <label>Cliente</label>
                    <select id="selectCliente" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="cliente" disabled>
                      <?php
                          while ($rowtemp = $resultClientes->fetch_assoc()) { 
                            if($rowtemp['id'] == $row['cliente']){
                              echo "<option selected value='$rowtemp[id]'>$rowtemp[nome]</option>";
                            }
                          } 
                      ?>
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                    <label>Funcionário Responsável</label>
                    <select id="selectFuncionario" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="funcionario" disabled>
                      <?php
                          while ($rowtemp = $resultFuncionarios->fetch_assoc()) { 
                            if($rowtemp['id'] == $row['funcionario']){
                              echo "<option selected value='$rowtemp[id]'>$rowtemp[nome]</option>";
                            }
                            echo "<option value='$rowtemp[id]'>$rowtemp[nome]</option>";
                          } 
                      ?>
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="inputData">Data</label>
                    <div class="col-10">
                      <input class="form-control" name="data" type="text" value="<?php echo $row['data'] ?>" id="inputData" disabled>
                    </div>
                  </div>
                  <div class="form-group col-md-1">
                    <label for="inputDesconto">Desconto</label>
                    <input type="number" name="desconto" class="form-control" id="inputDesconto" value="<?php echo $row['desconto'] ?>" disabled>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputTotal">Valor Total</label>
                    <input type="number" name="total" class="form-control" id="inputTotal" value="<?php echo $row['total'] ?>" disabled>
                  </div>
                </div>


                <?php
                  $sqlProdutos = "SELECT * FROM vendas_produtos WHERE venda = $id";
                  $resultProdutos = $conexao->query($sqlProdutos);
                  while ($row = $resultProdutos->fetch_assoc()) {
                ?>
                <div id="prod0" class="row">
                  <div class="form-group col-md-4">
                    <label>Produto</label>
                    <select id="selectProdutos" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="produtos[]"disabled>
                      <?php $sqlProdutos2 = "SELECT * FROM produtos INNER JOIN vendas_produtos WHERE produtos.id = vendas_produtos.produto AND vendas_produtos.id=$row[id]";
                      $resultProdutos2 = $conexao->query($sqlProdutos2);
                      while ($row2 = $resultProdutos2->fetch_assoc()) {
                          echo "<option>$row2[nome]</option>";
                      }?>
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputQuantidade">Quantidade</label>
                    <input type="number" name="quantidades[]" class="form-control" id="inputQuantidade" value=<?php echo $row['quantidade']; ?> disabled >
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputPreco">Preco</label>
                    <?php $sqlProdutos2 = "SELECT * FROM produtos INNER JOIN vendas_produtos WHERE produtos.id = vendas_produtos.produto AND vendas_produtos.id=$row[id]";
                      $resultProdutos2 = $conexao->query($sqlProdutos2);
                      $row2 = $resultProdutos2->fetch_assoc();
                    ?>
                    <input name="preco" class="form-control" id="inputPreco0" value=<?php echo $row2['preco']; ?> disabled >
                  </div>
                   <div class="form-group offset-md-4">
                  </div>
                </div>
                <?php } ?>


              </div>
              <!-- /.card-body -->

              <div class="card-footer">
              </div>
            </form>
          </div>
      </div>


  </section>
  <!-- right col -->
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section><!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require ('footer.php');?>