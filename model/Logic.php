<?php
require_once 'model/DataHandler.php';
require_once 'utilities/BiosDetailCreate.php';
require_once 'utilities/BiosVrijePlaatsen.php';

class Logic
{
    public function __construct()
    {
        $this->DataHandler = new DataHandler("localhost", "mysql", "GamePlayParty", "ilias", "12345");
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
        $sql = "SELECT DATE_FORMAT(`datum`, '%d %M %Y'), begin_tijd, eind_tijd, aantal_plaatsen FROM `vrije_reserveringen` WHERE biosID = '$id'";
        $result = $this->DataHandler->getData($sql);
        $vrije_plaatsen = $this->BiosVrijePlaatsen->BiosCreateVrijePlaatsen($result);
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
        $sql = "SELECT * FROM contentmanagement WHERE contentmanagement.pagina = '$page'";

        $result = $this->DataHandler->getData($sql);

        return $result;
    }

    public function getLogin($email, $wachtwoord)
    {
        if (isset($email, $wachtwoord)) {
            $result = $this->DataHandler->getPreparedQueryData($email, $wachtwoord);
            if ($result == null) {
                echo 'verkeerde gegevens';
            } else {
                echo 'ingelogd';
            }
        }
        return $result;

    }

    public function updateContent($data, $page)
    {
        $sql = "UPDATE `contentmanagement` SET `content`='$data' WHERE pagina = '$page';";

        $result = $this->DataHandler->getData($sql);

        return $result;
    }
}
