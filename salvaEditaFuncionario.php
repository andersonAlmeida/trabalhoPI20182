<?php 	
	include 'classes/connection.class.php';
	include 'classes/funcionarios.class.php';
	include 'classes/funcionarios_model.class.php';

	$id_post = $_POST['id'];
	$nome_post = $_POST['nome'];
	$data_post = $_POST['data'];

	if( $nome_post && isset($nome_post) && $data_post && isset($data_post) ) {
		$con = CONNECTION::getInstance();

		if($con) {
			$fun = new FUNCIONARIOS();
			$fun->setNome($nome_post);
			$fun->setDataContratacao($data_post);
			$fun->setId($id_post);
			
			$edita = FUNCIONARIOS_MODEL::getInstance()->atualizar($fun);

			if($edita) {
				header('Location: '. "index.php?p=listarFuncionarios");
				die();
			}
		}
	}

?>