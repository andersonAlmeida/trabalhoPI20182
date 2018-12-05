<?php 

	class ESTOQUE_MODEL {
		public static $instance;
		  
	    private function __construct() {

	    }

	    public static function getInstance() {
	        if (!isset(self::$instance))
	            self::$instance = new ESTOQUE_MODEL();
	  
	        return self::$instance;
	    }

	    public function inserir(ESTOQUE $estoque) {
            try {
                $sql = "INSERT INTO estoques (livros_idlivros, funcionarios_idfuncionarios, quant_recebida, quant_total, dataatualizacao) VALUES (:idlivro, :idfuncionario, :quant_recebida, :quant_total, :dataatualizacao)";
      
                $p_sql = CONNECTION::getInstance()->prepare($sql);
      
                $p_sql->bindValue(":idlivro", $estoque->getIdLivro());      
                $p_sql->bindValue(":idfuncionario", $estoque->getIdFuncionario());      
                $p_sql->bindValue(":quant_recebida", $estoque->getRecebidos());      
                $p_sql->bindValue(":quant_total", $estoque->getRecebidos());      
                $p_sql->bindValue(":dataatualizacao", date("Y-m-d"));      
      
                return $p_sql->execute();
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
            }
        }

        public function atualizar(ESTOQUE $estoque) {
            try {
                $sql = "UPDATE funcionarios SET nome = :nome, datacontratacao  = :datacontratacao WHERE idfuncionarios = :id";
      
                $p_sql = CONNECTION::getInstance()->prepare($sql);
      
                $p_sql->bindValue(":nome", $estoque->getNome());      
                $p_sql->bindValue(":datacontratacao", $estoque->getDataContratacao());      
                $p_sql->bindValue(":id", $estoque->getId());      
      
                return $p_sql->execute();
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
            }
        }

        public function deletar(ESTOQUE $estoque) {
        	try {
        	    $sql = "DELETE FROM funcionarios WHERE idfuncionarios = :id";
        	
        	    $p_sql = CONNECTION::getInstance()->prepare($sql);
        	        
        	    $p_sql->bindValue(":id", $estoque->getId());      
        	
        	    return $p_sql->execute();
        	} catch (Exception $e) {
        	    print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        	}
        }

        public function buscarFuncionarios() {
            try {
                $sql = "SELECT * FROM funcionarios ORDER BY nome";
                $result = CONNECTION::getInstance()->query($sql);
                $lista = $result->fetchAll(PDO::FETCH_ASSOC);

                return $lista;
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
            }
        }

        public function buscarFuncionario($id) {
            try {
                $sql = "SELECT * FROM funcionarios WHERE idfuncionarios = $id";
                $result = CONNECTION::getInstance()->query($sql);
                $lista = $result->fetchAll(PDO::FETCH_ASSOC);

                return $lista;
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
            }
        }

	}

 ?>