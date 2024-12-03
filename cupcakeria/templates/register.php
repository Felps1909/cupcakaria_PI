<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/cadastro.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/css/style.css" media="screen" />
    <title>Cadastro</title>
</head>
<body>
    <div class='container-register'>
        <img src="/img/logo.svg">

        <form action="/register" method="POST">
            <label for="username">Nome de Usuário</label>
            <input type="text" name="nome" id="nome" required><br><br>

            <label for="sobrenome">Sobrenome</label>
            <input type="text" name="sobrenome" id="sobrenome" required><br><br>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" required><br><br>

            <label for="password">Senha</label>
            <input type="password" name="senha" id="senha" required><br><br>
            <div>
                <button type="submit">Cadastrar</button>
            </div>
        </form>

    </div>
</body>
</html>
