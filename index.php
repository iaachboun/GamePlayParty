<?php
//ini_set('display_errors',1); error_reporting(E_ALL);

include 'header.php';
require_once 'Controller/WebsiteController.php';

$controller = new WebsiteController();
$controller->handleRequest();


include "footer.php";

