<?php
require_once 'model/Logic.php';
require_once 'model/BeheerderLogic.php';
require_once 'model/BiosBeheerLogic.php';
require_once 'utilities/Mail.php';

class WebsiteController
{
    public function __construct()
    {
        $this->Logic = new Logic();
        $this->BeheerderLogic = new BeheerderLogic();
        $this->BiosBeheerLogic = new BiosBeheerLogic();
        $this->Mail = new Mail();

    }

    public function __destruct()
    {
    }

    public function handleRequest()
    {
        try {
            $request = isset($_REQUEST['request']) ? $_REQUEST['request'] : null;

            if (isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
            }
            if (isset($_REQUEST['pagina'])) {
                $page = $_REQUEST['pagina'];
            }
            if (isset($_REQUEST['func'])) {
                $func = $_REQUEST['func'];
            }

            if (isset($_REQUEST['contactsubmit'])) {
                $naam = $_REQUEST['naam'];
                $email = $_REQUEST['email'];
                $telefoon = $_REQUEST['telefoon'];
                $onderwerp = $_REQUEST['onderwerp'];
                $bericht = $_REQUEST['bericht'];
                $submit = $_REQUEST['contactsubmit'];
            }

            switch ($request) {
                case 'updateData':
                    $this->updateData($_REQUEST);
                    break;
                case 'beheer':
                    $this->beheerContent($page, $func);
                    break;
                case 'biosbeheer':
                    $this->biosBeheerContent($page, $func);
                    break;
                case 'biosInfo':
                    $this->collectCreateCinema($id);
                    break;
                case 'bioscopen':
                    $this->collectCreateCinemaList();
                    break;
                case 'beschickbaar':
                    $this->collectBeschikbaar($id);
                    break;
                case 'contact':
                    $this->collectContact($_REQUEST['naam'],
                        $_REQUEST['email'],
                        $_REQUEST['telefoon'],
                        $_REQUEST['onderwerp'],
                        $_REQUEST['bericht'],
                        $_REQUEST['contactsubmit']);
                    break;
                case 'cookie-beleid':
                    $this->collectCookieBeleid();
                    break;
                case 'algemene-voorwaarden':
                    $this->collectAlgemeneVoorwaarden();
                    break;
                case 'login':
                    $this->collectLogin($_REQUEST['email'], $_REQUEST['wachtwoord']);
                    break;
                case 'logout':
                    $this->collectLogOut();
                    break;
                default:
                    $page = "Home";
                    $result = $this->Logic->getContent($page);
                    include 'view/home.php';

                    break;

            }
        } catch (ValidationException $e) {
            $errors = $e->getErrors();
        }
    }

    public function collectCreateCinema($id)
    {
        $biosinfo = $this->Logic->getCinema($id);
        $vrije_plaatsen = $this->Logic->getVrijePlaatsen($id);
        include 'view/bioscopen/biosDetails.php';

    }

    public function collectCreateCinemaList()
    {
        $result = $this->Logic->getCinemas();
        include 'view/bioscopen/bioscopen.php';
    }

    public function collectBeschikbaar($id)
    {
        $result = $this->Logic->getCinema($id);
        include 'view/bioscopen/reseveringen/beschikbaar.php';
    }

    public function collectContact($naam, $email, $telefoon, $onderwerp, $bericht, $contactsubmit)
    {
        $page = "Contact";
        $result = $this->Logic->getContent($page);
        if (isset($submit)) {
            $this->Mail->sendMail($naam, $email, $telefoon, $onderwerp, $bericht);
        }
        include 'view/contact.php';
    }

    public function collectCookieBeleid()
    {
        include 'view/cookie-beleid.php';
    }

    public function collectAlgemeneVoorwaarden()
    {
        include 'view/algemene-voorwaarden.php';
    }

    public function collectLogin($email, $wachtwoord)
    {
        if (isset($_POST['login-submit'])) {

            $result = $this->Logic->getLogin($email, $wachtwoord);
            if ($result != null) {
                $username = $result[0][1];
                $rol = $result[0][4];
                $userID = $result[0][0];
                $biosID = $result[0][5];

                $_SESSION['loggedin'] = true;
                $_SESSION['rol'] = $rol;
                $_SESSION['username'] = $username;
                $_SESSION['userID'] = $userID;
                $_SESSION['biosID'] = $biosID;
                var_dump($_SESSION['rol']);
                if ($_SESSION['rol'] == 0 || $_SESSION['rol'] == "0") {
                    echo "<script>window.location.href = '?request=beheer'</script>";
                } elseif ($_SESSION['rol'] == 0 || $_SESSION['rol'] == "1") {
                    echo "<script>window.location.href = '?request=biosbeheer'</script>";
                }
            }

//            var_dump($_SESSION['username']);
        }

        include 'view/login.php';
    }

    public function collectLogOut()
    {
        session_destroy();
        include 'view/login.php';

        exit;
    }


    public function beheerContent($page, $func)
    {
        switch ($page) {
            case  'addGebruiker':
                $this->showAddUserForm();
                break;
            case 'addBioscoop':
                $this->addNewBios();
                break;
            case 'paginas':
                $this->collectpaginas();
                break;
            case 'editContent':
                $this->collectContentEdit($_REQUEST['paginaID']);
                break;
            case 'addPage':
                $this->collectAddPage();
                break;
            case 'bioscopen':
                $this->collectBeheerBioscopen();
//                $result = $this->Logic->getCinemas();
//                include 'view/beheer/beheerPage.php';
                break;
            case 'editBioscoop':
                $this->collectEditBioscoop($_REQUEST['biosID']);
                break;
            case 'gebruikers':
                $this->collectGebruikersList();
                break;
            case 'diensten':
                $this->collectDiensten();
                break;
            case 'editGebruiker':
                $this->collectEditGebruiker($_REQUEST['userID']);
                break;
            default:

                /*$result = $this->Logic->getContent($page);
                include 'view/beheer/beheerPage.php';*/
                $this->collectpaginas();
                break;
        }


        if (isset($func)) {
            switch ($func) {
                case 'addUser':
                    $this->addUser($_REQUEST['username'],$_REQUEST['email'],$_REQUEST['wachtwoord'],$_REQUEST['rol'],$_REQUEST['bioscoop'] );
                    break;
                case 'verwijderUser':
                    $this->removeUser($_REQUEST['userID']);
                    break;
                case 'verwijderPagina':
                    $this->removePagina($_REQUEST['paginaID']);
                    break;
                case 'verwijderBioscoop':
                    $this->removeBios($_REQUEST['biosID']);
                    break;
                case 'addBios':
                    $this->addNewBioscoop($_REQUEST['biosID'], $_REQUEST['biosnaam'], $_REQUEST['biosadres'], $_REQUEST['biospostcode'], $_REQUEST['biosplaats'], $_REQUEST['biosprovincie'], $_REQUEST['omschrijving'], $_REQUEST['beschickbaarheid_auto'], $_REQUEST['beschickbaarheid_fiets'], $_REQUEST['beschickbaarheid_OV'], $_REQUEST['aantal_zalen']);
                    break;
                case 'update':
                    $this->updateContent($_REQUEST['paginaID'], $_REQUEST['mytextarea']);
                    break;

                case 'addPage':
                    $this->paginaToevoegen($_REQUEST['paginatitel'], $_REQUEST['mytextarea']);
                    break;

                case 'updateBioscoop':
                    $this->updateBioscoop($_REQUEST['biosID'], $_REQUEST['biosnaam'], $_REQUEST['biosadres'], $_REQUEST['biospostcode'], $_REQUEST['biosplaats'], $_REQUEST['biosprovincie'], $_REQUEST['aantal_zalen']);
                    break;
                case 'updateGebruiker':
                    $this->updateGebruiker($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['wachtwoord'], $_REQUEST['userID']);
                    break;

                default:
                    $this->updateContent($_REQUEST['paginaID']);
                    break;
            }
        }
    }

    public function addUser($username,$email,$password,$rol,$bioscoop){
        $biosID = $this->BeheerderLogic->getBiosId($bioscoop)->fetch(PDO::FETCH_ASSOC);
        $result = $this->BeheerderLogic->addNewUser($username,$email,$password,$rol,$biosID);
        return $result;
    }


    public function showAddUserForm(){
        $result = $this->BeheerderLogic->showNewUserForm();
        include 'view/beheer/addBioscopen.php';
        return $result;
    }

    public function removeUser($id){
        $result = $this->BeheerderLogic->verwijderUser($id);
        return $result;
    }

    public function removePagina($id)
    {
        $result = $this->BeheerderLogic->verwijderPagina($id);
        return $result;

    }

    public function removeBios($id)
    {
        $result = $this->BeheerderLogic->verwijderBios($id);
        return $result;
    }

    public function addNewBioscoop($biosID, $biosnaam, $biosadres, $biospostcode, $biosplaats, $biosprovincie, $omschrijving, $beschickbaarheid_auto, $beschickbaarheid_fiets, $beschickbaarheid_OV, $aantal_zalen)
    {
        $result = $this->BeheerderLogic->addBiosForm($biosID, $biosnaam, $biosadres, $biospostcode, $biosplaats, $biosprovincie, $omschrijving, $beschickbaarheid_auto, $beschickbaarheid_fiets, $beschickbaarheid_OV, $aantal_zalen);
        return $result;
    }


    public function addNewBios()
    {
        $result = $this->BeheerderLogic->addBios();
        include 'view/beheer/addBioscopen.php';
        return $result;
    }

    public function collectpaginas()
    {
        $result = $this->BeheerderLogic->beheerContentPaginas();
        include 'view/beheer/beheerContentPaginas.php';
        return $result;
    }

    public function collectContentEdit($paginaID)
    {
        $result = $this->BeheerderLogic->beheerContentEdit($paginaID);
        include 'view/beheer/beheerEditContent.php';
        return $result;

    }

    public function updateContent($paginaID, $mytextarea)
    {
        $result = $this->BeheerderLogic->beheerContentUpdate($paginaID, $mytextarea);
        include 'view/beheer/beheerEditContent.php';
        return $result;
    }


    public function updateData($request)
    {
        $id = 'beheerContent' . $request['id'];
        var_dump($request);
//        var_dump($_REQUEST);
//        $result = $this->Logic->updateContent();

//        return $result;
    }

    public function collectAddPage()
    {
        $result = $this->BeheerderLogic->collectAddPage();
        include 'view/beheer/addpage.php';
        return $result;
    }

    public function paginaToevoegen($paginatitel, $mytextarea)
    {
        $result = $this->BeheerderLogic->paginaToevoegen($paginatitel, $mytextarea);

        return $result;

    }

    public function collectBeheerBioscopen()
    {
        $result = $this->BeheerderLogic->beheerBioscoopSelect();
        include 'view/beheer/beheerbioscopen.php';
        return $result;
    }

    public function collectEditBioscoop($biosID)
    {
        $result = $this->BeheerderLogic->beheerEditBioscoop($biosID);
        include 'view/beheer/editBioscoop.php';
        return $result;
    }

    public function updateBioscoop($biosID, $biosnaam, $biosadres, $biospostcode, $biosplaats, $biosprovincie, $aantal_zalen)
    {
        $result = $this->BeheerderLogic->beheerUpdateBioscoop($biosID, $biosnaam, $biosadres, $biospostcode, $biosplaats, $biosprovincie, $aantal_zalen);

        return $result;

    }

    public function collectGebruikersList()
    {
        $result = $this->BeheerderLogic->gebruikersList();
        include 'view/beheer/beheerGebruikers.php';
        return $result;
    }

    public function collectDiensten()
    {
        $result = $this->BeheerderLogic->dienstenList();
        
        include 'view/beheer/beheerdiensten.php';
        return $result;
    }
    

    public function collectEditGebruiker($userID)
    {
        $result = $this->BeheerderLogic->editGebruiker($userID);
        include 'view/beheer/editGebruiker.php';
        return $result;
    }

    public function updateGebruiker($username, $email, $wachtwoord, $userID)
    {
        $result = $this->BeheerderLogic->updateGebruiker($username, $email, $wachtwoord, $userID);
        return $result;
    }

    //biosbeheer
    public function biosBeheerContent($page, $func)
    {
        switch ($page) {
            case 'paginas':
                $this->biosCollectpaginas();
                break;
            case 'editContent':
                $this->biosCollectContentEdit($_REQUEST['paginaID']);
                break;
            case 'bioscopen':
                $this->biosCollectBeheerBioscopen();
//                $result = $this->Logic->getCinemas();
//                include 'view/beheer/beheerPage.php';
                break;
            case 'editBioscoop':
                $this->biosCollectEditBioscoop($_REQUEST['biosID']);
                break;
            case 'gebruikers':
                $this->biosCollectGebruikersList();
                break;
            case 'editGebruiker':
                $this->biosCollectEditGebruiker($_REQUEST['userID']);
                break;
            case 'beschikbaarheden':
                $this->biosCollectBeschikbaarheden();
                break;
            case 'addBeschikbaarheid';
                $this->biosCollectAddBeschikbaarheid($_SESSION['biosID']);

                break;
            default:

                /*$result = $this->Logic->getContent($page);
                include 'view/beheer/beheerPage.php';*/
                $this->biosCollectpaginas();
                break;
        }


        if (isset($func)) {
            switch ($func) {
                case 'update':
                    $this->biosUpdateContent($_REQUEST['paginaID'], $_REQUEST['mytextarea']);
                    break;

                case 'updateBioscoop':
                    $this->biosUpdateBioscoop($_REQUEST['biosID'], $_REQUEST['biosnaam'], $_REQUEST['biosadres'], $_REQUEST['biospostcode'], $_REQUEST['biosplaats'], $_REQUEST['biosprovincie'], $_REQUEST['aantal_zalen']);
                    break;
                case 'updateGebruiker':
                    $this->biosUpdateGebruiker($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['wachtwoord'], $_REQUEST['userID']);
                    break;

                case 'addNewBeschikbaarheid':
                    $this->addNewBeschikbaarheid($_REQUEST['biosID'], $_REQUEST['date'], $_REQUEST['begintijd'], $_REQUEST['eindtijd'], $_REQUEST['zaal'], $_REQUEST['console']);
                    break;

                default:
                    $this->biosUpdateContent($_REQUEST['paginaID']);
                    break;
            }
        }
    }


    public function biosCollectpaginas()
    {
        $result = $this->BiosBeheerLogic->beheerContentPaginas();
        include 'view/biosbeheer/beheerContentPaginas.php';
        return $result;
    }

    public function biosCollectContentEdit($paginaID)
    {
        $result = $this->BiosBeheerLogic->beheerContentEdit($paginaID);
        include 'view/biosbeheer/beheerEditContent.php';
        return $result;

    }

    public function biosUpdateContent($paginaID, $mytextarea)
    {
        $result = $this->BiosBeheerLogic->beheerContentUpdate($paginaID, $mytextarea);
        include 'view/biosbeheer/beheerEditContent.php';
        return $result;
    }

    public function biosUpdateData($request)
    {
        $id = 'beheerContent' . $request['id'];
        var_dump($request);
//        var_dump($_REQUEST);
//        $result = $this->Logic->updateContent();

//        return $result;
    }

    public function biosCollectAddPage()
    {
        $result = $this->BiosBeheerLogic->collectAddPage();
        include 'view/biosbeheer/addpage.php';
        return $result;
    }

    public function biosPaginaToevoegen($paginatitel, $mytextarea)
    {
        $result = $this->BiosBeheerLogic->paginaToevoegen($paginatitel, $mytextarea);

        return $result;

    }

    public function biosCollectBeheerBioscopen()
    {
        $result = $this->BiosBeheerLogic->beheerBioscoopSelect();
        include 'view/biosbeheer/beheerbioscopen.php';
        return $result;
    }

    public function biosCollectEditBioscoop($biosID)
    {
        $result = $this->BiosBeheerLogic->beheerEditBioscoop($biosID);
        include 'view/biosbeheer/editBioscoop.php';
        return $result;
    }

    public function biosUpdateBioscoop($biosID, $biosnaam, $biosadres, $biospostcode, $biosplaats, $biosprovincie, $aantal_zalen)
    {
        $result = $this->BiosBeheerLogic->beheerUpdateBioscoop($biosID, $biosnaam, $biosadres, $biospostcode, $biosplaats, $biosprovincie, $aantal_zalen);

        return $result;

    }

    public function biosCollectGebruikersList()
    {
        $result = $this->BiosBeheerLogic->gebruikersList();
        include 'view/biosbeheer/beheerGebruikers.php';
        return $result;
    }

    public function biosCollectEditGebruiker($userID)
    {
        $result = $this->BiosBeheerLogic->editGebruiker($userID);
        include 'view/biosbeheer/editGebruiker.php';
        return $result;
    }

    public function biosUpdateGebruiker($username, $email, $wachtwoord, $userID)
    {
        $result = $this->BiosBeheerLogic->updateGebruiker($username, $email, $wachtwoord, $userID);
        return $result;
    }


    public function biosCollectBeschikbaarheden()
    {
        $result = $this->BiosBeheerLogic->beschikbaarhedenList();
        include 'view/biosbeheer/beschikbaarheden.php';
        return $result;
    }


    public function biosCollectAddBeschikbaarheid($biosID)
    {
        $result = $this->BiosBeheerLogic->collectAddBeschikbaarheid($biosID);
        include 'view/biosbeheer/addBeschikbaarheid.php';
        return $result;
    }

    public function addNewBeschikbaarheid($biosID, $date, $begintijd, $eindtijd, $zaal, $console)
    {
        $result = $this->BiosBeheerLogic->addNewBeschikbaarheid($biosID, $date, $begintijd, $eindtijd, $zaal, $console);
        include 'view/biosbeheer/addBeschikbaarheid.php';
        return $result;
    }


}
