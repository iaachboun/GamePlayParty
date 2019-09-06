<?php
include "view/header.php";
require_once 'controller/WebsiteController.php';

$controller = new controller();
$controller->handleRequest();

include "view/footer.php";
