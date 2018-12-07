<?php 	
	include 'classes/funcionarios.class.php';
	include 'classes/funcionarios_model.class.php';

	$funcionarios = FUNCIONARIOS_MODEL::getInstance()->pesquisar($_POST);	
	$busca = "";
	$tem_resultado = false;

	foreach ($_POST as $campo => $val) {
		if($tem_resultado) {
			if( $val != "" ) {
				if($campo != 'datacontratacao') {
					$busca .= ", " . $val;	
				} else {
					$busca .= ", " . date("d/m/Y", strtotime($val));	
				}
			}
		} else {
			if( $val != "" ) {
				if($campo != 'datacontratacao') {
					$busca .= $val;			
				} else {
					$busca .= date("d/m/Y", strtotime($val));
				}

				$tem_resultado = true;		
			}
		}
	}
?>	

<section id="lista-func">
	<div class="container-fluid">
		<header>
			<h1>Resultado para busca de <?php echo $busca ?></h1>
		</header>
		<div class="row">			
			<div class="col-lg-8">
				<div class="card">
					<div class="card-header d-flex align-items-center">
						<h4>Pesquisar</h4>
					</div>
					<div class="card-body">
						<form class="form-inline" action="index.php?p=pesquisaFuncionarios" method="POST">
							<div class="form-group">
								<label for="pesqNome" class="sr-only">Nome</label>
								<input id="pesqNome" type="text" placeholder="Nome" name="nome" class="mr-3 form-control">
							</div>
							<div class="form-group">
								<label for="pesqData" class="sr-only">Data de Contratação</label>
								<input id="pesqData" type="date" placeholder="Data de Contratação" name="datacontratacao" class="mr-3 form-control form-control">
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
															<a href='index.php?p=editarFuncionario&id=" . $f["idfuncionarios"] . "'>editar</a> | <a href='deletaFuncionario?id=" . $f["idfuncionarios"] . "' class='deleta'>excluir</a>
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