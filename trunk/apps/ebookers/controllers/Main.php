<?php

class Main extends Controller {

    function Main() {
        parent::Controller();
    }

    function index() {
        print_r($this->uri->segments);
    }
}

?>
