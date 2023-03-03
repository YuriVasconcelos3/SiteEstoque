<?php
	session_start();
	include('processo_conectar.php');
	$nome = trim($_POST['nome']);
	$codigo = trim($_POST['codigo']);
	$baixo = $_POST['baixo'];
	$categoria = trim($_POST['categoria']);
	$ncodigo = trim($_POST['Ncodigo']);	
	$queryVerificaNovo = mysqli_query($con, "SELECT * FROM estoque WHERE Codigo LIKE '".$ncodigo."'");
	$rowsNovo = mysqli_num_rows($queryVerificaNovo);

	if(($nome == "") && ($categoria == "") && ($ncodigo == "") && ($baixo == "")){
		$_SESSION['atualizar'] = 3;
		header('Location: ../atualizar.php');
		exit();
	}else{
	if ($nome != ""){
		$nome = "Nome = '".$nome."',";
	}
	if ($categoria != ""){
		$categoria = "Categoria = '".$categoria."',";
	}
	if ($ncodigo != ""){
		$ncodigo = "Codigo = '".$ncodigo."',";
	}
	if ($baixo != ""){
		$baixo = "Baixo = '".$baixo."',";
	}
		$att = $nome.$categoria.$ncodigo.$baixo;
	}

	if($rowsNovo != 0){
		$_SESSION['atualizar'] = 4;
		header('Location: ../estoque_geral.php');
		exit();        
	}else{
		$queryVerifica = mysqli_query($con, "SELECT * FROM estoque WHERE Codigo LIKE '".$codigo."'");
		$rows = mysqli_num_rows($queryVerifica);
		if($rows == 0){
			$_SESSION['atualizar'] = 1;
			header('Location: ../estoque_geral.php');
			exit();
		}else{
			$_SESSION['atualizar'] = 2;
			while($produto = mysqli_fetch_object($queryVerifica)){
				$Id = $produto->Id;
			}
			$query = mysqli_query($con, "UPDATE estoque SET ".(substr($att,0,-1))."WHERE Id = ".$Id);
			header('Location: ../estoque_geral.php');
			exit();
		}
	}

	mysqli_close($con);
?>




