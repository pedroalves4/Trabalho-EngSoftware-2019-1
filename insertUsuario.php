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
            <h1 class="m-0 text-dark">Cadastro de Usuário</h1>
          </div><!-- /.col -->
          <div class="col-sm-3">
          </div><!-- nada aqui -->  
          <div class="col-sm-3">
            <a href="listaUsuario.php"><button type="button" class="btn btn-block btn-secondary"><i class="nav-icon fa fa-undo"></i> Voltar sem cadastrar</button></a>
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
              <form action="" method="POST" target="_self" role="form">
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-5">
                      <label for="inputEmail">Email</label>
                      <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Digite o email" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="inputSenha">Senha</label>
                      <input type="password" name="senha" class="form-control" id="inputSenha" placeholder="Digite a senha" required>
                    </div>
                    <div class="form-group col-md-3">
                      <label>Tipo de Usuário</label>
                      <select id="role-selector" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="tipo">
                        <option value="cliente">Cliente</option>
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
                      <label for="inputNome">Nome</label>
                      <input type="text" name="nome" class="form-control" id="inputNome" placeholder="Enter email" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="inputTelefone">Telefone</label>
                      <input type="text" name="telefone" class="form-control" id="inputTelefone"  placeholder="(11) 11111-1111" onkeypress="mascara(this, '## #####-####')"  maxlength="13" required>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputCPF">CPF</label>
                      <input type="text" name="cpf" class="form-control" id="inputCPF" placeholder="111.111.111-11" onkeypress="mascara(this, '###.###.###-##')"  maxlength="14" required>
                    </div>
                  </div>
                  <div id="showcliente" class="row">
                    <div class="col-md-3">
                      <label for="inputCNPJ">CNPJ</label>
                      <input type="text" name="cnpj" class="form-control" id="inputCNPJ" placeholder="11.111.111/1111-11" onkeypress="mascara(this, '##.###.###/####-##')"  maxlength="14" required>
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
                        <input type="text" name="endereco" class="form-control" id="inputEndereco" placeholder="Av. Rio Branco" required>
                      </div>
                  </div> 
                  <div class="row">
                      <div class="form-group col-md-12">
                        <label for="inputComplemento">Complemento</label>
                        <input type="text" name="complemento" class="form-control" id="inputComplemento" placeholder="Apartmento, estudio, or andar">
                      </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="inputCidade">Cidade</label>
                      <input type="text" name="cidade" class="form-control" id="inputCidade" placeholder="Juiz de Fora" required>

                    </div>
                    <div class="form-group col-md-3">
                      <label>Estado</label>
                      <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="estado">
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
                      <label for="inputCEP">CEP</label>
                      <input type="text" name="cep" class="form-control" id="inputCEP" onkeypress="mascara(this, '##.###-###')" placeholder="11.111-111" maxlength="10" required>
                    </div>
                  </div> 
                </div>  

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-secondary">Enviar</button>
                </div>
              </form>
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
        $cnpj = $_POST['cnpj'];

        $sql = "insert into usuarios (email,senha,tipo,nome,telefone,cpf,endereco,complemento,cidade,estado,cep) values ('$email','$senha','$tipo','$nome','$telefone','$cpf','$endereco','$complemento','$cidade','$estado','$cep', $cnpj)";
        $salvar = mysqli_query($conexao,$sql);

        if($salvar){
            ?>
            <script language="JavaScript"> 
              alert("Usuário cadastrado com sucesso!");
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