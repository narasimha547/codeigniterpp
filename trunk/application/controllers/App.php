<?php

class App extends Controller {

    function App() {
        parent::Controller();
    }

    function index() {
    }

    function ebookers() {
        require_once "/apps/ebookers/controllers/Main.php";
        $m = new Main();
        $m->index();

        // Change $this->uri->segments
        // change load->library (library in ebookers should only be able
        // to load allowed libraries and libraries from the application).
        // method should be able to load methods in app (/app/ebookers/main/cosi) cosi has to be a method
        // of a class Main in ebookers application and this method should load it nicely.
    }
}

?>
