<?php require('header.php'); ?>
<?php require('dashboard.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Visualização de Setor</h1>
        </div><!-- /.col -->
        <div class="col-sm-3">
        </div><!-- nada aqui -->
        <div class="col-sm-3">
          <a href="listaSetores.php"><button type="button" class="btn btn-block btn-secondary"><i class="nav-icon fa fa-undo"></i> Voltar</button></a>
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
                    <input type="text" name="nome" class="form-control" id="inputNome" placeholder="Digite o nome" maxlength="40" value="<?php echo $row['nome'] ?>" disabled>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputDescricao">Descrição</label>
                    <input type="text" name="descricao" class="form-control" id="inputDescricao" placeholder="Digite a Descrição" value="<?php echo $row['descricao'] ?>" maxlength="60" disabled>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputNID">Nº de Identificação</label>
                    <input type="text" name="nid" class="form-control" id="inputNID" placeholder="001" maxlength="10" value="<?php echo $row['nid'] ?>" disabled>
                  </div>
                  <div class="form-group col-md-3">
                    <label>Administrador Responsável</label>
                    <select id="role-selector" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="responsavel" disabled>
                      <?php  
                        $sql2 = "SELECT * FROM usuarios WHERE cargo='Administrador'"; 
                        $result2 = $conexao->query($sql2);
                      
                        if ($result2->num_rows > 0) {
                          while ($row2 = $result2->fetch_assoc()) { 
                            if($row['responsavel']==$row2['id'])
                            echo "<option value='$row2[id]'selected>$row2[nome]</option>";
                          } 
                        }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
              </div>
            </form>
            <?php } ?>
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

<?php require('footer.php'); ?>