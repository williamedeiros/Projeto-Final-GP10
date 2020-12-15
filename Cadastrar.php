<?php
session_start();
ob_start();

$BtnCadUsuario = filter_input(INPUT_POST, 'BtnCadUsuario', FILTER_SANITIZE_STRING);
if ($BtnCadUsuario){
    include_once 'conexao.php';
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    //var_dump($dados);

    //Guarda a senha e criptografa
    //$dados['senha1'] = password_hash($dados['senha1'], PASSWORD_DEFAULT);
    $dados['senha1']=md5($dados['senha1']);


    $result_usuario = "INSERT INTO CadastroPF (nome, email, senha) VALUES (
        '".$dados['nome']."',
        '".$dados['usuario']."',
        '".$dados['senha1']."'
        )";
        $resultado_usuario = mysqli_query($conexao, $result_usuario);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="cadastro.css">
</head>

<body>
    <form action="" method="post">
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
            <h1 class="text-center mt-5">Realize seu cadastro</h1>
            <div class="col-12 mt-5">
                <div class="row">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text titulo">Nome do usuário</span>
                        </div>
                        <input type="text" name="nome" placeholder="Ex.: João da Silva" class="form-control"
                            required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text titulo">E-mail</span>
                        </div>
                        <input type="email" name="usuario" placeholder="joaodasilva@gmail.com" class="form-control"
                            required>
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text titulo">Senha</span>
                        </div>
                        <input type="password" name="senha1" placeholder="Sua senha aqui" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="col-12 text-center">
            <?php
                    if(isset($_SESSION['nao_autenticado'])):
                    ?>
                    <div class="notification is-danger">
                      <p style="color: red">ERRO: Usuário ou senha inválidos.</p>
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['nao_autenticado']);
                    ?>
            </div>
            <div class="col-12 text-center">
                <?php
                    if ($BtnCadUsuario):
                        ?>
                            <div class="notification is-danger">
                            <p style="color: #28a745">Cadastro realizado com sucesso!</p>
                            </div>
                            <?php
                    endif;
                        unset($_SESSION['nao_autenticado']);
                ?>
            </div>



            

            <div class="text-center">
                <input type="submit" name="BtnCadUsuario" class="mt-5 text-center btn btn-success w-25" value="Cadastrar">
                <a href="index.php" class="mt-5 text-center btn btn-success w-25">Fazer login</a>
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