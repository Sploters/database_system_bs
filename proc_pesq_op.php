<?php 

include_once 'conexao.php';

$ops = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);

$result_op = "SELECT * FROM op WHERE op_num LIKE '%$ops%' LIMIT 10";
$resultado_op = mysqli_query($conexao, $result_op);

if(($resultado_op) and ($resultado_op->num_rows != 0)){
	while($row_op = mysqli_fetch_assoc($resultado_op)){
		echo "<li>".$row_op['op_num']."</li>";
	}
}else{
		echo "Nenhuma OP encontrada ...";
}
?>