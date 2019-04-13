<?php 
include "header.php";

$sql = "SELECT * FROM usuarios"; //buscando todos usuarios
$result = $conexao->query($sql);

?>


<hr>

<body>
<div class="container page">
  <h2>Lista de Usuários</h2>
    <br>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Telefone</th>
        <th>CPF</th>
        <th>Cidade</th>
        <th>CEP</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php 
    if ($result->num_rows > 0) {
    // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo 
                "<tr>
                    <td>" .$row["nome"] . "</td> 
                    <td>" .$row["email"] . "</td> 
                    <td>" .$row["telefone"] . "</td> 
                    <td>" .$row["cpf"] . "</td>
                    <td>" .$row["cidade"] . "</td>
                    <td>" .$row["cep"] . "</td>
                </tr>" ;
        }
    } else {
        echo "0 resultados";
}

?>
    </tbody>
  </table>
</div>



</body>

<hr>

<?php
include "footer.php";
?>
