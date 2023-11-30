<?php
namespace Application\dao;

use Application\models\Produto;
use ProdutoModel;

class ProdutoDAO{
    private $conexao;

    public function __construct(Conexao $conexao) {
        $this->conexao = $conexao;
    }

    // Create (C)
    public function salvar($produto) { 
        $nome = $produto->getNome();
        $marca = $produto->getMarca();
        $preco = $produto->getPreco();

        $conn = $this->conexao->getConexao();
        $stmt = $conn->prepare("INSERT INTO produtos (nome, marca, preco) VALUES (?, ?, ?)");

        $stmt->bind_param("sss", $nome, $marca, $preco);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error: " . $stmt->error;
            return false;
        }
    }

    // Retrieve All (R)
    public function findAll() {
        $conn = $this->conexao->getConexao();
        $stmt = $conn->prepare("SELECT codigo, nome, marca, preco FROM produtos");
        $stmt->execute();

        $result = $stmt->get_result();
        $produtos = [];

        while ($row = $result->fetch_assoc()) {
            $produto = new ProdutoModel($row["nome"], $row["marca"], $row["preco"]);
            $produto->setCodigo($row["codigo"]);
            array_push($produtos, $produto);
        }

        return $produtos;
    }

    // Retrieve by ID (R)
    public function findById($id) {
        $conn = $this->conexao->getConexao();
        $stmt = $conn->prepare("SELECT codigo, nome, marca, preco FROM produtos WHERE codigo = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $produto = new ProdutoModel($row["nome"], $row["marca"], $row["preco"]);
        $produto->setCodigo($row["codigo"]);

        return $produto;
    }

    // Update (U)
    public function atualizar($produto) {
        $codigo = $produto->getCodigo();
        $nome = $produto->getNome();
        $marca = $produto->getMarca();
        $preco = $produto->getPreco();

        $conn = $this->conexao->getConexao();
        $stmt = $conn->prepare("UPDATE produtos SET nome = ?, marca = ?, preco = ? WHERE codigo = ?");

        $stmt->bind_param("sssi", $nome, $marca, $preco, $codigo);

        if ($stmt->execute()) {
            return $this->findById($codigo);
        } else {
            echo "Error: " . $stmt->error;
            return $produto;
        }
    }

    // Delete (D)
    public function deletar($id) {
        $conn = $this->conexao->getConexao();
        $stmt = $conn->prepare("DELETE FROM produtos WHERE codigo = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error: " . $stmt->error;
            return false;
        }
    }

    public function getImagensProdutos() {
        $conn = $this->conexao->getConexao();
        $stmt = $conn->prepare("SELECT codigo, nome, imagem_path FROM produtos WHERE imagem_path IS NOT NULL");
        $stmt->execute();

        $result = $stmt->get_result();
        $imagensProdutos = [];

        while ($row = $result->fetch_assoc()) {
            $imagemProduto = [
                'codigo' => $row['codigo'],
                'nome' => $row['nome'],
                'imagem_path' => $row['imagem_path'],
            ];
            array_push($imagensProdutos, $imagemProduto);
        }

        return $imagensProdutos;
    }
}
?>
