<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
//use \PDO;


class ControllerAcompanharPedido {
    private $db;
    public function __construct(\PDO $db, PhpRenderer $view)
      {
          $this->db = $db;
          $this->view = $view;
      }
      public function acompanharPedido(Request $request, Response $response, array $args): Response
      {
          return $this->view->render($response, 'acompanhar-pedido.php');
      }



}