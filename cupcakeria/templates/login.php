<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/login.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/css/style.css" media="screen" />
    <title>Login</title>
</head>
<body>
    <div class='container-login'>
    <img src="/img/logo.svg">

    <form action="/login" method="POST">
    
        <label for="email">Email:</label>
        <input type="email" name="email" id="email"  required><br><br>

        <label for="password">Senha:</label>
        <input type="password" name="senha" id="senha"  required><br><br>
        
        <div class="container-bnt-login">
            <button type="submit">Entrar</button>
            <a href="/register">Cadastrar</a>
        </div>
    </form>

    </div>

</body>
</html>