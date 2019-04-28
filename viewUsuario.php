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
            <h1 class="m-0 text-dark">Visualização de Usuário</h1>
          </div><!-- /.col -->
          <div class="col-sm-4">
          </div><!-- nada aqui -->  
          <div class="col-sm-2">
            <a href="listaUsuario.php"><button type="button" class="btn btn-block btn-secondary"><i class="nav-icon fa fa-back"></i> Voltar</button></a>
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
                      <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Digite o email" value="<?php echo $row['email'] ?>" disabled>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="inputSenha">Senha</label>
                      <input type="password" name="senha" class="form-control" id="inputSenha" placeholder="Digite a senha" value="<?php echo $row['senha'] ?>" disabled>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputTipo">Tipo de Usuário</label>
                      <input type="text" name="tipo" class="form-control" id="inputTipo" value="<?php echo $row['tipo'] ?>" disabled>
                    </div>    
                  </div> 
                  <div class="row">
                    <div class="form-group col-md-5">
                      <label for="inputNome">Nome</label>
                      <input type="text" name="nome" class="form-control" id="inputNome" placeholder="Digite o nome" value="<?php echo $row['nome'] ?>" disabled>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="inputTelefone">Telefone</label>
                      <input type="text" name="telefone" class="form-control" id="inputTelefone"  placeholder="(11) 11111-1111" onkeypress="mascara(this, '## #####-####')"  maxlength="13" value="<?php echo $row['telefone'] ?>" disabled>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputCPF">CPF</label>
                      <input type="text" name="cpf" class="form-control" id="inputCPF" placeholder="111.111.111-11" onkeypress="mascara(this, '###.###.###-##')"  maxlength="14" value="<?php echo $row['cpf'] ?>" disabled>
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
                        <input type="text" name="endereco" class="form-control" id="inputEndereco" placeholder="Av. Rio Branco" value="<?php echo $row['endereco'] ?>" disabled>
                      </div>
                  </div> 
                  <div class="row">
                      <div class="form-group col-md-12">
                        <label for="inputComplemento">Complemento</label>
                        <input type="text" name="complemento" class="form-control" id="inputComplemento" placeholder="Apartmento, estudio, or andar" value="<?php echo $row['complemento'] ?>" disabled>
                      </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="inputCidade">Cidade</label>
                      <input type="text" name="cidade" class="form-control" id="inputCidade" placeholder="Juiz de Fora" value="<?php echo $row['cidade'] ?>" disabled>

                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputEstado">Estado</label>
                      <input type="text" name="estado" class="form-control" id="inputEstado" value="<?php echo $row['estado'] ?>" disabled>                        
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputCEP">CEP</label>
                      <input type="text" name="cep" class="form-control" id="inputCEP" onkeypress="mascara(this, '##.###-###')" placeholder="11.111-111" maxlength="10" value="<?php echo $row['cep'] ?>" disabled>
                    </div>
                  </div> 
                </div>  

              </form>
            <?php } ?>
            </div>
          </div>
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section><!-- /.content -->
  </div>
<!-- /.content-wrapper -->

<?php require ('footer.php');?>