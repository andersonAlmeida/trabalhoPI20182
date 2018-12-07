<?php 	
	include 'classes/connection.class.php';
	include 'classes/estoque.class.php';
	include 'classes/estoque_model.class.php';

	$livro_post = $_POST['livro'];
	$funcionario_post = $_POST['funcionario'];
	$total_post = $_POST['quantidadeTotal'];
	$id_post = $_POST['id'];

	if( $livro_post && isset($livro_post) && $funcionario_post && isset($funcionario_post) && $total_post && isset($total_post) ) {

		$con = CONNECTION::getInstance();

		if($con) {
			$fun = new ESTOQUE();
			$fun->setIdLivro($livro_post);
			$fun->setIdFuncionario($funcionario_post);
			$fun->setTotal($total_post);
			$fun->setId($id_post);
			
			$insere = ESTOQUE_MODEL::getInstance()->atualizar($fun);

			if($insere) {
				header('Location: '. "index.php?p=listarEstoques");
				die();
			}
		}
	}

?>