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


<a class="btn btn-dark" role="button" onclick="myFunction()"><i class="fas fa-adjust"></i></a>

<script>
function myFunction() {
   var element = document.body;
   element.classList.toggle("dark-mode");
}
</script>

<div class="container" style="margin-top: 20px">
<div class="row">

<?php
if(($nivel == 1) || ($nivel == 5)){

?>

  <div class="col-sm-6" style="margin-top: 20px">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Origem</h5>
        <p class="card-text">Opção para ver a origem dos produtos.</p>
        <a href="origem.php" class="btn btn-primary">ACESSAR</a>
      </div>
    </div>
  </div>
<?php } ?>

<?php
if(($nivel == 1) || ($nivel == 2) || ($nivel == 3) || ($nivel == 4)){

?>
  <div class="col-sm-6" style="margin-top: 20px">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Pedido</h5>
        <p class="card-text">Visualizar pedidos pendentes.</p>
        <a href="pedido.php" class="btn btn-primary">ACESSAR</a>
      </div>
    </div>
  </div>
<?php } ?>

<?php
if(($nivel == 1) || ($nivel == 5)){

?>
  <div class="col-sm-6" style="margin-top: 20px">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">OP</h5>
        <p class="card-text">Código OP da JFR.</p>
        <a href="op.php" class="btn btn-primary">ACESSAR</a>
      </div>
    </div>
  </div>
  <?php } ?>

<?php
if(($nivel == 1) || ($nivel == 5)){

?>
  <div class="col-sm-6" style="margin-top: 20px">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Material</h5>
          <p class="card-text">Visualizar, Editar e Excluir Categorias.</p>
          <a href="material.php" class="btn btn-primary">ACESSAR</a>
        </div>
      </div>
    </div>
  <?php } ?>

<?php
if(($nivel == 1) || ($nivel == 3) || ($nivel == 4)){

?>
  <div class="col-sm-6" style="margin-top: 20px">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Certificado</h5>
        <p class="card-text">Opção para adicionar certificados.</p>
        <a href="certificado.php" class="btn btn-primary">ACESSAR</a>
      </div>
    </div>
  </div>
<?php } ?>

<?php
if(($nivel == 1) || ($nivel == 2) || ($nivel == 5)){

?>
    <div class="col-sm-6" style="margin-top: 20px">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Fornecedor</h5>
        <p class="card-text">Opção para adicionar fornecedores.</p>
        <a href="fornecedor.php" class="btn btn-primary">ACESSAR</a>
      </div>
    </div>
  </div>
<?php } ?>


    <div class="col-sm-6" style="margin-top: 20px">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">RECEBIMENTO</h5>
        <p class="card-text">Opção para adicionar fornecedores.</p>
        <a href="recebimento.php" class="btn btn-primary">ACESSAR</a>
      </div>
    </div>
  </div>

<?php
if(($nivel == 1)){

?>
    <div class="col-sm-6" style="margin-top: 20px">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Cadastrar Usuários</h5>
        <p class="card-text">Cadastrar Usuários.</p>
        <a href="usuarios.php" class="btn btn-primary">ACESSAR</a>
      </div>
    </div>
  </div>

</div>

<?php } ?>

</div>

	<script type="text/JavaScript"src="js/bootstrap.js"></script>
</body>
</html>