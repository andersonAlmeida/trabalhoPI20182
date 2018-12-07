<?php 	
	include 'classes/livro.class.php';
	include 'classes/livro_model.class.php';
	include 'classes/fornecedor.class.php';
	include 'classes/fornecedor_model.class.php';

	$fornecedores = FORNECEDOR_MODEL::getInstance()->buscarFornecedores();

	$livros = LIVRO_MODEL::getInstance()->buscarLivros();

	// var_dump($livros);
	// die();
?>	

<section id="lista-func">
	<div class="container-fluid">
		<header>
			<h1>Livros</h1>
		</header>
		<div class="row">			
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header d-flex align-items-center">
						<h4>Pesquisar</h4>
					</div>
					<div class="card-body">
						<form class="form-inline" action="index.php?p=pesquisaLivros" method="POST">
							<div class="form-group">								
								<input list="pesqTitulo" type="text" placeholder="Título" name="titulo" class="mr-3 form-control">
								<datalist id="pesqTitulo">
									<?php 										
										foreach ($livros as $l) {
											echo "<option value='" . $l['titulo'] . "'>" . $l['titulo'] . "</option>";											
										}
									?>	
								</datalist>
							</div>
							<div class="form-group">								
								<input id="pesqData" type="number" placeholder="Ano de Publicação" name="anopublicacao" class="mr-3 form-control">
							</div>
							<div class="form-group">								
								<input id="pesqEdicao" type="number" placeholder="Edição" name="edicao" class="mr-3 form-control">
							</div>
							<div class="form-group">								
								<input id="pesqEditora" type="text" placeholder="Editora" name="editora" class="mr-3 form-control">
							</div>
							<div class="form-group">								
								<input list="fornecedor_idfornecedor" type="text" placeholder="Fornecedor" name="nome" class="mr-3 form-control form-control">
								<datalist id="fornecedor_idfornecedor">									
									<?php 
										foreach ($fornecedores as $f) {											
											echo "<option value=" . $f['nome'] . ">" . $f['nome'] . "</option>";
										}
									?>	
								</datalist>
							</div>
							<div class="form-group">
								<input type="submit" value="Buscar" class="mr-3 btn btn-primary">
							</div>
						</form>
					</div>
				</div>
			</div>				
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<h4>Tabela de Livros</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<!-- <th>#</th> -->
										<th>Título</th>
										<th>Publicação</th>
										<th>Edição</th>
										<th>Editora</th>
										<th>Fornecedor</th>
										<th>#</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										foreach ($livros as $l) {											
											echo "	<tr>
														<td>" . $l['titulo'] . "</td>														
														<td>" . $l['anopublicacao'] . "</td>														
														<td>" . $l['edicao'] . "</td>														
														<td>" . $l['editora'] . "</td>														
														<td>" . $l['nome'] . "</td>														
														<td>
															<a href='index.php?p=editarLivro&id=" . $l["idlivros"] . "'>editar</a> | <a href='deletaLivro?id=" . $l["idlivros"] . "' class='deleta'>excluir</a>
														</td>
													</tr>";
										}
									 ?>									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>