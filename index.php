<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<script src='https://www.google.com/recaptcha/api.js?hl=pt-BR'></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<title>Tela de Login</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<style type="text/css">
			#tamanhoContainer {
				width: 350px;
				-webkit-box-shadow: 10px 10px 28px -8px rgba(194, 194, 194, 1);
				-moz-box-shadow: 10px 10px 28px -8px rgba(194, 194, 194, 1);
				box-shadow: 10px 10px 28px -8px rgba(194, 194, 194, 1);
			}

	.font1 {
		font-family: "Oswald, sans-serif";
	}

	.font2 {
		font-family: "Roboto, Arial, sans-serif";
	}

	.button {
	  background-color: #1dd1a1; /* Green */
	  border: none;
	  color: white;
	  padding: 8px;
	  text-align: center;
	  text-decoration: none;
	  display: inline-block;
	  font-size: 20px;
	  margin: 4px 2px;
	  cursor: pointer;
	}

	.button1 {border-radius: 50px;}
	
	.button2 {border-radius: 10px;}

	</style>
</head>
<body>

<middle><div class="container-fluid" id="tamanhoContainer" style="margin-top: 60px; margin-bottom: 60px; border-radius: 15px; border: 2px solid #f3f3f3;">
		<div style="padding: 20px">
		<center><img src="image/Logo2.png" width="108px" height="120px"></center>
		<form action="index1.php" method="post">
			<div class="form-group" style="margin-top: 20px;">
				<label></label>
				<input type="text" name="usuario" class="form-control button2" placeholder="E-mail" autocomplete="off" required>
			</div>

			<div style="margin-top: -20px;" class="form-group">
				<label></label>
				<input type="password" name="senha" class="form-control button2" placeholder="Senha" autocomplete="off" required>
			</div>
			
			<div style="margin-top: 20px;" class="g-recaptcha" data-sitekey="6Ld7ynkaAAAAABETdv2ngkkB70L88bidmXfoC29p"></div>

			<div class="form-group form-check">
			    <center><input style="margin-top: 25px;" type="checkbox" class="form-check-input" id="exampleCheck1">
			    <label style="margin-top: 20px;" class="form-check-label" for="exampleCheck1">Lembrar de mim</label></center>
			</div>

			<div style="text-align: right; margin: 40px 0px 60px 0px;">
				<center><button type="submit" class="button font2 button1">&nbsp&nbsp&nbsp&nbsp&nbspEntrar&nbsp&nbsp&nbsp&nbsp&nbsp</button></center>
			</div>
		</form>
		</div>
</div></middle>

	
<script type="text/JavaScript"src="js/bootstrap.js"></script>
</body>
</html>