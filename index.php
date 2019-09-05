<?php
include 'view/header.php';
require_once 'controller/websiteController.php';

$controller = new websiteController();
$controller->handleRequest();