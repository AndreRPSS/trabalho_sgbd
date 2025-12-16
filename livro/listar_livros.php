<?php
include("../db/conexao.php");

$sql = "SELECT * FROM livro";
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
<h2>Livros Cadastrados</h2>

<?php
while ($row = $result->fetch_assoc()) {
    echo $row['id_livro'] . " - " . $row['titulo'] . " - " . $row['autor'] . " - Qtd: " . $row['quantidade'] .
     " - <a href='editar_livro.php?id=".$row['id_livro']."'>Editar</a>" .
     " - <a href='excluir_livro.php?id=".$row['id_livro']."'>Excluir</a><br>";
}
?>

<br>
<a href="../index.php">Voltar</a>
</body>
</html>