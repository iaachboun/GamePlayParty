<?php
class datahandler {
	private $host;
	private $dbdriver;
	private $dbname;
	private $username;
	private $password;

	public function __construct($host, $dbdriver, $dbname, $username, $password){
		$this->host = $host;
		$this->dbdriver = $dbdriver;
		$this->dbname = $dbname;
		$this->username = $username;
		$this->password = $password;

		try{
			$this->dbh = new PDO("$this->dbdriver:host=$this->host:dbname=$this->dbname", $this->username, $this->password);
			$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e){
			echo "connection with " . $this->dbdriver . " failed: ". $e->getMessage();
		}
	}

	public function __destruct(){
		$this->dbh = null;
	}
}