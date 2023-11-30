<?php

use Application\core\Controller;
use Application\dao\ProdutoDAO;
use Application\models\Produto;
use Application\dao\Conexao;

class ProdutoController extends Controller
{
    private $produtoDAO;

    public function __construct(Conexao $conexao)
    {
        $this->produtoDAO = new ProdutoDAO($conexao);
    }

    public function index()
    {
        $produtos = $this->produtoDAO->findAll();
        $this->view('produto/index', ['produtos' => $produtos]);
    }

    public function cadastrar()
    {
        $this->view('produto/cadastrar');
    }

    public function salvar()
    {
        $nome = $_POST['nome_produto'];
        $marca = $_POST['marca'];
        $preco = $_POST['preco'];

        $produto = new ProdutoModel($nome, $marca, $preco);

        $this->produtoDAO->salvar($produto);

        $this->view('produto/cadastrar', ["msg" => "Sucesso"]);
    }

    public function iniciarEditar($codigo)
    {
        $produto = $this->produtoDAO->findById($codigo);
        $this->view('produto/editar', ["produto" => $produto]);
    }

    public function atualizar()
    {
        $codigo = filter_input(INPUT_POST, "codigo");
        $nome = filter_input(INPUT_POST, "nome");
        $marca = filter_input(INPUT_POST, "marca");
        $preco = filter_input(INPUT_POST, "preco");

        $produto = new ProdutoModel($nome, $marca, $preco);
        $produto->setCodigo($codigo);

        $produtoAtualizado = $this->produtoDAO->atualizar($produto);

        if ($produtoAtualizado) {
            $msg = "Sucesso";
        } else {
            $msg = "Erro ao editar";
        }

        $this->view("produto/editar", ["msg" => $msg, "produto" => $produtoAtualizado]);
    }

    public function deletar()
    {
        $codigo = filter_input(INPUT_POST, "codigo");

        if ($this->produtoDAO->deletar($codigo)) {
            $msg = "Sucesso";
        } else {
            $msg = "Erro ao deletar";
        }

        $produtos = $this->produtoDAO->findAll();
        $this->view("produto/index", ["msg" => $msg, "produtos" => $produtos]);
    }

    public function listarImagensProdutos()
    {
        $imagensProdutos = $this->produtoDAO->getImagensProdutos();
        $this->view('produto/listarImagensProdutos', ['imagensProdutos' => $imagensProdutos]);
    }
}
