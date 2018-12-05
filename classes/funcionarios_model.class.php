<?php 

	class FUNCIONARIOS_MODEL {
		public static $instance;
		  
	    private function __construct() {

	    }

	    public static function getInstance() {
	        if (!isset(self::$instance))
	            self::$instance = new FUNCIONARIOS_MODEL();
	  
	        return self::$instance;
	    }

	    public function inserir(FUNCIONARIOS $funcionario) {
            try {
                $sql = "INSERT INTO funcionarios (nome, datacontratacao) VALUES (:nome, :datacontratacao)";
      
                $p_sql = CONNECTION::getInstance()->prepare($sql);
      
                $p_sql->bindValue(":nome", $funcionario->getNome());      
                $p_sql->bindValue(":datacontratacao", date("Y-m-d"));      
      
                return $p_sql->execute();
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
            }
        }

        public function atualizar(FUNCIONARIOS $funcionario) {
            try {
                $sql = "UPDATE funcionarios SET nome = :nome, datacontratacao  = :datacontratacao WHERE idfuncionarios = :id";
      
                $p_sql = CONNECTION::getInstance()->prepare($sql);
      
                $p_sql->bindValue(":nome", $funcionario->getNome());      
                $p_sql->bindValue(":datacontratacao", $funcionario->getDataContratacao());      
                $p_sql->bindValue(":id", $funcionario->getId());      
      
                return $p_sql->execute();
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
            }
        }

        public function deletar(FUNCIONARIOS $funcionario) {
        	try {
        	    $sql = "DELETE FROM funcionarios WHERE idfuncionarios = :id";
        	
        	    $p_sql = CONNECTION::getInstance()->prepare($sql);
        	        
        	    $p_sql->bindValue(":id", $funcionario->getId());      
        	
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