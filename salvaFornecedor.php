<?php 	
	include 'classes/connection.class.php';
	include 'classes/fornecedor.class.php';
	include 'classes/fornecedor_model.class.php';

	$nome_post = $_POST['nome'];
	$endereco_post = $_POST['endereco'];
	$cidade_post = $_POST['cidade'];
	$telefone_post = $_POST['telefone'];

	if( $nome_post && isset($nome_post) && $endereco_post && isset($endereco_post) && $cidade_post && isset($cidade_post) && $telefone_post && isset($telefone_post) ) {
		$con = CONNECTION::getInstance();

		if($con) {
			$fun = new FORNECEDOR();
			$fun->setNome($nome_post);
			$fun->setEndereco($endereco_post);
			$fun->setCidade($cidade_post);
			$fun->setTelefone($telefone_post);
			
			$insere = FORNECEDOR_MODEL::getInstance()->inserir($fun);

			if($insere) {
				header('Location: '. "index.php?p=novoFornecedor");
				die();
			}
		}
	}

?>