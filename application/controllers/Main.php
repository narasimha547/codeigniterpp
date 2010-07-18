<?php

class Main extends Controller {

    function Main() {
        parent::Controller();
    }

    function index() {
        $this->load->view('main');
    }

    function test() {
        print_r($_GET);
    }
}

?>
