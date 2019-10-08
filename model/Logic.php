<?php
require_once 'model/DataHandler.php';
require_once 'utilities/BiosDetailCreate.php';
require_once 'utilities/BiosVrijePlaatsen.php';

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
        $sql = "SELECT * FROM `contentmanagement` 
WHERE biosID = " . $id;
        $result = $this->DataHandler->getData($sql);
        $results = $this->BiosDetailCreate->createBiosDetail($result);

        return $results;
    }

    public function getVrijePlaatsen($id)
    {
        $sql = "SELECT reserveringsID, DATE_FORMAT(`reserveringsdatum`, '%d-%m-%Y'), TIME_FORMAT(`reservering_begin_tijd`, '%h:%i'), TIME_FORMAT(`reservering_eind_tijd`, '%h:%i'), zaal_id, zaal, aantal_stoelen, rolstoelplaatsen, schermgrootte, console_id, console
 FROM `reserveringen`
   natural join zalen
   natural join consoles
  WHERE biosID = '$id'
   and gereserveerd = 0";
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
                echo "<script>alert('verkeerde gegevens')</script>";
            } else {
                echo "<script>window.href.location('?request=beheer')</script>";
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
