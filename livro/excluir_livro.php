<?php
include("../db/conexao.php");

$id = $_GET['id'] ?? 0;
$conn->query("DELETE FROM livro WHERE id_livro=$id");

header("Location: listar_livros.php");
?>
