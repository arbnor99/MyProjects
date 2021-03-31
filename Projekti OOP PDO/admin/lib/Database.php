<?php

class Database{
	private $dbname='kursi';
	private $host='localhost';
	private $username='root' ;
	private $password='';
	private $charset='utf8mb4';

	public function connect(){
		try{
			$dsn="mysql:host=".$this->host.';dbname='.$this->dbname.';charset='.$this->charset;
			$pdo=new PDO($dsn, $this->username, $this->password);
			$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $pdo;
		}catch(Exception $e){
			echo "Lidhja me databazen deshtoi ".$e->getMessage();
		}
	}
}
?>