<?php

class BD {
  private $host = "localhost";
	private $dbname = "db_aula";
	private $port = 3306;
	private $usuario = "root";
	private $senha = "";
	private $db_charset = "utf8";	 

	public function conn()
  {
    $conn = "mysql:host=$this->host;dbname=$this->dbname;port=$this->port";

    return new PDO(
      $conn,
      $this->usuario,
      $this->senha,
      [ PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . $this->db_charset ]
    );
  }

	 public function inserir($nome_tabela, $dados)
  {
    $conn = $this->conn(); 
    //a interrogação será substituida pelo valor de cada indice do vetor
    $sql = "INSERT INTO $nome_tabela (nome, telefone) VALUES (?, ?);";
   
    $st = $conn->prepare($sql);
    //executa o insert passando os valores do vetor referente aos campos de A, B e C
    $arrayDados = [ $dados['nome'], $dados['telefone'] ];
    $st->execute($arrayDados);

  }

	public function select($nome_tabela)
  {
    $conn = $this->conn(); 
    //a interrogação será substituida pelo valor de cada indice do vetor
    $sql = "select * from $nome_tabela;";
   
    $st = $conn->prepare($sql);
    $st->execute();

		return $st->fetchAll(PDO::FETCH_CLASS);
  }

	 public function update($nome_tabela, $dados)
  {
		$id = $dados['id'];
    $conn = $this->conn(); 
    //a interrogação será substituida pelo valor de cada indice do vetor
    $sql = "UPDATE $nome_tabela SET nome = ? telefone = ? WHERE id=$id;";
   
    $st = $conn->prepare($sql);
    //executa o insert passando os valores do vetor referente aos campos de A, B e C
    $arrayDados = [ $dados['nome'], $dados['telefone'] ];
    $st->execute($arrayDados);

  }

	public function remove($nome_tabela,$id)
  {
    $conn = $this->conn(); 
    $sql = "DELETE FROM $nome_tabela WHERE id=$id;";
   
    $st = $conn->prepare($sql);
    $st->execute();
  }

  
	public function pesquisar($nome_tabela, $dados)
  {
    $campo = $dados['campo'];
    $valor = $dados['valor'];
    $conn = $this->conn(); 
    $sql = "SELECT * FROM $nome_tabela WHERE $campo LIKE '%$valor%';";
   
    $st = $conn->prepare($sql);
    $st->execute();

		return $st->fetchAll(PDO::FETCH_CLASS);
  }
	
  public function buscar($nome_tabela, $id)
  {
    $conn = $this->conn(); 
    $sql = "SELECT * from $nome_tabela WHERE id=$id;";
   
    $st = $conn->prepare($sql);
    $st->execute();

		return $st->fetchObject();
  }

  
}