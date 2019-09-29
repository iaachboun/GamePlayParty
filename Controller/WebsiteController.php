<?php
require_once 'model/Logic.php';


class WebsiteController
{
    public function __construct()
    {
        $this->Logic = new Logic();

    }

    public function __destruct()
    {
    }

    public function handleRequest()
    {
        try {
            $request = isset($_REQUEST['request']) ? $_REQUEST['request'] : null;
            $id = $_REQUEST['id'];
            $page = "footerContent";
            $footerContent = $this->Logic->getContent($page);
            switch ($request) {
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
                    $this->collectContact();
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

    public function collectCreateCinema($id){
        $biosinfo = $this->Logic->getCinema($id);
        $vrije_plaatsen = $this->Logic->getVrijePlaatsen($id);
        include 'view/bioscopen/biosDetails.php';

    }

    public function collectCreateCinemaList(){
        $result = $this->Logic->getCinemas();
        include 'view/bioscopen/bioscopen.php';
    }

    public function collectBeschikbaar($id){
        $result = $this->Logic->getCinema($id);
        include 'view/bioscopen/reseveringen/beschickbaar.php';
    }

    public function collectContact(){
        include 'view/contact.php';
    }

    public function collectCookieBeleid(){
        include 'view/cookie-beleid.php';
    }

    public function collectAlgemeneVoorwaarden(){
        include 'view/algemene-voorwaarden.php';
    }


}
