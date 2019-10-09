<?php
require_once 'model/DataHandler.php';
require_once 'utilities/biosBeheer/BiosPaginaSelect.php';
require_once 'utilities/biosBeheer/BiosPaginaEdit.php';
require_once 'utilities/biosBeheer/BiosAddPage.php';
require_once 'utilities/biosBeheer/BiosBeheerBioscopen.php';
require_once 'utilities/biosBeheer/BiosBeheerEditBioscoop.php';
require_once 'utilities/biosBeheer/BiosGebruikersList.php';
require_once 'utilities/biosBeheer/BiosEditGebruikerForm.php';
require_once 'utilities/biosBeheer/AddBeschikbaarheidFormulier.php';
require_once 'utilities/biosBeheer/ZaalSelect.php';
require_once 'utilities/biosBeheer/ConsoleSelect.php';
require_once 'utilities/biosBeheer/BeschikbaarheidList.php';

class BiosBeheerLogic
{

    public function __construct()
    {

        $this->DataHandler = new DataHandler("localhost", "mysql", "GamePlayParty", "root", "");
        $this->PaginaSelect = new BiosPaginaSelect();
        $this->PaginaEdit = new BiosPaginaEdit();
        $this->AddPage = new BiosAddPage();
        $this->BeheerBioscopen = new BiosBeheerBioscopen();
        $this->BeheerEditBioscoop = new BiosBeheerEditBioscoop();
        $this->GebruikersList = new BiosGebruikersList();
        $this->EditGebruikerForm = new BiosEditGebruikerForm();
        $this->AddBeschikbaarheidFormulier = new AddBeschikbaarheidFormulier();
        $this->ZaalSelect = new ZaalSelect();
        $this->ConsoleSelect = new ConsoleSelect();
        $this->BeschikbaarheidList = new BeschikbaarheidList();

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
    public function verwijderRes($id) {
        $sql = "DELETE FROM `reserveringen` WHERE reserveringsID = $id";
        $result = $this->DataHandler->getData($sql);
        if ($result != null) {
            echo "<script>window.location.href = '?request=beheer&pagina=beschikbaarheden'</script>";
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

    public function updateGebruiker($username, $email, $wachtwoord, $userID)
    {
        if (isset($username, $email, $wachtwoord, $userID)) {
            $result = $this->DataHandler->biosBeheerUpdateGebruikerData($username, $email, $wachtwoord, $userID);
            if ($result != null) {
                echo "<script>window.location.href = '?request=beheer&pagina=editGebruiker&userID=$userID'</script>";
            }
        }
        return $result;
    }

    public function beschikbaarhedenList(){
        $biosID = $_SESSION['biosID'];
        $sql = "select reserveringsID, reserveringsdatum, reservering_begin_tijd, reservering_eind_tijd, zaal, gereserveerd from reserveringen natural join zalen where biosID = '$biosID'";
        $result = $this->DataHandler->getData($sql);
        $makeBeschikbaarheidList = $this->BeschikbaarheidList->makeBeschikbaarhediList($result);
        return $makeBeschikbaarheidList;
    }

    public function collectAddBeschikbaarheid($biosID)
    {
        $zaalSelectSQL = "SELECT zaal, zaal_id FROM zalen where biosID = '$biosID';";
        var_dump($zaalSelectSQL);
        $zaalSelectSQLResult = $this->DataHandler->getData($zaalSelectSQL);
        var_dump($zaalSelectSQLResult);
        $zaalSelect = $this->ZaalSelect->makeZaalSelect($zaalSelectSQLResult);

        $consoleSelectSQL = "SELECT console_id, console FROM consoles";
        $consoleSelectSQLResult = $this->DataHandler->getData($consoleSelectSQL);
        $consoleSelect = $this->ConsoleSelect->makeConsoleSelect($consoleSelectSQLResult);

        $result = $this->AddBeschikbaarheidFormulier->makeAddBeschikbaarheidFormulier($zaalSelect, $consoleSelect);
        return $result;
    }

    public function addNewBeschikbaarheid($biosID, $date, $begintijd, $eindtijd, $zaal, $console)
    {
//        $result = $this->DataHandler->addNewBeschikbaarheid($biosID, $date, $begintijd, $eindtijd, $zaal, $console);
//        return $result;
        if (isset($biosID, $date, $begintijd, $eindtijd, $zaal, $console)) {
            $result = $this->DataHandler->addNewBeschikbaarheid($biosID, $date, $begintijd, $eindtijd, $zaal, $console);
            if ($result != null) {
                echo "<script>window.location.href = '?request=biosbeheer&pagina=addBeschikbaarheid&biosID=$biosID'</script>";
            }
        }
    }

}