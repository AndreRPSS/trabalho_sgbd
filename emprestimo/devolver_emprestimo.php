<?php
include("../db/conexao.php");

$id = $_GET['id'] ?? 0;

// Pega os dados do empréstimo
$emprestimo = $conn->query("SELECT id_livro, data_devolucao FROM emprestimo WHERE id_emprestimo=$id")->fetch_assoc();
$id_livro = $emprestimo['id_livro'];

// Só devolve se ainda não foi devolvido
if ($emprestimo['data_devolucao'] === NULL) {
    $data = date('Y-m-d');
    $conn->query("UPDATE emprestimo SET data_devolucao='$data' WHERE id_emprestimo=$id");
    $conn->query("UPDATE livro SET quantidade = quantidade + 1 WHERE id_livro=$id_livro");
}

header("Location: listar_emprestimos.php");
?>
