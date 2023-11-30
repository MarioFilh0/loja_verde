<?php

session_start();


if (isset($_SESSION['user_id'])) {
    header('Location: perfil.php');
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recuperar dados do formulário
    $email = $_POST['email'];
    $password = $_POST['password'];

  
    $authController = new AuthController($mysqli); 
    $authController->login($email, $password);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <!-- Formulário de login -->
    <form action="login.php" method="post">
        <!-- Campos do formulário -->
        <input type="text" name="email" placeholder="E-mail">
        <input type="password" name="password" placeholder="Senha">
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
