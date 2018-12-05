<?php 	
	include 'classes/connection.class.php';
	include 'classes/fornecedor.class.php';
	include 'classes/fornecedor_model.class.php';

	$id = $_GET['id'];

	if( $id && isset($id) ) {
		$con = CONNECTION::getInstance();

		if($con) {
			$fun = new FORNECEDOR();
			$fun->setId($id);
			
			$deleta = FORNECEDOR_MODEL::getInstance()->deletar($fun);

			if($deleta) {
				header('Location: '. "index.php?p=listarFornecedores");
				die();
			}
		}
	}

?>