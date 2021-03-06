<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/***************************************************************
 * Base site URL
 * 
 */
$config['base_url'] = "http://localhost/";

/***************************************************************
 * Index File
 * 
 */
$config['index_page'] = "index.php";

/***************************************************************
 * Error Logging Threshold
 *
 * If you have enabled error logging, you can set an error threshold to
 * determine what gets logged. Threshold options are:
 * You can enable error logging by setting a threshold over zero. The
 * threshold determines what gets logged. Threshold options are:
 *
 *      0 = Disables logging, Error logging TURNED OFF
 *      1 = Error Messages (including PHP errors)
 *      2 = Debug Messages
 *      3 = Informational Messages
 *      4 = All Messages
 *
 * For a live site you'll usually only enable Errors (1) to be logged otherwise
 * your log files will fill up very fast.
 */
$config['log_threshold'] = 0;

/***************************************************************
 * Error Logging Directory Path
 *
 * Leave this BLANK unless you would like to set something other than the default
 * system/logs/ folder.  Use a full server path with trailing slash.
 */
$config['log_path'] = '';

/***************************************************************
 * Date Format for Logs
 *
 */
$config['log_date_format'] = 'Y-m-d H:i:s';

/***************************************************************
 * Cache Directory Path
 *
 * Leave this BLANK unless you would like to set something other than the default
 * system/cache/ folder.  Use a full server path with trailing slash.
 * 
 */
$config['cache_path'] = '';


/* End of file config.php */
/* Location: ./system/application/config/config.php */
