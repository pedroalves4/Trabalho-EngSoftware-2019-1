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
            <h1 class="m-0 text-dark">Editor de Cliente</h1>
          </div><!-- /.col -->
          <div class="col-sm-3">
          </div><!-- nada aqui -->  
          <div class="col-sm-3">
            <a href="listaClientes.php"><button type="button" class="btn btn-block btn-secondary"><i class="nav-icon fa fa-undo"></i> Voltar sem editar</button></a>
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
                      <label for="inputEmail">Email</label>
                      <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Digite o email" value="<?php echo $row['email'] ?>" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="inputSenha">Senha</label>
                      <input type="password" name="senha" class="form-control" id="inputSenha" placeholder="Digite a senha" value="<?php echo $row['senha'] ?>" disabled>
                    </div>
                    <div class="form-group col-md-3">
                      <label>Tipo de Usuário</label>
                      <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="tipo">
                        <option <?php if($row['tipo']=="Cliente")echo "selected" ?> >Cliente</option>
                      </select>
                    </div>    
                  </div> 
                  <div class="row">
                    <div class="form-group col-md-5">
                      <label for="inputNome">Nome</label>
                      <input type="text" name="nome" class="form-control" id="inputNome" placeholder="Digite o nome" value="<?php echo $row['nome'] ?>" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="inputTelefone">Telefone</label>
                      <input type="text" name="telefone" class="form-control" id="inputTelefone"  placeholder="(11) 11111-1111" onkeypress="mascara(this, '## #####-####')"  maxlength="13" value="<?php echo $row['telefone'] ?>" required>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputCPF">CPF</label>
                      <input type="text" name="cpf" class="form-control" id="inputCPF" placeholder="111.111.111-11" onkeypress="mascara(this, '###.###.###-##')"  maxlength="14" value="<?php echo $row['cpf'] ?>" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-5">
                      <label for="inputCNPJ">CNPJ</label>
                      <input type="text" name="cnpj" class="form-control" id="inputCNPJ" placeholder="11.111.111/1111-11" onkeypress="mascara(this, '##.###.###/####-##')" onkeypress="mascara(this, '###.###.###-##')"  maxlength="14" value="<?php echo $row['cnpj'] ?>" required>
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
                        <label for="inputEndereco">Endereço</label>
                        <input type="text" name="endereco" class="form-control" id="inputEndereco" placeholder="Av. Rio Branco" value="<?php echo $row['endereco'] ?>" required>
                      </div>
                  </div> 
                  <div class="row">
                      <div class="form-group col-md-12">
                        <label for="inputComplemento">Complemento</label>
                        <input type="text" name="complemento" class="form-control" id="inputComplemento" placeholder="Apartmento, estudio, or andar" value="<?php echo $row['complemento'] ?>">
                      </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="inputCidade">Cidade</label>
                      <input type="text" name="cidade" class="form-control" id="inputCidade" placeholder="Juiz de Fora" value="<?php echo $row['cidade'] ?>" required>

                    </div>
                    <div class="form-group col-md-3">
                      <label>Estado</label>
                      <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="estado" selected="<?php echo $row['estado'] ?>">
                        <option <?php if($row['estado']=="AC")echo "selected" ?> >AC</option>
                        <option <?php if($row['estado']=="AL")echo "selected" ?> >AL</option>
                        <option <?php if($row['estado']=="AP")echo "selected" ?> >AP</option>
                        <option <?php if($row['estado']=="AM")echo "selected" ?> >AM</option>
                        <option <?php if($row['estado']=="BA")echo "selected" ?> >BA</option>
                        <option <?php if($row['estado']=="CE")echo "selected" ?> >CE</option>
                        <option <?php if($row['estado']=="DF")echo "selected" ?> >DF</option>
                        <option <?php if($row['estado']=="ES")echo "selected" ?> >ES</option>
                        <option <?php if($row['estado']=="GO")echo "selected" ?> >GO</option>
                        <option <?php if($row['estado']=="MA")echo "selected" ?> >MA</option>
                        <option <?php if($row['estado']=="MT")echo "selected" ?> >MT</option>
                        <option <?php if($row['estado']=="MS")echo "selected" ?> >MS</option>
                        <option <?php if($row['estado']=="MG")echo "selected" ?> >MG</option>
                        <option <?php if($row['estado']=="PA")echo "selected" ?> >PA</option>
                        <option <?php if($row['estado']=="PB")echo "selected" ?> >PB</option>
                        <option <?php if($row['estado']=="PR")echo "selected" ?> >PR</option>
                        <option <?php if($row['estado']=="PE")echo "selected" ?> >PE</option>
                        <option <?php if($row['estado']=="PI")echo "selected" ?> >PI</option>
                        <option <?php if($row['estado']=="RJ")echo "selected" ?> >RJ</option>
                        <option <?php if($row['estado']=="RN")echo "selected" ?> >RN</option>
                        <option <?php if($row['estado']=="RS")echo "selected" ?> >RS</option>
                        <option <?php if($row['estado']=="RO")echo "selected" ?> >RO</option>
                        <option <?php if($row['estado']=="RR")echo "selected" ?> >RR</option>
                        <option <?php if($row['estado']=="SC")echo "selected" ?> >SC</option>
                        <option <?php if($row['estado']=="SP")echo "selected" ?> >SP</option>
                        <option <?php if($row['estado']=="SE")echo "selected" ?> >SE</option>
                        <option <?php if($row['estado']=="TO")echo "selected" ?> >TO</option>
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputCEP">CEP</label>
                      <input type="text" name="cep" class="form-control" id="inputCEP" onkeypress="mascara(this, '##.###-###')" placeholder="11.111-111" maxlength="10" value="<?php echo $row['cep'] ?>" required>
                    </div>
                  </div> 
                </div>  

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-secondary">Salvar</button>
                </div>
              </form>
            <?php } ?>
            </div>
          </div>
    <?php 
    if(isset($_POST["submit"])){


        $email = $_POST['email'];
        //$senha = $_POST['senha'];
        $tipo = $_POST['tipo'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $cpf = $_POST['cpf'];
        $endereco = $_POST['endereco'];
        $complemento = $_POST['complemento'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $cep = $_POST['cep'];
        $cnpj = $_POST['cnpj'];

        //$sql = "UPDATE usuarios SET email = '$email', senha = '$senha', tipo = '$tipo', nome = '$nome', telefone = '$telefone', cpf = '$cpf', endereco = 'endereco', complemento = 'complemento', cidade = '$cidade', estado = '$estado', cep = '$cep' WHERE id = '$id'";
        $sql = "UPDATE usuarios SET email = '$email', tipo = '$tipo', nome = '$nome', telefone = '$telefone', cpf = '$cpf', endereco = '$endereco', complemento = '$complemento', cidade = '$cidade', estado = '$estado', cep = '$cep', cnpj = '$cnpj' WHERE id = '$id'";

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