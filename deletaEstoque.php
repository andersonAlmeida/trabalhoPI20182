<?php 	
	include 'classes/connection.class.php';
	include 'classes/estoque.class.php';
	include 'classes/estoque_model.class.php';

	$id = $_GET['id'];

	if( $id && isset($id) ) {
		$con = CONNECTION::getInstance();

		if($con) {
			$fun = new ESTOQUE();
			$fun->setId($id);
			
			$deleta = ESTOQUE_MODEL::getInstance()->deletar($fun);

			if($deleta) {
				header('Location: '. "index.php?p=listarEstoques");
				die();
			}
		}
	}

?>