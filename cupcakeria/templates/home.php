<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/home.css" media="screen" />
    <title>Home</title>
</head>
<body>
    <div class="container">
        <header>
            <img src="/img/logo.svg">
            <nav>
                <ul>
                   <li><a href="">Categorias</a></li>
                   <li><a href="">Pedidos</a></li>
                   <li><a href="">Perfil</a></li>
                </ul>
            </nav>
        </header>
        <main class ="container-card-cup">
            
            <?php foreach($cupcakes as $cupcake): ?>
                <a class="item-card-cup" href="/cupcake/<?php echo $cupcake['id_cupcake']; ?>">
                       <img src="<?= $cupcake['foto_cup'] ?>"/>
                        <div>
                            <p><?= $cupcake['nome_cup']?></p>
                            <p>R$<?= $cupcake['preco']?></p>
                        </div>
                    
                </a>
            <?php endforeach; ?>
         
        </main>
    </div>
</body>
</html>