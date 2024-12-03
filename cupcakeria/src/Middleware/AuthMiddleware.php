<?php
namespace App\Middleware;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AuthMiddleware {
    public function __invoke(Request $request, Response $response, callable $next) {
        if (!isset($_SESSION['user_id'])) {
            $response->getBody()->write("Acesso negado. Faça login.");
            return $response->withStatus(403);
        }
        return $next($request, $response);
    }
}
