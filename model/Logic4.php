<?php


class Logic4
{
    public function __construct()
    {

        $this->DataHandler = new DataHandler("localhost", "mysql", "GamePlayParty", "ilias", "12345");

    }

    public function __destruct()
    {
    }

    public function showtextLogic4()
    {
        $html = '<h2>logic 4</h2>';
        return $html;
    }
}