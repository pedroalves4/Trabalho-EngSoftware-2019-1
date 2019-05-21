<?php require ('header.php'); ?>
<?php require ('dashboard.php'); ?>
<?php 
$sql = "SELECT * FROM produtos ORDER BY id ASC";
$result = $conexao->query($sql);

?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) --> 
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-3">
            <h1 class="m-0 text-dark">Produtos</h1>
          </div><!-- /.col -->
          <div class="col-sm-3">
          </div>
          <div class="col-sm-4">
          </div>
          <div class="col-sm-2">
          <?php if ($_SESSION['tipo'] != "Cliente"){?>
            <a href="insertProduto.php"><button type="button" class="btn btn-block btn-success"><i class="nav-icon fa fa-plus"></i> Adicionar</button></a>
          <?php } ?>
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
                  <?php if ($_SESSION['tipo'] != "Cliente"){?>
                  <th>Fabricante</th>
                  <th>Setor</th>
                  <th>Quantidade em Estoque</th>
                  <th>Preço(Un)</th>
                  <th></th>
                  <th></th>
                  <?php }?>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php 
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr href='viewSetor.php?id=".$row['id']."' >";
                        echo "<td>" .$row["nome"] . "</td>"; 
                        ?><?php if ($_SESSION['tipo'] != "Cliente"){
                        echo "<td>" .$row["fabricante"] . "</td> ";
                        
                        $setor = "SELECT setores.nome FROM `setores` INNER JOIN `produtos` WHERE produtos.setor=setores.id AND produtos.id=$row[id];";
                        $resultado = $conexao->query($setor);
                        $linha = $resultado->fetch_assoc();
                        echo "<td>" .$linha['nome'] . "</td>";  
                        echo "<td>" .$row["quantidade"] . "</td>";
                        echo "<td>" .$row["preco"] . "</td>";
                      ?>
                       <?php } ?>
                        <td><a href="viewProduto.php?id=<?php echo $row['id'];?>" style="text-decoration: none;color: #000;" data-toggle="tooltip" title="Visualizar"><i class="fa fa-eye"></i></a></td>
                        <?php if ($_SESSION['tipo'] != "Cliente"){?>
                        <td><a href="updateProduto.php?id=<?php echo $row['id'];?>" style="text-decoration: none;color: #000;" data-toggle="tooltip" title="Editar"><i class="fa fa-edit"></i></a></td>
                        <td><a href="#" onclick="excluir(<?php echo $row['id'];?>)" style="text-decoration: none;color: #000;" data-toggle="tooltip" title="Excluir"><i class="fa fa-trash"></i></a></td>
                        <?php }
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
  var r = confirm("Tem certeza que deseja excluir esse Produto?");
  if (r == true) {
    window.location.replace('deleteProduto.php?id='+id);
  } else {
    
  }
}
</script>
<?php require ('footer.php');?>