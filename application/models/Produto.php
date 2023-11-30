<?php

class ProdutoModel{
    private $db;
    private $codigo;
    private $nome;
    private $marca;
    private $preco;
    
    private $imagemPath;

    public function __construct(mysqli $db) {
        $this->db = $db;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getCodigo() {
        return $this-> codigo;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function getMarca(){
        return $this->marca;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }

    public function getPreco(){
        return $this->preco;
    }

    public function getProdutos() {
        $result = $this->db->query("SELECT * FROM produtos");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function setImagemPath($imagemPath) {
        $this->imagemPath = $imagemPath;
    }

    public function getImagemPath() {
        return $this->imagemPath;
    }

    
}
?>

<<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sua Página Produto</title>

  <!-- Adicione links para seus estilos CSS -->
  <link rel="stylesheet" href="caminho/para/seu/estilo.css">

  <!-- Adicione links para seus scripts JavaScript -->
  <script src="caminho/para/seu/script.js" defer></script>
</head>
<body>

  <!-- Conteúdo da Página -->

  <!-- Botão para abrir o Modal -->
  <button onclick="openModal()">Excluir Produto</button>

  <!-- Incluindo o Modal -->
  <?php include 'confirm_modal.php'; ?>

</body>
</html>
