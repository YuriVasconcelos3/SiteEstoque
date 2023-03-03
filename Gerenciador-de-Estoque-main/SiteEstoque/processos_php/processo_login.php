<?php
	session_start();
	include('processo_conectar.php');

	if(empty($_POST['usuario']) || empty($_POST['senha'])) {
		header('Location: ../login.php');
		exit();
	}

	$usuario = mysqli_real_escape_string($con, $_POST['usuario']);
	$senha = mysqli_real_escape_string($con, $_POST['senha']);
	$query = "select usuario from usuarios where usuario = '{$usuario}' and senha = sha1('{$senha}')";
	$result = mysqli_query($con, $query);
	$row = mysqli_num_rows($result);
	
	if($row == 1){
		$_SESSION['usuario'] = $usuario;
		header('Location: ../estoque_geral.php');
		exit();
	}else{
		$_SESSION['nao_autenticado'] = true;
		header('Location: ../login.php');
		exit();
	}
?>



