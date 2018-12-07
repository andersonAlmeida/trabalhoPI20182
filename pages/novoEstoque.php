<?php
include 'classes/funcionarios.class.php';
include 'classes/funcionarios_model.class.php';
include 'classes/livro.class.php';
include 'classes/livro_model.class.php';

$funcionarios = FUNCIONARIOS_MODEL::getInstance()->buscarFuncionarios();
$livros = LIVRO_MODEL::getInstance()->buscarLivros();
?>

<section id="novo-func">
	<div class="container-fluid">
		<header> 
			<h1 class="h3 display">Novo Estoque</h1>
		</header>
		<div class="row">
			<div class="col-lg-6">
				<div class="card">
					<div class="card-header d-flex align-items-center">
						<h4>Formulário</h4>
					</div>
					<div class="card-body">
						<p>Insira os dados solicitados.</p>
						<form action="salvaEstoque.php" method="POST">
							<div class="form-group">
								<label>Selecionar Funcionário</label>
								<div class="col-sm-14 mb-3">
									<select name="funcionario" class="form-control" required>
										<option value="">Selecione</option>
										<?php 
										foreach ($funcionarios as $f) {											
											echo "<option value=" . $f['idfuncionarios'] . ">" . $f['nome'] . "</option>";
										}
										?>	
									</select>
								</div>								
							</div>
							<div class="form-group">
								<label>Selecionar Livro</label>
								<select name="livro" class="form-control" required>
									<option value="">Selecione</option>
									<?php 
									foreach ($livros as $l) {											
										echo "<option value=" . $l['idlivros'] . ">" . $l['titulo'] . "</option>";
									}
									?>	
								</select>
							</div>
							<div class="form-group">
								<label>Quantidade Recebida</label>
								<input type="number" min="1" placeholder="Quantidade Recebida" name="quantidadeRecebida" class="form-control" required>
							</div>														
							<div class="form-group">       
								<button class="btn btn-primary">Salvar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</section>