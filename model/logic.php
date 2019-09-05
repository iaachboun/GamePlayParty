<?php

require_once 'model/datahandler.php';

class logic {
    public function __construct() {
        $this->datahandler = new datahandler( "loacalhost", "mysql", "GamePlayParty", "ilias", "test" );
    }
}