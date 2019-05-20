<?php require('bd/conexao.php'); ?>
<?PHP
		$email = $_POST['email'];
		$senha = $_POST['senha'];

		$sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
				$result = $conexao->query($sql);
				
				while ($row = $result->fetch_assoc()) {
					 $nome = $row["nome"];
					 $tipo = $row["tipo"];
					 $id = $row["id"];
					 $cargo = $row["cargo"];
				} // query para pegar dados do usuario e exibir no dashboard

		if($result->num_rows < 1){

			echo "<script language='javascript' type'text/javascript'>
					alert('Email ou senha invalidos. Tente Novamente !');
				</script>";
			session_start();
			unset ($_SESSION['email']);
			unset ($_SESSION['senha']);
			session_destroy();

			echo "<script language='javascript' type'text/javascript'> 
				  	window.location.replace('login.php') 
				  </script>";
        
		}else{

			session_start();
			
			$_SESSION['email'] = $email;
			$_SESSION['senha'] = $senha;
			$_SESSION['nome'] = $nome;
			$_SESSION['tipo'] = $tipo;
			$_SESSION['id'] = $id;
			$_SESSION['cargo'] = $cargo;

			if ($_SESSION['cargo'] == "Administrador"){
				echo "<script language='javascript' type'text/javascript'>
						alert('Bem vindo, $nome!');
						window.location.replace('index.php');
					</script>";
			}else{
				echo "<script language='javascript' type'text/javascript'>
						alert('Bem vindo, $nome!');
						window.location.replace('inicio.php');
					</script>";
			}
		}
?>