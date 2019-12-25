<?php
/*
* Copyright (c) 2003-2009, CKSource - Frederico Knabben. All rights reserved.
* For licensing, see LICENSE.html or http://ckeditor.com/license
*/

/**
 * @package CKEditor
 * @subpackage Config
 */

/**
 * Include resource type config class
 */
require_once CKEDITOR_CONNECTOR_LIB_DIR . "/Core/ResourceTypeConfig.php";

/**
 * Main config parser
 *
 *
 * @package CKEditor
 * @subpackage Config

 * @global string $GLOBALS['config']
 */
class CKEditor_Connector_Core_Config
{
    /**
     * Is CKEditor enabled
     *
     * @var boolean
     * @access private
     */
    private $_isEnabled = false;
    /**
     * ResourceType config cache
     *
     * @var array
     * @access private
     */
    private $_resourceTypeConfigCache = array();
    /**
     * Array with default resource types names
     *
     * @access private
     * @var array
     */
    private $_defaultResourceTypes = array();
    /**
     * Filesystem encoding
     *
     * @var string
     * @access private
     */
    private $_filesystemEncoding;
    /**
     * Check double extension
     *
     * @var boolean
     * @access private
     */
    private $_checkDoubleExtension = true;
    /**
     * If set to true, validate image size
     *
     * @var boolean
     * @access private
     */
    private $_secureImageUploads = true;
    /**
     * For security, HTML is allowed in the first Kb of data for files having the following extensions only
     *
     * @var array
     * @access private
     */
    private $_htmlExtensions = array('html', 'htm', 'xml', 'xsd', 'txt', 'js');
    /**
     * Chmod files after upload to the following permission
     *
     * @var integer
     * @access private
     */
    private $_chmodFiles = 0777;
    /**
     * Chmod directories after creation
     *
     * @var integer
     * @access private
     */
    private $_chmodFolders = 0755;
	
	private $_uploadAllowInvalidFilenames = true; //AW 14/07/11

    function __construct()
    {
        $this->loadValues();
    }

    /**
	 * Get file system encoding, returns null if encoding is not set
	 *
	 * @access public
	 * @return string
	 */
    public function getFilesystemEncoding()
    {
        return $this->_filesystemEncoding;
    }

    /**
	 * Get "secureImageUploads" value
	 *
	 * @access public
	 * @return boolean
	 */
    public function getSecureImageUploads()
    {
        return $this->_secureImageUploads;
    }

    /**
	 * Get "htmlExtensions" value
	 *
	 * @access public
	 * @return array
	 */
    public function getHtmlExtensions()
    {
        return $this->_htmlExtensions;
    }

    /**
	 * Get "Check double extension" value
	 *
	 * @access public
	 * @return boolean
	 */
    public function getCheckDoubleExtension()
    {
        return $this->_checkDoubleExtension;
    }

    /**
	 * Get default resource types
	 *
	 * @access public
	 * @return array()
	 */
    public function getDefaultResourceTypes()
    {
        return $this->_defaultResourceTypes;
    }

    /**
	 * Is CKEditor enabled
	 *
	 * @access public
	 * @return boolean
	 */
    public function getIsEnabled()
    {
        return $this->_isEnabled;
    }

    /**
	* Get chmod settings for uploaded files
	*
	* @access public
	* @return integer
	*/
    public function getChmodFiles()
    {
        return $this->_chmodFiles;
    }

    /**
	* Get chmod settings for created directories
	*
	* @access public
	* @return integer
	*/
    public function getChmodFolders()
    {
        return $this->_chmodFolders;
    }



	/**
	* Get UploadAllowInvalidFilenames settings to say if filename should be allowed to contain invalid characters such as spaces AW 14/07/2011
	*
	* @access public
	* @return integer
	*/
    public function getUploadAllowInvalidFilenames()
    {
        return $this->_uploadAllowInvalidFilenames;
    }



    /**
	 * Get resourceTypeName config
	 *
	 * @param string $resourceTypeName
	 * @return CKEditor_Connector_Core_ResourceTypeConfig|null
	 * @access public
	 */
    public function &getResourceTypeConfig($resourceTypeName)
    {
        $_null = null;

        if (isset($this->_resourceTypeConfigCache[$resourceTypeName])) {
            return $this->_resourceTypeConfigCache[$resourceTypeName];
        }

        if (!isset($GLOBALS['config']['ResourceType']) || !is_array($GLOBALS['config']['ResourceType'])) {
            return $_null;
        }

        reset($GLOBALS['config']['ResourceType']);
        while (list($_key,$_resourceTypeNode) = each($GLOBALS['config']['ResourceType'])) {
            if ($_resourceTypeNode['name'] === $resourceTypeName) {
                $this->_resourceTypeConfigCache[$resourceTypeName] = new CKEditor_Connector_Core_ResourceTypeConfig($_resourceTypeNode);

                return $this->_resourceTypeConfigCache[$resourceTypeName];
            }
        }

        return $_null;
    }

    /**
     * Load values from config
     *
     * @access private
     */
    private function loadValues()
    {
        if (function_exists('CheckAuthentication')) {
            $this->_isEnabled = CheckAuthentication();
        }
        if (isset($GLOBALS['config']['FilesystemEncoding'])) {
            $this->_filesystemEncoding = (string)$GLOBALS['config']['FilesystemEncoding'];
        }
        if (isset($GLOBALS['config']['CheckDoubleExtension'])) {
            $this->_checkDoubleExtension = CKEditor_Connector_Utils_Misc::booleanValue($GLOBALS['config']['CheckDoubleExtension']);
        }
        if (isset($GLOBALS['config']['SecureImageUploads'])) {
            $this->_secureImageUploads = CKEditor_Connector_Utils_Misc::booleanValue($GLOBALS['config']['SecureImageUploads']);
        }
        if (isset($GLOBALS['config']['HtmlExtensions'])) {
            $this->_htmlExtensions = (array)$GLOBALS['config']['HtmlExtensions'];
        }
        if (isset($GLOBALS['config']['ChmodFiles'])) {
            $this->_chmodFiles = $GLOBALS['config']['ChmodFiles'];
        }
        if (isset($GLOBALS['config']['ChmodFolders'])) {
            $this->_chmodFolders = $GLOBALS['config']['ChmodFolders'];
        }
        if (isset($GLOBALS['config']['DefaultResourceTypes'])) {
            $_defaultResourceTypes = (string)$GLOBALS['config']['DefaultResourceTypes'];
            if (strlen($_defaultResourceTypes)) {
                $this->_defaultResourceTypes = explode(",", $_defaultResourceTypes);
            }
        }
		
		if (isset($GLOBALS['config']['UploadAllowInvalidFilenames'])) { //AW 14/07/11
            $this->_uploadAllowInvalidFilenames = $GLOBALS['config']['UploadAllowInvalidFilenames'];
        }
		
    }

    /**
     * Get all resource type names defined in config
     *
     * @return array
     * @access public
     */
    public function getResourceTypeNames()
    {
        if (!isset($GLOBALS['config']['ResourceType']) || !is_array($GLOBALS['config']['ResourceType'])) {
            return array();
        }

        $_names = array();
        foreach ($GLOBALS['config']['ResourceType'] as $key => $_resourceType) {
            if (isset($_resourceType['name'])) {
                $_names[] = (string)$_resourceType['name'];
            }
        }

        return $_names;
    }
}