<?php 	
	// include 'classes/livro.class.php';
	// include 'classes/livro_model.class.php';
	// include 'classes/funcionarios.class.php';
	// include 'classes/funcionarios_model.class.php';
	include 'classes/estoque.class.php';
	include 'classes/estoque_model.class.php';

	$estoques = ESTOQUE_MODEL::getInstance()->buscarEstoques();
	// $livros = LIVRO_MODEL::getInstance()->buscarLivros();
	// $livros = LIVRO_MODEL::getInstance()->buscarLivros();
?>	

<section id="lista-func">
	<div class="container-fluid">
		<header>
			<h1>Estoques</h1>
		</header>

		<div class="row">
			<div class="col-lg-8">
				<div class="card">
					<div class="card-header">
						<h4>Tabela de Estoques</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<!-- <th>#</th> -->
										<th>Livro</th>
										<th>Quantidade Total</th>
										<th>Quantidade Recebida</th>
										<th>Atualizado Em</th>										
										<th>#</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										foreach ($estoques as $e) {											
											echo "	<tr>
														<td>" . $e['titulo'] . "</td>														
														<td>" . $e['quant_total'] . "</td>														
														<td>" . $e['quant_recebida'] . "</td>														
														<td>" . date("d/m/Y", strtotime($e['dataatualizacao'])) . "</td>										
														<td>
															<a href='index.php?p=editarEstoque&id=" . $e["idestoques"] . "'>editar</a> | <a href='deletaEstoque?id=" . $e["idestoques"] . "'>excluir</a>
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