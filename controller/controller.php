<?php

require_once 'model/logic.php';

class controller {

	public function __construct(){
		$this->logic = new logic();
	}

	public function __destruct(){

	}

	public function handleRequest(){
		try{
			$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : null;
			switch($page){
				case 'login':
					$this->collectLogin();
					break;
				case 'home':
					$this->collectHome();
					break;
				case 'search':
					$this->collectSearch();
					break;
				default:
					$this->collectHome();
					break;
			}
		} catch (ValidationException $e) {
			$errors = $e->getErrors();
		}
	}

	public function collectLogin(){
		include 'view/login.php';

	}

	public function collectHome(){
		include 'view/home.php';
	}

	public function collectSearch(){
		include 'view/search.php';
	}


}