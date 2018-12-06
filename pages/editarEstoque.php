<?php
include 'classes/funcionarios.class.php';
include 'classes/funcionarios_model.class.php';
include 'classes/livro.class.php';
include 'classes/livro_model.class.php';
include 'classes/estoque.class.php';
include 'classes/estoque_model.class.php';

$id = $_GET['id'];
$livros = LIVRO_MODEL::getInstance()->buscarLivros();
$funcionarios = FUNCIONARIOS_MODEL::getInstance()->buscarFuncionarios();
$estoque = ESTOQUE_MODEL::getInstance()->buscarEstoque($id);
// var_dump($estoque);
?>

<section id="novo-func">
	<div class="container-fluid">
		<header> 
			<h1 class="h3 display">Editar Estoque</h1>
		</header>
		<div class="row">
			<div class="col-lg-6">
				<div class="card">
					<div class="card-header d-flex align-items-center">
						<h4>Formulário</h4>
					</div>
					<div class="card-body">
						<p>Insira os dados solicitados.</p>
						<form action="salvaEditaEstoque.php" method="POST">
							<input type="hidden" name="id" value="<?php echo $estoque[0]['idestoques'] ?>">
							<div class="form-group">
								<label>Selecionar Funcionário</label>
								<div class="col-sm-14 mb-3">
									<select name="funcionario" class="form-control">
										<option value="">Selecione</option>
										<?php 
										foreach ($funcionarios as $f) {											
											if($f['idfuncionarios'] != $estoque[0]['funcionarios_idfuncionarios']) {
												echo "<option value=" . $f['idfuncionarios'] . ">" . $f['nome'] . "</option>";
											} else {
												echo "<option value=" . $f['idfuncionarios'] . " selected>" . $f['nome'] . "</option>";
											}
										}
										?>	
									</select>
								</div>								
							</div>
							<div class="form-group">
								<label>Selecionar Livro</label>
								<select name="livro" class="form-control">
									<option value="">Selecione</option>
									<?php 
									foreach ($livros as $l) {											
										if($l['idlivros'] != $estoque[0]['livros_idlivros']) {
											echo "<option value=" . $l['idlivros'] . ">" . $l['titulo'] . "</option>";
										} else {
											echo "<option value=" . $l['idlivros'] . " selected>" . $l['titulo'] . "</option>";
										}
									}
									?>	
								</select>
							</div>
							<!-- <div class="form-group">
								<label>Ano de Publicação</label>
								<input type="date" placeholder="Ano de Publicação" name="ano-publicacao" class="form-control" value="<?php //echo $livros[0]['anopublicacao'] ?>">
							</div> -->
							<div class="form-group">
								<label>Quantidade Total</label>
								<input type="number" min="1" max="<?php echo $estoque[0]['quant_recebida'] ?>" placeholder="Quantidade Total" name="quantidadeTotal" class="form-control" value="<?php echo $estoque[0]['quant_total'] ?>">
							</div>	
							<div class="form-group">
								<label>Quantidade Recebida</label>
								<input type="number" min="1" placeholder="Quantidade Recebida" name="quantidadeTotal" class="form-control" value="<?php echo $estoque[0]['quant_recebida'] ?>" readonly>
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