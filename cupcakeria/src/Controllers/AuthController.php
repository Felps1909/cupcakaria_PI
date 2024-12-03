<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use \PDO;
use Slim\Views\PhpRenderer;

class AuthController {
    private $db;

      // Injetar o banco de dados no construtor
      public function __construct(\PDO $db, PhpRenderer $view)
      {
          $this->db = $db;
          $this->view = $view;
      }  
      public function showLoginForm(Request $request, Response $response, array $args): Response
      {
          return $this->view->render($response, 'login.php');
      }  

    public function login(Request $request, Response $response) {
        $data = $request->getParsedBody();
        $email = $data['email'];
        $senha = $data['senha'];
        
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

       //Validação da senha do usuário para login
        if ($user && password_verify($senha, $user['senha'])) {

            $_SESSION['user'] = [
                'id' => $user['id_usuario'],
                'nome' => $user['nome']
            ];
            var_dump($_SESSION);
            return $response->withHeader('Location', '/home')->withStatus(302);
           //return $this->view->render($response, 'home.php');
        
        } else {
            $response->getBody()->write("Credenciais incorretas.");
            
        }

        return $response;
    }
}
