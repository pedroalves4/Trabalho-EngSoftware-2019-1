<?php require('header.php'); ?>
<?php require('dashboard.php'); ?>

<?php 
$sqlFuncionarios = "SELECT * FROM usuarios WHERE tipo = 'Funcionario'"; 
$sqlClientes = "SELECT * FROM usuarios WHERE tipo = 'Cliente'"; 
$sqlProdutos = "SELECT * FROM produtos"; 
$resultFuncionarios = $conexao->query($sqlFuncionarios);
$resultClientes = $conexao->query($sqlClientes);
$resultProdutos = $conexao->query($sqlProdutos);

function dd($data) {
  
  echo '<pre>';

  die(var_dump($data));

  echo '<pre>';
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edição de Venda</h1>
        </div><!-- /.col -->
        <div class="col-sm-3">
        </div><!-- nada aqui -->
        <div class="col-sm-3">
          <a href="listaVendas.php"><button type="button" class="btn btn-block btn-secondary"><i class="nav-icon fa fa-undo"></i> Voltar sem editar</button></a>
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
                    <select id="selectCliente" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="cliente" >
                      <?php
                          while ($rowtemp = $resultClientes->fetch_assoc()) { 
                            if($rowtemp['id'] == $row['cliente']){
                              echo "<option selected value='$rowtemp[id]'>$rowtemp[nome]</option>";
                            }
                            echo "<option value='$rowtemp[id]'>$rowtemp[nome]</option>";
                          } 
                      ?>
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                    <label>Funcionário Responsável</label>
                    <select id="selectFuncionario" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="funcionario" >
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
                      <input class="form-control" name="data" type="text" value="<?php echo $row['data'] ?>" id="inputData" >
                    </div>
                  </div>
                  <div class="form-group col-md-1">
                    <label for="inputDesconto">Desconto</label>
                    <input type="number" name="desconto" class="form-control" id="inputDesconto" value="0" >
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputTotal">Valor Total</label>
                    <input type="number" step="0.01" name="total" class="form-control" id="inputTotal" value="<?php echo $row['total'] ?>" >
                  </div>
                </div>
                <input type="number" name="id" class="form-control" id="inputId" value="<?php echo $id ?>" hidden>
                <div id="addprod" class="row">
                  <div class="offset-md-10">
                  </div>
                  <div class="form-group col-md-2">
                    <button id="botaoadicionar" type="button" class="btn btn-block btn-success"><i class="nav-icon fa fa-plus"></i> Adicionar</button>
                  </div>
                </div>

                <?php
                  $sqlProdutos100 = "SELECT * FROM vendas_produtos WHERE venda = $id";
                  $resultProdutos100 = $conexao->query($sqlProdutos100);
                  $cont = 0; 
                  while ($row = $resultProdutos100->fetch_assoc()) {
                ?>
                <div id="prod<?= $cont ?>" class="row">
                  <div class="form-group col-md-4">
                    <label>Produto</label>
                    <select id="selectProdutos" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="produtos[]">
                      <?php 

                      $sqlProdutos2 = "SELECT * FROM produtos INNER JOIN vendas_produtos WHERE produtos.id = vendas_produtos.produto AND vendas_produtos.id=$row[id]";
                      $resultProdutos2 = $conexao->query($sqlProdutos2);
                      while ($row2 = $resultProdutos2->fetch_assoc()) {
                          echo "<option selected value=$row[produto]>$row2[nome]</option>";
                      }

                      $sqlProdutos3 = "SELECT * FROM produtos"; 
                      $resultProdutos3 = $conexao->query($sqlProdutos3);
                      while ($rowtemp = $resultProdutos3->fetch_assoc()) {
                          echo "<option value=$rowtemp[id]>$rowtemp[nome]</option>";
                      }

                      ?>
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputQuantidade">Quantidade</label>
                    <input type="number" name="quantidades[]" class="form-control" onblur="calcular()" id="inputQuantidade" value=<?php echo $row['quantidade']; ?>  >
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputPreco<?= $cont ?>">Preco</label>
                    <?php $sqlProdutos2 = "SELECT * FROM produtos INNER JOIN vendas_produtos WHERE produtos.id = vendas_produtos.produto AND vendas_produtos.id=$row[id]";
                      $resultProdutos2 = $conexao->query($sqlProdutos2);
                      $row2 = $resultProdutos2->fetch_assoc();
                    ?>
                    <input name="precos[]" class="form-control" id="inputPreco<?= $cont ?>" onblur="calcular()" value=<?= $row2['preco']; ?> >
                  </div>
                  <div class="form-group col-md-1">
                    <label style="color: #fff;">.</label>
                    <button id="deleteProduto" type="button" class="btn btn-block btn-danger" onclick="excluirProduto(<?= $cont ?>)"><i class="nav-icon fa fa-trash"></i></button>
                  </div>
                  <div class="form-group offset-md-3">
                  </div>
                </div>
                <?php $cont++; } ?>


              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" name="submit" class="btn btn-secondary">Salvar</button>
              </div>
            </form>
          </div>
      </div>
    <?php 

    if(isset($_POST["submit"])){


        $id = $_POST['id'];
        $sql = "DELETE FROM vendas WHERE id = $id";
        $result = $conexao->query($sql);


        $cliente = $_POST['cliente'];
        $funcionario = $_POST['funcionario'];
        $data = $_POST['data'];
        $desconto = $_POST['desconto'];
        $precoTotal = $_POST['total'];
        $total = $precoTotal - $desconto;
        $produtos = $_POST['produtos'];
        $quantidades = $_POST['quantidades'];
        $precos = $_POST['precos'];



        $sql = "INSERT INTO vendas (cliente,funcionario,data,desconto,total) VALUES ('$cliente','$funcionario','$data','$desconto','$total')";
        $salvar1 = mysqli_query($conexao, $sql);

        $sql = "SELECT LAST_INSERT_ID()";
        $iddd = $conexao->query($sql);
        $idd = $iddd->fetch_assoc();
        $id = intval($idd["LAST_INSERT_ID()"]);

        $ii=0;
        foreach ($quantidades as $indice => $valor) {
          $quant[$ii] = $valor;
          $ii++;
        }
        $ii=0;
        foreach ($precos as $indice => $valor) {
          $preco[$ii] = $valor;
          $ii++;
        }
        $ii=0;
        foreach ($produtos as $indice => $valor) {
          $quan = intval($quant[$ii]);
          $prec = $preco[$ii];
          $val = intval($valor);
          $sql2 = "INSERT INTO vendas_produtos (produto,venda,quantidade,preco) VALUES ('$val', '$id', '$quan', '$prec')";
          $salvar2 = mysqli_query($conexao, $sql2);
          $ii++;
        }


     
      if ($salvar1 && $salvar2) {
          ?>
          <script language="JavaScript">
            alert("Venda editada com sucesso!");
            window.location.replace('listaVendas.php');
          </script>
        <?php
      } else {
        ?>
          <script language="JavaScript">
            alert("Falha ao editar Venda!");
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
<?php require ('footer.php');?>
<script>
$(document).ready(function(){
  var contador = <?= $cont ?>;
  localStorage.setItem("contata", contador);

  $("#botaoadicionar").click(function(){
    $("#DIVprodutos").append("<div id='prod"+contador+"' class='row'><div class='form-group col-md-4'><label>Produto</label><select id='selectProdutos"+contador+"' class='form-control select2 select2-hidden-accessible' style='width: 100%;' tabindex='-1' aria-hidden='true' name='produtos[]'><?php while($row = $resultProdutos->fetch_assoc()){echo "<option value='$row[id]'>$row[nome]</option>";}?></select></div><div class='form-group col-md-2'><label for='inputQuantidade"+contador+"'>Quantidade</label><input type='number' name='quantidades[]' class='form-control' onblur='calcular()' id='inputQuantidade"+contador+"' placeholder='Digite a quantidade' required></div><div class='form-group col-md-2'><label for='inputPreco'>Preco</label><input name='preco[]' class='form-control' id='inputPreco"+contador+"' placeholder='2,50' onblur='calcular()' required></div><div class='form-group col-md-1'><label style='color: #fff;'>.</label><button id='deleteProduto"+contador+"' type='button' class='btn btn-block btn-danger' onclick='excluirProduto("+contador+")'><i class='nav-icon fa fa-trash'></i></button></div><div class='form-group offset-md-3'></div></div>");
    contador++;
    localStorage.setItem("contata", contador);
  });
  
});
</script>
<script>
  function excluirProduto(aidi){
    var elem = document.querySelector('#prod'+aidi);
    elem.parentNode.removeChild(elem);
  }

  function calcular(){
    var i, valor=0;
    var contador = localStorage.getItem("contata");
    for (i=0; i<contador;i++){
      var id = "inputPreco"+i;
      var  id2 = "inputQuantidade"+i;
      if(document.getElementById(id) != null){
        valor += (parseFloat(document.getElementById(id).value) * parseInt(document.getElementById(id2).value));
      }
    }
    document.getElementById('inputTotal').value = valor;
  }
</script> 