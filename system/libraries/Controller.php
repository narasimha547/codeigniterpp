<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * CodeIgniter Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package     CodeLite
 * @subpackage	Libraries
 * @category	Libraries
 */
class Controller extends CI_Base {

    /**
     * @var CI_Loader
     */
    protected $load = null;

    /**
     * @var CI_URI
     */
    protected $uri = null;

    /**
     * Constructor
     *
     * Calls the initialize() function
     */
    function Controller() {
        parent::CI_Base();
        $this->_ci_initialize();
        log_message('debug', "Controller Class Initialized");
    }

    /**
     * Initialize
     *
     * Assigns all the bases classes loaded by the front controller to
     * variables in this class.  Also calls the autoload routine.
     *
     * @access	private
     * @return	void
     */
    function _ci_initialize() {
        // Assign all the class objects that were instantiated by the
        // front controller to local class variables so that CI can be
        // run as one big super object.
        $classes = array(
                'config' => 'Config',
                'input' => 'Input',
                'uri' => 'URI',
                'output' => 'Output',
                'router' => 'Router'
        );

        foreach ($classes as $var => $class) {
            $this->$var =& load_class($class);
        }

        $this->load =& load_class('Loader');
        $this->load->_ci_autoloader();
    }
}
// END _Controller class

/* End of file Controller.php */
/* Location: ./system/libraries/Controller.php */