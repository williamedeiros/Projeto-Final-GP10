<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Meu Benefício</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="cadastro.css">

</head>

<body>
    <form action="login.php" method="POST">
        <nav class="navbar navbar-expand-lg bg-success rounded-bottom">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand text-dark"><img src="icone.jpg" class="mr-3" width="50" height="50"
                    alt="">Unifiqu-E
            </a>
        </nav>
        <div class="container">
            <h1 class="text-center mt-5 mb-5">Projeto Meu Benefício</h1>
            <p class="text-justify text-center">Nesse site você poderá ver se está apto a receber benefícios do governo,
                como: Bolsa Família, Seguro Desemprego, Seguro Fraternidade, etc...</p>
            
            
            <div class="col-12 text-center">
                <input type="email" name="usuario" placeholder="E-mail" class="form-control mx-auto mt-5 mb-1 w-50" required>
            </div>
            <div class="col-12 text-center">
                <input type="password" name="senha" placeholder="Senha" class="form-control mx-auto mt-1 w-50" required>
            </div>

            <div class="col-12 text-center">
            <?php
            if(isset($_SESSION['nao_autenticado'])):
                ?>
                <div>
                  <p style="color: red">Usuário ou senha inválidos.</p>
                </div>
                <?php
                endif;
                unset($_SESSION['nao_autenticado']);
                ?>
            </div>

            <div class="col-12">
                <div class="row">
                    <div class="col-6 text-center">
                        <button type="submit" value="Enviar" class="mt-5 mb-2 btn btn-success w-50">Entrar</button>
                    </div>
                    <div class="col-6 text-center">
                        <a href="Cadastrar.php" class="mt-5 mb-2 btn btn-success w-50">Cadastro</a>
                    </div>
                </div>
            </div>

            <footer class="navbar navbar-expand-lg bg-success rounded-bottom fixed-bottom">
            <div class="col-12 text-center">
            <p>Unifiqu-E - 2020</p>
            </div>
            </footer>
        </div>
    </form>
</body>

</html>