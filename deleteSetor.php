<?php require('bd/conexao.php'); ?>
<?php
	$id = $_GET['id'];

	$sql = "DELETE FROM setores WHERE id = $id";
	$result = $conexao->query($sql);
	if($result){?>
		<script language="JavaScript">
			alert("Êxito ao excluir o setor!");
			window.location.replace('listaSetores.php');
		</script>				
	<?php }else{?>	
		<script language="JavaScript">
			alert("Erro ao excluir o setor!");
			window.location.replace('listaSetores.php');
		</script>
	<?php } ?>	