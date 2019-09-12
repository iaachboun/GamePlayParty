<?php


class Logic3
{
    public function __construct()
    {

        $this->DataHandler = new DataHandler("localhost", "mysql", "", "root", "");

    }

    public function __destruct()
    {
    }

    public function showtextLogic3()
    {
        $html = '<h2>logic 3</h2>';
        return $html;
    }
}