<html>
<head>
    <meta charset="UTF-8">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="../style.css">
</head>
</html>

<?php
include("../db/conexao.php");

$id = $_GET['id'] ?? 0;
$result = $conn->query("SELECT * FROM livro WHERE id_livro=$id");
$livro = $result->fetch_assoc();

if ($_POST) {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $quantidade = $_POST['quantidade'];

    $conn->query("UPDATE livro SET titulo='$titulo', autor='$autor', quantidade=$quantidade WHERE id_livro=$id");
    header("Location: listar_livros.php");
}
?>

<form method="post">
    <input type="text" name="titulo" value="<?= $livro['titulo'] ?>"><br><br>
    <input type="text" name="autor" value="<?= $livro['autor'] ?>"><br><br>
    <input type="number" name="quantidade" value="<?= $livro['quantidade'] ?>"><br><br>
    <button type="submit">Atualizar</button>
</form>

<br>
<a href="listar_livros.php">Voltar</a>
