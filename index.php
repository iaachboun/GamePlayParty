<?php

include 'header.php';
require_once 'Controller/Controller.php';

$controller = new Controller();
$controller->handleRequest();

include "footer.php";

