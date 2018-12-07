<?php 	
	// include 'classes/livro.class.php';
	// include 'classes/livro_model.class.php';
	// include 'classes/funcionarios.class.php';
	// include 'classes/funcionarios_model.class.php';
	include 'classes/estoque.class.php';
	include 'classes/estoque_model.class.php';
	
	$estoques = ESTOQUE_MODEL::getInstance()->pesquisar($_POST);	
	$busca = "";
	$tem_resultado = false;

	foreach ($_POST as $campo => $val) {
		if($tem_resultado) {
			if( $val != "" ) {
				if($campo != 'dataatualizacao') {
					$busca .= ", " . $val;	
				} else {
					$busca .= ", " . date("d/m/Y", strtotime($val));	
				}
			}
		} else {
			if( $val != "" ) {
				if($campo != 'dataatualizacao') {
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
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header d-flex align-items-center">
						<h4>Pesquisar</h4>
					</div>
					<div class="card-body">
						<form class="form-inline" action="index.php?p=pesquisaEstoques" method="POST">							
							<div class="form-group">								
								<input type="text" placeholder="Título" name="titulo" class="mr-3 form-control">
							</div>
							<div class="form-group">								
								<input id="pesqTotal" type="number" placeholder="Quantidade Total" name="quant_total" class="mr-3 form-control">
							</div>
							<div class="form-group">								
								<input id="pesqRecebido" type="number" placeholder="Quantidade Recebida" name="quant_recebida" class="mr-3 form-control">
							</div>
							<div class="form-group">								
								<input id="pesqNome" type="text" placeholder="Nome" name="nome" class="mr-3 form-control">
							</div>
							<div class="form-group">
								<label for="pesqData" class="sr-only">Última atualização</label>
								<input id="pesqData" type="date" placeholder="Última atualização" name="dataatualizacao" class="mr-3 form-control form-control">
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
						<h4>Tabela de Estoques</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Livro</th>
										<th>Quantidade Total</th>
										<th>Quantidade Recebida</th>
										<th>Responsável</th>
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
														<td>" . $e['nome'] . "</td>														
														<td>" . date("d/m/Y", strtotime($e['dataatualizacao'])) . "</td>										
														<td>
															<a href='index.php?p=editarEstoque&id=" . $e["idestoques"] . "'>editar</a> | <a href='deletaEstoque?id=" . $e["idestoques"] . "' class='deleta'>excluir</a>
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