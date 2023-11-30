<table>
    <tr>
        <th>Código</th>
        <th>Nome</th>
        <th>Imagem</th>
    </tr>
    <?php foreach ($imagensProdutos as $imagemProduto): ?>
        <tr>
            <td><?php echo $imagemProduto['codigo']; ?></td>
            <td><?php echo $imagemProduto['nome']; ?></td>
            <td><img src="<?php echo $imagemProduto['imagem_path']; ?>" alt="Imagem do Produto"></td>
        </tr>
    <?php endforeach; ?>
</table>
