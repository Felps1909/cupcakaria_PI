<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
//use \PDO;


class AuthControllerRegister {
    private $db;
    public function __construct(\PDO $db, PhpRenderer $view)
      {
          $this->db = $db;
          $this->view = $view;
      }
      public function showRegisterForm(Request $request, Response $response, array $args): Response
      {
          return $this->view->render($response, 'register.php');
      }

      public function register(Request $request, Response $response) {
        $data = $request->getParsedBody();
        $nome = $data['nome'];
        $sobrenome = $data['sobrenome'];
        $email = $data['email'];
        $senha = password_hash($data['senha'], PASSWORD_DEFAULT);
    
        $stmt = $this->db->prepare("INSERT INTO usuarios (nome,sobrenome,email, senha) VALUES (:nome, :sobrenome, :email, :senha)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':sobrenome', $sobrenome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
    

        if ($stmt->execute()) {
            $response->getBody()->write("Usuário registrado com sucesso!");
          
        } else {
            $response->getBody()->write("Erro ao registrar usuário.");
        }
        return $this->view->render($response, 'register_success.php');
        
    }


}