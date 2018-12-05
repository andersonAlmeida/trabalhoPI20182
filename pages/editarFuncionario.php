<?php
	include 'classes/funcionarios.class.php';
	include 'classes/funcionarios_model.class.php';

	$id = $_GET['id'];
	$funcionario = FUNCIONARIOS_MODEL::getInstance()->buscarFuncionario($id);
 ?>

<section id="novo-func">
	<div class="container-fluid">
		<header> 
		  <h1 class="h3 display">Editar Funcionário</h1>
		</header>
		<div class="row">
			<div class="col-lg-6">
			  <div class="card">
			    <div class="card-header d-flex align-items-center">
			      <h4>Formulário</h4>
			    </div>
			    <div class="card-body">
			      <p>Insira os dados solicitados.</p>
			      <form action="salvaEditaFuncionario.php" method="POST">
			      	<input type="hidden" name="id" value="<?php echo $funcionario[0]['idfuncionarios'] ?>">
			        <div class="form-group">
			          <label>Nome do funcionário</label>
			          <input type="text" placeholder="Nome" name="nome" class="form-control" value="<?php echo $funcionario[0]['nome'] ?>">
			        </div>
			        <div class="form-group">
			          <label>Data da Contratação</label>
			          <input type="date" placeholder="Data" name="data" class="form-control" value="<?php echo $funcionario[0]['datacontratacao'] ?>">
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