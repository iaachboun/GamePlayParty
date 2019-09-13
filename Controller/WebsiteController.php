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
                default:
                    include 'view/home.php';
                    break;

            }
        } catch (ValidationException $e) {
            $errors = $e->getErrors();
        }
    }
}