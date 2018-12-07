<?php 

	class LIVRO_MODEL {
		public static $instance;
		  
	    private function __construct() {

	    }

	    public static function getInstance() {
	        if (!isset(self::$instance))
	            self::$instance = new LIVRO_MODEL();
	  
	        return self::$instance;
	    }

	    public function inserir(LIVRO $livro) {
            try {
                $sql = "INSERT INTO livros (titulo, anopublicacao, edicao, editora, fornecedores_idfornecedores) VALUES (:titulo, :anopublicacao, :edicao, :editora, :fornecedor)";
      
                $p_sql = CONNECTION::getInstance()->prepare($sql);
      
                $p_sql->bindValue(":titulo", $livro->getTitulo());      
                $p_sql->bindValue(":anopublicacao", $livro->getDataPublicacao());      
                $p_sql->bindValue(":edicao", $livro->getEdicao());      
                $p_sql->bindValue(":editora", $livro->getEditora());      
                $p_sql->bindValue(":fornecedor", $livro->getFornecedor());      
      
                return $p_sql->execute();
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
            }
        }

        public function atualizar(LIVRO $livro) {
            try {
                $sql = "UPDATE livros SET titulo = :titulo, anopublicacao = :anopublicacao, editora = :editora, edicao = :edicao, fornecedores_idfornecedores = :fornecedor WHERE idlivros = :id";
      
                $p_sql = CONNECTION::getInstance()->prepare($sql);
      
                $p_sql->bindValue(":titulo", $livro->getTitulo());      
                $p_sql->bindValue(":anopublicacao", $livro->getDataPublicacao());      
                $p_sql->bindValue(":editora", $livro->getEditora());      
                $p_sql->bindValue(":edicao", $livro->getEdicao());     
                $p_sql->bindValue(":id", $livro->getId());      
                $p_sql->bindValue(":fornecedor", $livro->getFornecedor());      
      
                return $p_sql->execute();
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
            }
        }

        public function deletar(LIVRO $livro) {
        	try {
        	    $sql = "DELETE FROM livros WHERE idlivros = :id";
        	
        	    $p_sql = CONNECTION::getInstance()->prepare($sql);
        	        
        	    $p_sql->bindValue(":id", $livro->getId());      
        	
        	    return $p_sql->execute();
        	} catch (Exception $e) {
        	    print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        	}
        }

        public function buscarLivros() {
            try {
                $sql = "SELECT idlivros, titulo, anopublicacao, edicao, editora, nome FROM livros, fornecedores 
                        WHERE livros.fornecedores_idfornecedores = fornecedores.idfornecedores 
                        ORDER BY anopublicacao";
                $result = CONNECTION::getInstance()->query($sql);
                $lista = $result->fetchAll(PDO::FETCH_ASSOC);

                return $lista;
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
            }
        }

        public function buscarLivro($id) {
            try {
                $sql = "SELECT * FROM livros WHERE idlivros = $id";
                $result = CONNECTION::getInstance()->query($sql);
                $lista = $result->fetchAll(PDO::FETCH_ASSOC);

                return $lista;
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
            }
        }

        public function pesquisar($campos) {
            try {
                $where = "";
                // $temCondicao = false;

                // if($campos['fornecedor_idfornecedor'] != '') {
                //     $where .= ', fornecedores WHERE livros.fornecedor_idfornecedor = fornecedores.idfornecedores';
                //     $temCondicao = true;
                // }

                foreach ($campos as $campo => $val) {
                    if($val != '') {
                        // if( !$temCondicao ) {
                        //     $where .= "WHERE $campo LIKE '%" . $val . "%'";
                        //     $temCondicao = true; 
                        // } else {
                            $where .= " AND $campo LIKE '%" . $val . "%'";                            
                        // }
                    }
                }

                $sql = "SELECT * FROM livros, fornecedores WHERE livros.fornecedores_idfornecedores = fornecedores.idfornecedores $where";

                // echo $sql;
                // die();

                $result = CONNECTION::getInstance()->query($sql);
                $lista = $result->fetchAll(PDO::FETCH_ASSOC);

                return $lista;
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
            }
        }

	}

 ?>