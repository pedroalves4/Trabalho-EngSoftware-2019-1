<?php require('header.php'); ?>
<?php require('dashboard.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Editor de Setor</h1>
        </div><!-- /.col -->
        <div class="col-sm-3">
        </div><!-- nada aqui -->
        <div class="col-sm-3">
          <a href="listaSetores.php"><button type="button" class="btn btn-block btn-secondary"><i class="nav-icon fa fa-undo"></i> Voltar sem cadastrar</button></a>
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

            <?php
                    
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM setores WHERE id = $id";
                    $result = $conexao->query($sql);

                    while($row = $result->fetch_assoc())
                    {
                ?>            
            <form action="" method="POST" target="_self" role="form">
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-3">
                    <label for="inputNome">Nome</label>
                    <input type="text" name="nome" class="form-control" id="inputNome" placeholder="Digite o nome" maxlength="40" value="<?php echo $row['nome'] ?>" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputDescricao">Descrição</label>
                    <input type="text" name="descricao" class="form-control" id="inputDescricao" placeholder="Digite a Descrição" value="<?php echo $row['descricao'] ?>" maxlength="60">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputNID">Nº de Identificação</label>
                    <input type="text" name="nid" class="form-control" id="inputNID" placeholder="001" maxlength="10" value="<?php echo $row['nid'] ?>" required>
                  </div>
                  <div class="form-group col-md-3">
                    <label>Administrador Responsável</label>
                    <select id="role-selector" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="responsavel">
                      <?php  
                      $sql2 = "SELECT * FROM usuarios WHERE cargo='Administrador'"; 
                      $result2 = $conexao->query($sql2);
                    
                      if ($result2->num_rows > 0) {
                        while ($row2 = $result2->fetch_assoc()) { 
                          if($row['responsavel']==$row2['id'])
                          echo "<option value='$row2[id]'selected>$row2[nome]</option>";
                          else
                          echo "<option value='$row2[id]'>$row2[nome]</option>";
                        } 
                      }else{ 
                        echo "<option value='' disabled>Não existem administradores no banco</option>";
                      }?>
                    </select>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" name="submit" class="btn btn-secondary">Enviar</button>
              </div>
            </form>
            <?php } ?>
          </div>
      </div>

      <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {


        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $nid = $_POST['nid'];
        $responsavel = $_POST['responsavel'];

        var_dump($nome);

        $sql = "UPDATE setores SET nome = '$nome', descricao = '$descricao', nid = '$nid', responsavel = '$responsavel' WHERE id = '$id'";
        $salvar = mysqli_query($conexao, $sql);

        if ($salvar) {
          ?>
          <script language="JavaScript">
            alert("Setor editado com sucesso!");
            window.location.replace('listaSetores.php');
          </script>
        <?php
      } else {
        ?>
          <script language="JavaScript">
            alert("Falha ao editar Setor!");
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