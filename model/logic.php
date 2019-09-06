<?php

require_once "DataHandler.php";

class ProductsLogic
{
    public function __construct()
    {
        $this->DataHandler = new DataHandler("localhost", "mysql", "gameplayparty", "ilias", "12345");
    }

    public function __destruct()
    {
    }

}
