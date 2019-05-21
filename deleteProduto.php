<?php require('bd/conexao.php'); ?>
<?php
	$id = $_GET['id'];

	$sql = "DELETE FROM produtos WHERE id = $id";
	$result = $conexao->query($sql);
	if($result){?>
		<script language="JavaScript">
			alert("Êxito ao excluir o produto!");
			window.location.replace('listaProdutos.php');
		</script>				
	<?php }else{?>	
		<script language="JavaScript">
			alert("Erro ao excluir o produto!");
			window.location.replace('listaProdutos.php');
		</script>
	<?php } ?>