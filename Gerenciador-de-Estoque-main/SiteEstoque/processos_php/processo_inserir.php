<?php
	session_start();
	include('processo_conectar.php');
	$nome = trim($_POST['nome']);
	$baixo = $_POST['baixo'];
	$codigo = trim($_POST['codigo']);
	$quantidade = $_POST['quantidade'];

	if(trim($_POST['categoria']) != ""){
		$categoria = "'".$_POST['categoria']."'";
	}else{
		$categoria = 'default';
	}

	if($_POST['baixo'] == "") {
		$baixo = 'default';
	}

	$queryVerifica = mysqli_query($con, "SELECT Codigo FROM estoque WHERE Codigo LIKE '".$codigo."'");
	$rows = mysqli_num_rows($queryVerifica);
	
	if($rows == 1){
		$_SESSION['inserir'] = 1;
		header('Location: ../estoque_geral.php');
		exit();
	}else{
		$_SESSION['inserir'] = 2;
		$query = mysqli_query($con, "INSERT INTO estoque (Nome, Codigo, Categoria, Quantidade, Baixo) VALUES ('{$nome}', '{$codigo}', {$categoria}, '{$quantidade}', {$baixo})");
		header('Location: ../estoque_geral.php');
		exit();
	}
	
	mysqli_close($con);
?>




