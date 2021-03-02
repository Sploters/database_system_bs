<!DOCTYPE html>
<html>
<head>
<meta name="color-scheme" content="dark light">
	<title>Menu</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="https://kit.fontawesome.com/1b313b9cc5.js" crossorigin="anonymous"></script>
<style>
body{
	background-color: #ffffff;
	color = black;
}

#botao {
			background-color: #FF1168; /*cor do botão*/
			color: #ffffff; /*cor da fonte do botão*/
			font-weight: bold; /*altera a fonte*/
		}

.dark-mode{
	background-color: #181818;
	color = white;
}
</style>
</head>
<body>
<?php

session_start();

$usuario = $_SESSION['usuario'];

if(!isset($_SESSION['usuario'])){
  header('Location: index.php');
}

include 'conexao.php';

$sql = "SELECT nivel_usuario FROM usuarios WHERE mail_usuario = '$usuario'";
$buscar = mysqli_query($conexao,$sql);
$array = mysqli_fetch_array($buscar);
$nivel = $array['nivel_usuario'];
?>
<div class="container" style="width: 400px; margin-top: 70px">

	<form action="_insert_usuario.php" method="post">
		<h4>Cadastro de Usuário</h4>
		<div class="form-group" style="margin-top: 20px">
			<label>Nome de Usuário</label>
			<input type="text" name="nomeusuario" class="form-control" required autocomplete="off" placeholder="Nome Completo">
		</div>
		
		<div class="form-group" style="margin-top: 20px">
			<label>E-mail</label>
			<input type="email" name="mailusuario" class="form-control" required autocomplete="off" placeholder="E-mail">
		</div>

		<div class="form-group" style="margin-top: 20px">
			<label>Senha do Usuário</label>
			<input id="txtSenha" type="password" name="senhausuario" class="form-control" required autocomplete="off" placeholder="Senha">
		</div>

		<div class="form-group" style="margin-top: 20px">
			<label>Repetir Senha</label>
			<input type="password" name="senhausuario" class="form-control" required autocomplete="off" placeholder="Repetir Senha" oninput="validaSenha(this)">
			<small>Escreva igual a anterior.</small>
		</div>

		<div class="form-group" style="margin-top: 20px">
			<label>Nível de Acesso</label>
			<select name ="nivelusuario" class="form-control">
				<optgroup>
					<option value="1">ADMINISTRADOR</option>
					<option value="2">COMPRADOR</option>
					<option value="3">RECEBIDOR</option>
					<option value="4">QUALIDADE</option>
					<option value="5">PLANEJADOR</option>
				</optgroup>
			</select>
		</div>

		<div class="form-group" style="margin-top: 20px">
			<label>Função</label>
			<input type="text" name="funcao" class="form-control" required autocomplete="off" placeholder="Função">
		</div>

		<div style="text-align: right; margin-top: 20px">
			<a href="menu.php" role="button" class="btn btn-primary">Voltar</a>
			<button type="submit" id="botao" class="btn">Cadastrar</button>
		</div>
			
	</form>
</div>

<script type="text/JavaScript"src="js/bootstrap.js"></script>

<script type="text/javascript">
function validaSenha (input){
	if (input.value != document.getElementById('txtSenha').value)
	{
		input.setCustomValidity('Repita a senha corretamente');
	}
	else
	{
		input.setCustomValidity('');
	}
}	

</script>

</body>
</html>