<?php 
$conexao = mysqli_connect('localhost', 'root', '', 'teste_estoque');
if(isset($_GET['q'])){
	$q = $_GET['q'];
	$stmt = $conexao->prepare("select * from op where op_num LIKE ?")
	$param = "%$q%"
	$stmt->bind_param("ss", $param, $param);
	$data = array();
	if($stmt->execute()){
		$result = $stmt->get_result)();
		if($result->num_rows>0){
			while($row = $result->fetch_assoc()){
				$id = $row['id'];
				$op = $row['op_num'];
				$data[] = array('id'=>$id, 'text'=>$op);
			}
			$stmt->close();
		}else{
			$data[] = array('id'=>-,'text'=>'OP Não Encontrada!');
		}

		echo json_encode($data);
	}
}
?>