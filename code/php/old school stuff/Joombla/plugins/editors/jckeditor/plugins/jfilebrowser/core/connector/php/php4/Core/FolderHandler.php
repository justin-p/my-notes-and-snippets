<?php
/*
* Copyright (c) 2003-2009, CKSource - Frederico Knabben. All rights reserved.
* For licensing, see LICENSE.html or http://ckeditor.com/license
*/

/**
 * @package CKEditor
 * @subpackage Core
 */

/**
 * Include file system utils class
 */
require_once CKEDITOR_CONNECTOR_LIB_DIR . "/Utils/FileSystem.php";

/**
 * @package CKEditor
 * @subpackage Core
 */
class CKEditor_Connector_Core_FolderHandler
{
    /**
     * CKEditor_Connector_Core_ResourceTypeConfig object
     *
     * @var CKEditor_Connector_Core_ResourceTypeConfig
     * @access private
     */
    var $_resourceTypeConfig;
    /**
     * ResourceType name
     *
     * @var string
     * @access private
     */
    var $_resourceTypeName = "";
    /**
     * Client path
     *
     * @var string
     * @access private
     */
    var $_clientPath = "/";
    /**
     * Url
     *
     * @var string
     * @access private
     */
    var $_url;
    /**
     * Server path
     *
     * @var string
     * @access private
     */
    var $_serverPath;
    /**
     * Folder info
     *
     * @var mixed
     * @access private
     */
    var $_folderInfo;

    function CKEditor_Connector_Core_FolderHandler()
    {
        if (isset($_GET["type"])) {
            $this->_resourceTypeName = (string)$_GET["type"];
        }

        if (isset($_GET["currentFolder"])) {
            $this->_clientPath = CKEditor_Connector_Utils_FileSystem::convertToFilesystemEncoding((string)$_GET["currentFolder"]);
        }

        if (!strlen($this->_clientPath)) {
            $this->_clientPath = "/";
        }
        else {
            if (substr($this->_clientPath, -1, 1) != "/") {
                $this->_clientPath .= "/";
            }
            if (substr($this->_clientPath, 0, 1) != "/") {
                $this->_clientPath = "/" . $this->_clientPath;
            }
        }
    }

    /**
     * Get resource type config
     *
     * @return CKEditor_Connector_Core_ResourceTypeConfig
     * @access public
     */
    function &getResourceTypeConfig()
    {
        if (!isset($this->_resourceTypeConfig)) {
            $_config =& CKEditor_Connector_Core_Factory::getInstance("Core_Config");
            $this->_resourceTypeConfig = $_config->getResourceTypeConfig($this->_resourceTypeName);
        }

        if (is_null($this->_resourceTypeConfig)) {
            $connector =& CKEditor_Connector_Core_Factory::getInstance("Core_Connector");
            $oErrorHandler =& $connector->getErrorHandler();
            $oErrorHandler->throwError(CKEDITOR_CONNECTOR_ERROR_INVALID_TYPE);
        }

        return $this->_resourceTypeConfig;
    }

    /**
     * Get resource type name
     *
     * @return string
     * @access public
     */
    function getResourceTypeName()
    {
        return $this->_resourceTypeName;
    }

    /**
     * Get Client path
     *
     * @return string
     * @access public
     */
    function getClientPath()
    {
        return $this->_clientPath;
    }

    /**
     * Get Url
     *
     * @return string
     * @access public
     */
    function getUrl()
    {
        if (is_null($this->_url)) {
            $this->_resourceTypeConfig = $this->getResourceTypeConfig();
            if (is_null($this->_resourceTypeConfig)) {
                $connector =& CKEditor_Connector_Core_Factory::getInstance("Core_Connector");
                $oErrorHandler =& $connector->getErrorHandler();
                $oErrorHandler->throwError(CKEDITOR_CONNECTOR_ERROR_INVALID_TYPE);
                $this->_url = "";
            }
            else {
                $this->_url = $this->_resourceTypeConfig->getUrl() . ltrim($this->getClientPath(), "/");
            }
        }

        return $this->_url;
    }

    /**
     * Get server path
     *
     * @return string
     * @access public
     */
    function getServerPath()
    {
        if (is_null($this->_serverPath)) {
            $this->_resourceTypeConfig = $this->getResourceTypeConfig();
            $this->_serverPath = CKEditor_Connector_Utils_FileSystem::combinePaths($this->_resourceTypeConfig->getDirectory(), ltrim($this->_clientPath, "/"));
        }

        return $this->_serverPath;
    }
}