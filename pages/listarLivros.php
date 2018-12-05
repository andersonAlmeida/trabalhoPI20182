<?php 	
	include 'classes/livro.class.php';
	include 'classes/livro_model.class.php';

	$livros = LIVRO_MODEL::getInstance()->buscarLivros();
?>	

<section id="lista-func">
	<div class="container-fluid">
		<header>
			<h1>Livros</h1>
		</header>

		<div class="row">
			<div class="col-lg-8">
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
															<a href='index.php?p=editarLivro&id=" . $l["idlivros"] . "'>editar</a> | <a href='deletaLivro?id=" . $l["idlivros"] . "'>excluir</a>
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