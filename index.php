<?php 	
	include 'includes/header.inc.php';

	$pagina = isset($_GET['p']) ? $_GET['p'] : null;

	if( $pagina && isset($pagina) ) {
		require("pages/$pagina.php");	
	} else {
		require("pages/listarFuncionarios.php");	
		// echo 'Selecione uma página';
	}

	include 'includes/footer.inc.php';
?>
      