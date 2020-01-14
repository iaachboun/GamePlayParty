<?php

$host = $_SERVER['HTTP_HOST'];

switch ($host) {
    case
    "localhost":
        $dbname = "GamePlayParty";
        $dbuser = "root";
        $dbpwd = "";
        break;
    case
    "gpp.chenpeihu.com":
        $dbname = "GamePlayParty";
        $dbuser = "root";
        $dbpwd = "";
    case
    "www.gpp.chenpeihu.com":
        $dbname = "GamePlayParty";
        $dbuser = "root";
        $dbpwd = "";
    default:
        $dbname = "GamePlayParty";
        $dbuser = "root";
        $dbpwd = "";
        break;
}

?>
