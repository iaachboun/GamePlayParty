<?php
require_once 'model/DataHandler.php';
require_once 'utilities/beheer/PaginaSelect.php';
require_once 'utilities/beheer/PaginaEdit.php';
require_once 'utilities/beheer/AddPage.php';
require_once 'utilities/beheer/BeheerBioscopen.php';
require_once 'utilities/beheer/BeheerEditBioscoop.php';
require_once 'utilities/beheer/GebruikersList.php';
require_once 'utilities/beheer/EditGebruikerForm.php';
require_once 'utilities/beheer/addNewBiosForm.php';

class BeheerderLogic
{

    public function __construct()
    {

        $this->DataHandler = new DataHandler("localhost", "mysql", "GamePlayParty", "ilias", "12345");
        $this->PaginaSelect = new PaginaSelect();
        $this->PaginaEdit = new PaginaEdit();
        $this->AddPage = new AddPage();
        $this->BeheerBioscopen = new BeheerBioscopen();
        $this->BeheerEditBioscoop = new BeheerEditBioscoop();
        $this->GebruikersList = new GebruikersList();
        $this->EditGebruikerForm = new EditGebruikerForm();
        $this->addBiosForm = new addNewBiosForm();

    }

    public function __destruct()
    {
    }

    public function beheerContentPaginas()
    {
        $sql = "select * from contentmanagement;";
        $result = $this->DataHandler->getData($sql);
        $makePaginaSelect = $this->PaginaSelect->makePaginaSelect($result);
        return $makePaginaSelect;
    }

    public function beheerContentEdit($paginaID)
    {
        $sql = "select * from contentmanagement where paginaID = '$paginaID';";
        $result = $this->DataHandler->getData($sql);
        $makePaginaEditor = $this->PaginaEdit->paginaEditCreate($result);
        return $makePaginaEditor;
    }

    public function beheerContentUpdate($paginaID, $mytextarea)
    {
        if (isset($paginaID, $mytextarea)) {
            $result = $this->DataHandler->updatePreparedQueryData($paginaID, $mytextarea);
            if ($result == null) {
                header("?request=beheer&pagina=editContent&paginaID=$paginaID");
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
                echo "<script>window.location.href = '?request=beheer&pagina=paginas'</script>";
            }
        }
        return $result;
    }

    public function beheerBioscoopSelect()
    {
        $sql = "select * from bioscopen;";
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
                echo "<script>window.location.href = '?request=beheer&pagina=editBioscoop&biosID=$biosID'</script>";
            }
        }
        return $result;

    }

    public function gebruikersList()
    {
        $sql = "SELECT userID, username, email, wachtwoord, rol, biosnaam
FROM users
LEFT JOIN bioscopen
ON users.biosID = bioscopen.biosID";
        $result = $this->DataHandler->getData($sql);
        $makeGebruikersList = $this->GebruikersList->makeGebruikersList($result);
        return $makeGebruikersList;
    }

    public function editGebruiker($userID)
    {
        $sql = "SELECT * FROM users WHERE userID = $userID";
        $result = $this->DataHandler->getData($sql);
        $editGebruikerForm = $this->EditGebruikerForm->makeEditGebruikerForm($result);
        return $editGebruikerForm;
    }

    public function updateGebruiker($username, $email, $wachtwoord, $userID)
    {
        if (isset($username, $email, $wachtwoord, $userID)) {
            $result = $this->DataHandler->beheerUpdateGebruikerData($username, $email, $wachtwoord, $userID);
            if ($result != null) {
                echo "<script>window.location.href = '?request=beheer&pagina=editGebruiker&userID=$userID'</script>";
            }
        }
        return $result;
    }


    public function addBios()
    {
        $makePaginaSelect = $this->addBiosForm->newBios();
        return $makePaginaSelect;
    }

    public function addBiosForm($biosID, $biosnaam, $biosadres, $biospostcode, $biosplaats, $biosprovincie, $omschrijving, $beschickbaarheid_auto, $beschickbaarheid_fiets, $beschickbaarheid_OV, $aantal_zalen)
    {
        $sql = "INSERT INTO bioscopen(biosnaam, biosadres, biospostcode, biosplaats, biosprovincie, omschrijving, beschikbaarheid_auto, beschikbaarheid_fiets, beschikbaarheid_ov, aantal_zalen) VALUES ('$biosnaam','$biosadres','$biospostcode','$biosplaats','$biosprovincie','$omschrijving','$beschickbaarheid_auto','$beschickbaarheid_fiets','$beschickbaarheid_OV','$aantal_zalen')";
        $result = $this->DataHandler->getData($sql);
        if ($result != null) {
            echo "<script>window.location.href = '?request=beheer&pagina=bioscopen'</script>";
        }
        return $result;
    }

    public function verwijderBios($id)
    {
        $sql = "DELETE FROM `bioscopen` WHERE biosID = $id";
        $result = $this->DataHandler->getData($sql);
        if ($result != null) {
            echo "<script>window.location.href = '?request=beheer&pagina=bioscopen'</script>";
        }
        return $result;
    }

    public function verwijderPagina($id)
    {
        $sql = "DELETE FROM `contentmanagement` WHERE paginaID = $id";
        var_dump($sql);
        $result = $this->DataHandler->getData($sql);
        if ($result != null) {
            echo "<script>window.location.href = '?request=beheer&pagina=paginas'</script>";
        }
        return $result;
    }


}