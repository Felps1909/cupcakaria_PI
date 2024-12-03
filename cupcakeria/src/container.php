<?php

use DI\Container;
use Dotenv\Dotenv;
// use \PDO;
use Slim\Views\PhpRenderer;
use App\Controllers\AuthController;
use App\Controllers\AuthControllerRegister;
use App\Controllers\AuthControllerHome;
use App\Controllers\ControllerCupcake;

require __DIR__ . '/../vendor/autoload.php';

// Carregar variáveis de ambiente
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Criar o container de dependências
$container = new Container();

// Configurar o serviço de banco de dados no container
$container->set('db', function() {
    $host = $_ENV['DB_HOST'];
    $dbname = $_ENV['DB_NAME'];
    $username = $_ENV['DB_USER'];
    $password = $_ENV['DB_PASS'];

    // Instanciar PDO diretamente
    $pdo = new \PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
});

// Configurar o PhpRenderer para renderizar as views
$container->set('view', function() {
    return new PhpRenderer(__DIR__ . '/../templates');
});

// Registrar o AuthController com injeção de dependência
$container->set(AuthController::class, function($container) {
    return new AuthController(
        $container->get('db'),  // Fornece o PDO do banco de dados
        $container->get('view') // Fornece o PhpRenderer para as views
    );
});
$container->set(AuthControllerRegister::class, function($container) {
    return new AuthControllerRegister(
        $container->get('db'),  
        $container->get('view') 
    );
});
$container->set(AuthControllerHome::class, function($container) {
    return new AuthControllerHome(
        $container->get('db'),  
        $container->get('view') 
    );
});
$container->set(ControllerCupcake::class , function($container){
    return new ControllerCupcake(
        $container->get('db'), 
        $container->get('view')
    );
});
$container->set(ControllerAcompanharPedido::class , function($container){
    return new ControllerAcompanharPedido(
        $container->get('db'), 
        $container->get('view')
    );
});

return $container;
