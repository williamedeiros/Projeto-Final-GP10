<?php
include('verifica_login.php');
include_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Principal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="cadastro.css">

        <style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 25%;
}
#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}
#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers th {
  padding-top: 5px;
  padding-bottom: 5px;
  text-align: center;
  background-color: #006400;
  color: white;
}
</style>
</head>

<body>
    <form action="/menuPrincipal/" method="get">
        <nav class="navbar navbar-expand-lg bg-success rounded-bottom">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand text-dark"><img src="icone.jpg" class="mr-3" width="50" height="50"
                    alt="">Unifiqu-E</a>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mr-auto">

                </div>

                <span class="navbar-text">
                    <h5>Olá, <?php echo $_SESSION['usuario'];?></h5><br>
                </span>

            <div style: style="padding-left: 40px;">
                <span class="navbar-text" >
                    <a href="logout.php" class="text-dark">Sair</a>
                </span>
                </div>
            </div>
        </nav>
        </form>

    <div class="col-12 text-center">
        <img src="imagem2.gif" class="mr-3" alt="" width=350 height=200>

        <form method="POST" action="">

            <input type="text" name="nome" placeholder="Digite seu CPF" required><br>
            <input name="SendPesqUser" type="submit" class="mt-5 text-center btn btn-success w-25" value="Pesquisar">

        </form><br>
    </div>
    
    <table id="customers" align="center">

        <tr>
            <th>Informações</th>
        </tr>


        <tr><td>
    <?php
    $SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);

    if($SendPesqUser){
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $result_usuario = "SELECT * FROM Pessoasfisicas WHERE numcpf LIKE '%$nome%'";
        $resultado_usuario = mysqli_query($conexao, $result_usuario);
        while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){

            echo "Nome: " . $row_usuario['nome'] . "<br><hr>";
            echo "Sexo: " . $row_usuario['sexo'] . "<br><hr>";
            echo "Estado Civil: " . $row_usuario['estadocivil'] . "<br><hr>";
            echo "Naturalidade: " . $row_usuario['naturalidade'] . "<br><hr>";
            echo "Número RG: " . $row_usuario['numrg'] . "<br><hr>";
            echo "Número CPF: " . $row_usuario['numcpf'] . "<br><hr>";
            echo "Atestado de Obito: " . $row_usuario['atestadoobito'] . "<br><hr>";
            echo "Função exercida: " . $row_usuario['funcaoexercida'] . "<br><hr>";
            echo "Salário: " . $row_usuario['salario'] . "<br><hr>";
            echo "Impostos: " . $row_usuario['impostos'] . "<br><hr>";
            echo "Ficha Criminal: " . $row_usuario['fichacriminal'] . "<br><hr>";
            echo "Passa Porte: " . $row_usuario['passapote'] . "<br><hr>";
            echo "Financiamentos: " . $row_usuario['financiamentos'] . "<br><hr>";
        }
    }
    ?>
    </td></tr>
    </table>
    </div>
    <br><br><br><br><br>


            <footer class="navbar navbar-expand-lg bg-success rounded-bottom fixed-bottom">
            <div class="col-12 text-center">
            <p>Unifiqu-E - 2020</p>
            </div>
            </footer>

</body>

</html>