<?php 

	class FORNECEDOR_MODEL {
		public static $instance;
		  
	    private function __construct() {

	    }

	    public static function getInstance() {
	        if (!isset(self::$instance))
	            self::$instance = new FORNECEDOR_MODEL();
	  
	        return self::$instance;
	    }

	    public function inserir(FORNECEDOR $fornecedor) {
            try {
                $sql = "INSERT INTO fornecedores (nome, endereco, cidade, telefone) VALUES (:nome, :endereco, :cidade, :telefone)";
      
                $p_sql = CONNECTION::getInstance()->prepare($sql);
      
                $p_sql->bindValue(":nome", $fornecedor->getNome());      
                $p_sql->bindValue(":endereco", $fornecedor->getEndereco());      
                $p_sql->bindValue(":cidade", $fornecedor->getCidade());      
                $p_sql->bindValue(":telefone", $fornecedor->getTelefone());      
      
                return $p_sql->execute();
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação, tente novamente mais tarde.";
            }
        }

        public function atualizar(FORNECEDOR $fornecedor) {
            try {
                $sql = "UPDATE fornecedores SET nome = :nome, endereco = :endereco, cidade = :cidade, telefone = :telefone WHERE idfornecedores = :id";
      
                $p_sql = CONNECTION::getInstance()->prepare($sql);
      
                $p_sql->bindValue(":nome", $fornecedor->getNome());      
                $p_sql->bindValue(":endereco", $fornecedor->getEndereco());      
                $p_sql->bindValue(":cidade", $fornecedor->getCidade());      
                $p_sql->bindValue(":telefone", $fornecedor->getTelefone());     
                $p_sql->bindValue(":id", $fornecedor->getId());      
      
                return $p_sql->execute();
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação, tente novamente mais tarde.";
            }
        }

        public function deletar(FORNECEDOR $fornecedor) {
        	try {
        	    $sql = "DELETE FROM fornecedores WHERE idfornecedores = :id";
        	
        	    $p_sql = CONNECTION::getInstance()->prepare($sql);
        	        
        	    $p_sql->bindValue(":id", $fornecedor->getId());      
        	
        	    return $p_sql->execute();
        	} catch (Exception $e) {
        	    print "Ocorreu um erro ao tentar executar esta ação, tente novamente mais tarde.";
        	}
        }

        public function buscarFornecedores() {
            try {
                $sql = "SELECT * FROM fornecedores ORDER BY nome";
                $result = CONNECTION::getInstance()->query($sql);
                $lista = $result->fetchAll(PDO::FETCH_ASSOC);

                return $lista;
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação, tente novamente mais tarde.";
            }
        }

        public function buscarFornecedor($id) {
            try {
                $sql = "SELECT * FROM fornecedores WHERE idfornecedores = $id";
                $result = CONNECTION::getInstance()->query($sql);
                $lista = $result->fetchAll(PDO::FETCH_ASSOC);

                return $lista;
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação, tente novamente mais tarde.";
            }
        }

        public function pesquisar($campos) {
            try {
                $where = "";
                $temCondicao = false;

                foreach ($campos as $campo => $val) {
                    if($val != '') {
                        if( !$temCondicao ) {
                            $where .= "WHERE $campo LIKE '%" . $val . "%'";
                            $temCondicao = true; 
                        } else {
                            $where .= " AND $campo LIKE '%" . $val . "%'";                            
                        }
                    }
                }


                $sql = "SELECT * FROM fornecedores $where";

                $result = CONNECTION::getInstance()->query($sql);
                $lista = $result->fetchAll(PDO::FETCH_ASSOC);

                return $lista;
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação, tente novamente mais tarde.";
            }
        }

	}

 ?>