<?php require ('header.php'); ?>
<?php require ('dashboard.php'); ?>
<?php 
$sql = "SELECT * FROM usuarios ORDER BY nome ASC"; //buscando todos usuarios
$result = $conexao->query($sql);
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) --> 
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Usuários</h1>
          </div><!-- /.col -->
          <div class="col-sm-4">
          </div><!-- vazio para alinhar botao de adicionar à esquerda -->  
          <div class="col-sm-2">
            <a href="insertUsuario.php"><button type="button" class="btn btn-block btn-success"><i class="nav-icon fa fa-plus"></i> Adicionar</button></a>
          </div><!-- /.col -->
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
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Email</th>
                  <th>Tipo</th>
                  <th>Telefone</th>
                  <th>CPF</th>
                  <th>Estado</th>
                  <th>Cidade</th>
                  <th>CEP</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php 
                if ($result->num_rows > 0) {
                  // output data of each row
                    while ($row = $result->fetch_assoc()) {
                     echo "<tr>";
                      echo "<td>" .$row["nome"] . "</td>"; 
                      echo "<td>" .$row["email"] . "</td> ";
                      echo "<td>" .$row["tipo"] . "</td>";  
                      echo "<td>" .$row["telefone"] . "</td> "; 
                      echo "<td>" .$row["cpf"] . "</td>";
                      echo "<td>" .$row["estado"] . "</td>"; 
                      echo "<td>" .$row["cidade"] . "</td>"; 
                      echo "<td>" .$row["cep"] . "</td>"; 
                      ?>
                      <td><a href="#" style="text-decoration: none;color: #000;"><i class="fa fa-edit"></i></a></td>
                      <td><a href="deleteUsuario.php?id=<?php echo $row['id'];?>" style="text-decoration: none;color: #000;"><i class="fa fa-trash"></i></a></td>
                      <?php
                      echo "<tr>";
                    }  
                }    
                ?>
              </tbody>
            </table>
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section><!-- /.content -->
  </div>
<!-- /.content-wrapper -->

<?php require ('footer.php');?>