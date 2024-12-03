<?php $cupcakesDetails['foto'] = 'data:image/svg+xml;base64,' . base64_encode($cupcakesDetails['foto_cup']); ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/cupcake-details.css" media="screen">

    <title>Cupcake</title>
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
        <main class ="container-main">

            <div class="cupkinfo">
                <p><?= $cupcakesDetails['nome_cup']?></p> 
                <p>R$<?= $cupcakesDetails['preco']?></p>  
            </div>
            <div  id="cupinfodesc" >
                <img src="<?= $cupcakesDetails['foto'] ?>"/>
                <p><?= $cupcakesDetails['descricao_cup']?></p>
               
            </div>
            <div class='cupkinfo'>
                
                <div id="container-quantity">
                    <button class="btn" id="decrease">-</button>
                    <input type="number" id="quantity" value="0" min="0">
                    <button class="btn" id="increase">+</button>
                </div>
                <div id="container-carrinho">
                    <img src="/img/car-icon.svg">
                    <a>Adicionar</a>
                </div>
            </div>    

    
            <div>
                
               
            </div>      
        
        </main>
    

    </div>
    <script src="/assets/js/main.js"></script>
</body>
</html>
