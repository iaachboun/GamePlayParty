<?php
class DataHandler{
	private $host;
	private $dbdriver;
	private $dbname;
	private $username;
	private $password;

	public function __construct($host, $dbdriver, $dbname, $username, $password)
	{
		$this->host = $host;
		$this->dbdriver = $dbdriver;
		$this->dbname = $dbname;
		$this->username = $username;
		$this->password = $password;

		try {
			$this->dbh = new PDO("$this->dbdriver:host=$this->host;dbname=$this->dbname", $this->username);
			$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return true;
		} catch (PDOException $e) {
			echo "Connection with ".$this->dbdriver." failed: ".$e->getMessage();
		}
	}

	public function __destruct()
	{
		$this->dbh = null;
	}

	public function createData($sql){
		return $this->dbh->query($sql);
	}

	public function readData($sql){
		$this->query($sql);
		return $this->dbh->fetch(PDO::FETCH_ASSOC);
	}
	public function readsData($sql){
		return $this->dbh->query($sql,PDO::FETCH_ASSOC);
	}

	public function updateData($sql){
//		$this->query($sql);
//		return $this->rowCount();
		return $this->dbh->query($sql);
	}
	public function deleteData($sql){
		return $this->dbh->query($sql,PDO::FETCH_ASSOC);
	}
}
?>