<?php
session_start();
include('conexao.php');

if(empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}

//Busca informacao da Form
$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha=md5($_POST['senha']);

$query="SELECT id, email FROM CadastroPF WHERE email LIKE '".$usuario."' AND senha LIKE '".$senha."';";


if ($result=mysqli_query($conexao,$query)){
	While($row=mysqli_fetch_row($result)){
		$id=$row[0];
		$email=$row[1];

		echo $row[0];
		echo $row[1];
	}
	mysqli_free_result($result);

	if(isset($id)){
		$_SESSION['usuario'] = $usuario;
		header('Location: painel.php');
		exit();
	} else {
		$_SESSION['nao_autenticado'] = true;
		header('Location: index.php');
		exit();
	}
}