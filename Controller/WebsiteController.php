<?php
require_once 'model/Logic.php';
require_once 'model/BeheerderLogic.php';
require_once 'utilities/Mail.php';

class WebsiteController
{
    public function __construct()
    {
        $this->Logic = new Logic();
        $this->BeheerderLogic = new BeheerderLogic();
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

                $_SESSION['loggedin'] = true;
                $_SESSION['rol'] = $rol;
                $_SESSION['username'] = $username;
                $_SESSION['userID'] = $userID;
                if ($_SESSION['rol'] == 0 || $_SESSION['rol'] == "0") {
                    echo "<script>window.location.href = '?request=beheer'</script>";
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
            default:

                /*$result = $this->Logic->getContent($page);
                include 'view/beheer/beheerPage.php';*/
                $this->collectpaginas();
                break;
        }


        if (isset($func)) {
            switch ($func) {
                case 'update':
                    $this->updateContent($_REQUEST['paginaID'], $_REQUEST['mytextarea']);
                    break;

                case 'addPage':
                    $this->paginaToevoegen($_REQUEST['paginatitel'], $_REQUEST['mytextarea']);
                    break;

                case 'updateBioscoop':
                    $this->updateBioscoop($_REQUEST['biosID'], $_REQUEST['biosnaam'], $_REQUEST['biosadres'], $_REQUEST['biospostcode'], $_REQUEST['biosplaats'], $_REQUEST['biosprovincie'], $_REQUEST['aantal_zalen']);
                    break;

                default:
                    $this->updateContent($_REQUEST['paginaID']);
                    break;
            }
        }
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
}
