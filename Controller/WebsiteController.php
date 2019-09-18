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

            switch ($request) {
                case 'biosInfo':
                    $result = $this->Logic->getCinema($id);
                    include 'view/bioscopen/biosDetails.php';
                    break;
                case 'bioscopen':
                    $result = $this->Logic->getCinemas();
                    include 'view/bioscopen/bioscopen.php';
                    break;
                case 'beschickbaar':
                    $result = $this->Logic->getCinema($id);
                    include 'view/bioscopen/reseveringen/beschickbaar.php';
                    break;
                case 'contact':
                    include 'view/contact.php';
                    break;
                case 'cookie-beleid':
                    include 'view/cookie-beleid.php';
                    break;
                case 'algemene-voorwaarden':
                    include 'view/algemene-voorwaarden.php';
                    break;
                default:
                    include 'view/home.php';
                    break;

            }
        } catch (ValidationException $e) {
            $errors = $e->getErrors();
        }
    }
}
