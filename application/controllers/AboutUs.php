<?php

class AboutUs extends Controller {

    function AboutUs() {
        parent::Controller();
    }

    function index() {
        print_r($this->uri->segments);
    }

    function test() {
        print_r($this->uri->segments);
    }
}

?>
