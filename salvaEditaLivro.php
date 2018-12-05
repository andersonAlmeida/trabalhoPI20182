<?php 	
	include 'classes/connection.class.php';
	include 'classes/livro.class.php';
	include 'classes/livro_model.class.php';

	$id_post = $_POST['id'];
	$titulo_post = $_POST['titulo'];
	$publicacao_post = $_POST['ano-publicacao'];
	$edicao_post = $_POST['edicao'];
	$editora_post = $_POST['editora'];
	$fornecedor_post = $_POST['fornecedor'];

	if( $titulo_post && isset($titulo_post) && $publicacao_post && isset($publicacao_post) && $edicao_post && isset($edicao_post) && $editora_post && isset($editora_post) && $fornecedor_post && isset($fornecedor_post)) {
		$con = CONNECTION::getInstance();

		if($con) {
			$fun = new LIVRO();
			$fun->setTitulo($titulo_post);
			$fun->setDataPublicacao($publicacao_post);
			$fun->setEdicao($edicao_post);
			$fun->setEditora($editora_post);
			$fun->setFornecedor($fornecedor_post);
			$fun->setId($id_post);
			
			$insere = LIVRO_MODEL::getInstance()->atualizar($fun);

			if($insere) {
				header('Location: '. "index.php?p=listarLivros");
				die();
			}
		}
	}

?>