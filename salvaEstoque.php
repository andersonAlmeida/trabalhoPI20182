<?php 	
	include 'classes/connection.class.php';
	include 'classes/estoque.class.php';
	include 'classes/estoque_model.class.php';

	$livro_post = $_POST['livro'];
	$funcionario_post = $_POST['funcionario'];
	$recebidos_post = $_POST['quantidadeRecebida'];

	echo $funcionario_post;

	if( $livro_post && isset($livro_post) && $funcionario_post && isset($funcionario_post) && $recebidos_post && isset($recebidos_post) ) {

		$con = CONNECTION::getInstance();

		if($con) {
			$fun = new ESTOQUE();
			$fun->setIdLivro($livro_post);
			$fun->setIdFuncionario($funcionario_post);
			$fun->setRecebidos($recebidos_post);
			
			$insere = ESTOQUE_MODEL::getInstance()->inserir($fun);

			if($insere) {
				header('Location: '. "index.php?p=novoEstoque");
				die();
			}
		}
	}

?>