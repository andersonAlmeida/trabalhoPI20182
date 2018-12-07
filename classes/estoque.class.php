<?php 
	class ESTOQUE {
		private $idLivro;		
		private $idFuncionario;		
		private $dataAtualizacao;		
		private $recebidos;		
		private $total;		
		private $id;		

		function __construct() {}

		public function setId($id) {
			$this->id = $id;
		}

		public function getId() {
			return $this->id;
		}

		public function setIdLivro($id) {
			$this->idLivro = $id;
		}

		public function getIdLivro() {
			return $this->idLivro;
		}

		public function setIdFuncionario($id) {
			$this->idFuncionario = $id;
		}

		public function getIdFuncionario() {
			return $this->idFuncionario;
		}

		public function setRecebidos($quantia) {
			$this->recebidos = $quantia;
		}

		public function getRecebidos() {
			return $this->recebidos;
		}

		public function setTotal($quantia) {
			$this->total = $quantia;
		}

		public function getTotal() {
			return $this->total;
		}

		public function getDataAtualizacao() {
			return $this->dataAtualizacao;
		}
	}

?>