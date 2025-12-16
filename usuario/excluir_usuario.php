<?php
include("../db/conexao.php");

$id = $_GET['id'] ?? 0;
$conn->query("DELETE FROM usuario WHERE id_usuario=$id");

header("Location: listar_usuarios.php"); // volta para a lista
?>
