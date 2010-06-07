<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * CodeIgniter Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package     CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author      ExpressionEngine Dev Team
 * @link        http://codeigniter.com/user_guide/general/controllers.html
 */
class Controller extends CI_Base {

    var $_ci_scaffolding	= FALSE;
    var $_ci_scaff_table	= FALSE;

    /**
     * @var CI_Loader
     *
     * Added to activate autocomplete in NetBeans
     */
    protected $load = null;

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

    // --------------------------------------------------------------------

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
                'config'        => 'Config',
                'input'		=> 'Input',
                'benchmark'	=> 'Benchmark',
                'uri'		=> 'URI',
                'output'	=> 'Output',
                'lang'		=> 'Language',
                'router'	=> 'Router'
        );

        foreach ($classes as $var => $class) {
            $this->$var =& load_class($class);
        }

        // Removed PHP4 support
        $this->load =& load_class('Loader');
        $this->load->_ci_autoloader();
    }

    // --------------------------------------------------------------------

    /**
     * Run Scaffolding
     *
     * @access	private
     * @return	void
     */
    function _ci_scaffolding() {
        if ($this->_ci_scaffolding === FALSE OR $this->_ci_scaff_table === FALSE) {
            show_404('Scaffolding unavailable');
        }

        $method = ( ! in_array($this->uri->segment(3), array('add', 'insert', 'edit', 'update', 'view', 'delete', 'do_delete'), TRUE)) ? 'view' : $this->uri->segment(3);

        require_once(BASEPATH.'scaffolding/Scaffolding'.EXT);
        $scaff = new Scaffolding($this->_ci_scaff_table);
        $scaff->$method();
    }


}
// END _Controller class

/* End of file Controller.php */
/* Location: ./system/libraries/Controller.php */