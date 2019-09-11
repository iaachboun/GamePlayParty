<?php
session_start();
require_once 'Controller/Controller.php';

$controller = new Controller();
$controller->handleRequest();
