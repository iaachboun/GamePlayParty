<?php
require_once 'model/DataHandler.php';

class Logic2
{
    public function __construct()
    {

        $this->DataHandler = new DataHandler("localhost", "mysql", "", "", "");

    }

    public function __destruct()
    {
    }

    public function showtextLogic2()
    {
        $html = '<h2>logic 2</h2>';
        return $html;
    }

}
