<?php
// defines database connection data
//Cause browser to reload page every time
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

// set syatem constants
define( 'DS', DIRECTORY_SEPARATOR );

//get root folder
$rootFolder = explode(DS,dirname(__FILE__));
	
//current level in diretoty structure
$currentfolderlevel = 6;

array_splice($rootFolder,-$currentfolderlevel);

$base_folder = implode(DS,$rootFolder);

define( '_JEXEC', 1 );

define('JPATH_BASE',implode(DS,$rootFolder));

require_once ( JPATH_BASE .DS.'includes'.DS.'defines.php' );
	
/* Load in the configuation file */

//require_once( '../../../../../../../configuration.php' );
require_once( JPATH_CONFIGURATION	.DS.'configuration.php' );

/*load loader class */

define('JPATH_PLATFORM',JPATH_LIBRARIES);

require_once(JPATH_LIBRARIES .DS.'loader.php' );
require_once(JPATH_LIBRARIES .DS. 'joomla' .DS . 'methods.php' ); 


/* Load Joomla's required classes */

jimport('joomla.base.object');
jimport('joomla.filter.filterinput');
jimport('joomla.log.log');
jimport('joomla.database.database');
jimport('joomla.factory');
jimport('joomla.error.error');
jimport('joomla.environment.uri');

//get system parameters

$JConfig = new JConfig();

							
define('DB_DRIVER',$JConfig->dbtype);
define('DB_HOST', $JConfig->host);
define('DB_USER', $JConfig->user );
define('DB_PASSWORD',$JConfig->password);
define('DB_DATABASE', $JConfig->db ); 
define('DB_PREFIX', $JConfig->dbprefix); 
define('DB_OFFLINE', $JConfig->offline);

