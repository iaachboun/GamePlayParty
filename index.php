<?php
include "header.php";
require_once 'controller/WebsiteController.php';

$controller = new controller();
$controller->handleRequest();

include "footer.php";
