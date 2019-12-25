<?php
/*
* Copyright (c) 2003-2009, CKSource - Frederico Knabben. All rights reserved.
* For licensing, see LICENSE.html or http://ckeditor.com/license
*/

/**
 * define required constants
 */
require_once "constants.php";

require_once ( JPATH_BASE .DS.'includes'.DS.'defines.php' );

define('JPATH_PLATFORM',JPATH_LIBRARIES);

/* Load in the configuation file */
require_once( JPATH_CONFIGURATION	.DS.'configuration.php' );

/*load loader class */
require_once(JPATH_LIBRARIES .DS.'loader.php' );


/**
 * we need this class in each call
 */
require_once CKEDITOR_CONNECTOR_LIB_DIR . "/CommandHandler/CommandHandlerBase.php";
/**
 * singleton factory
 */
require_once CKEDITOR_CONNECTOR_LIB_DIR . "/Core/Factory.php";
/**
 * utils class
 */
require_once CKEDITOR_CONNECTOR_LIB_DIR . "/Utils/Misc.php";

/* load JCK loader class*/
require_once (CKEDITOR_INCLUDES_DIR . '/loader.php');

/** load joomla core classes **/

require_once(JPATH_LIBRARIES .DS.'joomla'.DS .'methods.php' );
jimport('joomla.base.object');
jimport('joomla.filter.filterinput');
jimport('joomla.factory');
jimport('joomla.error.error');
jimport('joomla.language.language');
jimport('joomla.environment.uri');
jimport('joomla.environment.request');
jimport('joomla.environment.response');
jimport('joomla.user.user');
jimport('joomla.application.component.model');
jimport('joomla.html.parameter');
//This is required for the User Params
jimport( 'joomla.utilities.arrayhelper' );


//lets set DB configuration
$config = new JConfig();
// Get the global configuration object
$registry = JFactory::getConfig();
// Load the configuration values into the registry
$registry->loadObject($config);

//lets set session
jckimport('ckeditor.user.user');
$session = JCKUser::getSession();


/*** End load joomla core classe **/

/**
 * Simple function required by config.php - discover the server side path
 * to the directory relative to the "$baseUrl" attribute
 *
 * @package CKEditor
 * @subpackage Connector
 * @param string $baseUrl
 * @return string
 */
function resolveUrl($baseUrl) {
    $fileSystem =& CKEditor_Connector_Core_Factory::getInstance("Utils_FileSystem");
    return $fileSystem->getDocumentRootPath() . $baseUrl;
}

$utilsSecurity =& CKEditor_Connector_Core_Factory::getInstance("Utils_Security");
$utilsSecurity->getRidOfMagicQuotes();

/**
 * $config must be initialised
 */
$config = array();
/**
 * read config file
 */
require_once CKEDITOR_CONNECTOR_CONFIG_FILE_PATH;

CKEditor_Connector_Core_Factory::initFactory();
$connector =& CKEditor_Connector_Core_Factory::getInstance("Core_Connector");

if (isset($_GET['command'])) {
    $connector->executeCommand($_GET['command']);
}
else {
    $connector->handleInvalidCommand();
}
