<?php
require_once 'model/Logic.php';
require_once 'model/Logic2.php';
require_once 'model/Logic3.php';
require_once 'model/Logic4.php';

class WebsiteController
{
    public function __construct()
    {
        $this->Logic = new Logic();
        $this->Logic2 = new Logic2();
        $this->Logic3 = new Logic3();
        $this->Logic4 = new Logic4();
    }

    public function __destruct()
    {
    }

    public function handleRequest()
    {
    $this->pageSwitch();
    $this->cinemaSwitch();
    }

    public function collectHome()
    {
        include 'view/home.php';
    }

    public function pageSwitch() {
        try {
            $pagina = isset($_REQUEST['pagina']) ? $_REQUEST['pagina'] : null;
            switch ($pagina) {
                case 'bioscopen':
                    $result = $this->Logic->getCinemas();
                    include 'view/bioscopen.php';
                    break;
                default:
                    $this->collectHome();
                    break;

            }
        } catch (ValidationException $e) {
            $errors = $e->getErrors();
        }
    }

    public function cinemaSwitch()
    {
       /* try {
            $bioscoop = isset($_REQUEST['request']) ? $_REQUEST['request'] : null;
            switch ($bioscoop) {
                case 'getCinemas':
                    $result = $this->Logic->getCinemas();
                    break;
                default:
                    break;
            }
        } catch (ValidationException $e) {
            $errors = $e->getErrors();
        }*/
    }
}