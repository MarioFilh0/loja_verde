<?php
class AuthController {
    private $userModel;

    public function __construct(mysqli $db) {
        $this->userModel = new UserModel($db);
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'register') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $userId = $this->userModel->insertUser($username, $email, $password);

        }
        include 'views/usuario/cadastrar.php';
    }

        public function DeletarUsuario($userId){
            $this->userModel->DeletarUsuario($userId);
        }

        public function AtualizarUsuario($userId, $newUsername, $newEmail) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update_profile') {
                $this->userModel->AlterarUsuario($userId, $newUsername, $newEmail);
            }
            include 'views/usuario/atualizar.php';
        }

        public function login($email, $password) {
            $user = $this->userModel->getUserByEmail($email);
    
            if ($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];

                header('Location: perfil.php');
                exit();
            } else {

                echo "Credenciais inválidas. Por favor, tente novamente.";
            }
        }
    
        public function logout() {
            session_start();
            session_destroy();
    

            header('Location: login.php');
            exit();
        }

}
    

?>
