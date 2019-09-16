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
            switch ($request) {
                case 'biosInfo':
                    $id = $_REQUEST['id'];
                    $result = $this->Logic->getCinema($id);
                    include 'view/biosDetails.php';
                    break;
                case 'bioscopen':
                    $result = $this->Logic->getCinemas();
                    include 'view/bioscopen.php';
                    break;
                case 'contact':
                    include 'view/contact.php';
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
