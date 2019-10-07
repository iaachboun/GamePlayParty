<?php
require_once 'model/DataHandler.php';
require_once 'utilities/beheer/PaginaSelect.php';
require_once 'utilities/beheer/PaginaEdit.php';
require_once 'utilities/beheer/AddPage.php';
require_once 'utilities/beheer/BeheerBioscopen.php';
require_once 'utilities/beheer/BeheerEditBioscoop.php';

class BeheerderLogic
{

    public function __construct()
    {

        $this->DataHandler = new DataHandler("localhost", "mysql", "GamePlayParty", "root", "");
        $this->PaginaSelect = new PaginaSelect();
        $this->PaginaEdit = new PaginaEdit();
        $this->AddPage = new AddPage();
        $this->BeheerBioscopen = new BeheerBioscopen();
        $this->BeheerEditBioscoop = new BeheerEditBioscoop();

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
                header("?request=beheer");
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

}