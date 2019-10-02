<?php
require_once 'model/DataHandler.php';
require_once 'utilities/BiosDetailCreate.php';
require_once 'utilities/biosVrijePlaatsen.php';

class Logic
{
    public function __construct()
    {

        $this->DataHandler = new DataHandler("localhost", "mysql", "GamePlayParty", "root", "");
        $this->BiosDetailCreate = new biosDetailCreate();
        $this->BiosVrijePlaatsen = new biosVrijePlaatsen();

    }

    public function __destruct()
    {
    }

    public function getCinema($id)
    {
        $sql = "SELECT * FROM `bioscopen` WHERE biosID =" . $id;
        $result = $this->DataHandler->getData($sql);
        $results = $this->BiosDetailCreate->createBiosDetail($result);

        return $results;
    }

    public function getVrijePlaatsen($id)
    {
        $sql = "SELECT DATE_FORMAT(`datum`, '%d-%m-%Y'), TIME_FORMAT(`begin_tijd`, '%h:%i'), TIME_FORMAT(`eind_tijd`, '%h:%i'), zaal, aantal_plaatsen FROM `vrije_reserveringen` WHERE biosID = '$id'";
        $result = $this->DataHandler->getData($sql);
        $vrije_plaatsen = $this->BiosVrijePlaatsen->biosCreateVrijePlaatsen($result);
        return $vrije_plaatsen;
    }


    public function getCinemas()
    {
        $sql = "SELECT biosID, biosnaam, omschrijving FROM `bioscopen`";
        $result = $this->DataHandler->getData($sql);

        return $result;
    }

    public function getContent($page)
    {
        $sql = "SELECT * FROM contentManagement WHERE contentManagement.pagina = '$page'";

        $result = $this->DataHandler->getData($sql);

        return $result;
    }

}
