<?php
require_once 'model/datahandler.php';

class Logic
{
    public function __construct()
    {

        $this->DataHandler = new DataHandler("localhost", "mysql", "GamePlayParty", "ilias", "12345");

    }

    public function __destruct()
    {
    }

    public function getCinema($id)
    {
        $sql = "SELECT * FROM `bioscopen` WHERE biosID =" .  $id;
        $result = $this->DataHandler->getData($sql);
        return $result;
    }

    public function getCinemas()
    {
        $sql = "SELECT biosID, biosnaam FROM `bioscopen`";
        $result = $this->DataHandler->getData($sql);

        return $result;
    }
}
