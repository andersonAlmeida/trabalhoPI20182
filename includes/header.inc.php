<?php  
	include 'classes/connection.class.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Programação para Internet I</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="all,follow">
	<!-- Bootstrap CSS-->
	<link rel="stylesheet" href="_assets/vendor/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome CSS-->
	<link rel="stylesheet" href="_assets/vendor/font-awesome/css/font-awesome.min.css">
	<!-- Fontastic Custom icon font-->
	<link rel="stylesheet" href="_assets/css/fontastic.css">
	<!-- Google fonts - Roboto -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">    
	<!-- theme stylesheet-->
	<link rel="stylesheet" href="_assets/css/style.default.css" id="theme-stylesheet">
	<!-- Custom stylesheet - for your changes-->
	<link rel="stylesheet" href="_assets/css/custom.css">
	<!-- Favicon-->
	<link rel="shortcut icon" href="_assets/img/favicon.ico">
</head>
<body>
	<!-- Side Navbar -->
	<nav class="side-navbar">
		<div class="side-navbar-wrapper">
			<!-- Sidebar Header    -->
			<div class="sidenav-header d-flex align-items-center justify-content-center">
				<!-- User Info-->
				<div class="sidenav-header-inner text-center"><img src="_assets/img/avatar-7.jpg" alt="person" class="img-fluid rounded-circle">
					<h2 class="h5">Anderson R Almeida</h2><span>Faculdade Senac-POA</span>
				</div>
				<!-- Small Brand information, appears on minimized sidebar-->
				<div class="sidenav-header-logo"><a href="index.php" class="brand-small text-center"> <strong>S</strong><strong class="text-primary">I</strong></a></div>
			</div>
			<!-- Sidebar Navigation Menus-->
			<div class="main-menu">
				<h5 class="sidenav-heading">Menu</h5>
				<ul id="side-main-menu" class="side-menu list-unstyled">                  
					<li><a href="index.php"> <i class="icon-home"></i>Home</a></li>
					<li><a href="#funcionarios_m" aria-expanded="false" data-toggle="collapse"> <i class="icomoon-user"></i>Funcionários</a>
						<ul id="funcionarios_m" class="collapse list-unstyled ">
							<li><a href="index.php?p=novoFuncionario">Adicionar</a></li>
							<li><a href="index.php?p=listarFuncionarios">Listar</a></li>
						</ul>
					</li>
					<li><a href="#livros_m" aria-expanded="false" data-toggle="collapse"> <i class="icomoon-book"></i>Livros</a>
						<ul id="livros_m" class="collapse list-unstyled ">
							<li><a href="index.php?p=novoLivro">Adicionar</a></li>
							<li><a href="index.php?p=listarLivros">Listar</a></li>
						</ul>
					</li>
					<li><a href="#estoques_m" aria-expanded="false" data-toggle="collapse"> <i class="icomoon-file-text"></i>Estoques</a>
						<ul id="estoques_m" class="collapse list-unstyled ">
							<li><a href="index.php?p=novoEstoque">Adicionar</a></li>
							<li><a href="index.php?p=listarEstoques">Listar</a></li>
						</ul>
					</li>
					<li><a href="#fornecedores_m" aria-expanded="false" data-toggle="collapse"> <i class="icomoon-truck"></i>Fornecedores</a>
						<ul id="fornecedores_m" class="collapse list-unstyled ">
							<li><a href="index.php?p=novoFornecedor">Adicionar</a></li>
							<li><a href="index.php?p=listarFornecedores">Listar</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="page">
		<!-- navbar-->
		<header class="header">
			<nav class="navbar">
				<div class="container-fluid">
					<div class="navbar-holder d-flex align-items-center justify-content-between">
						<div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="index.php" class="navbar-brand">
							<div class="brand-text d-none d-md-inline-block"><strong class="text-primary">Sistemas para Internet</strong></div></a></div>

						</div>
					</div>
				</nav>
			</header>