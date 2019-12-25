<?php
/*
* Copyright (c) 2003-2009, CKSource - Frederico Knabben. All rights reserved.
* For licensing, see LICENSE.html or http://ckeditor.com/license
*/

/**
 * @package CKEditor
 * @subpackage CommandHandlers
 */

/**
 * Base commands handler
 *
 * @package CKEditor
 * @subpackage CommandHandlers
 * @abstract
 */
class CKEditor_Connector_CommandHandler_CommandHandlerBase
{
    /**
     * CKEditor_Connector_Core_Connector object
     *
     * @access protected
     * @var CKEditor_Connector_Core_Connector
     */
    protected $_connector;
    /**
     * CKEditor_Connector_Core_FolderHandler object
     *
     * @access protected
     * @var CKEditor_Connector_Core_FolderHandler
     */
    protected $_currentFolder;
    /**
     * Error handler object
     *
     * @access protected
     * @var CKEditor_Connector_ErrorHandler_Base|CKEditor_Connector_ErrorHandler_FileUpload|CKEditor_Connector_ErrorHandler_Http
     */
    protected $_errorHandler;

    function __construct()
    {
        $this->_currentFolder =& CKEditor_Connector_Core_Factory::getInstance("Core_FolderHandler");
        $this->_connector =& CKEditor_Connector_Core_Factory::getInstance("Core_Connector");
        $this->_errorHandler =& $this->_connector->getErrorHandler();
    }

    /**
     * Get Folder Handler
     *
     * @access public
     * @return CKEditor_Connector_Core_FolderHandler
     */
    public function getFolderHandler()
    {
        if (is_null($this->_currentFolder)) {
            $this->_currentFolder =& CKEditor_Connector_Core_Factory::getInstance("Core_FolderHandler");
        }

        return $this->_currentFolder;
    }

    /**
     * Check whether Connector is enabled
     * @access protected
     *
     */
    protected function checkConnector()
    {
        $_config =& CKEditor_Connector_Core_Factory::getInstance("Core_Config");
        if (!$_config->getIsEnabled()) {
            $this->_errorHandler->throwError(CKEDITOR_CONNECTOR_ERROR_CONNECTOR_DISABLED);
        }
    }

    /**
     * Check request
     * @access protected
     *
     */
    protected function checkRequest()
    {
        if (preg_match(",(/\.)|[[:cntrl:]]|(//)|(\\\\)|([\:\*\?\"\<\>\|]),", $this->_currentFolder->getClientPath())) {
            $this->_errorHandler->throwError(CKEDITOR_CONNECTOR_ERROR_INVALID_NAME);
        }

        $_resourceTypeConfig = $this->_currentFolder->getResourceTypeConfig();

        if (is_null($_resourceTypeConfig)) {
            $this->_errorHandler->throwError(CKEDITOR_CONNECTOR_ERROR_INVALID_TYPE);
        }

        $_clientPath = $this->_currentFolder->getClientPath();

        if (!is_dir($this->_currentFolder->getServerPath())) {
            if ($_clientPath == "/") {
                if (!CKEditor_Connector_Utils_FileSystem::createDirectoryRecursively($this->_currentFolder->getServerPath())) {
                    /**
                     * @todo handle error
                     */
                }
            }
            else {
                $this->_errorHandler->throwError(CKEDITOR_CONNECTOR_ERROR_FOLDER_NOT_FOUND);
            }
        }
    }
}