<?php

$hostname = "localhost";;
$user = "root";
$password = "";
$database = "lojaze";
$conexao = mysqli_connect($hostname, $user, $password, $database);

if(!$conexao){ ?>

	<script> alert("Falha na conexão com o BD!");</script>

<?php } ?>