<?php require('bd/conexao.php'); ?>
<?php
	$id = $_GET['id'];

	$sql = "DELETE FROM usuarios WHERE id = $id";
	$result = $conexao->query($sql);
	if($result){?>
		<script language="JavaScript">
			alert("Êxito ao excluir o usuário!");
			window.location.replace('listaUsuario.php');
		</script>				
	<?php }else{?>	
		<script language="JavaScript">
			alert("Erro ao excluir o usuário!");
			window.location.replace('listaUsuario.php');
		</script>
	<?php } ?>	