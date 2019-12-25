<?php
/*
* Copyright (c) 2003-2009, CKSource - Frederico Knabben. All rights reserved.
* For licensing, see LICENSE.html or http://ckeditor.com/license
*/

/**
 * No errors
 */
define('CKEDITOR_CONNECTOR_ERROR_NONE',0);
define('CKEDITOR_CONNECTOR_ERROR_CUSTOM_ERROR',1);
define('CKEDITOR_CONNECTOR_ERROR_INVALID_COMMAND',10);
define('CKEDITOR_CONNECTOR_ERROR_TYPE_NOT_SPECIFIED',11);
define('CKEDITOR_CONNECTOR_ERROR_INVALID_TYPE',12);
define('CKEDITOR_CONNECTOR_ERROR_INVALID_NAME',102);
define('CKEDITOR_CONNECTOR_ERROR_UNAUTHORIZED',103);
define('CKEDITOR_CONNECTOR_ERROR_ACCESS_DENIED',104);
define('CKEDITOR_CONNECTOR_ERROR_INVALID_EXTENSION',105);
define('CKEDITOR_CONNECTOR_ERROR_INVALID_REQUEST',109);
define('CKEDITOR_CONNECTOR_ERROR_UNKNOWN',110);
define('CKEDITOR_CONNECTOR_ERROR_ALREADY_EXIST',115);
define('CKEDITOR_CONNECTOR_ERROR_FOLDER_NOT_FOUND',116);
define('CKEDITOR_CONNECTOR_ERROR_FILE_NOT_FOUND',117);
define('CKEDITOR_CONNECTOR_ERROR_UPLOADED_FILE_RENAMED',201);
define('CKEDITOR_CONNECTOR_ERROR_UPLOADED_INVALID',202);
define('CKEDITOR_CONNECTOR_ERROR_UPLOADED_TOO_BIG',203);
define('CKEDITOR_CONNECTOR_ERROR_UPLOADED_CORRUPT',204);
define('CKEDITOR_CONNECTOR_ERROR_UPLOADED_NO_TMP_DIR',205);
define('CKEDITOR_CONNECTOR_ERROR_UPLOADED_WRONG_HTML_FILE',206);
define('CKEDITOR_CONNECTOR_ERROR_CONNECTOR_DISABLED',500);

define('CKEDITOR_CONNECTOR_DEFAULT_USER_FILES_PATH', "/userfiles/");
define('CKEDITOR_CONNECTOR_CONFIG_FILE_PATH', "./../../../config.php");

if (version_compare(phpversion(), '6', '>=')) {
    define('CKEDITOR_CONNECTOR_PHP_MODE', 6);
}
else if (version_compare(phpversion(), '5', '>=')) {
    define('CKEDITOR_CONNECTOR_PHP_MODE', 5);
}
else {
    define('CKEDITOR_CONNECTOR_PHP_MODE', 4);
}

if (CKEDITOR_CONNECTOR_PHP_MODE == 4) {
    define('CKEDITOR_CONNECTOR_LIB_DIR', "./php4");
} else {
    define('CKEDITOR_CONNECTOR_LIB_DIR', "./php5");
}

define('CKEDITOR_REGEX_IMAGES_EXT', '/\.(jpg|gif|png|bmp|jpeg)$/i');

//joomla stuff added by AW
define('DS',DIRECTORY_SEPARATOR);

define('CKEDITOR_INCLUDES_DIR','../../../../../jckeditor/includes');

//Get root folder
$dir = explode(DS,dirname(__FILE__));
array_splice($dir,-8);
$base_folder = implode(DS,$dir);
$base_path = '';
$user = '';

define( '_JEXEC', 1 );
define('JPATH_BASE',$base_folder);
define('JDEBUG',false);

if(file_exists(JPATH_BASE .DS.'includes'.DS.'version.php'))
	require_once ( JPATH_BASE .DS.'includes'.DS.'version.php');