<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * System Front Controller
 *
 * Loads the base classes and executes the request.
 *
 * @package     CodeLite
 * @subpackage  codeigniter
 * @category    Front-controller
 * @author      David Stefan
 */

/***************************************************************
 * Load the global functions
 * 
 */
require(BASEPATH.'codeigniter/Common'.EXT);

/***************************************************************
 *  Define a custom error handler so we can log PHP errors
 *
 */
set_error_handler('_exception_handler');

if (!is_php('5.3')) {
    @set_magic_quotes_runtime(0); // Kill magic quotes
}

/***************************************************************
 * Instantiate the base classes
 * 
 */
$CFG    =& load_class('Config');
$URI    =& load_class('URI');
$RTR    =& load_class('Router');
$OUT    =& load_class('Output');
$IN     =& load_class('Input');
$LANG   =& load_class('Language');

/***************************************************************
 *  Load the app controller and local controller
 *
 *  Note: The Loader class needs to be included first
 *
 */
require(BASEPATH.'codeigniter/Base'.EXT);

// Load the base controller class
load_class('Controller', FALSE);

// Load the local application controller
// Note: The Router class automatically validates the controller path.  If this include fails it 
// means that the default controller in the Routes.php file is not resolving to something valid.
if (!file_exists(APPPATH.'controllers/'.$RTR->fetch_directory().$RTR->fetch_class().EXT)) {
    show_error('Unable to load your default controller. Please make sure the controller specified in your Routes.php file is valid.');
}

include(APPPATH.'controllers/'.$RTR->fetch_directory().$RTR->fetch_class().EXT);

// Set a mark point for benchmarking
$BM->mark('loading_time_base_classes_end');


/**
 * ------------------------------------------------------
 *  Security check
 * ------------------------------------------------------
 *
 *  None of the functions in the app controller or the
 *  loader class can be called via the URI, nor can
 *  controller functions that begin with an underscore
 */
$class  = $RTR->fetch_class();
$method = $RTR->fetch_method();

if (!class_exists($class)
        OR $method == 'controller'
        OR strncmp($method, '_', 1) == 0
        OR in_array(strtolower($method), array_map('strtolower', get_class_methods('Controller')))) {

    show_404("{$class}/{$method}");
}

/***************************************************************
 *  Instantiate the controller and call requested method
 * 
 */
$CI = new $class();

if (!in_array(strtolower($method), array_map('strtolower', get_class_methods($CI)))) {
    show_404("{$class}/{$method}");
}

// Call the requested method.
// Any URI segments present (besides the class/function) will be passed to the method for convenience
call_user_func_array(array(&$CI, $method), array_slice($URI->rsegments, 2));

$OUT->_display();


/* End of file CodeIgniter.php */
/* Location: ./system/codeigniter/CodeIgniter.php */