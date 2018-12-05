<?php 	
	include 'classes/connection.class.php';
	include 'classes/livro.class.php';
	include 'classes/livro_model.class.php';

	$id = $_GET['id'];

	if( $id && isset($id) ) {
		$con = CONNECTION::getInstance();

		if($con) {
			$fun = new LIVRO();
			$fun->setId($id);
			
			$deleta = LIVRO_MODEL::getInstance()->deletar($fun);

			if($deleta) {
				header('Location: '. "index.php?p=listarLivros");
				die();
			}
		}
	}

?>