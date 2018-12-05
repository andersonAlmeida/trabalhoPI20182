<?php 	
	include 'classes/connection.class.php';
	include 'classes/funcionarios.class.php';
	include 'classes/funcionarios_model.class.php';

	$nome_post = $_POST['nome'];

	if( $nome_post && isset($nome_post) ) {
		$con = CONNECTION::getInstance();

		if($con) {
			$fun = new FUNCIONARIOS();
			$fun->setNome($nome_post);
			
			$insere = FUNCIONARIOS_MODEL::getInstance()->inserir($fun);

			if($insere) {
				header('Location: '. "index.php?p=novoFuncionario");
				die();
			}
		}
	}

?>