<?php require ('header.php'); ?>
<?php require ('dashboard.php'); ?>
<?php
if($_SESSION['cargo']=="Administrador"){

$sql = "SELECT * FROM setores ORDER BY id ASC";
$result = $conexao->query($sql);

?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) --> 
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-3">
            <h1 class="m-0 text-dark">Setores</h1>
          </div><!-- /.col -->
          <div class="col-sm-3">
          </div>
          <div class="col-sm-4">
          </div>
          <div class="col-sm-2">
            <a href="insertSetor.php"><button type="button" class="btn btn-block btn-success"><i class="nav-icon fa fa-plus"></i> Adicionar</button></a>
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
            <table id="tabelinha" class="table table-hover">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Descrição</th>
                  <th>Identificação</th>
                  <th>Responsável</th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php 
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr href='viewSetor.php?id=".$row['id']."' >";
                        echo "<td>" .$row["nome"] . "</td>"; 
                        echo "<td>" .$row["descricao"] . "</td> ";
                        echo "<td>" .$row["nid"] . "</td>";
                        
                        $responsavel = "SELECT usuarios.nome FROM `setores` INNER JOIN `usuarios` WHERE setores.responsavel=usuarios.id AND setores.id=$row[id];";
                        $resultado = $conexao->query($responsavel);
                        $linha = $resultado->fetch_assoc();
                        echo "<td>" .$linha['nome'] . "</td>";  
                      ?>
                        <td><a href="viewSetor.php?id=<?php echo $row['id'];?>" style="text-decoration: none;color: #000;" data-toggle="tooltip" title="Visualizar"><i class="fa fa-eye"></i></a></td>
                        <td><a href="updateSetor.php?id=<?php echo $row['id'];?>" style="text-decoration: none;color: #000;" data-toggle="tooltip" title="Editar"><i class="fa fa-edit"></i></a></td>
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
function excluir(id){
  var r = confirm("Tem certeza que deseja excluir esse Setor?");
  if (r == true) {
    window.location.replace('deleteSetor.php?id='+id);
  } else {
    
  }
}
</script>

<?php
  }else{
    echo '
      <div class="content-wrapper">
        <h1 style="padding-left: 30px;"> Acesso não autorizado </h1>
        <h2 style="padding-left: 30px;"><a href="inicio.php">Voltar</a></h2>
      </div>'
    ;
  }
?>
<?php require ('footer.php');?>