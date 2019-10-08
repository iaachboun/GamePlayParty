<?php
require_once 'model/DataHandler.php';
require_once 'utilities/biosBeheer/BiosPaginaSelect.php';
require_once 'utilities/biosBeheer/BiosPaginaEdit.php';
require_once 'utilities/biosBeheer/BiosAddPage.php';
require_once 'utilities/biosBeheer/BiosBeheerBioscopen.php';
require_once 'utilities/biosBeheer/BiosBeheerEditBioscoop.php';
require_once 'utilities/biosBeheer/BiosGebruikersList.php';
require_once 'utilities/biosBeheer/BiosEditGebruikerForm.php';

class BiosBeheerLogic
{

    public function __construct()
    {

        $this->DataHandler = new DataHandler("localhost", "mysql", "GamePlayParty", "ilias", "12345");
        $this->PaginaSelect = new BiosPaginaSelect();
        $this->PaginaEdit = new BiosPaginaEdit();
        $this->AddPage = new BiosAddPage();
        $this->BeheerBioscopen = new BiosBeheerBioscopen();
        $this->BeheerEditBioscoop = new BiosBeheerEditBioscoop();
        $this->GebruikersList = new BiosGebruikersList();
        $this->EditGebruikerForm = new BiosEditGebruikerForm();

    }

    public function __destruct()
    {
    }

    public function beheerContentPaginas()
    {
        $biosID = $_SESSION['biosID'];
        $sql = "select * from contentmanagement WHERE biosID = '$biosID';";
        $result = $this->DataHandler->getData($sql);
        $makePaginaSelect = $this->PaginaSelect->makePaginaSelect($result);
        return $makePaginaSelect;
    }

    public function beheerContentEdit($paginaID)
    {
        $biosID = $_SESSION['biosID'];
        $sql = "select * from contentmanagement where paginaID = '$paginaID' AND biosID = '$biosID';";
        $result = $this->DataHandler->getData($sql);
        $makePaginaEditor = $this->PaginaEdit->paginaEditCreate($result);
        return $makePaginaEditor;
    }

    public function beheerContentUpdate($paginaID, $mytextarea)
    {
        if (isset($paginaID, $mytextarea)) {
            $result = $this->DataHandler->updatePreparedQueryData($paginaID, $mytextarea);
            if ($result == null) {
                header("?request=biosbeheer&pagina=editContent&paginaID=$paginaID");
            }
        }
        return $result;
    }

    public function collectAddPage()
    {
        $result = $this->AddPage->paginaToevoegen();
        return $result;

    }

    public function paginaToevoegen($paginatitel, $mytextarea)
    {
        if (isset($paginatitel, $mytextarea)) {
            $result = $this->DataHandler->addPreparedQueryData($paginatitel, $mytextarea);
            if ($result != null) {
                header("?request=biosbeheer");
            }
        }
        return $result;
    }

    public function beheerBioscoopSelect()
    {
        $biosID = $_SESSION['biosID'];
        $sql = "select * from bioscopen where biosID = '$biosID';";
        $result = $this->DataHandler->getData($sql);
        $makeBeheerBioscoopSelect = $this->BeheerBioscopen->makeBioscopenselect($result);
        return $makeBeheerBioscoopSelect;
    }

    public function beheerEditBioscoop($biosID)
    {
        $sql = "select * from bioscopen where biosID = $biosID";
        $result = $this->DataHandler->getData($sql);
        $makeBeheerEditBioscoopForm = $this->BeheerEditBioscoop->makeBeheerEditBioscoopForm($result);
        return $makeBeheerEditBioscoopForm;
    }

    public function beheerUpdateBioscoop($biosID, $biosnaam, $biosadres, $biospostcode, $biosplaats, $biosprovincie, $aantal_zalen)
    {

        if (isset($biosID, $biosnaam, $biosadres, $biospostcode, $biosplaats, $biosprovincie, $aantal_zalen)) {
            $result = $this->DataHandler->updateBioscoopData($biosID, $biosnaam, $biosadres, $biospostcode, $biosplaats, $biosprovincie, $aantal_zalen);
            if ($result != null) {
                echo "<script>window.location.href = '?request=biosbeheer&pagina=editBioscoop&biosID=$biosID'</script>";
            }
        }
        return $result;

    }

    public function gebruikersList()
    {
        $biosID = $_SESSION['biosID'];
        $sql = "SELECT userID, username, email, wachtwoord, rol, biosnaam
FROM users
LEFT JOIN bioscopen
ON users.biosID = bioscopen.biosID
WHERE users.biosID = '$biosID'";
        $result = $this->DataHandler->getData($sql);
        $makeGebruikersList = $this->GebruikersList->makeGebruikersList($result);
        return $makeGebruikersList;
    }

    public function editGebruiker($userID){
        $sql = "SELECT * FROM users WHERE userID = $userID";
        $result = $this->DataHandler->getData($sql);
        $editGebruikerForm = $this->EditGebruikerForm->makeEditGebruikerForm($result);
        return $editGebruikerForm;
    }

    public function updateGebruiker($username, $email, $wachtwoord, $userID){
        if (isset($username, $email, $wachtwoord, $userID)) {
            $result = $this->DataHandler->beheerUpdateGebruikerData($username, $email, $wachtwoord, $userID);
            if ($result != null) {
                echo "<script>window.location.href = '?request=beheer&pagina=editGebruiker&userID=$userID'</script>";
            }
        }
        return $result;
    }
}