<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lojão Seu Zé | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<?php require('bd/conexao.php'); ?>
<?php 	
    session_start();

    if(isset($_SESSION['email']) || isset($_SESSION['senha'])){
        $usuario = $_SESSION['email'];
        echo "<script language='javascript' type'text/javascript'>
                alert('Você já está logado! Usuário ativo: \"$usuario\". Redirecionando para a página de Administração');
                window.location.replace('index.php');
            </script>";
    }

?>
<body class="hold-transition login-page">
    <div id="app" class="login-box">
        <div class="login-logo">
            <img src="dist/img/logo.png" alt="Lojao Seu Ze Logo" class="img-fluid img-circle elevation-3" style="width: 15%;">
            <a><b>Lojão SeuZé</b></a>
        </div>
        
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Faça o login para iniciar sua sessão</p>

                <form action="verificaLogin.php" method="POST" method="post">
                    <div class="input-group mb-3">
                        <input placeholder="E-mail" type="email" class="form-control" name="email" autocomplete="username" required autofocus>
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-envelope"></i>
                            </span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input placeholder="Senha" type="password" class="form-control" name="senha" autocomplete="current-password" required>
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-lock"></i>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">
                                    Lembre-me
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
