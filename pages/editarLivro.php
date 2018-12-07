<?php
include 'classes/fornecedor.class.php';
include 'classes/fornecedor_model.class.php';
include 'classes/livro.class.php';
include 'classes/livro_model.class.php';

$id = $_GET['id'];
$livro = LIVRO_MODEL::getInstance()->buscarLivro($id);
$fornecedores = FORNECEDOR_MODEL::getInstance()->buscarFornecedores();
?>

<section id="novo-func">
	<div class="container-fluid">
		<header> 
			<h1 class="h3 display">Editar Livro</h1>
		</header>
		<div class="row">
			<div class="col-lg-6">
				<div class="card">
					<div class="card-header d-flex align-items-center">
						<h4>Formulário</h4>
					</div>
					<div class="card-body">
						<p>Insira os dados solicitados.</p>
						<form action="salvaEditaLivro.php" method="POST">
							<input type="hidden" name="id" value="<?php echo $livro[0]['idlivros'] ?>">
							<div class="form-group">
								<label>Título do Livro</label>
								<input type="text" placeholder="Título" name="titulo" class="form-control" required value="<?php echo $livro[0]['titulo'] ?>">
							</div>
							<div class="form-group">
								<label>Ano de Publicação</label>
								<input type="text" placeholder="Ano de Publicação" name="ano-publicacao" class="form-control" required value="<?php echo $livro[0]['anopublicacao'] ?>">
							</div>
							<div class="form-group">
								<label>Edição</label>
								<input type="text" placeholder="Edição" name="edicao" class="form-control" required value="<?php echo $livro[0]['edicao'] ?>">
							</div>
							<div class="form-group">
								<label>Editora</label>
								<input type="tel" placeholder="Editora" name="editora" class="form-control" required value="<?php echo $livro[0]['editora'] ?>">
							</div>
							<div class="form-group">
								<label>Fornecedor</label>
								<div class="col-sm-14 mb-3">
									<select name="fornecedor" class="form-control" required>
										<option value="">Selecione</option>
										<?php 
										foreach ($fornecedores as $f) {			
											if( $f['idfornecedores'] != $livro[0]['fornecedores_idfornecedores'] ) {
												echo "<option value=" . $f['idfornecedores'] . ">" . $f['nome'] . "</option>";
											} else {
												echo "<option value=" . $f['idfornecedores'] . " selected>" . $f['nome'] . "</option>";												
											}
										}
										?>	
									</select>
								</div>								
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