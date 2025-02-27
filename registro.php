<?php
require_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);


    $sql = "SELECT id FROM usuarios WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        echo 'Este e-mail já está em uso!';
    } else {
    
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':senha', $senha);

        if ($stmt->execute()) {
            
            $usuario_id = $pdo->lastInsertId();

        
            setcookie("usuario_id", $usuario_id, time() + (7 * 24 * 60 * 60), "/");
            setcookie("usuario_nome", $nome, time() + (7 * 24 * 60 * 60), "/");

            header('Location: login.php');
            exit();
        } else {
            echo 'Erro ao cadastrar usuário!';
        }
    }
}
?>

<link rel="stylesheet" href="/assets/css/styles.css">
<form method="POST">
    Nome: <input type="text" name="nome" required><br>
    Email: <input type="email" name="email" required><br>
    Senha: <input type="password" name="senha" required><br>
    <input type="submit" value="Cadastrar">
</form>
