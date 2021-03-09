<<<<<<< HEAD
<?php
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	header('Location: '.$uri.'/dashboard/');
	exit;
?>
Something is wrong with the XAMPP installation :-(
=======
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<title>Tela de Login</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<style type="text/css">
			#tamanhoContainer {
				width: 350px;
				-webkit-box-shadow: 10px 10px 28px -8px rgba(194, 194, 194, 1);
				-moz-box-shadow: 10px 10px 28px -8px rgba(194, 194, 194, 1);
				box-shadow: 10px 10px 28px -8px rgba(194, 194, 194, 1);
			}
	</style>
</head>
<body>

<div class="container" id="tamanhoContainer" style="margin-top: 100px; border-radius: 15px; border: 2px solid #f3f3f3">
		<div style="padding: 10px">
		<center><img src="image/Logo2.png" width="108px" height="120px"></center>
		<form action="index1.php" method="post">
			<div class="form-group">
				<label>Usuário</label>
				<input type="text" name="usuario" class="form-control" placeholder="E-mail" autocomplete="off" required>
			</div>

			<div class="form-group" style="margin-top: 20px">
				<label>Senha</label>
				<input type="password" name="senha" class="form-control" placeholder="Senha" autocomplete="off" required>
			</div>
			<div style="text-align: right; margin-top: 10px;">
				<button type="submit" class="btn btn-success">Entrar</button>
			</div>
		</form>
		</div>
</div>

	
<script type="text/JavaScript"src="js/bootstrap.js"></script>
</body>
</html>
>>>>>>> f9ac121748c67071f9063689ea99fc922cfa2b3d
