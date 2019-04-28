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
              <a href="listaUsuario.php?order=ASC"><button type="button" class="btn btn-block btn-secondary"><i class="nav-icon fas fa-sort-alpha-down"></i> Clique para ordem alfabética </button></a>
          <?php
            }else{
          ?>
              <a href="listaUsuario.php"><button type="button" class="btn btn-block btn-secondary"><i class="nav-icon fa fa-minus-circle"></i> Clique para retirar ordem alfabética </button></a>
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
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr href='viewUsuario.php?id=".$row['id']."' >";
                        echo "<td>" .$row["nome"] . "</td>"; 
                        echo "<td>" .$row["email"] . "</td> ";
                        echo "<td>" .$row["tipo"] . "</td>";  
                        echo "<td>" .$row["telefone"] . "</td> "; 
                        echo "<td>" .$row["cpf"] . "</td>";
                        echo "<td>" .$row["estado"] . "</td>"; 
                        echo "<td>" .$row["cidade"] . "</td>"; 
                        echo "<td>" .$row["cep"] . "</td>"; 
                      ?>
                        <td><a href="viewUsuario.php?id=<?php echo $row['id'];?>" style="text-decoration: none;color: #000;" data-toggle="tooltip" title="Visualizar"><i class="fa fa-eye"></i></a></td>
                        <td><a href="updateUsuario.php?id=<?php echo $row['id'];?>" style="text-decoration: none;color: #000;" data-toggle="tooltip" title="Editar"><i class="fa fa-edit"></i></a></td>
                        <td><a href="#" onclick="excluir(<?php echo $row['id'];?>)" style="text-decoration: none;color: #000;" data-toggle="tooltip" title="Excluir"><i class="fa fa-trash"></i></a></td>
                      <?php
                      echo "</tr>";
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
<script>
 //href="deleteUsuario.php?id=// echo $row['id'];?>"
function excluir(id){
  console.log();
  var r = confirm("Tem certeza que deseja excluir esse usuário?");
  if (r == true) {
    window.location.replace('deleteusuario.php?id='+id);
  } else {
    
  }
}
 

</script>

<?php require ('footer.php');?>