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
          <h1 class="m-0 text-dark">Cadastro de Venda</h1>
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
                    <select id="selectCliente" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="cliente">
                      <?php
                        while ($row = $resultClientes->fetch_assoc()) { 
                          echo "<option value='$row[id]'>$row[nome]</option>";
                        } 
                      ?>
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                    <label>Funcionário Responsável</label>
                    <select id="selectFuncionario" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="funcionario">
                      <?php
                        while ($row = $resultFuncionarios->fetch_assoc()) { 
                          echo "<option value='$row[id]'>$row[nome]</option>";
                        } 
                      ?>
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="inputData">Data</label>
                    <div class="col-10">
                      <input class="form-control" name="data" type="date" value="2019-06-10" id="inputData">
                    </div>
                  </div>
                  <div class="form-group col-md-1">
                    <label for="inputDesconto">Desconto</label>
                    <input type="number" name="desconto" class="form-control" id="inputDesconto" value="00" maxlength="40" required>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputTotal">Valor Total</label>
                    <input type="number" step="0.01" name="total" class="form-control" id="inputTotal" placeholder="00,00">
                  </div>
                </div>
                <div id="addprod" class="row">
                  <div class="offset-md-10">
                  </div>
                  <div class="form-group col-md-2">
                    <button id="botaoadicionar" type="button" class="btn btn-block btn-success"><i class="nav-icon fa fa-plus"></i> Adicionar</button>
                  </div>
                </div>
                <div id="prod0" class="row">
                  <div class="form-group col-md-4">
                    <label>Produto</label>
                    <select id="selectProdutos" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="produtos[]">
                      <?php
                        while ($row = $resultProdutos->fetch_assoc()) { 
                          echo "<option value='$row[id]'>$row[nome]</option>";
                        } 
                      ?>
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputQuantidade0">Quantidade</label>
                    <input type="number" name="quantidades[]" class="form-control" onblur="calcular()" id="inputQuantidade0" placeholder="Digite a quantidade" required>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputPreco0">Preco</label>
                    <input name="precos[]" class="form-control" id="inputPreco0" placeholder="2,50" onblur="calcular()" required >
                  </div>
                  <div class="form-group col-md-1">
                    <label style="color: #fff;">.</label>
                    <button id="deleteProduto" type="button" class="btn btn-block btn-danger" onclick="excluirProduto(0)"><i class="nav-icon fa fa-trash"></i></button>
                  </div>
                   <div class="form-group offset-md-3">
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
            alert("Venda cadastrada com sucesso!");
            window.location.replace('listaVendas.php');
          </script>
        <?php
      } else {
        ?>
          <script language="JavaScript">
            alert("Falha ao cadastrar Venda!");
          </script>
        <?php
      }
    
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

<?php
  $sqlProdutos = "SELECT * FROM produtos"; 
  $resultProdutos = $conexao->query($sqlProdutos);
?>

<?php require('footer.php'); ?>

<script>
$(document).ready(function(){
  var contador = 1;
  localStorage.setItem("contata", contador);

  $("#botaoadicionar").click(function(){
    $("#DIVprodutos").append("<div id='prod"+contador+"' class='row'><div class='form-group col-md-4'><label>Produto</label><select id='selectProdutos"+contador+"' class='form-control select2 select2-hidden-accessible' style='width: 100%;' tabindex='-1' aria-hidden='true' name='produtos[]'><?php while($row = $resultProdutos->fetch_assoc()){echo "<option value='$row[id]'>$row[nome]</option>";}?></select></div><div class='form-group col-md-2'><label for='inputQuantidade"+contador+"'>Quantidade</label><input type='number' name='quantidades[]' class='form-control' onblur='calcular()' id='inputQuantidade"+contador+"' placeholder='Digite a quantidade' required></div><div class='form-group col-md-2'><label for='inputPreco'>Preco</label><input name='precos[]' class='form-control' id='inputPreco"+contador+"' placeholder='2,50' onblur='calcular()' required></div><div class='form-group col-md-1'><label style='color: #fff;'>.</label><button id='deleteProduto"+contador+"' type='button' class='btn btn-block btn-danger' onclick='excluirProduto("+contador+")'><i class='nav-icon fa fa-trash'></i></button></div><div class='form-group offset-md-3'></div></div>");
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
