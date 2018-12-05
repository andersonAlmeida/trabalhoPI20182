<?php 
	class ESTOQUE {
		private $nome;		
		private $dataContratacao;		
		private $id;		

		function __construct() {}

		public function setId($id) {
			$this->id = $id;
		}

		public function getId() {
			return $this->id;
		}

		public function setNome($nome) {
			$this->nome = $nome;
		}

		public function getNome() {
			return $this->nome;
		}

		public function setDataContratacao($data) {
			$this->dataContratacao = $data;
		}

		public function getDataContratacao() {
			return $this->dataContratacao;
		}
	}

?>