<?php 
/**
* 
*/
	class ConexaoBanco 
	{

		public $connectionString;
		public $dataSet;
		private $sqlQuery;

		private $serverName;
		private $userName;
		private $password;
		private $dbName;

		
		function ConexaoBanco()
		{
			$this->serverName = "localhost";
		 	$this->userName = "root";
		 	$this->password = "chuck";
		 	$this->dbName = "popule";
		}

		function conecta()    {
		    $this->connectionString = new mysqli($this->serverName, $this->userName, $this->password, $this->dbName);		    
		}

		function desconecta() {
		    $this->connectionString->close();
		}

		function procuraProfissao($op){
			$sql = "SELECT qtd FROM Profissoes WHERE profissao LIKE '".$_POST[$op]."'";
			$result = mysqli_query($this->connectionString, $sql);

			if (mysqli_num_rows($result) > 0) {
			    // output data of each row
			    while($row = mysqli_fetch_assoc($result)) {
			        $sql = "UPDATE Profissoes SET qtd=qtd+1 WHERE profissao='".$_POST[$op]."'";
			        $this->connectionString->query($sql);
			    }
			} else {
			    $sql = "INSERT INTO Profissoes (qtd, profissao)
			                VALUES (1, '".$_POST[$op]."')";
			     $this->connectionString->query($sql);
			}
		}
                
                function preencheTabela(){
                    $sql = "SELECT DISTINCT profissao, SUM( qtd ) as qtd FROM  Profissoes GROUP BY profissao ORDER BY SUM(qtd) DESC";
                    $result = mysqli_query($this->connectionString, $sql);
                    return $result;
		}

	}

 ?>