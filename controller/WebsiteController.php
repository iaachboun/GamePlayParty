<?php
require_once 'model/products-logic.php';

class zWebsiteController
{
    public function __construct()
    {
        $this->ProductsLogic = new ProductsLogic();
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    public function handleRequest()
    {
        try {
            $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : NULL;
            switch ($page) {
                default:
                    break;
            }
        } catch (ValidationException $e) {
            $errors = $e->getErrors();
        }

    }


}
