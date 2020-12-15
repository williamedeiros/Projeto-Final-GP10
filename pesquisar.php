<?php
session_start();
include_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Unifiqu-E</title>		
	</head>

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
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>

	<body>
	<img src="imagem2.gif" class="mr-3" alt="" width=250 height=100>
	
		<form method="POST" action="">
			<label>CPF: </label>
			<input type="text" name="nome" placeholder="Digite seu CPF"><br><br>
			<input name="SendPesqUser" type="submit" value="Pesquisar">
		</form><br>
		
		<table id="customers">
	<tr>
		<th>Informações</th>
	</tr>
	<tr>
	<td>
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
	</body>
</html>