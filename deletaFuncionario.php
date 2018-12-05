<?php 	
	include 'classes/connection.class.php';
	include 'classes/funcionarios.class.php';
	include 'classes/funcionarios_model.class.php';

	$id = $_GET['id'];

	if( $id && isset($id) ) {
		$con = CONNECTION::getInstance();

		if($con) {
			$fun = new FUNCIONARIOS();
			$fun->setId($id);
			
			$deleta = FUNCIONARIOS_MODEL::getInstance()->deletar($fun);

			if($deleta) {
				header('Location: '. "index.php?p=listarFuncionarios");
				die();
			}
		}
	}

?>