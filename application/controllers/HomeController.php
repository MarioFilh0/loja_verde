<?php

use Application\core\Controller;

class HomeController {
    private $produtoModel;

    public function __construct(mysqli $db) {
        $this->produtoModel = new ProdutoModel($db);
    }

    public function index() {
        $produtos = $this->produtoModel->getProdutos();
        include '..home/index.php';
    }
}



?>