<?php
include("../db/conexao.php");

if ($_POST) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = "INSERT INTO usuario (nome, email)
            VALUES ('$nome', '$email')";

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
<h2>Cadastrar Usuário</h2>

<form method="post">
    <input type="text" name="nome" placeholder="Nome"><br><br>
    <input type="email" name="email" placeholder="Email"><br><br>
    <button type="submit">Salvar</button>
</form>

<br>
<a href="../index.php">Voltar</a>
</body>
</html>
