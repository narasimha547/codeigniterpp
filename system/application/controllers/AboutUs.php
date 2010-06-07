<?php

class AboutUs extends Controller {

    function AboutUs() {
        parent::Controller();
    }

    function index() {
        $this->load->view('welcome_message');
    }
}

?>
