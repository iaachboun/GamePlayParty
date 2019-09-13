<?php
require_once 'model/DataHandler.php';

class Logic
{
    public function __construct()
    {

        $this->DataHandler = new DataHandler("localhost", "mysql", "GamePlayParty", "root", "");

    }

    public function __destruct()
    {
    }

    public function showtextLogic()
    {
        $html = '<h2>logic 1</h2>';
        return $html;
    }

    public function getCinemas() {
        $sql = "SELECT `biosnaam` FROM `bioscopen`";
        $result = $this->DataHandler->getData($sql);

        return $result;
    }

}
