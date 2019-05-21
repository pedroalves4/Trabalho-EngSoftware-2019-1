<?php require('header.php'); ?>
<?php require('dashboard.php'); ?>

<?php 
$sql = "SELECT * FROM setores"; 
$result = $conexao->query($sql);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Cadastro de Produto</h1>
        </div><!-- /.col -->
        <div class="col-sm-3">
        </div><!-- nada aqui -->
        <div class="col-sm-3">
          <a href="listaProdutos.php"><button type="button" class="btn btn-block btn-secondary"><i class="nav-icon fa fa-undo"></i> Voltar sem cadastrar</button></a>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

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
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-4">
                    <label for="inputNome">Nome</label>
                    <input type="text" name="nome" class="form-control" id="inputNome" placeholder="Digite o nome" maxlength="40" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputFabricante">Fabricante</label>
                    <input type="text" name="fabricante" class="form-control" id="inputFabricante" placeholder="Coca-Cola" maxlength="40" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Setor</label>
                    <select id="role-selector" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="setor">
                      <?php 
                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) { 
                          echo "<option value='$row[id]'>$row[nome]</option>";
                        } 
                      }else{ 
                        echo "<option value='' disabled>Não existem setores cadastrados</option>";
                      }?>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-3">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="inputQuantidade">Quantidade em Estoque</label>
                    <input type="number" name="quantidade" class="form-control" id="inputQuantidade" placeholder="Digite a quantidade" required>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="inputPreco">Preço (Unidade)</label>
                    <input type="number" step="0.01" name="preco" class="form-control" id="inputPreco" placeholder="100.20">
                  </div>
                  <div class="form-group col-md-3">
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" name="submit" class="btn btn-secondary">Enviar</button>
              </div>
            </form>
          </div>
      </div>

      <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {


        $nome = $_POST['nome'];
        $fabricante = $_POST['fabricante'];
        $setor = $_POST['setor'];
        $quantidade = $_POST['quantidade'];
        $preco = $_POST['preco'];

        $sql = "INSERT INTO produtos (nome,fabricante,setor,quantidade,preco) VALUES ('$nome','$fabricante','$setor','$quantidade','$preco')";
        $salvar = mysqli_query($conexao, $sql);

        if ($salvar) {
          ?>
          <script language="JavaScript">
            alert("Produto cadastrado com sucesso!");
            window.location.replace('listaProdutos.php');
          </script>
        <?php
      } else {
        ?>
          <script language="JavaScript">
            alert("Falha ao cadastrar Produto!");
          </script>
        <?php
      }

      mysqli_close($conexao);
    }
    ?>

  </section>
  <!-- right col -->
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section><!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php require('footer.php'); ?>