<?php

use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

// Carregar o container configurado
$container = require __DIR__ . '/container.php';

// Configurar o Slim para usar o container
AppFactory::setContainer($container);

// Criar a aplicação Slim
$app = AppFactory::create();




return $app;
