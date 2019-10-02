<?php
require_once 'model/Logic.php';
require_once 'utilities/Mail.php';

class WebsiteController
{
    public function __construct()
    {
        $this->Logic = new Logic();
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

            if(isset($_REQUEST['contactsubmit'])){
                $naam = $_REQUEST['naam'];
                $email =$_REQUEST['email'];
                $telefoon = $_REQUEST['telefoon'];
                $onderwerp = $_REQUEST['onderwerp'];
                $bericht = $_REQUEST['bericht'];
                $submit = $_REQUEST['contactsubmit'];
            }

            switch ($request) {
                case 'beheer':
                    $this->beheerContent($page);
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
                    $this->collectContact($naam, $email, $telefoon, $onderwerp, $bericht, $submit);
                    break;
                case 'cookie-beleid':
                    $this->collectCookieBeleid();
                    break;
                case 'algemene-voorwaarden':
                    $this->collectAlgemeneVoorwaarden();
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
        include 'view/bioscopen/reseveringen/beschickbaar.php';
    }

    public function collectContact($naam, $email, $telefoon, $onderwerp, $bericht, $submit)
    {
        if(isset($submit)){
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

    public function beheerContent($page)
    {
        switch ($page) {
            case 'contact':
                include 'view/contact.php';
                break;
            case 'bioscopen':
                $result = $this->Logic->getCinemas();
                include 'view/beheer/beheerPage.php';
                break;
            default:
                $result = $this->Logic->getContent($page);
                include 'view/beheer/beheerPage.php';
                break;
        }
    }
}
