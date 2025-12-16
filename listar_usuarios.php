<?php
include("../db/conexao.php");

$sql = "SELECT * FROM usuario";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>

<h2>Usuários Cadastrados</h2>

<?php
while ($row = $result->fetch_assoc()) {
    echo $row['id_usuario'] . " - " . $row['nome'] . " - " . $row['email'] . 
         " - <a href='editar_usuario.php?id=".$row['id_usuario']."'>Editar</a> " . 
         " - <a href='excluir_usuario.php?id=".$row['id_usuario']."'>Excluir</a><br>";
}
?>


<br>
<a href="../index.php">Voltar</a>

</body>
</html>
