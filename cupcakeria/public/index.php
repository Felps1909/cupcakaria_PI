<?php

session_start(); 
require __DIR__ . '/../vendor/autoload.php';

$app = require __DIR__ . '/../src/settings.php';

use App\Controllers\AuthController;
use App\Controllers\AuthControllerRegister;
use App\Controllers\AuthControllerHome;
use App\Controllers\ControllerCupcake;
use App\Controllers\ControllerAcompanharPedido;
use App\Middleware\AuthMiddleware;

// Definir rotas
$app->get('/register', [AuthControllerRegister::class, 'showRegisterForm']);
$app->post('/register', [AuthControllerRegister::class, 'register']);

$app->get('/', [AuthController::class, 'showLoginForm']);
$app->post('/login', [AuthController::class, 'login']);

$app->get('/home',[AuthControllerHome::class,'home']);

$app->get('/cupcake/{id}', [ControllerCupcake::class, 'showCupcakeDetail']);

$app->get('/restricted', AuthMiddleware::class, function ($request, $response) {
    return $response->write("Bem-vindo à área restrita!");
});
$app->get('/acompanhar-pedido',[ControllerAcompanharPedido::class,'acompanharPedido']);



$app->run();
