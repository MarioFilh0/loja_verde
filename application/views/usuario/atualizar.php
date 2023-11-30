<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Perfil</title>
</head>
<body>
    <!-- Formulário de Atualização de Perfil -->
    <form action="index.php" method="post">
        <!-- Campos do formulário -->
        <input type="hidden" name="action" value="update_profile">
        <input type="text" name="newUsername" placeholder="Novo Nome de Usuário">
        <input type="text" name="newEmail" placeholder="Novo E-mail">
        <button type="submit">Atualizar Perfil</button>
    </form>
</body>
</html>
