<?php
$servername = "localhost"; //padrão - server local - mudar quando estiver com provedor
$database = "teste_estoque"; //alternar dados do banco de dados
$username = "root"; //padrão - root
$password = ""; //senha de conexão do banco de dados
//Create Connection
$conexao = mysqli_connect($servername, $username, $password, $database) or die(mysql_error());
mysql_select_db($database) or die(mysql_error());
	
?>