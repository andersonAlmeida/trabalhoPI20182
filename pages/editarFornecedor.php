<?php
	include 'classes/fornecedor.class.php';
	include 'classes/fornecedor_model.class.php';

	$id = $_GET['id'];
	$fornecedor = FORNECEDOR_MODEL::getInstance()->buscarFornecedor($id);
 ?>

<section id="novo-func">
	<div class="container-fluid">
		<header> 
		  <h1 class="h3 display">Editar Fornecedor</h1>
		</header>
		<div class="row">
			<div class="col-lg-6">
			  <div class="card">
			    <div class="card-header d-flex align-items-center">
			      <h4>Formulário</h4>
			    </div>
			    <div class="card-body">
			      <p>Insira os dados solicitados.</p>
			      <form action="salvaEditaFornecedor.php" method="POST">
			      	<input type="hidden" name="id" value="<?php echo $fornecedor[0]['idfornecedores'] ?>">
					<div class="form-group">
					  <label>Nome do fornecedor</label>
					  <input type="text" placeholder="Nome" name="nome" class="form-control" required value="<?php echo $fornecedor[0]['nome'] ?>">
					</div>
					<div class="form-group">
					  <label>Endereço</label>
					  <input type="text" placeholder="Endereço" name="endereco" class="form-control" required value="<?php echo $fornecedor[0]['endereco'] ?>">
					</div>
					<div class="form-group">
					  <label>Cidade</label>
					  <input type="text" placeholder="Cidade" name="cidade" class="form-control" required value="<?php echo $fornecedor[0]['cidade'] ?>">
					</div>
					<div class="form-group">
					  <label>Telefone</label>
					  <input type="tel" placeholder="Telefone" name="telefone" class="form-control" required value="<?php echo $fornecedor[0]['telefone'] ?>">
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