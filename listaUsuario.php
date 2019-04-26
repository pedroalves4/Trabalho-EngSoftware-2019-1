<?php require ('header.php'); ?>
<?php require ('dashboard.php'); ?>
<?php 
if (isset($_GET["order"])){
  if($_GET["order"]=="ASC"){
    $sql = "SELECT * FROM usuarios ORDER BY nome ASC"; 
    $order = "ASC";
  }
  else{
    $sql = "SELECT * FROM usuarios ORDER BY id ASC";
    $order = 2;
  }
}else{
  $sql = "SELECT * FROM usuarios ORDER BY id ASC"; //buscando todos usuarios ordenados por ordem alfabetica
  $order = 2;
}

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
          <?php
            if($order!="ASC"){
          ?>
              <a href="listaUsuario.php?order=ASC"><button type="button" class="btn btn-block btn-secondary"><i class="nav-icon fa fa-up"></i> Clique para ordem alfabética </button></a>
          <?php
            }else{
          ?>
              <a href="listaUsuario.php"><button type="button" class="btn btn-block btn-secondary"><i class="nav-icon fa fa-up"></i> Clique para retirar ordem alfabética </button></a>
          <?php
            }
          ?>  
          </div>
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
                      <td><a href="updateUsuario.php?id=<?php echo $row['id'];?>" style="text-decoration: none;color: #000;"><i class="fa fa-edit"></i></a></td>
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