<?php
/*
Copyright (c) 2003-2009, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

/**
 * This function must check the user session to be sure that he/she is
 * authorized to upload and access files in the File Browser.
 *
 * @return boolean
 */
function CheckAuthentication()
{
    // WARNING : DO NOT simply return "true". By doing so, you are allowing
    // "anyone" to upload and list the files in your server. You must implement
    // some kind of session validation here. Even something very simple as...
    //
    // return isset($_SESSION['IsAuthorized']) && $_SESSION['IsAuthorized'];
    //
    // ... where $_SESSION['IsAuthorized'] is set to "true" as soon as the
    // user logs in your system.

    // %REMOVE_START%
    // Attention: In the development version (SVN) the PHP connector is enabled by default.
    //return true;
    // %REMOVE_END%
	jckimport('ckeditor.authenticate');	
	return JCKAuthenticate::check();
}

// To make it easy to configure CKEditor file manager, the $baseUrl and $baseDir can be used.
// Those are helper variables used later in this config file.

// $baseUrl : the base path used to build the final URL for the resources handled
// in CKEditor. If empty, the default value (/userfiles/) is used.
//
// Examples:
//  $baseUrl = 'http://example.com/userfiles/';
//  $baseUrl = '/userfiles/';
//
// ATTENTION: The trailing slash is required.
//$baseUrl = '/userfiles/';

$base_path = '';
$user = '';
	
/* Load Joomla's required classes */

//Get image/flash and filepath directories

$imagePath = 'images';
$flashPath = 'flash';
$filePath = 'files';

jimport('joomla.version');
$JVersion = new JVersion();

if( !version_compare( $JVersion->getShortVersion(), '1.6', 'gt' ) )
{
	$sql =  "SELECT params FROM #__plugins WHERE element = 'jckeditor' AND folder ='editors'" ;

} else
{
	jimport('joomla.environment.response');
	$sql =  "SELECT params FROM #__extensions WHERE element = 'jckeditor' AND folder ='editors'" ;

}//end if

$database =  &JFactory::getDBO();   
$database->setQuery( $sql );
$result = $database->loadResult();

$params =@ new JParameter($result);

jimport('joomla.event.dispatcher');	

// system events trigger events

//import CK plugins
jckimport('ckeditor.plugins.helper');

JCKPluginsHelper::storePlugins('default');


$dispatcher = JDispatcher::getInstance();




JCKPluginsHelper::importPlugin('filebrowser');
$dispatcher = JDispatcher::getInstance();

$dispatcher->trigger('beforeSetImagePath',array( &$params));
$dispatcher->trigger('beforeSetFlashPath', array( &$params));
$dispatcher->trigger('beforeSetFilePath', array( &$params));

//import System plugin 
JCKPluginsHelper::importPlugin('default');
$dispatcher->trigger('intialize',array( &$params));

$imagePath = $params->get('imagePath','images');
$flashPath = $params->get('flashPath','flash');
$filePath = $params->get('filePath','files');

$dispatcher->trigger('afterSetImagePath',array( &$params));
$dispatcher->trigger('afterSetFlashPath', array( &$params));
$dispatcher->trigger('afterSetFilePath', array( &$params));

$baseUrl = ''; //set to relative

// $baseDir : the path to the local directory (in the server) which points to the
// above $baseUrl URL. This is the path used by CKEditor to handle the files in
// the server. Full write permissions must be granted to this directory.
//
// Examples:
// You may point it to a directory directly:
//
//  $baseDir = '/home/login/public_html/userfiles/';
//  $baseDir = 'C:/SiteDir/userfiles/';
//
// Or you may let CKEditor discover the path, based on $baseUrl:
//
//  $baseDir = resolveUrl($baseUrl);
//
// ATTENTION: The trailing slash is required.

$baseDir = JPATH_BASE . DS;


//$baseDir = 'D:/xampp/htdocs/userfiles/'; //%REMOVE_LINE%

// ResourceType : defines the "resource types" handled in CKEditor. A resource
// type is nothing more than a way to group files under different paths, each one
// having different configuration settings.
$config['ResourceType'][] = Array(
    'name' => 'Files', // Single quotes not allowed
    'url' => $baseUrl . $filePath,
    'directory' => $baseDir . $filePath,
    'allowedExtensions' => '7z,aiff,asf,avi,bmp,csv,doc,fla,flv,gif,gz,gzip,jpeg,jpg,mid,mov,mp3,mp4,mpc,mpeg,mpg,ods,odt,pdf,png,ppt,pxd,qt,ram,rar,rm,rmi,rmvb,rtf,sdc,sitd,swf,sxc,sxw,tar,tgz,tif,tiff,txt,vsd,wav,wma,wmv,xls,zip',
    'deniedExtensions' => ''
);

$config['ResourceType'][] = Array(
    'name' => 'Images',
    'url' => $baseUrl . $imagePath,
    'directory' => $baseDir . $imagePath,
    'allowedExtensions' => 'bmp,gif,jpeg,jpg,png',
    'deniedExtensions' => ''
);

$config['ResourceType'][] = Array(
    'name' => 'Flash',
    'url' => $baseUrl . $flashPath,
    'directory' => $baseDir . $flashPath,
    'allowedExtensions' => 'swf,flv',
    'deniedExtensions' => ''
);

// Due to security issues with Apache modules, it is recommended to leave the
// following setting enabled.
$config['ForceSingleExtension'] = true ;

// Perform additional checks for image files.
// If set to true, validate image size (using getimagesize).
$config['SecureImageUploads'] = true;

// For security, HTML is allowed in the first Kb of data for files having the
// following extensions only.
$config['HtmlExtensions'] = array("html", "htm", "xml", "xsd", "txt", "js") ;

// After file is uploaded, sometimes it is required to change its permissions
// so that it was possible to access it at the later time.
// If possible, it is recommended to set more restrictive permissions, like 0755.
// Set to 0 to disable this feature.
// Note: not needed on Windows-based servers.
$config['ChmodFiles'] = 0777 ;

// See comments above.
// Used when creating folders that does not exist.
$config['ChmodFolders'] = 0755 ;

// If you have iconv enabled (visit http://php.net/iconv for more information),
// you can use this directive to specify the encoding of file names in your
// operating system. Acceptable values can be found at:
//  http://www.gnu.org/software/libiconv/
//
// Examples:
//  $config['FilesystemEncoding'] = 'CP1250';
//  $config['FilesystemEncoding'] = 'ISO-8859-2';
$config['FilesystemEncoding'] = 'UTF-8';
//$config['FilesystemEncoding'] = 'CP1250'; //%REMOVE_LINE%

$config['UploadAllowInvalidFilenames'] = false; //Added by AW 14/07/11 to enable strict handling of file uploads