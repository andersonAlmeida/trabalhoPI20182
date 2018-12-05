<?php 	
	include 'classes/fornecedor.class.php';
	include 'classes/fornecedor_model.class.php';

	$fornecedores = FORNECEDOR_MODEL::getInstance()->buscarFornecedores();
?>	

<section id="lista-func">
	<div class="container-fluid">
		<header>
			<h1>Fornecedores</h1>
		</header>

		<div class="row">
			<div class="col-lg-8">
				<div class="card">
					<div class="card-header">
						<h4>Tabela de Fornecedores</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<!-- <th>#</th> -->
										<th>Nome</th>
										<th>Endereço</th>
										<th>Cidade</th>
										<th>Telefone</th>
										<th>#</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										foreach ($fornecedores as $f) {											
											echo "	<tr>
														<td>" . $f['nome'] . "</td>														
														<td>" . $f['endereco'] . "</td>														
														<td>" . $f['cidade'] . "</td>														
														<td>" . $f['telefone'] . "</td>														
														<td>
															<a href='index.php?p=editarFornecedor&id=" . $f["idfornecedores"] . "'>editar</a> | <a href='deletaFornecedor?id=" . $f["idfornecedores"] . "'>excluir</a>
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