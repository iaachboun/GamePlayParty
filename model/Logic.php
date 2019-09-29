<?php
require_once 'model/DataHandler.php';

class Logic {
	public function __construct() {

		$this->DataHandler = new DataHandler( "localhost", "mysql", "GamePlayParty", "root", "" );

	}

	public function __destruct() {
	}

	public function getCinema( $id ) {
		$sql    = "SELECT * FROM `bioscopen` WHERE biosID =" . $id;
		$result = $this->DataHandler->getData( $sql );

		return $result;
	}

	public function getVrijePlaatsen( $id ) {
    	$sql = "SELECT DATE_FORMAT(`datum`, '%d %M %Y'), begin_tijd, eind_tijd, aantal_plaatsen FROM `vrije_reserveringen` WHERE biosID = '$id'";
    	$vrije_plaatsen =  $this->DataHandler->getData($sql);
    	return $vrije_plaatsen;
	}


	public function getCinemas() {
		$sql    = "SELECT biosID, biosnaam, omschrijving FROM `bioscopen`";
		$result = $this->DataHandler->getData( $sql );

		return $result;
	}

	public function getContent( $page ) {
		$sql = "SELECT * FROM contentManagement WHERE contentManagement.pagina = '$page'";

		$result = $this->DataHandler->getData( $sql );

		return $result;
	}

}
