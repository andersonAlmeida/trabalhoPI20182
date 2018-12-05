<?php 
	class LIVRO {
		private $titulo;		
		private $dataPublicacao;		
		private $edicao;		
		private $editora;		
		private $fornecedor;		
		private $id;		

		function __construct() {}

		public function setId($id) {
			$this->id = $id;
		}

		public function getId() {
			return $this->id;
		}

		public function setTitulo($titulo) {
			$this->titulo = $titulo;
		}

		public function getTitulo() {
			return $this->titulo;
		}

		public function setDataPublicacao($data) {
			$this->dataPublicacao = $data;
		}

		public function getDataPublicacao() {
			return $this->dataPublicacao;
		}

		public function setEdicao($edicao) {
			$this->edicao = $edicao;
		}

		public function getEdicao() {
			return $this->edicao;
		}

		public function setEditora($editora) {
			$this->editora = $editora;
		}

		public function getEditora() {
			return $this->editora;
		}

		public function setFornecedor($fornecedor) {
			$this->fornecedor = $fornecedor;
		}

		public function getFornecedor() {
			return $this->fornecedor;
		}
	}

?>