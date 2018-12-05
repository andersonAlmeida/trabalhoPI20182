<?php 	
	include 'classes/funcionarios.class.php';
	include 'classes/funcionarios_model.class.php';

	$funcionarios = FUNCIONARIOS_MODEL::getInstance()->buscarFuncionarios();
?>	

<section id="lista-func">
	<div class="container-fluid">
		<header>
			<h1>Funcionários</h1>
		</header>

		<div class="row">
			<div class="col-lg-8">
				<div class="card">
					<div class="card-header">
						<h4>Tabela de Funcionários</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<!-- <th>#</th> -->
										<th>Nome</th>
										<th>Data da Contratação</th>
										<th>#</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										foreach ($funcionarios as $f) {											
											echo "	<tr>
														<td>" . $f['nome'] . "</td>
														<td>" . date("d/m/Y", strtotime($f["datacontratacao"])) . "</td>
														<td>
															<a href='index.php?p=editarFuncionario&id=" . $f["idfuncionarios"] . "'>editar</a> | <a href='deletaFuncionario?id=" . $f["idfuncionarios"] . "'>excluir</a>
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