<?php
include "view/components/header.php";
require_once 'controller/WebsiteController.php';

$controller = new controller();
$controller->handleRequest();

include "view/components/footer.php";
