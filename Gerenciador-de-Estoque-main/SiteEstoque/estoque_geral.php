<?php
	session_start();
	include('processos_php/processo_autenticar.php');
	include('processos_php/processo_conectar.php');
	$_SESSION['etq']=1;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Estoque Geral</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="estilos_css/estilo_geral+baixo.css">
	<link rel="stylesheet" type="text/css" href="estilos_css/mobile_geral+baixo.css">
	<link rel="shortcut icon" href="imagens/favicon.ico">
	<script type="text/javascript" src="javascript/sorttable.js"></script>
	<script type="text/javascript">
		function abrirModal() {
			document.getElementById('modal').style.top = "0";
		}
		function abrirModal2() {
			document.getElementById('modal2').style.top = "0";
		}
		function abrirModal3() {
			document.getElementById('modal3').style.top = "0";
		}
		function abrirModal4() {
			document.getElementById('modal4').style.top = "0";
		}
		function abrirModal5() {
			document.getElementById('modal5').style.top = "0";
		}


		function fecharModal() {
			document.getElementById('modal').style.top = "-100%";
		}	
		function fecharModal2() {
			document.getElementById('modal2').style.top = "-100%";
		}
		function fecharModal3() {
			document.getElementById('modal3').style.top = "-100%";
		}
		function fecharModal4() {
			document.getElementById('modal4').style.top = "-100%";
		}
		function fecharModal5() {
			document.getElementById('modal5').style.top = "-100%";
		}
	</script>
</head>
<body>
	<div class="fundo">
		<div class="areamenu">
			<a href="processos_php/processo_finalizar.php" class="fechar">Fechar Sistema</a>
		</div>
		<div class="fundo-branco">
			<div class="titulo">
				<h2 class="titulo">Estoque Geral</h2> 
			</div>
			<div class="pesquisas">
				<div class="campo">
					<label for="nome" class="pesquisa">Nome:</label>
					<form name="frmBuscaNome" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?a=buscarNome" >
						<input type="text" name="palavra" maxlength="40" class="caixa">
						<input type="submit" value="Buscar" class="buscar">
					</form>
				</div>
				<div class="campo">
					<label for="codigo" class="pesquisa">Código:</label>
					<form name="frmBuscaCodigo" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?a=buscarCodigo" >
						<input type="text" name="palavra" maxlength="25" class="caixa">
						<input type="submit" value="Buscar" class="buscar">
					</form>      
				</div>
				<div class="campo">
					<label for="categoria" class="pesquisa">Categoria:</label>
					<form name="frmBuscaCategoria" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?a=buscarCategoria" >
						<input type="text" name="palavra" maxlength="40" class="caixa">
						<input type="submit" value="Buscar" class="buscar">
					</form>
				</div>
			</div>
			<p class="espaco"></p>
			<div class="opcoes">
				<a href="estoque_geral.php"><img src="imagens/icone_atualizar.png" class="opcao"></a>

				<a onclick="abrirModal3()"><img src="imagens/icone_adicionar.png" class="opcao"></a>
				<div class="bg-modal3" id="modal3">
					<div class="close">
						<button class="close" onclick="fecharModal3()">&times;</button>
					</div>

					<?php
						if(isset($_SESSION['estoque'])):
						switch ($_SESSION['estoque']):
						case 1:
					?>
					<div class="erro">
						<p>ERRO: O código informado não foi encontrado!</p>
					</div>
					<?php
						break;
						case 2:
					?>
					<?php
						break;
						case 3:
					?>
					<div class="erro">
						<p>ERRO: A quantia informada ultrapassa a suportada pelo sistema!</p>
					</div>
					<?php
						break;
						endswitch;
						endif;
						unset($_SESSION['estoque']);
					?>
					<form name="venda" action="processos_php/processo_adicionar.php" method="POST">
						
						<label for="codigo">Código do Produto:</label><br>
						<input type="text" class="entrada" min="0" required maxlength="25" name="codigo"><br>

						<label for="quantidade">Quantidade:</label><br>
						<input type="number" class="entrada" min="0" required max="4294967295" name="quantidade"><br>

						<div class="botoeslado">
							<?php
								if(isset($_SESSION['etq'])){
									if ($_SESSION['etq']==1){
										echo "<a class='voltar' href='estoque_geral.php'>"."Voltar"."</a>";
									}
									if ($_SESSION['etq']==2){
										echo "<a class='voltar' href='estoque_baixo.php'>"."Voltar"."</a>";
									}
									echo "<input type='submit' name='confirmar' value='Confirmar' class='botao1'>";
								}else{
									echo "<input type='submit' name='confirmar' value='Confirmar' class='botao2'>";
								}
							?>
						</div>
					</form>
				</div>

				<a onclick="abrirModal4()"><img src="imagens/icone_retirar.png" class="opcao"></a>
				<div class="bg-modal4" id="modal4">
					<div class="close">
						<button class="close" onclick="fecharModal4()">&times;</button>
					</div>
					
					<?php
						if(isset($_SESSION['venda'])):
						switch ($_SESSION['venda']):
						case 1:
					?>
					<div class="erro">
						<p>ERRO: O código informado não foi encontrado!</p>
					</div>
					<?php
						break;
						case 2:
					?>
					<div class="sucesso">
						<p>Ação realizada com sucesso!</p>
					</div>
					<?php
						break;
						case 3:
					?>
					<div class="erro">
						<p>ERRO: A quantidade informada ultrapassa a quantidade em estoque!</p>
					</div>
					<?php
						break;
						endswitch;
						endif;
						unset($_SESSION['venda']);
					?>
					<form name="venda" action="processos_php/processo_venda.php" method="POST">
						<label for="codigo">Código do Produto:</label><br>
						<input type="text" class="entrada" min="0" maxlength="25" required name="codigo"><br>
						
						<label for="quantidade">Quantidade:</label><br>
						<input type="number" class="entrada" min="0" max="4294967295" required name="quantidade"><br>

						<div class="botoeslado">
							<?php
								if(isset($_SESSION['etq'])){
									if ($_SESSION['etq']==1){
										echo "<a class='voltar' href='estoque_geral.php'>"."Voltar"."</a>";
									}
									if ($_SESSION['etq']==2){
										echo "<a class='voltar' href='estoque_baixo.php'>"."Voltar"."</a>";
									}
									echo "<input type='submit' name='confirmar' value='Confirmar' class='botao1'>";
								}else{
								echo "<input type='submit' name='confirmar' value='Confirmar' class='botao2'>";
								}
							?>
						</div>
					</form>
				</div>
				
				
				<a onclick="abrirModal5()"><img src="imagens/icone_deletar.png" class="opcao"></a>
				<div class="bg-modal5" id="modal5">
					<div class="close">
						<button class="close" onclick="fecharModal5()">&times;</button>
					</div>
					<?php
						if(isset($_SESSION['deletar'])):
						switch ($_SESSION['deletar']):
						case 1:
					?>
					<div class="erro">
						<p>ERRO: O código informado não foi encontrado!</p>
					</div>
					<?php
						break;
						case 2:
					?>
					<div class="sucesso">
						<p>Ação realizada com sucesso!</p>
					</div>
					<?php
						break;
						endswitch;
						endif;
						unset($_SESSION['deletar']);
					?>
					<form name="venda" action="processos_php/processo_deletar.php" method="POST">
						<label for="codigo">Código do Produto:</label><br>
						<input type="text" class="entrada" min="0" maxlength="25" required name="codigo"><br>
						<div class="botoeslado">
							<?php
							if(isset($_SESSION['etq'])){
								if ($_SESSION['etq']==1){
									echo "<a class='voltar' href='estoque_geral.php'>"."Voltar"."</a>";
								}

								echo "<input type='submit' name='confirmar' value='Excluir' class='botao1'>";
								}else{
									echo "<input type='submit' name='confirmar' value='Excluir' class='botao2'>";
								}
							?>
						</div>
					</form>
				</div>
			</div>
			
			<div class="dados">
				<?php 
					$tabela = mysqli_query($con, "SELECT * FROM estoque ORDER BY Categoria, Nome");
					function buscar($conexao,$busca){
   						if($_POST['palavra'] != ""){
							$palavra = trim($_POST['palavra']);
							if(($busca == "Nome") || ($busca == "Categoria")){
								$mensagem = strtolower($busca);
								$palavra = "'%".$palavra."%'";
							}else{
								$palavra = "'".$palavra."'";
								$mensagem = "código";
							}
							$sql = mysqli_query($conexao, "SELECT * FROM estoque WHERE ".$busca." LIKE ".$palavra);
							$numRegistros = mysqli_num_rows($sql);
							if ($numRegistros != 0){
								echo "<div class='resultado'>";
								while ($produto = mysqli_fetch_object($sql)) {
									echo "<div class='fundo-busca'>"."<div class='bloco'>Nome: <br>".$produto->Nome."</div>"."<div class='bloco'>Categoria: <br>".$produto->Categoria."</div>"."<div class='bloco'>Código: <br>".$produto->Codigo."</div>"."<div class='bloco'>Quantidade: <br>".$produto->Quantidade."</div>"."</div>";
								}
								echo "</div>";
							}else{
								echo "<div class='nao-encontrado'>Nenhum produto foi encontrado com ".$mensagem.": ".(trim($_POST['palavra']))."</div>";
							}
						}
					}
					@$a = $_GET['a'];
					if($a == "buscarNome"){
						buscar($con,"Nome");
					}

					if($a == "buscarCodigo"){
						buscar($con,"Codigo");
					}

					if($a == "buscarCategoria"){
						buscar($con,"Categoria");
					}
				?>
				<table cellpadding="0" cellspacing="0" border="1" class="sortable" bordercolor=#818181>
					<tr>
						<th class="tituloTabela">Código do Produto</th>
						<th class="tituloTabela">Nome do Produto</th>
						<th class="tituloTabela">Categoria</th>
						<th class="tituloTabela">Quantidade</th>
					</tr>
					<?php 
						while($tab = mysqli_fetch_object($tabela)){
							echo "<tr rowspan='2'><td>".$tab->Codigo."</td><td>".$tab->Nome."</td><td>".$tab->Categoria."</td><td>".$tab->Quantidade."</td></tr>";
						}
					?>
				</table>
			</div>
		</div>
		
		<div class="alinhamento">
			<button type="button" class="button" onclick="abrirModal()">Inserir Produto</button>
			<div class="bg-modal" id="modal">
				<div class="close">
					<button class="close" onclick="fecharModal()">&times;</button>
				</div>

				<?php
				if(isset($_SESSION['inserir'])):
				switch ($_SESSION['inserir']):
				case 1:
				?>
				<div class="erro">
					<p>ERRO: O código informado já existe!</p>
				</div>
				<?php
					break;
					case 2:
				?>
				<div class="sucesso">
					<p>Ação realizada com sucesso!</p>
				</div>
				<?php
					break;
					endswitch;
					endif;
					unset($_SESSION['inserir']);
				?>
				<form action="processos_php/processo_inserir.php" method="POST" class="topico">

					<label for="nome">Nome:</label><br>
					<input type="text" name="nome" value="" maxlength="40" required class="entrada"><br>

					<label for="categoria">Categoria:</label><br>
					<input type="text" name="categoria" list="lista" value="" maxlength="40" class="entrada">
					<datalist id="lista">
						<?php	
							$categoria= mysqli_query($con, "SELECT Categoria FROM estoque GROUP BY Categoria");
							while($catg=mysqli_fetch_array($categoria)){
								echo "<option value=".$catg['Categoria']."><br>";
							}	
						?>
					</datalist><br>

					<label for="codigo">Código do Produto:</label><br>
					<input type="text" name="codigo" value="" min="0" maxlength="25" required class="entrada"><br>

					<label for="quantidade">Quantidade:</label><br>
					<input type="number" name="quantidade" value="" min="0" max="4294967295" class="entrada"><br>


					<p class="espaco"></p>
					<input type="submit" name="cadastrar" value="Cadastrar" required class="button">
					</form>
			</div>



			<button type="button" class="button" onclick="abrirModal2()">Atualizar Produto</button>
			<div class="bg-modal" id="modal2">
				<div class="close">
					<button class="close" onclick="fecharModal2()">&times;</button>
				</div>
					
				<?php
				if(isset($_SESSION['atualizar'])):
				switch ($_SESSION['atualizar']):
				case 1:
				?>
				
				<div class="erro">
				<p>ERRO: O código informado não existe!</p>
				</div>
				<?php
					break;
					case 2:
				?>
				<div class="sucesso">
					<p>Ação realizada com sucesso!</p>
				</div>
				<?php
					break;
					case 3:
				?>
				<div class="erro">
					<p>ERRO: Por favor informe um Nome ou Categoria!</p>
				</div>
				<?php
					break;
					case 4:
				?>
				<div class="erro">
					<p>ERRO: O novo código selecionado já existe!</p>
				</div>
				<?php
					break;
					endswitch;
					endif;
					unset($_SESSION['atualizar']);
				?>
				<form action="processos_php/processo_atualizar.php" method="POST" class="topico">

					<label for="nome">Nome:</label><br>
					<input type="text" name="nome" value="" class="entrada" maxlength="40" placeholder="(Opcional)"><br>

					<label for="categoria">Categoria:</label><br>
					<input type="text" name="categoria" list="lista" value="" class="entrada" maxlength="40" placeholder="(Opcional)">
					<datalist id="lista">
						<?php	
							$categoria= mysqli_query($con, "SELECT Categoria FROM estoque GROUP BY Categoria");
							while($catg=mysqli_fetch_array($categoria)){
								echo "<option value=".$catg['Categoria']."><br>";
							}	
						?>
					</datalist><br>
					
					<label for="codigo">Código Atual do Produto:</label><br>
					<input type="text" name="codigo" min="0" value="" maxlength="25" required class="entrada"><br>

					<label for="Ncodigo">Novo Código do Produto:</label><br>
					<input type="text" name="Ncodigo" min="0" value="" maxlength="25" class="entrada" placeholder="(Opcional)"><br>
					
					<p class="espaco"></p>
					<input type="submit" name="cadastrar" value="Atualizar" required class="button">
				</form>
			</div>
		</div>
	</div>
</body>
</html>










