<?php

session_start();


if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
</head>
<body>
    <h1>Bem-vindo ao seu perfil!</h1>
    <p>Aqui estão as informações do seu perfil...</p>
    <a href="logout.php">Logout</a>
</body>
</html>
