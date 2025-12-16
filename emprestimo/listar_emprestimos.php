<?php
include("../db/conexao.php");

// Pega os empréstimos com nome do usuário e título do livro
$sql = "SELECT e.id_emprestimo, u.nome AS usuario, l.titulo AS livro, 
               e.data_emprestimo, e.data_devolucao
        FROM emprestimo e
        JOIN usuario u ON e.id_usuario = u.id_usuario
        JOIN livro l ON e.id_livro = l.id_livro";


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
<h2>Empréstimos</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Usuário</th>
        <th>Livro</th>
        <th>Data do Empréstimo</th>
        <th>Devolução</th>
    </tr>

<?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?= $row['id_emprestimo'] ?></td>
        <td><?= $row['usuario'] ?></td>
        <td><?= $row['livro'] ?></td>
        <td><?= $row['data_emprestimo'] ?></td>
        <td>
            <?php if ($row['data_devolucao'] === NULL) { ?>
                <a href='devolver_emprestimo.php?id=<?= $row['id_emprestimo'] ?>'>Devolver</a>
            <?php } else { ?>
                Devolvido em <?= $row['data_devolucao'] ?>
            <?php } ?>
        </td>
    </tr>
<?php } ?>
</table>


<br>
<a href="../index.php">Voltar</a>
</body>
</html>