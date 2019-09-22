<?php

include 'header.php';
require_once 'Controller/WebsiteController.php';

$controller = new WebsiteController();
$controller->handleRequest();


include "footer.php";

