<?php
require_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        
        setcookie("usuario_id", $usuario['id'], time() + (7 * 24 * 60 * 60), "/");
        setcookie("usuario_nome", $usuario['nome'], time() + (7 * 24 * 60 * 60), "/");

        header('Location: index.php');
        exit();
    } else {
        echo 'Email ou senha incorretos!';
    }
}
?>

<link rel="stylesheet" href="/assets/css/styles.css">
<form method="POST">
    Email: <input type="email" name="email" required><br>
    Senha: <input type="password" name="senha" required><br>
    <input type="submit" value="Entrar">
</form>
