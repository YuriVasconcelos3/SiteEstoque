<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="estilos_css/estilo_login.css">
	<link rel="stylesheet" type="text/css" href="estilos_css/mobile_login.css">
	<link rel="shortcut icon" href="imagens/favicon.ico">
</head>
<body>
	<div class ="fundo">
		<section class="fundo-login">
			<h1 class="titulo">Acesso</h1>
			<?php
				if(isset($_SESSION['nao_autenticado'])):
			?>
			<div class="erro">
				<p>ERRO: Usuário ou senha inválidos.</p>
			</div>
			<?php
				endif;
				unset($_SESSION['nao_autenticado']);
			?>
			<div>
				<form name="login" method="POST" action="processos_php/processo_login.php" class="formulario">
					<label for="user" class="legenda">Login:</label><br>
					<input type="text" name="usuario" maxlength="40" required class="campo"><br>
					<p class="espaco"></p>
					<label for="user" class="legenda">Senha:</label><br>
					<input type="password" name="senha" maxlength="40" required class="campo"><br>
					<p class="espaco"></p>
					<input type="submit" name="botao" value="Entrar" class="botao">
				</form>
			</div>
		</section>
	</div>
</body>
</html>



