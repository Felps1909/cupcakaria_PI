<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use \PDO;
use Slim\Views\PhpRenderer;

class AuthControllerHome{
    private $db;
    public function __construct(\PDO $db, PhpRenderer $view)
      {
          $this->db = $db;
          $this->view = $view;
      }
      
      public function home(Request $request, Response $response) {
        if (!isset($_SESSION['user'])) {
            // Redireciona para a página de login se o usuário não estiver autenticado
            return $response->withHeader('Location', '/login')->withStatus(302);
        }
        $stmt = $this->db->prepare('SELECT id_cupcake, nome_cup, preco, foto_cup AS foto_cup FROM cupcake LIMIT 20');
        $stmt->execute();
        $cupcakes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($cupcakes as &$cupcake) {
            if (!empty($cupcake['foto_cup'])) {
                $cupcake['foto_cup'] = 'data:image/svg+xml;base64,' . base64_encode($cupcake['foto_cup']);
            }
        }
             return $this->view->render($response, 'home.php', ['cupcakes' => $cupcakes,'sessao' => $_SESSION]);
    
        // // Renderiza a página inicial
        // return $this->view->render($response, 'home.php', ['cupcakes' => $cupcakes]);
      }
}
