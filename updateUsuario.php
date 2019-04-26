<?php require ('header.php'); ?>
<?php require ('dashboard.php'); ?>

<script language="JavaScript">
        function mascara(t, mask)
        {
            var i = t.value.length;                
            var saida = mask.substring(1,0);
            var texto = mask.substring(i)
            if (texto.substring(0,1) != saida)
            {
                t.value += texto.substring(0,1);
            }
        }
    </script>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) --> 
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Editor de Usuário</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- nada aqui -->  
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
                <h3 class="card-title">Informações Pessoais</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <?php
                    
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM usuarios WHERE id = $id"; //buscando todos usuarios
                    $result = $conexao->query($sql);

                    while($row = $result->fetch_assoc())
                    {
                ?>            
              <form action="" method="POST" target="_self" role="form">
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-5">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Digite o email" value="<?php echo $row['email'] ?>" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="exampleInputPassword1">Senha</label>
                      <input type="password" name="senha" class="form-control" id="exampleInputPassword1" placeholder="Digite a senha" value="<?php echo $row['senha'] ?>" required>
                    </div>
                    <div class="form-group col-md-3">
                      <label>Tipo de Usuário</label>
                      <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="tipo">
                        <option>Cliente</option>
                        <?php 
                          if(isset($_SESSION['email']) && $_SESSION['tipo']=="Admin"){
                              echo "<option>Admin</option>";    
                          }else{
                            echo"<option disabled>Admin</option>";
                          }
                         ?>
                      </select>
                    </div>    
                  </div> 
                  <div class="row">
                    <div class="form-group col-md-5">
                      <label for="exampleInputEmail1">Nome</label>
                      <input type="text" name="nome" class="form-control" id="exampleInputEmail1" placeholder="Digite o nome" value="<?php echo $row['nome'] ?>" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="exampleInputEmail1">Telefone</label>
                      <input type="text" name="telefone" class="form-control" id="exampleInputEmail1"  placeholder="(11) 11111-1111" onkeypress="mascara(this, '## #####-####')"  maxlength="13" value="<?php echo $row['telefone'] ?>" required>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputEmail1">CPF</label>
                      <input type="text" name="cpf" class="form-control" id="exampleInputEmail1" placeholder="111.111.111-11" onkeypress="mascara(this, '###.###.###-##')"  maxlength="14" value="<?php echo $row['cpf'] ?>" required>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-header">
                  <h3 class="card-title">Informações Residenciais</h3>
                </div>
                <div class="card-body">
                  <div class="row">
                      <div class="form-group col-md-12">
                        <label for="exampleInputEmail1">Endereço</label>
                        <input type="text" name="endereco" class="form-control" id="exampleInputEmail1" placeholder="Av. Rio Branco" value="<?php echo $row['endereco'] ?>" required>
                      </div>
                  </div> 
                  <div class="row">
                      <div class="form-group col-md-12">
                        <label for="exampleInputEmail1">Complemento</label>
                        <input type="text" name="complemento" class="form-control" id="inputAddress2" placeholder="Apartmento, estudio, or andar" value="<?php echo $row['complemento'] ?>">
                      </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1">Cidade</label>
                      <input type="text" name="cidade" class="form-control" id="inputCity" placeholder="Juiz de Fora" value="<?php echo $row['cidade'] ?>" required>

                    </div>
                    <div class="form-group col-md-3">
                      <label>Estado</label>
                      <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="estado" value="<?php echo $row['estado'] ?>">
                        <option selected>AC</option>
                        <option>AL</option>
                        <option>AP</option>
                        <option>AM</option>
                        <option>BA</option>
                        <option>CE</option>
                        <option>DF</option>
                        <option>ES</option>
                        <option>GO</option>
                        <option>MA</option>
                        <option>MT</option>
                        <option>MS</option>
                        <option>MG</option>
                        <option>PA</option>
                        <option>PB</option>
                        <option>PR</option>
                        <option>PE</option>
                        <option>PI</option>
                        <option>RJ</option>
                        <option>RN</option>
                        <option>RS</option>
                        <option>RO</option>
                        <option>RR</option>
                        <option>SC</option>
                        <option>SP</option>
                        <option>SE</option>
                        <option>TO</option>
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputZip">CEP</label>
                      <input type="text" name="cep" class="form-control" id="cep" onkeypress="mascara(this, '##.###-###')" placeholder="11.111-111" maxlength="10" value="<?php echo $row['cep'] ?>" required>
                    </div>
                  </div> 
                </div>  

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-secondary">Enviar</button>
                </div>
              </form>
            <?php } ?>
            </div>
          </div>
    <?php 
    if(isset($_POST["submit"])){


        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $tipo = $_POST['tipo'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $cpf = $_POST['cpf'];
        $endereco = $_POST['endereco'];
        $complemento = $_POST['complemento'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $cep = $_POST['cep'];

        $sql = "UPDATE usuarios SET email = '$email', senha = '$senha', tipo = '$tipo', nome = '$nome', telefone = '$telefone', cpf = '$cpf', endereco = 'endereco', complemento = 'complemento', cidade = '$cidade', estado = '$estado', cep = '$cep' WHERE id = '$id'";
        $salvar = mysqli_query($conexao,$sql);

        if($salvar){
            ?>
            <script language="JavaScript"> 
              alert("Usuário editado com sucesso!");
              window.location.replace('listaUsuario.php');
            </script>
            <?php
        }else{
            ?>
            <script language="JavaScript">alert("Falha ao cadastrar usuário!");</script>
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