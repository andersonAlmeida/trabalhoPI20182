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
                print "Ocorreu um erro ao tentar executar esta ação, tente novamente mais tarde.";
            }
        }

        public function atualizar(ESTOQUE $estoque) {
            try {
                $sql = "UPDATE estoques SET funcionarios_idfuncionarios = :idfuncionarios, livros_idlivros = :idlivros, dataatualizacao  = :dataatualizacao, quant_total = :total WHERE idestoques = :id";
      
                $p_sql = CONNECTION::getInstance()->prepare($sql);
      
                $p_sql->bindValue(":id", $estoque->getId());      
                $p_sql->bindValue(":idfuncionarios", $estoque->getIdFuncionario());      
                $p_sql->bindValue(":idlivros", $estoque->getIdLivro());      
                $p_sql->bindValue(":total", $estoque->getTotal());      
                $p_sql->bindValue(":dataatualizacao", date("Y-m-d"));      
      
                return $p_sql->execute();
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação, tente novamente mais tarde.";
            }
        }

        public function deletar(ESTOQUE $estoque) {
        	try {
        	    $sql = "DELETE FROM estoques WHERE idestoques = :id";
        	
        	    $p_sql = CONNECTION::getInstance()->prepare($sql);
        	        
        	    $p_sql->bindValue(":id", $estoque->getId());      
        	
        	    return $p_sql->execute();
        	} catch (Exception $e) {
        	    print "Ocorreu um erro ao tentar executar esta ação, tente novamente mais tarde.";
        	}
        }

        public function buscarEstoques() {
            try {
                $sql = "SELECT * FROM estoques e, livros l, funcionarios f
                        WHERE e.livros_idlivros = l.idlivros AND e.funcionarios_idfuncionarios = f.idfuncionarios 
                        ORDER BY titulo";
                $result = CONNECTION::getInstance()->query($sql);
                $lista = $result->fetchAll(PDO::FETCH_ASSOC);

                return $lista;
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação, tente novamente mais tarde.";
            }
        }

        public function buscarEstoque($id) {
            try {
                $sql = "SELECT e.idestoques, e.quant_total, e.quant_recebida, e.livros_idlivros, e.funcionarios_idfuncionarios, l.idlivros, l.titulo, f.idfuncionarios, f.nome FROM estoques e, livros l, funcionarios f
                        WHERE e.livros_idlivros = l.idlivros AND e.funcionarios_idfuncionarios = f.idfuncionarios AND idestoques = $id";
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

                foreach ($campos as $campo => $val) {
                    if($val != '') {
                        $where .= " AND $campo LIKE '%" . $val . "%'";                        
                    }
                }

                $sql = "SELECT * FROM estoques e, livros l, funcionarios f
                        WHERE e.livros_idlivros = l.idlivros AND e.funcionarios_idfuncionarios = f.idfuncionarios $where";

                $result = CONNECTION::getInstance()->query($sql);
                $lista = $result->fetchAll(PDO::FETCH_ASSOC);

                return $lista;
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação, tente novamente mais tarde.";
            }
        }

	}

 ?>