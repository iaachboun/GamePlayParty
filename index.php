<?php
error_reporting(0);
@ini_set('display_errors', 0);
include 'header.php';
require_once 'Controller/Controller.php';

$controller = new Controller();
$controller->handleRequest();

include "footer.php";

