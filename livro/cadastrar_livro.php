<?php
include("../db/conexao.php");

if ($_POST) {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $quantidade = $_POST['quantidade'];

    $sql = "INSERT INTO livro (titulo, autor, quantidade)
            VALUES ('$titulo', '$autor', $quantidade)";

    $conn->query($sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
<h2>Cadastrar Livro</h2>

<form method="post">
    <input type="text" name="titulo" placeholder="Título"><br><br>
    <input type="text" name="autor" placeholder="Autor"><br><br>
    <input type="number" name="quantidade" placeholder="Quantidade"><br><br>
    <button type="submit">Salvar</button>
</form>

<br>
<a href="../index.php">Voltar</a>
</body>
</html>
