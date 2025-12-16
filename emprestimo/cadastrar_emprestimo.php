<?php
include("../db/conexao.php");

// Pega todos os usuários e livros para os selects
$usuarios = $conn->query("SELECT * FROM usuario");
$livros = $conn->query("SELECT * FROM livro");

if ($_POST) {
    $id_usuario = $_POST['usuario'];
    $id_livro = $_POST['livro'];
    $data = date('Y-m-d'); // data de hoje

    // Verifica se o livro tem quantidade disponível
    $livro_info = $conn->query("SELECT quantidade FROM livro WHERE id_livro = $id_livro")->fetch_assoc();

    if ($livro_info['quantidade'] > 0) {
        // Insere o empréstimo
        $conn->query("INSERT INTO emprestimo (id_usuario, id_livro, data_emprestimo)
                      VALUES ($id_usuario, $id_livro, '$data')");
        
        // Diminui a quantidade do livro
        $conn->query("UPDATE livro SET quantidade = quantidade - 1 WHERE id_livro = $id_livro");

        echo "Empréstimo realizado com sucesso!";
    } else {
        echo "Livro indisponível para empréstimo!";
    }
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
<h2>Cadastrar Empréstimo</h2>

<form method="post">
    <label>Usuário:</label><br>
    <select name="usuario">
        <?php while ($u = $usuarios->fetch_assoc()) { ?>
            <option value="<?= $u['id_usuario'] ?>"><?= $u['nome'] ?></option>
        <?php } ?>
    </select><br><br>

    <label>Livro:</label><br>
    <select name="livro">
        <?php while ($l = $livros->fetch_assoc()) { ?>
            <option value="<?= $l['id_livro'] ?>"><?= $l['titulo'] ?> (<?= $l['quantidade'] ?> disponíveis)</option>
        <?php } ?>
    </select><br><br>

    <button type="submit">Emprestar</button>
</form>

<br>
<a href="../index.php">Voltar</a>
</body>
</html>
