<?php
$base = __DIR__;
include $base .'\..\layout\menu.php'; 
 ?>
<html>
<head>

</head>
<body>
    <h1> Bem-Vindo </h1>
    <hr />
    <p> Minha Página </p>
</body>
</html>

<?php foreach ($produtos as $produto) : ?>
    <div>
        <h3><?= $produto['nome']; ?></h3>
        <p><?= $produto['descricao']; ?></p>
        <p>Preço: <?= $produto['preco']; ?></p>
        <img src="<?= $produto['imagem']; ?>" alt="<?= $produto['nome']; ?>">
    </div>
<?php endforeach; ?>