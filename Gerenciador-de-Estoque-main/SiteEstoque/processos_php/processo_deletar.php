<?php 
	session_start();
	include('processo_conectar.php');
	$codigo = trim($_POST['codigo']);

	$selecao = mysqli_query($con, "SELECT * FROM estoque WHERE Codigo LIKE '".$codigo."'");
	$numRegistros = mysqli_num_rows($selecao);
	
	if ($numRegistros != 0){
		while ($produto = mysqli_fetch_object($selecao)){
			$Id = $produto->Id;
		}           
		$_SESSION['deletar'] = 2;
		$restante = mysqli_query($con,"DELETE FROM estoque WHERE Id = $Id;");
		header('Location: ../estoque_geral.php');
		exit;
	}else{
		$_SESSION['deletar'] = 1;
		header('Location: ../estoque_geral.php');
		exit();
	}
?>
