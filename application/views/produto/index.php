<?php
$base = __DIR__;
include $base . '\..\layout\menu.php';

?>
<html>

<head>

</head>

<body>
    <h1> Listar Produtos </h1>
    <hr />
<<<<<<< HEAD
    <?php if( isset($data['msg'])){ ?> 
<div class="alert alert-danger" role="alert"> Sucesso </div>
    <?php } ?>
    <p> <a href="/produto/cadastrar"> Adicionar Produto </a> </p>
    <table class="table">
=======
    <p> <a href="/produto/cadastrarProduto"> Adicionar Produto  </a> </p>
    <table>
>>>>>>> 18da2fcaa9b7225d7beaabcc4e727488c1083107
        <thead>
            <th>Código</th>
            <th>Nome</th>
            <th>Marca</th>
            <th>Preço</th>
<<<<<<< HEAD
            <th>Ações</th>
        </thead>
        <tbody>
            <?php foreach ($data['produtos'] as $produto) { ?>
                <tr>
                    <td><?= $produto->getCodigo() ?> </td>
                    <td><?= $produto->getNome() ?> </td>
                    <td><?= $produto->getMarca() ?> </td>
                    <td><?= $produto->getPreco() ?> </td>
                    <td>
<a href="/produto/iniciarEditar/<?= $produto->getCodigo() ?>">
    EDITAR
    </a>
    <span><form action="/produto/deletar" method="post"> 
<input type="hidden" value="<?= $produto->getCodigo() ?>" name="codigo" />
        <input type="submit" value="X" />
     </form> 
    </span>
 </td>
        </tr>
            <?php } ?>
        </tbody>
    </table>
=======
        </thead>
        <tbody>
            <?php foreach ($data["produtos"] as $produto) {?>
                <tr>
                    <td><?=$produto->getCodigo() ?></td>
                    <td><?=$produto->getNome()?></td>
                    <td><?=$produto->getMarca()?></td>
                    <td><?=$produto->getPreco()?></td>
                    <td><i class="bi bi-archive"></i></td>
                    <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
  <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
</svg></td>
                </tr>
                <?php } ?>
        </tbody>
    </table>
</body>
</html>
>>>>>>> 18da2fcaa9b7225d7beaabcc4e727488c1083107



</body>

</html>