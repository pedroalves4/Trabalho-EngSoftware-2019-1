<?php require('bd/conexao.php'); ?>
<?php
	$id = $_GET['id'];

	$sql = "DELETE FROM vendas WHERE id = $id";
	$result = $conexao->query($sql);
	if($result){?>
		<script language="JavaScript">
			alert("Êxito ao excluir a venda!");
			window.location.replace('listaVendas.php');
		</script>				
	<?php }else{?>	
		<script language="JavaScript">
			alert("Erro ao excluir a venda!");
			window.location.replace('listaVendas.php');
		</script>
	<?php } ?>