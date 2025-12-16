<?php
include("../db/conexao.php");

// Pegar o ID do usuário
$id = $_GET['id'] ?? 0;

// Buscar dados do usuário
$result = $conn->query("SELECT * FROM usuario WHERE id_usuario=$id");
$usuario = $result->fetch_assoc();

if ($_POST) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $conn->query("UPDATE usuario SET nome='$nome', email='$email' WHERE id_usuario=$id");
    header("Location: listar_usuarios.php"); // volta para a lista
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
<h2>Editar Usuário</h2>

<form method="post">
    <input type="text" name="nome" value="<?= $usuario['nome'] ?>"><br><br>
    <input type="email" name="email" value="<?= $usuario['email'] ?>"><br><br>
    <button type="submit">Atualizar</button>
</form>

<br>
<a href="listar_usuarios.php">Voltar</a>
</body>
</html>
