<?php 	
	include 'classes/fornecedor.class.php';
	include 'classes/fornecedor_model.class.php';

	$fornecedores = FORNECEDOR_MODEL::getInstance()->pesquisar($_POST);	
	$busca = "";
	$tem_resultado = false;

	foreach ($_POST as $val) {
		if($tem_resultado) {
			if( $val != "" )
				$busca .= ", " . $val;	
		} else {
			if( $val != "" ) {
				$busca .= $val;			
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
						<form class="form-inline" action="index.php?p=pesquisaFornecedores" method="POST">
							<div class="form-group">								
								<input id="pesqNome" type="text" placeholder="Nome" name="nome" class="mr-3 form-control">
							</div>
							<div class="form-group">								
								<input id="pesqEndereco" type="text" placeholder="Endereço" name="endereco" class="mr-3 form-control form-control">
							</div>
							<div class="form-group">								
								<input id="pesqCidade" type="text" placeholder="Cidade" name="cidade" class="mr-3 form-control form-control">
							</div>
							<div class="form-group">								
								<input id="pesqTelefone" type="text" placeholder="Telefone" name="telefone" class="mr-3 form-control form-control">
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
															<a href='index.php?p=editarFornecedor&id=" . $f["idfornecedores"] . "'>editar</a> | <a href='deletaFornecedor?id=" . $f["idfornecedores"] . "' class='deleta'>excluir</a>
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