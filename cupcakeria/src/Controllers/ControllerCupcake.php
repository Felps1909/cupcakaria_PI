<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use \PDO;
use Slim\Views\PhpRenderer;

class ControllerCupcake
{
    private $db;

    public function __construct(\PDO $db, PhpRenderer $view)
      {
          $this->db = $db;
          $this->view = $view;
      }

    public function showCupcakeDetail(Request $request, Response $response, array $args): Response
    {
        $id = $args['id']; // Pega o ID do cupcake da URL

        try {
            // Busca os dados do cupcake no banco
            $stmt = $this->db->prepare("SELECT id_cupcake, nome_cup, preco, descricao_cup ,foto_cup AS foto_cup  FROM cupcake  WHERE id_cupcake = :id");
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();
            $cupcakeDetail = $stmt->fetch();

            if (!$cupcakeDetail) {
                return $response->withStatus(404)->write('Cupcake não encontrado');
            }

            
                 return $this->view->render($response, 'cupcakes-details.php', ['cupcakesDetails' => $cupcakeDetail    ]);
        

        } catch (\Exception $e) {
            // Trate erros do banco de dados
            $response->getBody()->write("Erro ao buscar cupcake: " . $e->getMessage());
            return $response->withStatus(500);
        }

        return $response;
    }
}
